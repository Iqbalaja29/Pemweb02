<?php
require_once '../dbkoneksi.php';

// Ambil data periksa + join ke pasien & paramedik
$sql = "SELECT p.*, ps.nama AS nama_pasien, pm.nama AS nama_dokter
        FROM periksa p
        LEFT JOIN pasien ps ON ps.id = p.pasien_id
        LEFT JOIN paramedik pm ON pm.id = p.dokter_id";
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pemeriksaan</title>
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
    <h3 class="text-3xl font-bold mb-6 text-white">Data Pemeriksaan</h3>
    <a href="periksa_form.php" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition duration-200 mb-4 inline-block">Tambah Pemeriksaan</a>

    <table class="min-w-full bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <thead class="bg-black text-white">
            <tr>
                <th class="py-3 px-4">No</th>
                <th class="py-3 px-4">Tanggal</th>
                <th class="py-3 px-4">Berat</th>
                <th class="py-3 px-4">Tinggi</th>
                <th class="py-3 px-4">Tensi</th>
                <th class="py-3 px-4">Keterangan</th>
                <th class="py-3 px-4">Pasien</th>
                <th class="py-3 px-4">Dokter</th>
                <th class="py-3 px-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            foreach($rs as $row): ?>
            <tr class="border-b border-gray-700 hover:bg-gray-700 transition duration-300">
                <td class="py-2 px-4"><?= $no++ ?></td>
                <td class="py-2 px-4"><?= $row->tanggal ?></td>
                <td class="py-2 px-4"><?= $row->berat ?></td>
                <td class="py-2 px-4"><?= $row->tinggi ?></td>
                <td class="py-2 px-4"><?= $row->tensi ?></td>
                <td class="py-2 px-4"><?= $row->keterangan ?></td>
                <td class="py-2 px-4"><?= $row->nama_pasien ?></td>
                <td class="py-2 px-4"><?= $row->nama_dokter ?></td>
                <td class="py-2 px-4">
                    <a href="periksa_form.php?id=<?= $row->id ?>" class="text-blue-400 hover:underline">Edit</a> |
                    <a href="periksa_proses.php?hapus=1&id=<?= $row->id ?>" class="text-red-400 hover:underline" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>