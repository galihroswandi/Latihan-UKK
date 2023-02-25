<?php
require_once './functions.php';

// cek jika tidak ada id kelas
if (!isset($_GET['id_kelas'])) {
    echo "
        <script>
            window.location='?p=kelas';
        </script>
    ";
    return false;
}

function ubahData($post)
{
    $kelas = htmlspecialchars($post['kelas']);
    $kompetensi_keahlian = htmlspecialchars($post['kompetensi_keahlian']);

    $sql = "UPDATE kelas SET 
            nama_kelas = '$kelas',
            kompetensi_keahlian = '$kompetensi_keahlian' WHERE id_kelas = '{$_GET['id_kelas']}'
    ";

    $insertData = actionData($sql);

    if (!$insertData) {
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

$data = getSingleData("SELECT * FROM kelas WHERE id_kelas='{$_GET['id_kelas']}'");

if (isset($_POST['btn_ubah'])) {
    ubahData($_POST);
}

?>
<div class="container">
    <div class="form-wrapper">
        <div class="form-header">
            <h1>Ubah Data Kelas</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-label">
                    <label for="kelas">Kelas</label>
                    <input type="text" placeholder="Masukan kelas" name="kelas" id="kelas" autocomplete="off" required value="<?= $data['nama_kelas'] ?>">
                </div>
                <div class="form-label">
                    <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                    <select name="kompetensi_keahlian" id="kompetensi_keahlian">
                        <option value="null">-- Pilih Kompetensi Keahlian --</option>
                        <option value="Rekayasa Perangkat Lunak" <?= $data['kompetensi_keahlian'] == 'Rekayasa Perangkat Lunak' ? 'selected' : null; ?>>Rekayasa Perangkat Lunak</option>
                        <option value="Teknik Komputer Dan Jaringan" <?= $data['kompetensi_keahlian'] == 'Teknik Komputer Dan Jaringan' ? 'selected' : null; ?>>Teknik Komputer Dan Jaringan</option>
                        <option value="Teknik Kendaraan Ringan" <?= $data['kompetensi_keahlian'] == 'Teknik Kendaraan Ringan' ? 'selected' : null; ?>>Teknik Kendaraan Ringan</option>
                        <option value="Teknik Bisnis Sepeda Motor" <?= $data['kompetensi_keahlian'] == 'Teknik Bisnis Sepeda Motor' ? 'selected' : null; ?>>Teknik Bisnis Sepeda Motor</option>
                        <option value="Bisnis Daring dan Pemasaran" <?= $data['kompetensi_keahlian'] == 'Bisnis Daring dan Pemasaran' ? 'selected' : null; ?>>Bisnis Daring dan Pemasaran</option>
                    </select>
                </div>
                <div class="form-label button">
                    <a href="?p=kelas">Batal</a>
                    <button type="submit" name="btn_ubah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
</div>