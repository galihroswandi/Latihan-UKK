<?php
require './functions.php';

// cek jika tidak ada id spp
if (!isset($_GET['id_spp'])) {
    echo "
        <script>
            window.location='?p=spp';
        </script>
    ";
} else {
    $sql = "SELECT * FROM spp WHERE id_spp = '{$_GET['id_spp']}'";
    $data = getSingleData($sql);
}

function updateData($post)
{
    $tahun = htmlspecialchars($post['tahun']);
    $nominal = htmlspecialchars($post['nominal']);

    $sql = "UPDATE spp SET 
        tahun='$tahun',
        nominal='$nominal' WHERE id_spp = '{$_GET['id_spp']}'
    ";
    $ubahData = changeData($sql);

    if (!$ubahData) {
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

if (isset($_POST['btn_ubah'])) {
    updateData($_POST);
}
?>
<div class="container">
    <img src="./public/assets/petugas/tambah/blur-1.png" alt="Blur Color" class="blur-color">
    <div class="form-wrapper">
        <div class="header">
            <h1>Ubah Data Petugas</h1>
        </div>
        <main>
            <form method="POST">
            <div class="form-input">
                    <label for="tahun">Tahun</label>
                    <input type="text" name="tahun" id="tahun" autocomplete="off" required value="<?=$data['tahun']?>">
                </div>
                <div class="form-input">
                    <label for="nominal">Nominal</label>
                    <input type="text" name="nominal" id="nominal" autocomplete="off" required <?=$data['nominal']?>>
                </div>
                <div class="form-button">
                    <a href="?p=spp">Batal</a>
                    <button type="submit" name="btn_ubah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
    <img src="./public/assets/petugas/tambah/blur-2.png" alt="Blur Color" class="blur-color-2">
    <img src="./public/assets/petugas/tambah/blur-3.png" alt="Blur Color" class="blur-color-3">
</div>