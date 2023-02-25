<?php
require_once './functions.php';

// cek jika tidak ada id petugas
if (!isset($_GET['id_petugas'])) {
    echo "
        <script>
            window.location='?p=petugas';
        </script>
    ";
    return false;
}

function ubahData($post)
{
    $username = htmlspecialchars($post['username']);
    $password = htmlspecialchars(md5($post['password']));
    $nama_lengkap = htmlspecialchars($post['nama_lengkap']);
    $level = htmlspecialchars($post['level']);

    $sql = "UPDATE petugas SET 
            username = '$username',
            password = '$password',
            nama_petugas = '$nama_lengkap',
            level = '$level' WHERE id_petugas = '{$_GET['id_petugas']}'
    ";

    $insertData = actionData($sql);

    if (!$insertData) {
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

$data = getSingleData("SELECT * FROM petugas WHERE id_petugas='{$_GET['id_petugas']}'");

if (isset($_POST['btn_ubah'])) {
    ubahData($_POST);
}

?>
<div class="container">
    <div class="form-wrapper">
        <div class="form-header">
            <h1>Ubah Data Petugas</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-label">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Masukan Username" name="username" id="username" autocomplete="off" required value="<?= $data['username'] ?>">
                </div>
                <div class="form-label">
                    <label for="password">password</label>
                    <input type="password" placeholder="Masukan password" name="password" id="password" autocomplete="off" required value="<?= $data['password'] ?>">
                </div>
                <div class="form-label">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="nama_lengkap" placeholder="Masukan Nama Lengkap" name="nama_lengkap" id="nama_lengkap" autocomplete="off" required value="<?= $data['nama_petugas'] ?>">
                </div>
                <div class="form-label">
                    <label for="level">Level</label>
                    <select name="level" id="level">
                        <option value="null">-- Pilih Level --</option>
                        <option value="admin" <?= $data['level'] == 'admin' ? 'selected' : null; ?>>Admin</option>
                        <option value="petugas" <?= $data['level'] == 'petugas' ? 'selected' : null; ?>>Petugas</option>
                    </select>
                </div>
                <div class="form-label button">
                    <button type="submit" name="btn_ubah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
</div>