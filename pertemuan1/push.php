<?php
//array_push
$komponen =["Mobo", "Processor",
            "RAM", "SSd", "GPU"];
//menambahkan  elemen di akhir array
array_push($komponen, "PSU", "Cassing");

echo "Setelah  Push<br>";
foreach ($komponen as $k) {
    echo "$k <br>";
}
?>