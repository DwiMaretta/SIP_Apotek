-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 11 Mei 2019 pada 04.57
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `kode` int(5) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `berat` varchar(225) NOT NULL,
  `kadaluwarsa` date NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`kode`, `nama`, `jenis`, `berat`, `kadaluwarsa`, `harga`, `stok`) VALUES
(999, 'inzana', 'obat demam', '50 g', '2019-11-20', 3500, 8),
(1110, 'bodrexin', 'obat demam', '100 g', '2019-07-01', 5000, 12),
(1112, 'antangin', 'obat masuk angin', '100 ml', '2019-11-10', 18000, 20),
(11114, 'Amoxicilin', 'Antibiotik', '500 mg', '0000-00-00', 6000, 10),
(11115, 'Amoxicilin', 'Antibiotik', '500 mg', '2018-04-01', 6000, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(9) NOT NULL,
  `kode` int(5) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `berat` varchar(225) NOT NULL,
  `kadaluwarsa` date NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` varchar(225) NOT NULL,
  `subtotal` varchar(225) NOT NULL,
  `tanggal` varchar(225) NOT NULL,
  `waktu` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `kode`, `nama`, `jenis`, `berat`, `kadaluwarsa`, `harga`, `jumlah`, `subtotal`, `tanggal`, `waktu`) VALUES
(1, 1118, 'obat', 'bbb', '', '0000-00-00', 30000, '2', '60000', '20190510', '22:07:39'),
(2, 1118, 'obat', 'bbb', '', '0000-00-00', 30000, '2', '60000', '20190510', '22:09:05'),
(3, 1118, 'obat', 'bbb', '', '0000-00-00', 30000, '2', '60000', '20190510', '22:10:06'),
(4, 1110, 'bodrexin', 'obat demam', '', '0000-00-00', 5000, '1', '5000', '20190510', '23:24:25'),
(5, 1110, 'bodrexin', 'obat demam', '', '0000-00-00', 5000, '1', '5000', '20190510', '23:24:43'),
(6, 1110, 'bodrexin', 'obat demam', '', '0000-00-00', 5000, '1', '5000', '20190510', '23:26:00'),
(7, 11112, 'Amoxicilin', 'Antibiotik', '', '0000-00-00', 6000, '5', '30000', '20190510', '23:26:30'),
(8, 11112, 'Amoxicilin', 'Antibiotik', '', '0000-00-00', 6000, '5', '30000', '20190510', '23:27:27'),
(11, 1110, 'bodrexin', 'obat demam', '100 g', '0000-00-00', 5000, '1', '5000', '20190510', '23:30:17'),
(12, 1110, 'bodrexin', 'obat demam', '100 g', '0000-00-00', 5000, '2', '10000', '20190510', '23:30:28'),
(14, 999, 'inzana', 'obat demam', '50 g', '2019-11-20', 3500, '2', '7000', '20190511', '09:34:38'),
(15, 1110, 'bodrexin', 'obat demam', '100 g', '2019-07-01', 5000, '1', '5000', '20190511', '09:34:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id` int(9) NOT NULL,
  `kode` int(5) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `berat` varchar(225) NOT NULL,
  `kadaluwarsa` date NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` varchar(225) NOT NULL,
  `subtotal` varchar(225) NOT NULL,
  `tanggal` varchar(225) NOT NULL,
  `waktu` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp_bayar`
--

CREATE TABLE `temp_bayar` (
  `id` int(11) NOT NULL,
  `bayar` char(8) NOT NULL,
  `kembali` char(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(225) NOT NULL,
  `pwd` varchar(225) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `no.hp` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `pwd`, `nama`, `alamat`, `no.hp`) VALUES
('admin', '123', 'sakinah', 'layo', '0823'),
('Hanna1', '123', 'Nur Hanna', 'indralaya', '+628827449'),
('meta1', '123', 'dwi mareta', 'indralaya', '0987');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_bayar`
--
ALTER TABLE `temp_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `temp_bayar`
--
ALTER TABLE `temp_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
