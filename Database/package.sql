-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2022 at 10:52 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easyearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `create_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `username`, `package_name`, `amount`, `create_time`) VALUES
(1, 'tisha', 'Gold Package', 3850, '0000-00-00 00:00:00'),
(2, 'charul', 'Elite Package', 699, '0000-00-00 00:00:00'),
(3, 'yash', 'Elite Package', 699, '0000-00-00 00:00:00'),
(4, 'parth', 'Elite Package', 699, '0000-00-00 00:00:00'),
(5, 'kareena', 'Silver Package', 2250, '0000-00-00 00:00:00'),
(6, 'kareena', 'Silver Package', 2250, '0000-00-00 00:00:00'),
(7, 'kareena', 'Silver Package', 2250, '0000-00-00 00:00:00'),
(8, 'kareena', 'Elite Package', 699, '0000-00-00 00:00:00'),
(9, 'kareena', 'Silver Package', 2250, '0000-00-00 00:00:00'),
(10, 'kareena', 'Elite Package', 699, '0000-00-00 00:00:00'),
(11, 'kareena', 'Elite Package', 699, '0000-00-00 00:00:00'),
(12, 'jainika', 'Elite Package', 699, '0000-00-00 00:00:00'),
(13, 'parita', 'Silver Package', 2250, '0000-00-00 00:00:00'),
(14, 'joy', 'Silver Package', 2250, '0000-00-00 00:00:00'),
(15, 'meet', 'Silver Package', 2250, '0000-00-00 00:00:00'),
(16, 'lalit', 'Gold Package', 2250, '0000-00-00 00:00:00'),
(17, 'joy sir ', 'Silver Package', 3500, '0000-00-00 00:00:00'),
(18, 'deep', 'Elite Package', 2250, '0000-00-00 00:00:00'),
(19, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(20, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(21, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(22, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(23, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(24, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(25, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(26, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(27, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(28, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(29, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(30, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(31, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(32, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(33, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(34, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(35, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(36, 'jaisonnnnn', 'Elite Package', 508, '0000-00-00 00:00:00'),
(37, 'jaisonnnnn', 'Elite Package', 508, '0000-00-00 00:00:00'),
(38, 'jaisonnnnn', 'Elite Package', 508, '0000-00-00 00:00:00'),
(39, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(40, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(41, 'vrajesh', 'Gold Package', 3500, '0000-00-00 00:00:00'),
(42, 'tarun', 'Silver Package', 1999, '0000-00-00 00:00:00'),
(43, 'lalu', 'Silver Package', 1999, '0000-00-00 00:00:00'),
(44, 'jenson', 'Silver Package', 1999, '0000-00-00 00:00:00'),
(45, 'krushil0409', 'Elite Package', 1, '0000-00-00 00:00:00'),
(46, 'krushil0409', 'Elite Package', 1, '0000-00-00 00:00:00'),
(47, 'krushil0409', 'Elite Package', 1, '0000-00-00 00:00:00'),
(48, 'krushil0409', 'Elite Package', 1, '0000-00-00 00:00:00'),
(49, 'krushil0409', 'Elite Package', 1, '0000-00-00 00:00:00'),
(50, 'krushil0409', 'Elite Package', 1, '0000-00-00 00:00:00'),
(51, 'krushil0409', 'Elite Package', 1, '0000-00-00 00:00:00'),
(52, 'krushil0409', 'Elite Package', 1, '0000-00-00 00:00:00'),
(53, 'krushil0409', 'Elite Package', 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
