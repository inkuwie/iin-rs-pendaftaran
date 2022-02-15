-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2019 at 06:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pendaftaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(3) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `id_poli` int(3) NOT NULL,
  `id_jam` int(5) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `id_poli`, `id_jam`, `status`) VALUES
(1, 'Dr. Suryono Hanung, Sp.A', 2, 2, 1),
(2, 'Dr. Dion Wiyoko, Sp.A', 2, 1, 1),
(3, 'Dr. Andi Hasyim', 1, 1, 1),
(4, 'Dr. Intan Rahmawati', 1, 2, 1),
(5, 'Drg. Gunawan Prasetya', 3, 1, 1),
(6, 'Drg. Lintang Mulan', 3, 2, 1),
(13, 'nu', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `dokter` varchar(100) NOT NULL,
  `poli` varchar(50) NOT NULL,
  `senin` varchar(50) NOT NULL,
  `selasa` varchar(50) NOT NULL,
  `rabu` varchar(50) NOT NULL,
  `kamis` varchar(50) NOT NULL,
  `jumat` varchar(50) NOT NULL,
  `sabtu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `dokter`, `poli`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`, `sabtu`) VALUES
(2, 'Dr. Suryono Hanung, Sp.A', 'Anak', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00', '09:00 - 11.00', '09.00 - 12.00'),
(3, 'Dr. Andi Hasyim', 'Umum', '10:00 - 14:00', '10:00 - 14:00', '10:00 - 14:00', '10:00 - 14:00', '14:00 - 17:00', '13:00 - 17:00'),
(4, 'Dr. Intan Rahmawati', 'Umum', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00', '09:00 - 11.00', '09:00 - 12.00'),
(5, 'Dr. Dion Wiyoko, Sp.A', 'Anak', '10.00 - 14.00', '10.00 - 14.00', '10.00 - 14.00', '10.00 - 14.00', '14.00 - 17.00', '13.00 - 17.00'),
(6, '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id_jam` int(5) NOT NULL,
  `kode_jam` char(5) NOT NULL,
  `jam` varchar(25) NOT NULL,
  `id_poli` int(5) NOT NULL,
  `id_dokter` int(5) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `kode_jam`, `jam`, `id_poli`, `id_dokter`, `status`) VALUES
(1, 'J01', '10:00 - 14:00', 1, 3, 1),
(2, 'J02', '14:00 - 17:00', 1, 4, 1),
(3, 'J01', '10:00 - 14:00', 2, 2, 1),
(4, 'J02', '14:00 - 17:00', 2, 1, 1),
(5, 'J01', '10:00 - 14:00', 3, 5, 1),
(6, 'J02', '14:00 - 17:00', 3, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kode_pendaftaran` int(10) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `id_poli` int(5) NOT NULL,
  `id_dokter` int(3) NOT NULL,
  `id_jam` int(5) NOT NULL,
  `jenis_pembayaran` varchar(30) NOT NULL,
  `no_rm` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(20) NOT NULL,
  `tlahir` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `ttl` date NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `wnama` varchar(50) NOT NULL,
  `wjk` varchar(10) NOT NULL,
  `walamat` varchar(500) NOT NULL,
  `wnohp` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kode_pendaftaran`, `tgl_daftar`, `id_poli`, `id_dokter`, `id_jam`, `jenis_pembayaran`, `no_rm`, `nama`, `jk`, `tlahir`, `nohp`, `ttl`, `pekerjaan`, `alamat`, `wnama`, `wjk`, `walamat`, `wnohp`, `status`) VALUES
(21, '2019-07-22', 2, 2, 1, 'bpjs', '87678', 'yunseong', '', '', '08987678765', '1996-03-13', '', '', '', '', '', '', 'proses'),
(22, '2019-07-22', 1, 4, 2, 'bpjs', '87678', 'yunseong', '', '', '08987678765', '1996-03-13', '', '', '', '', '', '', 'proses'),
(23, '2019-07-22', 3, 5, 1, 'bpjs', '09878', 'yunseong', '', '', '087772601346', '1995-03-09', '', '', '', '', '', '', 'proses'),
(24, '2019-07-22', 2, 1, 2, 'bpjs', '', 'sakha arkan', 'pria', 'manado', '08656765432', '2005-03-09', 'pelajar', 'serang', 'ari', 'pria', 'serang', '08767895454', 'terdaftar'),
(25, '2019-07-23', 1, 4, 2, 'Asuransi', '09878', 'yunseong', '', '', '087772601346', '2001-03-14', '', '', '', '', '', '', 'terdaftar');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(5) NOT NULL,
  `jenis_pembayaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `jenis_pembayaran`) VALUES
(1, 'Umum'),
(2, 'bpjs'),
(3, 'Asuransi');

-- --------------------------------------------------------

--
-- Table structure for table `poliklinik`
--

CREATE TABLE `poliklinik` (
  `id_poli` int(3) NOT NULL,
  `nama_poli` varchar(30) NOT NULL,
  `status` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poliklinik`
--

INSERT INTO `poliklinik` (`id_poli`, `nama_poli`, `status`) VALUES
(1, 'Umum', 1),
(2, 'Anak', 1),
(3, 'Gigi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`) VALUES
(13, 'iin', '$2y$10$CNel5bDwTeQDyB4c4KHp../10OiMHn.zSzJlLq/hcC1wOlx810ciu', 'inkuwie@yahoo.co.id', 'admin'),
(17, 'ryu', '$2y$10$Kwv6OfjI/ZpAEMRgXu3LOOCdUXN2NBU88hOlJl9t7IAQJhqO4bqFi', 'inkuwie@yahoo.co.id', 'pasien'),
(18, 'minho', '$2y$10$qxpm4a905fBMPM93tUh4gO7k30vkVoN/vaRmqbRbq.Ff1w96OvFCm', 'inkuwie@yahoo.co.id', 'pasien'),
(19, 'admin', '$2y$10$KdSdNo.0Cmkq8d2D/lqxPetWPq4Eu..8iRW/cwO00gT66ifC2CA5O', 'admpendaftaran@gmail.com', 'admin'),
(28, 'dedi', '$2y$10$g89DndH7h/Y/FmKSEuqiQOCwiIvqDv4bgkxPKFGJ6mXx3x0ftR8Pi', 'dest', 'pasien'),
(29, 'dikta', '$2y$10$xwnZJKkafWd7/tHRzQme7eafO//qb8gQCNqGQk260uXFoGkWxBLlG', 'dikta@yahoo.co.id', 'pasien'),
(30, 'saka', '$2y$10$RN1dorN.D3Ioq4zNrM8dcO94WKiPBc1Uz4.B0TyCoA54TtXV6zqzm', 'firwa@gmsil.com', 'pasien'),
(31, 'jung hyun', '$2y$10$zIzGH8O7o73m1IDeelvN0OU5rO1rhw8CqEtxQ4xSFs92dybTCvb0i', 'firwa@gmsil.com', 'pasien'),
(32, 'koko', '$2y$10$122jAlethgjUgM2J4SW50OeBkLjzApT.qEUCc4fGolofv9QHsM3Au', 'koko@gmail.com', 'pasien'),
(33, 'yohan', '$2y$10$J0Di/WTGzMLfPIA5XaCSOeEtuTGaTrz4I17azDFcnLKC/tHAy4BQy', 'yohan@gmail.com', 'pasien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_jam` (`id_jam`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jam`
--
ALTER TABLE `jam`
  ADD PRIMARY KEY (`id_jam`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kode_pendaftaran`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_jam` (`id_jam`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `poliklinik`
--
ALTER TABLE `poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `kode_pendaftaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `poliklinik`
--
ALTER TABLE `poliklinik`
  MODIFY `id_poli` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_2` FOREIGN KEY (`id_poli`) REFERENCES `poliklinik` (`id_poli`),
  ADD CONSTRAINT `dokter_ibfk_3` FOREIGN KEY (`id_jam`) REFERENCES `jam` (`id_jam`);

--
-- Constraints for table `jam`
--
ALTER TABLE `jam`
  ADD CONSTRAINT `jam_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poliklinik` (`id_poli`),
  ADD CONSTRAINT `jam_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`);

--
-- Constraints for table `pasien`
--
ALTER TABLE `pasien`
  ADD CONSTRAINT `pasien_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`),
  ADD CONSTRAINT `pasien_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `poliklinik` (`id_poli`),
  ADD CONSTRAINT `pasien_ibfk_4` FOREIGN KEY (`id_jam`) REFERENCES `jam` (`id_jam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
