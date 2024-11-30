<?php
require_once 'config.php';

try {
    // Connect to MySQL
    $pdo = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS " . DB_NAME);
    $pdo->exec("USE " . DB_NAME);

    // Import schema and demo data
    $schema = file_get_contents(ROOT_DIR . '/database_import.sql');
    $pdo->exec($schema);

    echo "Database imported successfully!";
} catch (PDOException $e) {
    echo "Error importing database: " . $e->getMessage();
}
?>
