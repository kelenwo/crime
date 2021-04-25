-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2021 at 12:07 PM
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
  `report_by` varchar(70) COLLATE utf8_bin NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `date` varchar(70) COLLATE utf8_bin NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `crime_report`
--

INSERT INTO `crime_report` (`id`, `type`, `description`, `location`, `report_by`, `status`, `date`, `time`) VALUES
(2, 'Exam Malpractice', '    A student was caught cheating', 'Faculty of Science, University of Uyo Main Campus, Offot 11, Uyo, Nigeria', 'kelenwo68@gmail.com', 'active', '25-04-2021', '838:59:59');

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
  `date` varchar(70) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `rights`, `date`) VALUES
(5, 'Kelvin Elenwo', 'kelenwo68@gmail.com', '08132336635', '$2y$10$ijBQgDOzE3CjBqlpTMnBaeLdmTv5DS2RRTGOQMS3UHEE/3TidSt96', 'admin', '24/04/2021');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
