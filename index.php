<?php
session_start();

// Kalau sudah login, arahkan ke dashboard
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    header("Location: dashboard.php");
    exit;
}

// Kalau belum login, arahkan ke halaman login
header("Location: login.php");
exit;
?>
