/*
SQLyog Professional v10.3 
MySQL - 5.1.68-cll : Database - shark_database
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `companies` */

CREATE TABLE `companies` (
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `companies` */

insert  into `companies`(`id`,`full_name`,`company`,`email`,`password`,`phone`,`no_of_worker`,`description`,`image`) values ('2','jim smiht','sears','test@test.com','clarisse2','','123','sdfsdfsdfsd','image14.jpg');

/*Table structure for table `docs` */

CREATE TABLE `docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `doc` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `docs` */

/*Table structure for table `documents` */

CREATE TABLE `documents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `addedBy` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `documents` */

/*Table structure for table `images` */

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `images` */

/*Table structure for table `jobmembers` */

CREATE TABLE `jobmembers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `jobmembers` */

insert  into `jobmembers`(`id`,`job_id`,`member_id`) values ('14','4','9'),('13','4,5','10'),('12','4,5','9'),('11','4','10'),('10','4','9');

/*Table structure for table `jobs` */

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `addedBy` int(11) NOT NULL COMMENT '0:admin other:user',
  `isApproved` int(11) NOT NULL COMMENT '1:approved, 0:not approved',
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `jobs` */

insert  into `jobs`(`id`,`title`,`description`,`image`,`addedBy`,`isApproved`,`date_start`,`date_end`) values ('4','Toyota','asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a asd a ','image4.jpg','0','1','2013-04-02','2013-04-30'),('5','location 4 strike','strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... strike at ... ','image12.jpg','2','1','2013-04-02','2013-04-25');

/*Table structure for table `mails` */

CREATE TABLE `mails` (
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `mails` */

insert  into `mails`(`id`,`sender`,`recipients_id`,`subject`,`message`,`status`,`date`,`sender_id`,`delete_for`,`parent`) values ('5','Admin','10','hllo hllo hllo hllo hllo hllo hllo hllo hllo ','hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo ','read','2013-04-11','0','','0'),('4','Admin','9','hllo hllo hllo hllo hllo hllo hllo hllo hllo ','hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo hllo ','read','2013-04-11','0','','0'),('6','admin','0','hllo hllo hllo hllo hllo hllo hllo hllo hllo ','tes ','read','2013-04-11','0','','0'),('7','Admin','9','fsdfsdf','sdvsdfsdfsdfsd','unread','2013-04-11','0','','0'),('8','admin','0','hllo hllo hllo hllo hllo hllo hllo hllo hllo ','sdfdsfsdfsdfsdfsdfsfsdfsf','unread','2013-04-11','0','','0');

/*Table structure for table `members` */

CREATE TABLE `members` (
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `members` */

insert  into `members`(`id`,`full_name`,`title`,`address`,`email`,`phone`,`password`,`image`,`canView`,`canUpdate`,`isSupervisor`,`isEmployee`) values ('9','joe blow','guard','123123123','info@trinoweb.com','123123123','clarisse2','image5.jpg','1','0','0','0'),('10','sam smith','supervisor','123 sdf','van@trinoweb.com','123123123','clarisse2','image16.jpg','1','1','0','0');

/*Table structure for table `pages` */

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `pages` */

insert  into `pages`(`id`,`title`,`description`) values ('1','new','this is the test messages, test test');

/*Table structure for table `users` */

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_avatar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`name_avatar`,`email`,`password`,`picture`) values ('2','Admin','admin@test.com','clarisse2','image10.jpg');

/*Table structure for table `videos` */

CREATE TABLE `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `videos` */

/*Table structure for table `youtubes` */

CREATE TABLE `youtubes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `document_id` int(11) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `youtubes` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
