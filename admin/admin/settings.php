<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}
require '../vendor/autoload.php';

$pdo = new PDO("mysql:host=localhost;dbname=itplicbi_gapi", "itplicbi_gapi", "3mmP@tAtAK0M");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE settings SET google_client_id = ?, google_client_secret = ?, redirect_uri = ? WHERE id = 1");
    $stmt->execute([$_POST['client_id'], $_POST['client_secret'], $_POST['redirect_uri']]);
    $success = "Settings updated successfully!";
}

$settings = $pdo->query("SELECT * FROM settings LIMIT 1")->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage API Settings</title>
</head>
<body>
    <h2>API Settings</h2>
    <form method="POST">
        <label>Client ID:</label>
        <input type="text" name="client_id" value="<?= htmlspecialchars($settings['google_client_id']); ?>" required>
        <br>
        <label>Client Secret:</label>
        <input type="text" name="client_secret" value="<?= htmlspecialchars($settings['google_client_secret']); ?>" required>
        <br>
        <label>Redirect URI:</label>
        <input type="text" name="redirect_uri" value="<?= htmlspecialchars($settings['redirect_uri']); ?>" required>
        <br>
        <button type="submit">Save</button>
    </form>
    <?php if (isset($success)) echo "<p>$success</p>"; ?>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
