<?php
$servername = "localhost";
$username = "root";
$password = ""; //Sesuaikan jika ada password untuk user root
$dbname = "db_alumni";

//Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}
?>