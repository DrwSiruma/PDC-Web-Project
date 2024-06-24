-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 04:12 AM
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
  `updated` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `modified_by` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_about_hero`
--

INSERT INTO `tbl_about_hero` (`id`, `image_name`, `file_path`, `title`, `status`, `updated`, `modified_by`) VALUES
(13, 'slide1.jpg', '../../uploads/about/slide1.jpg', 'Hero Image 1', 'Published', '2024-06-06 10:25:13.000000', '2');

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
(41, '2', 'Updated hero section in Home page with ID 12', 'Content', '2024-06-05 17:13:21.626653'),
(42, '2', 'Added new image: slide1.jpg titled: Hero Image 1 in about hero section', 'Content', '2024-06-05 17:57:47.573159'),
(43, '2', 'User logged out', 'Logout', '2024-06-05 18:16:22.072511'),
(44, '2', 'User logged in', 'Login', '2024-06-06 09:11:48.120474'),
(47, '2', 'Updated hero section in About page with ID 13', 'Content', '2024-06-06 10:24:23.519136'),
(48, '2', 'Updated hero section in About page with ID 13', 'Content', '2024-06-06 10:25:13.766507'),
(49, '2', 'Added new image: filipino-workers.jpg titled: Hero Image 1 in careers hero section', 'Content', '2024-06-06 10:52:32.915613'),
(50, '2', 'Updated hero section in careers page with ID 14', 'Content', '2024-06-06 11:09:57.219728'),
(51, '2', 'Updated hero section in careers page with ID 14', 'Content', '2024-06-06 11:10:05.970564'),
(52, '2', 'Updated hero section in careers page with ID 14', 'Content', '2024-06-06 11:11:16.842940'),
(53, '2', 'Updated hero section in careers page with ID 14', 'Content', '2024-06-06 11:11:29.933612'),
(54, '2', 'Added new image: empowering-leadership.jpg titled: Empowering Leadership in careers wylwwu section', 'Content', '2024-06-06 14:02:47.631301'),
(55, '2', 'Added new image: visionary-teams.jpg titled: Visionary Teams in careers wylwwu section', 'Content', '2024-06-06 14:06:00.383597'),
(56, '2', 'Added new image: pathways-to-growth.jpg titled: Pathways to Growth in careers wylwwu section', 'Content', '2024-06-06 14:06:29.912061'),
(57, '2', 'Updated wylwwu section in careers page with ID 17', 'Content', '2024-06-06 14:31:59.227528'),
(58, '2', 'Updated wylwwu section in careers page with ID 17', 'Content', '2024-06-06 14:32:12.209727'),
(59, '2', 'Updated wylwwu section in careers page with ID 17', 'Content', '2024-06-06 14:32:18.161294'),
(60, '2', 'User logged out', 'Logout', '2024-06-06 14:37:57.022897'),
(61, '1', 'User logged in', 'Login', '2024-06-06 14:38:04.525124'),
(62, '1', 'User logged out', 'Logout', '2024-06-06 14:39:19.229240'),
(63, '2', 'User logged in', 'Login', '2024-06-06 14:40:56.541663'),
(64, '2', 'Updated wylwwu section in careers page with ID 17', 'Content', '2024-06-06 15:38:54.772151'),
(65, '2', 'Updated wylwwu section in careers page with ID 17', 'Content', '2024-06-06 15:39:08.976628'),
(66, '2', 'Added new image: slide-1.jpg titled: Hero Image 1 in promo hero section', 'Content', '2024-06-06 17:40:14.239877'),
(67, '2', 'User logged in', 'Login', '2024-06-07 09:00:28.281805'),
(68, '2', 'Added new image: slide-2.jpg titled: Hero Image 2 in promo hero section', 'Content', '2024-06-07 09:01:13.232983'),
(69, '2', 'Added new image: slide-3.jpg titled: Hero Image 3 in promo hero section', 'Content', '2024-06-07 09:01:26.562834'),
(70, '2', 'Added new image: BEARY IN LOVE.png title: BEARY IN LOVE in promo', 'Content', '2024-06-07 11:13:21.338269'),
(71, '2', 'Added new image: EASTER MUNCHKIN DEAL.png title: EASTER MUNCHKIN DEAL in promo', 'Content', '2024-06-07 11:31:13.679396'),
(72, '2', 'Added new image: SUMMER DELIGHT PROMO.png title: SUMMER DELIGHT PROMO in promo', 'Content', '2024-06-07 11:32:04.397701'),
(73, '2', 'Updated promo page with ID 20', 'Content', '2024-06-07 11:54:32.547601'),
(74, '2', 'Updated promo page with ID 20', 'Content', '2024-06-07 11:54:36.843177'),
(75, '2', 'Updated promo page with ID 20', 'Content', '2024-06-07 11:56:56.001052'),
(76, '2', 'Updated promo page with ID 20', 'Content', '2024-06-07 11:57:04.910660'),
(77, '2', 'Updated promo page with ID 18', 'Content', '2024-06-07 13:00:28.111102'),
(78, '2', 'User logged out', 'Logout', '2024-06-07 15:34:08.222949'),
(79, '1', 'User logged in', 'Login', '2024-06-07 15:34:27.905169'),
(80, '1', 'Added new outlet: Southville, id: #7', 'Outlet', '2024-06-07 15:37:33.969182'),
(81, '1', 'User logged out', 'Logout', '2024-06-07 17:27:29.748618'),
(82, '6', 'User logged in', 'Login', '2024-06-10 08:55:59.417652'),
(83, '6', 'Added IT Specialist as new career', 'Career', '2024-06-10 10:35:52.920564'),
(84, '6', 'Added Store Manager as new career', 'Career', '2024-06-10 10:37:00.883871'),
(85, '6', 'Added Service Crew - Dunkin\' as new career', 'Career', '2024-06-10 10:42:28.404646'),
(86, '6', 'Added Marketing Staff as new career', 'Career', '2024-06-10 10:44:40.700718'),
(87, '6', 'Updated career ID 3', 'Career', '2024-06-10 17:01:02.170500'),
(88, '6', 'Updated career ID 3', 'Career', '2024-06-10 17:01:29.491566'),
(89, '6', 'User logged in', 'Login', '2024-06-11 09:35:53.587121'),
(90, '6', 'User logged out', 'Logout', '2024-06-11 11:33:38.403203'),
(91, '6', 'User logged in', 'Login', '2024-06-11 14:16:00.457205'),
(92, '6', 'User logged out', 'Logout', '2024-06-11 16:56:03.838917'),
(93, '1', 'User logged in', 'Login', '2024-06-11 16:56:11.042298'),
(94, '1', 'User logged in', 'Login', '2024-06-13 08:34:56.282678'),
(95, '1', 'Added new outlet: DoÃ±a Manuela, id: #8', 'Outlet', '2024-06-13 10:00:13.591209'),
(96, '1', 'User logged out', 'Logout', '2024-06-13 10:58:32.715438'),
(97, '2', 'User logged in', 'Login', '2024-06-13 10:58:38.532241'),
(98, '2', 'User logged out', 'Logout', '2024-06-13 10:58:42.614482'),
(99, '1', 'User logged in', 'Login', '2024-06-18 09:05:10.300309'),
(100, '1', 'Added new outlet: Manila Times, id: #9', 'Outlet', '2024-06-18 09:54:18.753608'),
(101, '1', 'User logged out', 'Logout', '2024-06-18 14:44:13.196663'),
(102, '1', 'User logged in', 'Login', '2024-06-18 14:44:27.455104'),
(103, '1', 'User logged in', 'Login', '2024-06-19 09:06:41.526469'),
(104, '1', 'Added new product: Boston Kreme, id: #1', 'Product', '2024-06-19 09:13:55.234359'),
(105, '1', 'Added new product: Bavarian Filled, id: #2', 'Product', '2024-06-19 09:17:41.470280'),
(106, '1', 'Added new product: Sugar Filled, id: #3', 'Product', '2024-06-19 09:20:34.081805'),
(107, '1', 'Added new product: Strawberry Filled, id: #4', 'Product', '2024-06-19 10:02:45.134877'),
(108, '1', 'Added new product: Choco BTN, id: #5', 'Product', '2024-06-19 11:16:44.298915'),
(109, '1', 'User logged in', 'Login', '2024-06-19 12:28:04.687514'),
(110, '1', 'Added new product: Hot Choco, id: #6', 'Product', '2024-06-19 15:25:12.053628'),
(111, '1', 'Added new product: Brewed Coffee, id: #7', 'Product', '2024-06-19 15:25:42.810594'),
(112, '1', 'Added new product: CafÃ© Americano, id: #8', 'Product', '2024-06-19 15:26:25.049551'),
(113, '1', 'Added new product: Iced Coffee, id: #9', 'Product', '2024-06-19 15:26:43.307965'),
(114, '1', 'Added new product: Iced Choco Java, id: #10', 'Product', '2024-06-19 15:27:09.419141'),
(115, '1', 'Added new product: Iced Latte, id: #11', 'Product', '2024-06-19 15:27:40.550593'),
(116, '1', 'Added new product: Icy Coolers, id: #12', 'Product', '2024-06-19 15:27:52.818433'),
(117, '1', 'Added new product: Iced Brewed Tea, id: #13', 'Product', '2024-06-19 15:28:08.241496'),
(118, '1', 'Added new product: Tuna, id: #14', 'Product', '2024-06-19 15:32:08.980098'),
(119, '1', 'Added new product: Spanish Sausage, id: #15', 'Product', '2024-06-19 15:32:23.240269'),
(120, '1', 'Added new product: Ham and Cheese, id: #16', 'Product', '2024-06-19 15:32:51.625570'),
(121, '1', 'Added new product: Cheese, id: #17', 'Product', '2024-06-19 15:33:03.457819'),
(122, '1', 'Added new product: Bacon Cheesy Mushroom, id: #18', 'Product', '2024-06-19 15:33:20.191086'),
(123, '1', 'Added new product: Mushroom Madness, id: #19', 'Product', '2024-06-19 15:36:17.263472'),
(124, '1', 'Added new product: Hungarian Sausage, id: #20', 'Product', '2024-06-19 15:36:38.887002'),
(125, '1', 'Added new product: Egg and Cheese, id: #21', 'Product', '2024-06-19 15:36:59.644808'),
(126, '1', 'Added new product: Chicken Clubhouse, id: #22', 'Product', '2024-06-19 15:37:23.280519'),
(127, '1', 'Added new product: Cheesy Tuna, id: #23', 'Product', '2024-06-19 15:37:47.034484'),
(128, '1', 'Added new product: Cheese Madness, id: #24', 'Product', '2024-06-19 15:38:16.834211'),
(129, '1', 'User logged out', 'Logout', '2024-06-19 17:20:27.218596'),
(130, '6', 'User logged in', 'Login', '2024-06-19 17:20:33.138598'),
(131, '6', 'User logged out', 'Logout', '2024-06-19 17:20:51.175123'),
(132, '1', 'User logged in', 'Login', '2024-06-19 17:34:23.877157'),
(133, '1', 'User logged out', 'Logout', '2024-06-19 17:34:29.484559'),
(134, '7', 'User logged in', 'Login', '2024-06-19 17:34:40.187164'),
(135, '7', 'User logged in', 'Login', '2024-06-19 17:37:00.562950'),
(136, '7', 'User logged out', 'Logout', '2024-06-19 17:37:07.956630'),
(137, '7', 'User logged in', 'Login', '2024-06-19 17:37:13.589748'),
(138, '7', 'User logged out', 'Logout', '2024-06-19 17:38:05.733591'),
(139, '1', 'User logged in', 'Login', '2024-06-19 17:38:16.228124'),
(140, '1', 'User logged out', 'Logout', '2024-06-19 17:38:20.231932'),
(141, '7', 'User logged in', 'Login', '2024-06-19 17:39:41.876964'),
(142, '1', 'User logged in', 'Login', '2024-06-20 08:33:19.190824'),
(143, '1', 'User logged out', 'Logout', '2024-06-20 08:33:25.622412'),
(144, '7', 'User logged in', 'Login', '2024-06-20 08:33:33.505079'),
(145, '7', 'Updated promo page with ID 18', 'Content', '2024-06-20 09:06:32.454265'),
(146, '7', 'Updated promo page with ID 18', 'Content', '2024-06-20 09:07:02.581802'),
(147, '7', 'Updated promo page with ID 18', 'Content', '2024-06-20 09:07:26.662610'),
(148, '7', 'Updated promo page with ID 18', 'Content', '2024-06-20 09:07:30.044079'),
(149, '7', 'Updated promo page with ID 18', 'Content', '2024-06-20 09:07:34.036252'),
(150, '7', 'Added new image: bundles.jpg title: Sample in promo', 'Content', '2024-06-20 09:14:56.482116'),
(151, '7', 'User logged out', 'Logout', '2024-06-20 09:41:10.573652'),
(152, '1', 'User logged in', 'Login', '2024-06-20 09:41:29.296219'),
(153, '1', 'User logged out', 'Logout', '2024-06-20 09:41:43.769452'),
(154, '7', 'User logged in', 'Login', '2024-06-20 09:41:52.568607'),
(155, '7', 'User logged out', 'Logout', '2024-06-20 16:27:34.817188'),
(156, '1', 'User logged in', 'Login', '2024-06-20 16:27:41.637842'),
(157, '1', 'User logged out', 'Logout', '2024-06-20 16:30:10.503340'),
(158, '7', 'User logged in', 'Login', '2024-06-20 16:30:18.533774'),
(159, '7', 'User logged in', 'Login', '2024-06-21 09:21:08.010068'),
(160, '7', 'Updated promo page with ID 20', 'Content', '2024-06-21 16:15:24.724322'),
(161, '7', 'Updated promo page with ID 20', 'Content', '2024-06-21 16:36:18.051214'),
(162, '7', 'User logged out', 'Logout', '2024-06-21 16:39:54.568637'),
(163, '2', 'User logged in', 'Login', '2024-06-21 16:40:04.470932'),
(164, '2', 'Updated promo page with ID 19', 'Content', '2024-06-21 16:40:36.849360'),
(165, '2', 'User logged out', 'Logout', '2024-06-21 16:41:07.284798'),
(166, '2', 'User logged in', 'Login', '2024-06-21 16:52:00.828242'),
(167, '2', 'User logged out', 'Logout', '2024-06-21 17:51:45.058843'),
(168, '7', 'User logged in', 'Login', '2024-06-24 08:31:48.283139'),
(169, '7', 'User logged out', 'Logout', '2024-06-24 09:49:24.157637'),
(170, '6', 'User logged in', 'Login', '2024-06-24 09:49:29.830071'),
(171, '6', 'User logged out', 'Logout', '2024-06-24 09:49:45.584621'),
(172, '7', 'User logged in', 'Login', '2024-06-24 09:49:52.443743');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicants`
--

CREATE TABLE `tbl_applicants` (
  `id` int(100) NOT NULL,
  `fullname` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `cover` longtext NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_applied` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `doc` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_applicants`
--

INSERT INTO `tbl_applicants` (`id`, `fullname`, `email`, `contact`, `cover`, `status`, `date_applied`, `doc`) VALUES
(1, 'Andrew Siruma', 'andrew@sample.com', '09121231234', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Pending', '2024-06-11 13:55:56.174650', 'ComputerScienceResumedocx.pdf'),
(2, 'Andrew Siruma', 'andrew@sample.com', '09121231234', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'Pending', '2024-06-11 14:15:39.070726', '6667eb8b1123b_ComputerScienceResumedocx.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_careers_hero`
--

CREATE TABLE `tbl_careers_hero` (
  `id` int(100) NOT NULL,
  `image_name` varchar(2000) NOT NULL,
  `file_path` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `status` enum('Published','Unpublish') NOT NULL,
  `updated` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `modified_by` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_careers_hero`
--

INSERT INTO `tbl_careers_hero` (`id`, `image_name`, `file_path`, `title`, `status`, `updated`, `modified_by`) VALUES
(14, 'filipino-workers.jpg', '../../uploads/careers/filipino-workers.jpg', 'Hero Image 1', 'Published', '2024-06-06 11:15:32.000000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_careers_wylwwu`
--

CREATE TABLE `tbl_careers_wylwwu` (
  `id` int(100) NOT NULL,
  `image_name` varchar(2000) NOT NULL,
  `file_path` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` longtext NOT NULL,
  `status` enum('Published','Unpublish') NOT NULL,
  `updated` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `modified_by` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_careers_wylwwu`
--

INSERT INTO `tbl_careers_wylwwu` (`id`, `image_name`, `file_path`, `title`, `description`, `status`, `updated`, `modified_by`) VALUES
(15, 'empowering-leadership.jpg', '../../uploads/careers/empowering-leadership.jpg', 'Empowering Leadership', 'At Panda Development Corporation, our leadership empowers you to take initiative and make impactful decisions. We foster a culture of trust and collaboration, ensuring every team member feels valued and supported in their role.', 'Published', '2024-06-06 14:02:47.000000', '2'),
(16, 'visionary-teams.jpg', '../../uploads/careers/visionary-teams.jpg', 'Visionary Teams', 'Join our visionary teams at Panda Development Corporation, where innovative thinking and teamwork drive our success. You\'ll work alongside passionate professionals dedicated to delivering excellence and achieving common goals.', 'Published', '2024-06-06 15:39:28.000000', '2'),
(17, 'pathways-to-growth.jpg', '../../uploads/careers/pathways-to-growth.jpg', 'Pathways to Growth', 'We believe in your potential and provide clear pathways to growth within Panda Development Corporation. With ongoing training, mentorship, and career advancement opportunities, you can build a fulfilling and dynamic career with us.', 'Published', '2024-06-06 15:39:08.000000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id` int(100) NOT NULL,
  `f_name` varchar(1000) NOT NULL,
  `company` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `contact` varchar(1000) NOT NULL,
  `message` longtext NOT NULL,
  `status` enum('Unread','Read') NOT NULL,
  `post_date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`id`, `f_name`, `company`, `email`, `address`, `contact`, `message`, `status`, `post_date`) VALUES
(1, 'Andrew Siruma', 'Panda Development Corp.', 'andrew@sample.com', 'Bacoor Cavite', '09121231234', 'Testing', 'Unread', '2024-06-24 09:58:13.398620');

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
(8, 'slide5.jpg', '../../uploads/home/slide5.jpg', 'Hero Image 2', 'Published', '2024-06-05 09:05:12.000000', '2', '2024-06-05 18:08:09.000000', '2'),
(9, 'slide4.jpg', '../../uploads/home/slide4.jpg', 'Hero Image 1', 'Published', '2024-06-05 11:55:03.000000', '2', '2024-06-05 18:08:08.000000', '2'),
(10, 'slide3.jpg', '../../uploads/home/slide3.jpg', 'Hero Image 3', 'Published', '2024-06-05 14:11:47.000000', '2', '2024-06-06 11:22:28.000000', '2'),
(11, 'slide6.jpg', '../../uploads/home/slide6.jpg', 'Hero Image 4', 'Unpublish', '2024-06-05 14:13:31.000000', '2', '2024-06-21 16:52:08.000000', '2'),
(12, 'slide2.jpg', '../../uploads/home/slide2.jpg', 'Hero Image 5', 'Unpublish', '2024-06-05 15:57:16.000000', '2', '2024-06-05 17:13:21.000000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_opportunities`
--

CREATE TABLE `tbl_opportunities` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `type1` varchar(100) NOT NULL DEFAULT 'On Site',
  `type2` varchar(100) NOT NULL DEFAULT 'Full-time',
  `status` enum('Posted','Unposted') NOT NULL,
  `created` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_opportunities`
--

INSERT INTO `tbl_opportunities` (`id`, `name`, `description`, `type1`, `type2`, `status`, `created`) VALUES
(1, 'IT Specialist', 'We\'re looking for an experienced IT Specialist to join our team.', 'On site', 'Full-time', 'Posted', '2024-06-10 10:35:52.000000'),
(2, 'Store Manager', 'We\'re looking for a Store Manager to join our team.', 'On site', 'Full-time', 'Posted', '2024-06-10 10:37:00.000000'),
(3, 'Service Crew - Dunkin\'', 'We\'re looking for a Service Crew to join our team.', 'On Site', 'Full-time', 'Posted', '2024-06-10 10:42:28.000000'),
(4, 'Marketing Staff', 'We\'re looking for a Marketing Staff to join our team.', 'On site', 'Full-time', 'Posted', '2024-06-10 10:44:40.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_outlet`
--

CREATE TABLE `tbl_outlet` (
  `id` int(100) NOT NULL,
  `store_name` varchar(100) DEFAULT NULL,
  `branch_code` varchar(100) DEFAULT NULL,
  `outlet_code` varchar(100) NOT NULL,
  `shop_type` enum('a','b','c') NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `status` enum('Active','Closed') NOT NULL,
  `service_options` text NOT NULL,
  `updated` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `created` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `image_path` varchar(255) DEFAULT NULL,
  `image_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_outlet`
--

INSERT INTO `tbl_outlet` (`id`, `store_name`, `branch_code`, `outlet_code`, `shop_type`, `address`, `status`, `service_options`, `updated`, `created`, `image_path`, `image_name`) VALUES
(1, 'Alabang Town Center', '057', 'PDC001', 'b', 'Alabang Town Center - Ground Level, Alabang Town Center, Alabang-Zapote Road, Alabang, Muntinlupa, Metro Manila', 'Active', 'a:2:{i:0;s:7:\"Dine-In\";i:1;s:7:\"Takeout\";}', '2024-06-19 09:46:24.000000', '2024-06-02 22:45:21.000000', '../../uploads/outlets/atc.png', 'atc.png'),
(2, 'Festival Mall', '00072', 'PDC033', 'b', 'Lower Ground Level, Festival Supermall, Corporate Ave. corner Civic Drive, Filinvest Corporate City, Alabang,Muntinlupa, Metro Manila', 'Closed', 'a:2:{i:0;s:7:\"Dine-In\";i:1;s:7:\"Takeout\";}', '2024-06-20 09:41:38.000000', '2024-06-02 22:52:39.000000', '../../uploads/outlets/dunkin_store_clipart.png', 'dunkin_store_clipart.png'),
(3, 'Moonwalk', '018', 'PDC008', 'b', '432 Real ST, Alabangâ€“Zapote Rd, Talon 1, Las PiÃ±as, Metro Manila.', 'Active', 'a:2:{i:0;s:7:\"Dine-In\";i:1;s:7:\"Takeout\";}', '2024-06-18 11:07:06.000000', '2024-06-03 10:14:12.000000', '../../uploads/outlets/moonwalk.png', 'moonwalk.png'),
(4, 'Verdant', '053', 'PDC017', 'a', 'UNIT/DOOR NO.48 SANTIAGUEL BLDG. PAMPLONA DOS NCR, FOURTH DISTRICT CITY OF LAS PINAS', 'Active', 'a:2:{i:0;s:7:\"Dine-In\";i:1;s:7:\"Takeout\";}', '2024-06-18 11:07:12.000000', '2024-06-03 14:54:32.000000', '../../uploads/outlets/verdant.png', 'verdant.png'),
(5, 'Northgate', '060', 'PDC009', 'b', 'Space No. 204 Fastbytes Northgate Alabang Muntinlupa City', 'Active', 'a:2:{i:0;s:7:\"Dine-In\";i:1;s:7:\"Takeout\";}', '2024-06-18 11:07:20.000000', '2024-06-04 09:49:21.000000', '../../uploads/outlets/northgate.png', 'northgate.png'),
(7, 'Southville', '062', 'PDC014', 'b', 'Lot 1-A-A The Edge Building CAA Road (J. Aguilar Avenue) Pulang Lupa 2 1st District, Las PiÃ±as, Metro Manila.', 'Active', 'a:2:{i:0;s:7:\"Dine-In\";i:1;s:7:\"Takeout\";}', '2024-06-18 11:07:27.000000', '2024-06-07 15:37:33.000000', '../../uploads/outlets/southville.png', 'southville.png'),
(8, 'DoÃ±a Manuela', '00066', 'PDC028', 'b', 'Unit A Food ST. Alabang Zapote RD. Pamplona Tres, City of Las PiÃ±as', 'Active', 'a:2:{i:0;s:7:\"Dine-In\";i:1;s:7:\"Takeout\";}', '2024-06-18 11:07:33.000000', '2024-06-13 10:00:13.000000', '../../uploads/outlets/dona_manuela.png', 'dona_manuela.png'),
(9, 'Manila Times', '00037', 'PDC006', 'b', 'Real Cor Times Avenue Pamplona Tres, Las PiÃ±as City', 'Active', 'a:2:{i:0;s:7:\"Dine-In\";i:1;s:7:\"Takeout\";}', '2024-06-18 11:07:41.000000', '2024-06-18 09:54:18.000000', '../../uploads/outlets/manila_times.png', 'manila_times.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_outlet_menu`
--

CREATE TABLE `tbl_outlet_menu` (
  `id` int(100) NOT NULL,
  `product_id` int(255) NOT NULL,
  `outlet_id` int(255) NOT NULL,
  `status` enum('Posted','Unposted') NOT NULL,
  `post_date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_outlet_menu`
--

INSERT INTO `tbl_outlet_menu` (`id`, `product_id`, `outlet_id`, `status`, `post_date`) VALUES
(1, 1, 1, 'Posted', '2024-06-21 11:17:10.000000'),
(2, 4, 1, 'Posted', '2024-06-21 11:17:10.000000'),
(3, 7, 1, 'Posted', '2024-06-21 11:17:10.000000'),
(4, 8, 1, 'Posted', '2024-06-21 11:17:10.000000'),
(5, 14, 1, 'Posted', '2024-06-21 11:17:10.000000'),
(6, 15, 1, 'Posted', '2024-06-21 11:17:10.000000'),
(7, 16, 1, 'Posted', '2024-06-21 11:17:10.000000'),
(8, 21, 1, 'Posted', '2024-06-21 11:17:10.000000'),
(10, 2, 4, 'Posted', '2024-06-21 11:17:42.000000'),
(11, 5, 4, 'Posted', '2024-06-21 11:17:42.000000'),
(12, 1, 4, 'Posted', '2024-06-21 11:41:49.000000'),
(13, 3, 4, 'Posted', '2024-06-21 11:41:49.000000'),
(14, 4, 4, 'Posted', '2024-06-21 11:41:49.000000'),
(15, 6, 4, 'Posted', '2024-06-21 11:42:25.000000'),
(16, 7, 4, 'Posted', '2024-06-21 11:42:25.000000'),
(17, 8, 4, 'Posted', '2024-06-21 11:42:25.000000'),
(18, 9, 4, 'Posted', '2024-06-21 11:42:25.000000'),
(19, 10, 4, 'Posted', '2024-06-21 11:42:25.000000'),
(20, 11, 4, 'Posted', '2024-06-21 11:42:25.000000'),
(21, 16, 4, 'Posted', '2024-06-21 11:42:36.000000'),
(22, 17, 4, 'Posted', '2024-06-21 11:42:36.000000'),
(27, 1, 3, 'Posted', '2024-06-21 11:43:03.000000'),
(28, 2, 3, 'Posted', '2024-06-21 11:43:03.000000'),
(29, 4, 3, 'Posted', '2024-06-21 11:43:03.000000'),
(30, 5, 3, 'Posted', '2024-06-21 11:43:03.000000'),
(31, 6, 3, 'Posted', '2024-06-21 11:43:03.000000'),
(32, 7, 3, 'Posted', '2024-06-21 11:43:03.000000'),
(33, 8, 3, 'Posted', '2024-06-21 11:43:03.000000'),
(34, 9, 3, 'Posted', '2024-06-21 11:43:03.000000'),
(35, 10, 3, 'Posted', '2024-06-21 11:43:03.000000'),
(36, 11, 3, 'Posted', '2024-06-21 11:43:03.000000'),
(37, 13, 3, 'Posted', '2024-06-21 11:43:03.000000'),
(38, 14, 3, 'Posted', '2024-06-21 11:43:21.000000'),
(39, 15, 3, 'Posted', '2024-06-21 11:43:21.000000'),
(40, 16, 3, 'Posted', '2024-06-21 11:43:21.000000'),
(41, 17, 3, 'Posted', '2024-06-21 11:43:21.000000'),
(42, 19, 3, 'Posted', '2024-06-21 11:43:21.000000'),
(43, 21, 3, 'Posted', '2024-06-21 11:43:21.000000'),
(44, 22, 3, 'Posted', '2024-06-21 11:43:21.000000'),
(45, 23, 3, 'Posted', '2024-06-21 11:43:21.000000'),
(46, 24, 3, 'Posted', '2024-06-21 11:43:21.000000'),
(47, 1, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(48, 2, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(49, 3, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(50, 4, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(51, 5, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(52, 6, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(53, 7, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(54, 8, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(55, 9, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(56, 10, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(57, 11, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(58, 12, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(59, 13, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(60, 14, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(61, 15, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(62, 16, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(63, 17, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(64, 18, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(65, 19, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(66, 20, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(67, 21, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(68, 22, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(69, 23, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(70, 24, 5, 'Posted', '2024-06-21 11:43:52.000000'),
(71, 1, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(72, 2, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(73, 3, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(74, 4, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(75, 5, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(76, 6, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(77, 7, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(78, 8, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(79, 9, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(80, 10, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(81, 11, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(82, 13, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(83, 14, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(84, 15, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(85, 16, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(86, 17, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(87, 18, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(88, 21, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(89, 23, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(90, 24, 7, 'Posted', '2024-06-21 11:44:29.000000'),
(91, 1, 8, 'Posted', '2024-06-21 11:44:38.000000'),
(92, 2, 8, 'Posted', '2024-06-21 11:44:38.000000'),
(93, 3, 8, 'Posted', '2024-06-21 11:44:38.000000'),
(94, 4, 8, 'Posted', '2024-06-21 11:44:38.000000'),
(95, 5, 8, 'Posted', '2024-06-21 11:44:38.000000'),
(96, 6, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(97, 7, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(98, 8, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(99, 9, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(100, 10, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(101, 11, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(102, 14, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(103, 15, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(104, 16, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(105, 17, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(106, 18, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(107, 19, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(108, 20, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(109, 21, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(110, 22, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(111, 23, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(112, 24, 8, 'Posted', '2024-06-21 11:44:54.000000'),
(113, 1, 9, 'Posted', '2024-06-21 11:45:10.000000'),
(114, 2, 9, 'Posted', '2024-06-21 11:45:10.000000'),
(115, 3, 9, 'Posted', '2024-06-21 11:45:10.000000'),
(116, 4, 9, 'Posted', '2024-06-21 11:45:10.000000'),
(117, 5, 9, 'Posted', '2024-06-21 11:45:10.000000'),
(118, 6, 9, 'Posted', '2024-06-21 11:45:10.000000'),
(119, 7, 9, 'Posted', '2024-06-21 11:45:10.000000'),
(120, 8, 9, 'Posted', '2024-06-21 11:45:10.000000'),
(121, 9, 9, 'Posted', '2024-06-21 11:45:10.000000'),
(122, 10, 9, 'Posted', '2024-06-21 11:45:10.000000'),
(123, 14, 9, 'Posted', '2024-06-21 11:45:15.000000'),
(124, 15, 9, 'Posted', '2024-06-21 11:45:15.000000'),
(125, 16, 9, 'Posted', '2024-06-21 11:45:15.000000'),
(126, 17, 9, 'Posted', '2024-06-21 11:45:15.000000'),
(127, 19, 9, 'Posted', '2024-06-21 11:48:00.000000'),
(128, 20, 9, 'Posted', '2024-06-21 11:48:00.000000'),
(129, 21, 9, 'Posted', '2024-06-21 11:48:00.000000'),
(130, 22, 9, 'Posted', '2024-06-21 11:48:00.000000'),
(131, 23, 9, 'Posted', '2024-06-21 11:48:00.000000'),
(132, 24, 9, 'Posted', '2024-06-21 11:48:00.000000'),
(133, 2, 1, 'Posted', '2024-06-21 11:49:52.000000'),
(135, 5, 1, 'Posted', '2024-06-21 11:49:52.000000'),
(137, 3, 1, 'Posted', '2024-06-21 11:53:20.000000'),
(138, 19, 1, 'Posted', '2024-06-21 11:54:09.000000'),
(139, 20, 1, 'Posted', '2024-06-21 11:54:09.000000'),
(140, 22, 1, 'Posted', '2024-06-21 11:54:09.000000'),
(141, 23, 1, 'Posted', '2024-06-21 11:54:09.000000'),
(142, 24, 1, 'Posted', '2024-06-21 11:54:09.000000'),
(143, 6, 1, 'Posted', '2024-06-21 11:54:23.000000'),
(144, 9, 1, 'Posted', '2024-06-21 11:54:23.000000'),
(145, 10, 1, 'Posted', '2024-06-21 11:54:23.000000'),
(146, 11, 1, 'Posted', '2024-06-21 11:54:23.000000'),
(147, 12, 1, 'Posted', '2024-06-21 11:54:23.000000'),
(148, 13, 1, 'Posted', '2024-06-21 11:54:23.000000'),
(149, 17, 1, 'Posted', '2024-06-21 11:54:23.000000'),
(150, 18, 1, 'Posted', '2024-06-21 11:54:23.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image_path` varchar(1000) NOT NULL,
  `image_name` varchar(2000) NOT NULL,
  `category` enum('Donut','Beverage','Savory','Bakery') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image_path`, `image_name`, `category`, `status`, `created`) VALUES
(1, 'Boston Kreme', '../../uploads/product/boston-kreme.png', 'boston-kreme.png', 'Donut', 'Active', '2024-06-19 09:13:55.000000'),
(2, 'Bavarian Filled', '../../uploads/product/bavarian-filled.png', 'bavarian-filled.png', 'Donut', 'Active', '2024-06-19 09:17:41.000000'),
(3, 'Sugar Filled', '../../uploads/product/sugar-raised.png', 'sugar-raised.png', 'Donut', 'Active', '2024-06-19 09:20:34.000000'),
(4, 'Strawberry Filled', '../../uploads/product/strawberry-filled.png', 'strawberry-filled.png', 'Donut', 'Active', '2024-06-19 10:02:45.000000'),
(5, 'Choco BTN', '../../uploads/product/choco-btn.png', 'choco-btn.png', 'Donut', 'Active', '2024-06-19 11:16:44.000000'),
(6, 'Hot Choco', '../../uploads/product/hot-choco.png', 'hot-choco.png', 'Beverage', 'Active', '2024-06-19 15:25:12.000000'),
(7, 'Brewed Coffee', '../../uploads/product/brewed-coffee.png', 'brewed-coffee.png', 'Beverage', 'Active', '2024-06-19 15:25:42.000000'),
(8, 'CafÃ© Americano', '../../uploads/product/cafe-americano.png', 'cafe-americano.png', 'Beverage', 'Active', '2024-06-19 15:26:25.000000'),
(9, 'Iced Coffee', '../../uploads/product/iced-coffee.png', 'iced-coffee.png', 'Beverage', 'Active', '2024-06-19 15:26:43.000000'),
(10, 'Iced Choco Java', '../../uploads/product/iced-choco-java.png', 'iced-choco-java.png', 'Beverage', 'Active', '2024-06-19 15:27:09.000000'),
(11, 'Iced Latte', '../../uploads/product/iced-latte.png', 'iced-latte.png', 'Beverage', 'Active', '2024-06-19 15:27:40.000000'),
(12, 'Icy Coolers', '../../uploads/product/icy-coolers.png', 'icy-coolers.png', 'Beverage', 'Active', '2024-06-19 15:27:52.000000'),
(13, 'Iced Brewed Tea', '../../uploads/product/iced-brewed-tea.png', 'iced-brewed-tea.png', 'Beverage', 'Active', '2024-06-19 15:28:08.000000'),
(14, 'Tuna', '../../uploads/product/tuna.png', 'tuna.png', 'Bakery', 'Active', '2024-06-19 15:32:08.000000'),
(15, 'Spanish Sausage', '../../uploads/product/spanish-sausage.png', 'spanish-sausage.png', 'Bakery', 'Active', '2024-06-19 15:32:23.000000'),
(16, 'Ham and Cheese', '../../uploads/product/ham-and-cheese.png', 'ham-and-cheese.png', 'Bakery', 'Active', '2024-06-19 15:32:51.000000'),
(17, 'Cheese', '../../uploads/product/cheese.png', 'cheese.png', 'Bakery', 'Active', '2024-06-19 15:33:03.000000'),
(18, 'Bacon Cheesy Mushroom', '../../uploads/product/bacon-cheesy-mushroom.png', 'bacon-cheesy-mushroom.png', 'Bakery', 'Active', '2024-06-19 15:33:20.000000'),
(19, 'Mushroom Madness', '../../uploads/product/mushroom-madness.png', 'mushroom-madness.png', 'Savory', 'Active', '2024-06-19 15:36:17.000000'),
(20, 'Hungarian Sausage', '../../uploads/product/hungarian-sausage.png', 'hungarian-sausage.png', 'Savory', 'Active', '2024-06-19 15:36:38.000000'),
(21, 'Egg and Cheese', '../../uploads/product/egg-and-cheese.png', 'egg-and-cheese.png', 'Savory', 'Active', '2024-06-19 15:36:59.000000'),
(22, 'Chicken Clubhouse', '../../uploads/product/chicken-clubhouse.png', 'chicken-clubhouse.png', 'Savory', 'Active', '2024-06-19 15:37:23.000000'),
(23, 'Cheesy Tuna', '../../uploads/product/cheesy-tuna.png', 'cheesy-tuna.png', 'Savory', 'Active', '2024-06-19 15:37:47.000000'),
(24, 'Cheese Madness', '../../uploads/product/cheese-madness.png', 'cheese-madness.png', 'Savory', 'Active', '2024-06-19 15:38:16.000000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_promo`
--

CREATE TABLE `tbl_promo` (
  `id` int(100) NOT NULL,
  `image_name` varchar(2000) NOT NULL,
  `file_path` varchar(1000) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `description` longtext NOT NULL,
  `promo_from` date NOT NULL,
  `promo_to` date NOT NULL,
  `status` enum('Posted','Unposted') NOT NULL,
  `created` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `uploaded_by` varchar(100) NOT NULL,
  `updated` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `modified_by` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_promo`
--

INSERT INTO `tbl_promo` (`id`, `image_name`, `file_path`, `title`, `description`, `promo_from`, `promo_to`, `status`, `created`, `uploaded_by`, `updated`, `modified_by`) VALUES
(18, 'BEARY IN LOVE.png', '../../uploads/promo/BEARY IN LOVE.png', 'BEARY IN LOVE', 'Check out our exciting local promotions at our Dunkinâ€™ outlets! Enjoy exclusive deals on your favorite Dunkinâ€™ doughnuts and beverages at our locations in Muntinlupa, ParaÃ±aque, Las PiÃ±as, and Quezon province. Whether you\'re craving a classic glazed doughnut or a refreshing iced coffee, our promotions offer something for everyone. Visit our stores or our website to stay updated on the latest offers and indulge in delicious savings. Don\'t miss outâ€”treat yourself today!', '2024-02-12', '2024-02-15', 'Posted', '2024-06-07 11:13:21.000000', '2', '2024-06-21 11:58:45.000000', '7'),
(19, 'EASTER MUNCHKIN DEAL.png', '../../uploads/promo/EASTER MUNCHKIN DEAL.png', 'EASTER MUNCHKIN DEAL', 'Check out our exciting local promotions at our Dunkinâ€™ outlets! Enjoy exclusive deals on your favorite Dunkinâ€™ doughnuts and beverages at our locations in Muntinlupa, ParaÃ±aque, Las PiÃ±as, and Quezon province. Whether you\'re craving a classic glazed doughnut or a refreshing iced coffee, our promotions offer something for everyone.\r\nVisit our stores or our website to stay updated on the latest offers and indulge in delicious savings. Don\'t miss outâ€”treat yourself today!', '2024-03-31', '2024-03-31', 'Posted', '2024-06-07 11:31:13.000000', '2', '2024-06-21 16:40:36.000000', '2'),
(20, 'SUMMER DELIGHT PROMO.png', '../../uploads/promo/SUMMER DELIGHT PROMO.png', 'SUMMER DELIGHT PROMO', 'Check out our exciting local promotions at our Dunkinâ€™ outlets! Enjoy exclusive deals on your favorite Dunkinâ€™ doughnuts and beverages at our locations in Muntinlupa, ParaÃ±aque, Las PiÃ±as, and Quezon province. Whether you\'re craving a classic glazed doughnut or a refreshing iced coffee, our promotions offer something for everyone. \nVisit our stores or our website to stay updated on the latest offers and indulge in delicious savings. Don\'t miss outâ€”treat yourself today!', '2024-04-26', '2024-05-31', 'Posted', '2024-06-07 11:32:04.000000', '2', '2024-06-24 09:50:08.000000', '7');

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
-- Dumping data for table `tbl_promo_hero`
--

INSERT INTO `tbl_promo_hero` (`id`, `image_name`, `file_path`, `title`, `status`, `created`, `uploaded_by`, `updated`, `modified_by`) VALUES
(13, 'slide-1.jpg', '../../uploads/promo/slide-1.jpg', 'Hero Image 1', 'Published', '2024-06-06 17:40:14.000000', '2', '2024-06-06 17:40:14.000000', '2'),
(14, 'slide-2.jpg', '../../uploads/promo/slide-2.jpg', 'Hero Image 2', 'Published', '2024-06-07 09:01:13.000000', '2', '2024-06-07 09:01:13.000000', '2'),
(15, 'slide-3.jpg', '../../uploads/promo/slide-3.jpg', 'Hero Image 3', 'Published', '2024-06-07 09:01:26.000000', '2', '2024-06-07 09:01:26.000000', '2');

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
-- Indexes for table `tbl_applicants`
--
ALTER TABLE `tbl_applicants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_careers_hero`
--
ALTER TABLE `tbl_careers_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_careers_wylwwu`
--
ALTER TABLE `tbl_careers_wylwwu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_home_hero`
--
ALTER TABLE `tbl_home_hero`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_opportunities`
--
ALTER TABLE `tbl_opportunities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_outlet`
--
ALTER TABLE `tbl_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_outlet_menu`
--
ALTER TABLE `tbl_outlet_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promo`
--
ALTER TABLE `tbl_promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_promo_hero`
--
ALTER TABLE `tbl_promo_hero`
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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_activity`
--
ALTER TABLE `tbl_activity`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `tbl_applicants`
--
ALTER TABLE `tbl_applicants`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_careers_hero`
--
ALTER TABLE `tbl_careers_hero`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_careers_wylwwu`
--
ALTER TABLE `tbl_careers_wylwwu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_home_hero`
--
ALTER TABLE `tbl_home_hero`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_opportunities`
--
ALTER TABLE `tbl_opportunities`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_outlet`
--
ALTER TABLE `tbl_outlet`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_outlet_menu`
--
ALTER TABLE `tbl_outlet_menu`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_promo`
--
ALTER TABLE `tbl_promo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_promo_hero`
--
ALTER TABLE `tbl_promo_hero`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
