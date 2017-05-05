-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 02:01 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proposal`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_users`
--

CREATE TABLE IF NOT EXISTS `app_users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL,
  `Periode` varchar(5) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_users`
--

INSERT INTO `app_users` (`id_users`, `username`, `nama`, `password`, `level`, `Periode`, `last_login`) VALUES
(1, 'admin', 'ProdiTI', '0ddc3cefb0884d9406e4db9d6ef70701', 'admin', '', '2017-04-23 04:13:11'),
(3, '13.1.03.02.0397', 'Rizal Darmawan Nugroho', '0a816e879e0705804867353d37a8ef73', 'mahasiswa', '20171', '2017-05-03 06:35:22'),
(4, 'angga', 'ardian anggara putra', '8479c86c7afcb56631104f5ce5d6de62', 'dosen', '', '2017-04-23 06:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `biodata_dosen`
--

CREATE TABLE IF NOT EXISTS `biodata_dosen` (
  `Id_Dosen` varchar(20) NOT NULL,
  `Nama_Dosen` text NOT NULL,
  `Notlp_Dosen` varchar(12) NOT NULL,
  `Alamat_Dosen` text NOT NULL,
  `Email_Dosen` text NOT NULL,
  `Bidang Keahlian` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `npm` varchar(25) NOT NULL,
  `nama` text NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `email` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `k_judul` varchar(100) NOT NULL,
  `k_program` varchar(100) NOT NULL,
  `metode` varchar(100) NOT NULL,
  `pendaftar` enum('Lama','Baru') NOT NULL,
  `judul` text NOT NULL,
  `periode` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`npm`, `nama`, `kelas`, `email`, `no_hp`, `k_judul`, `k_program`, `metode`, `pendaftar`, `judul`, `periode`) VALUES
('13.1.03.02.0321', 'Fanina Aprilia', '4-H', '-', '-', 'SISTEM PENDUKUNG KEPUTUSAN', 'PHP', 'KNN', 'Baru', 'SPK BOS', '20162'),
('13.1.03.02.0397', 'Rizal Darmawan Nugroho', '4-A', 'rizaldarmawan1129@outlook.com', '085736732018', 'SISTEM PENDUKUNG KEPUTUSAN', 'PHP', 'NAIVE BAYES', 'Baru', 'SISTEM PENDUKUNG KEPUTUSAN PENENTUAN DOSEN PEMBIMBING SEMINAR PROPOSAL MENGGUNAKAN NAIVE BAYES', '20162');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dataset`
--

CREATE TABLE IF NOT EXISTS `tb_dataset` (
  `k_judul` varchar(100) NOT NULL,
  `k_program` varchar(100) NOT NULL,
  `metode` varchar(100) NOT NULL,
  `pendaftar` enum('Lama','Baru') NOT NULL,
  `dosen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_users`
--
ALTER TABLE `app_users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `biodata_dosen`
--
ALTER TABLE `biodata_dosen`
  ADD PRIMARY KEY (`Id_Dosen`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`npm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_users`
--
ALTER TABLE `app_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
