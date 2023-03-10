<?php
require_once './functions.php';

// memulai session
session_start();

function loginCheck($post)
{

    $username = htmlspecialchars($post['username']);
    $password = htmlspecialchars(md5($post['password']));
    $level = htmlspecialchars($post['level']);

    $sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password' AND level='$level'";

    $checkData = getData($sql);

    if (count($checkData) > 0) {

        $_SESSION['id_petugas'] = $checkData[0]['id_petugas'];
        $_SESSION['level'] = $checkData[0]['level'];

        echo "
            <script>
                alert('Anda berhasil login, Selamat datang !');
                window.location='index.php?p=home';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Username / Password salah !');
            </script>
        ";
    }
}

if (isset($_POST['btn_sigin'])) {
    loginCheck($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran SPP | Login</title>
    <link rel="stylesheet" href="public/css/login.css">
</head>

<body>
    <div class="login-wrapper">
        <img src="./public/assets/login/1.png" alt="Blur Color" class="blur-color-1">
        <div class="container">
            <div class="header">
                <h1>Web App Pembayaran SPP</h1>
                <h2>SMK Muhammadiyah Tasikmalaya</h2>
            </div>
            <main>
                <form method="POST">
                    <div class="form-input">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" placeholder="Masukan Username" autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Masukan Password" autocomplete="off" required>
                    </div>
                    <div class="form-input">
                        <label for="level">level</label>
                        <select name="level" id="level">
                            <option value="null">-- Pilih Level --</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
                    </div>
                    <div class="form-input">
                        <button type="submit" name="btn_sigin">Sign In</button>
                        <a href="login.siswa.php">Login sebagai siswa</a>
                    </div>
                </form>
            </main>
        </div>
        <img src="./public/assets/login/2.png" alt="Blur Color" class="blur-color-2">
        <img src="./public/assets/login/3.png" alt="Blur Color" class="blur-color-3">
    </div>
</body>

</html>