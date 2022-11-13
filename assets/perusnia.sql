-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2022 at 06:10 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perusnia`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id_book` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `kode_buku` varchar(25) NOT NULL,
  `publication_date` date NOT NULL,
  `id_users` int(11) NOT NULL,
  `author` varchar(25) NOT NULL,
  `cover` varchar(25) NOT NULL,
  `file_buku` varchar(255) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id_book`, `judul`, `description`, `kode_buku`, `publication_date`, `id_users`, `author`, `cover`, `file_buku`, `harga`, `payment_id`, `created_at`, `updated_at`) VALUES
(5, 'JURNAL IMPLEMENTASI PROSES KOMUNIKASI WIRELESS BER', '<p><strong>jurnal </strong>tentang pengambangan <strong>perangkat luna</strong>k IMPLEMENTASI PROSES KOMUNIKASI WIRELESS BERBASIS <strong><em>DEKSTOP</em></strong><em> </em>UNTUK MENDUKUNG PROSES PEMBELAJARAN</p>', 'PKEY:E29D7C63', '2022-11-11', 2, 'ach fasihul lisan', '636e533a48ef7.png', '636e533a48f00.pdf', 250000, 0, '2022-11-11 13:50:50', '2022-11-11 20:50:50'),
(6, 'Challenges and Opportunities in Intelligent System', '<p>Challenges and Opportunities in Intelligent System Development Using <em>Fuzzy </em>Inference System for <em>Underwater Communication</em></p>', 'PKEY:638BBED6', '2022-12-31', 2, 'ach fasihul lisan', '636e53e13b3eb.png', '636e53e13b3f1.pdf', 250000, 0, '2022-11-11 13:53:37', '2022-11-11 20:53:37'),
(7, 'Analisis Kinerja VHF-A/G Tower/ADC dengan VHF-A/G ', '<p>Analisis Kinerja VHF-A/G Tower/ADC dengan VHF-A/G APP di Bandar Udara Husein Sastranegara Bandung</p>', 'PKEY:E067AD41', '2022-11-30', 2, 'saya', '636e54b98adb0.png', '636e54b98adb5.pdf', 50000, 0, '2022-11-11 13:57:13', '2022-11-11 21:44:39'),
(8, 'buku ilahi', '<p>buku ilahi</p>', 'PKEY:5C049CD8', '2022-11-11', 2, 'lisan', '636e5db7ed372.png', '636e5db7ed375.pdf', 0, 0, '2022-11-11 14:35:35', '2022-11-11 21:35:35'),
(9, 'buku fasih', '<p>ini bukunya <strong>fasih</strong></p>', 'PKEY:BF08FA94', '2022-11-13', 2, 'ach fasihul lisan', '63707abe5de86.jpg', '63707abe5e093.pdf', 50000, 0, '2022-11-13 05:03:58', '2022-11-13 12:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'full access', '2022-11-05 01:51:25', '2022-11-05 01:51:25'),
(2, 'users', 'shell/buy book and read a book', '2022-11-05 01:51:25', '2022-11-05 01:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_level` int(15) NOT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` datetime(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `id_user_detile` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `email`, `password`, `id_level`, `created_at`, `updated_at`, `id_user_detile`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$WCbCXATIgX3V1MTX5tR8t.ZVDQdvqW2WB4QyICSgfyMvzIPFVNIg6?>', 1, '0000-00-00 00:00:00.000000', '2022-11-07 13:19:58.113102', 1),
(2, 'fasih50', 'fasihullisan091966@gmail.com', '$2y$10$XOTXlYu.4s7BJ3.uUC7yhue2s0ulB.URfRF40S.F1jrfnxZSaNQZq?>', 2, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_detile`
--

CREATE TABLE `user_detile` (
  `id_user_detile` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `no_telepon` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `negara` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detile`
--

INSERT INTO `user_detile` (`id_user_detile`, `nama_depan`, `nama_belakang`, `tanggal_lahir`, `jenis_kelamin`, `no_telepon`, `alamat`, `negara`, `kota`, `created_at`, `updated_at`) VALUES
(1, 'ach. fasihul', 'lisan', '2022-11-04 19:51:36', 'laki-laki', '085336076077', 'jl kh moch kholil gg 3e', 'indonesia', 'bangkalan', '2022-11-04 18:52:27', '2022-11-04 18:52:27'),
(2, 'admin', NULL, '2022-11-04 20:01:16', 'laki-laki', NULL, NULL, 'indonesia', 'bangkalan', '2022-11-04 19:01:38', '2022-11-04 19:01:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_book`),
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD KEY `level_relation` (`id_level`),
  ADD KEY `user_detile_relation` (`id_user_detile`);

--
-- Indexes for table `user_detile`
--
ALTER TABLE `user_detile`
  ADD PRIMARY KEY (`id_user_detile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id_book` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_detile`
--
ALTER TABLE `user_detile`
  MODIFY `id_user_detile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `level_relation` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`),
  ADD CONSTRAINT `user_detile_relation` FOREIGN KEY (`id_user_detile`) REFERENCES `user_detile` (`id_user_detile`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
