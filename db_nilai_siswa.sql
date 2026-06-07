-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2026 at 12:03 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nilai_siswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_admin@gmail.co|127.0.0.1', 'i:1;', 1780648336),
('laravel_cache_admin@gmail.co|127.0.0.1:timer', 'i:1780648336;', 1780648336),
('laravel_cache_pajar@gmail.com|127.0.0.1', 'i:2;', 1780644473),
('laravel_cache_pajar@gmail.com|127.0.0.1:timer', 'i:1780644473;', 1780644473),
('laravel_cache_rawr@gmail.com|127.0.0.1', 'i:1;', 1780647227),
('laravel_cache_rawr@gmail.com|127.0.0.1:timer', 'i:1780647227;', 1780647227);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint UNSIGNED NOT NULL,
  `id_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_guru` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mata_pelajaran_id` bigint UNSIGNED DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gurus`
--

INSERT INTO `gurus` (`id`, `id_guru`, `nama_guru`, `mata_pelajaran_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '103', 'Wildan', 1, 3, '2026-06-02 14:51:50', '2026-06-02 22:43:51'),
(2, '101', 'adit', 2, 5, '2026-06-02 22:42:54', '2026-06-02 22:42:54'),
(3, '102', 'jaki', 3, 6, '2026-06-02 22:43:32', '2026-06-02 22:43:32'),
(4, '104', 'septian', 4, 7, '2026-06-02 22:44:43', '2026-06-02 22:44:43'),
(5, '105', 'gerard', 5, 8, '2026-06-02 22:45:23', '2026-06-02 22:45:23'),
(6, '107', 'brody', 2, 14, '2026-06-05 01:07:12', '2026-06-05 01:07:12'),
(7, '1234', 'portori', 1, 16, '2026-06-05 01:33:29', '2026-06-05 01:33:29');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajarans`
--

CREATE TABLE `mata_pelajarans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_mapel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_pelajarans`
--

INSERT INTO `mata_pelajarans` (`id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
(1, 'Matematika', '2026-06-02 14:21:00', '2026-06-02 14:21:00'),
(2, 'IPA', '2026-06-02 14:21:00', '2026-06-02 14:21:00'),
(3, 'Bahasa Indonesia', '2026-06-02 14:21:00', '2026-06-02 14:21:00'),
(4, 'IPS', '2026-06-02 14:21:00', '2026-06-02 14:21:00'),
(5, 'Bahasa Inggris', '2026-06-02 14:21:00', '2026-06-02 14:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_06_02_150327_add_role_to_users_table', 1),
(5, '2026_06_02_154451_create_siswas_table', 1),
(6, '2026_06_02_154452_create_mata_pelajarans_table', 1),
(7, '2026_06_02_154456_create_gurus_table', 1),
(8, '2026_06_02_154505_create_nilais_table', 1),
(9, '2026_06_03_065158_add_kelas_to_nilais_table', 2),
(10, '2026_06_04_153552_add_unique_nilai_per_siswa_kelas_mapel_to_nilais_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilais`
--

CREATE TABLE `nilais` (
  `id` bigint UNSIGNED NOT NULL,
  `siswa_id` bigint UNSIGNED NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` bigint UNSIGNED NOT NULL,
  `mata_pelajaran_id` bigint UNSIGNED NOT NULL,
  `nilai_tugas` int NOT NULL,
  `nilai_uts` int NOT NULL,
  `nilai_uas` int NOT NULL,
  `nilai_akhir` decimal(5,2) DEFAULT NULL,
  `status` enum('Lulus','Tidak Lulus') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilais`
--

INSERT INTO `nilais` (`id`, `siswa_id`, `kelas`, `guru_id`, `mata_pelajaran_id`, `nilai_tugas`, `nilai_uts`, `nilai_uas`, `nilai_akhir`, `status`, `created_at`, `updated_at`) VALUES
(10, 1, '3', 1, 1, 80, 88, 88, 85.60, 'Lulus', '2026-06-04 10:09:03', '2026-06-04 10:14:18'),
(11, 3, '1', 2, 2, 80, 70, 90, 81.00, 'Lulus', '2026-06-05 00:24:01', '2026-06-05 00:24:01'),
(13, 8, '5', 1, 1, 100, 100, 100, 100.00, 'Lulus', '2026-06-05 01:32:14', '2026-06-05 01:32:14'),
(14, 2, '2', 1, 1, 77, 77, 77, 77.00, 'Lulus', '2026-06-05 01:34:12', '2026-06-05 01:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('bhlF2zRx5n9X8z84b3KFbRG1p7iY8cuPaFgEDGbV', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQjN0UmZjZTM0SjBPb1loSTZOaDZvbVBnb1hjYUZQVHgydlJ2U2NiVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fX0=', 1780648468);

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint UNSIGNED NOT NULL,
  `nis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nis`, `nama`, `kelas`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1003', 'japar', '3', 2, '2026-06-02 14:47:51', '2026-06-05 00:13:13'),
(2, '1002', 'edra', '2', 4, '2026-06-02 22:42:19', '2026-06-05 01:06:01'),
(3, '1001', 'inu', '1', 9, '2026-06-04 07:29:46', '2026-06-04 07:29:46'),
(4, '1004', 'rijal', '4', 10, '2026-06-05 00:13:50', '2026-06-05 00:13:50'),
(5, '1005', 'ipang', '5', 11, '2026-06-05 00:14:28', '2026-06-05 00:14:28'),
(6, '1006', 'diyo', '6', 12, '2026-06-05 00:15:08', '2026-06-05 00:15:08'),
(8, '1007', 'lawarawar', '5', 15, '2026-06-05 01:31:44', '2026-06-05 01:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','guru','siswa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'siswa',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', NULL, '$2y$12$3Dx1.BdMOPHUdKPniVovOOJcHgRbKctnw0G685ZoGI5HCWkLEjTnK', 'admin', NULL, '2026-06-02 14:21:00', '2026-06-02 14:21:00'),
(2, 'japar', 'japar@gmail.com', NULL, '$2y$12$LVXKpsoUJEt5YSf9lXfP5O2BUAysxBbk3EkvKv.iUX5s1zdkMrRDa', 'siswa', NULL, '2026-06-02 14:47:51', '2026-06-02 14:47:51'),
(3, 'Wildan', 'wildan@gmail.com', NULL, '$2y$12$GxZEcnm7Hce4wwjI8Gab6uqTbGodPgUlGQlraLeFovXeir61wIaQa', 'guru', NULL, '2026-06-02 14:51:50', '2026-06-02 14:51:50'),
(4, 'edra', 'edra@gmail.com', NULL, '$2y$12$6OhvvmC5t2gi62.au/r5Zen4r6m1inXIfGp8eRH73evjPNuGCtHQ.', 'siswa', NULL, '2026-06-02 22:42:19', '2026-06-05 01:06:01'),
(5, 'adit', 'adit@gmail.com', NULL, '$2y$12$e48bvX0ZfY.B.0lJRlR/E.e7kzXnL6g8LrEV4kIWgySrrDSx.qYDO', 'guru', NULL, '2026-06-02 22:42:54', '2026-06-02 22:42:54'),
(6, 'jaki', 'jaki@gmail.com', NULL, '$2y$12$v2AMWKxZqOoThslSLyZt7uj5YZkWvWQK85AiuVYRlLaL/6kynTVnG', 'guru', NULL, '2026-06-02 22:43:32', '2026-06-02 22:43:32'),
(7, 'septian', 'septian@gmail.com', NULL, '$2y$12$Vpw4lZ15BGikb7qW3IvmT.Z/4Lu8OYCgb8K2OtdeWyYzrQk6IF2I2', 'guru', NULL, '2026-06-02 22:44:43', '2026-06-02 22:44:43'),
(8, 'gerard', 'gerad@gmail.com', NULL, '$2y$12$JZStDF2tDFyT4.WKoZbzE.g4B48tjCdOASKbG.MBtYl3QOgptAkbC', 'guru', NULL, '2026-06-02 22:45:23', '2026-06-02 22:45:23'),
(9, 'inu', 'inu@gmail.com', NULL, '$2y$12$SRXcWdBdB6BSMcsrb3MtZO4MlYxCjDNxUv97DjazY4sQfb732KLAG', 'siswa', NULL, '2026-06-04 07:29:46', '2026-06-04 07:29:46'),
(10, 'rijal', 'rijal@gmail.com', NULL, '$2y$12$/GZwY/j6de2Ypbnpw0QFcuqVOiBC70TT1QqXvG1dDFMY3RE1mwtEy', 'siswa', NULL, '2026-06-05 00:13:50', '2026-06-05 00:13:50'),
(11, 'ipang', 'ipang@gmail.com', NULL, '$2y$12$kxHxhz8d5IrB389tyj4tCuDm2Ukg9159.LaPrzs9PqyIBx6qFLm.i', 'siswa', NULL, '2026-06-05 00:14:28', '2026-06-05 00:14:28'),
(12, 'diyo', 'diyo@gmail.com', NULL, '$2y$12$dYqqiNw8uNbhUl1cpqlCrODIfhhr0XUy/XTpEd7DHhXasVmLGF2SC', 'siswa', NULL, '2026-06-05 00:15:08', '2026-06-05 00:15:08'),
(14, 'brody', 'brody@gmail.com', NULL, '$2y$12$6gbf2l3u2Iu9IJCSqKMkUeiGr4smLxmGpKvlhmDc.h2D7Xm/npKWu', 'guru', NULL, '2026-06-05 01:07:12', '2026-06-05 01:07:12'),
(15, 'lawarawar', 'lawar@gmail.com', NULL, '$2y$12$MOgZ5a7azMHW.eDmE.xNkO0WKXFPyM0ie2Cx2i3z58K4llA3cpkc6', 'siswa', NULL, '2026-06-05 01:31:44', '2026-06-05 01:31:53'),
(16, 'portori', 'portori@gmail.com', NULL, '$2y$12$s9Q0kJDgViV3bbDKV42uX.0aKPPYVSjLr/Od/IUUu.MKISdPz4QxO', 'guru', NULL, '2026-06-05 01:33:29', '2026-06-05 01:33:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gurus_id_guru_unique` (`id_guru`),
  ADD KEY `gurus_mata_pelajaran_id_foreign` (`mata_pelajaran_id`),
  ADD KEY `gurus_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilais`
--
ALTER TABLE `nilais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilais_siswa_id_foreign` (`siswa_id`),
  ADD KEY `nilais_guru_id_foreign` (`guru_id`),
  ADD KEY `nilais_mata_pelajaran_id_foreign` (`mata_pelajaran_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswas_nis_unique` (`nis`),
  ADD KEY `siswas_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `nilais`
--
ALTER TABLE `nilais`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gurus`
--
ALTER TABLE `gurus`
  ADD CONSTRAINT `gurus_mata_pelajaran_id_foreign` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajarans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `gurus_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilais`
--
ALTER TABLE `nilais`
  ADD CONSTRAINT `nilais_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `gurus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilais_mata_pelajaran_id_foreign` FOREIGN KEY (`mata_pelajaran_id`) REFERENCES `mata_pelajarans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilais_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
