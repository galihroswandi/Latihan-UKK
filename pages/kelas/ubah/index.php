<?php
require_once './functions.php';

if (!isset($_GET['id_kelas'])) {
    echo "<script>window.location='?p=kelas';</script>";
} else {

    // get single data
    $sql = "SELECT * FROM kelas WHERE id_kelas='{$_GET['id_kelas']}'";

    $data = getSingleData($sql);
}

function tambahData($post)
{

    $nama_kelas = htmlspecialchars($post['kelas']);
    $kompetensi_keahlian = htmlspecialchars($post['kompetensi_keahlian']);

    $sql = "UPDATE kelas SET
        nama_kelas='$nama_kelas',
        kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='{$_GET['id_kelas']}'
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
                window.location='?p=kelas';
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
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas" placeholder="Masukan Kelas" autocomplete="off" required value="<?= $data['nama_kelas'] ?>">
        </div>
        <div class="form-label">
            <label for="kompetensi_keahlian">Kompetensi keahlian</label>
            <select name="kompetensi_keahlian" id="kompetensi_keahlian">
                <option value="null">-- Pilih kompetensi keahlian --</option>
                <option value="Rekayasa Perangkat Lunak" <?= $data['kompetensi_keahlian'] == 'Rekayasa Perangkat Lunak' ? 'selected' : null; ?>>Rekayasa Perangkat Lunak</option>
                <option value="Teknik Komputer dan Jarigan" <?= $data['kompetensi_keahlian'] == 'Teknik Komputer dan Jarigan' ? 'selected' : null; ?>>Teknik Komputer dan Jarigan</option>
                <option value="Teknik Kendaraan Ringan" <?= $data['kompetensi_keahlian'] == 'Teknik Kendaraan Ringan' ? 'selected' : null; ?>>Teknik Kendaraan Ringan</option>
                <option value="Teknik Bisnis Sepeda Motor" <?= $data['kompetensi_keahlian'] == 'Teknik Bisnis Sepeda Motor' ? 'selected' : null; ?>>Teknik Bisnis Sepeda Motor</option>
                <option value="Bisnis Daring dan Pemasaran" <?= $data['kompetensi_keahlian'] == 'Bisnis Daring dan Pemasaran' ? 'selected' : null; ?>>Bisnis Daring dan Pemasaran</option>
            </select>
        </div>
        <div class="form-label button" style="display: flex;">
            <a href="?p=petugas">Batal</a>
            <button type="submit" name="btn_ubah">Simpan</button>
        </div>
    </form>
</div>