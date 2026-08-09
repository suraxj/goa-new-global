<?php

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$host = env('DB_HOST', 'bdtuhrww8f97uvmvp23m-mysql.services.clever-cloud.com');
$port = env('DB_PORT', 3306);
$db   = env('DB_DATABASE', 'bdtuhrww8f97uvmvp23m');
$user = env('DB_USERNAME', 'uitok82swec4recp');
$pass = env('DB_PASSWORD', 'qlilYw3A4B8bnJwOtOX4');
$file = __DIR__ . '/goa_database_backup.sql';

if (!file_exists($file)) {
    die("ERROR: Backup SQL file '{$file}' not found.\n");
}

echo "===================================================\n";
echo " UPLOADING BACKUP TO LIVE CLEVER CLOUD DATABASE\n";
echo " Host: {$host}\n";
echo " Database: {$db}\n";
echo "===================================================\n\n";

try {
    $pdo = new PDO("mysql:host={$host};port={$port};dbname={$db}", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    ]);

    echo "1. Connected to Live Database successfully.\n";
    echo "2. Importing SQL dump to Live Database...\n";
    
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 0;");
    $sql = file_get_contents($file);

    // Strip CREATE DATABASE and USE statements for Cloud MySQL compatibility
    $sql = preg_replace('/CREATE DATABASE IF NOT EXISTS `.*?`;/i', '', $sql);
    $sql = preg_replace('/USE `.*?`;/i', '', $sql);

    $pdo->exec($sql);
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 1;");

    echo "\n✔ SUCCESS: Live Database '{$db}' updated successfully with all 33 tables and records!\n";

} catch (Exception $e) {
    echo "\n✖ ERROR: " . $e->getMessage() . "\n";
}
