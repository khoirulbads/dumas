-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2021 at 03:43 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sidm`
--

-- --------------------------------------------------------

--
-- Table structure for table `dumas`
--

CREATE TABLE `dumas` (
  `DUMAS_ID` int(11) NOT NULL,
  `PENG_ID` int(11) DEFAULT NULL,
  `JUDUL` mediumtext DEFAULT NULL,
  `ISI` mediumtext DEFAULT NULL,
  `TGL` timestamp NULL DEFAULT NULL,
  `LOKASI` varchar(50) DEFAULT NULL,
  `KATEGORI` varchar(100) DEFAULT NULL,
  `LAMPIRAN` mediumtext DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `PENG_ID` int(11) NOT NULL,
  `NAMA` varchar(50) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(20) DEFAULT NULL,
  `LEVEL` varchar(20) DEFAULT NULL,
  `FOTO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`PENG_ID`, `NAMA`, `EMAIL`, `USERNAME`, `PASSWORD`, `LEVEL`, `FOTO`) VALUES
(1, 'Admin', 'admin@admin.com', 'admin', 'admin', 'Admin', 'cam.png'),
(2, 'Ahmad', 'ahmad03@gmail.com', 'ahmad', 'ahmad', 'Pimpinan', 'jack.jpg'),
(3, 'Zaniolo', 'zanionolo22@gmail.com', 'zaniolo', 'zaniolo', 'Pengunjung', 'defaultprofile.png');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `SARAN_ID` int(11) NOT NULL,
  `ISI` mediumtext DEFAULT NULL,
  `TGL` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `SET_ID` int(11) NOT NULL,
  `NO_PONSEL` varchar(1024) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitor_counter`
--

CREATE TABLE `visitor_counter` (
  `VC_ID` int(11) NOT NULL,
  `IP` varchar(100) DEFAULT NULL,
  `TG` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dumas`
--
ALTER TABLE `dumas`
  ADD PRIMARY KEY (`DUMAS_ID`),
  ADD UNIQUE KEY `LAPORAN_PK` (`DUMAS_ID`),
  ADD KEY `RELATIONSHIP_1_FK` (`PENG_ID`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`PENG_ID`),
  ADD UNIQUE KEY `PENGGUNA_PK` (`PENG_ID`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`SARAN_ID`),
  ADD UNIQUE KEY `SARAN_PK` (`SARAN_ID`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`SET_ID`),
  ADD UNIQUE KEY `SETTING_PK` (`SET_ID`);

--
-- Indexes for table `visitor_counter`
--
ALTER TABLE `visitor_counter`
  ADD PRIMARY KEY (`VC_ID`),
  ADD UNIQUE KEY `VISITOR_COUNTER_PK` (`VC_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dumas`
--
ALTER TABLE `dumas`
  ADD CONSTRAINT `FK_LAPORAN_RELATIONS_PENGGUNA` FOREIGN KEY (`PENG_ID`) REFERENCES `pengguna` (`PENG_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
