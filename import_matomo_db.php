<?php
/**
 * Import Matomo Schema and Settings to Live Exabytes MySQL
 */

ini_set('memory_limit', '256M');
set_time_limit(180);
header('Content-Type: application/json');

$response = [];

try {
    $mysqli = new mysqli('localhost', 'abmalaya_erpuser', 'abmalaya2021', 'abmalaya_abmalaya_erp');
    if ($mysqli->connect_error) {
        throw new Exception("DB Connect error: " . $mysqli->connect_error);
    }

    $sql_file = __DIR__ . '/matomo_schema.sql';
    if (!file_exists($sql_file)) {
        throw new Exception("matomo_schema.sql not found");
    }

    $sql_content = file_get_contents($sql_file);
    if ($mysqli->multi_query($sql_content)) {
        do {
            if ($result = $mysqli->store_result()) {
                $result->free();
            }
        } while ($mysqli->more_results() && $mysqli->next_result());
    }

    if ($mysqli->error) {
        throw new Exception("SQL execution error: " . $mysqli->error);
    }

    // Verify tables
    $table_count = $mysqli->query("SHOW TABLES LIKE 'matomo_%'")->num_rows;
    $response['tables_created'] = $table_count;

    // Update config.ini.php with full plugins list
    $config_dir = __DIR__ . '/analytics/config';
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

[PluginsInstalled]
PluginsInstalled[] = "Diagnostics"
PluginsInstalled[] = "Login"
PluginsInstalled[] = "CoreAdminHome"
PluginsInstalled[] = "UsersManager"
PluginsInstalled[] = "SitesManager"
PluginsInstalled[] = "Installation"
PluginsInstalled[] = "Monolog"
PluginsInstalled[] = "Intl"
PluginsInstalled[] = "JsTrackerInstallCheck"
PluginsInstalled[] = "CoreVue"
PluginsInstalled[] = "CorePluginsAdmin"
PluginsInstalled[] = "CoreHome"
PluginsInstalled[] = "WebsiteMeasurable"
PluginsInstalled[] = "IntranetMeasurable"
PluginsInstalled[] = "CoreVisualizations"
PluginsInstalled[] = "Proxy"
PluginsInstalled[] = "API"
PluginsInstalled[] = "Widgetize"
PluginsInstalled[] = "Transitions"
PluginsInstalled[] = "LanguagesManager"
PluginsInstalled[] = "Actions"
PluginsInstalled[] = "Dashboard"
PluginsInstalled[] = "MultiSites"
PluginsInstalled[] = "Referrers"
PluginsInstalled[] = "UserLanguage"
PluginsInstalled[] = "DevicesDetection"
PluginsInstalled[] = "Goals"
PluginsInstalled[] = "Ecommerce"
PluginsInstalled[] = "Events"
PluginsInstalled[] = "UserCountry"
PluginsInstalled[] = "GeoIp2"
PluginsInstalled[] = "VisitsSummary"
PluginsInstalled[] = "VisitFrequency"
PluginsInstalled[] = "VisitTime"
PluginsInstalled[] = "VisitorInterest"
PluginsInstalled[] = "RssWidget"
PluginsInstalled[] = "Feedback"
PluginsInstalled[] = "TwoFactorAuth"
PluginsInstalled[] = "CoreUpdater"
PluginsInstalled[] = "CoreConsole"
PluginsInstalled[] = "ScheduledReports"
PluginsInstalled[] = "UserCountryMap"
PluginsInstalled[] = "Live"
PluginsInstalled[] = "PrivacyManager"
PluginsInstalled[] = "ImageGraph"
PluginsInstalled[] = "Annotations"
PluginsInstalled[] = "MobileMessaging"
PluginsInstalled[] = "Overlay"
PluginsInstalled[] = "SegmentEditor"
PluginsInstalled[] = "Insights"
PluginsInstalled[] = "Morpheus"
PluginsInstalled[] = "Contents"
PluginsInstalled[] = "BulkTracking"
PluginsInstalled[] = "Resolution"
PluginsInstalled[] = "DevicePlugins"
PluginsInstalled[] = "Heartbeat"
PluginsInstalled[] = "Marketplace"
PluginsInstalled[] = "ProfessionalServices"
PluginsInstalled[] = "UserId"
PluginsInstalled[] = "CustomJsTracker"
PluginsInstalled[] = "Tour"
PluginsInstalled[] = "PagePerformance"
PluginsInstalled[] = "CustomDimensions"
PluginsInstalled[] = "FeatureFlags"
PluginsInstalled[] = "AIAgents"
PluginsInstalled[] = "BotTracking"
PluginsInstalled[] = "AIProviders"
PluginsInstalled[] = "TrackingSpamPrevention"

[TrackingSpamPrevention]
block_cloud_sync_throw_exception_on_error = 0
';
    file_put_contents($config_dir . '/config.ini.php', $config_content);

    $response['status'] = 'SUCCESS';
    $response['message'] = 'Database schema imported and config.ini.php written';

} catch (\Throwable $e) {
    $response['status'] = 'ERROR';
    $response['error'] = $e->getMessage();
}

echo json_encode($response, JSON_PRETTY_PRINT);
