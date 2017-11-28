-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2017 at 01:46 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kost`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataKost`
--

CREATE TABLE `dataKost` (
  `id` bigint(12) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL,
  `intro` text NOT NULL,
  `harga` bigint(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataKost`
--

INSERT INTO `dataKost` (`id`, `nama`, `lat`, `long`, `intro`, `harga`) VALUES
(1, 'Kost pak yayan', '-7.961444960361576', '112.6134740581665', 'Kost enak sekali dekat um dan dekat dengan ub, selain itu didekatnya terdapat pasar setiap pagi sehingga kalo mau beli makanan enak, tidak perlu berjalan jauh-jauh.', 500000);

-- --------------------------------------------------------

--
-- Table structure for table `fasilitasKamar`
--

CREATE TABLE `fasilitasKamar` (
  `x` bigint(20) NOT NULL,
  `id` bigint(12) NOT NULL,
  `kamarIcon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitasKamar`
--

INSERT INTO `fasilitasKamar` (`x`, `id`, `kamarIcon`) VALUES
(1, 1, 'meja'),
(2, 1, 'kursi'),
(3, 1, 'rias'),
(4, 1, 'kasur');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitasMandi`
--

CREATE TABLE `fasilitasMandi` (
  `x` bigint(20) NOT NULL,
  `id` bigint(12) NOT NULL,
  `mandiIcon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fasilitasMandi`
--

INSERT INTO `fasilitasMandi` (`x`, `id`, `mandiIcon`) VALUES
(1, 1, 'duduk'),
(2, 1, 'hangat');

-- --------------------------------------------------------

--
-- Table structure for table `fotoFoto`
--

CREATE TABLE `fotoFoto` (
  `x` bigint(20) NOT NULL,
  `id` bigint(20) NOT NULL,
  `namaFoto` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fotoKost`
--

CREATE TABLE `fotoKost` (
  `id` bigint(12) NOT NULL,
  `fotoKT` varchar(255) NOT NULL,
  `fotoKM` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fotoKost`
--

INSERT INTO `fotoKost` (`id`, `fotoKT`, `fotoKM`) VALUES
(1, 'fotoKost/profile_1.jpg', 'fotoKost/header_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kapasitasKost`
--

CREATE TABLE `kapasitasKost` (
  `id_kost` bigint(12) NOT NULL,
  `kapasitas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kapasitasKost`
--

INSERT INTO `kapasitasKost` (`id_kost`, `kapasitas`) VALUES
(1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `kontakKost`
--

CREATE TABLE `kontakKost` (
  `id` bigint(12) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontakKost`
--

INSERT INTO `kontakKost` (`id`, `phone`, `email`) VALUES
(1, '081234567890', 'yayankucayang@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `ratingKost`
--

CREATE TABLE `ratingKost` (
  `id` bigint(12) NOT NULL,
  `kenyamanan` smallint(1) NOT NULL,
  `keamanan` smallint(1) NOT NULL,
  `kebersihan` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratingKost`
--

INSERT INTO `ratingKost` (`id`, `kenyamanan`, `keamanan`, `kebersihan`) VALUES
(1, 3, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `reviewKost`
--

CREATE TABLE `reviewKost` (
  `idKomentar` bigint(20) NOT NULL,
  `idKost` bigint(20) NOT NULL,
  `idUser` bigint(20) NOT NULL,
  `review` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kenyamanan` int(1) NOT NULL,
  `keamanan` int(1) NOT NULL,
  `kebersihan` int(1) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spesifikasiKost`
--

CREATE TABLE `spesifikasiKost` (
  `id` bigint(12) NOT NULL,
  `panjangKamar` smallint(2) NOT NULL,
  `lebarKamar` smallint(2) NOT NULL,
  `air` varchar(255) NOT NULL,
  `listrik` varchar(255) NOT NULL,
  `internet` varchar(255) NOT NULL,
  `malam` varchar(255) NOT NULL,
  `peraturan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spesifikasiKost`
--

INSERT INTO `spesifikasiKost` (`id`, `panjangKamar`, `lebarKamar`, `air`, `listrik`, `internet`, `malam`, `peraturan`) VALUES
(1, 3, 4, 'Termasuk biaya kost', 'Bayar masing-masing', 'Bayar masing-masing', '00:00', 'Jangan membawa lawan jenis ke kostan');

-- --------------------------------------------------------

--
-- Table structure for table `statistikWeb`
--

CREATE TABLE `statistikWeb` (
  `id` int(2) NOT NULL,
  `visitor` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statistikWeb`
--

INSERT INTO `statistikWeb` (`id`, `visitor`) VALUES
(0, 18);

-- --------------------------------------------------------

--
-- Table structure for table `userAdmin`
--

CREATE TABLE `userAdmin` (
  `idAdmin` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userAdmin`
--

INSERT INTO `userAdmin` (`idAdmin`, `username`, `password`) VALUES
(1, '1', '1'),
(2, 'admin', 'q'),
(3, 'ulfah', 'q');

-- --------------------------------------------------------

--
-- Table structure for table `userBiasa`
--

CREATE TABLE `userBiasa` (
  `id` bigint(20) NOT NULL,
  `depan` varchar(50) NOT NULL,
  `belakang` varchar(50) NOT NULL,
  `userBiasa` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namaKost` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userBiasa`
--

INSERT INTO `userBiasa` (`id`, `depan`, `belakang`, `userBiasa`, `email`, `namaKost`, `pass`, `status`) VALUES
(21, 'Daniel', 'Imam Supomo', 'aditya', 'adityarahman032@gmail.com', 'Kost pak yayan', 'qwe', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataKost`
--
ALTER TABLE `dataKost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitasKamar`
--
ALTER TABLE `fasilitasKamar`
  ADD PRIMARY KEY (`x`);

--
-- Indexes for table `fasilitasMandi`
--
ALTER TABLE `fasilitasMandi`
  ADD PRIMARY KEY (`x`);

--
-- Indexes for table `fotoFoto`
--
ALTER TABLE `fotoFoto`
  ADD PRIMARY KEY (`x`);

--
-- Indexes for table `fotoKost`
--
ALTER TABLE `fotoKost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kapasitasKost`
--
ALTER TABLE `kapasitasKost`
  ADD PRIMARY KEY (`id_kost`);

--
-- Indexes for table `kontakKost`
--
ALTER TABLE `kontakKost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratingKost`
--
ALTER TABLE `ratingKost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviewKost`
--
ALTER TABLE `reviewKost`
  ADD PRIMARY KEY (`idKomentar`);

--
-- Indexes for table `spesifikasiKost`
--
ALTER TABLE `spesifikasiKost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userAdmin`
--
ALTER TABLE `userAdmin`
  ADD PRIMARY KEY (`idAdmin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `userBiasa`
--
ALTER TABLE `userBiasa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`userBiasa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitasKamar`
--
ALTER TABLE `fasilitasKamar`
  MODIFY `x` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `fasilitasMandi`
--
ALTER TABLE `fasilitasMandi`
  MODIFY `x` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fotoFoto`
--
ALTER TABLE `fotoFoto`
  MODIFY `x` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reviewKost`
--
ALTER TABLE `reviewKost`
  MODIFY `idKomentar` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userAdmin`
--
ALTER TABLE `userAdmin`
  MODIFY `idAdmin` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `userBiasa`
--
ALTER TABLE `userBiasa`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
