<?php
require_once '../dbkoneksi.php';
$sql = "SELECT * FROM kelurahan";
$rs = $dbh->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Kelurahan</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
  </style>
</head>
<body class="bg-gray-900 min-h-screen p-6">
  <div class="max-w-4xl mx-auto bg-gray-800 shadow-xl rounded-2xl p-8">
    <div class="flex justify-between items-center mb-8">
      <h1 class="text-3xl font-semibold text-white">📍 Daftar Kelurahan</h1>
      <a href="kelurahan_form.php"
         class="inline-block bg-gradient-to-r from-green-600 to-green-700 text-white px-5 py-2 rounded-lg text-sm shadow hover:from-green-700 hover:to-green-800 transition duration-200">
        Tambah Kelurahan
      </a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full text-sm text-left text-gray-300">
        <thead class="bg-gray-700 border-b border-gray-600">
          <tr>
            <th class="px-4 py-3 font-medium">No</th>
            <th class="px-4 py-3 font-medium">Nama Kelurahan</th>
            <th class="px-4 py-3 font-medium">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-600">
          <?php $no = 1; while ($row = $rs->fetch(PDO::FETCH_ASSOC)): ?>
          <tr class="hover:bg-gray-600 transition">
            <td class="px-4 py-3"><?= $no++ ?></td>
            <td class="px-4 py-3"><?= htmlspecialchars($row['nama_kelurahan']) ?></td>
            <td class="px-4 py-3 space-x-3">
              <a href="kelurahan_form.php?id=<?= $row['id'] ?>"
                 class="text-yellow-400 hover:text-yellow-500 font-medium hover:underline">Edit</a>
              <a href="kelurahan_proses.php?hapus=1&id=<?= $row['id'] ?>"
                 class="text-red-400 hover:text-red-500 font-medium hover:underline"
                 onclick="return confirm('Yakin ingin menghapus data ini?')">
                Hapus
              </a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>

    <div class="mt-8 text-right">
        <a href="../Dashboard/admin.php"
        class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg text-sm shadow hover:bg-blue-700 transition duration-200">
        Kembali ke Beranda
    </a>
</div>

  </div>
</body>
</html>