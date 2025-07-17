<?php
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
<body>
  <h2>Selamat datang, <?php echo $_SESSION['username']; ?>!</h2>
  <p><a href="logout.php">Logout</a></p>
</body>
</html>
