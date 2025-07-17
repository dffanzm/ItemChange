<?php
session_start();
include 'conect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['login'] = true;
    $_SESSION['username'] = $username;
    header("Location: ../pages/dashboard.php");
} else {
    echo "Login gagal";
}
?>
