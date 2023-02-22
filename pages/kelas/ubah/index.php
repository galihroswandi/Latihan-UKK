<?php
require_once './functions.php';

if (!isset($_GET['id_kelas'])) {
    echo "
        <script>
            window.location='?p=kelas';
        </script>    
    ";
}

function ubahData($post)
{
    $id_kelas = $_GET['id_kelas'];
    $kelas = htmlspecialchars($post['nama_kelas']);
    $kompetensi_keahlian = htmlspecialchars($post['kompetensi_keahlian']);


    $sql = "UPDATE kelas SET 
        nama_kelas='{$kelas}',
        kompetensi_keahlian='{$kompetensi_keahlian}' WHERE id_kelas='{$id_kelas}'";

    $updateData = actionData($sql);

    if (!$updateData) {
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
            window.location='?p=kelas';
        </script>
    ";
}

$sql = "SELECT * FROM kelas WHERE id_kelas='{$_GET['id_kelas']}'";
$singleData = getSingleData($sql);

if (isset($_POST['btn_ubah'])) {
    ubahData($_POST);
}

?>

<div class="container">
    <div class="form">
        <header>
            <h1>Ubah data kelas</h1>
        </header>
        <form method="POST">
            <div class="input-field">
                <label for="nama_kelas">Kelas</label>
                <input type="text" name="nama_kelas" id="nama_kelas" autocomplete="off" required value="<?= $singleData['nama_kelas'] ?>">
            </div>
            <div class="input-field">
                <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                <select name="kompetensi_keahlian" id="kompetensi_keahlian">
                    <option value="null">-- Pilih Kompetensi Keahlian --</option>
                    <option value="Rekayasa Perangkat Lunak" <?= $singleData['kompetensi_keahlian'] == 'Rekayasa Perangkat Lunak' ? 'selected' : null; ?>>Rekayasa Perangkat Lunak</option>
                    <option value="Teknik Komputer dan Jaringan" <?= $singleData['kompetensi_keahlian'] == 'Teknik Komputer dan Jaringan' ? 'selected' : null; ?>>Teknik Komputer dan Jaringan</option>
                    <option value="Teknik Kendaraan Ringan" <?= $singleData['kompetensi_keahlian'] == 'Teknik Kendaraan Ringan' ? 'selected' : null; ?>>Teknik Kendaraan Ringan</option>
                    <option value="Teknik Bisnis Sepeda Motor" <?= $singleData['kompetensi_keahlian'] == 'Teknik Bisnis Sepeda Motor' ? 'selected' : null; ?>>Teknik Bisnis Sepeda Motor</option>
                    <option value="Bisnis Daring dan Pemasaran" <?= $singleData['kompetensi_keahlian'] == 'Bisnis Daring dan Pemasaran' ? 'selected' : null; ?>>Bisnis Daring dan Pemasaran</option>
                </select>
            </div>
            <div class="input-field-button">
                <a href="?p=kelas">Batal</a>
                <button type="submit" name="btn_ubah">Simpan</button>
            </div>
        </form>
    </div>
</div>