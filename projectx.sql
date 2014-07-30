-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2014 at 02:16 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `projectx`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `akun`
--


-- --------------------------------------------------------

--
-- Table structure for table `fix_plan`
--

CREATE TABLE IF NOT EXISTS `fix_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label_id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `max_amount` decimal(20,2) NOT NULL,
  `kind` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `fix_plan`
--


-- --------------------------------------------------------

--
-- Table structure for table `label`
--

CREATE TABLE IF NOT EXISTS `label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `priority` int(11) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `label`
--

INSERT INTO `label` (`id`, `name`, `priority`, `note`) VALUES
(12, 'Nabung', 1, ''),
(11, 'Makan', 1, ''),
(10, 'Transportasi', 1, ''),
(9, 'Senang-senang', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE IF NOT EXISTS `merchant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `merchant`
--


-- --------------------------------------------------------

--
-- Table structure for table `my_cash`
--

CREATE TABLE IF NOT EXISTS `my_cash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kind` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `label_id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `amount` decimal(20,2) NOT NULL,
  `rab_id` int(11) NOT NULL,
  `akun_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `my_cash`
--

INSERT INTO `my_cash` (`id`, `kind`, `date`, `label_id`, `detail`, `amount`, `rab_id`, `akun_id`) VALUES
(13, 'Expense', '2014-05-01', 10, 'Beli bensin', 150000.00, 1, 0),
(12, 'Expense', '2014-05-01', 11, '', 300000.00, 1, 0),
(11, 'Expense', '2014-05-01', 11, '', 200000.00, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `my_plan`
--

CREATE TABLE IF NOT EXISTS `my_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kind` varchar(255) NOT NULL,
  `label_id` int(11) NOT NULL,
  `detail` text NOT NULL,
  `max_amount` decimal(20,2) NOT NULL,
  `rab_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `my_plan`
--

INSERT INTO `my_plan` (`id`, `kind`, `label_id`, `detail`, `max_amount`, `rab_id`) VALUES
(7, '', 12, '', 1000000.00, 1),
(6, '', 11, '', 800000.00, 1),
(4, '', 9, '', 7000000.00, 1),
(5, '', 10, '', 1000000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rab`
--

CREATE TABLE IF NOT EXISTS `rab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kind` varchar(255) NOT NULL,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rab`
--

