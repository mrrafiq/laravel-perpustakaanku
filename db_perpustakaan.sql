-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2021 at 06:25 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `born_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `born_date`, `created_at`, `updated_at`) VALUES
(1, 'Piper Bray', '2016-05-19', '2021-08-06 01:33:35', '2021-08-06 01:33:35'),
(2, 'Cherokee Soto', '1979-11-02', '2021-08-24 00:40:32', '2021-08-24 00:40:32'),
(3, 'Merrill Page', '1997-04-28', '2021-08-24 00:40:39', '2021-08-24 00:40:39'),
(4, 'Griffith Cochran', '1974-08-21', '2021-08-24 00:40:49', '2021-08-24 00:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `year` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `title`, `author_id`, `publisher_id`, `year`, `stock`, `created_at`, `updated_at`) VALUES
(1, 4, 'Quia sunt a', 1, 4, '1976', 34, '2021-08-06 02:32:49', '2021-08-23 00:30:48'),
(2, 1, 'Aut in et la', 1, 4, '2010', 58, '2021-08-07 00:27:17', '2021-08-23 20:14:21'),
(3, 3, 'Nisi et in i', 1, 5, '1991', 90, '2021-08-07 01:58:21', '2021-08-23 00:19:11'),
(4, 4, 'Aliquip repr', 1, 4, '1980', 57, '2021-08-23 18:56:51', '2021-08-23 22:06:11'),
(5, 2, 'Pengantar Kuliah Hukum', 1, 5, '1972', 26, '2021-08-23 18:57:46', '2021-08-23 18:57:46'),
(6, 2, 'Elit aut ip', 1, 2, '1979', 13, '2021-08-23 22:13:40', '2021-08-23 22:13:40'),
(7, 1, 'Etika Partai Politik', 1, 5, '1982', 37, '2021-08-24 00:38:12', '2021-08-24 00:38:12'),
(8, 3, 'Gaya Hidup Sehat Larry', 1, 1, '2009', 69, '2021-08-24 00:38:35', '2021-08-24 00:38:35'),
(9, 4, 'Trend Pakaian Wanita 2020', 1, 3, '2009', 88, '2021-08-24 00:39:02', '2021-08-24 00:39:02'),
(10, 3, 'Manfaat Buah Zaitun', 1, 5, '2005', 100, '2021-08-24 00:39:39', '2021-08-24 00:39:39'),
(11, 3, 'Manfaat Minum Kopi di Pagi Hari', 1, 3, '2015', 13, '2021-08-24 00:40:06', '2021-08-24 00:40:06'),
(12, 5, 'Implementasi Sederhana IoT', 3, 5, '2020', 72, '2021-08-24 20:17:29', '2021-08-24 20:17:29'),
(13, 6, 'Pendekatan Khusus Qyamul Lail', 1, 6, '2010', 29, '2021-08-24 20:18:02', '2021-08-24 20:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `borrows`
--

CREATE TABLE `borrows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  `fine` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `borrows`
--

INSERT INTO `borrows` (`id`, `member_id`, `book_id`, `borrow_date`, `return_date`, `fine`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-08-12', '2021-08-18', 3000, 1, '2021-08-11 20:45:08', '2021-08-23 20:14:21'),
(2, 2, 3, '2021-08-12', '2021-08-17', 0, 1, '2021-08-11 22:11:40', '2021-08-23 00:19:11'),
(3, 2, 1, '2021-08-12', '2021-08-19', 0, 1, '2021-08-11 23:48:34', '2021-08-22 19:19:35'),
(4, 3, 1, '2021-08-12', '2021-08-19', 0, 1, '2021-08-11 23:53:21', '2021-08-17 20:52:07'),
(5, 3, 1, '2021-08-12', '2021-08-19', 0, 1, '2021-08-11 23:53:50', '2021-08-17 20:51:59'),
(6, 3, 3, '2021-08-23', '2021-08-30', 0, 1, '2021-08-22 21:45:21', '2021-08-22 22:24:07'),
(7, 1, 1, '2021-08-23', '2021-08-09', 7000, 1, '2021-08-22 22:13:04', '2021-08-23 00:30:48'),
(8, 3, 4, '2021-08-24', '2021-09-08', 0, 0, '2021-08-23 19:34:36', '2021-08-23 19:34:36'),
(9, 1, 3, '2021-08-24', '2021-08-31', 0, 0, '2021-08-23 19:42:33', '2021-08-23 19:42:33'),
(10, 1, 5, '2021-08-24', '2021-08-31', 0, 0, '2021-08-23 19:51:10', '2021-08-23 19:51:10'),
(11, 4, 4, '2021-08-24', '2021-08-31', 0, 1, '2021-08-23 20:24:41', '2021-08-23 22:06:11'),
(12, 5, 4, '2021-08-24', '2021-08-31', 0, 0, '2021-08-23 22:14:07', '2021-08-23 22:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Politik', '2021-08-06 01:26:00', '2021-08-06 01:26:00'),
(2, 'Hukum', '2021-08-06 01:26:00', '2021-08-06 01:26:00'),
(3, 'Gaya Hidup', '2021-08-06 01:26:00', '2021-08-06 01:26:00'),
(4, 'Fashion', '2021-08-06 01:26:00', '2021-08-06 01:26:00'),
(5, 'Teknologi', '2021-08-24 00:42:15', '2021-08-24 00:42:15'),
(6, 'Religi', '2021-08-24 00:42:25', '2021-08-24 00:42:25'),
(7, 'Pengembangan Diri', '2021-08-24 00:44:10', '2021-08-24 00:44:10');

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `unique_num`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, '887', 'Madeson Cohen', '(548)116-7181', 'Exercitation', '2021-08-11 19:02:30', '2021-08-11 19:02:30'),
(2, '187', 'Yetta Moore', '1(869)457-7822', 'Quisquam max', '2021-08-11 19:02:50', '2021-08-11 19:02:50'),
(3, '255', 'Sonya Cherry', '(744) 489-6395', 'In cum ex qu', '2021-08-11 19:03:12', '2021-08-11 19:03:12'),
(4, '771', 'Shad Adkins', '+11426093204', 'Et sed offic', '2021-08-23 20:15:03', '2021-08-23 20:15:03'),
(5, '895', 'Griffith Norton', '(648) 946-1422', 'Enim aut non', '2021-08-23 22:07:38', '2021-08-23 22:07:38'),
(6, '928', 'Hiram Ross', '(801)106-9686', 'Reprehenderi', '2021-08-24 18:51:27', '2021-08-24 18:51:27'),
(7, '478', 'Kameko Hamilton', '(751)698-8648', 'Est quis sa', '2021-08-24 18:51:37', '2021-08-24 18:51:37'),
(8, '657', 'Plato Hickman', '(454) 139-8237', 'Perspiciatis', '2021-08-24 18:51:48', '2021-08-24 18:51:48'),
(9, '746', 'Sydney Lawson', '(368)428-9666', 'Ipsum aute', '2021-08-24 18:51:59', '2021-08-24 18:51:59'),
(10, '962', 'Vivian Lynn', '(864)827-8381', 'Obcaecati au', '2021-08-24 18:52:10', '2021-08-24 18:52:10'),
(11, '114', 'Kathleen Murray', '(763)964-2899', 'Non animi v', '2021-08-24 18:52:26', '2021-08-24 18:52:26'),
(12, '618', 'Holmes Irwin', '(795)747-3711', 'Sint quaerat', '2021-08-24 20:16:25', '2021-08-24 20:16:25'),
(13, '904', 'Wesley Tyler', '(332)736-1447', 'Perferendis', '2021-08-24 20:16:36', '2021-08-24 20:16:36'),
(14, '933', 'Leilani Rodgers', '(694)508-7596', 'Ipsum asperi', '2021-08-24 20:24:31', '2021-08-24 20:24:31');

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
(4, '2021_06_04_085100_create_categories_table', 1),
(5, '2021_06_06_075431_create_publishers_table', 1),
(6, '2021_07_29_041507_create_authors_table', 1),
(7, '2021_07_30_065938_create_books_table', 1),
(8, '2021_08_01_100503_create_members_table', 1),
(9, '2021_08_02_012344_create_borrows_table', 1);

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
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Gramedia', 'a[sd,poasmdpasdoask', 'nonfiksi@gramediapublishers.com', '2021-08-06 01:26:00', '2021-08-06 01:26:00'),
(2, 'Elex Media Komputindo', 'a[sd,poasmdpasdoask', 'redaksi.emk@gramediapublishers.com', '2021-08-06 01:26:00', '2021-08-06 01:26:00'),
(3, 'Grasindo', 'a[sd,poasmdpasdoask', 'redaksi.emk@gramediapublishers.com', '2021-08-06 01:26:00', '2021-08-06 01:26:00'),
(4, 'BIP', 'a[sd,poasmdpasdoask', 'redaksi.emk@gramediapublishers.com', '2021-08-06 01:26:00', '2021-08-06 01:26:00'),
(5, 'Jack Hammond', 'Ad error do', 'qoviwupy@mailinator.com', '2021-08-06 01:45:47', '2021-08-06 01:45:47'),
(6, 'Ariel Marks', 'Dolore velit', 'jypekugytu@mailinator.com', '2021-08-06 01:46:22', '2021-08-06 01:46:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Withney', 'JohnWithney15', '$2y$10$hjJ1dPQBldRbE6Q7pATf.uLh.d/qOsSP3gEFIk.HFeF.SgM9KGWy.', NULL, '2021-08-06 01:26:00', '2021-08-06 01:26:00'),
(2, 'Rafiq Mulia Putra', 'rafiqrafiq', '$2y$10$cB3FRuD1T8aeDn3umQ2FPOIQET3G2ArAifQ8o1xbUxTRlYtsm81fq', NULL, '2021-08-06 01:26:00', '2021-08-06 01:26:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_category_id_foreign` (`category_id`),
  ADD KEY `books_author_id_foreign` (`author_id`),
  ADD KEY `books_publisher_id_foreign` (`publisher_id`);

--
-- Indexes for table `borrows`
--
ALTER TABLE `borrows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `borrows_member_id_foreign` (`member_id`),
  ADD KEY `borrows_book_id_foreign` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `borrows`
--
ALTER TABLE `borrows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);

--
-- Constraints for table `borrows`
--
ALTER TABLE `borrows`
  ADD CONSTRAINT `borrows_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `borrows_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
