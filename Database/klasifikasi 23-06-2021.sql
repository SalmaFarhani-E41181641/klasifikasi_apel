-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 01:59 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klasifikasi_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_testing`
--

CREATE TABLE `data_testing` (
  `id_testing` varchar(10) NOT NULL,
  `kelas_testing` varchar(30) NOT NULL,
  `Mean_H` double NOT NULL,
  `Mean_S` double NOT NULL,
  `Mean_I` double NOT NULL,
  `Skewness_H` double NOT NULL,
  `Skewness_S` double NOT NULL,
  `Skewness_I` double NOT NULL,
  `Kurtosis_H` double NOT NULL,
  `Kurtosis_S` double NOT NULL,
  `Kurtosis_I` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_trainning`
--

CREATE TABLE `data_trainning` (
  `id_trainning` varchar(10) NOT NULL,
  `kelas_training` varchar(30) NOT NULL,
  `Mean_H` double NOT NULL,
  `Mean_S` double NOT NULL,
  `Mean_I` double NOT NULL,
  `Skewness_H` double NOT NULL,
  `Skewness_S` double NOT NULL,
  `Skewness_I` double NOT NULL,
  `Kurtosis_H` double NOT NULL,
  `Kurtosis_S` double NOT NULL,
  `Kurtosis_I` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengujian`
--

CREATE TABLE `detail_pengujian` (
  `id_uji` int(11) NOT NULL,
  `id_testing` varchar(10) NOT NULL,
  `id_trainning` varchar(10) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengujian`
--

CREATE TABLE `pengujian` (
  `id_uji` int(11) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `hasil` varchar(30) NOT NULL,
  `tanggal_uji` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` varchar(10) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `id_role` varchar(10) NOT NULL,
  `foto_user` varchar(250) NOT NULL,
  `nama_user` varchar(75) NOT NULL,
  `deskripsi` text NOT NULL,
  `email` varchar(75) NOT NULL,
  `tanggal` date NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_testing`
--
ALTER TABLE `data_testing`
  ADD PRIMARY KEY (`id_testing`);

--
-- Indexes for table `data_trainning`
--
ALTER TABLE `data_trainning`
  ADD PRIMARY KEY (`id_trainning`);

--
-- Indexes for table `detail_pengujian`
--
ALTER TABLE `detail_pengujian`
  ADD KEY `id_testing` (`id_testing`,`id_trainning`),
  ADD KEY `id_trainning` (`id_trainning`),
  ADD KEY `id_uji` (`id_uji`);

--
-- Indexes for table `pengujian`
--
ALTER TABLE `pengujian`
  ADD PRIMARY KEY (`id_uji`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pengujian`
--
ALTER TABLE `detail_pengujian`
  ADD CONSTRAINT `detail_pengujian_ibfk_1` FOREIGN KEY (`id_trainning`) REFERENCES `data_trainning` (`id_trainning`),
  ADD CONSTRAINT `detail_pengujian_ibfk_2` FOREIGN KEY (`id_testing`) REFERENCES `data_testing` (`id_testing`),
  ADD CONSTRAINT `detail_pengujian_ibfk_3` FOREIGN KEY (`id_uji`) REFERENCES `pengujian` (`id_uji`);

--
-- Constraints for table `pengujian`
--
ALTER TABLE `pengujian`
  ADD CONSTRAINT `pengujian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
