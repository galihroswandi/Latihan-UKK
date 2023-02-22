<?php
require './functions.php';

function getDataSiswa()
{
    $sql = "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas JOIN spp ON siswa.id_spp = spp.id_spp";

    $data = getData($sql);

    return $data;
};

function filterData($keyword)
{
    $keyword = htmlspecialchars($_POST['search']);

    $sql = "SELECT * FROM siswa WHERE nama LIKE '%$keyword%' OR alamat LIKE '%$keyword%'";

    $data = getData($sql);

    return $data;
}


if (isset($_POST['btn_cari'])) {
    $data = filterData($_POST);
} else {
    $data = getDataSiswa();
}
?>

<div class="container-column">
    <div class="header">
        <h1>Data Siswa</h1>
        <form method="POST">
            <input type="search" name="search" id="search" placeholder="Cari Data">
            <button type="submit" name="btn_cari">Cari</button>
        </form>
    </div>
    <main>
        <table>
            <thead>
                <tr>
                    <th>NISN</th>
                    <th>Nama Lengkap</th>
                    <th>Kelas</th>
                    <th>No Telp</th>
                    <th>SPP Tahun</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $siswa) :
                ?>
                    <tr>
                        <td><?= $siswa['nisn'] ?></td>
                        <td><?= $siswa['nama'] ?></td>
                        <td><?= $siswa['nama_kelas'] ?></td>
                        <td><?= $siswa['no_telp'] ?></td>
                        <td><?= $siswa['tahun'] ?></td>
                        <td>
                            <a href="?p=siswa/ubah&nisn=<?= $siswa['nisn'] ?>">Ubah</a> |
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href="?p=siswa/hapus&nisn=<?= $siswa['nisn'] ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="?p=siswa/tambah" class="add">Tambah siswa</a>
    </main>
</div>