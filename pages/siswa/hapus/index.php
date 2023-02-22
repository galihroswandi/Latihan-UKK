<?php
require './functions.php';

if (!isset($_GET['nisn'])) {
    echo "
        <script>
            alert('Data gagal dihapus');
            window.location='?p=siswa';
        </script>
    ";
    return false;
} else {
    $sql = "DELETE FROM siswa WHERE nisn='$_GET[nisn]'";
    $hapusData = actionData($sql);

    if (!$hapusData) {
        echo "
            <script>
                alert('Data gagal dihapus');
                window.location='?p=siswa';
            </script>
        ";
        return false;
    }

    echo "
        <script>
            alert('Data berhasil dihapus');
            window.location='?p=siswa';
        </script>
    ";
}
