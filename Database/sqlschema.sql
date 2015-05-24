-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2015 at 08:27 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `courselinks`
--

INSERT INTO `courselinks` (`idCourseLinks`, `title`, `courseID`, `courseEngVideoLink`, `courseEngPDFLink`, `courseHindiVideoLink`, `courseHindiPDFLink`, `courseTeluguVideoLink`, `courseTeluguPDFLink`) VALUES
(1, 'Water Shed', 1, 'https://youtu.be/QOrVotzBNto', 'https://books.google.com/ebooks?uid=117522004192189783614&as_coll=1058', 'https://youtu.be/QOrVotzBNto', 'https://books.google.com/ebooks?uid=117522004192189783614&as_coll=1058', 'https://youtu.be/QOrVotzBNto', 'https://books.google.com/ebooks?uid=117522004192189783614&as_coll=1058'),
(2, 'Water Irrigation', 1, 'https://youtu.be/QOrVotzBNto', 'https://books.google.com/ebooks?uid=117522004192189783614&as_coll=1058', 'https://youtu.be/QOrVotzBNto', 'https://books.google.com/ebooks?uid=117522004192189783614&as_coll=1058', 'https://youtu.be/QOrVotzBNto', 'https://books.google.com/ebooks?uid=117522004192189783614&as_coll=1058');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`idCourses`, `courseName`, `courseNumber`, `courseImage`) VALUES
(1, 'Natural Resources Management', 714, 'images/courses/course-1.jpg'),
(2, 'Community/Individual Assets', 897, 'images/courses/course-2.jpg'),
(3, 'Common Infrastructure', 847, 'images/courses/course-3.jpg'),
(4, 'Rural Infrastructure', 499, 'images/courses/course-4.jpg'),
(5, 'Ttest', 345, 'images/courses/course-2.jpg');

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
(5, 'Ttest', 'Pre Test', '00:10:00', 5, 20, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `testquestions`
--

INSERT INTO `testquestions` (`idTestQuestions`, `idTestDetails`, `question`, `option1`, `option2`, `option3`, `option4`, `answer`, `active`) VALUES
(1, 1, 'Which is the Smallest Mammal in the World?', 'Fish', 'Elephant', 'Ant', 'Spider', 'Fish', b'1'),
(2, 1, 'Which is known as Black Continent?', 'Asia', 'Africa', 'Europe', 'Australia', 'Africa', b'1'),
(3, 1, 'Which is know as "Cradle of Civilization"?', 'India', 'Pakistan', 'Italy', 'Japan', 'India', b'1');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `testresults`
--

INSERT INTO `testresults` (`idTestResults`, `userCourseTestID`, `questionID`, `result`, `userId`, `status`) VALUES
(4, 1, 3, 'India', 1, 'P'),
(5, 1, 1, 'Ant', 1, 'F'),
(6, 1, 2, 'Asia', 1, 'F'),
(7, 1, 2, 'Asia', 1, 'F'),
(8, 1, 3, 'Pakistan', 1, 'F'),
(9, 1, 1, 'Fish', 1, 'P'),
(10, 1, 3, 'India', 1, 'P'),
(11, 1, 2, 'Europe', 1, 'F'),
(12, 1, 1, 'Fish', 1, 'P'),
(13, 1, 2, 'Africa', 1, 'P'),
(14, 1, 3, 'Pakistan', 1, 'F'),
(15, 1, 1, 'Elephant', 1, 'F'),
(16, 1, 2, 'Africa', 1, 'P'),
(17, 1, 1, 'Fish', 1, 'P'),
(18, 1, 3, 'India', 1, 'P'),
(19, 1, 2, 'Asia', 1, 'F'),
(20, 1, 3, 'India', 1, 'P'),
(21, 1, 1, 'Fish', 1, 'P'),
(22, 1, 1, 'Fish', 1, 'P'),
(23, 1, 2, 'Africa', 1, 'P'),
(24, 1, 3, 'India', 1, 'P'),
(25, 1, 1, 'Fish', 1, 'P'),
(26, 1, 3, 'India', 1, 'P'),
(27, 1, 2, 'Africa', 1, 'P'),
(28, 1, 1, 'Fish', 1, 'P'),
(29, 1, 3, 'Pakistan', 1, 'F'),
(30, 1, 2, 'Asia', 1, 'F'),
(31, 1, 3, 'India', 1, 'P'),
(32, 1, 1, 'Fish', 1, 'P'),
(33, 1, 2, 'Africa', 1, 'P'),
(34, 1, 3, 'India', 1, 'P'),
(35, 1, 1, 'Fish', 1, 'P'),
(36, 1, 2, 'Africa', 1, 'P'),
(37, 1, 1, 'Fish', 1, 'P'),
(38, 1, 2, 'Africa', 1, 'P'),
(39, 1, 3, 'India', 1, 'P');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `usercoursetest`
--

INSERT INTO `usercoursetest` (`idUserCourseTest`, `userID`, `courseID`, `testType`, `testTaken`, `ExamDate`, `questionResults`, `marksResults`, `ExamStatus`) VALUES
(9, 1, 1, 'Pre Test', b'1', '2015-05-23', '3/3', '12/20', 'PASSED');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`idUserLogin`, `username`, `password`, `active`, `idUserRegistration`, `OTPCode`, `OTPCount`) VALUES
(1, 'Test', '5f4dcc3b5aa765d61d8327deb882cf99', b'0', 1, '562187', 0),
(2, 'ASDF', 'd5d8c2faf43a64a1562a7b38c5dbe8d8', b'0', 2, '973859', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`idUserRegistration`, `firstName`, `lastName`, `mobile`, `staffID`, `emailID`, `state`, `designation`) VALUES
(1, 'QWERT', 'QWERT', '9160869337', '1234', 'qwert@qwert.com', 'Andhra Pradesh', 'QWERT'),
(2, 'SEC', 'RVF', '9959747954', '12345', 'xd@asd.com', 'Andhra Pradesh', 'CERVT');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `uservisitedcourse`
--

INSERT INTO `uservisitedcourse` (`viewId`, `course`, `date`, `startTime`, `endTime`, `userId`, `IPAddress`) VALUES
(1, 'Ttest', '20/05/2015', '12:35:06pm', '', 1, '192.168.1.1'),
(5, 'Natural Resources Management', '20/05/2015', '12:59:19pm', '', 1, '192.168.1.1'),
(6, 'Common Infrastructure', '20/05/2015', '12:59:26pm', '', 1, '192.168.1.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
