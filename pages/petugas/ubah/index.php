<?php
require_once './functions.php';

if (!isset($_GET['id_petugas'])) {
    echo "<script>window.location='?p=petugas';</script>";
} else {

    // get single data
    $sql = "SELECT * FROM petugas WHERE id_petugas='{$_GET['id_petugas']}'";

    $data = getSingleData($sql);
}

function tambahData($post)
{

    $username = htmlspecialchars($post['username']);
    $password = htmlspecialchars(md5($post['password']));
    $nama_lengkap = htmlspecialchars($post['nama_lengkap']);
    $level = htmlspecialchars($post['level']);

    $sql = "UPDATE petugas SET
        username='$username',
        password='$password',
        nama_petugas='$nama_lengkap',
        level='$level' WHERE id_petugas='{$_GET['id_petugas']}'
    ";

    $insert = changeData($sql);

    if (!$insert) {
        echo "
            <script>
                alert('Data gagal diubah !, Error Code : " . $insert . "');
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil diubah !');
                window.location='?p=petugas';
            </script>
        ";
    }
}

if (isset($_POST['btn_ubah'])) {
    tambahData($_POST);
}
?>

<div class="tambah-wrapper">
    <form method="POST">
        <h1>Input Data Petugas</h1>
        <div class="form-label">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Masukan username" autocomplete="off" required value="<?= $data['username'] ?>">
        </div>
        <div class="form-label">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Masukan password" autocomplete="off" required value="<?= $data['password'] ?>">
        </div>
        <div class="form-label">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Masukan nama lengkap" autocomplete="off" required value="<?= $data['nama_petugas'] ?>">
        </div>
        <div class="form-label">
            <label for="level">Level</label>
            <select name="level" id="level">
                <option value="null">-- Pilih Level --</option>
                <option value="admin" <?= $data['level'] == 'admin' ? 'selected' : null; ?>>Admin</option>
                <option value="petugas" <?= $data['level'] == 'petugas' ? 'selected' : null; ?>>Petugas</option>
            </select>
        </div>
        <div class="form-label button" style="display: flex;">
            <a href="?p=petugas">Batal</a>
            <button type="submit" name="btn_ubah">Simpan</button>
        </div>
    </form>
</div>