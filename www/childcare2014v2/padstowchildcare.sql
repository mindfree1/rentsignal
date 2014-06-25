-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: Localhost
-- Generation Time: Jun 22, 2014 at 09:20 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `padstowchildcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `medicalhistory`
--

CREATE TABLE IF NOT EXISTS `medicalhistory` (
  `medhistoryid` int(11) NOT NULL AUTO_INCREMENT,
  `childid` int(11) NOT NULL,
  `medicalid` int(11) NOT NULL,
  `medicine_description` varchar(40) NOT NULL,
  `dosage_amount` varchar(40) NOT NULL,
  `allergies` varchar(40) NOT NULL,
  `allergy_description` varchar(40) NOT NULL,
  `allergy_code` varchar(20) NOT NULL,
  PRIMARY KEY (`medhistoryid`),
  KEY `childid` (`childid`),
  KEY `medicalid` (`medicalid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `medicalhistory`
--

INSERT INTO `medicalhistory` (`medhistoryid`, `childid`, `medicalid`, `medicine_description`, `dosage_amount`, `allergies`, `allergy_description`, `allergy_code`) VALUES
(1, 1, 1, 'Sinues Tablets', '200mg', 'Sneezes', 'Causes person to sneeze when near pepper', 'MX-D102'),
(2, 2, 2, 'Take some cough syrup', '3 times a day', 'Coughing', 'Constant coughing', 'MD-485');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD CONSTRAINT `medicalhistory_ibfk_1` FOREIGN KEY (`childid`) REFERENCES `child` (`childid`) ON DELETE CASCADE ON UPDATE CASCADE;
