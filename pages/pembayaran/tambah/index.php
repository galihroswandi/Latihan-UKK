<?php
require './functions.php';

function insertData($post)
{
    $id_petugas = $_SESSION['id_petugas'];
    $siswa = htmlspecialchars($post['siswa']);
    $tgl_bayar = htmlspecialchars($post['tgl_bayar']);
    $bulan = htmlspecialchars($post['bulan']);
    $spp_tahun = htmlspecialchars($post['spp_tahun']);
    $tahun_dibayar = htmlspecialchars($post['tahun_dibayar']);
    $jumlah_bayar = htmlspecialchars($post['jumlah_bayar']);


    $sql = "INSERT INTO pembayaran VALUES('', '$id_petugas', '$siswa', '$tgl_bayar', '$bulan', '$tahun_dibayar', '$spp_tahun','$jumlah_bayar')";
    $insert = changeData($sql);

    if (!$insert) {
        echo "
            <script>
                alert('Data gagal ditambahkan !');
                window.location='?p=pembayaran';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil ditambahkan !');
                window.location='?p=pembayaran';
            </script>
        ";
    }
}

if (isset($_POST['btn_tambah'])) {
    insertData($_POST);
}

$siswa = getData("SELECT * FROM siswa");
$spp = getData("SELECT * FROM spp");
?>
<div class="container">
    <img src="./public/assets/petugas/tambah/blur-1.png" alt="Blur Color" class="blur-color">
    <div class="form-wrapper">
        <div class="header">
            <h1>Tambah Pembayaran</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-input">
                    <label for="siswa">Nama Siswa</label>
                    <select name="siswa" id="siswa">
                        <option value="null">-- Pilih Nama Siswa --</option>
                        <?php foreach ($siswa as $sw) : ?>
                            <option value="<?= $sw['nisn'] ?>"><?= $sw["nama"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-input">
                    <label for="tgl_bayar">Tgl Bayar</label>
                    <input type="date" name="tgl_bayar" id="tgl_bayar" autocomplete="off" required>
                </div>
                <div class="form-input">
                    <label for="bulan">Bulan</label>
                    <input type="month" name="bulan" id="bulan" autocomplete="off" required>
                </div>
                <div class="form-input">
                    <label for="spp_tahun">Tahun</label>
                    <select name="spp_tahun" id="spp_tahun">
                        <option value="null">-- Pilih Tahun SPP --</option>
                        <?php foreach ($spp as $sp) : ?>
                            <option value="<?= $sp['id_spp'] ?>"><?= $sp["tahun"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-input">
                    <label for="tahun_dibayar">Tahun Dibayar</label>
                    <input type="tahun_dibayar" name="tahun_dibayar" id="tahun_dibayar" autocomplete="off" required>
                </div>
                <div class="form-input">
                    <label for="jumlah_bayar">Jumlah Bayar</label>
                    <input type="text" name="jumlah_bayar" id="jumlah_bayar" autocomplete="off" required>
                </div>
                <div class="form-button">
                    <a href="?p=pembayaran">Batal</a>
                    <button type="submit" name="btn_tambah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
    <img src="./public/assets/petugas/tambah/blur-2.png" alt="Blur Color" class="blur-color-2">
    <img src="./public/assets/petugas/tambah/blur-3.png" alt="Blur Color" class="blur-color-3">
</div>