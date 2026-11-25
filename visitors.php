<?php
/**
 * AB Malaya Sdn Bhd - Standalone Dedicated Visitor Counter & Analytics Hub
 * 
 * Standalone page without main navigation navbar.
 * Accessible directly via /visitors or /visitors.php
 */

require_once __DIR__ . '/includes/visitor_tracker.php';

// JSON API Endpoint for Live Auto-Refresh
if (isset($_GET['format']) && $_GET['format'] === 'json') {
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
    echo json_encode(abm_get_visitor_data());
    exit;
}

// Track view of the dashboard itself (tagged cleanly)
abm_track_visit('visitors', 'Visitor Analytics Hub');
$data = abm_get_visitor_data();
$summary = $data['summary'] ?? [];
$pages = $data['pages'] ?? [];
$devices = $data['devices'] ?? [];
$browsers = $data['browsers'] ?? [];
$recent = $data['recent_visits'] ?? [];

// Sort pages by count descending
arsort($pages);
$top_pages = array_slice($pages, 0, 7, true);
$max_page_count = max(1, (!empty($top_pages) ? max($top_pages) : 1));

// Calculate device percentages
$total_devices = max(1, array_sum($devices));
$pct_desktop = round((($devices['Desktop'] ?? 0) / $total_devices) * 100);
$pct_mobile = round((($devices['Mobile'] ?? 0) / $total_devices) * 100);
$pct_tablet = round((($devices['Tablet'] ?? 0) / $total_devices) * 100);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Visitor Analytics & Real-Time Traffic Counter | AB Malaya</title>
    <meta name="description" content="Dedicated real-time visitor analytics, unique session counter, and traffic metrics for AB Malaya Sdn Bhd official portal.">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" type="image/webp" href="/assets/img/logo-abmalaya.webp">

    <!-- Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;600;700;800&family=Space+Mono:ital,wght@0,400;0,700;1,400&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        :root {
            --brand-navy: #093863;
            --brand-blue: #1191cc;
            --brand-dark: #070d18;
            --brand-surface: #0f172a;
            --brand-card: #131d33;
            --brand-border: #1e293b;
            --brand-green: #10b981;
            --brand-amber: #f59e0b;
            --text-light: #f8fafc;
            --text-muted: #94a3b8;
            --text-dim: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--brand-dark);
            color: var(--text-light);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            overflow-x: hidden;
            background-image: 
                radial-gradient(circle at 15% 15%, rgba(17, 145, 204, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 85% 85%, rgba(9, 56, 98, 0.15) 0%, transparent 45%);
            background-attachment: fixed;
        }

        /* ── ISOLATED STANDALONE TOP BAR (NO MAIN NAVIGATION) ─────────────── */
        .standalone-top-bar {
            background: rgba(11, 16, 28, 0.92);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--brand-border);
            padding: 14px 24px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .top-bar-inner {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 14px;
        }

        .brand-cluster {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            color: inherit;
        }

        .brand-logo-img {
            height: 38px;
            width: auto;
            display: block;
            filter: brightness(0) invert(1);
        }

        .brand-titles {
            display: flex;
            flex-direction: column;
        }

        .brand-name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 0.95rem;
            font-weight: 800;
            letter-spacing: 0.8px;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .telemetry-badge {
            background: rgba(17, 145, 204, 0.15);
            border: 1px solid rgba(17, 145, 204, 0.4);
            color: var(--brand-blue);
            font-size: 0.65rem;
            font-weight: 800;
            padding: 2px 6px;
            letter-spacing: 0.8px;
            text-transform: uppercase;
            border-radius: 3px;
        }

        .brand-subhead {
            font-size: 0.72rem;
            color: var(--text-dim);
            font-family: 'Space Mono', monospace;
            letter-spacing: 0.3px;
        }

        /* Minimal Quick Links (Cuma Link - No Nav Menus) */
        .minimal-actions {
            display: flex;
            align-items: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn-minimal-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--brand-border);
            color: var(--text-muted);
            font-size: 0.78rem;
            font-weight: 600;
            padding: 7px 14px;
            border-radius: 6px;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .btn-minimal-link:hover {
            background: rgba(17, 145, 204, 0.12);
            border-color: var(--brand-blue);
            color: #ffffff;
            transform: translateY(-1px);
        }

        .btn-minimal-link.primary {
            background: var(--brand-navy);
            border-color: var(--brand-blue);
            color: #ffffff;
        }

        .btn-minimal-link.primary:hover {
            background: var(--brand-blue);
        }

        /* ── DASHBOARD MAIN WRAPPER ───────────────────────────────────────── */
        .dashboard-container {
            max-width: 1400px;
            width: 100%;
            margin: 0 auto;
            padding: 30px 24px 60px;
            flex: 1;
        }

        /* Dashboard Header Header Banner */
        .telemetry-banner {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 28px;
            padding-bottom: 18px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            flex-wrap: wrap;
            gap: 16px;
        }

        .banner-left h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.5px;
            line-height: 1.1;
            margin-bottom: 6px;
        }

        .banner-left h1 span {
            color: var(--brand-blue);
        }

        .banner-left p {
            font-size: 0.88rem;
            color: var(--text-muted);
        }

        .banner-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .live-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.35);
            color: var(--brand-green);
            padding: 6px 14px;
            border-radius: 50px;
            font-family: 'Space Mono', monospace;
            font-size: 0.75rem;
            font-weight: 700;
        }

        .live-status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--brand-green);
            box-shadow: 0 0 8px var(--brand-green);
            animation: pulse-dot 1.8s infinite;
        }

        @keyframes pulse-dot {
            0% { opacity: 1; transform: scale(1); }
            50% { opacity: 0.4; transform: scale(0.85); }
            100% { opacity: 1; transform: scale(1); }
        }

        /* ── HERO METRIC CARDS (TACTILE LCD DISPLAY) ──────────────────────── */
        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 28px;
        }

        .metric-card {
            background: var(--brand-card);
            border: 1px solid var(--brand-border);
            border-radius: 10px;
            padding: 22px;
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .metric-card:hover {
            transform: translateY(-2px);
            border-color: rgba(17, 145, 204, 0.4);
        }

        .metric-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--brand-blue);
        }

        .metric-card.accent-green::before {
            background: var(--brand-green);
        }

        .metric-card.accent-amber::before {
            background: var(--brand-amber);
        }

        .metric-card.accent-navy::before {
            background: linear-gradient(90deg, var(--brand-navy), var(--brand-blue));
        }

        .card-header-mini {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .card-title-mini {
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--text-muted);
            font-family: 'Space Mono', monospace;
        }

        .card-icon-mini {
            font-size: 1rem;
            color: var(--brand-blue);
            opacity: 0.8;
        }

        .card-value-display {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            line-height: 1;
            letter-spacing: -1px;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .card-subtext {
            font-size: 0.75rem;
            color: var(--text-dim);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .card-subtext .highlight {
            color: var(--brand-green);
            font-weight: 700;
        }

        /* ── 2-COLUMN TELEMETRY DETAILS ────────────────────────────────────── */
        .telemetry-split {
            display: grid;
            grid-template-columns: 1.25fr 1fr;
            gap: 20px;
            margin-bottom: 28px;
        }

        .panel-box {
            background: var(--brand-card);
            border: 1px solid var(--brand-border);
            border-radius: 10px;
            padding: 22px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        }

        .panel-title {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: -0.2px;
            margin-bottom: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--brand-border);
        }

        .panel-title span {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .panel-badge {
            font-family: 'Space Mono', monospace;
            font-size: 0.7rem;
            font-weight: 600;
            color: var(--text-dim);
        }

        /* Top Pages List with Progress Bars */
        .page-stat-row {
            margin-bottom: 14px;
        }

        .page-stat-row:last-child {
            margin-bottom: 0;
        }

        .page-meta-line {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.82rem;
            margin-bottom: 5px;
        }

        .page-name-tag {
            font-weight: 600;
            color: #e2e8f0;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .page-views-badge {
            font-family: 'Space Mono', monospace;
            font-size: 0.78rem;
            color: var(--brand-blue);
            font-weight: 700;
        }

        .page-progress-bar-bg {
            height: 6px;
            background: rgba(255, 255, 255, 0.06);
            border-radius: 4px;
            overflow: hidden;
        }

        .page-progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--brand-navy), var(--brand-blue));
            border-radius: 4px;
            transition: width 0.6s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Device Stack Bar */
        .device-bar-container {
            margin-bottom: 18px;
        }

        .device-stack-bar {
            height: 14px;
            border-radius: 7px;
            overflow: hidden;
            display: flex;
            margin-bottom: 12px;
            background: rgba(255, 255, 255, 0.05);
        }

        .stack-slice.desktop {
            background: #1191cc;
        }

        .stack-slice.mobile {
            background: #10b981;
        }

        .stack-slice.tablet {
            background: #f59e0b;
        }

        .device-legend {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .legend-dot {
            width: 10px;
            height: 10px;
            border-radius: 2px;
        }

        .legend-dot.desktop { background: #1191cc; }
        .legend-dot.mobile { background: #10b981; }
        .legend-dot.tablet { background: #f59e0b; }

        .legend-val {
            font-weight: 700;
            color: #ffffff;
            font-family: 'Space Mono', monospace;
        }

        /* Browser Chips */
        .browser-chips-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
            margin-top: 14px;
        }

        .browser-chip {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--brand-border);
            padding: 8px 12px;
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.78rem;
        }

        .browser-chip-left {
            display: flex;
            align-items: center;
            gap: 7px;
            color: var(--text-muted);
        }

        .browser-chip-right {
            font-family: 'Space Mono', monospace;
            font-weight: 700;
            color: #ffffff;
        }

        /* ── LIVE RECENT VISITOR FEED TABLE ─────────────────────────────────── */
        .feed-panel {
            background: var(--brand-card);
            border: 1px solid var(--brand-border);
            border-radius: 10px;
            padding: 22px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
        }

        .feed-table-wrapper {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }

        .feed-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.82rem;
            text-align: left;
            min-width: 680px;
        }

        .feed-table th {
            font-family: 'Space Mono', monospace;
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--text-dim);
            text-transform: uppercase;
            letter-spacing: 0.8px;
            padding: 10px 14px;
            border-bottom: 1px solid var(--brand-border);
            background: rgba(255, 255, 255, 0.02);
        }

        .feed-table td {
            padding: 12px 14px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            color: var(--text-light);
            vertical-align: middle;
        }

        .feed-table tr:hover td {
            background: rgba(17, 145, 204, 0.04);
        }

        .feed-time-cell {
            font-family: 'Space Mono', monospace;
            font-size: 0.75rem;
            color: var(--brand-blue);
            white-space: nowrap;
        }

        .page-badge-cell {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .device-badge-cell {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--text-muted);
            font-size: 0.78rem;
        }

        .ip-cell {
            font-family: 'Space Mono', monospace;
            font-size: 0.75rem;
            color: var(--text-dim);
        }

        /* ── FOOTER BAR ─────────────────────────────────────────────────────── */
        .standalone-footer {
            margin-top: 40px;
            border-top: 1px solid var(--brand-border);
            padding: 20px 24px;
            text-align: center;
            font-size: 0.75rem;
            color: var(--text-dim);
            font-family: 'Space Mono', monospace;
        }

        .standalone-footer a {
            color: var(--brand-blue);
            text-decoration: none;
        }

        .standalone-footer a:hover {
            text-decoration: underline;
        }

        /* Toast notification */
        .toast-copied {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: var(--brand-green);
            color: #000000;
            font-weight: 700;
            font-size: 0.8rem;
            padding: 8px 16px;
            border-radius: 6px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.4);
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.25s ease;
            pointer-events: none;
            z-index: 200;
        }

        .toast-copied.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── RESPONSIVE DESIGN (MODE HP) ────────────────────────────────────── */
        @media (max-width: 1024px) {
            .metrics-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .telemetry-split {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .metrics-grid {
                grid-template-columns: 1fr;
                gap: 12px;
            }
            .dashboard-container {
                padding: 20px 14px 40px;
            }
            .banner-left h1 {
                font-size: 1.6rem;
            }
            .card-value-display {
                font-size: 2.1rem;
            }
            .top-bar-inner {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            .minimal-actions {
                width: 100%;
                justify-content: space-between;
            }
            .browser-chips-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <!-- ── STANDALONE TOP BAR (NO MAIN NAVIGATION MENU, CUMA LINK) ──────────── -->
    <header class="standalone-top-bar">
        <div class="top-bar-inner">
            <a href="/" class="brand-cluster" title="AB Malaya Portal">
                <img src="/assets/img/logo-abmalaya.webp" alt="AB Malaya Logo" class="brand-logo-img">
                <div class="brand-titles">
                    <span class="brand-name">
                        AB MALAYA <span class="telemetry-badge">TELEMETRY</span>
                    </span>
                    <span class="brand-subhead">Official Traffic & Visitor Counter Desk</span>
                </div>
            </a>

            <!-- Standalone Action Links -->
            <div class="minimal-actions">
                <button type="button" class="btn-minimal-link" onclick="copyCurrentLink()">
                    <i class="fas fa-link"></i> <span>Copy Link</span>
                </button>
                <button type="button" class="btn-minimal-link" id="refresh-btn" onclick="fetchLiveStats(true)">
                    <i class="fas fa-rotate"></i> <span>Refresh</span>
                </button>
                <a href="/" class="btn-minimal-link primary">
                    <i class="fas fa-arrow-left"></i> <span>Visit Website</span>
                </a>
            </div>
        </div>
    </header>

    <!-- ── MAIN DASHBOARD CONTENT ─────────────────────────────────────────── -->
    <main class="dashboard-container">
        
        <!-- Header Telemetry Title -->
        <div class="telemetry-banner">
            <div class="banner-left">
                <h1>Visitor <span>Counter</span> & Traffic Analytics</h1>
                <p>Real-time corporate telemetry tracking unique vessel operators, contractors, and industrial clients.</p>
            </div>
            <div class="banner-right">
                <div class="live-status-pill">
                    <span class="live-status-dot"></span>
                    <span id="live-time-ticker">MYT <?php echo date('H:i:s'); ?></span>
                </div>
            </div>
        </div>

        <!-- ── HERO METRIC CARDS ───────────────────────────────────────────── -->
        <div class="metrics-grid">
            
            <!-- Card 1: Total Impressions -->
            <div class="metric-card accent-navy">
                <div class="card-header-mini">
                    <span class="card-title-mini">Total Page Views</span>
                    <i class="fas fa-eye card-icon-mini"></i>
                </div>
                <div class="card-value-display" id="val-total-views">
                    <?php echo number_format($summary['total_views'] ?? 0); ?>
                </div>
                <div class="card-subtext">
                    <span class="highlight"><i class="fas fa-arrow-trend-up"></i> Cumulative</span> all-time impressions
                </div>
            </div>

            <!-- Card 2: Unique Visitors -->
            <div class="metric-card accent-green">
                <div class="card-header-mini">
                    <span class="card-title-mini">Total Unique Visitors</span>
                    <i class="fas fa-users card-icon-mini"></i>
                </div>
                <div class="card-value-display" id="val-total-uniques">
                    <?php echo number_format($summary['total_uniques'] ?? 0); ?>
                </div>
                <div class="card-subtext">
                    <span class="highlight"><i class="fas fa-fingerprint"></i> Distinct</span> IP & browser sessions
                </div>
            </div>

            <!-- Card 3: Today's Traffic -->
            <div class="metric-card accent-amber">
                <div class="card-header-mini">
                    <span class="card-title-mini">Today's Impressions</span>
                    <i class="fas fa-calendar-day card-icon-mini"></i>
                </div>
                <div class="card-value-display" id="val-today-views">
                    <?php echo number_format($summary['today_views'] ?? 0); ?>
                </div>
                <div class="card-subtext">
                    <span class="highlight" id="val-today-uniques"><?php echo number_format($summary['today_uniques'] ?? 0); ?></span> unique visitors today
                </div>
            </div>

            <!-- Card 4: Active Right Now -->
            <div class="metric-card">
                <div class="card-header-mini">
                    <span class="card-title-mini">Active (Last 15m)</span>
                    <i class="fas fa-bolt card-icon-mini" style="color: var(--brand-green);"></i>
                </div>
                <div class="card-value-display" id="val-active-now" style="color: var(--brand-green);">
                    <?php echo number_format($summary['active_now'] ?? 1); ?>
                </div>
                <div class="card-subtext">
                    <span class="highlight">Live</span> active browsing sessions
                </div>
            </div>
        </div>

        <!-- ── 2-COLUMN TELEMETRY: TOP PAGES & DEVICE BREAKDOWN ────────────── -->
        <div class="telemetry-split">
            
            <!-- Panel 1: Top Visited Pages -->
            <div class="panel-box">
                <div class="panel-title">
                    <span><i class="fas fa-layer-group" style="color: var(--brand-blue);"></i> Most Visited Portals & Pages</span>
                    <span class="panel-badge">Traffic Share</span>
                </div>

                <div id="pages-list-container">
                    <?php if (empty($top_pages)): ?>
                        <p style="color: var(--text-dim); font-size: 0.85rem;">Logging initial page impressions...</p>
                    <?php else: ?>
                        <?php foreach ($top_pages as $pname => $count): 
                            $pct = round(($count / $max_page_count) * 100);
                        ?>
                            <div class="page-stat-row">
                                <div class="page-meta-line">
                                    <span class="page-name-tag">
                                        <i class="fas fa-file-lines" style="color: var(--text-dim); font-size: 0.72rem;"></i>
                                        <?php echo htmlspecialchars($pname); ?>
                                    </span>
                                    <span class="page-views-badge"><?php echo number_format($count); ?> views</span>
                                </div>
                                <div class="page-progress-bar-bg">
                                    <div class="page-progress-bar-fill" style="width: <?php echo $pct; ?>%;"></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Panel 2: Device & Browser Telemetry -->
            <div class="panel-box">
                <div class="panel-title">
                    <span><i class="fas fa-mobile-screen-button" style="color: var(--brand-green);"></i> Device & Platform Split</span>
                    <span class="panel-badge">Client Hardware</span>
                </div>

                <!-- Device Stack Bar -->
                <div class="device-bar-container">
                    <div class="device-stack-bar">
                        <div class="stack-slice desktop" style="width: <?php echo $pct_desktop; ?>%;" title="Desktop: <?php echo $pct_desktop; ?>%"></div>
                        <div class="stack-slice mobile" style="width: <?php echo $pct_mobile; ?>%;" title="Mobile: <?php echo $pct_mobile; ?>%"></div>
                        <div class="stack-slice tablet" style="width: <?php echo $pct_tablet; ?>%;" title="Tablet: <?php echo $pct_tablet; ?>%"></div>
                    </div>

                    <div class="device-legend">
                        <div class="legend-item">
                            <span class="legend-dot desktop"></span>
                            <span>Desktop</span>
                            <span class="legend-val" id="pct-desktop"><?php echo $pct_desktop; ?>%</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-dot mobile"></span>
                            <span>Mobile (HP)</span>
                            <span class="legend-val" id="pct-mobile"><?php echo $pct_mobile; ?>%</span>
                        </div>
                        <div class="legend-item">
                            <span class="legend-dot tablet"></span>
                            <span>Tablet</span>
                            <span class="legend-val" id="pct-tablet"><?php echo $pct_tablet; ?>%</span>
                        </div>
                    </div>
                </div>

                <!-- Web Browsers -->
                <div style="font-size: 0.75rem; font-weight: 700; color: var(--text-dim); text-transform: uppercase; letter-spacing: 0.8px; margin-top: 20px; font-family: 'Space Mono', monospace;">
                    Detected Web Browsers
                </div>
                <div class="browser-chips-grid">
                    <?php foreach ($browsers as $bname => $bcount): ?>
                        <div class="browser-chip">
                            <div class="browser-chip-left">
                                <i class="fab fa-<?php echo strtolower($bname) === 'chrome' ? 'chrome' : (strtolower($bname) === 'safari' ? 'safari' : (strtolower($bname) === 'edge' ? 'edge' : (strtolower($bname) === 'firefox' ? 'firefox' : 'compass'))); ?>"></i>
                                <span><?php echo htmlspecialchars($bname); ?></span>
                            </div>
                            <span class="browser-chip-right"><?php echo number_format($bcount); ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        <!-- ── LIVE RECENT VISITOR FEED TABLE ─────────────────────────────────── -->
        <div class="feed-panel">
            <div class="panel-title">
                <span><i class="fas fa-satellite-dish" style="color: var(--brand-amber);"></i> Live Incoming Traffic Feed (Latest Real-Time Sessions)</span>
                <span class="panel-badge">Autonomous Logging</span>
            </div>

            <div class="feed-table-wrapper">
                <table class="feed-table">
                    <thead>
                        <tr>
                            <th style="width: 12%;">Time (MYT)</th>
                            <th style="width: 28%;">Page Destination</th>
                            <th style="width: 16%;">Device / OS</th>
                            <th style="width: 14%;">Browser</th>
                            <th style="width: 15%;">Masked IP</th>
                            <th style="width: 15%;">Traffic Source</th>
                        </tr>
                    </thead>
                    <tbody id="feed-table-body">
                        <?php if (empty($recent)): ?>
                            <tr>
                                <td colspan="6" style="text-align: center; color: var(--text-dim); padding: 30px;">
                                    <i class="fas fa-spinner fa-spin" style="margin-right: 8px;"></i> Waiting for incoming visitor telemetry...
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($recent as $r): ?>
                                <tr>
                                    <td class="feed-time-cell">
                                        <i class="far fa-clock" style="margin-right: 4px; opacity: 0.6;"></i>
                                        <?php echo htmlspecialchars($r['time'] ?? '-'); ?>
                                    </td>
                                    <td>
                                        <span class="page-badge-cell">
                                            <i class="fas fa-compass" style="color: var(--brand-blue); font-size: 0.7rem;"></i>
                                            <?php echo htmlspecialchars($r['page'] ?? $r['path'] ?? 'Home'); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span class="device-badge-cell">
                                            <i class="fas fa-<?php echo strtolower($r['device'] ?? '') === 'mobile' ? 'mobile-screen' : (strtolower($r['device'] ?? '') === 'tablet' ? 'tablet-screen-button' : 'desktop'); ?>"></i>
                                            <?php echo htmlspecialchars($r['device'] ?? 'Desktop'); ?> (<?php echo htmlspecialchars($r['os'] ?? 'OS'); ?>)
                                        </span>
                                    </td>
                                    <td><?php echo htmlspecialchars($r['browser'] ?? 'Browser'); ?></td>
                                    <td class="ip-cell"><?php echo htmlspecialchars($r['ip'] ?? '127.0.0.xxx'); ?></td>
                                    <td style="color: var(--text-muted); font-size: 0.78rem;">
                                        <i class="fas fa-arrow-up-right-from-square" style="font-size: 0.68rem; margin-right: 4px; opacity: 0.5;"></i>
                                        <?php echo htmlspecialchars($r['referrer'] ?? 'Direct'); ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </main>

    <!-- Toast Notification -->
    <div id="toast" class="toast-copied">
        <i class="fas fa-check-circle"></i> Direct Link Copied to Clipboard!
    </div>

    <!-- ── STANDALONE FOOTER ──────────────────────────────────────────────── -->
    <footer class="standalone-footer">
        <div>
            AB MALAYA SDN BHD &bull; Internal Telemetry System &bull; 
            <a href="/">abmalaya.com</a> &bull; Data persisten & auto-updated.
        </div>
    </footer>

    <!-- ── REAL-TIME JAVASCRIPT POLLING & ACTIONS ──────────────────────────── -->
    <script>
        // Update Live Clock
        setInterval(function() {
            const now = new Date();
            const timeStr = now.toLocaleTimeString('en-GB', { timeZone: 'Asia/Kuala_Lumpur' });
            const elem = document.getElementById('live-time-ticker');
            if (elem) elem.textContent = 'MYT ' + timeStr;
        }, 1000);

        // Copy Shareable Direct URL
        function copyCurrentLink() {
            const url = window.location.origin + '/visitors';
            navigator.clipboard.writeText(url).then(function() {
                const toast = document.getElementById('toast');
                toast.classList.add('show');
                setTimeout(() => toast.classList.remove('show'), 2200);
            });
        }

        // Auto-refresh real-time data every 10 seconds
        async function fetchLiveStats(isManual = false) {
            const btn = document.getElementById('refresh-btn');
            if (btn && isManual) {
                btn.querySelector('i').classList.add('fa-spin');
            }

            try {
                const res = await fetch('/visitors.php?format=json');
                if (res.ok) {
                    const data = await res.json();
                    if (data && data.summary) {
                        // Update Counters
                        document.getElementById('val-total-views').textContent = Number(data.summary.total_views || 0).toLocaleString();
                        document.getElementById('val-total-uniques').textContent = Number(data.summary.total_uniques || 0).toLocaleString();
                        document.getElementById('val-today-views').textContent = Number(data.summary.today_views || 0).toLocaleString();
                        document.getElementById('val-today-uniques').textContent = Number(data.summary.today_uniques || 0).toLocaleString();
                        document.getElementById('val-active-now').textContent = Number(data.summary.active_now || 1).toLocaleString();

                        // Update Table if visits present
                        if (data.recent_visits && data.recent_visits.length > 0) {
                            renderRecentTable(data.recent_visits);
                        }
                    }
                }
            } catch (err) {
                console.error("Telemetry fetch error:", err);
            } finally {
                if (btn && isManual) {
                    setTimeout(() => btn.querySelector('i').classList.remove('fa-spin'), 600);
                }
            }
        }

        function renderRecentTable(visits) {
            const tbody = document.getElementById('feed-table-body');
            if (!tbody) return;

            let html = '';
            visits.forEach(r => {
                const devIcon = (r.device || '').toLowerCase() === 'mobile' ? 'mobile-screen' : 
                                ((r.device || '').toLowerCase() === 'tablet' ? 'tablet-screen-button' : 'desktop');

                html += `<tr>
                    <td class="feed-time-cell">
                        <i class="far fa-clock" style="margin-right: 4px; opacity: 0.6;"></i>
                        ${escapeHtml(r.time || '-')}
                    </td>
                    <td>
                        <span class="page-badge-cell">
                            <i class="fas fa-compass" style="color: var(--brand-blue); font-size: 0.7rem;"></i>
                            ${escapeHtml(r.page || r.path || 'Home')}
                        </span>
                    </td>
                    <td>
                        <span class="device-badge-cell">
                            <i class="fas fa-${devIcon}"></i>
                            ${escapeHtml(r.device || 'Desktop')} (${escapeHtml(r.os || 'OS')})
                        </span>
                    </td>
                    <td>${escapeHtml(r.browser || 'Browser')}</td>
                    <td class="ip-cell">${escapeHtml(r.ip || '127.0.0.xxx')}</td>
                    <td style="color: var(--text-muted); font-size: 0.78rem;">
                        <i class="fas fa-arrow-up-right-from-square" style="font-size: 0.68rem; margin-right: 4px; opacity: 0.5;"></i>
                        ${escapeHtml(r.referrer || 'Direct')}
                    </td>
                </tr>`;
            });
            tbody.innerHTML = html;
        }

        function escapeHtml(str) {
            return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        }

        // Set interval for auto-refresh (every 10s)
        setInterval(() => fetchLiveStats(false), 10000);
    </script>
</body>
</html>
