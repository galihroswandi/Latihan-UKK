<?php

session_start();

session_destroy();
unset($_SESSION['id_petugas']);
unset($_SESSION['level']);

echo "<script>window.location='login.php'</script>";
