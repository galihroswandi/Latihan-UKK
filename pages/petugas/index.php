<?php
require './functions.php';

if (isset($_POST['btn_search'])) {
    $keyword = htmlspecialchars($_POST['search']);

    $sql = "SELECT * FROM petugas WHERE username LIKE '%$keyword%' OR nama_petugas LIKE '%$keyword%' OR level LIKE '%$keyword%'";

    $data = getData($sql);
} else {
    $sql = "SELECT * FROM petugas";
    $data = getData($sql);
}
?>
<div class="main-wrapper">
    <img src="./public/assets/main/blur-1.png" alt="Blur Color" class="blur-color-1">
    <div class="table-wrapper">
        <div class="header">
            <h1>Data Petugas</h1>
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
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $petugas) : ?>
                        <tr>
                            <td><?= $petugas['username'] ?></td>
                            <td><?= $petugas['nama_petugas'] ?></td>
                            <td><?= $petugas['level'] ?></td>
                            <td>
                                <a href="?p=petugas/ubah&id_petugas=<?= $petugas['id_petugas'] ?>">Ubah</a> |
                                <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href="?p=petugas/hapus&id_petugas=<?= $petugas['id_petugas'] ?>">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="links">
                <a href="pages/petugas/print.php" class="downloadpdf"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11 7V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 11H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg> Download PDF</a>
                <a href="?p=petugas/tambah" class="add"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11 7V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 11H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Tambah Petugas</a>
            </div>
        </main>
    </div>
    <img src="./public/assets/main/blur-2.png" alt="Blur Color" class="blur-color-2">
    <img src="./public/assets/main/blur-3.png" alt="Blur Color" class="blur-color-3">
</div>