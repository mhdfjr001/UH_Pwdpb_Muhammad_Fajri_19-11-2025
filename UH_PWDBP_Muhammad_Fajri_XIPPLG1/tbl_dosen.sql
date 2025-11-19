-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2025 pada 06.46
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universitas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `nidn` char(10) NOT NULL,
  `nama_dosen` varchar(50) DEFAULT NULL,
  `tgl_mulai_tugas` date DEFAULT NULL,
  `jenjang_pendidikan` varchar(10) DEFAULT NULL,
  `bidang_keilmuan` varchar(50) DEFAULT NULL,
  `foto_dosen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`nidn`, `nama_dosen`, `tgl_mulai_tugas`, `jenjang_pendidikan`, `bidang_keilmuan`, `foto_dosen`) VALUES
('0000987652', 'Suherman Santoso', '2025-11-01', 'S2', 'Teknik Komputer', 'Screenshot 2025-10-25 131150.png'),
('0087676767', 'Hanif Hazahwat', '2025-10-06', 'S2', 'Teknik Sipil', 'Screenshot 2025-10-26 071315.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`nidn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
