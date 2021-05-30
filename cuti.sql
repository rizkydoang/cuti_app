-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 04:17 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `bagian_id` int(11) NOT NULL,
  `nama_bagian` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`bagian_id`, `nama_bagian`) VALUES
(1, 'Teller'),
(2, 'CSO');

-- --------------------------------------------------------

--
-- Table structure for table `form_cuti`
--

CREATE TABLE `form_cuti` (
  `cuti_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 1,
  `mulai_cuti` date NOT NULL,
  `akhir_cuti` date NOT NULL,
  `jumlah_cuti` int(2) NOT NULL,
  `jeniscuti_id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status_id` int(1) NOT NULL DEFAULT 2,
  `is_cuti` enum('F','T','','') NOT NULL DEFAULT 'F'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `descript` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `nama_jabatan`, `descript`) VALUES
(1, 'Pimpinan', 'Pimpinan Perusahaan'),
(2, 'Kabag', 'Kepala bagian perusaan'),
(3, 'Karyawan', 'Hanya karyawan yang meneriman perintah dari atasan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cuti`
--

CREATE TABLE `jenis_cuti` (
  `jeniscuti_id` int(11) NOT NULL,
  `nama_cuti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_cuti`
--

INSERT INTO `jenis_cuti` (`jeniscuti_id`, `nama_cuti`) VALUES
(1, 'Cuti Tahunan'),
(2, 'Cuti Sakit'),
(5, 'Cuti Bersama'),
(7, 'Cuti Bulanan'),
(9, 'Cuti Bersama Keluarga');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(1, 'Menunggu Pesetujuan Kabag'),
(2, 'Menunggu Persetujuan Pimpinan'),
(3, 'Disetujui'),
(4, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `nama_kary` varchar(100) NOT NULL,
  `nip` int(11) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `password` varchar(100) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `bagian_id` int(11) DEFAULT NULL,
  `sisa_cuti` int(2) NOT NULL DEFAULT 12,
  `status` enum('aktif','cuti','wait') NOT NULL DEFAULT 'aktif',
  `is_active` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama_kary`, `nip`, `tgl_lahir`, `password`, `tgl_masuk`, `jabatan_id`, `bagian_id`, `sisa_cuti`, `status`, `is_active`) VALUES
(1, 'M. Rizky S. Kom', 512345, '2000-04-17', '512345', '2010-04-17', 1, NULL, 8, 'aktif', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`bagian_id`);

--
-- Indexes for table `form_cuti`
--
ALTER TABLE `form_cuti`
  ADD PRIMARY KEY (`cuti_id`),
  ADD KEY `fk_user_id_form_cuti` (`user_id`),
  ADD KEY `fk_jeniscuti_id_form_cuti` (`jeniscuti_id`),
  ADD KEY `fk_status_id_form_cuti` (`status_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  ADD PRIMARY KEY (`jeniscuti_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD KEY `fk_jabatan_id_users` (`jabatan_id`) USING BTREE,
  ADD KEY `fk_bagian_id_users` (`bagian_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `bagian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `form_cuti`
--
ALTER TABLE `form_cuti`
  MODIFY `cuti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  MODIFY `jeniscuti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_cuti`
--
ALTER TABLE `form_cuti`
  ADD CONSTRAINT `fk_jeniscuti_id_form_cuti` FOREIGN KEY (`jeniscuti_id`) REFERENCES `jenis_cuti` (`jeniscuti_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_status_id_form_cuti` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id_form_cuti` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_bagian_id_users` FOREIGN KEY (`bagian_id`) REFERENCES `bagian` (`bagian_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jabatan_id_users` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
