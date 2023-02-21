<?php
require './functions.php';
session_start();

function proses($post)
{
    $username = htmlspecialchars($post['username']);
    $password = htmlspecialchars(md5($_POST['password']));
    $level = htmlspecialchars($_POST['level']);

    $sql = "SELECT * FROM petugas WHERE username='{$username}' AND password='{$password}' AND level='{$level}'";

    $checkData = getData($sql);

    if (count($checkData) > 0) {

        $_SESSION['id_petugas'] = $checkData[0]['id_petugas'];
        $_SESSION['level'] = $checkData[0]['level'];

        echo "
            <script>
                alert('Anda berhasil login, Selamat Datang...');
                window.location='index.php?p=home';
            </script>            
        ";
        return true;
    } else {
        return false;
    }
}


if (isset($_POST['btn_signin'])) {
    $signin = proses($_POST);
    if (!$signin) {
        $_SESSION['msg'] = 'Username / Password Salah !';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pambayaran SPP | Login</title>

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="public/css/login.css">
</head>

<body>
    <div class="container">
        <div class="flat-design">
            <div class="ilustration">
                <img src="./public/assets/img/blob-login-1.svg" alt="Blob Flat" class="img-blob-1">
                <img src="./public/assets/img/flat-login-1.svg" alt="Flat design login" id="flat-login-1">
            </div>
            <img src="./public/assets/img/blob-login-2.svg" alt="Blob Flat 2" class="img-blob-2">
        </div>
        <main>
            <div class="header">
                <h1>Web App Pembayaran SPP</h1>
                <h2>SMK Muhammadiyah Tasikmalaya</h2>
            </div>
            <?php if (isset($_SESSION['msg'])) : ?>
                <div class="message">
                    <p>Username / Password Salah</p>
                    <a href="delete-message.php">X</a>
                </div>
            <?php endif; ?>
            <form method="POST">
                <div class="form-input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Masukan username">
                </div>
                <div class="form-input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukan password">
                </div>
                <div class="form-input">
                    <label for="level">Level</label>
                    <select name="level" id="level">
                        <option value="null">-- Pilih Level --</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>
                <div class="form-input">
                    <button type="submit" name="btn_signin">Sign In</button>
                    <a href="login-siswa.php" class="btn_siswa">Sign In Sebagai Siswa</a>
                </div>
            </form>
        </main>
    </div>
</body>

</html>