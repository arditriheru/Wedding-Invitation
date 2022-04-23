/*
SQLyog Enterprise v12.5.1 (64 bit)
MySQL - 10.4.22-MariaDB : Database - db_invitation
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_invitation` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_invitation`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id_customer` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer` */

/*Table structure for table `invitation_contact` */

DROP TABLE IF EXISTS `invitation_contact`;

CREATE TABLE `invitation_contact` (
  `id_invitation_contact` int(100) NOT NULL AUTO_INCREMENT,
  `id_pesan` int(10) NOT NULL,
  `name` varbinary(45) NOT NULL,
  `contact` varchar(15) NOT NULL,
  PRIMARY KEY (`id_invitation_contact`),
  KEY `id_invitation_contact` (`id_invitation_contact`),
  KEY `id_pesan` (`id_pesan`),
  CONSTRAINT `invitation_contact_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `invitation_contact` */

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id_messages` int(100) NOT NULL AUTO_INCREMENT,
  `id_pesan` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `messages` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL COMMENT 'Tanggal Dikirim',
  PRIMARY KEY (`id_messages`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `messages` */

/*Table structure for table `pesan` */

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `id_pesan` int(10) NOT NULL AUTO_INCREMENT,
  `id_template` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `groom` varchar(45) NOT NULL COMMENT 'Pengantin Pria',
  `groom_father` varchar(45) NOT NULL COMMENT 'Ayah Pengantin Pria',
  `groom_mother` varchar(45) NOT NULL COMMENT 'Ibu Pengantin Pria',
  `groom_pict` varchar(100) DEFAULT NULL,
  `bride` varchar(45) NOT NULL COMMENT 'Pengantin Wanita',
  `bride_father` varchar(45) NOT NULL COMMENT 'Ayah Pengantin Wanita',
  `bride_mother` varchar(45) NOT NULL COMMENT 'Ibu Pengantin Wanita',
  `bride_pict` varchar(100) DEFAULT NULL,
  `akad_date` date DEFAULT NULL,
  `akad_time` varchar(15) NOT NULL COMMENT 'Waktu Akad',
  `akad_place` varchar(45) NOT NULL COMMENT 'Tempat Akad',
  `resepsi_date` date DEFAULT NULL,
  `resepsi_time` varchar(15) NOT NULL COMMENT 'Waktu Resepsi',
  `resepsi_place` varchar(45) NOT NULL COMMENT 'Tempat Resepsi',
  `valid` int(1) NOT NULL DEFAULT 0 COMMENT '0=invalid, 1=valid',
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pesan` */

insert  into `pesan`(`id_pesan`,`id_template`,`id_customer`,`groom`,`groom_father`,`groom_mother`,`groom_pict`,`bride`,`bride_father`,`bride_mother`,`bride_pict`,`akad_date`,`akad_time`,`akad_place`,`resepsi_date`,`resepsi_time`,`resepsi_place`,`valid`) values 
(3,1,1,'a','a','a','ccec7fd0845414384bc68701aee48707.jpg','b','b','b','bf27f4a6b193528272fb1afe3b3d65e2.jpeg','2022-04-23','08.00 - 09.00','a','2022-04-23','08.00 - 09.00','b',0),
(4,1,1,'c','cb','cb','kartu ucapan ramdaan.jpg','b','cb','cb','42a6f6986bc9bd1b75d74ed55503a623.jpg','2022-04-23','08.00 - 09.00','cb','2022-04-23','08.00 - 09.00','cb',0),
(5,1,1,'cc','cc','cc','25465feee44eb2241eac353cf2431933.jpeg','cc','cc','cc','fcf3238dd0efe015e7c5a4a7b9011dec.jpg','2022-04-23','08.00 - 09.00','cc','2022-04-23','08.00 - 09.00','cc',0);

/*Table structure for table `template` */

DROP TABLE IF EXISTS `template`;

CREATE TABLE `template` (
  `id_template` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_template`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `template` */

insert  into `template`(`id_template`,`title`,`subtitle`,`image`,`created_at`) values 
(1,'NAKULA','Template Gold','nakula.jpg','2022-04-23 13:23:37');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
