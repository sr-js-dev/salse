-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2019 at 07:59 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salesctw_salesc2`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verify_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_verify` int(11) NOT NULL DEFAULT '0',
  `ipaddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `email_verified_at`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`, `verify_token`, `is_verify`, `ipaddress`) VALUES
(7, 'wangxin', 'txfreelancer62@gmail.com', NULL, '232424212121', '$2y$10$VboEGtFuKPO2zAAikYOgJOk/ZoWfxfJux7OKT9wkJvIadn/qXVkj6', NULL, '2019-05-22 07:40:17', '2019-05-22 07:40:36', '5ce56d611180f', 1, '216.99.154.181'),
(8, 'Matt', 'matt@gmail.com', NULL, '902323533453', '$2y$10$KwSEi9fFDlGec0GKxeM/guQHtTGC8gvcNICvS4i3cwidwBwkc0Roy', NULL, '2019-05-22 07:59:04', '2019-05-22 08:00:01', '5ce571c8db26d', 1, '216.99.154.181');

-- --------------------------------------------------------

--
-- Table structure for table `customer_accounts`
--

CREATE TABLE `customer_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `segment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `pocname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_accounts`
--

INSERT INTO `customer_accounts` (`id`, `segment`, `name`, `division`, `address`, `city`, `state`, `zip`, `pocname`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Hospital', 'apollo', 'Orthopedic', 'dlf square,phase1, gurgaon, India - 122001', 'Dandong', 'Liaoning', 118004, 'lorem ipsum', '+867180968169', 'txfreelancer62@gmail.com', '2019-05-15 15:52:01', '2019-05-15 15:52:01'),
(2, 'Hospital2', 'apollo2', 'Orthopedic2', '2dlf square,phase1, gurgaon, India - 121001', 'spring town', 'texas', 118000, 'lorem ipsum', '+940689895623', 'matt@gmail.com', '2019-05-15 15:52:51', '2019-05-15 15:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `customer_accounts_stores`
--

CREATE TABLE `customer_accounts_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `segment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` int(11) NOT NULL,
  `pocname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_accounts_stores`
--

INSERT INTO `customer_accounts_stores` (`id`, `segment`, `name`, `division`, `address`, `city`, `state`, `zip`, `pocname`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Hospital', 'apollo', 'Orthopedic', 'dlf square,phase1, gurgaon, India - 122001', '', '', 0, '', '', 'info@test.com', NULL, NULL),
(2, 'Hospital2', 'apollo2', 'Orthopedic2', '2dlf square,phase1, gurgaon, India - 121001', '', '', 0, '', '123123123123', 'info1@test.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_services`
--

CREATE TABLE `customer_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_allocation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_services`
--

INSERT INTO `customer_services` (`id`, `task_type`, `activity_type`, `report_allocation`, `created_at`, `updated_at`) VALUES
(1, 'procedure', 'new implant', 'revenue', '2019-05-15 16:20:55', '2019-05-15 16:20:55'),
(2, 'procedure2', 'new implant2', 'revenue2', '2019-05-15 16:21:03', '2019-05-15 16:21:03'),
(3, 'procedure', 'new implant', 'revenue', '2019-05-15 19:44:34', '2019-05-15 19:44:34'),
(4, 'procedure', 'new implant', 'revenue', '2019-05-20 20:23:57', '2019-05-20 20:23:57'),
(5, 'procedure', 'new implant', 'revenue', '2019-05-21 06:03:09', '2019-05-21 06:03:09'),
(6, 'procedure2', 'new implant', 'revenue', '2019-05-21 06:03:13', '2019-05-21 06:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `customer_services_store`
--

CREATE TABLE `customer_services_store` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activity_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `report_allocation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_services_store`
--

INSERT INTO `customer_services_store` (`id`, `task_type`, `activity_type`, `report_allocation`, `created_at`, `updated_at`) VALUES
(1, 'procedure', 'new implant', 'revenue', '0000-00-00 00:00:00', NULL),
(2, 'procedure2', 'new implant2', 'revenue2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_team`
--

CREATE TABLE `customer_team` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `territory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_team`
--

INSERT INTO `customer_team` (`id`, `name`, `title`, `role`, `area`, `region`, `territory`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'wang xin', 'Breast Cancer Research Foundation', 'CORPORATE COMM', 'United state of america', 'New Jersey', 'ILLINIOS', '7180968169', 'txfreelancer62@gmail.com', '2019-05-15 14:32:02', '2019-05-15 14:32:02'),
(2, 'matt', 'Breast Cancer Research Foundation', 'CORPORATE COMM-2', 'United state of america-2', 'New Jersey-2', 'ILLINIOS-2', '+940689895623', 'mattmcafee@gmail.com', '2019-05-15 15:18:57', '2019-05-15 15:18:57'),
(3, 'wang xin', 'To serve through honesty and social justice.', 'CORPORATE COMM', 'United state of america', 'New Jersey', 'ILLINIOS', '234234968169', 'tertrlancer62@gmail.com', '2019-05-15 15:47:16', '2019-05-15 15:47:16'),
(4, 'wang xin', 'To serve through honesty and social justice.', 'CORPORATE COMM', 'United state of america', 'New Jersey', 'ILLINIOS', '7180968169', 'txfreelancer62@gmail.com', '2019-05-18 11:21:01', '2019-05-18 11:21:01'),
(5, 'wang xin', 'To serve through honesty and social justice.', 'CORPORATE COMM', 'United state of america', 'New Jersey', 'ILLINIOS', '17180968728', 'txfreelancer62@gmail.com', '2019-05-20 20:24:28', '2019-05-20 20:24:28'),
(6, 'wang xin', 'To serve through honesty and social justice.', 'CORPORATE COMM', 'United state of america', 'New Jersey', 'ILLINIOS', '7180968169', 'txfreelancer62@gmail.com', '2019-05-21 06:40:35', '2019-05-21 06:40:35'),
(7, 'wang xin', 'To serve through honesty and social justice.', 'CORPORATE COMM', 'United state of america', 'New Jersey', 'ILLINIOS', '7180968169', 'txfreelancer62@gmail.com', '2019-05-21 06:55:10', '2019-05-21 06:55:10'),
(8, 'wang xin', 'To serve through honesty and social justice.', 'CORPORATE COMM', 'United state of america', 'New Jersey', 'ILLINIOS', '7180968169', 'txfreelancer62@gmail.com', '2019-05-21 19:46:21', '2019-05-21 19:46:21'),
(9, 'wang xin', 'Breast Cancer Research Foundation', 'CORPORATE COMM', 'United state of america', 'New Jersey', 'ILLINIOS', '7180968169', 'txfreelancer62@gmail.com', '2019-05-22 09:49:48', '2019-05-22 09:49:48');

-- --------------------------------------------------------

--
-- Table structure for table `customer_team_stores`
--

CREATE TABLE `customer_team_stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `territory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_team_stores`
--

INSERT INTO `customer_team_stores` (`id`, `name`, `title`, `role`, `area`, `region`, `territory`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'MRITYUNJAY G', 'ASSOCIATE DIRECTOR', 'CORPORATE COMM', 'United state of america', 'New Jersey', 'ILLINIOS', '3224214124124', '', NULL, NULL),
(2, 'MRITYUNJAY G-2', 'ASSOCIATE DIRECTOR-2', 'CORPORATE COMM-2', 'United state of america-2', 'New Jersey-2', 'ILLINIOS-2', '123123123123', 'as@as.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `division` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `segment`, `name`, `division`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(1, 'this is the first title', 'hospital', 'wang xin', 'united', '2019-05-02', '2019-05-03', '2019-05-18 17:46:36', '2019-05-18 17:46:36'),
(2, 'To serve through honesty and social justice.', 'ssss', 'xiaotian', 'united', '2019-05-22', '2019-05-23', '2019-05-18 18:19:09', '2019-05-18 18:19:09'),
(3, 'Foster Care 2 Success', 'hospital222', 'Corner', 'Spring', '2019-05-21', '2019-05-22', '2019-05-19 06:29:03', '2019-05-19 06:29:03'),
(4, 'Foster Care 2 Success', 'Hospital3', 'Matt', 'Division3', '2019-05-22', '2019-05-23', '2019-05-19 17:35:32', '2019-05-19 17:35:32'),
(5, 'National Alliance on Mental Health (NAMI)', 'Hospital5', 'John', 'Spring', '2019-05-29', '2019-05-30', '2019-05-19 17:36:00', '2019-05-19 17:36:00'),
(6, 'To serve through honesty and social justice.', 'hospital', 'New Form', 'Division3', '2019-05-08', '2019-05-16', '2019-05-22 09:51:37', '2019-05-22 09:51:37');

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
(1, '2019_05_14_155605_create_customer_customers_table', 1),
(2, '2019_05_14_163029_create_customer_services_table', 2),
(3, '2019_05_12_203515_customer_team', 3),
(4, '2019_05_12_234450_customer_services', 4),
(5, '2019_05_12_232748_cutomer_customers', 5),
(6, '2019_05_16_001819_create_customer_services_table', 6),
(8, '2019_05_18_035552_create_events_table', 7),
(9, '2019_05_18_091431_create_events_table', 8),
(10, '2019_05_18_220043_create_schedule_table', 9),
(11, '2019_05_19_011047_create_events_table', 10),
(12, '2019_05_19_011151_create_schedule_table', 11),
(13, '2019_05_19_011512_create_schedule_table', 12),
(14, '2019_05_19_011814_create_schedule_table', 13),
(15, '2019_05_20_223713_create_team_table', 14);

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
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `territory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0',
  `verify_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_customers_store_phone_unique` (`phone`),
  ADD UNIQUE KEY `customer_customers_store_email_unique` (`email`);

--
-- Indexes for table `customer_accounts_stores`
--
ALTER TABLE `customer_accounts_stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_customers_phone_unique` (`phone`),
  ADD UNIQUE KEY `customer_customers_email_unique` (`email`);

--
-- Indexes for table `customer_services`
--
ALTER TABLE `customer_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_services_store`
--
ALTER TABLE `customer_services_store`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_team`
--
ALTER TABLE `customer_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_team_stores`
--
ALTER TABLE `customer_team_stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_team_stores_phone_unique` (`phone`),
  ADD UNIQUE KEY `customer_team_stores_email_unique` (`email`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
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
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_accounts`
--
ALTER TABLE `customer_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_accounts_stores`
--
ALTER TABLE `customer_accounts_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_services`
--
ALTER TABLE `customer_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer_services_store`
--
ALTER TABLE `customer_services_store`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_team`
--
ALTER TABLE `customer_team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer_team_stores`
--
ALTER TABLE `customer_team_stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
