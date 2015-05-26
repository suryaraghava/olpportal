-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2015 at 12:04 PM
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
(4, 'Rural Infrastructure', 499, 'images/courses/course-2.jpg'),
(5, 'Ttest', 345, 'images/courses/course-2.jpg'),
(6, 'GeoScience', 987, 'images/courses/course-2.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
