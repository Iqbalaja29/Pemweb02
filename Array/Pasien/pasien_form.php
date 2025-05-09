<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Query data pasien jika ada ID
$id = $_GET['id'] ?? '';
$data = [];
if ($id) {
    $sql = "SELECT * FROM pasien WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pasien</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menggunakan font Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">

<div class="container mx-auto px-6 py-10 max-w-2xl">
    <h2 class="text-3xl font-extrabold text-gray-800 mb-6"><?= $id ? 'Edit' : 'Tambah' ?> Data Pasien</h2>

    <!-- Tombol kembali -->
    <a href="index.php" class="bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-700 shadow-lg transform hover:scale-105 transition duration-300 mb-6 inline-block">
         Kembali ke Daftar Pasien
    </a>

    <!-- Formulir -->
    <form method="POST" action="pasien_proses.php" class="bg-white shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4">
        <input type="hidden" name="id_edit" value="<?= $data['id'] ?? '' ?>">

        <!-- Kode -->
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-medium">Kode:</label>
            <input type="text" name="kode" value="<?= $data['kode'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-600">
        </div>

        <!-- Nama -->
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-medium">Nama:</label>
            <input type="text" name="nama" value="<?= $data['nama'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-600">
        </div>

        <!-- Tempat Lahir -->
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-medium">Tempat Lahir:</label>
            <input type="text" name="tmp_lahir" value="<?= $data['tmp_lahir'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-600">
        </div>

        <!-- Tanggal Lahir -->
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-medium">Tanggal Lahir:</label>
            <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-600">
        </div>

        <!-- Gender -->
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-medium">Gender:</label>
            <select name="gender" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-600">
                <option value="">-- Pilih --</option>
                <option value="L" <?= isset($data['gender']) && $data['gender'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= isset($data['gender']) && $data['gender'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-700 text-lg font-medium