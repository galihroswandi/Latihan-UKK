<?php
require './functions.php';

function insertData($post)
{
    $nama_kelas = htmlspecialchars($post['nama_kelas']);
    $kompetensi_keahlian = htmlspecialchars($post['kompetensi_keahlian']);

    $sql = "INSERT INTO kelas VALUES('', '$nama_kelas', '$kompetensi_keahlian')";
    $insert = changeData($sql);

    if (!$insert) {
        echo "
            <script>
                alert('Data gagal ditambahkan !');
                window.location='?p=kelas';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil ditambahkan !');
                window.location='?p=kelas';
            </script>
        ";
    }
}

if (isset($_POST['btn_tambah'])) {
    insertData($_POST);
}
?>
<div class="container">
    <img src="./public/assets/petugas/tambah/blur-1.png" alt="Blur Color" class="blur-color">
    <div class="form-wrapper">
        <div class="header">
            <h1>Input Data Kelas</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-input">
                    <label for="nama_kelas">Kelas</label>
                    <input type="text" name="nama_kelas" id="nama_kelas" autocomplete="off" required>
                </div>
                <div class="form-input">
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
                <div class="form-button">
                    <a href="?p=kelas">Batal</a>
                    <button type="submit" name="btn_tambah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
    <img src="./public/assets/petugas/tambah/blur-2.png" alt="Blur Color" class="blur-color-2">
    <img src="./public/assets/petugas/tambah/blur-3.png" alt="Blur Color" class="blur-color-3">
</div>