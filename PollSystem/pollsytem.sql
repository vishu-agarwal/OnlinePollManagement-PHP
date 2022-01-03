-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 03, 2022 at 12:28 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pollsytem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(101, 'Admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `polladmin`
--

CREATE TABLE `polladmin` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `option1` varchar(100) NOT NULL,
  `option2` varchar(100) NOT NULL,
  `option3` varchar(100) NOT NULL,
  `option4` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `polladmin`
--

INSERT INTO `polladmin` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `status`) VALUES
(6, 'In 2022 who may be PM', 'NarendraModi', 'RahulGandhi', 'Kejriwal', 'amitShah', 0),
(8, 'faivorate Hero', 'akshaykumar', 'ajaydevgan', 'govinda', 'hritikroshan', 0),
(9, 'From following in which you are more intested', 'MachineLearning', 'WebDevelopment', 'IOS', 'Android', 1),
(10, 'From where you want to get your MCA degree', 'VNSGU', 'EURO', 'IGNU', 'GTU', 0),
(11, 'Which is your favoirate color ', 'Red', 'Orange', 'White', 'Black', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pollvote`
--

CREATE TABLE `pollvote` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `optionName` varchar(100) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pollvote`
--

INSERT INTO `pollvote` (`id`, `question`, `optionName`, `vote`) VALUES
(9, 'From following in which you are more intested', 'MachineLearning', 2),
(12, 'From following in which you are more intested', 'WebDevelopment', 6),
(13, 'From following in which you are more intested', 'IOS', 3),
(18, 'From following in which you are more intested', 'Android', 4),
(20, 'In 2022 who may be PM', 'Kejriwal', 4),
(21, 'In 2022 who may be PM', 'NarendraModi', 3),
(26, 'faivorate Hero', 'govinda', 6),
(27, 'faivorate Hero', 'hritikroshan', 2),
(28, 'faivorate Hero', 'ajaydevgan', 3),
(29, 'faivorate Hero', 'akshaykumar', 4),
(30, 'In 2022 who may be PM', 'amitShah', 2),
(31, 'In 2022 who may be PM', 'RahulGandhi', 3),
(32, 'From where you want to get your MCA degree', 'EURO', 3),
(34, 'From where you want to get your MCA degree', 'GTU', 1),
(35, 'From where you want to get your MCA degree', 'VNSGU', 2),
(36, 'From where you want to get your MCA degree', 'IGNU', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `polladmin`
--
ALTER TABLE `polladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pollvote`
--
ALTER TABLE `pollvote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `polladmin`
--
ALTER TABLE `polladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pollvote`
--
ALTER TABLE `pollvote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
