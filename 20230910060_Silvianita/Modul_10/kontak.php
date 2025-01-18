<?php
// Konfigurasi koneksi ke database
$host = "localhost"; // Nama host
$user = "root";      // Nama user database (default: root)
$pass = "";          // Password database (default: kosong untuk XAMPP)
$db   = "db_portofolio"; // Nama database

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses data form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = htmlspecialchars($conn->real_escape_string($_POST['nama']));
    $email = htmlspecialchars($conn->real_escape_string($_POST['email']));
    $pesan = htmlspecialchars($conn->real_escape_string($_POST['pesan']));

    // Query untuk menyimpan data
    $sql = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";

    // Eksekusi query
    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman sukses
        header('Location:terkirim.html');
        exit();
    } else {
        // Tampilkan pesan error jika gagal
        echo "Terjadi kesalahan: " . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>
