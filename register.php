<?php
session_start();
include('config.php');

// Inisialisasi pesan error dan pesan sukses
$error = "";
$success = "";

// Jika tombol register ditekan
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Memeriksa apakah username sudah terdaftar
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $error = "Username sudah terdaftar.";
    } else {
        // Menyimpan data user ke database
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $success = "Pendaftaran berhasil. Silakan login.";
        } else {
            $error = "Pendaftaran gagal.";
        }
    }
}

// Jika tombol home ditekan
if (isset($_POST['home'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Pendaftaran</h1>
        <div class="content">
            <form action="" method="POST" class="form">
                <label for="username">Username:</label>
                <input type="text" name="username" required><br>
                <label for="password">Password:</label>
                <input type="password" name="password" required><br>
                <input type="submit" name="register" value="Register">
            </form>
            <?php if (!empty($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
            <?php if (!empty($success)) { ?>
                <p class="success"><?php echo $success; ?></p>
            <?php } ?>
            <form action="" method="POST" class="form">
                <input type="submit" name="home" value="Home">
            </form>
        </div>
    </div>
</body>
</html>
