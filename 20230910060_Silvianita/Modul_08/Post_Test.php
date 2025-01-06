<?php
$a = 6;
$b = 14;

// Penjumlahan variabel
$hasil = $a + $b;

// Menggunakan tanda kutip ganda (interpolasi variabel)
echo "Hasil dari penjumlahan $a dan $b adalah $hasil.\n <br>";

// Menggunakan tanda kutip tunggal (operator penggabungan)
echo 'Hasil dari penjumlahan ' . $a . ' dan ' . $b . ' adalah ' . $hasil . ".\n <br>";

// Menggunakan template string dengan penggabungan langsung
echo "Hasil: " . ($a + $b) . "\n";
?>