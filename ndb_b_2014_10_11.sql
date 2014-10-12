-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2014 at 03:21 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ndb_b`
--

-- --------------------------------------------------------

--
-- Table structure for table `ndb_doc`
--

CREATE TABLE IF NOT EXISTS `ndb_doc` (
  `d_id` int(10) NOT NULL AUTO_INCREMENT,
  `cor_non` varchar(10) DEFAULT NULL,
  `cr_brd` varchar(10) DEFAULT NULL,
  `reference` varchar(40) DEFAULT NULL,
  `requester` varchar(40) DEFAULT NULL,
  `unit` varchar(40) DEFAULT NULL,
  `contact_p` varchar(40) DEFAULT NULL,
  `date_sub` varchar(14) DEFAULT 'N/A',
  `description` text,
  `date_reciv_it` varchar(14) DEFAULT 'N/A',
  `smrc_date` varchar(14) DEFAULT 'N/A',
  `smrc_status` varchar(14) DEFAULT NULL,
  `priority` varchar(14) DEFAULT NULL,
  `date_develop` varchar(14) DEFAULT 'N/A',
  `date_temo` varchar(14) DEFAULT 'N/A',
  `remarks` text,
  `develop_r_date` varchar(14) DEFAULT 'N/A',
  `document_complet` varchar(10) DEFAULT NULL,
  `date_hand_qa` varchar(14) DEFAULT 'N/A',
  `qa_complete` varchar(14) DEFAULT 'N/A',
  `date_back_it` varchar(14) DEFAULT 'N/A',
  `release_date` varchar(14) DEFAULT 'N/A',
  `status` varchar(10) DEFAULT NULL,
  `scan_doc1` varchar(255) DEFAULT NULL,
  `scan_doc2` varchar(255) DEFAULT NULL,
  `scan_doc3` varchar(255) DEFAULT NULL,
  `update_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ndb_doc`
--

INSERT INTO `ndb_doc` (`d_id`, `cor_non`, `cr_brd`, `reference`, `requester`, `unit`, `contact_p`, `date_sub`, `description`, `date_reciv_it`, `smrc_date`, `smrc_status`, `priority`, `date_develop`, `date_temo`, `remarks`, `develop_r_date`, `document_complet`, `date_hand_qa`, `qa_complete`, `date_back_it`, `release_date`, `status`, `scan_doc1`, `scan_doc2`, `scan_doc3`, `update_on`) VALUES
(1, 'Core', 'CR', 'sd edit 3', NULL, NULL, NULL, 'N/A', NULL, 'N/A', 'N/A', NULL, NULL, 'N/A', 'N/A', NULL, 'N/A', NULL, 'N/A', 'N/A', 'N/A', 'N/A', 'pending', '1_1412987996.pdf', NULL, NULL, '2014-10-11 01:20:28'),
(2, 'Core', 'CR', 'qafdad', 'nil', 'asd', 'sd', '10/07/2014', 'sadsd', '10/08/2014', '10/14/2014', 'asd', 'asd', 'N/A', 'N/A', 'asdvad', '10/14/2014', NULL, '10/15/2014', 'N/A', '10/29/2014', '10/16/2014', 'asdasd', NULL, NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ndb_users`
--

CREATE TABLE IF NOT EXISTS `ndb_users` (
  `us_id` int(11) NOT NULL AUTO_INCREMENT,
  `us_name` varchar(40) DEFAULT NULL,
  `us_pass` varchar(255) DEFAULT NULL,
  `us_level` tinyint(4) DEFAULT '0',
  `us_salt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ndb_users`
--

INSERT INTO `ndb_users` (`us_id`, `us_name`, `us_pass`, `us_level`, `us_salt`) VALUES
(1, 'test', '4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a', 1, NULL),
(3, 'hello', '2', 2, NULL),
(5, 'sahan', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 1, 'MLH+7eV49JbXdxMr5sndaA==');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
