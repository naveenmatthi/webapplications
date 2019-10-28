-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 09:23 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance table`
--

CREATE TABLE `attendance table` (
  `stuid` varchar(20) NOT NULL,
  `courseid` varchar(20) NOT NULL,
  `attendancepercentage` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance table`
--

INSERT INTO `attendance table` (`stuid`, `courseid`, `attendancepercentage`) VALUES
('162034009', '023', '82'),
('182034009', '123', '92');

-- --------------------------------------------------------

--
-- Table structure for table `coursetable`
--

CREATE TABLE `coursetable` (
  `courseid` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `specified to` varchar(15) NOT NULL,
  `facultyid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetable`
--

INSERT INTO `coursetable` (`courseid`, `name`, `specified to`, `facultyid`) VALUES
('023', 'c language', 'BTech', ''),
('024', 'java', 'BTech', '456910'),
('025', 'iot', 'BTech', ''),
('026', 'cloud computing', 'BTech', ''),
('027', 'artifical intilengen', 'BTech', ''),
('028', 'computer networks', 'BTech', ''),
('123', 'df', 'MTech', ''),
('124', 'malware analysis', 'MTech', ''),
('125', 'infracture attacks', 'MTech', ''),
('126', 'cryptography attacks', 'MTech', ''),
('127', 'scada', 'MTech', ''),
('128', 'software security', 'MTech', '');

-- --------------------------------------------------------

--
-- Table structure for table `degree table`
--

CREATE TABLE `degree table` (
  `departmants present` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty data`
--

CREATE TABLE `faculty data` (
  `id` varchar(20) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `date of birth` date NOT NULL,
  `gender` varchar(30) NOT NULL DEFAULT 'male',
  `degree` varchar(30) NOT NULL,
  `joiningdate` date NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty data`
--

INSERT INTO `faculty data` (`id`, `surname`, `firstname`, `lastname`, `date of birth`, `gender`, `degree`, `joiningdate`, `address`, `username`) VALUES
('456910', 'y', 'Ramireddy', NULL, '1985-07-02', 'male', 'Mtech', '2016-03-05', 'tenali', '45690');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` varchar(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
('1', 'admin', 'admin'),
('2', '182034009', '182034009'),
('3', '456910', '456910'),
('4', '162034009', '162034009');

-- --------------------------------------------------------

--
-- Table structure for table `marktable`
--

CREATE TABLE `marktable` (
  `id` varchar(10) NOT NULL,
  `stuid` varchar(20) NOT NULL,
  `courseid` varchar(10) NOT NULL,
  `midmarks` varchar(20) NOT NULL,
  `assesmentmarks` varchar(30) NOT NULL,
  `quizmarks` varchar(20) NOT NULL,
  `facid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marktable`
--

INSERT INTO `marktable` (`id`, `stuid`, `courseid`, `midmarks`, `assesmentmarks`, `quizmarks`, `facid`) VALUES
('1', '182034009', '123', '30', '10', '10', ''),
('2', '162034009', '023', '30', '10', '10', ''),
('3', '182034009', '124', '29', '9', '9', ''),
('4', '182034009', '125', '30', '10', '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `studentdata`
--

CREATE TABLE `studentdata` (
  `regdno` varchar(20) NOT NULL,
  `surname` char(30) NOT NULL,
  `firstname` char(30) NOT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` char(15) NOT NULL DEFAULT 'male',
  `degree` varchar(20) NOT NULL,
  `department` varchar(20) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `joiningdate` date NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdata`
--

INSERT INTO `studentdata` (`regdno`, `surname`, `firstname`, `lastname`, `dob`, `gender`, `degree`, `department`, `address`, `joiningdate`, `email`) VALUES
('162034009', 'thota', 'yashwanth', NULL, '1997-09-04', 'male', 'Btech', 'cse', 'tenali', '2016-06-02', 'yashwanth@gmail.com'),
('182034009', 'matthi', 'naveen', NULL, '1970-01-01', 'male', 'Mtech', 'cs%26df', 'D.no%3a4-12-5%2ccholerahospital%2cchittnagar%2cmashidstreet%2cvijayawada%2cpincode-520001', '2018-08-09', 'matthinaveen@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance table`
--
ALTER TABLE `attendance table`
  ADD KEY `sdfdf` (`stuid`),
  ADD KEY `wefsdfd` (`courseid`);

--
-- Indexes for table `coursetable`
--
ALTER TABLE `coursetable`
  ADD PRIMARY KEY (`courseid`),
  ADD KEY `faculty` (`facultyid`);

--
-- Indexes for table `faculty data`
--
ALTER TABLE `faculty data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marktable`
--
ALTER TABLE `marktable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kjf` (`courseid`),
  ADD KEY `kjdfh` (`stuid`);

--
-- Indexes for table `studentdata`
--
ALTER TABLE `studentdata`
  ADD PRIMARY KEY (`regdno`),
  ADD KEY `degree` (`degree`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance table`
--
ALTER TABLE `attendance table`
  ADD CONSTRAINT `sdfdf` FOREIGN KEY (`stuid`) REFERENCES `studentdata` (`regdno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wefsdfd` FOREIGN KEY (`courseid`) REFERENCES `coursetable` (`courseid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
