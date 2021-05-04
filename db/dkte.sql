-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 02:01 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dkte`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `sno` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `organization` varchar(20) NOT NULL,
  `credentialid` varchar(20) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`sno`, `title`, `organization`, `credentialid`, `dt`) VALUES
(22, 'data visualization ', 'coursera', '12345678', '2021-04-11 14:00:06'),
(23, '18UCS055-Q30 ', 'udemy', '2425235', '2021-04-11 14:00:17'),
(24, '18UCS055-Q30 ', 'udemy', '12345678', '2021-04-29 12:21:35'),
(25, 'python ', 'udemy', '12345678', '2021-05-03 13:20:04'),
(26, 'python programming ', '', '', '2021-05-03 13:20:56'),
(27, 'css ', 'udemy', '12345678', '2021-05-03 17:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `PRN` varchar(20) NOT NULL,
  `ssc` varchar(40) DEFAULT 'NA',
  `sscp` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sscs` varchar(10) NOT NULL DEFAULT 'NA',
  `hsc` varchar(50) DEFAULT 'NA',
  `hscp` decimal(10,2) NOT NULL DEFAULT 0.00,
  `hscs` varchar(10) NOT NULL DEFAULT 'NA',
  `sem1` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sem2` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sem3` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sem4` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sem5` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sem6` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sem7` decimal(10,2) NOT NULL DEFAULT 0.00,
  `sem8` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`PRN`, `ssc`, `sscp`, `sscs`, `hsc`, `hscp`, `hscs`, `sem1`, `sem2`, `sem3`, `sem4`, `sem5`, `sem6`, `sem7`, `sem8`) VALUES
('18UCS004', 'Maharastra', '100.00', 'F141492', 'Maharastra', '100.00', 'H121268', '1.00', '8.50', '8.50', '8.50', '0.00', '8.50', '8.50', '8.50');

-- --------------------------------------------------------

--
-- Table structure for table `facultylogin`
--

CREATE TABLE `facultylogin` (
  `id` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facultylogin`
--

INSERT INTO `facultylogin` (`id`, `password`) VALUES
('vvk@gmail.com', 'vvk123'),
('csehod@gmail.com', 'hod123');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `firstname` varchar(10) NOT NULL,
  `middlename` varchar(10) NOT NULL,
  `lastname` varchar(10) NOT NULL,
  `prn` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `localaddress` text NOT NULL,
  `permanentaddress` text NOT NULL,
  `country` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `pin` varchar(10) NOT NULL,
  `mobileno.` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`firstname`, `middlename`, `lastname`, `prn`, `birthdate`, `email`, `localaddress`, `permanentaddress`, `country`, `state`, `pin`, `mobileno.`) VALUES
('shree', 'sachin', 'lole', '18UCS001', '2004-03-13', 'ak18@gmai.com', 'fcroad,pune', 'fcroad,pune', 'india', 'maharashtra', '416115', '8857006115'),
('Prasad ', 'yashwant ', 'kulkarni', '18UCS004', '2021-04-07', 'kulkarniprasad7777@g', 'hupari', '', 'India', 'Maharashtra', '416203', '7350108673'),
('prasad', 'suresh', 'lotke', '18UCS060', '2000-03-22', 'psl22@gmail.com', 'Jawaharnagar,Ich.', 'Jawaharnagar,Ich.', 'india', 'maharashtra', '416115', '9673984901');

-- --------------------------------------------------------

--
-- Table structure for table `intern`
--

CREATE TABLE `intern` (
  `sno` int(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `employement-type` varchar(20) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `intern`
--

INSERT INTO `intern` (`sno`, `title`, `company`, `employement-type`, `dt`) VALUES
(1, 'ML intern', 'Widhya', 'internship', '2021-04-05 22:01:20'),
(3, 'DS intern', 'sparks foundation', 'internship', '2021-04-05 22:26:01'),
(6, 'Machine learning int', 'Widhya++', 'internship', '2021-04-05 22:31:15'),
(7, 'wdjw', 'Widhya', 'internship', '2021-04-25 13:20:54');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `prn` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`prn`, `password`, `dt`) VALUES
('18UCS001', 'prasad@22', '2021-03-27 11:46:56'),
('18UCS002', '18UCS002', '2021-03-27 12:15:39'),
('18UCS003', '18UCS003', '2021-03-27 12:16:01'),
('18UCS004', '18UCS004', '2021-03-27 12:16:16'),
('18UCS055', 'Pk13720', '2021-04-28 13:06:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`PRN`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`prn`);

--
-- Indexes for table `intern`
--
ALTER TABLE `intern`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `prn` (`prn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `intern`
--
ALTER TABLE `intern`
  MODIFY `sno` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
