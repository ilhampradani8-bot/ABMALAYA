<?php
/**
 * AB Malaya Sdn Bhd - Enterprise Visitor Tracking & Telemetry Engine (V2)
 * 
 * Supports:
 * - Hourly breakdown (00:00 - 23:00)
 * - Daily & Monthly Journaling
 * - Per-IP analysis & tracking
 * - Device, OS, and Browser classification
 * - Dual persistence (Atomic JSON + optional MySQL)
 */

if (!defined('ABM_TRACKER_LOADED')) {
    define('ABM_TRACKER_LOADED', true);

    if (!ini_get('date.timezone')) {
        date_default_timezone_set('Asia/Kuala_Lumpur');
    }

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

    function abm_parse_user_agent($ua = null) {
        $ua = $ua ?? ($_SERVER['HTTP_USER_AGENT'] ?? '');
        
        $device = 'Desktop';
        $os = 'Unknown OS';
        $browser = 'Unknown Browser';
        $is_bot = false;

        if (preg_match('/(bot|crawl|spider|slurp|curl|python|wget|facebookexternalhit|whatsapp)/i', $ua)) {
            $is_bot = true;
        }

        if (preg_match('/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i', $ua)) {
            $device = 'Tablet';
        } elseif (preg_match('/(mobile|iphone|ipod|blackberry|opera mini|iemobile|kindle|silk-mobi)/i', $ua)) {
            $device = 'Mobile';
        }

        if (preg_match('/windows nt 10/i', $ua)) $os = 'Windows 10/11';
        elseif (preg_match('/windows nt 6\.3/i', $ua)) $os = 'Windows 8.1';
        elseif (preg_match('/windows nt 6\.2/i', $ua)) $os = 'Windows 8';
        elseif (preg_match('/windows nt 6\.1/i', $ua)) $os = 'Windows 7';
        elseif (preg_match('/windows/i', $ua)) $os = 'Windows';
        elseif (preg_match('/macintosh|mac os x/i', $ua)) $os = 'macOS';
        elseif (preg_match('/iphone|ipad|ipod/i', $ua)) $os = 'iOS';
        elseif (preg_match('/android/i', $ua)) $os = 'Android';
        elseif (preg_match('/linux/i', $ua)) $os = 'Linux';

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

    function abm_track_visit($pageKey = 'home', $pageTitle = 'Home') {
        if (php_sapi_name() === 'cli' || isset($_GET['format'])) {
            return;
        }

        $ip = abm_get_client_ip();
        $masked_ip = abm_mask_ip($ip);
        $ua_info = abm_parse_user_agent();
        
        $uri = strtok($_SERVER['REQUEST_URI'] ?? '/', '?');
        if (empty($uri)) $uri = '/';

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
            '/visitors' => 'Visitor Counter Desk',
            '/visitors.php' => 'Visitor Counter Desk',
            '/visitor-counter' => 'Visitor Counter Desk',
            '/visitor-counter.php' => 'Visitor Counter Desk'
        ];
        $display_page = $page_names[$uri] ?? (ucfirst(trim($pageKey, '/_.')) ?: $pageTitle);

        $data_dir = __DIR__ . '/../data';
        if (!is_dir($data_dir)) {
            @mkdir($data_dir, 0755, true);
        }
        $json_file = $data_dir . '/visitor_counter.json';

        $cookie_name = 'abm_vis_id';
        if (empty($_COOKIE[$cookie_name])) {
            $visitor_uuid = bin2hex(random_bytes(16));
            @setcookie($cookie_name, $visitor_uuid, time() + (86400 * 365), '/');
        } else {
            $visitor_uuid = $_COOKIE[$cookie_name];
        }

        $now = time();
        $today_date = date('Y-m-d', $now);
        $today_month = date('Y-m', $now);
        $current_hour = (int)date('G', $now); // 0 to 23
        $now_str = date('Y-m-d H:i:s', $now);
        $time_str = date('H:i:s', $now);

        $daily_hash = md5($ip . '_' . $today_date . '_' . $visitor_uuid);

        // Atomic file read and update
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
                        'total_views' => 1,
                        'total_uniques' => 1,
                        'today_views' => 1,
                        'today_uniques' => 1,
                        'yesterday_views' => 0,
                        'yesterday_uniques' => 0,
                        'date_today' => $today_date,
                        'last_visit' => $now_str
                    ],
                    'hourly_distribution' => array_fill(0, 24, 0),
                    'journal' => [],
                    'per_ip' => [],
                    'pages' => [],
                    'devices' => ['Desktop' => 0, 'Mobile' => 0, 'Tablet' => 0],
                    'os' => [],
                    'browsers' => [],
                    'daily_hashes' => [],
                    'recent_visits' => []
                ];
            }

            // Ensure sub-arrays exist
            if (!isset($data['hourly_distribution']) || !is_array($data['hourly_distribution'])) {
                $data['hourly_distribution'] = array_fill(0, 24, 0);
            }
            if (!isset($data['journal'])) $data['journal'] = [];
            if (!isset($data['per_ip'])) $data['per_ip'] = [];
            if (!isset($data['os'])) $data['os'] = [];

            // Check Day Rollover
            if ($data['summary']['date_today'] !== $today_date) {
                $data['summary']['yesterday_views'] = $data['summary']['today_views'];
                $data['summary']['yesterday_uniques'] = $data['summary']['today_uniques'];
                $data['summary']['today_views'] = 0;
                $data['summary']['today_uniques'] = 0;
                $data['summary']['date_today'] = $today_date;
                $data['daily_hashes'] = [];
            }

            // Daily Unique Check
            $is_daily_unique = false;
            if (!in_array($daily_hash, $data['daily_hashes'] ?? [])) {
                $is_daily_unique = true;
                $data['daily_hashes'][] = $daily_hash;
                if (count($data['daily_hashes']) > 5000) {
                    array_shift($data['daily_hashes']);
                }
            }

            // Exclude dashboard itself from bloating public counts
            $is_dashboard_hit = (strpos($uri, 'visitor') !== false);
            if (!$is_dashboard_hit) {
                $data['summary']['total_views']++;
                $data['summary']['today_views']++;

                if ($is_daily_unique) {
                    $data['summary']['total_uniques']++;
                    $data['summary']['today_uniques']++;
                }

                // Hourly Distribution
                $data['hourly_distribution'][$current_hour] = ($data['hourly_distribution'][$current_hour] ?? 0) + 1;

                // Journal per Month and Date
                if (!isset($data['journal'][$today_month])) {
                    $data['journal'][$today_month] = [];
                }
                if (!isset($data['journal'][$today_month][$today_date])) {
                    $data['journal'][$today_month][$today_date] = [
                        'date' => $today_date,
                        'views' => 0,
                        'uniques' => 0,
                        'hourly' => array_fill(0, 24, 0),
                        'devices' => ['Desktop' => 0, 'Mobile' => 0, 'Tablet' => 0],
                        'top_page' => $display_page
                    ];
                }

                $data['journal'][$today_month][$today_date]['views']++;
                if ($is_daily_unique) {
                    $data['journal'][$today_month][$today_date]['uniques']++;
                }
                $data['journal'][$today_month][$today_date]['hourly'][$current_hour]++;
                $dev = $ua_info['device'];
                $data['journal'][$today_month][$today_date]['devices'][$dev] = ($data['journal'][$today_month][$today_date]['devices'][$dev] ?? 0) + 1;
                $data['journal'][$today_month][$today_date]['top_page'] = $display_page;

                // Per-IP Tracking
                $ref = $_SERVER['HTTP_REFERER'] ?? 'Direct Access';
                if (strpos($ref, 'abmalaya.com') !== false || strpos($ref, 'localhost') !== false) {
                    $ref = 'Internal Link';
                } elseif (strpos($ref, 'google') !== false) {
                    $ref = 'Google Search';
                } elseif (strpos($ref, 'wa.me') !== false || strpos($ref, 'whatsapp') !== false) {
                    $ref = 'WhatsApp';
                } elseif (strlen($ref) > 35) {
                    $ref = substr($ref, 0, 32) . '...';
                }

                $data['per_ip'][$ip] = [
                    'ip' => $ip,
                    'masked_ip' => $masked_ip,
                    'hits' => ($data['per_ip'][$ip]['hits'] ?? 0) + 1,
                    'last_seen' => $now_str,
                    'last_time' => $time_str,
                    'device' => $ua_info['device'],
                    'os' => $ua_info['os'],
                    'browser' => $ua_info['browser'],
                    'page' => $display_page,
                    'ref' => $ref
                ];

                // Global Devices, OS, Browsers, Pages
                $data['pages'][$display_page] = ($data['pages'][$display_page] ?? 0) + 1;
                $data['devices'][$dev] = ($data['devices'][$dev] ?? 0) + 1;
                $data['os'][$ua_info['os']] = ($data['os'][$ua_info['os']] ?? 0) + 1;
                $data['browsers'][$ua_info['browser']] = ($data['browsers'][$ua_info['browser']] ?? 0) + 1;

                // Comprehensive Per-Page Deep Tracking
                if (!isset($data['per_page'])) $data['per_page'] = [];
                if (!isset($data['per_page'][$display_page])) {
                    $data['per_page'][$display_page] = [
                        'title' => $display_page,
                        'path' => $uri,
                        'views' => 0,
                        'uniques' => 0,
                        'hourly' => array_fill(0, 24, 0),
                        'devices' => ['Desktop' => 0, 'Mobile' => 0, 'Tablet' => 0],
                        'ips' => [],
                        'last_seen' => $now_str,
                        'peak_hour' => '10:00 - 11:00'
                    ];
                }
                $data['per_page'][$display_page]['views']++;
                if ($is_daily_unique) {
                    $data['per_page'][$display_page]['uniques']++;
                }
                $data['per_page'][$display_page]['hourly'][$current_hour]++;
                $data['per_page'][$display_page]['devices'][$dev] = ($data['per_page'][$display_page]['devices'][$dev] ?? 0) + 1;
                $data['per_page'][$display_page]['last_seen'] = $now_str;
                $data['per_page'][$display_page]['ips'][$masked_ip] = [
                    'hits' => ($data['per_page'][$display_page]['ips'][$masked_ip]['hits'] ?? 0) + 1,
                    'last_seen' => $time_str,
                    'device' => $dev,
                    'os' => $ua_info['os'],
                    'browser' => $ua_info['browser']
                ];

                $max_h = 0; $best_h = 10;
                foreach ($data['per_page'][$display_page]['hourly'] as $h_idx => $h_val) {
                    if ($h_val > $max_h) { $max_h = $h_val; $best_h = $h_idx; }
                }
                $data['per_page'][$display_page]['peak_hour'] = sprintf("%02d:00 - %02d:00", $best_h, ($best_h + 1) % 24);
            }

            $data['summary']['last_visit'] = $now_str;

            // Recent Visits Log (Last 60 entries)
            $new_log = [
                'time' => $time_str,
                'date' => date('d M Y', $now),
                'page' => $display_page,
                'path' => $uri,
                'device' => $ua_info['device'],
                'os' => $ua_info['os'],
                'browser' => $ua_info['browser'],
                'ip' => $masked_ip,
                'raw_ip' => $ip,
                'referrer' => $ref ?? 'Direct Access',
                'timestamp' => $now
            ];

            if (!isset($data['recent_visits']) || !is_array($data['recent_visits'])) {
                $data['recent_visits'] = [];
            }
            array_unshift($data['recent_visits'], $new_log);
            if (count($data['recent_visits']) > 60) {
                $data['recent_visits'] = array_slice($data['recent_visits'], 0, 60);
            }

            ftruncate($fp, 0);
            rewind($fp);
            fwrite($fp, json_encode($data, JSON_PRETTY_PRINT));
            fflush($fp);
            flock($fp, LOCK_UN);
            fclose($fp);
        }

        abm_sync_to_mysql($new_log ?? null, $is_daily_unique ?? false);
    }

    function abm_sync_to_mysql($log, $is_unique) {
        if (!function_exists('getFrontendDb') && file_exists(__DIR__ . '/../db_connect.php')) {
            @include_once __DIR__ . '/../db_connect.php';
        }
        if (!function_exists('getFrontendDb')) return;

        try {
            $conn = @getFrontendDb();
            if (!$conn || $conn->connect_error) return;

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
        } catch (\Throwable $e) {}
    }

    function abm_get_visitor_data() {
        $json_file = __DIR__ . '/../data/visitor_counter.json';
        if (file_exists($json_file)) {
            $content = @file_get_contents($json_file);
            $data = json_decode($content, true);
            if (is_array($data) && !empty($data['summary'])) {
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

        return [
            'summary' => [
                'total_views' => 0,
                'total_uniques' => 0,
                'today_views' => 0,
                'today_uniques' => 0,
                'yesterday_views' => 0,
                'yesterday_uniques' => 0,
                'active_now' => 1,
                'date_today' => date('Y-m-d'),
                'last_visit' => date('Y-m-d H:i:s')
            ],
            'hourly_distribution' => array_fill(0, 24, 0),
            'journal' => [],
            'per_ip' => [],
            'pages' => [],
            'per_page' => [],
            'devices' => ['Desktop' => 0, 'Mobile' => 0, 'Tablet' => 0],
            'os' => [],
            'browsers' => [],
            'recent_visits' => []
        ];
    }
}
