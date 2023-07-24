-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table bank-sampah.bank_sampahs
CREATE TABLE IF NOT EXISTS `bank_sampahs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_sampah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kategori_sampah` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `harga_beli` int DEFAULT NULL,
  `harga_jual` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.bank_sampahs: ~1 rows (approximately)
INSERT INTO `bank_sampahs` (`id`, `created_at`, `updated_at`, `nama_sampah`, `id_kategori_sampah`, `stok`, `harga_beli`, `harga_jual`) VALUES
	(1, '2023-06-20 08:09:43', '2023-06-20 08:09:43', 'Botol Aqua', 1, 10, 5000, 7000);

-- Dumping structure for table bank-sampah.kategori_sampahs
CREATE TABLE IF NOT EXISTS `kategori_sampahs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.kategori_sampahs: ~3 rows (approximately)
INSERT INTO `kategori_sampahs` (`id`, `created_at`, `updated_at`, `nama_kategori`, `icon`) VALUES
	(1, '2023-06-20 07:58:59', '2023-06-20 07:58:59', 'Botol Plastik', 'water-bottle.png');
INSERT INTO `kategori_sampahs` (`id`, `created_at`, `updated_at`, `nama_kategori`, `icon`) VALUES
	(2, '2023-06-20 07:59:06', '2023-06-20 07:59:06', 'Botol Kaca', 'glass-bottle.png');
INSERT INTO `kategori_sampahs` (`id`, `created_at`, `updated_at`, `nama_kategori`, `icon`) VALUES
	(3, '2023-06-20 07:59:14', '2023-06-20 07:59:14', 'Kardus', 'box.png');

-- Dumping structure for table bank-sampah.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.migrations: ~1 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(2, '2023_06_20_132501_create_kategori_sampahs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '2023_06_20_132520_create_bank_sampahs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(4, '2023_06_20_132532_create_penjualan_sampahs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(5, '2023_06_20_132543_create_pembelian_sampahs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(6, '2023_06_20_132554_create_transaksi_sampahs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(7, '2023_06_20_132602_create_saldos_table', 1);

-- Dumping structure for table bank-sampah.pembelian_sampahs
CREATE TABLE IF NOT EXISTS `pembelian_sampahs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_sampah` int DEFAULT NULL,
  `id_pengepul` int DEFAULT NULL,
  `kuantitas` int DEFAULT NULL,
  `total` int DEFAULT NULL,
  `status_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pembelian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.pembelian_sampahs: ~0 rows (approximately)

-- Dumping structure for table bank-sampah.penjualan_sampahs
CREATE TABLE IF NOT EXISTS `penjualan_sampahs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_sampah` int DEFAULT NULL,
  `id_nasabah` int DEFAULT NULL,
  `kuantitas` int DEFAULT NULL,
  `total` int DEFAULT NULL,
  `status_penjualan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.penjualan_sampahs: ~0 rows (approximately)

-- Dumping structure for table bank-sampah.saldos
CREATE TABLE IF NOT EXISTS `saldos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `jumlah_saldo` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.saldos: ~2 rows (approximately)
INSERT INTO `saldos` (`id`, `created_at`, `updated_at`, `id_user`, `jumlah_saldo`) VALUES
	(1, NULL, NULL, 1, 100000);
INSERT INTO `saldos` (`id`, `created_at`, `updated_at`, `id_user`, `jumlah_saldo`) VALUES
	(2, '2023-06-20 22:39:40', '2023-06-20 22:39:40', 4, 0);

-- Dumping structure for table bank-sampah.transaksi_sampahs
CREATE TABLE IF NOT EXISTS `transaksi_sampahs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_sampah` int DEFAULT NULL,
  `kuantitas` int DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `jenis_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.transaksi_sampahs: ~0 rows (approximately)

-- Dumping structure for table bank-sampah.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@admin.com', 'admin', '$2y$10$m2eZGus9oY5xyO2crloEfOEYx98uSYVBpNcLFhczgpql3Vzi1tShS', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
	(4, 'Muhammad Ramdhan', 'djeldrago22@gmail.com', 'nasabah', '$2y$10$lO.HBgA8gw0NnspJAyWdDujkDqB1motHITZG/rPzgquYiXGSy3u6C', '2023-06-20 22:39:40', '2023-06-20 22:39:40');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
