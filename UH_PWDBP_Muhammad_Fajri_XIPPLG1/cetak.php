<?php
include "koneksi.php";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=data_dosen.xls");
?>

<table border="1">
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
