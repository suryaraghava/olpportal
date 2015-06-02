
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 02, 2015 at 02:31 PM
-- Server version: 10.0.13-MariaDB-wsrep
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u371059435_olpv1`
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
