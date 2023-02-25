<?php
require_once './functions.php';

function tambahData($post)
{
    $tahun = htmlspecialchars($post['tahun']);
    $nominal = htmlspecialchars($post['nominal']);

    $sql = "INSERT INTO spp VALUES('', '$tahun', '$nominal')";

    $insertData = actionData($sql);

    if (!$insertData) {
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
    tambahData($_POST);
}

?>
<div class="container">
    <div class="form-wrapper">
        <div class="form-header">
            <h1>Input Data SPP</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-label">
                    <label for="tahun">Tahun</label>
                    <input type="text" placeholder="Masukan Tahun" name="tahun" id="tahun" autocomplete="off" required>
                </div>
                <div class="form-label">
                    <label for="nominal">Nominal</label>
                    <input type="text" placeholder="Masukan nominal" name="nominal" id="nominal" autocomplete="off" required>
                </div>
                <div class="form-label button">
                    <a href="?p=spp">Batal</a>
                    <button type="submit" name="btn_tambah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
</div>