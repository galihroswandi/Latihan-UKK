<?php
require_once './functions.php';

// cek jika tidak ada id spp
if (!isset($_GET['id_spp'])) {
    echo "
        <script>
            window.location='?p=spp';
        </script>
    ";
    return false;
}

function ubahData($post)
{
    $tahun = htmlspecialchars($post['tahun']);
    $nominal = htmlspecialchars($post['nominal']);

    $sql = "UPDATE spp SET 
            tahun = '$tahun',
            nominal = '$nominal' WHERE id_spp = '{$_GET['id_spp']}'
    ";

    $insertData = actionData($sql);

    if (!$insertData) {
        echo "
            <script>
                alert('Data gagal diubah !');
                window.location='?p=spp';
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

$data = getSingleData("SELECT * FROM spp WHERE id_spp='{$_GET['id_spp']}'");

if (isset($_POST['btn_ubah'])) {
    ubahData($_POST);
}

?>
<div class="container">
    <div class="form-wrapper">
        <div class="form-header">
            <h1>Ubah Data SPP</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-label">
                    <label for="tahun">Tahun</label>
                    <input type="text" placeholder="Masukan Tahun" name="tahun" id="tahun" autocomplete="off" required value="<?= $data['tahun'] ?>">
                </div>
                <div class="form-label">
                    <label for="nominal">Nominal</label>
                    <input type="text" placeholder="Masukan nominal" name="nominal" id="nominal" autocomplete="off" required value="<?= $data['nominal'] ?>">
                </div>
                <div class="form-label button">
                    <a href="?p=spp">Batal</a>
                    <button type="submit" name="btn_ubah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
</div>