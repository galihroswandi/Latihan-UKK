<?php

// memulai session
session_start();


if (isset($_SESSION['id_petugas'])) {
    include './templates/header.php';
    if (isset($_GET['p'])) {
        include './pages/' . $_GET['p'] . '/index.php';
    } else {
        include './pages/home/index.php';
    }
    include './templates/footer.php';
} else {
    echo "
        <script>
            alert('Anda belum login, silahkan login terlebih dahulu !');
            window.location='login.php';
        </script>
    ";
}
