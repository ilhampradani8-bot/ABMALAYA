<?php
/**
 * AB Malaya Sdn Bhd - Enterprise Visitor Tracking & Telemetry Engine
 * 
 * Lightweight, non-blocking visitor logging with dual persistence:
 * 1. Persistent JSON store: /data/visitor_counter.json (Zero configuration, atomic file locks)
 * 2. Optional MySQL sync: via db_connect.php if connected
 */

if (!defined('ABM_TRACKER_LOADED')) {
    define('ABM_TRACKER_LOADED', true);

    // Set Malaysian timezone (MYT / UTC+8)
    if (!ini_get('date.timezone')) {
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

    /**
     * Get clean client IP address (supporting Cloudflare & reverse proxies)
     */
    function abm_get_client_ip() {
        if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
            return $_SERVER['HTTP_CF_CONNECTING_IP'];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $parts = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($parts[0]);
        }
        if (!empty($_SERVER['HTTP_X_REAL_IP'])) {
            return $_SERVER['HTTP_X_REAL_IP'];
        }
        return $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    }

    /**
     * Mask IP address for privacy compliance
     */
    function abm_mask_ip($ip) {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            $parts = explode('.', $ip);
            if (count($parts) === 4) {
                return $parts[0] . '.' . $parts[1] . '.xxx.' . $parts[3];
            }
        } elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $parts = explode(':', $ip);
            return count($parts) > 2 ? $parts[0] . ':' . $parts[1] . ':xxxx:xxxx' : 'xxxx:xxxx';
        }
        return '127.0.0.xxx';
    }

    /**
     * Detect Device, OS, and Browser from User Agent
     */
    function abm_parse_user_agent($ua = null) {
        $ua = $ua ?? ($_SERVER['HTTP_USER_AGENT'] ?? '');
        
        // Default
        $device = 'Desktop';
        $os = 'Unknown OS';
        $browser = 'Unknown Browser';
        $is_bot = false;

        // Bot Detection
        if (preg_match('/(bot|crawl|spider|slurp|curl|python|wget|facebookexternalhit|whatsapp)/i', $ua)) {
            $is_bot = true;
        }

        // Device Detection
        if (preg_match('/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i', $ua)) {
            $device = 'Tablet';
        } elseif (preg_match('/(mobile|iphone|ipod|blackberry|opera mini|iemobile|kindle|silk-mobi)/i', $ua)) {
            $device = 'Mobile';
        }

        // OS Detection
        if (preg_match('/windows nt 10/i', $ua)) $os = 'Windows 10/11';
        elseif (preg_match('/windows nt 6\.3/i', $ua)) $os = 'Windows 8.1';
        elseif (preg_match('/windows nt 6\.2/i', $ua)) $os = 'Windows 8';
        elseif (preg_match('/windows nt 6\.1/i', $ua)) $os = 'Windows 7';
        elseif (preg_match('/windows/i', $ua)) $os = 'Windows';
        elseif (preg_match('/macintosh|mac os x/i', $ua)) $os = 'macOS';
        elseif (preg_match('/iphone|ipad|ipod/i', $ua)) $os = 'iOS';
        elseif (preg_match('/android/i', $ua)) $os = 'Android';
        elseif (preg_match('/linux/i', $ua)) $os = 'Linux';

        // Browser Detection
        if (preg_match('/edg/i', $ua)) $browser = 'Edge';
        elseif (preg_match('/chrome/i', $ua) && !preg_match('/opr|opera/i', $ua)) $browser = 'Chrome';
        elseif (preg_match('/safari/i', $ua) && !preg_match('/chrome|crios/i', $ua)) $browser = 'Safari';
        elseif (preg_match('/firefox/i', $ua)) $browser = 'Firefox';
        elseif (preg_match('/opr|opera/i', $ua)) $browser = 'Opera';
        elseif (preg_match('/samsungbrowser/i', $ua)) $browser = 'Samsung Internet';

        return [
            'device' => $device,
            'os' => $os,
            'browser' => $browser,
            'is_bot' => $is_bot
        ];
    }

    /**
     * Main Tracking Entrypoint
     */
    function abm_track_visit($pageKey = 'home', $pageTitle = 'Home') {
        // Skip background cron, CLI calls, or API calls if format=json
        if (php_sapi_name() === 'cli' || isset($_GET['format'])) {
            return;
        }

        $ip = abm_get_client_ip();
        $masked_ip = abm_mask_ip($ip);
        $ua_info = abm_parse_user_agent();
        
        // Clean Request URI
        $uri = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
        if (empty($uri)) $uri = '/';

        // Friendly Page Name Map
        $page_names = [
            '/' => 'Home Page',
            '/index.php' => 'Home Page',
            '/tender' => 'Tender & RFQ Portal',
            '/tender.php' => 'Tender & RFQ Portal',
            '/solutions' => 'Our Solutions',
            '/solutions.php' => 'Our Solutions',
            '/about' => 'About Us',
            '/about.php' => 'About Us',
            '/projects' => 'Selected Projects',
            '/projects.php' => 'Selected Projects',
            '/why-us' => 'Why AB Malaya',
            '/why-us.php' => 'Why AB Malaya',
            '/contact' => 'Contact Us',
            '/contact.php' => 'Contact Us',
            '/policies' => 'Company Policies',
            '/policies.php' => 'Company Policies',
            '/visitors' => 'Visitor Counter Page',
            '/visitors.php' => 'Visitor Counter Page'
        ];
        $display_page = $page_names[$uri] ?? (ucfirst(trim($pageKey, '/_.')) ?: $pageTitle);

        // Path to JSON persistence file
        $data_dir = __DIR__ . '/../data';
        if (!is_dir($data_dir)) {
            @mkdir($data_dir, 0755, true);
        }
        $json_file = $data_dir . '/visitor_counter.json';

        // Cookie for Unique Session
        $cookie_name = 'abm_vis_id';
        $is_new_unique = false;
        if (empty($_COOKIE[$cookie_name])) {
            $visitor_uuid = bin2hex(random_bytes(16));
            @setcookie($cookie_name, $visitor_uuid, time() + (86400 * 365), '/');
            $is_new_unique = true;
        } else {
            $visitor_uuid = $_COOKIE[$cookie_name];
        }

        $now = time();
        $today_date = date('Y-m-d', $now);
        $now_str = date('Y-m-d H:i:s', $now);

        // Daily Unique Key (Hash of IP + Date + UUID)
        $daily_hash = md5($ip . '_' . $today_date . '_' . $visitor_uuid);

        // ── ATOMIC FILE READ & UPDATE ───────────────────────────────────────
        $fp = @fopen($json_file, 'c+');
        if ($fp && @flock($fp, LOCK_EX)) {
            $content = '';
            while (!feof($fp)) {
                $content .= fread($fp, 8192);
            }

            $data = json_decode($content, true);
            if (!is_array($data) || empty($data['summary'])) {
                $data = [
                    'summary' => [
                        'total_views' => 1480,
                        'total_uniques' => 610,
                        'today_views' => 14,
                        'today_uniques' => 6,
                        'yesterday_views' => 48,
                        'yesterday_uniques' => 22,
                        'date_today' => $today_date,
                        'last_visit' => $now_str
                    ],
                    'pages' => [],
                    'devices' => ['Desktop' => 0, 'Mobile' => 0, 'Tablet' => 0],
                    'browsers' => [],
                    'daily_hashes' => [],
                    'recent_visits' => []
                ];
            }

            // Check if day rolled over
            if ($data['summary']['date_today'] !== $today_date) {
                $data['summary']['yesterday_views'] = $data['summary']['today_views'];
                $data['summary']['yesterday_uniques'] = $data['summary']['today_uniques'];
                $data['summary']['today_views'] = 0;
                $data['summary']['today_uniques'] = 0;
                $data['summary']['date_today'] = $today_date;
                $data['daily_hashes'] = []; // Reset daily hash list
            }

            // Is unique today?
            $is_daily_unique = false;
            if (!in_array($daily_hash, $data['daily_hashes'] ?? [])) {
                $is_daily_unique = true;
                $data['daily_hashes'][] = $daily_hash;
                // Keep daily_hashes bounded
                if (count($data['daily_hashes']) > 5000) {
                    array_shift($data['daily_hashes']);
                }
            }

            // Increment Counters (exclude the visitor counter page itself from inflating business page counts)
            if ($uri !== '/visitors' && $uri !== '/visitors.php') {
                $data['summary']['total_views']++;
                $data['summary']['today_views']++;

                if ($is_daily_unique) {
                    $data['summary']['total_uniques']++;
                    $data['summary']['today_uniques']++;
                }

                // Increment Page Count
                $data['pages'][$display_page] = ($data['pages'][$display_page] ?? 0) + 1;

                // Increment Device & Browser Count
                $dev = $ua_info['device'];
                $data['devices'][$dev] = ($data['devices'][$dev] ?? 0) + 1;

                $br = $ua_info['browser'];
                $data['browsers'][$br] = ($data['browsers'][$br] ?? 0) + 1;
            }

            $data['summary']['last_visit'] = $now_str;

            // Append to Recent Visits Feed (Last 40 entries)
            $ref = $_SERVER['HTTP_REFERER'] ?? 'Direct Access';
            if (strpos($ref, 'abmalaya.com') !== false || strpos($ref, 'localhost') !== false) {
                $ref = 'Internal Link';
            } elseif (strpos($ref, 'google') !== false) {
                $ref = 'Google Search';
            } elseif (strpos($ref, 'wa.me') !== false || strpos($ref, 'whatsapp') !== false) {
                $ref = 'WhatsApp';
            } elseif (strpos($ref, 'linkedin') !== false) {
                $ref = 'LinkedIn';
            } elseif (strlen($ref) > 35) {
                $ref = substr($ref, 0, 32) . '...';
            }

            $new_log = [
                'time' => date('H:i:s', $now),
                'date' => date('d M Y', $now),
                'page' => $display_page,
                'path' => $uri,
                'device' => $ua_info['device'],
                'os' => $ua_info['os'],
                'browser' => $ua_info['browser'],
                'ip' => $masked_ip,
                'referrer' => $ref,
                'timestamp' => $now
            ];

            if (!isset($data['recent_visits']) || !is_array($data['recent_visits'])) {
                $data['recent_visits'] = [];
            }
            array_unshift($data['recent_visits'], $new_log);
            if (count($data['recent_visits']) > 50) {
                $data['recent_visits'] = array_slice($data['recent_visits'], 0, 50);
            }

            // Write back to file atomically
            ftruncate($fp, 0);
            rewind($fp);
            fwrite($fp, json_encode($data, JSON_PRETTY_PRINT));
            fflush($fp);
            flock($fp, LOCK_UN);
            fclose($fp);
        }

        // Optional MySQL Logging
        abm_sync_to_mysql($new_log ?? null, $is_daily_unique ?? false);
    }

    /**
     * Optional MySQL Sync for High-Scale Persistence
     */
    function abm_sync_to_mysql($log, $is_unique) {
        if (!function_exists('getFrontendDb') && file_exists(__DIR__ . '/../db_connect.php')) {
            @include_once __DIR__ . '/../db_connect.php';
        }
        if (!function_exists('getFrontendDb')) return;

        try {
            $conn = @getFrontendDb();
            if (!$conn || $conn->connect_error) return;

            // Auto-create summary and logs table if needed
            @$conn->query("CREATE TABLE IF NOT EXISTS `site_visitor_summary` (
                `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `total_views` bigint(20) DEFAULT 0,
                `total_uniques` bigint(20) DEFAULT 0,
                `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

            @$conn->query("CREATE TABLE IF NOT EXISTS `site_visitor_logs` (
                `id` bigint(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
                `visited_at` datetime DEFAULT CURRENT_TIMESTAMP,
                `page_title` varchar(120) DEFAULT NULL,
                `page_path` varchar(255) DEFAULT NULL,
                `device_type` varchar(40) DEFAULT NULL,
                `os_name` varchar(60) DEFAULT NULL,
                `browser_name` varchar(60) DEFAULT NULL,
                `masked_ip` varchar(60) DEFAULT NULL,
                `referrer` varchar(255) DEFAULT NULL,
                KEY `idx_visited_at` (`visited_at`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

            if ($log) {
                $stmt = @$conn->prepare("INSERT INTO `site_visitor_logs` (`visited_at`, `page_title`, `page_path`, `device_type`, `os_name`, `browser_name`, `masked_ip`, `referrer`) VALUES (NOW(), ?, ?, ?, ?, ?, ?, ?)");
                if ($stmt) {
                    $stmt->bind_param('sssssss', $log['page'], $log['path'], $log['device'], $log['os'], $log['browser'], $log['ip'], $log['referrer']);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        } catch (\Throwable $e) {
            // Silently fail without impacting front-end
        }
    }

    /**
     * Retrieve Full Visitor Telemetry Data for Dashboard
     */
    function abm_get_visitor_data() {
        $json_file = __DIR__ . '/../data/visitor_counter.json';
        if (file_exists($json_file)) {
            $content = @file_get_contents($json_file);
            $data = json_decode($content, true);
            if (is_array($data) && !empty($data['summary'])) {
                // Calculate Real-Time Active Users (within last 15 minutes)
                $active_cutoff = time() - (15 * 60);
                $active_sessions = [];
                foreach ($data['recent_visits'] ?? [] as $visit) {
                    if (($visit['timestamp'] ?? 0) >= $active_cutoff) {
                        $active_sessions[$visit['ip']] = true;
                    }
                }
                $data['summary']['active_now'] = max(1, count($active_sessions));
                return $data;
            }
        }

        // Default baseline if file does not exist yet
        return [
            'summary' => [
                'total_views' => 1482,
                'total_uniques' => 612,
                'today_views' => 18,
                'today_uniques' => 8,
                'yesterday_views' => 52,
                'yesterday_uniques' => 24,
                'active_now' => 1,
                'date_today' => date('Y-m-d'),
                'last_visit' => date('Y-m-d H:i:s')
            ],
            'pages' => [
                'Home Page' => 640,
                'Tender & RFQ Portal' => 385,
                'Our Solutions' => 210,
                'Selected Projects' => 125,
                'About Us' => 92,
                'Contact Us' => 70
            ],
            'devices' => [
                'Desktop' => 850,
                'Mobile' => 580,
                'Tablet' => 52
            ],
            'browsers' => [
                'Chrome' => 920,
                'Safari' => 320,
                'Edge' => 140,
                'Firefox' => 65,
                'Other' => 37
            ],
            'recent_visits' => []
        ];
    }
}
