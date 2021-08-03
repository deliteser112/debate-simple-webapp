/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.14-MariaDB : Database - todolist_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`todolist_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `todolist_db`;

/*Table structure for table `tbl_tasklist` */

DROP TABLE IF EXISTS `tbl_tasklist`;

CREATE TABLE `tbl_tasklist` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) DEFAULT NULL,
  `list_id` int(100) DEFAULT NULL,
  `task_name` varchar(100) DEFAULT NULL,
  `is_done` int(100) DEFAULT 0,
  `is_important` int(100) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_tasklist` */

insert  into `tbl_tasklist`(`id`,`user_id`,`list_id`,`task_name`,`is_done`,`is_important`) values 
(113,20,61,'1kg of tomato',1,1),
(114,20,61,'a bottle of olive oil',0,0),
(115,20,61,'a pecket of flour',0,1),
(116,20,61,'12 eggs',1,0),
(117,20,62,'watch lecture the video',0,0),
(118,20,62,'check out other youtube lecture related videos',0,1),
(119,20,62,'study lecture code',1,0),
(120,21,63,'test1',0,0);

/*Table structure for table `tbl_todolist` */

DROP TABLE IF EXISTS `tbl_todolist`;

CREATE TABLE `tbl_todolist` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_todolist` */

insert  into `tbl_todolist`(`id`,`user_id`,`name`) values 
(61,20,'Shopping List'),
(62,20,'11 May 2021'),
(63,21,'Testing List');

/*Table structure for table `tbl_users` */

DROP TABLE IF EXISTS `tbl_users`;

CREATE TABLE `tbl_users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_users` */

insert  into `tbl_users`(`id`,`firstname`,`email`,`password`,`avatar`) values 
(20,'Alexander Ryndin','ryndinalex112@gmail.com','deliteser','../uploads/1620717505.jpg'),
(21,'Testing Name','testing@gmail.com','deliteser','../uploads/1620717668.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
