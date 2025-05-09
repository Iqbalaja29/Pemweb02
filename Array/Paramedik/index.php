<?php
require_once '../dbkoneksi.php';

$sql = "SELECT * FROM paramedik";
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Paramedik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-200">

<div class="container mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold mb-6 text-white">Data Paramedik</h1>

    <!-- Tombol Tambah Paramedik -->
    <a href="paramedik_form.php" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition duration-200 mb-4 inline-block">+ Tambah Paramedik</a>

    <!-- Table Paramedik -->
    <table class="min-w-full bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <thead class="bg-black text-white">
            <tr>
                <th class="py-3 px-4">No</th>
                <th class="py-3 px-4">Nama</th>
                <th class="py-3 px-4">Gender</th>
                <th class="py-3 px-4">Tempat, Tgl Lahir</th>
                <th class="py-3 px-4">Kategori</th>
                <th class="py-3 px-4">Telpon</th>
                <th class="py-3 px-4">Alamat</th>
                <th class="py-3 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach($rs as $row){
            ?>
            <tr class="border-b border-gray-700 hover:bg-gray-700 transition duration-300">
                <td class="py-2 px-4"><?= $no++ ?></td>
                <td class="py-2 px-4"><?= $row->nama ?></td>
                <td class="py-2 px-4"><?= $row->gender ?></td>
                <td class="py-2 px-4"><?= $row->tmp_lahir . ', ' . $row->tgl_lahir ?></td>
                <td class="py-2 px-4"><?= $row->kategori ?></td>
                <td class="py-2 px-4"><?= $row->telpon ?></td>
                <td class="py-2 px-4"><?= $row->alamat ?></td>
                <td class="py-2 px-4">
                    <a href="paramedik_form.php?id=<?= $row->id ?>" class="text-blue-400 hover:underline">Edit</a> |
                    <a href="paramedik_proses.php?hapus=1&id=<?= $row->id ?>" class="text-red-400 hover:underline" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="mt-8 text-right">
        <a href="../Dashboard/admin.php" class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg text-sm shadow hover:bg-blue-700 transition duration-200">Kembali ke Beranda</a>
    </div>
</div>

</body>
</html>