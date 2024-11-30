<?php
require_once '../config.php';

use Google\Client;

$client = new Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['REDIRECT_URI']);

if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    try {
        $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
        $stmt = $pdo->prepare("INSERT INTO users (google_id, access_token, refresh_token) VALUES (?, ?, ?)");
        $stmt->execute([
            $token['id_token'],
            json_encode($token['access_token']),
            json_encode($token['refresh_token'] ?? null)
        ]);

        echo "Authentication successful!";
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
} else {
    echo "Authorization failed!";
}
