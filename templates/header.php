<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/pages/<?= $_GET['p'] ?>.css">
</head>

<body>
    <nav>
        <div class="nav-brand">
            <div class="logo">
                <img src="./public/assets/img/logo-dummy.svg" alt="Logo Dummy">
            </div>
            <div class="desc">
                <h1>Web App Pembayaran SPP</h1>
                <h3>SMK Muhammadiyah Tasikmalaya</h3>
            </div>
        </div>
        <div class="nav-link">
            <ul>
                <li><a href="?p=home" class="<?= $_GET['p'] == 'home' ? 'active' : null; ?>">Home</a></li>
                <li><a href="?p=petugas" class="<?= $_GET['p'] == 'petugas' ? 'active' : null; ?>">Petugas</a></li>
                <li><a href="?p=kelas" class="<?= $_GET['p'] == 'kelas' ? 'active' : null; ?>">Kelas</a></li>
                <li><a href="?p=spp" class="<?= $_GET['p'] == 'spp' ? 'active' : null; ?>">SPP</a></li>
                <li><a href="?p=siswa" class="<?= $_GET['p'] == 'siswa' ? 'active' : null; ?>">Siswa</a></li>
                <li><a href="?p=pembayaran" class="<?= $_GET['p'] == 'pembayaran' ? 'active' : null; ?>">Pembayaran SPP</a></li>
                <li><a href="?p=home"><svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 25H3.66667C2.95942 25 2.28115 24.719 1.78105 24.219C1.28095 23.7189 1 23.0406 1 22.3333V3.66667C1 2.95942 1.28095 2.28115 1.78105 1.78105C2.28115 1.28095 2.95942 1 3.66667 1H9" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M18.3334 19.6666L25 13L18.3334 6.33331" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M25 13H9" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a></li>
            </ul>
        </div>
    </nav>