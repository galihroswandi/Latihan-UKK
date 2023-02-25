<?php
require_once './functions.php';

// cek jika tidak ada id_pembayaran
if (!isset($_GET['id_pembayaran'])) {
    echo "
        <script>
            window.location='?p=pembayaran';
        </script>
    ";
    return false;
}

function ubahData($post)
{
    $id_petugas = $_SESSION['id_petugas'];
    $nama_siswa = htmlspecialchars($post['nama_siswa']);
    $tgl_bayar = htmlspecialchars($post['tgl_bayar']);
    $bln_dibayar = htmlspecialchars($post['bln_dibayar']);
    $tahun_dibayar = htmlspecialchars($post['tahun_dibayar']);
    $jumlah_bayar = htmlspecialchars($post['jumlah_bayar']);

    $sql = "UPDATE pembayaran SET 
            id_petugas = '$id_petugas',
            nisn = '$nama_siswa',
            tgl_bayar = '$tgl_bayar',
            bln_dibayar = '$bln_dibayar',
            tahun_dibayar = '$tahun_dibayar',
            jumlah_bayar = '$jumlah_bayar' WHERE id_pembayaran = '{$_GET['id_pembayaran']}'
    ";

    $insertData = actionData($sql);

    if (!$insertData) {
        echo "
            <script>
                alert('Data gagal diubah !');
                window.location='?p=pembayaran';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Data berhasil diubah !');
            window.location='?p=pembayaran';
        </script>
    ";
    }
}

$data = getSingleData("SELECT * FROM pembayaran JOIN siswa ON pembayaran.nisn = siswa.nisn JOIN spp ON pembayaran.id_spp = spp.id_spp WHERE id_pembayaran='{$_GET['id_pembayaran']}'");

$siswa = getData("SELECT * FROM siswa");
$spp = getData("SELECT * FROM spp");

if (isset($_POST['btn_ubah'])) {
    ubahData($_POST);
}

?>
<div class="container">
    <div class="form-wrapper">
        <div class="form-header">
            <h1>Ubah Data Pembayaran</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-label">
                    <label for="nama_siswa">Nama Siswa</label>
                    <select name="nama_siswa" id="nama_siswa">
                        <option value="null">-- Pilih Nama Siswa --</option>
                        <?php foreach ($siswa as $sw) : ?>
                            <option value="<?= $sw['nisn'] ?>" <?= $data['nama'] == $sw['nama'] ? 'selected' : null; ?>><?= $sw['nama'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-label">
                    <label for="tgl_bayar">Tanggal Bayar</label>
                    <input type="date" name="tgl_bayar" id="tgl_bayar" autocomplete="off" required value="<?= $data['tgl_bayar'] ?>">
                </div>
                <div class="form-label">
                    <label for="bln_dibayar">Bulan Dibayar</label>
                    <input type="text" name="bln_dibayar" id="bln_dibayar" autocomplete="off" required value="<?= $data['bln_dibayar'] ?>">
                </div>
                <div class="form-label">
                    <label for="bln_tahun_dibayar">Tahun Dibayar</label>
                    <input type="text" name="tahun_dibayar" id="tahun_dibayar" autocomplete="off" required value="<?= $data['tahun_dibayar'] ?>">
                </div>
                <div class="form-label">
                    <label for="jumlah_bayar">Jumlah Bayar</label>
                    <input type="text" name="jumlah_bayar" id="jumlah_bayar" autocomplete="off" required value="<?= $data['jumlah_bayar'] ?>">
                </div>
                <div class="form-label button">
                    <a href="?p=pembayaran">Batal</a>
                    <button type="submit" name="btn_ubah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
</div>