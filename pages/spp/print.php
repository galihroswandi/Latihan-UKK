<?php
require_once './../../functions.php';
$data = getData("SELECT * FROM spp");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPP | Cetak</title>
    <style>
        @import './../../public/css/partials/variables.css';

        div.print {
            padding: .5rem 1rem;
        }

        table {
            border-collapse: collapse;
            border: 0.1rem solid var(--blue-800);
            margin-top: 2rem;
            border-radius: 0.5rem;
        }

        div.container>.table-wrapper>main {
            padding: 0 1rem;
        }

        table>thead>tr>th,
        td {
            border-bottom: 0.1rem solid var(--blue-800);
            border-right: 0.1rem solid var(--blue-800);
        }

        table>thead>tr>th {
            padding: 1rem 2rem;
            background-color: var(--blue-600);
            color: #fff;
        }

        table>tbody>tr>td {
            padding: 0.5rem 1rem;
            color: var(--text-slate-700);
            font-size: 1rem;
        }

        a.back {
            display: inline-block;
            margin-left: 1rem;
            font-size: 2rem;
            color: var(--blue-600);
        }

        a.back:hover {
            color: var(--text-slate-700);
        }
    </style>
</head>

<body>
    <div class="print">
        <table width="100%">
            <thead>
                <tr>
                    <th>Tahun</th>
                    <th>Nominal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $spp) : ?>
                    <tr>
                        <td><?= $spp['tahun'] ?></td>
                        <td>Rp. <?= $spp['nominal'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a href="./../../index.php?p=spp" class="back">&laquo;</a>
    <script>
        window.print();
    </script>
</body>

</html>