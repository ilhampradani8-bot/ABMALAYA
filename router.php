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

// If it's a file that exists (like assets/img/logo.png), let the server handle it
if ($uri !== '' && file_exists($uri)) {
    return false;
}

// Handle sub-folder routes or root-relative paths if necessary
// This helps when assets are linked with a leading slash /assets/...
if (file_exists(__DIR__ . '/' . $uri) && !is_dir(__DIR__ . '/' . $uri)) {
    return false;
}

// Fallback to 404
http_response_code(404);
echo "<h1>404 - Page Not Found</h1>";
echo "<p>The page you are looking for does not exist.</p>";
echo "<a href='/'>Return Home</a>";
