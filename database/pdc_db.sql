-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 11:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `tbl_promo_hero`
--

CREATE TABLE `tbl_promo_hero` (
  `id` int(100) NOT NULL,
  `image_name` varchar(2000) NOT NULL,
  `file_path` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `status` enum('Published','Unpublish') NOT NULL,
  `created` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `uploaded_by` varchar(1000) NOT NULL,
  `updated` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `modified_by` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_promo_hero`
--
ALTER TABLE `tbl_promo_hero`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_promo_hero`
--
ALTER TABLE `tbl_promo_hero`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
