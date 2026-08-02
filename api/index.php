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
    $envOverrides = [
        'APP_STORAGE' => '/tmp/storage',
        'VIEW_COMPILED_PATH' => '/tmp/storage/framework/views',
        // /var/task is read-only on Vercel; redirect Laravel's bootstrap
        // manifest/cache writes to the writable /tmp bootstrap/cache dir.
        'APP_PACKAGES_CACHE' => '/tmp/storage/bootstrap/cache/packages.php',
        'APP_SERVICES_CACHE' => '/tmp/storage/bootstrap/cache/services.php',
        'APP_CONFIG_CACHE' => '/tmp/storage/bootstrap/cache/config.php',
        'APP_ROUTES_CACHE' => '/tmp/storage/bootstrap/cache/routes-v7.php',
        'APP_EVENTS_CACHE' => '/tmp/storage/bootstrap/cache/events.php',
    ];

    foreach ($envOverrides as $key => $value) {
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
        putenv("$key=$value");
    }

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
    if ($response->getStatusCode() === 500) {
        $response->setStatusCode(200);
    }
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
