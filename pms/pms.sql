-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2014 at 07:34 PM
-- Server version: 5.5.33-31.1
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pms`
--

-- --------------------------------------------------------

--
-- Table structure for table `bloodpressure`
--

CREATE TABLE IF NOT EXISTS `bloodpressure` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `tagID` varchar(4) NOT NULL,
  `systolic` int(10) NOT NULL,
  `diastolic` int(10) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `bloodpressure`
--

INSERT INTO `bloodpressure` (`ID`, `tagID`, `systolic`, `diastolic`, `time`) VALUES
(1, '0001', 125, 74, '2013-12-01 12:00:00'),
(2, '0001', 126, 77, '2013-12-01 12:15:00'),
(3, '0001', 132, 84, '2013-12-01 12:30:00'),
(4, '0001', 129, 76, '2013-12-01 12:45:00'),
(5, '0001', 128, 71, '2013-12-01 13:00:00'),
(6, '0001', 126, 80, '2013-12-01 13:15:00'),
(7, '0001', 125, 77, '2013-12-01 13:30:00'),
(8, '0001', 130, 73, '2013-12-01 13:45:00'),
(9, '0001', 129, 81, '2013-12-01 14:00:00'),
(10, '0002', 132, 80, '2013-12-01 12:00:00'),
(11, '0002', 129, 76, '2013-12-01 12:15:00'),
(12, '0002', 132, 71, '2013-12-01 12:30:00'),
(13, '0002', 125, 73, '2013-12-01 12:45:00'),
(14, '0002', 133, 81, '2013-12-01 13:00:00'),
(15, '0002', 126, 81, '2013-12-01 13:15:00'),
(16, '0002', 127, 79, '2013-12-01 13:30:00'),
(17, '0002', 134, 83, '2013-12-01 13:45:00'),
(18, '0002', 129, 79, '2013-12-01 14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE IF NOT EXISTS `doctor` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `doctorID` varchar(10) NOT NULL,
  `userName` varchar(10) NOT NULL,
  `password` varchar(16) NOT NULL,
  `name` varchar(64) NOT NULL,
  `phone` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`ID`, `doctorID`, `userName`, `password`, `name`, `phone`) VALUES
(1, '001', 'utp', 'utp', 'Dr Safee bin Sali', '0128888888'),
(2, '002', 'doctor', 'doctor', 'Dr Emma binti Ma''embong', '0127777777');

-- --------------------------------------------------------

--
-- Table structure for table `heartrate`
--

CREATE TABLE IF NOT EXISTS `heartrate` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `tagID` varchar(4) NOT NULL,
  `bpm` int(10) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `heartrate`
--

INSERT INTO `heartrate` (`ID`, `tagID`, `bpm`, `time`) VALUES
(1, '0001', 78, '2013-12-01 10:00:00'),
(2, '0001', 70, '2013-12-01 10:15:00'),
(3, '0001', 65, '2013-12-01 10:30:00'),
(4, '0001', 62, '2013-12-01 10:45:00'),
(5, '0001', 65, '2013-12-01 11:00:00'),
(6, '0001', 73, '2013-12-01 11:15:00'),
(7, '0001', 79, '2013-12-01 11:30:00'),
(8, '0001', 88, '2013-12-01 11:45:00'),
(9, '0001', 78, '2013-12-01 12:00:00'),
(10, '0002', 55, '2013-12-01 12:00:00'),
(11, '0002', 58, '2013-12-01 12:15:00'),
(12, '0002', 62, '2013-12-01 12:30:00'),
(13, '0002', 64, '2013-12-01 12:45:00'),
(14, '0002', 69, '2013-12-01 13:00:00'),
(15, '0002', 72, '2013-12-01 13:15:00'),
(16, '0002', 75, '2013-12-01 13:30:00'),
(17, '0002', 78, '2013-12-01 13:45:00'),
(18, '0002', 82, '2013-12-01 14:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE IF NOT EXISTS `patient` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `patientID` varchar(10) NOT NULL,
  `name` varchar(64) NOT NULL,
  `IC` varchar(12) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `dateBirth` date NOT NULL,
  `dateAdmission` date NOT NULL,
  `dateDischarge` date NOT NULL,
  `room` varchar(4) NOT NULL,
  `bed` varchar(4) NOT NULL,
  `diagnosis` varchar(64) NOT NULL,
  `healthStatus` int(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`ID`, `patientID`, `name`, `IC`, `gender`, `dateBirth`, `dateAdmission`, `dateDischarge`, `room`, `bed`, `diagnosis`, `healthStatus`) VALUES
(1, '00001', 'Najib bin Anwar', '050101134557', 'M', '2005-01-01', '2013-12-01', '2013-12-01', '001', '001', 'Fever', 1),
(2, '00002', 'Rosmah binti Mansor', '031102134556', 'F', '2003-11-02', '2013-12-01', '2013-12-01', '001', '002', 'Injury', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tagtracker`
--

CREATE TABLE IF NOT EXISTS `tagtracker` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `tagID` varchar(4) NOT NULL,
  `status` int(10) NOT NULL,
  `patientID` varchar(10) NOT NULL,
  `tagWear` datetime NOT NULL,
  `tagTaken` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tagtracker`
--

INSERT INTO `tagtracker` (`ID`, `tagID`, `status`, `patientID`, `tagWear`, `tagTaken`) VALUES
(1, '0001', 1, '00001', '2013-12-01 10:00:00', '2013-12-01 12:00:00'),
(2, '0002', 1, '00002', '2013-12-01 12:00:00', '2013-12-01 14:00:00'),
(3, '0003', 0, '00000', '2013-12-01 00:00:00', '2013-12-01 00:00:00'),
(4, '0004', 0, '00000', '2013-12-01 00:00:00', '2013-12-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `temperature`
--

CREATE TABLE IF NOT EXISTS `temperature` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `tagID` varchar(4) NOT NULL,
  `temperature` decimal(3,1) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `temperature`
--

INSERT INTO `temperature` (`ID`, `tagID`, `temperature`, `time`) VALUES
(1, '0001', 38.7, '2013-12-01 10:00:00'),
(2, '0001', 38.6, '2013-12-01 10:15:00'),
(3, '0001', 38.5, '2013-12-01 10:30:00'),
(4, '0001', 38.4, '2013-12-01 10:45:00'),
(5, '0001', 38.6, '2013-12-01 11:00:00'),
(6, '0001', 38.3, '2013-12-01 11:15:00'),
(7, '0001', 38.2, '2013-12-01 11:30:00'),
(8, '0001', 38.1, '2013-12-01 11:45:00'),
(9, '0001', 38.0, '2013-12-01 12:00:00'),
(10, '0002', 37.0, '2013-12-01 12:00:00'),
(11, '0002', 37.1, '2013-12-01 12:15:00'),
(12, '0002', 37.2, '2013-12-01 12:30:00'),
(13, '0002', 37.3, '2013-12-01 12:45:00'),
(14, '0002', 37.4, '2013-12-01 13:00:00'),
(15, '0002', 37.5, '2013-12-01 13:15:00'),
(16, '0002', 37.4, '2013-12-01 13:30:00'),
(17, '0002', 37.9, '2013-12-01 13:45:00'),
(18, '0002', 37.8, '2013-12-01 14:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
