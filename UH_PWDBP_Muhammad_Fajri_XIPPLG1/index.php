<?php include "koneksi.php"; ?>
<html>
<head>
    <title>Aplikasi Data Dosen</title>

<style>
/* ======== GLOBAL ======== */
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(140deg, #0f0c29, #302b63, #24243e);
    min-height: 100vh;
    color: #fff;
}

/* SCROLLBAR */
::-webkit-scrollbar {
    width: 8px;
}
::-webkit-scrollbar-track {
    background: rgba(255,255,255,0.1);
}
::-webkit-scrollbar-thumb {
    background: #6a11cb;
    border-radius: 10px;
}

/* ======== SIDEBAR ======== */
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
    color: #fff;
    margin-bottom: 40px;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 22px;
}

/* Menu Item */
.menu-item {
    display: block;
    padding: 14px 15px;
    text-decoration: none;
    margin: 12px 0;
    border-radius: 12px;
    font-size: 15px;
    color: #fff;
    background: linear-gradient(90deg, rgba(255,255,255,0.15), rgba(255,255,255,0.05));
    transition: 0.25s ease;
}

.menu-item:hover {
    transform: translateX(5px);
    background: rgba(255,255,255,0.25);
    box-shadow: 0 4px 12px rgba(0,0,0,0.25);
}

/* ======== MAIN CONTENT ======== */
.main {
    margin-left: 270px;
    padding: 35px;
}
.home-card {
    width: 260px;
    padding: 22px;
    background: rgba(255,255,255,0.18);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,0.25);
    border-radius: 14px;
    cursor: pointer;
    transition: 0.2s ease-in-out;
    box-shadow: 0 5px 15px rgba(0,0,0,0.3);
}

.home-card:hover {
    transform: translateY(-5px);
    background: rgba(255,255,255,0.28);
    box-shadow: 0 8px 20px rgba(0,0,0,0.45);
}

.home-card .icon {
    font-size: 40px;
    margin-bottom: 10px;
}

.home-card h3 {
    margin: 0;
    font-size: 20px;
    margin-bottom: 8px;
}

.home-card p {
    margin: 0;
    font-size: 14px;
    opacity: 0.9;
}


/* ======== WELCOME ======== */
.welcome-box {
    background: rgba(255,255,255,0.15);
    padding: 30px;
    border-radius: 14px;
    font-size: 22px;
    margin-bottom: 25px;
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,0.25);
    box-shadow: 0 5px 15px rgba(0,0,0,0.4);
}

/* ======== CARD ======== */
.card {
    background: rgba(255,255,255,0.2);
    color: #fff;
    padding: 25px;
    margin: 15px 0;
    border-radius: 14px;
    width: 270px;
    display: inline-block;
    box-shadow: 0 6px 18px rgba(0,0,0,0.35);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.25);
    text-align: center;
}

.card h3 {
    margin-bottom: 10px;
    font-size: 20px;
    letter-spacing: 1px;
}

/* ======== TABLE ======== */
table {
    width: 100%;
    background: rgba(255,255,255,0.1);
    backdrop-filter: blur(8px);
    color: #fff;
    border-radius: 14px;
    overflow: hidden;
    border-spacing: 0;
    box-shadow: 0 5px 20px rgba(0,0,0,0.35);
}

table th {
    background: rgba(0,0,0,0.45);
    padding: 14px;
    font-size: 15px;
    letter-spacing: 1px;
}

table td {
    padding: 12px;
    background: rgba(255,255,255,0.1);
}

table tr:nth-child(even) td {
    background: rgba(0,0,0,0.2);
}

table a {
    color: #00e5ff;
    text-decoration: none;
    font-weight: bold;
}
table a:hover {
    color: #ff6bff;
}

/* SEARCH BAR */
.searchbox input {
    padding: 12px;
    border-radius: 10px;
    border: none;
    width: 220px;
}

.searchbox button {
    padding: 12px 15px;
    border-radius: 10px;
    border: none;
    cursor: pointer;
    background: #6a11cb;
    color: #fff;
    font-weight: bold;
    transition: 0.2s;
}

.searchbox button:hover {
    background: #5010a8;
}
</style>

</head>
<body>

<!-- ================= SIDEBAR ================= -->
<div class="sidebar">
    <h2>Dosen App</h2>

    <a href="index.php?page=home" class="menu-item">🏠 Home</a>
    <a href="index.php?page=dashboard" class="menu-item">📊 Dashboard</a>
    <a href="tambah.php" class="menu-item">➕ Tambah Data</a>
    <a href="preview_cetak.php" class="menu-item">🖨 Cetak Data</a>
</div>


<!-- ================= MAIN CONTENT ================= -->
<div class="main">

<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

/* ================= HOME ================= */
if ($page == 'home') {
?>

<div class="welcome-box" style="font-size:26px; font-weight:600;">
    👋 Selamat datang di Aplikasi Data Dosen  
    <div style="font-size:18px; margin-top:8px; opacity:0.9;">
        Kelola data dosen dengan cepat, rapi, dan praktis.
    </div>
</div>

<!-- FEATURE CARDS -->
<div style="display:flex; gap:20px; margin-top:25px; flex-wrap:wrap;">

    <div class="home-card" onclick="window.location='index.php?page=dashboard'">
        <div class="icon">📊</div>
        <h3>Dashboard</h3>
        <p>Lihat statistik dan data dosen secara langsung.</p>
    </div>

    <div class="home-card" onclick="window.location='tambah.php'">
        <div class="icon">➕</div>
        <h3>Tambah Data</h3>
        <p>Input data dosen baru dengan mudah.</p>
    </div>

    <div class="home-card" onclick="window.location='cetak.php'">
        <div class="icon">🖨️</div>
        <h3>Cetak Data</h3>
        <p>Ekspor atau cetak data dosen dalam 1 klik.</p>
    </div>

</div>

<?php
}

/* ================= DASHBOARD ================= */
if ($page == 'dashboard') {
?>
    <h1 style="margin-bottom:10px;">📊 Dashboard</h1>

    <div class="card">
        <h3>Total Dosen</h3>
        <p style="font-size:26px; font-weight:bold;">
            <?php
                $q = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tbl_dosen");
                $d = mysqli_fetch_assoc($q);
                echo $d['total'];
            ?>
        </p>
    </div>

    <h2 style="margin-top:30px;">📄 Data Dosen</h2>

    <!-- FORM CARI -->
    <form method="GET" action="index.php" class="searchbox">
        <input type="hidden" name="page" value="dashboard">
        <input type="text" name="cari" placeholder="Cari nama...">
        <button>Cari</button>
    </form>
    <br>

    <table>
        <tr>
            <th>NIDN</th>
            <th>Nama</th>
            <th>Tgl Mulai</th>
            <th>Pendidikan</th>
            <th>Aksi</th>
        </tr>

        <?php
        $where = "";
        if(isset($_GET['cari'])){
            $cari = $_GET['cari'];
            $where = "WHERE nama_dosen LIKE '%$cari%'";
        }

        $sql = mysqli_query($conn, "SELECT * FROM tbl_dosen $where");

        while($row = mysqli_fetch_assoc($sql)){
        ?>
        <tr>
            <td><?= $row['nidn']; ?></td>
            <td><?= $row['nama_dosen']; ?></td>
            <td><?= $row['tgl_mulai_tugas']; ?></td>
            <td><?= $row['jenjang_pendidikan']; ?></td>
            <td>
                <a href="detail.php?id=<?= $row['nidn']; ?>">Detail</a> |
                <a href="edit.php?id=<?= $row['nidn']; ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['nidn']; ?>" onclick="return confirm('Hapus?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>

<?php } ?>

</div>
</body>
</html>
