<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Definisi Query
$id = $_GET['id'] ?? '';
$data = ['kode_unit' => '', 'nama_unit' => '', 'keterangan' => ''];

if ($id) {
    $stmt = $dbh->prepare("SELECT * FROM unit_kerja WHERE id = ?");
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Unit Kerja</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-200 p-6">

<div class="max-w-md mx-auto bg-gray-800 p-6 rounded-lg shadow-md">
    <h3 class="text-xl font-bold mb-4">Form Unit Kerja</h3>
    <form method="POST" action="unit_proses.php" class="space-y-4">
        <input type="hidden" name="id_edit" value="<?= $id ?>">
        
        <div>
            <label class="block text-sm font-medium text-gray-300">Kode Unit:</label>
            <input type="text" name="kode_unit" value="<?= htmlspecialchars($data['kode_unit']) ?>" class="mt-1 block w-full border border-gray-600 bg-gray-700 text-gray-200 p-2 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-300">Nama Unit:</label>
            <input type="text" name="nama_unit" value="<?= htmlspecialchars($data['nama_unit']) ?>" class="mt-1 block w-full border border-gray-600 bg-gray-700 text-gray-200 p-2 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-300">Keterangan:</label>
            <input type="text" name="keterangan" value="<?= htmlspecialchars($data['keterangan']) ?>" class="mt-1 block w-full border border-gray-600 bg-gray-700 text-gray-200 p-2 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <button type="submit" name="proses" value="<?= $id ? 'Update' : 'Simpan' ?>" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
            <?= $id ? 'Update' : 'Simpan' ?>
        </button>
    </form>
</div>

</body>
</html>