<?php
require './functions.php';

if (!isset($_GET['id_petugas'])) {
    echo "
        <script>
            alert('Data gagal dihapus');
            window.location='?p=petugas';
        </script>
    ";
    return false;
} else {
    $sql = "DELETE FROM petugas WHERE id_petugas='$_GET[id_petugas]'";
    $hapusData = actionData($sql);

    if (!$hapusData) {
        echo "
            <script>
                alert('Data gagal dihapus');
                window.location='?p=petugas';
            </script>
        ";
        return false;
    }

    echo "
        <script>
            alert('Data berhasil dihapus');
            window.location='?p=petugas';
        </script>
    ";
}
