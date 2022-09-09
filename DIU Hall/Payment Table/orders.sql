-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 11:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rahatvilla`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `student_id` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `amount`, `address`, `status`, `transaction_id`, `currency`, `student_id`, `month`) VALUES
(1, '1', '1', '1', 2500, '1', 'Processing', '62fe22133fc11', 'BDT', '1', 'January Month'),
(2, '1', '1', '1', 2500, '1', 'Pending', '62fe2214568a6', 'BDT', '1', 'January Month'),
(3, '1', '1', '1', 2500, '1', 'Processing', '62fe8035885b5', 'BDT', '1', 'January Month'),
(4, '1', '1', '1', 2500, '1', 'Pending', '62fe803712fbe', 'BDT', '1', 'January Month'),
(5, '1', '1', '1', 2500, '1', 'Processing', '62fe80c5f2c39', 'BDT', '1', 'January Month'),
(6, '1', '1', '1', 2500, '1', 'Pending', '62fe80c728679', 'BDT', '1', 'January Month'),
(7, '1', '1', '1', 2500, '1', 'Processing', '62fe81324f7e6', 'BDT', '1', 'January Month'),
(8, '1', '1', '1', 2500, '1', 'Pending', '62fe81335a009', 'BDT', '1', 'January Month'),
(9, '1', '1', '1', 2500, '1', 'Processing', '62fe8196aea10', 'BDT', '1', 'January Month'),
(10, '1', '1', '1', 2500, '1', 'Pending', '62fe8197c8b01', 'BDT', '1', 'January Month'),
(11, '1', '1', '1', 2500, '1', 'Failed', '62fe82429bc33', 'BDT', '1', 'November Month'),
(12, '1', '1', '1', 2500, '1', 'Pending', '62fe8243b6983', 'BDT', '1', 'November Month'),
(13, '1', '1', '1', 2500, '1', 'Processing', '62fe82579c0d0', 'BDT', '1', 'January Month'),
(14, '1', '1', '1', 2500, '1', 'Pending', '62fe8258adb19', 'BDT', '1', 'January Month');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
