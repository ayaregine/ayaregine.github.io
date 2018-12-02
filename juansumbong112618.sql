-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 25, 2018 at 06:15 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juansumbong`
--

-- --------------------------------------------------------

--
-- Table structure for table `js_assignees`
--

CREATE TABLE `js_assignees` (
  `id` int(11) NOT NULL,
  `office` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `active` varchar(10) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `js_assignees`
--

INSERT INTO `js_assignees` (`id`, `office`, `name`, `active`, `username`, `password`) VALUES
(1, '1', 'Ana Santos', 'yes', 'asantos', '12345'),
(2, '2', 'Ben Salonga', 'yes', 'bsalonga', '12345'),
(5, '3', 'Kim taehyung', 'yes', 'ktaehyung', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `js_brgy`
--

CREATE TABLE `js_brgy` (
  `id` int(11) NOT NULL,
  `brgyname` varchar(250) NOT NULL,
  `district` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `js_brgy`
--

INSERT INTO `js_brgy` (`id`, `brgyname`, `district`) VALUES
(1, 'Test1bgry', '2'),
(2, 'Test1bgry', '2'),
(3, 'Greenhills', '2'),
(4, 'Sample123', '2');

-- --------------------------------------------------------

--
-- Table structure for table `js_choices`
--

CREATE TABLE `js_choices` (
  `id` int(11) NOT NULL,
  `choices` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `js_choices`
--

INSERT INTO `js_choices` (`id`, `choices`) VALUES
(1, 'choices1'),
(2, 'choices2'),
(3, 'choices3'),
(4, 'choices4'),
(5, 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `js_complaint`
--

CREATE TABLE `js_complaint` (
  `id` int(11) NOT NULL,
  `juansumbongname` varchar(250) NOT NULL,
  `juansumbonggovtid` varchar(250) NOT NULL,
  `juansumbonggender` varchar(250) NOT NULL,
  `juansumbongemail` varchar(250) NOT NULL,
  `juansumbongbarangay` varchar(250) NOT NULL,
  `juansumbongnumber` varchar(250) NOT NULL,
  `juansumbongcurrentaddress` varchar(250) NOT NULL,
  `juansumbongtitlecomplaint` varchar(250) NOT NULL,
  `juansumbongtypeofcomplaint` varchar(250) NOT NULL,
  `juansumbonggovtoffice` varchar(250) NOT NULL,
  `juansumbongpicture` varchar(250) NOT NULL,
  `juansumbongpicture2` varchar(250) NOT NULL,
  `juansumbongmessage` text NOT NULL,
  `legitcitizen` varchar(250) NOT NULL,
  `resolved` varchar(250) NOT NULL,
  `datefiled` varchar(250) NOT NULL,
  `assignee` varchar(250) NOT NULL,
  `govtofficeremarks` varchar(250) NOT NULL,
  `lastupdated` varchar(250) NOT NULL,
  `blocktries` int(11) NOT NULL,
  `isblocked` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `js_complaint`
--

INSERT INTO `js_complaint` (`id`, `juansumbongname`, `juansumbonggovtid`, `juansumbonggender`, `juansumbongemail`, `juansumbongbarangay`, `juansumbongnumber`, `juansumbongcurrentaddress`, `juansumbongtitlecomplaint`, `juansumbongtypeofcomplaint`, `juansumbonggovtoffice`, `juansumbongpicture`, `juansumbongpicture2`, `juansumbongmessage`, `legitcitizen`, `resolved`, `datefiled`, `assignee`, `govtofficeremarks`, `lastupdated`, `blocktries`, `isblocked`) VALUES
(1, 'Juan Dela Cruz', 'Sample', 'Male', 'juan@gmail.com', 'Progreso', '09214562211', 'Greenhills, San Juan City', 'Full of garbage in the kanto', 'Road issues', 'sample', 'upload/IE Version.JPG', '', 'sample sample sample ', 'true', 'false', '2018-09-04 01:11:58', 'none', '', '2018-11-06 01:40:23', 0, ''),
(2, 'sa', 'sa3242424', 'Male', 'as@gmail.com', 'Balong-Bato', '34234234324', 'sa', 'as', 'Rude government employee', 'DOH', 'upload/maltese_puppy.jpg', '', 'sfsfs', 'true', 'false', '2018-11-04 16:58:11', 'Ana Santos', '', '2018-11-25 10:49:04', 1, 'true'),
(3, 'sample', 'sample', 'Male', 'a@gmail.com', 'Balong-Bato', '5525234242', 'jrklwjrlkwjrwlk', 'kwjrwlkerj', 'Rude government employee', 'DEPED', 'logo.jpg/puppy-samoyed-dog-running-green-grass-white-75819166.jpg/', '', 'fsfsdfsfsdfs', 'true', 'Completed', '2018-11-05 14:41:28', 'Ben Salonga', 'captain america', '2018-11-11 21:29:54', 0, ''),
(4, 'test', '1199-02-03', 'Male', 's@sample.com', 'Balong-Bato', '23423423', 'jkfjsfkljsdls', 'fwerwerwr`', 'Rude government employee', 'notyetassigned', 'logo.jpg/puppy-samoyed-dog-running-green-grass-white-75819166.jpg/', '', 'jsfkshfkjshfksdf', 'true', 'false', '2018-11-05 16:25:16', 'none', '', '0000-00-00', 0, ''),
(5, 'test', '1199-02-03', 'Male', 's@sample.com', 'Balong-Bato', '23423423', 'jkfjsfkljsdls', 'fwerwerwr`', 'Rude government employee', 'DOH', 'logo.jpg/captain.JPG', '', 'jsfkshfkjshfksdf', 'true', 'Completed', '2018-11-05 16:26:05', 'Ben Salonga', 'tested', '2018-11-25 21:59:56', 0, ''),
(6, 'test', '1199-02-03', 'Male', 's@sample.com', 'Balong-Bato', '23423423', 'jkfjsfkljsdls', 'fwerwerwr`', 'Rude government employee', 'DOH', 'upload/captain.JPG', '', 'jsfkshfkjshfksdf', 'true', 'false', '2018-11-05 16:28:06', 'Ben Salonga', '', '2018-11-11 21:19:53', 0, ''),
(7, 'test', '1199-02-03', 'Male', 's@sample.com', 'Balong-Bato', '23423423', 'jkfjsfkljsdls', 'fwerwerwr`', 'Rude government employee', 'notyetassigned', 'logo.jpg/captain.JPG', '', 'jsfkshfkjshfksdf', 'true', 'false', '2018-11-05 16:29:29', 'none', '', '0000-00-00', 0, ''),
(8, 'test', '1199-02-03', 'Male', 's@sample.com', 'Balong-Bato', '23423423', 'jkfjsfkljsdls', 'fwerwerwr`', 'Rude government employee', 'notyetassigned', 'logo.jpg/captain.JPG', '', 'jsfkshfkjshfksdf', 'true', 'false', '2018-11-05 16:30:36', 'none', '', '0000-00-00', 0, ''),
(9, 'November', '2000-07-06', 'Female', 'testing@email.com', 'Addition Hills', '09193068059', 'Testing current', 'Saaaaaaa', 'Rude government employee', 'notyetassigned', 'logo.jpg/meme.JPG', '', 'testing', 'true', 'false', '2018-11-24 16:59:42', 'none', 'none', '2018-11-24 16:59:42', 0, ''),
(10, 'November', '2000-07-06', 'Female', 'testing@email.com', 'Addition Hills', '09193068059', 'Testing current', 'Saaaaaaa', 'Rude government employee', 'notyetassigned', 'logo.jpg/captain.JPG', 'upload/IMG_4481.JPG', 'testing', 'true', 'false', '2018-11-24 17:01:47', 'none', 'none', '2018-11-24 17:01:47', 0, ''),
(23, 'Testing', '2002-03-05', 'Male', 'testing@gmail.com', 'Balong-Bato', '09193068059', 'pasig', 'testingggggg', 'Road issues', 'notyetassigned', 'logo.jpg/puppy-samoyed-dog-running-green-grass-white-75819166.jpg/', '', 'testing', 'true', 'false', '2018-11-24 18:07:58', 'none', 'none', '2018-11-24 18:07:58', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `js_login`
--

CREATE TABLE `js_login` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `govtoffice` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `js_login`
--

INSERT INTO `js_login` (`id`, `username`, `password`, `govtoffice`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `js_natureofcomplaint`
--

CREATE TABLE `js_natureofcomplaint` (
  `id` int(11) NOT NULL,
  `natureofcomplaint` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `js_natureofcomplaint`
--

INSERT INTO `js_natureofcomplaint` (`id`, `natureofcomplaint`) VALUES
(1, 'Sample'),
(2, 'Testing'),
(3, 'Rude Traffic Enforser'),
(4, 'Worst traffic');

-- --------------------------------------------------------

--
-- Table structure for table `js_offices`
--

CREATE TABLE `js_offices` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `js_offices`
--

INSERT INTO `js_offices` (`id`, `name`) VALUES
(1, 'DOH'),
(2, 'DEPED'),
(3, 'BFAD'),
(4, 'SSS');

-- --------------------------------------------------------

--
-- Table structure for table `js_securityquestion`
--

CREATE TABLE `js_securityquestion` (
  `id` int(11) NOT NULL,
  `question` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `js_securityquestion`
--

INSERT INTO `js_securityquestion` (`id`, `question`, `answer`) VALUES
(1, 'How many barangay does San Juan have?', '21'),
(2, 'How many district does san juan have?', '2'),
(3, 'How many brgy in District 1 have?', '4'),
(4, 'Test sample', 'Test'),
(5, 'sample', '411'),
(6, 'Testing', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `js_assignees`
--
ALTER TABLE `js_assignees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `js_brgy`
--
ALTER TABLE `js_brgy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `js_choices`
--
ALTER TABLE `js_choices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `js_complaint`
--
ALTER TABLE `js_complaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `js_login`
--
ALTER TABLE `js_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `js_natureofcomplaint`
--
ALTER TABLE `js_natureofcomplaint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `js_offices`
--
ALTER TABLE `js_offices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `js_securityquestion`
--
ALTER TABLE `js_securityquestion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `js_assignees`
--
ALTER TABLE `js_assignees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `js_brgy`
--
ALTER TABLE `js_brgy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `js_choices`
--
ALTER TABLE `js_choices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `js_complaint`
--
ALTER TABLE `js_complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `js_login`
--
ALTER TABLE `js_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `js_natureofcomplaint`
--
ALTER TABLE `js_natureofcomplaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `js_offices`
--
ALTER TABLE `js_offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `js_securityquestion`
--
ALTER TABLE `js_securityquestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
