<?php
// api/index.php - Router for Vercel PHP

// Get the request path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$base_dir = __DIR__ . '/../';

// Serve static files directly
if (preg_match('/\.(css|js|png|jpg|jpeg|gif|ico|svg|webp|woff|woff2|ttf|eot|mp4)$/i', $path)) {
    $file_path = $base_dir . ltrim($path, '/');
    
    if (file_exists($file_path) && is_file($file_path)) {
        // Set appropriate content type
        $mime_types = [
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
            'eot' => 'application/vnd.ms-fontobject',
            'mp4' => 'video/mp4'
        ];
        
        $ext = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
        if (isset($mime_types[$ext])) {
            header('Content-Type: ' . $mime_types[$ext]);
        }
        
        // Add caching headers for static assets
        if (in_array($ext, ['css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'ico', 'svg', 'webp', 'woff', 'woff2', 'ttf', 'eot'])) {
            header('Cache-Control: public, max-age=31536000, immutable');
        }
        
        readfile($file_path);
        exit;
    } else {
        http_response_code(404);
        echo "File not found: " . htmlspecialchars($path);
        exit;
    }
}

// For all other requests, serve the main application
$main_app = $base_dir . 'index.php';
if (file_exists($main_app)) {
    require_once $main_app;
} else {
    http_response_code(500);
    echo "Main application file not found";
    exit;
}
?>
