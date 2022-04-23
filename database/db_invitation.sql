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
  PRIMARY KEY (`id_customer`),
  KEY `id_user` (`id_customer`)
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

/*Table structure for table `pesan` */

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `id_pesan` int(10) NOT NULL AUTO_INCREMENT,
  `id_customer` int(10) NOT NULL,
  `groom` varchar(45) NOT NULL COMMENT 'Pengantin Pria',
  `groom_father` varchar(45) NOT NULL COMMENT 'Ayah Pengantin Pria',
  `groom_mother` varchar(45) NOT NULL COMMENT 'Ibu Pengantin Pria',
  `bride` varchar(45) NOT NULL COMMENT 'Pengantin Wanita',
  `bride_father` varchar(45) NOT NULL COMMENT 'Ayah Pengantin Wanita',
  `bride_mother` varchar(45) NOT NULL COMMENT 'Ibu Pengantin Wanita',
  `akad_time` datetime NOT NULL COMMENT 'Waktu Akad',
  `resepsi_time` datetime NOT NULL COMMENT 'Waktu Resepsi',
  `akad_place` varchar(45) NOT NULL COMMENT 'Tempat Akad',
  `resepsi_place` varchar(45) NOT NULL COMMENT 'Tempat Resepsi',
  `valid` tinyint(1) NOT NULL COMMENT 'Status Validasi',
  PRIMARY KEY (`id_pesan`),
  KEY `id_pesan` (`id_pesan`),
  KEY `id_user` (`id_customer`),
  CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pesan` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
