<?php
require './functions.php';

// cek jika tidak ada nisn
if (!isset($_GET['nisn'])) {
    echo "
        <script>
            window.location='?p=siswa';
        </script>
    ";
} else {
    $sql = "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas JOIN spp ON siswa.id_spp = spp.id_spp";
    $data = getSingleData($sql);
}

function updateData($post)
{
    $nisn = htmlspecialchars($post['nisn']);
    $nis = htmlspecialchars($post['nis']);
    $nama = htmlspecialchars($post['nama_lengkap']);
    $kelas = htmlspecialchars($post['kelas']);
    $alamat = htmlspecialchars($post['alamat']);
    $no_telp = htmlspecialchars($post['no_telp']);
    $spp_tahun = htmlspecialchars($post['spp_tahun']);

    $sql = "UPDATE siswa SET 
        nisn='$nisn',
        nis='$nis',
        nama='$nama',
        id_kelas='$kelas',
        alamat='$alamat',
        no_telp='$no_telp',
        id_spp='$spp_tahun' WHERE nisn = '{$_GET['nisn']}'
    ";
    $ubahData = changeData($sql);

    if (!$ubahData) {
        echo "
            <script>
                alert('Data gagal diubah !');
                window.location='?p=siswa';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil diubah !');
                window.location='?p=siswa';
            </script>
        ";
    }
}

if (isset($_POST['btn_ubah'])) {
    updateData($_POST);
}

$kelas = getData("SELECT * FROM kelas");
$spp = getData("SELECT * FROM spp");
?>
<div class="container">
    <img src="./public/assets/petugas/tambah/blur-1.png" alt="Blur Color" class="blur-color">
    <div class="form-wrapper">
        <div class="header">
            <h1>Input Data Petugas</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-input">
                    <label for="nisn">NISN</label>
                    <input type="text" name="nisn" id="nisn" autocomplete="off" required value="<?= $data['nisn'] ?>">
                </div>
                <div class="form-input">
                    <label for="nis">nis</label>
                    <input type="text" name="nis" id="nis" autocomplete="off" required value="<?= $data['nis'] ?>">
                </div>
                <div class="form-input">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="nama_lengkap" name="nama_lengkap" id="nama_lengkap" autocomplete="off" required value="<?= $data['nama'] ?>">
                </div>
                <div class="form-input">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas">
                        <option value="null">-- Pilih Kelas --</option>
                        <?php foreach ($kelas as $kls) : ?>
                            <option value="<?= $kls['id_kelas'] ?>" <?= $data['id_kelas'] == $kls['id_kelas'] ? 'selected' : null; ?>><?= $kls["nama_kelas"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-input">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="5"><?= $data['alamat'] ?></textarea>
                </div>
                <div class="form-input">
                    <label for="no_telp">No Telp</label>
                    <input type="no_telp" name="no_telp" id="no_telp" autocomplete="off" required value="<?= $data['no_telp'] ?>">
                </div>
                <div class="form-input">
                    <label for="spp_tahun">Tahun SPP</label>
                    <select name="spp_tahun" id="spp_tahun">
                        <option value="null">-- Pilih Tahun SPP --</option>
                        <?php foreach ($spp as $sp) : ?>
                            <option value="<?= $sp['id_spp'] ?>" <?= $data['id_spp'] == $sp['id_spp'] ? 'selected' : null; ?>><?= $sp["tahun"] ?></option>
                        <?php endforeach; ?>
                    </select>
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