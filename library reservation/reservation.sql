-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2015 at 09:40 AM
-- Server version: 5.5.24
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `profile` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`, `profile`) VALUES
(1, 'sam', 'sam@gmail.com', 'sam', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE IF NOT EXISTS `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `detail` varchar(550) NOT NULL,
  `date` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `detail`, `date`) VALUES
(2, 'closimg of libray', 'reservation will not be received this week due to renovation taking', 'Nov. 24, 2015 - 01:45 AM');

-- --------------------------------------------------------

--
-- Table structure for table `budget`
--

CREATE TABLE IF NOT EXISTS `budget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(15) COLLATE latin1_general_ci NOT NULL,
  `year` varchar(4) COLLATE latin1_general_ci NOT NULL,
  `content` varchar(5000) COLLATE latin1_general_ci NOT NULL,
  `dateAdded` varchar(35) COLLATE latin1_general_ci NOT NULL,
  `filename` varchar(120) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `budget`
--

INSERT INTO `budget` (`id`, `month`, `year`, `content`, `dateAdded`, `filename`) VALUES
(7, 'April', '2014', 'ADDITIONAL DONORS\r\nDEC 1-30, 2013\r\nDONORS\r\n1.	FEISA LASTIRE						P	1,000.00\r\n2.	AQUINO NOBLEZA WEST					4,000.00\r\n3.	LYDIA VILLAMOR						1 ,000.00\r\n4.	JOHN GORDON							1 ,000.00\r\n5.	EIGO FAMILY							150,000.00\r\n6.	SENEN APOLONIO						500.00\r\n7.	CAPT. & DR. RAFAEL ABAD JR.					1,000.00\r\n8.	DANIEL BAEL							5,000.00\r\n9.	AGUSTIN CATEDRILLA						1,000.00\r\n10.	EDEN ABONADO						10,000.00\r\n11.	GODOFREDO COLADA						500.00\r\n12.	ALLAN CAPADOSA						2,000.00\r\n13.	CECELIA MELANCIO						1,700.00\r\n14.	MICHELLE BANQUILO						1,000.00\r\n15.	VIVIAN GATO							1,000.00\r\n16.	TOLARUCAN MINI PARISH SITIO CETRAL				500.00\r\n17.	TOLARUCAN MINI PARISH SITIO SCHOOL SITE			500.00\r\n18.	JULIET ELER							500.00\r\n19.	TERESITA TOBANO						1,000.00\r\n20.	DELIA APISTAR							1,000.00\r\n21.	CFC GLOBAL							3,500.00\r\n22.	FELIZARDO PERONO						2,000.00\r\nTOTAL CASH RECEIVED					P	189,700.00\r\nSUMMARY OF TRANSACTIONS\r\n\r\nCONSTRUCTION COST SUMMARY OF PHASE II		P	385,392.00\r\nEXPENSES			\r\n	DEC. 3,2013 – 1ST DOWN PAYMENT - P 150,000.00\r\nDEC.21,2013 – 2ND DOWN PAYMENT –  P 100,000.00			P	250,000.00\r\nBALANCE TO PAY THE FULL PAYMENT					135, 392.00\r\n\r\nSTATEMENT OF CASH POSITON\r\nCASH IN BANK\r\n			JANIUAY RURAL BANK				P	540,765.26\r\n			BANCO DE ORO P ACCT.				P	13, 723.94\r\n							$ ACCT. 	667.26 	=26,690.40\r\n			TOTAL ----------------------------------------------------P		581,179.60\r\nCASH IN HAND:\r\nTOTAL: NET CASH ----------------------------------------------------------------P		591,679.60\r\nLESS: BALANCE TO PAY THE FULL PAYMENT  -----------       			135,392.00\r\nTOTAL:CASH POSITION --------------------------------------------------------P		456,287.60\r\n\r\nPREPARED BY:\r\nCLODUALDO CRUCERO\r\nPFC Treasurer\r\nAPPROVED BY:\r\nRICARDO SALOMA\r\nPFC CHAIRMAN', 'Apr 25, 2014 - 10:53 PM', ''),
(10, 'May', '2014', 'adwdadad awdiha diahd iahd iadh aidhaw\r\nawdioahd pawhid oahdo ad;a gd;a''hjpj apd\r\nafa pwfa[ fajpfahjf pajf p[af jafhjaw pfjawo\r\nadh awdpha pdajd ajd ajdoaw\r\n', 'Apr 27, 2014 - 06:20 AM', '');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(55) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `date` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user`, `comment`, `profile`, `date`) VALUES
(98, 'Administrator', 'dont make reservation this work', 'logo.png', 'Nov. 24, 2015 - 01:45 AM');

-- --------------------------------------------------------

--
-- Table structure for table `contactnum`
--

CREATE TABLE IF NOT EXISTS `contactnum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contNum` varchar(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contactnum`
--

INSERT INTO `contactnum` (`id`, `contNum`) VALUES
(1, '09122266949');

-- --------------------------------------------------------

--
-- Table structure for table `errorlog`
--

CREATE TABLE IF NOT EXISTS `errorlog` (
  `id` int(11) NOT NULL,
  `error` varchar(300) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(55) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `errorlog`
--


-- --------------------------------------------------------

--
-- Table structure for table `eventcalendar`
--

CREATE TABLE IF NOT EXISTS `eventcalendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `title` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `time` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `detail` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `eventDate` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `dateAdded` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `eventcalendar`
--


-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eventList` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventList`) VALUES
(29, 'Seat 1'),
(30, 'Seat 2');

-- --------------------------------------------------------

--
-- Table structure for table `msg`
--

CREATE TABLE IF NOT EXISTS `msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `recipient` varchar(55) NOT NULL,
  `sender` varchar(55) NOT NULL,
  `name` varchar(55) NOT NULL,
  `message` varchar(500) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `status` varchar(6) NOT NULL,
  `date` varchar(50) NOT NULL,
  `define` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `recipient`, `sender`, `name`, `message`, `subject`, `status`, `date`, `define`) VALUES
(27, 'janmaripanol@yahoo.com.ph', 'Administrator', 'Administrator', 'This is sample message..', 'Message From : Administrator (Administrator)', 'unread', 'May. 11, 2014 - 08:33 AM', 'Administrator'),
(28, 'janmaripanol@yahoo.com.ph', 'Administrator', 'Administrator', 'This is sample message..', 'Message From : Administrator (Administrator)', 'read', 'May. 11, 2014 - 08:33 AM', 'janmaripanol@yahoo.com.ph'),
(29, 'Administrator', 'janmaripanol@yahoo.com.ph', 'Jan Mari Estandarte Panol', 'Test to Reply to message..', 'Message From : Jan Mari Estandarte Panol (janmaripanol@yahoo.com.ph)', 'read', 'May. 10, 2014 - 05:34 PM', 'janmaripanol@yahoo.com.ph'),
(30, 'Administrator', 'janmaripanol@yahoo.com.ph', 'Jan Mari Estandarte Panol', 'Test to Reply to message..', 'Message From : Jan Mari Estandarte Panol (janmaripanol@yahoo.com.ph)', 'read', 'May. 10, 2014 - 05:34 PM', 'Administrator'),
(31, 'Administrator', 'janmaripanol@yahoo.com.ph', 'Jan Mari Estandarte Panol', 'adwada', 'Message From : Jan Mari Estandarte Panol (janmaripanol@yahoo.com.ph)', 'unread', 'May. 10, 2014 - 05:38 PM', 'janmaripanol@yahoo.com.ph'),
(32, 'Administrator', 'janmaripanol@yahoo.com.ph', 'Jan Mari Estandarte Panol', 'adwada', 'Message From : Jan Mari Estandarte Panol (janmaripanol@yahoo.com.ph)', 'read', 'May. 10, 2014 - 05:38 PM', 'Administrator'),
(33, 'janmaripanol@yahoo.com.ph', 'Administrator', 'Administrator', 'thanks', 'Message From : Administrator (Administrator)', 'unread', 'Nov 04 2015  03:47', 'Administrator'),
(34, 'janmaripanol@yahoo.com.ph', 'Administrator', 'Administrator', 'thanks', 'Message From : Administrator (Administrator)', 'unread', 'Nov 04 2015  03:47', 'janmaripanol@yahoo.com.ph'),
(35, 'janmaripanol@yahoo.com.ph', 'Administrator', 'Administrator', 'rdewq!twed', 'Message From : Administrator (Administrator)', 'unread', 'Nov 24 2015  02:06', 'Administrator'),
(36, 'janmaripanol@yahoo.com.ph', 'Administrator', 'Administrator', 'rdewq!twed', 'Message From : Administrator (Administrator)', 'unread', 'Nov 24 2015  02:06', 'janmaripanol@yahoo.com.ph'),
(37, 'sam@gmail.com', 'Administrator', 'Administrator', 'ddd', 'Message From : Administrator (Administrator)', 'unread', 'Nov. 24, 2015 - 02:07 AM', 'Administrator'),
(38, 'sam@gmail.com', 'Administrator', 'Administrator', 'ddd', 'Message From : Administrator (Administrator)', 'read', 'Nov. 24, 2015 - 02:07 AM', 'sam@gmail.com'),
(39, 'Administrator', 'sam@gmail.com', 'Cxzc Xz Vcxz Cxz', 'thanks alot', 'Message From : Cxzc Xz Vcxz Cxz (sam@gmail.com)', 'unread', 'Nov. 23, 2015 - 09:11 PM', 'sam@gmail.com'),
(40, 'Administrator', 'sam@gmail.com', 'Cxzc Xz Vcxz Cxz', 'thanks alot', 'Message From : Cxzc Xz Vcxz Cxz (sam@gmail.com)', 'unread', 'Nov. 23, 2015 - 09:11 PM', 'Administrator'),
(41, 'janmaripanol@yahoo.com.ph', 'sam@gmail.com', 'Cxzc Xz Vcxz Cxz', 'bvncm,x.s/a', 'Message From : Cxzc Xz Vcxz Cxz (sam@gmail.com)', 'unread', 'Nov. 23, 2015 - 09:11 PM', 'sam@gmail.com'),
(42, 'janmaripanol@yahoo.com.ph', 'sam@gmail.com', 'Cxzc Xz Vcxz Cxz', 'bvncm,x.s/a', 'Message From : Cxzc Xz Vcxz Cxz (sam@gmail.com)', 'unread', 'Nov. 23, 2015 - 09:11 PM', 'janmaripanol@yahoo.com.ph');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reqfor` varchar(55) NOT NULL,
  `required` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `requirements`
--

INSERT INTO `requirements` (`id`, `reqfor`, `required`) VALUES
(12, 'Wedding', 'Baptismal and Confirmation Certificates\r\nCopy of Birth Certificate from NSO\r\nMarriage License from the City Hall\r\nCanonical Interviews\r\nMarriage Banns\r\nList of Entourage Members'),
(14, 'Christening', 'Empty'),
(21, 'House Blessing', 'Empty'),
(17, 'Burial', 'Empty'),
(25, 'Seat 1', 'Empty'),
(26, 'Seat 2', 'Empty');

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE IF NOT EXISTS `reserved` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `event` varchar(50) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(30) NOT NULL,
  `dateAdded` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `age` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `cname` varchar(55) NOT NULL,
  `mr` varchar(55) NOT NULL,
  `mrs` varchar(55) NOT NULL,
  `offer` varchar(50) NOT NULL,
  `user_id` varchar(60) NOT NULL,
  `datecompar` varchar(50) NOT NULL,
  `datelimit` varchar(55) NOT NULL,
  `status` varchar(10) NOT NULL,
  `errors` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `reserved`
--

INSERT INTO `reserved` (`id`, `name`, `email`, `event`, `date`, `time`, `dateAdded`, `address`, `age`, `contact`, `cname`, `mr`, `mrs`, `offer`, `user_id`, `datecompar`, `datelimit`, `status`, `errors`) VALUES
(20, 'Korir Too', '', 'Wedding', 'Nov. 27, 2015', '2:00 PM - 3:00 PM', 'Nov. 24, 2015', '2054,eldoret', '', '', '', '', '', '', '', 'Nov. 27, 2015 2:00 PM - 3:00 PM', '', 'approved', ''),
(19, 'Cxzc Xz Vcxz Cxz', 'sam@gmail.com', 'WIFI and Free Internat Services', 'Nov. 30, 2015', '8:30 AM - 9:30 AM', 'Nov. 24, 2015', '2025cxc', '23', '0121', '', '', '', '', '5', 'Nov. 30, 2015 8:30 AM - 9:30 AM', '2015-11-27', 'pending', ''),
(21, 'Cxzc Xz Vcxz Cxz', 'sam@gmail.com', 'Seat 2', 'Nov. 30, 2015', '4:00 PM - 5:00 PM', 'Nov. 24, 2015', '2025cxc', '23', '0121', '', '', '', '', '5', 'Nov. 30, 2015 4:00 PM - 5:00 PM', '2015-11-27', 'pending', ''),
(22, 'Cxzc Xz Vcxz Cxz', 'sam@gmail.com', 'Personal Study', 'Dec. 10, 2015', '7:30 AM - 8:30 AM', 'Nov. 24, 2015', '2025cxc', '23', '0121', '', '', '', '', '5', 'Dec. 10, 2015 7:30 AM - 8:30 AM', '2015-11-27', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile`, `email`, `pass`, `fname`, `mname`, `lname`, `address`, `age`, `contact`, `gender`, `status`, `active`) VALUES
(1, 'logo.png', ' Administrator', '', ' Administrator', '', '', '', '', '', '', '', ''),
(4, 'a87ff679a2f3e71d9181a67b7542122c.gif', 'janmaripanol@yahoo.com.ph', '5f4dcc3b5aa765d61d8327deb882cf99', 'Jan Mari', 'Estandarte', 'Panol', 'Sta. Rita St. Janiuay, Iloilo', '23', '09203029348', 'Male', '1', '0'),
(5, 'user.jpg', 'sam@gmail.com', 'eadd934e2cc978fc622fc1324878d8af', 'Cxzc Xz', 'Vcxz', 'Cxz', '2025cxc', '23', '0121', 'Male', '1', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
