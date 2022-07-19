-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 06:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ag_portfilo_startlab`
--
CREATE DATABASE IF NOT EXISTS `ag_portfilo_startlab` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ag_portfilo_startlab`;

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `name`, `email`, `phone`, `address`, `image`, `facebook`, `twitter`, `instagram`, `youtube`, `linkedin`, `google`, `github`, `created_at`, `updated_at`) VALUES
(1, 'Alpet Gexha', 'agexha@gmail.com', '+383 44 567 631', 'Sofia, Bulgaria', 'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60', 'https://www.facebook.com/alpet.gexha', 'https://twitter.com/alpetgexha', 'https://www.instagram.com/alpetgexha', 'https://www.youtube.com/channel/UC-lHJZR3Gqxm24_Vd_AJ5Yw', 'https://www.linkedin.com/in/alpet-gexha-b9a8b917b/', 'https://plus.google.com/u/0/105829098240989898984', 'https://github.com/AlpetGexh', '2022-07-18 23:59:46', '2022-07-18 23:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(3, 'tempore', 'iste-non-enim-mollitia-dolorem-tempore', 'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60', '2022-07-18 23:59:47', '2022-07-18 23:59:47'),
(4, 'magni', 'laudantium-nihil-expedita-praesentium-dolorem-iste-adipisci-alias-ut', 'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60', '2022-07-18 23:59:47', '2022-07-18 23:59:47'),
(9, 'dasdas', 'dasdas', 'assets/uploads/07-19-2022-05-02-22_kQs62FrtJT.', '2022-07-19 03:02:22', '2022-07-19 03:02:22'),
(10, 'dasdasd', 'dasdasd', 'assets/uploads/07-19-2022-05-02-24_xizGBFc4wl.', '2022-07-19 03:02:24', '2022-07-19 03:02:24'),
(11, 'dasdasADAD', 'dasdasadad', 'assets/uploads/07-19-2022-05-02-28_BgHCp7YqbE.', '2022-07-19 03:02:28', '2022-07-19 03:02:28'),
(12, 'ADSDA#!#', 'adsda', 'assets/uploads/07-19-2022-05-02-36_ebYJjQScKV.', '2022-07-19 03:02:36', '2022-07-19 03:02:36'),
(13, 'ALpet Egcha', 'alpet-egcha', 'assets/uploads/07-19-2022-05-05-10_hTudqoPNpC.', '2022-07-19 03:05:10', '2022-07-19 03:05:10'),
(14, 'TIK', 'tik', 'assets/uploads/07-19-2022-05-17-20_4vRtyzkuiY.', '2022-07-19 03:17:20', '2022-07-19 03:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `ip`, `browser`, `os`, `created_at`, `updated_at`) VALUES
(1, 'dasda', 'agexha@gmail.com', 'dadasdad', 'dasdasdasdasdadaddasdasdasdasdadad', NULL, NULL, NULL, '2022-07-19 02:42:49', '2022-07-19 02:42:49'),
(5, 'dasd', 'agexha111@gmail.com', 'dadasdaddda', 'dadasdadddadadasdadddadadasdadddadadasdadddadadasdadddadadasdadddadadasdadddadadasdadddadadasdaddda', NULL, NULL, NULL, '2022-07-19 02:47:07', '2022-07-19 02:47:07');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `body`, `image`, `views`, `created_at`, `updated_at`) VALUES
(7, 1, 'Maxime a ad ea molestiae fugiat.', 'laudantium-dolor-ea-optio-suscipit-eveniet-sit', 'Rerum provident pariatur est voluptatem eos omnis. Occaecati iusto est laboriosam. Ipsa aut id quibusdam voluptatem omnis.', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80', 850, '2022-07-18 23:59:47', '2022-07-18 23:59:47'),
(8, 1, 'Fugit expedita doloribus dolores qui quia.', 'optio-quidem-nihil-id', 'Rerum provident pariatur est voluptatem eos omnis. Occaecati iusto est laboriosam. Ipsa aut id quibusdam voluptatem omnis.', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80', 748, '2022-07-18 23:59:47', '2022-07-18 23:59:47'),
(11, 1, 'Fugit expedita doloribus dolores qui quia.', 'dadasda', 'Rerum provident pariatur est voluptatem eos omnis. Occaecati iusto est laboriosam. Ipsa aut id quibusdam voluptatem omnis.', 'https://images.unsplash.com/photo-1504639725590-34d0984388bd?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80', 213, '2022-07-19 03:07:06', '2022-07-19 03:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_categories_post_id_foreign` (`post_id`),
  KEY `post_categories_categories_id_foreign` (`categories_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `post_id`, `categories_id`, `created_at`, `updated_at`) VALUES
(9, 11, 9, '2022-07-19 03:07:06', '2022-07-19 03:07:06'),
(10, 11, 10, '2022-07-19 03:07:06', '2022-07-19 03:07:06'),
(11, 11, 11, '2022-07-19 03:07:06', '2022-07-19 03:07:06'),
(12, 11, 12, '2022-07-19 03:07:06', '2022-07-19 03:07:06'),
(13, 11, 13, '2022-07-19 03:07:06', '2022-07-19 03:07:06'),
(18, 7, 4, NULL, NULL),
(19, 7, 3, NULL, NULL),
(20, 8, 3, NULL, NULL),
(21, 8, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
CREATE TABLE IF NOT EXISTS `skills` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'HTML', 'https://via.placeholder.com/150', '2022-07-18 23:59:46', '2022-07-18 23:59:46'),
(2, 'CSS', 'https://via.placeholder.com/150', '2022-07-18 23:59:46', '2022-07-18 23:59:46'),
(3, 'JavaScript', 'https://via.placeholder.com/150', '2022-07-18 23:59:46', '2022-07-18 23:59:46'),
(4, 'Boostrap', 'https://via.placeholder.com/150', '2022-07-18 23:59:46', '2022-07-18 23:59:46'),
(5, 'PHP', 'https://via.placeholder.com/150', '2022-07-18 23:59:46', '2022-07-18 23:59:46'),
(6, 'MySQLi', 'https://via.placeholder.com/150', '2022-07-18 23:59:46', '2022-07-18 23:59:46'),
(7, 'Laravel', 'https://via.placeholder.com/150', '2022-07-18 23:59:46', '2022-07-18 23:59:46'),
(8, 'Livewire', 'https://via.placeholder.com/150', '2022-07-18 23:59:46', '2022-07-18 23:59:46'),
(9, 'AlpineJS', 'https://via.placeholder.com/150', '2022-07-18 23:59:46', '2022-07-18 23:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'AlpetG', 'agexha@gmail.com', '$2y$10$byx1wB1vjii0o7vDdxjNyOTHzo8GgXP8xeZG3D7XGOXlJ.bg31Wgq', 1, '2022-07-18 23:59:46', '2022-07-18 23:59:46');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_categories`
--
ALTER TABLE `post_categories`
  ADD CONSTRAINT `post_categories_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `post_categories_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
