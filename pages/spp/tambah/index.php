<?php
require_once './functions.php';

function tambahData($post)
{

    $tahun = htmlspecialchars($post['tahun']);
    $nominal = htmlspecialchars($post['nominal']);

    $sql = "INSERT INTO spp VALUES('', '$tahun', '$nominal')";

    $insert = changeData($sql);

    if (!$insert) {
        echo "
            <script>
                alert('Data gagal ditambahkan !, Error Code : " . $insert . "');
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

if (isset($_POST['btn_simpan'])) {
    tambahData($_POST);
}
?>

<div class="tambah-wrapper">
    <form method="POST">
        <h1>Input Data SPP</h1>
        <div class="form-label">
            <label for="tahun">Tahun</label>
            <input type="text" name="tahun" id="tahun" placeholder="Masukan Tahun" autocomplete="off" required>
        </div>
        <div class="form-label">
            <label for="nominal">Nominal</label>
            <input type="text" name="nominal" id="nominal" placeholder="Masukan Nominal" autocomplete="off" required>
        </div>
        <div class="form-label button" style="display: flex;">
            <a href="?p=spp">Batal</a>
            <button type="submit" name="btn_simpan">Simpan</button>
        </div>
    </form>
</div>