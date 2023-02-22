<?php
require_once './functions.php';

if (!isset($_GET['id_spp'])) {
    echo "
        <script>
            window.location='?p=spp';
        </script>    
    ";
}

function ubahData($post)
{
    $id_spp = $_GET['id_spp'];
    $tahun = $_POST['tahun'];
    $nominal = htmlspecialchars($post['nominal']);

    $sql = "UPDATE spp SET 
        tahun='{$tahun}',
        nominal='{$nominal}' WHERE id_spp='{$id_spp}'";

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
            window.location='?p=spp';
        </script>
    ";
}

$sql = "SELECT * FROM spp WHERE id_spp='{$_GET['id_spp']}'";
$singleData = getSingleData($sql);

if (isset($_POST['btn_ubah'])) {
    ubahData($_POST);
}

?>

<div class="container">
    <div class="form">
        <header>
            <h1>Ubah data SPP</h1>
        </header>
        <form method="POST">
            <div class="input-field">
                <label for="tahun">Tahun</label>
                <input type="text" name="tahun" id="tahun" autocomplete="off" required value="<?= $singleData['tahun'] ?>">
            </div>
            <div class="input-field">
                <label for="nominal">Nominal</label>
                <input type="text" name="nominal" id="nominal" autocomplete="off" required value="<?= $singleData['nominal'] ?>">
            </div>
            <div class="input-field-button">
                <a href="?p=spp">Batal</a>
                <button type="submit" name="btn_ubah">Simpan</button>
            </div>
        </form>
    </div>
</div>