<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- My Css -->
    <link rel="stylesheet" href="./public/css/<?= $_GET['p'] ?>.css">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="nav-brand">
            <img src="./public/assets/img/logo-dummy.svg" alt="Logo Brand" class="logo">
            <div class="desc">
                <h1>Web App Pembayaran SPP</h1>
                <h2>SMK Muhammadiyah Tasikmalaya</h2>
            </div>
        </div>
        <div class="nav-link">
            <ul>
                <li><a href="?p=home">Home</a></li>
                <li><a href="?p=petugas">Petugas</a></li>
                <li><a href="?p=kelas">Kelas</a></li>
                <li><a href="?p=spp">SPP</a></li>
                <li><a href="?p=siswa">Siswa</a></li>
                <li><a href="?p=pembayaran">Pembayaran SPP</a></li>
                <li><a onclick="return confirm('Apakah anda yakin ingin keluar ?')" href="logout.php" title="Sign Out">
                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 25H3.66667C2.95942 25 2.28115 24.719 1.78105 24.219C1.28095 23.7189 1 23.0406 1 22.3333V3.66667C1 2.95942 1.28095 2.28115 1.78105 1.78105C2.28115 1.28095 2.95942 1 3.66667 1H9" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M18.3334 19.6666L25 13L18.3334 6.33331" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M25 13H9" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a></li>
            </ul>
        </div>
    </nav>