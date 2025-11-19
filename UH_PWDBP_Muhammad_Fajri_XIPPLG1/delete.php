<?php
include "koneksi.php";
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM tbl_dosen WHERE nidn='$id'");
header("Location: index.php");
?>

