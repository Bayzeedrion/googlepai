<?php
require_once '../config.php';

session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}

$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);
$users = $pdo->query("SELECT * FROM users")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
</head>
<body>
    <h2>Manage Users</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Google ID</th>
            <th>Created At</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['id']); ?></td>
                <td><?= htmlspecialchars($user['google_id']); ?></td>
                <td><?= htmlspecialchars($user['created_at']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>
