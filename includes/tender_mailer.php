<?php
/**
 * AB Malaya Sdn Bhd - Standalone Requisition Mailer Engine
 * 100% Independent - Zero dependencies on ERP core code.
 * Sends maritime requisition dossiers via secure SMTP or PHP mail() with PDF attachment.
 */

class TenderMailer {

    private static function getConfig() {
        $configFile = dirname(__DIR__) . '/config/mail_credentials.php';
        if (file_exists($configFile)) {
            $config = include $configFile;
            if (is_array($config)) return $config;
        }

        // Environment variables or default fallback
        return [
            'smtp_enabled'   => false,
            'smtp_host'      => getenv('SMTP_HOST') ?: 'localhost',
            'smtp_port'      => (int)(getenv('SMTP_PORT') ?: 465),
            'smtp_secure'    => getenv('SMTP_SECURE') ?: 'ssl',
            'smtp_auth'      => true,
            'smtp_username'  => getenv('SMTP_USER') ?: '',
            'smtp_password'  => getenv('SMTP_PASS') ?: '',
            'from_email'     => getenv('FROM_EMAIL') ?: 'procurement@abmalaya.com',
            'from_name'      => 'AB Malaya Marine Procurement Desk',
            'fallback_mail'  => true,
            'log_delivery'   => true
        ];
    }

    /**
     * Send Requisition Dossier to Target Routing Email with Client Reply-To
     *
     * @param string $routing_email  Mandatory target recipient (e.g. superintendent/buyer/vendor)
     * @param string $client_email   Dynamic client/vessel sender email (set as Reply-To)
     * @param array  $rfq_record     Requisition data array
     * @param string $pdf_path       Optional absolute path to generated PDF
     * @return array Result [success => bool, message => string, method => string]
     */
    public static function sendRequisition($routing_email, $client_email, $rfq_record, $pdf_path = null) {
        $config = self::getConfig();
        $routing_email = trim($routing_email);
        $client_email = trim($client_email);

        if (empty($routing_email) || !filter_var($routing_email, FILTER_VALIDATE_EMAIL)) {
            return [
                'success' => false,
                'message' => 'Invalid or missing target recipient email (Send To).'
            ];
        }

        if (empty($client_email) || !filter_var($client_email, FILTER_VALIDATE_EMAIL)) {
            $client_email = $config['from_email'];
        }

        $vessel = $rfq_record['vessel_name'] ?? 'Vessel Requisition';
        $req_no = $rfq_record['requisition_no'] ?? 'REQ-UNSPECIFIED';
        $item_title = $rfq_record['ordering_item'] ?? 'Marine Stores';
        $subject = "Maritime Requisition Dossier: {$vessel} [{$req_no}] - {$item_title}";

        $html_body = self::buildHtmlEmail($rfq_record);

        $sent = false;
        $method_used = 'none';
        $error_detail = '';

        // 1. Try Direct SMTP if enabled and password provided
        if (!empty($config['smtp_enabled']) && !empty($config['smtp_password'])) {
            try {
                $smtp_res = self::sendViaSmtp($config, $routing_email, $client_email, $subject, $html_body, $pdf_path);
                if ($smtp_res['success']) {
                    $sent = true;
                    $method_used = 'smtp';
                } else {
                    $error_detail = $smtp_res['message'];
                }
            } catch (\Throwable $e) {
                $error_detail = $e->getMessage();
            }
        }

        // 2. Fallback to PHP native mail() if SMTP was not used or failed
        if (!$sent && !empty($config['fallback_mail'])) {
            try {
                $mail_res = self::sendViaPhpMail($config, $routing_email, $client_email, $subject, $html_body, $pdf_path);
                if ($mail_res['success']) {
                    $sent = true;
                    $method_used = 'php_mail';
                } else {
                    $error_detail .= ($error_detail ? ' | ' : '') . $mail_res['message'];
                }
            } catch (\Throwable $e) {
                $error_detail .= ($error_detail ? ' | ' : '') . $e->getMessage();
            }
        }

        // 3. Log delivery
        if (!empty($config['log_delivery'])) {
            self::logDelivery($routing_email, $client_email, $req_no, $sent, $method_used, $error_detail);
        }

        if ($sent) {
            return [
                'success' => true,
                'message' => "Requisition successfully dispatched to {$routing_email} via {$method_used}.",
                'method'  => $method_used,
                'to'      => $routing_email,
                'reply_to'=> $client_email
            ];
        }

        return [
            'success' => false,
            'message' => "Dispatch queued locally. Mail server report: " . ($error_detail ?: 'Server offline in dev environment.'),
            'method'  => 'local_queued',
            'to'      => $routing_email,
            'reply_to'=> $client_email
        ];
    }

    /**
     * Pure PHP Socket SMTP Client (No external libraries required)
     */
    private static function sendViaSmtp($cfg, $to, $reply_to, $subject, $html_body, $pdf_path) {
        $host = $cfg['smtp_host'];
        $port = $cfg['smtp_port'];
        $secure = strtolower($cfg['smtp_secure'] ?? '');

        $prefix = ($secure === 'ssl') ? 'ssl://' : '';
        $timeout = 10;

        $socket = @fsockopen($prefix . $host, $port, $errno, $errstr, $timeout);
        if (!$socket) {
            return ['success' => false, 'message' => "Could not connect to SMTP host {$host}:{$port} ({$errstr})"];
        }

        $read = self::smtpRead($socket);

        // HELO/EHLO
        fputs($socket, "EHLO " . ($_SERVER['SERVER_NAME'] ?? 'localhost') . "\r\n");
        $read = self::smtpRead($socket);

        // STARTTLS if port 587
        if ($secure === 'tls') {
            fputs($socket, "STARTTLS\r\n");
            $read = self::smtpRead($socket);
            stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
            fputs($socket, "EHLO " . ($_SERVER['SERVER_NAME'] ?? 'localhost') . "\r\n");
            $read = self::smtpRead($socket);
        }

        // AUTH LOGIN
        if (!empty($cfg['smtp_auth'])) {
            fputs($socket, "AUTH LOGIN\r\n");
            $read = self::smtpRead($socket);
            fputs($socket, base64_encode($cfg['smtp_username']) . "\r\n");
            $read = self::smtpRead($socket);
            fputs($socket, base64_encode($cfg['smtp_password']) . "\r\n");
            $read = self::smtpRead($socket);
            if (substr($read, 0, 3) !== '235') {
                fclose($socket);
                return ['success' => false, 'message' => "SMTP Authentication failed: " . trim($read)];
            }
        }

        // MAIL FROM
        fputs($socket, "MAIL FROM: <{$cfg['from_email']}>\r\n");
        $read = self::smtpRead($socket);

        // RCPT TO (Primary Target Recipient)
        fputs($socket, "RCPT TO: <{$to}>\r\n");
        $read = self::smtpRead($socket);

        // Optional BCC copy to sender mailbox (Creates archive in Sent/Inbox)
        if (!empty($cfg['bcc_copy_to_sender']) && !empty($cfg['from_email']) && strtolower($cfg['from_email']) !== strtolower($to)) {
            fputs($socket, "RCPT TO: <{$cfg['from_email']}>\r\n");
            self::smtpRead($socket);
        }

        // DATA
        fputs($socket, "DATA\r\n");
        $read = self::smtpRead($socket);

        $boundary = "==_MIME_BOUND_" . md5(uniqid(time()));
        $mime_data = self::buildMimeMessage($cfg, $to, $reply_to, $subject, $html_body, $pdf_path, $boundary);

        fputs($socket, $mime_data . "\r\n.\r\n");
        $read = self::smtpRead($socket);

        fputs($socket, "QUIT\r\n");
        fclose($socket);

        if (substr($read, 0, 3) === '250') {
            return ['success' => true, 'message' => 'Delivered via SMTP'];
        }

        return ['success' => false, 'message' => "SMTP Data error: " . trim($read)];
    }

    private static function smtpRead($socket) {
        $data = '';
        while ($str = fgets($socket, 515)) {
            $data .= $str;
            if (substr($str, 3, 1) === ' ') break;
        }
        return $data;
    }

    /**
     * Native PHP mail() with proper Reply-To and MIME attachments
     */
    private static function sendViaPhpMail($cfg, $to, $reply_to, $subject, $html_body, $pdf_path) {
        $boundary = "==_MIME_BOUND_" . md5(uniqid(time()));

        $headers = [
            "MIME-Version: 1.0",
            "From: {$cfg['from_name']} <{$cfg['from_email']}>",
            "Reply-To: {$reply_to}",
            "X-Mailer: AB Malaya Maritime Requisition Dispatcher",
            "Content-Type: multipart/mixed; boundary=\"{$boundary}\""
        ];

        if (!empty($cfg['bcc_copy_to_sender']) && !empty($cfg['from_email']) && strtolower($cfg['from_email']) !== strtolower($to)) {
            $headers[] = "Bcc: <{$cfg['from_email']}>";
        }

        $body = "--{$boundary}\r\n";
        $body .= "Content-Type: text/html; charset=UTF-8\r\n";
        $body .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
        $body .= $html_body . "\r\n\r\n";

        // Attachment if available
        if ($pdf_path && file_exists($pdf_path)) {
            $filename = basename($pdf_path);
            $file_content = file_get_contents($pdf_path);
            $body .= "--{$boundary}\r\n";
            $body .= "Content-Type: application/pdf; name=\"{$filename}\"\r\n";
            $body .= "Content-Transfer-Encoding: base64\r\n";
            $body .= "Content-Disposition: attachment; filename=\"{$filename}\"\r\n\r\n";
            $body .= chunk_split(base64_encode($file_content)) . "\r\n\r\n";
        }

        $body .= "--{$boundary}--";

        $additional_params = !empty($cfg['from_email']) ? "-f" . escapeshellarg($cfg['from_email']) : '';
        $ok = @mail($to, $subject, $body, implode("\r\n", $headers), $additional_params);
        if ($ok) {
            return ['success' => true, 'message' => 'Dispatched via PHP mail()'];
        }
        return ['success' => false, 'message' => 'PHP mail() function rejected dispatch.'];
    }

    private static function buildMimeMessage($cfg, $to, $reply_to, $subject, $html_body, $pdf_path, $boundary) {
        $msg  = "From: {$cfg['from_name']} <{$cfg['from_email']}>\r\n";
        $msg .= "To: <{$to}>\r\n";
        $msg .= "Reply-To: <{$reply_to}>\r\n";
        $msg .= "Subject: {$subject}\r\n";
        $msg .= "Date: " . date('r') . "\r\n";
        $msg .= "MIME-Version: 1.0\r\n";
        $msg .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"\r\n\r\n";

        $msg .= "--{$boundary}\r\n";
        $msg .= "Content-Type: text/html; charset=UTF-8\r\n";
        $msg .= "Content-Transfer-Encoding: 8bit\r\n\r\n";
        $msg .= $html_body . "\r\n\r\n";

        if ($pdf_path && file_exists($pdf_path)) {
            $filename = basename($pdf_path);
            $file_content = file_get_contents($pdf_path);
            $msg .= "--{$boundary}\r\n";
            $msg .= "Content-Type: application/pdf; name=\"{$filename}\"\r\n";
            $msg .= "Content-Transfer-Encoding: base64\r\n";
            $msg .= "Content-Disposition: attachment; filename=\"{$filename}\"\r\n\r\n";
            $msg .= chunk_split(base64_encode($file_content)) . "\r\n\r\n";
        }

        $msg .= "--{$boundary}--";
        return $msg;
    }

    private static function buildHtmlEmail($rfq) {
        $vessel = htmlspecialchars($rfq['vessel_name'] ?? 'Vessel');
        $req_no = htmlspecialchars($rfq['requisition_no'] ?? '-');
        $dept = htmlspecialchars($rfq['department'] ?? 'Deck Department');
        $critical = htmlspecialchars($rfq['critical_type'] ?? 'Non-Critical');
        $master = htmlspecialchars($rfq['master_name'] ?? 'Master / Chief Engineer');
        $date = htmlspecialchars($rfq['date_issued'] ?? date('Y-m-d'));
        $rfq_id = htmlspecialchars($rfq['rfq_id'] ?? '-');
        $items = $rfq['items'] ?? [];

        $items_rows = '';
        foreach ($items as $it) {
            $no = (int)($it['item_no'] ?? 1);
            $name = htmlspecialchars($it['product_name'] ?? '');
            $code = htmlspecialchars($it['impa_code'] ?? '-');
            $qty = htmlspecialchars($it['quantity'] ?? 1) . ' ' . htmlspecialchars($it['unit'] ?? 'PCS');
            $spec = htmlspecialchars($it['specification'] ?? '-');

            $items_rows .= "
            <tr style='border-bottom: 1px solid #e2e8f0;'>
                <td style='padding: 8px; text-align: center; font-size: 11px;'>{$no}</td>
                <td style='padding: 8px; font-size: 11px;'><b>{$name}</b><br><small style='color: #64748b;'>IMPA: {$code} | {$spec}</small></td>
                <td style='padding: 8px; text-align: center; font-size: 11px;'><b>{$qty}</b></td>
            </tr>";
        }

        return "
        <!DOCTYPE html>
        <html>
        <head><meta charset='UTF-8'></head>
        <body style='font-family: Arial, sans-serif; background-color: #f8fafc; margin: 0; padding: 24px; color: #0f172a;'>
            <table style='max-width: 650px; margin: 0 auto; background: #ffffff; border: 1px solid #cbd5e1; border-collapse: collapse; width: 100%;'>
                <tr style='background: #093863; color: #ffffff;'>
                    <td style='padding: 20px; text-align: left;'>
                        <h2 style='margin: 0; font-size: 18px; letter-spacing: 0.5px;'>AB MALAYA SDN BHD</h2>
                        <div style='font-size: 12px; color: #93c5fd; margin-top: 4px;'>OFFICIAL MARITIME REQUISITION TRANSMISSION (HSEMS 10.1D)</div>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 20px;'>
                        <p style='font-size: 13px; line-height: 1.5;'>
                            A formal vessel procurement requisition has been registered and transmitted from <b>{$vessel}</b> under official reference <b>{$req_no}</b>.
                        </p>

                        <table style='width: 100%; background: #f1f5f9; padding: 12px; border-radius: 4px; font-size: 12px; margin-bottom: 20px;'>
                            <tr><td><b>Vessel Name:</b> {$vessel}</td><td><b>Requisition No:</b> {$req_no}</td></tr>
                            <tr><td><b>Department:</b> {$dept}</td><td><b>Classification:</b> {$critical}</td></tr>
                            <tr><td><b>Authorized Master:</b> {$master}</td><td><b>Date Issued:</b> {$date}</td></tr>
                            <tr><td colspan='2'><b>System Tracking ID:</b> {$rfq_id}</td></tr>
                        </table>

                        <h4 style='margin: 0 0 10px 0; font-size: 13px; text-transform: uppercase;'>Summary of Requisition Items (" . count($items) . " Items)</h4>
                        <table style='width: 100%; border-collapse: collapse; border: 1px solid #cbd5e1;'>
                            <thead>
                                <tr style='background: #e2e8f0; font-size: 11px;'>
                                    <th style='padding: 8px; width: 8%;'>NO</th>
                                    <th style='padding: 8px; text-align: left;'>DESCRIPTION & SPECS</th>
                                    <th style='padding: 8px; width: 18%;'>QTY</th>
                                </tr>
                            </thead>
                            <tbody>
                                {$items_rows}
                            </tbody>
                        </table>

                        <div style='margin-top: 24px; text-align: center;'>
                            <a href='https://abmalaya.com/download_rfq_pdf.php?rfq_id={$rfq_id}' style='background: #093863; color: #ffffff; text-decoration: none; padding: 12px 24px; font-weight: bold; font-size: 13px; border-radius: 4px; display: inline-block;'>
                                📄 Download Official Signed PDF (HSEMS 10.1D)
                            </a>
                        </div>

                        <p style='margin-top: 24px; font-size: 12px; color: #475569; line-height: 1.5;'>
                            <i>Note: Reply directly to this email to contact the fleet superintendent / requesting vessel master. The official signed document is attached or viewable via the link above.</i>
                        </p>
                    </td>
                </tr>
                <tr style='background: #0f172a; color: #94a3b8; font-size: 10px; text-align: center;'>
                    <td style='padding: 12px;'>
                        AB Malaya Sdn Bhd • CIDB Grade G7 Registered • Ministry of Finance (MOF) Approved<br>
                        Automated Maritime Requisition Dispatcher • Confidential Commercial Document
                    </td>
                </tr>
            </table>
        </body>
        </html>";
    }

    private static function logDelivery($to, $reply_to, $req_no, $status, $method, $error = '') {
        $logDir = dirname(__DIR__) . '/data/logs';
        if (!is_dir($logDir)) @mkdir($logDir, 0777, true);
        $logFile = $logDir . '/mail_delivery.log';

        $timestamp = date('Y-m-d H:i:s');
        $statusStr = $status ? 'SUCCESS' : 'FAILED';
        $logEntry = "[{$timestamp}] [{$statusStr}] [{$method}] REQ: {$req_no} | TO: {$to} | REPLY_TO: {$reply_to}" . ($error ? " | ERROR: {$error}" : "") . "\n";
        @file_put_contents($logFile, $logEntry, FILE_APPEND | LOCK_EX);
    }
}
