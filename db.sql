/*
SQLyog Ultimate v12.2.6 (64 bit)
MySQL - 10.4.10-MariaDB-log : Database - dahlolet
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dahlolet` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dahlolet`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_menu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` double NOT NULL,
  UNIQUE KEY `keranjang_belanja_id_user_id_menu_unique` (`id_user`,`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cart` */

insert  into `cart`(`id_user`,`id_menu`,`qty`,`harga`) values

('1','MN-0003',1,18000),

('1','MN-0005',1,15000);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama`) values

(1,'Pasta'),

(2,'Pizza'),

(3,'Salad'),

(4,'Boba');

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` tinyint(5) DEFAULT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `gambar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`id_kategori`,`nama`,`harga`,`gambar`,`status`) values

('MN-0001',3,'Salad',18000,'images/menu/MN-0001.jpeg',1),

('MN-0002',2,'Pizza Honey',25000,'images/menu/MN-0002.jpeg',1),

('MN-0003',2,'Pizza Buney',18000,'images/menu/MN-0003.jpeg',1),

('MN-0004',1,'Pasta',18000,'images/menu/MN-0004.jpeg',1),

('MN-0005',4,'Brown Sugar + Boba',15000,'images/menu/MN-0005.jpeg',1);

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values

(1,'2014_10_12_000000_create_users_table',1),

(2,'2019_08_19_000000_create_failed_jobs_table',1),

(7,'2020_05_02_172609_create_kategori_table',2),

(10,'2020_05_02_180115_create_menu_table',3),

(14,'2020_05_06_074400_create_keranjang_belanja',4);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`telp`,`username`,`password`,`jabatan`,`remember_token`,`created_at`,`updated_at`) values

(1,'Kasir','081234567890','kasir','$2y$10$Bbm1yFPv8dDX3/is6MU0n.AhGkKTEbryIgd6xqaRQdqwcU9sieBSS','Kasir',NULL,'2020-05-02 09:01:46','2020-05-02 09:01:46'),

(2,'Manager','087763123321','manager','$2y$10$O3Ze1qtned/BQGqcnqt2OOR91nTfT0PD0u9Nb6MHZ6cV6krk7i5c6','Admin',NULL,'2020-05-02 09:01:46','2020-05-02 09:01:46'),

(3,'Dapur','087763321321','dapur','$2y$10$R2l/UnohuYfGVqvkpqHXZu8lZRB/aViVeVFR8XVzejQDxELteTMQ2','Dapur',NULL,'2020-05-02 09:01:46','2020-05-02 09:01:46');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
