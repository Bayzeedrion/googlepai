<?php
// Root directory
define('ROOT_DIR', dirname(__FILE__));
define('VENDOR_DIR', ROOT_DIR . '/vendor');
define('ENV_FILE', ROOT_DIR . '/.env');

// Include Composer autoloader
require_once VENDOR_DIR . '/autoload.php';

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(ROOT_DIR);
$dotenv->load();

// Database credentials from environment variables
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
?>
