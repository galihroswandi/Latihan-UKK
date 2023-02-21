<?php
require './functions.php';

function getDataPetugas()
{
    $sql = "SELECT * FROM petugas";

    $data = getData($sql);

    return $data;
};

$data = getDataPetugas();
?>

<div class="container-column">
    <div class="header">
        <h1>Data Petugas</h1>
        <form method="POST">
            <input type="search" name="search" id="search" placeholder="Cari Data">
            <button type="submit">Cari</button>
        </form>
    </div>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $petugas) :
                ?>
                    <tr>
                        <td><?= $petugas['username'] ?></td>
                        <td><?= $petugas['nama_petugas'] ?></td>
                        <td><?= $petugas['level'] ?></td>
                        <td>
                            <a href="?p=petugas/ubah&id_petugas=<?= $petugas['id_petugas'] ?>">Ubah</a> |
                            <a href="?p=petugas/hapus&id_petugas=<?= $petugas['id_petugas'] ?>">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="?p=petugas/tambah" class="add-petugas">Tambah Petugas</a>
    </main>
</div>