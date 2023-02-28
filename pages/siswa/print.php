<?php
require './../../functions.php';
$data = getData("SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas JOIN spp ON siswa.id_spp = spp.id_spp ");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran SPP | Print</title>
    <style>
        @import './../../public/css/partials/variables.css';

        body {
            background-color: #fff;
        }

        table {
            border-collapse: collapse;
            border: 0.1rem solid var(--blue-800);
            margin-inline: auto;
            margin-top: 2rem;
        }

        table>thead>tr>th {
            padding: 1rem;
            border-right: 0.1rem solid var(--blue-800);
            border-bottom: 0.1rem solid var(--blue-800);
            background-color: var(--bg-primary);
            color: var(--blue-900);
            font-size: 1.12rem;
        }

        table>tbody>tr>td {
            padding: 0.7rem;
            border-right: 0.1rem solid var(--blue-800);
            border-bottom: 0.1rem solid var(--blue-800);
            font-size: 1.1rem;
            color: var(--slate-700);
        }

        .container{
            width: 100%;
            margin-top: 2rem;
        }

        .container>a {
            font-size: 2rem;
            text-decoration: none;
            margin-left: 3rem;
        }

        .container>h1{
            color: var(--blue-900);
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Data Siswa</h1>
        <table width="85%">
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>No Telp</th>
                    <th>SPP Tahun</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $siswa) : ?>
                    <tr>
                        <td><?= $siswa['nisn'] ?></td>
                        <td><?= $siswa['nama'] ?></td>
                        <td><?= $siswa['nama_kelas'] ?></td>
                        <td><?= $siswa['no_telp'] ?></td>
                        <td><?= $siswa['tahun'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="../../index.php?p=siswa">&laquo;</a>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>