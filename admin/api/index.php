<?php
require_once '../config.php';

use Google\Client;

$client = new Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['REDIRECT_URI']);
$client->addScope('https://www.googleapis.com/auth/photoslibrary.readonly');

$authUrl = $client->createAuthUrl();
echo "<a href='$authUrl'>Login with Google</a>";
