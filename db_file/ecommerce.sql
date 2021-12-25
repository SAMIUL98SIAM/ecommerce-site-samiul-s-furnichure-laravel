-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 25, 2021 at 03:31 PM
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
(8, 'customer', 'siam ahmed', 'siamahmed89@gmail.com', NULL, '$2y$10$7XGRndDpYhdo9T62x4QDjuRt3FRE2jYHkSx.irLDZbia7v.Uvo17O', '01992569688', 'Uttara, Dhaka', 'Male', '202112250529download.jfif', '1147', NULL, 1, NULL, '2021-12-24 08:55:04', '2021-12-25 00:08:22'),
(9, 'customer', 'Rafiqul Hoque', 'rajib113@student.aiub.edu', NULL, '$2y$10$TjwsLbd3sgv3BW2WZ5rao.LfjYH219nOuQ1IDQvWDaaomSy89Z7Bm', '01992569124', NULL, NULL, NULL, '1077', NULL, 0, NULL, '2021-12-24 11:23:02', '2021-12-24 11:23:02'),
(11, 'customer', 'akib', 'assassinakib619@gmail.com', NULL, '$2y$10$TjwsLbd3sgv3BW2WZ5rao.LfjYH219nOuQ1IDQvWDaaomSy89Z7Bm', '01992569680', NULL, NULL, NULL, '3310', NULL, 1, NULL, '2021-12-24 11:36:27', '2021-12-24 11:36:27'),
(12, 'admin', 'Md Samiul', 'samiulsiam59@gmail.com', NULL, '$2y$10$TjwsLbd3sgv3BW2WZ5rao.LfjYH219nOuQ1IDQvWDaaomSy89Z7Bm', '01992569682', 'Uttara, Dhaka', 'Male', '202112241946261256220_678384216879662_9107077738123579116_n.jpg', NULL, 'Admin', 1, NULL, '2021-12-24 12:59:06', '2021-12-24 13:46:44'),
(13, 'admin', 'Rajib', 'rajib13@student.aiub.edu', NULL, '$2y$10$x/1QMVzRd04dppqGgav/1umH7YKIMV/Ll9.kSW36ZFAdY.FhiSiwW', NULL, NULL, NULL, NULL, '3240', 'Operator', 1, NULL, '2021-12-24 13:54:23', '2021-12-24 13:55:28');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
