<?php
require_once './functions.php';

function tambahData($post)
{
    $nisn = htmlspecialchars($post['nisn']);
    $nis = htmlspecialchars($_POST['nis']);
    $nama_lengkap = htmlspecialchars($post['nama_lengkap']);
    $kelas = htmlspecialchars($post['kelas']);
    $alamat = htmlspecialchars($post['alamat']);
    $no_telp = htmlspecialchars($post['no_telp']);
    $tahun_spp = htmlspecialchars($post['tahun_spp']);

    $sql = "INSERT INTO siswa VALUES('$nisn', '$nis', '$nama_lengkap', '$kelas', '$alamat', '$no_telp', '$tahun_spp')";

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
            window.location='?p=siswa';
        </script>
    ";
}

if (isset($_POST['btn_tambah'])) {
    tambahData($_POST);
}

$kelas = getData('SELECT * FROM kelas');
$data_spp = getData('SELECT * FROM spp');

?>

<div class="container">
    <div class="form-grid">
        <header>
            <h1>Input data siswa</h1>
        </header>
        <form method="POST" class="grid">
            <div class="col">
                <div class="input-field">
                    <label for="nisn">NISN</label>
                    <input type="text" name="nisn" id="nisn" autocomplete="off" required>
                </div>
                <div class="input-field">
                    <label for="nis">NIS</label>
                    <input type="nis" name="nis" id="nis" autocomplete="off" required>
                </div>
                <div class="input-field">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="nama_lengkap" name="nama_lengkap" id="nama_lengkap" autocomplete="off" required>
                </div>
                <div class="input-field">
                    <label for="kelas">kelas</label>
                    <select name="kelas" id="kelas">
                        <option value="null">-- Pilih Kelas --</option>
                        <?php foreach ($kelas as $kls) : ?>
                            <option value="<?= $kls['id_kelas'] ?>"><?= $kls['nama_kelas'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="input-field">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="3"></textarea>
                </div>
                <div class="input-field">
                    <label for="no_telp">No Telp</label>
                    <input type="text" name="no_telp" id="no_telp" autocomplete="off" required>
                </div>
                <div class="input-field">
                    <label for="tahun_spp">Tahun</label>
                    <select name="tahun_spp" id="tahun_spp">
                        <option value="null">-- Pilih Tahun --</option>
                        <?php foreach ($data_spp as $spp) : ?>
                            <option value="<?= $spp['id_spp'] ?>"><?= $spp['tahun'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="input-field-button">
                <a href="?p=siswa">Batal</a>
                <button type="submit" name="btn_tambah">Simpan</button>
            </div>
        </form>
    </div>
</div>