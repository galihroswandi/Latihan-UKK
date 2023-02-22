<?php
session_start();

session_destroy();
unset($_SESSION['id_petugas']);
unset($_SESSION['level']);
unset($_SESSION['msg']);

echo "<script>window.location='login.php'</script>";