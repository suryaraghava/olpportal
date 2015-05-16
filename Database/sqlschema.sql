-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 16, 2015 at 06:55 PM
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
  `courseID` int(11) DEFAULT NULL,
  `courseVideoLink` varchar(45) DEFAULT NULL,
  `coursePDFLink` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCourseLinks`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `idCourses` int(11) NOT NULL AUTO_INCREMENT,
  `courseName` varchar(45) DEFAULT NULL,
  `courseNumber` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCourses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`idTestDetails`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `testresults`
--

CREATE TABLE IF NOT EXISTS `testresults` (
  `idTestResults` int(11) NOT NULL AUTO_INCREMENT,
  `userCourseTestID` int(11) DEFAULT NULL,
  `questionID` int(11) DEFAULT NULL,
  `result` varchar(45) DEFAULT NULL,
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
  `testID` int(11) DEFAULT NULL,
  `testTaken` bit(1) DEFAULT NULL,
  PRIMARY KEY (`idUserCourseTest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`idUserLogin`, `username`, `password`, `active`, `idUserRegistration`, `OTPCode`, `OTPCount`) VALUES
(1, 'Test', 'password', b'0', 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userregistration`
--

CREATE TABLE IF NOT EXISTS `userregistration` (
  `idUserRegistration` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `staffID` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `emailID` varchar(45) DEFAULT NULL,
  `designation` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idUserRegistration`),
  UNIQUE KEY `staffID` (`staffID`),
  UNIQUE KEY `staffID_2` (`staffID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `userregistration`
--

INSERT INTO `userregistration` (`idUserRegistration`, `firstName`, `lastName`, `staffID`, `mobile`, `emailID`, `designation`) VALUES
(1, 'firstName', 'lastName', '1234', 'mobile', 'abcd', 'designation');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
