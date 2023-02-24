<?php
require './../../functions.php';

$sql = "SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN spp ON pembayaran.id_spp = spp.id_spp";
$data = getData($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran | Print</title>
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
                <th colspan="3">Data Pembayaran SPP</th>
            </tr>
            <tr>
                <th>Tahun</th>
                <th>Bulan</th>
                <th>Tanggal</th>
                <th>Nama Siswa</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $pembayaran) { ?>
                <tr style="text-align: center;">
                    <td><?= $pembayaran['tahun_dibayar'] ?></td>
                    <td><?= $pembayaran['bln_dibayar'] ?></td>
                    <td><?= $pembayaran['tgl_bayar'] ?></td>
                    <td><?= $pembayaran['nama'] ?></td>
                    <td><?= $pembayaran['nominal'] ?></td>
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