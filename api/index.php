<?php
// Get the requested path
$path = $_SERVER['REQUEST_URI'];

// Remove query string
if (($pos = strpos($path, '?')) !== false) {
    $path = substr($path, 0, $pos);
}

// Serve static files directly if they exist
$requested_file = __DIR__ . '/../' . ltrim($path, '/');
$static_extensions = ['css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'ico', 'svg', 'webp', 'woff', 'woff2', 'ttf', 'eot'];

if ($path !== '/' && file_exists($requested_file) && is_file($requested_file)) {
    $ext = pathinfo($requested_file, PATHINFO_EXTENSION);
    
    // Serve static files directly
    if (in_array($ext, $static_extensions)) {
        // Set appropriate content type
        $content_types = [
            'css' => 'text/css',
            'js' => 'application/javascript',
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'ico' => 'image/x-icon',
            'svg' => 'image/svg+xml',
            'webp' => 'image/webp',
            'woff' => 'font/woff',
            'woff2' => 'font/woff2',
            'ttf' => 'font/ttf',
            'eot' => 'application/vnd.ms-fontobject'
        ];
        
        if (isset($content_types[$ext])) {
            header('Content-Type: ' . $content_types[$ext]);
        }
        
        readfile($requested_file);
        exit;
    }
}

// For all other requests, serve the main PHP file
require_once __DIR__ . '/../index.php';
?>