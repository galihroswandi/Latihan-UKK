<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Font Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- My CSS -->
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <header>
        <nav>
            <div class="nav-brand">
                <div class="logo">
                    <img src="./public/assets/img/logo-dummy.jpg" alt="Logo Here">
                </div>
                <div class="desc">
                    <h1>Web App Pembayaran SPP</h1>
                    <h2>SMK Muhammadiyah Tasikmalaya</h2>
                </div>
            </div>
            <div class="nav-link">
                <ul>
                    <?php if ($_SESSION['level'] == 'admin') { ?>
                        <li><a href="?p=home" class="active">Home</a></li>
                        <li><a href="?p=petugas">Petugas</a></li>
                        <li><a href="?p=kelas">Kelas</a></li>
                        <li><a href="?p=spp">SPP</a></li>
                        <li><a href="?p=siswa">Siswa</a></li>
                        <li><a href="?p=pembayaran">Pembayaran SPP</a></li>
                        <li><a onclick="return confirm('Apakah anda yakin ingin keluar ?')" href="logout.php">Sign Out</a></li>
                    <?php } else if ($_SESSION['level'] == 'petugas') { ?>
                        <li><a href="?p=pembayaran">Pembayaran SPP</a></li>
                        <li><a href="?p=history-pembayaran">History Pembayaran SPP</a></li>
                        <li><a onclick="return confirm('Apakah anda yakin ingin keluar ?')" href="logout.php">Sign Out</a></li>
                    <?php } else { ?>
                        <li><a href="?p=history-pembayaran">History Pembayaran SPP</a></li>
                        <li><a onclick="return confirm('Apakah anda yakin ingin keluar ?')" href="logout.php">Sign Out</a></li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </header>