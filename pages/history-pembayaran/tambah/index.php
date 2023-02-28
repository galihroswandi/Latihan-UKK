<?php
require_once './functions.php';

function tambahData($post)
{

    $id_petugas = $_SESSION['id_petugas'];
    $nama_siswa = htmlspecialchars($post['nama_siswa']);
    $tgl_bayar = htmlspecialchars($post['tgl_bayar']);
    $bulan = htmlspecialchars($post['bulan']);
    $tahun_dibayar = htmlspecialchars($post['tahun']);
    $jumlah_bayar = htmlspecialchars($post['jumlah_bayar']);

    $id_spp = getData("SELECT * FROM siswa WHERE nisn = '$nama_siswa'")[0];

    $sql = "INSERT INTO pembayaran VALUES('', '$id_petugas', '$nama_siswa', '$tgl_bayar', '$bulan', '$tahun_dibayar', '{$id_spp['id_spp']}', '$jumlah_bayar')";

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

if (isset($_POST['btn_simpan'])) {
    tambahData($_POST);
}
?>

<div class="tambah-wrapper">
    <form method="POST">
        <h1>Input Data Pembayaran</h1>
        <div class="form-label">
            <label for="nama_siswa">Nama Siswa</label>
            <select name="nama_siswa" id="nama_siswa">
                <option value="null">-- Pilih Siswa --</option>
                <?php foreach ($siswa as $sw) : ?>
                    <option value="<?= $sw['nisn'] ?>"><?= $sw['nama'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-label">
            <label for="tgl_bayar">Tgl Bayar</label>
            <input type="date" name="tgl_bayar" id="tgl_bayar" placeholder="Masukan tgl_bayar" autocomplete="off" required>
        </div>
        <div class="form-label">
            <label for="bulan">Bulan</label>
            <input type="text" name="bulan" id="bulan" placeholder="Masukan bulan" autocomplete="off" required>
        </div>
        <div class="form-label">
            <label for="tahun">Tahun Dibayar</label>
            <input type="text" name="tahun" id="tahun" placeholder="Masukan tahun" autocomplete="off" required>
        </div>
        <div class="form-label">
            <label for="jumlah_bayar">Jumlah Bayar</label>
            <input type="text" name="jumlah_bayar" id="jumlah_bayar" placeholder="Masukan jumlah bayar" autocomplete="off" required>
        </div>
        <div class="form-label button" style="display: flex;">
            <a href="?p=pembayaran">Batal</a>
            <button type="submit" name="btn_simpan">Bayar SPP</button>
        </div>
    </form>
</div>