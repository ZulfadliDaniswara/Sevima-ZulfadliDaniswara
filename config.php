<?php
// Konfigurasi database
$hostname = "localhost";
$username = "root";
$password = "";
$database = "test_web";

// Menghubungkan ke database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
