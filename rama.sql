-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2018 at 04:29 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rama`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `ID` int(11) NOT NULL,
  `AMOUNT` int(40) NOT NULL,
  `DATE_E` date NOT NULL,
  `UID` int(10) NOT NULL,
  `DESCRIPTION` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CREATED_BY` int(11) NOT NULL,
  `STATUS` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `money`
--

CREATE TABLE `money` (
  `ID` int(11) NOT NULL,
  `AMOUNT` int(40) NOT NULL,
  `AMOUNT_RECEIVED` varchar(100) NOT NULL,
  `AMOUNT_AT` varchar(100) NOT NULL,
  `DATE_M` date NOT NULL,
  `BALANCE` int(50) NOT NULL,
  `UID` int(10) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CREATED_BY` int(11) NOT NULL,
  `STATUS` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `money`
--

INSERT INTO `money` (`ID`, `AMOUNT`, `AMOUNT_RECEIVED`, `AMOUNT_AT`, `DATE_M`, `BALANCE`, `UID`, `CREATED_AT`, `CREATED_BY`, `STATUS`) VALUES
(1, 1000, 'lala', 'shop', '2018-12-21', 1000, 11, '2018-12-15 15:28:45', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(64) NOT NULL,
  `USERNAME` varchar(64) NOT NULL,
  `CURRENT_QTY` int(50) NOT NULL,
  `PASSWORD` varchar(64) NOT NULL,
  `PHONE_NUMBER` varchar(16) NOT NULL,
  `SALT` varchar(32) NOT NULL,
  `TYPE` tinyint(1) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `STATUS` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `NAME`, `USERNAME`, `CURRENT_QTY`, `PASSWORD`, `PHONE_NUMBER`, `SALT`, `TYPE`, `CREATED_BY`, `CREATED_AT`, `STATUS`) VALUES
(11, 'User-Operator', 'operator', 1000, '7003f00836316a5cbf942ac1c7e6749c93fcd83c6d6dccae4dae2331d3050a23', '23131', 'dd3d6dd68b30826c', 2, 0, '2018-12-15 15:28:09', 1),
(10, 'admin', 'admin', 0, 'c3c79ea4b89a8340210cd03121ccb227bd4a078f2c3468bdc1afd65c4156d248', '23423442', 'df04b3bf2f0c58a8', 1, 0, '2018-12-15 13:36:41', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `money`
--
ALTER TABLE `money`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
