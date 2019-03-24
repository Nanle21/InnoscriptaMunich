-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2019 at 04:35 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `munichrest`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `question_id`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '<!entity name “value”>', 1, NULL, NULL),
(2, 1, '<entity name “value”!>', 0, NULL, NULL),
(3, 1, '<”value” entity name>', 0, NULL, NULL),
(4, 1, '<!”value” entity name>', 0, NULL, NULL),
(5, 2, '&nnnn;', 0, NULL, NULL),
(6, 2, '&#nnnn;', 1, NULL, NULL),
(7, 2, '#nnnn;', 0, NULL, NULL),
(8, 2, '$*nnnn;', 0, NULL, NULL),
(9, 3, '&name;', 1, NULL, NULL),
(10, 3, '$name;', 0, NULL, NULL),
(11, 3, '%name;', 0, NULL, NULL),
(12, 3, '!name;', 0, NULL, NULL),
(13, 4, 'character entity reference', 0, NULL, NULL),
(14, 4, 'numeric character reference', 0, NULL, NULL),
(15, 4, 'predefined entities', 1, NULL, NULL),
(16, 4, 'character and numeric entity reference', 0, NULL, NULL),
(17, 5, 'quot', 0, NULL, NULL),
(18, 5, 'apos', 0, NULL, NULL),
(19, 5, 'gt', 0, NULL, NULL),
(20, 5, 'copy', 1, NULL, NULL),
(21, 6, 'apos', 0, NULL, NULL),
(22, 6, 'It?', 0, NULL, NULL),
(23, 6, 'cent', 1, NULL, NULL),
(24, 6, 'quot', 0, NULL, NULL),
(25, 7, '&quot', 0, NULL, NULL),
(26, 7, '&para', 0, NULL, NULL),
(27, 7, '&not', 1, NULL, NULL),
(28, 7, '&acute', 0, NULL, NULL),
(29, 8, '&aelig', 0, NULL, NULL),
(30, 8, '&aring', 0, NULL, NULL),
(31, 8, '&image', 1, NULL, NULL),
(32, 8, '&ecirc', 0, NULL, NULL);

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
(3, '2019_03_23_115144_create_questions_table', 1),
(4, '2019_03_23_115213_create_results_table', 1),
(5, '2019_03_23_121849_create_answers_table', 1);

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
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `created_at`, `updated_at`) VALUES
(1, 'Syntax of entity declaration is ___________', '2019-03-23 17:57:45', '2019-03-23 17:57:46'),
(2, 'What is the correct format of numeric character reference?', '2019-03-23 17:58:03', '0000-00-00 00:00:00'),
(3, 'What is the format for character entity reference?', '2019-03-23 17:58:14', '0000-00-00 00:00:00'),
(4, 'For entity which term is used by XML?', '2019-03-23 17:58:24', '0000-00-00 00:00:00'),
(5, 'Which entity is not defined in XML?', '2019-03-23 17:58:54', '0000-00-00 00:00:00'),
(6, 'Which entity is not for both HTML and XML?', '2019-03-23 17:59:04', '0000-00-00 00:00:00'),
(7, 'Which entity is not for punctuation character?', '2019-03-23 17:59:15', '0000-00-00 00:00:00'),
(8, 'Which of the following is not character entity?', '2019-03-23 17:59:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `passed` int(11) NOT NULL,
  `failed` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `user_id`, `passed`, `failed`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 5, '2019-03-23 23:21:06', '2019-03-23 23:21:06'),
(5, 2, 2, 6, '2019-03-24 01:43:33', '2019-03-24 01:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT 'nanle',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Nanle', 'paulnanle611@gmail.com', '$2y$10$TLVWAWw81aNfhLupAP7Gj.SqePTqD0ibPyBsxGYVN8wCHLBA0rpvC', '2019-03-23 23:12:09', '2019-03-23 23:12:09'),
(2, 'Precious Paul', 'preciousluke2000@yahoo.com', '$2y$10$iiMVXFnmeTR5AcigxShIGeufiWWxVHike001vrEHk.j/QXEl.2XRm', '2019-03-24 01:17:27', '2019-03-24 01:17:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
