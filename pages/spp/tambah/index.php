<?php
require_once './functions.php';

function tambahData($post)
{
    $tahun = htmlspecialchars($_POST['tahun']);
    $nominal = htmlspecialchars($_POST['nominal']);

    $sql = "INSERT INTO spp VALUES('', '$tahun', '$nominal')";

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
            window.location='?p=spp';
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
            <h1>Input data SPP</h1>
        </header>
        <form method="POST">
            <div class="input-field">
                <label for="tahun">Tahun</label>
                <input type="text" name="tahun" id="tahun" autocomplete="off" required placeholder="Masukan Tahun">
            </div>
            <div class="input-field">
                <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                <input type="text" name="nominal" id="nominal" placeholder="Masukan Nominal">
            </div>
            <div class="input-field-button">
                <a href="?p=spp">Batal</a>
                <button type="submit" name="btn_tambah">Simpan</button>
            </div>
        </form>
    </div>
</div>