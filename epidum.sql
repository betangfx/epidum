-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 06:40 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epidum`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_modul`
--

CREATE TABLE `app_modul` (
  `ModulID` int(11) NOT NULL,
  `GroupModulID` int(11) DEFAULT NULL,
  `Modul` varchar(50) NOT NULL,
  `Menu` varchar(50) DEFAULT NULL,
  `Link` varchar(255) NOT NULL,
  `Lokasi` varchar(255) NOT NULL,
  `Urutan` int(11) DEFAULT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_modul`
--

INSERT INTO `app_modul` (`ModulID`, `GroupModulID`, `Modul`, `Menu`, `Link`, `Lokasi`, `Urutan`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`, `StatusID`) VALUES
(1, 1, 'Proses Perkara', 'Proses Perkara', 'index.php?page=analisa', '/main/analisa', 2, 1, '2021-02-14 14:11:00', NULL, NULL, 11),
(2, 1, 'Laporan', 'Laporan', 'index.php?page=rencana', '/main/rencana', 3, 1, '2021-02-14 14:11:00', NULL, NULL, 11),
(3, 1, 'Informasi', 'Informasi', 'index.php?page=jurnal', '/main/jurnal', 4, 1, '2021-02-14 14:11:00', NULL, NULL, 11),
(4, 1, 'Daftar Perkara', 'Daftar Perkara', 'index.php?page=perkara', '/main/perkara', 1, 1, '2021-02-14 14:11:00', NULL, NULL, 11),
(5, 2, 'Berkas', 'Berkas', 'index.php?page=berkas', '/setting/berkas', 2, 1, '2021-02-14 14:11:00', NULL, NULL, 11),
(6, 2, 'User', 'User', 'index.php?page=user', '/setting/user', 3, 1, '2021-02-14 14:11:00', NULL, NULL, 11),
(7, 2, 'Profile', 'Profile', 'index.php?page=profile', '/setting/profile', 4, 1, '2021-02-14 14:11:00', NULL, NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `app_modul_group`
--

CREATE TABLE `app_modul_group` (
  `GroupModulID` int(11) NOT NULL,
  `GroupModul` varchar(50) NOT NULL,
  `Urutan` int(11) DEFAULT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL,
  `StatusID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_modul_group`
--

INSERT INTO `app_modul_group` (`GroupModulID`, `GroupModul`, `Urutan`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`, `StatusID`) VALUES
(1, 'Dashboard', 1, 1, '2021-02-14 13:54:49', NULL, NULL, 11),
(2, 'Pengaturan', 1, 1, '2021-02-14 13:55:25', NULL, NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `BerkasID` int(11) NOT NULL,
  `KodeBerkas` varchar(128) NOT NULL,
  `Keterangan` varchar(256) NOT NULL,
  `WaktuProses` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `master_jabatan`
--

CREATE TABLE `master_jabatan` (
  `JabatanID` int(11) NOT NULL,
  `Jabatan` varchar(128) NOT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `master_jabatan`
--

INSERT INTO `master_jabatan` (`JabatanID`, `Jabatan`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`) VALUES
(1, 'Ajun Jaksa Madya', 1, '2021-06-05 06:47:48', 1, 2147483647),
(4, 'Ajun Jaksa', 1, '2021-06-06 21:27:09', NULL, NULL),
(5, 'Jaksa Pratama', 1, '2021-06-06 21:27:33', NULL, NULL),
(6, 'Jaksa Muda', 1, '2021-06-06 21:27:46', NULL, NULL),
(7, 'Jaksa Madya', 1, '2021-06-06 21:39:30', NULL, NULL),
(8, 'Jaksa Utama Pratama', 1, '2021-06-06 21:39:42', NULL, NULL),
(9, 'Jaksa Utama Muda', 1, '2021-06-06 21:39:53', NULL, NULL),
(10, 'Jaksa Utama Madya', 1, '2021-06-06 21:40:01', NULL, NULL),
(11, 'Jaksa Utama', 1, '2021-06-06 21:40:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perkara`
--

CREATE TABLE `perkara` (
  `PerkaraID` int(128) NOT NULL,
  `NoSPDP` varchar(256) NOT NULL,
  `Tersangka` varchar(256) NOT NULL,
  `Pelanggaran` varchar(256) NOT NULL,
  `TglTerima` date NOT NULL,
  `Catatan` text NOT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` datetime DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proses`
--

CREATE TABLE `proses` (
  `ProsesID` int(11) NOT NULL,
  `PerkaraID` varchar(128) NOT NULL,
  `JaksaID` int(11) NOT NULL,
  `BerkasID` int(11) NOT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `StatusID` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `KategoriStatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`StatusID`, `Status`, `KategoriStatusID`) VALUES
(1, 'Terbuka', 1),
(2, 'Ditutup', 1),
(3, 'Terbuka', 2),
(4, 'Tertutup', 2),
(5, 'Terbuka', 3),
(6, 'Tertutup', 3),
(7, 'Manual', 3),
(8, 'Impas', 3),
(9, 'Untung', 3),
(10, 'Rugi', 3),
(11, 'Aktif', 4),
(12, 'Tidak Aktif', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(25) NOT NULL,
  `Password` varchar(32) NOT NULL,
  `UserLevelID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Username`, `Password`, `UserLevelID`, `StatusID`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`) VALUES
(1, 'admin', '2aefc34200a294a3cc7db81b43a81873', 0, 11, 0, '2021-06-04 10:54:43', 1, '2021-06-07 00:09:34'),
(6, 'manager', '1d0258c2440a8d19e716292b231e3190', 1, 11, 0, '2021-06-05 03:56:48', 1, '2021-06-07 00:10:50'),
(9, 'jaksa', '7cc8b7b34ceaedba106d53e02b348707', 3, 11, 0, '2021-06-05 15:30:58', 1, '2021-06-07 00:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_hakakses`
--

CREATE TABLE `user_hakakses` (
  `HakAksesID` int(11) NOT NULL,
  `UserLevelID` int(11) NOT NULL,
  `ModulID` varchar(250) NOT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_hakakses`
--

INSERT INTO `user_hakakses` (`HakAksesID`, `UserLevelID`, `ModulID`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`) VALUES
(1, 0, '1,2,3,4,5,6,7', 1, '2021-02-14 15:56:54', 1, '2021-06-07 11:41:06'),
(12, 1, '4,5,6,7', 1, '2021-06-07 23:08:12', NULL, NULL),
(13, 2, '4,5,6,7', 1, '2021-06-07 23:08:25', NULL, NULL),
(14, 3, '4,5,6,7', 1, '2021-06-07 23:08:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `UserLevelID` int(11) NOT NULL,
  `UserLevel` varchar(50) NOT NULL,
  `StatusID` int(11) NOT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`UserLevelID`, `UserLevel`, `StatusID`, `UserBuat`, `TglBuat`, `UserEdit`, `TglEdit`) VALUES
(0, 'Administrator', 11, 1, '2021-02-14 13:23:18', 1, '2021-06-07 00:07:51'),
(1, 'Manager', 11, 1, '2021-02-14 13:23:18', 1, '2021-06-07 00:09:52'),
(2, 'Operator', 11, 1, '2021-02-14 13:28:47', 1, '2021-06-07 00:10:24'),
(3, 'Jaksa', 11, 1, '2021-06-05 04:26:54', 1, '2021-06-07 00:10:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `ProfilID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `NIP` varchar(256) NOT NULL,
  `NamaLengkap` varchar(256) NOT NULL,
  `TempatLahir` varchar(256) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `NoTelp` varchar(12) NOT NULL,
  `Email` varchar(256) DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `Kota` varchar(256) DEFAULT NULL,
  `Provinsi` varchar(256) DEFAULT NULL,
  `Kodepos` int(11) DEFAULT NULL,
  `UserBuat` int(11) NOT NULL,
  `TglBuat` datetime NOT NULL DEFAULT current_timestamp(),
  `UserEdit` int(11) DEFAULT NULL,
  `TglEdit` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_modul`
--
ALTER TABLE `app_modul`
  ADD PRIMARY KEY (`ModulID`),
  ADD UNIQUE KEY `Link` (`Link`);

--
-- Indexes for table `app_modul_group`
--
ALTER TABLE `app_modul_group`
  ADD PRIMARY KEY (`GroupModulID`);

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`BerkasID`),
  ADD UNIQUE KEY `KodeBerkas` (`KodeBerkas`);

--
-- Indexes for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  ADD PRIMARY KEY (`JabatanID`);

--
-- Indexes for table `perkara`
--
ALTER TABLE `perkara`
  ADD PRIMARY KEY (`PerkaraID`);

--
-- Indexes for table `proses`
--
ALTER TABLE `proses`
  ADD PRIMARY KEY (`ProsesID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `user_hakakses`
--
ALTER TABLE `user_hakakses`
  ADD PRIMARY KEY (`HakAksesID`),
  ADD UNIQUE KEY `UserLevelID` (`UserLevelID`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`UserLevelID`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`ProfilID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_modul`
--
ALTER TABLE `app_modul`
  MODIFY `ModulID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `app_modul_group`
--
ALTER TABLE `app_modul_group`
  MODIFY `GroupModulID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `BerkasID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_jabatan`
--
ALTER TABLE `master_jabatan`
  MODIFY `JabatanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `perkara`
--
ALTER TABLE `perkara`
  MODIFY `PerkaraID` int(128) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `proses`
--
ALTER TABLE `proses`
  MODIFY `ProsesID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_hakakses`
--
ALTER TABLE `user_hakakses`
  MODIFY `HakAksesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `ProfilID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
