<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
include '../conect.php';

$pemilik = $_SESSION['username'];
$query = "SELECT * FROM barang WHERE pemilik = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "s", $pemilik);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html>
<head>
<title>Barang Saya</title>
</head>
<body>
<h1>Barang Saya</h1>
<a href="dashboard.php">⬅️ Kembali ke Dashboard</a>

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
    <td><img src="../<?= htmlspecialchars($row['gambar']) ?>" width="100"></td>
</tr>
<?php endwhile; ?>
</table>

</body>
</html>
