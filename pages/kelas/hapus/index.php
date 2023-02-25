<?php
require_once './functions.php';

function hapusData($id)
{

    $sql = "DELETE FROM kelas WHERE id_kelas = '$id'";

    $hapus = actionData($sql);

    if (!$hapus) {
        echo "
            <script>
                alert('Data gagal dihapus !');
                window.location='index.php?p=kelas';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil dihapus !');
                window.location='index.php?p=kelas';
            </script>
        ";
    }
}

if (!isset($_GET['id_kelas'])) {
    echo "
        <script>
            window.location='index.php?p=kelas';
        </script>
    ";
} else {
    hapusData($_GET['id_kelas']);
}
