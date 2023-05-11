-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2019 at 05:50 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `film_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladminuser`
--

CREATE TABLE IF NOT EXISTS `tbladminuser` (
`adminId` int(1) NOT NULL,
  `adminType` int(1) DEFAULT NULL,
  `loginId` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `phoneNumber` varchar(12) DEFAULT NULL,
  `usertype` tinyint(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladminuser`
--

INSERT INTO `tbladminuser` (`adminId`, `adminType`, `loginId`, `password`, `firstName`, `lastName`, `phoneNumber`, `usertype`, `status`) VALUES
(1, 1, 'admin', '123456', 'admin', 'admin', '9879879871', 1, 1),
(4, NULL, 'manager', '123456', 'Manager', 'Manager', '9944022563', 2, 1),
(5, NULL, 'helpdesk', '123456', 'Help Desk', 'RiO', '9944255636', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doubts`
--

CREATE TABLE IF NOT EXISTS `tbl_doubts` (
`id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `question` text,
  `answer` text
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doubts`
--

INSERT INTO `tbl_doubts` (`id`, `userid`, `question`, `answer`) VALUES
(1, 1, 'sdfsdfdsfsdd', 'sdfdsfsd'),
(2, 2, 'What about petta movie release date?', 'Next Mondaty, Thanking you for contact us'),
(3, 2, 'What about visuwasam movie date and cast details?\r\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_function`
--

CREATE TABLE IF NOT EXISTS `tbl_function` (
`id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `video` varchar(500) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_function`
--

INSERT INTO `tbl_function` (`id`, `name`, `image`, `video`) VALUES
(1, 'Vijay Awards', 'public/images/movie/7709.png', 'https://www.youtube.com/watch?v=kBQe6CZdEe8'),
(2, 'I Tried Manoj', 'public/images/movie/3298.jpg', 'https://www.youtube.com/watch?v=7ZI-zd5cMnU');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movie`
--

CREATE TABLE IF NOT EXISTS `tbl_movie` (
`id` int(11) NOT NULL,
  `name` varchar(35) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `video` varchar(500) DEFAULT NULL,
  `cast_crew` text,
  `screen` tinyint(1) DEFAULT NULL,
  `poll` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_movie`
--

INSERT INTO `tbl_movie` (`id`, `name`, `image`, `video`, `cast_crew`, `screen`, `poll`) VALUES
(2, 'Vetayadu Vilayaduthu', 'public/images/movie/18582.jpg', 'https://www.youtube.com/watch?v=kBQe6CZdEe8', 'Vijay, Samathas', 2, 2),
(3, 'Thadam', 'public/images/movie/12717.jpg', 'https://www.youtube.com/watch?v=St86TTfo4iI', 'Arun Vijay', 3, 0),
(4, 'Mersal', 'public/images/movie/28582.jpg', 'https://www.youtube.com/watch?v=xsbLtHql4g8', 'Vijay, Samantha', 1, 0),
(5, 'Dumbo', 'public/images/movie/16460.jpg', 'https://www.youtube.com/watch?v=7NiYVoqBt-8', 'Elephant', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_screen`
--

CREATE TABLE IF NOT EXISTS `tbl_screen` (
`id` int(11) NOT NULL,
  `screen` varchar(15) DEFAULT NULL,
  `poll` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_screen`
--

INSERT INTO `tbl_screen` (`id`, `screen`, `poll`) VALUES
(1, 'Screen 1', 1),
(2, 'Screen 2', 2),
(3, 'Screen 3', 0),
(4, 'Screen 4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_screen_poll`
--

CREATE TABLE IF NOT EXISTS `tbl_screen_poll` (
`id` int(11) NOT NULL,
  `screen` int(11) DEFAULT NULL,
  `movie` int(11) DEFAULT NULL,
  `poll` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_screen_poll`
--

INSERT INTO `tbl_screen_poll` (`id`, `screen`, `movie`, `poll`) VALUES
(1, 2, 2, 2),
(2, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticket`
--

CREATE TABLE IF NOT EXISTS `tbl_ticket` (
`id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `showId` int(11) DEFAULT NULL,
  `no_tickets` varchar(3) DEFAULT NULL,
  `ticket_type` tinyint(1) DEFAULT NULL,
  `payment` int(11) NOT NULL DEFAULT '0',
  `ref` varchar(25) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `cancel` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ticket`
--

INSERT INTO `tbl_ticket` (`id`, `userid`, `showId`, `no_tickets`, `ticket_type`, `payment`, `ref`, `status`, `cancel`) VALUES
(1, 2, 2, '2', 1, 240, '2019/1', 1, 1),
(2, 2, 2, '1', 1, 120, '2019/2', 1, 0),
(3, 2, 2, '2', 1, 240, '2019/3', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `dob` varchar(15) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `loginid` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `dob`, `mobile`, `loginid`, `password`) VALUES
(1, 'fsd', 'adfdsf', 'dfs', 'sdfsdf', 'sdfsdf', 'sdfsd'),
(2, 'Manibharathi', 'manibharath159@gmail.com', '02/02/2018', '9955266363', 'manibharathi', 'manibharathi'),
(3, 'Kumar', 'ganesh@gmail.com', '02/02/2018', '9955266363', 'ganesh', 'ganesh');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_web_user`
--

CREATE TABLE IF NOT EXISTS `tbl_web_user` (
`id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `loginid` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `usertype` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_web_user`
--

INSERT INTO `tbl_web_user` (`id`, `name`, `mobile`, `email`, `loginid`, `password`, `usertype`) VALUES
(1, 'Admin', '9966255263', 'admin@gmail.com', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladminuser`
--
ALTER TABLE `tbladminuser`
 ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_doubts`
--
ALTER TABLE `tbl_doubts`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_function`
--
ALTER TABLE `tbl_function`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_screen`
--
ALTER TABLE `tbl_screen`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_screen_poll`
--
ALTER TABLE `tbl_screen_poll`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_web_user`
--
ALTER TABLE `tbl_web_user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladminuser`
--
ALTER TABLE `tbladminuser`
MODIFY `adminId` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_doubts`
--
ALTER TABLE `tbl_doubts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_function`
--
ALTER TABLE `tbl_function`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_screen`
--
ALTER TABLE `tbl_screen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_screen_poll`
--
ALTER TABLE `tbl_screen_poll`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_ticket`
--
ALTER TABLE `tbl_ticket`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_web_user`
--
ALTER TABLE `tbl_web_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
