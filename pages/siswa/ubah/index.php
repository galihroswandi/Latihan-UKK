<?php
require_once './functions.php';

if (!isset($_GET['nisn'])) {
    echo "
        <script>
            window.location='?p=siswa';
        </script>    
    ";
}

function ubahData($post)
{
    $nisn = htmlspecialchars($post['nisn']);
    $nis = htmlspecialchars($_POST['nis']);
    $nama_lengkap = htmlspecialchars($post['nama_lengkap']);
    $kelas = htmlspecialchars($post['kelas']);
    $alamat = htmlspecialchars($post['alamat']);
    $no_telp = htmlspecialchars($post['no_telp']);
    $tahun_spp = htmlspecialchars($post['tahun_spp']);

    $sql = "UPDATE siswa SET 
        nisn='{$nisn}',
        nis='{$nis}',
        nama='{$nama_lengkap}',
        id_kelas='{$kelas}',
        alamat='{$alamat}',
        no_telp='{$no_telp}',
        id_spp='{$tahun_spp}'  WHERE nisn='{$_GET['nisn']}'";

    $insertData = actionData($sql);

    if (!$insertData) {
        echo "
            <script>
                alert('Data gagal diubah !');
            </script>
        ";

        return false;
    }

    echo "
        <script>
            alert('Data berhasil diubah !');
            window.location='?p=siswa';
        </script>
    ";
}

$sql = "SELECT * FROM siswa JOIN kelas ON siswa.id_kelas = kelas.id_kelas JOIN spp ON siswa.id_spp = spp.id_spp WHERE nisn='{$_GET['nisn']}'";
$singleData = getSingleData($sql);

if (isset($_POST['btn_ubah'])) {
    ubahData($_POST);
}

$kelas = getData('SELECT * FROM kelas');
$data_spp = getData('SELECT * FROM spp');

?>

<div class="container">
    <div class="form-grid">
        <header>
            <h1>Ubah data siswa</h1>
        </header>
        <form method="POST" class="grid">
            <div class="col">
                <div class="input-field">
                    <label for="nisn">NISN</label>
                    <input type="text" name="nisn" id="nisn" autocomplete="off" required value="<?= $singleData['nisn'] ?>">
                </div>
                <div class="input-field">
                    <label for="nis">NIS</label>
                    <input type="nis" name="nis" id="nis" autocomplete="off" required value="<?= $singleData['nis'] ?>">
                </div>
                <div class="input-field">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="nama_lengkap" name="nama_lengkap" id="nama_lengkap" autocomplete="off" required value="<?= $singleData['nama'] ?>">
                </div>
                <div class="input-field">
                    <label for="kelas">kelas</label>
                    <select name="kelas" id="kelas">
                        <option value="null">-- Pilih Kelas --</option>
                        <?php foreach ($kelas as $kls) : ?>
                            <option value="<?= $kls['id_kelas'] ?>" <?= $singleData['id_kelas'] == $kls['id_kelas'] ? 'selected' : null; ?>><?= $kls['nama_kelas'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class="input-field">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="3"><?= $singleData['alamat'] ?></textarea>
                </div>
                <div class="input-field">
                    <label for="no_telp">No Telp</label>
                    <input type="text" name="no_telp" id="no_telp" autocomplete="off" required value="<?= $singleData['no_telp'] ?>">
                </div>
                <div class="input-field">
                    <label for="tahun_spp">Tahun</label>
                    <select name="tahun_spp" id="tahun_spp">
                        <option value="null">-- Pilih Tahun --</option>
                        <?php foreach ($data_spp as $spp) : ?>
                            <option value="<?= $spp['id_spp'] ?>" <?= $singleData['id_spp'] == $spp['id_spp'] ? 'selected' : null; ?>><?= $spp['tahun'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="input-field-button">
                <a href="?p=siswa">Batal</a>
                <button type="submit" name="btn_ubah">Simpan</button>
            </div>
        </form>
    </div>
</div>