<?php
require './../../functions.php';

$sql = "SELECT * FROM spp";
$data = getData($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPP | Print</title>
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
                <th colspan="3">Data SPP</th>
            </tr>
            <tr>
                <th>Tahun</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $spp) { ?>
                <tr style="text-align: center;">
                    <td><?= $spp['tahun'] ?></td>
                    <td><?= $spp['nominal'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <br>

    <a href="../../index.php?p=spp">Kembali</a>

    <script>
        window.print();
    </script>

</body>

</html>