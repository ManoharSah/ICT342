-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 04:28 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
  `temp` int(11) NOT NULL,
  `call_appointment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `calculation`
--
ALTER TABLE `calculation`
  MODIFY `calculation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73059972;

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
