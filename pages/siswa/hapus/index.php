<?php
require_once './functions.php';

function hapusData($id)
{

    $sql = "DELETE FROM siswa WHERE nisn = '$id'";

    $hapus = actionData($sql);

    if (!$hapus) {
        echo "
            <script>
                alert('Data gagal dihapus !');
                window.location='index.php?p=siswa';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil dihapus !');
                window.location='index.php?p=siswa';
            </script>
        ";
    }
}

if (!isset($_GET['nisn'])) {
    echo "
        <script>
            window.location='index.php?p=nisn';
        </script>
    ";
} else {
    hapusData($_GET['nisn']);
}
