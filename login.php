<?php
include_once './functions.php';

// memulai session
session_start();

function checkData($post)
{

    $username = htmlspecialchars($post['username']);
    $password = htmlspecialchars(md5($post['password']));
    $level = htmlspecialchars($post['level']);

    $sql = "SELECT * FROM petugas WHERE username='$username' AND password='$password' AND level='$level'";

    $hasil = getData($sql);

    if (count($hasil) > 0) {

        // Buat session login
        $_SESSION['id_petugas'] = $hasil[0]['id_petugas'];
        $_SESSION['level'] = $hasil[0]['level'];

        echo "
            <script>
                alert('Anda berhasil login, Selamat datang');
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

// cek jika tombol login di klik maka jalankan function di atas

if (isset($_POST['btn_signin'])) {
    checkData($_POST);
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
    <div class="container">
        <div class="header">
            <h1>Web App Pembayaran SPP</h1>
            <h2>SMK Muhammdiyah Tasikmalaya</h2>
        </div>
        <main>
            <form method="POST">
                <div class="form-input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="form-input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
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
                </div>
            </form>
        </main>
    </div>
</body>

</html>