-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2016 at 08:33 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukm`
--
CREATE DATABASE IF NOT EXISTS `ukm` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ukm`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(2) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `id_ukm` int(4) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `id_ukm`, `time`) VALUES
(3, 'hisyam', 'lengce', 1, '2016-12-20 15:07:25'),
(4, 'widy', 'lengce2', 4, '2016-12-20 15:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` int(4) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` varchar(12) NOT NULL,
  `motivasi` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_ukm_1` int(4) NOT NULL,
  `flag_1` enum('1','2','3') NOT NULL DEFAULT '1',
  `id_ukm_2` int(4) NOT NULL,
  `flag_2` enum('1','2','3') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nim`, `nama`, `tgl_lahir`, `motivasi`, `time`, `id_ukm_1`, `flag_1`, `id_ukm_2`, `flag_2`) VALUES
(1, 'A11.2012.08888', 'Riky Kun Berok', '13-08-1996', 'ingin nganu', '2016-12-20 15:46:27', 4, '2', 6, '1'),
(2, 'A12.2014.88889', 'Gembleng Ha', '14-17-1872', 'nganu bos', '2016-12-20 15:53:27', 4, '3', 1, '2'),
(3, 'A24.2012.88762', 'Somplak', '18-12-1776', 'cihuy', '2016-12-20 15:53:27', 1, '3', 4, '3');

-- --------------------------------------------------------

--
-- Table structure for table `regist_maks`
--

CREATE TABLE `regist_maks` (
  `id_regist` int(4) NOT NULL,
  `id_ukm` int(4) NOT NULL,
  `maks` varchar(3) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regist_maks`
--

INSERT INTO `regist_maks` (`id_regist`, `id_ukm`, `maks`, `time`) VALUES
(4, 1, '150', '2016-12-20 19:20:08'),
(5, 1, '150', '2016-12-20 19:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `ukm`
--

CREATE TABLE `ukm` (
  `id_ukm` int(1) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukm`
--

INSERT INTO `ukm` (`id_ukm`, `nama`, `time`) VALUES
(1, 'UKM BASKET', '2016-12-20 15:06:16'),
(2, 'UKM PENALARAN', '2016-12-20 15:06:16'),
(3, 'UKM DNCC', '2016-12-20 15:06:16'),
(4, 'UKM BADMINTON', '2016-12-20 15:06:16'),
(5, 'UKM KARATE', '2016-12-20 15:06:16'),
(6, 'UKM VOLLY', '2016-12-20 15:06:16'),
(7, 'UKM MENWA', '2016-12-20 15:06:16'),
(8, 'UKM MUSIK', '2016-12-20 15:06:16'),
(9, 'BAI', '2016-12-20 15:06:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_ukm` (`id_ukm`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_ukm` (`id_ukm_1`),
  ADD KEY `id_ukm_2` (`id_ukm_2`);

--
-- Indexes for table `regist_maks`
--
ALTER TABLE `regist_maks`
  ADD PRIMARY KEY (`id_regist`),
  ADD KEY `id_ukm` (`id_ukm`);

--
-- Indexes for table `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id_ukm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mhs` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `regist_maks`
--
ALTER TABLE `regist_maks`
  MODIFY `id_regist` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ukm`
--
ALTER TABLE `ukm`
  MODIFY `id_ukm` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_ukm`) REFERENCES `ukm` (`id_ukm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_ukm_1`) REFERENCES `ukm` (`id_ukm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_ukm_2`) REFERENCES `ukm` (`id_ukm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `regist_maks`
--
ALTER TABLE `regist_maks`
  ADD CONSTRAINT `regist_maks_ibfk_1` FOREIGN KEY (`id_ukm`) REFERENCES `ukm` (`id_ukm`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
