<?php
require_once './functions.php';

function tambahData($post)
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

    // Query insert ke database
    $sql = "INSERT INTO pembayaran VALUES('', '$id_petugas', '$nisn', '$tanggal', '$bulan', '{$tahun_dibayar}', '{$spp['id_spp']}', '$jumlah_bayar')";

    $insertData = actionData($sql);

    if (!$insertData) {
        echo "
            <script>
                alert('Data gagal ditambahkan !');
            </script>
        ";

        return false;
    }

    echo "
        <script>
            alert('Data berhasil ditambahkan !');
            window.location='?p=pembayaran';
        </script>
    ";
}

if (isset($_POST['btn_tambah'])) {
    tambahData($_POST);
}

$siswa = getData('SELECT * FROM siswa');
$data_spp = getData('SELECT * FROM spp');

?>

<div class="container">
    <div class="form" style="padding: 1.5rem 3rem;">
        <header>
            <h1>Input data Pembayaran</h1>
        </header>
        <form method="POST">
            <div class="input-field">
                <label for="nama_siswa">Nama Siswa</label>
                <select name="nama_siswa" id="nama_siswa">
                    <option value="null">-- Pilih Siswa --</option>
                    <?php foreach ($siswa as $sw) : ?>
                        <option value="<?= $sw['nisn'] ?>"><?= $sw['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-field">
                <label for="tanggal">tanggal</label>
                <input type="date" name="tanggal" id="tanggal" autocomplete="off" required placeholder="Masukan Tanggal">
            </div>
            <div class="input-field">
                <label for="bulan">bulan</label>
                <input type="month" name="bulan" id="bulan" autocomplete="off" required placeholder="Masukan Bulan">
            </div>
            <div class="input-field">
                <label for="tahun">Tahun</label>
                <select name="tahun" id="tahun">
                    <option value="null">-- Pilih Tahun --</option>
                    <?php foreach ($data_spp as $spp) : ?>
                        <option value="<?= $spp['tahun'] ?>"><?= $spp['tahun'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-field">
                <label for="jumlah_bayar">Jumlah Bayar</label>
                <input type="text" name="jumlah_bayar" id="jumlah_bayar" autocomplete="off" required placeholder="Masukan Jumlah Bayar">
            </div>
            <div class="input-field-button">
                <a href="?p=pembayaran">Batal</a>
                <button type="submit" name="btn_tambah">Simpan</button>
            </div>
        </form>
    </div>
</div>