-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 5.7.33 - MySQL Community Server (GPL)
-- OS Server:                    Win64
-- HeidiSQL Versi:               11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk travel
CREATE DATABASE IF NOT EXISTS `travel` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `travel`;

-- membuang struktur untuk table travel.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel travel.failed_jobs: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- membuang struktur untuk table travel.galleries
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `travel_packages_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel travel.galleries: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT IGNORE INTO `galleries` (`id`, `travel_packages_id`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 2, 'assets/gallery/tjw7lRWtjNehJZBKA3Bp7yy22wrBYmvwmBEamXCq.jpg', NULL, '2021-11-18 23:15:16', '2021-11-18 23:50:56'),
	(2, 2, 'assets/gallery/JtCvYyHZF1wWWV8ISkSn8x1ICTQO51PqJiOgc4e1.jpg', '2021-11-19 04:41:19', '2021-11-18 23:35:56', '2021-11-19 04:41:19'),
	(3, 1, 'assets/gallery/ia19xYsA2leUxsHscqiZNhTuJKY2cQsVZG2AEiGB.jpg', NULL, '2021-11-19 07:03:01', '2021-11-19 07:46:37'),
	(4, 3, 'assets/gallery/Fvg14a9YwR3LIjDqXIuC0KIe9Z7hxT7KpzEiSrDO.jpg', NULL, '2021-11-19 07:05:38', '2021-11-19 07:05:38'),
	(5, 4, 'assets/gallery/uNMdY6UqjuOxTrHX6Soa1jgjfXQFU3CCWbPgQPSJ.jpg', NULL, '2021-11-19 07:08:17', '2021-11-19 07:08:17');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;

-- membuang struktur untuk table travel.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel travel.migrations: ~10 rows (lebih kurang)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2021_11_17_193542_create_travel_packages_table', 1),
	(6, '2021_11_17_195159_create_galleries_table', 2),
	(7, '2021_11_17_195602_create_transactions_table', 3),
	(8, '2021_11_17_200123_create_transaction_details_table', 4),
	(9, '2021_11_17_200620_add_roles_field_to_users_table', 5),
	(10, '2021_11_18_012610_add_username_field_to_users_table', 6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- membuang struktur untuk table travel.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel travel.password_resets: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- membuang struktur untuk table travel.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel travel.personal_access_tokens: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- membuang struktur untuk table travel.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `travel_packages_id` int(11) NOT NULL,
  `users_id` int(11) DEFAULT NULL,
  `additional_visa` int(11) NOT NULL,
  `transaction_total` int(11) NOT NULL,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel travel.transactions: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT IGNORE INTO `transactions` (`id`, `travel_packages_id`, `users_id`, `additional_visa`, `transaction_total`, `transaction_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 190000, 290000, 'PENDING', NULL, '2021-11-19 04:46:22', '2021-11-19 07:00:28'),
	(2, 1, 1, 0, 10000000, 'IN_CART', NULL, '2021-11-19 10:04:55', '2021-11-19 10:04:55'),
	(3, 2, 1, 0, 500000, 'IN_CART', NULL, '2021-11-19 10:21:06', '2021-11-19 10:21:06'),
	(4, 2, 1, 190, 1000190, 'PENDING', NULL, '2021-11-19 11:19:18', '2021-11-19 11:33:36');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- membuang struktur untuk table travel.transaction_details
CREATE TABLE IF NOT EXISTS `transaction_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `transactions_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_visa` tinyint(1) NOT NULL,
  `doe_passport` date NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel travel.transaction_details: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `transaction_details` DISABLE KEYS */;
INSERT IGNORE INTO `transaction_details` (`id`, `transactions_id`, `username`, `nationality`, `is_visa`, `doe_passport`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 1, 'test', 'ID', 30, '2021-11-19', NULL, NULL, NULL),
	(2, 2, 'Tester', 'ID', 0, '2026-11-19', NULL, '2021-11-19 10:04:56', '2021-11-19 10:04:56'),
	(3, 3, 'Tester', 'ID', 0, '2026-11-19', NULL, '2021-11-19 10:21:06', '2021-11-19 10:21:06'),
	(4, 4, 'Tester', 'ID', 0, '2026-11-19', NULL, '2021-11-19 11:19:18', '2021-11-19 11:19:18'),
	(5, 4, 'Fikri', 'ID', 1, '2021-11-30', '2021-11-19 11:27:28', '2021-11-19 11:24:51', '2021-11-19 11:27:28'),
	(6, 4, 'User123', 'CN', 1, '2021-11-30', '2021-11-19 11:32:19', '2021-11-19 11:31:32', '2021-11-19 11:32:19'),
	(7, 4, 'User123', 'CN', 0, '2021-11-30', '2021-11-19 11:32:48', '2021-11-19 11:32:41', '2021-11-19 11:32:48'),
	(8, 4, 'User123', 'CN', 1, '2021-11-30', NULL, '2021-11-19 11:33:27', '2021-11-19 11:33:27');
/*!40000 ALTER TABLE `transaction_details` ENABLE KEYS */;

-- membuang struktur untuk table travel.travel_packages
CREATE TABLE IF NOT EXISTS `travel_packages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foods` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_date` date NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel travel.travel_packages: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `travel_packages` DISABLE KEYS */;
INSERT IGNORE INTO `travel_packages` (`id`, `title`, `slug`, `location`, `about`, `featured_event`, `language`, `foods`, `departure_date`, `duration`, `type`, `price`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Pantai Ubud', 'pantai-ubud', 'Bali, Indonesia', 'Pantai Ubud', 'Tari Kecak', 'Indonesia', 'Local Food', '2021-11-18', '7D', 'Open Trip', 10000000, NULL, '2021-11-18 23:13:11', '2021-11-18 23:13:11'),
	(2, 'Kraton Solo', 'kraton-solo', 'Jawa Tengah', 'Kraton Solo', 'Pertunjukkan Wayang Kulit', 'Indonesia', 'Local Food', '2021-11-18', '3D', 'Open Trip', 500000, NULL, '2021-11-18 23:14:31', '2021-11-19 07:38:36'),
	(3, 'Gunung Bromo', 'gunung-bromo', 'Jawa Timur', 'Gunung Bromo', 'Pendakian', 'Indonesia', 'Local Food', '2021-12-11', '7D', 'Open Trip', 5000000, NULL, '2021-11-19 07:05:09', '2021-11-19 07:05:09'),
	(4, 'Middle East', 'middle-east', 'Dubai', 'Middle East', 'Tour and Travel', 'English', 'Local Food', '2021-12-11', '7D', 'Open Trip', 15000000, NULL, '2021-11-19 07:07:28', '2021-11-19 07:07:28');
/*!40000 ALTER TABLE `travel_packages` ENABLE KEYS */;

-- membuang struktur untuk table travel.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Membuang data untuk tabel travel.users: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`, `username`) VALUES
	(1, 'Test', 'test@example.com', '2021-11-18 01:10:43', '$2y$10$mr9WmdxcUU1KdcqnLakaXexEtCz0u1OWauNMDldxeqLY1Vq0z1sN.', NULL, '2021-11-18 01:09:40', '2021-11-18 01:10:43', 'ADMIN', 'Tester'),
	(2, 'User', 'user@example.com', '2021-11-18 02:16:59', '$2y$10$ODUC1XNVGorrRDE1iKk9AOTknDcmi2O3.KPrhbBzKxdIb3iCz3VZ.', NULL, '2021-11-18 02:15:52', '2021-11-18 02:17:00', 'USER', 'User123');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
