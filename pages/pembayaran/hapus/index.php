<?php
require_once './functions.php';

if (!isset($_GET['id_pembayaran'])) {
    echo "
        <script>
            window.location='index.php?p=pembayaran';
        </script>
    ";
} else {
    $sql = "DELETE FROM pembayaran WHERE id_pembayaran='{$_GET['id_pembayaran']}'";

    $hapus = actionData($sql);

    if (!$hapus) {
        echo "
            <script>
                alert('Data gagal dihapus !');
                window.location='index.php?p=pembayaran';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil dihapus !');
                window.location='index.php?p=pembayaran';
            </script>
        ";
    }
}
