-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2020 at 07:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websyslab9`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `crn` int(11) NOT NULL,
  `prefix` varchar(4) NOT NULL,
  `number` smallint(4) NOT NULL,
  `title` varchar(255) NOT NULL,
  `section` int(2) NOT NULL,
  `year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`crn`, `prefix`, `number`, `title`, `section`, `year`) VALUES
(11111, 'ITWS', 1000, 'Example IT', 1, 2020),
(22222, 'MGMT', 1200, 'Example Mgmt', 2, 2020),
(33333, 'CSCI', 1300, 'Example CS', 3, 2020),
(40331, 'CSCI', 4380, 'Database Systems', 2, 2020),
(40377, 'CSCI', 1200, 'Data Structures', 1, 2020),
(41336, 'CSCI', 2300, 'Intro to Algorithms', 1, 2020),
(43532, 'PSYC', 4730, 'Positive Psychology', 1, 2020),
(44444, 'ITWS', 9999, 'Example IT 2', 9, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `crn` int(11) DEFAULT NULL,
  `RIN` int(9) DEFAULT NULL,
  `grade` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `crn`, `RIN`, `grade`) VALUES
(1, 11111, 123456789, 89),
(2, 11111, 661970715, 91),
(3, 11111, 234567890, 67),
(4, 11111, 987654321, 98),
(5, 40331, 123456789, 76),
(6, 40331, 234567890, 85),
(7, 40331, 661970715, 88),
(8, 41336, 123456789, 93),
(9, 41336, 987654321, 86),
(10, 43532, 661970715, 72);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `RIN` int(9) NOT NULL,
  `RCSID` char(7) DEFAULT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `alias` varchar(100) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`RIN`, `RCSID`, `fname`, `lname`, `alias`, `phone`, `street`, `city`, `state`, `zip`) VALUES
(123456789, 'doej', 'John', 'Doe', '', 1234567, '1 Main St', 'New York', 'NY', 10001),
(234567890, 'smithp', 'Paul', 'Smith', '', 7654321, '2 Center St', 'Boston', 'MA', 99999),
(661970715, 'riggss', 'Shane', 'Riggs', '', 5510062, '19 S Pascack Rd', 'Pearl River', 'NY', 10965),
(987654321, 'example', 'Person', 'Examplep', '', 8765432, '27 3rd St', 'Houston', 'TX', 45678);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`crn`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `crn` (`crn`),
  ADD KEY `RIN` (`RIN`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`RIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`crn`) REFERENCES `courses` (`crn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`RIN`) REFERENCES `students` (`RIN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
