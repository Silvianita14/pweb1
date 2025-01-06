<?php
include 'Latihan_09_config.php'; // Memasukkan file konfigurasi database

// Inisialisasi variabel untuk menyimpan hasil pencarian
$hasil_pencarian = "";

// Memeriksa apakah input pencarian diterima
if (isset($_GET['keyword']) && !empty(trim($_GET['keyword']))) {
    $keyword = $conn->real_escape_string(trim($_GET['keyword']));

    // Query pencarian data alumni berdasarkan nama, jurusan, atau tahun lulus
    $sql = "SELECT * FROM alumni 
            WHERE nama LIKE '%$keyword%' 
            OR jurusan LIKE '%$keyword%' 
            OR tahun_lulus LIKE '%$keyword%'";

    // Eksekusi query pencarian
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        // Menampilkan hasil pencarian dalam daftar
        $hasil_pencarian .= "<ul class='list-group'>";
        while ($row = $result->fetch_assoc()) {
            $hasil_pencarian .= "<li class='list-group-item'>";
            $hasil_pencarian .= "<strong>Nama:</strong> " . htmlspecialchars($row['nama']) . "<br>";
            $hasil_pencarian .= "<strong>Jurusan:</strong> " . htmlspecialchars($row['jurusan']) . "<br>";
            $hasil_pencarian .= "<strong>Tahun Lulus:</strong> " . htmlspecialchars($row['tahun_lulus']);
            $hasil_pencarian .= "</li>";
        }
        $hasil_pencarian .= "</ul>";
    } else {
        // Jika tidak ada data yang cocok
        $hasil_pencarian = "<div class='alert alert-warning'>Tidak ditemukan data alumni untuk kata kunci: <b>" . htmlspecialchars($keyword) . "</b></div>";
    }
} elseif (isset($_GET['keyword'])) {
    // Jika input kosong
    $hasil_pencarian = "<div class='alert alert-warning'>Silakan masukkan kata kunci pencarian.</div>";
}

// Tutup koneksi database
$conn->close();
?>

<!-- Halaman Penelusuran -->
<div class="container mt-5">
    <h2 class="mb-4">Penelusuran Alumni</h2>

    <!-- Form pencarian -->
    <form method="GET" action="">
        <div class="mb-3">
            <label for="keyword" class="form-label">Cari Alumni</label>
            <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Nama, jurusan, atau tahun lulus">
        </div>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <!-- Menampilkan hasil pencarian -->
    <div class="mt-4">
        <?php echo $hasil_pencarian; ?>
    </div>
</div>
