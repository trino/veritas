-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 08, 2013 at 10:00 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `veritas`
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `full_name`, `company`, `email`, `password`, `phone`, `no_of_worker`, `description`, `image`) VALUES
(2, 'jim smiht', 'sears', 'test@test.com', 'clarisse2', '', 123, 'sdfsdfsdfsd', 'image14.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `docs`
--

CREATE TABLE IF NOT EXISTS `docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `doc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `docs`
--

INSERT INTO `docs` (`id`, `document_id`, `doc`) VALUES
(1, 1, 'album_blank.gif'),
(2, 2, 'TCPip.docx'),
(3, 3, 'monosodium glutamate (MSG).doc'),
(4, 4, '1367880751test.pdf');

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
  `date` datetime NOT NULL,
  `addedBy` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `location`, `title`, `description`, `document_type`, `date`, `addedBy`, `job_id`) VALUES
(1, 'test', 'test', 'test descadga', 'contract', '0000-00-00 00:00:00', 11, 4),
(2, 'adfadf', 'adfadfasd adsfadf', 'adfa adsf adf adfadf adf', 'post_order', '0000-00-00 00:00:00', 9, 4),
(3, 'adafd', 'adfadf', 'adfadf afdfadf', 'contract', '0000-00-00 00:00:00', 9, 4),
(4, 'toronto', 'there is a shooter ont he roof', 'he ran off', 'post_order', '2013-07-05 09:43:29', 9, 4);

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
(1, 1, 'album_blank.gif'),
(2, 2, '180355_192162704134929_158268550857678_635410_7352050_n.jpg'),
(3, 3, 'album_blank.gif'),
(4, 4, 'dwlc2.jpg'),
(5, 4, 'dwlc2.jpg'),
(6, 4, 'dwlc2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jobmembers`
--

CREATE TABLE IF NOT EXISTS `jobmembers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `jobmembers`
--

INSERT INTO `jobmembers` (`id`, `job_id`, `member_id`) VALUES
(14, '4', 9),
(13, '4,5', 10),
(12, '4,5', 9),
(11, '4', 10),
(10, '4', 9),
(15, '4', 11),
(16, '4,5,5', 10);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `image`, `addedBy`, `isApproved`, `date_start`, `date_end`) VALUES
(4, 'Toyota', 'asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a ', 'image4.jpg', 0, 1, '2013-04-02', '2013-04-30'),
(5, 'location 4 strike', 'strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... ', 'image12.jpg', 2, 1, '2013-04-02', '2013-04-25'),
(6, 'test', 'test', 'album_blank.gif', 0, 1, '2013-04-20', '2013-04-21'),
(7, 'honda plant', 'manufacturuer strike', 'dwlc2.jpg', 0, 1, '2013-05-01', '2013-05-31');

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
  `date` date NOT NULL,
  `sender_id` int(11) NOT NULL,
  `delete_for` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `mails`
--

INSERT INTO `mails` (`id`, `sender`, `recipients_id`, `subject`, `message`, `status`, `date`, `sender_id`, `delete_for`, `parent`) VALUES
(20, 'joe blow', 10, 'Hello', 'Test', 'read', '2013-04-28', 9, '', 0),
(22, 'sam smith', 9, 'hello', 'Test message reply', 'read', '2013-04-28', 10, '', 19),
(26, 'joe blow', 11, 'as', 'adfadfad', 'unread', '2013-04-28', 9, '', 0),
(14, 'Admin', 9, 'another', 'Again test reply', 'read', '2013-04-20', 0, '', 11),
(17, 'admin', 9, 'another', 'Lat email', 'read', '2013-04-20', 0, '', 11),
(18, 'admin', 9, 'another', 'test reply', 'read', '2013-04-20', 0, '', 11),
(19, 'joe blow', 10, 'hello', 'Test message', 'read', '2013-04-28', 9, '', 0),
(13, 'joe blow', 0, 'another', 'Test reply', 'read', '2013-04-20', 9, '', 11),
(11, 'Admin', 9, 'another', 'another', 'read', '2013-04-20', 0, '', 0),
(12, 'Admin', 9, 'test', 'adfadfasdf', 'read', '2013-04-20', 0, '', 0),
(10, 'Admin', 9, 'hi', 'Hi there', 'read', '2013-04-20', 0, '', 0),
(27, 'Admin', 9, 'asdadasd', 'asddad', 'read', '2013-04-29', 0, '', 0),
(28, 'Admin', 10, 'asdadasd', 'asddad', 'unread', '2013-04-29', 0, '', 0),
(29, 'joe blow', 0, 'asdadasd', 'good jobb', 'read', '2013-04-29', 9, '', 27),
(30, 'Admin', 13, 'test subject', 'hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message hello this is a message ', 'unread', '2013-05-07', 0, '', 0),
(31, 'Admin', 9, 'asdasdadsad', 'asdasadadasdasd', 'read', '2013-05-07', 0, '', 0),
(32, 'Admin', 10, 'asdasdadsad', 'asdasadadasdasd', 'unread', '2013-05-07', 0, '', 0),
(33, 'Admin', 11, 'asdasdadsad', 'asdasadadasdasd', 'unread', '2013-05-07', 0, '', 0),
(34, 'Admin', 12, 'asdasdadsad', 'asdasadadasdasd', 'unread', '2013-05-07', 0, '', 0),
(35, 'Admin', 13, 'asdasdadsad', 'asdasadadasdasd', 'unread', '2013-05-07', 0, '', 0),
(36, 'joe blow', 0, 'asdasdadsad', 'hey admin whats up????', 'read', '2013-05-07', 9, '', 31),
(37, 'joe blow', 0, 'adasdasd', 'asdasdsad', 'read', '2013-05-07', 9, '', 0),
(38, 'admin', 9, 'adasdasd', 'hey what do you want?', 'read', '2013-05-07', 0, '', 37),
(39, 'joe blow', 9, 'adasdasd', 'nothing much just wanted to let you knwo tha tyoua re beautwfyl', 'read', '2013-05-07', 9, '', 37),
(40, 'joe blow', 9, 'dasdasd', 'asdasdadas', 'read', '2013-05-07', 9, '', 0),
(41, 'joe blow', 9, 'dasdasd', 'asadasd', 'read', '2013-05-08', 9, '', 40);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `canView` int(11) NOT NULL,
  `canUpdate` int(11) NOT NULL,
  `isSupervisor` int(11) NOT NULL,
  `isEmployee` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `full_name`, `title`, `address`, `email`, `phone`, `password`, `image`, `canView`, `canUpdate`, `isSupervisor`, `isEmployee`) VALUES
(9, 'joe blow', 'guard', '123123123', 'info@trinoweb.com', '123123123', 'clarisse2', 'image5.jpg', 1, 1, 0, 0),
(10, 'sam smith', 'supervisor', '123 sdf', 'van@trinoweb.com', '123123123', 'clarisse2', 'image16.jpg', 1, 1, 0, 0),
(11, 'Test', 'test', 'test', 'test@test.com', '98887767', 'test123', 'album_blank.gif', 1, 1, 0, 0),
(12, 'lala lala', 'guard', '123 sdfsdfsdf', 'info@trinoweb.com', 'vtrinh85@gmail.com', 'clarisse2', 'dwlc2.jpg', 1, 1, 0, 0),
(13, 'asdadad', 'dadad', 'asdadasda', 'dvt1985@hotmail.com', '123213123123', 'clarisse2', 'dwlc2.jpg', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `description`) VALUES
(1, 'new', 'this is the test messages, test test');

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
(2, '', 'admin@test.com', 'clarisse2', 'image10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `document_id`, `video`) VALUES
(1, 1, 'album_blank.gif');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
