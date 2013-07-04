-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2013 at 07:09 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `veritas`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `desc` varchar(255) NOT NULL,
  `report_type` int(11) NOT NULL COMMENT '1=>activitylog, 2=>mobile inspection, 3=>mobile security, 4=>security occurance, 5=>Incident Report, 6=>Sign-off Sheet',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `document_id`, `time`, `date`, `desc`, `report_type`) VALUES
(1, 9, '23:48:00', '2013-06-19', 'adjflakdjfadk j', 1),
(2, 10, '00:33:00', '2013-06-20', 'adjhfkajdf akjfh ajdf h', 4),
(3, 19, '23:41:00', '2013-06-26', 'adfadfa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `canuploads`
--

CREATE TABLE IF NOT EXISTS `canuploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `contracts` int(11) NOT NULL,
  `evidence` int(11) NOT NULL,
  `templates` int(11) NOT NULL,
  `report` int(11) NOT NULL,
  `client_feedback` int(11) NOT NULL,
  `siteOrder` int(11) NOT NULL,
  `training` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `KPIAudits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `canuploads`
--

INSERT INTO `canuploads` (`id`, `member_id`, `contracts`, `evidence`, `templates`, `report`, `client_feedback`, `siteOrder`, `training`, `employee`, `KPIAudits`) VALUES
(1, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0),
(7, 5, 0, 0, 0, 0, 0, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `canviews`
--

CREATE TABLE IF NOT EXISTS `canviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `contracts` int(11) NOT NULL,
  `evidence` int(11) NOT NULL,
  `templates` int(11) NOT NULL,
  `report` int(11) NOT NULL,
  `siteOrder` int(11) NOT NULL,
  `training` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `KPIAudits` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `canviews`
--

INSERT INTO `canviews` (`id`, `member_id`, `contracts`, `evidence`, `templates`, `report`, `siteOrder`, `training`, `employee`, `KPIAudits`) VALUES
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(10, 5, 0, 0, 0, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `clientmemos`
--

CREATE TABLE IF NOT EXISTS `clientmemos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `memo_type` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `clientmemos`
--


-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `no_of_worker` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `companies`
--


-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `doc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `document_id`, `doc`) VALUES
(1, 2, 'Contract__2013-06-07_18-55-01.txt'),
(2, 7, 'Contract_lakdjf_akd_2013-06-07_19-10-43.txt');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `evidence_type` varchar(255) NOT NULL,
  `training_type` varchar(255) NOT NULL,
  `site_type` varchar(255) NOT NULL,
  `employee_type` varchar(255) NOT NULL,
  `incident_date` varchar(255) NOT NULL,
  `client_feedback` longtext NOT NULL,
  `date` datetime NOT NULL,
  `addedBy` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `draft` int(11) NOT NULL DEFAULT '0' COMMENT '0=>non draft ,1=>is draft',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `location`, `title`, `description`, `document_type`, `evidence_type`, `training_type`, `site_type`, `employee_type`, `incident_date`, `client_feedback`, `date`, `addedBy`, `job_id`, `draft`) VALUES
(1, '', 'Contract', 'test description goes here', 'contract', '', '', '', '', '', '', '2013-06-26 16:46:53', 1, 1, 0),
(2, '', 'Evidence', '2/', 'evidence', '', '', '', '', '', '', '2013-06-07 18:55:01', 0, 1, 0),
(3, '', 'Contract', 'djfhajdfh akdjf hkaj', 'contract', '', '', '', '', '', '', '2013-06-07 19:05:34', 0, 1, 0),
(4, '', 'Test', 'djfhajdfh akdjf hkaj', 'test', '', '', '', '', '', '', '2013-06-07 19:07:05', 0, 1, 0),
(5, '', 'Contract', 'lakdjf akdjf', 'contract', '', '', '', '', '', '', '2013-06-07 19:08:54', 0, 1, 0),
(6, '', 'Contract', 'lakdjf akdjf', 'contract', '', '', '', '', '', '', '2013-06-07 19:10:28', 0, 1, 0),
(7, '', 'Contract', 'lakdjf akdjf', 'contract', '', '', '', '', '', '', '2013-06-07 19:10:43', 0, 1, 0),
(8, '', 'Contract', 'alkdfjlakdjfkdlfj alkdfj ', 'contract', '', '', '', '', '', '', '2013-06-10 19:07:55', 0, 1, 0),
(9, '', 'Report', 'ajdhf akjdfh akjdfh akjdfha kdjfh', 'report', '', '', '', '', '', '', '2013-06-19 18:39:18', 0, 1, 0),
(10, '', 'Report', 'dalsfkja fdkladj flakdjf alkdjf ', 'report', '', '', '', '', '', '', '2013-06-19 18:49:13', 0, 1, 0),
(11, '', 'Evidence', 'adkjf alkdjf alkdfj ', 'evidence', 'Incident Report', '', '', '', '2013-06-20', '', '2013-06-19 18:50:10', 0, 1, 0),
(12, '', 'Contract', 'jhghjgfhj', 'contract', '', '', '', '', '', '', '2013-06-19 20:43:30', 0, 1, 0),
(13, '', 'SiteOrder', 'asdasdasdasd', 'siteOrder', '', '', 'opertional_memos', '', '', '', '2013-06-21 08:04:58', 0, 1, 0),
(14, '', 'Employee', 'asdasd asdasd', 'employee', '', '', '', '', '', '', '2013-06-21 08:58:54', 0, 1, 0),
(15, '', 'Employee', 'jhkj', 'employee', '', '', '', '', '', '', '2013-06-21 09:04:31', 0, 1, 0),
(16, '', 'Employee', 'asdasdasd', 'employee', '', 'Health & Safety Manuals', 'Site Maps', 'Drug Free Policy', '', '', '2013-06-21 09:26:26', 0, 1, 0),
(17, '', 'KPIAudits', 'kkkkkkkkkk', 'KPIAudits', '', '', '', '', '', '', '2013-06-21 10:17:06', 5, 1, 0),
(18, '', 'Contract', 'adfadfadf', 'contract', '', '', '', '', '', '', '2013-06-26 16:39:35', 0, 1, 0),
(19, '', 'Report', 'adfadfad', 'report', '', '', '', '', '', '', '2013-06-26 18:00:12', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `emailuploads`
--

CREATE TABLE IF NOT EXISTS `emailuploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `siteOrder` int(11) NOT NULL,
  `training` int(11) NOT NULL,
  `employee` int(11) NOT NULL,
  `KPIAudits` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `contract` int(11) NOT NULL,
  `evidence` int(11) NOT NULL,
  `template` int(11) NOT NULL,
  `report` int(11) NOT NULL,
  `client_feedback` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `emailuploads`
--

INSERT INTO `emailuploads` (`id`, `siteOrder`, `training`, `employee`, `KPIAudits`, `member_id`, `contract`, `evidence`, `template`, `report`, `client_feedback`) VALUES
(3, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 4, 0, 0, 0, 0, 0),
(11, 0, 1, 1, 0, 1, 1, 1, 1, 1, 0),
(13, 0, 1, 0, 1, 5, 0, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event_logs`
--

CREATE TABLE IF NOT EXISTS `event_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `time` time NOT NULL,
  `member_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `event_logs`
--

INSERT INTO `event_logs` (`id`, `date`, `time`, `member_id`, `document_id`, `fullname`, `username`, `event_type`, `event`) VALUES
(1, '2013-06-05 00:00:00', '17:27:48', 0, 1, 'ADMIN(Admin1`)', 'admin@example.com', 'Upload Document', 'Upload contract'),
(2, '2013-06-05 00:00:00', '17:28:15', 0, 1, 'ADMIN(Admin1`)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(3, '2013-06-07 00:00:00', '17:53:20', -100, 0, '', 'info@trinoweb.com', 'User Login', 'Login Failed: Invalid Username or Password'),
(4, '2013-06-07 00:00:00', '17:53:26', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(5, '2013-06-07 00:00:00', '18:55:01', 0, 2, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload contract'),
(6, '2013-06-07 00:00:00', '19:10:43', 0, 7, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload contract'),
(7, '2013-06-07 00:00:00', '19:14:03', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(8, '2013-06-07 00:00:00', '20:12:30', 1, 1, 'Anwar Ali', 'justdoit2045@gmail.com', 'Document Viewed', 'Viewed Contract'),
(9, '2013-06-07 00:00:00', '20:17:28', 0, 1, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(10, '2013-06-07 00:00:00', '20:24:19', 0, 1, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(11, '2013-06-10 00:00:00', '19:07:55', 0, 8, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload contract'),
(12, '2013-06-13 00:00:00', '19:40:45', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(13, '2013-06-14 00:00:00', '13:37:28', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(14, '2013-06-14 00:00:00', '13:41:10', 0, 2, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(15, '2013-06-17 00:00:00', '13:43:23', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(16, '2013-06-17 00:00:00', '19:44:32', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(17, '2013-06-17 00:00:00', '19:46:42', -100, 0, '', 'ggg', 'User Login', 'Login Failed: Invalid Username or Password'),
(18, '2013-06-17 00:00:00', '19:47:08', 4, 0, 'aga', 'ads@adg.com', 'User Login', 'Login SuccessFull'),
(19, '2013-06-17 00:00:00', '19:51:18', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(20, '2013-06-18 00:00:00', '14:33:45', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(21, '2013-06-18 00:00:00', '15:02:05', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(22, '2013-06-18 00:00:00', '15:46:52', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(23, '2013-06-19 00:00:00', '13:54:51', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(24, '2013-06-19 00:00:00', '15:10:36', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(25, '2013-06-19 00:00:00', '16:49:13', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(26, '2013-06-19 00:00:00', '18:39:18', 0, 9, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload report'),
(27, '2013-06-19 00:00:00', '18:49:13', 0, 10, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload report'),
(28, '2013-06-19 00:00:00', '18:50:10', 0, 11, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload evidence'),
(29, '2013-06-19 00:00:00', '20:23:48', 0, 8, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(30, '2013-06-19 00:00:00', '20:23:53', 0, 8, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(31, '2013-06-19 00:00:00', '20:25:39', 0, 8, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(32, '2013-06-19 00:00:00', '20:25:45', 0, 8, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(33, '2013-06-19 00:00:00', '20:28:14', 0, 8, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(34, '2013-06-19 00:00:00', '20:28:22', 0, 8, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(35, '2013-06-19 00:00:00', '20:34:42', 0, 8, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(36, '2013-06-19 00:00:00', '20:34:48', 0, 8, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(37, '2013-06-19 00:00:00', '20:40:15', 0, 8, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(38, '2013-06-19 00:00:00', '20:40:18', 0, 8, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(39, '2013-06-19 00:00:00', '20:42:13', 0, 8, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(40, '2013-06-19 00:00:00', '20:43:30', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload contract'),
(41, '2013-06-19 00:00:00', '20:43:48', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(42, '2013-06-19 00:00:00', '20:43:51', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(43, '2013-06-19 00:00:00', '20:45:03', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(44, '2013-06-19 00:00:00', '20:46:29', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(45, '2013-06-19 00:00:00', '20:46:32', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(46, '2013-06-19 00:00:00', '20:50:02', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(47, '2013-06-19 00:00:00', '20:50:46', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(48, '2013-06-19 00:00:00', '20:50:47', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(49, '2013-06-19 00:00:00', '20:51:41', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(50, '2013-06-19 00:00:00', '20:51:43', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(51, '2013-06-19 00:00:00', '20:58:46', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(52, '2013-06-19 00:00:00', '20:58:48', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(53, '2013-06-19 00:00:00', '20:59:38', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(54, '2013-06-19 00:00:00', '21:01:10', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(55, '2013-06-19 00:00:00', '21:01:12', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(56, '2013-06-19 00:00:00', '21:12:10', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(57, '2013-06-19 00:00:00', '21:12:13', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(58, '2013-06-19 00:00:00', '21:12:35', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(59, '2013-06-19 00:00:00', '21:12:37', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(60, '2013-06-19 00:00:00', '21:17:26', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(61, '2013-06-19 00:00:00', '21:17:29', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(62, '2013-06-19 00:00:00', '21:18:44', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(63, '2013-06-19 00:00:00', '21:18:46', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(64, '2013-06-19 00:00:00', '21:19:29', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(65, '2013-06-19 00:00:00', '21:19:31', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(66, '2013-06-19 00:00:00', '21:20:06', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(67, '2013-06-19 00:00:00', '21:20:08', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(68, '2013-06-19 00:00:00', '21:20:24', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(69, '2013-06-19 00:00:00', '21:20:26', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(70, '2013-06-19 00:00:00', '21:20:37', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(71, '2013-06-19 00:00:00', '21:20:39', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(72, '2013-06-20 00:00:00', '14:47:58', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(73, '2013-06-21 00:00:00', '08:04:58', 0, 13, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload siteOrder'),
(74, '2013-06-21 00:00:00', '08:28:43', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(75, '2013-06-21 00:00:00', '08:28:46', 0, 12, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Contract'),
(76, '2013-06-21 00:00:00', '08:31:58', 0, 14, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload siteOrder'),
(77, '2013-06-21 00:00:00', '08:33:39', 0, 14, 'ADMIN(Admin1)', 'admin@example.com', 'Document Viewed', 'Viewed Employee'),
(78, '2013-06-21 00:00:00', '08:35:39', 0, 14, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload siteOrder'),
(79, '2013-06-21 00:00:00', '08:41:04', 0, 14, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload siteOrder'),
(80, '2013-06-21 00:00:00', '08:47:22', 0, 14, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload siteOrder'),
(81, '2013-06-21 00:00:00', '08:58:54', 0, 14, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload siteOrder'),
(82, '2013-06-21 00:00:00', '09:04:31', 0, 15, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload siteOrder'),
(83, '2013-06-21 00:00:00', '09:10:14', 0, 16, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload siteOrder'),
(84, '2013-06-21 00:00:00', '09:11:05', 0, 16, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload siteOrder'),
(85, '2013-06-21 00:00:00', '09:11:58', 0, 16, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload siteOrder'),
(86, '2013-06-21 00:00:00', '09:26:13', 0, 16, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload training'),
(87, '2013-06-21 00:00:00', '09:26:26', 0, 16, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload employee'),
(88, '2013-06-21 00:00:00', '10:07:07', -100, 0, '', 'tdk', 'User Login', 'Login Failed: Invalid Username or Password'),
(89, '2013-06-21 00:00:00', '10:07:17', 5, 0, 'tdk', 'tdk', 'User Login', 'Login SuccessFull'),
(90, '2013-06-21 00:00:00', '10:17:06', 5, 17, 'tdk', 'tdk@tdk.com', 'Upload Document', 'Upload KPIAudits'),
(91, '2013-06-23 00:00:00', '15:01:10', -100, 0, '', 'info@trinoweb.com', 'User Login', 'Login Failed: Invalid Username or Password'),
(92, '2013-06-23 00:00:00', '15:01:27', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(93, '2013-06-23 00:00:00', '15:44:09', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(94, '2013-06-23 16:29:45', '16:29:45', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(95, '2013-06-26 16:39:35', '16:39:35', 0, 18, 'ADMIN(Admin1)', 'admin@example.com', 'Upload Document', 'Upload contract'),
(96, '2013-06-26 16:42:07', '16:42:07', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(97, '2013-06-26 16:46:54', '16:46:54', 1, 1, 'Anwar Ali', 'justdoit2045@gmail.com', 'Upload Document', 'Upload contract'),
(98, '2013-06-26 17:22:16', '17:22:16', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(99, '2013-06-26 17:22:47', '17:22:47', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(100, '2013-06-26 17:24:50', '17:24:50', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(101, '2013-06-26 17:56:20', '17:56:20', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull'),
(102, '2013-06-26 18:00:12', '18:00:12', 1, 19, 'Anwar Ali', 'justdoit2045@gmail.com', 'Upload Document', 'Upload report'),
(103, '2013-06-26 18:22:44', '18:22:44', 1, 0, 'Anwar Ali', 'justdoit2045@gmail.com', 'User Login', 'Login SuccessFull');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `document_id`, `image`) VALUES
(6, 1, '844735.png'),
(2, 9, 'Report_1_ajdhf_akjd_2013-06-19_18-39-18.png'),
(3, 10, 'Report_securityOccurence_dalsfkja_f_2013-06-19_18-49-13.jpg'),
(4, 11, 'Evidence_Incident Report_adkjf_alkd_2013-06-19_18-50-10.png'),
(5, 18, 'Contract_adfadfadf_2013-06-26_16-39-35.png');

-- --------------------------------------------------------

--
-- Table structure for table `jobmembers`
--

CREATE TABLE IF NOT EXISTS `jobmembers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `jobmembers`
--

INSERT INTO `jobmembers` (`id`, `job_id`, `member_id`) VALUES
(1, '1', 1),
(2, '1,4,5', 2),
(3, '1,4,5', 3),
(4, '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `addedBy` int(11) NOT NULL COMMENT '0:admin other:user',
  `isApproved` int(11) NOT NULL COMMENT '1:approved, 0:not approved',
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `image`, `addedBy`, `isApproved`, `date_start`, `date_end`) VALUES
(1, 'test', 'test description', '284268.jpg', 0, 1, '2013-05-27', '2013-05-31'),
(4, 'psycho', 'slkadjfa ldfjalkdfj lakdfj lakdjf', '347686.jpg', 0, 1, '2013-06-27', '2013-06-27'),
(5, 'nto to assign', 'adkslfj salkdjf aslfd', '278884.gif', 0, 1, '2013-06-25', '2013-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `key_contacts`
--

CREATE TABLE IF NOT EXISTS `key_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cell` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `type` int(11) NOT NULL COMMENT '0=>keycontacts, 1=>staffcontacts, thirdpartycontacts',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `key_contacts`
--


-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE IF NOT EXISTS `mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(255) NOT NULL,
  `recipients_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL COMMENT 'read/unread',
  `date` datetime NOT NULL,
  `attachment` text NOT NULL,
  `sender_id` int(11) NOT NULL,
  `delete_for` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `is_replyall` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `sender`, `recipients_id`, `subject`, `message`, `status`, `date`, `attachment`, `sender_id`, `delete_for`, `parent`, `is_replyall`) VALUES
(1, 'Admin', 1, 'adfadf', 'first', 'read', '2013-06-17 21:33:22', '', 0, '', 0, 0),
(5, 'admin', 1, 'adfadf', 'Test reply goes here again', 'read', '2013-06-17 22:06:06', '', 0, '', 1, 0),
(4, 'Anwar Ali', 0, 'adfadf', 'Test reply goes here', 'read', '2013-06-17 22:05:04', '', 1, '', 1, 0),
(6, 'Anwar Ali', 0, 'adfadf', 'Is it? my again', 'read', '2013-06-17 22:06:49', '', 1, '', 1, 0),
(7, 'Anwar Ali', 0, 'adfadf', 'Lets check again', 'read', '2013-06-17 22:08:46', '', 1, '', 1, 0),
(8, 'Anwar Ali', 0, 'adfadf', 'test gagg', 'read', '2013-06-17 22:23:53', '', 1, '', 1, 0),
(9, 'Admin', 1, 'check view', 'test message', 'read', '2013-06-19 15:10:08', '343292.PNG,Contract__2013-06-07_18-55-01.txt', 0, '', 0, 0),
(10, 'Admin', 1, 'testing image', 'test message', 'read', '2013-06-23 16:29:02', '343292.PNG', 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `canView` int(11) NOT NULL,
  `canUpdate` int(11) NOT NULL,
  `canEmail` int(11) NOT NULL,
  `isSupervisor` int(11) NOT NULL,
  `isEmployee` int(11) NOT NULL,
  `canEdit` int(11) NOT NULL,
  `receive1` int(11) NOT NULL,
  `receive2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `full_name`, `fname`, `lname`, `title`, `address`, `email`, `phone`, `password`, `image`, `canView`, `canUpdate`, `canEmail`, `isSupervisor`, `isEmployee`, `canEdit`, `receive1`, `receive2`) VALUES
(1, 'Anwar Ali', '', '', 'Cleaner', 'Test', 'justdoit2045@gmail.com', '98798798', 'Nepal123*', '991485.jpg', 1, 1, 1, 0, 0, 0, 0, 1),
(2, 'Other user', '', '', 'Test', 'akdjflakdjf', '', '8789798798', 'Nepal123*', '495370.jpg', 1, 1, 1, 0, 0, 0, 1, 1),
(3, 'adfadfdf', 'aaa', 'bbb', 'adfa', 'asdfadfadsf', 'adfasdf@adfffadf.com', '987987987', 'aaaaaa', 'male.png', 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'aga', 'ggg', 'aaa', 'a', 'adfadfadf', 'ads@adg.com', '34234234', 'aaa', 'male.png', 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'tdk', 'tdk', 'tdk', 'waterboy', 'asdasd', 'tdk@tdk.com', '123123123', '11111', 'female.png', 1, 1, 1, 0, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pages`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_avatar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_avatar`, `email`, `password`, `picture`) VALUES
(2, 'Admin1', 'admin@example.com', 'clarisse2', 'image10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `document_id`, `video`) VALUES
(1, 8, 'Contract_alkdfjlakd_2013-06-10_19-07-55.3gp'),
(2, 12, 'Contract_jhghjgfhj_2013-06-19_20-43-30.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `youtubes`
--

CREATE TABLE IF NOT EXISTS `youtubes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `youtubes`
--

