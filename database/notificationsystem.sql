-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2022 at 11:27 PM
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
-- Database: `notificationsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `ID` int(11) NOT NULL,
  `LocationName` varchar(50) DEFAULT NULL,
  `Message` varchar(50) DEFAULT NULL,
  `Status` varchar(50) DEFAULT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`ID`, `LocationName`, `Message`, `Status`, `Timestamp`) VALUES
(1, 'mersing', 'Berlaku Kebakaran di Endau', '0', '2022-10-05 20:03:44'),
(2, 'kluang', 'Berlaku Kebakaran di Kluang', '1', '2022-10-05 20:21:40'),
(3, 'kluang', 'Berlaku Kebakaran di Jalan Kluang', '1', '2022-10-05 20:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Password_Hash` varchar(50) DEFAULT NULL,
  `Selector_Hash` varchar(50) DEFAULT NULL,
  `Is_Expired` varchar(50) DEFAULT '0',
  `DeviceName` varchar(50) DEFAULT NULL,
  `Expired_Date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`ID`, `UserName`, `Password_Hash`, `Selector_Hash`, `Is_Expired`, `DeviceName`, `Expired_Date`) VALUES
(1, 'Admin', '$2y$10$ob7yPWJr6hJzZGxShjUUAeS4RGN.jcm2wMCfxJpQczw', '$2y$10$eGBoagfY/yTxdfsZnlgXqeuq8gFOVNSkk0z2K9FEScV', '0', NULL, '2022-11-04 14:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(50) DEFAULT NULL,
  `UserName` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Phone` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Privilege` varchar(50) DEFAULT 'User',
  `LocationAccess` varchar(50) DEFAULT NULL,
  `Picture` varchar(60) DEFAULT NULL,
  `Desciption` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `FullName`, `UserName`, `Password`, `Phone`, `Email`, `Privilege`, `LocationAccess`, `Picture`, `Desciption`) VALUES
(1, 'Admin', 'Admin', 'admin08', '01123456789', 'admin@gmail.com', 'Admin', 'MERSING', 'img/noprofil.jpg', ''),
(2, 'user', 'user', 'user1234', '01123456789', 'user@gmail.com', 'User', 'BATU PAHAT', 'img/noprofil.jpg', ''),
(3, 'Danesh', 'danesh', 'danesh', '01123456789', 'danesh@gmail.com', 'User', 'KLUANG', ' img/danesh - 2022.10.05 - 09.13.33pm.png', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
