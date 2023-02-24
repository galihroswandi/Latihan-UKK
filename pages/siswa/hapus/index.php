<style>
    nav {
        display: none;
    }
</style>
<?php
require './functions.php';
if (!isset($_GET['nisn'])) {
    echo "
        <script>
            window.location='?p=siswa';
        </script>
    ";
} else {
    $sql = "DELETE FROM siswa WHERE nisn='{$_GET['nisn']}'";
    $hapusData = changeData($sql);

    if (!$hapusData) {
        echo "
            <script>
                alert('Data gagal dihapus !');
                window.location='?p=siswa';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil dihapus !');
                window.location='?p=siswa';
            </script>
        ";
    }
}
