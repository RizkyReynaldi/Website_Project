-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2023 at 06:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbt_rizdevelopment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(3, 'admin', '$2y$10$tWPrBEh/LFLEibc5UIVv5u.gCBLo/r37cM869SAwKZPpX93shzUZC');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_ujian`
--

CREATE TABLE `daftar_ujian` (
  `id` int(11) NOT NULL,
  `nama_ujian` varchar(30) NOT NULL,
  `tipe_ujian` varchar(30) NOT NULL,
  `jumlah_soal` varchar(10) NOT NULL,
  `waktu_pengerjaan` varchar(20) NOT NULL,
  `mulai` varchar(30) NOT NULL,
  `selesai` varchar(30) NOT NULL,
  `validasi_soal` varchar(10) NOT NULL,
  `status_ujian` varchar(30) NOT NULL,
  `action_status_ujian` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftar_ujian`
--

INSERT INTO `daftar_ujian` (`id`, `nama_ujian`, `tipe_ujian`, `jumlah_soal`, `waktu_pengerjaan`, `mulai`, `selesai`, `validasi_soal`, `status_ujian`, `action_status_ujian`, `status`) VALUES
(18, 'Pretest 1', 'rizdev_batch1', '5', '10 Menit', '07:48:17 PM', 'Belum Selesai', 'yes', 'danger', 'Berhenti', 'Berjalan');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_ujian`
--

CREATE TABLE `hasil_ujian` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `tipe_user` varchar(40) NOT NULL,
  `nama_ujian` varchar(40) NOT NULL,
  `no_soal` varchar(3) NOT NULL,
  `jawaban` varchar(3) NOT NULL,
  `jawaban_benar` varchar(3) NOT NULL,
  `warna_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_ujian`
--

INSERT INTO `hasil_ujian` (`id`, `username`, `tipe_user`, `nama_ujian`, `no_soal`, `jawaban`, `jawaban_benar`, `warna_status`) VALUES
(191, 'rizkyreynaldi', 'rizdev_batch1', 'Pretest 1', '1', 'A', 'a', 'primary'),
(192, 'rizkyreynaldi', 'rizdev_batch1', 'Pretest 1', '2', '', '', 'secondary'),
(193, 'rizkyreynaldi', 'rizdev_batch1', 'Pretest 1', '3', '', '', 'secondary'),
(194, 'rizkyreynaldi', 'rizdev_batch1', 'Pretest 1', '4', '', '', 'secondary'),
(195, 'rizkyreynaldi', 'rizdev_batch1', 'Pretest 1', '5', '', '', 'secondary');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `nama_ujian` varchar(30) NOT NULL,
  `tipe_ujian` varchar(30) NOT NULL,
  `no_soal` varchar(10) NOT NULL,
  `soal` varchar(512) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `a` varchar(200) NOT NULL,
  `b` varchar(200) NOT NULL,
  `c` varchar(200) NOT NULL,
  `d` varchar(200) NOT NULL,
  `e` varchar(200) NOT NULL,
  `jawaban_benar` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `nama_ujian`, `tipe_ujian`, `no_soal`, `soal`, `gambar`, `a`, `b`, `c`, `d`, `e`, `jawaban_benar`) VALUES
(21, 'Pretest 1', 'rizdev_batch1', '1', '20 + 1 = ', '', '21', '19', '9', '7', '101', 'a'),
(22, 'Pretest 1', 'rizdev_batch1', '2', '1 + 1 = ', '', '9', '8', '11', '2', '1', 'd'),
(23, 'Pretest 1', 'rizdev_batch1', '3', '30 + (-100) = ', '', '70', '-70', '21', '99', '100', 'b'),
(24, 'Pretest 1', 'rizdev_batch1', '4', '78 >= 1 adalah : ', '', 'benar', 'salah', '70', '99', '10', 'a'),
(25, 'Pretest 1', 'rizdev_batch1', '5', '88 + 1 = ', '', '90', '89', '11', '81', '80', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipe_user` varchar(30) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_identitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `tipe_user`, `nama_lengkap`, `no_identitas`) VALUES
(6, 'rizkyreynaldi', '$2y$10$pPO8DAhV8hiHWzCnZkhIs.pFPERRRL0J2svhuwYLUklTNvsh8Diom', 'rizdev_batch1', 'Rizky Reynaldi', '221011403206');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_ujian`
--
ALTER TABLE `daftar_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `daftar_ujian`
--
ALTER TABLE `daftar_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `hasil_ujian`
--
ALTER TABLE `hasil_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
