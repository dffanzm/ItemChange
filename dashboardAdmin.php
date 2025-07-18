<?php
include 'conect.php';

$query = "SELECT * FROM barang ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #F3F4F6; /* Light Gray */
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1100px;
            margin: 40px auto;
            background-color: #FFFFFF; /* White */
            padding: 20px 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        h2 {
            color: #111827; /* Dark Gray */
            border-bottom: 2px solid #2563EB; /* Primary Blue */
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }
        th {
            background-color: #2563EB; /* Primary Blue */
            color: #FFFFFF;
            padding: 10px 12px;
            text-align: left;
        }
        td {
            padding: 10px 12px;
            border-bottom: 1px solid #E5E7EB; /* Light border */
            color: #111827;
        }
        img {
            width: 90px;
            border-radius: 6px;
        }
        .delete-btn {
            background-color: #EF4444; /* Error Red */
            color: white;
            padding: 6px 12px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        .delete-btn:hover {
            background-color: #dc2626; /* Darker red */
        }
        .badge-user {
            background-color: #FACC15; /* Accent Yellow */
            color: #111827;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Dashboard Admin</h2>
        <p style="color:#9CA3AF;">Menampilkan semua barang dari semua pengguna</p>

        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Tahun</th>
                    <th>Gambar</th>
                    <th>Pemilik</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama']) ?></td>
                    <td><?= htmlspecialchars($row['kategori']) ?></td>
                    <td>Rp<?= number_format($row['harga']) ?></td>
                    <td><?= htmlspecialchars($row['tahun']) ?></td>
                    <td><img src="<?= htmlspecialchars($row['gambar']) ?>" alt="Gambar"></td>
                    <td><span class="badge-user"><?= htmlspecialchars($row['pemilik']) ?></span></td>
                    <td><a href="delete_barang.php?id=<?= $row['id'] ?>" class="delete-btn" onclick="return confirm('Yakin ingin menghapus barang ini?')">Hapus</a></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
