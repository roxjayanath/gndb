-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2014 at 12:03 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

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
-- Table structure for table `dev_team`
--

CREATE TABLE IF NOT EXISTS `dev_team` (
  `dev_id` int(11) NOT NULL AUTO_INCREMENT,
  `dev_name` varchar(20) NOT NULL,
  PRIMARY KEY (`dev_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `dev_team`
--

INSERT INTO `dev_team` (`dev_id`, `dev_name`) VALUES
(3, 'RAVINDARA'),
(4, 'THARINDU'),
(6, 'ARINDA'),
(7, 'ROSHAN'),
(8, 'AMILA K'),
(9, 'AMILA G'),
(16, 'NILESH'),
(17, 'FLS');

-- --------------------------------------------------------

--
-- Table structure for table `edit_log`
--

CREATE TABLE IF NOT EXISTS `edit_log` (
  `ed_id` int(16) NOT NULL AUTO_INCREMENT,
  `doc_id` int(8) DEFAULT NULL,
  `user_id` int(8) DEFAULT NULL,
  `ed_type` varchar(20) DEFAULT NULL,
  `ed_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ed_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `edit_log`
--

INSERT INTO `edit_log` (`ed_id`, `doc_id`, `user_id`, `ed_type`, `ed_time`) VALUES
(7, 101, 37, 'EDIT', '2014-11-14 09:02:03'),
(8, 135, 23, 'EDIT', '2014-11-14 09:13:38'),
(15, 185, 41, 'EDIT', '2014-11-14 09:44:48'),
(16, 248, 41, 'EDIT', '2014-11-14 09:47:47'),
(17, 249, 41, 'EDIT', '2014-11-14 09:50:29'),
(18, 250, 41, 'EDIT', '2014-11-14 09:55:39'),
(27, 101, 37, 'EDIT', '2014-11-14 10:19:24'),
(28, 101, 37, 'EDIT', '2014-11-14 10:19:32'),
(29, 250, 23, 'EDIT', '2014-11-14 10:22:56'),
(30, 246, 23, 'EDIT', '2014-11-14 10:30:08'),
(31, 248, 23, 'EDIT', '2014-11-14 10:31:10'),
(32, 249, 23, 'EDIT', '2014-11-14 10:33:44'),
(33, 152, 23, 'EDIT', '2014-11-14 10:38:23'),
(34, 251, 23, 'EDIT', '2014-11-14 10:41:07'),
(35, 251, 41, 'EDIT', '2014-11-14 10:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `ndb_dep`
--

CREATE TABLE IF NOT EXISTS `ndb_dep` (
  `dep_id` int(6) NOT NULL AUTO_INCREMENT,
  `dep_name` varchar(255) NOT NULL,
  PRIMARY KEY (`dep_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=63 ;

--
-- Dumping data for table `ndb_dep`
--

INSERT INTO `ndb_dep` (`dep_id`, `dep_name`) VALUES
(1, 'BC'),
(2, 'Branch Banking'),
(3, 'Cards'),
(4, 'Cash Management'),
(5, 'CAU'),
(6, 'CM'),
(7, 'Collection and Recoveries'),
(8, 'Complaince'),
(9, 'CPU'),
(10, 'CRU'),
(11, 'FIN'),
(12, 'Finance'),
(13, 'Finance/Trade'),
(14, 'FIN-CRU'),
(15, 'Home Loans'),
(16, 'IB'),
(17, 'ISLAMIC BANKING'),
(18, 'IT'),
(19, 'MRU'),
(20, 'Project Finance'),
(21, 'Recoveries'),
(22, 'Remittance'),
(23, 'Retail'),
(24, 'Retail Banking'),
(25, 'Retail Credit'),
(26, 'RISK'),
(27, 'SME'),
(28, 'TBO'),
(29, 'TO'),
(30, 'Trade'),
(31, 'Treasury'),
(32, 'BC'),
(33, 'Branch Banking'),
(34, 'Cards'),
(35, 'Cash Management'),
(36, 'CAU'),
(37, 'CM'),
(38, 'Collection and Recoveries'),
(39, 'Complaince'),
(40, 'CPU'),
(41, 'CRU'),
(42, 'FIN'),
(43, 'Finance'),
(44, 'Finance/Trade'),
(45, 'FIN-CRU'),
(46, 'Home Loans'),
(47, 'IB'),
(48, 'ISLAMIC BANKING'),
(49, 'IT'),
(50, 'MRU'),
(51, 'Project Finance'),
(52, 'Recoveries'),
(53, 'Remittance'),
(54, 'Retail'),
(55, 'Retail Banking'),
(56, 'Retail Credit'),
(57, 'RISK'),
(58, 'SME'),
(59, 'TBO'),
(60, 'TO'),
(61, 'Trade'),
(62, 'Treasury');

-- --------------------------------------------------------

--
-- Table structure for table `ndb_doc`
--

CREATE TABLE IF NOT EXISTS `ndb_doc` (
  `d_id` int(10) NOT NULL AUTO_INCREMENT,
  `cor_non` varchar(10) DEFAULT NULL,
  `cr_brd` varchar(10) DEFAULT NULL,
  `ref1` varchar(20) DEFAULT NULL,
  `ref2` varchar(20) DEFAULT NULL,
  `ref3` int(5) DEFAULT NULL,
  `reffull` varchar(40) DEFAULT NULL,
  `reference` varchar(40) DEFAULT NULL,
  `requester` varchar(40) DEFAULT NULL,
  `unit` varchar(40) DEFAULT NULL,
  `contact_p` varchar(40) DEFAULT NULL,
  `date_sub` varchar(14) DEFAULT 'N/A',
  `testdate` date DEFAULT NULL,
  `description` text,
  `date_reciv_it` varchar(14) DEFAULT 'N/A',
  `smrc_date` date DEFAULT NULL,
  `smrc_status` varchar(14) DEFAULT NULL,
  `priority` varchar(14) DEFAULT NULL,
  `COST` varchar(30) DEFAULT NULL,
  `date_develop` date DEFAULT NULL,
  `AVPIT` date DEFAULT NULL,
  `VPIT` date DEFAULT NULL,
  `COST_DATE` date DEFAULT NULL,
  `CFO_DATE` date DEFAULT NULL,
  `BRP` date DEFAULT NULL,
  `DEV_HAND` varchar(14) DEFAULT NULL,
  `PACK_DATE` date DEFAULT NULL,
  `DEV_TESTER` varchar(20) DEFAULT NULL,
  `TEST_ENV` varchar(20) DEFAULT NULL,
  `TEST_MEM` varchar(20) DEFAULT NULL,
  `TEST_C_NO` int(4) DEFAULT NULL,
  `TEST_COM_DATE` date DEFAULT NULL,
  `TEST_STAT` varchar(30) DEFAULT NULL,
  `date_temo` varchar(14) DEFAULT 'N/A',
  `remarks` text,
  `assing_to` varchar(30) NOT NULL,
  `ded_line` varchar(14) DEFAULT NULL,
  `USER_ASS` date DEFAULT NULL,
  `develop_r_date` date DEFAULT NULL,
  `document_complet` varchar(10) DEFAULT NULL,
  `date_hand_qa` date DEFAULT NULL,
  `QA_REF_N` varchar(20) NOT NULL,
  `QA_TEST_N` varchar(20) NOT NULL,
  `QA_STATUS` varchar(20) NOT NULL,
  `qa_complete` date DEFAULT NULL,
  `date_back_it` date DEFAULT NULL,
  `D_FIX_BY` varchar(20) DEFAULT NULL,
  `USER_Not` varchar(10) DEFAULT NULL,
  `release_date` varchar(14) DEFAULT 'N/A',
  `status` varchar(30) DEFAULT NULL,
  `scan_doc1` varchar(255) DEFAULT NULL,
  `scan_doc2` varchar(255) DEFAULT NULL,
  `scan_doc3` varchar(255) DEFAULT NULL,
  `update_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `d_visible` int(2) DEFAULT '1',
  `edited_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=252 ;

--
-- Dumping data for table `ndb_doc`
--

INSERT INTO `ndb_doc` (`d_id`, `cor_non`, `cr_brd`, `ref1`, `ref2`, `ref3`, `reffull`, `reference`, `requester`, `unit`, `contact_p`, `date_sub`, `testdate`, `description`, `date_reciv_it`, `smrc_date`, `smrc_status`, `priority`, `COST`, `date_develop`, `AVPIT`, `VPIT`, `COST_DATE`, `CFO_DATE`, `BRP`, `DEV_HAND`, `PACK_DATE`, `DEV_TESTER`, `TEST_ENV`, `TEST_MEM`, `TEST_C_NO`, `TEST_COM_DATE`, `TEST_STAT`, `date_temo`, `remarks`, `assing_to`, `ded_line`, `USER_ASS`, `develop_r_date`, `document_complet`, `date_hand_qa`, `QA_REF_N`, `QA_TEST_N`, `QA_STATUS`, `qa_complete`, `date_back_it`, `D_FIX_BY`, `USER_Not`, `release_date`, `status`, `scan_doc1`, `scan_doc2`, `scan_doc3`, `update_on`, `d_visible`, `edited_by`) VALUES
(101, 'Core', 'BRD', 'RETAIL', 'BRD', 14, 'RETAIL-BRD-14', NULL, 'CHALANI KULATHUNGA', 'Retail', NULL, '07/15/2014', '2014-07-16', 'ARC-IB PASSWORD ACTIVATION', '07/16/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, 'N/A', 'SUBMITTED BY IT STRATEGEY TEAM', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 10:19:32', 1, 37),
(102, 'Core', 'BRD', 'RETAIL', 'BRD', 15, 'RETAIL-BRD-15', NULL, 'CHALANI KULATHUNGA', 'Retail', NULL, '07/15/2014', '2014-07-16', 'STRAIGHT THROGH PROCESSING FOR NBO UTILITY', '07/16/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 'N/A', 'SEBMITTED BY IT STRATEGY AND BUSINESS DEVELOPMENT TEAM', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 1),
(103, 'Core', 'BRD', 'CM', 'BRD', 17, 'CM-BRD-17', NULL, 'BODHI GAMAGE', 'CM', NULL, '03/20/2014', '2014-03-21', 'ENABLE EXPORT BILL SCHEDULE THROUGH ARC-IB', '03/21/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'JOINT BRD SUBMITTED BY TRADE AND CASH MANAGEMENT', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 1),
(104, 'Core', 'BRD', 'CM', 'BRD', 6, 'CM-BRD-6', NULL, 'BODHI GAMAGE', 'CM', NULL, '09/14/2012', '2012-09-17', 'CHANGES TO ARC-IB CORPORATE MANDATE APPLICATION', '09/17/2012', NULL, NULL, 'High', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'ARC-IB MANDATE ISSUE REPORTED BY RICHARD PERIS DISTRIBUTORS', '', NULL, NULL, NULL, NULL, NULL, '', 'DILANKA MADHUSHARI', 'inprogress', NULL, NULL, NULL, NULL, 'N/A', 'QA Testing', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 1),
(115, 'Core', 'BRD', 'CM', 'BRD', 15, 'CM-BRD-15', NULL, 'BODHI GAMAGE', 'CM', NULL, '03/20/2014', '2014-03-21', 'Ceylinco Insurance Text File', '03/21/2014', NULL, NULL, 'Low', NULL, '2014-11-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Original document handed over to Vickum on 21-Mar-14 and 15-Jul-14\r\n07/11/2014 Workaround solution suggested to the user and awaiting confirmation.\r\n13/11/2014 Reassigned to Development', 'Ravindra Basnayke', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Development', '1_CM-BRD-15.pdf', NULL, NULL, '2014-11-14 08:50:19', 1, 36),
(116, 'Core', 'BRD', 'CM', 'BRD', 16, 'CM-BRD-16', NULL, 'BODHI GAMAGE', 'CM', NULL, '03/20/2014', '2014-03-21', 'Enable customer to send their loan instructions through Arc IB\r\n', '03/21/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '31-Oct-14 - assing to vickum\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 1),
(117, 'Core', 'CR', 'CM', 'CR', 25, 'CM-CR-25', NULL, 'BODHI GAMAGE', 'CM', NULL, '09/23/2014', '2014-09-25', 'LC to add beneficiary name to the view/modify screens\r\n05/11/2014 Implemented in Live', '09/25/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Close', 'N/A', '"02-Oct-14 - Sent for Nishantha''s approval\r\n03-Oct-14 - Send for SD approval\r\n09-Oct-14 - Send for CFO approval"\r\n', 'RAVINDRA BASNAYAKE', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, 'YES', 'N/A', 'Close', NULL, NULL, NULL, '2014-11-14 07:11:27', 1, 1),
(118, 'Core', 'BRD', 'CM', 'BRD', 11, 'CM-BRD-11', NULL, 'BODHI GAMAGE', 'CM', NULL, '07/08/2013', '2013-12-11', 'Print Preview and Print Option for ARC-IB\r\n', '12/11/2013', NULL, NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Hold', 'N/A', 'Development started by on site consultant Jisa. \r\n19-Sep-14-solution returened to development\r\n30-Oct-14- return to FLS\r\n11-Nov-14 Issue list sent to Murugan. LC moduke testing unable to test due to environment issues\r\n14-Nov-14 Full testing report sent to Murugan. Awating until all issues being fixed to continue testing.', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending Temonos', '1_CM-BRD-11.pdf', NULL, NULL, '2014-11-14 08:37:57', 1, 36),
(120, 'Core', 'CR', 'CPU', 'CR', 73, 'CPU-CR-73', NULL, 'DAKSHIKA DIAS', 'CPU', NULL, '08/01/2014', '2014-08-01', 'To change the cost of funds automaticaly when the change of the interest rate revise months\r\n', '08/01/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"03-Oct-14 - Return to development team to discuss with Nishantha\r\n17-Oct-14- Infrom the user to check with the work around\r\n28-Oct-14 - Send to development team"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 1),
(121, 'Core', 'CR', 'CM', 'CR', 15, 'CM-CR-15', NULL, 'BODHI GAMAGE', 'CM', NULL, '10/02/2013', '2013-12-12', 'Ewindow Third Party Transfers Module\r\n', '12/12/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'This CR will be handle through CM-BRD-03\r\n', 'TEMENOS', NULL, NULL, NULL, NULL, NULL, '', '', 'inprogress', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 1),
(122, 'Core', 'BRD', 'RETAIL', 'BRD', 12, 'RETAIL-BRD-12', NULL, 'NISHAN PERERA', 'RETAIL', NULL, '06/20/2013', '2013-06-20', 'NDB Minor Savings - Shilpa Saver Account\r\n', '06/20/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pending', 'N/A', '20-Oct-2014 Informed Asela to contine testing.\r\n26-Oct-2014 User Requested additiona 3 weeks for testing.\r\n14-Nov-2014 Informed Asela to complete testing by 17-Nov-2014 and if not clse the document.', '', NULL, NULL, '1970-01-01', NULL, '1970-01-01', '', '', '', '1970-01-01', '1970-01-01', NULL, NULL, 'N/A', 'User Testing', NULL, NULL, NULL, '2014-11-14 07:16:35', 1, 23),
(123, 'Core', 'CR', 'TBO', 'CR', 37, 'TBO-CR-37', NULL, 'NIROSHIKA', 'TBO', NULL, '05/31/2014', '2014-04-02', 'Automation of DCD/Option transactions and modifications to existing option report\r\n', '04/02/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Requirement returned to user as PPG needed 22-04-14\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Rejected', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 1),
(124, 'Core', 'CR', 'RETAIL', 'CR', 45, 'RETAIL-CR-45', NULL, 'ASELA GUNAWARDENA', 'RETAIL', NULL, '10/17/2014', NULL, 'Mobile Banking ISO message Formats\r\n', '10/17/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '20-Oct-14 -  assing to temenos for effort estimation\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 1),
(125, 'Core', 'BRD', 'IB', 'BRD', 1, 'IB-BRD-1', NULL, 'PRABATH KAUSHALYA', 'IB', NULL, '05/30/2014', NULL, 'Unearned Profit (income) of ijara\r\n', '10/30/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'After refer to Temenos, development not feasible from there end\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'rejected', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 1),
(126, 'Core', 'CR', 'TBO', 'CR', 38, 'TBO-CR-38', NULL, 'HASITHA', 'TBO', NULL, '04/01/2014', '2014-04-01', 'Automation of brokerage Entries\r\n', '04/01/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Requirement returned to user as more Discussion need for the requrement 22-04-14. Under SD approval 09-Jun-14. Under CFO Approval from 26-Jun-14. Approval received 01-Jul-14\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(127, 'Core', 'CR', 'CAU', 'CR', 6, 'CAU-CR-6', NULL, 'SANDUN MENDIS', 'CAU', NULL, '02/13/2014', '2014-02-20', 'Rectification of data issues in NDB.OD.EXCESS.ONLY\r\n', '02/20/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '01/09/2014 - Temenos FLS estimation received and submitted to Sandun for approval\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending Temonos', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(128, 'Core', 'CR', 'RETAIL', 'CR', 32, 'RETAIL-CR-32', NULL, 'ASELA GUNAWARDENA', 'RETAIL', NULL, '03/05/2014', '2014-03-05', 'Pawning Reversal activity\r\n', '03/05/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Assigned to Oshadi to evaluate the CR', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Inprogress', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(129, 'Core', 'CR', 'RETAIL', 'CR', 33, 'RETAIL-CR-33', NULL, 'ASELA GUNAWARDENA', 'RETAIL', NULL, '03/05/2014', '2014-03-05', 'Pawning Change Activity\r\n', '03/05/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Assigned to Oshadhi for evaluate the request\r\n03-Oct-14 - Not proceed with CR since, issue sort with the merge', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Close', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(130, 'Core', 'CR', 'CPU', 'CR', 58, 'CPU-CR-58', NULL, 'Vinod Sivapragasam', 'CPU', NULL, '03/26/2014', '2014-03-27', '"Int on joint account of individuals should be apportioned among such individuals accordingly part of int apportioned to each such individual can be trated as int payable to such individual\r\n30-10-14 - send to fls"\r\n', '03/27/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'under SD approval from 16-Apr-14\r\n03/11/2014 Issue has been assigned to FLS', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending Temonos', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(131, 'Core', 'RR', 'FIN', 'RR', 26, 'FIN-RR-26', NULL, 'LAKSHANTHA SILVA', 'FIN', NULL, '07/02/2014', '2014-07-03', 'To improve the speed and the accuracy of journal control auth prrocess\r\n', '07/03/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(132, 'Core', 'CR', 'CPU', 'CR', 69, 'CPU-CR-69', NULL, 'MALIKA JAYASINGHE', 'CPU', NULL, '08/04/2014', '2014-08-06', 'VAT amount and Lease amount with VAT field values should display with thousand seperator\r\n', '08/06/2014', '2014-10-31', NULL, 'Low', NULL, '2014-10-31', '2014-08-22', '2014-08-25', '2014-08-27', '2014-08-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Cost approval received on 25-Aug-14. Under SD approval from 25-Aug-14.\r\nAssigned to Nilesh on 31-Oct-2014\r\nAssigned to FLS on 31-Oct-2014', 'NILESH SAMARAKOON', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending Temonos', '1_CPU-CR-69.pdf', NULL, NULL, '2014-11-14 08:41:13', 1, 36),
(133, 'Core', 'CR', 'CPU', 'CR', 70, 'CPU-CR-70', NULL, 'HISHAM', 'CPU', NULL, '06/24/2014', '2014-06-27', 'Can not view the exchange rate applied in the fcy draft authorisation screen\r\n', '06/27/2014', NULL, NULL, 'Low', NULL, '2014-10-31', '2014-08-22', '2014-08-25', '2014-08-27', '2014-08-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Cost approval received on 25-Aug-14. Under SD approval from 25-Aug-14.\r\n', 'Ravindra Basnayake', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Development', NULL, NULL, NULL, '2014-11-14 08:20:12', 1, 37),
(134, 'Core', 'RR', 'CPU', 'RR', 25, 'CPU-RR-25', NULL, 'H K  VICKUM', 'CPU', NULL, '06/13/2014', '2014-06-18', 'Report in order to identify SWEEPS that have not taken place\r\n', '06/18/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Hold until EB.Phantom Core bug fixed by FLS 25-Aug-14\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Hold', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(135, 'Core', 'RR', 'FIN', 'RR', 22, 'FIN-RR-22', NULL, 'IRANGA WEERAWANSA', 'FIN', NULL, '04/03/2014', '2014-04-03', 'Report on Maximum and minimum interest rates bank has offered for time deposits during a particular month\r\n', '04/03/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '14-Nov-2014  retrieve requested data in the above subject CR  using the report provided under the reference number FIN-R-21. That report comes with all FD accounts. Therefore request user to check the existing report and confirm us by 18th Nov 2014. ', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'User Testing', NULL, NULL, NULL, '2014-11-14 09:13:38', 1, 23),
(136, 'Core', 'CR', 'CARDS', 'CR', 19, 'CARDS-CR-19', NULL, 'NIRMA MENDIS', 'CARDS', NULL, '03/25/2014', '2014-03-27', 'Remooval of Accept Overdaft message\r\n', '03/27/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Request returned to user as NBO all changes should be handled through as a one development and time to time changes not allow to apply\r\n14-Nov-2014 Solution provided along with ARC-IB browser upgrade which is under QA at the moment.\r\n', '', NULL, NULL, NULL, NULL, '2014-11-02', '', '', 'pending', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 08:14:20', 1, 23),
(137, 'Core', 'CR', 'CPU', 'CR', 53, 'CPU-CR-53', NULL, 'ANURA KUMARA', 'CPU', NULL, '03/21/2014', '2014-03-21', 'Change the address of cheque return adcice\r\n', '03/21/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(138, 'Core', 'CR', 'CPU', 'CR', 54, 'CPU-CR-54', NULL, 'ANURA KUMARA', 'CPU', NULL, '03/12/2014', '2014-03-21', 'transaction need to automate with inward clearing process for the value of cbsl file total\r\n', '03/21/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(139, 'Core', 'BRD', 'CPU', 'BRD', 2, 'CPU-BRD-2', NULL, 'SAHAN DELDUWA', 'CPU', NULL, '07/31/2012', '2013-08-26', 'Allow Pay Orders to Encash/Cancell subsequent to validity period expiration\r\n', '08/26/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '29-Oct-14 - already reported under KRI\r\n14-Nov-2014 - Solution for above subject BRD have been already implemented in production system under the reference CPU-CR-49.1. Hence no need to keep the request  CPU-BRD-02 in open status and it will be moved to closed status.', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '2014-11-14', '3', 'YES', 'N/A', 'Close', NULL, NULL, NULL, '2014-11-14 08:26:37', 1, 23),
(140, 'Core', 'RR', 'CPU', 'RR', 16, 'CPU-RR-16', NULL, 'MALIKA JAYASINGHE', 'CPU', NULL, '07/25/2013', '2013-07-26', 'Recovery details of Early settled Arrangements in AA Module (Category 3120,3130,3170)\r\n', '07/26/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Hold', NULL, NULL, NULL, '2014-11-14 07:13:01', 1, 25),
(141, 'Core', 'RR', 'CPU', 'RR', 12, 'CPU-RR-12', NULL, 'CHATHURA ILLANGAKOON', 'CPU', NULL, '10/03/2012', '2012-10-04', 'Print account level address on CRN advice\r\n', '10/04/2012', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(142, 'Core', 'RR', 'CPU', 'RR', 1, 'CPU-RR-1', NULL, 'CHATHURA ILLANGAKOON', 'CPU', NULL, '01/22/2012', '2013-08-26', 'Cheque Detail Analysis Report\r\n', '08/26/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(143, 'Core', 'CR', 'RETAIL', 'CR', 16, 'RETAIL-CR-16', NULL, 'KAMALJITH THAMBAWITA', 'RETAIL', NULL, '01/14/2013', '2014-07-15', 'Pawning Requirements\r\n', '07/15/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(144, 'Core', 'CR', 'CARDS', 'CR', 9, 'CARDS-CR-9', NULL, 'SHIHAN HILALDEEN', 'CARDS', NULL, '11/15/2013', '2013-11-15', 'Product List Update for Account Opening Requests\r\n', '11/15/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(145, 'Core', 'CR', 'TBO', 'CR', 33, 'TBO-CR-33', NULL, 'ROSHINI SAMARAKOON', 'TBO', NULL, '11/26/2014', '2014-10-26', 'USD BOUND ISSUANCE', '10/26/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(146, 'Core', 'CR', 'CPU', 'CR', 51, 'CPU-CR-51', NULL, 'SHALINDA PERERA', 'CPU', NULL, '08/22/2014', '2014-08-22', 'Non-Account Holders Dues payments for housing loans\r\n', '08/22/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '30-10-2014 Temenos proposed solution is not accepted. Hence revert back to Soma', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Inprogress', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(147, 'Core', 'CR', 'CPU', 'CR', 79, 'CPU-CR-79', NULL, 'MALIKA JAYASINGHE', 'CPU', NULL, '04/08/2014', '2014-08-06', 'Posting Restriction for override message appearing as "Under Leagel Action- Con.AF Unit"\r\n', '08/06/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'send for FLS to check for feasibility\r\n## Temenos sumbited date need to update by Priyanka\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending Temonos', '1_CPU-CR-79.pdf', NULL, NULL, '2014-11-14 08:42:21', 1, 36),
(148, 'NonCore', 'CR', 'NC', 'CR', 11, 'NC-CR-11', NULL, 'DILHANI PIYASENA', 'NC', NULL, '11/18/2013', NULL, 'Rename the queue "Low Priority Jobs" as "Not Possible"\r\n', '11/18/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'close', NULL, NULL, NULL, '2014-11-14 07:06:38', 0, 1),
(149, 'Core', 'RR', 'RETAIL', 'RR', 28, 'RETAIL-RR-28', NULL, 'ASELA GUNAWARDENA', 'RETAIL', NULL, '02/20/2014', '2014-05-14', 'CID''s Mailling Address\r\n', '05/14/2014', NULL, NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'CID''s Mailling Address\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(150, 'Core', 'CR', 'CM', 'CR', 26, 'CM-CR-26', NULL, 'BODHI GAMAGE', 'CM', NULL, '10/03/2014', '2014-10-03', 'MT940 Issues - EAP Group\r\n', '10/03/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '27-Oct-14 - send for effort estimation\r\nTo be assigned to FLS', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Inprogress', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(151, 'Core', 'CR', 'CPU', 'CR', 76, 'CPU-CR-76', NULL, 'IDUNIIL RAJANTHA', 'CPU', NULL, '07/28/2014', '2014-07-31', 'NBO-STO PAY ORDER - pay order gl modification\r\n', '07/31/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Nishantha''s approval pending', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Inprogress', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(152, 'Core', 'RR', 'RETAIL', 'RR', 37, 'RETAIL-RR-37', NULL, 'GANGA WANIGARATHNE', 'RETAIL', NULL, '06/05/2014', '2014-06-09', 'Branch wise commission / Charges reversed Report', '06/09/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'to be further disscussed with Nishanatha\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Development', NULL, NULL, NULL, '2014-11-14 10:38:23', 1, 23),
(157, 'Core', 'RR', 'TBO', 'RR', 17, 'TBO-RR-17', NULL, 'ROSHINI SAMARAKOON', 'TBO', NULL, '09/11/2014', '2014-10-01', 'Customer FX Liquidations\r\n', '10/01/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'STAGING', NULL, NULL, NULL, 'Inprogress', 'N/A', '31-Oct-14- Pending Development\r\n11-Nov-14 Assigned to Priyanka for Testing', 'Gayan', '11/11/2014', NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Support Team Testing', NULL, NULL, NULL, '2014-11-14 07:13:01', 1, 37),
(158, 'Core', 'CR', 'CPU', 'CR', 75, 'CPU-CR-75', NULL, 'BHAWANI', 'CPU', NULL, '10/22/2014', '2014-10-03', 'Correct Debit advice format should be generated for E-window transaction and auto printed once it is authorized\r\n', '10/03/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"03-Oct-14- send to development team effert estimation\r\n17-Oct-14 - Send for nishantha approval\r\n24-Oct-14 - send to CFO''s approvel\r\n30-Oct-14 - send for cost approval\r\n30-Oct-14 - send to development"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Development', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(159, 'NonCore', 'CR', 'NC', 'CR', 10, 'NC-CR-10', NULL, 'SITHUM', 'NC', NULL, '07/02/2014', '2014-07-07', 'Value date extention CMS\r\n', '07/07/2014', NULL, NULL, 'Low', NULL, '2014-08-15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"Original request sent to Oprisk on 25-Aug-14\r\n09-Oct-14 - submitted for effort approval from the user\r\n17-Oct-17 - send to development team"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Development', NULL, NULL, NULL, '2014-11-14 08:16:16', 1, 1),
(160, 'Core', 'CR', 'RETAIL', 'CR', 46, 'RETAIL-CR-46', NULL, 'ASELA GUNAWARDENA', 'RETAIL', NULL, '10/31/2014', '2014-10-31', 'Gl accounts for Unclaimed Accounts\r\n', '10/31/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'In Progress\r\nAssigned to development\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Development', '1_RETAIL-CR-46.pdf', NULL, NULL, '2014-11-14 08:43:55', 1, 36),
(161, 'Core', 'RR', 'RETAIL', 'RR', 38, 'RETAIL-RR-38', NULL, 'GANGA WANIGARATHNE', 'RETAIL', NULL, '10/20/2014', '2014-10-31', 'Visa Expired Customer Details\r\n', '10/31/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Assigned to development team\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Development', '1_1414757039.pdf', NULL, NULL, '2014-11-14 07:08:14', 1, 37),
(162, 'Core', 'CR', 'RETAIL', 'CR', 47, 'RETAIL-CR-47', NULL, 'ASELA GUNAWARDENA', 'RETAIL', NULL, '10/31/2014', '2014-10-31', 'Abandoned Property-Minus Balance\r\n', '10/31/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Assigned to Development team\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Development', '1_RETAIL-CR-47.pdf', NULL, NULL, '2014-11-14 08:44:13', 1, 36),
(163, 'Core', 'CR', 'CPU', 'CR', 78, 'CPU-CR-78', NULL, 'ANURA KUMARA', 'CPU', NULL, '10/09/2014', '2014-10-13', 'Transaction Report - ENR Changes Automation\r\n', '10/13/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '27-Oct-14 - send for effort estimation\r\n03/11/2014 - Informed Indika to raise with Temenos', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending Temonos', '1_CPU-CR-78.pdf', NULL, NULL, '2014-11-14 08:41:41', 1, 36),
(164, 'Core', 'CR', 'CPU', 'CR', 71, 'CPU-CR-71', NULL, 'BHAWANI SARAWANADHAVAN', 'CPU', NULL, '09/09/2014', '2014-09-24', 'Outward Remittances with MT103/Ourward Remittance with MT103 and MT202 advices issue', '09/24/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Incorrect advices being generated for outward remittances in T24', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Development', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(165, 'Core', 'CR', 'CPU', 'CR', 33, 'CPU-CR-33', NULL, 'VIRAJ WARNAKULA', 'CPU', NULL, '10/04/2013', '2013-10-07', 'Time out issue in SLIPS bulk file upload', '10/07/2013', NULL, NULL, 'High', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2014-11-03', NULL, NULL, NULL, NULL, '2014-10-31', NULL, 'N/A', 'Solution provided by Temenos and solution moved for QA testing on 03/11/2014', '', NULL, NULL, NULL, NULL, '2014-11-03', '', '', 'pending', NULL, NULL, NULL, NULL, 'N/A', 'QA Testing', NULL, NULL, NULL, '2014-11-14 08:22:21', 1, 37),
(166, 'Core', 'RR', 'CPU', 'RR', 26, 'CPU-RR-26', NULL, 'VIRAJ WARNAKULA', 'CPU', NULL, '10/16/2014', '2014-10-17', 'This is to identify unauthorized transactions generated during SLIPS bulk upload', '10/17/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'This is having a relationship with CPU-CR-33.', '', NULL, NULL, NULL, NULL, '2014-11-03', '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'QA Testing', '1_CPU-RR-26.pdf', NULL, NULL, '2014-11-14 08:43:27', 1, 36),
(167, 'Core', 'CR', 'REM', 'CR', 9, 'REM-CR-9', NULL, 'MANJEEVE ABEYSUNDERA', 'REM', NULL, '08/04/2014', '2014-08-05', 'Allow foreign currency accounts credits through remittance system', '08/05/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'To be submitted for Nishantha''s approval', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Inprogress', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(169, 'Core', 'CR', 'TBO', 'CR', 40, 'TBO-CR-40', NULL, 'INFAL SHAHEED', 'TBO', NULL, '07/31/2014', '2014-08-04', 'LKR Variable Transfer Pricing Rates issue', '08/04/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Reassigning to Development team to review', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Development', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(170, 'Core', 'CR', 'TBO', 'CR', 41, 'TBO-CR-41', NULL, 'INFAL SHAHEED', 'TBO', NULL, '10/01/2014', '2014-10-20', 'Modifications to Repo Transaction Advices ', '10/20/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Issue moved to CLOSED status', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Close', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(171, 'NonCore', 'CR', 'NC', 'CR', 2, 'NC-CR-2', NULL, 'ROSHAN ASBURY', 'NC', NULL, '03/10/2014', '2014-05-10', 'Collateral Details to apprear in CRIB\r\n', '05/10/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"Document handed over to Amila Kalu on 31-Jul-14. Cost approval pending from 06-Aug-14.\r\n21-Oct-14 - send to qa\r\n03-Nov-14 - Solution implemented in Live. Close the CR"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Close', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(172, 'Core', 'RR', 'FIN', 'RR', 23, 'FIN-RR-23', NULL, 'SACHINI RUWANTHIKA', 'FIN', NULL, '01/03/2014', '2014-01-03', 'Account Transaction Details\r\n', '01/03/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"Under SD approval 09-Jun-14. Under CFO Approval from 26-Jun-14. Approval received 01-Jul-14. As per user provided solution put in hold file 25-Aug-14.\r\n03-Oct-14 - send a reminder to schini to complete testing by 10th Oct\r\n09-Oct-14 - testing Completed. found bugs . send to the development team\r\n14-Oct-14 - Inform user to come for testing\r\n23-Oct-14 - Send to qa team"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Close', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(173, 'Core', 'RR', 'FIN', 'RR', 21, 'FIN-RR-21', NULL, 'IRANGA', 'FIN', NULL, '04/03/2014', '2014-04-03', 'Weekly interest Rate Return - Regularity Requirement\r\n', '04/03/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Under SD and CFO approval 04-Jun-14. Under CFO approval from 06-Jun-14. Approval received 13-Jun-14\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Close', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(184, 'Core', 'CR', 'RETAIL', 'CR', 48, 'RETAIL-CR-48', NULL, 'CHANAKA JAYASINGHE', 'RETAIL', NULL, '11/10/2014', '2014-11-11', 'ESTATEMENT - ADDING COUNT OF STATEMENT FILES TO HANDSHAKE FILE', '11/11/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, 'VICKUM', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(185, 'Core', 'CR', 'RETAIL', 'CR', 49, 'RETAIL-CR-49', NULL, 'CHANAKA JAYASINGHE', 'RETAIL', NULL, '11/10/2014', '2014-11-11', 'ESTATEMENT - INCLUSION OF CATEGORY CODE TO ACCOUNT CUSTOMER MAPPING FILE', '11/11/2014', NULL, NULL, 'Medium', '49', NULL, '2014-11-14', '2014-11-14', '2014-11-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '14-Nov-2014  AVP-IT Approved and submitted for Business approval.', 'Sujeewa Dissanayake', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Approval Pending', '1_RETAIL-CR-49.pdf', NULL, NULL, '2014-11-14 10:12:52', 1, 41),
(186, 'Core', 'CR', 'TRADE', 'CR', 25, 'TRADE-CR-25', NULL, 'Indika Liyanage', 'TRADE', NULL, '10/14/2013', '2013-10-14', 'Ewindow and Ewindow LC (Customer screen, Advising Through Bank,Field Lables, LC Types, Import LC Modifications)\r\n', '10/14/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'As AmilaK Dev to complete by 10/09/14-Held for Jisha Mandate\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Hold', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(187, 'Core', 'RR', 'TRADE', 'RR', 22, 'TRADE-RR-22', NULL, 'Lakshantha Silva', 'TRADE', NULL, '05/02/2014', '2014-02-05', 'As per SLFRS accounting fees should be amortized over period instead of recognicing to income statement upfront.  As per development team, this development hold on 09-Jun-14 ', '02/05/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '5/06/14 Informed Sudeepa abt HOLD', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Hold', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(188, 'Core', 'BRD', 'CM', 'BRD', 12, 'CM-BRD-12', NULL, 'Bodhi Gamage', 'CM', NULL, '05/14/2013', '2013-05-14', 'Separate Menu Options in Ewindow\r\n', '05/14/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"20-Oct-14 - assing to testing for support team\r\n23-Oct- 14- send to development team for fix issues"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Development', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(189, 'Core', 'CR', 'IT', 'CR', 12, 'IT-CR-12', NULL, 'Ravinda Bandara', 'IT', NULL, '06/19/2014', '2014-06-19', 'Credit Card GL Posting\r\n', '06/19/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'QA return the pack on 22-Aug-14', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(190, 'Core', 'CR', 'CM', 'CR', 16, 'CM-CR-16', NULL, 'Bodhi Gamage', 'CM', NULL, '07/29/2013', '2013-07-29', 'Ewindow pay orders beneficiary name field increase the length\r\n', '07/29/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"Documents handed over to Vikum on 15-Jul-14.\r\n22-Sep-14 Original Request handed over to development team once again\r\n22-Sep-14 Request rejected due to user lack of user requirement."\r\nVickum returned CR on 22/09/14\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Development', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(191, 'Core', 'BRD', 'CM', 'BRD', 4, 'CM-BRD-4', NULL, 'Bodhi Gamage', 'CM', NULL, '06/28/2012', '2012-06-28', 'Ewindow Advices\r\n', '06/28/2012', NULL, NULL, 'High', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"Development started by on site consultant Jisa\r\n30-Oct-14- on hold untill mandate , print option, separate menu goes to live"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(193, 'Core', 'BRD', 'RETAIL', 'BRD', 13, 'RETAIL-BRD-13', NULL, 'Dilhani', 'RETAIL', NULL, '07/24/2014', '2014-07-24', 'eStatement', '07/24/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Original Document of the requirement handed over to Amila Gamage on 05-Aug-14', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(194, 'Core', 'BRD', 'CPU', 'BRD', 15, 'CPU-BRD-15', NULL, 'H K Vikum', 'CPU', NULL, '09/02/2014', '2014-09-17', 'Cheque Book Issue Outsource', '09/17/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '24-Sep-14 - Under Date Estimation in Development Team.\r\n25-Sep-14 - Cost estimations send and received.\r\n26-Sep-14 - Under SD approval\r\n03-Oct-14 - CFO approvel recived send to development team\r\n26-Sep-14 - Under CFO approval', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(197, 'Core', 'RR', 'TRADE', 'RR', 23, 'TRADE-RR-23', NULL, 'Upul Fernando', 'TRADE', NULL, '09/01/2014', '2014-09-04', 'Amortization of Guarantee Commission', '09/04/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '03-Oct-14 - Return to development team to discuss with Nishantha', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(198, 'Core', 'BRD', 'FIN', 'BRD', 5, 'FIN-BRD-5', NULL, 'Mihiri De Mel', 'FIN', NULL, '01/16/2014', '2014-01-17', 'Un-earned Income (Auto Lease and Higher Purchase)\r\n', '01/17/2014', NULL, NULL, 'High', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'HLE received from Temenos and under SD approval. 20-Mar-14 Under CFO approval. Original request document handed over to Kasun on 16-Sep-14.\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending Temonos', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(200, 'NonCore', 'CR', 'SME', 'CR', 10, 'SME-CR-10', NULL, 'Sithum', 'SME', NULL, '07/02/2014', '2014-07-07', 'Value date extention CMS', '07/07/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Original request sent to Oprisk on 25-Aug-14\r\n09-Oct-14 - submitted for effort approval from the user\r\n17-Oct-17 - send to development team', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(201, 'Core', 'CR', 'CM', 'CR', 17, 'CM-CR-17', NULL, 'Bodhi Gamage', 'CM', NULL, '09/18/2013', '2013-10-03', 'Enhancements to existingTT option\r\n', '10/03/2013', NULL, NULL, 'Medium', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Dropped Status changed to Pending from 16-Apr-14\r\nRequested CR dropped due to incomplete of the requirement and handed over to Bodhi on 27-dec-13. Dropped Status changed to Pending from 16-Apr-14\r\n\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Hold', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(204, 'Core', 'CR', 'CM', 'CR', 14, 'CM-CR-14', NULL, 'Bodhi Gamage', 'CM', NULL, '03/07/2014', '2014-03-07', 'User suspension and Reactivating enable to T24\r\n', '03/07/2014', NULL, NULL, 'High', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Under Cost Approval 13-Mar-14. Under CFO approval from 25-Apr-14\r\nBRP not approved 11/07/14, held until provided in 4tress new version 25/07/14\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Hold', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(205, 'Core', 'CR', 'RETAIL', 'CR', 35, 'RETAIL-CR-35', NULL, 'Prabath Somasekera', 'RETAIL', NULL, '03/19/2014', '2014-03-20', 'Primary and Joint holders NIC numbers to be printed in passbook front page\r\n', '03/20/2014', NULL, NULL, 'High', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Under CFO Approval from 25-Apr-14. QA rejected on 30-Apr-14\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending Temonos', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(206, 'Core', 'CR', 'IT', 'CR', 11, 'IT-CR-11', NULL, 'Ravinda Bandara', 'IT', NULL, '05/05/2014', '2014-05-12', 'LD Debit Advice fix', '05/12/2014', NULL, NULL, 'High', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Trade nt agreed for solution. Need to reduce 2 to 1 04/08/14', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Hold', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(207, 'Core', 'RR', 'CPU', 'RR', 12, 'CPU-RR-12', NULL, 'Chathura Illangakoon', 'CPU', NULL, '10/03/2012', '2012-10-04', 'Print account level address on CRN advice\r\n', '10/04/2012', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(208, 'Core', 'RR', 'CPU', 'RR', 1, 'CPU-RR-1', NULL, 'Chathura Illangakoon', 'CPU', NULL, '01/22/2012', '2012-08-22', 'Cheque Detail Analysis Report\r\n', '08/22/2012', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(209, 'Core', 'RR', 'RETAIL', 'RR', 22, 'RETAIL-RR-22', NULL, 'Asela Gunawardena', 'RETAIL', NULL, '10/30/2013', '2013-10-30', 'Report on Foreign Currency Daily Transactions \r\n', '10/30/2013', '2014-10-16', NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"As per mail sent by AVP IT on 30-Jan-14, requirement has to re send with relevant authorities signatures\r\n03-Oct-14 - send to development team to procced development\r\n17-Oct-14 - work around suggest by the development team"\r\n14-Nov-2014 - Issues reported on the provided data set. Resubmitting to development team to analyze again.\r\n', 'Ravindra Basnayake', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Development', NULL, NULL, NULL, '2014-11-14 10:09:03', 1, 23),
(210, 'Core', 'CR', 'CPU', 'CR', 61, 'CPU-CR-61', NULL, 'HK Vikum', 'CPU', NULL, '05/20/2014', '2014-05-22', 'Manual SWEEP execution to automate\r\n', '05/22/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Under cost approval from 09-Jun-14.Under CFO Approval from 26-Jun-14. Approval received 01-Jul-14\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(211, 'Core', 'CR', 'CPU', 'CR', 65, 'CPU-CR-65', NULL, 'Bhawani ', 'CPU', NULL, '06/25/2014', '2014-07-02', '"Option required to define charges with minimum and maximum amounts for Special Customers on Commission types used for Outward Remittance\r\n"\r\n', '07/02/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"Request Document handed over to Basnayake to review the request on 30-Jul-14\r\n03-Oct-14 - Handover to FLS to check the feasibility "\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', '1_CPU-CR-65.pdf', NULL, NULL, '2014-11-14 08:40:50', 1, 36),
(212, 'Core', 'BRD', 'CPU', 'BRD', 16, 'CPU-BRD-16', NULL, 'H K Vikum', 'CPU', NULL, '09/15/2014', '2014-09-17', 'Sweep Facility\r\n', '09/17/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '30-Oct-14- Identify the issues , report to the fls. Agreet to return on before november 24\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(213, 'Core', 'CR', 'CARDS', 'CR', 24, 'CARDS-CR-24', NULL, 'Sashika Kaushalya', 'CARDS', NULL, '09/11/2014', '2014-09-11', 'SMS alert module of CMS\r\n', '09/11/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"Original request document with Ravinda Bandara for feasibility checking\r\n02-Oct-14 - send to sashika for get line up approval\r\n09-Oct-14 - assing to Ravinda Bandara for implementation"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', '1_CARDS-CR-24.pdf', NULL, NULL, '2014-11-14 08:35:14', 1, 36),
(214, 'Core', 'CR', 'TRADE', 'CR', 38, 'TRADE-CR-38', NULL, 'Upul Fernando', 'TRADE', NULL, '06/06/2014', '2014-06-13', 'As per CBSL guide line system shouid be changed to recover additional interest if repayment effected after CBSL due date\r\n', '06/13/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"03-Oct-14 - send to FLS to check the possibility\r\n26-Oct-14 - need to submit for temornors\r\n"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', '1_TRADE-CR-38.pdf', NULL, NULL, '2014-11-14 08:44:46', 1, 36),
(216, 'Core', 'CR', 'CARDS', 'CR', 23, 'CARDS-CR-23', NULL, 'Nirmanaka Karunarathna', 'CARDS', NULL, '07/03/2014', '2014-07-08', 'Common ATM switch balance inquiry charge\r\n', '07/08/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"Under SD approval from 14-Aug-14\r\n03-Oct-14 - resubmiting for Sujeewa\r\n30-Oct-14 - development with temones"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(217, 'Core', 'RR', 'FIN', 'RR', 27, 'FIN-RR-27', NULL, 'Lakshantha Silva', 'FIN', NULL, '07/09/2014', '2014-07-09', 'To improve completeness of the transaction report generated in core banking system\r\n', '07/09/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"26-08-2014 handed over to Indika to submit to Temenos\r\n10/09/2014 - CR gave to Saumya to do the BRP and complete development"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 08:41:47', 1, 36),
(218, 'Core', 'BRD', 'FIN', 'BRD', 7, 'FIN-BRD-7', NULL, 'Duminda Nishshanka', 'FIN', NULL, '08/27/2014', '2014-08-28', 'RAM and CRESS - Impairment Data extraction for CRISIL\r\n', '08/28/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"29-08-2014 Submitted for CFO approval\r\n30-Oct-14 - Assing to girish"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(219, 'Core', 'CR', 'REM', 'CR', 8, 'REM-CR-8', NULL, 'Manjeeve', 'REM', NULL, '08/25/2014', '2014-08-26', 'Remove FT generated by the system for NDB Account Credits\r\n', '08/26/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"Under NH Approval from 17-Sep-14.\r\nUnder Cost approval from 19-Sep-14\r\nUnder CFO approval from 25-Sep-14\r\n03-Oct-14 CFO approval recived send to development team"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(220, 'Core', 'CR', 'IB', 'CR', 11, 'IB-CR-11', NULL, 'Dilhan', 'IB', NULL, '09/12/2014', '2014-09-25', 'Transaction Report Mudarama Deposits\r\n', '09/25/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(221, 'Core', 'CR', 'CPU', 'CR', 72, 'CPU-CR-72', NULL, 'Uresh Gunarathna', 'CPU', NULL, '08/15/2014', '2014-08-15', 'Privilage customer cheque book issue in charges\r\n', '08/15/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '03-Aug-14 - Since this module is not going to be used after implimenting CPU-BRD-15 hense reject the request\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(222, 'Core', 'CR', 'RETAIL', 'CR', 44, 'RETAIL-CR-44', NULL, 'Asela Gunawardena', 'RETAIL', NULL, '01/20/2014', '2014-01-23', 'modification to CID creation screen\r\n', '01/23/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"03-Oct-14 - send to development team effert estimation\r\n17-Oct-14 - Send for nishantha approval\r\n20-Oct-14 - Send for sujeewa approval"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37);
INSERT INTO `ndb_doc` (`d_id`, `cor_non`, `cr_brd`, `ref1`, `ref2`, `ref3`, `reffull`, `reference`, `requester`, `unit`, `contact_p`, `date_sub`, `testdate`, `description`, `date_reciv_it`, `smrc_date`, `smrc_status`, `priority`, `COST`, `date_develop`, `AVPIT`, `VPIT`, `COST_DATE`, `CFO_DATE`, `BRP`, `DEV_HAND`, `PACK_DATE`, `DEV_TESTER`, `TEST_ENV`, `TEST_MEM`, `TEST_C_NO`, `TEST_COM_DATE`, `TEST_STAT`, `date_temo`, `remarks`, `assing_to`, `ded_line`, `USER_ASS`, `develop_r_date`, `document_complet`, `date_hand_qa`, `QA_REF_N`, `QA_TEST_N`, `QA_STATUS`, `qa_complete`, `date_back_it`, `D_FIX_BY`, `USER_Not`, `release_date`, `status`, `scan_doc1`, `scan_doc2`, `scan_doc3`, `update_on`, `d_visible`, `edited_by`) VALUES
(223, 'Core', 'CR', 'CARDS', 'CR', 26, 'CARDS-CR-26', NULL, 'Geethendri Gunawardena', 'CARDS', NULL, '07/25/2014', '2014-07-28', 'Account balance to be shown in supense doment and close accounts in bulk uplod inquriy\r\n', '07/28/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"03-Oct-14 - send to development team effert estimation\r\n07-Oct-14 -Informed to user comme and discuss the requerment with bassnayaka\r\n16-Oct-14- Scince User didn''t respont in time issu closed"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(224, 'Core', 'CR', 'COM', 'CR', 1, 'COM-CR-1', NULL, 'Mihiri Dias', 'COM', NULL, '05/19/2014', '2014-06-09', 'A drop down list contain the following values to be added to the source of welth\r\n', '06/09/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"03-Oct-14 - send to development team effert estimation\r\n07-Oct-14 - Send to user for more approvels\r\n27-Oct-14 - Send for CFO approvel"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(225, 'Core', 'CR', 'COM', 'CR', 2, 'COM-CR-2', NULL, 'Mihiri Dias', 'COM', NULL, '06/04/2014', '2014-06-05', 'A field to be added under the other details tab titled "Principle nature of activity in case of a business account"\r\n', '06/05/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '"03-Oct-14 - send to development team effert estimation\r\n07-Oct-14 - Send to user for more approvels\r\n27-Oct-14 - Send for CFO approvel"\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(226, 'Core', 'CR', 'COM', 'CR', 3, 'COM-CR-3', NULL, 'Mihiri Dias', 'COM', NULL, '09/23/2014', '2014-10-03', 'Additional fields required for Data cleansing project and AML system at accout level-FD Accounts\r\n', '10/03/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '27-Oct-14 - Send for CFO approvel\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', '1_COM-CR-3.pdf', NULL, NULL, '2014-11-14 08:38:57', 1, 36),
(227, 'Core', 'CR', 'CARDS', 'CR', 13, 'CARDS-CR-13', NULL, 'Shihan Hilaldeen', 'CARDS', NULL, '12/04/2013', '2013-12-05', 'Notice on NBO\r\n', '12/05/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'N/A\r\n12-Nov-14 - Document Not Found', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(228, 'Core', 'BRD', 'CM', 'BRD', 18, 'CM-BRD-18', NULL, 'Bodhi Gamage', 'CM', NULL, '07/29/2013', '2013-07-29', 'Dividand Module', '07/29/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '12-Nov-14 - Document Not Found\r\n14-Nov-14 - Requested user to sumbit RFP which is under procument committee approval.Item closed from CR BRD list as this is belongs to new system development.\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Close', NULL, NULL, NULL, '2014-11-14 07:13:01', 1, 25),
(229, 'Core', 'CR', 'CPU', 'CR', 45, 'CPU-CR-45', NULL, 'Sahani Ratnayake', 'CPU', NULL, '12/04/2013', '2013-12-10', 'OD/LC/Gtee Processing and Renewal Charges\r\n', '12/10/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '12-Nov-14 - Document Not Found', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(230, 'Core', 'CR', 'FIN', 'CR', 12, 'FIN-CR-12', NULL, 'Lakshantha Silva', 'FIN', NULL, '10/04/2013', '2013-10-07', 'Automatic download GL reports to GX Reporter\r\n', '10/07/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Requirement returned to User on 27-Dec-13', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Rejected', NULL, NULL, NULL, '2014-11-14 07:13:01', 1, 25),
(231, 'Core', 'CR', 'CPU', 'CR', 47, 'CPU-CR-47', NULL, 'Amitha Hettiarchchi', 'CPU', NULL, '12/19/2013', '2013-12-20', 'Attach OD Collect Limit Charges option toOD Credit Limit\r\n', '12/20/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Returned to User on 02-Jan-14\r\n12-Nov-14 - Document Not Found', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(232, 'Core', 'RR', 'CARDS', 'RR', 6, 'CARDS-RR-6', NULL, 'Shabbir Raheem', 'CARDS', NULL, '03/25/2014', '2014-03-27', 'Manage/Monitor NDB Online Banking Product and evaluate performance\r\n', '03/27/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(233, 'Core', 'CR', 'TRADE', 'CR', 34, 'TRADE-CR-34', NULL, 'Upul Fernando', 'TRADE', NULL, '02/13/2014', '2014-02-13', 'Whole DR module waive charges modification\r\n', '02/13/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Document handed over to Nilesh on 10-Mar-14. Under Budjet Approval from 19-Mar-14\r\n12-Nov-14 - Document Not Found', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(234, 'Core', 'RR', 'TRADE', 'RR', 20, 'TRADE-RR-20', NULL, 'Upul Fernando', 'TRADE', NULL, '02/12/2014', '2014-02-13', 'Generate report to extract the loans extended on a given period as per Central Bank Requirement\r\n', '02/13/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Clarification expected from Upul to proceed further\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(235, 'Core', 'CR', 'TRADE', 'CR', 35, 'TRADE-CR-35', NULL, 'Upul Fernando', 'TRADE', NULL, '02/13/2014', '2014-02-13', 'Whole LC module waive charges modification\r\n', '02/13/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Document handed over to Nilesh on 10-Mar-14. Under Budjet Approval from 19-Mar-14\r\n12-Nov-14 - Document Not Found', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(236, 'Core', 'BRD', 'CM', 'BRD', 19, 'CM-BRD-19', NULL, 'Bodhi Gamage', 'CM', NULL, '03/07/2014', '2014-03-07', 'Required to capture all information available in the system generated bank statement to PDF format\r\n', '03/07/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Under Approval of SD as at 13-Mar-14\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(237, 'Core', 'BRD', 'CM', 'BRD', 13, 'CM-BRD-13', NULL, 'Bodhi Gamage', 'CM', NULL, '07/29/2013', '2013-07-29', 'Online Payment System for EPF with Central Bank Of Sri Lanka\r\n14-Nov-2014 This is a new system and not related to Core system. Original user requirement document with Priyantha Kumara', '07/29/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Online Payment System for EPF with Central Bank Of Sri Lanka\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Close', NULL, NULL, NULL, '2014-11-14 07:03:24', 1, 25),
(238, 'Core', 'CR', 'TRADE', 'CR', 33, 'TRADE-CR-33', NULL, 'Upul Fernando', 'TRADE', NULL, '02/13/2014', '2014-02-13', 'Debit advices generate even though account not debited\r\n', '02/13/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Document handed over to Nilesh on 10-Mar-14\r\n', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(239, 'NonCore', 'CR', 'NC', 'CR', 3, 'NC-CR-3', NULL, 'Upendra', 'NC', NULL, '03/20/2014', '2014-03-20', 'Capturing IB products in segmental profitability\r\n', '03/20/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', NULL, '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Close', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(240, 'NonCore', 'CR', 'NC', 'CR', 1, 'NC-CR-1', NULL, 'Nimesha Tissera', 'NC', NULL, '12/04/2013', '2013-12-04', 'Inventory System & Gate Pass Changes\r\n', '12/04/2013', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '13-Nov-14 - Documnet not found', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(241, 'NonCore', 'BRD', 'FIN', 'BRD', 8, 'FIN-BRD-8', NULL, 'Chandana Guniyangoda', 'FIN', NULL, '01/02/2014', '2014-01-02', 'Finance strategic Planning & Business Support\r\n', '01/02/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '13-Nov-14 - Document Not Found', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(242, 'NonCore', 'CR', 'NC', 'CR', 6, 'NC-CR-6', NULL, 'Bodhi Gamage', 'NC', NULL, '05/13/2014', '2014-05-13', 'AIA Web Service extend response time\r\n', '05/13/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4', NULL, NULL, NULL, 'N/A', 'Under approval process from 21-May-14. Request handed over to Priyantha 04-Jun-14\r\n13-Nov-14 - Document Not Found\r\n13-Nov-14 - Discussed with Priyantha and user. This issue is no more exist. Hence moving to Closed statu.Document Not Found.', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, '4', 'NO', 'N/A', 'Close', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(243, 'Core', 'BRD', 'NC', 'BRD', 7, 'NC-BRD-7', NULL, 'Thilini', 'NC', NULL, '05/16/2014', '2014-05-22', 'NDB Travel Pal-Travel Card\r\n', '05/22/2014', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'Under SD and CFO approval 04-Jun-14. Approval received on 18-Jun-14\r\n13-Nov-14 - Document Not Found', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 07:06:38', 1, 37),
(244, 'Core', 'RR', 'CARDS', 'RR', 7, 'CARDS-RR-7', NULL, 'test', 'CARDS', NULL, '11/27/2014', '2014-11-12', 'test', 'N/A', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'test', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 09:37:23', 0, 37),
(245, 'Core', 'BRD', 'CM', 'BRD', 20, 'CM-BRD-20', NULL, 'test', 'CM', NULL, '11/20/2014', '2014-11-18', 'test', 'N/A', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'test', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 09:39:23', 1, 37),
(246, 'Core', 'CR', 'CPU', 'CR', 80, 'CPU-CR-80', NULL, 'CHALINGA DE SILVA', 'CPU', NULL, '06/03/2014', '2014-06-04', 'AUTOMATIC CANCELLATION OF STANDING ORDERS', 'N/A', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '14-Nov-2014 - Procurement Committee approval pending on cost. Reminder sent to Chalinga by Indika.', 'VICKUM', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Approval Pending', NULL, NULL, NULL, '2014-11-14 10:30:08', 1, 23),
(247, 'Core', 'BRD', 'CPU', 'BRD', 17, 'CPU-BRD-17', NULL, 'test', 'CPU', NULL, '11/12/2014', '2014-11-19', 'test', 'N/A', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', 'test', '', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Pending', NULL, NULL, NULL, '2014-11-14 09:44:22', 1, 37),
(248, 'Core', 'CR', 'CPU', 'CR', 81, 'CPU-CR-81', NULL, 'DESHAN BASTIAMPILLAI', 'CPU', NULL, '06/04/2014', '2014-06-04', 'DORMANT ACCOUNTS WITH LOW BALANCES', 'N/A', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '14-Nov-2014 - Procurement Committee approval pending on cost. Reminder sent to Chalinga by Indika.', 'VICKUM', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Approval Pending', NULL, NULL, NULL, '2014-11-14 10:31:10', 1, 23),
(249, 'Core', 'CR', 'CPU', 'CR', 82, 'CPU-CR-82', NULL, 'DESHAN BASTIAMPILLAI', 'CPU', NULL, '06/04/2014', '2014-06-04', 'AUTO GENERATED LETTER/INTEREST RATE CHANGE FOR MINOR TO MAJOR CONVERSION', 'N/A', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '14-Nov-2014 - Procurement Committee approval pending on cost. Reminder sent to Chalinga by Indika.', 'VICKUM', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Approval Pending', NULL, NULL, NULL, '2014-11-14 10:33:44', 1, 23),
(250, 'Core', 'CR', 'RETAIL', 'CR', 50, 'RETAIL-CR-50', NULL, 'SARANGI FERNANDO', 'RETAIL', NULL, '11/15/2013', '2013-11-18', 'HL & DML LOAN DISBURSEMENTS WITH CONTACT NUMBERS', 'N/A', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '14-Nov-2014 Request rejected and informed user to raise a report request to alter existing report.', 'VICKUM', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, '2013-09-18', NULL, 'YES', 'N/A', 'Rejected', NULL, NULL, NULL, '2014-11-14 10:22:56', 1, 23),
(251, 'Core', 'BRD', 'RETAIL', 'BRD', 16, 'RETAIL-BRD-16', NULL, 'K V KUGANATHAN', 'RETAIL', NULL, '11/05/2014', '2014-11-07', 'LANKAPAY COMMON EFT SWITCH (CEFTS)', 'N/A', NULL, NULL, 'Low', NULL, NULL, NULL, NULL, '2014-11-14', '2014-11-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N/A', '14-Nov-2014 Sent to CFO approvl on BRD', 'Priyantha Kumara', NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, 'N/A', 'Approval Pending', NULL, NULL, NULL, '2014-11-14 10:52:45', 1, 41);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `ndb_users`
--

INSERT INTO `ndb_users` (`us_id`, `us_name`, `us_pass`, `us_level`, `us_salt`) VALUES
(1, 'test', '4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a', 1, NULL),
(23, 'tharanga_2066', 'af27ee55e4922a88bcbea4bf5f542b00efce859622b7aa0be802b90d62aadbb0e1e53ef5961815fbe3625575772873061c18158fe3135577ecd2c9afde97bbae', 1, 'MLoAOZkps9GjWDjlIUKjXw=='),
(25, 'priyanka_2360', '1b4f8465bc702020d9d89e387196d94440190785e5352be063aaac7a097cca05d89c64d7d3036867e2ca3a2016d7faa414861ade2676456eb92d7412ff9d5f24', 1, 'fUrPymi9HPAXevsRQUAC5Q=='),
(36, 'Madhawa_10809', 'e9bdbb7949f32e479b936e18982127e66c8a43c84bc2c5dec6d0aad1e95543d8abe418421261f8505a8c2a1e5832c6b6ccf9d121b2634268adacfd4ada37ba96', 3, 'd3kzIohXrfSa6PQOrqmlWA=='),
(37, 'Gayan_10811', 'b965973e33ec71535ae39951d660898d531302892142d7c192b09b81e3b940548a9db4a772577eb630370aff4ceedaec418d68cf35f8d3e8d87d2867944a5a00', 1, 'eg/90a8vl3fgF8PvrepjPA=='),
(38, 'ravindra_2321', 'c6398527a1bf9e5538d2385fb5356dc5775c818eff6639893a3f232bf6f62d3136794b595bdf23c8448c7a9038561c972ba03b816667e0129f2b52ca34b333e7', 1, 'n+hEgFbx1N4UWbz4GC+CtA=='),
(41, 'shakila_3227', '4c38ce560c968cfef73eb8b01bbc99ae014ea0fe13903828bb8409a3590a65aeeec855132f431d061fe44ad4dc48ef73ea99997d6303970848c20b39618c9ae5', 3, 'VgoSTAMQqk9esni7uN+1bQ=='),
(42, 'nishantha_557', 'c8ee854217990838fc866170f12e8bd17cf6779734ed8af5772a985c546d7dcdb1934ffdfc801aeda686fb19eb3e3c366ff1f9d8421445f1a2c49d7e5f0d697f', 4, 'FPtE5/w0eixxCeKMHwLLuA=='),
(43, 'ranga_1197', '653d292b23b80e78c2c80fbddb7fa8b34c8bfbcfd0bef2d8bd890cbf5bae8fa19247b288ff76b3be153343fb7a9da1cdba847fcf05900ed0cc42127fe47aaa1b', 4, 'V7EVNbKYBv3XhDMFL9XRIw=='),
(57, '2', 'acf9ed516fc6fdc5066c5075e393c67996b1b5bae3990e653d7453f92d218ea74053734ae185505ec070cc2e25075779f85890cfd06c591c7689369b0a8a93fe', 2, 'jG/nY/vuZwm4Fw9C1sWa3g=='),
(58, '3', '19adbf517ac3d0dfa03b990df1d7a1af8c8d282b591d4d1c40b9e385263997c25da344faec0320266bd9121400b538f57a07c46a536339659bc5b61a91da1108', 3, 'kstPeGOQ81ILOPq9XMRYXw=='),
(59, '4', '340ef24191527fba3c0d55eb51d3fc47267ff6353bb5b7e1ee704f635f7fb3fbd9e95ed49b326f6c320be7eda1b7417bcc9a2cec0a6a507a6b7b2083de6a6a7a', 4, 'pt0n3/IAJVmp5BQ8j4WwtA==');

-- --------------------------------------------------------

--
-- Table structure for table `qa_team`
--

CREATE TABLE IF NOT EXISTS `qa_team` (
  `qa_id` int(5) NOT NULL AUTO_INCREMENT,
  `qa_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`qa_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `qa_team`
--

INSERT INTO `qa_team` (`qa_id`, `qa_name`) VALUES
(1, NULL),
(3, 'THARANGA'),
(4, 'PRIYANATHA'),
(5, 'RUWANARA'),
(6, 'CHAMARA'),
(7, 'NILUSHA'),
(8, 'ASANKA'),
(9, 'SAUMYA'),
(10, 'DASITHA'),
(11, 'RANGA'),
(12, 'OSHADI'),
(13, 'KASUN'),
(14, 'AMALSHA'),
(15, 'PRASAD'),
(16, 'GAYAN'),
(17, 'MADHAWA');

-- --------------------------------------------------------

--
-- Table structure for table `real_qa_team`
--

CREATE TABLE IF NOT EXISTS `real_qa_team` (
  `rq_id` int(6) NOT NULL AUTO_INCREMENT,
  `rq_name` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`rq_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `real_qa_team`
--

INSERT INTO `real_qa_team` (`rq_id`, `rq_name`) VALUES
(1, 'gayan'),
(3, 'jayanath');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
