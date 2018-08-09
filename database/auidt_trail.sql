-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2018 at 03:37 AM
-- Server version: 5.6.36
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myprestasi_uft`
--

-- --------------------------------------------------------

--
-- Table structure for table `jejak_audit`
--

CREATE TABLE IF NOT EXISTS `audit_trail` (
  `trail_id` int(11) NOT NULL,
  `trail_date` varchar(20) DEFAULT NULL,
  `trail_address` varchar(20) DEFAULT NULL,
  `trail_table` varchar(30) DEFAULT NULL,
  `trail_operation` varchar(30) DEFAULT NULL,
  `trail_sql` text,
  `trail_function` varchar(100) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `staff_username` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jejak_audit`
--
ALTER TABLE `audit_trail`
  ADD PRIMARY KEY (`trail_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jejak_audit`
--
ALTER TABLE `audit_trail`
  MODIFY `trail_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
