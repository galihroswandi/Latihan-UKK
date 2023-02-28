<?php
require './functions.php';

if (isset($_POST['btn_search'])) {
    $keyword = htmlspecialchars($_POST['search']);

    $sql = "SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp = spp.id_spp JOIN siswa ON pembayaran.nisn = siswa.nisn WHERE siswa.nama LIKE '%$keyword%' OR spp.tahun LIKE '%$keyword%' OR spp.nominal LIKE '%$keyword%' OR pembayaran.nominal LIKE '%$keyword%'";

    $data = getData($sql);
} else {
    $sql = "SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp = spp.id_spp JOIN siswa ON pembayaran.nisn = siswa.nisn";
    $data = getData($sql);
}
?>
<div class="main-wrapper">
    <img src="./public/assets/main/blur-1.png" alt="Blur Color" class="blur-color-1">
    <div class="table-wrapper" style="padding-bottom: 5rem;">
        <div class="header">
            <h1>History Pembayaran</h1>
            <div class="search">
                <form method="POST">
                    <input type="search" name="search" id="search" autocomplete="off">
                    <button type="submit" name="btn_search">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.44449 17.8889C14.1083 17.8889 17.889 14.1082 17.889 9.44443C17.889 4.7807 14.1083 1 9.44449 1C4.78073 1 1 4.7807 1 9.44443C1 14.1082 4.78073 17.8889 9.44449 17.8889Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M19.9999 20L15.4082 15.4083" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <main>
            <table width="85%">
                <thead>
                    <tr>
                        <th>Tahun SPP</th>
                        <th>Tahun Dibayar</th>
                        <th>Bulan</th>
                        <th>Tanggal</th>
                        <th>Nominal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $pembayaran) : ?>
                        <tr>
                            <td><?= $pembayaran['tahun'] ?></td>
                            <td><?= $pembayaran['tahun_dibayar'] ?></td>
                            <td><?= $pembayaran['bulan_dibayar'] ?></td>
                            <td><?= $pembayaran['tgl_bayar'] ?></td>
                            <td><?= $pembayaran['nominal'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </div>
    <img src="./public/assets/main/blur-2.png" alt="Blur Color" class="blur-color-2">
    <img src="./public/assets/main/blur-3.png" alt="Blur Color" class="blur-color-3">
</div>