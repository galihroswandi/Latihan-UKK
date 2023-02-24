<style>
    nav {
        display: none;
    }
</style>
<?php
require './functions.php';
if (!isset($_GET['id_petugas'])) {
    echo "
        <script>
            window.location='?p=petugas';
        </script>
    ";
} else {
    $sql = "DELETE FROM petugas WHERE id_petugas='{$_GET['id_petugas']}'";
    $hapusData = changeData($sql);

    if (!$hapusData) {
        echo "
            <script>
                alert('Data gagal dihapus !');
                window.location='?p=petugas';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil dihapus !');
                window.location='?p=petugas';
            </script>
        ";
    }
}
