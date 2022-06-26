-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 05:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voter-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userName`, `password`) VALUES
(1, 'Manisha', 'Annu');

-- --------------------------------------------------------

--
-- Table structure for table `party`
--

CREATE TABLE `party` (
  `id` int(50) NOT NULL,
  `pName` varchar(255) NOT NULL,
  `pl` varchar(255) NOT NULL,
  `pLogo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `party`
--

INSERT INTO `party` (`id`, `pName`, `pl`, `pLogo`) VALUES
(18, 'congress', 'rahul ', 'WIN_20200320_13_55_49_Pro.jpg'),
(19, 'congress', 'NDA', 'WIN_20190921_17_43_16_Pro.jpg'),
(21, 'HDA', 'rahul ', 'WIN_20200320_12_07_05_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `voter`
--

CREATE TABLE `voter` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `vId` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voter`
--

INSERT INTO `voter` (`id`, `Name`, `fName`, `dob`, `phone`, `email`, `address`, `vId`, `img`) VALUES
(13, 'BHAKURAHAR WARD NO-16', 'xzxczx', '2020-12-10', '9840857815', 'newemailhai.12q@gmail.com', 'BHAKURAHAR', '1111', 'WIN_20190617_05_17_39_Pro.jpg'),
(14, 'sachida', 'Babu', '2020-12-09', '9840857815', 'sachidanand.code@gmail.com', 'BHAKURAHAR', '101', 'WIN_20190902_12_30_29_Pro.jpg'),
(15, 'rajja', 'ddddd', '2020-12-02', '7700871679', 'sachidanand.code@gmail.com', 'BHAKURAHAR', '1', 'WIN_20190902_12_30_29_Pro.jpg'),
(16, 'kajal', 'ddddd', '2020-11-30', '9840857815', 'sachidanand.code@gmail.com', 'BHAKURAHAR', '2', 'WIN_20190902_12_30_50_Pro.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(50) NOT NULL,
  `vId` varchar(255) NOT NULL,
  `vName` varchar(255) NOT NULL,
  `party` varchar(255) NOT NULL,
  `voted` varchar(255) NOT NULL DEFAULT 'Voted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `vId`, `vName`, `party`, `voted`) VALUES
(2, '2', 'userAdmin', 'congress', ''),
(3, '1', 'Ram', 'BJP', ''),
(7, '1111', 'sachida nand ray', 'congress', 'Voted'),
(8, '101', 'userAdmin', 'HDA', 'Voted');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `party`
--
ALTER TABLE `party`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voter`
--
ALTER TABLE `voter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `party`
--
ALTER TABLE `party`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `voter`
--
ALTER TABLE `voter`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
