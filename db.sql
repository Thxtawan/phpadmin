-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql309.infinityfree.com
-- Generation Time: Sep 09, 2026 at 07:27 AM
-- Server version: 11.4.13-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_42232190_work_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('superadmin','admin') NOT NULL,
  `last_login` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `creat_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `username`, `password`, `status`, `last_login`, `updated_at`, `creat_at`) VALUES
(1, 'Super', 'User 1', 'test', '$2y$10$MAbdsXHJO8H3FJ2UUC4pOe0P4PwfDiG3tk35rWzzrPhDMcS6Tb7GK', 'superadmin', '2026-09-09 14:57:01', '2026-09-09 14:32:35', '2026-09-09 14:32:35'),
(2, 'Super', 'User 2', 'superadmin', '$2y$10$MAbdsXHJO8H3FJ2UUC4pOe0P4PwfDiG3tk35rWzzrPhDMcS6Tb7GK', 'superadmin', '2026-09-09 14:32:35', '2026-09-09 14:32:35', '2026-09-09 14:32:35'),
(3, 'Admin', 'User 1', 'admin1', '$2y$10$MAbdsXHJO8H3FJ2UUC4pOe0P4PwfDiG3tk35rWzzrPhDMcS6Tb7GK', 'admin', '2026-09-09 14:32:35', '2026-09-09 14:32:35', '2026-09-09 14:32:35'),
(4, 'Admin', 'User 2', 'admin2', '$2y$10$MAbdsXHJO8H3FJ2UUC4pOe0P4PwfDiG3tk35rWzzrPhDMcS6Tb7GK', 'admin', '2026-09-09 14:32:35', '2026-09-09 14:32:35', '2026-09-09 14:32:35'),


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
