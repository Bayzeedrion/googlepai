<?php
require_once '../vendor/autoload.php';
use Google\Client;
use Google\Service\PhotosLibrary;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$pdo = new PDO("mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
$stmt = $pdo->query("SELECT access_token FROM users LIMIT 1");
$user = $stmt->fetch();

if (!$user) {
    die("No user authenticated.");
}

$client = new Client();
$client->setAccessToken(json_decode($user['access_token'], true));

$photosService = new PhotosLibrary($client);
$response = $photosService->mediaItems->listMediaItems();

foreach ($response->getMediaItems() as $item) {
    echo "<img src='{$item['baseUrl']}'>";
}
