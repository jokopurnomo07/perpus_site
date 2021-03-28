-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 02:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tgr_admin`
--

CREATE TABLE `tgr_admin` (
  `nama` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tgr_admin`
--

INSERT INTO `tgr_admin` (`nama`, `password`) VALUES
('arifdwi', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tgr_buku`
--

CREATE TABLE `tgr_buku` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` int(10) NOT NULL,
  `asal` varchar(200) NOT NULL,
  `klasifikasi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tgr_buku`
--

INSERT INTO `tgr_buku` (`id`, `no`, `tanggal`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `asal`, `klasifikasi`) VALUES
(7, 1, '2021-03-27', 'Naruto Shipuden Next Generation', 'Mashasi Kishimoto', 'Shonen Jump', 2007, 'Jepang', 'Komik  Naruto Shipudden Next Generation');

-- --------------------------------------------------------

--
-- Table structure for table `tgr_buku_tamu`
--

CREATE TABLE `tgr_buku_tamu` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `keperluan` varchar(200) NOT NULL,
  `tanggal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tgr_peminjaman`
--

CREATE TABLE `tgr_peminjaman` (
  `id` int(225) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `judul_buku` varchar(250) NOT NULL,
  `tanggal_pinjam` varchar(50) NOT NULL,
  `tanggal_kembali` varchar(50) NOT NULL,
  `status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tgr_peminjaman`
--

INSERT INTO `tgr_peminjaman` (`id`, `nama`, `kelas`, `judul_buku`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
(4, 'Markocop', '10 RPL 3', 'Naruto Shipuden Next Generation', '2021-03-28', '2021-04-04', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tgr_admin`
--
ALTER TABLE `tgr_admin`
  ADD PRIMARY KEY (`nama`);

--
-- Indexes for table `tgr_buku`
--
ALTER TABLE `tgr_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tgr_buku_tamu`
--
ALTER TABLE `tgr_buku_tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tgr_peminjaman`
--
ALTER TABLE `tgr_peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tgr_buku`
--
ALTER TABLE `tgr_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tgr_buku_tamu`
--
ALTER TABLE `tgr_buku_tamu`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tgr_peminjaman`
--
ALTER TABLE `tgr_peminjaman`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
