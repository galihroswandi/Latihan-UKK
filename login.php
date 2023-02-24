<?php
require_once './functions.php';
session_start();

function checkLogin($post)
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
                alert('Anda berhasil login, Selamat datang...');
                window.location='index.php?p=home';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Username / Password Salah');
                window.location='login.php';
            </script>
        ";
        return false;
    }
}

// cek jika tombol signin di klik
if (isset($_POST['btn_signin'])) {
    // jalankan function berikut
    checkLogin($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pambayaran SPP | Login</title>

    <!-- My CSS -->
    <link rel="stylesheet" href="public/css/login.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <img src="./public/assets/login/1.png" alt="Blur Color" class="blur-1">
        <div class="header">
            <h1>Web App Pembayaran SPP</h1>
            <h2>SMK Muhammdiyah Tasikmalaya</h2>
            <img src="./public/assets/login/2.png" alt="Blur Color">
        </div>
        <main>
            <form method="POST">
                <div class="input-field">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="input-field">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="input-field">
                    <label for="level">Level</label>
                    <select name="level" id="level">
                        <option value="null">-- Pilih Level --</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                        <option value="siswa">Siswa</option>
                    </select>
                </div>
                <div class="input-field">
                    <button type="submit" name="btn_signin">Sign In</button>
                </div>
            </form>
        </main>
        <img src="./public/assets/login/3.png" alt="Blur Effect" class="blur-2">
    </div>
</body>

</html>