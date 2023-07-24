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
  `nama_sampah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kategori_sampah` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `harga_beli` int DEFAULT NULL,
  `harga_jual` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.bank_sampahs: ~1 rows (approximately)
INSERT INTO `bank_sampahs` (`id`, `created_at`, `updated_at`, `nama_sampah`, `id_kategori_sampah`, `stok`, `harga_beli`, `harga_jual`) VALUES
	(1, '2023-06-20 08:09:43', '2023-07-02 19:50:47', 'Botol Aqua', 1, 27, 5000, 7000);

-- Dumping structure for table bank-sampah.jadwal_pengambilan
CREATE TABLE IF NOT EXISTS `jadwal_pengambilan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_penjualan` int NOT NULL,
  `id_petugas` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table bank-sampah.jadwal_pengambilan: ~2 rows (approximately)
INSERT INTO `jadwal_pengambilan` (`id`, `id_penjualan`, `id_petugas`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
	(1, 1, 5, '2023-06-23', 'Sampah Telah Diambil', '2023-06-22 16:32:33', '2023-06-22 17:12:38');
INSERT INTO `jadwal_pengambilan` (`id`, `id_penjualan`, `id_petugas`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
	(2, 2, 5, '2023-06-23', 'Sampah Telah Diambil', '2023-06-22 18:34:49', '2023-06-22 18:35:57');

-- Dumping structure for table bank-sampah.kategori_sampahs
CREATE TABLE IF NOT EXISTS `kategori_sampahs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_kategori` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.kategori_sampahs: ~4 rows (approximately)
INSERT INTO `kategori_sampahs` (`id`, `created_at`, `updated_at`, `nama_kategori`, `icon`) VALUES
	(1, '2023-06-20 07:58:59', '2023-06-20 07:58:59', 'Botol Plastik', 'water-bottle.png');
INSERT INTO `kategori_sampahs` (`id`, `created_at`, `updated_at`, `nama_kategori`, `icon`) VALUES
	(2, '2023-06-20 07:59:06', '2023-06-20 07:59:06', 'Botol Kaca', 'glass-bottle.png');
INSERT INTO `kategori_sampahs` (`id`, `created_at`, `updated_at`, `nama_kategori`, `icon`) VALUES
	(3, '2023-06-20 07:59:14', '2023-06-20 07:59:14', 'Kardus', 'box.png');
INSERT INTO `kategori_sampahs` (`id`, `created_at`, `updated_at`, `nama_kategori`, `icon`) VALUES
	(4, '2023-06-20 07:59:14', '2023-06-20 07:59:14', 'Kertas', 'paper.png');

-- Dumping structure for table bank-sampah.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.migrations: ~0 rows (approximately)
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
	(6, '2023_06_20_131914_create_transaksi_sampahs_table', 1);
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
  `status_pembelian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pembelian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.pembelian_sampahs: ~1 rows (approximately)
INSERT INTO `pembelian_sampahs` (`id`, `created_at`, `updated_at`, `id_sampah`, `id_pengepul`, `kuantitas`, `total`, `status_pembelian`, `kode_pembelian`) VALUES
	(1, '2023-07-02 10:24:51', '2023-07-02 10:39:46', 1, 6, 3, 21000, 'Pembelian Berhasil', 'U15LVB');
INSERT INTO `pembelian_sampahs` (`id`, `created_at`, `updated_at`, `id_sampah`, `id_pengepul`, `kuantitas`, `total`, `status_pembelian`, `kode_pembelian`) VALUES
	(33, '2023-07-02 19:49:52', '2023-07-02 19:50:47', 1, 6, 5, 35000, 'Pembelian Berhasil', 'H84AYF');

-- Dumping structure for table bank-sampah.penarikan_saldo
CREATE TABLE IF NOT EXISTS `penarikan_saldo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_saldo` int NOT NULL DEFAULT '0',
  `id_nasabah` int NOT NULL DEFAULT '0',
  `jumlah` int NOT NULL DEFAULT '0',
  `kode` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table bank-sampah.penarikan_saldo: ~2 rows (approximately)
INSERT INTO `penarikan_saldo` (`id`, `id_saldo`, `id_nasabah`, `jumlah`, `kode`, `status`, `created_at`, `updated_at`) VALUES
	(1, 2, 4, 30000, 'D32GWY', 'Penarikan Berhasil', '2023-06-22 17:44:09', '2023-06-22 17:51:37');
INSERT INTO `penarikan_saldo` (`id`, `id_saldo`, `id_nasabah`, `jumlah`, `kode`, `status`, `created_at`, `updated_at`) VALUES
	(2, 2, 4, 45000, 'E87OXZ', 'Penarikan Berhasil', '2023-06-22 18:37:28', '2023-06-22 18:37:50');

-- Dumping structure for table bank-sampah.penjualan_sampahs
CREATE TABLE IF NOT EXISTS `penjualan_sampahs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_sampah` int DEFAULT NULL,
  `id_nasabah` int DEFAULT NULL,
  `kuantitas` int DEFAULT NULL,
  `total` int DEFAULT NULL,
  `status_penjualan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.penjualan_sampahs: ~2 rows (approximately)
INSERT INTO `penjualan_sampahs` (`id`, `created_at`, `updated_at`, `id_sampah`, `id_nasabah`, `kuantitas`, `total`, `status_penjualan`) VALUES
	(1, '2023-06-22 12:30:55', '2023-06-22 17:12:38', 1, 4, 10, 50000, 'Penjualan Berhasil');
INSERT INTO `penjualan_sampahs` (`id`, `created_at`, `updated_at`, `id_sampah`, `id_nasabah`, `kuantitas`, `total`, `status_penjualan`) VALUES
	(2, '2023-06-22 18:34:01', '2023-06-22 18:35:57', 1, 4, 15, 75000, 'Penjualan Berhasil');

-- Dumping structure for table bank-sampah.saldos
CREATE TABLE IF NOT EXISTS `saldos` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int DEFAULT NULL,
  `jumlah_saldo` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.saldos: ~3 rows (approximately)
INSERT INTO `saldos` (`id`, `created_at`, `updated_at`, `id_user`, `jumlah_saldo`) VALUES
	(1, NULL, '2023-07-02 19:50:47', 1, 106000);
INSERT INTO `saldos` (`id`, `created_at`, `updated_at`, `id_user`, `jumlah_saldo`) VALUES
	(2, '2023-06-20 22:39:40', '2023-06-22 18:37:50', 4, 50000);
INSERT INTO `saldos` (`id`, `created_at`, `updated_at`, `id_user`, `jumlah_saldo`) VALUES
	(3, '2023-07-02 07:15:06', '2023-07-02 07:15:06', 8, 0);
INSERT INTO `saldos` (`id`, `created_at`, `updated_at`, `id_user`, `jumlah_saldo`) VALUES
	(4, '2023-07-02 19:53:07', '2023-07-02 19:53:07', 9, 0);

-- Dumping structure for table bank-sampah.transaksi_sampahs
CREATE TABLE IF NOT EXISTS `transaksi_sampahs` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_sampah` int DEFAULT NULL,
  `kuantitas` int DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `jenis_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.transaksi_sampahs: ~2 rows (approximately)
INSERT INTO `transaksi_sampahs` (`id`, `created_at`, `updated_at`, `id_sampah`, `kuantitas`, `tanggal_transaksi`, `jenis_transaksi`) VALUES
	(1, '2023-06-22 12:30:55', '2023-06-22 12:30:55', 1, 10, '2023-06-22', 'Penjualan');
INSERT INTO `transaksi_sampahs` (`id`, `created_at`, `updated_at`, `id_sampah`, `kuantitas`, `tanggal_transaksi`, `jenis_transaksi`) VALUES
	(2, '2023-06-22 18:34:01', '2023-06-22 18:34:01', 1, 15, '2023-06-23', 'Penjualan');
INSERT INTO `transaksi_sampahs` (`id`, `created_at`, `updated_at`, `id_sampah`, `kuantitas`, `tanggal_transaksi`, `jenis_transaksi`) VALUES
	(3, '2023-07-02 10:39:46', '2023-07-02 10:39:46', 1, 3, '2023-07-02', 'Pembelian');
INSERT INTO `transaksi_sampahs` (`id`, `created_at`, `updated_at`, `id_sampah`, `kuantitas`, `tanggal_transaksi`, `jenis_transaksi`) VALUES
	(4, '2023-07-02 19:50:47', '2023-07-02 19:50:47', 1, 5, '2023-07-03', 'Pembelian');

-- Dumping structure for table bank-sampah.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table bank-sampah.users: ~7 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `address`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@admin.com', 'admin', '$2y$10$m2eZGus9oY5xyO2crloEfOEYx98uSYVBpNcLFhczgpql3Vzi1tShS', '', NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `address`, `created_at`, `updated_at`) VALUES
	(4, 'Muhammad Ramdhan Syakirin', 'djeldrago22@gmail.com', 'nasabah', '$2y$10$DdxX2kHYUuF9tr542A3Zy..kxJOuyeSNz1B9yxxjSxeeJAlYwimt.', 'Premier Savanna Blok O', '2023-06-20 22:39:40', '2023-07-02 19:55:44');
INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `address`, `created_at`, `updated_at`) VALUES
	(5, 'Petugas', 'petugas@gmail.com', 'petugas', '$2y$10$7ccL.WOl7WEcmfP4vEthXO5EiBGX9Zr.GBVSMR9SMW2OhN6J7eOGG', '', '2023-06-22 10:39:45', '2023-06-22 10:39:45');
INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `address`, `created_at`, `updated_at`) VALUES
	(6, 'Pengepul', 'pengepul@gmail.com', 'pengepul', '$2y$10$gaewMzlWbLokpM0isxkIYem/q.wX/w5kIZKxFnzmOXMAMnO9ifDJu', '', '2023-06-22 10:40:01', '2023-06-22 10:40:01');
INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `address`, `created_at`, `updated_at`) VALUES
	(7, 'Dirut Lingkungan Hidup', 'dirut@gmail.com', 'reviewer', '$2y$10$m2eZGus9oY5xyO2crloEfOEYx98uSYVBpNcLFhczgpql3Vzi1tShS', '', '2023-06-22 10:40:27', '2023-06-22 10:40:27');
INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `address`, `created_at`, `updated_at`) VALUES
	(8, 'Safa Aulia', 'safa@gmail.com', 'nasabah', '$2y$10$L5sOoE8B6Y3fndExn.YOy.zKAuOBgW3r017Ti2//m/iGv9pKHhrNG', 'Jakarta Selatan', '2023-07-02 07:15:06', '2023-07-02 07:15:06');
INSERT INTO `users` (`id`, `name`, `email`, `role`, `password`, `address`, `created_at`, `updated_at`) VALUES
	(9, 'Taupik', 'taupik@gmail.com', 'nasabah', '$2y$10$zN8XIzM/JeRRLtJlwbQ0O.0hePmZIQaoIIXuwrlor49X.vDvEL15C', 'Subang', '2023-07-02 19:53:07', '2023-07-02 19:53:07');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
