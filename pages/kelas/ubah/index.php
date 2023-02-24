<?php
require './functions.php';

// cek jika tidak ada id kelas
if (!isset($_GET['id_kelas'])) {
    echo "
        <script>
            window.location='?p=kelas';
        </script>
    ";
} else {
    $sql = "SELECT * FROM kelas WHERE id_kelas = '{$_GET['id_kelas']}'";
    $data = getSingleData($sql);
}

function updateData($post)
{
    $nama_kelas = htmlspecialchars($post['nama_kelas']);
    $kompetensi_keahlian = htmlspecialchars($post['kompetensi_keahlian']);

    $sql = "UPDATE kelas SET 
        nama_kelas='$nama_kelas',
        kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas = '{$_GET['id_kelas']}'
    ";
    $ubahData = changeData($sql);

    if (!$ubahData) {
        echo "
            <script>
                alert('Data gagal diubah !');
                window.location='?p=kelas';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data berhasil diubah !');
                window.location='?p=kelas';
            </script>
        ";
    }
}

if (isset($_POST['btn_ubah'])) {
    updateData($_POST);
}
?>
<div class="container">
    <img src="./public/assets/petugas/tambah/blur-1.png" alt="Blur Color" class="blur-color">
    <div class="form-wrapper">
        <div class="header">
            <h1>Ubah Data Petugas</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-input">
                    <label for="nama_kelas">Kelas</label>
                    <input type="text" name="nama_kelas" id="nama_kelas" autocomplete="off" required value="<?= $data['nama_kelas'] ?>">
                </div>
                <div class="form-input">
                    <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                    <select name="kompetensi_keahlian" id="kompetensi_keahlian">
                        <option value="null">-- Pilih Kompetensi Keahlian --</option>
                        <option value="Rekayasa Perangkat Lunak" <?= $data['kompetensi_keahlian'] == 'Rekayasa Perangkat Lunak' ? 'selected' : null; ?>>Rekayasa Perangkat Lunak</option>
                        <option value="Teknik Komputer dan Jaringan" <?= $data['kompetensi_keahlian'] == 'Teknik Komputer dan Jaringan' ? 'selected' : null; ?>>Teknik Komputer dan Jaringan</option>
                        <option value="Teknik Kendaraan Ringan" <?= $data['kompetensi_keahlian'] == 'Teknik Kendaraan Ringan' ? 'selected' : null; ?>>Teknik Kendaraan Ringan</option>
                        <option value="Teknik Bisnis Sepeda Motor" <?= $data['kompetensi_keahlian'] == 'Teknik Bisnis Sepeda Motor' ? 'selected' : null; ?>>Teknik Bisnis Sepeda Motor</option>
                        <option value="Bisnis Daring dan Pemasaran" <?= $data['kompetensi_keahlian'] == 'Bisnis Daring dan Pemasaran' ? 'selected' : null; ?>>Bisnis Daring dan Pemasaran</option>
                    </select>
                </div>
                <div class="form-button">
                    <a href="?p=kelas">Batal</a>
                    <button type="submit" name="btn_ubah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
    <img src="./public/assets/petugas/tambah/blur-2.png" alt="Blur Color" class="blur-color-2">
    <img src="./public/assets/petugas/tambah/blur-3.png" alt="Blur Color" class="blur-color-3">
</div>