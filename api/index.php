<?php

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

// Forward Vercel request to Laravel public/index.php
require __DIR__ . '/../public/index.php';
