-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2016 at 05:52 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sehari`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE IF NOT EXISTS `bahan` (
  `kode_bahan` varchar(20) NOT NULL,
  `nama_bahan` varchar(30) NOT NULL,
  `jenis_bahan` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`kode_bahan`, `nama_bahan`, `jenis_bahan`) VALUES
('PY0002', '\r\n							Semi Perancisa', 'Renda'),
('PY0003', 'batik sutera', 'satin'),
('PY0004', 'Perca', 'Kain');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'john', '6E0B7076126A29D5DFCBD54835387B7B' ), 
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3'  ); 

-- --------------------------------------------------------

--
-- Table structure for table `pekerja`
--

CREATE TABLE IF NOT EXISTS `pekerja` (
  `kode_pekerja` varchar(20) NOT NULL,
  `nama_tim` varchar(20) NOT NULL,
  `jumlah_pekerja` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pekerja`
--

INSERT INTO `pekerja` (`kode_pekerja`, `nama_tim`, `jumlah_pekerja`) VALUES
('P10001', 'Desainer', '5'),
('P10005', 'Asteroid Project', '10');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `kode_bahan` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kode_produk`, `nama_produk`, `unit`, `kode_bahan`) VALUES
('Y10001', 'IcaFasion', '10', 'PY0001'),
('Y10002', 'ArialCloths', '20', 'PY0002'),
('Y10003', 'dfsd', '1', 'PY0004'),
('10909', 'kami dia', '80', 'PY0001');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE IF NOT EXISTS `produksi` (
  `kode_produksi` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `kode_pekerja` varchar(100) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `harga` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`kode_produksi`, `tanggal`, `kode_produk`, `kode_pekerja`, `jumlah`, `harga`) VALUES
('KP0001', '2016-07-08', 'Y10001', 'P10001', '7', 'Rp.600.000'),
('KP0002', '2016-07-09', 'Y10002', 'P10002', '5', 'Rp.750.000'),
('KP0005', '2016-08-10', 'Y10002', 'P10005', '1', 'Rp. 55000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`kode_bahan`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pekerja`
--
ALTER TABLE `pekerja`
  ADD PRIMARY KEY (`kode_pekerja`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`kode_produksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
