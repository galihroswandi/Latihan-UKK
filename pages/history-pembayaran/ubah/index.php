<?php
require_once './functions.php';

if (!isset($_GET['id_pembayaran'])) {
    echo "<script>window.location='?p=pembayaran';</script>";
} else {

    // get single data
    $sql = "SELECT * FROM pembayaran JOIN spp ON pembayaran.id_spp = spp.id_spp JOIN siswa ON pembayaran.nisn = siswa.nisn WHERE id_pembayaran='{$_GET['id_pembayaran']}'";

    $data = getSingleData($sql);
}

function ubahData($post)
{
    $id_petugas = $_SESSION['id_petugas'];
    $nama_siswa = htmlspecialchars($post['nama_siswa']);
    $tgl_bayar = htmlspecialchars($post['tgl_bayar']);
    $bulan = htmlspecialchars($post['bulan']);
    $tahun_dibayar = htmlspecialchars($post['tahun_dibayar']);
    $jumlah_bayar = htmlspecialchars($post['jumlah_bayar']);

    $id_spp = getData("SELECT * FROM siswa WHERE nisn = '$nama_siswa'")[0];

    $sql = "UPDATE pembayaran SET 
        tahun_dibayar='$tahun_dibayar',
        id_petugas='$id_petugas',
        nisn='$nama_siswa',
        tgl_bayar='$tgl_bayar',
        bulan_dibayar='$bulan',
        jumlah_bayar='$jumlah_bayar',
        id_spp='{$id_spp['id_spp']}' WHERE id_pembayaran='{$_GET['id_pembayaran']}'";

    $insert = changeData($sql);

    if (!$insert) {
        echo "
        <script>
            alert('Data gagal ditambahkan !, Error Code : " . $insert . "');
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

$siswa = getData("SELECT * FROM siswa");

if (isset($_POST['btn_ubah'])) {
    ubahData($_POST);
}
?>
<div class="tambah-wrapper">
    <form method="POST">
        <h1>Ubah Data Pembayaran</h1>
        <div class="form-label">
            <label for="nama_siswa">Nama Siswa</label>
            <select name="nama_siswa" id="nama_siswa">
                <option value="null">-- Pilih Siswa --</option>
                <?php foreach ($siswa as $sw) : ?>
                    <option value="<?= $sw['nisn'] ?>" <?= $data['nisn'] == $sw['nisn'] ? 'selected' : null; ?>><?= $sw['nama'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-label">
            <label for="tgl_bayar">Tgl Bayar</label>
            <input type="date" name="tgl_bayar" id="tgl_bayar" placeholder="Masukan tgl_bayar" autocomplete="off" required value="<?= $data['tgl_bayar'] ?>">
        </div>
        <div class="form-label">
            <label for="bulan">Bulan</label>
            <input type="text" name="bulan" id="bulan" placeholder="Masukan bulan" autocomplete="off" required value="<?= $data['bulan_dibayar'] ?>">
        </div>
        <div class="form-label">
            <label for="tahun_dibayar">Tahun Dibayar</label>
            <input type="text" name="tahun_dibayar" id="tahun_dibayar" placeholder="Masukan tahun" autocomplete="off" required value="<?= $data['tahun_dibayar'] ?>">
        </div>
        <div class="form-label">
            <label for="jumlah_bayar">Jumlah Bayar</label>
            <input type="text" name="jumlah_bayar" id="jumlah_bayar" placeholder="Masukan jumlah bayar" autocomplete="off" required value="<?= $data['jumlah_bayar'] ?>">
        </div>
        <div class="form-label button" style="display: flex;">
            <a href="?p=pembayaran">Batal</a>
            <button type="submit" name="btn_ubah">Simpan</button>
        </div>
    </form>
</div>