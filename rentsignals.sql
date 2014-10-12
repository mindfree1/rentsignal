-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: Localhost
-- Generation Time: Aug 26, 2014 at 10:59 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rentsignal`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `url` varchar(250) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image name` varchar(50) NOT NULL,
  `location` varchar(250) NOT NULL,
  `favstars` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`url`, `id`, `image name`, `location`, `favstars`) VALUES
('http://rentsignal.com/assets/img/sydnenham-eg-resized.jpg', 1, 'sydnem1', 'sydnem', 0),
('http://rentsignal.com/assets/img/sydnenham-deg.jpg', 2, 'sydnem2', 'rozelle', 10),
('http://rentsignal.com/assets/img/mascot-eg-resized.jpg', 3, 'mascot3', 'mascot', 0),
('http://rentsignal.com/assets/img/sydnenham-deg1-resized.jpg', 4, 'sydnem4', 'sydnem', 0),
('http://rentsignal.com/assets/img/sydnenham-deg2-resized.jpg', 5, 'mascot5', 'mascot', 8),
('http://rentsignal.com/assets/img/sydnenham-deg3-resized.jpg', 6, 'mascot4', 'mascot', 0),
('http://rentsignal.com/assets/img/sydnenham-deg5-resized.jpg', 7, 'mascot4', 'mascot', 0),
('http://rentsignal.com/assets/img/glebe2-org2-resize.jpg', 8, 'glebe2-2', 'glebe', 6),
('http://rentsignal.com/assets/img/glebe2-org-resize.jpg', 9, 'glebe2-1', 'glebe', 7),
('http://rentsignal.com/assets/img/glebe2-org3-resize.jpg', 10, 'glebe2-3', 'glebe', 0),
('http://rentsignal.com/assets/img/glebe-org-resize.jpg', 11, 'glebe-1', 'glebe', 5),
('http://rentsignal.com/assets/img/glebe-org2-resize.jpg', 12, 'glebe-2', 'glebe', 0);

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE IF NOT EXISTS `markers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Mascot', '1 Madeup street ', -33.931190, 151.194305, 'Residental'),
(2, 'Glebe', '2 Madeup street ', -33.880814, 151.187790, 'residental'),
(3, 'Sydenham', '3 Madeup street', -33.915222, 151.166107, 'Residental'),
(4, 'Woy Woy', '4 reallyfar street', -33.485855, 151.324768, 'Farm');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `name` varchar(50) NOT NULL,
  `type` varchar(25) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`name`, `type`, `version`) VALUES
('default', 'app', 6);

-- --------------------------------------------------------

--
-- Table structure for table `rentsignals`
--

CREATE TABLE IF NOT EXISTS `rentsignals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `rent` int(255) NOT NULL,
  `avail_from` date NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `rooms` int(10) NOT NULL,
  `bathrooms` int(10) NOT NULL,
  `favstars` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rentsignals`
--

INSERT INTO `rentsignals` (`id`, `location`, `description`, `lat`, `lng`, `rent`, `avail_from`, `created_at`, `updated_at`, `rooms`, `bathrooms`, `favstars`) VALUES
(1, 'glebe', 'sydney area', -33.880815, 151.187791, 250, '2012-06-15', 1339772003, 1340181649, 2, 1, 0),
(2, 'mascot', 'mascot eastern sydney', -33.931189, 151.19431, 500, '2012-06-15', 1339772561, 1340181677, 1, 2, 5),
(3, 'rozelle', 'nice new apartment, sharing with hot female', -33.863063, 151.170573, 700, '2012-06-15', 1340181739, 1340181739, 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `signals`
--

CREATE TABLE IF NOT EXISTS `signals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `lng_description` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `rent` text NOT NULL,
  `avail_from` date NOT NULL,
  `rooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `signals`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `group` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `login_hash` varchar(255) NOT NULL,
  `profile_fields` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `group`, `email`, `last_login`, `login_hash`, `profile_fields`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'NtgTF8q6Z9UyyUwQS7Ma5Bvj+uTrK/F66iMji9su1XY=', 100, 'tre@rentsignal.com', 1409049039, '5fedc4e8fbcfa530e981862c5682e40c0f6c5676', 'a:0:{}', 1399380673, 0);
