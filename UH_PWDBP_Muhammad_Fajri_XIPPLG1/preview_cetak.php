<?php include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Preview Data Dosen</title>
    <style>
        body {
            font-family: Arial;
            background: #0f0f3b;
            color: white;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #1b1b4d;
        }
        th, td {
            border: 1px solid #444;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #2a2a66;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background: #4b79ff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<h2>Preview Data Sebelum Cetak</h2>

<table>
    <tr>
        <th>NIDN</th>
        <th>Nama Dosen</th>
        <th>Tgl Mulai</th>
        <th>Pendidikan</th>
        <th>Bidang</th>
    </tr>

    <?php
    $q = mysqli_query($conn, "SELECT * FROM tbl_dosen");
    while($d = mysqli_fetch_assoc($q)){
    ?>
    <tr>
        <td><?= $d['nidn']; ?></td>
        <td><?= $d['nama_dosen']; ?></td>
        <td><?= $d['tgl_mulai_tugas']; ?></td>
        <td><?= $d['jenjang_pendidikan']; ?></td>
        <td><?= $d['bidang_keilmuan']; ?></td>
    </tr>
    <?php } ?>
</table>

<a href="cetak.php" class="btn">Cetak Sekarang</a>

</body>
</html>
