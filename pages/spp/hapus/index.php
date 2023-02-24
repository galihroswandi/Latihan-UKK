<style>
    nav {
        display: none;
    }
</style>
<?php
require './functions.php';
if (!isset($_GET['id_spp'])) {
    echo "
        <script>
            window.location='?p=spp';
        </script>
    ";
} else {
    $sql = "DELETE FROM spp WHERE id_spp='{$_GET['id_spp']}'";
    $hapusData = changeData($sql);

    if (!$hapusData) {
        echo "
            <script>
                alert('Data gagal dihapus !');
                window.location='?p=spp';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil dihapus !');
                window.location='?p=spp';
            </script>
        ";
    }
}
?>