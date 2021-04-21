-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2019 at 04:01 PM
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
-- Database: `empme`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `COMMENT_ID` int(11) NOT NULL,
  `COMMENTER_NAME` varchar(255) NOT NULL,
  `COMMENT_EMAIL` varchar(255) NOT NULL,
  `COMMENT` longtext NOT NULL,
  `COMMENTED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `COMMENT_SUBJECT` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`COMMENT_ID`, `COMMENTER_NAME`, `COMMENT_EMAIL`, `COMMENT`, `COMMENTED_AT`, `COMMENT_SUBJECT`) VALUES
(1, 'Hisham', 'hamdon_22@hotmail.com', 'PHP', '2019-11-26 14:50:34', ''),
(2, 'Hisham', 'hamdon_22@hotmail.com', 'PHP', '2019-11-26 14:51:20', ''),
(3, 'Hisham', 'hamdon_22@hotmail.com', 'PHP', '2019-11-26 14:51:23', ''),
(4, 'Hisham', 'hamdon_22@hotmail.com', 'PHP', '2019-11-26 14:51:29', ''),
(5, 'Hamdoon', 'hisham@hisham.com', 'Lorem', '2019-11-26 15:09:52', ''),
(6, 'Hamdoon', 'hisham@hisham.com', 'Lorem', '2019-11-26 15:11:21', ''),
(7, 'Hamdoon', 'hisham@hisham.com', 'Lorem', '2019-11-26 15:11:50', ''),
(8, 'Hamdoon', 'hisham@hisham.com', 'Lorem', '2019-11-26 15:12:25', ''),
(9, 'Ali', 'ali@gmail.com', 'Lorem', '2019-11-26 15:13:32', ''),
(10, 'Hamdoon', 'azzam@email.com', 'Lorem', '2019-11-26 15:15:00', ''),
(11, 'BAKRI', 'bakri@bak.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-11-26 15:42:05', ''),
(12, 'Ahmed', 'hsam122@gmail.com', 'COMMENTCOMMENTCOMMENTCOMMENTCOMMENTCOMMENTCOMMENT V COMMENTCOMMENTCOMMENTCOMMENTCOMMENTCOMMENTCOMMENT V COMMENT COMMENTCOMMENTCOMMENTCOMMENTCOMMENTCOMMENTCOMMENTCOMMENT V COMMENT COMMENT COMMENT COMMENT', '2019-11-26 15:49:23', 'Software Eng'),
(13, 'mamoon', 'mam@mam.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2019-11-26 15:50:23', 'Mamoon Subject');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `JOB_ID` int(11) NOT NULL,
  `JOB_NAME` varchar(255) NOT NULL,
  `JOB_DESCRIPTION` text NOT NULL,
  `JOB_EMAIL` varchar(255) NOT NULL,
  `JOB_COMPANY` varchar(255) NOT NULL,
  `JOB_COUNTRY` varchar(255) NOT NULL DEFAULT 'Sudan',
  `JOB_IMAGE` varchar(255) NOT NULL DEFAULT 'logo.jpg',
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `END_AT` varchar(30) NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`JOB_ID`, `JOB_NAME`, `JOB_DESCRIPTION`, `JOB_EMAIL`, `JOB_COMPANY`, `JOB_COUNTRY`, `JOB_IMAGE`, `CREATED_AT`, `END_AT`) VALUES
(6, 'programmer', 'high performance in code', 'ammar@a.com', 'hamdontech', 'sudan', '20190128_171242.jpg', '2019-11-21 15:30:20', '0000-00-00 00:00:00'),
(7, 'programmer', 'high performance in code', 'ammar@a.com', 'hamdontech', 'sudan', '20190128_171242.jpg', '2019-11-21 15:31:12', '0000-00-00 00:00:00'),
(8, 'Graphic designer', 'Graphic designer vacancy is found now in dal group company', 'dal@dal.com', 'Dal company', 'Sudan ', 'FB_IMG_1545935044076.jpg', '2019-11-22 13:57:00', '11/9/2020'),
(9, 'Teacher', 'Graphic designer vacancy is found now in dal group companyGraphic designer vacancy is found now in dal group companyGraphic designer vacancy is found now in dal group companyGraphic designer vacancy is found now in dal group companyGraphic designer vacancy is found now in dal group company', 'hamd@email.com', 'hamdontech', 'sudan', 'emp1.jpg', '2019-11-22 15:13:03', '11/9/2020'),
(10, 'php developer', 'this  this vacancy is for programmer this vacancy is for programmerthis vacancy is for programmer this vacancy is for programmer this vacancy is for programmervacancy is for programmer', 'hamd@email.com', 'Otechs', 'Egypt', 'background1.jpg', '2019-11-23 13:36:05', '20/10/2020'),
(11, 'Doctor', 'Graphic designer vacancy is found now in dal group companyGraphic designer vacancy is found now in dal group companyGraphic designer vacancy is found now in dal group companyGraphic designer vacancy is found now in dal group companyGraphic designer vacancy is found now in dal group company', 'hamd@email.com', 'sudan technology', 'Teccno', 'abstract-antique-backdrop-background-129722.jpg', '2019-11-24 10:55:43', '11/9/2020'),
(12, 'programmer', 'Graphic designer vacancy is found now in dal group companyGraphic designer vacancy is found now in dal group companyGraphic designer vacancy is found now in dal group companyGraphic designer vacancy is found now in dal group companyGraphic designer vacancy is found now in dal group company', 'hamd@email.com', 'hamdontech', 'UAE', 'abstract-antique-backdrop-background-129722.jpg', '2019-11-24 10:58:13', '11/9/2020'),
(13, 'civil eng', 'this  this vacancy is for programmer this vacancy is for programmerthis vacancy is for programmer this vacancy is for programmer this vacancy is for programmervacancy is for programmer', 'hamd@email.com', 'alfaisal', 'Oman', 'صورة022.jpg', '2019-11-24 15:23:52', '11/9/2020'),
(14, 'programmer', 'high performance in code', 'hamd@email.com', 'sudan technology', 'sudan', 'admin.php', '2019-11-24 15:28:11', '11/9/2020');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `SUBSCRIBER_ID` int(11) NOT NULL,
  `SUBSCRIBER_EMAIL` varchar(255) NOT NULL,
  `SUBSCRIBER_NAME` varchar(255) NOT NULL,
  `SUBSCRIBERS_DATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`SUBSCRIBER_ID`, `SUBSCRIBER_EMAIL`, `SUBSCRIBER_NAME`, `SUBSCRIBERS_DATE`) VALUES
(34, 'hamdsds@email.com', 'hamdsds', '2019-11-26 10:56:45'),
(35, 'azzam@az.com', 'azzam', '2019-11-26 10:56:55'),
(36, 'azzam@aza.com', 'azzam', '2019-11-26 10:57:02'),
(37, 'ammar@am.com', 'ammar', '2019-11-26 10:57:08'),
(38, 'hisham@email.com', 'hisham', '2019-11-26 10:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `USER_GROUP` int(11) NOT NULL DEFAULT '0',
  `CREATED_AT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `USERNAME`, `PASSWORD`, `USER_GROUP`, `CREATED_AT`) VALUES
(6, 'hisham', '8cb2237d0679ca88db6464eac60da96345513964', 1, '2019-11-26 08:39:08'),
(7, 'hisham', 'f0958c370d7551796537ea709fd16ff14ea1be6f', 1, '2019-11-26 08:51:34'),
(8, 'Ibrahim', '12345', 0, '2019-11-26 11:44:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`COMMENT_ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`JOB_ID`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`SUBSCRIBER_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `COMMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `JOB_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `SUBSCRIBER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
