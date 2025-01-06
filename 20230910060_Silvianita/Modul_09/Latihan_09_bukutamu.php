<?php
include 'Latihan_09_config.php';

// Menangani pengiriman form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $pesan = $_POST['pesan'];
    $tanggal = date("Y-m-d H:i:s");

    $sql = "INSERT INTO buku_tamu (nama, email, pesan, tanggal) VALUES ('$nama', '$email', '$pesan', '$tanggal')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success'>Pesan Anda berhasil disimpan.</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

?>

<div class="container mt-5">
    <h2 class="mb-4">Buku Tamu</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="pesan" class="form-label">Pesan</label>
            <textarea class="form-control" id="pesan" name="pesan" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>

    <h3 class="mt-5">Daftar Buku Tamu</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Pesan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($conn) {
                $sql = "SELECT * FROM buku_tamu ORDER BY tanggal DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['pesan'] . "</td>";
                        echo "<td>" . $row['tanggal'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Belum ada pesan di buku tamu.</td></tr>";
                }
            } else {
                echo "<div class='alert alert-danger'>Koneksi database tidak tersedia.</div>";
            }
            ?>
        </tbody>
    </table>
</div>