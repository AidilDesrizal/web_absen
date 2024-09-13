<?php
// Sertakan file koneksi
include 'db_connect.php';

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $siswa_id = intval($_POST['siswa_id']); // Pastikan ID adalah integer
    $jenis_absen = $_POST['jenis_absen'];   // Jenis absen ('masuk' atau 'pulang')

    // Menyusun query SQL
    $sql = "INSERT INTO absen (siswa_id, jenis_absen) VALUES (?, ?)";

    // Menyiapkan statement
    $stmt = $conn->prepare($sql);

    // Mengecek apakah statement berhasil disiapkan
    if ($stmt === false) {
        die("Statement gagal disiapkan: " . $conn->error);
    }

    // Mengikat parameter
    $stmt->bind_param("is", $siswa_id, $jenis_absen);

    // Menjalankan statement
    if ($stmt->execute()) {
        echo "Data absen berhasil ditambahkan";
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
    <title>Input Absen Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Form Absen Siswa</h2>
    <form action="absen.php" method="post">
        <label for="siswa_id">ID Siswa:</label>
        <input type="number" id="siswa_id" name="siswa_id" required>
        <br>
        <label for="jenis_absen">Jenis Absen:</label>
        <select id="jenis_absen" name="jenis_absen" required>
            <option value="masuk">Masuk</option>
            <option value="pulang">Pulang</option>
        </select>
        <br>
        <input type="submit" value="Kirim">
    </form>
</body>
</html>
