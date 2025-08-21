<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get the requested path
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$query = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

// Define the base directory
$baseDir = __DIR__ . '/../';
$requestedFile = $baseDir . ltrim($path, '/');

// List of static file extensions to serve directly
$staticExtensions = [
    'css', 'js', 'png', 'jpg', 'jpeg', 'gif', 'ico', 
    'svg', 'webp', 'woff', 'woff2', 'ttf', 'eot', 'txt'
];

// Get the file extension
$ext = pathinfo($path, PATHINFO_EXTENSION);

// Serve static files directly if they exist
if (!empty($ext) && in_array($ext, $staticExtensions)) {
    if (file_exists($requestedFile) && is_file($requestedFile)) {
        // Set appropriate content type
        $contentTypes = [
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
            'txt' => 'text/plain'
        ];
        
        if (isset($contentTypes[$ext])) {
            header('Content-Type: ' . $contentTypes[$ext]);
        }
        
        readfile($requestedFile);
        exit;
    } else {
        // Static file not found
        http_response_code(404);
        echo "Static file not found: " . htmlspecialchars($path);
        exit;
    }
}

// For all PHP requests, serve the main application
try {
    // Check if the main index.php exists
    $mainIndex = $baseDir . 'index.php';
    if (file_exists($mainIndex)) {
        require_once $mainIndex;
    } else {
        http_response_code(500);
        echo "Main index.php file not found in: " . htmlspecialchars($baseDir);
        exit;
    }
} catch (Exception $e) {
    http_response_code(500);
    echo "Error loading application: " . htmlspecialchars($e->getMessage());
    exit;
}
?>
