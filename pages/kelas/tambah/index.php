<?php
require_once './functions.php';

function tambahData($post)
{

    $nama_kelas = htmlspecialchars($post['kelas']);
    $kompetensi_keahlian = htmlspecialchars($post['kompetensi_keahlian']);

    $sql = "INSERT INTO kelas VALUES('', '$nama_kelas', '$kompetensi_keahlian')";

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
                window.location='?p=kelas';
            </script>
        ";
    }
}

if (isset($_POST['btn_simpan'])) {
    tambahData($_POST);
}
?>

<div class="tambah-wrapper">
    <form method="POST">
        <h1>Input Data Kelas</h1>
        <div class="form-label">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" id="kelas" placeholder="Masukan Kelas" autocomplete="off" required>
        </div>
        <div class="form-label">
            <label for="kompetensi_keahlian">Kompetensi keahlian</label>
            <select name="kompetensi_keahlian" id="kompetensi_keahlian">
                <option value="null">-- Pilih kompetensi keahlian --</option>
                <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                <option value="Teknik Komputer dan Jarigan">Teknik Komputer dan Jarigan</option>
                <option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
                <option value="Teknik Bisnis Sepeda Motor">Teknik Bisnis Sepeda Motor</option>
                <option value="Bisnis Daring dan Pemasaran">Bisnis Daring dan Pemasaran</option>
            </select>
        </div>
        <div class="form-label button" style="display: flex;">
            <a href="?p=kelas">Batal</a>
            <button type="submit" name="btn_simpan">Simpan</button>
        </div>
    </form>
</div>