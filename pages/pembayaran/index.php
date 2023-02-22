<?php
require './functions.php';

function getDataPembayaran()
{
    $sql = "SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN spp ON siswa.id_spp = spp.id_spp";

    $data = getData($sql);

    return $data;
};

function filterData($keyword)
{
    $keyword = htmlspecialchars($_POST['search']);

    $sql = "SELECT * FROM pembayaran WHERE tahun_dibayar LIKE '%$keyword%' OR jumlah_bayar LIKE '%$keyword%'";

    $data = getData($sql);

    return $data;
}


if (isset($_POST['btn_cari'])) {
    $data = filterData($_POST);
} else {
    $data = getDataPembayaran();
}
?>

<div class="container-column">
    <div class="header">
        <h1>Data Pembayaran SPP</h1>
        <form method="POST">
            <input type="search" name="search" id="search" placeholder="Cari Data">
            <button type="submit" name="btn_cari">Cari</button>
        </form>
    </div>
    <main>
        <table>
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
                <?php
                foreach ($data as $pembayaran) :
                ?>
                    <tr>
                        <td><?= $pembayaran['tahun_dibayar'] ?></td>
                        <td><?= $pembayaran['bln_dibayar'] ?></td>
                        <td><?= $pembayaran['tgl_bayar'] ?></td>
                        <td><?= $pembayaran['nama'] ?></td>
                        <td><?= $pembayaran['nominal'] ?></td>
                        <td>
                            <a href="?p=pembayaran/ubah&id_pembayaran=<?= $pembayaran['id_pembayaran'] ?>">Ubah</a> |
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href="?p=pembayaran/hapus&id_pembayaran=<?= $pembayaran['id_pembayaran'] ?>">Hapus</a> |
                            <a href="laporan/struk/index.php?id_pembayaran=<?=$pembayaran['id_pembayaran']?>">Struk</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="?p=pembayaran/tambah" class="add">Tambah Pembayaran</a>
    </main>
</div>