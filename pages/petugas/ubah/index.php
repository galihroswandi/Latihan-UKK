<?php
require_once './functions.php';

if (!isset($_GET['id_petugas'])) {
    echo "
        <script>
            window.location='?p=petugas';
        </script>    
    ";
}

function ubahData($post)
{
    $id_petugas = $_GET['id_petugas'];
    $username = htmlspecialchars($post['username']);
    $password = htmlspecialchars(md5($post['password']));
    $nama_petugas = htmlspecialchars($_POST['nama_petugas']);
    $level = htmlspecialchars($post['level']);

    $sql = "UPDATE petugas SET 
        username='{$username}',
        password='{$password}',
        nama_petugas='{$nama_petugas}',
        level='{$level}' WHERE id_petugas='{$id_petugas}'";

    $insertData = actionData($sql);

    if (!$insertData) {
        echo "
            <script>
                alert('Data gagal diubah !');
            </script>
        ";

        return false;
    }

    echo "
        <script>
            alert('Data berhasil diubah !');
            window.location='?p=petugas';
        </script>
    ";
}

$sql = "SELECT * FROM petugas WHERE id_petugas='{$_GET['id_petugas']}'";
$singleData = getSingleData($sql);

if (isset($_POST['btn_ubah'])) {
    ubahData($_POST);
}

?>

<div class="container">
    <div class="form">
        <header>
            <h1>Ubah data petugas</h1>
        </header>
        <form method="POST">
            <div class="input-field">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" autocomplete="off" required value="<?= $singleData['username'] ?>">
            </div>
            <div class="input-field">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" autocomplete="off" required value="<?= $singleData['password'] ?>">
            </div>
            <div class="input-field">
                <label for="nama_petugas">Nama Legkap</label>
                <input type="nama_petugas" name="nama_petugas" id="nama_petugas" autocomplete="off" required value="<?= $singleData['nama_petugas'] ?>">
            </div>
            <div class="input-field">
                <label for="level">level</label>
                <select name="level" id="level">
                    <option value="null">-- Pilih level --</option>
                    <option value="admin" <?= $singleData['level'] == 'admin' ? 'selected' : null; ?>>Admin</option>
                    <option value="petugas" <?= $singleData['level'] == 'petugas' ? 'selected' : null; ?>>Petugas</option>
                </select>
            </div>
            <div class="input-field-button">
                <a href="?p=petugas">Batal</a>
                <button type="submit" name="btn_ubah">Simpan</button>
            </div>
        </form>
    </div>
</div>