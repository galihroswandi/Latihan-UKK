<?php
require_once './functions.php';

if (!isset($_POST['btn_search'])) {
    $sql = "SELECT * FROM kelas";

    $data = getData($sql);
} else {
    $keyword = htmlspecialchars($_POST['search_value']);

    $sql = "SELECT * FROM kelas WHERE nama_kelas LIKE '%$keyword%' OR kompetensi_keahlian LIKE '%$keyword%'";

    $data = getData($sql);
}

?>

<div class="container">
    <div class="table-wrapper">
        <div class="header">
            <h1>Data Kelas</h1>
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
                        <th>Kelas</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $kelas) : ?>
                        <tr>
                            <td><?= $kelas['nama_kelas'] ?></td>
                            <td><?= $kelas['kompetensi_keahlian'] ?></td>
                            <td><a href="?p=kelas/ubah&id_kelas=<?= $kelas['id_kelas'] ?>">Ubah</a> | <a onclick="return confirm('Apakah anda yakin ingin menghapus ?')" href="?p=kelas/hapus&id_kelas=<?= $kelas['id_kelas'] ?>">Hapus</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="link">
                <a href="./pages/kelas/print.php"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11 7V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 11H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Download PDF</a>
                <a href="?p=kelas/tambah"><svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 21C16.5228 21 21 16.5228 21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M11 7V15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M7 11H15" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    Tambah kelas</a>
            </div>
        </main>
    </div>
</div