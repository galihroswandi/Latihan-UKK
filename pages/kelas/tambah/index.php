<?php
require_once './functions.php';

function tambahData($post)
{
    $kelas = htmlspecialchars($_POST['nama_kelas']);
    $kompetensi_keahlian = htmlspecialchars($_POST['kompetensi_keahlian']);

    $sql = "INSERT INTO kelas VALUES('', '$kelas', '$kompetensi_keahlian')";

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
            window.location='?p=kelas';
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
            <h1>Input data Kelas</h1>
        </header>
        <form method="POST">
            <div class="input-field">
                <label for="nama_kelas">Kelas</label>
                <input type="text" name="nama_kelas" id="nama_kelas" autocomplete="off" required>
            </div>
            <div class="input-field">
                <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                <select name="kompetensi_keahlian" id="kompetensi_keahlian">
                    <option value="null">-- Pilih Kompetensi Keahlian --</option>
                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                    <option value="Teknik Komputer dan Jaringan">Teknik Komputer dan Jaringan</option>
                    <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                    <option value="Teknik Bisnis Sepeda Motor">Teknik Bisnis Sepeda Motor</option>
                    <option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
                </select>
            </div>
            <div class="input-field-button">
                <a href="?p=kelas">Batal</a>
                <button type="submit" name="btn_tambah">Simpan</button>
            </div>
        </form>
    </div>
</div>