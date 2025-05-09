<?php
$siswa = ["Tian", "Asep",
            "Ahong", "Cipe"];
          //menampilkan array awal
echo "<br>Array awal : <br>";
print_r($siswa);

//menghapus elemen terakhir dari array
$orang_terakhir = array_pop($siswa);

//menampilkan elemen terakhir
echo "<br>Elemen yang akan dihapus" .$orang_terakhir. "\n";

//menampilkan array setelah dihapus
echo "<br>Array setelah dihapus : <br>";
print_r($siswa);

?>