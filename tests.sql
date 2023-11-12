-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2023 at 04:18 PM
-- Server version: 5.7.41-log
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tests`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `description` longtext,
  `investamount` varchar(255) DEFAULT NULL,
  `investperiod` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `firstname`, `lastname`, `email`, `mobile`, `description`, `investamount`, `investperiod`, `created_at`) VALUES
(5, 'ad', 'Smith', 'needmefordev@gmail.com', '123123', '123', '0-1000', '1~2yrs', '2023-08-25 19:58:58'),
(6, 'ad', 'Smith', 'admin@as.com', '123123', '', '0-1000', '1~2yrs', '2023-08-25 19:59:49'),
(7, 'ad', 'Smith', 'admin@as.com', '123123', '123', '0-1000', '1~2yrs', '2023-08-25 20:00:21'),
(8, 'ad', 'Smith', 'admin@admin.com', '123123', '123', '0-1000', '1~2yrs', '2023-08-25 20:31:08'),
(9, 'ad', 'Smith', 'admin@admin.com', '123123', '123', '0-1000', '1~2yrs', '2023-08-25 20:31:38'),
(10, 'John', 'Smith', 'need', '123', '', '100', '3', '2023-09-08 20:58:10'),
(11, 'ad', 'Smith', 'needmefordev@gmail.com', '123', '', '10000', '12', '2023-09-08 21:11:36'),
(12, 'ad', 'Smith', 'needmefordev@gmail.com', '123123', '123', '123', '1', '2023-09-13 14:50:16');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_08_22_114512_create_wallets', 1),
(3, '2023_08_22_115020_create_transactions', 1),
(4, '2023_08_22_144315_create_rates', 2);

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int(11) NOT NULL,
  `passcode` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `owner` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fromcurrency` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tocurrency` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `fromcurrency`, `tocurrency`, `amount`, `created_at`, `updated_at`, `update_date`) VALUES
(1, 'RSHC', 'EURO', 1.34, '2023-08-22 19:46:40', '2023-08-22 19:46:40', '2023-07-15'),
(2, 'RSHC', 'EURO', 1.22, '2023-09-20 15:07:57', '2023-09-20 15:08:01', '2023-07-01'),
(3, 'RSHC', 'EURO', 1.52, NULL, NULL, '2023-08-01'),
(4, 'RSHC', 'EURO', 1.98, NULL, NULL, '2023-08-15'),
(5, 'RSHC', 'EURO', 2.50, NULL, NULL, '2023-09-01'),
(6, 'RSHC', 'EURO', 3.10, NULL, NULL, '2023-09-15'),
(7, 'RSHC', 'EURO', 3.30, NULL, NULL, '2023-09-20');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `fromwallet_id` int(11) NOT NULL,
  `towallet_id` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `fromwallet_id`, `towallet_id`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 50.00, '2023-08-22 20:16:06', '2023-08-22 20:16:06'),
(2, 2, 1, 30.00, '2023-08-22 20:24:06', '2023-08-22 20:24:06'),
(3, 2, 1, 10.00, '2023-08-22 20:26:08', '2023-08-22 20:26:08'),
(4, 1, 3, 20.00, '2023-08-22 22:58:05', '2023-08-22 22:58:05'),
(5, 1, 6, 20.00, '2023-08-22 23:01:18', '2023-08-22 23:01:18'),
(6, 36, 52, 1000.00, '2023-08-24 19:11:46', '2023-08-24 19:11:46'),
(7, 36, 52, 20000.00, '2023-08-24 19:13:25', '2023-08-24 19:13:25'),
(8, 36, 52, 30000.00, '2023-08-24 19:14:02', '2023-08-24 19:14:02'),
(9, 7, 52, 100.00, '2023-08-30 15:09:29', '2023-08-30 15:09:29'),
(10, 38, 52, 100.00, '2023-08-31 15:53:20', '2023-08-31 15:53:20'),
(11, 7, 9, 10.00, '2023-09-07 15:39:20', '2023-09-07 15:39:20'),
(12, 7, 51, 12.00, '2023-09-07 15:40:30', '2023-09-07 15:40:30'),
(13, 7, 51, 10.00, '2023-09-07 16:14:34', '2023-09-07 16:14:34'),
(14, 9, 51, 20.00, '2023-09-07 16:15:56', '2023-09-07 16:15:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userid` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `password`) VALUES
(1, 'admin', 'ab509898e0c31a64035be87196e4d48f');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phrase` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` double(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `address`, `phrase`, `balance`, `created_at`, `updated_at`, `owner`) VALUES
(7, '0x167Fbfd27D3FbBb9f9F2aeA2a73ecaDF', 'TPGmh9E1wJ2Q9BpbWofibofX', 2817.00, '2023-08-22 23:19:27', '2023-08-22 23:19:27', 'Conny'),
(8, '0x0000000000000000000000000000000000000003', 'KHx3bTTwlN2rrOxgAlYrBkk5', 176543740.00, '2023-08-22 23:20:43', '2023-08-22 23:20:43', 'of Security 0x03'),
(9, '0x0aFE76E3c3E6ef4cFCAe6d6eA584d0BD', 'IMyHCp9jCug76JJPDz1DmJHd', 17036.00, '2023-08-22 23:23:20', '2023-08-22 23:23:20', 'Herrman Steins'),
(10, '0xEb50166C2BD2D9DBF8f18CE40cBC0c6f', 'jkQ4DlA9F3Uc731jNPc54c5k', 100000.00, '2023-08-22 23:24:00', '2023-08-22 23:24:00', 'Pascal'),
(11, '0xEDD71aDcDeF2f3F004BA50eB32B145FC', 'm87ItsBAtJ3sfKoWpS28NTvq', 100000.00, '2023-08-22 23:24:34', '2023-08-22 23:24:34', 'Electra'),
(12, '0xb2b05FB663bCDbcbDF2a25EFA7a7ebdA', 'PGzVz2oHvfsfBK3Sh8cEeCqF', 1.00, '2023-08-22 23:25:14', '2023-08-22 23:25:14', 'Test'),
(14, '0x4C66e6B1a0Ed1b3bFdf81e34a92AB13D', '8wxhzAe1VuQDqsuA7XYZU57U', 5250.00, '2023-08-22 23:26:04', '2023-08-22 23:26:04', 'Fabienne'),
(15, '0xab30dC20B3C5F8bFd57aFc9BC01aDBbE', 'iGtadW5I2JZc6ahtIK1xsoDA', 7143.00, '2023-08-22 23:26:49', '2023-08-22 23:26:49', 'Andrej'),
(16, '0x6ee16DB6bDbCC8C1D8D0CEA6D4a2BF3f', 'BPNVmssIb3cC0uvcfS8jZv7y', 500.00, '2023-08-22 23:27:28', '2023-08-22 23:27:28', 'Nicole'),
(17, '0x7Ab5E4F1bE52E7ab55a2b069032edd4c', 'UVnKvJ6TTulPGFh5VVgWjayo', 57955.00, '2023-08-22 23:28:09', '2023-08-22 23:28:09', 'Andreas'),
(18, '0x0fDf07b891646E4642fa481E8188e8F6', '0Aj4fSMVQbZghfhLTurD3BPz', 5150.00, '2023-08-22 23:29:06', '2023-08-22 23:29:06', 'Vincent'),
(19, '0x8FE422f1d96b9cDF5C48e672ae5D9A0c', 'tJgUrmuNcpMXJTrJM6Q64zcl', 5000.00, '2023-08-22 23:29:34', '2023-08-22 23:29:34', 'Bjoern'),
(20, '0xD6c2051CD04E4b9cF6eff31cb667bACA', '6KcSw57wf4Foa3ATTI8WjEaE', 10000.00, '2023-08-22 23:30:07', '2023-08-22 23:30:07', 'Nici Health Support'),
(21, '0xdAF3FBcFAcd746d4E7AbC46DCDFDcbb6', '18An9s8K2gKY0kCfhKpI8Lu5', 18182.00, '2023-08-22 23:30:46', '2023-08-22 23:30:46', 'Nico'),
(22, '0x015FB47136a0bdfB3EC0155E1bA7FcA6', 'J3I15ch4pW6VpnNiLFbdGVo0', 22728.00, '2023-08-22 23:31:19', '2023-08-22 23:31:19', 'Achim & Katja'),
(23, '0xAb55e3Ffd9fbD9e3510e4e68a0678aB6', 'ZkAhcex27V0C7Rgqtvd1xcx8', 10000.00, '2023-08-22 23:32:13', '2023-08-22 23:32:13', 'Lisa'),
(24, '0x0000000000000000000000000000000000000002', '1uAv1NrxaMOML55PkNarBdzg', 222000000.00, '2023-08-22 23:32:45', '2023-08-22 23:32:45', 'of Security 0x02'),
(25, '0xa3cc4D301a57e12A1DBCDdAe5742e1de', 'wZdtBpjbeZEkuaraHam5Lh7M', 10000.00, '2023-08-22 23:33:15', '2023-08-22 23:33:15', 'Nici'),
(26, '0xaFc0AbD0C7D06f5484CEa274b773fEEF', 'mufBC19MAm2Psm8JhPC4ss8r', 1667.00, '2023-08-22 23:33:49', '2023-08-22 23:33:49', 'Normen'),
(27, '0x858b83Ae6ADFbae1edc4DEd3d06Acbb2', 'IyOxKYjeuRwtLmKnd7mzZ5fI', 125000.00, '2023-08-22 23:34:18', '2023-08-22 23:34:18', 'Paola'),
(28, '0x1E4D826Dfff96aC9a3e148dEd73B8CaB', 's5LJAQTiWR30sfqB6CwnER5a', 1705.00, '2023-08-22 23:34:56', '2023-08-22 23:34:56', 'Anja'),
(29, '0x3bBc4Cea1e69E40FE2bD87A95a339E80', 'jvsb8sc0E5zHYsLAx62PRpBV', 6869.00, '2023-08-22 23:35:25', '2023-08-22 23:35:25', 'Harry'),
(30, '0xA7aB0baB61aAFC57d35EbA614cF9B9c0', 'vjvIdT5jOFKJQ6FsJ0wx8veX', 7500.00, '2023-08-22 23:35:57', '2023-08-22 23:35:57', 'Kim'),
(31, '0x9b9F914dBA1A4F688f35CebE4ce895B4', 'Zq7y8FQbBMWMgD8LwjAXz3sB', 10000.00, '2023-08-22 23:36:44', '2023-08-22 23:36:44', 'Ole'),
(33, '0x0000000000000000000000000000000000000001', '7U1geD8uoKdWTA3HaMXxn4oa', 100000000.00, '2023-08-22 23:37:49', '2023-08-22 23:37:49', 'of Security 0x01'),
(34, '0x1FC8D8b3b77Fd72eaf80F9dfaA40fDcF', 'LEcLl2nZvBCqrXBy1a4npdgs', 100000.00, '2023-08-22 23:38:26', '2023-08-22 23:38:26', 'Ursula'),
(35, '0x8aEb58C15EcCfFDed7024FA1DA3DBf3B', 'iJiNQTbAU4DTtS4IFwQQ9aa0', 12728.00, '2023-08-22 23:38:57', '2023-08-22 23:38:57', 'Kathy'),
(36, '0xAD5f95a40BA2fBCDa7EAdCA0eED9e93a', 'nQyWrvhccVsoZtzPZC4v0B7s', 449000.00, '2023-08-22 23:39:23', '2023-08-22 23:39:23', 'Leon'),
(37, '0x78BECc706a1ca7D77aaBCcb8fc4fFd4c', 'jxuQmJWjYG3BiULE1ghFa46C', 10000.00, '2023-08-22 23:39:58', '2023-08-22 23:39:58', 'Ana Valero'),
(38, '0x0000000000000000000000000000000000000000', 'rkc9gGGk878me84AXS4jyVUQ', 499999900.00, '2023-08-22 23:40:41', '2023-08-22 23:40:41', 'of Security 0x00'),
(39, '0x74b2A41Ce1fe45fAb96B22B5ff6C603f', 'W1zhACWwR1usn32xtzqAEmxA', 11364.00, '2023-08-23 01:13:16', '2023-08-23 01:13:16', 'Yuli'),
(40, '0xeDb1BFd38bC2ab4C7deEE564aBB3faDB', 'QGOAyD9AuCZbLc5gH11hd8xi', 57955.00, '2023-08-23 01:16:10', '2023-08-23 01:16:10', 'Mani'),
(41, '0x278bf8d26fBEA42EfF65210AB7ecDD67', 'x4zUadD5DABIGK9l4zwK4Fbr', 10000.00, '2023-08-23 01:23:58', '2023-08-23 01:23:58', 'Andreas'),
(42, '0x19DEbABc0EAeD5A13c37067C3AC4cE9B', 'MAUlCJB77ZQrkHzrLtDKlaxM', 1705.00, '2023-08-23 01:26:16', '2023-08-23 01:26:16', 'Mary'),
(43, '0xf12b2ff098edC5a6B2DDB49d0BAb1cD6', 'nmYskbJl66vMK2WoGMFRzQVJ', 12.00, '2023-08-23 18:31:56', '2023-08-23 18:31:56', 'mwhorse'),
(44, '0xd8dAE7F6feEca4cDCE1d8C50E342e2B0', 'Kirsche Dattel Grapefruit Apfel Nektarine Banane Zwetschge Quitten Rosinen Feige Ananas Pfirsich', 0.00, '2023-08-23 18:34:06', '2023-08-23 18:34:06', NULL),
(45, '0x3A0fb289C2b62647c7a7c0814F84cDAF', 'Johannisbeere Nektarine Zwetschge Mango Kirsche Pfirsich Zitrone Himbeere Apfel Banane Stachelbeere Trauben', 0.00, '2023-08-23 18:34:50', '2023-08-23 18:34:50', NULL),
(46, '0x757EAFCc43Ae7e8dEC3cBdb3de6F81bb', 'Banane Grapefruit Birne Melone Stachelbeere Erdbeere Himbeere Kiwi Mango Quitten Rosinen Trauben', 0.00, '2023-08-23 18:39:37', '2023-08-23 18:39:37', NULL),
(47, '0xd5335aB2A273f36Ee6CdD6AD44DaeF3E', 'Ananas Erdbeere Zwetschge Zitrone Himbeere Limette Kirsche Trauben Quitten Rosinen Feige Pfirsich', 0.00, '2023-08-23 18:42:25', '2023-08-23 18:42:25', NULL),
(48, '0xA2bd2DFC8ed38Fee133acb8Fd6cDbbdc', 'qbHbfRqymIPVM0Qk4YuqUq1s', 0.00, '2023-08-23 19:48:17', '2023-08-23 19:48:17', NULL),
(49, '0xAd3D1915fcdf8f0cc0C77f6D2BF70e14', 'xwXDPlCxcG5wWeIEIu0t64ws', 0.00, '2023-08-23 19:48:42', '2023-08-23 19:48:42', NULL),
(50, '0x7af7a85d5eCfB99b42Eb8B53a1Fdc74B', 'klqo4Xolhl8Cy3SHYSBXVpV1', 0.00, '2023-08-23 19:52:29', '2023-08-23 19:52:29', NULL),
(51, '0xD93835690F1B607F5be75B49BC16ac18ad84c97D', 'WPFQzMo3JAESyAnh8UTlITyl', 42.00, '2023-08-24 06:22:01', '2023-08-24 06:22:01', NULL),
(52, '0x57Bb93DA07fde7407AfC5Dc3C6fd7f7c', 'fOwABqKnIJLdI9fFEXWnVZGl', 51200.00, '2023-08-24 17:30:58', '2023-08-24 17:30:58', NULL),
(53, '0x470D960aAaCEB3FfADf0d3aaFC9df8aF', 'ssOESvafrSCG8EBz2zRYB0dy', 0.00, '2023-08-24 19:37:40', '2023-08-24 19:37:40', NULL),
(54, '0xff0FC0dba5bd3eC16cEb833C485a4B3b', 'mJoARtqi3j9SUj9laMyZGFct', 0.00, '2023-08-28 03:40:50', '2023-08-28 03:40:50', NULL),
(55, '0xD91Af6bBDD7B14C0E1BaE9849652Cc44', 't4x9bfeBJLbxQPgrBHudrUSU', 0.00, '2023-08-31 20:39:41', '2023-08-31 20:39:41', 'mwhorse'),
(56, '0x8FaD180C9c26DdD3e88c7639a2eA9EdF9fFEE2CB', 'hSa1YvlVx6287phiEqx3hYIXWW9yac', 0.00, '2023-09-12 23:43:13', '2023-09-12 23:43:13', 'null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
