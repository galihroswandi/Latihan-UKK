<?php
require './functions.php';

// cek jika tidak ada nisn
if (!isset($_GET['id_pembayaran'])) {
    echo "
        <script>
            window.location='?p=pembayaran';
        </script>
    ";
} else {
    $sql = "SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN spp ON pembayaran.id_spp = spp.id_spp";
    $data = getSingleData($sql);
}

function updateData($post)
{
    $id_petugas = $_SESSION['id_petugas'];
    $siswa = htmlspecialchars($post['siswa']);
    $tgl_bayar = htmlspecialchars($post['tgl_bayar']);
    $bulan = htmlspecialchars($post['bulan']);
    $spp_tahun = htmlspecialchars($post['spp_tahun']);
    $tahun_dibayar = htmlspecialchars($post['tahun_dibayar']);
    $jumlah_bayar = htmlspecialchars($post['jumlah_bayar']);

    $sql = "UPDATE pembayaran SET 
        id_petugas='$id_petugas',
        nisn='$siswa',
        tgl_bayar='$tgl_bayar',
        bln_dibayar='$bulan',
        id_spp='$spp_tahun',
        tahun_dibayar='$tahun_dibayar',
        jumlah_bayar='$jumlah_bayar' WHERE id_pembayaran = '{$_GET['id_pembayaran']}'
    ";
    $ubahData = changeData($sql);

    if (!$ubahData) {
        echo "
            <script>
                alert('Data gagal diubah !');
                window.location='?p=pembayaran;
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil diubah !');
                window.location='?p=pembayaran;
            </script>
        ";
    }
}

if (isset($_POST['btn_ubah'])) {
    updateData($_POST);
}

$siswa = getData("SELECT * FROM siswa");
$spp = getData("SELECT * FROM spp");
?>
<div class="container">
    <img src="./public/assets/petugas/tambah/blur-1.png" alt="Blur Color" class="blur-color">
    <div class="form-wrapper">
        <div class="header">
            <h1>Ubah Data Pembayaran</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-input">
                    <label for="siswa">Nama Siswa</label>
                    <select name="siswa" id="siswa">
                        <option value="null">-- Pilih Nama Siswa --</option>
                        <?php foreach ($siswa as $sw) : ?>
                            <option value="<?= $sw['nisn'] ?>" <?= $data['nisn'] == $sw['nisn'] ? 'selected' : null; ?>><?= $sw["nama"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-input">
                    <label for="tgl_bayar">Tgl Bayar</label>
                    <input type="date" name="tgl_bayar" id="tgl_bayar" autocomplete="off" required value="<?= $data['tgl_bayar'] ?>">
                </div>
                <div class="form-input">
                    <label for="bulan">Bulan</label>
                    <input type="month" name="bulan" id="bulan" autocomplete="off" required value="<?= $data['bln_dibayar'] ?>">
                </div>
                <div class="form-input">
                    <label for="spp_tahun">Tahun</label>
                    <select name="spp_tahun" id="spp_tahun">
                        <option value="null">-- Pilih Tahun SPP --</option>
                        <?php foreach ($spp as $sp) : ?>
                            <option value="<?= $sp['id_spp'] ?>" <?= $data['id_spp'] == $sp['id_spp'] ? 'selected' : null; ?>><?= $sp["tahun"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-input">
                    <label for="tahun_dibayar">Tahun Dibayar</label>
                    <input type="tahun_dibayar" name="tahun_dibayar" id="tahun_dibayar" autocomplete="off" required value="<?=$data['tahun_dibayar']?>">
                </div>
                <div class="form-input">
                    <label for="jumlah_bayar">Jumlah Bayar</label>
                    <input type="text" name="jumlah_bayar" id="jumlah_bayar" autocomplete="off" required value="<?=$data['jumlah_bayar']?>">
                </div>
                <div class="form-button">
                    <a href="?p=siswa">Batal</a>
                    <button type="submit" name="btn_ubah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
    <img src="./public/assets/petugas/tambah/blur-2.png" alt="Blur Color" class="blur-color-2">
    <img src="./public/assets/petugas/tambah/blur-3.png" alt="Blur Color" class="blur-color-3">
</div>