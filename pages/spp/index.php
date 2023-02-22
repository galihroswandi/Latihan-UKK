<?php
require './functions.php';

function getDataSPP()
{
    $sql = "SELECT * FROM spp";

    $data = getData($sql);

    return $data;
};

function filterData($keyword)
{
    $keyword = htmlspecialchars($_POST['search']);

    $sql = "SELECT * FROM spp WHERE tahun LIKE '%$keyword%' OR nominal LIKE '%$keyword%'";

    $data = getData($sql);

    return $data;
}


if (isset($_POST['btn_cari'])) {
    $data = filterData($_POST);
} else {
    $data = getDataSPP();
}
?>

<div class="container-column">
    <div class="header">
        <h1>Data SPP</h1>
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
                    <th>Nominal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $spp) :
                ?>
                    <tr>
                        <td><?= $spp['tahun'] ?></td>
                        <td><?= $spp['nominal'] ?></td>
                        <td>
                            <a href="?p=spp/ubah&id_spp=<?= $spp['id_spp'] ?>">Ubah</a> |
                            <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href="?p=spp/hapus&id_spp=<?= $spp['id_spp'] ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="?p=spp/tambah" class="add">Tambah SPP</a>
    </main>
</div>