-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 06, 2015 at 02:09 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

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
(1, 'singoei', 'singoei@yahoo.com', 'singoei', 'logo.png');

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
(2, 'Title', 'Annoucement contents here...', 'Mar. 13, 2014 - 12:02 PM');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `budget`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user`, `comment`, `profile`, `date`) VALUES
(100, 'Administrator', 'plz book for me seat 5', 'logo.png', 'Apr. 18, 2015 - 01:19 AM'),
(99, 'Administrator', 'available', 'logo.png', 'Apr. 03, 2015 - 10:52 PM');

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
  `time` datetime NOT NULL,
  `detail` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `eventDate` datetime NOT NULL,
  `dateAdded` date NOT NULL,
  `Africa/Kenya` datetime NOT NULL,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `eventList` (`eventList`(30))
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventList`) VALUES
(29, 'seat 1'),
(30, 'seat 2'),
(31, 'seat 3'),
(32, 'seat 4'),
(33, 'Seat 5'),
(34, 'Seat 6'),
(35, 'Seat 7'),
(36, 'Seat 8'),
(37, 'Seat 9'),
(38, 'Seat 10'),
(44, 'Seat 11');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=179 ;

--
-- Dumping data for table `msg`
--

INSERT INTO `msg` (`id`, `recipient`, `sender`, `name`, `message`, `subject`, `status`, `date`, `define`) VALUES
(28, 'janmaripanol@yahoo.com.ph', 'Administrator', 'Administrator', 'This is sample message..', 'Message From : Administrator (Administrator)', 'read', 'May. 11, 2014 - 08:33 AM', 'janmaripanol@yahoo.com.ph'),
(29, 'Administrator', 'janmaripanol@yahoo.com.ph', 'Jan Mari Estandarte Panol', 'Test to Reply to message..', 'Message From : Jan Mari Estandarte Panol (janmaripanol@yahoo.com.ph)', 'read', 'May. 10, 2014 - 05:34 PM', 'janmaripanol@yahoo.com.ph'),
(31, 'Administrator', 'janmaripanol@yahoo.com.ph', 'Jan Mari Estandarte Panol', 'adwada', 'Message From : Jan Mari Estandarte Panol (janmaripanol@yahoo.com.ph)', 'unread', 'May. 10, 2014 - 05:38 PM', 'janmaripanol@yahoo.com.ph'),
(166, 'john@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Mar. 27, 2015 - 04:43 AM', 'john@yahoo.com'),
(33, 'Administrator', 'philib@yahoo.com', 'Philib Kibet Sang', 'hgfdsa', 'Message From : Philib Kibet Sang (philib@yahoo.com)', 'read', 'Mar. 22, 2015 - 06:12 PM', 'philib@yahoo.com'),
(169, 'john@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Mar. 28, 2015 - 03:35 AM', 'Administrator'),
(168, 'john@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Mar. 27, 2015 - 10:07 PM', 'john@yahoo.com'),
(36, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(170, 'john@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Mar. 28, 2015 - 03:35 AM', 'john@yahoo.com'),
(38, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(171, 'john@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Apr. 03, 2015 - 10:54 PM', 'Administrator'),
(40, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(172, 'john@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Apr. 03, 2015 - 10:54 PM', 'john@yahoo.com'),
(42, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(173, 'koech@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Apr. 03, 2015 - 10:54 PM', 'Administrator'),
(174, 'koech@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Apr. 03, 2015 - 10:54 PM', 'koech@yahoo.com'),
(44, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(175, 'simo@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Apr. 07, 2015 - 02:28 AM', 'Administrator'),
(46, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(176, 'simo@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Apr. 07, 2015 - 02:28 AM', 'simo@yahoo.com'),
(48, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(177, 'too@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Apr. 18, 2015 - 01:16 AM', 'Administrator'),
(50, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(178, 'too@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Apr. 18, 2015 - 01:16 AM', 'too@yahoo.com'),
(52, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(54, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(56, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(58, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(60, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(62, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:54 PM', ''),
(64, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(66, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(68, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(70, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(72, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(74, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(76, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(78, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(80, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(82, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(84, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(86, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(88, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(90, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(92, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(94, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(96, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(98, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(100, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(102, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(104, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(106, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(108, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(110, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(112, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(114, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(116, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(118, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:55 PM', ''),
(120, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(122, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(124, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(126, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(128, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(130, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(132, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(134, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(136, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(138, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(140, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(164, 'john@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Mar. 27, 2015 - 04:43 AM', 'john@yahoo.com'),
(142, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(144, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(146, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(148, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(150, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(152, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(154, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(156, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(158, '', 'Administrator', 'Administrator', 'Your reservation has been approved by administrator. \r\n		For more details and clarification, please visit St. Julian Parish Church (San Julian St. Janiuay, Iloilo)', 'Reservation Approval By Admin', 'unread', 'Mar. 22, 2015 - 06:56 PM', ''),
(160, 'philib@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'read', 'Mar. 23, 2015 - 03:01 PM', 'philib@yahoo.com'),
(162, 'philib@yahoo.com', 'Administrator', 'Administrator', 'Your Reservation Was Successfully Approved by Administrator!', 'Message From : Administrator (Administrator)', 'Unread', 'Mar. 24, 2015 - 01:16 AM', 'philib@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `requirements`
--

CREATE TABLE IF NOT EXISTS `requirements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reqfor` varchar(55) NOT NULL,
  `required` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `requirements`
--


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
  `link` varchar(30) NOT NULL,
  `timezone` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `reserved`
--

INSERT INTO `reserved` (`id`, `name`, `email`, `event`, `date`, `time`, `dateAdded`, `address`, `age`, `contact`, `cname`, `mr`, `mrs`, `offer`, `user_id`, `datecompar`, `datelimit`, `status`, `errors`, `link`, `timezone`) VALUES
(34, 'Edwin Too Terer', 'too@yahoo.com', 'Seat 6', '', '14:43:40', 'Apr. 18, 2015', '2054 Nairobi', '22', '0771456123', '', '', '', '', '12', 'Apr. 12, 2015 7:30 AM - 8:30 AM', '2015-04-21', 'Approved', '', '', 0),
(31, 'John Kitur Ngetich', 'john@yahoo.com', 'Seat 9', 'Apr. 15, 2015', '7:30 AM - 8:30 AM', 'Apr. 03, 2015', '2054, Kitale', '23', '0725898956', '', '', '', '', '8', 'Apr. 15, 2015 7:30 AM - 8:30 AM', '2015-04-06', 'Approved', '', '', 0),
(32, 'Koech Kitur Silvanus', 'koech@yahoo.com', 'seat 1', 'Mar. 20, 2015', '1:00 PM - 2:00 PM', 'Apr. 03, 2015', '31 Delta', '55', '072589895', '', '', '', '', '9', 'Mar. 20, 2015 1:00 PM - 2:00 PM', '2015-04-06', 'Approved', '', '', 0),
(35, 'Ffff Dfddff Ddddf', 'sam@yahoo.com', 'seat 2', 'Jan. 01, 1970', '7:30 AM - 8:30 AM', 'Apr. 24, 2015', '20eldy', '17', '', '', '', '', '', '14', 'Jan. 01, 1970 7:30 AM - 8:30 AM', '2015-04-27', 'pending', '', '', 0),
(36, 'Fdsa GFDSA GFDE', 'samwel@gmail.com', 'Seat 8', 'Jan. 01, 1970', '4:00 PM - 5:00 PM', 'Jul. 02, 2015', '2054nairobi', '25', '0721649472', '', '', '', '', '15', 'Jan. 01, 1970 4:00 PM - 5:00 PM', '2015-07-05', 'pending', '', '', 0);

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
  `link` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile`, `email`, `pass`, `fname`, `mname`, `lname`, `address`, `age`, `contact`, `gender`, `status`, `active`, `link`) VALUES
(1, 'logo.png', ' Administrator', '', ' Administrator', '', '', '', '', '', '', '', '', ''),
(4, 'a87ff679a2f3e71d9181a67b7542122c.gif', 'janmaripanol@yahoo.com.ph', '5f4dcc3b5aa765d61d8327deb882cf99', 'Jan Mari', 'Estandarte', 'Panol', 'Sta. Rita St. Janiuay, Iloilo', '23', '09203029348', 'Male', '1', '0', ''),
(5, 'user.jpg', 'sss.samwel@yahoo.com', '4590077be51a4f3014d966975a51d49b', 'Samwel', 'Kipkemboi', 'Singoei', '2054nairobi', '23', '072589895', 'Male', '1', '0', ''),
(8, 'user.jpg', 'john@yahoo.com', 'f5e2f0afd91cd0ea8a0991723b146ec3', 'John', 'Kitur', 'Ngetich', '2054, Kitale', '23', '0725898956', 'Male', '1', '0', ''),
(12, 'user.jpg', 'too@yahoo.com', 'b403d3f0efbf4cb850d2d543758cb57c', 'Edwin', 'Too', 'Terer', '2054 Nairobi', '22', '0771456123', 'Male', '1', '0', ''),
(13, 'user.jpg', 'kk@yahoo.com', 'c08ac56ae1145566f2ce54cbbea35fa3', 'Ss', 'Kk', 'Dd', '20nairobi', '15', '0715156202', 'Male', '1', '0', ''),
(14, 'aab3238922bcc25a6f606eb525ffdc56.jpg', 'sam@yahoo.com', 'eadd934e2cc978fc622fc1324878d8af', 'Ffff', 'Dfddff', 'Ddddf', '20eldy', '17', '', 'Male', '1', '0', ''),
(15, 'user.jpg', 'samwel@gmail.com', 'eadd934e2cc978fc622fc1324878d8af', 'Fdsa', 'GFDSA', 'GFDE', '2054nairobi', '25', '0721649472', 'Male', '1', '0', '');
