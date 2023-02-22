<?php
require './functions.php';

if (!isset($_GET['id_spp'])) {
    echo "
        <script>
            alert('Data gagal dihapus');
            window.location='?p=spp';
        </script>
    ";
    return false;
} else {
    $sql = "DELETE FROM spp WHERE id_spp='$_GET[id_spp]'";
    $hapusData = actionData($sql);

    if (!$hapusData) {
        echo "
            <script>
                alert('Data gagal dihapus');
                window.location='?p=spp';
            </script>
        ";
        return false;
    }

    echo "
        <script>
            alert('Data berhasil dihapus');
            window.location='?p=spp';
        </script>
    ";
}
