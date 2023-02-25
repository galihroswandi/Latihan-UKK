<?php
require_once './functions.php';

function tambahData($post)
{
    $username = htmlspecialchars($post['username']);
    $password = htmlspecialchars(md5($post['password']));
    $nama_lengkap = htmlspecialchars($post['nama_lengkap']);
    $level = htmlspecialchars($post['level']);

    $sql = "INSERT INTO petugas VALUES('', '$username', '$password', '$nama_lengkap', '$level')";

    $insertData = actionData($sql);

    if (!$insertData) {
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
    tambahData($_POST);
}

?>
<div class="container">
    <div class="form-wrapper">
        <div class="form-header">
            <h1>Input Data Petugas</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-label">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Masukan Username" name="username" id="username" autocomplete="off" required>
                </div>
                <div class="form-label">
                    <label for="password">password</label>
                    <input type="password" placeholder="Masukan password" name="password" id="password" autocomplete="off" required>
                </div>
                <div class="form-label">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="nama_lengkap" placeholder="Masukan Nama Lengkap" name="nama_lengkap" id="nama_lengkap" autocomplete="off" required>
                </div>
                <div class="form-label">
                    <label for="level">Level</label>
                    <select name="level" id="level">
                        <option value="null">-- Pilih Level --</option>
                        <option value="admin">Admin</option>
                        <option value="petugas">Petugas</option>
                    </select>
                </div>
                <div class="form-label button">
                    <a href="?p=petugas">Batal</a>
                    <button type="submit" name="btn_tambah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
</div>