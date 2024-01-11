-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2023 at 10:59 AM
-- Server version: 5.7.41-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aya`
--

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('0f73d880-854a-4d3c-ae3d-3dfa84e47432', 1, 1, '☺️', NULL, 0, '2023-03-15 10:20:21', '2023-03-15 10:20:21'),
('3cfd7d12-9229-43c8-a5aa-232e42dfa49e', 1, 2, 'Hi', NULL, 1, '2023-03-11 11:33:34', '2023-03-11 11:34:22'),
('413dc6d1-fdb1-4f73-943b-48aad2d5feeb', 2, 1, '', '{\"new_name\":\"39d7fc35-09f8-4495-90f9-e510f5af158c.jpg\",\"old_name\":\"288915033_5436864023010456_34786216506747730_n.jpg\"}', 1, '2023-03-11 11:55:19', '2023-03-11 11:56:57'),
('8f07c1b4-e2ff-49cb-900e-ae28c04028b0', 2, 1, 'Hi Sacheesh', NULL, 1, '2023-03-11 11:53:01', '2023-03-11 11:53:03'),
('a54707c8-0175-4ed4-9679-d45d335c491f', 5, 1, 'hi', NULL, 0, '2023-03-19 04:54:13', '2023-03-19 04:54:13'),
('a5d7c78b-0ab6-49d2-9def-3c3b80da4dd4', 1, 1, 'Hi', NULL, 1, '2023-03-11 11:25:48', '2023-03-11 11:26:11'),
('f9c431b0-7072-4046-bc8e-a5719f504e2d', 1, 2, 'Hi Diya', NULL, 1, '2023-03-11 11:53:12', '2023-03-11 11:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `phone_or_email` varchar(120) NOT NULL,
  `subject` varchar(120) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone_or_email`, `subject`, `message`, `created_at`, `status`) VALUES
(1, 'Sacheesh RC', 'sacheeshrc@gmail.com', 'Test', 'Test', '2023-03-28 05:08:07', 0),
(2, 'Sacheesh RC', 'sacheeshrc@gmail.com', 'Test', 'Test', '2023-03-28 05:09:23', 0),
(3, 'Sacheesh RC', 'sacheesh@gmail.com', 'Test', 'Test', '2023-03-28 05:13:20', 0);

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_user` int(11) NOT NULL,
  `type` enum('message','notification') NOT NULL DEFAULT 'message',
  `title` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `date_created` datetime NOT NULL,
  `date_viewed` datetime DEFAULT NULL,
  `viewed_status` enum('received','viewd') NOT NULL DEFAULT 'received',
  `status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_user`, `to_user`, `type`, `title`, `message`, `date_created`, `date_viewed`, `viewed_status`, `status`) VALUES
(1, 5, 1, 'message', 'Welcome!', 'Welcome to aya trading', '2023-03-19 11:08:55', NULL, 'received', 1),
(2, 5, 3, 'message', 'Welcome!', 'Welcome to aya trading', '2023-03-19 11:08:56', NULL, 'received', 1),
(3, 5, 4, 'message', 'Welcome!', 'Welcome to aya trading', '2023-03-19 11:08:56', NULL, 'viewd', 1),
(4, 5, 5, 'message', 'Welcome!', 'Welcome to aya trading', '2023-03-19 11:08:56', NULL, 'received', 1),
(5, 5, 1, 'message', 'New plan launched', 'New plan launched', '2023-03-19 11:09:18', NULL, 'received', 1),
(6, 5, 3, 'message', 'New plan launched', 'New plan launched', '2023-03-19 11:09:19', NULL, 'received', 1),
(7, 5, 4, 'message', 'New plan launched', 'New plan launched', '2023-03-19 11:09:19', NULL, 'viewd', 1),
(8, 5, 5, 'message', 'New plan launched', 'New plan launched', '2023-03-19 11:09:19', NULL, 'received', 1);

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
(5, '2023_03_11_999999_add_active_status_to_users', 2),
(6, '2023_03_11_999999_add_avatar_to_users', 2),
(7, '2023_03_11_999999_add_dark_mode_to_users', 2),
(8, '2023_03_11_999999_add_messenger_color_to_users', 2),
(9, '2023_03_11_999999_create_chatify_favorites_table', 2),
(10, '2023_03_11_999999_create_chatify_messages_table', 2);

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `plan_name` varchar(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `portfolio_amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_name`, `amount`, `portfolio_amount`) VALUES
(1, 'pollux', 1, 0.0052),
(2, 'antares', 5, 0.0087),
(3, 'tauri', 10, 0.012),
(4, 'exclusive', 50, 0.017);

-- --------------------------------------------------------

--
-- Table structure for table `renewals`
--

CREATE TABLE `renewals` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(500) NOT NULL,
  `plan` varchar(150) NOT NULL,
  `renewal_amount` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `renewals`
--

INSERT INTO `renewals` (`id`, `user_id`, `transaction_id`, `plan`, `renewal_amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, '1496f7a737dec2a7fefc2367f36d8f8f', 'exclusive', 4, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan` varchar(25) DEFAULT NULL,
  `amount` float NOT NULL,
  `type` enum('debit','credit') NOT NULL,
  `wallet_address` varchar(500) DEFAULT NULL,
  `confirmation_1` tinyint(4) NOT NULL DEFAULT '0',
  `confirmation_2` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `payment_status` enum('pending','completed') NOT NULL DEFAULT 'pending',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `user_id`, `plan`, `amount`, `type`, `wallet_address`, `confirmation_1`, `confirmation_2`, `created_at`, `updated_at`, `payment_status`, `deleted_at`) VALUES
(1, '1679157493', 1, 'tauri', 10, 'credit', NULL, 1, 0, '2023-03-18 11:08:13', '2023-03-21 13:13:21', 'completed', NULL),
(2, '1679157766', 2, 'exclusive', 50, 'credit', NULL, 1, 0, '2023-03-18 11:12:46', '2023-03-18 11:18:31', 'completed', NULL),
(3, '1679207877', 3, 'antares', 5, 'credit', NULL, 1, 0, '2023-03-19 01:07:57', '2023-03-19 01:07:57', 'pending', NULL),
(4, '1679207906', 4, 'exclusive', 50, 'credit', NULL, 1, 0, '2023-03-19 01:08:26', '2023-03-19 01:08:26', 'pending', NULL),
(5, '1679207941', 5, 'exclusive', 50, 'credit', NULL, 1, 0, '2023-03-19 01:09:01', '2023-03-19 01:09:01', 'pending', NULL),
(6, '1679880037', 6, 'pollux', 1, 'credit', NULL, 1, 0, '2023-03-27 08:20:37', '2023-03-27 08:20:37', 'pending', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `plan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wallet_address` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `affiliate_id` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` float NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `messenger_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `plan`, `wallet_address`, `affiliate_id`, `amount`, `email_verified_at`, `password`, `remember_token`, `user_type`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 'Sacheesh RC', 'sacheeshrc@gmail.com', NULL, NULL, 'tauri', NULL, '', 10, NULL, '$2y$10$sA8e8eyPWmIpHTavgeTDg.yQ/oTXM2rcyOdr6sO75SHmkBT9G2LEq', NULL, 'user', '2023-03-18 11:08:12', '2023-03-19 05:47:41', 1, 'avatar.png', 0, NULL),
(2, 'David', 'david@aya.com', NULL, NULL, 'exclusive', NULL, '', 50, NULL, '$2y$10$Y2VdFjJRXvkwQFxCgLBW9O/auy0osN891RKvD8ITWjXKK8I6g8DSO', 'gk2XJOtdTS5YvV2UJpUY9Ar66Ocknenv8MAd4PyyCgNcpmMNjRKTPRHIntK3', 'admin', '2023-03-18 11:12:46', '2023-03-18 11:54:20', 1, 'avatar.png', 0, NULL),
(3, 'Roshna', 'roshna@gmail.com', NULL, NULL, 'antares', NULL, '', 5, NULL, '$2y$10$GgwieKwdvC7CiPG4G0MRHOsIrCTVZVX4cIYK/2DY/YaFtR9NF2WS.', NULL, 'user', '2023-03-19 01:07:57', '2023-03-19 01:07:57', 1, 'avatar.png', 0, NULL),
(4, 'Racheesh', 'racheesh@gmail.com', '9847987614', 'Cochin', 'exclusive', 'czxre54dggwezxfdfdfczxttrtrt4x544yhgfhwcx', 'c4ca4238a0b923820dcc509a6f75849b', 50, NULL, '$2y$10$evh.mjDZ72EpBTMs5JR/8OGVhWMqDGjjXXmmS5pe//oBd23d7aFWW', 'NstqIUzjC0oEuTZWInqotJK6ftXCcWlxirzlO1rvLB8bEcX1FOGr2oeGqwmH', 'user', '2023-03-19 01:08:26', '2023-04-08 13:07:43', 1, 'avatar.png', 0, NULL),
(5, 'vicheesh', 'vicheesh@gmail.com', NULL, NULL, 'exclusive', NULL, '', 50, NULL, '$2y$10$HPqIVMG2D//UHbvDOREtNe13azgpsFfXaq0VJ.xp9R0rROwOi7Q56', '8UExAJMrT6yFMUV7lIajfJiAZ1PFxJD6uaofs3wrHuY85UuOTRzFUXTRtIgN', 'user', '2023-03-19 01:09:01', '2023-03-19 01:09:01', 1, 'avatar.png', 0, NULL),
(6, 'src', 'src@gmail.com', NULL, NULL, 'pollux', NULL, '1679091c5a880faf6fb5e6087eb1b2dc', 1, NULL, '$2y$10$0OXPM8Bgb0CnTSVJ7d6bnue41ptI4QJJBtMkqICroVQ5Iytw8NoEC', '8yGSMVzqYIfuTIGZ2sqNUhL5MAEzFfEsZF7Eg5zSxAXRYFOQKRzpGK1lPYd6', 'user', '2023-03-27 08:20:37', '2023-03-27 08:20:37', 0, 'avatar.png', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_affiliates`
--

CREATE TABLE `user_affiliates` (
  `id` int(11) NOT NULL,
  `parent_id` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_affiliates`
--

INSERT INTO `user_affiliates` (`id`, `parent_id`, `user_id`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 1),
(2, '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_balances`
--

CREATE TABLE `user_balances` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `balance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_balances`
--

INSERT INTO `user_balances` (`id`, `user_id`, `balance`) VALUES
(1, 4, 49);

-- --------------------------------------------------------

--
-- Table structure for table `user_profits`
--

CREATE TABLE `user_profits` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan` varchar(100) NOT NULL,
  `profit` float NOT NULL,
  `profit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profits`
--

INSERT INTO `user_profits` (`id`, `user_id`, `plan`, `profit`, `profit_date`) VALUES
(1, 1, 'tauri', 111, '2023-03-24'),
(2, 3, 'antares', 40, '2023-03-24'),
(3, 4, 'exclusive', 35, '2023-03-24'),
(4, 5, 'exclusive', 18, '2023-03-24'),
(5, 1, 'tauri', 107, '2023-03-25'),
(6, 3, 'antares', 24, '2023-03-25'),
(7, 4, 'exclusive', 36, '2023-03-25'),
(8, 5, 'exclusive', 26, '2023-03-25'),
(9, 1, 'tauri', 120, '2023-03-26'),
(10, 3, 'antares', 25, '2023-03-26'),
(11, 4, 'exclusive', 35, '2023-03-26'),
(12, 5, 'exclusive', 13, '2023-03-26'),
(13, 1, 'tauri', 84, '2023-03-27'),
(14, 3, 'antares', 27, '2023-03-27'),
(15, 4, 'exclusive', 32, '2023-03-27'),
(16, 5, 'exclusive', 40, '2023-03-27'),
(17, 1, 'tauri', 92, '2023-03-28'),
(18, 3, 'antares', 34, '2023-03-28'),
(19, 4, 'exclusive', 20, '2023-03-28'),
(20, 5, 'exclusive', 45, '2023-03-28'),
(21, 1, 'tauri', 90, '2023-03-29'),
(22, 3, 'antares', 30, '2023-03-29'),
(23, 4, 'exclusive', 25, '2023-03-29'),
(24, 5, 'exclusive', 32, '2023-03-29'),
(25, 1, 'tauri', 94, '2023-03-30'),
(26, 3, 'antares', 35, '2023-03-30'),
(27, 4, 'exclusive', 43, '2023-03-30'),
(28, 5, 'exclusive', 30, '2023-03-30'),
(29, 1, 'tauri', 108, '2023-03-31'),
(30, 3, 'antares', 31, '2023-03-31'),
(31, 4, 'exclusive', 43, '2023-03-31'),
(32, 5, 'exclusive', 28, '2023-03-31'),
(33, 1, 'tauri', 84, '2023-04-01'),
(34, 3, 'antares', 50, '2023-04-01'),
(35, 4, 'exclusive', 12, '2023-04-01'),
(36, 5, 'exclusive', 12, '2023-04-01'),
(37, 1, 'tauri', 93, '2023-04-02'),
(38, 3, 'antares', 50, '2023-04-02'),
(39, 4, 'exclusive', 49, '2023-04-02'),
(40, 5, 'exclusive', 32, '2023-04-02'),
(41, 1, 'tauri', 80, '2023-04-03'),
(42, 3, 'antares', 35, '2023-04-03'),
(43, 4, 'exclusive', 28, '2023-04-03'),
(44, 5, 'exclusive', 40, '2023-04-03'),
(45, 1, 'tauri', 106, '2023-04-04'),
(46, 3, 'antares', 32, '2023-04-04'),
(47, 4, 'exclusive', 43, '2023-04-04'),
(48, 5, 'exclusive', 46, '2023-04-04'),
(49, 1, 'tauri', 107, '2023-04-05'),
(50, 3, 'antares', 28, '2023-04-05'),
(51, 4, 'exclusive', 44, '2023-04-05'),
(52, 5, 'exclusive', 39, '2023-04-05'),
(53, 1, 'tauri', 94, '2023-04-06'),
(54, 3, 'antares', 37, '2023-04-06'),
(55, 4, 'exclusive', 13, '2023-04-06'),
(56, 5, 'exclusive', 30, '2023-04-06'),
(57, 1, 'tauri', 86, '2023-04-07'),
(58, 3, 'antares', 47, '2023-04-07'),
(59, 4, 'exclusive', 42, '2023-04-07'),
(60, 5, 'exclusive', 26, '2023-04-07'),
(61, 1, 'tauri', 95, '2023-04-08'),
(62, 3, 'antares', 37, '2023-04-08'),
(63, 4, 'exclusive', 42, '2023-04-08'),
(64, 5, 'exclusive', 43, '2023-04-08'),
(65, 1, 'tauri', 108, '2023-04-09'),
(66, 3, 'antares', 39, '2023-04-09'),
(67, 4, 'exclusive', 39, '2023-04-09'),
(68, 5, 'exclusive', 33, '2023-04-09'),
(69, 1, 'tauri', 105, '2023-04-10'),
(70, 3, 'antares', 50, '2023-04-10'),
(71, 4, 'exclusive', 27, '2023-04-10'),
(72, 5, 'exclusive', 42, '2023-04-10'),
(73, 1, 'tauri', 107, '2023-04-11'),
(74, 3, 'antares', 49, '2023-04-11'),
(75, 4, 'exclusive', 42, '2023-04-11'),
(76, 5, 'exclusive', 47, '2023-04-11'),
(77, 1, 'tauri', 100, '2023-04-12'),
(78, 3, 'antares', 24, '2023-04-12'),
(79, 4, 'exclusive', 40, '2023-04-12'),
(80, 5, 'exclusive', 37, '2023-04-12'),
(81, 1, 'tauri', 83, '2023-04-13'),
(82, 3, 'antares', 31, '2023-04-13'),
(83, 4, 'exclusive', 38, '2023-04-13'),
(84, 5, 'exclusive', 48, '2023-04-13'),
(85, 1, 'tauri', 95, '2023-04-14'),
(86, 3, 'antares', 31, '2023-04-14'),
(87, 4, 'exclusive', 42, '2023-04-14'),
(88, 5, 'exclusive', 31, '2023-04-14'),
(89, 1, 'tauri', 94, '2023-04-15'),
(90, 3, 'antares', 23, '2023-04-15'),
(91, 4, 'exclusive', 26, '2023-04-15'),
(92, 5, 'exclusive', 38, '2023-04-15'),
(93, 1, 'tauri', 86, '2023-04-16'),
(94, 3, 'antares', 34, '2023-04-16'),
(95, 4, 'exclusive', 25, '2023-04-16'),
(96, 5, 'exclusive', 37, '2023-04-16'),
(97, 1, 'tauri', 83, '2023-04-17'),
(98, 3, 'antares', 48, '2023-04-17'),
(99, 4, 'exclusive', 26, '2023-04-17'),
(100, 5, 'exclusive', 45, '2023-04-17'),
(101, 1, 'tauri', 99, '2023-04-18'),
(102, 3, 'antares', 50, '2023-04-18'),
(103, 4, 'exclusive', 35, '2023-04-18'),
(104, 5, 'exclusive', 20, '2023-04-18'),
(105, 1, 'tauri', 109, '2023-04-19'),
(106, 3, 'antares', 22, '2023-04-19'),
(107, 4, 'exclusive', 12, '2023-04-19'),
(108, 5, 'exclusive', 27, '2023-04-19'),
(109, 1, 'tauri', 119, '2023-04-20'),
(110, 3, 'antares', 47, '2023-04-20'),
(111, 4, 'exclusive', 25, '2023-04-20'),
(112, 5, 'exclusive', 12, '2023-04-20'),
(113, 1, 'tauri', 101, '2023-04-21'),
(114, 3, 'antares', 37, '2023-04-21'),
(115, 4, 'exclusive', 44, '2023-04-21'),
(116, 5, 'exclusive', 44, '2023-04-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renewals`
--
ALTER TABLE `renewals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_affiliates`
--
ALTER TABLE `user_affiliates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_balances`
--
ALTER TABLE `user_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profits`
--
ALTER TABLE `user_profits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `renewals`
--
ALTER TABLE `renewals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_affiliates`
--
ALTER TABLE `user_affiliates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_balances`
--
ALTER TABLE `user_balances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_profits`
--
ALTER TABLE `user_profits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
