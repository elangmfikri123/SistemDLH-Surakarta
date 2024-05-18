-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Agu 2022 pada 14.59
-- Versi server: 5.7.33
-- Versi PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugasakhir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `laporan_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_lampiran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`, `created_at`, `updated_at`) VALUES
(1, 'Banjarsari', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(2, 'Jebres', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(3, 'Laweyan', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(4, 'Pasar Kliwon', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(5, 'Serengan', '2022-08-23 01:02:48', '2022-08-23 01:02:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelurahan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id`, `kecamatan_id`, `nama_kelurahan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Banyuanyar', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(2, 1, 'Banjarsari', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(3, 1, 'Gilingan', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(4, 1, 'Joglo', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(5, 1, 'Kadipiro', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(6, 1, 'Keprabon', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(7, 1, 'Kestalan', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(8, 1, 'Ketelan', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(9, 1, 'Manahan', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(10, 1, 'Mangkubumen', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(11, 1, 'Nusukan', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(12, 1, 'Punggawan', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(13, 1, 'Setabelan', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(14, 1, 'Sumber', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(15, 1, 'Timuran', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(16, 2, 'Gandekan', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(17, 2, 'Jagalan', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(18, 2, 'Jebres', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(19, 2, 'Kepatihan Kulon', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(20, 2, 'Kepatihan Wetan', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(21, 2, 'Mojosongo', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(22, 2, 'Pucang Sawit', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(23, 2, 'Purwodiningratan', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(24, 2, 'Sewu', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(25, 2, 'Sudiroprajan', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(26, 2, 'Tegalharjo', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(27, 3, 'Bumi', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(28, 3, 'Jajar', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(29, 3, 'Karangasem', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(30, 3, 'Kerten', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(31, 3, 'Laweyan', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(32, 3, 'Pajang', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(33, 3, 'Panularan', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(34, 3, 'Penumping', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(35, 3, 'Purwosari', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(36, 3, 'Sondakan', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(37, 3, 'Sriwedari', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(38, 4, 'Baluwarti', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(39, 4, 'Gajahan', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(40, 4, 'Joyosuran', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(41, 4, 'Kampung Baru', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(42, 4, 'Kauman', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(43, 4, 'Kedung', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(44, 4, 'Lumbu', '2022-08-23 01:02:49', '2022-08-23 01:02:49'),
(45, 4, 'Mojo', '2022-08-23 01:02:50', '2022-08-23 01:02:50'),
(46, 4, 'Pasar Kliwon', '2022-08-23 01:02:50', '2022-08-23 01:02:50'),
(47, 4, 'Sangkrah', '2022-08-23 01:02:50', '2022-08-23 01:02:50'),
(48, 4, 'Semanggi', '2022-08-23 01:02:50', '2022-08-23 01:02:50'),
(49, 5, 'Danukusuman', '2022-08-23 01:02:50', '2022-08-23 01:02:50'),
(50, 5, 'Jayengan', '2022-08-23 01:02:50', '2022-08-23 01:02:50'),
(51, 5, 'Joyotakan', '2022-08-23 01:02:50', '2022-08-23 01:02:50'),
(52, 5, 'Kemlayan', '2022-08-23 01:02:50', '2022-08-23 01:02:50'),
(53, 5, 'Kratonan', '2022-08-23 01:02:50', '2022-08-23 01:02:50'),
(54, 5, 'Serengan', '2022-08-23 01:02:50', '2022-08-23 01:02:50'),
(55, 5, 'Tipes', '2022-08-23 01:02:50', '2022-08-23 01:02:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_06_13_115246_create_table_laboratorium', 1),
(5, '2022_06_13_115304_create_table_bidang', 1),
(6, '2022_06_27_133559_create_table_pimpinan', 1),
(7, '2022_07_02_050756_create_status', 1),
(8, '2022_07_04_090710_create_nib', 1),
(9, '2022_07_04_094222_create_kecamatan', 1),
(10, '2022_07_06_145713_create_kelurahan', 1),
(11, '2022_07_06_150135_create_table_perusahaan', 1),
(12, '2022_07_06_150231_create_table_laporan', 1),
(13, '2022_07_08_135013_create_table_batasuji', 1),
(14, '2022_07_24_035248_create_feedback', 1),
(15, '2022_08_23_110746_create_table_lokasisampling', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pengajuan', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(2, 'Disetujui', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(3, 'Ditolak', '2022-08-23 01:02:48', '2022-08-23 01:02:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_batas_uji`
--

CREATE TABLE `table_batas_uji` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `laporan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_uji` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batas_atas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batas_bawah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `table_batas_uji`
--

INSERT INTO `table_batas_uji` (`id`, `laporan_id`, `nama_uji`, `batas_atas`, `batas_bawah`, `created_at`, `updated_at`) VALUES
(1, 1, 'jmlh_ph', '9', '6', '2022-08-23 02:01:28', '2022-08-23 02:01:28'),
(2, 1, 'jmlh_suhu', '30', '0', '2022-08-23 02:01:28', '2022-08-23 02:01:28'),
(3, 1, 'jmlh_amoniak', '0,1', '0', '2022-08-23 02:01:28', '2022-08-23 02:01:28'),
(4, 1, 'jmlh_pshospat', '2', '0', '2022-08-23 02:01:28', '2022-08-23 02:01:28'),
(5, 1, 'jmlh_tss', '30', '0', '2022-08-23 02:01:28', '2022-08-23 02:01:28'),
(6, 1, 'jmlh_bod', '80', '0', '2022-08-23 02:01:28', '2022-08-23 02:01:28'),
(7, 1, 'jmlh_cod', '30', '0', '2022-08-23 02:01:28', '2022-08-23 02:01:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_bidang`
--

CREATE TABLE `table_bidang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_bidang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `table_bidang`
--

INSERT INTO `table_bidang` (`id`, `user_id`, `nama_bidang`, `created_at`, `updated_at`) VALUES
(1, 1, 'Rumah Sakit', '2022-08-23 01:02:50', '2022-08-24 09:01:42'),
(2, 1, 'Perhotelan', '2022-08-23 01:02:50', '2022-08-23 01:02:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_laboratorium`
--

CREATE TABLE `table_laboratorium` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_lab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telf_lab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_lab` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nonaktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `table_laboratorium`
--

INSERT INTO `table_laboratorium` (`id`, `user_id`, `nama_lab`, `alamat_lab`, `telf_lab`, `email_lab`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'BBTKL Yogyakarta', 'Yogyakarta', '08377373787', 'bbtklyogyakarta@gmail.com', 'aktif', '2022-08-23 01:56:56', '2022-08-23 01:58:12'),
(2, 3, 'Mowardi Laboratorium', 'Jebres', '08377373777', 'labmowardi@gmail.com', 'aktif', '2022-08-23 02:12:31', '2022-08-23 02:13:24'),
(3, 4, 'BBTPPI semarang', 'Semarang', '08377373787', 'btttpsemarang@gmail.com', 'aktif', '2022-08-23 02:20:05', '2022-08-23 02:21:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_laporan`
--

CREATE TABLE `table_laporan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `laboratorium_id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_sampling` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parameter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_sampling` date NOT NULL,
  `filescan_laporan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jmlh_inlet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_outlet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_debit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_ph` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_suhu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_tss` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_tds` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_bod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_amoniak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_minyak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_caliform` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_bakteri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_mbas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_sulfida` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_nitrat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_nitrit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_pshospat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_fenol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_khorm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_seng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_klorida` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_klor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_fluorida` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_warna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_cod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_produksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_hunian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jmlh_bed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `table_laporan`
--

INSERT INTO `table_laporan` (`id`, `user_id`, `laboratorium_id`, `perusahaan_id`, `status_id`, `kode`, `nama_petugas`, `jenis_sampling`, `parameter`, `tanggal_sampling`, `filescan_laporan`, `jmlh_inlet`, `jmlh_outlet`, `jmlh_debit`, `jmlh_ph`, `jmlh_suhu`, `jmlh_tss`, `jmlh_tds`, `jmlh_bod`, `jmlh_amoniak`, `jmlh_minyak`, `jmlh_caliform`, `jmlh_bakteri`, `jmlh_mbas`, `jmlh_sulfida`, `jmlh_nitrat`, `jmlh_nitrit`, `jmlh_pshospat`, `jmlh_fenol`, `jmlh_khorm`, `jmlh_seng`, `jmlh_klorida`, `jmlh_klor`, `jmlh_fluorida`, `jmlh_warna`, `jmlh_cod`, `jmlh_produksi`, `jmlh_hunian`, `jmlh_bed`, `created_at`, `updated_at`) VALUES
(1, 5, 1, 1, 1, 'DLH0001', 'Elang Muhammad Fikhri', 'Inlet', 'Industri', '2022-08-17', '1661250996_HASIL UJI LAB PX KIMIA INLET IPAL JUN \'22.pdf', NULL, NULL, NULL, '7.4', '24.3', '10', NULL, '21.9', '0.2126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.781', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '53.3', NULL, NULL, NULL, '2022-08-23 02:00:33', '2022-08-23 03:36:36'),
(2, 5, 1, 1, 1, 'DLH0002', 'Elang Muhammad Fikhri', 'Outlet', 'Industri', '2022-08-17', '1661250984_HASIL UJI LAB PX KIMIA OUTLET IPAL JUNI \'22.pdf', NULL, NULL, NULL, '7.7', '24.2', '5', NULL, '2.4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.736', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11.3', NULL, NULL, NULL, '2022-08-23 02:08:27', '2022-08-23 03:36:24'),
(3, 3, 2, 2, 1, 'DLH0003', 'Elang Muhammad Fikhri', 'Titik Pantau', 'Industri', '2022-08-20', '1661251140_MUG APICS.pdf', NULL, NULL, NULL, '7.4', '22', '8', NULL, '2.4', '0.0067', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '90', NULL, NULL, NULL, '2022-08-23 02:15:14', '2022-08-23 03:39:00'),
(4, 4, 3, 3, 1, 'DLH0004', 'Elang Muhammad Fikhri', 'Outlet', 'Industri', '2022-08-22', '1661246549_HASIL UJI LAB PX KIMIA OUTLET IPAL JUNI \'22.pdf', NULL, NULL, NULL, '7.4', '25.3', '8', NULL, '21.9', '0.2126', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.7881', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '31', NULL, NULL, NULL, '2022-08-23 02:22:29', '2022-08-23 02:22:29'),
(5, 5, 1, 1, 1, 'DLH0005', 'Elang Muhammad Fikhri', 'Outlet', 'Industri', '2022-08-25', '1661250932_HASIL UJI LAB PX KIMIA OUTLET IPAL JUNI \'22.pdf', NULL, NULL, NULL, '244', '2', '2', NULL, '2', '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, '2022-08-23 03:24:01', '2022-08-23 03:35:32'),
(6, 5, 1, 1, 1, 'DLH0006', 'Elang Muhammad Fikhri', 'Inlet', 'Industri', '2022-08-24', '1661250918_MUG APICS.pdf', NULL, NULL, NULL, '7.5', '8', '99', NULL, '12.3', '12.3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12', NULL, NULL, NULL, '2022-08-23 03:33:33', '2022-08-23 03:35:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_lokasisampling`
--

CREATE TABLE `table_lokasisampling` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lokasi_sampling` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `table_lokasisampling`
--

INSERT INTO `table_lokasisampling` (`id`, `lokasi_sampling`, `created_at`, `updated_at`) VALUES
(1, 'Inlet', '2022-08-23 04:18:52', '2022-08-23 04:18:52'),
(2, 'Outlet', '2022-08-23 04:18:53', '2022-08-23 04:18:53'),
(3, 'Titik Pantau', '2022-08-23 04:18:53', '2022-08-23 04:18:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_nib`
--

CREATE TABLE `table_nib` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_izin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `table_nib`
--

INSERT INTO `table_nib` (`id`, `user_id`, `nama_perusahaan`, `no_izin`, `created_at`, `updated_at`) VALUES
(1, 3, 'RS MOWARDI', '090888353344', '2022-08-23 01:50:30', '2022-08-23 01:50:30'),
(2, 4, 'Fave Hotel Solo', '09088835353', '2022-08-23 01:51:01', '2022-08-23 01:51:01'),
(3, 5, 'JIH SOLO', '09088835353', '2022-08-23 01:51:22', '2022-08-23 01:51:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_perusahaan`
--

CREATE TABLE `table_perusahaan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nib_id` bigint(20) UNSIGNED NOT NULL,
  `bidang_id` bigint(20) UNSIGNED NOT NULL,
  `pimpinan_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `kelurahan_id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `alamat_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telf_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personil_ppa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personil_ipal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tikor_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tikor_ipal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tikor_oval` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tikor_pantau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filescan_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `table_perusahaan`
--

INSERT INTO `table_perusahaan` (`id`, `user_id`, `nib_id`, `bidang_id`, `pimpinan_id`, `status_id`, `kelurahan_id`, `kecamatan_id`, `alamat_perusahaan`, `email_perusahaan`, `telf_perusahaan`, `personil_ppa`, `personil_ipal`, `tikor_perusahaan`, `tikor_ipal`, `tikor_oval`, `tikor_pantau`, `filescan_perusahaan`, `foto_perusahaan`, `created_at`, `updated_at`) VALUES
(1, 5, 3, 1, 1, 2, 28, 3, 'Jl. Adi Sucipto No.118, Jajar, Kec. Laweyan, Kota Surakarta, Jawa Tengah 57144', 'jihsolo@gmail.com', '08999277272', 'Diki Sofyana Arbi', 'Diki Sofyana Arbi', '-7.549220, 110.790287', '-7.549220, 110.790287', '-7.549220, 110.790287', '-7.549220, 110.790287', '1661249877_sertifikat APICS.docx', '1661249877_11RS-JIH-Solo-Soloposfm.com_.jpg', '2022-08-23 01:55:40', '2022-08-23 03:17:57'),
(2, 3, 1, 1, 2, 2, 18, 2, 'Jl. Kolonel Sutarto No.132, Jebres, Kec. Jebres, Kota Surakarta, Jawa Tengah 57126', 'mowardisolo@gmail.com', '(0271) 711722', 'Elang', 'Elang', '-7.5588324, 110.8421497', '-7.5588324, 110.8421497', '-7.5588324, 110.8421497', '-7.5588324, 110.8421497', '1661245911_1659332629_1659098583_Selesai Magang.pdf', '1661245911_RS Mowardi.jpg', '2022-08-23 02:11:51', '2022-08-23 02:12:57'),
(3, 4, 2, 2, 3, 2, 30, 3, 'Jl. Adi Sucipto No.60, Kerten, Kec. Laweyan, Kota Surakarta, Jawa Tengah 57143', 'favehotelsolo@gmail.com', '(0271) 7469100', 'Habib', 'Habib', '-7.5519634, 110.7952372', '-7.5519634, 110.7952372', '-7.5519634, 110.7952372', '-7.5519634, 110.7952372', '1661246365_1659332629_1659098583_Selesai Magang.pdf', '1661246365_FaveHotel.jpg', '2022-08-23 02:19:25', '2022-08-23 02:20:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `table_pimpinan`
--

CREATE TABLE `table_pimpinan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telf_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pimpinan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `table_pimpinan`
--

INSERT INTO `table_pimpinan` (`id`, `user_id`, `nama_pimpinan`, `alamat_pimpinan`, `telf_pimpinan`, `email_pimpinan`, `created_at`, `updated_at`) VALUES
(1, 5, 'Elang Muhammad Fikhri', 'Jebres', '085888372832', 'elangmfikri123@gmail.com', '2022-08-23 01:52:33', '2022-08-23 01:52:33'),
(2, 3, 'Dr. dr. Cahyono Hadi, Sp.OG', 'Jebres', '085888372832', 'cahyo@gmail.com', '2022-08-23 02:10:21', '2022-08-23 02:10:21'),
(3, 4, 'Khuswatus Solikhin', 'Surakarta', '089839937738', 'khuswatuss@gmail.com', '2022-08-23 02:17:39', '2022-08-23 02:17:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('aktif','nonaktif') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nonaktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `roles`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$iYrABZvZkFID.axsX6.jtO9FLceshk.8bSsRXWJjPqDjJFvg7z8RC', 'admin', 'aktif', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(2, 'User', 'user@gmail.com', NULL, '$2y$10$WjIlWCCSkMXweiuBUSLRmeKWkbwUrsq8cmYCVuO6aQ87ls1tnY/D2', 'user', 'nonaktif', '2022-08-23 01:02:48', '2022-08-23 01:02:48'),
(3, 'Adeta Diadra', 'adetadiadra@gmail.com', NULL, '$2y$10$/ZHMLjBwRAwQgaBTGFQgaOEuv5/7lidz7aGtkc3TjXAij3Lle7Nr6', 'user', 'aktif', '2022-08-23 01:50:30', '2022-08-23 01:51:56'),
(4, 'Windha Fitra', 'windafitra@gmail.com', NULL, '$2y$10$o1ESZ/hEh8q6wROlK6BbC.B14uL4mryOnGM4lzdrvldxv0eZCIQby', 'user', 'aktif', '2022-08-23 01:51:01', '2022-08-23 01:52:00'),
(5, 'Elang Muhammad FIkhri', 'elangmfikri123@gmail.com', NULL, '$2y$10$nLWTZq6ItYQAOtIv9NNWK.n8IZw8KXo1JFZgGhia4XNqDQc/ZUhei', 'user', 'aktif', '2022-08-23 01:51:22', '2022-08-23 01:52:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_laporan_id_foreign` (`laporan_id`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelurahan_kecamatan_id_foreign` (`kecamatan_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `table_batas_uji`
--
ALTER TABLE `table_batas_uji`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_batas_uji_laporan_id_foreign` (`laporan_id`);

--
-- Indeks untuk tabel `table_bidang`
--
ALTER TABLE `table_bidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_bidang_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `table_laboratorium`
--
ALTER TABLE `table_laboratorium`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_laboratorium_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `table_laporan`
--
ALTER TABLE `table_laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_laporan_user_id_foreign` (`user_id`),
  ADD KEY `table_laporan_laboratorium_id_foreign` (`laboratorium_id`),
  ADD KEY `table_laporan_perusahaan_id_foreign` (`perusahaan_id`),
  ADD KEY `table_laporan_status_id_foreign` (`status_id`);

--
-- Indeks untuk tabel `table_lokasisampling`
--
ALTER TABLE `table_lokasisampling`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `table_nib`
--
ALTER TABLE `table_nib`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_nib_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `table_perusahaan`
--
ALTER TABLE `table_perusahaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_perusahaan_user_id_foreign` (`user_id`),
  ADD KEY `table_perusahaan_nib_id_foreign` (`nib_id`),
  ADD KEY `table_perusahaan_bidang_id_foreign` (`bidang_id`),
  ADD KEY `table_perusahaan_pimpinan_id_foreign` (`pimpinan_id`),
  ADD KEY `table_perusahaan_status_id_foreign` (`status_id`),
  ADD KEY `table_perusahaan_kelurahan_id_foreign` (`kelurahan_id`),
  ADD KEY `table_perusahaan_kecamatan_id_foreign` (`kecamatan_id`);

--
-- Indeks untuk tabel `table_pimpinan`
--
ALTER TABLE `table_pimpinan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `table_pimpinan_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `table_batas_uji`
--
ALTER TABLE `table_batas_uji`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `table_bidang`
--
ALTER TABLE `table_bidang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `table_laboratorium`
--
ALTER TABLE `table_laboratorium`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `table_laporan`
--
ALTER TABLE `table_laporan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `table_lokasisampling`
--
ALTER TABLE `table_lokasisampling`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `table_nib`
--
ALTER TABLE `table_nib`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `table_perusahaan`
--
ALTER TABLE `table_perusahaan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `table_pimpinan`
--
ALTER TABLE `table_pimpinan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_laporan_id_foreign` FOREIGN KEY (`laporan_id`) REFERENCES `table_laporan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `table_batas_uji`
--
ALTER TABLE `table_batas_uji`
  ADD CONSTRAINT `table_batas_uji_laporan_id_foreign` FOREIGN KEY (`laporan_id`) REFERENCES `table_laporan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `table_bidang`
--
ALTER TABLE `table_bidang`
  ADD CONSTRAINT `table_bidang_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `table_laboratorium`
--
ALTER TABLE `table_laboratorium`
  ADD CONSTRAINT `table_laboratorium_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `table_laporan`
--
ALTER TABLE `table_laporan`
  ADD CONSTRAINT `table_laporan_laboratorium_id_foreign` FOREIGN KEY (`laboratorium_id`) REFERENCES `table_laboratorium` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_laporan_perusahaan_id_foreign` FOREIGN KEY (`perusahaan_id`) REFERENCES `table_perusahaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_laporan_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_laporan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `table_nib`
--
ALTER TABLE `table_nib`
  ADD CONSTRAINT `table_nib_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `table_perusahaan`
--
ALTER TABLE `table_perusahaan`
  ADD CONSTRAINT `table_perusahaan_bidang_id_foreign` FOREIGN KEY (`bidang_id`) REFERENCES `table_bidang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_perusahaan_kecamatan_id_foreign` FOREIGN KEY (`kecamatan_id`) REFERENCES `kecamatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_perusahaan_kelurahan_id_foreign` FOREIGN KEY (`kelurahan_id`) REFERENCES `kelurahan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_perusahaan_nib_id_foreign` FOREIGN KEY (`nib_id`) REFERENCES `table_nib` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_perusahaan_pimpinan_id_foreign` FOREIGN KEY (`pimpinan_id`) REFERENCES `table_pimpinan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_perusahaan_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `table_perusahaan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `table_pimpinan`
--
ALTER TABLE `table_pimpinan`
  ADD CONSTRAINT `table_pimpinan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
