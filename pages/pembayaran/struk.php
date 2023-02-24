<?php
require './../../functions.php';

if (!isset($_GET['id_pembayaran'])) {
    echo "
        <script>window.location='../../'</script>
    ";
    return false;
}

$sql = "SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN spp ON pembayaran.id_spp = spp.id_spp JOIN kelas ON siswa.id_kelas = kelas.id_kelas JOIN petugas ON pembayaran.id_petugas = petugas.id_petugas WHERE id_pembayaran='{$_GET['id_pembayaran']}'";

$data = getSingleData($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran SPP</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>

<body>
    <table style="border-bottom: .2rem dotted #000; margin-inline: auto;" width="70%">
        <thead>
            <tr align="center">
                <td colspan="3">
                    <img src="./../../public/assets/img/logo-dummy.svg" alt="Logo Dummy" width="100">
                </td>
                <td colspan="5">
                    <h1>Pembayaran SPP</h1>
                    <h3>SMK Muhammadiyah Tasikmalaya</h3>
                    <p>Jl. Rumah Sakit No.29, Empangsari (Kec. Tawang)</p>
                </td>
            </tr>
        </thead>
    </table>
    <table style="border-bottom: .2rem dotted #000; margin-inline: auto;" width="70%">
        <thead>
            <tr>
                <td colspan="5" align="center">
                    <h2>Bukti Pembayaran</h2>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="left">
                    <p>No Transaksi : <?= $data['id_pembayaran'] ?></p>
                    <p>NISN : <?= $data['nisn'] ?></p>
                    <p>Nama : <?= $data['nama'] ?></p>
                </td>
                <td colspan="2" align="right">
                    <p>Tanggal : <?= $data['tgl_bayar'] ?></p>
                    <p>Tanggal : <?= $data['nama_kelas'] ?></p>
                </td>
            </tr>
        </thead>
    </table>
    <table style="border-bottom: .2rem dotted #000; margin-inline: auto;" width="70%">
        <tr>
            <td>No</td>
            <td>Nama Pembayaran</td>
            <td>Nominal</td>
        </tr>
    </table>
    <table style="border-bottom: .2rem dotted #000; margin-inline: auto; padding-top: 2rem; padding-bottom: 2rem;" width="70%">
        <tr>
            <td>1</td>
            <td>Biaya SPP Tahun <?= $data['tahun'] ?> Bulan <?= $data['bln_dibayar'] ?></td>
            <td><?= $data['nominal'] ?></td>
        </tr>
    </table>
    <table style="border-bottom: .2rem dotted #000; margin-inline: auto; padding-top: .5rem; padding-bottom: .5rem;" width="70%">
        <tr>
            <td colspan="3" align="right">Total yang sudah dibayar <?= $data['jumlah_bayar'] ?></td>
        </tr>
    </table>
    <table style="margin-inline: auto; padding-top: .5rem; padding-bottom: .5rem;" width="70%">
        <tr>
            <td colspan="3" align="right">
                <p>Tasikmalaya <?= $data['tgl_bayar'] ?></p>
                <p>Petugas</p>
            </td>
        </tr>
        <tr>
            <td style="padding-top: 3rem;" colspan="3" align="right">
                <?= $data['nama_petugas'] ?>
            </td>
        </tr>
    </table>

    <a href="../../index.php?p=pembayaran">Kembali</a>
</body>

</html>