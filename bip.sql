-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2019 at 11:33 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bip`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendapatan` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businesses_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `anggotas`
--

CREATE TABLE `anggotas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `angkatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instansi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `businesses_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bisnis`
--

CREATE TABLE `bisnis` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendapatan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjelasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bisnis`
--

INSERT INTO `bisnis` (`id`, `nama`, `lokasi`, `pendapatan`, `penjelasan`, `foto`, `created_at`, `updated_at`) VALUES
(12, 'Secure parking', 'UI', '0', 'loem ipsum dalor', NULL, '2019-07-16 12:19:34', '2019-07-16 12:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `kolams`
--

CREATE TABLE `kolams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kolams`
--

INSERT INTO `kolams` (`id`, `name`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'BIP', 'entrepreneur', '2019-07-20 07:12:59', '2019-07-20 07:12:59'),
(3, 'Coaching Outdoor', 'riset', '2019-07-20 07:46:43', '2019-07-20 07:46:43');

-- --------------------------------------------------------

--
-- Table structure for table `makeits`
--

CREATE TABLE `makeits` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instansi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_18_053433_create_bisnis_table', 2),
(4, '2019_03_18_053649_create_anggotas_table', 3),
(5, '2019_03_18_053947_add_fk_anggota_bisnis', 4),
(6, '2019_03_18_060649_add_table_column_bisnis', 5),
(7, '2019_03_18_141723_create_activities_table', 6),
(8, '2019_03_19_075417_update_table_anggotas', 7),
(9, '2019_06_11_094825_udate_table_users', 8),
(10, '2019_03_11_111403_create_make_its_table', 9),
(11, '2019_04_03_144856_create_pembinaans_table', 10),
(12, '2019_04_04_173551_update_pembinaan_table', 11),
(13, '2019_07_20_135344_create_kolams_table', 12),
(14, '2019_07_20_140654_update_table_kolam', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembinaans`
--

CREATE TABLE `pembinaans` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelamin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angkatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instansi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelompok` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tindakan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `murabbi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liqo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bisnis` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemahaman` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterlibatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penugasan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proyeksi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kolam` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `businesses_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembinaans`
--

INSERT INTO `pembinaans` (`id`, `created_at`, `updated_at`, `nama`, `kelamin`, `umur`, `angkatan`, `jurusan`, `kelas`, `no_telp`, `email`, `instansi`, `status`, `kelompok`, `pic`, `interest`, `tindakan`, `murabbi`, `liqo`, `bisnis`, `pemahaman`, `keterlibatan`, `penugasan`, `proyeksi`, `kolam`, `businesses_id`) VALUES
(6, '2019-07-12 22:49:53', '2019-07-12 22:49:53', 'John doe', 'Laki-laki', NULL, '2016', NULL, NULL, '081208187293', 'john@email.com', 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '2019-07-16 12:19:34', '2019-07-16 12:19:34', 'a', 'a', NULL, 'a', NULL, NULL, 'a', 'aa', 'a', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '12'),
(9, '2019-07-16 12:19:34', '2019-07-16 12:19:34', 'b', 'b', NULL, 'b', NULL, NULL, 'b', 'bb', 'b', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '12'),
(10, '2019-07-16 12:21:49', '2019-07-16 12:21:49', 'c', 'c', 'c', 'cc', 'c', 'c', 'c', 'c', 'cc', '1', 'c', 'cc', 'c', 'c', 'c', 'c', 'cc', 'c', 'c', 'c', 'cc', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(3, 'Admin BIP', 'admin@email.com', NULL, '$2y$10$sJCJjSdfFHDSj8TebHYQUuU5GuCk0Tn5AYI33nGbM5uSjWqPGlIHK', 'SkbnFw4Jr6LXgNyBwduDuKmJ04dVG3HN7PXnNVxFrAZzvtRfir7RxAmrayxF', '2019-02-13 21:04:52', '2019-02-13 21:04:52', 'bip'),
(4, 'Admin ADP', 'adp@email.com', NULL, '$2y$10$sJCJjSdfFHDSj8TebHYQUuU5GuCk0Tn5AYI33nGbM5uSjWqPGlIHK', 'QShUbZDjLsNZnTK6YjYXIdlRY5pEoAe9f77hgogfdjORudCebKeJ1ZmlsKpy', '2019-02-13 21:04:52', '2019-02-13 21:04:52', 'ikhwah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_businesses_id_foreign` (`businesses_id`);

--
-- Indexes for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `anggotas_businesses_id_foreign` (`businesses_id`);

--
-- Indexes for table `bisnis`
--
ALTER TABLE `bisnis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kolams`
--
ALTER TABLE `kolams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makeits`
--
ALTER TABLE `makeits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembinaans`
--
ALTER TABLE `pembinaans`
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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `anggotas`
--
ALTER TABLE `anggotas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bisnis`
--
ALTER TABLE `bisnis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kolams`
--
ALTER TABLE `kolams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `makeits`
--
ALTER TABLE `makeits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pembinaans`
--
ALTER TABLE `pembinaans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_businesses_id_foreign` FOREIGN KEY (`businesses_id`) REFERENCES `bisnis` (`id`);

--
-- Constraints for table `anggotas`
--
ALTER TABLE `anggotas`
  ADD CONSTRAINT `anggotas_businesses_id_foreign` FOREIGN KEY (`businesses_id`) REFERENCES `bisnis` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
