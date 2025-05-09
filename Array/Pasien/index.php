<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Ambil data pasien
$sql = "SELECT * FROM pasien";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menggunakan font Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-200">

<div class="container mx-auto px-4 py-6">
    <h1 class="text-4xl font-bold mb-6 text-white">Data Pasien</h1>

    <!-- Tombol navigasi -->
    <div class="mb-4 flex justify-between">
        <a href="../Dashboard/admin.php" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition duration-300">Kembali ke Beranda</a>
        <a href="pasien_form.php" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition duration-300">Tambah Pasien</a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <thead class="bg-black text-white">
                <tr>
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Kode</th>
                    <th class="py-3 px-4 text-left">Nama</th>
                    <th class="py-3 px-4 text-left">Tempat, Tgl Lahir</th>
                    <th class="py-3 px-4 text-left">Gender</th>
                    <th class="py-3 px-4 text-left">Email</th>
                    <th class="py-3 px-4 text-left">Alamat</th>
                    <th class="py-3 px-4 text-left">Kelurahan</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $no = 1; foreach($rs as $row): ?>
                <tr class="border-b border-gray-700 hover:bg-gray-700 transition duration-300">
                    <td class="py-2 px-4"><?= $no++ ?></td>
                    <td class="py-2 px-4"><?= $row['kode'] ?></td>
                    <td class="py-2 px-4"><?= $row['nama'] ?></td>
                    <td class="py-2 px-4"><?= $row['tmp_lahir'] . ', ' . $row['tgl_lahir'] ?></td>
                    <td class="py-2 px-4"><?= $row['gender'] ?></td>
                    <td class="py-2 px-4"><?= $row['email'] ?></td>
                    <td class="py-2 px-4"><?= $row['alamat'] ?></td>
                    <td class="py-2 px-4"><?= $row['kelurahan_id'] ?></td>
                    <td class="py-2 px-4">
                        <a href="pasien_form.php?id=<?= $row['id'] ?>" class="text-blue-400 hover:underline">Edit</a> |
                        <a href="pasien_proses.php?hapus=1&id=<?= $row['id'] ?>" class="text-red-400 hover:underline" onclick="return confirm('Hapus data ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>