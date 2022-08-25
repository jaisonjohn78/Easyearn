-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2022 at 11:58 AM
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
(12, '', 1, '1', 'https://www.youtube.com/embed/zAlX1V3lK5s', '2022-08-21 09:08:16'),
(13, '', 2, 'sjkdjn', 'https://www.youtube.com/embed/TXdAvH4Pkhk', '2022-08-21 09:08:16'),
(14, 'charul', 0, 'dfbd', 'fdbdfb', '0000-00-00 00:00:00'),
(15, 'charul', 0, 'EFEF', 'WEFE', '0000-00-00 00:00:00'),
(16, 'charul', 4, 'f', 'f', '0000-00-00 00:00:00'),
(17, 'charul', 0, 'egsg', 'grr', '0000-00-00 00:00:00'),
(18, 'charul', 0, 's', 'sf', '0000-00-00 00:00:00'),
(19, 'charul', 0, 's', 'sf', '0000-00-00 00:00:00'),
(20, 'charul', 0, 's', 'sf', '0000-00-00 00:00:00'),
(21, 'charul', 0, 's', 'sf', '0000-00-00 00:00:00'),
(22, 'charul', 0, 's', 'sf', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
