<?php
require './functions.php';

// cek jika tidak ada id petugas
if (!isset($_GET['id_petugas'])) {
    echo "
        <script>
            window.location='?p=petugas';
        </script>
    ";
} else {
    $sql = "SELECT * FROM petugas WHERE id_petugas = '{$_GET['id_petugas']}'";
    $data = getSingleData($sql);
}

function updateData($post)
{
    $username = htmlspecialchars($post['username']);
    $password = htmlspecialchars(md5($post['password']));
    $nama_petugas = htmlspecialchars($post['nama_lengkap']);
    $level = htmlspecialchars($post['level']);

    $sql = "UPDATE petugas SET 
        username='$username',
        password='$password',
        nama_petugas='$nama_petugas',
        level='$level' WHERE id_petugas = '{$_GET['id_petugas']}'
    ";
    $ubahData = changeData($sql);

    if (!$ubahData) {
        echo "
            <script>
                alert('Data gagal diubah !');
                window.location='?p=petugas';
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
    updateData($_POST);
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
                    <input type="text" name="username" id="username" autocomplete="off" required value="<?= $data['username'] ?>">
                </div>
                <div class="form-input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required value="<?= $data['password'] ?>">
                </div>
                <div class="form-input">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="nama_lengkap" name="nama_lengkap" id="nama_lengkap" autocomplete="off" required value="<?= $data['nama_petugas'] ?>">
                </div>
                <div class="form-input">
                    <label for="level">Level</label>
                    <select name="level" id="level">
                        <option value="null">-- Pilih Level --</option>
                        <option value="admin" <?= $data['level'] == 'admin' ? 'selected' : null; ?>>Admin</option>
                        <option value="petugas" <?= $data['level'] == 'petugas' ? 'selected' : null; ?>>Petugas</option>
                    </select>
                </div>
                <div class="form-button">
                    <a href="?p=petugas">Batal</a>
                    <button type="submit" name="btn_ubah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
    <img src="./public/assets/petugas/tambah/blur-2.png" alt="Blur Color" class="blur-color-2">
    <img src="./public/assets/petugas/tambah/blur-3.png" alt="Blur Color" class="blur-color-3">
</div>