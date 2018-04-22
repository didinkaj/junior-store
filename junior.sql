-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2015 at 10:14 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `junior`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_title` varchar(100) NOT NULL,
  `album_description` text NOT NULL,
  `created_by` varchar(34) NOT NULL,
  `date_created` date NOT NULL,
  `uid` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `album_title`, `album_description`, `created_by`, `date_created`, `uid`) VALUES
(15, 'Chepkoilel premises', 'beaty of chepkoilel well built structures you will admire                                                                ', 'shaaban', '2015-03-03', 'miIgVXc2AEfhP6K'),
(16, 'Moi uni trip', 'Moi univertity falls an awesome place to be and spent time ', 'shaaban', '2015-03-03', 'HRnSstX3qOmGFZx'),
(18, 'peter maina', 'cul and fantastic', 'jacky', '2015-03-03', 'SxOlepuj5EvILai'),
(19, 'kimani   kamwana                     ', 'well disciplined boy boy                               ', 'Ouma', '2015-03-03', 'zZEvenbxy5YusIj'),
(20, 'mwangi  Alfred kiguru', '2 nd born  ', 'Ouma', '2015-03-03', 'tYD50xcCb2KwJRu'),
(21, 'coast', 'mombasa pirates', 'Elvo', '2015-03-05', 'NmZdCWBLQikH3E1'),
(22, 'seacom', 'optical cable company', 'Elvo', '2015-03-05', 'FJ4j7oziKWIhN5S'),
(23, 'elgon   ', 'cull photos  mm ', 'kogo', '2015-03-06', 'tfIPra0cvMK2oD6'),
(24, 'childhood memories', 'womderful moments', 'kogo', '2015-03-09', 'glwCXqbPuk89vQh'),
(25, 'wirldlife  ', 'tour to park  ', 'kogo', '2015-03-09', 'wMt2vPcOpX3YBZz'),
(26, 'den', 'den pics', 'Koech', '2015-03-12', 'apoWDgGEBHjkrs9'),
(27, 'chrismas ', 'celebration ', 'Elvo', '2015-03-20', 'T0h2YidzCmpA495'),
(28, 'coast trip', 'a visit to the coast', 'Meto', '2015-03-28', 'hfRe56lGVNYyJEk');

-- --------------------------------------------------------

--
-- Table structure for table `friendsbook`
--

CREATE TABLE IF NOT EXISTS `friendsbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL,
  `friend` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `friendsbook`
--

INSERT INTO `friendsbook` (`id`, `user`, `friend`, `date`) VALUES
(16, 'shaaban', 'Ouma', '0000-00-00 00:00:00'),
(17, 'shaaban', 'Meto', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `friends_request`
--

CREATE TABLE IF NOT EXISTS `friends_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` varchar(255) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=346 ;

--
-- Dumping data for table `friends_request`
--

INSERT INTO `friends_request` (`id`, `user_from`, `user_to`) VALUES
(179, 'Kouko', 'Shaka'),
(180, 'Elvo', 'peter'),
(182, 'Elvo', 'Alice'),
(193, 'Elvo', 'dosh'),
(194, 'jacky', 'Alice'),
(196, 'Ouma', 'peter'),
(204, 'Ouma', 'Alice'),
(206, 'kanungo', 'Alice'),
(211, 'shaaban', 'Alice'),
(213, 'Mwaka', 'Alice'),
(217, 'Mwaka', 'Chumba'),
(218, 'Mwaka', 'dosh'),
(226, 'bash', 'glad'),
(227, 'bash', 'dosh'),
(228, 'bash', 'orsh'),
(232, 'Songok', 'Mwaka'),
(234, 'Songok', 'kip'),
(235, 'Songok', 'glad'),
(236, 'shaaban', 'glad'),
(237, 'shaaban', 'Mwaka'),
(238, 'shaaban', 'Koech'),
(257, 'Songok', 'Ouma'),
(263, 'shaaban', 'opar'),
(264, 'shaaban', 'mwas'),
(266, 'shaaban', 'Mwash'),
(270, 'jacky', 'opar'),
(271, 'jacky', 'Koech'),
(272, 'jacky', 'glad'),
(273, 'jacky', 'Korir'),
(274, 'jacky', 'Chumba'),
(275, 'jacky', 'Mwaka'),
(277, 'jacky', 'Ouma'),
(279, 'Elvo', 'opar'),
(280, 'Elvo', 'Koech'),
(281, 'Elvo', 'Shaka'),
(282, 'Elvo', 'Ouma'),
(283, 'Elvo', 'glad'),
(284, 'Elvo', 'Kiptum'),
(286, 'Elvo', 'Korir'),
(287, 'Elvo', 'Mwash'),
(289, 'Kouko', 'opar'),
(290, 'Kouko', 'Koech'),
(291, 'Kouko', 'glad'),
(292, 'Kouko', 'kanungo'),
(293, 'Kouko', 'Korir'),
(294, 'Kouko', 'Mwash'),
(295, 'Kouko', 'Ouma'),
(296, 'Kouko', 'mwas'),
(297, 'Kouko', 'dosh'),
(299, 'Meto', 'opar'),
(300, 'Meto', 'Koech'),
(301, 'Meto', 'orsh'),
(302, 'Meto', 'glad'),
(303, 'Meto', 'Chumba'),
(305, 'Meto', 'Ouma'),
(306, 'Meto', 'Korir'),
(307, 'Meto', 'Kimangi'),
(310, 'Songok', 'opar'),
(311, 'Songok', 'Koech'),
(312, 'Songok', 'kanungo'),
(313, 'Songok', 'Kimangi'),
(314, 'Songok', 'Elvo'),
(315, 'Songok', 'Alice'),
(317, 'bash', 'opar'),
(318, 'bash', 'Koech'),
(319, 'bash', 'Meto'),
(320, 'bash', 'mwas'),
(321, 'bash', 'Songok'),
(322, 'bash', 'peter'),
(323, 'bash', 'kip'),
(326, 'kibiru', 'opar'),
(327, 'kibiru', 'Mwaka'),
(328, 'kibiru', 'glad'),
(329, 'kibiru', 'peter'),
(332, 'kogo', 'opar'),
(333, 'kogo', 'Koech'),
(334, 'kogo', 'glad'),
(335, 'kogo', 'Ouma'),
(337, 'mary', 'opar'),
(338, 'mary', 'Mwaka'),
(339, 'mary', 'glad'),
(340, 'mary', 'Chumba'),
(341, 'angi', 'mary'),
(342, 'angi', 'opar'),
(343, 'angi', 'Koech'),
(344, 'shaaban', 'orsh'),
(345, 'Chumba', 'glad');

-- --------------------------------------------------------

--
-- Table structure for table `junior_account`
--

CREATE TABLE IF NOT EXISTS `junior_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `nname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `about` text NOT NULL,
  `date_created` date NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `img_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `junior_account`
--

INSERT INTO `junior_account` (`id`, `fname`, `lname`, `nname`, `dob`, `about`, `date_created`, `created_by`, `img_url`) VALUES
(2, 'Sandra', 'johnson', 'didinka', '2001-03-03', 'cute baby', '2015-03-05', 'shaaban', 'r1g9Q0BzR3ZcbTA/IMG-20141231-WA0001.jpg'),
(3, 'Alice', 'Chepngetich', 'Chep', '1993-10-31', 'cute girl', '2015-03-05', 'jacky', 'AltWugfGRnIimey/10306244_797234470365607_8536154666687153479_n.jpg'),
(4, 'Frankilin', 'johnson', 'henry', '2015-03-02', 'cull boy', '2015-03-05', 'shaaban', '19EaRxdgQWkNj4S/cm sdasd.jpg'),
(5, 'Alex', 'Kiptanui', 'kori', '2015-03-02', 'hi there', '2015-03-05', 'Elvo', 'JLRIVEHuqkNPFTa/chep 009.jpg'),
(6, 'Mercy', 'chepngetich', 'chumba', '2015-03-27', 'cute girl', '2015-03-05', 'Elvo', 'kVE5bwg9OI1RoYh/3486265.jpg'),
(7, 'Atieno', 'Josphine', 'Atish', '2015-03-20', 'cull girl', '2015-03-05', 'Ouma', 'YN3xfV1XkrODvPb/images2.jpg'),
(8, 'Peter', 'Anyang', 'Nyongo', '2015-03-21', 'cull boy', '2015-03-05', 'Ouma', '18TE4wFPb6VsHO9/fruits 02 VGA.jpg'),
(9, 'Edwardo', 'Shaaban', 'Sammuel', '1993-10-31', 'cull boy', '2015-03-05', 'shaaban', 'wsxvyQ3SIpXjL94/photo0090.jpg'),
(11, 'Pascal', 'Opar', 'ouma', '2015-03-19', 'cull boy', '2015-03-05', 'Elvo', 'rlYcBvdC4nhxs6z/adscad.jpg'),
(13, 'Ndunda', 'Micheal', 'Kimwana', '1990-12-02', 'well descipline boy', '2015-03-06', 'Ouma', '0tOjxLPzr7qJgM4/imgresn.jpg'),
(14, 'Kibet', 'Julius', 'kogo', '2001-03-03', 'lovely child ', '2015-03-06', 'kogo', 'vahlHe4Vq2Kj7NJ/photo0067.jpg'),
(27, 'Edwardo', 'johnson', 'didinka', '1990-12-02', 'wonderful boy', '2015-03-09', 'kogo', '7t0dEsiqzKm8JrB/564050_613612385333985_277754793_n.jpg'),
(30, 'Alice', 'Cheptoo', 'chep', '2001-03-03', 'cute girl', '2015-03-09', 'kogo', '9uQRTkWLOXMFyNe/1376580_10151878817796749_162570700_n.png'),
(31, 'den', 'den', 'denoo', '2004-05-06', 'active boy', '2015-03-12', 'Koech', 'KtvOoQEbj3quMI9/n.jpg'),
(32, 'Peter', 'james', 'peter', '2015-04-02', 'jhbiuhi', '2015-04-08', 'Meto', 'wzRAuxvd54tCZem/ssdcfs.jpg'),
(33, 'tom', 'toms', 'tom', '2015-05-02', 'i know i will give birth', '2015-04-24', 'jane', '');

-- --------------------------------------------------------

--
-- Table structure for table `junior_account_posts`
--

CREATE TABLE IF NOT EXISTS `junior_account_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` text NOT NULL,
  `posted_by` varchar(300) NOT NULL,
  `date_posted` date NOT NULL,
  `posted_to` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `junior_account_posts`
--

INSERT INTO `junior_account_posts` (`id`, `body`, `posted_by`, `date_posted`, `posted_to`) VALUES
(1, 'hellow there', 'shaaban', '2015-03-06', '4'),
(3, 'my third born', 'shaaban', '2015-03-06', '9'),
(4, 'hellow', 'shaaban', '2015-03-06', '9'),
(5, 'well well testing', 'shaaban', '2015-03-06', '2'),
(7, 'e to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social ', 'Ouma', '2015-03-06', '7'),
(8, 'e to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social ', 'Ouma', '2015-03-06', '8'),
(9, 'e to study special needs education, because they donâ€™t want much task. There is lack of special needs t', 'Ouma', '2015-03-06', '8'),
(10, 'e to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social ', 'Ouma', '2015-03-06', '8'),
(11, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', 'shaaban', '2015-03-06', '2'),
(12, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give educational ', 'shaaban', '2015-03-06', '2'),
(14, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to the dressing, eating and toileting. Such learners never acquire s', 'shaaban', '2015-03-06', '4'),
(16, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', 'shaaban', '2015-03-06', '9'),
(17, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give e', 'shaaban', '2015-03-06', '9'),
(18, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give ', 'shaaban', '2015-03-06', '9'),
(19, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', 'kogo', '2015-03-06', '14'),
(21, 'educational support to these learners. Autistic spectrum disorder skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training\r\n', 'kogo', '2015-03-09', '14'),
(22, 'educational support to these learners. Autistic spectrum disorder skills such as bathing, \r\n', 'kogo', '2015-03-09', '14'),
(23, 'educational support to these learners. Autistic spectrum disorder skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training\r\n', 'kogo', '2015-03-09', '14'),
(24, 'educational support to these learners. Autistic spectrum disorder skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training\r\n', 'kogo', '2015-03-09', '27'),
(25, 'educational support to these learners. Autistic spectrum disorder skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training\r\n', 'kogo', '2015-03-09', '30'),
(28, 'social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', 'Elvo', '2015-03-20', '5'),
(29, 'Junior Store is A social media platform where parents archive and share information on children and parenting\r\nJunior store is intended to bring parents all over the world together, to share information on elementary parenting, especially child bearing and also be able to keep chronological archive of their children childhood memories which they can later hand over to their children when they mature.', 'Elvo', '2015-03-20', '5'),
(30, 'chronological archive of their children childhood memories which they can later hand over to their children when they mature', 'Elvo', '2015-03-20', '5'),
(33, 'hellow there', 'Ouma', '2015-03-30', '7'),
(34, 'There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social ', 'Ouma', '2015-03-30', '7'),
(36, 'hellow there', 'Elvo', '2015-04-08', '11'),
(37, 'born to suffer', 'jacky', '2015-11-20', '3');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `date_posted` date NOT NULL,
  `description` text NOT NULL,
  `image_url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=181 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `uid`, `username`, `date_posted`, `description`, `image_url`) VALUES
(28, 'miIgVXc2AEfhP6K', 'shaaban', '0000-00-00', 'description', 'XJNMCQVteY0azli/27899_296739690445111_55419069_n.jpg'),
(29, 'miIgVXc2AEfhP6K', 'shaaban', '0000-00-00', 'description', 'KosHgFuaOCtnpPk/1157504_422946644491081_2122892313_n.jpg'),
(30, 'HRnSstX3qOmGFZx', 'shaaban', '0000-00-00', 'description', 'TZzxkheEpdMLoHl/10641254_1463923390558500_1481825804911038032_n.jpg'),
(31, 'miIgVXc2AEfhP6K', 'shaaban', '0000-00-00', 'culll photo', 'RrOHLSNVkA4ojvm/Balloons.jpg'),
(32, 'HRnSstX3qOmGFZx', 'shaaban', '0000-00-00', 'cull memories', 'nowqhk1xSDfv39N/images7_001.jpg'),
(34, 'miIgVXc2AEfhP6K', 'shaaban', '0000-00-00', 'funn', 'ukvEwNjmaRb7G9L/images1.jpg'),
(35, 'HRnSstX3qOmGFZx', 'shaaban', '0000-00-00', 'swimo', 'Pf0nFIJ7wat1485/photo0070.jpg'),
(36, 'miIgVXc2AEfhP6K', 'shaaban', '0000-00-00', 'chep', 'EuNCs2m7r6WHbKG/chep 038.jpg'),
(37, 'miIgVXc2AEfhP6K', 'shaaban', '0000-00-00', 'cull memories', '3yQMiRWojpCGJDn/fruits 02 VGA.jpg'),
(38, 'HRnSstX3qOmGFZx', 'shaaban', '0000-00-00', 'nature', '1A5Hj8TMklX7rbd/Photo0191.jpg'),
(39, 'HRnSstX3qOmGFZx', 'shaaban', '0000-00-00', 'good', 'PXzqv6OhKM0bwLu/IMG_20150204_091710.jpg'),
(40, 'HRnSstX3qOmGFZx', 'shaaban', '0000-00-00', 'wonderful', 'GD1v0JPcQ4C39gd/1157504_422946644491081_2122892313_n.jpg'),
(43, 'SxOlepuj5EvILai', 'jacky', '0000-00-00', 'the ', 'rl2BtmvTuYJbdxI/ARCHOS.jpg'),
(44, 'SxOlepuj5EvILai', 'jacky', '0000-00-00', 'hellow', 'obA8TLKx20HBy7g/Apple cinema.jpg'),
(45, 'SxOlepuj5EvILai', 'jacky', '0000-00-00', 'wow', 'MPTv28sOfaQmR6l/I-MAC.jpg'),
(46, 'SxOlepuj5EvILai', 'jacky', '0000-00-00', 'hellow', 'PsxFz7QoqNtMWAk/Lg Home Theatre.jpg'),
(47, 'SxOlepuj5EvILai', 'jacky', '0000-00-00', 'hellow', '7vJ8kZnShpe3lEj/Macbook.jpg'),
(48, 'SxOlepuj5EvILai', 'jacky', '0000-00-00', 'hellow', 'OBb6lGxp0jdo2CN/Samsung Desktop.jpg'),
(49, 'zZEvenbxy5YusIj', 'Ouma', '0000-00-00', '', 'OGHqyoJMPTpKlLV/Samsung Galaxy Y.jpg'),
(50, 'zZEvenbxy5YusIj', 'Ouma', '0000-00-00', 'cull photo', '3x9gL1ZrTHFVQDo/Nokia E1.jpg'),
(51, 'tYD50xcCb2KwJRu', 'Ouma', '0000-00-00', 'laptop', 'sa165ubApoLS2BX/HP1.jpg'),
(52, 'tYD50xcCb2KwJRu', 'Ouma', '0000-00-00', 'heko', '3T5nEQ9aAPlWNMj/ARCHOS.jpg'),
(55, 'miIgVXc2AEfhP6K', 'shaaban', '2015-03-04', 'cullll', 'gTzro5nQvSMZmWH/10919006_10153059948666663_319975267898663467_n.jpg'),
(56, 'miIgVXc2AEfhP6K', 'shaaban', '2015-03-04', 'nature walk', 'cYTD192Hva4r57x/Photo0152.jpg'),
(57, 'miIgVXc2AEfhP6K', 'shaaban', '2015-03-05', 'wedding', '7iKJL93npubegRX/IMG-20141130-WA0005.jpg'),
(58, 'HRnSstX3qOmGFZx', 'shaaban', '2015-03-05', 'nature walk', 'C2lbgvN8pMsd6wz/photo0062_001.jpg'),
(63, 'HRnSstX3qOmGFZx', 'shaaban', '2015-03-05', 'moi university', 'yF96Ac1wnupDeOi/Photo0177.jpg'),
(64, 'HRnSstX3qOmGFZx', 'shaaban', '2015-03-05', 'moi university', 'AqcwQe7dVlKn1HD/Photo0177.jpg'),
(65, 'NmZdCWBLQikH3E1', 'Elvo', '2015-03-05', 'cull', 'fdKsTJnA2pcmv1B/1157504_422946644491081_2122892313_n.jpg'),
(66, 'NmZdCWBLQikH3E1', 'Elvo', '2015-03-05', 'amazing', '4lM9c1QwCZzegHm/photo0067.jpg'),
(67, 'NmZdCWBLQikH3E1', 'Elvo', '2015-03-05', 'apple', '1qxmr38pMzX7QgJ/Apple cinema.jpg'),
(68, 'NmZdCWBLQikH3E1', 'Elvo', '2015-03-05', 'cul', 'dBRrA3HmbZJWYFD/ARCHOS.jpg'),
(96, 'NmZdCWBLQikH3E1', 'Elvo', '2015-03-05', 'hp', 'n3V68lWjevKxiaE/HP1.jpg'),
(97, 'NmZdCWBLQikH3E1', 'Elvo', '2015-03-05', 'imac', 'hXklFZjivCwb1An/I-MAC.jpg'),
(98, 'NmZdCWBLQikH3E1', 'Elvo', '2015-03-06', 'black berry', 'kjQvC0yci6n5hLm/blackberry.jpg'),
(99, 'NmZdCWBLQikH3E1', 'Elvo', '2015-03-06', 'nokia', '3dZi28hwJR4gXkq/Nokia E1.jpg'),
(100, 'FJ4j7oziKWIhN5S', 'Elvo', '2015-03-06', 'sumsung', 'YZdqMF2obtOBfR4/SAMSUNG T4.jpg'),
(101, 'FJ4j7oziKWIhN5S', 'Elvo', '2015-03-06', 'ipod', '5WDF0xG8ZhNf63Y/IPOD.jpg'),
(102, 'FJ4j7oziKWIhN5S', 'Elvo', '2015-03-06', 'macbook', 'bro1WRIyGMnFOsu/macbook_air_1.jpg'),
(103, 'FJ4j7oziKWIhN5S', 'Elvo', '2015-03-06', 'htc ohone', 'SwOXKYfLmxARH0E/HTC.jpg'),
(104, 'NmZdCWBLQikH3E1', 'Elvo', '2015-03-06', 'lg home theater', 'LtDIgizJ3NqO9E8/Lg Home Theatre.jpg'),
(105, 'NmZdCWBLQikH3E1', 'Elvo', '2015-03-06', 'archos', 'yDJ7btzPvBAZrwF/ARCHOS.jpg'),
(106, 'NmZdCWBLQikH3E1', 'Elvo', '2015-03-06', 'sumsung', 'rSPzd7ceELHpmZG/Samsung At&t.jpg'),
(107, 'FJ4j7oziKWIhN5S', 'Elvo', '2015-03-06', 'imac', 'mGDpy4ZQEALSqvI/I-MAC.jpg'),
(108, 'FJ4j7oziKWIhN5S', 'Elvo', '2015-03-06', 'macbook air', 'yEW4wjxBVTmbXDl/macbook_air_1.jpg'),
(109, 'FJ4j7oziKWIhN5S', 'Elvo', '2015-03-06', 'nikon', 'WJ9OTSBGLKn0vpC/NIKON.jpg'),
(110, 'FJ4j7oziKWIhN5S', 'Elvo', '2015-03-06', 'sumsung radio', 'd37SFXcoltDg9M4/Samsung Radio.jpg'),
(111, 'FJ4j7oziKWIhN5S', 'Elvo', '2015-03-06', 'toshiba', 'TxqfO1poRunYNki/TOSHIBA.jpg'),
(114, 'miIgVXc2AEfhP6K', 'shaaban', '2015-03-07', 'nature ', 'K63zwrue2Dd5bvy/10264116_623201947754191_1627001964228797022_o000.jpg'),
(115, 'tfIPra0cvMK2oD6', 'kogo', '2015-03-09', 'awesome', 'Kr4IqVk1vpBL09h/imageCASINWOQ.jpg'),
(116, 'tfIPra0cvMK2oD6', 'kogo', '2015-03-09', 'awesome', 'e4ulsMopcLXwEJm/imageCASINWOQ.jpg'),
(124, 'tfIPra0cvMK2oD6', 'kogo', '2015-03-09', 'hellow', 'OMfjCFAv3YJdPKt/140130-Nicole-Harris-1015a.thumb[1].jpg'),
(125, 'miIgVXc2AEfhP6K', 'shaaban', '2015-03-09', 'wonderful', 'a1bsxGhwCoP7q3Y/140130-Nicole-Harris-1015a.thumb[1].jpg'),
(126, 'tfIPra0cvMK2oD6', 'kogo', '2015-03-09', 'preacher', 'ZRCVc0g4OuSwYsQ/2d11511716-2014-02-04t225250z-1-cbrea131rkd00-rtroptp-3-hongkong.thumb[1].jpg'),
(127, 'glwCXqbPuk89vQh', 'kogo', '2015-03-09', 'hellow', '42tF9wcXEMgelIo/a_showme_passwords_150301.thumb[1].jpg'),
(128, 'tfIPra0cvMK2oD6', 'kogo', '2015-03-09', 'school', 'o6eC7815YG40iJc/2d11392560-today-curling-olympic-outfit-140122.thumb[1].jpg'),
(129, 'zZEvenbxy5YusIj', 'Ouma', '2015-03-09', 'blackberry', '8fI1HmnlJ0eSVEz/blackberry.jpg'),
(130, 'tYD50xcCb2KwJRu', 'Ouma', '2015-03-09', 'apple', 'nX2SZFWe68LBJav/Apple cinema.jpg'),
(131, 'glwCXqbPuk89vQh', 'kogo', '2015-03-09', 'mum', '0ubi6vRa5e87oIf/140130-Nicole-Harris-1015a.thumb[1].jpg'),
(132, 'glwCXqbPuk89vQh', 'kogo', '2015-03-09', 'cars', 'yO27b4MjAoeFCPv/2d11511602-140204-carsharing-hmed-1040.thumb[1].jpg'),
(133, 'glwCXqbPuk89vQh', 'kogo', '2015-03-09', 'mmmm', 'IVaLSDxc0F8uXbA/2d11392560-today-curling-olympic-outfit-140122.thumb[1].jpg'),
(134, 'tfIPra0cvMK2oD6', 'kogo', '2015-03-09', 'obama', 'qwHNEelW8Ft3BJa/a_orig_obamaisis_150211.thumb[1].jpg'),
(135, 'tfIPra0cvMK2oD6', 'kogo', '2015-03-09', 'mum', 'YpL52Wuldb0Ho4V/a_orig_cpacslams_150226.thumb[1].jpg'),
(136, 'glwCXqbPuk89vQh', 'kogo', '2015-03-09', 'wow', 'bzj6F4VLacrAIiq/g-cvr-140203-castaway-tease-1220p.thumb[1].jpg'),
(137, 'tfIPra0cvMK2oD6', 'kogo', '2015-03-09', 'kkk', 'VP8hZFOitLjSX06/2d11511602-140204-carsharing-hmed-1040.thumb[1].jpg'),
(138, 'tfIPra0cvMK2oD6', 'kogo', '2015-03-09', 'mountain', 'jM8o9eYx7HiXRBd/2d11501111-140129-bailey-5p.thumb[1].jpg'),
(139, 'tfIPra0cvMK2oD6', 'kogo', '2015-03-09', 'meet', 'kWvJA6e1B3lCIa4/a_chuck_snl_150213.thumb[1].jpg'),
(140, 'glwCXqbPuk89vQh', 'kogo', '2015-03-09', 'birds', '7S15vOcT98WCADy/imageCASINWOQ.jpg'),
(141, 'wMt2vPcOpX3YBZz', 'kogo', '2015-03-09', 'fish', 'RNXrvjenVS8yKMf/image[1].jpg'),
(142, 'tfIPra0cvMK2oD6', 'kogo', '2015-03-09', 'mum', 'XG9YyndfcVuhmvB/a_orig_cpacslams_150226.thumb[1].jpg'),
(144, 'miIgVXc2AEfhP6K', 'shaaban', '2015-03-10', 'childhood ', 'R3AcGr5e6t7o2xh/10641254_1463923390558500_1481825804911038032_n.jpg'),
(145, 'miIgVXc2AEfhP6K', 'shaaban', '2015-03-10', 'greate', 'OPTmsC1bnhK6BYJ/IMG-20150122-WA0001.jpg'),
(146, 'zZEvenbxy5YusIj', 'Ouma', '2015-03-10', 'hellow', '29h8P60wkQ7AjOq/IPOD.jpg'),
(147, 'miIgVXc2AEfhP6K', 'shaaban', '2015-03-10', 'bed', 'wmcSz2LO3DnQ7Ev/photo0068.jpg'),
(148, 'miIgVXc2AEfhP6K', 'shaaban', '2015-03-11', 'HELLOW', '1gQrJPqV0hOnFWR/imgres.jpg'),
(149, 'zZEvenbxy5YusIj', 'Ouma', '2015-03-11', 'Triplets', 'pzqW1DQm4ixO3BF/acdcs.jpg'),
(150, 'zZEvenbxy5YusIj', 'Ouma', '2015-03-11', 'faith', '2HDNcA4Ijbx9Xeq/cm sdasd.jpg'),
(151, 'zZEvenbxy5YusIj', 'Ouma', '2015-03-11', 'village', 'KSWpEdBNmyhslQ0/adscad.jpg'),
(152, 'zZEvenbxy5YusIj', 'Ouma', '2015-03-11', 'swimming', '3HqsAwu6ibCKrfy/mxcc.jpg'),
(153, 'zZEvenbxy5YusIj', 'Ouma', '2015-03-11', 'play', 'dWv7lBJhjG8bOPZ/xc  czxzsx.jpg'),
(154, 'tYD50xcCb2KwJRu', 'Ouma', '2015-03-11', 'buddies', '3JwBTDK4Hpxbi6P/n.jpg'),
(155, 'miIgVXc2AEfhP6K', 'shaaban', '2015-03-11', 'heyy', 'VIWExSLOybjes3g/s adksadkl.jpg'),
(156, 'miIgVXc2AEfhP6K', 'shaaban', '2015-03-11', 'graduation', 'hf6TClNQKwVHu1c/svfdfv.jpg'),
(157, 'miIgVXc2AEfhP6K', 'shaaban', '2015-03-12', 'very good  boy active and playful', 'hHpO0KjaW52VGA6/imgres.jpg'),
(159, 'apoWDgGEBHjkrs9', 'Koech', '2015-03-12', '', 'Zsy69hWzCv5E7qk/dw.jpg'),
(160, 'miIgVXc2AEfhP6K', 'shaaban', '2015-03-12', 'heeloow', 'wOguejG5Vm8nLFv/dw.jpg'),
(161, 'HRnSstX3qOmGFZx', 'shaaban', '2015-03-12', 'jjjjjjjjjjj', '2tR3YJqdkwLo5m6/svfdfv.jpg'),
(162, 'SxOlepuj5EvILai', 'jacky', '2015-03-16', 'my boys', '9FVHLCkfEWah1Rs/n.jpg'),
(163, 'FJ4j7oziKWIhN5S', 'Elvo', '2015-03-20', 'cull baby', 'J6DHIyugzFYC2LW/cm sdasd.jpg'),
(164, 'FJ4j7oziKWIhN5S', 'Elvo', '2015-03-20', 'cull', 'y5ioTqsXF1Nehnv/ddcwsc.jpg'),
(165, 'NmZdCWBLQikH3E1', 'Elvo', '2015-03-20', 'walking', 'e40HfJoEDKWstu1/mcn.jpg'),
(166, 'FJ4j7oziKWIhN5S', 'Elvo', '2015-03-20', 'water', 'atConrxBw3k8g6i/adscad.jpg'),
(173, 'hfRe56lGVNYyJEk', 'Meto', '2015-03-28', 'relaxing', 'J9jvrfhPzEp3aqT/img_20131209_150159794_001.jpg'),
(174, 'hfRe56lGVNYyJEk', 'Meto', '2015-03-28', 'smile', 'IfiDFvkySEGgTdW/imgres.jpg'),
(175, 'hfRe56lGVNYyJEk', 'Meto', '2015-03-28', 'friends', 'KS5ZWACJmpxeb2Y/kk.jpg'),
(176, 'hfRe56lGVNYyJEk', 'Meto', '2015-03-28', 'feeding', 's21XfngA9YijKp3/ddcwsc.jpg'),
(177, 'hfRe56lGVNYyJEk', 'Meto', '2015-03-28', 'selfie', 'oC0ivZBFJDRjY6q/sdscsd.jpg'),
(178, 'hfRe56lGVNYyJEk', 'Meto', '2015-03-28', 'smile', '52YmrSD0kMIjXOW/cm sdasd.jpg'),
(179, 'HRnSstX3qOmGFZx', 'shaaban', '2015-04-03', 'book', 'ryKEaMxLVks9Jgt/41RokOo0cEL.jpg'),
(180, 'hfRe56lGVNYyJEk', 'Meto', '2015-04-08', 'relax', 'JWtvKygnHR1mjdP/487553_460582210690638_628701440_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `poke`
--

CREATE TABLE IF NOT EXISTS `poke` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_from` varchar(255) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=306 ;

--
-- Dumping data for table `poke`
--

INSERT INTO `poke` (`id`, `user_from`, `user_to`) VALUES
(124, 'Kimangi', 'angi'),
(125, 'Kimangi', 'Elvo'),
(126, 'Meto', 'angi'),
(139, 'Mwaka', 'Alice'),
(141, 'Mwaka', 'angi'),
(142, 'Mwaka', 'dosh'),
(144, 'Elvo', 'Meto'),
(152, 'Songok', 'Mwaka'),
(154, 'Songok', 'jacky'),
(155, 'Songok', 'kip'),
(156, 'Songok', 'glad'),
(187, 'shaaban', 'Koech'),
(188, 'shaaban', 'dosh'),
(189, 'shaaban', 'angi'),
(190, 'shaaban', 'Mwaka'),
(192, 'Ouma', 'dosh'),
(193, 'Ouma', 'Meto'),
(196, 'shaaban', 'opar'),
(197, 'shaaban', 'glad'),
(206, 'kanungo', 'Ouma'),
(208, 'Songok', 'Ouma'),
(209, 'Ouma', 'mary'),
(210, 'shaaban', 'Shaaban'),
(211, 'Elvo', 'shaaban'),
(212, 'jacky', 'shaaban'),
(214, 'shaaban', 'mwas'),
(215, 'shaaban', 'Ouma'),
(216, 'shaaban', 'Mwash'),
(217, 'shaaban', 'Alice'),
(218, 'shaaban', 'bash'),
(219, 'shaaban', 'Kouko'),
(221, 'jacky', 'opar'),
(222, 'jacky', 'Koech'),
(223, 'jacky', 'glad'),
(224, 'jacky', 'Korir'),
(225, 'jacky', 'Chumba'),
(226, 'jacky', 'Mwaka'),
(227, 'jacky', 'Elvo'),
(228, 'jacky', 'Ouma'),
(229, 'jacky', 'orsh'),
(231, 'Elvo', 'mary'),
(232, 'Elvo', 'opar'),
(233, 'Elvo', 'Koech'),
(234, 'Elvo', 'Shaka'),
(235, 'Elvo', 'Ouma'),
(236, 'Elvo', 'glad'),
(237, 'Elvo', 'Kiptum'),
(238, 'Elvo', 'kibiru'),
(239, 'Elvo', 'Korir'),
(240, 'Elvo', 'Mwash'),
(241, 'Kouko', 'mary'),
(242, 'Kouko', 'opar'),
(243, 'Kouko', 'Koech'),
(244, 'Kouko', 'glad'),
(245, 'Kouko', 'kanungo'),
(246, 'Kouko', 'Korir'),
(247, 'Kouko', 'Mwash'),
(248, 'Kouko', 'Ouma'),
(249, 'Kouko', 'mwas'),
(250, 'Kouko', 'Songok'),
(251, 'Kouko', 'dosh'),
(252, 'Meto', 'mary'),
(253, 'Meto', 'opar'),
(254, 'Meto', 'Koech'),
(255, 'Meto', 'orsh'),
(256, 'Meto', 'glad'),
(257, 'Meto', 'Chumba'),
(258, 'Meto', 'Korir'),
(259, 'Meto', 'Kimangi'),
(260, 'Meto', 'kogo'),
(261, 'Meto', 'kibiru'),
(262, 'Songok', 'mary'),
(263, 'Songok', 'opar'),
(264, 'Songok', 'Koech'),
(265, 'Songok', 'kanungo'),
(266, 'Songok', 'Kimangi'),
(267, 'Songok', 'Elvo'),
(268, 'Songok', 'Alice'),
(269, 'bash', 'mary'),
(270, 'bash', 'opar'),
(271, 'bash', 'Koech'),
(272, 'bash', 'glad'),
(273, 'bash', 'Meto'),
(274, 'bash', 'mwas'),
(275, 'bash', 'Songok'),
(276, 'bash', 'peter'),
(277, 'bash', 'kip'),
(278, 'kibiru', 'shaaban'),
(279, 'kibiru', 'mary'),
(280, 'kibiru', 'opar'),
(281, 'kibiru', 'Mwaka'),
(282, 'kibiru', 'glad'),
(283, 'kibiru', 'peter'),
(284, 'kibiru', 'jacky'),
(285, 'kogo', 'shaaban'),
(286, 'kogo', 'mary'),
(287, 'kogo', 'opar'),
(288, 'kogo', 'Koech'),
(289, 'kogo', 'glad'),
(290, 'kogo', 'Ouma'),
(291, 'kogo', 'jacky'),
(292, 'mary', 'opar'),
(293, 'mary', 'Mwaka'),
(295, 'mary', 'jacky'),
(296, 'mary', 'glad'),
(297, 'mary', 'Chumba'),
(298, 'angi', 'mary'),
(299, 'angi', 'opar'),
(300, 'angi', 'Koech'),
(301, 'Meto', 'shaaban'),
(302, 'shaaban', 'orsh'),
(303, 'Chumba', 'Mwaka'),
(304, 'Chumba', 'glad'),
(305, 'shaaban', 'mary');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `date_added` date NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `user_posted_to` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=277 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `date_added`, `added_by`, `user_posted_to`) VALUES
(4, 'hi fred', '2014-12-16', 'shaaban', 'Mwash'),
(5, 'hi ngeno', '2014-12-16', 'shaaban', 'Korir'),
(7, 'hi', '2014-12-17', 'jacky', 'Songok'),
(8, 'polly', '2014-12-17', 'jacky', 'orsh'),
(19, 'hi there people', '2014-12-23', 'chumba', 'Chumba'),
(20, 'hi there', '2014-12-23', 'songok', 'songok'),
(21, 'hi there pals', '2014-12-23', 'songok', 'Songok'),
(23, 'this is awsome', '2014-12-23', 'songok', 'songok'),
(24, 'ïƒ¼	The investigation examined whether teacherâ€™s attitudes towards their included students with disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three students to prompt corresponding with the attitudes of attachment, concern, indifference and rejection.\r\nïƒ¼	Negative attitude; many special teachers have poor attitude towards autistic spectrum disorder (ASD) learners because they view them as incapable human beings who cannot excel in anything they do. Most of the times they call them names such as morans, stupid and burdensome children.\r\n', '2014-12-23', 'songok', 'songok'),
(25, 'ïƒ¼ The investigation examined whether teacherâ€™s attitudes towards their included students with disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three students to prompt corresponding with the attitudes of attachment, concern, indifference and rejection. ïƒ¼ Negative attitude; many special teachers have poor attitude towards autistic spectrum disorder (ASD) learners because they view them as incapable human beings who cannot excel in anything they do. Most of the times they call them names such as morans, stupid and burdensome children. ', '2014-12-23', 'songok', 'songok'),
(26, 'ïƒ¼ The investigation examined whether teacherâ€™s attitudes towards their included students with disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three students to prompt corresponding with the attitudes of attachment, concern, indifference and rejection. ïƒ¼ Negative attitude; many special teachers have poor attitude towards autistic spectrum disorder (ASD) learners because they view them as incapable human beings who cannot excel in anything they do. Most of the times they call them names such as morans, stupid and burdensome children. ', '2014-12-23', 'songok', 'songok'),
(27, 'ïƒ¼ The investigation examined whether teacherâ€™s attitudes towards their included students with disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three students to prompt corresponding with the attitudes of attachment, concern, indifference and rejection. ïƒ¼ Negative attitude; many special teachers have poor attitude towards autistic spectrum disorder (ASD) learners because they view them as incapable human beings who cannot excel in anything they do. Most of the times they call them names such as morans, stupid and burdensome children. ', '2014-12-23', 'songok', 'songok'),
(28, 'hi there', '2014-12-23', 'jacky', 'songok'),
(29, 'hey', '2014-12-23', 'songok', 'songok'),
(30, 'ïƒ¼ The investigation examined whether teacherâ€™s attitudes towards their included students with disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three students to prompt corresponding with the attitudes of attachment, concern, indifference and rejection. ïƒ¼ Negative attitude; many special teachers have poor attitude towards autistic spectrum disorder (ASD) learners because they view them as incapable human beings who cannot excel in anything they do. Most of the times they call them names such as morans, stupid and burdensome children.\r\n2014-12-23', '2014-12-23', 'songok', 'songok'),
(31, 'ïƒ¼	The investigation examined whether teacherâ€™s attitudes towards their included students with disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three students to prompt corresponding with the attitudes of attachment, concern, indifference and rejection.\r\nïƒ¼	Negative attitude; many special teachers have poor attitude towards autistic spectrum disorder (ASD) learners because they view them as incapable human beings who cannot excel in anything they do. Most of the times they call them names such as morans, stupid and burdensome children.\r\n', '2014-12-23', 'kogo', 'kogo'),
(32, 'ïƒ¼	The investigation examined whether teacherâ€™s attitudes towards their included students with disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three students to prompt corresponding with the attitudes of attachment, concern, indifference and rejection.\r\nïƒ¼	Negative attitude; many special teachers have poor attitude towards autistic spectrum disorder (ASD) learners because they view them as incapable human beings who cannot excel in anything they do. Most of the times they call them names such as morans, stupid and burdensome children.\r\n', '2014-12-23', 'kogo', 'kogo'),
(33, 'hi chap', '2014-12-23', 'kogo', 'peter'),
(34, 'ïƒ¼	The investigation examined whether teacherâ€™s attitudes towards their included students with disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three students to prompt corresponding with the attitudes of attachment, concern, indifference and rejection.\r\nïƒ¼	Negative attitude; many special teachers have poor attitude towards autistic spectrum disorder (ASD) learners because they view them as incapable human beings who cannot excel in anything they do. Most of the times they call them names such as morans, stupid and burdensome children.\r\n', '2014-12-23', 'kogo', 'peter'),
(35, 'ïƒ¼	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their lives since they subject them to vigorous life situations that children cannot withstand.\r\nïƒ¼	Fear to teach them; many teachers never like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training.\r\n', '2014-12-23', 'jacky', 'kogo'),
(36, 'ïƒ¼	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their lives since they subject them to vigorous life situations that children cannot withstand.\r\nïƒ¼	Fear to teach them; many teachers never like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training.\r\n', '2014-12-23', 'kogo', 'peter'),
(37, 'ïƒ¼	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their lives since they subject them to vigorous life situations that children cannot withstand.\r\nïƒ¼	Fear to teach them; many teachers never like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training.\r\n', '2014-12-23', 'kogo', 'peter'),
(43, 'ïƒ¼	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their lives since they subject them to vigorous life situations that children cannot withstand.\r\nïƒ¼	Fear to teach them; many teachers never like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training.\r\n', '2014-12-23', 'kogo', 'Kiptum'),
(44, 'ïƒ¼	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their lives since they subject them to vigorous life situations that children cannot withstand.\r\nïƒ¼	Fear to teach them; many teachers never like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training.\r\n', '2014-12-23', 'kogo', 'kip'),
(45, 'ïƒ¼	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their lives since they subject them to vigorous life situations that children cannot withstand.\r\nïƒ¼	Fear to teach them; many teachers never like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training.\r\n', '2014-12-23', 'jacky', 'jacky'),
(46, 'ïƒ¼	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their lives since they subject them to vigorous life situations that children cannot withstand.\r\nïƒ¼	Fear to teach them; many teachers never like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training.\r\n', '2014-12-23', 'jacky', 'jacky'),
(47, 'ïƒ¼	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their lives since they subject them to vigorous life situations that children cannot withstand.\r\nïƒ¼	Fear to teach them; many teachers never like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training.\r\n', '2014-12-23', 'jacky', 'Elvo'),
(48, 'ïƒ¼	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their lives since they subject them to vigorous life situations that children cannot withstand.\r\nïƒ¼	Fear to teach them; many teachers never like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training.\r\n', '2014-12-23', 'jacky', 'Korir'),
(50, 'hellw\r\n', '2015-01-05', 'jacky', 'orsh'),
(51, 'hellow', '2015-01-05', 'shaaban', 'orsh'),
(52, 'hellow there', '2015-01-06', 'jacky', 'Kiptum'),
(53, 'hi there people', '2015-01-09', 'kanungo', 'kanungo'),
(56, 'j', '2015-01-12', 'jacky', 'Songok'),
(62, 'passion to take care of autistic learners; most of the time, they never care after their lives since they subject them to vigorous life situations that children cannot withstand. ïƒ¼ Fear to teach them; many teachers never like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-01-17', 'Chumba', 'Kiptum'),
(64, 'yguhqu uauquqg', '2015-01-19', 'Kouko', 'Kouko'),
(65, 'hi', '2015-01-19', 'shaaban', 'orsh'),
(66, 'fwrffwerfwnkfw2f2eqf1qfew', '2015-01-20', 'Kouko', 'Kouko'),
(67, 'hjbguyguygyu\r\n', '2015-01-24', 'mwas', 'mwas'),
(68, 'hellow guys\r\n\r\n', '2015-01-24', 'shaaban', 'kibiru'),
(69, 'bn', '2015-01-25', 'mwas', 'mwas'),
(70, 'there people \r\n', '2015-01-27', 'Chumba', 'Chumba'),
(71, 'hi peter', '2015-01-27', 'shaaban', 'peter'),
(75, 'hi guys how is the going\r\n', '2015-01-27', 'Chumba', 'Chumba'),
(76, 'ïƒ¼ Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their lives since they subject them to vigorous life situations that children cannot withstand. ïƒ¼ Fear to teach them; many teachers never like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-01-27', 'Chumba', 'Chumba'),
(78, 'hellow folks', '2015-01-27', 'meto', 'Kouko'),
(79, 'hi there', '2015-01-27', 'meto', 'mwas'),
(87, 'duke', '2015-02-26', 'Ouma', 'Songok'),
(89, 'hi there pal', '2015-02-26', 'Ouma', 'Alice'),
(90, 'how is kisumu', '2015-02-26', 'Ouma', 'Alice'),
(94, '	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their live', '2015-02-27', 'kogo', 'Korir'),
(95, '	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their live', '2015-02-27', 'kogo', 'kibiru'),
(96, '	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their live', '2015-02-27', 'kogo', 'kibiru'),
(97, '	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their live', '2015-02-27', 'kogo', 'Kiptum'),
(98, '	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their live', '2015-02-27', 'kogo', 'Kimangi'),
(99, '	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their live', '2015-02-27', 'kogo', 'kip'),
(100, '	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their live', '2015-02-27', 'kogo', 'kanungo'),
(101, '	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their live', '2015-02-27', 'kogo', 'Elvo'),
(102, '	Never support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their live', '2015-02-27', 'kogo', 'Elvo'),
(105, 'support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their lives since they subject them to vigorous life situations that children cannot withstand. ïƒ¼	Fear to teach them; many teachers never like to study special needs education, because they donâ€™t ', '2015-02-27', 'bash', 'bash'),
(106, 'subject them to vigorous life situations that children cannot withstand. ïƒ¼	Fear to teach them; many teachers never like to study special needs education, because they donâ€™t ', '2015-02-27', 'bash', 'bash'),
(107, 'support the autistic children; special needs teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their lives since they subject them to vigorous life situations that children cannot withstand. ïƒ¼	Fear to teach them; many teachers never like to study special needs education, because they donâ€™t ', '2015-02-27', 'bash', 'bash'),
(108, 'hellow', '2015-02-27', 'bash', 'Songok'),
(109, 'alice@gmail.comn', '2015-02-27', 'kanungo', 'kanungo'),
(110, 'ds teachers just run after money but they lack passion to take care of autistic learners; most of the time, they never care after their liv', '2015-02-27', 'kanungo', 'kanungo'),
(111, 'teach them; many teachers never like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-02-27', 'shaaban', 'Kimangi'),
(112, 'social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training ', '2015-02-27', 'shaaban', 'Kimangi'),
(115, 'hellow guys am finally here', '2015-02-28', 'Shaka', 'Shaka'),
(116, 'junior store is fun to be a round', '2015-02-28', 'Shaka', 'Shaka'),
(117, 'The investigation examined whether teacherâ€™s attitudes towards their included students with disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three students to prompt corresponding with the attitudes of ', '2015-02-28', 'Shaka', 'Songok'),
(118, 'The investigation examined whether teacherâ€™s attitudes towards their included students with disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three students to prompt corresponding with the attitudes of ', '2015-02-28', 'mwas', 'Shaka'),
(119, 'disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three stude', '2015-02-28', 'Shaka', 'Shaka'),
(120, 'you will be shocked', '2015-02-28', 'shaaban', 'kogo'),
(121, 'hey donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training. ', '2015-02-28', 'shaaban', 'kogo'),
(122, 'subject them to vigorous life situations that children cannot withstand. ïƒ¼	Fear to teach them; many teachers never like to study special needs education, because they donâ€™t \r\n', '2015-02-28', 'Ouma', 'shaaban'),
(123, 'whether teacherâ€™s attitudes towards their included students with disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three students to prompt corresponding with the attitudes of ', '2015-03-01', 'Songok', 'Songok'),
(124, 'teachers nominated three students to prompt corresponding with the attitudes of \r\n', '2015-03-01', 'Songok', 'Songok'),
(125, 'The investigation examined whether teacherâ€™s attitudes towards their included students with disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three students to prompt corresponding with the attitudes of ', '2015-03-01', 'Songok', 'Songok'),
(126, 'ince they subject them to vigorous life situations that children cannot withstand. ïƒ¼ Fear to teach them; many teachers never like to study special needs education, because they donâ€™t ', '2015-03-01', 'Kouko', 'Kouko'),
(130, 'hellow there people', '2015-03-02', 'dosh', 'dosh'),
(131, 'hellow how is the going happy to see you on junior store', '2015-03-02', 'Elvo', 'dosh'),
(132, 'since they subject them to vigorous life situations that children cannot withstand. ïƒ¼ Fear to teach them; many teachers never like to study special needs education, because they donâ€™t ', '2015-03-02', 'shaaban', 'angi'),
(133, 'since they subject them to vigorous life situations that children cannot withsta ', '2015-03-02', 'shaaban', 'angi'),
(134, 'since they subject them to vigorous life situations that children cannot withstand. ïƒ¼ Fear to teach them; many teachers never like to study special needs education, because they donâ€™t ', '2015-03-02', 'shaaban', 'angi'),
(137, 'since they subject them to vigorous life situations that children cannot withstand. ïƒ¼ Fear to teach them; many teachers never like to study special needs education, because they donâ€™t ', '2015-03-03', 'shaaban', 'shaaban'),
(157, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-03-06', 'shaaban', 'shaaban'),
(158, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give educational ', '2015-03-06', 'shaaban', 'shaaban'),
(159, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-03-06', 'shaaban', 'shaaban'),
(160, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to the dressing, eating and toileting. Such learners never acquire s', '2015-03-06', 'shaaban', 'shaaban'),
(161, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-03-06', 'shaaban', 'shaaban'),
(162, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-03-06', 'shaaban', 'shaaban'),
(163, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give e', '2015-03-06', 'shaaban', 'shaaban'),
(164, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give ', '2015-03-06', 'shaaban', 'shaaban'),
(165, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-03-06', 'kogo', 'kogo'),
(166, 'educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-03-06', 'shaaban', 'Chumba'),
(167, 'donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-03-06', 'shaaban', 'Chumba'),
(168, 'educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-03-07', 'shaaban', 'shaaban'),
(169, 'educational support to these learners. Autistic spectrum disorder skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training\r\n', '2015-03-09', 'kogo', 'kogo'),
(170, 'educational support to these learners. Autistic spectrum disorder skills such as bathing, \r\n', '2015-03-09', 'kogo', 'kogo'),
(171, 'educational support to these learners. Autistic spectrum disorder skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training\r\n', '2015-03-09', 'kogo', 'kogo'),
(172, 'educational support to these learners. Autistic spectrum disorder skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training\r\n', '2015-03-09', 'kogo', 'kogo'),
(173, 'educational support to these learners. Autistic spectrum disorder skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training\r\n', '2015-03-09', 'kogo', 'kogo'),
(180, 'social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-03-12', 'shaaban', 'shaaban'),
(181, 'educational support to these learners. Autistic spectrum disorder learners need to be taught social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-03-12', 'shaaban', 'shaaban'),
(182, 'tulipokuwa primo ulisema umenoki', '2015-03-12', 'Koech', 'Koech'),
(184, 'hiiiiiiiiiiiiiiiiii', '2015-03-20', 'Elvo', 'Elvo'),
(185, 'social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-03-20', 'shaaban', 'shaaban'),
(186, 'social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-03-20', 'Elvo', 'Elvo'),
(187, 'hiiiiiiiiii', '2015-03-20', 'shaaban', 'Elvo'),
(188, 'heeeeeeeeeeey', '2015-03-20', 'Elvo', 'peter'),
(189, 'social skills such as bathing, dressing, eating and toileting. Such learners never acquire social skills they need training', '2015-03-20', 'Elvo', 'Elvo'),
(190, 'Junior Store is A social media platform where parents archive and share information on children and parenting\r\nJunior store is intended to bring parents all over the world together, to share information on elementary parenting, especially child bearing and also be able to keep chronological archive of their children childhood memories which they can later hand over to their children when they mature.', '2015-03-20', 'Elvo', 'Elvo'),
(191, 'chronological archive of their children childhood memories which they can later hand over to their children when they mature', '2015-03-20', 'Elvo', 'Elvo'),
(197, 'to share information on elementary parenting, especially child bearing and also be able to keep chronological archive of their children childhood memories which they can later hand over to their children when they mature.', '2015-03-21', 'shaaban', 'shaaban'),
(201, 'helooooooooooooooow', '2015-03-24', 'shaaban', 'kanungo'),
(202, 'ala mlango wazi uliwe na fisi lala mlango wazi uliwe na fisi lala mlango wazi uliwe na fisi', '2015-03-25', 'shaaban', 'shaaban'),
(213, 'James Kimeto on 2014-12-23\r\nhi friends', '2015-03-28', 'Meto', 'Meto'),
(216, 'to share information on elementary parenting, especially child bearing and also be able to keep chronological archive of their children childhood memories which they can later hand over to their children when they mature.', '2015-03-28', 'Meto', 'Meto'),
(233, 'lala mlango wazi uliwe na fisi lala mlango wazi uliwe na fisi', '2015-03-28', 'shaaban', 'shaaban'),
(235, 'hi there', '2015-03-28', 'Ouma', 'Mwaka'),
(238, 'Junior Store is A social media platform where parents archive and share information on children and parenting\r\n\r\nJunior store is intended to bring parents all over the world together, to share information on elementary parenting, especially child bearing and also be able to keep chronological archive of their children childhood memories which they can later hand over to their children when they mature.', '2015-03-28', 'shaaban', 'shaaban'),
(241, 'Didinka Johnson on 2015-03-28\r\nJunior Store is A social media platform where parents archive and share information on children and parenting Junior store is intended to bring parents all over the world together', '2015-03-29', 'shaaban', 'shaaban'),
(246, 'how is the going', '2015-03-29', 'shaaban', 'Mwaka'),
(247, 'welcome', '2015-03-29', 'shaaban', 'dosh'),
(248, 'and share information on children and parenting Junior store is intended to bring parents all over the world together', '2015-04-03', 'mary', 'mary'),
(249, 'and share information on children and parenting Junior store is intended to bring parents all over the world together', '2015-04-03', 'mary', 'mary'),
(250, 'and share information on children and parenting Junior store is intended to bring parents all over the world together', '2015-04-03', 'mary', 'mary'),
(251, 'and share information on children and parenting Junior store is intended to bring parents all over the world together', '2015-04-03', 'mary', 'mary'),
(252, 'hellow', '2015-04-03', 'shaaban', 'mary'),
(259, 'mmmmmmmmmmmm', '2015-04-04', 'angi', 'angi'),
(261, 'keep chronological archive of their children childhood memories which they can later hand over to their children when they mature.', '2015-04-08', 'Meto', 'Meto'),
(262, 'keep chronological archive of their children childhood memories which they can later hand over to their children when they mature.', '2015-04-08', 'Meto', 'Meto'),
(273, 'like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social', '2015-04-23', 'Ouma', 'Ouma'),
(274, 'like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social', '2015-04-23', 'Ouma', 'Ouma'),
(275, 'like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social', '2015-04-23', 'Ouma', 'Ouma'),
(276, 'like to study special needs education, because they donâ€™t want much task. There is lack of special needs teachers who are intended to give educational support to these learners. Autistic spectrum disorder learners need to be taught social', '2015-04-23', 'Ouma', 'Ouma');

-- --------------------------------------------------------

--
-- Table structure for table `post_comment`
--

CREATE TABLE IF NOT EXISTS `post_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_body` text NOT NULL,
  `user` varchar(255) NOT NULL,
  `posted_to` varchar(255) NOT NULL,
  `post_removed` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=108 ;

--
-- Dumping data for table `post_comment`
--

INSERT INTO `post_comment` (`id`, `post_body`, `user`, `posted_to`, `post_removed`, `post_id`, `date`, `time`) VALUES
(36, 'hi there how is the going', 'Ouma', '', 0, 60, '2015-02-26', '10:05:48'),
(38, 'how is the going', 'jacky', '', 0, 86, '2015-02-26', '10:07:40'),
(39, 'finishe my assignment?', 'Meto', '', 0, 85, '2015-02-26', '10:08:19'),
(40, 'you will be shocked', 'kogo', '', 0, 86, '2015-02-26', '10:09:05'),
(43, 'hahaaaaaaaaaaa duke', 'Ouma', '', 0, 87, '2015-02-26', '10:48:50'),
(44, 'happy to see you', 'Ouma', '', 0, 68, '2015-02-26', '10:51:39'),
(45, 'you will be shoked', 'Ouma', '', 0, 63, '2015-02-26', '10:52:56'),
(46, 'how is the going', 'Ouma', '', 0, 77, '2015-02-26', '10:55:56'),
(47, 'yah', 'Ouma', '', 0, 63, '2015-02-26', '11:03:25'),
(48, 'yah', 'Ouma', '', 0, 77, '2015-02-26', '11:03:44'),
(55, 'see you soon', 'Ouma', '', 0, 90, '2015-02-26', '11:01:20'),
(57, 'hellow there how is the going', 'kogo', '', 0, 78, '2015-02-27', '04:14:33'),
(59, 'huuuuuuuuuuuuuuuuuy', 'Shaka', '', 0, 115, '2015-02-28', '04:50:22'),
(60, 'disabilities differed as a function of the disabilityâ€™s severity. Seventy inclusive classroom teachers nominated three students to prompt corresponding with the attitudes of ', 'Shaka', '', 0, 119, '2015-02-28', '05:51:21'),
(61, 'hellow there', 'shaaban', '', 0, 122, '2015-02-28', '05:12:54'),
(62, 'hellowwwwwwwwwwwww', 'shaaban', '', 0, 122, '2015-03-01', '01:58:21'),
(63, 'the going is fine', 'dosh', '', 0, 131, '2015-03-02', '01:36:48'),
(64, 'since they subject them to vigorous life situations that children cannot withstand. ïƒ¼ Fear to teach them; many teachers never like to study special needs education, because they donâ€™t ', 'shaaban', '', 0, 134, '2015-03-02', '03:31:57'),
(66, 'hi there', 'shaaban', '', 0, 168, '2015-03-10', '12:16:49'),
(67, 'hellow', 'shaaban', '', 0, 168, '2015-03-10', '12:19:44'),
(68, 'wonderful', 'shaaban', '', 0, 168, '2015-03-10', '12:21:27'),
(69, 'hellow', 'shaaban', '', 0, 133, '2015-03-10', '12:22:42'),
(70, 'hellow there', 'shaaban', '', 0, 130, '2015-03-10', '12:23:32'),
(71, 'heeey there', 'shaaban', '', 0, 132, '2015-03-10', '12:27:33'),
(72, 'watsapp', 'shaaban', '', 0, 134, '2015-03-10', '12:28:17'),
(74, 'hurrrah', 'shaaban', '', 0, 133, '2015-03-10', '12:32:21'),
(75, 'happy to see you', 'shaaban', '', 0, 134, '2015-03-10', '12:34:19'),
(76, 'am finally here', 'shaaban', '', 0, 134, '2015-03-10', '12:36:41'),
(77, 'welcome', 'shaaban', '', 0, 131, '2015-03-10', '12:37:58'),
(78, 'welcome', 'shaaban', '', 0, 131, '2015-03-10', '12:38:05'),
(79, 'welcome', 'shaaban', '', 0, 131, '2015-03-10', '12:38:07'),
(80, 'mwangangi', 'shaaban', '', 0, 130, '2015-03-10', '12:39:22'),
(81, 'kudos', 'shaaban', '', 0, 130, '2015-03-10', '12:39:58'),
(82, 'hi', 'shaaban', '', 0, 130, '2015-03-10', '12:40:32'),
(83, 'hellow', 'shaaban', '', 0, 107, '2015-03-10', '12:45:30'),
(85, 'hooow the going', 'shaaban', '', 0, 107, '2015-03-10', '12:51:40'),
(86, 'sadafwfwrf', 'shaaban', '', 0, 107, '2015-03-10', '12:53:38'),
(87, 'hi there', 'shaaban', '', 0, 106, '2015-03-10', '12:56:57'),
(88, 'yaaaaaaap', 'shaaban', '', 0, 168, '2015-03-10', '01:00:37'),
(89, 'hellow', 'shaaban', '', 0, 168, '2015-03-10', '01:05:19'),
(90, 'hellow', 'shaaban', '', 0, 168, '2015-03-10', '01:13:20'),
(91, 'hellow there', 'shaaban', '', 0, 164, '2015-03-10', '01:17:54'),
(92, 'hellow', 'shaaban', '', 0, 156, '2015-03-10', '01:28:03'),
(93, 'hellow there', 'shaaban', '', 0, 168, '2015-03-11', '05:45:22'),
(94, 'jhfjfj', 'shaaban', '', 0, 181, '2015-03-12', '09:46:38'),
(95, 'qwxqwxqwxqxqx', 'shaaban', '', 0, 184, '2015-03-20', '08:27:07'),
(96, 'jkkjlnl', 'Elvo', '', 0, 184, '2015-03-20', '08:40:03'),
(97, 'hi there chaps', 'shaaban', '', 0, 191, '2015-03-21', '10:54:20'),
(98, 'woooooooo', 'shaaban', '', 0, 191, '2015-03-21', '10:59:30'),
(99, 'heeeeeeeeeeeeeeey', 'shaaban', '', 0, 189, '2015-03-21', '11:55:45'),
(102, 'over to their children when they mature.', 'shaaban', '', 0, 197, '2015-03-22', '12:00:24'),
(103, 'hellow there', 'shaaban', '', 0, 200, '2015-03-26', '04:40:04'),
(106, 'hellow', 'kogo', '', 0, 173, '2015-04-23', '08:16:28'),
(107, 'wonderful', 'jacky', '', 0, 276, '2015-11-20', '09:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `pvt_messages`
--

CREATE TABLE IF NOT EXISTS `pvt_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL,
  `user_to` varchar(255) NOT NULL,
  `msg_body` text NOT NULL,
  `date` date NOT NULL,
  `opened` varchar(255) NOT NULL,
  `deleted` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

--
-- Dumping data for table `pvt_messages`
--

INSERT INTO `pvt_messages` (`id`, `user`, `user_to`, `msg_body`, `date`, `opened`, `deleted`) VALUES
(20, 'jacky', 'Ouma', 'how is there', '2015-01-13', 'yes', 'yes'),
(21, 'Ouma', 'jacky', 'how is the going', '2015-01-13', 'yes', 'yes'),
(22, 'jacky', 'Ouma', 'how is the going', '2015-01-13', 'yes', 'yes'),
(23, 'Ouma', 'jacky', 'hi there folk', '2015-01-13', 'yes', 'yes'),
(24, 'Ouma', 'shaaban', 'how is the going', '2015-01-15', 'yes', 'yes'),
(25, 'shaaban', 'Ouma', 'very fine', '2015-01-15', 'yes', 'yes'),
(26, 'Ouma', 'shaaban', 'how is the going', '2015-01-15', 'yes', 'yes'),
(27, 'Ouma', 'shaaban', 'hebu lipa deni', '2015-01-15', 'yes', 'yes'),
(28, 'Ouma', 'shaaban', 'hi therehi there\r\nhi therehi there', '2015-01-15', 'yes', 'yes'),
(29, 'Ouma', 'shaaban', 'hi there,hi there', '2015-01-15', 'yes', 'yes'),
(30, 'shaaban', 'Ouma', 'hi therehi there', '2015-01-15', 'yes', 'yes'),
(31, 'Ouma', 'shaaban', 'hellow therehellow there', '2015-01-15', 'yes', 'yes'),
(32, 'Ouma', 'shaaban', '0705638661 joyce achieng', '2015-01-15', 'yes', 'yes'),
(33, 'Ouma', 'shaaban', 'hellow there hellow there', '2015-01-15', 'yes', 'yes'),
(34, 'shaaban', 'Ouma', 'hi there hi there\r\nhi there hi there', '2015-01-15', 'yes', 'yes'),
(35, 'shaaban', 'Ouma', 'there', '2015-01-15', 'yes', 'yes'),
(37, 'kogo', 'shaaban', 'kljhuuigbiui', '2015-01-15', 'yes', 'yes'),
(38, 'jacky', 'shaaban', 'SADsdaDASDsddS', '2015-01-17', 'yes', 'yes'),
(39, 'shaaban', 'Ouma', 'm,,,,', '2015-01-27', 'yes', 'yes'),
(40, 'Meto', 'jacky', 'how are you doing', '2015-02-23', 'yes', 'yes'),
(41, 'Ouma', 'jacky', 'how is the goimng', '2015-02-23', 'yes', 'yes'),
(42, 'Ouma', 'jacky', 'am fine guys', '2015-02-23', 'yes', 'yes'),
(43, 'jacky', 'Ouma', 'hi man', '2015-02-23', 'yes', 'yes'),
(44, 'Ouma', 'jacky', 'klmlkmlk', '2015-02-23', 'yes', 'yes'),
(45, 'jacky', 'Ouma', 'ewjfwekjwndw', '2015-02-24', 'yes', 'yes'),
(46, 'Ouma', 'shaaban', 'efwefwfw', '2015-02-24', 'yes', 'yes'),
(47, 'Ouma', 'jacky', 'how is the going', '2015-02-24', 'yes', 'no'),
(49, 'Ouma', 'Meto', 'am fine howz u', '2015-02-24', 'yes', 'no'),
(50, 'Meto', 'Ouma', 'how is the going', '2015-02-25', 'yes', 'yes'),
(51, 'Meto', 'Ouma', 'how ie tne going', '2015-02-25', 'yes', 'yes'),
(52, 'Meto', 'Ouma', 'uko kampo', '2015-02-25', 'yes', 'yes'),
(53, 'jacky', 'Ouma', 'how is the going', '2015-02-25', 'yes', 'yes'),
(54, 'Meto', 'Ouma', 'mmm', '2015-02-25', 'yes', 'yes'),
(55, 'Meto', 'Ouma', 'when are we opening', '2015-02-25', 'yes', 'no'),
(56, 'jacky', 'Ouma', 'attend a mettin today at 7', '2015-02-25', 'yes', 'yes'),
(57, 'jacky', 'Ouma', 'how waz ur nyt', '2015-02-25', 'yes', 'no'),
(58, 'Ouma', 'Meto', 'was awsome how about u', '2015-02-25', 'yes', 'no'),
(59, 'kogo', 'Ouma', 'how is home', '2015-02-26', 'yes', 'no'),
(60, 'Ouma', 'kogo', 'home is fine', '2015-02-26', 'yes', 'no'),
(61, 'kogo', 'Ouma', 'finishe job yet ?', '2015-02-26', 'yes', 'no'),
(62, 'Ouma', 'kogo', 'yah alresdy finished', '2015-02-26', 'yes', 'no'),
(63, 'jacky', 'Ouma', 'the going is cul', '2015-02-26', 'yes', 'no'),
(64, 'Ouma', 'jacky', 'how is home', '2015-02-26', 'yes', 'no'),
(65, 'kogo', 'Ouma', 'you will be shocked', '2015-02-27', 'yes', 'no'),
(66, 'kogo', 'Ouma', 'heeeeeeeeeeey', '2015-02-27', 'yes', 'no'),
(67, 'Ouma', 'jacky', 'hellow there', '2015-02-27', 'yes', 'no'),
(68, 'Chumba', 'shaaban', 'how is the going', '2015-02-27', 'yes', 'yes'),
(69, 'kogo', 'Ouma', 'hey man', '2015-02-27', 'yes', 'no'),
(70, 'kogo', 'Ouma', 'how is the going opening on 6th', '2015-02-27', 'yes', 'no'),
(71, 'Ouma', 'kogo', 'thanks', '2015-02-27', 'yes', 'yes'),
(72, 'Ouma', 'kogo', 'happy to see you', '2015-02-27', 'yes', 'yes'),
(73, 'kogo', 'Ouma', 'cat on tuesday morning', '2015-02-27', 'yes', 'no'),
(74, 'kogo', 'Ouma', 'goodmorning', '2015-02-27', 'yes', 'yes'),
(75, 'Ouma', 'kogo', 'heeeeeeeeeeeey', '2015-02-27', 'yes', 'yes'),
(76, 'kogo', 'Ouma', 'guuuuuuuuu', '2015-02-27', 'yes', 'yes'),
(77, 'kogo', 'Ouma', 'heeeeeeeeeeeeey', '2015-02-27', 'yes', 'yes'),
(78, 'Ouma', 'kogo', 'hellllooooooooow', '2015-02-27', 'yes', 'yes'),
(79, 'kogo', 'Ouma', 'heeeeeeeeeeeeeeeeeeeey', '2015-02-27', 'yes', 'yes'),
(80, 'Ouma', 'kogo', 'how is the going', '2015-02-27', 'yes', 'no'),
(81, 'Ouma', 'kogo', 'did you make it', '2015-02-27', 'yes', 'no'),
(82, 'kibiru', 'shaaban', 'hellooooooooooow', '2015-02-27', 'yes', 'yes'),
(83, 'Ouma', 'Kouko', 'hellow there', '2015-02-28', 'yes', 'no'),
(84, 'shaaban', 'Ouma', 'hellow man', '2015-02-28', 'yes', 'yes'),
(85, 'Shaka', 'Ouma', 'youuu', '2015-02-28', 'yes', 'no'),
(86, 'Ouma', 'Shaka', 'welcome man', '2015-02-28', 'yes', 'no'),
(87, 'kibiru', 'jacky', 'hi there', '2015-03-01', 'yes', 'no'),
(88, 'kibiru', 'jacky', 'mmmmmmmmmmmm', '2015-03-01', 'yes', 'no'),
(89, 'jacky', 'kibiru', 'hellloooooooooooo', '2015-03-01', 'yes', 'no'),
(90, 'jacky', 'kibiru', 'how is the going', '2015-03-01', 'yes', 'no'),
(91, 'jacky', 'kibiru', 'hellow', '2015-03-01', 'yes', 'no'),
(92, 'kibiru', 'jacky', 'mmmmmmmmmmmm', '2015-03-01', 'yes', 'no'),
(93, 'shaaban', 'Songok', 'hellow buddy', '2015-03-01', 'yes', 'no'),
(94, 'shaaban', 'Songok', 'hellow ', '2015-03-01', 'yes', 'no'),
(95, 'Ouma', 'shaaban', 'hi buddyyy', '2015-03-02', 'yes', 'yes'),
(96, 'Ouma', 'dosh', 'heeeeeeeeeeeeeeeey', '2015-03-02', 'yes', 'no'),
(97, 'dosh', 'Ouma', 'am very fine', '2015-03-02', 'yes', 'no'),
(98, 'Ouma', 'dosh', 'how have you been', '2015-03-02', 'yes', 'no'),
(99, 'jacky', 'glad', 'hi', '2015-03-03', 'yes', 'no'),
(100, 'glad', 'jacky', 'hi', '2015-03-03', 'yes', 'no'),
(101, 'Ouma', 'kogo', 'hi there', '2015-03-09', 'yes', 'no'),
(102, 'Ouma', 'kogo', 'hi there', '2015-03-09', 'yes', 'no'),
(103, 'Ouma', 'shaaban', 'hi budy', '2015-03-10', 'yes', 'no'),
(104, 'shaaban', 'Ouma', 'am fine man', '2015-03-10', 'yes', 'no'),
(105, 'Ouma', 'shaaban', 'how is the going', '2015-03-12', 'yes', 'no'),
(106, 'Ouma', 'shaaban', 'hey there', '2015-03-12', 'yes', 'yes'),
(107, 'shaaban', 'kanungo', 'hi there', '2015-03-12', 'yes', 'no'),
(108, 'kanungo', 'shaaban', 'how is the going', '2015-03-12', 'yes', 'yes'),
(109, 'shaaban', 'kanungo', 'the going is fine', '2015-03-12', 'yes', 'no'),
(110, 'shaaban', 'kanungo', 'how have you been', '2015-03-12', 'yes', 'no'),
(111, 'Elvo', 'shaaban', 'hi buddy', '2015-03-20', 'yes', 'no'),
(112, 'shaaban', 'Elvo', 'fine buddy', '2015-03-20', 'yes', 'no'),
(113, 'shaaban', 'kanungo', 'hi there', '2015-03-24', 'yes', 'no'),
(114, 'jacky', 'shaaban', 'hellow there', '2015-03-24', 'yes', 'no'),
(116, 'shaaban', 'jacky', 'am very fine', '2015-03-25', 'yes', 'no'),
(117, 'jacky', 'shaaban', 'how have you been', '2015-03-25', 'yes', 'no'),
(118, 'jacky', 'shaaban', 'fine and u', '2015-03-25', 'yes', 'yes'),
(119, 'jacky', 'shaaban', 'how is the going', '2015-03-25', 'yes', 'yes'),
(120, 'shaaban', 'jacky', 'the going is awsome', '2015-03-25', 'yes', 'no'),
(121, 'jacky', 'glad', 'am very fine', '2015-03-25', 'no', 'no'),
(122, 'shaaban', 'Ouma', 'the going is awesome', '2015-03-25', 'yes', 'yes'),
(123, 'shaaban', 'Ouma', 'lala mlango wazi uliwe na fisi', '2015-03-25', 'yes', 'yes'),
(124, 'shaaban', 'Ouma', 'lala mlango wazi uliwe na fisi  lala mlango wazi uliwe na fisi  lala mlango wazi uliwe na fisi', '2015-03-25', 'yes', 'no'),
(130, 'Ouma', 'shaaban', 'haaaaaaaaaaaaaha', '2015-03-25', 'yes', 'yes'),
(131, 'Ouma', 'shaaban', 'lala mlango wazi uliwe na fisi lala mlango\r\nlala mlango wazi uliwe na fisi lala mlango', '2015-03-25', 'yes', 'yes'),
(132, 'Ouma', 'shaaban', 'lala mlango wazi uliwe na fisi lala mlango', '2015-03-25', 'yes', 'yes'),
(134, 'Ouma', 'angi', 'hellow', '2015-03-26', 'yes', 'no'),
(135, 'Ouma', 'shaaban', 'heeeeeeeeeeeey there', '2015-03-26', 'yes', 'no'),
(136, 'Ouma', 'shaaban', 'heeeeeeeeeeeey there', '2015-03-26', 'yes', 'yes'),
(137, 'shaaban', 'Ouma', 'how is the going', '2015-03-26', 'yes', 'yes'),
(138, 'shaaban', 'Ouma', 'how is the going', '2015-03-26', 'yes', 'yes'),
(139, 'shaaban', 'Ouma', 'how is the going', '2015-03-26', 'yes', 'no'),
(140, 'shaaban', 'Ouma', 'how is the going', '2015-03-26', 'yes', 'yes'),
(141, 'shaaban', 'Elvo', 'how is the going', '2015-03-26', 'yes', 'yes'),
(142, 'shaaban', 'Elvo', 'hellow', '2015-03-26', 'yes', 'yes'),
(143, 'shaaban', 'Mwaka', 'hi there', '2015-03-26', 'yes', 'yes'),
(144, 'Mwaka', 'shaaban', 'fine am finally here', '2015-03-26', 'yes', 'no'),
(145, 'shaaban', 'Mwaka', 'welcome', '2015-03-26', 'yes', 'no'),
(146, 'Meto', 'shaaban', 'hellow there', '2015-03-28', 'yes', 'no'),
(147, 'shaaban', 'Meto', 'am fine chap', '2015-03-28', 'yes', 'no'),
(148, 'Ouma', 'Mwaka', 'how is the going', '2015-03-28', 'no', 'no'),
(149, 'Meto', 'Ouma', 'cull', '2015-03-28', 'yes', 'no'),
(150, 'Elvo', 'Meto', 'hellow there', '2015-03-28', 'yes', 'no'),
(151, 'Meto', 'Elvo', 'am fine', '2015-03-28', 'yes', 'no'),
(152, 'shaaban', 'Elvo', 'mkjhgfdghjk', '2015-03-30', 'yes', 'yes'),
(153, 'shaaban', 'dosh', 'hellow', '2015-03-30', 'yes', 'yes'),
(154, 'shaaban', 'dosh', 'jknlkjnlkmnlkmlkml', '2015-03-30', 'yes', 'yes'),
(155, 'shaaban', 'Ouma', 'hellow there', '2015-03-31', 'yes', 'yes'),
(156, 'shaaban', 'dosh', 'hellow tere', '2015-04-01', 'yes', 'no'),
(157, 'Ouma', 'Shaaban', 'hi there', '2015-04-01', 'no', 'no'),
(158, 'shaaban', 'Meto', 'kkkj', '2015-04-03', 'yes', 'yes'),
(159, 'Elvo', 'glad', 'hi there', '2015-04-03', 'no', 'no'),
(160, 'Kouko', 'Songok', 'hi there', '2015-04-03', 'yes', 'no'),
(161, 'Kouko', 'dosh', 'hi there', '2015-04-03', 'yes', 'no'),
(162, 'Kouko', 'shaaban', 'hi buddy', '2015-04-03', 'yes', 'no'),
(163, 'shaaban', 'Kouko', 'fine buddy', '2015-04-03', 'yes', 'no'),
(164, 'Kouko', 'shaaban', 'how is the going', '2015-04-03', 'yes', 'no'),
(165, 'shaaban', 'glad', 'm,m,m,', '2015-04-07', 'no', 'no'),
(166, 'jacky', 'shaaban', 'fine', '2015-11-20', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `sign_up_date` date NOT NULL,
  `activated` enum('0','1') NOT NULL,
  `Registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bio` text NOT NULL,
  `profile_pic` text NOT NULL,
  `friend_array` text NOT NULL,
  `closed` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `sign_up_date`, `activated`, `Registration_date`, `bio`, `profile_pic`, `friend_array`, `closed`) VALUES
(1, 'Jackiline', 'Chep', 'jacky', 'jacky@gmail.com', 'chepngetich', '2014-11-26', '0', '2014-11-26 23:01:42', 'if you see the wonders of the fairly tale you can tell the future even if you fail.', 'ysFhfvIKNgtSuio/1157504_422946644491081_2122892313_n.jpg', 'shaaban,kibiru,orsh,kogo,Songok,Elvo,mary', 'no'),
(2, 'Didinka', 'Johnson', 'shaaban', 'didinyajohnson@gmail.com', 'didinkajohnson@gmail.com', '2014-11-26', '0', '2014-11-26 23:04:11', 'we cannot go on pretending day by that someone some where will soon make a change. ', 'IymD6BZa45h2YiX/10641254_1463923390558500_1481825804911038032_n.jpg', 'Elvo,jacky,Kouko,bash,kibiru,kogo,mary,Ouma,Meto', 'no'),
(3, 'Dominica', 'Akinyi', 'Ouma', 'oumaopar@yahoo.com', 'oumaopar@yahoo.com', '2014-11-26', '0', '2014-11-26 23:08:18', 'They just say what they mean they dont mean what they say', 'nRZLB3Hr0eMa8Gb/imgres.jpg', 'mary,shaaban', 'no'),
(4, 'Koech', 'Silvanus', 'Kiptum', 'silvanuskoech@gmail.com', 'silvanuskoech@gmail.com', '2014-11-26', '0', '2014-11-26 23:27:27', '', 'qrsxcdCenfM60PN/slider13.png', '', 'no'),
(5, 'Mwangi', 'Alfred', 'Mwash', 'mwangi@gmail.com', 'mwangi@gmail.com', '2014-11-26', '0', '2014-11-26 23:31:22', '', '', '', 'no'),
(6, 'Emily', 'Chebet', 'Chumba', 'emily@gmail.com', 'chepchumba@gmail.com', '2014-11-26', '0', '2014-11-26 23:34:06', '', 'obr9N5RKpj1mcYC/slider21.png', '', 'no'),
(7, 'Kichumba', 'Julius', 'kogo', 'kogo@gmail.com', 'kogo@gmail.com', '2014-11-26', '0', '2014-11-27 00:22:18', 'hey there am on junior store', 'HhxquYWBjkpzDFy/photo0106.jpg', 'jacky,Meto,bash,shaaban,mary', 'no'),
(8, 'Catherine', 'Ouma', 'Alice', 'didinkajonhnson@gmail.com', 'didinkajohnson@gmail.com', '2014-11-28', '0', '2014-11-28 18:24:31', '', '', '', 'no'),
(9, 'Obadiah', 'Ngeno', 'Korir', 'ngenobash@gmail.com', 'ngenobash@gmail.com', '2014-12-02', '0', '2014-12-02 19:01:23', '', '', '', 'no'),
(10, 'VINCENT', 'bett', 'kip', 'vincentbett3605@gmail.com', 'computer', '2014-12-03', '0', '2014-12-03 13:13:49', '', '', '', 'no'),
(11, 'peter', 'mugo', 'kibiru', 'petermugo@gmail.com', 'petermugo@gmail.comm', '2014-12-03', '0', '2014-12-03 19:19:46', '', '3zvRwiCyfre087T/img_20131209_150159794_001.jpg', 'jacky,Elvo,Meto,shaaban,mary', 'no'),
(12, 'Peter', 'Waweru', 'Kimangi', 'waweru@gmail.com', 'waweru@gmail.comn', '2014-12-06', '0', '2014-12-06 23:14:43', '', '', '', 'no'),
(13, 'Elvis', 'Koech', 'Elvo', 'koechelvis@gmail.com', 'koechelvis@gmail.come', '2014-12-10', '0', '2014-12-11 01:26:42', '', 'Vva2xNGActWJKkh/images7_001.jpg', 'shaaban,bash,jacky,kibiru,mary', 'no'),
(14, 'James', 'Kimeto', 'Meto', 'kimetojames@gmail.com', 'kimetojames@gmail,comm', '2014-12-13', '0', '2014-12-13 11:23:04', '', 'kogRf6BmjOQet2L/mcn.jpg', 'kogo,kibiru,mary,shaaban', 'no'),
(15, 'Kiptanui', 'Kelvin', 'Songok', 'Kiptanui@gmail.com', 'Kiptanui@gmail.comm', '2014-12-13', '0', '2014-12-13 11:49:55', '', 'fHRoq8Okcp7DTuw/slider15.png', 'jacky,Kouko,mary', 'no'),
(16, 'Josphine', 'josi', 'orsh', 'josphine@gmail.com', 'josphine@gmail.comm', '2014-12-13', '0', '2014-12-13 11:56:37', '', '', 'jacky,Kouko', 'no'),
(17, 'vincent', 'didinka', 'peter', 'didinkajonson@gmail.com', 'qwertyuiop', '2014-12-14', '0', '2014-12-14 12:30:54', '', '', '', 'no'),
(18, 'Alice', 'Mjaka', 'kanungo', 'alice@gmail.com', 'alice@gmail.comn', '2015-01-09', '0', '2015-01-09 14:26:59', '', 'uM79AgkFIjhNDGP/Snapshot_20140813-1.jpg', '', 'no'),
(19, 'obaida', 'ngeno', 'bash', 'ngeno@gmail.com', 'ngeno@gmail.comm', '2015-01-12', '0', '2015-01-11 23:32:47', '', '', 'Elvo,Mwaka,shaaban,kogo,mary', 'no'),
(20, 'Robert', 'Ouko', 'Kouko', 'robert@gmail.com', 'robert@gmail.comm', '2015-01-15', '0', '2015-01-15 12:02:26', '', '', 'orsh,shaaban,Songok,mary', 'no'),
(21, 'alfred', 'kiguru', 'mwas', 'al@yahoo.com', 'mwangi', '2015-01-24', '0', '2015-01-24 11:26:34', '', '', '', 'no'),
(22, 'Peter', 'Mwaura', 'Shaka', 'shaka@gmail.com', 'shaka@gmail.comm', '2015-02-28', '0', '2015-02-27 19:49:24', 'finally here guys', '', '', 'no'),
(23, 'Doreen', 'Chepkoech', 'dosh', 'doreen@gmail.com', 'doreen@gmail.comm', '2015-03-02', '0', '2015-03-01 16:29:53', '', '', '', 'no'),
(24, 'Angeline', 'Chaz', 'angi', 'angeline@yahoo.com', 'angeline@yahoo.comm', '2015-03-02', '0', '2015-03-01 16:45:21', '', 'VeDMtcoGQ2wvzi1/images7_001.jpg', 'Mwaka', 'no'),
(25, 'kiptoo', 'gladoo', 'glad', 'glad@gmail.com', '123456789', '2015-03-03', '0', '2015-03-02 20:24:02', '', '1ruVgZFbXxpcMkh/ARCHOS.jpg', '', 'no'),
(26, 'Silvanus', 'Koech', 'Koech', 'koech@gmail.com', '298640', '2015-03-12', '0', '2015-03-12 10:38:12', '', 'EoFy32j5T4umWRt/ddcwsc.jpg', '', 'no'),
(27, 'Peter', 'Kimani', 'Mwaka', 'mwaka@gmail.com', 'zzzzzzz', '2015-03-26', '0', '2015-03-25 20:34:27', '', '', 'bash,angi', 'no'),
(28, 'opar', 'pascal', 'opar', 'paschalopar@gmail.com', '12345', '2015-03-30', '0', '2015-03-30 08:35:10', '', '', '', 'no'),
(29, 'Marry', 'Anne', 'mary', 'marry@gmail.com', 'marry@gmail.comm', '2015-03-31', '0', '2015-03-30 17:45:16', '', '', 'Ouma,jacky,Elvo,Kouko,Meto,Songok,bash,kibiru,kogo,shaaban', 'no'),
(30, 'Jane', 'Didinya', 'jane', 'jane@yahoo.com', 'janes', '2015-04-24', '0', '2015-04-24 11:27:35', '', '', '', 'no');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
