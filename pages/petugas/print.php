<?php
require './../../functions.php';

$sql = "SELECT * FROM petugas";
$data = getData($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petugas | Print</title>
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
                <th colspan="3">Data Petugas</th>
            </tr>
            <tr>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $petugas) { ?>
                <tr style="text-align: center;">
                    <td><?= $petugas['username'] ?></td>
                    <td><?= $petugas['nama_petugas'] ?></td>
                    <td><?= $petugas['level'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <br>

    <a href="../../index.php?p=petugas">Kembali</a>

    <script>
        window.print();
    </script>

</body>

</html>