<?php
require_once './functions.php';

if (!isset($_GET['id_spp'])) {
    echo "<script>window.location='?p=spp';</script>";
} else {

    // get single data
    $sql = "SELECT * FROM spp WHERE id_spp='{$_GET['id_spp']}'";

    $data = getSingleData($sql);
}

function tambahData($post)
{

    $tahun = htmlspecialchars($post['tahun']);
    $nominal = htmlspecialchars($post['nominal']);

    $sql = "UPDATE spp SET
        tahun='$tahun',
        nominal='$nominal' WHERE id_spp='{$_GET['id_spp']}'
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
                window.location='?p=spp';
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
        <h1>Ubah Data SPP</h1>
        <div class="form-label">
            <label for="tahun">Tahun</label>
            <input type="text" name="tahun" id="tahun" placeholder="Masukan Tahun" autocomplete="off" required value="<?= $data['tahun'] ?>">
        </div>
        <div class="form-label">
            <label for="nominal">Nominal</label>
            <input type="text" name="nominal" id="nominal" placeholder="Masukan Nominal" autocomplete="off" required value="<?= $data['nominal'] ?>">
        </div>
        <div class="form-label button" style="display: flex;">
            <a href="?p=spp">Batal</a>
            <button type="submit" name="btn_ubah">Simpan</button>
        </div>
    </form>
</div>