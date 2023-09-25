-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 05:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plnmonitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_dataabsen`
--

CREATE TABLE `t_dataabsen` (
  `id_absen` int(11) NOT NULL,
  `nm_absen` varchar(150) NOT NULL,
  `email` varchar(180) NOT NULL,
  `nope` varchar(20) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `signed` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_dataabsen`
--

INSERT INTO `t_dataabsen` (`id_absen`, `nm_absen`, `email`, `nope`, `unit`, `bidang`, `tanggal`, `waktu`, `signed`) VALUES
(1, 'Sakila Go', 'sg00@gg.mu', '08212327281', 'UP3 Telaga', 'TEL', '0000-00-00', '12.12', '64fe95eb19c08.png'),
(2, 'Nabil Las', 'nbl00@gg.mu', '082341526252', 'UP3 Limboto', 'UP2K', '2023-09-01', '12:12', '64fe717995200.png'),
(3, 'Nelasya', 'nlyys000@gg.mu', '082134783421', 'UP3 Bone Bolango', 'REN', '2023-09-06', '10:01', '64ffad80a72b8.png'),
(4, 'Saifulp', 'saf00@gg.mu', '085321345654', 'UP3 Limboto', 'SDM', '2023-09-11', '16:16', '6503bbc7ee103.png'),
(5, 'Anissah Ha', 'ann000@gg.mu', '08213245678', 'UP3 Kota Gorontalo', 'PAD', '2023-09-07', '10:14', '65065f7b0d6ee.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_dataabsensi`
--

CREATE TABLE `t_dataabsensi` (
  `id_absen` int(11) NOT NULL,
  `nm_absen` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nope` text NOT NULL,
  `unit` varchar(100) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `signed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_datapengunjung`
--

CREATE TABLE `t_datapengunjung` (
  `id_absen` int(11) NOT NULL,
  `nm_pgnjng` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `agenda` varchar(200) NOT NULL,
  `kprluan` varchar(200) NOT NULL,
  `tgl` varchar(10) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_datapengunjung`
--

INSERT INTO `t_datapengunjung` (`id_absen`, `nm_pgnjng`, `email`, `nohp`, `agenda`, `kprluan`, `tgl`, `waktu`, `gambar`) VALUES
(1, 'Ahmad Al', 'aa000@gg.mu', '082345262', 'UP3 Kota Gorontalo', 'REN', '12-09-2023', '15.09', '64fa93831c0ed.png'),
(2, 'Ahmad Kur', 'ak000@gg.mu', '08234152627', 'UP3 Telaga', 'TEL', '15-09-2023', '12.12', '64faef6cf26d0.png');

-- --------------------------------------------------------

--
-- Table structure for table `t_datauser`
--

CREATE TABLE `t_datauser` (
  `id_user` int(10) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `level` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_datauser`
--

INSERT INTO `t_datauser` (`id_user`, `nama_pengguna`, `nip`, `level`, `username`, `password`) VALUES
(1, 'Aqram Alhidayatullah', '', 'petugas', 'admin', 'admin'),
(2, 'Ru Sentrasia', '', 'petugas', 'petugas', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_dataabsen`
--
ALTER TABLE `t_dataabsen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `t_dataabsensi`
--
ALTER TABLE `t_dataabsensi`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `t_datapengunjung`
--
ALTER TABLE `t_datapengunjung`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `t_datauser`
--
ALTER TABLE `t_datauser`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_dataabsen`
--
ALTER TABLE `t_dataabsen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `t_dataabsensi`
--
ALTER TABLE `t_dataabsensi`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_datapengunjung`
--
ALTER TABLE `t_datapengunjung`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_datauser`
--
ALTER TABLE `t_datauser`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
