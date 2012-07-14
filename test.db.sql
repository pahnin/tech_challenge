-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 07, 2012 at 03:28 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `comm_details`
--

CREATE TABLE IF NOT EXISTS `comm_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) DEFAULT NULL,
  `addr_line1` varchar(100) DEFAULT NULL,
  `addr_line2` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `zipcode` varchar(30) DEFAULT NULL,
  `phone1` varchar(100) DEFAULT NULL,
  `email1` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comm_details`
--

INSERT INTO `comm_details` (`id`, `person_id`, `addr_line1`, `addr_line2`, `city`, `state`, `country`, `zipcode`, `phone1`, `email1`) VALUES
(1, 1, '425, Mackway Lane', 'Broadwick', 'London', 'England', 'United Kingdom', 'SW13CV', '715-022-2212', 'jdoe@improvi.in'),
(2, 2, '316, McLoghan Street', 'Whistletower', 'Swindon', 'West Hampshire', 'United Kingdom', 'CV11D3', '7772150121', 'jane.doe@improvi.in');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='person table' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`id`, `first_name`, `last_name`, `dob`, `user_id`, `password`, `comments`) VALUES
(1, 'John', 'Doe', '1984-07-01', 'jdoe', 'jdoe', 'Person 1'),
(2, 'Jane', 'Doe', '1977-07-31', 'janed', 'janed', 'Person 2'),
(3, 'Chrisann', 'Brennan', '1977-07-10', 'cbrenn', 'cbrenn', 'Person 3'),
(4, 'Greg', 'Calhoun', '1964-04-17', 'gregc', 'gregc', 'Person 4'),
(5, 'Daniel', 'Kotke', '1978-03-24', 'dkotke', 'dkotke', 'Person 5'),
(6, 'Elizabeth', 'Holmes', '1976-05-25', 'eholmes', 'eholmes', 'Person 6'),
(7, 'Lisa', 'Brennen', '1978-05-17', 'lisab', 'lisab', 'Person 7'),
(8, 'Tim', 'Cook', '1963-03-21', 'tcook', 'tcook', 'Person 8'),
(9, 'John', 'Lasseter', '1956-10-18', 'johnl', 'johnl', 'Person 9'),
(10, 'Jon', 'Rubinstein', '1955-01-25', 'jonr', 'jonr', 'Person 10');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
