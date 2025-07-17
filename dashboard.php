<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - ITEMSCHANGE</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-light min-h-screen p-10">
  <div class="bg-white rounded-xl shadow p-6 max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-dark">Welcome, <?php echo $_SESSION['username']; ?> 👋</h1>
      <a href="auth/logout.php" class="bg-error text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
    </div>
    <p class="text-muted">Ini adalah halaman dashboard. Kamu berhasil login!</p>
  </div>
</body>
</html>
