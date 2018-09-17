-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2018 at 12:29 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `calculation`
--

CREATE TABLE `calculation` (
  `calculation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `how_many_now` int(11) NOT NULL,
  `how_many` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `totalcost` double NOT NULL,
  `temp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calculation`
--

INSERT INTO `calculation` (`calculation_id`, `customer_id`, `how_many_now`, `how_many`, `datetime`, `totalcost`, `temp`) VALUES
(16669611, 5, 0, 0, '2018-09-16 05:15:51', 0, 1),
(29160449, 2, 0, 0, '2018-09-16 05:07:11', 0, 1),
(42598100, 1, 10, 2, '2018-09-15 10:36:13', 0, 0),
(62135015, 4, 10, 3, '2018-09-16 05:09:14', 0, 0),
(79752219, 3, 0, 0, '2018-09-16 05:07:23', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `owner` tinyint(1) NOT NULL,
  `position` varchar(255) NOT NULL,
  `notification` tinyint(4) NOT NULL DEFAULT '1',
  `temp` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `bus_name`, `email`, `contact`, `owner`, `position`, `notification`, `temp`) VALUES
(1, 'Manohar', 'Manohar Enterprise', 'manohar@manohar.com', '04260000', 1, 'Boss', 1, 0),
(2, '', '', '', '', 1, '', 1, 1),
(3, '', '', '', '', 1, '', 1, 1),
(4, 'Manohar', 'Manohar Business', 'Manohar@Business.com', '1025654145', 1, 'CEO', 1, 0),
(5, '', '', '', '', 1, '', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `technician_id` int(11) NOT NULL,
  `calculation_id` int(11) NOT NULL,
  `tech_no` decimal(11,2) NOT NULL,
  `wage` decimal(11,2) NOT NULL,
  `productivity` decimal(11,2) NOT NULL,
  `efficiency` decimal(11,2) NOT NULL,
  `hourly_rate` decimal(11,2) NOT NULL,
  `no_of_days` decimal(11,2) NOT NULL,
  `lost_retail` decimal(11,2) NOT NULL,
  `recureiment` decimal(11,2) NOT NULL,
  `onboarding` decimal(11,2) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`technician_id`, `calculation_id`, `tech_no`, `wage`, `productivity`, `efficiency`, `hourly_rate`, `no_of_days`, `lost_retail`, `recureiment`, `onboarding`, `total`, `type`) VALUES
(3, 42598100, '0.00', '60000.00', '100.00', '100.00', '120.00', '10.00', '9120.00', '6000.00', '4140.48', '19260.48', 1),
(4, 42598100, '0.00', '65000.00', '100.00', '120.00', '102.00', '20.00', '18604.80', '6500.00', '3519.41', '28624.21', 1),
(8, 62135015, '0.00', '100000.00', '110.00', '120.00', '120.00', '12.00', '14446.08', '10000.00', '4140.48', '28586.56', 3),
(9, 62135015, '0.00', '95000.00', '125.00', '112.00', '108.00', '15.00', '17236.80', '9500.00', '3726.43', '30463.23', 2),
(10, 62135015, '0.00', '110000.00', '130.00', '125.00', '130.00', '30.00', '48165.00', '11000.00', '4485.52', '63650.52', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calculation`
--
ALTER TABLE `calculation`
  ADD PRIMARY KEY (`calculation_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`technician_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calculation`
--
ALTER TABLE `calculation`
  MODIFY `calculation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79752220;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `technician_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
