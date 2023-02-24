<?php
require './functions.php';

function insertData($post)
{
    $nisn = htmlspecialchars($post['nisn']);
    $nis = htmlspecialchars($post['nis']);
    $nama_lengkap = htmlspecialchars($post['nama_lengkap']);
    $kelas = htmlspecialchars($post['kelas']);
    $alamat = htmlspecialchars($post['alamat']);
    $no_telp = htmlspecialchars($post['no_telp']);
    $spp_tahun = htmlspecialchars($post['spp_tahun']);

    $sql = "INSERT INTO siswa VALUES('$nisn', '$nis', '$nama_lengkap', '$kelas', '$alamat', '$no_telp', '$spp_tahun')";
    $insert = changeData($sql);

    if (!$insert) {
        echo "
            <script>
                alert('Data gagal ditambahkan !');
                window.location='?p=siswa';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil ditambahkan !');
                window.location='?p=siswa';
            </script>
        ";
    }
}

if (isset($_POST['btn_tambah'])) {
    insertData($_POST);
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
                    <input type="text" name="nisn" id="nisn" autocomplete="off" required>
                </div>
                <div class="form-input">
                    <label for="nis">nis</label>
                    <input type="text" name="nis" id="nis" autocomplete="off" required>
                </div>
                <div class="form-input">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="nama_lengkap" name="nama_lengkap" id="nama_lengkap" autocomplete="off" required>
                </div>
                <div class="form-input">
                    <label for="kelas">Kelas</label>
                    <select name="kelas" id="kelas">
                        <option value="null">-- Pilih Kelas --</option>
                        <?php foreach ($kelas as $kls) : ?>
                            <option value="<?= $kls['id_kelas'] ?>"><?= $kls["nama_kelas"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-input">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="5"></textarea>
                </div>
                <div class="form-input">
                    <label for="no_telp">No Telp</label>
                    <input type="no_telp" name="no_telp" id="no_telp" autocomplete="off" required>
                </div>
                <div class="form-input">
                    <label for="spp_tahun">Tahun SPP</label>
                    <select name="spp_tahun" id="spp_tahun">
                        <option value="null">-- Pilih Tahun SPP --</option>
                        <?php foreach ($spp as $sp) : ?>
                            <option value="<?= $sp['id_spp'] ?>"><?= $sp["tahun"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-button">
                    <a href="?p=siswa">Batal</a>
                    <button type="submit" name="btn_tambah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
    <img src="./public/assets/petugas/tambah/blur-2.png" alt="Blur Color" class="blur-color-2">
    <img src="./public/assets/petugas/tambah/blur-3.png" alt="Blur Color" class="blur-color-3">
</div>