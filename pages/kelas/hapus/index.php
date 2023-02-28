<style>
    nav {
        display: none;
    }
</style>
<?php
require './functions.php';

if (!isset($_GET['id_kelas'])) {
    echo "<script>window.location='?p=kelas'</script>";
} else {

    $sql = "DELETE FROM kelas WHERE id_kelas='{$_GET['id_kelas']}'";

    $hapusData = changeData($sql);

    if (!$hapusData) {
        echo "
            <script>
                alert('Data gagal dihapus !, Error Code : " . $hapusData . "');
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil dihapus !');
                window.location='?p=kelas';
            </script>
        ";
    }
}
