<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit;
}
include '../conect.php';

$err = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = trim($_POST['nama']);
    $kategori = trim($_POST['kategori']);
    $harga = $_POST['harga'];
    $tahun = $_POST['tahun'];
    $publik = isset($_POST['publik']) ? 1 : 0;
    $pemilik = $_SESSION['username'];

    // validasi form
    if ($nama == "" || $kategori == "" || $harga == "" || $tahun == "" || !is_numeric($harga) || !is_numeric($tahun)) {
        $err = "Isi semua field dengan benar!";
    } elseif (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] != 0) {
        $err = "Upload gambar gagal!";
    } else {
        $upload_dir = "../assets/images/";
        $filename = basename($_FILES["gambar"]["name"]);
        $target_file = $upload_dir . time() . "_" . $filename;

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $target_file_rel = "assets/images/" . basename($target_file);
            $stmt = $conn->prepare("INSERT INTO barang (nama, kategori, harga, tahun, gambar, pemilik, publik) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssisssi", $nama, $kategori, $harga, $tahun, $target_file_rel, $pemilik, $publik);
            $stmt->execute();

            header("Location: barangSaya.php");
            exit;
        } else {
            $err = "Gagal menyimpan gambar.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Barang</title>
</head>
<body>
<h1>Tambah Barang</h1>
<a href="dashboard.php">⬅️ Kembali ke Dashboard</a>

<?php if ($err) echo "<p style='color:red;'>$err</p>"; ?>

<form method="post" enctype="multipart/form-data">
    Nama: <input type="text" name="nama"><br>
    Kategori: <input type="text" name="kategori"><br>
    Harga: <input type="number" name="harga"><br>
    Tahun: <input type="number" name="tahun"><br>
    Gambar: <input type="file" name="gambar"><br>
    Publik? <input type="checkbox" name="publik" checked><br>
    <button type="submit">Simpan</button>
</form>

</body>
</html>
