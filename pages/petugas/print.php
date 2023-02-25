<?php
require_once './../../functions.php';
$data = getData("SELECT * FROM petugas");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petugas | Cetak</title>
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
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Level</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $petugas) : ?>
                    <tr>
                        <td><?= $petugas['username'] ?></td>
                        <td><?= $petugas['nama_petugas'] ?></td>
                        <td><?= $petugas['level'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <a href="./../../index.php?p=petugas" class="back">&laquo;</a>
    <script>
        window.print();
    </script>
</body>

</html>