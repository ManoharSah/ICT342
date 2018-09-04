-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2018 at 02:28 AM
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
-- Database: `solutionsculture`
--

-- --------------------------------------------------------

--
-- Table structure for table `calculator`
--

CREATE TABLE `calculator` (
  `Calculation Number` int(255) NOT NULL,
  `Customer ID` int(255) NOT NULL,
  `Date` date NOT NULL,
  `Total Cost` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calculator`
--

INSERT INTO `calculator` (`Calculation Number`, `Customer ID`, `Date`, `Total Cost`) VALUES
(1, 1, '2018-08-28', 82382),
(2, 2, '2018-08-29', 27601);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer Id` int(255) NOT NULL,
  `Name` char(255) NOT NULL,
  `Business Name` varchar(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Phone Number` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer Id`, `Name`, `Business Name`, `Position`, `Email`, `Phone Number`) VALUES
(1, 'Simran', 'Parmar Motors', 'Manager', 'someone25@gmail.com', 0),
(2, 'Prabhjot', 'Pannu Motors', 'Manager', 'someone1@yahoo.com', 1111111111);

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `Technician Id` int(255) NOT NULL,
  `Technician Annual wage` int(255) NOT NULL,
  `Technicians Productivity` int(255) NOT NULL,
  `Efficiency Results` int(255) NOT NULL,
  `Business Hourly Rate` int(255) NOT NULL,
  `Number of Days Position Vacant` int(255) NOT NULL,
  `Technician number` int(255) NOT NULL,
  `Calculation Number` int(255) NOT NULL,
  `Lost retail labour Amounts` int(255) NOT NULL,
  `Onboarding Costs` int(255) NOT NULL,
  `Recruitment Costs` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`Technician Id`, `Technician Annual wage`, `Technicians Productivity`, `Efficiency Results`, `Business Hourly Rate`, `Number of Days Position Vacant`, `Technician number`, `Calculation Number`, `Lost retail labour Amounts`, `Onboarding Costs`, `Recruitment Costs`) VALUES
(1, 100000, 98, 113, 180, 45, 3, 1, 68172, 6211, 8000),
(2, 55000, 100, 100, 200, 10, 1, 2, 15200, 6901, 5500);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calculator`
--
ALTER TABLE `calculator`
  ADD PRIMARY KEY (`Calculation Number`),
  ADD KEY `Customer ID` (`Customer ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer Id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`Technician Id`),
  ADD KEY `Calculator Id` (`Calculation Number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
