-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2015 at 09:34 PM
-- Server version: 5.5.20
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `olpportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `courselinks`
--

CREATE TABLE IF NOT EXISTS `courselinks` (
  `idCourseLinks` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `courseID` int(11) DEFAULT NULL,
  `courseEngVideoLink` varchar(250) DEFAULT NULL,
  `courseEngPDFLink` varchar(250) DEFAULT NULL,
  `courseHindiVideoLink` varchar(250) NOT NULL,
  `courseHindiPDFLink` varchar(250) NOT NULL,
  `courseTeluguVideoLink` varchar(250) NOT NULL,
  `courseTeluguPDFLink` varchar(250) NOT NULL,
  PRIMARY KEY (`idCourseLinks`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `courselinks`
--

INSERT INTO `courselinks` (`idCourseLinks`, `title`, `courseID`, `courseEngVideoLink`, `courseEngPDFLink`, `courseHindiVideoLink`, `courseHindiPDFLink`, `courseTeluguVideoLink`, `courseTeluguPDFLink`) VALUES
(2, 'Water Shed', 1, 'https://www.youtube.com/embed?v=QOrVotzBNto&feature=youtu.be', '', 'https://www.youtube.com/embed?v=QOrVotzBNto&feature=youtu.be', '', 'https://www.youtube.com/embed?v=QOrVotzBNto&feature=youtu.be', ''),
(3, 'Continuous Contour Trench', 1, 'https://www.youtube.com/embed?v=2QUurcuSvHM&feature=youtu.be', 'PDF-Text/Course-1/Continuous_Contour_Trench.pdf', 'https://www.youtube.com/embed?v=2QUurcuSvHM&feature=youtu.be', '', 'https://www.youtube.com/embed?v=2QUurcuSvHM&feature=youtu.be', ''),
(5, 'Staggered Contour Trench', 1, 'https://www.youtube.com/embed?v=-REeHT-Wawo&feature=youtu.be', 'PDF-Text/Course-1/Staggered_Contour_Trench.pdf', 'https://www.youtube.com/embed?v=-REeHT-Wawo&feature=youtu.be', '', 'https://www.youtube.com/embed?v=-REeHT-Wawo&feature=youtu.be', ''),
(6, 'Diversion Drain', 1, 'https://www.youtube.com/embed?v=-k8sruQPFkA&feature=youtu.be', '', 'https://www.youtube.com/embed?v=-k8sruQPFkA&feature=youtu.be', '', 'https://www.youtube.com/embed?v=-k8sruQPFkA&feature=youtu.be', ''),
(7, 'Loose Boulder Check Dam', 1, 'https://www.youtube.com/embed?v=EBCZZia8GYg&feature=youtu.be', 'PDF-Text/Course-1/Loose_Boulder_Check_Dam.pdf', 'https://www.youtube.com/embed?v=EBCZZia8GYg&feature=youtu.be', '', 'https://www.youtube.com/embed?v=EBCZZia8GYg&feature=youtu.be', ''),
(8, 'Gabion Structures', 1, 'https://www.youtube.com/embed?v=0f1wj5XGsjE&feature=youtu.be', 'PDF-Text/Course-1/Gabion_Structures.pdf', 'https://www.youtube.com/embed?v=0f1wj5XGsjE&feature=youtu.be', '', 'https://www.youtube.com/embed?v=0f1wj5XGsjE&feature=youtu.be', ''),
(9, 'Check Dam / Drop spillway', 1, 'https://www.youtube.com/embed?v=e9xw73pqC_E&feature=youtu.be', 'PDF-Text/Course-1/Drop_Spillway.pdf', 'https://www.youtube.com/embed?v=e9xw73pqC_E&feature=youtu.be', '', 'https://www.youtube.com/embed?v=e9xw73pqC_E&feature=youtu.be', ''),
(10, 'Earthen Dam', 1, 'https://www.youtube.com/embed?v=fqceTkveWTo&feature=youtu.be', 'PDF-Text/Course-1/Earthen_Dam.pdf', 'https://www.youtube.com/embed?v=fqceTkveWTo&feature=youtu.be', '', 'https://www.youtube.com/embed?v=fqceTkveWTo&feature=youtu.be', ''),
(11, 'Stone Bund', 1, 'https://www.youtube.com/embed?v=cXH35eS_JH4&feature=youtu.be', 'PDF-Text/Course-1/Stone_Bund.pdf', 'https://www.youtube.com/embed?v=cXH35eS_JH4&feature=youtu.be', '', 'https://www.youtube.com/embed?v=cXH35eS_JH4&feature=youtu.be', ''),
(12, 'Contour Bund', 1, 'https://www.youtube.com/embed?v=1LfjKZHwxFk&feature=youtu.be', 'PDF-Text/Course-1/Contour_Bunding.pdf', 'https://www.youtube.com/embed?v=1LfjKZHwxFk&feature=youtu.be', '', 'https://www.youtube.com/embed?v=1LfjKZHwxFk&feature=youtu.be', ''),
(13, 'Land Leveling', 1, 'https://www.youtube.com/embed?v=pAhdHUFu2QE&feature=youtu.be', 'PDF-Text/Course-1/Land_Leveling.pdf', 'https://www.youtube.com/embed?v=pAhdHUFu2QE&feature=youtu.be', '', 'https://www.youtube.com/embed?v=pAhdHUFu2QE&feature=youtu.be', ''),
(14, 'Dug Well', 2, 'https://www.youtube.com/embed?v=cNLjX9JsWRc&feature=youtu.be', 'PDF-Text/Course-2/Dug_Well.pdf', 'https://www.youtube.com/embed?v=cNLjX9JsWRc&feature=youtu.be', '', 'https://www.youtube.com/embed?v=cNLjX9JsWRc&feature=youtu.be', ''),
(15, 'Farm Pond', 2, 'https://www.youtube.com/embed?v=MY3uz3F6loA&feature=youtu.be', 'PDF-Text/Course-2/Form_Pond.pdf', 'https://www.youtube.com/embed?v=MY3uz3F6loA&feature=youtu.be', '', 'https://www.youtube.com/embed?v=MY3uz3F6loA&feature=youtu.be', ''),
(16, 'Compost Pit / NADEP Compost Pit', 3, 'https://www.youtube.com/embed?v=-WWwBeOsJZ4&feature=youtu.be', 'PDF-Text/Course-3/NADAP_Compost_Pit.pdf', 'https://www.youtube.com/embed?v=-WWwBeOsJZ4&feature=youtu.be', '', 'https://www.youtube.com/embed?v=-WWwBeOsJZ4&feature=youtu.be', ''),
(17, 'Vermi Compost', 3, 'https://www.youtube.com/embed?v=EkAsRe1jPv4&feature=youtu.be', 'PDF-Text/Course-3/Vermi_Compost.pdf', 'https://www.youtube.com/embed?v=EkAsRe1jPv4&feature=youtu.be', '', 'https://www.youtube.com/embed?v=EkAsRe1jPv4&feature=youtu.be', '');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `idCourses` int(11) NOT NULL AUTO_INCREMENT,
  `courseName` varchar(45) DEFAULT NULL,
  `courseNumber` int(11) DEFAULT NULL,
  `courseImage` varchar(200) NOT NULL,
  PRIMARY KEY (`idCourses`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`idCourses`, `courseName`, `courseNumber`, `courseImage`) VALUES
(1, 'Natural Resources Management', 714, 'images/courses/course-2.jpg'),
(2, 'Community/Individual Assets', 897, 'images/courses/course-2.jpg'),
(3, 'Common Infrastructure', 847, 'images/courses/course-2.jpg'),
(4, 'Rural Infrastructure', 499, 'images/courses/course-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `courseuserview`
--

CREATE TABLE IF NOT EXISTS `courseuserview` (
  `idCourseUserView` int(11) NOT NULL AUTO_INCREMENT,
  `courseLinksID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `videoViewed` bit(1) DEFAULT NULL,
  `documentViewed` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idCourseUserView`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `testdetails`
--

CREATE TABLE IF NOT EXISTS `testdetails` (
  `idTestDetails` int(11) NOT NULL AUTO_INCREMENT,
  `testName` varchar(45) DEFAULT NULL,
  `testType` varchar(45) DEFAULT NULL,
  `testTime` varchar(10) NOT NULL,
  `totalquestions` int(11) NOT NULL,
  `totalmarks` int(11) NOT NULL,
  `passMarks` int(11) NOT NULL,
  PRIMARY KEY (`idTestDetails`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `testdetails`
--

INSERT INTO `testdetails` (`idTestDetails`, `testName`, `testType`, `testTime`, `totalquestions`, `totalmarks`, `passMarks`) VALUES
(1, 'Natural Resources Management', 'Pre Test', '00:10:59', 5, 20, 10),
(2, 'Community/Individual Assets', 'Pre Test', '00:10:00', 5, 20, 0),
(3, 'Common Infrastructure', 'Pre Test', '00:10:00', 5, 20, 0),
(4, 'Rural Infrastructure', 'Pre Test', '00:10:00', 5, 20, 0),
(5, 'GeoScience', 'Pre Test', '00:10:00', 5, 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `testquestions`
--

CREATE TABLE IF NOT EXISTS `testquestions` (
  `idTestQuestions` int(11) NOT NULL AUTO_INCREMENT,
  `idTestDetails` int(11) NOT NULL,
  `question` varchar(45) DEFAULT NULL,
  `option1` varchar(45) NOT NULL,
  `option2` varchar(45) NOT NULL,
  `option3` varchar(45) NOT NULL,
  `option4` varchar(45) NOT NULL,
  `answer` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idTestQuestions`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `testquestions`
--

INSERT INTO `testquestions` (`idTestQuestions`, `idTestDetails`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `active`) VALUES
(1, 1, 'Which is the Smallest Mammal in the World?', 'Fish', 'Elephant', 'Ant', 'Spider', 'Fish', b'1'),
(2, 1, 'Which is known as Black Continent?', 'Asia', 'Africa', 'Europe', 'Australia', 'Africa', b'1'),
(3, 1, 'Which is known as  Pink  City?', 'Jaipur', 'Lucknow', 'Kolkatta', 'Bangalore', 'Jaipur', b'1'),
(4, 1, 'Which is known as  Pink  City?', 'Jaipur', 'Lucknow', 'Kolkatta', 'Bangalore', 'Jaipur', b'1'),
(5, 1, 'What is the height of Eifel Tower?', '2344m', '2345m', '2346m', '2347m', '2345m', b'1'),
(6, 0, 'What is the height of Eifel Tower?', '2344m', '2345m', '2346m', '2347m', '2345m', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `testresults`
--

CREATE TABLE IF NOT EXISTS `testresults` (
  `idTestResults` int(11) NOT NULL AUTO_INCREMENT,
  `userCourseTestID` int(11) DEFAULT NULL,
  `questionID` int(11) DEFAULT NULL,
  `result` varchar(45) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`idTestResults`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usercourses`
--

CREATE TABLE IF NOT EXISTS `usercourses` (
  `idUserCourses` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `courseID` int(11) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idUserCourses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `usercoursetest`
--

CREATE TABLE IF NOT EXISTS `usercoursetest` (
  `idUserCourseTest` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `courseID` int(11) DEFAULT NULL,
  `testType` varchar(11) DEFAULT NULL,
  `testTaken` bit(1) DEFAULT NULL,
  `ExamDate` date NOT NULL,
  `questionResults` varchar(45) NOT NULL,
  `marksResults` varchar(11) NOT NULL,
  `ExamStatus` varchar(10) NOT NULL,
  PRIMARY KEY (`idUserCourseTest`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `usercoursetest`
--

INSERT INTO `usercoursetest` (`idUserCourseTest`, `userID`, `courseID`, `testType`, `testTaken`, `ExamDate`, `questionResults`, `marksResults`, `ExamStatus`) VALUES
(13, 1, 1, 'Pre Test', b'1', '2015-05-26', '1/5', '4/20', 'FAILED'),
(14, 2, 1, 'Pre Test', b'1', '2015-05-26', '2/5', '8/20', 'FAILED');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE IF NOT EXISTS `userlogin` (
  `idUserLogin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `active` bit(1) DEFAULT NULL,
  `idUserRegistration` int(11) DEFAULT NULL,
  `OTPCode` varchar(45) NOT NULL,
  `OTPCount` int(11) NOT NULL,
  PRIMARY KEY (`idUserLogin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`idUserLogin`, `username`, `password`, `active`, `idUserRegistration`, `OTPCode`, `OTPCount`) VALUES
(1, 'Administrator', '5f4dcc3b5aa765d61d8327deb882cf99', b'0', 1, '562187', 0),
(2, 'Test', '5f4dcc3b5aa765d61d8327deb882cf99', b'0', 2, '973859', 0),
(3, NULL, NULL, NULL, 3, '772443', 0),
(5, NULL, NULL, NULL, 5, '341985', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE IF NOT EXISTS `userregistration` (
  `idUserRegistration` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `staffID` varchar(45) NOT NULL,
  `emailID` varchar(45) DEFAULT NULL,
  `state` varchar(55) NOT NULL,
  `designation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUserRegistration`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`idUserRegistration`, `firstName`, `lastName`, `mobile`, `staffID`, `emailID`, `state`, `designation`) VALUES
(1, 'Super', 'Administrator', '9160869337', '1234', 'qwert@qwert.com', 'Andhra Pradesh', 'Web Manager'),
(2, 'Super', 'Tester', '9959747954', '12345', 'xd@asd.com', 'Andhra Pradesh', 'Quality Manager'),
(3, NULL, NULL, '9640493993', '0000', NULL, 'Andaman and Nicobar Islands', NULL),
(5, NULL, NULL, '9052344403', '0000', NULL, 'Andhra Pradesh', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uservisitedcourse`
--

CREATE TABLE IF NOT EXISTS `uservisitedcourse` (
  `viewId` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(45) NOT NULL,
  `date` varchar(10) NOT NULL,
  `startTime` varchar(10) NOT NULL,
  `endTime` varchar(10) NOT NULL,
  `userId` int(11) NOT NULL,
  `IPAddress` varchar(16) NOT NULL,
  PRIMARY KEY (`viewId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `uservisitedcourse`
--

INSERT INTO `uservisitedcourse` (`viewId`, `course`, `date`, `startTime`, `endTime`, `userId`, `IPAddress`) VALUES
(1, 'GeoScience', '20/05/2015', '12:35:06pm', '', 1, '192.168.1.1'),
(5, 'Natural Resources Management', '20/05/2015', '12:59:19pm', '', 1, '192.168.1.1'),
(6, 'Common Infrastructure', '20/05/2015', '12:59:26pm', '', 1, '192.168.1.1'),
(7, 'Natural Resources Management', '31/05/2015', '06:09:11pm', '', 2, ''),
(8, 'Natural Resources Management', '31/05/2015', '06:16:21pm', '', 2, ''),
(9, 'Natural Resources Management', '31/05/2015', '06:16:49pm', '', 2, ''),
(10, 'Natural Resources Management', '31/05/2015', '06:44:16pm', '', 2, ''),
(11, 'Natural Resources Management', '31/05/2015', '06:46:40pm', '', 2, ''),
(12, 'Natural Resources Management', '31/05/2015', '06:46:52pm', '', 2, ''),
(13, 'Natural Resources Management', '31/05/2015', '06:47:01pm', '', 2, ''),
(14, 'Natural Resources Management', '31/05/2015', '06:47:18pm', '', 2, ''),
(15, 'Natural Resources Management', '31/05/2015', '06:47:53pm', '', 2, ''),
(16, 'Natural Resources Management', '31/05/2015', '06:48:20pm', '', 2, ''),
(17, 'Natural Resources Management', '31/05/2015', '06:51:02pm', '', 2, ''),
(18, 'Natural Resources Management', '31/05/2015', '06:51:09pm', '', 2, ''),
(19, 'Natural Resources Management', '31/05/2015', '06:51:37pm', '', 2, ''),
(20, 'Natural Resources Management', '31/05/2015', '06:52:18pm', '', 2, ''),
(21, 'Natural Resources Management', '31/05/2015', '06:52:34pm', '', 2, ''),
(22, 'Natural Resources Management', '31/05/2015', '06:52:53pm', '', 2, ''),
(23, 'Natural Resources Management', '31/05/2015', '06:53:10pm', '', 2, ''),
(24, 'Natural Resources Management', '31/05/2015', '06:53:34pm', '', 2, ''),
(25, 'Natural Resources Management', '31/05/2015', '06:53:56pm', '', 2, ''),
(26, 'Natural Resources Management', '31/05/2015', '06:55:29pm', '', 2, ''),
(27, 'Natural Resources Management', '31/05/2015', '06:56:56pm', '', 2, ''),
(28, 'Natural Resources Management', '31/05/2015', '06:57:25pm', '', 2, ''),
(29, 'Natural Resources Management', '31/05/2015', '06:58:15pm', '', 2, ''),
(30, 'Natural Resources Management', '31/05/2015', '06:59:51pm', '', 2, ''),
(31, 'Natural Resources Management', '31/05/2015', '07:00:22pm', '', 2, ''),
(32, 'Natural Resources Management', '31/05/2015', '07:01:08pm', '', 2, ''),
(33, 'Natural Resources Management', '31/05/2015', '07:01:22pm', '', 2, ''),
(34, 'Natural Resources Management', '31/05/2015', '07:02:12pm', '', 2, ''),
(35, 'Natural Resources Management', '31/05/2015', '07:03:00pm', '', 2, ''),
(36, 'Natural Resources Management', '31/05/2015', '07:04:41pm', '', 2, ''),
(37, 'Natural Resources Management', '31/05/2015', '07:07:31pm', '', 2, ''),
(38, 'Natural Resources Management', '31/05/2015', '07:08:29pm', '', 2, ''),
(39, 'Natural Resources Management', '31/05/2015', '07:10:06pm', '', 2, ''),
(40, 'Natural Resources Management', '31/05/2015', '07:11:33pm', '', 2, ''),
(41, 'Natural Resources Management', '31/05/2015', '07:12:22pm', '', 2, ''),
(42, 'Natural Resources Management', '31/05/2015', '07:12:51pm', '', 2, ''),
(43, 'Natural Resources Management', '31/05/2015', '07:14:26pm', '', 2, ''),
(44, 'Natural Resources Management', '31/05/2015', '07:14:40pm', '', 2, ''),
(45, 'Natural Resources Management', '31/05/2015', '07:14:58pm', '', 2, ''),
(46, 'Natural Resources Management', '31/05/2015', '07:16:22pm', '', 2, ''),
(47, 'Natural Resources Management', '31/05/2015', '07:20:03pm', '', 2, ''),
(48, 'Natural Resources Management', '31/05/2015', '07:20:30pm', '', 2, ''),
(49, 'Natural Resources Management', '31/05/2015', '07:39:12pm', '', 2, ''),
(50, 'Natural Resources Management', '31/05/2015', '07:39:58pm', '', 2, ''),
(51, 'Natural Resources Management', '31/05/2015', '07:41:04pm', '', 2, ''),
(52, 'Natural Resources Management', '31/05/2015', '07:41:36pm', '', 2, ''),
(53, 'Natural Resources Management', '31/05/2015', '07:42:46pm', '', 2, ''),
(54, 'Natural Resources Management', '31/05/2015', '07:43:37pm', '', 2, ''),
(55, 'Natural Resources Management', '31/05/2015', '08:30:00pm', '', 2, ''),
(56, 'Natural Resources Management', '31/05/2015', '08:34:11pm', '', 2, ''),
(57, 'Natural Resources Management', '31/05/2015', '08:34:31pm', '', 2, ''),
(58, 'Natural Resources Management', '01/06/2015', '12:05:20am', '', 2, ''),
(59, 'Natural Resources Management', '01/06/2015', '12:06:12am', '', 2, ''),
(60, 'Natural Resources Management', '01/06/2015', '12:06:12am', '', 2, ''),
(61, 'Natural Resources Management', '01/06/2015', '12:06:12am', '', 2, ''),
(62, 'Natural Resources Management', '01/06/2015', '12:10:11am', '', 2, ''),
(63, 'Natural Resources Management', '01/06/2015', '12:46:12am', '', 1, ''),
(64, 'Natural Resources Management', '01/06/2015', '12:47:45am', '', 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
