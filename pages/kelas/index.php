<?php
require './functions.php';

function getDataKelas()
{
    $sql = "SELECT * FROM kelas";

    $data = getData($sql);

    return $data;
};

function filterDataKelas($keyword)
{
    $keyword = htmlspecialchars($_POST['search']);

    $sql = "SELECT * FROM kelas WHERE nama_kelas LIKE '%$keyword%' OR kompetensi_keahlian LIKE '%$keyword%'";

    $data = getData($sql);

    return $data;
}


if (isset($_POST['btn_cari'])) {
    $data = filterDataKelas($_POST);
} else {
    $data = getDataKelas();
}
?>

<div class="container-column">
    <div class="header">
        <h1>Data Kelas</h1>
        <form method="POST">
            <input type="search" name="search" id="search" placeholder="Cari Data">
            <button type="submit" name="btn_cari">Cari</button>
        </form>
    </div>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Kelas</th>
                    <th>Kompetensi Keahlian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $kelas) :
                ?>
                    <tr>
                        <td><?= $kelas['nama_kelas'] ?></td>
                        <td><?= $kelas['kompetensi_keahlian'] ?></td>
                        <td>
                            <a href="?p=kelas/ubah&id_kelas=<?= $kelas['id_kelas'] ?>">Ubah</a> |
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href="?p=kelas/hapus&id_kelas=<?= $kelas['id_kelas'] ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="?p=kelas/tambah" class="add">Tambah Kelas</a>
    </main>
</div>