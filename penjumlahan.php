<?php
session_start();
include('config.php');

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Jika tombol logout ditekan
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Penjumlahan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Fitur Penjumlahan</h1>
        <div class="content">
            <p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
            <p>Ini adalah halaman fitur penjumlahan.</p>
            <form action="" method="POST" class="form">
                <label for="number1">Angka 1:</label>
                <input type="number" name="number1" required><br>
                <label for="number2">Angka 2:</label>
                <input type="number" name="number2" required><br>
                <input type="submit" name="add" value="Tambah">
            </form>
            <?php
            if (isset($_POST['add'])) {
                $number1 = $_POST['number1'];
                $number2 = $_POST['number2'];
                $result = $number1 + $number2;
                echo "<p>Hasil penjumlahan: $result</p>";
            }
            ?>
            <form action="" method="POST" class="form">
                <input type="submit" name="logout" value="Logout">
            </form>
        </div>
    </div>
</body>
</html>
