<?php
require_once './functions.php';

if (!isset($_GET['id_pembayaran'])) {
    echo "
        <script>
            window.location='?p=pembayaran';
        </script>    
    ";
}

function ubahData($post)
{
    $id_petugas = $_SESSION['id_petugas'];
    $nisn = htmlspecialchars($post['nama_siswa']);
    $tanggal = htmlspecialchars($post['tanggal']);
    $bulan = htmlspecialchars($_POST['bulan']);
    $tahun_dibayar = htmlspecialchars($post['tahun']);
    $jumlah_bayar = htmlspecialchars($post['jumlah_bayar']);


    // query sql untuk menggunakan tahun spp
    $sql = "SELECT * FROM siswa JOIN spp ON siswa.id_spp = spp.id_spp WHERE siswa.nisn='$nisn'";

    $spp = getSingleData($sql);


    $sql = "UPDATE pembayaran SET 
        id_petugas='$id_petugas',
        nisn='$nisn',
        tgl_bayar='$tanggal',
        bln_dibayar='$bulan',
        tahun_dibayar='$tahun_dibayar',
        id_spp='{$spp['id_spp']}',
        jumlah_bayar='$jumlah_bayar' WHERE id_pembayaran='{$_GET['id_pembayaran']}'
    ";

    $updateData = actionData($sql);

    if (!$updateData) {
        echo "
            <script>
                alert('Data gagal diubah !');
            </script>
        ";

        return false;
    }

    echo "
        <script>
            alert('Data berhasil diubah !');
            window.location='?p=pembayaran';
        </script>
    ";
}

$sql = "SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN spp ON siswa.id_spp = spp.id_spp WHERE id_pembayaran='$_GET[id_pembayaran]'";
$singleData = getSingleData($sql);

if (isset($_POST['btn_ubah'])) {
    ubahData($_POST);
}

$siswa = getData('SELECT * FROM siswa');
$data_spp = getData('SELECT * FROM spp');

?>

<div class="container">
    <div class="form" style="padding: 1.5rem 3rem;">
        <header>
            <h1>Ubah data Pembayaran</h1>
        </header>
        <form method="POST">
            <div class="input-field">
                <label for="nama_siswa">Nama Siswa</label>
                <select name="nama_siswa" id="nama_siswa">
                    <option value="null">-- Pilih Siswa --</option>
                    <?php foreach ($siswa as $sw) : ?>
                        <option value="<?= $sw['nisn'] ?>" <?= $sw['nisn'] == $singleData['nisn'] ? 'selected' : null; ?>><?= $sw['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-field">
                <label for="tanggal">tanggal</label>
                <input type="date" name="tanggal" id="tanggal" autocomplete="off" required placeholder="Masukan Tanggal" value="<?= $singleData['tgl_bayar'] ?>">
            </div>
            <div class="input-field">
                <label for="bulan">bulan</label>
                <input type="month" name="bulan" id="bulan" autocomplete="off" required placeholder="Masukan Bulan" value="<?= $singleData['bln_dibayar'] ?>">
            </div>
            <div class="input-field">
                <label for="tahun">Tahun</label>
                <select name="tahun" id="tahun">
                    <option value="null">-- Pilih Tahun --</option>
                    <?php foreach ($data_spp as $spp) : ?>
                        <option value="<?= $spp['tahun'] ?>" <?= $spp['id_spp'] == $singleData['id_spp'] ? 'selected' : null; ?>><?= $spp['tahun'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-field">
                <label for="jumlah_bayar">Jumlah Bayar</label>
                <input type="month" name="jumlah_bayar" id="jumlah_bayar" autocomplete="off" required placeholder="Masukan Jumlah Bayar" value="<?= $singleData['jumlah_bayar'] ?>">
            </div>
            <div class="input-field-button">
                <a href="?p=pembayaran">Batal</a>
                <button type="submit" name="btn_ubah">Simpan</button>
            </div>
        </form>
    </div>
</div>