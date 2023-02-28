<?php
require_once './functions.php';

function tambahData($post)
{

    $nisn = htmlspecialchars($post['nisn']);
    $nis = htmlspecialchars($post['nis']);
    $nama_lengkap = htmlspecialchars($post['nama_lengkap']);
    $kelas = htmlspecialchars($post['kelas']);
    $alamat = htmlspecialchars($post['alamat']);
    $no_telp = htmlspecialchars($post['no_telp']);
    $spp = htmlspecialchars($post['spp']);

    $sql = "INSERT INTO siswa VALUES('$nisn', '$nis', '$nama_lengkap', '$kelas', '$alamat', '$no_telp', '$spp')";

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
                window.location='?p=siswa';
            </script>
        ";
    }
}

$kelas = getData("SELECT * FROM kelas");
$spp = getData("SELECT * FROM spp");

if (isset($_POST['btn_simpan'])) {
    tambahData($_POST);
}
?>

<div class="tambah-wrapper">
    <form method="POST">
        <h1>Input Data Kelas</h1>
        <div class="form-label">
            <label for="nisn">NISN</label>
            <input type="text" name="nisn" id="nisn" placeholder="Masukan nisn" autocomplete="off" required>
        </div>
        <div class="form-label">
            <label for="nis">NIS</label>
            <input type="text" name="nis" id="nis" placeholder="Masukan NIS" autocomplete="off" required>
        </div>
        <div class="form-label">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Masukan nama_lengkap" autocomplete="off" required>
        </div>
        <div class="form-label">
            <label for="kelas">kelas</label>
            <select name="kelas" id="kelas">
                <option value="null">-- Pilih kelas --</option>
                <?php foreach ($kelas as $kls) : ?>
                    <option value="<?= $kls['id_kelas'] ?>"><?= $kls['nama_kelas'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-label">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="5"></textarea>
        </div>
        <div class="form-label">
            <label for="no_telp">No Telp</label>
            <input type="text" name="no_telp" id="no_telp" placeholder="Masukan no_telp" autocomplete="off" required>
        </div>
        <div class="form-label">
            <label for="spp">Tahun SPP</label>
            <select name="spp" id="spp">
                <option value="null">-- Pilih Tahun SPP --</option>
                <?php foreach ($spp as $sp) : ?>
                    <option value="<?= $sp['id_spp'] ?>"><?= $sp['tahun'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-label button" style="display: flex;">
            <a href="?p=siswa">Batal</a>
            <button type="submit" name="btn_simpan">Simpan</button>
        </div>
    </form>
</div>