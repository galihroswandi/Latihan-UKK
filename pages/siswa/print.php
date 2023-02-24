<?php
require './../../functions.php';

$sql = "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas JOIN spp ON siswa.id_spp = spp.id_spp";
$data = getData($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siswa | Print</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>

<body>

    <table border="1" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th colspan="3">Data Siswa</th>
            </tr>
            <tr>
                <th>NISN</th>
                <th>Nama Lengkap</th>
                <th>Kelas</th>
                <th>No Telp</th>
                <th>SPP Tahun</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $siswa) { ?>
                <tr style="text-align: center;">
                    <td><?= $siswa['nisn'] ?></td>
                    <td><?= $siswa['nama'] ?></td>
                    <td><?= $siswa['nama_kelas'] ?></td>
                    <td><?= $siswa['no_telp'] ?></td>
                    <td><?= $siswa['tahun'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <br>

    <a href="../../index.php?p=siswa">Kembali</a>

    <script>
        window.print();
    </script>

</body>

</html>