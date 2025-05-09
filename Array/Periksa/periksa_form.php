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
<body class="bg-gray-900 text-gray-200 p-6">

<div class="container mx-auto">
    <h3 class="text-3xl font-bold mb-6 text-white">Data Pemeriksaan</h3>
    <a href="periksa_form.php" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition duration-200 mb-4 inline-block">Tambah Pemeriksaan</a>

    <table class="min-w-full bg-gray-800 shadow-md rounded-lg overflow-hidden">
        <thead class="bg-gray-700 text-white">
            <tr>
                <th class="px-4 py-3">No</th>
                <th class="px-4 py-3">Tanggal</th>
                <th class="px-4 py-3">Berat</th>
                <th class="px-4 py-3">Tinggi</th>
                <th class="px-4 py-3">Tensi</th>
                <th class="px-4 py-3">Keterangan</th>
                <th class="px-4 py-3">Pasien</th>
                <th class="px-4 py-3">Dokter</th>
                <th class="px-4 py-3">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-600">
            <?php 
            $no = 1;
            foreach($rs as $row): ?>
            <tr class="hover:bg-gray-700 transition duration-300">
                <td class="px-4 py-2"><?= $no++ ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row->tanggal) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row->berat) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row->tinggi) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row->tensi) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row->keterangan) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row->nama_pasien) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row->nama_dokter) ?></td>
                <td class="px-4 py-2">
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