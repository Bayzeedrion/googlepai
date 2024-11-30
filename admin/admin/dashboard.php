<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h2>Welcome, <?= htmlspecialchars($_SESSION['admin']); ?></h2>
    <a href="users.php">Manage Users</a>
    <a href="settings.php">Manage API Settings</a>
    <a href="logout.php">Logout</a>
</body>
</html>
