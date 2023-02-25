<?php
require_once './functions.php';

if (!isset($_POST['btn_search'])) {
    $sql = "SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN spp ON pembayaran.id_spp = spp.id_spp";

    $data = getData($sql);
} else {
    $keyword = htmlspecialchars($_POST['search_value']);

    $sql = "SELECT * FROM pembayaran WHERE tgl_bayar LIKE '%$keyword%' OR jumlah_bayar  LIKE '%$keyword%' OR tahun_dibayar LIKE '%$keyword%'";

    $data = getData($sql);
}

?>

<div class="container">
    <div class="table-wrapper">
        <div class="header">
            <h1>Data Pembayaran SPP</h1>
            <div class="search">
                <form method="POST">
                    <input type="search" name="search_value" id="search_valued" autocomplete="off">
                    <button type="submit" name="btn_search"><svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.44449 17.8889C14.1083 17.8889 17.889 14.1082 17.889 9.44443C17.889 4.7807 14.1083 1 9.44449 1C4.78073 1 1 4.7807 1 9.44443C1 14.1082 4.78073 17.8889 9.44449 17.8889Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M19.9999 20L15.4082 15.4083" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <main>
            <table width="100%">
                <thead>
                    <tr>
                        <th>Tahun SPP</th>
                        <th>Tahun Dibayar</th>
                        <th>Bulan Dibayar</th>
                        <th>Tanggal</th>
                        <th>Nama Siswa</th>
                        <th>Nominal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $pembayaran) : ?>
                        <tr>
                            <td><?= $pembayaran['tahun'] ?></td>
                            <td><?= $pembayaran['tahun_dibayar'] ?></td>
                            <td><?= $pembayaran['bln_dibayar'] ?></td>
                            <td><?= $pembayaran['tgl_bayar'] ?></td>
                            <td><?= $pembayaran['nama'] ?></td>
                            <td>Rp. <?= $pembayaran['nominal'] ?></td>
                            <td><a href="?p=pembayaran/ubah&id_pembayaran=<?= $pembayaran['id_pembayaran'] ?>">Ubah</a> | <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href="?p=pembayaran/hapus&id_pembayaran=<?= $pembayaran['id_pembayaran'] ?>">Hapus</a> | <a href="./pages/pembayaran/nota.php?id_pembayaran=<?= $pembayaran['id_pembayaran'] ?>">Nota</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="link">
                <a href="./pages/pembayaran/print.php"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11 7V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 11H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Download PDF</a>
                <a href="?p=pembayaran/tambah"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11 7V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 11H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Tambah pembayaran</a>
            </div>
        </main>
    </div>
</div