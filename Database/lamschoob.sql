-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 12:33 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lamschoob`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` enum('top','bottom') COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `src`, `date`, `position`, `link`, `created_at`, `updated_at`) VALUES
(1, '/uploads/banner/7189801461_@Wallpaper_4K3D (12687).jpg', '17 اسفند 1401', 'top', '#', NULL, '2023-03-08 14:20:19'),
(2, '/uploads/banner/3253640243_@Wallpaper_4K3D (5364).jpg', '17 اسفند 1401', 'bottom', '#', NULL, '2023-03-08 12:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `date`, `created_at`, `updated_at`) VALUES
(25, 21, 8, '24 فروردین 1402', '2023-04-13 17:24:06', '2023-04-13 17:24:06'),
(41, 5, 9, '27 فروردین 1402', '2023-04-15 23:19:17', '2023-04-15 23:19:17'),
(42, 5, 21, '27 فروردین 1402', '2023-04-15 23:19:29', '2023-04-15 23:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `src`, `created_at`, `updated_at`) VALUES
(6, 'سرویس خواب', '/uploads/category/9163862566_iwjfjdngsndmf.jpg', '2023-03-10 06:47:01', '2023-03-15 17:05:58'),
(7, 'میزتلویزیون', '/uploads/category/6088420330_6d9c4e.jpeg', '2023-03-17 06:34:22', '2023-04-13 19:39:15'),
(8, 'میز تحریر', '/uploads/category/7164727520_Lady-room-miz-tahrir.jpg', '2023-03-17 06:34:47', '2023-03-17 06:34:47'),
(9, 'کنسول آیینه', '/uploads/category/2628871598_alAoEUZBHh4HvJqo6J6VyDcrAvPMLasqqTIGwiYv8ZPlsXNt13.jpg_512X512X70.jpg', '2023-03-17 06:34:55', '2023-03-17 06:34:55'),
(10, 'جاکفشی', '/uploads/category/1149999144_Top-Quality-Melamined-MDF-Shoes-Cabinet-in-China.jpg', '2023-03-17 06:35:51', '2023-04-13 19:31:08'),
(11, 'کمد لباس', '/uploads/category/2326644900_1e6a08000df241784c019bbf05d00a74.jpg', '2023-03-17 06:36:41', '2023-03-17 06:36:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `date`, `product_id`, `text`, `active`, `created_at`, `updated_at`) VALUES
(4, 'ماهان', 'mamah@gmail.com', '27 فروردین 1402', 21, 'خوب بود', '0', '2023-04-15 21:23:57', '2023-04-15 21:23:57');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seen` enum('new','seen') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `mobile`, `title`, `text`, `date`, `created_at`, `updated_at`, `seen`) VALUES
(1, 'ماهان منوچهری', '09351905110', 'تست', 'تست', '27 فروردین 1402', '2023-04-15 21:22:07', '2023-04-15 21:38:46', 'seen'),
(2, 'سعید رضایی', '09125425874', 'زخمی بودن محصول', 'سلام محصول من زخمی بود و اصلا کیفیت خوبی نداشت', '27 فروردین 1402', '2023-04-15 23:21:53', '2023-04-15 23:21:53', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `expiration_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `code`, `discount`, `expiration_date`, `created_at`, `updated_at`, `user_id`, `type`) VALUES
(3, 'noroz1402', 25, '2023-04-10 02:55:36', '2023-04-04 22:25:36', '2023-04-04 22:25:36', NULL, 'base');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `product_id`, `src`, `created_at`, `updated_at`) VALUES
(13, 8, '/uploads/products/9150496964_Borna_Bed-Set-V1-N1_zGH_small.jpg', '2023-04-13 17:07:44', '2023-04-13 17:07:44'),
(14, 8, '/uploads/products/1060778300_Borna_Bed-Set-V1-N2_Vh2_small.jpg', '2023-04-13 17:07:44', '2023-04-13 17:07:44'),
(15, 8, '/uploads/products/3583623859_Borna_Bed-Set-V1-N3_tBd_small.jpg', '2023-04-13 17:07:44', '2023-04-13 17:07:44'),
(16, 9, '/uploads/products/5033406521_Ilar-White-Wooden-Bed-Set-V1-n01_WTr_small.jpg', '2023-04-13 17:13:21', '2023-04-13 17:13:21'),
(17, 9, '/uploads/products/7781534657_Ilar-White-Wooden-Bed-Set-V1-n02_NyQ_small.jpg', '2023-04-13 17:13:21', '2023-04-13 17:13:21'),
(18, 9, '/uploads/products/1730262534_Ilar-White-Wooden-Bed-Set-V1-n013_h2s_small.jpg', '2023-04-13 17:13:21', '2023-04-13 17:13:21'),
(19, 10, '/uploads/products/4968593627_Noyan-N1_vH7_small.jpg', '2023-04-13 17:21:10', '2023-04-13 17:21:10'),
(20, 10, '/uploads/products/3535209258_13_T1j_small.jpg', '2023-04-13 17:21:10', '2023-04-13 17:21:10'),
(21, 11, '/uploads/products/2479014832_Ilar-White-Wooden-Bed-Set-V1-n08_OfT_small.jpg', '2023-04-13 19:06:20', '2023-04-13 19:06:20'),
(22, 11, '/uploads/products/3908734731_Ilar-White-Wooden-Bed-Set-V1-n015_PTt_small.jpg', '2023-04-13 19:06:20', '2023-04-13 19:06:20'),
(23, 11, '/uploads/products/3536227738_Ilar-White-Wooden-Bed-Set-V1-n018_DzL_small.jpg', '2023-04-13 19:06:20', '2023-04-13 19:06:20'),
(24, 12, '/uploads/products/2028570437_5_8sb_small.jpg', '2023-04-13 19:22:54', '2023-04-13 19:22:54'),
(25, 12, '/uploads/products/1307098232_1_DB2_small.jpg', '2023-04-13 19:22:55', '2023-04-13 19:22:55'),
(26, 13, '/uploads/products/7837648793_6_PU7_small.jpg', '2023-04-13 19:26:27', '2023-04-13 19:26:27'),
(27, 13, '/uploads/products/7930882830_5_fEr_small.jpg', '2023-04-13 19:26:27', '2023-04-13 19:26:27'),
(28, 13, '/uploads/products/7410611683_2_f5Q_small.jpg', '2023-04-13 19:26:27', '2023-04-13 19:26:27'),
(29, 14, '/uploads/products/2826531863_1_w4U_small.jpg', '2023-04-13 19:28:51', '2023-04-13 19:28:51'),
(30, 14, '/uploads/products/1461878708_2_G5O_small.jpg', '2023-04-13 19:28:51', '2023-04-13 19:28:51'),
(31, 14, '/uploads/products/4794422263_8_YCT_small.jpg', '2023-04-13 19:28:52', '2023-04-13 19:28:52'),
(32, 15, '/uploads/products/6612849982_1_rUN_small.jpg', '2023-04-13 19:30:45', '2023-04-13 19:30:45'),
(33, 15, '/uploads/products/8854015448_13_rgy_small.jpg', '2023-04-13 19:30:45', '2023-04-13 19:30:45'),
(34, 16, '/uploads/products/8241046018_1_rnS_small.jpg', '2023-04-13 19:35:40', '2023-04-13 19:35:40'),
(35, 16, '/uploads/products/7001971042_2_Kqt_small.jpg', '2023-04-13 19:35:41', '2023-04-13 19:35:41'),
(36, 16, '/uploads/products/8519145817_3_hgz_small.jpg', '2023-04-13 19:35:41', '2023-04-13 19:35:41'),
(37, 17, '/uploads/products/6121477433_TV101_1.jpg', '2023-04-13 19:37:04', '2023-04-13 19:37:04'),
(38, 17, '/uploads/products/7548210128_TV101_2.jpg', '2023-04-13 19:37:04', '2023-04-13 19:37:04'),
(39, 17, '/uploads/products/2489781337_TV101_album0.jpg', '2023-04-13 19:37:04', '2023-04-13 19:37:04'),
(40, 18, '/uploads/products/3817764270_TV121_album3.jpg', '2023-04-13 19:38:36', '2023-04-13 19:38:36'),
(41, 18, '/uploads/products/5641422834_TV121_album4.jpg', '2023-04-13 19:38:36', '2023-04-13 19:38:36'),
(42, 19, '/uploads/products/3207390881_1_nW9_small.jpg', '2023-04-13 19:42:37', '2023-04-13 19:42:37'),
(43, 19, '/uploads/products/2260578720_9_TdY_small.jpg', '2023-04-13 19:42:37', '2023-04-13 19:42:37'),
(44, 19, '/uploads/products/3543552885_4_XyN_small.jpg', '2023-04-13 19:42:37', '2023-04-13 19:42:37'),
(45, 20, '/uploads/products/5073660082_1_V9O_small.jpg', '2023-04-13 19:44:26', '2023-04-13 19:44:26'),
(46, 20, '/uploads/products/9795370673_14_WvL_small.jpg', '2023-04-13 19:44:26', '2023-04-13 19:44:26'),
(47, 21, '/uploads/products/8782815665_2_bhU_small.jpg', '2023-04-13 19:45:55', '2023-04-13 19:45:55'),
(48, 21, '/uploads/products/8879319397_6_75Z_small.jpg', '2023-04-13 19:45:56', '2023-04-13 19:45:56'),
(49, 21, '/uploads/products/7515957564_8_Ij9_small.jpg', '2023-04-13 19:45:56', '2023-04-13 19:45:56'),
(50, 22, '/uploads/products/6945357184_KD123_album3.jpg', '2023-04-13 19:47:27', '2023-04-13 19:47:27'),
(51, 22, '/uploads/products/9946482996_KD123_album7.jpg', '2023-04-13 19:47:27', '2023-04-13 19:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_09_19_073538_create_permissions_and_roles_table', 2),
(6, '2022_09_20_122411_add_idrole_users', 2),
(7, '2023_02_27_091115_add_type_to_user', 3),
(12, '2023_02_27_133844_create_sliders_table', 4),
(13, '2023_02_27_133940_create_banners_table', 4),
(15, '2023_03_08_170434_create_categories_table', 5),
(20, '2023_03_10_102706_create_products_table', 6),
(21, '2023_03_10_104602_create_galleries_table', 6),
(22, '2023_03_17_144954_create_comments_table', 7),
(23, '2023_03_17_155844_create_carts_table', 8),
(29, '2023_03_19_091857_create_discount_codes_table', 9),
(30, '2023_04_05_193828_create_articles_table', 10),
(33, '2023_04_06_160517_create_offers_table', 11),
(34, '2023_04_06_160605_create_favorites_table', 11),
(39, '2023_04_07_164404_add_date_column_to_table', 12),
(40, '2023_04_07_172950_create_contacts_table', 12),
(41, '2023_04_08_023405_add_user_id_column_to_table_discount_codes', 13),
(42, '2023_04_12_031627_create_questions_table', 14),
(43, '2023_04_13_230554_add_date_birth_column_to_table', 15),
(44, '2023_04_14_013647_add_column_to_table', 16),
(51, '2023_04_14_231354_create_orders_table', 17),
(52, '2023_04_16_020047_add_seen_column_to_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `product_id`, `created_at`, `updated_at`) VALUES
(9, 21, '2023-04-13 19:51:14', '2023-04-13 19:51:14'),
(10, 20, '2023-04-13 19:51:14', '2023-04-13 19:51:14'),
(11, 16, '2023-04-13 19:51:14', '2023-04-13 19:51:14'),
(12, 12, '2023-04-13 19:51:15', '2023-04-13 19:51:15'),
(13, 9, '2023-04-13 19:51:15', '2023-04-13 19:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postalCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prepayment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remainPrice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_id` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('delivered','completing','pending') COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `date`, `code`, `user_id`, `state`, `city`, `address`, `postalCode`, `phone`, `notes`, `price`, `prepayment`, `remainPrice`, `products_id`, `status`, `track_id`, `transaction_id`, `created_at`, `updated_at`) VALUES
(7, '27 فروردین 1402', '617573', 18, 'تهران', 'ونک', 'تهران - ونک - خیابان ونک - پلاک 24 - واحد 20', '1111111111', '02156987458', NULL, '35923000', '10776900', '25146100', '-19-21', 'delivered', '1185776', 'cc131e451c624bca7fead902eabbd6a1', '2023-04-15 22:40:52', '2023-04-15 22:44:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('alisaberizadeh.one@gmail.com', '$2y$10$W5imyAu46.ZdKot/kF294u0ejvAxcDB6wpISQBJdJHIb0ZLx8MCVG', '2023-04-11 23:39:35');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL,
  `discount` bigint(20) DEFAULT NULL,
  `final_price` bigint(20) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `price`, `discount`, `final_price`, `category_id`, `short_description`, `description`, `code`, `date`, `created_at`, `updated_at`) VALUES
(8, 'سرویس خواب SKH01', 28659000, NULL, 28659000, 6, '<p>1</p>', NULL, 'SKH01', '24 فروردین 1402', '2023-04-13 17:07:44', '2023-04-13 17:07:44'),
(9, 'سرویس خواب SKH02', 30770000, NULL, 30770000, 6, '<p>.</p>', NULL, 'SKH02', '24 فروردین 1402', '2023-04-13 17:13:21', '2023-04-13 17:13:21'),
(10, 'سرویس خواب SKH03', 17550000, NULL, 17550000, 6, '<p>.</p>', NULL, 'SKH03', '24 فروردین 1402', '2023-04-13 17:21:09', '2023-04-13 17:21:09'),
(11, 'سرویس خوابSKH04', 30770000, NULL, 30770000, 6, '<p>.</p>', NULL, 'SKH04', '24 فروردین 1402', '2023-04-13 19:06:19', '2023-04-13 19:06:19'),
(12, 'جاکفشی JK01', 2333000, NULL, 2333000, 10, '<p>.</p>', NULL, 'JK01', '24 فروردین 1402', '2023-04-13 19:22:54', '2023-04-13 19:22:54'),
(13, 'جاکفشی JK02', 3500000, NULL, 3500000, 10, '<p>.</p>', NULL, 'Jk02', '24 فروردین 1402', '2023-04-13 19:26:27', '2023-04-13 19:26:27'),
(14, 'جاکفشیJK03', 7500000, NULL, 7500000, 10, '<p>.</p>', NULL, 'JK03', '24 فروردین 1402', '2023-04-13 19:28:51', '2023-04-13 19:28:51'),
(15, 'جاکفشیJK04', 5320000, NULL, 5320000, 10, '<p>.</p>', NULL, 'JK04', '25 فروردین 1402', '2023-04-13 19:30:45', '2023-04-13 19:30:45'),
(16, 'میزتلویزیون MT01', 4069000, NULL, 4069000, 7, '<p>.</p>', NULL, 'MT01', '25 فروردین 1402', '2023-04-13 19:35:40', '2023-04-13 19:35:40'),
(17, 'میزتلویزیون MT02', 4489000, NULL, 4489000, 7, '<p>.</p>', NULL, 'MT02', '25 فروردین 1402', '2023-04-13 19:37:04', '2023-04-13 19:37:04'),
(18, 'میزتلویزیون MT03', 3199000, NULL, 3199000, 7, '<p>.</p>', NULL, 'MT03', '25 فروردین 1402', '2023-04-13 19:38:36', '2023-04-13 19:38:36'),
(19, 'کمدلباس KL01', 18665000, NULL, 18665000, 11, '<p>.</p>', NULL, 'KL01', '25 فروردین 1402', '2023-04-13 19:42:37', '2023-04-13 19:42:37'),
(20, 'کمدلباس KL02', 10500000, NULL, 10500000, 11, '<p>.</p>', NULL, 'KL02', '25 فروردین 1402', '2023-04-13 19:44:26', '2023-04-13 19:44:26'),
(21, 'کمدلباس KL03', 17258000, NULL, 17258000, 11, '<p>.</p>', NULL, 'KL03', '25 فروردین 1402', '2023-04-13 19:45:55', '2023-04-13 19:45:55'),
(22, 'کمدلباس KL04', 7525000, NULL, 7525000, 11, '<p>.</p>', NULL, 'KL04', '25 فروردین 1402', '2023-04-13 19:47:27', '2023-04-13 19:47:27');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `text`, `created_at`, `updated_at`) VALUES
(1, 'میتوانم سفارش خود را در محل پرداخت کنم؟', 'لطفاً پیش از خرید، موارد زیر را به‌دقت بخوانید؛ زیرا ثبت هر سفارش در ویرا به معنی موافقت با شرایط زیر است.', '2023-04-11 23:03:56', '2023-04-11 23:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'مدیر کل', NULL, NULL),
(2, 'user', 'کاربر عادی', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`) VALUES
(2, 5),
(2, 18),
(2, 20),
(2, 21);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '#',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `src`, `date`, `link`, `created_at`, `updated_at`) VALUES
(8, '/uploads/slider/6455637408_tanya-shop-the-look-3d-rendering-render-berlin-bed-bedroom-set-hi-rez-06-2020.jpg', '26 اسفند 1401', NULL, '2023-03-17 07:15:02', '2023-03-17 07:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mycode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `type`, `date`, `mycode`, `birth`) VALUES
(5, 'علی صابری', 'alisaberizadeh.one@gmail.com', '09104043703', NULL, '$2y$10$T86GskI.nHVtbZdnH8ZcK.krPxUYVggrxu78RYzl2fLI2veQHwxxW', 'dcnUThEfr2NwjzUKOvPWGgFskkoQzCvEFwQGRMrPwta5NhS4nnV1zXNcw1ph', '2023-03-15 12:00:27', '2023-04-11 23:29:13', 1, '1', '23 فروردین 1402', '249ge528', '16 فروردین 1402'),
(18, 'ماهان', 'mamah@gmail.com', '09351905110', NULL, '$2y$10$T86GskI.nHVtbZdnH8ZcK.krPxUYVggrxu78RYzl2fLI2veQHwxxW', 'vrwAg51DdpNUZnWhXyK0ttAupSJpHKbDwIUQwsDnpktElqtmTyrtf5ti7LZo', '2023-04-11 23:42:13', '2023-04-12 00:44:26', 2, '2', '23 فروردین 1402', '296kz522', '17 فروردین 1402'),
(20, 'وحید شمسایی', 'vahiiiid@gmail.com', '09102043703', NULL, '$2y$10$.Hen0zJWt58Qosio7cqM7e8CjraR0EtI.r4fx.DJF3WNiY2sx91yK', NULL, '2023-04-12 00:53:54', '2023-04-12 00:53:54', 2, '2', '23 فروردین 1402', '210yz606', '19 فروردین 1402'),
(21, 'میلاد شمیرانی', 'milad@gmail.com', '09035404704', NULL, '$2y$10$FGQIKnH4RHPpYmkqgJfzU.SY8r188xSp6pd7DfZ5tTFqEqzbotCzy', 'zWNCsMS5lK5Bmkn8ZNEyIMrW77Q0xFJJC3OT86HLMsAfmulMbpCnokAPKhjz', '2023-04-13 16:43:51', '2023-04-13 16:43:52', 1, '1', '24 فروردین 1402', '954jq596', '22 فروردین 1402');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_product_id_foreign` (`product_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discount_codes_code_unique` (`code`),
  ADD KEY `discount_codes_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_product_id_foreign` (`product_id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_product_id_foreign` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD UNIQUE KEY `orders_track_id_unique` (`track_id`),
  ADD UNIQUE KEY `orders_transaction_id_unique` (`transaction_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`permission_id`,`user_id`),
  ADD KEY `permission_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_mycode_unique` (`mycode`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD CONSTRAINT `discount_codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `favorites_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
