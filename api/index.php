<?php

try {
    // Prepare writable serverless storage directories in /tmp for Vercel
    $storageDirs = [
        '/tmp/storage/framework/views',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/framework/cache',
        '/tmp/storage/logs',
        '/tmp/bootstrap/cache'
    ];

    foreach ($storageDirs as $dir) {
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
    }

    // Set environment variables for serverless runtime
    $_ENV['APP_STORAGE'] = '/tmp/storage';
    $_SERVER['APP_STORAGE'] = '/tmp/storage';
    putenv('APP_STORAGE=/tmp/storage');

    // Check vendor autoload
    $autoload = __DIR__ . '/../vendor/autoload.php';
    if (!file_exists($autoload)) {
        throw new \Exception("Composer vendor directory is missing on serverless instance. Autoload path: " . $autoload);
    }

    // Forward Vercel request to Laravel public/index.php
    require __DIR__ . '/../public/index.php';

} catch (\Throwable $e) {
    http_response_code(500);
    echo "<h1>Vercel Serverless Exception Caught</h1>";
    echo "<p><strong>Message:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>File:</strong> " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "</p>";
    echo "<pre style='background:#f1f5f9; padding:15px; border-radius:8px;'>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
}
