<?php
require './functions.php';

function insertData($post)
{
    $username = htmlspecialchars($post['username']);
    $password = htmlspecialchars(md5($post['password']));
    $nama_petugas = htmlspecialchars($post['nama_lengkap']);
    $level = htmlspecialchars($post['level']);

    $sql = "INSERT INTO petugas VALUES('', '$username', '$password', '$nama_petugas', '$level')";
    $insert = changeData($sql);

    if (!$insert) {
        echo "
            <script>
                alert('Data gagal ditambahkan !');
                window.location='?p=petugas';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil ditambahkan !');
                window.location='?p=petugas';
            </script>
        ";
    }
}

if (isset($_POST['btn_tambah'])) {
    insertData($_POST);
}
?>
<div class="container">
    <img src="./public/assets/petugas/tambah/blur-1.png" alt="Blur Color" class="blur-color">
    <div class="form-wrapper">
        <div class="header">
            <h1>Input Data Petugas</h1>
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
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="nama_lengkap" name="nama_lengkap" id="nama_lengkap" autocomplete="off" required>
                </div>
                <div class="form-input">
                    <label for="level">Level</label>
                    <select name="level" id="level">
                        <option value="null">-- Pilih Level --</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>
                <div class="form-button">
                    <a href="?p=petugas">Batal</a>
                    <button type="submit" name="btn_tambah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
    <img src="./public/assets/petugas/tambah/blur-2.png" alt="Blur Color" class="blur-color-2">
    <img src="./public/assets/petugas/tambah/blur-3.png" alt="Blur Color" class="blur-color-3">
</div>