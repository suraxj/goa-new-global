<?php

try {
    // Create serverless /tmp storage directories
    $storageDirs = [
        '/tmp/storage/framework/views',
        '/tmp/storage/framework/sessions',
        '/tmp/storage/framework/cache',
        '/tmp/storage/bootstrap/cache',
        '/tmp/storage/logs'
    ];

    foreach ($storageDirs as $dir) {
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
    }

    // Set serverless environment variables
    $_ENV['APP_STORAGE'] = '/tmp/storage';
    $_SERVER['APP_STORAGE'] = '/tmp/storage';
    $_ENV['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
    $_SERVER['VIEW_COMPILED_PATH'] = '/tmp/storage/framework/views';
    putenv('APP_STORAGE=/tmp/storage');
    putenv('VIEW_COMPILED_PATH=/tmp/storage/framework/views');

    // Load composer autoloader
    $autoload = __DIR__ . '/../vendor/autoload.php';
    if (!file_exists($autoload)) {
        throw new \Exception("Composer vendor directory missing at path: " . $autoload);
    }
    require_once $autoload;

    // Load Laravel application
    $app = require_once __DIR__ . '/../bootstrap/app.php';

    // Handle HTTP Request
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    $response = $kernel->handle(
        $request = Illuminate\Http\Request::capture()
    );
    $response->send();
    $kernel->terminate($request, $response);

} catch (\Throwable $e) {
    http_response_code(200);
    echo "<!DOCTYPE html><html><head><title>Vercel Serverless Diagnostic Output</title>";
    echo "<style>body{font-family:sans-serif;padding:30px;background:#0f172a;color:#f8fafc;} h1{color:#f43f5e;} pre{background:#1e293b;padding:20px;border-radius:10px;overflow:auto;color:#38bdf8;}</style></head><body>";
    echo "<h1>⚠️ Vercel Serverless Diagnostic Output</h1>";
    echo "<p><strong>Exception:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
    echo "<p><strong>Location:</strong> " . htmlspecialchars($e->getFile()) . ":" . $e->getLine() . "</p>";
    echo "<h3>Stack Trace:</h3>";
    echo "<pre>" . htmlspecialchars($e->getTraceAsString()) . "</pre>";
    echo "</body></html>";
}
