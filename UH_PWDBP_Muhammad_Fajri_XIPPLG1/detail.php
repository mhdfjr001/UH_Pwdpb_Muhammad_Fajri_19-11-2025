<?php 
include "koneksi.php";
$id = $_GET['id'];
$d = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_dosen WHERE nidn='$id'"));
?>

<html>
<head>
    <title>Detail Data Dosen</title>

<style>
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(140deg, #0f0c29, #302b63, #24243e);
    min-height: 100vh;
    color: #fff;
}

/* SIDEBAR */
.sidebar {
    width: 250px;
    background: rgba(0, 0, 0, 0.55);
    backdrop-filter: blur(12px);
    height: 100vh;
    padding: 25px 18px;
    position: fixed;
    border-right: 1px solid rgba(255,255,255,0.1);
    box-shadow: 3px 0 20px rgba(0,0,0,0.3);
}

.sidebar h2 {
    text-align: center;
    margin-bottom: 40px;
    color: #fff;
    letter-spacing: 2px;
    text-transform: uppercase;
}

.menu-item {
    display: block;
    padding: 14px 15px;
    margin: 12px 0;
    border-radius: 12px;
    text-decoration: none;
    color: #fff;
    background: linear-gradient(90deg, rgba(255,255,255,0.15), rgba(255,255,255,0.05));
    transition: 0.25s ease;
}

.menu-item:hover {
    transform: translateX(5px);
    background: rgba(255,255,255,0.25);
}

/* CONTENT */
.main {
    margin-left: 270px;
    padding: 40px;
    display: flex;
    justify-content: center;
}

.detail-card {
    width: 700px;
    background: rgba(255,255,255,0.15);
    padding: 40px;
    border-radius: 18px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.4);
    border: 1px solid rgba(255,255,255,0.25);
    backdrop-filter: blur(10px);
}

.detail-card h2 {
    text-align: center;
    margin-bottom: 30px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.detail-img {
    display: block;
    margin: auto;
    border-radius: 12px;
    width: 150px;
    height: auto;
    box-shadow: 0 0 12px rgba(0,0,0,0.4);
}

.data-item {
    margin: 12px 0;
    font-size: 16px;
}

.back-btn {
    display: block;
    margin-top: 25px;
    text-align: center;
    padding: 12px;
    border-radius: 12px;
    background: linear-gradient(90deg, #6a11cb, #2575fc);
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

.back-btn:hover {
    opacity: 0.9;
}
</style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>Dosen App</h2>

    <a href="index.php?page=home" class="menu-item">🏠 Home</a>
    <a href="index.php?page=dashboard" class="menu-item">📊 Dashboard</a>
    <a href="tambah.php" class="menu-item">➕ Tambah Data</a>
    <a href="preview_cetak.php" class="menu-item">🖨 Cetak Data</a>
</div>

<!-- MAIN CONTENT -->
<div class="main">
    <div class="detail-card">
        <h2>Detail Data Dosen</h2>

        <img src="img/<?= $d['foto_dosen']; ?>" class="detail-img">

        <div class="data-item"><b>NIDN:</b> <?= $d['nidn']; ?></div>
        <div class="data-item"><b>Nama:</b> <?= $d['nama_dosen']; ?></div>
        <div class="data-item"><b>Tanggal Mulai:</b> <?= $d['tgl_mulai_tugas']; ?></div>
        <div class="data-item"><b>Pendidikan:</b> <?= $d['jenjang_pendidikan']; ?></div>
        <div class="data-item"><b>Bidang:</b> <?= $d['bidang_keilmuan']; ?></div>

        <a href="index.php?page=dashboard" class="back-btn">⬅ Kembali</a>
    </div>
</div>

</body>
</html>
