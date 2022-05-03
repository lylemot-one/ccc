-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 07:38 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meslai`
--

-- --------------------------------------------------------

--
-- Table structure for table `coop_type1s`
--

CREATE TABLE `coop_type1s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coop_L1ID` int(11) NOT NULL,
  `coop_L1Text` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coop_type1s`
--

INSERT INTO `coop_type1s` (`id`, `coop_L1ID`, `coop_L1Text`, `created_at`, `updated_at`) VALUES
(1, 1000, 'Government', NULL, NULL),
(2, 2000, 'Community', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coop_type2s`
--

CREATE TABLE `coop_type2s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coop_L1ID` int(11) NOT NULL,
  `coop_L2ID` int(11) NOT NULL,
  `coop_L2Text` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coop_type2s`
--

INSERT INTO `coop_type2s` (`id`, `coop_L1ID`, `coop_L2ID`, `coop_L2Text`, `created_at`, `updated_at`) VALUES
(1, 1000, 1001, 'Plantilla', '2022-03-31 16:00:00', '2022-03-31 16:00:00'),
(2, 1000, 1002, 'Casual', '2022-03-31 16:00:00', '2022-03-31 16:00:00'),
(3, 1000, 1003, 'Contract', '2022-03-31 16:00:00', '2022-03-31 16:00:00'),
(4, 2000, 2001, 'Farmer', '2022-03-31 16:00:00', '2022-03-31 16:00:00'),
(5, 2000, 2002, 'Market Vendor', '2022-03-31 16:00:00', '2022-03-31 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dependents`
--

CREATE TABLE `dependents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coop_MID` bigint(20) NOT NULL,
  `dpdnt_Name` char(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dpdnt_DOB` date NOT NULL,
  `dpdnt_Rel` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dependents`
--

INSERT INTO `dependents` (`id`, `coop_MID`, `dpdnt_Name`, `dpdnt_DOB`, `dpdnt_Rel`, `created_at`, `updated_at`) VALUES
(1, 5, 'Test Dep', '2022-04-04', 'Brother', '2022-04-03 09:20:24', '2022-04-03 09:20:24'),
(2, 5, 'Test Dep2', '2022-04-04', 'Sister', '2022-04-03 09:20:24', '2022-04-03 09:20:24'),
(3, 7, 'Test Dep', '2022-04-04', 'Brother', '2022-04-03 09:26:45', '2022-04-03 09:26:45'),
(4, 7, 'Test Dep2', '2022-04-04', 'Sister', '2022-04-03 09:26:45', '2022-04-03 09:26:45'),
(5, 8, 'Test Dep', '2022-04-04', 'Brother', '2022-04-03 09:29:20', '2022-04-03 09:29:20'),
(6, 8, 'Test Dep2', '2022-04-04', 'Sister', '2022-04-03 09:29:20', '2022-04-03 09:29:20'),
(7, 9, 'Test Depupdate', '2022-04-04', 'Brother', '2022-04-03 09:37:12', '2022-04-03 10:12:58'),
(8, 9, 'Test Depupdate', '2022-04-04', 'Sister', '2022-04-03 09:37:12', '2022-04-03 10:12:58'),
(9, 10, 'Test Dep2update', '2022-04-04', 'Sisterupd', '2022-04-03 09:39:32', '2022-04-03 10:12:58'),
(10, 10, 'Test Dep2update', '2022-04-04', 'Sisterupd', '2022-04-03 09:39:32', '2022-04-03 10:12:58'),
(11, 11, 'Test Depu1', '2022-04-04', 'test1', '2022-04-03 09:40:39', '2022-04-03 10:32:08'),
(12, 11, 'Test Depu3', '2022-04-04', '3test23', '2022-04-03 09:40:39', '2022-04-03 10:32:08'),
(13, 11, 'Test Depu2', '2022-04-04', '3test3', '2022-04-03 09:40:39', '2022-04-03 10:32:08'),
(14, 10, '3123', '2022-04-19', '213', '2022-04-03 10:56:39', '2022-04-03 10:56:39'),
(15, 10, '2', '2022-04-20', '23', '2022-04-03 10:56:39', '2022-04-03 10:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `coop_MID` bigint(20) UNSIGNED NOT NULL,
  `coop_TypeL1` int(11) NOT NULL,
  `coop_TypeL1Txt` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coop_TypeL2` int(11) NOT NULL,
  `coop_TypeL2Txt` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_FName` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_LName` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_MName` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_Address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_Tel` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info_Cell` char(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_EAdd` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_BDay` date NOT NULL,
  `info_BPlace` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_CStatus` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_Gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_Citizen` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_Income` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_MthIncome` int(11) NOT NULL,
  `info_Education` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info_Spouse` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_ID` int(11) DEFAULT NULL,
  `emp_Status` int(11) DEFAULT NULL,
  `emp_Dept` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_Pos` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_TelWork` int(11) DEFAULT NULL,
  `emp_TIN` int(11) DEFAULT NULL,
  `emp_GSIS` int(11) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`coop_MID`, `coop_TypeL1`, `coop_TypeL1Txt`, `coop_TypeL2`, `coop_TypeL2Txt`, `info_FName`, `info_LName`, `info_MName`, `info_Address`, `info_Tel`, `info_Cell`, `info_EAdd`, `info_BDay`, `info_BPlace`, `info_CStatus`, `info_Gender`, `info_Citizen`, `info_Income`, `info_MthIncome`, `info_Education`, `info_Spouse`, `emp_ID`, `emp_Status`, `emp_Dept`, `emp_Pos`, `emp_TelWork`, `emp_TIN`, `emp_GSIS`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1000, 'Government', 1001, 'Plantilla', 'John', 'Doe', 'M.', '16 National Road, Putatan, Muntinlupa, Laguna, 1772', NULL, '639178752848', 'thisismyemail@website.com', '1989-01-01', 'Muntinlupa', 'Single', 'M', 'Filipino', 'Work', 50000, 'PLMUN', 'Jane Doe', 8001293, 1234, NULL, NULL, NULL, NULL, NULL, 1, 1, '2022-03-30 08:34:08', '2022-04-03 11:14:55'),
(2, 2000, 'Community', 2001, 'Farmer', 'Mark', 'Gianan', 'P.', '#78 National Road, Tunasan, Muntinlupa, Laguna, 1775', NULL, '639178752848', 'thisismyemail@website.com', '1974-02-02', 'Luzon', 'Widowed', 'F', 'Pipino', 'Work', 50000, 'PLMUN', 'Jane Doe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-03-30 08:45:10', '2022-03-30 08:45:10'),
(3, 2000, 'Community', 2001, 'Farmer', 'asd', 'PH', 'asd', 'PH, PH, PH, 123', NULL, '639178752848', 'thisismyemail@website.com', '2022-04-06', 'asd', 'Single', 'M', 'aasd', 'Work', 23, 'PLMUN', 'PH', 8001293, 12123, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-01 10:53:36', '2022-04-01 10:53:36'),
(4, 2000, 'Community', 2002, 'Market Vendor', 'Given', 'Last', 'Middel', 'Home, City, Province, 1152', NULL, '639178752848', 'emailme@website.com', '2022-04-07', 'Luzon', 'Single', 'M', 'Pipino', 'Work', 50000, 'PLMUN', 'Spouse', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-01 11:05:45', '2022-04-01 11:05:45'),
(5, 2000, 'Community', 2002, 'Market Vendor', 'TestG', 'TestLast', 'Test', '#52 National Road, Muntinlupa, Metro Manila, 1772', NULL, '639178752848', 'thisismyemail@website.com', '2022-04-04', 'Luzon', 'Single', 'M', 'Pipino', 'Work', 50000, 'PLMUN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-03 09:20:24', '2022-04-03 09:20:24'),
(6, 2000, 'Community', 2002, 'Market Vendor', 'TestG', 'TestLast', 'Test', '#52 National Road, Muntinlupa, Metro Manila, 1772', NULL, '639178752848', 'thisismyemail@website.com', '2022-04-04', 'Luzon', 'Single', 'M', 'Pipino', 'Work', 50000, 'PLMUN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-03 09:22:20', '2022-04-03 09:22:20'),
(7, 2000, 'Community', 2002, 'Market Vendor', 'TestG', 'TestLast', 'Test', '#52 National Road, Muntinlupa, Metro Manila, 1772', NULL, '639178752848', 'thisismyemail@website.com', '2022-04-04', 'Luzon', 'Single', 'M', 'Pipino', 'Work', 50000, 'PLMUN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-03 09:26:45', '2022-04-03 09:26:45'),
(8, 2000, 'Community', 2002, 'Market Vendor', 'TestG', 'TestLast', 'Test', '#52 National Road, Muntinlupa, Metro Manila, 1772', NULL, '639178752848', 'thisismyemail@website.com', '2022-04-04', 'Luzon', 'Single', 'M', 'Pipino', 'Work', 50000, 'PLMUN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-03 09:29:19', '2022-04-03 09:29:19'),
(9, 2000, 'Community', 2002, 'Market Vendor', 'TestG', 'TestLast', 'Test', '#52 National Road, Muntinlupa, Metro Manila, 1772', NULL, '639178752848', 'thisismyemail@website.com', '2022-04-04', 'Luzon', 'Single', 'M', 'Pipino', 'Work', 50000, 'PLMUN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-04-03 09:37:12', '2022-04-03 09:37:12'),
(10, 2000, 'Community', 2001, 'Farmer', 'Test', 'Test', 'test', 'test, test, test, 19223', NULL, '639178752848', 'thisismyemail@website.com', '2022-04-04', 'Luzon', 'Single', 'M', 'Pipino', 'Work Work Work', 50000, 'PLMUN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2022-04-03 09:39:32', '2022-04-03 10:10:52'),
(11, 2000, 'Community', 2002, 'Market Vendor', 'test', 'test', 'testa', 'asdasd, asd, ads, 123', NULL, '639178752848', 'thisismyemail@website.com', '2022-04-04', 'asd', 'Single', 'M', 'ads', 'Work', 50000, 'PLMUN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2022-04-03 09:40:38', '2022-04-03 10:32:08');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_03_25_072535_create_members_table', 2),
(6, '2022_03_27_163810_update_members_table', 3),
(7, '2022_03_29_122242_create_dependents_table', 4),
(8, '2022_03_30_031141_update_members2_table', 4),
(9, '2022_03_30_152555_update_members_table', 5),
(10, '2022_03_31_192432_update_dependents_table', 6),
(11, '2022_04_01_064826_create_coop_type1s_table', 6),
(12, '2022_04_01_064848_create_coop_type2s_table', 6),
(13, '2022_04_01_182204_update_members2_table', 7);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'TestUser', 'ferdiebles@gmail.com', NULL, '$2y$10$F1UAJRuUgFF.xJxMl6wNXOU6ncWT0jIk6hGwkI9W7e4Q.MTzC4cim', NULL, '2022-03-24 22:33:32', '2022-03-24 22:33:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coop_type1s`
--
ALTER TABLE `coop_type1s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coop_type2s`
--
ALTER TABLE `coop_type2s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dependents`
--
ALTER TABLE `dependents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`coop_MID`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coop_type1s`
--
ALTER TABLE `coop_type1s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coop_type2s`
--
ALTER TABLE `coop_type2s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dependents`
--
ALTER TABLE `dependents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `coop_MID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
