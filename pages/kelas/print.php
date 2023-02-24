<?php
require './../../functions.php';

$sql = "SELECT * FROM kelas";
$data = getData($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelas | Print</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
        }
    </style>
</head>

<body>

    <table border="1" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th colspan="3">Data Kelas</th>
            </tr>
            <tr>
                <th>Kelas</th>
                <th>Kompetensi Keahlian</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $kelas) { ?>
                <tr style="text-align: center;">
                    <td><?= $kelas['nama_kelas'] ?></td>
                    <td><?= $kelas['kompetensi_keahlian'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <br>

    <a href="../../index.php?p=kelas">Kembali</a>

    <script>
        window.print();
    </script>

</body>

</html>