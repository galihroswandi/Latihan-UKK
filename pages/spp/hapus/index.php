<?php
require_once './functions.php';

function hapusData($id)
{

    $sql = "DELETE FROM spp WHERE id_spp = '$id'";

    $hapus = actionData($sql);

    if (!$hapus) {
        echo "
            <script>
                alert('Data gagal dihapus !');
                window.location='index.php?p=spp';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil dihapus !');
                window.location='index.php?p=spp';
            </script>
        ";
    }
}

if (!isset($_GET['id_spp'])) {
    echo "
        <script>
            window.location='index.php?p=spp';
        </script>
    ";
} else {
    hapusData($_GET['id_spp']);
}
