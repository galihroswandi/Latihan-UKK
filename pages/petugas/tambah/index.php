<?php
require_once './functions.php';

function tambahData($post)
{

    $username = htmlspecialchars($post['username']);
    $password = htmlspecialchars(md5($post['password']));
    $nama_lengkap = htmlspecialchars($post['nama_lengkap']);
    $level = htmlspecialchars($post['level']);

    $sql = "INSERT INTO petugas VALUES('', '$username', '$password', '$nama_lengkap', '$level')";

    $insert = changeData($sql);

    if (!$insert) {
        echo "
            <script>
                alert('Data gagal ditambahkan !, Error Code : " . $insert . "');
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

if (isset($_POST['btn_simpan'])) {
    tambahData($_POST);
}
?>

<div class="tambah-wrapper">
    <form method="POST">
        <h1>Input Data Petugas</h1>
        <div class="form-label">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Masukan username" autocomplete="off" required>
        </div>
        <div class="form-label">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Masukan password" autocomplete="off" required>
        </div>
        <div class="form-label">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Masukan nama lengkap" autocomplete="off" required>
        </div>
        <div class="form-label">
            <label for="level">Level</label>
            <select name="level" id="level">
                <option value="null">-- Pilih Level --</option>
                <option value="admin">Admin</option>
                <option value="petugas">Petugas</option>
            </select>
        </div>
        <div class="form-label button" style="display: flex;">
            <a href="?p=petugas">Batal</a>
            <button type="submit" name="btn_simpan">Simpan</button>
        </div>
    </form>
</div>