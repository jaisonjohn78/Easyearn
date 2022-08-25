-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 11:59 AM
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
  `profile_photo` varchar(255) NOT NULL DEFAULT 'logo.jpeg',
  `status` int(11) NOT NULL DEFAULT 0,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone_no`, `password`, `city`, `address`, `profile_photo`, `status`, `create_datetime`) VALUES
(1, 'hardik', 'hardikzz0409@gmail.com', '521478963', 'c4ca4238a0b923820dcc509a6f75849b', '', '', '', 0, '0000-00-00 00:00:00'),
(3, 'yash', 'y@gmail.com', '7418529630', 'c4ca4238a0b923820dcc509a6f75849b', '', '', '', 0, '0000-00-00 00:00:00'),
(4, 'krishna', 'k@gamil.com', '258963147', 'c4ca4238a0b923820dcc509a6f75849b', '', '', '', 0, '0000-00-00 00:00:00'),
(5, 'jaison', 'j@gmail.com', '258963147', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, '0000-00-00 00:00:00'),
(6, 'tisha', 't@gmail.com', '351478962', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'WhatsApp Image 2022-01-17 at 2.28.40 PM.jpeg', 0, '0000-00-00 00:00:00'),
(7, 'charul', 'c@gmail.com', '745296300', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'Capture.PNG', 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
