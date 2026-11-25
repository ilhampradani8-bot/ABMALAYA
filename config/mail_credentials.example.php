<?php
/**
 * AB Malaya - Mail Configuration Template (SAFE FOR GITHUB)
 * Copy this file to 'mail_credentials.php' and set your real SMTP credentials.
 * 'mail_credentials.php' is ignored by .gitignore and will NEVER be pushed to GitHub.
 */

return [
    // SMTP Server Settings (Typically cPanel webmail e.g. mail.yourdomain.com)
    'smtp_enabled'   => true,
    'smtp_host'      => 'mail.abmalaya.com',
    'smtp_port'      => 465,                     // 465 for SSL, 587 for TLS, 25 for non-SSL
    'smtp_secure'    => 'ssl',                   // 'ssl' or 'tls' or ''
    'smtp_auth'      => true,
    'smtp_username'  => 'procurement@abmalaya.com', // Your cPanel email account
    'smtp_password'  => 'YOUR_EMAIL_PASSWORD_HERE', // Set in cPanel, NEVER commit to Git!
    
    // Sender Information
    'from_email'     => 'procurement@abmalaya.com',
    'from_name'      => 'AB Malaya Marine Procurement Desk',

    // Delivery & Archival Options
    'bcc_copy_to_sender' => true,                // Automatically delivers a BCC copy to sender mailbox for Sent archive proof
    'fallback_mail'      => true,                // Use PHP native mail() if SMTP connection fails
    'log_delivery'       => true                 // Log all transmissions to data/logs/mail_delivery.log
];
