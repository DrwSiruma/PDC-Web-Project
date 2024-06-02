-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2024 at 05:33 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

CREATE TABLE `tbl_activity` (
  `id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `activity` varchar(2000) NOT NULL,
  `date_posted` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_outlet`
--

CREATE TABLE `tbl_outlet` (
  `id` int(100) NOT NULL,
  `store_name` varchar(100) DEFAULT NULL,
  `short_name` varchar(100) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `status` enum('Active','Closed') NOT NULL,
  `updated` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `created` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_outlet`
--

INSERT INTO `tbl_outlet` (`id`, `store_name`, `short_name`, `address`, `status`, `updated`, `created`, `image_path`) VALUES
(1, 'Dunkin\' Alabang Town Center', 'ATC1', 'Alabang Town Center - Ground Level, Alabang Town Center, Alabang-Zapote Road, Alabang, Muntinlupa, Metro Manila', 'Active', '2024-06-02 22:45:21.000000', '2024-06-02 22:45:21.000000', NULL),
(2, 'Festival', 'FSI', 'Lower Ground Level, Festival Supermall, Corporate Ave. corner Civic Drive, Filinvest Corporate City, Alabang,\r\nMuntinlupa, Metro Manila', 'Active', '2024-06-02 22:52:39.000000', '2024-06-02 22:52:39.000000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','support','dev','marketing','hr','outlet') NOT NULL,
  `branch` varchar(100) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created` datetime(6) DEFAULT CURRENT_TIMESTAMP(6),
  `updated` datetime(6) DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `role`, `branch`, `status`, `created`, `updated`) VALUES
(1, 'panda_admin', '$2y$10$aGvKw/BZNQQjkQVBlHdjHux3GGYPZsPWRDlmq5dBF09u0uq5UeVEi', 'admin', NULL, 'Active', '2024-05-28 09:56:25.291360', '2024-05-28 09:56:25.291360'),
(2, 'panda_dev', '$2y$10$eJ9Lu.WIdHdWUl6tww/.HuS7NkWACLfhBaAHPioNnXXRBlAAWBaya', 'dev', '', 'Active', '2024-05-28 11:00:32.708752', '2024-06-02 23:18:56.000000'),
(3, 'panda_support', '$2y$10$9CNWe.e9CEQHQHIZorhVNO3P086Eagu8rjsAEtHZyA05VoLGYwsZu', 'support', NULL, 'Active', '2024-06-02 12:39:12.719703', '2024-06-02 12:39:12.719703'),
(4, 'dunkin_festival', '$2y$10$TliaVHzDCVKY0msYkeov4.Od..kqnbVSO5PCgseu0r8deo4hl2jJO', 'outlet', 'FSI', 'Active', '2024-06-02 23:23:40.270748', '2024-06-02 23:25:04.000000'),
(5, 'dunkin_atc', '$2y$10$tDJrz.kE4jWIHxDjsvrkYeIuEeECWbL4b8SdiN4N4wZhGUhmjLBuy', 'outlet', 'ATC1', 'Active', '2024-06-02 23:25:36.628413', '2024-06-02 23:25:36.628413');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_outlet`
--
ALTER TABLE `tbl_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_outlet`
--
ALTER TABLE `tbl_outlet`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
