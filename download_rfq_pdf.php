<?php
/**
 * AB Malaya Sdn Bhd - High Precision Vector PDF Download Handler
 * Interfaces frontend Requisition Desk to the ReportLab PDF Engine (HSEMS Attachment 10.1D)
 */

// Disable error output from polluting binary PDF stream
error_reporting(0);
ini_set('display_errors', 0);

require_once __DIR__ . '/db_connect.php';

// Retrieve Payload
$raw_input = file_get_contents('php://input');
$data = null;

if (!empty($raw_input)) {
    $data = json_decode($raw_input, true);
}

if (!$data && !empty($_POST['payload'])) {
    $data = json_decode($_POST['payload'], true);
}

if (!$data && !empty($_POST)) {
    $data = $_POST;
}

// Support GET rfq_id from database
if (!$data && !empty($_GET['rfq_id'])) {
    $rfq_id = trim($_GET['rfq_id']);
    $conn = getFrontendDb();
    if ($conn && !$conn->connect_error) {
        $stmt = $conn->prepare("SELECT payload_json FROM rfq_submissions WHERE rfq_id = ? OR requisition_no = ? LIMIT 1");
        if ($stmt) {
            $stmt->bind_param('ss', $rfq_id, $rfq_id);
            $stmt->execute();
            $res = $stmt->get_result();
            if ($row = $res->fetch_assoc()) {
                $data = json_decode($row['payload_json'], true);
            }
            $stmt->close();
        }
    }
}

// Active Confidentiality Guard: Redact / sanitize any confidential client identifiers (e.g. dutamarine)
function sanitizeConfidentialClientData(&$item) {
    if (is_array($item)) {
        foreach ($item as $k => &$v) {
            sanitizeConfidentialClientData($v);
        }
    } elseif (is_string($item)) {
        if (stripos($item, 'dutamarine') !== false || stripos($item, 'duta marine') !== false || stripos($item, 'duta pacific') !== false) {
            if (strpos($item, '@') !== false) {
                $item = '';
            } else {
                $item = preg_replace('/dutamarine(\.com)?/i', 'abmalaya.com', $item);
                $item = preg_replace('/duta\s*marine/i', 'AB Malaya Marine', $item);
                $item = preg_replace('/duta\s*pacific/i', 'ABM Pacific', $item);
            }
        }
    }
}

// Fallback to empty requisition template if nothing sent
if (!$data || !is_array($data)) {
    $data = [
        'vessel_name'       => '',
        'req_no'            => '',
        'critical_status'   => '',
        'from_dept'         => '',
        'issue_to'          => ['op' => false, 'tech' => false, 'man' => false],
        'date'              => '',
        'ordering_item'     => '',
        'master_name'       => '',
        'sign_date'         => '',
        'items'             => []
    ];
} else {
    sanitizeConfidentialClientData($data);
}

$temp_pdf = tempnam(sys_get_temp_dir(), 'abm_rfq_') . '.pdf';
$engine_script = __DIR__ . '/scripts/pdf_engine.py';

if (!file_exists($engine_script)) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'PDF engine script not found on server.']);
    exit;
}

$descriptors = [
    0 => ["pipe", "r"], // stdin
    1 => ["pipe", "w"], // stdout
    2 => ["pipe", "w"]  // stderr
];

$cmd = "python3 " . escapeshellarg($engine_script) . " - " . escapeshellarg($temp_pdf);
$process = proc_open($cmd, $descriptors, $pipes);

if (!is_resource($process)) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(['status' => 'error', 'message' => 'Failed to initialize PDF generation process.']);
    exit;
}

// Write JSON to stdin
fwrite($pipes[0], json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
fclose($pipes[0]);

$stdout = stream_get_contents($pipes[1]);
fclose($pipes[1]);

$stderr = stream_get_contents($pipes[2]);
fclose($pipes[2]);

$exit_code = proc_close($process);

if ($exit_code !== 0 || !file_exists($temp_pdf) || filesize($temp_pdf) === 0) {
    if (file_exists($temp_pdf)) {
        @unlink($temp_pdf);
    }
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode([
        'status'    => 'error',
        'message'   => 'PDF compilation failed.',
        'stderr'    => $stderr,
        'stdout'    => $stdout,
        'exit_code' => $exit_code
    ]);
    exit;
}

// Clean filename
$vessel = !empty($data['vessel_name']) ? preg_replace('/[^a-zA-Z0-9_\-]/', '_', trim($data['vessel_name'])) : 'BLANK';
$reqNo  = !empty($data['req_no']) ? preg_replace('/[^a-zA-Z0-9_\-]/', '_', trim($data['req_no'])) : 'FORM';
$download_filename = "Requisition_{$reqNo}_{$vessel}.pdf";

// Output Headers for Direct Binary PDF Streaming
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="' . $download_filename . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($temp_pdf));
header('Cache-Control: private, max-age=0, must-revalidate');
header('Pragma: public');

// Stream file to client
readfile($temp_pdf);

// Clean up temporary file
@unlink($temp_pdf);
exit;
