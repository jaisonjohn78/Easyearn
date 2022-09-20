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
  `amount` int(11) NOT NULL,
  `create_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `package` varchar(255) NOT NULL DEFAULT '0',
  `code` varchar(255) NOT NULL,
  `reference_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone_no`, `password`, `city`, `address`, `profile_photo`, `status`, `amount`, `create_datetime`, `package`, `code`, `reference_id`) VALUES
(1, 'hardik', 'hardikzz0409@gmail.com', '521478963', 'c4ca4238a0b923820dcc509a6f75849b', '', '', '', 1, 800, '2022-09-20 05:02:02', 'success', '', 'hhhh'),
(3, 'yash', 'y@gmail.com', '7418529630', 'c4ca4238a0b923820dcc509a6f75849b', '', '', '', 0, 800, '2022-09-20 05:02:15', '0', '', 'asjkxjkj'),
(4, 'krishna', 'k@gamil.com', '258963147', 'c4ca4238a0b923820dcc509a6f75849b', '', '', '', 0, 800, '2022-09-20 05:02:20', '0', '', 'asjkxjkjh'),
(5, 'jaison', 'j@gmail.com', '258963147', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 800, '2022-09-20 05:02:23', '0', '', 'asjkxjkju'),
(6, 'tisha', 't@gmail.com', '351478962', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'WhatsApp Image 2022-01-17 at 2.28.40 PM.jpeg', 0, 800, '2022-09-20 05:02:39', '0', '', 'asjkxjkjl'),
(7, 'charul', 'c@gmail.com', '745296300', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'Capture.PNG', 1, 800, '2022-09-20 05:02:44', '0', '', 'asjkxjkjd'),
(8, 'yash', 'yash@gmail.com', '6325789410', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 800, '2022-09-20 05:02:47', 'success', '', 'asjkxjkj4'),
(9, 'parth', 'parth@gmail.com', '7845123690', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 800, '2022-09-20 05:02:50', 'success', '', 'asjkxjkj6'),
(16, 'kareena', 'karrena@gmail.com', '856932144', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 800, '2022-09-20 05:02:53', '699', '', 'asjkxjkj7'),
(17, 'jainika', 'jay@gmail.com', '752369841', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 800, '2022-09-20 05:02:57', '699', '', 'asjkxjkj8'),
(18, 'parita', 'pari@gmail.com', '5236987410', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 800, '2022-09-20 05:03:00', '2250', '68e21cb8a0536e91baa86777f1c050c6', 'asjkxjkj9'),
(19, 'joy', 'joy@gmaiocom', '5487963210', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 800, '2022-09-20 05:03:03', '2250', '5383ec331296f3134eb480923e7bdd74', 'asjkxjkj2'),
(20, 'meet', 'meet@gmail.om', '854712369', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 400, '2022-09-13 09:08:08', '2250', '', 'T2Fssd47'),
(21, 'lalit', 'lalu@gmail.com', '9632587410', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 400, '2022-09-13 08:48:23', '2250', '', 'T2Fssd4o'),
(22, 'joy sir ', 'jj@gmail.com', '589632147', '202cb962ac59075b964b07152d234b70', '', '', 'logo.jpeg', 0, 400, '2022-09-19 08:45:19', 'success', '', 'T2Fssd4a'),
(23, 'deep', 'deep@gmail.com', '8529746310', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 100, '2022-09-19 08:48:08', 'success', '', 'TzLFIJ4o'),
(25, 'vrajesh', 'vr@gmail.com', '874521369', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 0, '2022-09-19 08:47:05', 'success', '', 'walRXvQ1'),
(26, 'tarun', 'tr@gmail.com', '5203698741', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 0, '2022-09-14 14:47:26', '1999', 'c40ffa6e7e96bb339b12b88a6f6b68af', '3NHWU8SQ'),
(27, 'lalu', 'll@gmail.com', '8547123069', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 0, '2022-09-19 08:46:01', '1999', '', 'F5s3mHah'),
(28, 'jenson', 'jen@gmail.com', '7412589630', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'logo.jpeg', 0, 0, '2022-09-16 09:13:55', '1999', '1e3b899c4debfbaa86d407f01a1fa89d', '17IlV6zc');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
