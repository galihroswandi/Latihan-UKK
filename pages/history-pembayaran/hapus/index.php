<?php
require './functions.php';

if (!isset($_GET['id_pembayaran'])) {
    echo "
        <script>
            alert('Data gagal dihapus');
            window.location='?p=pembayaran';
        </script>
    ";
    return false;
} else {
    $sql = "DELETE FROM pembayaran WHERE id_pembayaran='$_GET[id_pembayaran]'";
    $hapusData = actionData($sql);

    if (!$hapusData) {
        echo "
            <script>
                alert('Data gagal dihapus');
                window.location='?p=pembayaran';
            </script>
        ";
        return false;
    }

    echo "
        <script>
            alert('Data berhasil dihapus');
            window.location='?p=pembayaran';
        </script>
    ";
}
