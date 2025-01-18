<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Simpan file jika diunggah
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $uploadDir = 'uploads/';
        $filePath = $uploadDir . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $filePath);
    }

    // Simpan data kontak ke file teks (bisa diganti dengan database)
    $contactData = "Nama: $name\nEmail: $email\nPesan: $message\n";
    if (isset($filePath)) {
        $contactData .= "File: $filePath\n";
    }
    file_put_contents('contacts.txt', $contactData, FILE_APPEND);

    echo "Pesan Anda telah dikirim!";
}
?>
