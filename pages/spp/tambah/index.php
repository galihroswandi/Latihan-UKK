<?php
require './functions.php';

function insertData($post)
{
    $tahun = htmlspecialchars($post['tahun']);
    $nominal = htmlspecialchars($post['nominal']);

    $sql = "INSERT INTO spp VALUES('', '$tahun', '$nominal')";
    $insert = changeData($sql);

    if (!$insert) {
        echo "
            <script>
                alert('Data gagal ditambahkan !');
                window.location='?p=spp';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil ditambahkan !');
                window.location='?p=spp';
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
            <h1>Input Data SPP</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-input">
                    <label for="tahun">Tahun</label>
                    <input type="text" name="tahun" id="tahun" autocomplete="off" required>
                </div>
                <div class="form-input">
                    <label for="nominal">Nominal</label>
                    <input type="text" name="nominal" id="nominal" autocomplete="off" required>
                </div>
                <div class="form-button">
                    <a href="?p=spp">Batal</a>
                    <button type="submit" name="btn_tambah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
    <img src="./public/assets/petugas/tambah/blur-2.png" alt="Blur Color" class="blur-color-2">
    <img src="./public/assets/petugas/tambah/blur-3.png" alt="Blur Color" class="blur-color-3">
</div>