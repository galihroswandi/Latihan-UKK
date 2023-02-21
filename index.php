<?php
// memnulai session
session_start();

if(!isset($_SESSION['id_petugas'])){
    echo "
        <script>
            alert('Anda belum login, Silahkan untuk login..');
            window.location='login.php';           
        </script>       
    ";
}else{
    include './template/header.php'; 
    if(isset($_GET['p'])){
        include './pages/'.$_GET['p'].'/index.php';
    }else{
        include './pages/home/index.php';
    } 
    include './template/footer.php';
}