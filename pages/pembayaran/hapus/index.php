<style>
    nav {
        display: none;
    }
</style>
<?php
require './functions.php';
if (!isset($_GET['id_pembayaran'])) {
    echo "
        <script>
            window.location='?p=pembayaran';
        </script>
    ";
} else {
    $sql = "DELETE FROM pembayaran WHERE id_pembayaran='{$_GET['id_pembayaran']}'";
    $hapusData = changeData($sql);

    if (!$hapusData) {
        echo "
            <script>
                alert('Data gagal dihapus !');
                window.location='?p=pembayaran';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil dihapus !');
                window.location='?p=pembayaran';
            </script>
        ";
    }
}
