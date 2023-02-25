<?php
require './../../functions.php';
date_default_timezone_set('Asia/Jakarta');
if (!isset($_GET['id_pembayaran'])) {
    echo "
        <script>window.location='../../index.php?p=pembayaran'</script>
    ";
    return false;
}

$data = getSingleData("SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN spp ON pembayaran.id_spp = spp.id_spp JOIN kelas ON siswa.id_kelas = kelas.id_kelas JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas WHERE id_pembayaran='{$_GET['id_pembayaran']}'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi | Nota</title>
    <style>
        @import '../../public/css/partials/variables.css';

        div.container>table.header {
            margin-inline: auto;
            border-collapse: collapse;
            border-bottom: .2rem dotted var(--slate-700);
            margin-top: 1rem;
        }

        div.container>table {
            margin-inline: auto;
            border-collapse: collapse;
        }

        div.container>table>tr>td.bukti-2 {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <table cellspacing="0" width="60%" class="header">
            <thead>
                <td colspan="2" align="center">
                    <img src="./../../public/assets/img/logo-dummy.svg" alt="Logo Dummy" width="100">
                </td>
                <td colspan="3" style="padding: .5rem 1rem; text-align: center;">
                    <h1>Pembayaran SPP</h1>
                    <h2>SMK Muhammadiyah Tasikmalaya</h2>
                    <p>Jl. Rumah Sakit No.29, Empangsari Ke.Tawang</p>
                </td>
            </thead>
        </table>
        <table width="60%" class="header" cellpadding="2">
            <tr>
                <th colspan="4" align="center" style="padding-top: -1rem; padding-bottom: .6rem;">
                    <h2>Bukti Pembayaran</h2>
                </th>
            </tr>
            <tr style="display: flex; justify-content: space-between;">
                <td class="bukti" style="display: flex; flex-direction: column; gap: .6rem;font-size: 1.2rem; margin-bottom: .9rem;">
                    <p>No Transaksi : <?= $data['id_pembayaran'] ?></p>
                    <p>NISN : <?= $data['nisn'] ?></p>
                    <p>Nama: <?= $data['nama'] ?></p>
                </td>
                <td class="bukti-2" align="right" style="font-size: 1.2rem; display: grid; gap: .6rem;">
                    <p>Tanggal : <?= $data['tgl_bayar'] ?></p>
                    <p>Kelas : <?= $data['nama_kelas'] ?></p>
                </td>
            </tr>
        </table>
        <table width="60%" cellpadding="10" class="header" style="padding-bottom: .8rem;">
            <thead style="border-bottom: .2rem dotted #000;">
                <tr>
                    <th align="center" style="padding-top: .8rem; padding-bottom: .8rem;">No.</th>
                    <th>Nama Pembayaran</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                <td align="center" style="padding-top: .8rem; padding-bottom: 2rem;">1. </td>
                <td align="center">Biaya SPP Tahun <?= $data['tahun'] ?> Bulan <?= $data['bln_dibayar'] ?></td>
                <td align="center"><?= $data['nominal'] ?></td>
            </tbody>
        </table>
        <table width="60%" class="header" cellpadding="10" style="padding-bottom: .8rem;">
            <tr>
                <td colspan="3" align="center">
                    <h3>Total Sudah Dibayar</h3>
                </td>
                <td colspan="2" align="center">
                    <?= $data['jumlah_bayar'] ?>
                </td>
            </tr>
        </table>
        <table width="60%" style="margin-top: 2rem;">
            <tr>
                <td colspan="8" align="right">
                    <p>Tasikmalaya <?= date('d D m Y') ?></p>
                    <p>Petugas</p><br><br><br><br>
                    <p><?= $data['nama_petugas'] ?></p>
                </td>
            </tr>
        </table>
    </div>
    <a href="../../index.php?p=pembayaran" style="font-size: 2.2rem; margin-left: 3rem; transform: translateY(-5rem);">&laquo;</a>
</body>

</html>