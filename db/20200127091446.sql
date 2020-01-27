/*
MySQL Backup
Database: printerousdb
Backup Time: 2020-01-27 09:14:46
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
BEGIN;
LOCK TABLES `printerousdb`.`migrations` WRITE;
DELETE FROM `printerousdb`.`migrations`;
INSERT INTO `printerousdb`.`migrations` (`id`,`migration`,`batch`) VALUES (1, '2020_01_23_135249_create_organizations_table', 1),(2, '2020_01_23_140141_create_roles_table', 2);
UNLOCK TABLES;
COMMIT;
BEGIN;
LOCK TABLES `printerousdb`.`organizations` WRITE;
DELETE FROM `printerousdb`.`organizations`;
INSERT INTO `printerousdb`.`organizations` (`id`,`name`,`phone`,`email`,`website`,`logo`,`created_at`,`updated_at`) VALUES (1, 'Moza Music', '02189778399', 'mozamusic@gmail.com', 'www.mozamusic.com', 'logo/logo.png', '2020-01-23 14:20:06', '2020-01-23 14:20:06');
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
INSERT INTO `printerousdb`.`users` (`id`,`organization_id`,`role_id`,`name`,`email`,`phone`,`password`,`avatar`,`created_at`,`updated_at`) VALUES (1, 0, 3, 'admin', 'admin@pr.com', '08568029330', '$2y$10$zbxH4goc8GP.kUfUJjfA7.Qpndzg0LKssKZoDt1efq1Tw.R/4khLm', 'avatar/avatar.png', '2020-01-23 14:20:06', '2020-01-23 14:20:06'),(2, 1, 2, 'Runika', 'runika@gmail.com', '090909', '$2y$10$.b7ejDD6xmE0smdxfTuYnOF4nd9Q8FAIawDlFSusqGun5ds10o1cK', 'avatar/7XgJYBMChxdXfcFSIhGVWz8wADK5ONMzswL35A4D.jpeg', '2020-01-23 16:22:51', '2020-01-23 16:22:51'),(3, 1, 2, 'Alam', 'alam@gmail.com', '0886868', '$2y$10$8y7nS00t/FQP9DgOesILx.U0UGjzCjsticIbuEGS42mWlJY4DLLXm', 'avatar/2UiSfmTndPbgW09X8Yv0nISxTMSetrlBzm7nisP0.jpeg', '2020-01-23 16:24:26', '2020-01-23 16:24:26'),(4, 1, 2, 'yuli', 'yuli@gmail.com', '08868678', '$2y$10$2RcHL7S0.PpIOQDXd0UqAekyw9NcGS2T6lv6X19HF.EslRpLICn2m', 'avatar//mxSfuaoPk8RuJIiOKVkAPsFcmTQX3NUNcYM7RhYG.jpeg', '2020-01-23 16:27:27', '2020-01-23 16:27:27'),(5, 1, 1, 'as', 'asas@', '131', '$2y$10$DH3jhmFLeWzQqsNECou9r.0yY/lED.qSyiYbkzZCC1DGIakvIY5/G', 'avatar//Ppv15zR41YeX3GsRf2i0fxda67z2M7FWPs9UhlTv.jpeg', '2020-01-23 16:45:47', '2020-01-23 16:45:47');
UNLOCK TABLES;
COMMIT;
