<?php
/**
 * Temporary cleanup script to remove leftover WordPress files and folders.
 * Access this script via: https://abmalaya.com/clean-wp.php?confirm=yes_delete
 */

header('Content-Type: text/plain; charset=utf-8');

// Security check to prevent unauthorized runs
if (!isset($_GET['confirm']) || $_GET['confirm'] !== 'yes_delete') {
    die("Error: Please access this script with the correct confirmation parameter.\nExample: clean-wp.php?confirm=yes_delete");
}

echo "Starting WordPress files cleanup...\n\n";

// List of WordPress-specific folders to delete
$wp_folders = [
    'wp-admin',
    'wp-includes',
    'wp-content'
];

// List of WordPress-specific files in the root to delete
$wp_files = [
    'wp-activate.php',
    'wp-blog-header.php',
    'wp-comments-post.php',
    'wp-config.php',
    'wp-config-sample.php',
    'wp-cron.php',
    'wp-links-opml.php',
    'wp-load.php',
    'wp-login.php',
    'wp-mail.php',
    'wp-settings.php',
    'wp-signup.php',
    'wp-trackback.php',
    'xmlrpc.php'
];

// Recursive directory deletion function
function deleteDir($dirPath) {
    if (!is_dir($dirPath)) {
        return false;
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            deleteDir($file);
        } else {
            unlink($file);
        }
    }
    return rmdir($dirPath);
}

// 1. Delete Folders
foreach ($wp_folders as $folder) {
    $path = __DIR__ . '/' . $folder;
    if (file_exists($path)) {
        echo "Deleting folder: $folder... ";
        if (deleteDir($path)) {
            echo "SUCCESS\n";
        } else {
            echo "FAILED (Check permissions)\n";
        }
    } else {
        echo "Folder not found: $folder (Skipped)\n";
    }
}

// 2. Delete Files
foreach ($wp_files as $file) {
    $path = __DIR__ . '/' . $file;
    if (file_exists($path)) {
        echo "Deleting file: $file... ";
        if (unlink($path)) {
            echo "SUCCESS\n";
        } else {
            echo "FAILED\n";
        }
    } else {
        echo "File not found: $file (Skipped)\n";
    }
}

echo "\nCleanup process completed!\n";
echo "Please delete this 'clean-wp.php' file from the repository immediately after run.\n";
