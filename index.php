<?php

// memulai session
session_start();

if (!isset($_SESSION['id_petugas'])) {
    echo "
        <script>
            alert('Anda belum login, Silahkan login terlebih dahulu !');
            window.location='login.php';
        </script>
    ";
} else {
    include_once './templates/header.php';
    if (isset($_GET['p'])) {
        include_once './pages/' . $_GET['p'] . '/index.php';
    } else {
        include_once './pages/home/index.php';
    }
    include_once './templates/footer.php';
}
