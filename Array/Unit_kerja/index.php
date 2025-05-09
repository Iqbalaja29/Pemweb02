<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Definisi Query
$sql = "SELECT * FROM unit_kerja";
$rs = $dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Unit Kerja</title>
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
    <a href="unit_form.php" class="bg-green-600 text-white px-4 py-2 rounded-lg shadow hover:bg-green-700 transition duration-200 mb-4 inline-block">+ Tambah Unit Kerja</a>
    
    <table class="table-auto border border-gray-700 mt-4 w-full">
        <thead class="bg-gray-800">
            <tr>
                <th class="px-4 py-2">No</th>
                <th class="px-4 py-2">Kode Unit</th>
                <th class="px-4 py-2">Nama Unit</th>
                <th class="px-4 py-2">Keterangan</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-700">
        <?php $no = 1; foreach($rs as $row): ?>
            <tr class="hover:bg-gray-700 transition duration-300">
                <td class="px-4 py-2"><?= $no++ ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row['kode_unit']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row['nama_unit']) ?></td>
                <td class="px-4 py-2"><?= htmlspecialchars($row['keterangan']) ?></td>
                <td class="px-4 py-2">
                    <a href="unit_form.php?id=<?= $row['id'] ?>" class="text-blue-400 hover:underline">Edit</a> |
                    <a href="unit_proses.php?hapus=1&id=<?= $row['id'] ?>" class="text-red-400 hover:underline" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>