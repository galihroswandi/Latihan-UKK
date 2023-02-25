<?php
require_once './functions.php';

function tambahData($post)
{
    $kelas = htmlspecialchars($post['kelas']);
    $kompetensi_keahlian = htmlspecialchars($post['kompetensi_keahlian']);

    $sql = "INSERT INTO kelas VALUES('', '$kelas', '$kompetensi_keahlian')";

    $insertData = actionData($sql);

    if (!$insertData) {
        echo "
            <script>
                alert('Data gagal ditambahkan !');
                window.location='?p=kelas';
            </script>
        ";
    } else {
        echo "
        <script>
            alert('Data berhasil ditambahkan !');
            window.location='?p=kelas';
        </script>
    ";
    }
}

if (isset($_POST['btn_tambah'])) {
    tambahData($_POST);
}

?>
<div class="container">
    <div class="form-wrapper">
        <div class="form-header">
            <h1>Input Data Kelas</h1>
        </div>
        <main>
            <form method="POST">
                <div class="form-label">
                    <label for="kelas">Kelas</label>
                    <input type="text" placeholder="Masukan kelas" name="kelas" id="kelas" autocomplete="off" required>
                </div>
                <div class="form-label">
                    <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                    <select name="kompetensi_keahlian" id="kompetensi_keahlian">
                        <option value="null">-- Pilih Kompetensi Keahlian --</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Teknik Komputer Dan Jaringan">Teknik Komputer Dan Jaringan</option>
                        <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                        <option value="Teknik Bisnis Sepeda Motor">Teknik Bisnis Sepeda Motor</option>
                        <option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
                    </select>
                </div>
                <div class="form-label button">
                    <a href="?p=kelas">Batal</a>
                    <button type="submit" name="btn_tambah">Simpan</button>
                </div>
            </form>
        </main>
    </div>
</div>