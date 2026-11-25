<?php
/**
 * Automated Installer for Official Matomo Software Suite on Exabytes Live Server
 */

ini_set('memory_limit', '512M');
set_time_limit(300);
header('Content-Type: application/json');

$root_dir = __DIR__;
$zip_url = 'https://builds.matomo.org/matomo.zip';
$zip_file = $root_dir . '/matomo_download.zip';
$analytics_dir = $root_dir . '/analytics';

$response = [
    'step' => 'init',
    'status' => 'RUNNING'
];

try {
    // 1. Download official Matomo ZIP
    $response['step'] = 'download';
    $ch = curl_init($zip_url);
    $fp = fopen($zip_file, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 180);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)');
    $exec = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    fclose($fp);

    if (!$exec || $http_code !== 200 || filesize($zip_file) < 10000000) {
        throw new Exception("Download failed, size: " . @filesize($zip_file) . ", http_code: " . $http_code);
    }
    $response['download_bytes'] = filesize($zip_file);

    // 2. Extract Matomo ZIP
    $response['step'] = 'extract';
    $zip = new ZipArchive();
    if ($zip->open($zip_file) !== true) {
        throw new Exception("Failed to open zip archive");
    }

    // Extract to temp folder
    $temp_extract = $root_dir . '/matomo_temp_extract';
    if (!is_dir($temp_extract)) {
        @mkdir($temp_extract, 0755, true);
    }
    $zip->extractTo($temp_extract);
    $num_files = $zip->numFiles;
    $zip->close();
    @unlink($zip_file);
    $response['files_extracted'] = $num_files;

    // 3. Move extracted matomo/ contents into analytics/
    $source_dir = $temp_extract . '/matomo';
    if (!is_dir($source_dir)) {
        throw new Exception("matomo directory not found inside zip");
    }

    if (!is_dir($analytics_dir)) {
        @mkdir($analytics_dir, 0755, true);
    }

    function recursive_copy($src, $dst) {
        $dir = opendir($src);
        @mkdir($dst, 0755, true);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    recursive_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    function recursive_rmdir($dir) {
        if (!is_dir($dir)) return;
        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? recursive_rmdir("$dir/$file") : @unlink("$dir/$file");
        }
        @rmdir($dir);
    }

    recursive_copy($source_dir, $analytics_dir);
    recursive_rmdir($temp_extract);

    // 4. Pre-configure config.ini.php for Exabytes MySQL
    $config_dir = $analytics_dir . '/config';
    if (!is_dir($config_dir)) {
        @mkdir($config_dir, 0755, true);
    }

    $config_content = '; <?php exit; ?> DO NOT REMOVE THIS LINE
[database]
host = "localhost"
username = "abmalaya_erpuser"
password = "abmalaya2021"
dbname = "abmalaya_abmalaya_erp"
tables_prefix = "matomo_"
charset = "utf8mb4"
adapter = "PDO\\MYSQL"
type = "InnoDB"
schema = "Mysql"

[General]
salt = "99af0d352a6c0d10b085628d8278ed9c"
trusted_hosts[] = "abmalaya.com"
trusted_hosts[] = "www.abmalaya.com"
trusted_hosts[] = "localhost"
assume_secure_protocol = 1
';
    file_put_contents($config_dir . '/config.ini.php', $config_content);

    $response['status'] = 'SUCCESS';
    $response['message'] = 'Official Matomo 6.0 suite successfully deployed and configured on Exabytes cPanel';

} catch (\Throwable $e) {
    $response['status'] = 'ERROR';
    $response['error'] = $e->getMessage();
    @unlink($zip_file);
    if (isset($temp_extract)) @recursive_rmdir($temp_extract);
}

echo json_encode($response, JSON_PRETTY_PRINT);
