<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
include '../conect.php';

// ambil barang milik user
$user = $_SESSION['username'];
$query = "SELECT * FROM barang WHERE pemilik = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $user);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body>
<h1>Dashboard</h1>

<p>Selamat datang di dashboard, <b><?= htmlspecialchars($user) ?></b>!</p>
<a href="../index.php">🏠 Kembali ke Marketplace</a> |
<a href="../logout.php">🚪 Logout</a>

<hr>

<h2>Menu Dashboard</h2>
<ul>
    <li><a href="tambah_barang.php">➕ Tambah Barang</a></li>
    <li><a href="barang_saya.php">📋 Barang Saya</a></li>
</ul>

<hr>

<h2>Barang Saya</h2>
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
