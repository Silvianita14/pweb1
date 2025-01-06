<?php
include 'Latihan_09_config.php';

// Menangani form tambah lowongan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $posisi = $_POST['posisi'];
    $perusahaan = $_POST['perusahaan'];
    $lokasi = $_POST['lokasi'];
    $deskripsi = $_POST['deskripsi'];

    $sql = "INSERT INTO bursakerja (posisi, perusahaan, lokasi, deskripsi) 
            VALUES ('$posisi', '$perusahaan', '$lokasi', '$deskripsi')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Lowongan berhasil ditambahkan.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}
?>

<div class="container mt-5">
    <h2>Bursa Kerja</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="posisi" class="form-label">Posisi</label>
            <input type="text" class="form-control" id="posisi" name="posisi" required>
        </div>
        <div class="mb-3">
            <label for="perusahaan" class="form-label">Perusahaan</label>
            <input type="text" class="form-control" id="perusahaan" name="perusahaan" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Lowongan</button>
    </form>

    <hr>

    <h3>Daftar Lowongan</h3>
    <?php
    $result = $conn->query("SELECT * FROM bursakerja");
    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li><b>" . $row['posisi'] . "</b> di <i>" . $row['perusahaan'] . "</i> - " . $row['lokasi'] . "<br>" . $row['deskripsi'] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Tidak ada lowongan.";
    }
    ?>
</div>