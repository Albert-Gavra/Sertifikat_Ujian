-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2024 at 04:47 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `updated_at`, `created_at`) VALUES
(1, 'Budi Nugroho', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Yuni Sangar', '2024-11-23 09:41:59', '0000-00-00 00:00:00'),
(3, 'Monkey D.luffy', '2024-11-23 09:40:38', '0000-00-00 00:00:00'),
(4, 'testw', '2024-11-23 09:41:16', '2024-11-23 09:07:13'),
(15, 'test2', '2024-11-23 09:31:46', '2024-11-23 09:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis_buku` varchar(255) NOT NULL,
  `tanggalTerbit_buku` date NOT NULL,
  `id_anggota` int DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis_buku`, `tanggalTerbit_buku`, `id_anggota`, `updated_at`, `created_at`) VALUES
(1, 'Harry Potter', 'J.K. Rowling', '2024-11-20', 3, '2024-11-23 09:40:38', NULL),
(2, 'Javascript For Babies', 'Empu Tantular', '2024-11-06', NULL, '2024-11-23 09:41:16', NULL),
(13, 'buku1', 'penulis', '2024-11-22', 15, '2024-11-23 09:31:46', NULL),
(14, 'test', 'test', '2024-11-23', 15, '2024-11-23 09:31:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `buku_kategori`
--

CREATE TABLE `buku_kategori` (
  `id_buku` int NOT NULL,
  `id_kategori` int NOT NULL,
  `updated_at` timestamp NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku_kategori`
--

INSERT INTO `buku_kategori` (`id_buku`, `id_kategori`, `updated_at`, `created_at`) VALUES
(1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, '2024-11-23 04:26:17', '2024-11-23 04:26:17'),
(2, 4, '2024-11-23 04:26:17', '2024-11-23 04:26:17'),
(13, 1, '2024-11-23 03:38:32', '2024-11-23 03:38:32'),
(13, 3, '2024-11-23 03:38:32', '2024-11-23 03:38:32'),
(14, 6, '2024-11-23 09:12:57', '2024-11-23 09:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `updated_at`, `created_at`) VALUES
(1, 'Fiksi', NULL, NULL),
(2, 'Edukasi', NULL, NULL),
(3, 'Politik', NULL, NULL),
(4, 'Pemrograman', NULL, NULL),
(6, 'horror', '2024-11-23 08:39:29', '2024-11-23 08:39:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `anggota` (`nama_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `judul` (`judul_buku`),
  ADD KEY `fky_id_anggota` (`id_anggota`);

--
-- Indexes for table `buku_kategori`
--
ALTER TABLE `buku_kategori`
  ADD PRIMARY KEY (`id_buku`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `kategori` (`nama_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fky_id_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buku_kategori`
--
ALTER TABLE `buku_kategori`
  ADD CONSTRAINT `buku_kategori_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buku_kategori_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
