-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 04:58 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `update` (IN `BId` INT)  NO SQL
SELECT bicycle.Gears FROM bicycle where bicycle.BId=BId$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bicycle`
--

CREATE TABLE `bicycle` (
  `BId` int(10) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Price` int(10) DEFAULT NULL,
  `Gears` varchar(20) DEFAULT NULL,
  `Stock` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bicycle`
--

INSERT INTO `bicycle` (`BId`, `Name`, `Price`, `Gears`, `Stock`) VALUES
(123, 'Hercules', 60, 'Yes', '1'),
(124, 'Hercules', 80, 'No', 'Out of stock');

-- --------------------------------------------------------

--
-- Table structure for table `cost`
--

CREATE TABLE `cost` (
  `time` int(11) DEFAULT NULL,
  `Gears` varchar(10) DEFAULT NULL,
  `rent_amt` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cost`
--

INSERT INTO `cost` (`time`, `Gears`, `rent_amt`) VALUES
(30, 'Yes', 60),
(30, 'No', 80),
(60, 'Yes', 120),
(60, 'No', 160),
(90, 'Yes', 180),
(90, 'No', 240),
(120, 'Yes', 240),
(120, 'No', 320);

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `uname` varchar(40) DEFAULT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `phno` int(10) DEFAULT NULL,
  `Address` varchar(50) NOT NULL,
  `ID_Proof` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`uname`, `Name`, `phno`, `Address`, `ID_Proof`) VALUES
('dhruvil@gmail.com', 'Dhruvil Shah', 2147483647, 'A-block, room no.  211,kumardh', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `uname` varchar(40) NOT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`uname`, `password`) VALUES
('admin', 'admin123'),
('dattakiran52@gmail.com', 'datta'),
('dhruvil@gmail.com', 'dhruvil'),
('sathvik@gmail.com', 's');

--
-- Triggers `login_info`
--
DELIMITER $$
CREATE TRIGGER `update` AFTER INSERT ON `login_info` FOR EACH ROW INSERT INTO logs_update (uname) VALUES(NEW.uname)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `logs_update`
--

CREATE TABLE `logs_update` (
  `log_id` int(11) NOT NULL,
  `uname` varchar(40) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs_update`
--

INSERT INTO `logs_update` (`log_id`, `uname`, `date`) VALUES
(1, 'dhruvil@gmail.com', '2019-11-23 17:13:35'),
(2, 'dattakiran52@gmail.com', '2019-11-30 04:33:24'),
(3, 'sathvik@gmail.com', '2019-11-30 04:48:09');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `uname` varchar(20) DEFAULT NULL,
  `BId` int(10) DEFAULT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `phno` varchar(10) DEFAULT NULL,
  `ID_Proof` varchar(10) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `cost` int(10) DEFAULT NULL,
  `Payment` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`uname`, `BId`, `Name`, `phno`, `ID_Proof`, `time`, `cost`, `Payment`) VALUES
('dhruvil@gmail.com', 124, 'Dhruvil Shah', '2147483647', '2147483647', 30, 60, 'Done'),
('dhruvil@gmail.com', 124, 'Dhruvil Shah', '2147483647', '2147483647', 30, 60, 'Done'),
('dhruvil@gmail.com', 123, 'Dhruvil Shah', '2147483647', '2147483647', 30, 45, 'Done'),
('dhruvil@gmail.com', 123, 'Dhruvil Shah', '2147483647', '2147483647', 60, 120, 'Done'),
('dhruvil@gmail.com', 124, 'Dhruvil Shah', '2147483647', '2147483647', 30, 60, 'Done'),
('dhruvil@gmail.com', 124, 'Dhruvil Shah', '2147483647', '2147483647', 60, 120, 'Pending'),
('dhruvil@gmail.com', 124, 'Dhruvil Shah', '2147483647', '2147483647', 60, 120, 'Pending'),
('dattakiran52@gmail.c', 123, '', '', '', 60, 120, 'Pending'),
('sathvik@gmail.com', 123, '', '', '', 60, 120, 'Done');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bicycle`
--
ALTER TABLE `bicycle`
  ADD PRIMARY KEY (`BId`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`ID_Proof`);

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`uname`);

--
-- Indexes for table `logs_update`
--
ALTER TABLE `logs_update`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD KEY `BId` (`BId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs_update`
--
ALTER TABLE `logs_update`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `time`
--
ALTER TABLE `time`
  ADD CONSTRAINT `time_ibfk_1` FOREIGN KEY (`BId`) REFERENCES `bicycle` (`BId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
