/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 8.0.24 : Database - db_debate
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_debate` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `db_debate`;

/*Table structure for table `tbl_text` */

DROP TABLE IF EXISTS `tbl_text`;

CREATE TABLE `tbl_text` (
  `id` int NOT NULL AUTO_INCREMENT,
  `level` int DEFAULT '1',
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `userId` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_user_tbl_text_ibfk_1` (`userId`),
  CONSTRAINT `tbl_user_tbl_text_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `tbl_text` */

insert  into `tbl_text`(`id`,`level`,`text1`,`text2`,`text3`,`userId`) values 
(10,1,'This is First Debate Content','This is Second Debate Content','This is Third Debate Content',15),
(11,1,'Hello','World','Yeah',16);

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `level` int DEFAULT '1',
  `score` int DEFAULT '0',
  `status` int DEFAULT '0',
  PRIMARY KEY (`id`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`id`,`email`,`password`,`surname`,`country`,`level`,`score`,`status`) values 
(15,'ryndinalex112@gmail.com','deliteser','Alexander Ryndin','Russia Federation',1,1,0),
(16,'oleg@elite.com','asdf','Oleg Pablo','Ukranine',1,4,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
