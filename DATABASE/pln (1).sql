-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2019 at 11:14 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pln`
--

-- --------------------------------------------------------

--
-- Table structure for table `pt`
--

CREATE TABLE `pt` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pt`
--

INSERT INTO `pt` (`id`, `nama`) VALUES
(1, 'Gudang Garam'),
(2, 'Perangkat Agak Keras');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nama_pt` varchar(255) NOT NULL,
  `kon_awal` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kon_akhir` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`id`, `judul`, `nama_pt`, `kon_awal`, `kon_akhir`, `file`, `status`) VALUES
(4, 'sdaa', 'Gudang Garam', '2019-09-06', '2019-09-15', 'Aip.pptx', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT 'user',
  `active` varchar(255) NOT NULL DEFAULT 'deactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `active`) VALUES
(7, 'Admin', 'superadmin@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'super admin', 'active'),
(8, 'user', 'user@gmail.com', '03c7c0ace395d80182db07ae2c30f034', 'user', 'active'),
(9, 'perusahaan', 'perusahaan@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'perusahaan', 'active'),
(10, 'admin', 'admin@gmail.com', '0cc175b9c0f1b6a831c399e269772661', 'admin', 'active'),
(11, 'rendy', 'rendy@gmail.com', '88ad32a14f7f7964d03dad411ffcc59b', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pt`
--
ALTER TABLE `pt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pt`
--
ALTER TABLE `pt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
