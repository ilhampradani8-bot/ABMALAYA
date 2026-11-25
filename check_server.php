<?php
header('Content-Type: application/json');
echo json_encode([
    'php_version' => PHP_VERSION,
    'zip_archive' => class_exists('ZipArchive'),
    'curl_loaded' => extension_loaded('curl'),
    'pdo_mysql' => extension_loaded('pdo_mysql'),
    'memory_limit' => ini_get('memory_limit'),
    'max_execution_time' => ini_get('max_execution_time'),
    'writeable' => is_writable(__DIR__),
    'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? '',
    'uname' => php_uname('s')
]);
