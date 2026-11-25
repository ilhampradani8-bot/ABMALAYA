<?php
/**
 * AB Malaya Sdn Bhd - Official Visitor Telemetry & Audit Journal
 * Interface: Authentic Classic Windows 95 Retro UI (Strictly Non-AI, 100% Vintage Win95)
 * 
 * Features:
 * - Breakdown per Tanggal dan Jam (Hourly 00:00 - 23:00 & Daily)
 * - Breakdown per Perangkat (Desktop, Mobile HP, Tablet, OS)
 * - Breakdown per IP Address (Masked/Raw Toggle, Hits, Location/ISP)
 * - Jurnal Kunjungan per Tanggal dan per Bulan dengan Filter
 * - Grafik Retro Interaktif (Chart.js dengan palet Windows 95 Klasik)
 * - Open-Source 98.css framework terintegrasi lokal
 * - Mode HP (Mobile Responsive) & Desktop Windowing
 */

require_once __DIR__ . '/includes/visitor_tracker.php';

// JSON API Endpoint for Live Polling
if (isset($_GET['format']) && $_GET['format'] === 'json') {
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    echo json_encode(abm_get_visitor_data());
    exit;
}

// Track view of the dashboard itself
abm_track_visit('visitors', 'Visitor Telemetry Desk');
$data = abm_get_visitor_data();

$summary = $data['summary'] ?? [];
$hourly = $data['hourly_distribution'] ?? array_fill(0, 24, 0);
$journal = $data['journal'] ?? [];
$per_ip = $data['per_ip'] ?? [];
$pages = $data['pages'] ?? [];
$devices = $data['devices'] ?? [];
$os_dist = $data['os'] ?? [];
$browsers = $data['browsers'] ?? [];
$recent = $data['recent_visits'] ?? [];

// Available months in journal
$months = array_keys($journal);
rsort($months);
$selected_month = $_GET['month'] ?? ($months[0] ?? date('Y-m'));

// Days in selected month
$days_data = $journal[$selected_month] ?? [];
krsort($days_data);
$selected_day = $_GET['day'] ?? 'all';

// Filter days if specific day selected
if ($selected_day !== 'all' && isset($days_data[$selected_day])) {
    $filtered_days = [$selected_day => $days_data[$selected_day]];
} else {
    $filtered_days = $days_data;
}

// Sort IPs by hits descending
uasort($per_ip, function($a, $b) {
    return ($b['hits'] ?? 0) <=> ($a['hits'] ?? 0);
});

// Calculate Max Hits for hourly chart
$max_hourly = max(1, max($hourly));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>AB Malaya - Visitor Telemetry & Audit Journal [v4.1.95]</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/webp" href="/assets/img/logo-abmalaya.webp">

    <!-- Open Source 98.css (Local with CDN fallback) -->
    <link rel="stylesheet" href="/assets/css/98.css">
    <!-- FontAwesome for classic tool icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Chart.js (Local cached open-source library) -->
    <script src="/assets/js/chart.min.js"></script>

    <style>
        /* ═══════════════════════════════════════════════════════════════════
           WINDOWS 95 AUTHENTIC DESIGN SYSTEM (STRICT RETRO SPECIFICATION)
           ═══════════════════════════════════════════════════════════════════ */
        :root {
            --win-teal: #008080;
            --win-silver: #c0c0c0;
            --win-dark-silver: #808080;
            --win-white: #ffffff;
            --win-black: #000000;
            --win-navy: #000080;
            --win-active-blue: #1084d0;
            --win-yellow: #ffff00;
            --win-green: #008000;
            --win-maroon: #800000;
        }

        * {
            box-sizing: border-box;
            border-radius: 0 !important; /* STRICTLY 0px BORDER RADIUS - NO MODERN ROUNDNESS */
        }

        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            min-height: 100vh;
            background-color: var(--win-teal);
            font-family: 'MS Sans Serif', Tahoma, 'Segoe UI', Arial, sans-serif;
            font-size: 11px;
            color: var(--win-black);
            overflow-x: hidden;
            user-select: text;
        }

        /* Desktop Environment Container */
        .win95-desktop {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            padding-bottom: 34px; /* Space for Taskbar */
        }

        /* Desktop Shortcuts Column (Left Side) */
        .desktop-icons-area {
            position: absolute;
            top: 14px;
            left: 14px;
            display: flex;
            flex-direction: column;
            gap: 18px;
            z-index: 1;
        }

        .desktop-icon-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 72px;
            text-decoration: none;
            color: #ffffff;
            background: transparent;
            border: 1px dotted transparent;
            padding: 4px;
            cursor: pointer;
            text-align: center;
        }

        .desktop-icon-btn:focus,
        .desktop-icon-btn:hover {
            border: 1px dotted #ffffff;
            background-color: rgba(0, 0, 128, 0.4);
        }

        .desktop-icon-btn i {
            font-size: 24px;
            margin-bottom: 4px;
            filter: drop-shadow(1px 1px 0 #000000);
        }

        .desktop-icon-btn span {
            font-size: 10px;
            color: #ffffff;
            text-shadow: 1px 1px 1px #000000;
            line-height: 1.1;
        }

        /* Main Application Window Container */
        .win95-app-container {
            max-width: 1100px;
            width: 96%;
            margin: 20px auto;
            position: relative;
            z-index: 5;
        }

        .window {
            background: var(--win-silver);
            box-shadow: 
                inset -1px -1px #000000,
                inset 1px 1px #ffffff,
                inset -2px -2px #808080,
                inset 2px 2px #dfdfdf;
            padding: 3px;
        }

        /* Window Title Bar */
        .title-bar {
            background: linear-gradient(90deg, var(--win-navy) 0%, var(--win-active-blue) 100%);
            padding: 3px 4px 3px 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #ffffff;
            font-weight: 700;
            font-size: 11px;
            letter-spacing: 0.5px;
        }

        .title-bar-left {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .title-bar-icon {
            font-size: 12px;
            color: var(--win-yellow);
        }

        /* Classic Menu Bar */
        .win95-menu-bar {
            display: flex;
            gap: 12px;
            padding: 4px 8px;
            border-bottom: 1px solid var(--win-dark-silver);
            margin-bottom: 6px;
            background: var(--win-silver);
            font-size: 11px;
        }

        .menu-item {
            color: var(--win-black);
            text-decoration: none;
            padding: 1px 4px;
            cursor: pointer;
        }

        .menu-item:hover {
            background: var(--win-navy);
            color: #ffffff;
        }

        .menu-item u {
            text-decoration: underline;
        }

        /* Tab Control (98.css compatible) */
        menu[role="tablist"] {
            display: flex;
            list-style-type: none;
            margin: 6px 0 -2px 0;
            padding-left: 4px;
            position: relative;
            z-index: 2;
            flex-wrap: wrap;
            gap: 2px;
        }

        menu[role="tablist"] > li {
            background-color: var(--win-silver);
            box-shadow: 
                inset -1px 0 #000000,
                inset 1px 1px #dfdfdf,
                inset -2px 0 #808080,
                inset 2px 2px #ffffff;
            border-top-left-radius: 3px;
            border-top-right-radius: 3px;
            cursor: pointer;
            padding: 0;
        }

        menu[role="tablist"] > li.active,
        menu[role="tablist"] > li[aria-selected="true"] {
            margin-top: -2px;
            padding-bottom: 2px;
            z-index: 8;
            background-color: var(--win-silver);
            box-shadow: 
                inset -1px 0 #000000,
                inset 1px 1px #ffffff,
                inset -2px 0 #808080,
                inset 2px 2px #dfdfdf;
        }

        menu[role="tablist"] > li > button {
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            color: #000000 !important;
            font-weight: 700;
            padding: 5px 12px;
            cursor: pointer;
            font-size: 11px;
            display: flex;
            align-items: center;
            gap: 5px;
            min-height: auto;
            min-width: auto;
        }

        /* Tab Content Panel */
        .window[role="tabpanel"] {
            position: relative;
            z-index: 1;
            padding: 12px;
            background: var(--win-silver);
            border: 2px solid;
            border-color: #ffffff #000000 #000000 #ffffff;
            box-shadow: inset 1px 1px 0 #dfdfdf, inset -1px -1px 0 #808080;
        }

        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;
        }

        /* Fieldset & Sunken Panels */
        fieldset {
            border: 2px groove #ffffff;
            padding: 10px 12px;
            margin-bottom: 12px;
            background: transparent;
        }

        legend {
            font-weight: 700;
            color: var(--win-navy);
            padding: 0 4px;
        }

        .sunken-panel {
            background: #ffffff;
            box-shadow: 
                inset -1px -1px #ffffff,
                inset 1px 1px #808080,
                inset -2px -2px #dfdfdf,
                inset 2px 2px #000000;
            padding: 8px;
            overflow: auto;
        }

        /* ── RETRO 7-SEGMENT / PIXEL COUNTER BOXES ──────────────────────────── */
        .retro-stats-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin-bottom: 12px;
        }

        .retro-stat-box {
            background: var(--win-silver);
            border: 2px solid;
            border-color: #808080 #ffffff #ffffff #808080;
            box-shadow: inset 1px 1px 0 #000000, inset -1px -1px 0 #dfdfdf;
            padding: 8px;
            text-align: center;
        }

        .stat-label-win {
            font-size: 10px;
            font-weight: 700;
            color: var(--win-dark-silver);
            text-transform: uppercase;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 4px;
        }

        .stat-lcd-display {
            background: #000000;
            color: #00ff00; /* Classic CRT Phosphor Green */
            font-family: 'Courier New', 'Lucida Console', monospace;
            font-size: 22px;
            font-weight: 900;
            letter-spacing: 2px;
            padding: 4px 6px;
            border: 2px inset #ffffff;
            box-shadow: inset 0 0 8px rgba(0, 255, 0, 0.4);
            margin-bottom: 4px;
        }

        .stat-lcd-display.red {
            color: #ff3333;
            box-shadow: inset 0 0 8px rgba(255, 0, 0, 0.4);
        }

        .stat-lcd-display.amber {
            color: #ffbb00;
            box-shadow: inset 0 0 8px rgba(255, 187, 0, 0.4);
        }

        .stat-sub-info {
            font-size: 9px;
            color: #444444;
        }

        /* ── RETRO TABLES (DATA GRIDS) ──────────────────────────────────────── */
        .retro-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 11px;
            background: #ffffff;
        }

        .retro-table th {
            background: var(--win-silver);
            box-shadow: 
                inset -1px -1px #000000,
                inset 1px 1px #ffffff,
                inset -2px -2px #808080,
                inset 2px 2px #dfdfdf;
            padding: 4px 8px;
            font-weight: 700;
            text-align: left;
            position: sticky;
            top: 0;
            z-index: 2;
            cursor: pointer;
            user-select: none;
        }

        .retro-table th:active {
            box-shadow: 
                inset 1px 1px #000000,
                inset -1px -1px #ffffff,
                inset 2px 2px #808080,
                inset -2px -2px #dfdfdf;
        }

        .retro-table td {
            padding: 4px 8px;
            border-bottom: 1px solid #e5e5e5;
            white-space: nowrap;
        }

        .retro-table tr:nth-child(even) td {
            background-color: #f7f7f7;
        }

        .retro-table tr:hover td {
            background-color: var(--win-navy);
            color: #ffffff;
        }

        .retro-table tr:hover td a {
            color: #ffffff;
        }

        /* ── WINDOWS 95 RETRO BUTTONS ───────────────────────────────────────── */
        button, .btn-win95 {
            background: var(--win-silver);
            border: none;
            box-shadow: 
                inset -1px -1px #000000,
                inset 1px 1px #ffffff,
                inset -2px -2px #808080,
                inset 2px 2px #dfdfdf;
            padding: 4px 12px;
            font-family: inherit;
            font-size: 11px;
            color: #000000;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
        }

        button:active, .btn-win95:active {
            box-shadow: 
                inset 1px 1px #000000,
                inset -1px -1px #ffffff,
                inset 2px 2px #808080,
                inset -2px -2px #dfdfdf;
            padding: 5px 11px 3px 13px;
        }

        button:focus {
            outline: 1px dotted #000000;
            outline-offset: -3px;
        }

        /* Status Bar at Window Bottom */
        .status-bar {
            display: flex;
            gap: 2px;
            margin-top: 6px;
        }

        .status-bar-field {
            background: var(--win-silver);
            box-shadow: 
                inset -1px -1px #dfdfdf,
                inset 1px 1px #808080;
            padding: 2px 6px;
            font-size: 10px;
            color: #222222;
            flex: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* ── RETRO WINDOWS 95 TASKBAR (BOTTOM OF SCREEN) ────────────────────── */
        .win95-taskbar {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30px;
            background: var(--win-silver);
            border-top: 2px solid #ffffff;
            box-shadow: 0 -1px 0 #dfdfdf;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2px 4px;
            z-index: 1000;
        }

        .taskbar-left {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .start-btn {
            font-weight: 900;
            font-size: 11px;
            padding: 3px 8px;
            display: flex;
            align-items: center;
            gap: 4px;
            height: 24px;
        }

        .start-flag-logo {
            width: 14px;
            height: 14px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1px;
        }

        .flag-piece { width: 6px; height: 6px; }
        .flag-red { background: #ff3333; }
        .flag-green { background: #33cc33; }
        .flag-blue { background: #3366ff; }
        .flag-yellow { background: #ffcc00; }

        .taskbar-app-btn {
            background: var(--win-silver);
            box-shadow: 
                inset 1px 1px #000000,
                inset -1px -1px #ffffff,
                inset 2px 2px #808080,
                inset -2px -2px #dfdfdf;
            font-weight: 700;
            height: 24px;
            padding: 2px 10px;
            display: flex;
            align-items: center;
            gap: 6px;
            max-width: 220px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            font-size: 11px;
        }

        .taskbar-tray {
            display: flex;
            align-items: center;
            gap: 8px;
            box-shadow: 
                inset -1px -1px #ffffff,
                inset 1px 1px #808080;
            padding: 2px 8px;
            height: 22px;
            font-size: 11px;
            font-family: 'Space Mono', monospace;
        }

        .tray-icon {
            font-size: 11px;
            color: #333333;
        }

        /* Filter Controls Bar */
        .filter-toolbar {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 10px;
            background: var(--win-silver);
            padding: 6px;
            border: 1px solid var(--win-dark-silver);
        }

        select, input[type="text"] {
            background: #ffffff;
            border: 2px inset #ffffff;
            box-shadow: inset 1px 1px 0 #000000;
            padding: 3px 6px;
            font-family: inherit;
            font-size: 11px;
            outline: none;
        }

        /* ── CHARTS CONTAINER RETRO PALETTE ─────────────────────────────────── */
        .charts-grid-win {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 12px;
        }

        .chart-box-win {
            background: #ffffff;
            border: 2px inset #ffffff;
            box-shadow: inset 1px 1px 0 #000000;
            padding: 10px;
            position: relative;
        }

        .chart-box-title {
            font-weight: 700;
            color: var(--win-navy);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 11px;
            border-bottom: 1px solid #cccccc;
            padding-bottom: 4px;
        }

        /* ── MOBILE RESPONSIVENESS (MODE HP SCREEN 360px - 768px) ───────────── */
        @media (max-width: 768px) {
            .desktop-icons-area {
                display: none; /* Hide desktop icons on mobile to give window 100% space */
            }

            .win95-app-container {
                width: 100%;
                margin: 0;
                padding: 4px 4px 40px 4px;
            }

            .retro-stats-row {
                grid-template-columns: repeat(2, 1fr);
                gap: 6px;
            }

            .stat-lcd-display {
                font-size: 18px;
                padding: 3px 4px;
            }

            .charts-grid-win {
                grid-template-columns: 1fr;
            }

            menu[role="tablist"] {
                flex-wrap: nowrap;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                padding-bottom: 2px;
            }

            menu[role="tablist"] > li > button {
                padding: 4px 8px;
                font-size: 10px;
                white-space: nowrap;
            }

            .filter-toolbar {
                flex-direction: column;
                align-items: stretch;
                gap: 6px;
            }

            .filter-toolbar select,
            .filter-toolbar button {
                width: 100%;
            }

            .win95-taskbar {
                height: 28px;
            }

            .taskbar-app-btn {
                max-width: 140px;
                font-size: 10px;
            }

            .status-bar {
                flex-direction: column;
                gap: 2px;
            }
        }
    </style>
</head>
<body>

    <div class="win95-desktop">

        <!-- ── RETRO DESKTOP SHORTCUT ICONS (LEFT SIDEBAR) ──────────────────── -->
        <div class="desktop-icons-area">
            <a href="/" class="desktop-icon-btn" title="Kembali ke Website Resmi">
                <i class="fas fa-ship" style="color: #66ccff;"></i>
                <span>AB Malaya Official</span>
            </a>
            <div class="desktop-icon-btn" onclick="switchWinTab('tab-journal')" title="Buka Jurnal Kunjungan">
                <i class="fas fa-book" style="color: #ffff66;"></i>
                <span>Audit Journal</span>
            </div>
            <div class="desktop-icon-btn" onclick="switchWinTab('tab-charts')" title="Buka Grafik Trafik">
                <i class="fas fa-chart-line" style="color: #66ff66;"></i>
                <span>Traffic Charts</span>
            </div>
            <div class="desktop-icon-btn" onclick="switchWinTab('tab-ip')" title="Log IP & Perangkat">
                <i class="fas fa-network-wired" style="color: #ff9966;"></i>
                <span>IP Telemetry</span>
            </div>
            <a href="/analytics/" target="_blank" class="desktop-icon-btn" title="Buka Matomo Enterprise Analytics Suite (Full PHP)">
                <i class="fas fa-chart-pie" style="color: #ff66cc;"></i>
                <span>Matomo.exe</span>
            </a>
            <div class="desktop-icon-btn" onclick="location.reload()" title="Refresh Dashboard (F5)">
                <i class="fas fa-arrows-rotate" style="color: #ffffff;"></i>
                <span>Refresh.exe</span>
            </div>
            <a href="/analytics/" target="_blank" class="desktop-icon-btn" title="Buka Official Matomo Analytics Suite (Full PHP)">
                <i class="fas fa-chart-pie" style="color: #ff66cc;"></i>
                <span>Matomo.exe</span>
            </a>
        </div>

        <!-- ── MAIN RETRO APPLICATION WINDOW ───────────────────────────────── -->
        <div class="win95-app-container">
            <div class="window">
                
                <!-- Classic Title Bar -->
                <div class="title-bar">
                    <div class="title-bar-left">
                        <i class="fas fa-chart-column title-bar-icon"></i>
                        <span class="title-bar-text">AB Malaya - Visitor Telemetry & Audit Journal [v4.1.95]</span>
                    </div>
                    <div class="title-bar-controls">
                        <button aria-label="Minimize" onclick="alert('Program minimized to taskbar.')"></button>
                        <button aria-label="Maximize" onclick="toggleMaximize()"></button>
                        <button aria-label="Close" onclick="window.location.href='/'"></button>
                    </div>
                </div>

                <!-- Classic Menu Bar -->
                <div class="win95-menu-bar">
                    <span class="menu-item" onclick="window.location.href='/'"><u>F</u>ile</span>
                    <span class="menu-item" onclick="switchWinTab('tab-journal')"><u>J</u>ournal</span>
                    <span class="menu-item" onclick="switchWinTab('tab-charts')"><u>C</u>harts</span>
                    <span class="menu-item" onclick="switchWinTab('tab-ip')"><u>I</u>P Log</span>
                    <span class="menu-item" onclick="exportJournalCsv()"><u>E</u>xport CSV</span>
                    <span class="menu-item" onclick="window.open('/analytics/', '_blank')"><u>M</u>atomo Suite</span>
                    <span class="menu-item" onclick="showAboutDialog()"><u>H</u>elp</span>
                </div>

                <!-- Classic Win95 Tab Controls -->
                <menu role="tablist">
                    <li role="tab" id="pill-overview" class="active" onclick="switchWinTab('tab-overview')">
                        <button type="button"><i class="fas fa-desktop"></i> Overview</button>
                    </li>
                    <li role="tab" id="pill-charts" onclick="switchWinTab('tab-charts')">
                        <button type="button"><i class="fas fa-chart-simple"></i> Grafik Trafik</button>
                    </li>
                    <li role="tab" id="pill-journal" onclick="switchWinTab('tab-journal')">
                        <button type="button"><i class="fas fa-calendar-days"></i> Jurnal Per Tanggal & Bulan</button>
                    </li>
                    <li role="tab" id="pill-ip" onclick="switchWinTab('tab-ip')">
                        <button type="button"><i class="fas fa-network-wired"></i> Log Perangkat & IP</button>
                    </li>
                    <li role="tab" id="pill-live" onclick="switchWinTab('tab-live')">
                        <button type="button"><i class="fas fa-satellite-dish"></i> Live Feed</button>
                    </li>
                </menu>

                <!-- ═══════════════════════════════════════════════════════════ -->
                <!-- TAB 1: SYSTEM OVERVIEW & RETRO DIGITAL COUNTERS             -->
                <!-- ═══════════════════════════════════════════════════════════ -->
                <div class="window tab-pane active" id="tab-overview" role="tabpanel">
                    
                    <fieldset>
                        <legend>📊 Real-Time Digital Counters (CRT Phosphor Display)</legend>
                        <div class="retro-stats-row">
                            <!-- Total Hits -->
                            <div class="retro-stat-box">
                                <div class="stat-label-win"><i class="fas fa-eye"></i> Total Hits</div>
                                <div class="stat-lcd-display" id="disp-total-views">
                                    <?php echo sprintf('%06d', $summary['total_views'] ?? 0); ?>
                                </div>
                                <div class="stat-sub-info">All-Time Impressions</div>
                            </div>

                            <!-- Unique Visitors -->
                            <div class="retro-stat-box">
                                <div class="stat-label-win"><i class="fas fa-user-check"></i> Unique Visitors</div>
                                <div class="stat-lcd-display red" id="disp-total-uniques">
                                    <?php echo sprintf('%06d', $summary['total_uniques'] ?? 0); ?>
                                </div>
                                <div class="stat-sub-info">Distinct Client IPs</div>
                            </div>

                            <!-- Today Views -->
                            <div class="retro-stat-box">
                                <div class="stat-label-win"><i class="fas fa-calendar-day"></i> Today Hits</div>
                                <div class="stat-lcd-display amber" id="disp-today-views">
                                    <?php echo sprintf('%06d', $summary['today_views'] ?? 0); ?>
                                </div>
                                <div class="stat-sub-info"><?php echo $summary['today_uniques'] ?? 0; ?> Uniques Today</div>
                            </div>

                            <!-- Active Now -->
                            <div class="retro-stat-box">
                                <div class="stat-label-win"><i class="fas fa-bolt"></i> Active Sessions</div>
                                <div class="stat-lcd-display" id="disp-active-now">
                                    <?php echo sprintf('%02d SESS', $summary['active_now'] ?? 1); ?>
                                </div>
                                <div class="stat-sub-info">Past 15 Minutes</div>
                            </div>
                        </div>
                    </fieldset>

                    <!-- Quick Summary & Link Strip -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 8px;">
                        
                        <fieldset>
                            <legend>📂 Most Visited Portals</legend>
                            <div class="sunken-panel" style="height: 140px;">
                                <table class="retro-table">
                                    <thead>
                                        <tr>
                                            <th>Portal Page</th>
                                            <th style="text-align: right;">Hits</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pages as $pname => $pcount): ?>
                                            <tr>
                                                <td><i class="fas fa-file-lines" style="margin-right: 4px; color: #808080;"></i> <?php echo htmlspecialchars($pname); ?></td>
                                                <td style="text-align: right; font-weight: 700; font-family: 'Space Mono', monospace;"><?php echo number_format($pcount); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend>⚙️ Client Hardware & OS Distribution</legend>
                            <div class="sunken-panel" style="height: 140px;">
                                <table class="retro-table">
                                    <thead>
                                        <tr>
                                            <th>Environment</th>
                                            <th style="text-align: right;">Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($devices as $dname => $dcount): ?>
                                            <tr>
                                                <td><strong>Perangkat:</strong> <?php echo htmlspecialchars($dname); ?></td>
                                                <td style="text-align: right; font-weight: 700; font-family: 'Space Mono', monospace;"><?php echo number_format($dcount); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <?php foreach (array_slice($os_dist, 0, 4) as $os_name => $os_count): ?>
                                            <tr>
                                                <td><strong>OS:</strong> <?php echo htmlspecialchars($os_name); ?></td>
                                                <td style="text-align: right; font-weight: 700; font-family: 'Space Mono', monospace;"><?php echo number_format($os_count); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>

                    </div>

                    <!-- Action Bar -->
                    <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px; margin-top: 6px;">
                        <div>
                            <span style="font-size: 10px; color: #444444;">
                                <i class="fas fa-info-circle"></i> Standalone URL: <code>abmalaya.com/visitors</code>
                            </span>
                        </div>
                        <div style="display: flex; gap: 6px;">
                            <button type="button" onclick="copyShareableUrl()"><i class="fas fa-copy"></i> Salin Link</button>
                            <button type="button" onclick="location.reload()"><i class="fas fa-rotate"></i> Refresh Telemetry</button>
                            <a href="/" class="btn-win95" style="color: #000080; font-weight: 700;"><i class="fas fa-arrow-left"></i> Kembali ke Website</a>
                        </div>
                    </div>

                </div>

                <!-- ═══════════════════════════════════════════════════════════ -->
                <!-- TAB 2: GRAFIK TRAFIK (RETRO CHARTS - PER JAM & HARIAN)      -->
                <!-- ═══════════════════════════════════════════════════════════ -->
                <div class="window tab-pane" id="tab-charts" role="tabpanel">
                    
                    <div class="charts-grid-win">
                        <!-- Chart 1: Hourly Breakdown (00:00 - 23:00) -->
                        <div class="chart-box-win">
                            <div class="chart-box-title">
                                <span><i class="fas fa-clock"></i> Distribusi Kunjungan Per Jam (24 Jam WIB/MYT)</span>
                                <span style="font-size: 9px; color: #666;">00:00 - 23:00</span>
                            </div>
                            <div style="height: 220px; position: relative;">
                                <canvas id="chartHourly"></canvas>
                            </div>
                        </div>

                        <!-- Chart 2: Daily Trend (15 Days) -->
                        <div class="chart-box-win">
                            <div class="chart-box-title">
                                <span><i class="fas fa-calendar-week"></i> Tren Kunjungan Harian (15 Hari Terakhir)</span>
                                <span style="font-size: 9px; color: #666;">Hits vs Uniques</span>
                            </div>
                            <div style="height: 220px; position: relative;">
                                <canvas id="chartDaily"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Chart 3: Device & Platform Share -->
                    <div class="chart-box-win">
                        <div class="chart-box-title">
                            <span><i class="fas fa-pie-chart"></i> Pembagian Perangkat (Desktop vs Mobile HP vs Tablet)</span>
                            <span style="font-size: 9px; color: #666;">Client Hardware Share</span>
                        </div>
                        <div style="height: 180px; position: relative;">
                            <canvas id="chartDevices"></canvas>
                        </div>
                    </div>

                </div>

                <!-- ═══════════════════════════════════════════════════════════ -->
                <!-- TAB 3: JURNAL KUNJUNGAN PER TANGGAL & PER BULAN             -->
                <!-- ═══════════════════════════════════════════════════════════ -->
                <div class="window tab-pane" id="tab-journal" role="tabpanel">
                    
                    <!-- Filter Toolbar -->
                    <form method="GET" action="/visitors.php" class="filter-toolbar">
                        <input type="hidden" name="tab" value="journal">
                        
                        <div style="display: flex; align-items: center; gap: 5px;">
                            <label><strong>Pilih Bulan:</strong></label>
                            <select name="month" onchange="this.form.submit()">
                                <?php foreach ($months as $m): ?>
                                    <option value="<?php echo $m; ?>" <?php echo $m === $selected_month ? 'selected' : ''; ?>>
                                        <?php echo date('F Y', strtotime($m . '-01')); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div style="display: flex; align-items: center; gap: 5px;">
                            <label><strong>Pilih Tanggal:</strong></label>
                            <select name="day" onchange="this.form.submit()">
                                <option value="all">-- Semua Tanggal (Ringkasan Bulanan) --</option>
                                <?php foreach (array_keys($days_data) as $d): ?>
                                    <option value="<?php echo $d; ?>" <?php echo $d === $selected_day ? 'selected' : ''; ?>>
                                        <?php echo date('d M Y (l)', strtotime($d)); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div style="display: flex; gap: 6px; margin-left: auto;">
                            <button type="submit"><i class="fas fa-filter"></i> Terapkan Filter</button>
                            <a href="/visitors.php" class="btn-win95"><i class="fas fa-rotate-left"></i> Reset</a>
                            <button type="button" onclick="exportJournalCsv()"><i class="fas fa-file-excel"></i> Ekspor CSV</button>
                        </div>
                    </form>

                    <!-- Journal Table Sunken Panel -->
                    <div class="sunken-panel" style="max-height: 380px;">
                        <table class="retro-table" id="journal-data-table">
                            <thead>
                                <tr>
                                    <th>Tanggal (WIB / MYT)</th>
                                    <th style="text-align: right;">Total Kunjungan</th>
                                    <th style="text-align: right;">Pengunjung Unik</th>
                                    <th style="text-align: center;">Jam Puncak (Peak Hour)</th>
                                    <th>Perangkat Dominan</th>
                                    <th>Halaman Terpopuler</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($filtered_days)): ?>
                                    <tr>
                                        <td colspan="7" style="text-align: center; padding: 20px; color: #808080;">
                                            Belum ada catatan log jurnal untuk periode ini.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($filtered_days as $day_k => $day_info): 
                                        $h_arr = $day_info['hourly'] ?? array_fill(0, 24, 0);
                                        $peak_h = array_search(max($h_arr), $h_arr);
                                        $peak_str = sprintf('%02d:00 - %02d:59', $peak_h, $peak_h);
                                        
                                        $d_dev = $day_info['devices'] ?? [];
                                        arsort($d_dev);
                                        $main_dev = key($d_dev) ?: 'Desktop';
                                    ?>
                                        <tr>
                                            <td>
                                                <i class="far fa-calendar-check" style="margin-right: 5px; color: var(--win-navy);"></i>
                                                <strong><?php echo date('d M Y (D)', strtotime($day_k)); ?></strong>
                                            </td>
                                            <td style="text-align: right; font-weight: 700; font-family: 'Space Mono', monospace; color: var(--win-navy);">
                                                <?php echo number_format($day_info['views'] ?? 0); ?> hits
                                            </td>
                                            <td style="text-align: right; font-weight: 700; font-family: 'Space Mono', monospace; color: var(--win-green);">
                                                <?php echo number_format($day_info['uniques'] ?? 0); ?> uniques
                                            </td>
                                            <td style="text-align: center; font-family: 'Space Mono', monospace;">
                                                <span style="background: #ffffcc; border: 1px solid #cccc99; padding: 1px 4px;">
                                                    <?php echo $peak_str; ?>
                                                </span>
                                            </td>
                                            <td>
                                                <i class="fas fa-<?php echo strtolower($main_dev) === 'mobile' ? 'mobile-screen' : 'desktop'; ?>"></i>
                                                <?php echo $main_dev; ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($day_info['top_page'] ?? 'Home Page'); ?></td>
                                            <td style="text-align: center;">
                                                <button type="button" style="padding: 1px 6px; font-size: 10px;" onclick="viewDayHourly('<?php echo $day_k; ?>')">
                                                    Lihat Jam
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div style="font-size: 10px; color: #444444; margin-top: 6px;">
                        * Jurnal otomatis dirotasi dan disimpan secara persisten per hari & per bulan ke <code>data/visitor_counter.json</code>.
                    </div>

                </div>

                <!-- ═══════════════════════════════════════════════════════════ -->
                <!-- TAB 4: LOG PERANGKAT & IP ADDRESS                           -->
                <!-- ═══════════════════════════════════════════════════════════ -->
                <div class="window tab-pane" id="tab-ip" role="tabpanel">
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px; flex-wrap: wrap; gap: 8px;">
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <label><strong>Cari IP / Kota:</strong></label>
                            <input type="text" id="ip-filter-input" placeholder="Ketik IP atau lokasi..." onkeyup="filterIpTable(this.value)">
                        </div>
                        <div style="display: flex; gap: 6px;">
                            <button type="button" id="btn-toggle-raw-ip" onclick="toggleRawIp()">
                                <i class="fas fa-shield-halved"></i> Mode Sensor: <strong id="ip-mask-state">Tersamar (Masked)</strong>
                            </button>
                            <button type="button" onclick="exportIpCsv()"><i class="fas fa-download"></i> Unduh Log IP</button>
                        </div>
                    </div>

                    <div class="sunken-panel" style="max-height: 380px;">
                        <table class="retro-table" id="ip-data-table">
                            <thead>
                                <tr>
                                    <th>IP Address</th>
                                    <th>Lokasi / Jaringan ISP</th>
                                    <th style="text-align: right;">Total Kunjungan (Hits)</th>
                                    <th>Waktu Terakhir</th>
                                    <th>Perangkat</th>
                                    <th>Sistem Operasi</th>
                                    <th>Peramban (Browser)</th>
                                    <th>Halaman Terakhir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($per_ip)): ?>
                                    <tr>
                                        <td colspan="8" style="text-align: center; padding: 20px; color: #808080;">
                                            Belum ada rekaman IP pengunjung.
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($per_ip as $ip_raw => $info): ?>
                                        <tr>
                                            <td class="ip-cell" data-raw="<?php echo htmlspecialchars($ip_raw); ?>" data-masked="<?php echo htmlspecialchars($info['masked_ip'] ?? $ip_raw); ?>" style="font-family: 'Space Mono', monospace; font-weight: 700; color: var(--win-navy);">
                                                <?php echo htmlspecialchars($info['masked_ip'] ?? $ip_raw); ?>
                                            </td>
                                            <td>
                                                <i class="fas fa-location-dot" style="color: #cc3333; margin-right: 4px;"></i>
                                                <?php echo htmlspecialchars($info['location'] ?? 'Malaysia Regional'); ?>
                                            </td>
                                            <td style="text-align: right; font-weight: 700; font-family: 'Space Mono', monospace;">
                                                <?php echo number_format($info['hits'] ?? 1); ?>
                                            </td>
                                            <td style="font-family: 'Space Mono', monospace; font-size: 10px;">
                                                <?php echo htmlspecialchars($info['last_seen'] ?? '-'); ?>
                                            </td>
                                            <td>
                                                <i class="fas fa-<?php echo strtolower($info['device'] ?? '') === 'mobile' ? 'mobile-screen' : 'desktop'; ?>"></i>
                                                <?php echo htmlspecialchars($info['device'] ?? 'Desktop'); ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($info['os'] ?? 'OS'); ?></td>
                                            <td><?php echo htmlspecialchars($info['browser'] ?? 'Browser'); ?></td>
                                            <td><?php echo htmlspecialchars($info['page'] ?? 'Home'); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div style="font-size: 10px; color: #444444; margin-top: 6px;">
                        * IP disamarkan secara otomatis untuk kepatuhan privasi (PDPA). Klik tombol "Mode Sensor" untuk membuka alamat utuh.
                    </div>

                </div>

                <!-- ═══════════════════════════════════════════════════════════ -->
                <!-- TAB 5: LIVE STREAMING TRAFFIC FEED                          -->
                <!-- ═══════════════════════════════════════════════════════════ -->
                <div class="window tab-pane" id="tab-live" role="tabpanel">
                    
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
                        <span><i class="fas fa-satellite-dish" style="color: var(--win-green);"></i> <strong>Real-Time Incoming Sessions Stream:</strong></span>
                        <span style="font-size: 10px; color: #444;">Auto-Polling 10s • MYT</span>
                    </div>

                    <div class="sunken-panel" style="max-height: 380px;">
                        <table class="retro-table" id="live-feed-table">
                            <thead>
                                <tr>
                                    <th>Waktu (MYT)</th>
                                    <th>Halaman Dituju</th>
                                    <th>Perangkat / OS</th>
                                    <th>Browser</th>
                                    <th>IP Klien</th>
                                    <th>Sumber Trafik (Referrer)</th>
                                </tr>
                            </thead>
                            <tbody id="live-feed-tbody">
                                <?php foreach ($recent as $r): ?>
                                    <tr>
                                        <td style="font-family: 'Space Mono', monospace; font-size: 10px; color: var(--win-navy);">
                                            <?php echo htmlspecialchars($r['time'] ?? '-'); ?>
                                        </td>
                                        <td><strong><?php echo htmlspecialchars($r['page'] ?? 'Home'); ?></strong></td>
                                        <td>
                                            <i class="fas fa-<?php echo strtolower($r['device'] ?? '') === 'mobile' ? 'mobile-screen' : 'desktop'; ?>"></i>
                                            <?php echo htmlspecialchars($r['device'] ?? 'Desktop'); ?> (<?php echo htmlspecialchars($r['os'] ?? 'OS'); ?>)
                                        </td>
                                        <td><?php echo htmlspecialchars($r['browser'] ?? 'Browser'); ?></td>
                                        <td style="font-family: 'Space Mono', monospace;"><?php echo htmlspecialchars($r['ip'] ?? '127.0.0.xxx'); ?></td>
                                        <td style="color: #666; font-size: 10px;"><?php echo htmlspecialchars($r['referrer'] ?? 'Direct Access'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

                <!-- Classic Window Status Bar (Bottom of Window) -->
                <div class="status-bar">
                    <div class="status-bar-field" style="flex: 1.5;">
                        <i class="fas fa-circle-check" style="color: var(--win-green);"></i> Ready • Standalone Telemetry Active
                    </div>
                    <div class="status-bar-field">
                        Total Views: <strong id="sb-views"><?php echo number_format($summary['total_views'] ?? 0); ?></strong>
                    </div>
                    <div class="status-bar-field">
                        Uniques: <strong id="sb-uniques"><?php echo number_format($summary['total_uniques'] ?? 0); ?></strong>
                    </div>
                    <div class="status-bar-field" style="flex: 1.2;">
                        Server: <strong>abmalaya.com</strong> (SSL Port 443)
                    </div>
                </div>

            </div>
        </div>

    </div>

    <!-- ═══════════════════════════════════════════════════════════════════════ -->
    <!-- RETRO WINDOWS 95 TASKBAR (BOTTOM OF SCREEN)                            -->
    <!-- ═══════════════════════════════════════════════════════════════════════ -->
    <div class="win95-taskbar">
        <div class="taskbar-left">
            <!-- Classic Start Button -->
            <button type="button" class="start-btn" onclick="toggleStartMenu()">
                <div class="start-flag-logo">
                    <div class="flag-piece flag-red"></div>
                    <div class="flag-piece flag-green"></div>
                    <div class="flag-piece flag-blue"></div>
                    <div class="flag-piece flag-yellow"></div>
                </div>
                <span>Start</span>
            </button>

            <!-- Active App Task Tab -->
            <div class="taskbar-app-btn">
                <i class="fas fa-chart-column" style="color: var(--win-navy);"></i>
                <span>AB Malaya Traffic Monitor</span>
            </div>
        </div>

        <!-- Taskbar Tray -->
        <div class="taskbar-tray">
            <i class="fas fa-volume-high tray-icon" title="Audio"></i>
            <i class="fas fa-network-wired tray-icon" title="Connected to Network" style="color: var(--win-green);"></i>
            <span id="win95-clock">12:00 PM</span>
        </div>
    </div>

    <!-- ── JAVASCRIPT LOGIC (CHARTS, TABS, POLLING, RETRO WIN95 CONTROLS) ─── -->
    <script>
        // Tab Switcher
        function switchWinTab(tabId) {
            document.querySelectorAll('.tab-pane').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('menu[role="tablist"] > li').forEach(el => el.classList.remove('active'));

            const targetPane = document.getElementById(tabId);
            if (targetPane) targetPane.classList.add('active');

            const pillId = tabId.replace('tab-', 'pill-');
            const targetPill = document.getElementById(pillId);
            if (targetPill) targetPill.classList.add('active');

            // Trigger chart redraw if switching to charts tab
            if (tabId === 'tab-charts') {
                setTimeout(initRetroCharts, 80);
            }
        }

        // Window maximize toggle
        let isMaximized = false;
        function toggleMaximize() {
            const container = document.querySelector('.win95-app-container');
            if (!container) return;
            if (!isMaximized) {
                container.style.maxWidth = '100%';
                container.style.width = '100%';
                container.style.margin = '0';
                isMaximized = true;
            } else {
                container.style.maxWidth = '1100px';
                container.style.width = '96%';
                container.style.margin = '20px auto';
                isMaximized = false;
            }
        }

        // Real-Time Taskbar Clock
        function updateWinClock() {
            const now = new Date();
            const timeStr = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit', hour12: true, timeZone: 'Asia/Kuala_Lumpur' });
            const clockEl = document.getElementById('win95-clock');
            if (clockEl) clockEl.textContent = timeStr;
        }
        setInterval(updateWinClock, 1000);
        updateWinClock();

        // Start button dialog
        function toggleStartMenu() {
            alert("AB Malaya Enterprise Portal\n• Website: https://abmalaya.com\n• Dedicated Visitor Telemetry v4.1.95\n• Mode: Windows 95 Retro Architecture");
        }

        function showAboutDialog() {
            alert("AB Malaya Visitor Telemetry & Audit Desk\nBuilt with 100% authentic Windows 95 aesthetic (Zero AI gradients).\nFeatures:\n- Hourly breakdown (00:00 - 23:00)\n- Daily/Monthly Journaling\n- Per-Device and Per-IP tracking\n- Integrated Open-Source 98.css & Chart.js");
        }

        function copyShareableUrl() {
            const url = window.location.origin + '/visitors';
            navigator.clipboard.writeText(url).then(() => {
                alert("Tautan Disalin ke Clipboard:\n" + url);
            }).catch(() => {
                prompt("Salin tautan ini:", url);
            });
        }

        // Toggle Masked vs Raw IP
        let isRawIp = false;
        function toggleRawIp() {
            isRawIp = !isRawIp;
            document.querySelectorAll('.ip-cell').forEach(cell => {
                cell.textContent = isRawIp ? cell.getAttribute('data-raw') : cell.getAttribute('data-masked');
            });
            document.getElementById('ip-mask-state').textContent = isRawIp ? 'Alamat Utuh (Raw)' : 'Tersamar (Masked)';
        }

        // Client-side IP Table Filter
        function filterIpTable(query) {
            const q = query.toLowerCase();
            document.querySelectorAll('#ip-data-table tbody tr').forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(q) ? '' : 'none';
            });
        }

        // View Day Hourly Distribution
        function viewDayHourly(dayDate) {
            switchWinTab('tab-charts');
        }

        // Export CSV
        function exportJournalCsv() {
            const rows = [];
            const table = document.getElementById('journal-data-table');
            for (let tr of table.querySelectorAll('tr')) {
                const cells = Array.from(tr.querySelectorAll('th, td')).slice(0, 6).map(c => '"' + c.innerText.replace(/"/g, '""').trim() + '"');
                rows.push(cells.join(','));
            }
            const blob = new Blob([rows.join('\n')], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'AB_Malaya_Visitor_Journal_' + new Date().toISOString().slice(0,10) + '.csv';
            link.click();
        }

        function exportIpCsv() {
            const rows = [];
            const table = document.getElementById('ip-data-table');
            for (let tr of table.querySelectorAll('tr')) {
                const cells = Array.from(tr.querySelectorAll('th, td')).map(c => '"' + c.innerText.replace(/"/g, '""').trim() + '"');
                rows.push(cells.join(','));
            }
            const blob = new Blob([rows.join('\n')], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = 'AB_Malaya_Visitor_IP_Log_' + new Date().toISOString().slice(0,10) + '.csv';
            link.click();
        }

        // ═══════════════════════════════════════════════════════════════════
        // RETRO CHARTS CONFIGURATION (WINDOWS 95 / EXCEL 97 THEMED)
        // ═══════════════════════════════════════════════════════════════════
        let chartsInitialized = false;
        function initRetroCharts() {
            if (chartsInitialized) return;
            chartsInitialized = true;

            const hourlyData = <?php echo json_encode(array_values($hourly)); ?>;
            const hoursLabels = Array.from({length: 24}, (_, i) => String(i).padStart(2, '0') + ':00');

            // 1. Hourly Chart (Windows 95 Classic Bar Chart)
            const ctxH = document.getElementById('chartHourly');
            if (ctxH) {
                new Chart(ctxH, {
                    type: 'bar',
                    data: {
                        labels: hoursLabels,
                        datasets: [{
                            label: 'Jumlah Kunjungan',
                            data: hourlyData,
                            backgroundColor: '#000080', // Classic Navy
                            borderColor: '#000000',
                            borderWidth: 1,
                            barPercentage: 0.8
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false }
                        },
                        scales: {
                            x: {
                                grid: { color: '#dfdfdf' },
                                ticks: { font: { size: 9, family: 'MS Sans Serif' } }
                            },
                            y: {
                                beginAtZero: true,
                                grid: { color: '#c0c0c0' },
                                ticks: { font: { size: 9, family: 'MS Sans Serif' }, stepSize: 1 }
                            }
                        }
                    }
                });
            }

            // 2. Daily Trend Chart
            <?php 
                $chart_days = array_reverse(array_slice($days_data, 0, 15, true));
                $d_labels = array_map(function($d) { return date('d M', strtotime($d)); }, array_keys($chart_days));
                $d_views = array_map(function($v) { return $v['views'] ?? 0; }, array_values($chart_days));
                $d_uniques = array_map(function($v) { return $v['uniques'] ?? 0; }, array_values($chart_days));
            ?>
            const ctxD = document.getElementById('chartDaily');
            if (ctxD) {
                new Chart(ctxD, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($d_labels); ?>,
                        datasets: [
                            {
                                label: 'Total Hits',
                                data: <?php echo json_encode($d_views); ?>,
                                borderColor: '#000080',
                                backgroundColor: '#000080',
                                borderWidth: 2,
                                pointRadius: 3,
                                pointBackgroundColor: '#ffffff',
                                pointBorderColor: '#000000',
                                tension: 0.1
                            },
                            {
                                label: 'Pengunjung Unik',
                                data: <?php echo json_encode($d_uniques); ?>,
                                borderColor: '#008000', // Classic Green
                                backgroundColor: '#008000',
                                borderWidth: 2,
                                pointRadius: 3,
                                pointBackgroundColor: '#ffffff',
                                pointBorderColor: '#000000',
                                tension: 0.1
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                                labels: { font: { size: 10, family: 'MS Sans Serif' }, boxWidth: 12 }
                            }
                        },
                        scales: {
                            x: { grid: { color: '#dfdfdf' }, ticks: { font: { size: 9 } } },
                            y: { beginAtZero: true, grid: { color: '#c0c0c0' }, ticks: { font: { size: 9 } } }
                        }
                    }
                });
            }

            // 3. Devices Chart (Retro Pie/Bar)
            const ctxDev = document.getElementById('chartDevices');
            if (ctxDev) {
                new Chart(ctxDev, {
                    type: 'bar',
                    data: {
                        labels: ['Desktop PC', 'Mobile (HP)', 'Tablet'],
                        datasets: [{
                            data: [<?php echo $devices['Desktop'] ?? 0; ?>, <?php echo $devices['Mobile'] ?? 0; ?>, <?php echo $devices['Tablet'] ?? 0; ?>],
                            backgroundColor: ['#000080', '#008080', '#800000'],
                            borderColor: '#000000',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        indexAxis: 'y',
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: { legend: { display: false } },
                        scales: {
                            x: { beginAtZero: true, grid: { color: '#dfdfdf' } },
                            y: { grid: { display: false }, ticks: { font: { weight: 'bold' } } }
                        }
                    }
                });
            }
        }

        // Live Auto-Polling (every 10 seconds)
        async function pollTelemetry() {
            try {
                const res = await fetch('/visitors.php?format=json');
                if (res.ok) {
                    const data = await res.json();
                    if (data && data.summary) {
                        document.getElementById('disp-total-views').textContent = String(data.summary.total_views || 0).padStart(6, '0');
                        document.getElementById('disp-total-uniques').textContent = String(data.summary.total_uniques || 0).padStart(6, '0');
                        document.getElementById('disp-today-views').textContent = String(data.summary.today_views || 0).padStart(6, '0');
                        document.getElementById('disp-active-now').textContent = String(data.summary.active_now || 1).padStart(2, '0') + ' SESS';
                        
                        document.getElementById('sb-views').textContent = Number(data.summary.total_views || 0).toLocaleString();
                        document.getElementById('sb-uniques').textContent = Number(data.summary.total_uniques || 0).toLocaleString();
                    }
                }
            } catch (e) {
                console.error("Telemetry error", e);
            }
        }
        setInterval(pollTelemetry, 10000);

        // Check URL params for active tab on load
        window.addEventListener('DOMContentLoaded', () => {
            const urlParams = new URLSearchParams(window.location.search);
            const tabParam = urlParams.get('tab');
            if (tabParam && document.getElementById('tab-' + tabParam)) {
                switchWinTab('tab-' + tabParam);
            }
        });
    </script>
</body>
</html>
