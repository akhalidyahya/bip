-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2019 at 05:33 PM
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
  `penulis` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `businesses_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE `businesses` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjelasan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `businesses`
--

INSERT INTO `businesses` (`id`, `nama`, `lokasi`, `penjelasan`, `foto`, `batch`, `created_at`, `updated_at`) VALUES
(13, 'Edukasi DKV', 'Depok', '...', NULL, NULL, '2019-07-22 14:07:41', '2019-07-22 14:07:41'),
(14, 'Batik Karakter', 'Depok', '...', NULL, NULL, '2019-07-22 14:14:22', '2019-07-22 14:14:22'),
(15, 'Bakso Kanus', 'Depok', '...', NULL, '2', '2019-07-22 14:20:23', '2019-08-13 16:10:28'),
(16, 'Kenarikuy', 'Depok', '...', NULL, NULL, '2019-07-22 14:24:44', '2019-07-22 14:24:44'),
(17, 'Cultures', 'Depok', '...', NULL, '2', '2019-07-22 14:28:29', '2019-08-13 17:44:57'),
(18, 'Sdmku Shop', 'Depok', '...', NULL, NULL, '2019-07-22 14:31:41', '2019-07-22 14:31:41'),
(19, 'Pancong Meler', 'Depok', '...', NULL, NULL, '2019-07-22 14:35:48', '2019-07-22 14:35:48'),
(20, 'Kelontong Teknik', 'Depok', '...', NULL, NULL, '2019-07-22 14:38:26', '2019-07-22 14:38:26'),
(21, 'Sikat Gigi Bambu', 'Depok', '...', NULL, NULL, '2019-07-22 14:41:17', '2019-07-22 14:41:17'),
(22, 'Waraspace', 'Depok', ',,,', NULL, NULL, '2019-07-22 14:44:43', '2019-07-22 14:44:43'),
(23, 'Kerupuk Sayuran', 'Depok', '...', NULL, NULL, '2019-07-22 14:51:36', '2019-07-22 14:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'BIP', 'entre', '2019-07-20 07:12:59', '2019-07-20 07:12:59'),
(3, 'Coaching Outdoor', 'riset', '2019-07-20 07:46:43', '2019-07-20 07:46:43'),
(4, 'makeit', 'entre', '2019-08-26 14:47:03', '2019-08-26 14:47:03');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelamin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umur` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `angkatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instansi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelompok` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interest` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tindakan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guru` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pertemuan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pemahaman` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterlibatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penugasan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `proyeksi` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `businesses_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `input_by` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `nama`, `kelamin`, `umur`, `angkatan`, `jurusan`, `kelas`, `no_telp`, `email`, `instansi`, `level`, `kelompok`, `pic`, `interest`, `tindakan`, `guru`, `pertemuan`, `pemahaman`, `keterlibatan`, `penugasan`, `proyeksi`, `event_id`, `businesses_id`, `input_by`, `tags`, `updated_at`, `created_at`) VALUES
(11, 'Angga Riansah', 'Laki-laki', NULL, NULL, NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:33:46', '2019-07-22 14:06:52'),
(12, 'Peggy Laras Purwatika', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:19:15', '2019-07-22 14:07:10'),
(13, 'Rifqi Fadhil Dzil Ikram', 'Laki Laki', NULL, '2018', 'akuntansi', 'AK 2B', NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:07:10', '2019-07-22 14:07:10'),
(15, 'Nindya Frasella', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '', 'admin_bip', NULL, '2019-08-13 17:41:30', '2019-07-22 14:07:41'),
(16, 'Yulisa Fadhillah', 'Perempuan', NULL, '2017', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '', 'admin_bip', NULL, '2019-08-13 17:41:28', '2019-07-22 14:07:41'),
(17, 'Jamaludin', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '', 'admin_bip', NULL, '2019-08-13 17:41:32', '2019-07-22 14:07:41'),
(18, 'Dikay (Non BIP)', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '', 'admin_bip', NULL, '2019-08-13 17:41:34', '2019-07-22 14:07:41'),
(19, 'Nida Mufilda', 'Perempuan', NULL, '2018', 'teknik grafika dan penerbitan', 'DG 2A', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:09:23', '2019-07-22 14:09:23'),
(20, 'Sheryl Maria', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:12:10', '2019-07-22 14:12:10'),
(21, 'Okta Ndaru Sulistyo', 'Perempuan', NULL, '2018', 'teknik elektro', 'EC 2A', NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:13:46', '2019-07-22 14:13:46'),
(22, 'Faris Ar Rasyid', 'Laki-Laki', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '14', 'admin_bip', NULL, '2019-07-22 14:14:22', '2019-07-22 14:14:22'),
(23, 'Yoga Aditya Gustira', 'Laki-Laki', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '14', 'admin_bip', NULL, '2019-07-22 14:14:22', '2019-07-22 14:14:22'),
(24, 'Dina Fikri Hayati', 'Perempuan', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '14', 'admin_bip', NULL, '2019-07-22 14:14:22', '2019-07-22 14:14:22'),
(25, 'Prasetya', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '14', 'admin_bip', NULL, '2019-08-13 17:35:22', '2019-07-22 14:14:22'),
(26, 'Qori Refo Qashidi', 'Perempuan', NULL, '2016', 'teknik grafika dan penerbitan', 'DG 6A', NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:16:10', '2019-07-22 14:16:10'),
(27, 'Novi Ridho Juliansah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PNj', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:17:31', '2019-07-22 14:17:31'),
(28, 'Meutia Khairiyah', 'Perempuan', NULL, '2018', 'teknik elektro', 'BM/2A', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:18:27', '2019-07-22 14:18:27'),
(29, 'Monica Anggraini', 'Perempuan', NULL, '2018', 'administrasi niaga', 'AB2B', NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:18:42', '2019-07-22 14:18:42'),
(30, 'Nida Khairunnisa', 'Perempuan', NULL, '2017', 'teknik grafika dan penerbitan', 'DG/4B', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:19:52', '2019-07-22 14:19:52'),
(31, 'Muhammad Febryanto', 'Laki-Laki', NULL, '2017', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '15', 'admin_bip', NULL, '2019-08-18 22:44:50', '2019-07-22 14:20:23'),
(32, 'GLADYS CITRASARI S', 'Perempuan', NULL, '2016', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '', 'admin_bip', NULL, '2019-08-13 16:59:51', '2019-07-22 14:20:23'),
(33, 'DARA TITANIA M', 'Perempuan', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '', 'admin_bip', NULL, '2019-08-13 16:59:35', '2019-07-22 14:20:23'),
(34, 'Arum Sekar Sari', 'Perempuan', NULL, '2017', 'akuntansi', 'AK/4B', NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:33:56', '2019-07-22 14:21:48'),
(35, 'Farhan Yumna Naufal', 'Laki laki', NULL, NULL, NULL, NULL, NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:22:05', '2019-07-22 14:22:05'),
(36, 'Irvan Darmawan', 'Laki Laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:22:45', '2019-07-22 14:22:45'),
(37, 'M. Taqiy Thaheri', 'Laki laki', NULL, NULL, NULL, NULL, NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:23:38', '2019-07-22 14:23:38'),
(38, 'Vira Nabila', 'Perempuan', NULL, '2018', 'akuntansi', 'BKT/2B', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:23:53', '2019-07-22 14:23:53'),
(39, 'Rahmat Ade Surya', 'Laki-laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:24:12', '2019-07-22 14:24:12'),
(40, 'Silvia Agustina', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:24:19', '2019-07-22 14:24:19'),
(41, 'MUHAMMAD GHOZY W.R', 'Laki-Laki', NULL, '2017', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '16', 'admin_bip', NULL, '2019-07-22 14:24:44', '2019-07-22 14:24:44'),
(42, 'IKBAL MAULANA', 'Laki-Laki', NULL, '2017', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '16', 'admin_bip', NULL, '2019-07-22 14:24:44', '2019-07-22 14:24:44'),
(43, 'INNA AMILIA A', 'Perempuan', NULL, '2017', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '16', 'admin_bip', NULL, '2019-07-22 14:24:44', '2019-07-22 14:24:44'),
(44, 'RAMADHINA', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '16', 'admin_bip', NULL, '2019-07-22 14:24:44', '2019-07-22 14:24:44'),
(45, 'Christian Alexandro Pasaribu', 'Laki-laki', NULL, NULL, NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:34:18', '2019-07-22 14:24:47'),
(46, 'Retnoningtyas Dwi Handayani', 'Perempuan', NULL, '2018', 'akuntansi', 'BKT 2B', NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:25:48', '2019-07-22 14:25:48'),
(47, 'Rani Rahmawati', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:26:00', '2019-07-22 14:26:00'),
(48, 'Firdatul nur siam', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:26:17', '2019-07-22 14:26:17'),
(49, 'Putri maurizka', 'Perempuan', NULL, '2018', 'administrasi niaga', 'AB/2B', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:26:46', '2019-07-22 14:26:46'),
(50, 'Pandu Rifqi Ardiansyah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:27:17', '2019-07-22 14:27:17'),
(51, 'Bagas satria', 'Laki-laki', NULL, '2018', 'administrasi niaga', 'AB/2B', NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:34:04', '2019-07-22 14:27:53'),
(52, 'Via Arsita Sari', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:28:10', '2019-07-22 14:28:10'),
(53, 'BAGAS SATRIA', 'Laki-Laki', NULL, '2016', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakrta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '17', 'admin_bip', NULL, '2019-07-22 14:28:29', '2019-07-22 14:28:29'),
(54, 'MUHAMMAD NOUFAL H.', 'Laki-Laki', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '17', 'admin_bip', NULL, '2019-07-22 14:28:29', '2019-07-22 14:28:29'),
(55, 'NURI CAHYANI', 'Perempuan', NULL, '2016', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '17', 'admin_bip', NULL, '2019-07-22 14:28:29', '2019-07-22 14:28:29'),
(56, 'ILHAM HANIF', 'Laki-Laki', NULL, '2017', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '17', 'admin_bip', NULL, '2019-07-22 14:28:29', '2019-07-22 14:28:29'),
(57, 'Nadya aisyah', 'Perempuan', NULL, '2016', 'teknik elektro', 'TT/6A', NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:31:14', '2019-07-22 14:28:37'),
(58, 'Aisyah Adibah', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:28:54', '2019-07-22 14:28:54'),
(59, 'Fikri abyan', 'Laki-laki', NULL, '2017', 'teknik grafika dan penerbitan', 'DG/4B', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:29:23', '2019-07-22 14:29:23'),
(60, 'Helen Surbakti', 'Perempuan', NULL, '2018', 'akuntansi', 'AK2B', NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:29:50', '2019-07-22 14:29:50'),
(61, 'Lifua tuzzahra', 'Perempuan', NULL, '2016', 'teknik grafika dan penerbitan', 'DG/6A', NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:35:39', '2019-07-22 14:30:01'),
(62, 'Zahra Safira', 'Perempua', NULL, NULL, NULL, NULL, NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:31:01', '2019-07-22 14:31:01'),
(63, 'Elita Eradika', 'Perempuan', NULL, '2016', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '18', 'admin_bip', NULL, '2019-07-22 14:31:41', '2019-07-22 14:31:41'),
(64, 'Nur Kholifah', 'Perempuan', NULL, '2016', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '18', 'admin_bip', NULL, '2019-07-22 14:31:41', '2019-07-22 14:31:41'),
(65, 'Rifqi Julputra', 'Laki-laki', NULL, '2016', 'teknik grafika dan penerbitan', 'DG/6A', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:31:48', '2019-07-22 14:31:48'),
(66, 'Alif Nur Vianto', 'Lakilaki', NULL, NULL, NULL, NULL, NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:31:52', '2019-07-22 14:31:52'),
(67, 'Mustika dewi', 'Perempuan', NULL, '2016', 'teknik grafika dan penerbitan', 'DG/6A', NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:32:21', '2019-07-22 14:32:21'),
(68, 'Agung Setia Budi', 'Lakilaki', NULL, NULL, NULL, NULL, NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:32:28', '2019-07-22 14:32:28'),
(69, 'Ilham Kusumaning p.', 'Laki-laki', NULL, '2018', 'teknik informatika dan komputer', 'TMD/2', NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:32:57', '2019-07-22 14:32:57'),
(70, 'Anita Septiani', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:33:13', '2019-07-22 14:33:13'),
(71, 'Firda Yohana', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, 'PNJ', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'BIP', NULL, NULL, NULL, '2019-07-22 14:33:54', '2019-07-22 14:33:54'),
(73, 'ANINDYANARI DIWYAJNA', 'Perempuan', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '19', 'admin_bip', NULL, '2019-07-22 14:35:48', '2019-07-22 14:35:48'),
(74, 'AZZAHRA NADIA', 'Perempuan', NULL, '2018', NULL, NULL, NULL, NULL, 'Politenik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '19', 'admin_bip', NULL, '2019-07-22 14:35:48', '2019-07-22 14:35:48'),
(75, 'REFO TEGAR F.', 'Laki-Laki', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '19', 'admin_bip', NULL, '2019-07-22 14:35:48', '2019-07-22 14:35:48'),
(76, 'KEVIN RIZKY I.', 'Laki-Laki', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '20', 'admin_bip', NULL, '2019-07-22 14:38:26', '2019-07-22 14:38:26'),
(77, 'IBADURRAHMAN N.W', 'Laki-Laki', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '20', 'admin_bip', NULL, '2019-07-22 14:38:26', '2019-07-22 14:38:26'),
(78, 'YARMAN BUDIMAN', 'Laki-Laki', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '20', 'admin_bip', NULL, '2019-07-22 14:38:26', '2019-07-22 14:38:26'),
(79, 'KEVIN CIPUTRA', 'Laki-Laki', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '21', 'admin_bip', NULL, '2019-07-22 14:41:17', '2019-07-22 14:41:17'),
(80, 'NADHIFA AULIA', 'Perempuan', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '21', 'admin_bip', NULL, '2019-07-22 14:41:17', '2019-07-22 14:41:17'),
(81, 'RESYA HUSAINI', 'Perempuan', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '21', 'admin_bip', NULL, '2019-07-22 14:41:17', '2019-07-22 14:41:17'),
(82, 'DEVINA KURNIA SARI', 'Perempuan', NULL, '2017', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '21', 'admin_bip', NULL, '2019-07-22 14:41:17', '2019-07-22 14:41:17'),
(83, 'ARIQ NUR HERMAWAN', 'Laki-Laki', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '22', 'admin_bip', NULL, '2019-07-22 14:44:43', '2019-07-22 14:44:43'),
(84, 'M ZUHDAN ZAIDAN', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '22', 'admin_bip', NULL, '2019-07-22 14:44:43', '2019-07-22 14:44:43'),
(85, 'AHMAD RAIHAN', 'Laki-Laki', NULL, NULL, 'teknik grafika dan penerbitan', NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', NULL, 'admin_bip', NULL, '2019-08-18 17:42:10', '2019-07-22 14:44:43'),
(86, 'HANA SABILA YASARO', 'Perempuan', NULL, '2017', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '23', 'admin_bip', NULL, '2019-07-22 14:51:36', '2019-07-22 14:51:36'),
(87, 'AISYAH ADIBAH', 'Perempuan', NULL, '2017', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '23', 'admin_bip', NULL, '2019-07-22 14:51:36', '2019-07-22 14:51:36'),
(88, 'NIMAH', 'Perempuan', NULL, '2017', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '23', 'admin_bip', NULL, '2019-07-22 14:51:36', '2019-07-22 14:51:36'),
(89, 'Jessica', 'Perempuan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '23', 'admin_bip', NULL, '2019-07-22 14:51:36', '2019-07-22 14:51:36'),
(90, 'ARIQ NUR HERMAWAN', 'Laki-Laki', NULL, '2018', NULL, NULL, NULL, NULL, 'Politeknik Negeri Jakarta', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '24', NULL, NULL, '2019-07-22 14:57:44', '2019-07-22 14:57:44'),
(91, 'M ZUHDAN ZAIDAN', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '24', NULL, NULL, '2019-07-22 14:57:44', '2019-07-22 14:57:44'),
(92, 'AHMAD RAIHAN', 'Laki-Laki', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', '24', NULL, NULL, '2019-07-22 14:57:44', '2019-07-22 14:57:44'),
(94, 'b', 'b', 'b', 'b', 'teknik sipil', 'b', 'b', 'b', 'b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin_bip', NULL, '2019-08-26 14:23:47', '2019-08-26 14:23:47'),
(95, 'a', 'b', 'b', 'b', 'teknik elektro', 'b', 'b', 'b', 'b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'makeit', NULL, 'admin_bip', NULL, '2019-08-26 14:26:20', '2019-08-26 14:26:20'),
(96, 'a', 'a', 'a', 'a', 'akuntansi', 'a', 'a', 'a', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'admin_bip', NULL, '2019-08-26 14:26:30', '2019-08-26 14:26:30'),
(97, 'a', 'a', 'a', 'a', 'akuntansi', 'a', 'a', 'a', 'a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bip', NULL, 'admin_bip', NULL, '2019-08-26 14:26:54', '2019-08-26 14:26:54');

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
(3, 'Admin BIP', 'admin@email.com', NULL, '$2y$10$sJCJjSdfFHDSj8TebHYQUuU5GuCk0Tn5AYI33nGbM5uSjWqPGlIHK', 'bQGnSQfCLSY1HyAApMDrVxHM1KG0WSR9oOYLqweJprpYQ9wmQ5MTVNRgHwmb', '2019-02-13 21:04:52', '2019-02-13 21:04:52', 'admin_bip'),
(4, 'Admin Super', 'super@email.com', NULL, '$2y$10$sJCJjSdfFHDSj8TebHYQUuU5GuCk0Tn5AYI33nGbM5uSjWqPGlIHK', 'MAJl61lc38MbVHhuulk7znqItr9LIfGPwf8PhcG0RpAIytVQ97n4VPHAOwi2', '2019-02-13 21:04:52', '2019-02-13 21:04:52', 'admin_super');

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
-- Indexes for table `businesses`
--
ALTER TABLE `businesses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
