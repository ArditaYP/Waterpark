-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2022 at 01:17 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `iddetailtransaksi` int(11) NOT NULL,
  `idtransaksi` int(11) NOT NULL,
  `idobat` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `hargasatuan` double NOT NULL,
  `totalharga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`iddetailtransaksi`, `idtransaksi`, `idobat`, `jumlah`, `hargasatuan`, `totalharga`) VALUES
(1, 1, 1, 10, 10000, 100000),
(2, 2, 1, 2, 10000, 20000),
(3, 2, 2, 2, 1000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `idobat` int(11) NOT NULL,
  `idsupplier` varchar(4) NOT NULL,
  `namaobat` varchar(100) NOT NULL,
  `kategoriobat` varchar(10) NOT NULL,
  `hargajual` double NOT NULL,
  `hargabeli` double NOT NULL,
  `stok_obat` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`idobat`, `idsupplier`, `namaobat`, `kategoriobat`, `hargajual`, `hargabeli`, `stok_obat`, `keterangan`) VALUES
(1, '1', 'SSH', 'Obat Ultim', 10000, 12000, 200, 'Obat paling gg dan wp ezpz '),
(2, '1', 'Somewhere', 'Keras', 1000, 2000, 10, 'Vieieie'),
(3, '1', 'Fallen', 'EZ', 292929, 929292, 15, 'Nothing');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `namalengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` int(15) NOT NULL,
  `usia` int(2) NOT NULL,
  `buktifotoresep` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`idpelanggan`, `namalengkap`, `alamat`, `telp`, `usia`, `buktifotoresep`) VALUES
(1, 'Zuae', 'Jiji', 928, 88, 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `tgltransaksi` date NOT NULL,
  `idpelanggan` varchar(4) NOT NULL,
  `kategoripelanggan` varchar(15) NOT NULL,
  `totalbayar` double DEFAULT NULL,
  `bayar` double DEFAULT NULL,
  `kembali` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`idtransaksi`, `tgltransaksi`, `idpelanggan`, `kategoripelanggan`, `totalbayar`, `bayar`, `kembali`) VALUES
(1, '2022-01-19', '1', 'Pemuda Pancasil', 100000, 200000, 100000),
(2, '2022-01-26', '1', 'Pepa', 22000, 30000, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `leveluser` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `email`, `nama`, `password`, `leveluser`) VALUES
(1, 'aqua@gmail.com', 'aqua', '$2y$10$aV2ZIDxae', ''),
(2, 'Kazuma@gmail.com', 'Kazuma', 'kazuma', ''),
(3, 'smk@gmail.com', 'smk', 'smk', ''),
(4, 'sanglegenda@gmail.com', 'white', '$2y$10$c4BuWYHpDB/K6mUZjjDQRuPZ/SDTomJ1Q3Q8Qhi4PUxDku7tfwD56', ''),
(5, 'nova@gmail.com', 'nova', '$2y$10$4GoQmaO83C54yBHQjwfNKuQSSQ49DtPHcB.kbPyMeiWG3B9y5Uf6u', ''),
(6, 'arditapinatih@gmail.com', 'abi', 'abi', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`iddetailtransaksi`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`idobat`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `iddetailtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_obat`
--
ALTER TABLE `tb_obat`
  MODIFY `idobat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
