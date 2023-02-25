<?php
require_once './functions.php';

function hapusData($id)
{

    // cek apakah data sedang digunakan atau tidak ?
    if ($_SESSION['id_petugas'] == $id) {
        echo "
            <script>
                alert('Warning: Data yang sedang digunakan tidak dapat dihapus !');
                window.location='index.php?p=petugas';
            </script>
        ";
        return false;
    }

    $sql = "DELETE FROM petugas WHERE id_petugas = '$id'";

    $hapus = actionData($sql);

    if (!$hapus) {
        echo "
            <script>
                alert('Data gagal dihapus !');
                window.location='index.php?p=petugas';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil dihapus !');
                window.location='index.php?p=petugas';
            </script>
        ";
    }
}

if (!isset($_GET['id_petugas'])) {
    echo "
        <script>
            window.location='index.php?p=petugas';
        </script>
    ";
} else {
    hapusData($_GET['id_petugas']);
}
