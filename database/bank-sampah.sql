-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 10:37 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank-sampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_sampahs`
--

CREATE TABLE `bank_sampahs` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_kategori_sampah` int(10) UNSIGNED DEFAULT NULL,
  `nama_sampah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `status_sampah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_trash.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_sampahs`
--

INSERT INTO `bank_sampahs` (`id`, `id_kategori_sampah`, `nama_sampah`, `stok`, `harga_beli`, `harga_jual`, `status_sampah`, `icon`, `created_at`, `updated_at`) VALUES
(1, 1, 'Botol Bersih', 27, 2500, 3000, 'active', 'eyJpdiI6IjZYN3F.png', '2023-06-20 08:09:43', '2023-08-14 03:12:11'),
(2, 1, 'Tutup Botol', 26, 2500, 3000, 'active', 'eyJpdiI6Ims3K1M.png', '2023-07-08 09:53:06', '2023-08-14 03:13:26'),
(3, 1, 'Botol Mizone', 17, 1000, 1500, 'active', 'eyJpdiI6ImViNXR.png', '2023-07-08 09:54:43', '2023-08-03 01:51:15'),
(4, 1, 'Tutup Galon', 22, 3000, 3500, 'active', 'eyJpdiI6IkJDWC9.png', '2023-07-25 11:41:59', '2023-07-30 19:51:46'),
(5, 1, 'Dus Random', 11, 1200, 1700, 'active', 'eyJpdiI6InkwQ3l.png', '2023-07-25 11:42:48', '2023-08-12 07:27:08'),
(6, 1, 'Botol Kotor / Random', 10, 1500, 2000, 'active', 'eyJpdiI6IjdaOVN.png', '2023-07-25 11:43:38', '2023-07-30 19:51:10'),
(7, 1, 'Aqua Gelas Bersih', 10, 3000, 3500, 'active', 'eyJpdiI6IjllOSt.png', '2023-07-25 11:44:28', '2023-07-30 19:50:57'),
(8, 1, 'Aqua Gelas Kotor / Campuran', 10, 1500, 2000, 'active', 'eyJpdiI6IkpENXN.png', '2023-07-25 11:45:23', '2023-07-30 19:50:44'),
(9, 1, 'Kresek Campur', 10, 200, 500, 'active', 'eyJpdiI6IlZnRW1.png', '2023-07-25 11:46:01', '2023-07-30 19:50:31'),
(10, 1, 'Plastik Bening', 10, 1000, 1500, 'active', 'eyJpdiI6Im1WZXc.png', '2023-07-25 11:46:35', '2023-07-30 19:42:55'),
(11, 1, 'Pecahan Kaca', 0, 100, 300, 'active', 'eyJpdiI6Ik1vdlp.png', '2023-07-25 11:47:29', '2023-07-31 02:35:06'),
(12, 1, 'Buku', 18, 1000, 1500, 'active', 'eyJpdiI6ImgrMlR.png', '2023-07-25 11:47:56', '2023-07-30 19:42:06'),
(13, 6, 'Sampah Sayuran', 2, 2000, 2500, 'active', 'eyJpdiI6InJFcGM.png', '2023-08-02 17:24:05', '2023-08-14 03:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(11) NOT NULL,
  `id_user` bigint(11) NOT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `id_penjualan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hari` date NOT NULL,
  `jam_start` time NOT NULL,
  `jam_end` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwals`
--

INSERT INTO `jadwals` (`id`, `id_user`, `id_petugas`, `id_penjualan`, `hari`, `jam_start`, `jam_end`, `created_at`, `updated_at`) VALUES
(5, 4, 11, '74', '2023-08-10', '11:00:00', '12:00:00', '2023-08-09 14:03:05', '2023-08-09 15:24:35'),
(6, 4, 11, '79', '2023-08-18', '11:00:00', '12:00:00', '2023-08-10 03:47:00', '2023-08-10 03:47:13'),
(7, 8, 11, '80', '2023-08-18', '14:22:00', '15:22:00', '2023-08-10 06:23:08', '2023-08-10 07:07:38'),
(8, 4, 5, '81', '2023-08-11', '11:00:00', '12:00:00', '2023-08-10 07:16:31', '2023-08-10 07:16:49'),
(9, 4, 5, '82', '2023-08-19', '11:00:00', '12:00:00', '2023-08-12 07:26:20', '2023-08-12 07:26:44'),
(10, 4, NULL, '83', '2023-08-21', '12:00:00', '13:00:00', '2023-08-19 20:07:25', '2023-08-19 20:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pengambilan`
--

CREATE TABLE `jadwal_pengambilan` (
  `id` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_pengambilan`
--

INSERT INTO `jadwal_pengambilan` (`id`, `id_penjualan`, `id_petugas`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(55, 56, 5, '2023-07-31 08:08:00', 'Sampah Telah Diambil', '2023-07-31 01:55:10', '2023-07-31 01:55:10'),
(56, 57, 5, '2023-07-31 10:00:00', 'Sampah Telah Diambil', '2023-07-31 01:56:59', '2023-07-31 01:56:59'),
(57, 58, 5, '2023-08-02 22:23:00', 'Sampah Telah Diambil', '2023-08-02 15:24:06', '2023-08-02 15:24:06'),
(58, 63, 5, '2023-08-03 08:50:00', 'Sampah Telah Diambil', '2023-08-03 01:51:15', '2023-08-03 01:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_sampahs`
--

CREATE TABLE `kategori_sampahs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_kategori` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_sampahs`
--

INSERT INTO `kategori_sampahs` (`id`, `created_at`, `updated_at`, `nama_kategori`, `icon`) VALUES
(1, '2023-06-20 07:58:59', '2023-07-30 19:28:31', 'Anorganik', 'eyJpdiI6InhrZzM.png'),
(6, '2023-07-25 10:42:04', '2023-07-30 19:28:24', 'Organik', 'eyJpdiI6Im1nVTV.png'),
(9, '2023-07-25 21:42:00', '2023-07-30 19:28:17', 'Sampah B3', 'eyJpdiI6IlorSk9.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2023_06_20_132501_create_kategori_sampahs_table', 1),
(3, '2023_06_20_132520_create_bank_sampahs_table', 1),
(4, '2023_06_20_132532_create_penjualan_sampahs_table', 1),
(5, '2023_06_20_132543_create_pembelian_sampahs_table', 1),
(6, '2023_06_20_131914_create_transaksi_sampahs_table', 1),
(7, '2023_06_20_132602_create_saldos_table', 1),
(8, '2023_08_07_010415_create_jadwals_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_sampahs`
--

CREATE TABLE `pembelian_sampahs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_pengepul` int(11) DEFAULT NULL,
  `status_pembelian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pembelian` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian_sampahs`
--

INSERT INTO `pembelian_sampahs` (`id`, `created_at`, `updated_at`, `id_pengepul`, `status_pembelian`, `ket`, `kode_pembelian`) VALUES
(66, '2023-07-25 12:02:03', '2023-07-25 12:02:24', 20, 'Pembelian Ditolak', 'dikit', 'B70OIU'),
(67, '2023-07-30 20:00:57', '2023-07-30 20:02:27', 20, 'Pembelian Berhasil', NULL, 'N55VLV'),
(68, '2023-07-31 02:35:06', '2023-07-31 02:35:21', 21, 'Pembelian Berhasil', NULL, 'J19IRI');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_sampah_details`
--

CREATE TABLE `pembelian_sampah_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_sampah` int(11) DEFAULT NULL,
  `id_pembelian_sampah` int(11) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian_sampah_details`
--

INSERT INTO `pembelian_sampah_details` (`id`, `created_at`, `updated_at`, `id_sampah`, `id_pembelian_sampah`, `kuantitas`, `total`) VALUES
(69, NULL, NULL, 2, 66, 1, 3000),
(70, NULL, NULL, 1, 66, 1, 3000),
(71, NULL, NULL, 2, 67, 1, 3000),
(72, NULL, NULL, 1, 67, 1, 3000),
(73, NULL, NULL, 11, 68, 10, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `penarikan_saldo`
--

CREATE TABLE `penarikan_saldo` (
  `id` int(11) NOT NULL,
  `id_saldo` int(11) NOT NULL DEFAULT '0',
  `id_nasabah` int(11) NOT NULL DEFAULT '0',
  `jumlah` int(11) NOT NULL DEFAULT '0',
  `kode` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penarikan_saldo`
--

INSERT INTO `penarikan_saldo` (`id`, `id_saldo`, `id_nasabah`, `jumlah`, `kode`, `status`, `ket`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 21000, 'P28UAS', 'Penarikan Berhasil', NULL, '2023-07-27 13:14:18', '2023-07-27 06:14:18'),
(2, 2, 4, 1000, 'D98FQM', 'Penarikan Berhasil', NULL, '2023-07-31 01:48:02', '2023-07-31 01:48:02'),
(3, 4, 9, 50000, 'H18FDH', 'Penarikan Berhasil', NULL, '2023-08-14 03:22:33', '2023-08-14 03:22:33'),
(4, 4, 9, 3000, 'E91WOV', 'Penarikan Berhasil', NULL, '2023-08-14 03:44:22', '2023-08-14 03:44:22'),
(5, 4, 9, 200, 'F56JIW', 'Penarikan Berhasil', NULL, '2023-08-14 03:50:57', '2023-08-14 03:50:57'),
(6, 4, 9, 10, 'H63ZUH', 'Penarikan Berhasil', 'silahkan datang ke bank sampah untuk menukar saldo', '2023-08-14 04:06:30', '2023-08-14 04:06:30'),
(7, 4, 9, 10, 'K64ZQR', 'Penarikan Berhasil', 'Silahkan datang ke bank sampah besok', '2023-08-14 04:07:57', '2023-08-14 04:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_sampahs`
--

CREATE TABLE `penjualan_sampahs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_penjualan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_nasabah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan_sampahs`
--

INSERT INTO `penjualan_sampahs` (`id`, `created_at`, `updated_at`, `status_penjualan`, `id_nasabah`) VALUES
(56, '2023-07-30 20:03:18', '2023-07-31 01:55:10', 'Penjualan Berhasil', 4),
(57, '2023-07-31 01:55:52', '2023-07-31 01:56:59', 'Penjualan Berhasil', 4),
(58, '2023-08-02 15:22:01', '2023-08-02 15:24:06', 'Penjualan Berhasil', 4),
(63, '2023-08-02 20:24:18', '2023-08-03 01:51:15', 'Penjualan Berhasil', 4),
(64, '2023-08-06 15:08:50', '2023-08-06 15:08:50', 'Penjualan Berhasil', 4),
(73, '2023-08-09 09:24:12', '2023-08-09 09:24:12', 'Penjualan Berhasil', 4),
(74, '2023-08-09 14:02:42', '2023-08-09 15:33:54', 'Penjualan Berhasil', 4),
(79, '2023-08-10 03:45:00', '2023-08-10 07:11:43', 'Penjualan Berhasil', 4),
(80, '2023-08-10 06:11:43', '2023-08-10 07:12:01', 'Penjualan Berhasil', 8),
(81, '2023-08-10 07:16:07', '2023-08-10 07:17:29', 'Penjualan Berhasil', 4),
(82, '2023-08-12 07:26:14', '2023-08-12 07:27:08', 'Penjualan Berhasil', 4),
(83, '2023-08-19 20:07:16', '2023-08-19 20:07:16', 'Menunggu Konfirmasi Admin', 4);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_sampah_details`
--

CREATE TABLE `penjualan_sampah_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_sampah` int(11) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `id_penjualan_sampah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan_sampah_details`
--

INSERT INTO `penjualan_sampah_details` (`id`, `created_at`, `updated_at`, `id_sampah`, `kuantitas`, `total`, `id_penjualan_sampah`) VALUES
(42, NULL, NULL, 2, 1, 2500, 56),
(43, NULL, '2023-07-31 01:55:10', 3, 2, 2000, 56),
(44, NULL, '2023-07-31 01:56:59', 1, 9, 22500, 57),
(45, NULL, '2023-08-02 15:24:06', 3, 2, 2000, 58),
(47, NULL, '2023-08-03 01:51:15', 3, 1, 1000, 63),
(56, NULL, NULL, 5, 10, 25000, 73),
(61, NULL, '2023-08-10 07:11:43', 2, 2, 5000, 79),
(62, NULL, '2023-08-10 07:12:01', 2, 2, 5000, 80),
(63, NULL, '2023-08-10 07:17:29', 1, 2, 5000, 81),
(64, NULL, NULL, 2, 2, 5000, 82),
(65, NULL, '2023-08-12 07:27:08', 5, 1, 1200, 82),
(66, NULL, NULL, 2, 2, 5000, 83);

-- --------------------------------------------------------

--
-- Table structure for table `saldos`
--

CREATE TABLE `saldos` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `jumlah_saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saldos`
--

INSERT INTO `saldos` (`id`, `created_at`, `updated_at`, `id_user`, `jumlah_saldo`) VALUES
(1, NULL, '2023-07-17 12:38:31', 1, 0),
(2, '2023-06-20 22:39:40', '2023-08-14 03:12:11', 4, 94500),
(3, '2023-07-02 07:15:06', '2023-08-10 07:12:01', 8, 5000),
(4, '2023-07-02 19:53:07', '2023-08-14 04:07:57', 9, 280),
(5, '2023-07-25 21:55:25', '2023-07-30 18:35:31', 12, 2000),
(6, '2023-07-25 21:56:30', '2023-07-25 21:56:30', 13, 0),
(7, '2023-07-29 22:08:47', '2023-07-29 22:08:47', 15, 0),
(8, '2023-07-29 23:11:38', '2023-07-29 23:11:38', 16, 0),
(9, '2023-07-29 23:33:36', '2023-07-29 23:33:36', 18, 0),
(10, '2023-07-30 19:18:31', '2023-07-30 19:18:31', 19, 0),
(11, '2023-07-30 19:32:59', '2023-07-30 19:32:59', 20, 0),
(12, '2023-07-30 20:05:48', '2023-07-30 20:05:48', 21, 0),
(13, '2023-07-31 01:34:01', '2023-07-31 01:34:01', 22, 0),
(14, '2023-07-31 02:22:11', '2023-07-31 02:22:11', 23, 0),
(15, '2023-08-02 14:43:40', '2023-08-02 14:43:40', 25, 0),
(16, '2023-08-02 14:53:42', '2023-08-02 14:53:42', 26, 0),
(17, '2023-08-04 04:16:41', '2023-08-04 04:16:41', 29, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_sampahs`
--

CREATE TABLE `transaksi_sampahs` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_sampah` int(11) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `jenis_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_jualbeli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_sampahs`
--

INSERT INTO `transaksi_sampahs` (`id`, `created_at`, `updated_at`, `id_sampah`, `kuantitas`, `tanggal_transaksi`, `jenis_transaksi`, `id_jualbeli`) VALUES
(65, '2023-07-30 20:03:18', '2023-07-30 20:03:18', 2, 1, '2023-07-31', 'Penjualan', 56),
(66, '2023-07-31 01:55:52', '2023-07-31 01:55:52', 1, 9, '2023-07-31', 'Penjualan', 57),
(68, '2023-08-02 15:22:01', '2023-08-02 15:22:01', 3, 2, '2023-08-02', 'Penjualan', 58),
(69, '2023-08-02 20:24:18', '2023-08-02 20:24:18', 3, 1, '2023-08-03', 'Penjualan', 63),
(70, '2023-08-06 15:08:50', '2023-08-06 15:08:50', 2, 20, '2023-08-06', 'Penjualan', 64),
(76, '2023-08-09 09:24:12', '2023-08-09 09:24:12', 5, 10, '2023-08-09', 'Penjualan', 73),
(77, '2023-08-09 14:02:42', '2023-08-09 14:02:42', 1, 2, '2023-08-09', 'Penjualan', 74),
(78, '2023-08-10 03:36:13', '2023-08-10 03:36:13', 2, 2, '2023-08-10', 'Penjualan', 75),
(79, '2023-08-10 03:39:26', '2023-08-10 03:39:26', 2, 2, '2023-08-10', 'Penjualan', 77),
(80, '2023-08-10 03:41:29', '2023-08-10 03:41:29', 2, 2, '2023-08-10', 'Penjualan', 78),
(81, '2023-08-10 03:45:00', '2023-08-10 03:45:00', 2, 2, '2023-08-10', 'Penjualan', 79),
(82, '2023-08-10 06:11:43', '2023-08-10 06:11:43', 2, 2, '2023-08-10', 'Penjualan', 80),
(83, '2023-08-10 07:16:07', '2023-08-10 07:16:07', 1, 2, '2023-08-10', 'Penjualan', 81),
(84, '2023-08-12 07:26:14', '2023-08-12 07:26:14', 2, 2, '2023-08-12', 'Penjualan', 82),
(85, '2023-08-14 03:06:37', '2023-08-14 03:06:37', 1, 5, '2023-08-14', 'Penjualan', 83),
(86, '2023-08-14 03:09:45', '2023-08-14 03:09:45', 2, 2, '2023-08-14', 'Penjualan', 84),
(87, '2023-08-14 05:34:29', '2023-08-14 05:34:29', 1, 2, '2023-08-14', 'Penjualan', 86),
(88, '2023-08-14 05:35:13', '2023-08-14 05:35:13', 2, 2, '2023-08-14', 'Penjualan', 87),
(89, '2023-08-19 20:07:16', '2023-08-19 20:07:16', 2, 2, '2023-08-20', 'Penjualan', 83);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomorHp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noTabungan` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','deactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `name`, `email`, `nomorHp`, `role`, `noTabungan`, `jabatan`, `password`, `kelurahan`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, '1234512234564321', 'Merry Rachmawati', 'admin@admin.com', '08953234234', 'admin', '', 'Admin Bank Sampah Induk', '$2y$10$mADZsV8Rf84/Uq38DTm/ieFuG81MNRKbk8boE3lJ.70py43Bvf91G', '', 'Bekasi', 'active', NULL, '2023-07-25 11:52:11'),
(4, '321321321321', 'Junaedii', 'nasabah@gmail.com', '08383223423', 'nasabah', '', 'Direktur Bank Sampah', '$2y$10$mADZsV8Rf84/Uq38DTm/ieFuG81MNRKbk8boE3lJ.70py43Bvf91G', '', 'Premier Savanna Blok O', 'active', '2023-06-20 22:39:40', '2023-07-30 15:17:10'),
(5, '129378187', 'Petugas 2', 'petugas@gmail.com', '023123123', 'petugas', '', NULL, '$2y$10$mADZsV8Rf84/Uq38DTm/ieFuG81MNRKbk8boE3lJ.70py43Bvf91G', '', 'Subang', 'active', '2023-06-22 10:39:45', '2023-08-09 04:23:14'),
(7, '1231312931', 'Mustakim', 'dirut@gmail.com', '0223123232', 'reviewer', '', 'Direktur Bank Sampah', '$2y$10$mADZsV8Rf84/Uq38DTm/ieFuG81MNRKbk8boE3lJ.70py43Bvf91G', '', 'Subang', 'active', '2023-06-22 10:40:27', '2023-08-09 04:25:28'),
(8, '1231317212', 'Safa Aulia', 'safa@gmail.com', '0892361526', 'nasabah', '', NULL, '$2y$10$m2eZGus9oY5xyO2crloEfOEYx98uSYVBpNcLFhczgpql3Vzi1tShS', '', 'Jakarta Selatan', 'active', '2023-07-02 07:15:06', '2023-07-02 07:15:06'),
(9, '212312313931', 'Taupik', 'taupik@gmail.com', '0892313464', 'nasabah', '', NULL, '$2y$10$zN8XIzM/JeRRLtJlwbQ0O.0hePmZIQaoIIXuwrlor49X.vDvEL15C', '', 'Subang', 'active', '2023-07-02 19:53:07', '2023-07-02 19:53:07'),
(10, '23123123612', 'Hari Rubiyanto', 'carla@gmail.com', '089237374236', 'reviewer', '', 'Kepala Dinas Lingkungan Hidup', '$2y$10$gYAy9Njo.wez.8.fvpqi..6Lt29/i4STmEqPCjXZo6eKB2gANs69q', '', 'Disitu', 'active', '2023-07-05 20:41:13', '2023-08-09 04:25:02'),
(11, '65322443456', 'Petugas 1', 'petugas2@gmail.com', '083993424342', 'petugas', '', NULL, '$2y$10$mIdbrKv0q4AgpIIISZyFROPEhIWhhHWr.qCeojJSJEgxXtsicgaOe', '', 'subang', 'active', '2023-07-16 03:31:52', '2023-08-09 04:23:02'),
(12, '65324345678', 'Nur', 'nur1@gmail.com', '089645236432', 'nasabah', '', 'Direktur Bank Sampah', '$2y$10$cFp55swfLea5KUvUMvqyZePhBNj.eish00OrJIxBxwYOJPh0C16BW', '', 'cibogo', 'active', '2023-07-25 21:55:25', '2023-07-25 21:55:25'),
(13, '23232134823', 'Nur', 'nur2@gmail.com', '089324623472', 'nasabah', '12312313', NULL, '$2y$10$X5LiXLy9FMXLAL8vfP1SL.JioTIPEYjp.JB53rxcU4uAFY4Rbbf86', '', 'cibogo', 'active', '2023-07-25 21:56:30', '2023-07-30 19:55:33'),
(20, '2313712813123', 'PT Hendrians Gourp', 'taupikhendriansyah@gmail.com', '0895340079534', 'pengepul', '', NULL, '$2y$10$HkLi7WFz3miGPSbiRwvPS.pphCFRgcwisIf2/vj5reXP6ti9vgLKS', '', 'subang', 'active', '2023-07-30 19:32:59', '2023-07-31 02:29:47'),
(21, '011010', 'pengepul', 'pengepul@gmail.com', '101010', 'pengepul', '', NULL, '$2y$10$9Pr1.kthKI4zR5O9zq5eUOQejTke2Kk1iAZAldMZ7.a8t/PKq6ws6', '', 'subang', 'active', '2023-07-30 20:05:48', '2023-07-30 20:06:00'),
(23, '7318195406930002', 'haryati', 'haryati@polsub.ac.id', '082348509871', 'nasabah', '2023073101', '', '$2y$10$GsIlE1VW5QsTt/HSqu/ChulMMrXEuhqbIN9iiqSOB2fQP4O4waVo2', '', 'cibogo', 'active', '2023-07-31 02:22:11', '2023-07-31 02:22:11');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah_indonesia`
--

CREATE TABLE `wilayah_indonesia` (
  `t` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank_sampahs`
--
ALTER TABLE `bank_sampahs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori_sampah` (`id_kategori_sampah`);

--
-- Indexes for table `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal_pengambilan`
--
ALTER TABLE `jadwal_pengambilan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_sampahs`
--
ALTER TABLE `kategori_sampahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_sampahs`
--
ALTER TABLE `pembelian_sampahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_sampah_details`
--
ALTER TABLE `pembelian_sampah_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penarikan_saldo`
--
ALTER TABLE `penarikan_saldo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_sampahs`
--
ALTER TABLE `penjualan_sampahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_sampah_details`
--
ALTER TABLE `penjualan_sampah_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saldos`
--
ALTER TABLE `saldos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_sampahs`
--
ALTER TABLE `transaksi_sampahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank_sampahs`
--
ALTER TABLE `bank_sampahs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal_pengambilan`
--
ALTER TABLE `jadwal_pengambilan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `kategori_sampahs`
--
ALTER TABLE `kategori_sampahs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembelian_sampahs`
--
ALTER TABLE `pembelian_sampahs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `pembelian_sampah_details`
--
ALTER TABLE `pembelian_sampah_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `penarikan_saldo`
--
ALTER TABLE `penarikan_saldo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjualan_sampahs`
--
ALTER TABLE `penjualan_sampahs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `penjualan_sampah_details`
--
ALTER TABLE `penjualan_sampah_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `saldos`
--
ALTER TABLE `saldos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `transaksi_sampahs`
--
ALTER TABLE `transaksi_sampahs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bank_sampahs`
--
ALTER TABLE `bank_sampahs`
  ADD CONSTRAINT `bank_sampahs_ibfk_1` FOREIGN KEY (`id_kategori_sampah`) REFERENCES `kategori_sampahs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
