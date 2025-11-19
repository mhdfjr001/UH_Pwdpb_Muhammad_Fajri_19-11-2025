<?php include "koneksi.php"; ?>
<html>
<head>
    <title>Tambah Data Dosen</title>

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
    display: flex;
    justify-content: center;
}

.form-card {
    width: 700px; /* diperbesar dari 480px */
    background: rgba(255,255,255,0.15);
    padding: 40px;
    border-radius: 18px;
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255,255,255,0.25);
    box-shadow: 0 5px 15px rgba(0,0,0,0.4);
    margin-top: 20px;

}

.form-card h2 {
    text-align: center;
    margin-bottom: 25px;
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

input::placeholder {
    color: #ddd;
}

label {
    font-size: 14px;
    opacity: 0.8;
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
    margin-top: 10px;
    transition: 0.2s;
}

button:hover {
    opacity: 0.9;
}

/* SUCCESS TEXT */
.success-msg {
    margin-top: 15px;
    color: #a0ffb3;
    font-weight: bold;
    text-align: center;
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
    
    <div class="form-card">
        <h2>Tambah Data Dosen</h2>

        <form method="POST" enctype="multipart/form-data">

            <label>NIDN:</label>
            <input type="text" name="nidn" placeholder="NIDN" required>

            <label>Nama Dosen:</label>
            <input type="text" name="nama" placeholder="Nama Dosen" required>

            <label>Tanggal Mulai Tugas:</label>
            <input type="date" name="tgl" required>

            <label>Pendidikan:</label>
            <select name="pendidikan">
                <option value="S2">S2</option>
                <option value="S3">S3</option>
            </select>

            <input type="text" name="bidang" placeholder="Bidang Keilmuan" required>

            <label>Upload Foto:</label>
            <input type="file" name="foto" required>

            <button type="submit" name="save">Simpan Data</button>
        </form>

        <?php
        if(isset($_POST['save'])){
    $nidn = $_POST['nidn'];
    $nama = $_POST['nama'];
    $tgl  = $_POST['tgl'];
    $pend = $_POST['pendidikan'];
    $bid  = $_POST['bidang'];

    // CEK DUPLIKAT NIDN
    $cek = mysqli_query($conn, "SELECT nidn FROM tbl_dosen WHERE nidn='$nidn'");
    if(mysqli_num_rows($cek) > 0){
        echo "<div class='success-msg' style='color:#ff6b6b;'>✖ NIDN sudah terdaftar! Gunakan NIDN lain.</div>";
    } else {

        // CEK & BUAT FOLDER IMG KALAU BELUM ADA
        if(!is_dir("img")){
            mkdir("img", 0777, true);
        }

        // UPLOAD FOTO
        $foto = $_FILES['foto']['name'];
        $tmp  = $_FILES['foto']['tmp_name'];
        move_uploaded_file($tmp, "img/".$foto);

        // INSERT DATA
        $simpan = mysqli_query($conn, 
            "INSERT INTO tbl_dosen VALUES('$nidn','$nama','$tgl','$pend','$bid','$foto')"
        );

        if($simpan){
            echo "<div class='success-msg'>✔ Data berhasil disimpan!</div>";
        } else {
            echo "<div class='success-msg' style='color:#ff6b6b;'>✖ Gagal menyimpan data.</div>";
        }
    }
}

        ?>
    </div>

</div>

</body>
</html>
