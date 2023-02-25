<?php
require_once './functions.php';

function tambahData($post)
{
    $id_petugas = $_SESSION['id_petugas'];
    $nama_siswa = htmlspecialchars($post['nama_siswa']);
    $tgl_bayar = htmlspecialchars($post['tgl_bayar']);
    $bln_dibayar = htmlspecialchars($post['bln_dibayar']);
    $tahun_dibayar = htmlspecialchars($post['tahun_dibayar']);
    $jumlah_bayar = htmlspecialchars($post['jumlah_bayar']);

    $spp_siswa = getSingleData("SELECT id_spp FROM siswa WHERE nisn='$nama_siswa'")['id_spp'];

    $sql = "INSERT INTO pembayaran VALUES('', '$id_petugas', '$nama_siswa', '$tgl_bayar', '$bln_dibayar', '$tahun_dibayar', '$spp_siswa', '$jumlah_bayar')";

    $insertData = actionData($sql);

    if (!$insertData) {
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

$siswa = getData("SELECT * FROM siswa");
$spp = getData("SELECT * FROM spp");

if (isset($_POST['btn_tambah'])) {
    tambahData($_POST);
}

?>
<div class="container">
    <div class="form-wrapper">
        <div class="form-header">
            <h1>Input Data SPP</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-label">
                    <label for="nama_siswa">Nama Siswa</label>
                    <select name="nama_siswa" id="nama_siswa">
                        <option value="null">-- Pilih Nama Siswa --</option>
                        <?php foreach ($siswa as $sw) : ?>
                            <option value="<?= $sw['nisn'] ?>"><?= $sw['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-label">
                    <label for="tgl_bayar">Tanggal Bayar</label>
                    <input type="date" name="tgl_bayar" id="tgl_bayar" autocomplete="off" required>
                </div>
                <div class="form-label">
                    <label for="bln_dibayar">Bulan Dibayar</label>
                    <input type="text" name="bln_dibayar" id="bln_dibayar" autocomplete="off" required>
                </div>
                <div class="form-label">
                    <label for="bln_tahun_dibayar">Tahun Dibayar</label>
                    <input type="text" name="tahun_dibayar" id="tahun_dibayar" autocomplete="off" required>
                </div>
                <div class="form-label">
                    <label for="jumlah_bayar">Jumlah Bayar</label>
                    <input type="text" name="jumlah_bayar" id="jumlah_bayar" autocomplete="off" required>
                </div>
                <div class="form-label button">
                    <a href="?p=siswa">Batal</a>
                    <button type="submit" name="btn_tambah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
</div>