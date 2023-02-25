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

    $insertData = actionData($sql);

    if (!$insertData) {
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

$kelas = getData("SELECT * FROM kelas");
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
                    <label for="nisn">NISN</label>
                    <input type="text" placeholder="Masukan NISN" name="nisn" id="nisn" autocomplete="off" required>
                </div>
                <div class="form-label">
                    <label for="nis">NIS</label>
                    <input type="nis" placeholder="Masukan NIS" name="nis" id="nis" autocomplete="off" required>
                </div>
                <div class="form-label">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="nama_lengkap" placeholder="Masukan nama_lengkap" name="nama_lengkap" id="nama_lengkap" autocomplete="off" required>
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
                    <textarea name="alamat" id="alamat" cols="30" rows="3" style="border: .1rem solid #1e40af; outline: none; padding: .7rem 1rem; font-size: 1rem; color: #334155; border-radius: .5rem; background-color: #ecf1f9;"></textarea>
                </div>
                <div class="form-label">
                    <label for="no_telp">No Telp</label>
                    <input type="text" placeholder="Masukan no_telp" name="no_telp" id="no_telp" autocomplete="off" required>
                </div>
                <div class="form-label">
                    <label for="spp">spp</label>
                    <select name="spp" id="spp">
                        <option value="null">-- Pilih Tahun SPP --</option>
                        <?php foreach ($spp as $sp) : ?>
                            <option value="<?= $sp['id_spp'] ?>"><?= $sp['tahun'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-label button">
                    <a href="?p=siswa">Batal</a>
                    <button type="submit" name="btn_tambah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
</div>