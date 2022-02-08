-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 01:38 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apotek`
--
CREATE DATABASE IF NOT EXISTS `apotek` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `apotek`;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `kode` int(5) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `berat` varchar(225) NOT NULL,
  `kadaluwarsa` date NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(5) NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode`, `nama`, `jenis`, `berat`, `kadaluwarsa`, `harga`, `stok`) VALUES
(999, 'inzana', 'obat demam', '50 g', '2019-11-20', 3500, 8),
(1110, 'bodrexin', 'obat demam', '100 g', '2019-07-01', 5000, 12),
(1112, 'antangin', 'obat masuk angin', '100 ml', '2019-11-10', 18000, 20),
(11114, 'Amoxicilin', 'Antibiotik', '500 mg', '0000-00-00', 6000, 10),
(11115, 'Amoxicilin', 'Antibiotik', '500 mg', '2018-04-01', 6000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `kode` int(5) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `berat` varchar(225) NOT NULL,
  `kadaluwarsa` date NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` varchar(225) NOT NULL,
  `subtotal` varchar(225) NOT NULL,
  `tanggal` varchar(225) NOT NULL,
  `waktu` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `kode`, `nama`, `jenis`, `berat`, `kadaluwarsa`, `harga`, `jumlah`, `subtotal`, `tanggal`, `waktu`) VALUES
(11, 1110, 'bodrexin', 'obat demam', '100 g', '0000-00-00', 5000, '1', '5000', '20190510', '23:30:17'),
(12, 1110, 'bodrexin', 'obat demam', '100 g', '0000-00-00', 5000, '2', '10000', '20190510', '23:30:28'),
(14, 999, 'inzana', 'obat demam', '50 g', '2019-11-20', 3500, '2', '7000', '20190511', '09:34:38'),
(15, 1110, 'bodrexin', 'obat demam', '100 g', '2019-07-01', 5000, '1', '5000', '20190511', '09:34:59'),
(17, 999, 'inzana', 'obat demam', '50 g', '2019-11-20', 3500, '2', '7000', '20220208', '07:24:42'),
(18, 1110, 'bodrexin', 'obat demam', '100 g', '2019-07-01', 5000, '10', '50000', '20220208', '07:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `kode` int(5) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `berat` varchar(225) NOT NULL,
  `kadaluwarsa` date NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` varchar(225) NOT NULL,
  `subtotal` varchar(225) NOT NULL,
  `tanggal` varchar(225) NOT NULL,
  `waktu` char(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Table structure for table `temp_bayar`
--

CREATE TABLE IF NOT EXISTS `temp_bayar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bayar` char(8) NOT NULL,
  `kembali` char(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(225) NOT NULL,
  `pwd` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no.hp` varchar(225) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `pwd`, `nama`, `alamat`, `no.hp`) VALUES
('admin', '123', 'sakinah', 'layo', '0823'),
('Hanna1', '123', 'Nur Hanna', 'indralaya', '+628827449'),
('meta1', '123', 'dwi mareta', 'indralaya', '0987');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
