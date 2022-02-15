-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 02:16 PM
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
-- Table structure for table `caradaftar`
--

CREATE TABLE `caradaftar` (
  `id_cara` int(11) NOT NULL,
  `step1` varchar(1000) NOT NULL,
  `step2` varchar(1000) NOT NULL,
  `step3` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `caradaftar`
--

INSERT INTO `caradaftar` (`id_cara`, `step1`, `step2`, `step3`) VALUES
(1, 'Untuk melakukan pendaftaran pasien rawat jalan secara online harap melakukan login terlebih dahulu, bagi yang belum mempunyai aku di website ini harap registrasi terlebih dahulu. seletah melakukan registrasi pasien atau wali pasien bisa masuk ke halaman panedaftaran online.', 'Setelah masuk ke halaman pendaftaran online pasien atau wali pasien memilih berdasarkan pasien baru atau pasien lama yang sebelumnya pernah memeriksakan kesehatannya di rumah sakit Budiasih. Setelah itu masuk ke halaman form pendaftaran, isi data secara lengkap. setelah selesai klik tombol daftar.', 'Pasien atau wali pasien mendapat kode pendaftaran dan data yang telah diinput ke dalam file pdf. file bisa di download untuk diberikan kepada petugas pendaftaran sebagai bukti pendaftaran. bagi yang menggunakan bpjs atau asuransi diharap membawa berkas-berkas yang sudah tertera pada file tersebut.');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(3) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `id_poli` int(3) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `id_poli`, `status`) VALUES
(1, 'dr. Suryono Hanung, Sp.A', 2, 1),
(2, 'dr. Dion Wiyoko, Sp.A', 2, 1),
(3, 'dr. Adi Hapsah', 1, 1),
(4, 'dr. Intan Rahmawati', 1, 1),
(5, 'drg. Gunawan Prasetya', 3, 1),
(6, 'drg. Lintang Mulan', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id` int(11) NOT NULL,
  `anak` varchar(1000) NOT NULL,
  `gigi` varchar(1000) NOT NULL,
  `umum` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id`, `anak`, `gigi`, `umum`) VALUES
(1, 'Pendaftaran dibuka', 'Pendaftaran sudah dibuka', 'Pendaftaran dibuka');

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
(2, 'dr. Suryono Hanung, Sp.A', 'Anak', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00'),
(3, 'dr. Adi Hapsah', 'Umum', '10:00 - 14:00', '10:00 - 14:00', '10:00 - 14:00', '10:00 - 14:00', '10:00 - 14:00', '10:00 - 14:00'),
(4, 'dr. Intan Rahmawati', 'Umum', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00'),
(5, 'dr. Dion Wiyoko, Sp.A', 'Anak', '10.00 - 14.00', '10.00 - 14.00', '10.00 - 14.00', '10.00 - 14.00', '10.00 - 14.00', '10.00 - 14.00'),
(6, 'drg. Gunawan Prasetya', 'Gigi', '10:00 - 14:00', '10:00 - 14:00', '10:00 - 14:00', '10:00 - 14:00', '10.00 - 14.00', '10.00 - 14.00'),
(7, 'drg. Lintang Mulan', 'Gigi', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00', '14:00 - 17:00');

-- --------------------------------------------------------

--
-- Table structure for table `jam`
--

CREATE TABLE `jam` (
  `id_jam` int(5) NOT NULL,
  `jam` varchar(25) NOT NULL,
  `id_poli` int(3) NOT NULL,
  `id_dokter` int(5) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam`
--

INSERT INTO `jam` (`id_jam`, `jam`, `id_poli`, `id_dokter`, `status`) VALUES
(1, '10:00 - 14:00', 1, 3, 1),
(2, '14:00 - 17:00', 1, 4, 1),
(3, '10:00 - 14:00', 2, 2, 1),
(4, '14:00 - 17:00', 2, 1, 1),
(5, '10:00 - 14:00', 3, 5, 1),
(6, '14:00 - 17:00', 3, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kode_pendaftaran` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
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
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kode_pendaftaran`, `username`, `tgl_daftar`, `id_poli`, `id_dokter`, `id_jam`, `jenis_pembayaran`, `no_rm`, `nama`, `jk`, `tlahir`, `nohp`, `ttl`, `pekerjaan`, `alamat`, `wnama`, `wjk`, `walamat`, `wnohp`, `status`) VALUES
(60, 'yohan', '2019-08-06', 3, 5, 5, 'Bpjs', '87678', 'Yohan', 'pria', 'manado', '087777591407', '2009-02-13', 'Pelajar', 'Pandeglang', 'Julaika', 'wanita', 'Pandeglang', '087777591407', 'Terdaftar'),
(66, 'saka', '2019-08-09', 2, 2, 3, 'Bpjs', '09878', 'destria rahmawati', 'wanita', 'Pandeglang', '08987678765', '1996-04-30', 'mahasiswi', 'Pandeglang', 'Tukiman', 'pria', 'Pandeglang', '087772601346', 'Terdaftar'),
(83, 'ryu', '2019-08-14', 3, 6, 6, 'Umum', '', 'amelia', 'wanita', 'manado', '08987678765', '1998-03-05', 'mahasiswi', 'pandeglang', 'ari', 'wanita', 'pandegalang', '08767895454', 'Terdaftar'),
(85, 'ryu', '2019-08-19', 3, 5, 5, 'Asuransi', '', 'paul', 'pria', 'Seoul', '08987678765', '1993-03-10', 'karyawan swasta', 'Jakarta', 'yohan', 'pria', 'Jakarta', '08767895454', 'Terdaftar'),
(95, 'saka', '2019-08-19', 2, 2, 3, 'Umum', '46578', 'saka arkan', 'pria', 'serang', '085643458765', '2012-03-07', 'Pelajar', 'Serang', 'Ari', 'pria', 'Serang', '085643458765', 'Terdaftar'),
(101, 'ryu', '2019-08-29', 2, 2, 3, 'Asuransi', '87678', 'Yohan', 'pria', 'manado', '087777591407', '2009-02-13', 'Pelajar', 'Pandeglang', 'Julaika', 'wanita', 'Pandeglang', '087777591407', 'Terdaftar'),
(102, 'yohan', '2019-08-27', 1, 4, 2, 'Bpjs', '87678', 'Yohan', 'pria', 'manado', '087777591407', '2009-02-13', 'Pelajar', 'Pandeglang', 'Julaika', 'wanita', 'Pandeglang', '087777591407', 'Terdaftar'),
(103, 'ryu', '2019-08-30', 3, 5, 5, 'Bpjs', '87678', 'Yohan', 'pria', 'manado', '087777591407', '2009-02-13', 'Pelajar', 'Pandeglang', 'Julaika', 'wanita', 'Pandeglang', '087777591407', 'Terdaftar'),
(104, 'ryu', '2019-09-05', 3, 6, 6, 'Asuransi', '09878', 'destria rahmawati', 'wanita', 'Pandeglang', '08987678765', '1996-04-30', 'mahasiswi', 'Pandeglang', 'Tukiman', 'pria', 'Pandeglang', '087772601346', 'Terdaftar'),
(105, 'destria', '2019-09-12', 2, 2, 3, 'Bpjs', '09878', 'destria rahmawati', 'wanita', 'Pandeglang', '08987678765', '1996-04-30', 'mahasiswi', 'Pandeglang', 'Tukiman', 'pria', 'Pandeglang', '087772601346', 'Terdaftar'),
(106, 'saka', '2019-09-15', 2, 2, 3, 'Bpjs', '46578', 'saka arkan', 'pria', 'serang', '085643458765', '2012-03-07', 'Pelajar', 'Serang', 'Ari', 'pria', 'Serang', '085643458765', 'Proses');

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
(2, 'Bpjs'),
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
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `level` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `level`) VALUES
(13, 'iin', '$2y$10$CNel5bDwTeQDyB4c4KHp../10OiMHn.zSzJlLq/hcC1wOlx810ciu', 'iin kurniawati', 'admin'),
(17, 'ryu', '$2y$10$Kwv6OfjI/ZpAEMRgXu3LOOCdUXN2NBU88hOlJl9t7IAQJhqO4bqFi', 'ryu jung yeol', 'pasien'),
(18, 'minho', '$2y$10$qxpm4a905fBMPM93tUh4gO7k30vkVoN/vaRmqbRbq.Ff1w96OvFCm', 'lee minho', 'pasien'),
(19, 'admin', '$2y$10$KdSdNo.0Cmkq8d2D/lqxPetWPq4Eu..8iRW/cwO00gT66ifC2CA5O', 'admin pendaftaran', 'admin'),
(30, 'saka', '$2y$10$RN1dorN.D3Ioq4zNrM8dcO94WKiPBc1Uz4.B0TyCoA54TtXV6zqzm', 'saka arkan wiratama', 'pasien'),
(31, 'jung hyun', '$2y$10$zIzGH8O7o73m1IDeelvN0OU5rO1rhw8CqEtxQ4xSFs92dybTCvb0i', 'kim jung hyun', 'pasien'),
(33, 'yohan', '$2y$10$J0Di/WTGzMLfPIA5XaCSOeEtuTGaTrz4I17azDFcnLKC/tHAy4BQy', 'kim yohan', 'pasien'),
(34, 'inkuwie', '$2y$10$AGAJwSJPAqgQh5dQqu8AvucD6oxCItKNdSTOAp01NISFhD977OgCC', 'noona inkuwie', 'pasien'),
(37, 'a', '$2y$10$sOv.N4DpBhnfLbjw92m3ceeb5NPyR39JPbQFvG4BQ7/QvZ267/Id2', 'a', 'pasien'),
(38, 'destria', '$2y$10$9d84rh57geY7jUTieinb7.ucfpDTX0Yv7.sHi91QywIev3rE0BM2G', 'destria rahmawati', 'pasien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caradaftar`
--
ALTER TABLE `caradaftar`
  ADD PRIMARY KEY (`id_cara`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `dokter_ibfk_1` (`id_poli`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `jam_ibfk_2` (`id_dokter`),
  ADD KEY `jam_ibfk_3` (`id_poli`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kode_pendaftaran`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`),
  ADD KEY `id_jam` (`id_jam`),
  ADD KEY `id_user` (`username`);

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
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caradaftar`
--
ALTER TABLE `caradaftar`
  MODIFY `id_cara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jam`
--
ALTER TABLE `jam`
  MODIFY `id_jam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `kode_pendaftaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `poliklinik` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jam`
--
ALTER TABLE `jam`
  ADD CONSTRAINT `jam_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jam_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `poliklinik` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE;

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
