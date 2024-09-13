<?php
// Sertakan file koneksi
include 'db_connect.php';

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $siswa_id = intval($_POST['siswa_id']);
    $tema = $_POST['tema'];
    $content = $_POST['content'];
    
    // Tangani upload foto
    $foto = null;
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/' . $foto);
    }

    // Menyusun query SQL
    $sql = "INSERT INTO jurnal (siswa_id, tema, content, foto) VALUES (?, ?, ?, ?)";

    // Menyiapkan statement
    $stmt = $conn->prepare($sql);

    // Mengecek apakah statement berhasil disiapkan
    if ($stmt === false) {
        die("Statement gagal disiapkan: " . $conn->error);
    }

    // Mengikat parameter
    $stmt->bind_param("isss", $siswa_id, $tema, $content, $foto);

    // Menjalankan statement
    if ($stmt->execute()) {
        echo "Data jurnal berhasil ditambahkan";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Menutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Jurnal PKL Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Form Jurnal PKL Siswa</h2>
    <form action="jurnal.php" method="post" enctype="multipart/form-data">
        <label for="siswa_id">ID Siswa:</label>
        <input type="number" id="siswa_id" name="siswa_id" required>
        <br>
        <label for="tema">Tema Jurnal:</label>
        <input type="text" id="tema" name="tema" required>
        <br>
        <label for="content">Isi Jurnal:</label>
        <textarea id="content" name="content" rows="6" required></textarea>
        <br>
        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
