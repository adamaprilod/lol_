-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 06:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_tp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` varchar(5) NOT NULL,
  `nama_agama` varchar(15) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `nama_agama`, `tgl_input`, `user_input`, `tgl_update`, `user_update`, `id_user`) VALUES
('A-001', 'Islam', '2023-09-13', 'Adam ', '2023-09-13', 'Adam ', 18),
('A-002', 'Kristen ', '2023-09-13', 'Adam ', '2023-09-13', 'Adam ', 18),
('A-003', 'Katholik', '2023-09-13', 'Adam ', '2023-09-14', 'Adam ', 18),
('A-004', 'Hindu', '2023-09-13', 'Adam', '0000-00-00', '', 18),
('A-005', 'Budha', '2023-09-13', 'Adam', '0000-00-00', '', 18),
('A-006', 'Konghucu', '2023-09-13', 'Adam ', '0000-00-00', '', 18);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` varchar(5) NOT NULL,
  `nama_jenjang` varchar(5) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(15) DEFAULT NULL,
  `id_jenjang` varchar(5) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kewarganegaraan`
--

CREATE TABLE `kewarganegaraan` (
  `id_negara` varchar(5) NOT NULL,
  `nama_negara` varchar(15) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kewarganegaraan`
--

INSERT INTO `kewarganegaraan` (`id_negara`, `nama_negara`, `tgl_input`, `user_input`, `tgl_update`, `user_update`, `id_user`) VALUES
('N-001', 'Indonesia', '2023-09-13', 'Adam', '2023-09-14', 'Adam', 18),
('N-002', 'Jepang', '2023-09-14', 'Adam', '2023-09-14', 'Adam', 18);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `NIS` varchar(25) NOT NULL,
  `nama_siswa` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(15) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `id_negara` varchar(5) DEFAULT NULL,
  `id_agama` varchar(5) DEFAULT NULL,
  `id_jurusan` varchar(5) DEFAULT NULL,
  `tgl_input` datetime DEFAULT NULL,
  `user_input` varchar(10) DEFAULT NULL,
  `tgl_update` datetime DEFAULT NULL,
  `user_update` varchar(10) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `hak_akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `hak_akses`) VALUES
(18, 'adamaprilod', '$2y$10$EgbMnfa/MuEWR4uvRWK2HuSVbS.abLE9N38AWtkpLu8NlLLdHdMmO', 'Adam Aprilod Zulfikar', 'adamaprilod@gmail.com', 'admin'),
(32, 'op', '$2y$10$r1mDYspfCJnaMTtdvdD0SuwghvnnYVMdJSUW7gSVj2SYvyqfwct5W', 'Operator', 'operpower@gmail.com', 'operator'),
(34, 'admin', '$2y$10$MNft0896nC1oK3wpLq7q2.0T0CUOjbJMyASl.h9zQF32rHrGm0AZq', 'MIMIN GANTENG', 'miminganteng@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `fk_jenjang` (`id_jenjang`),
  ADD KEY `fk_user3` (`id_user`);

--
-- Indexes for table `kewarganegaraan`
--
ALTER TABLE `kewarganegaraan`
  ADD PRIMARY KEY (`id_negara`),
  ADD KEY `fk_user2` (`id_user`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`NIS`),
  ADD KEY `fk_agama` (`id_agama`),
  ADD KEY `fk_jurusan` (`id_jurusan`),
  ADD KEY `fk_kewarganegaraan` (`id_negara`),
  ADD KEY `fk_user4` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agama`
--
ALTER TABLE `agama`
  ADD CONSTRAINT `agama_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`);

--
-- Constraints for table `kewarganegaraan`
--
ALTER TABLE `kewarganegaraan`
  ADD CONSTRAINT `kewarganegaraan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_negara`) REFERENCES `kewarganegaraan` (`id_negara`),
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;