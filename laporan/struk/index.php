<?php
require '../../functions.php';

if(!$_GET['id_pembayaran']){
    echo "<script>window.location='../../index.php?p=pembayaran'</script>";
}

$sql = "SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN spp ON pembayaran.id_spp = spp.id_spp WHERE id_pembayaran='{$_GET['id_pembayaran']}'";
$data = getSingleData($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran App | Struk</title>
    <link rel="stylesheet" href="struk.css">
</head>

<body>
    <div class="struk">
        <table>
            <tr class="header">
                <td>
                    <img src="../../public/assets/img/logo-dummy.jpg" alt="Logo Dummy">
                </td>
                <td colspan="2">
                    <h1>Pembayaran SPP</h1>
                    <h2>SMK Muhammadiyah Tasikmalaya</h2>
                    <p style="text-align: center;">Jl. Rumah Sakit No.29 Empangsari Kec.Tawang</p>
                </td>
            </tr>
            <tr>
                <td align="center" colspan="3"><h2>Bukti Pembayaran</h2></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p>No Transaksi : <?=$data['id_pembayaran']?></p>
                    <p>NISN : <?=$data['nisn']?></p>
                    <p>Nama         : <?=$data['nama']?></p>
                </td>
                <td colspan="3">
                    <p style="text-align: right;">Tanggal : <?=$data['tgl_bayar']?></p>
                    <p  style="text-align: right;">NISN : 1232424</p>
                    <p  style="text-align: right;">Nama         : Otong</p>
                </td>
            </tr>
            <tr class="thead">
                <td>No.</td>
                <td>Nama Pembayaran</td>
                <td>Nominal</td>
            </tr>
            <tr class="tbody">
                <td>1.</td>
                <td>BIAYA SPP TAHUN <?=$data['tahun_dibayar']?> Bulan <?=$data['bln_dibayar']?></td>
                <td><?=$data['nominal']?></td>
            </tr>
            <tr class="tbody">
                <td>1.</td>
                <td>BIAYA SPP TAHUN 2022 Bulan Februari</td>
                <td>450000</td>
            </tr>
            <tr class="thead">
                <td colspan="3" style="text-align: right;">
                    <b>Total Sudah Dibayar 840.000</b>
                </td>
            </tr>
            <tr>
                <td colspan="3">    
                    <p  style="text-align: right;">Tasikmalaya, 10 maret 2022</p>
                    <p style="margin-bottom: 3rem; text-align: right;">Petugas</p>
                    <p  style="text-align: right;">Admin1</p>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>