-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 11:50 AM
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
-- Table structure for table `tbl_about_hero`
--

CREATE TABLE `tbl_about_hero` (
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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_activity`
--

CREATE TABLE `tbl_activity` (
  `id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `activity` varchar(2000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date_posted` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_activity`
--

INSERT INTO `tbl_activity` (`id`, `user_id`, `activity`, `type`, `date_posted`) VALUES
(1, '1', 'User logged in', 'Login', '2024-06-03 11:38:02.927539'),
(2, '1', 'User logged out', 'Logout', '2024-06-03 11:40:19.676112'),
(3, '1', 'User logged in', 'Login', '2024-06-03 11:40:28.239183'),
(4, '1', 'User logged out', 'Logout', '2024-06-03 11:41:31.010704'),
(5, '3', 'User logged in', 'Login', '2024-06-03 11:41:44.108646'),
(6, '3', 'User logged out', 'Logout', '2024-06-03 11:41:47.107103'),
(7, '1', 'User logged in', 'Login', '2024-06-03 11:42:58.818642'),
(8, '1', 'User logged out', 'Logout', '2024-06-03 12:03:38.109838'),
(9, '1', 'User logged in', 'Login', '2024-06-03 13:07:56.599668'),
(10, '1', 'Added new user id: #6 as hr', 'User', '2024-06-03 13:11:09.752593'),
(11, '1', 'Added new user id: #7 as marketing', 'User', '2024-06-03 13:24:57.302664'),
(12, '1', 'User logged out', 'Logout', '2024-06-03 14:22:10.000995'),
(13, '1', 'User logged in', 'Login', '2024-06-03 14:22:21.635221'),
(14, '1', 'Added new outlet : Verdant, id: #4', 'Outlet', '2024-06-03 14:54:32.862454'),
(15, '1', 'User logged in', 'Login', '2024-06-04 08:56:35.048326'),
(16, '1', 'Added new outlet : Northgate, id: #5', 'Outlet', '2024-06-04 09:49:21.711071'),
(17, '1', 'User logged out', 'Logout', '2024-06-04 09:55:30.450850'),
(18, '1', 'User logged in', 'Login', '2024-06-04 10:06:10.429750'),
(19, '1', 'User logged out', 'Logout', '2024-06-04 10:06:24.260746'),
(20, '2', 'User logged in', 'Login', '2024-06-04 10:06:34.807547'),
(21, '2', 'User logged out', 'Logout', '2024-06-04 10:42:34.796088'),
(22, '2', 'User logged in', 'Login', '2024-06-04 10:42:40.338843'),
(23, '2', 'User logged in', 'Login', '2024-06-05 09:00:00.952990'),
(24, '2', 'Added new image: slide4.jpg in home hero section', 'Content', '2024-06-05 09:05:12.945474'),
(25, '2', 'Added new image: slide4.jpg in home hero section', 'Content', '2024-06-05 11:55:03.801362'),
(26, '2', 'Updated hero section in Home page with ID 9', 'Content', '2024-06-05 14:04:07.129143'),
(27, '2', 'Updated hero section in Home page with ID 8', 'Content', '2024-06-05 14:04:56.280565'),
(28, '2', 'Added new image: slide3.jpg titled: Hero Image 3 in home hero section', 'Content', '2024-06-05 14:11:47.411788'),
(29, '2', 'Added new image: slide6.jpg titled: Hero Image 4 in home hero section', 'Content', '2024-06-05 14:13:31.844801'),
(30, '2', 'Added new image: slide2.jpg titled: Hero Image 5 in home hero section', 'Content', '2024-06-05 15:57:16.454806'),
(31, '2', 'Updated hero section in Home page with ID 12', 'Content', '2024-06-05 16:18:13.338013'),
(32, '2', 'Updated hero section in Home page with ID 12', 'Content', '2024-06-05 16:18:31.938943'),
(33, '2', 'Updated hero section in Home page with ID 12', 'Content', '2024-06-05 16:20:15.494926'),
(34, '2', 'Updated hero section in Home page with ID 12', 'Content', '2024-06-05 16:20:27.335599'),
(35, '2', 'Updated hero section in Home page with ID 12', 'Content', '2024-06-05 16:20:37.671996'),
(36, '2', 'Updated hero section in Home page with ID 12', 'Content', '2024-06-05 16:23:26.103670'),
(37, '2', 'Updated hero section in Home page with ID 12', 'Content', '2024-06-05 16:25:21.675485'),
(38, '2', 'Updated hero section in Home page with ID 12', 'Content', '2024-06-05 16:25:31.229685'),
(39, '2', 'Updated hero section in Home page with ID 12', 'Content', '2024-06-05 17:12:55.583188'),
(40, '2', 'Updated hero section in Home page with ID 12', 'Content', '2024-06-05 17:13:06.643465'),
(41, '2', 'Updated hero section in Home page with ID 12', 'Content', '2024-06-05 17:13:21.626653');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home_hero`
--

CREATE TABLE `tbl_home_hero` (
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
-- Dumping data for table `tbl_home_hero`
--

INSERT INTO `tbl_home_hero` (`id`, `image_name`, `file_path`, `title`, `status`, `created`, `uploaded_by`, `updated`, `modified_by`) VALUES
(8, 'slide5.jpg', '../../uploads/home/slide5.jpg', 'Hero Image 2', 'Published', '2024-06-05 09:05:12.000000', '2', '2024-06-05 17:17:38.000000', '2'),
(9, 'slide4.jpg', '../../uploads/home/slide4.jpg', 'Hero Image 1', 'Published', '2024-06-05 11:55:03.000000', '2', '2024-06-05 17:17:37.000000', '2'),
(10, 'slide3.jpg', '../../uploads/home/slide3.jpg', 'Hero Image 3', 'Published', '2024-06-05 14:11:47.000000', '2', '2024-06-05 17:17:36.000000', '2'),
(11, 'slide6.jpg', '../../uploads/home/slide6.jpg', 'Hero Image 4', 'Published', '2024-06-05 14:13:31.000000', '2', '2024-06-05 17:17:35.000000', '2'),
(12, 'slide2.jpg', '../../uploads/home/slide2.jpg', 'Hero Image 5', 'Unpublish', '2024-06-05 15:57:16.000000', '2', '2024-06-05 17:13:21.000000', '2');

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
  `updated` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `created` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_outlet`
--

INSERT INTO `tbl_outlet` (`id`, `store_name`, `short_name`, `address`, `status`, `updated`, `created`, `image_path`) VALUES
(1, 'Alabang Town Center', 'ATC', 'Alabang Town Center - Ground Level, Alabang Town Center, Alabang-Zapote Road, Alabang, Muntinlupa, Metro Manila', 'Active', '2024-06-03 09:41:52.000000', '2024-06-02 22:45:21.000000', '../../uploads/outlets/atc.png'),
(2, 'Festival', 'FSI', 'Lower Ground Level, Festival Supermall, Corporate Ave. corner Civic Drive, Filinvest Corporate City, Alabang,Muntinlupa, Metro Manila', 'Active', '2024-06-03 13:41:06.000000', '2024-06-02 22:52:39.000000', '../../uploads/outlets/dunkin_store_clipart.png'),
(3, 'Moonwalk', 'Moonwalk', '432 Alarang, Alabangâ€“Zapote Rd, Talon 1, Las PiÃ±as, Metro Manila.', 'Active', '2024-06-03 10:14:12.000000', '2024-06-03 10:14:12.000000', '../../uploads/outlets/moonwalk.png'),
(4, 'Verdant', 'Verdant', 'Unit Door A8 Santiagel Building Verdant Avenue Corner Alabang Zapote Road Barangay Pamplona Tres, Las PiÃ±as, Metro Manila.', 'Active', '2024-06-03 14:54:32.000000', '2024-06-03 14:54:32.000000', '../../uploads/outlets/verdant.png'),
(5, 'Northgate', 'Northgate', 'Northgate Ave, Fastbytes Northgate, Alabang, Muntinlupa, Metro Manila.', 'Active', '2024-06-04 09:49:21.000000', '2024-06-04 09:49:21.000000', '../../uploads/outlets/northgate.png');

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
  `created` datetime(6) DEFAULT current_timestamp(6),
  `updated` datetime(6) DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `role`, `branch`, `status`, `created`, `updated`) VALUES
(1, 'panda_admin', '$2y$10$aGvKw/BZNQQjkQVBlHdjHux3GGYPZsPWRDlmq5dBF09u0uq5UeVEi', 'admin', NULL, 'Active', '2024-05-28 09:56:25.291360', '2024-05-28 09:56:25.291360'),
(2, 'panda_dev', '$2y$10$eJ9Lu.WIdHdWUl6tww/.HuS7NkWACLfhBaAHPioNnXXRBlAAWBaya', 'dev', '', 'Active', '2024-05-28 11:00:32.708752', '2024-06-02 23:18:56.000000'),
(3, 'panda_support', '$2y$10$9CNWe.e9CEQHQHIZorhVNO3P086Eagu8rjsAEtHZyA05VoLGYwsZu', 'support', NULL, 'Active', '2024-06-02 12:39:12.719703', '2024-06-02 12:39:12.719703'),
(4, 'dunkin_festival', '$2y$10$TliaVHzDCVKY0msYkeov4.Od..kqnbVSO5PCgseu0r8deo4hl2jJO', 'outlet', 'FSI', 'Inactive', '2024-06-02 23:23:40.270748', '2024-06-03 13:13:16.000000'),
(5, 'dunkin_atc', '$2y$10$tDJrz.kE4jWIHxDjsvrkYeIuEeECWbL4b8SdiN4N4wZhGUhmjLBuy', 'outlet', 'ATC1', 'Inactive', '2024-06-02 23:25:36.628413', '2024-06-03 13:13:13.000000'),
(6, 'panda_hr', '$2y$10$6f1NC/JjTw8utMYF8RDBauMgjWt8rlTMR7xStEdVBvkqdmYq0C54u', 'hr', '', 'Active', '2024-06-03 13:11:09.749549', '2024-06-03 13:11:09.749549'),
(7, 'panda_marketing', '$2y$10$H/qMTN.Ob4jwhcwvuL2.ZuIdot8ROFmt/c5Hpi72C2wdinFyYnSdu', 'marketing', '', 'Active', '2024-06-03 13:24:57.300140', '2024-06-03 13:24:57.300140');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about_hero`
--
ALTER TABLE `tbl_about_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_home_hero`
--
ALTER TABLE `tbl_home_hero`
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
-- AUTO_INCREMENT for table `tbl_about_hero`
--
ALTER TABLE `tbl_about_hero`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_home_hero`
--
ALTER TABLE `tbl_home_hero`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_outlet`
--
ALTER TABLE `tbl_outlet`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
