<?php
require_once './functions.php';

if (isset($_POST['btn_search'])) {
    $keywod = htmlspecialchars($_POST['search']);
    $sql = "SELECT * FROM siswa WHERE bln_dibayar LIKE '%$keywod%' OR jumlah_bayar LIKE '%$keywod%' OR tgl_bayar LIKE '%$keywod%'";

    $data = getData($sql);
} else {
    $sql = "SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN spp ON pembayaran.id_spp = spp.id_spp";

    $data = getData($sql);
}
?>

<div class="container">
    <img src="./public/assets/petugas/blur-1.png" alt="Blur Color" class="blur-color">
    <div class="table-wrapper">
        <div class="header-table">
            <h1>Data Pembyaran SPP</h1>
            <div class="search">
                <form method="POST">
                    <input type="search" name="search" id="search">
                    <button type="submit" name="btn_search">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.44449 17.8889C14.1083 17.8889 17.889 14.1082 17.889 9.44443C17.889 4.7807 14.1083 1 9.44449 1C4.78073 1 1 4.7807 1 9.44443C1 14.1082 4.78073 17.8889 9.44449 17.8889Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M19.9999 20L15.4082 15.4083" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <div class="table">
            <table border="1" width="80%">
                <thead>
                    <tr>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Tanggal</th>
                        <th>Nama Siswa</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $pembayaran) { ?>
                        <tr>
                            <td><?= $pembayaran['tahun_dibayar'] ?></td>
                            <td><?= $pembayaran['bln_dibayar'] ?></td>
                            <td><?= $pembayaran['tgl_bayar'] ?></td>
                            <td><?= $pembayaran['nama'] ?></td>
                            <td><?= $pembayaran['nominal'] ?></td>
                            <td>
                                <a href="?p=pembayaran/ubah&id_pembayaran=<?= $pembayaran['id_pembayaran'] ?>">Ubah</a> |
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href="?p=pembayaran/hapus&nisn=<?= $pembayaran['nisn'] ?>">Hapus</a> |
                                <a href="pages/pembayaran/struk.php?id_pembayaran=<?= $pembayaran['id_pembayaran'] ?>">Struk</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="footer-table">
                <a href="pages/pembayaran/print.php">Download PDF</a>
                <a href="?p=pembayaran/tambah" style="max-width: 15rem;"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11 7V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 11H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Tambah Pembayaran</a>
            </div>
        </div>
    </div>
    <img src="./public/assets/petugas/blur-2.png" alt="Blur Color" class="blur-color-2">
    <img src="./public/assets/petugas/blur-3.png" alt="Blur Color" class="blur-color-3">
</div>