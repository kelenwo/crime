-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2021 at 02:05 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crime_mapping`
--

-- --------------------------------------------------------

--
-- Table structure for table `crime_report`
--

DROP TABLE IF EXISTS `crime_report`;
CREATE TABLE IF NOT EXISTS `crime_report` (
  `id` int(70) NOT NULL AUTO_INCREMENT,
  `type` varchar(70) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `location` varchar(256) COLLATE utf8_bin NOT NULL,
  `latitude` varchar(70) COLLATE utf8_bin NOT NULL,
  `longitude` varchar(70) COLLATE utf8_bin NOT NULL,
  `distance` int(20) NOT NULL,
  `report_by` varchar(70) COLLATE utf8_bin NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `verify` varchar(20) COLLATE utf8_bin NOT NULL,
  `report_id` varchar(70) COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL,
  `time` varchar(70) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `crime_report`
--

INSERT INTO `crime_report` (`id`, `type`, `description`, `location`, `latitude`, `longitude`, `distance`, `report_by`, `status`, `verify`, `report_id`, `date`, `time`) VALUES
(14, 'Arson', 'A man assaulted a lady', 'Engineering Market', '5.043048', '7.973050', 0, 'Kelvin Elenwo', 'active', '', '1620720861', '2021-05-11', '08:05:21');

-- --------------------------------------------------------

--
-- Table structure for table `crime_review`
--

DROP TABLE IF EXISTS `crime_review`;
CREATE TABLE IF NOT EXISTS `crime_review` (
  `id` int(70) NOT NULL AUTO_INCREMENT,
  `title` varchar(70) COLLATE utf8_bin NOT NULL,
  `status` varchar(70) COLLATE utf8_bin NOT NULL,
  `review` varchar(256) COLLATE utf8_bin NOT NULL,
  `review_by` varchar(70) COLLATE utf8_bin NOT NULL,
  `date` varchar(20) COLLATE utf8_bin NOT NULL,
  `time` varchar(70) COLLATE utf8_bin NOT NULL,
  `report_id` varchar(70) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `crime_review`
--

INSERT INTO `crime_review` (`id`, `title`, `status`, `review`, `review_by`, `date`, `time`, `report_id`) VALUES
(1, 'This report is true and correct', 'genuine', 'I witnessed this crime myself as i was available at the crime scene.', 'Kelvin Elenwo', '06-05-2021', '15:05 PM', '1620313517'),
(2, 'This report is true and correct', 'genuine', 'I witnessed this crime myself as i was available at the crime scene.', 'Kelvin Elenwo', '07-05-2021', '12:05 PM', '1620313517');

-- --------------------------------------------------------

--
-- Table structure for table `map_data`
--

DROP TABLE IF EXISTS `map_data`;
CREATE TABLE IF NOT EXISTS `map_data` (
  `id` int(70) NOT NULL AUTO_INCREMENT,
  `blocks` varchar(70) COLLATE utf8_bin NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(10,8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `map_data`
--

INSERT INTO `map_data` (`id`, `blocks`, `latitude`, `longitude`) VALUES
(1, 'Engineering Faculty', '5.03321400', '7.96912300'),
(2, 'Male Presidential Hostel (MPH)', '5.04217600', '7.97308500'),
(3, 'Female Presidential Hostel (FPH)', '5.04321400', '7.97373300'),
(4, 'Health Center (HC)\r\n', '5.03610230', '7.97469720'),
(5, 'Post Graduate School', '5.03597280', '7.97548350'),
(6, '250 Capacity Lecture Theatre', '5.03994350', '7.97332090'),
(7, 'Engineering Lecture Theatre (ELF)', '5.04028080', '7.97512340'),
(8, 'Y Building (PTDF)		', '5.04147600', '7.97593900'),
(9, 'Engineering Lab (1)', '5.04190500', '7.97513300'),
(10, 'Engineering Lab (2)	', '5.04206300', '7.97528900'),
(11, 'Science Faculty', '5.04027600', '7.97928900'),
(12, 'Mathematics/Computer Science Department', '5.04162900', '7.97847800'),
(13, '1000 Capacity Lecture Theatre', '5.04251100', '7.97837300'),
(14, 'Faculty of Agriculture	', '5.04515700', '7.97773000'),
(15, 'Engineering Market	', '5.04303800', '7.97301000'),
(16, 'Convocation Arena', '5.03920100', '7.97799800'),
(17, 'Main Campus Library', '5.04033700', '7.97705100'),
(18, 'Physical Planning', '5.04378000', '7.97537000'),
(19, 'Science Market', '5.03904800', '7.98038200'),
(20, 'Department of Geoscience		', '5.03875000', '7.98098300'),
(21, 'Alumni Center', '5.03950300', '7.97593200'),
(22, 'Multi-Purpose Hall', '5.03921600', '7.97880600'),
(23, 'Administration Block', '5.03840400', '7.97677900'),
(24, 'New Engineering Class Block (NECB)', '5.03935500', '7.97582500'),
(25, 'Zinox Lab', '5.04128700', '7.97487400');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(70) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_bin NOT NULL,
  `email` varchar(70) COLLATE utf8_bin NOT NULL,
  `phone` varchar(18) COLLATE utf8_bin NOT NULL,
  `password` varchar(256) COLLATE utf8_bin NOT NULL,
  `rights` varchar(20) COLLATE utf8_bin NOT NULL,
  `account_status` varchar(20) COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL,
  `last_login` varchar(70) COLLATE utf8_bin NOT NULL,
  `auth` varchar(256) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `rights`, `account_status`, `date`, `last_login`, `auth`) VALUES
(5, 'Kelvin Elenwo', 'kelenwo6@gmail.com', '08132336635', '$2y$10$ijBQgDOzE3CjBqlpTMnBaeLdmTv5DS2RRTGOQMS3UHEE/3TidSt96', 'administrator', 'active', '24/04/2021', '', '0'),
(11, 'kalu miracle', 'kelenwo68@gmail.com', '08132336635', '$2y$10$qC1KNL//0suPuNBIiBP2.enaLe3kpyFr2Sq3/Kr8.1nK29NvuoLJW', 'user', 'pending', '16/05/2021', '', 'a31981ccfb4c4e9653c55fa787dfaace');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
