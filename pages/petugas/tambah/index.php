<?php
require_once './functions.php';

function tambahData($post)
{
    $username = htmlspecialchars($post['username']);
    $password = htmlspecialchars(md5($post['password']));
    $nama_petugas = htmlspecialchars($_POST['nama_petugas']);
    $level = htmlspecialchars($post['level']);

    $sql = "INSERT INTO petugas VALUES('', '$username', '$password', '$nama_petugas', '$level')";

    $insertData = actionData($sql);

    if (!$insertData) {
        echo "
            <script>
                alert('Data gagal ditambahkan !');
            </script>
        ";

        return false;
    }

    echo "
        <script>
            alert('Data berhasil ditambahkan !');
            window.location='?p=petugas';
        </script>
    ";
}

if (isset($_POST['btn_tambah'])) {
    tambahData($_POST);
}

?>

<div class="container">
    <div class="form">
        <header>
            <h1>Input data petugas</h1>
        </header>
        <form method="POST">
            <div class="input-field">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" autocomplete="off" required>
            </div>
            <div class="input-field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required>
            </div>
            <div class="input-field">
                <label for="nama_petugas">Nama Legkap</label>
                <input type="nama_petugas" name="nama_petugas" id="nama_petugas" autocomplete="off" required>
            </div>
            <div class="input-field">
                <label for="level">level</label>
                <select name="level" id="level">
                    <option value="null">-- Pilih level --</option>
                    <option value="admin">Admin</option>
                    <option value="petugas">Petugas</option>
                </select>
            </div>
            <div class="input-field-button">
                <a href="?p=petugas">Batal</a>
                <button type="submit" name="btn_tambah">Simpan</button>
            </div>
        </form>
    </div>
</div>