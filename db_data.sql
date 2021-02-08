/*
SQLyog Ultimate v12.2.6 (64 bit)
MySQL - 10.2.36-MariaDB-cll-lve : Database - bbdb4393_dahlolet
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dahlolet` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dahlolet`;

/*Data for the table `cart` */

/*Data for the table `detail_transaksi` */

insert  into `detail_transaksi`(`id_transaksi`,`id_menu`,`qty`,`harga`,`total_harga`) values

(1,'MN-0005',2,22000,44000),

(1,'MN-0008',1,18000,18000),

(2,'MN-0003',2,24000,48000),

(2,'MN-0004',1,23000,23000),

(2,'MN-0005',1,22000,22000),

(2,'MN-0006',1,18000,18000);

/*Data for the table `failed_jobs` */

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama`) values

(1,'Base Milk'),

(2,'Fruit Variant'),

(3,'Non Dairy'),

(4,'Base Milk');

/*Data for the table `menu` */

insert  into `menu`(`id_menu`,`id_kategori`,`nama`,`harga`,`gambar`,`status`) values

('MN-0001','1','Twin Cup',42000,'MN-0001.svg',0),

('MN-0002','1','Thai Tea Big Cup',22000,'MN-0002.svg',0),

('MN-0003','1','Thai Green Tea',24000,'MN-0003.jpeg',1),

('MN-0004','1','Milo Coffee',23000,'MN-0004.jpeg',1),

('MN-0005','1','Thai Coffee',22000,'MN-0005.jpeg',1),

('MN-0006','2','Mango Thai Tea',18000,'MN-0006.jpeg',1),

('MN-0007','2','Taro Thai Tea',18000,'MN-0007.svg',1),

('MN-0008','2','Strawberry Thai Tea',18000,'MN-0008.svg',1),

('MN-0009','2','Chocolate Thai Tea',23000,'MN-0009.svg',1),

('MN-0010','2','Thai Mint Tea',18000,'MN-0010.svg',1),

('MN-0011','3','Thai Black Coffee',15000,'MN-0011.svg',1),

('MN-0012','3','Thai Black Tea',15000,'MN-0012.svg',1),

('MN-0013','3','Es Kopi Espresso',18000,'MN-0013.jpeg',1);

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values

(1,'2014_10_12_000000_create_users_table',1),

(2,'2019_08_19_000000_create_failed_jobs_table',1),

(3,'2020_05_02_172609_create_kategori_table',1),

(4,'2020_05_02_180115_create_menu_table',1),

(5,'2020_05_06_074400_create_cart_table',1),

(6,'2020_10_13_091743_create_transaksi_table',1),

(7,'2020_10_14_095539_detail_transaksi',1);

/*Data for the table `transaksi` */

insert  into `transaksi`(`id`,`tanggal`,`nama_pelanggan`,`qty`,`grand_total`,`status`,`created_at`,`updated_at`) values

(1,'2020-10-14','Kadek',3,62000,'Selesai','2020-10-14 19:29:10','2020-10-14 19:30:18'),

(2,'2020-10-16','Ary',5,111000,'Selesai','2020-10-16 17:43:00','2020-10-16 17:47:54');

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`telp`,`username`,`password`,`jabatan`,`remember_token`,`created_at`,`updated_at`) values

(1,'Kasir','081234567890','kasir','$2y$10$gJrWhflTJie4rjYxuAtHv.BMCVEf/Spk23uf2msiObzN7k4vwaJYG','Kasir',NULL,'2020-10-14 19:01:28','2020-10-14 19:01:28'),

(2,'Admin','087763123321','admin','$2y$10$JkMMKr4wSwUrkplU8sWPcungHUDFWqo9gOWeHKt1tIcYqazlwsd.K','Admin',NULL,'2020-10-14 19:01:28','2020-10-14 19:01:28'),

(3,'Dapur','087763321321','dapur','$2y$10$l/4.sNcqmOh6zhxSkHQxmej.F18REJQ2DScp7dcRi68mijayL.doS','Dapur',NULL,'2020-10-14 19:01:28','2020-10-14 19:01:28');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
