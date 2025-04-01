-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2025 at 01:00 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vawc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

DROP TABLE IF EXISTS `cases`;
CREATE TABLE IF NOT EXISTS `cases` (
  `id` int NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `victim_name` varchar(255) NOT NULL,
  `victim_age` int NOT NULL,
  `victim_gender` enum('Male','Female','Other') NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `incident_date` timestamp NOT NULL,
  `incident_type` varchar(255) NOT NULL,
  `incident_location` varchar(255) NOT NULL,
  `perpetrator_name` varchar(255) NOT NULL,
  `perpetrator_relationship` varchar(255) NOT NULL,
  `encoder_name` varchar(255) NOT NULL,
  `status` enum('active','closed','pending') DEFAULT 'active',
  `priority` enum('Low','Medium','High') DEFAULT 'Medium',
  `case_notes` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `created_at`, `victim_name`, `victim_age`, `victim_gender`, `barangay`, `incident_date`, `incident_type`, `incident_location`, `perpetrator_name`, `perpetrator_relationship`, `encoder_name`, `status`, `priority`, `case_notes`) VALUES
(1, '2025-04-01 12:29:24', 'Cyrus Tristan', 10, 'Male', 'Candon', '2025-04-01 04:27:00', 'Child abuse', 'Candon', 'Brix Dean', 'Brother', 'Admin User', 'active', 'High', 'The victim was subjected to abuse by the perpetrator, his brother.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$Wh4Y/6AqxThqA/riruy3.e/byzCesJaoyp/I32lcKWsj8.mTSU5M.', 'admin'),
(2, 'agent1', '$2y$10$0tyF/Gygt4iY3kFuN3Jp6OxoOL9HpV99JfrN5D7eeI/v5.LHMwGua', 'agent');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
