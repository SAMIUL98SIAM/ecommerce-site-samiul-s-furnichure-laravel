-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 08:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `description`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'The best About Us pages accomplish their goals through telling a story about a brand.\r\n\r\nEvery story needs a protagonist, and so does every About Us page. \r\n\r\nIn some cases, that might be you or your founding team. In others, you might treat your business as its own character with a distinct story.\r\n\r\nEither way, stories are all about representing change—starting in one place and ending up in another—which is something your About Us page should also do as visitors scroll through it.', 1, NULL, '2021-12-23 08:01:46', '2021-12-23 08:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bangladeshi', 1, NULL, '2021-12-23 08:02:53', '2021-12-23 08:02:53'),
(2, 'Malaysian', 1, 1, '2021-12-23 08:03:00', '2021-12-23 08:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Chair', 1, 1, '2021-12-23 08:02:02', '2021-12-23 08:02:07'),
(2, 'Sofa', 1, 1, '2021-12-23 08:02:15', '2021-12-23 08:02:20'),
(3, 'Table', 1, NULL, '2021-12-23 08:23:27', '2021-12-23 08:23:27'),
(4, 'Workstation', 1, NULL, '2021-12-23 08:23:33', '2021-12-23 08:23:33'),
(5, 'Cabinet', 1, NULL, '2021-12-23 08:23:41', '2021-12-23 08:23:41'),
(6, 'Blind', 1, NULL, '2021-12-23 08:23:50', '2021-12-23 08:23:50'),
(7, 'Celling Decoration', 1, NULL, '2021-12-23 08:23:57', '2021-12-23 08:23:57'),
(8, 'Mobile Drawer', 1, NULL, '2021-12-23 08:24:08', '2021-12-23 08:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Grey', 1, NULL, '2021-12-23 08:02:29', '2021-12-23 08:02:29'),
(2, 'Black', 1, NULL, '2021-12-23 08:02:33', '2021-12-23 08:02:33'),
(3, 'White', 1, 1, '2021-12-23 08:02:39', '2021-12-23 08:02:43'),
(4, 'Yellow', 1, NULL, '2021-12-23 08:38:47', '2021-12-23 08:38:47'),
(5, 'purple', 1, NULL, '2021-12-23 08:38:54', '2021-12-23 08:38:54'),
(6, 'Blue', 1, NULL, '2021-12-23 08:39:03', '2021-12-23 08:39:03'),
(7, 'Red', 1, NULL, '2021-12-23 08:39:10', '2021-12-23 08:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `communicates`
--

CREATE TABLE `communicates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `communicates`
--

INSERT INTO `communicates` (`id`, `name`, `mobile`, `email`, `msg`, `created_at`, `updated_at`) VALUES
(1, 'Md Samiul', '01992569681', 'samiulsiam89@gmail.com', 'hjkghk', '2021-12-23 08:00:44', '2021-12-23 08:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `address`, `mobile_no`, `email`, `facebook`, `twitter`, `youtube`, `linkedin`, `google_plus`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Uttara, Dhaka', '01992569682', 'samiulsiam59@gmail.com', 'https://www.facebook.com/samiulhaque.siam.7/', 'https://twitter.com/', 'https://www.youtube.com/channel/UC4TiTw-i_DmEFIuwQ5t7I-w', 'https://www.linkedin.com/in/md-samiul-hoque-599b5617b/', 'https://mail.google.com/mail/u/0/#inbox', 1, NULL, '2021-12-23 08:00:19', '2021-12-23 08:00:19');

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
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `image`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '202112231358logo.png', 1, NULL, '2021-12-23 07:58:29', '2021-12-23 07:58:29');

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
(5, '2021_12_20_153724_create_logos_table', 1),
(6, '2021_12_20_153759_create_communicates_table', 1),
(7, '2021_12_20_210858_create_sliders_table', 1),
(8, '2021_12_20_221250_create_contacts_table', 1),
(9, '2021_12_21_124230_create_abouts_table', 1),
(10, '2021_12_21_140854_create_categories_table', 1),
(11, '2021_12_21_215036_create_brands_table', 1),
(12, '2021_12_21_215048_create_colors_table', 1),
(13, '2021_12_21_222930_create_sizes_table', 1),
(14, '2021_12_22_091314_create_product_sizes_table', 1),
(15, '2021_12_22_094106_create_products_table', 1),
(16, '2021_12_22_094440_create_product_colors_table', 1),
(17, '2021_12_22_094604_create_product_sub_images_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `price`, `slug`, `short_desc`, `long_desc`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Smart Chair', 17000, 'smart-chair', 'A \'Smart Chair\' was fitted with six pressure sensors and one angle sensor. Every second the chair calculates a grade indicating the quality of the sitting posture. When the grade is too low for too long, the user receives feedback through a vibration signal under the right thigh.', 'The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.', '202112231406c.jpg', '2021-12-23 08:06:21', '2021-12-23 09:04:09'),
(2, 7, 2, 'Gpsum board celling decoration', 110000, 'gpsum-board-celling-decoration', 'A \'Smart Chair\' was fitted with six pressure sensors and one angle sensor. Every second the chair calculates a grade indicating the quality of the sitting posture. When the grade is too low for too long, the user receives feedback through a vibration signal under the right thigh.', 'The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.', '2021122314401.jpeg', '2021-12-23 08:40:30', '2021-12-23 08:40:30'),
(3, 8, 1, 'beutiful mobile drawer', 5000, 'beutiful-mobile-drawer', 'The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.', 'The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.', '2021122314411.jpg', '2021-12-23 08:41:36', '2021-12-23 08:41:36'),
(4, 6, 1, 'beutiful roller blind', 60000, 'beutiful-roller-blind', 'The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.', 'The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.', '202112231442download.jpg', '2021-12-23 08:42:35', '2021-12-23 08:42:35'),
(5, 5, 2, 'Full Heigh Cabinet', 12000, 'full-heigh-cabinet', 'A \'Smart Chair\' was fitted with six pressure sensors and one angle sensor. Every second the chair calculates a grade indicating the quality of the sitting posture. When the grade is too low for too long, the user receives feedback through a vibration signal under the right thigh.', 'The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.', '202112231513F1.jpg', '2021-12-23 09:13:23', '2021-12-23 09:13:23'),
(6, 3, 1, 'Full width table', 2000, 'full-width-table', 'A \'Smart Chair\' was fitted with six pressure sensors and one angle sensor. Every second the chair calculates a grade indicating the quality of the sitting posture. When the grade is too low for too long, the user receives feedback through a vibration signal under the right thigh.', 'The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.', '2021122315151.jpg', '2021-12-23 09:15:30', '2021-12-23 09:15:30'),
(7, 4, 2, 'Beutiful Workstation', 50000, 'beutiful-workstation', 'A \'Smart Chair\' was fitted with six pressure sensors and one angle sensor. Every second the chair calculates a grade indicating the quality of the sitting posture. When the grade is too low for too long, the user receives feedback through a vibration signal under the right thigh.', 'The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.', '2021122315172.jpg', '2021-12-23 09:17:43', '2021-12-23 09:17:43'),
(8, 2, 2, 'Sofa set', 31000, 'sofa-set', 'A \'Smart Chair\' was fitted with six pressure sensors and one angle sensor. Every second the chair calculates a grade indicating the quality of the sitting posture. When the grade is too low for too long, the user receives feedback through a vibration signal under the right thigh.', 'The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.', '2021122315191.jpg', '2021-12-23 09:19:49', '2021-12-23 09:19:49'),
(9, 3, 1, 'Reading table', 12000, 'reading-table', 'A \'Smart Chair\' was fitted with six pressure sensors and one angle sensor. Every second the chair calculates a grade indicating the quality of the sitting posture. When the grade is too low for too long, the user receives feedback through a vibration signal under the right thigh.', 'The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.', '2021122315211.jpg', '2021-12-23 09:21:27', '2021-12-23 09:21:27'),
(10, 1, 2, 'Swivel chair', 7000, 'swivel-chair', 'A \'Smart Chair\' was fitted with six pressure sensors and one angle sensor. Every second the chair calculates a grade indicating the quality of the sitting posture. When the grade is too low for too long, the user receives feedback through a vibration signal under the right thigh.', 'The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.The Smart Chair also includes Bluetooth speakers, chromotherapy lights to boost your mood, and an smartphone app to control your chair. Feel great every day daily massage in the convenience of home.', '2021122315251.jpg', '2021-12-23 09:25:48', '2021-12-23 09:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(6, 2, 1, '2021-12-23 08:40:30', '2021-12-23 08:40:30'),
(7, 2, 4, '2021-12-23 08:40:30', '2021-12-23 08:40:30'),
(8, 2, 6, '2021-12-23 08:40:30', '2021-12-23 08:40:30'),
(9, 3, 2, '2021-12-23 08:41:36', '2021-12-23 08:41:36'),
(10, 3, 3, '2021-12-23 08:41:36', '2021-12-23 08:41:36'),
(11, 3, 4, '2021-12-23 08:41:36', '2021-12-23 08:41:36'),
(12, 4, 1, '2021-12-23 08:42:35', '2021-12-23 08:42:35'),
(13, 4, 2, '2021-12-23 08:42:35', '2021-12-23 08:42:35'),
(14, 4, 3, '2021-12-23 08:42:35', '2021-12-23 08:42:35'),
(18, 1, 1, '2021-12-23 09:04:09', '2021-12-23 09:04:09'),
(19, 1, 2, '2021-12-23 09:04:09', '2021-12-23 09:04:09'),
(20, 1, 3, '2021-12-23 09:04:09', '2021-12-23 09:04:09'),
(21, 5, 1, '2021-12-23 09:13:23', '2021-12-23 09:13:23'),
(22, 5, 4, '2021-12-23 09:13:23', '2021-12-23 09:13:23'),
(23, 5, 5, '2021-12-23 09:13:23', '2021-12-23 09:13:23'),
(24, 6, 2, '2021-12-23 09:15:30', '2021-12-23 09:15:30'),
(25, 6, 4, '2021-12-23 09:15:30', '2021-12-23 09:15:30'),
(26, 7, 1, '2021-12-23 09:17:43', '2021-12-23 09:17:43'),
(27, 7, 4, '2021-12-23 09:17:43', '2021-12-23 09:17:43'),
(28, 7, 5, '2021-12-23 09:17:43', '2021-12-23 09:17:43'),
(29, 7, 6, '2021-12-23 09:17:43', '2021-12-23 09:17:43'),
(30, 8, 1, '2021-12-23 09:19:50', '2021-12-23 09:19:50'),
(31, 8, 4, '2021-12-23 09:19:50', '2021-12-23 09:19:50'),
(32, 8, 6, '2021-12-23 09:19:50', '2021-12-23 09:19:50'),
(34, 10, 2, '2021-12-23 09:25:49', '2021-12-23 09:25:49'),
(35, 10, 3, '2021-12-23 09:25:49', '2021-12-23 09:25:49'),
(36, 9, 2, '2021-12-23 12:07:00', '2021-12-23 12:07:00'),
(37, 9, 4, '2021-12-23 12:07:00', '2021-12-23 12:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(5, 2, 1, '2021-12-23 08:40:30', '2021-12-23 08:40:30'),
(6, 2, 2, '2021-12-23 08:40:30', '2021-12-23 08:40:30'),
(7, 3, 1, '2021-12-23 08:41:36', '2021-12-23 08:41:36'),
(8, 3, 2, '2021-12-23 08:41:36', '2021-12-23 08:41:36'),
(9, 4, 2, '2021-12-23 08:42:35', '2021-12-23 08:42:35'),
(10, 4, 3, '2021-12-23 08:42:35', '2021-12-23 08:42:35'),
(13, 1, 1, '2021-12-23 09:04:09', '2021-12-23 09:04:09'),
(14, 1, 3, '2021-12-23 09:04:09', '2021-12-23 09:04:09'),
(15, 5, 1, '2021-12-23 09:13:23', '2021-12-23 09:13:23'),
(16, 5, 2, '2021-12-23 09:13:23', '2021-12-23 09:13:23'),
(17, 6, 2, '2021-12-23 09:15:30', '2021-12-23 09:15:30'),
(18, 6, 3, '2021-12-23 09:15:30', '2021-12-23 09:15:30'),
(19, 7, 2, '2021-12-23 09:17:43', '2021-12-23 09:17:43'),
(20, 7, 3, '2021-12-23 09:17:43', '2021-12-23 09:17:43'),
(21, 8, 1, '2021-12-23 09:19:50', '2021-12-23 09:19:50'),
(22, 8, 2, '2021-12-23 09:19:50', '2021-12-23 09:19:50'),
(23, 8, 3, '2021-12-23 09:19:50', '2021-12-23 09:19:50'),
(25, 10, 1, '2021-12-23 09:25:49', '2021-12-23 09:25:49'),
(26, 9, 1, '2021-12-23 12:07:00', '2021-12-23 12:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_images`
--

CREATE TABLE `product_sub_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sub_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_images`
--

INSERT INTO `product_sub_images` (`id`, `product_id`, `sub_image`, `created_at`, `updated_at`) VALUES
(1, 1, '202112231406chair2.jpg', '2021-12-23 08:06:21', '2021-12-23 08:06:21'),
(2, 1, '202112231406chair1.jpg', '2021-12-23 08:06:21', '2021-12-23 08:06:21'),
(3, 2, '2021122314402.jpg', '2021-12-23 08:40:30', '2021-12-23 08:40:30'),
(4, 2, '2021122314403.jpg', '2021-12-23 08:40:30', '2021-12-23 08:40:30'),
(5, 3, '2021122314412.jpg', '2021-12-23 08:41:36', '2021-12-23 08:41:36'),
(6, 3, '2021122314413.jpg', '2021-12-23 08:41:36', '2021-12-23 08:41:36'),
(7, 3, '2021122314414.jpg', '2021-12-23 08:41:36', '2021-12-23 08:41:36'),
(8, 4, '202112231442download1.jpg', '2021-12-23 08:42:35', '2021-12-23 08:42:35'),
(9, 4, '202112231442download2.jpg', '2021-12-23 08:42:35', '2021-12-23 08:42:35'),
(10, 4, '202112231442download3.jpg', '2021-12-23 08:42:35', '2021-12-23 08:42:35'),
(11, 5, '2021122315131.jpg', '2021-12-23 09:13:23', '2021-12-23 09:13:23'),
(12, 5, '2021122315132.jpg', '2021-12-23 09:13:23', '2021-12-23 09:13:23'),
(13, 5, '2021122315133.jpg', '2021-12-23 09:13:23', '2021-12-23 09:13:23'),
(14, 6, '2021122315152.png', '2021-12-23 09:15:30', '2021-12-23 09:15:30'),
(15, 6, '2021122315153jpg.jpg', '2021-12-23 09:15:30', '2021-12-23 09:15:30'),
(16, 7, '2021122315171.jpg', '2021-12-23 09:17:43', '2021-12-23 09:17:43'),
(17, 7, '2021122315173.jpg', '2021-12-23 09:17:43', '2021-12-23 09:17:43'),
(18, 7, '2021122315174.jpg', '2021-12-23 09:17:43', '2021-12-23 09:17:43'),
(19, 8, '2021122315192.jpg', '2021-12-23 09:19:50', '2021-12-23 09:19:50'),
(20, 8, '2021122315193.jpg', '2021-12-23 09:19:50', '2021-12-23 09:19:50'),
(21, 9, '2021122315212.jpg', '2021-12-23 09:21:28', '2021-12-23 09:21:28'),
(22, 9, '2021122315213.jpg', '2021-12-23 09:21:28', '2021-12-23 09:21:28'),
(23, 10, '2021122315252.jpeg', '2021-12-23 09:25:49', '2021-12-23 09:25:49'),
(24, 10, '2021122315253jpg.jpg', '2021-12-23 09:25:49', '2021-12-23 09:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'XL', 1, NULL, '2021-12-23 08:03:15', '2021-12-23 08:03:15'),
(2, 'XXL', 1, NULL, '2021-12-23 08:03:20', '2021-12-23 08:03:20'),
(3, 'M', 1, 1, '2021-12-23 08:03:26', '2021-12-23 08:03:33');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `short_title`, `long_title`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, '202112231359slider-1.jpg', 'Roller Blind', 'The most excellent rollar bind', 1, 1, 1, '2021-12-23 07:59:00', '2021-12-23 07:59:12'),
(2, '202112231359slider-2.jpg', 'Sofa Set', 'The most beutiful sofa  & chair', 1, 1, 1, '2021-12-23 07:59:25', '2021-12-23 07:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin=head of software,operator=computer operator,user = employee',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usertype`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `code`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'Sharmin Mumu', 'mumu12@gmail.com', NULL, '$2y$10$TjwsLbd3sgv3BW2WZ5rao.LfjYH219nOuQ1IDQvWDaaomSy89Z7Bm', NULL, NULL, NULL, NULL, '2589', 'Operator', 1, NULL, '2021-11-23 08:10:14', '2021-11-30 17:30:05'),
(8, 'customer', 'Md Samiul Hoque', 'samiulsiam89@gmail.com', NULL, '$2y$10$cWs1A7k/.kN9LxYR6mW7ye28bMk91qBG7jzICC92RvYbjEFuEsd.m', '01992569688', 'Uttara, Dhaka', 'Male', '202112241821261256220_678384216879662_9107077738123579116_n.jpg', '1147', NULL, 1, NULL, '2021-12-24 08:55:04', '2021-12-24 12:21:27'),
(9, 'customer', 'Rafiqul Hoque', 'rajib113@student.aiub.edu', NULL, '$2y$10$/J7iyA7cpc3DV2ZEiDyDjuhoyBI7rdJngE4twUepMSSxu9ubRdeFO', '01992569124', NULL, NULL, NULL, '1077', NULL, 0, NULL, '2021-12-24 11:23:02', '2021-12-24 11:23:02'),
(11, 'customer', 'akib', 'assassinakib619@gmail.com', NULL, '$2y$10$TjwsLbd3sgv3BW2WZ5rao.LfjYH219nOuQ1IDQvWDaaomSy89Z7Bm', '01992569680', NULL, NULL, NULL, '3310', NULL, 1, NULL, '2021-12-24 11:36:27', '2021-12-24 11:36:27'),
(12, 'admin', 'Md Samiul', 'samiulsiam59@gmail.com', NULL, '$2y$10$TjwsLbd3sgv3BW2WZ5rao.LfjYH219nOuQ1IDQvWDaaomSy89Z7Bm', '01992569682', 'Uttara, Dhaka', 'Male', '202112241946261256220_678384216879662_9107077738123579116_n.jpg', NULL, 'Admin', 1, NULL, '2021-12-24 12:59:06', '2021-12-24 13:46:44'),
(13, 'admin', 'Rajib', 'rajib13@student.aiub.edu', NULL, '$2y$10$x/1QMVzRd04dppqGgav/1umH7YKIMV/Ll9.kSW36ZFAdY.FhiSiwW', NULL, NULL, NULL, NULL, '3240', 'Operator', 1, NULL, '2021-12-24 13:54:23', '2021-12-24 13:55:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communicates`
--
ALTER TABLE `communicates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
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
  ADD UNIQUE KEY `products_name_unique` (`name`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `communicates`
--
ALTER TABLE `communicates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
