-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2022 at 01:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stripe_subscription`
--

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
(5, '2022_07_29_163619_create_packages_table', 1),
(6, '2022_07_29_164503_create_plans_table', 2),
(7, '2019_05_03_000001_create_customer_columns', 3),
(8, '2019_05_03_000002_create_subscriptions_table', 3),
(9, '2019_05_03_000003_create_subscription_items_table', 3),
(10, '2022_07_29_200318_create_plans_table', 4);

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
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `interval_count` tinyint(4) NOT NULL DEFAULT 1,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `plan_id`, `name`, `billing_method`, `interval_count`, `price`, `currency`, `created_at`, `updated_at`) VALUES
(1, 'plan_M9JGmfXUu8R1f9', 'Basic', 'month', 1, '2000', 'usd', '2022-07-29 16:23:16', '2022-07-29 16:23:16'),
(2, 'plan_M9JJGFM5WlSoAL', 'Gold', 'month', 1, '3000', 'usd', '2022-07-29 16:25:37', '2022-07-29 16:25:37'),
(3, 'plan_M9JJF2EcBfxdWK', 'Premium', 'month', 1, '4000', 'usd', '2022-07-29 16:25:56', '2022-07-29 16:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `user_id`, `name`, `stripe_id`, `stripe_status`, `stripe_price`, `quantity`, `trial_ends_at`, `ends_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'default', 'sub_1LR0lkEzIQiMqj2YBSWAbrRb', 'active', 'plan_M9JGmfXUu8R1f9', 1, NULL, NULL, '2022-07-29 16:30:56', '2022-07-29 17:42:12'),
(2, 2, 'default', 'sub_1LR0s3EzIQiMqj2Y3ueMm63j', 'active', 'plan_M9JJF2EcBfxdWK', 1, NULL, NULL, '2022-07-29 16:37:26', '2022-07-29 16:37:26'),
(3, 3, 'default', 'sub_1LR13aEzIQiMqj2YJAFVjmLE', 'active', 'plan_M9JJGFM5WlSoAL', 1, NULL, NULL, '2022-07-29 16:49:21', '2022-07-29 16:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_items`
--

INSERT INTO `subscription_items` (`id`, `subscription_id`, `stripe_id`, `stripe_product`, `stripe_price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'si_M9JOzbEjufxSGc', 'prod_M9JGtPaXTaQnYd', 'plan_M9JGmfXUu8R1f9', 1, '2022-07-29 16:30:56', '2022-07-29 16:30:56'),
(2, 2, 'si_M9JV3T7IwKNFGe', 'prod_M9JJnSW20VEgPW', 'plan_M9JJF2EcBfxdWK', 1, '2022-07-29 16:37:26', '2022-07-29 16:37:26'),
(3, 3, 'si_M9JgIy9EyMMrEM', 'prod_M9JJzTJxfSwijc', 'plan_M9JJGFM5WlSoAL', 1, '2022-07-29 16:49:21', '2022-07-29 16:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'Abdul Qadeer', 'abdulqadeersolangi007@gmail.com', NULL, '$2y$10$v/hrvvMR2yDGKl3hl.eCB.D0MPnbZQ/t5.gS9u94SHeqDZErt0Uwq', NULL, '2022-07-29 16:28:46', '2022-07-29 16:30:52', 'cus_M9JOrDMaJcFwyJ', 'visa', '4242', NULL),
(2, 'David Joy', 'djoy62471@gmail.com', NULL, '$2y$10$Hbl9qPk3G6rVtAurOAVer.6ommOdKLbmNKPysM1cEKHY9E9fEzi5y', NULL, '2022-07-29 16:36:19', '2022-07-29 16:37:23', 'cus_M9JVpoNI6JNdYJ', 'visa', '4242', NULL),
(3, 'AQ', 'aq.developer007@gmail.com', NULL, '$2y$10$3RLgxp90R.i2uYZEDOwJfuZyQDibSUiYu3jvgHqByqMRxJiYjxTTi', NULL, '2022-07-29 16:48:12', '2022-07-29 16:49:18', 'cus_M9Jgx4lm3ecaiq', 'visa', '4242', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
