<?php
require_once './functions.php';

$sql = "SELECT * FROM petugas";

$data = getData($sql);
?>

<div class="container">
    <div class="table-wrapper">
        <div class="header-table">
            <h1>Data Petugas</h1>
            <div class="search">
                <input type="search" name="search" id="search">
                <button type="submit" name="btn_search">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.44449 17.8889C14.1083 17.8889 17.889 14.1082 17.889 9.44443C17.889 4.7807 14.1083 1 9.44449 1C4.78073 1 1 4.7807 1 9.44443C1 14.1082 4.78073 17.8889 9.44449 17.8889Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M19.9999 20L15.4082 15.4083" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="table">
            <table border="1">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $petugas) {?>
                        <tr>
                            <th><?=$petugas['username']?></th>
                            <th><?=$petugas['nama_petugas']?></th>
                            <th><?=$petugas['level']?></th>
                            <th>
                                <a href="?p=petugas/ubah&id_petugas=<?=$petugas['id_petugas']?>">Ubah</a> |
                                <a href="?p=petugas/hapus&id_petugas=<?=$petugas['id_petugas']?>">Hapus</a>
                            </th>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            <a href="?p=petugas/tambah">Tambah petugas</a>
        </div>
    </div>
</div>