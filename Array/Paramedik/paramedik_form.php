<?php
// Koneksi Database
require_once '../dbkoneksi.php';

// Definisi Query
$id = $_GET['id'] ?? null;
$nama = $gender = $tmp_lahir = $tgl_lahir = $kategori = $telpon = $alamat = '';
$proses = "Simpan";

if ($id) {
    $sql = "SELECT * FROM paramedik WHERE id = ?";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$id]);
    $row = $stmt->fetch();

    if ($row) {
        $nama = $row->nama;
        $gender = $row->gender;
        $tmp_lahir = $row->tmp_lahir;
        $tgl_lahir = $row->tgl_lahir;
        $kategori = $row->kategori;
        $telpon = $row->telpon;
        $alamat = $row->alamat;
        $proses = "Update";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran Paramedik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menggunakan font Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap');

        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-900 text-gray-200">

<div class="container mx-auto px-6 py-10 max-w-2xl">
    <h2 class="text-3xl font-extrabold text-white mb-6"><?= $id ? 'Edit' : 'Tambah' ?> Data Paramedik</h2>

    <form method="POST" action="paramedik_proses.php" class="bg-gray-800 shadow-xl rounded-lg px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-300 text-lg font-medium">Nama:</label>
            <input type="text" name="nama" value="<?= $nama ?>" class="w-full border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-300 text-lg font-medium">Gender:</label>
            <select name="gender" class="w-full border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="L" <?= ($gender == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= ($gender == 'P') ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-300 text-lg font-medium">Tempat Lahir:</label>
            <input type="text" name="tmp_lahir" value="<?= $tmp_lahir ?>" class="w-full border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-300 text-lg font-medium">Tanggal Lahir:</label>
            <input type="date" name="tgl_lahir" value="<?= $tgl_lahir ?>" class="w-full border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-300 text-lg font-medium">Kategori:</label>
            <input type="text" name="kategori" value="<?= $kategori ?>" class="w-full border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-300 text-lg font-medium">Telpon:</label>
            <input type="text" name="telpon" value="<?= $telpon ?>" class="w-full border border-gray-600 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="