<?php
session_start();
include('config.php');

// Jika tombol login ditekan
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Melakukan verifikasi login
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    // Jika data login cocok, set session dan redirect ke halaman fitur penjumlahan
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header("Location: penjumlahan.php");
        exit();
    } else {
        $error = "Username atau password salah.";
    }
}

// Jika tombol register ditekan
if (isset($_POST['register'])) {
    header("Location: register.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Halaman Utama</h1>
        <div class="content">
            <?php if (isset($_SESSION['username'])) { ?>
                <p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
                <a href="penjumlahan.php" class="button">Penjumlahan</a>
                <form action="" method="POST" class="form">
                    <input type="submit" name="logout" value="Logout">
                </form>
            <?php } else { ?>
                <p>Silakan login atau daftar untuk mengakses fitur penjumlahan.</p>
                <?php if (isset($error)) { ?>
                    <p class="error"><?php echo $error; ?></p>
                <?php } ?>
                <form action="" method="POST" class="form">
                    <label for="username">Username:</label>
                    <input type="text" name="username" required><br>
                    <label for="password">Password:</label>
                    <input type="password" name="password" required><br>
                    <input type="submit" name="login" value="Login">
                </form>
                <form action="" method="POST" class="form">
                    <input type="submit" name="register" value="Register">
                </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>
