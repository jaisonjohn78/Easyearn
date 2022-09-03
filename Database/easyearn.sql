-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 11:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `holder_name` varchar(255) NOT NULL,
  `account_no` int(11) NOT NULL,
  `ifsc_code` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id`, `username`, `bank_name`, `holder_name`, `account_no`, `ifsc_code`, `branch`, `status`, `create_datetime`) VALUES
(4, 'hardik', 'hhhu', 'hh', 573, 'hh', 'j', 0, '0000-00-00 00:00:00'),
(5, 'jaison', 'hhhu', 'hh', 453, 'hh', 'j', 1, '0000-00-00 00:00:00');

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
(2, 'j@gmail.com', 'Elite Package', 699, '0000-00-00 00:00:00'),
(3, 'j2', 'Elite Package', 699, '0000-00-00 00:00:00'),
(4, 'j3', 'Silver Package', 2250, '0000-00-00 00:00:00'),
(5, 'j1', 'Silver Package', 2250, '0000-00-00 00:00:00'),
(6, 't22', 'Silver Package', 2250, '0000-00-00 00:00:00'),
(7, 'Jaison John', 'Gold Package', 3850, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_photo` varchar(255) NOT NULL DEFAULT 'logo.png',
  `status` int(11) NOT NULL DEFAULT 0,
  `package` varchar(255) NOT NULL DEFAULT '0',
  `create_datetime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone_no`, `password`, `city`, `address`, `profile_photo`, `status`, `package`, `create_datetime`) VALUES
(1, 'hardik', 'hardikzz0409@gmail.com', '521478963', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, '0', '0000-00-00 00:00:00'),
(3, 'yash', 'y@gmail.com', '7418529630', 'c4ca4238a0b923820dcc509a6f75849b', '', '', '', 0, '0', '0000-00-00 00:00:00'),
(4, 'krishna', 'k@gamil.com', '258963147', 'c4ca4238a0b923820dcc509a6f75849b', '', '', '', 0, '0', '0000-00-00 00:00:00'),
(5, 'jaison', 'j@gmail.com', '258963147', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.png', 0, 'success', '0000-00-00 00:00:00'),
(6, 'tisha', 't@gmail.com', '351478962', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'WhatsApp Image 2022-01-17 at 2.28.40 PM.jpeg', 0, '0', '0000-00-00 00:00:00'),
(7, 'j@gmail.com', 'jaisonjohn78.com@gmail.com', '9999999999', '202cb962ac59075b964b07152d234b70', '', '', '', 0, '0', '0000-00-00 00:00:00'),
(8, 'j2', 'j2@gmail.com', '123', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.png', 0, '699', 'August 22, 2022 9:34:34 am'),
(9, 'j3', 'j3@gmail.com', '123', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.png', 0, '2250', 'August 22, 2022 9:36:39 am'),
(10, 'j1', 'j1@gmail.com', '8695975444', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.png', 0, '', 'August 25, 2022 11:07:15 am'),
(11, 't22', 't22@gmail.com', '5454', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.png', 0, '2250', 'August 25, 2022 11:36:03 am'),
(12, 'Jaison John', 'jjj@gmail.com', '44', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.png', 0, '3850', 'August 25, 2022 11:52:49 am');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lectureid` int(11) NOT NULL,
  `lecture_title` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `username`, `lectureid`, `lecture_title`, `course`, `create_datetime`) VALUES
(12, '', 1, '1st upload', 'https://www.youtube.com/embed/zAlX1V3lK5s', '2022-08-22 03:44:53'),
(13, '', 2, 'sjkdjn', 'https://www.youtube.com/embed/TXdAvH4Pkhk', '2022-08-22 03:44:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
