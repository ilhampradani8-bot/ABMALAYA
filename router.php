<?php
/**
 * Advanced Router for PHP Built-in Server
 * Supports clean URLs and static assets.
 */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = ltrim($uri, '/');

// If URI is empty or 'home', load index.php
if ($uri === '' || $uri === 'home' || $uri === 'index') {
    include 'index.php';
    exit;
}

// Check if a corresponding .php file exists
if (file_exists($uri . '.php')) {
    include $uri . '.php';
    exit;
}

// Intercept all static file requests to bypass the buggy built-in PHP server's static serving bug (ERR_INVALID_HTTP_RESPONSE)
if ($uri !== '' && file_exists($uri) && !is_dir($uri)) {
    $file = __DIR__ . '/' . $uri;
    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    
    if ($ext === 'php') {
        include $file;
        exit;
    }
    
    $mimes = [
        'css'   => 'text/css',
        'js'    => 'application/javascript',
        'png'   => 'image/png',
        'jpg'   => 'image/jpeg',
        'jpeg'  => 'image/jpeg',
        'gif'   => 'image/gif',
        'webp'  => 'image/webp',
        'svg'   => 'image/svg+xml',
        'ico'   => 'image/x-icon',
        'ttf'   => 'font/ttf',
        'otf'   => 'font/otf',
        'woff'  => 'font/woff',
        'woff2' => 'font/woff2',
        'pdf'   => 'application/pdf',
        'mp4'   => 'video/mp4'
    ];
    
    $mime = isset($mimes[$ext]) ? $mimes[$ext] : 'application/octet-stream';
    
    header("Content-Type: " . $mime);
    header("Content-Length: " . filesize($file));
    header("Cache-Control: public, max-age=3600");
    readfile($file);
    exit;
}

// Fallback to 404
http_response_code(404);
echo "<h1>404 - Page Not Found</h1>";
echo "<p>The page you are looking for does not exist.</p>";
echo "<a href='/'>Return Home</a>";
