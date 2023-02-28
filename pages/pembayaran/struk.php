<?php
require './../../functions.php';

if (!isset($_GET['id_pembayaran'])) {
    echo "<script>window.location='../../index.php?p=pembayaran '</script>";
} else {
    $data = getSingleData("SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn=siswa.nisn JOIN kelas ON siswa.id_kelas = kelas.id_kelas JOIN spp ON pembayaran.id_spp = spp.id_spp JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemabayaran App | Struk</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
        }

        table {
            margin-top: 1rem;
            border-collapse: collapse;
            border-bottom: 3px dotted #000;
            margin-inline: auto;
        }

        table td h1,
        p {
            line-height: .1rem;
        }

        .container>a {
            display: inline-block;
            font-size: 1.8rem;
            position: absolute;
            transform: translate(2rem, -5rem);
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <table width="50%">
            <tr>
                <td>
                    <img src="./../../public/assets/img/logo-dummy.svg" alt="Logo Dummy" width="100">
                </td>
                <td align="center">
                    <h1>Pembayaran SPP</h1>
                    <h2>SMK Muhammadiyah Tasikmalaya</h2>
                    <p>Jl. Rumah Sakit No 29, Empangsari, Kec.Tawang</p>
                </td>
            </tr>
        </table>
        <table width="50%">
            <tr>
                <td colspan="3" align="center">
                    <h3 style="line-height: 0;">Bukti Pembayaran</h3>
                </td>
            </tr>
            <tr style="margin-top: 1rem;">
                <td>
                    <p>No Transaksi : <?= $data['id_pembayaran'] ?></p>
                    <p>NIS : <?= $data['nis'] ?></p>
                    <p>Nama : <?= strtoupper($data['nama']) ?></p>
                </td>
                <td align="right">
                    <p>Tanggal : <?= $data['tgl_bayar'] ?></p>
                    <p>kelas : <?= $data['nama_kelas'] ?></p>
                </td>
            </tr>
        </table>
        <table width="50%">
            <tr>
                <th>No</th>
                <th>Nama Pembayaran</th>
                <th>Nominal</th>
            </tr>
        </table>
        <table width="50%">
            <tr>
                <td style="padding-bottom: 5rem;">1</td>
                <td style="padding-bottom: 5rem;">Pembayaran SPP Tahun <?= $data['tahun'] ?> Bulan <?= $data['bulan_dibayar'] ?></td>
                <td style="padding-bottom: 5rem;"><?= $data['nominal'] ?></td>
            </tr>
        </table>
        <table width="50%">
            <tr>
                <td colspan="4" align="right">
                    <h3 style="line-height: 0;">Total Sudah Dibayar</h3>
                </td>
                <td align="right" style="padding-right: 3rem;">
                    <h3 style="line-height: 0;"><?= $data['jumlah_bayar'] ?></h3>
                </td>
            </tr>
        </table>
        <table width="50%" style="border-bottom: none;">
            <tr>
                <td colspan="6" align="right">
                    <p>Tasikmalaya <?= date('d,m Y') ?></p>
                    <p>Petugas</p>
                    <p style="margin-top: 5rem;"><?= $data['nama_petugas'] ?></p>
                </td>
            </tr>
        </table>
        <a href="../../index.php?p=pembayaran" title="Kembali">&laquo;</a>
    </div>
</body>

</html>