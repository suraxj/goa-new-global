<?php

$host = '127.0.0.1';
$port = 3306;
$db   = 'goa';
$user = 'root';
$pass = '';
$file = __DIR__ . '/goa_database_backup.sql';

if (!file_exists($file)) {
    die("ERROR: Backup file '{$file}' not found.\n");
}

try {
    $pdo = new PDO("mysql:host={$host};port={$port}", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    echo "1. Re-creating database '{$db}'...\n";
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$db}`");
    $pdo->exec("USE `{$db}`");

    echo "2. Importing SQL dump from 'goa_database_backup.sql'...\n";
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 0;");
    $sql = file_get_contents($file);
    $pdo->exec($sql);
    $pdo->exec("SET FOREIGN_KEY_CHECKS = 1;");

    echo "SUCCESS: Database '{$db}' restored completely from 'goa_database_backup.sql'!\n";

} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
