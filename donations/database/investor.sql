-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 19, 2013 at 07:37 PM
-- Server version: 5.1.46
-- PHP Version: 5.3.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `twihute`
--

-- --------------------------------------------------------

--
-- Table structure for table `investor`
--

CREATE TABLE IF NOT EXISTS `investor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `phone_contact` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `investor`
--

