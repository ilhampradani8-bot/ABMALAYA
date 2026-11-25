<?php
/**
 * Matomo HTTP Tracking API Bridge
 * Accepts tracking requests from matomo.js or server beacon
 */

if (!defined('ABM_TRACKER_LOADED') && file_exists(__DIR__ . '/../includes/visitor_tracker.php')) {
    require_once __DIR__ . '/../includes/visitor_tracker.php';
    abm_track_visit($_GET['action_name'] ?? 'page', 'AB Malaya');
}

// Return 1x1 transparent GIF (Standard tracking pixel)
header('Content-Type: image/gif');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
echo base64_decode('R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');
exit;
