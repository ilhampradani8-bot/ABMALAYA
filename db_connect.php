<?php
/**
 * AB Malaya Sdn Bhd - Official Database Configuration & Connection
 * Stored securely for GitHub deployment and production cPanel execution.
 */

date_default_timezone_set('Asia/Kuala_Lumpur');

// ── Environment Credentials Definition ──────────────────────────────────────
if (!defined('CPANEL_DB_HOST')) define('CPANEL_DB_HOST', 'localhost');
if (!defined('CPANEL_DB_USER')) define('CPANEL_DB_USER', 'abmalaya_erpuser');
if (!defined('CPANEL_DB_PASS_1')) define('CPANEL_DB_PASS_1', 'abmalaya2021');
if (!defined('CPANEL_DB_PASS_2')) define('CPANEL_DB_PASS_2', 'Abmalaya2021');
if (!defined('CPANEL_DB_NAME_FRONTEND')) define('CPANEL_DB_NAME_FRONTEND', 'abmalaya_frontend');
if (!defined('CPANEL_DB_NAME_ERP')) define('CPANEL_DB_NAME_ERP', 'abmalaya_abmalaya_erp');

// Local UTM Workstation Settings
if (!defined('LOCAL_DB_HOST')) define('LOCAL_DB_HOST', '127.0.0.1');
if (!defined('LOCAL_DB_USER')) define('LOCAL_DB_USER', 'root');
if (!defined('LOCAL_DB_PASS')) define('LOCAL_DB_PASS', 'root');
if (!defined('LOCAL_DB_NAME_FRONTEND')) define('LOCAL_DB_NAME_FRONTEND', 'abmalaya_frontend');
if (!defined('LOCAL_DB_NAME_ERP')) define('LOCAL_DB_NAME_ERP', 'abmalaya_erp');

/**
 * Returns active MySQLi connection based on current environment
 */
function getFrontendDb() {
    static $conn = null;
    if ($conn !== null) return $conn;

    $is_cpanel = (strpos(__DIR__, '/home/abmalaya') !== false) || 
                 (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'abmalaya.com') !== false);

    try {
        @mysqli_report(MYSQLI_REPORT_OFF);

        if ($is_cpanel) {
            // 1. Try dedicated frontend database on cPanel
            $conn = @new mysqli(CPANEL_DB_HOST, CPANEL_DB_USER, CPANEL_DB_PASS_1, CPANEL_DB_NAME_FRONTEND, 3306);
            if ($conn->connect_error || !$conn) {
                $conn = @new mysqli(CPANEL_DB_HOST, CPANEL_DB_USER, CPANEL_DB_PASS_2, CPANEL_DB_NAME_FRONTEND, 3306);
            }
            // 2. Fallback to shared ERP database on cPanel
            if ($conn->connect_error || !$conn) {
                $conn = @new mysqli(CPANEL_DB_HOST, CPANEL_DB_USER, CPANEL_DB_PASS_1, CPANEL_DB_NAME_ERP, 3306);
                if ($conn->connect_error || !$conn) {
                    $conn = @new mysqli(CPANEL_DB_HOST, CPANEL_DB_USER, CPANEL_DB_PASS_2, CPANEL_DB_NAME_ERP, 3306);
                }
            }
        } else {
            // Local UTM Workstation: Dedicated frontend database
            $socket = file_exists('/run/mysqld/mysqld.sock') ? '/run/mysqld/mysqld.sock' : (file_exists('/var/run/mysqld/mysqld.sock') ? '/var/run/mysqld/mysqld.sock' : null);
            $conn = @new mysqli(LOCAL_DB_HOST, LOCAL_DB_USER, LOCAL_DB_PASS, LOCAL_DB_NAME_FRONTEND, 3306, $socket);
            
            // Fallback to local ERP database if abmalaya_frontend not found
            if ($conn->connect_error || !$conn) {
                $conn = @new mysqli(LOCAL_DB_HOST, LOCAL_DB_USER, LOCAL_DB_PASS, LOCAL_DB_NAME_ERP, 3306, $socket);
            }
        }

        if ($conn && !$conn->connect_error) {
            @$conn->set_charset('utf8mb4');
            @$conn->query("SET time_zone = '+08:00'");
        }
    } catch (\Throwable $e) {
        $conn = null;
    }

    return $conn;
}
