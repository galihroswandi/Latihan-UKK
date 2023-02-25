<?php
require_once './functions.php';

// cek jika tidak ada siswa
if (!isset($_GET['nisn'])) {
    echo "
        <script>
            window.location='?p=siswa';
        </script>
    ";
    return false;
}

function ubahData($post)
{
    $nisn = htmlspecialchars($post['nisn']);
    $nis = htmlspecialchars($post['nis']);
    $nama_lengkap = htmlspecialchars($post['nama_lengkap']);
    $kelas = htmlspecialchars($post['kelas']);
    $alamat = htmlspecialchars($post['alamat']);
    $no_telp = htmlspecialchars($post['no_telp']);
    $spp = htmlspecialchars($post['spp']);

    $sql = "UPDATE siswa SET 
            nisn = '$nisn',
            nis = '$nis',
            nama = '$nama_lengkap',
            id_kelas = '$kelas',
            alamat = '$alamat',
            no_telp = '$no_telp',
            id_spp = '$spp' WHERE nisn = '{$_GET['nisn']}'
    ";

    $insertData = actionData($sql);

    if (!$insertData) {
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

$data = getSingleData("SELECT * FROM siswa WHERE nisn='{$_GET['nisn']}'");
$kelas = getData("SELECT * FROM kelas");
$spp = getData("SELECT * FROM spp");

if (isset($_POST['btn_ubah'])) {
    ubahData($_POST);
}

?>
<div class="container">
    <div class="form-wrapper">
        <div class="form-header">
            <h1>Ubah Data Siswa</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-label">
                    <label for="nisn">NISN</label>
                    <input type="text" placeholder="Masukan NISN" name="nisn" id="nisn" autocomplete="off" required value="<?= $data['nisn'] ?>">
                </div>
                <div class="form-label">
                    <label for="nis">NIS</label>
                    <input type="nis" placeholder="Masukan NIS" name="nis" id="nis" autocomplete="off" required value="<?= $data['nis'] ?>">
                </div>
                <div class="form-label">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="nama_lengkap" placeholder="Masukan nama_lengkap" name="nama_lengkap" id="nama_lengkap" autocomplete="off" required value="<?= $data['nama'] ?>">
                </div>
                <div class="form-label">
                    <label for="kelas">kelas</label>
                    <select name="kelas" id="kelas">
                        <option value="null">-- Pilih kelas --</option>
                        <?php foreach ($kelas as $kls) : ?>
                            <option value="<?= $kls['id_kelas'] ?>" <?= $data['id_kelas'] == $kls['id_kelas'] ? 'selected' : null; ?>><?= $kls['nama_kelas'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-label">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="3" style="border: .1rem solid #1e40af; outline: none; padding: .7rem 1rem; font-size: 1rem; color: #334155; border-radius: .5rem; background-color: #ecf1f9;"><?= $data['alamat'] ?></textarea>
                </div>
                <div class="form-label">
                    <label for="no_telp">No Telp</label>
                    <input type="text" placeholder="Masukan no_telp" name="no_telp" id="no_telp" autocomplete="off" required value="<?= $data['no_telp'] ?>">
                </div>
                <div class="form-label">
                    <label for="spp">spp</label>
                    <select name="spp" id="spp">
                        <option value="null">-- Pilih Tahun SPP --</option>
                        <?php foreach ($spp as $sp) : ?>
                            <option value="<?= $sp['id_spp'] ?>" <?= $data['id_spp'] == $sp['id_spp'] ? 'selected' : null; ?>><?= $sp['tahun'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-label button">
                    <a href="?p=siswa">Batal</a>
                    <button type="submit" name="btn_ubah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
</div>