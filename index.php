<?php
session_start();
include 'conect.php'; // koneksi ke DB

// ambil data barang publik
$query = "SELECT * FROM barang WHERE publik = 1";
$result = mysqli_query($conn, $query);
$conn = mysqli_connect($host, $user, $pass, $db);
?>

<!DOCTYPE html>
<html>
<head>
<title>Menu Utama</title>
</head>
<body>
<h1>Item Change</h1>

<?php if (isset($_SESSION['username'])): ?>
    <p>Selamat datang, <b><?= htmlspecialchars($_SESSION['username']) ?></b>!</p>
    <a href="dashboard/dashboard.php">📊 Dashboard</a> |
<?php else: ?>
    <a href="login.php">🔑 Login</a> |
    <a href="register.php">📝 Register</a>
<?php endif; ?>

<hr>

<h2>Barang Publik</h2>
<table border="1" cellpadding="5">
<tr>
    <th>Nama</th>
    <th>Kategori</th>
    <th>Harga</th>
    <th>Tahun</th>
    <th>Gambar</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)): ?>
<tr>
    <td><?= htmlspecialchars($row['nama']) ?></td>
    <td><?= htmlspecialchars($row['kategori']) ?></td>
    <td><?= number_format($row['harga']) ?></td>
    <td><?= htmlspecialchars($row['tahun']) ?></td>
    <td><img src="<?= htmlspecialchars($row['gambar']) ?>" width="100"></td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>
