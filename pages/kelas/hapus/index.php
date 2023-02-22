<?php
require './functions.php';

if (!isset($_GET['id_kelas'])) {
    echo "
        <script>
            alert('Data gagal dihapus');
            window.location='?p=kelas';
        </script>
    ";
    return false;
} else {
    $sql = "DELETE FROM kelas WHERE id_kelas='$_GET[id_kelas]'";
    $hapusData = actionData($sql);

    if (!$hapusData) {
        echo "
            <script>
                alert('Data gagal dihapus');
                window.location='?p=kelas';
            </script>
        ";
        return false;
    }

    echo "
        <script>
            alert('Data berhasil dihapus');
            window.location='?p=kelas';
        </script>
    ";
}
