<?php 
include "koneksi.php"; 
$id = $_GET['id'];
$d = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tbl_dosen WHERE nidn='$id'"));
?>
<html>
<head>
    <title>Edit Data Dosen</title>

<style>
/* GLOBAL */
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

.form-card {
    width: 700px;
    background: rgba(255,255,255,0.15);
    padding: 40px;
    border-radius: 18px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.4);
    border: 1px solid rgba(255,255,255,0.25);
    backdrop-filter: blur(10px);
}

.form-card h2 {
    text-align: center;
    margin-bottom: 30px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

input, select {
    width: 100%;
    padding: 14px;
    margin-bottom: 18px;
    border: none;
    border-radius: 12px;
    background: rgba(255,255,255,0.25);
    color: #fff;
    font-size: 15px;
}

button {
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(90deg, #6a11cb, #2575fc);
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: 0.2s;
}

button:hover {
    opacity: 0.9;
}

.success-msg {
    text-align: center;
    margin-top: 20px;
    color: #a0ffb3;
    font-weight: bold;
}

.back-btn {
    display: block;
    margin-top: 15px;
    color: #fff;
    text-decoration: none;
    text-align: center;
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

<!-- MAIN -->
<div class="main">
    <div class="form-card">
        <h2>Edit Data Dosen</h2>

        <form method="POST">
            <label>Nama Dosen:</label>
            <input type="text" name="nama" value="<?= $d['nama_dosen']; ?>">

            <label>Tanggal Mulai Tugas:</label>
            <input type="date" name="tgl" value="<?= $d['tgl_mulai_tugas']; ?>">

            <label>Pendidikan:</label>
            <select name="pendidikan">
                <option value="S2" <?= $d['jenjang_pendidikan']=='S2'?'selected':''; ?>>S2</option>
                <option value="S3" <?= $d['jenjang_pendidikan']=='S3'?'selected':''; ?>>S3</option>
            </select>

            <label>Bidang Keilmuan:</label>
            <input type="text" name="bidang" value="<?= $d['bidang_keilmuan']; ?>">

            <button name="update">Update Data</button>
        </form>

        <?php
        if(isset($_POST['update'])){
            $nama = $_POST['nama'];
            $tgl  = $_POST['tgl'];
            $pend = $_POST['pendidikan'];
            $bid  = $_POST['bidang'];

            mysqli_query($conn, "UPDATE tbl_dosen SET 
                nama_dosen='$nama',
                tgl_mulai_tugas='$tgl',
                jenjang_pendidikan='$pend',
                bidang_keilmuan='$bid'
                WHERE nidn='$id'
            ");

            echo "<div class='success-msg'>✔ Data berhasil diperbarui!</div>";
        }
        ?>

        <a href="index.php?page=dashboard" class="back-btn">⬅ Kembali</a>
    </div>
</div>

</body>
</html>
