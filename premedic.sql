-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 12:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `premedic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `aid` varchar(255) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `pEmail` varchar(255) NOT NULL,
  `pPhone` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `aid`, `pName`, `department`, `doctor`, `date`, `time`, `pEmail`, `pPhone`, `msg`, `status`) VALUES
(1, 'APT-0001', '1', '3', '1', '0000-00-00', '02:06:00', 'sambhabdas2@gmail.com', '8637258307', 'hii', 1),
(2, 'APT-0001', '2', '3', '', '0000-00-00', '02:06:00', 'sambhabdas2@gmail.com', '8637258307', 'hii', 1),
(3, 'APT-0001', '1', '3', '1', '0000-00-00', '02:08:00', 'sambhabdas2@gmail.com', '8637258307', 'hii', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `status`) VALUES
(2, 'Cardiology', 'Cardio', 1),
(3, 'demo', 'htrhrt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `dfName` varchar(255) NOT NULL,
  `dlName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `dfName`, `dlName`, `email`, `dob`, `gender`, `address`, `phone`, `avatar`, `department`, `bio`, `status`) VALUES
(1, 'Sambhab', 'Das', 'sambhabdas2@gmail.com', '2022', 'on', 'new', '8637258307', '', '3', '', 0),
(2, 'Sambhab', 'Das', 'sambhabdas2@gmail.com', '2022', 'on', 'new', '8637258307', '', '3', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `fName`, `lName`, `email`, `password`, `dob`, `age`, `gender`, `address`, `phone`, `status`) VALUES
(1, 'Sambhab', 'Das', 'sambhabdas2@gmail.com', '546', '12/03/2023', '10', 'on', 'new', '8637258307', 0),
(2, 'Sambhab', 'Das', 'sambhab.yunay@gmail.com', '324', '10/11/2003', '20', 'on', 'new', '8637258307', 0),
(3, 'Sambhab', 'Das', 'sambhab.yunay@gmail.com', '324', '10/11/2003', '20', 'on', 'new', '8637258307', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
