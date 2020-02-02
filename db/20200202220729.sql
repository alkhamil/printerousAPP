/*
MySQL Backup
Database: printerousdb
Backup Time: 2020-02-02 22:07:29
*/

SET FOREIGN_KEY_CHECKS=0;
DROP TABLE IF EXISTS `printerousdb`.`migrations`;
DROP TABLE IF EXISTS `printerousdb`.`organizations`;
DROP TABLE IF EXISTS `printerousdb`.`roles`;
DROP TABLE IF EXISTS `printerousdb`.`users`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `organizations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `organization_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
BEGIN;
LOCK TABLES `printerousdb`.`migrations` WRITE;
DELETE FROM `printerousdb`.`migrations`;
INSERT INTO `printerousdb`.`migrations` (`id`,`migration`,`batch`) VALUES (1, '2020_01_23_135249_create_organizations_table', 1),(2, '2020_01_23_140141_create_roles_table', 2);
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `printerousdb`.`organizations` WRITE;
DELETE FROM `printerousdb`.`organizations`;
INSERT INTO `printerousdb`.`organizations` (`id`,`name`,`phone`,`email`,`website`,`logo`,`created_at`,`updated_at`) VALUES (8, 'Moza Studio', '08125667677', 'admin@mozastudio.com', 'www.mozastudio.com', 'uploads/logo/ThyC7IdICw0PimlGvluJDMfUmGEs0T8ELJrrwuZn.jpeg', '2020-02-02 12:19:09', '2020-02-02 12:19:09'),(9, 'Sheila Studio', '08235676778', 'admin@sheila.com', 'www.sheila.com', 'uploads/logo/c8rLEvoiekBLoBBaW8MP0UMT8oW3Nur2dlNCMXRv.jpeg', '2020-02-02 12:19:47', '2020-02-02 12:19:47');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `printerousdb`.`roles` WRITE;
DELETE FROM `printerousdb`.`roles`;
INSERT INTO `printerousdb`.`roles` (`id`,`name`,`created_at`,`updated_at`) VALUES (1, 'Account Manager', '2020-01-23 14:22:30', '2020-01-23 14:22:30'),(2, 'Staff', '2020-01-23 22:27:38', '2020-01-23 22:27:42'),(3, 'Admin', '2020-01-23 22:37:19', '2020-01-23 22:37:22');
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `printerousdb`.`users` WRITE;
DELETE FROM `printerousdb`.`users`;
INSERT INTO `printerousdb`.`users` (`id`,`organization_id`,`role_id`,`name`,`email`,`phone`,`password`,`avatar`,`created_at`,`updated_at`) VALUES (1, 0, 3, 'admin', 'admin@pr.com', '08568029330', '$2y$10$zbxH4goc8GP.kUfUJjfA7.Qpndzg0LKssKZoDt1efq1Tw.R/4khLm', 'uploads/avatar/5DfXp4dvGsvyf7f2ajfpjWOJ1WEjvY2SU6OHCXYU.jpeg', '2020-01-23 14:20:06', '2020-01-23 14:20:06'),(25, 8, 1, 'Nazmudin', 'naz@mozastudio.com', '08568029330', '$2y$10$EBGiW9n2sI6RAXvKR5ZFQOvHKTdjLfWAzc8jHkaI4nNwq4abtuUnS', 'uploads/avatar/9FNUy40tOTwt0FhQ7FRg7q4jksHOG2MImoQjpMbg.jpeg', '2020-02-02 12:28:33', '2020-02-02 12:28:33'),(26, 8, 2, 'Bagus Pratama Putra', 'bagus@mozastudio.com', '08786987829', '$2y$10$SAx.HDy9vP0ZsIN5Mw4rrOM2fIijb86lFQRmAgO74fujHuFYoQQAW', 'uploads/avatar/g9Y4pVMSb7WuXqoeOmqlbg4hahMridGx5jmm3gx2.jpeg', '2020-02-02 12:30:08', '2020-02-02 13:49:26'),(27, 8, 2, 'Dea Silpidia', 'dea@mozastudio.com', '08978829989', '$2y$10$qI9VM0dhcFOyFHz3XNlVY.JB1cvmXeLJY7TYYy13g3prv6RR1Qil.', 'uploads/avatar/zvaB6APcgNG8hjgWtEJikL0BRubR5LeNa9Es0Trv.jpeg', '2020-02-02 12:31:23', '2020-02-02 13:49:38'),(29, 9, 1, 'Yunus', 'yunus@sheila.com', '08787872811', '$2y$10$q1oZPPDx78R/7Sw.mvKC6eZXo1MHWQYkiAVhA9mViuM7f5LrCRORi', 'uploads/avatar/XuBGWCWMpnRHmWBDggIOpXmQ7gJjRgK81CNw6tXT.jpeg', '2020-02-02 12:42:20', '2020-02-02 12:43:43'),(30, 9, 2, 'Asep', 'asep@sheila.com', '08777888299', '$2y$10$affCYg0dJ7yrAigz0XDLZ.jnNFfw4Xw6otz1FTQwA7TfDaRxyooq2', 'uploads/avatar/YnCuZpFFCtcGmiLg6IPVQ3p4nhCwxd634mdam2Sz.jpeg', '2020-02-02 12:43:08', '2020-02-02 12:43:52'),(32, 9, 2, 'Bebe', 'bebe@sheila.com', '08299289379', '$2y$10$mkuolOOsi.T831u5wg6QtO.Fuk8BgQXvWvKsST7K0aW0meHZ./2yO', 'uploads/avatar/1cXCutZnKi3MMxV4U7QebrhJSJg7R88KhE2kdABy.jpeg', '2020-02-02 12:45:34', '2020-02-02 12:45:34');
UNLOCK TABLES;
COMMIT;
