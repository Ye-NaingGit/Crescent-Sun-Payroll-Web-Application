-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 04:36 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payroll-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2024_02_14_141413_create_occupations_table', 2),
(14, '2024_02_14_141541_create_users_table', 2),
(18, '2024_02_14_141555_create_salaries_table', 3),
(19, '2024_02_23_164426_add_image_to_users', 4);

-- --------------------------------------------------------

--
-- Table structure for table `occupations`
--

CREATE TABLE `occupations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `baseSalary` double NOT NULL,
  `permission` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `occupations`
--

INSERT INTO `occupations` (`id`, `name`, `baseSalary`, `permission`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1300, 1, '2024-02-17 02:26:16', '2024-02-17 05:29:45'),
(2, 'Clerk', 800, 0, '2024-02-17 02:27:26', '2024-02-17 02:27:26'),
(3, 'Manager', 1100, 1, '2024-02-17 05:27:23', '2024-02-17 05:30:31'),
(6, 'Assistant', 800, 0, '2024-02-18 20:03:35', '2024-02-18 20:03:35'),
(7, 'Intern', 300, 0, '2024-02-18 20:35:11', '2024-02-18 20:35:11'),
(8, 'Secretary', 600, 0, '2024-02-18 20:36:09', '2024-02-18 20:36:09'),
(9, 'Accountant', 750, 0, '2024-02-23 11:44:31', '2024-02-23 11:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employeeName` varchar(255) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `employeeID` bigint(20) UNSIGNED DEFAULT NULL,
  `adminID` bigint(20) UNSIGNED DEFAULT NULL,
  `baseSalary` double NOT NULL,
  `attendence` double NOT NULL,
  `attendence_bonus` double NOT NULL,
  `bonus` double NOT NULL,
  `bonus_Information` varchar(255) DEFAULT NULL,
  `fine` double NOT NULL,
  `fine_Information` varchar(255) DEFAULT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `employeeName`, `adminName`, `employeeID`, `adminID`, `baseSalary`, `attendence`, `attendence_bonus`, `bonus`, `bonus_Information`, `fine`, `fine_Information`, `total`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'Admin', NULL, 1, 1000, 100, 100, 0, NULL, 0, NULL, 1100, '2024-02-17 02:49:05', '2024-02-17 02:49:05'),
(2, 'Assistant', 'Admin', NULL, 1, 800, 90, 72, 10, NULL, 20, NULL, 862, '2024-02-17 08:42:28', '2024-02-17 08:42:28'),
(3, 'User', 'Ye Naing', 5, 6, 800, 95, 80, 50, NULL, 5, NULL, 925, '2024-02-17 09:52:41', '2024-02-17 09:52:41'),
(4, 'Manager', 'Ye Naing', 7, 6, 1100, 95, 110, 50, 'Overtime Bonus', 10, 'Penalty', 1250, '2024-02-17 10:01:27', '2024-02-17 10:01:27'),
(5, 'Admin', 'Ye Naing', 1, 6, 1300, 95, 130, 100, NULL, 30, NULL, 1500, '2024-02-18 00:26:35', '2024-02-18 00:26:35'),
(6, 'Ye Naing', 'Admin', 6, 1, 1300, 100, 130, 50, NULL, 0, NULL, 1480, '2024-02-18 00:29:16', '2024-02-18 00:29:16'),
(7, 'User', 'Admin', 5, 1, 800, 95, 80, 50, 'Overtime', 0, NULL, 930, '2024-02-18 19:48:33', '2024-02-18 19:48:33'),
(8, 'Anna', 'Admin', 9, 1, 600, 93, 54, 50, NULL, 0, NULL, 704, '2024-02-18 20:38:39', '2024-02-18 20:38:39'),
(9, 'User', 'Ye Naing', 5, 6, 800, 100, 80, 100, NULL, 50, NULL, 930, '2024-02-22 19:19:09', '2024-02-22 19:19:09'),
(10, 'Admin', 'Ye Naing', 1, 6, 1300, 30, 0, 0, NULL, 0, NULL, 1300, '2024-02-22 21:46:33', '2024-02-22 21:46:33'),
(11, 'Kyle', 'Ye Naing', 10, 6, 300, 80, 24, 20, NULL, 0, NULL, 324, '2024-02-23 04:36:42', '2024-02-23 04:36:42'),
(12, 'Ye Naing', 'Admin', 6, 1, 1300, 95, 130, 20, 'Overtime', 0, NULL, 1450, '2024-02-23 04:37:59', '2024-02-23 04:37:59'),
(13, 'User', 'Ye Naing', 5, 6, 800, 100, 80, 30, NULL, 10, NULL, 900, '2024-02-23 10:43:41', '2024-02-23 10:43:41'),
(14, 'Kyle', 'Ye Naing', 10, 6, 300, 100, 30, 10, 'Overtime', 5, NULL, 335, '2024-03-12 04:53:17', '2024-03-12 04:53:17'),
(15, 'Carol', 'Ye Naing', 11, 6, 750, 90, 67.5, 100, NULL, 30, NULL, 887.5, '2024-04-02 10:38:06', '2024-04-02 10:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `occupation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `bankAccount` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `occupation_id`, `address`, `phone`, `bankAccount`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Admin', 'Admin@gmail.com', '$2y$12$nuvaSUYKGkhtnCaNAZaFputnwrCnx3XNMO41ClQzjm53AMV80boEG', 1, 'No(10) King Road', '09123456789', '1111111122447865', NULL, '2024-02-17 02:26:57', '2024-02-22 19:35:39', NULL),
(5, 'User', 'User@gmail.com', '$2y$12$G1VakycRbQ4n8XBkLt/sMebnm2xuzRmkbjf4O0o//j6NL21pkZCAe', 2, 'No(1) Forest road', '09123456789', '1234567891025723', NULL, '2024-02-17 02:46:43', '2024-03-31 07:47:57', 'profile/f0cr6gReik78gjlo8fKnOuaaxISTaxc1EIDlATQr.png'),
(6, 'Ye Naing', 'YN@gmail.com', '$2y$12$ngjv2k63AUVXwLCkSPjJ5.dFZRmVxpiyhpSxzIi/MW/wDfiuzzC5a', 1, 'No(10), Cloud road', '09687423490', '7689354676230092', NULL, '2024-02-17 05:10:44', '2024-02-23 11:43:16', 'profile/mmu416nM8ZBGQC85RwddvonYO2qrUTpNUXkeqpyw.png'),
(7, 'Manager', 'Manager@gmail.com', '$2y$12$aKhXZE70C7.r/jLTY2xskOi1m5yVpFyI6UaEKQDwd/gezFTgaFnMW', 3, 'No(28) Ruby Street', '09567854321', '7865090934212241', NULL, '2024-02-17 06:55:52', '2024-02-22 19:36:14', NULL),
(9, 'Anna', 'Anna1032@gmail.com', '$2y$12$JQ8s9HeUsW0nlvD1SsUzsOUnbRdCQ5ZGleJHYzjtTaG8jEBOdVyo.', 8, 'No(81) River Road', '09678234527', '6547884510237845', NULL, '2024-02-18 20:37:19', '2024-02-22 19:36:23', NULL),
(10, 'Kyle', 'Kyle302@gmail.com', '$2y$12$ck.rgq/Io7ctiY9YjQP09OOwreUU4ii0QWAO.tN9z.WlbIqk2VE9.', 7, 'No.(10), Shrimp Street', '09123456789', '1111222233334444', NULL, '2024-02-23 04:36:03', '2024-02-23 04:36:03', NULL),
(11, 'Carol', 'Carol@gmail.com', '$2y$12$fIpABGKHfNF.qdP/PlSLJO/zwaG6t5t/i5vx28Rmv1huPU0rZ.t3u', 9, 'No.(67), Rosemary Road', '09865777349', '0076534577969889', NULL, '2024-02-23 11:45:50', '2024-02-23 11:46:29', 'profile/qK0kBAD9etsSJWNfunI6BNgfeMKkUrWr2bErEkMV.png'),
(12, 'Catherine', 'Cathy@gmail.com', '$2y$12$01P1Za9csasYs38Cx6jGZefYYMs.Z9SBck7BuCOFhRFxggp5yy3nu', 6, 'No(76), Crown Street', '09888675340', '7997450089976123', NULL, '2024-02-24 08:11:07', '2024-02-24 08:11:07', NULL);

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
-- Indexes for table `occupations`
--
ALTER TABLE `occupations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salaries_employeeid_foreign` (`employeeID`),
  ADD KEY `salaries_adminid_foreign` (`adminID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_occupation_id_foreign` (`occupation_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `occupations`
--
ALTER TABLE `occupations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `salaries`
--
ALTER TABLE `salaries`
  ADD CONSTRAINT `salaries_adminid_foreign` FOREIGN KEY (`adminID`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `salaries_employeeid_foreign` FOREIGN KEY (`employeeID`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_occupation_id_foreign` FOREIGN KEY (`occupation_id`) REFERENCES `occupations` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
