<?php
$ar_buah = ["m"=>"Mangga","a"=>"Apel"
            ,"s"=>"Semangka", "n"=>"Nanas"];

            echo '<ol>';
            sort($ar_buah);
            echo 'hr/';
            echo '</ol>';
            foreach ($ar_buah as $key => $value) {
                echo '<li>' . $key . ' - ' . $value . '</li>';
            }
            echo '</ol>';
?>