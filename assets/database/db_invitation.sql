/*
SQLyog Enterprise v12.5.1 (64 bit)
MySQL - 5.7.37-0ubuntu0.18.04.1 : Database - db_invitation
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_invitation` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_invitation`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`nama`,`username`,`password`) values 
(1,'Super Admin','admin','21232f297a57a5a743894a0e4a801fc3'),
(2,'Budi Aprilianto','budi','00dfc53ee86af02e742515cdcf075ed3');

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
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer` */

insert  into `customer`(`id_customer`,`name`,`email`,`address`,`contact`,`password`,`created_at`,`updated_at`) values 
(1,'Budi Aprilianto','budiapri@gmail.com','Turi, Sleman, Yk','089629671717','9e60dd35fbd10ff9e2b55c3fee96cff9','2022-04-28 14:19:00',NULL),
(2,'Ardi Tri Heru','arditriheruh@gmail.com','Sedogan Lumbungrejo Tempel Sleman','089629671717','8c5e459e7eb3ab6492b89996b8100f29','2022-04-29 08:44:59','2022-05-01 08:15:54'),
(3,'Budi Aprilianto','aprilmoop.ba@gmail.com','Perumahan gadjah mada asri blok N3 Turi, Sleman','085799116798','5a3e5cbe981518ff2ec25a0c9e932e57','2022-05-01 05:15:54',NULL);

/*Table structure for table `invitation_contact` */

DROP TABLE IF EXISTS `invitation_contact`;

CREATE TABLE `invitation_contact` (
  `id_invitation_contact` int(100) NOT NULL AUTO_INCREMENT,
  `id_pesan` int(10) NOT NULL,
  `name` varbinary(45) NOT NULL,
  `contact` varchar(15) NOT NULL,
  PRIMARY KEY (`id_invitation_contact`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `invitation_contact` */

insert  into `invitation_contact`(`id_invitation_contact`,`id_pesan`,`name`,`contact`) values 
(1,1,'Ardi','6289629671717'),
(2,1,'Tri','6289629671718'),
(3,1,'Heru','6289629671719'),
(4,1,'Hatmoko','6289629671710'),
(5,1,'Diah','6289674953617'),
(6,2,'Nama','Nomor'),
(7,2,'Ardi Tri Heru','89629671717');

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id_messages` int(100) NOT NULL AUTO_INCREMENT,
  `id_pesan` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `messages` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Tanggal Dikirim',
  PRIMARY KEY (`id_messages`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `messages` */

insert  into `messages`(`id_messages`,`id_pesan`,`name`,`messages`,`tanggal`) values 
(1,1,'Aprilianto & Istri','Selama mas Ardi dan istri. Semoga menjadi keluarga sakinah mawadah wa rahmah','2022-04-29 10:37:43');

/*Table structure for table `pesan` */

DROP TABLE IF EXISTS `pesan`;

CREATE TABLE `pesan` (
  `id_pesan` int(10) NOT NULL AUTO_INCREMENT,
  `id_template` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `groom` varchar(45) NOT NULL COMMENT 'Pengantin Pria',
  `groom_nickname` varchar(10) NOT NULL,
  `groom_father` varchar(45) NOT NULL COMMENT 'Ayah Pengantin Pria',
  `groom_mother` varchar(45) NOT NULL COMMENT 'Ibu Pengantin Pria',
  `groom_pict` varchar(100) NOT NULL,
  `bride` varchar(45) NOT NULL COMMENT 'Pengantin Wanita',
  `bride_nickname` varchar(10) NOT NULL,
  `bride_father` varchar(45) NOT NULL COMMENT 'Ayah Pengantin Wanita',
  `bride_mother` varchar(45) NOT NULL COMMENT 'Ibu Pengantin Wanita',
  `bride_pict` varchar(100) NOT NULL,
  `akad_date` date NOT NULL,
  `akad_time` varchar(15) NOT NULL COMMENT 'Waktu Akad',
  `akad_place` varchar(45) NOT NULL COMMENT 'Tempat Akad',
  `resepsi_date` date NOT NULL,
  `resepsi_time` varchar(15) NOT NULL COMMENT 'Waktu Resepsi',
  `resepsi_place` varchar(45) NOT NULL COMMENT 'Tempat Resepsi',
  `akad_address` varchar(100) NOT NULL,
  `resepsi_address` varchar(100) NOT NULL,
  `akad_map` varchar(500) NOT NULL,
  `resepsi_map` varchar(500) NOT NULL,
  `file_cp` varchar(100) NOT NULL,
  `valid` int(1) NOT NULL DEFAULT '0' COMMENT '0=invalid, 1=valid',
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pesan` */

insert  into `pesan`(`id_pesan`,`id_template`,`id_customer`,`groom`,`groom_nickname`,`groom_father`,`groom_mother`,`groom_pict`,`bride`,`bride_nickname`,`bride_father`,`bride_mother`,`bride_pict`,`akad_date`,`akad_time`,`akad_place`,`resepsi_date`,`resepsi_time`,`resepsi_place`,`akad_address`,`resepsi_address`,`akad_map`,`resepsi_map`,`file_cp`,`valid`) values 
(1,1,1,'Ardi Tri Heru, S.Kom','Ardi','Sarmuji','Rumini','5907c86df7d77a77fa071f2d420b42c7.jpg','Diah Yuniarsih, S.M','Diah','Buchori','Sri Sunarsih','5409f11f077559871e36143b99b6c885.jpg','2022-05-07','08.00 - 09.00','Rumah Mempelai Perempuan','2022-05-08','13.00 - 15.00','Rumah Mempelai Pria','Jalan Magelang KM19 Tempel, Sleman, Yk','Jalan Magelang KM19 Tempel, Sleman, Yk','https://www.google.com/maps/place/Tekno+Craft/@-7.6428104,110.3304182,17z/data=!3m1!4b1!4m5!3m4!1s0x2e7a5fc82d20d2eb:0xc451aabb4cc4f34f!8m2!3d-7.6428353!4d110.3326012','https://www.google.com/maps/place/Tekno+Craft/@-7.6428104,110.3304182,17z/data=!3m1!4b1!4m5!3m4!1s0x2e7a5fc82d20d2eb:0xc451aabb4cc4f34f!8m2!3d-7.6428353!4d110.3326012','eea49f932efe465c664dfb4505ec2311.xlsx',1);

/*Table structure for table `template` */

DROP TABLE IF EXISTS `template`;

CREATE TABLE `template` (
  `id_template` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_template`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `template` */

insert  into `template`(`id_template`,`title`,`subtitle`,`image`,`created_at`) values 
(1,'NAKULA','Template Gold','cd575859b0366d256bb89e26cca52066.jpg','2022-04-29 06:27:03'),
(2,'SADEWA','Template Silver','33ba0aa49219e32244c97b4e66023381.jpg','2022-04-29 06:30:07');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
