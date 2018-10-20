-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 09, 2018 at 09:44 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(11, 'PHP', 'This is PHP course !', 'php_1520424880.png', '2018-03-06 17:12:56', '2018-03-07 10:14:40'),
(12, 'JAVA', 'This is JAVA course !', 'java_1520424901.jpg', '2018-03-07 10:15:01', '2018-03-07 10:15:01'),
(13, 'JAVA-SCRIPT', 'This is JAVASCRIPT course !', 'js_1520424978.jpg', '2018-03-07 10:15:59', '2018-03-07 10:35:56'),
(14, 'LARAVEL', 'This is is LARAVEL course', 'laravel_1520527165.png', '2018-03-07 12:23:27', '2018-03-08 14:39:25'),
(15, 'HTML 5', 'This is HTML 5 course', 'html_1520527193.png', '2018-03-08 14:39:53', '2018-03-08 14:39:53'),
(16, 'PHYTON', 'This is PHYTON course', 'phyton_1520527222.jpg', '2018-03-08 14:40:22', '2018-03-08 14:40:22');

-- --------------------------------------------------------

--
-- Table structure for table `course_student`
--

DROP TABLE IF EXISTS `course_student`;
CREATE TABLE IF NOT EXISTS `course_student` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_student_course_id_foreign` (`course_id`),
  KEY `course_student_student_id_foreign` (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `course_student`
--

INSERT INTO `course_student` (`id`, `course_id`, `student_id`, `created_at`, `updated_at`) VALUES
(4, 11, 5, NULL, NULL),
(6, 11, 7, NULL, NULL),
(7, 12, 6, NULL, NULL),
(8, 14, 6, NULL, NULL),
(9, 16, 6, NULL, NULL),
(10, 12, 7, NULL, NULL),
(11, 11, 8, NULL, NULL),
(12, 12, 8, NULL, NULL),
(13, 13, 8, NULL, NULL),
(14, 14, 8, NULL, NULL),
(15, 15, 8, NULL, NULL),
(16, 16, 8, NULL, NULL),
(17, 11, 9, NULL, NULL),
(18, 14, 9, NULL, NULL),
(19, 15, 9, NULL, NULL),
(20, 11, 10, NULL, NULL),
(21, 12, 10, NULL, NULL),
(22, 16, 10, NULL, NULL),
(23, 11, 11, NULL, NULL),
(24, 14, 11, NULL, NULL),
(25, 11, 12, NULL, NULL),
(26, 12, 12, NULL, NULL),
(27, 13, 12, NULL, NULL),
(28, 14, 12, NULL, NULL),
(29, 15, 12, NULL, NULL),
(30, 11, 13, NULL, NULL),
(31, 12, 13, NULL, NULL),
(32, 14, 13, NULL, NULL),
(33, 15, 13, NULL, NULL),
(34, 16, 13, NULL, NULL),
(35, 11, 14, NULL, NULL),
(36, 12, 14, NULL, NULL),
(37, 14, 14, NULL, NULL),
(38, 12, 5, NULL, NULL),
(39, 14, 5, NULL, NULL),
(40, 13, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2018_02_27_143513_add_paid_to_users', 3),
(6, '2018_02_27_143829_add_role_to_users', 4),
(7, '2018_02_27_144010_add_phone_to_users', 5),
(26, '2018_03_02_111911_create_roles_table', 6),
(27, '2018_03_02_112936_create_role_user_table', 6),
(28, '2014_10_12_000000_create_users_table', 7),
(29, '2014_10_12_100000_create_password_resets_table', 7),
(30, '2018_02_26_222539_create_students_table', 7),
(31, '2018_02_27_141939_create_courses_table', 7),
(32, '2018_02_27_150343_add_role_to_users', 7),
(33, '2018_03_01_190451_add_image_to_users', 7),
(34, '2018_03_03_135054_create_course_student_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('bengala2071@gmail.com', '$2y$10$h0U8oV2LunZc3og7L.pr1.jYp8pQSCSzoI17NbojkgtS/uJGo/tje', '2018-03-07 12:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `phone`, `email`, `image`, `created_at`, `updated_at`) VALUES
(5, 'Shlomi hayunljjj', '0522222', 'shlomi@gmail.com', 'students_1520425361.jpg', '2018-03-07 10:22:41', '2018-03-09 07:56:15'),
(6, 'ben', '052222222', 'ben@gmail.com', 'plankton_1520527018.png', '2018-03-07 12:23:18', '2018-03-08 14:36:58'),
(7, 'gila', '05222', 'gila@gmail.com', 'sendi_1520497323.jpg', '2018-03-08 06:22:03', '2018-03-08 06:22:03'),
(8, 'shimon', '052222', '123@gmail.com', 'krab_1520527057.jpg', '2018-03-08 14:37:37', '2018-03-08 14:37:37'),
(9, 'gaga', '0522222', '123@gmail.com', 'sqidwid_1520527078.jpg', '2018-03-08 14:37:58', '2018-03-08 14:37:58'),
(10, 'lala', '0522', '123@gmail.com', 'students_1520527106.jpg', '2018-03-08 14:38:26', '2018-03-08 14:38:26'),
(11, 'alex', '0522', '123@gmail.com', 'noimage.jpg', '2018-03-08 14:41:01', '2018-03-08 14:41:01'),
(12, 'hen', '0522', '123@gmail.com', 'krab_1520527283.jpg', '2018-03-08 14:41:23', '2018-03-08 14:41:23'),
(13, 'haym', '05222', '123@gmail.com', 'patrik_1520527314.jpg', '2018-03-08 14:41:54', '2018-03-08 14:41:54'),
(14, 'dima', '0523650862', 'dima@gmail.com', 'patrik_1520584761.jpg', '2018-03-09 06:39:21', '2018-03-09 06:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `phone`, `image`) VALUES
(27, 'ben hagag', 'bengala2071@gmail.com', '$2y$10$/4bke2NLJplxQc.T0L.0..ymTi.dAkKJaJ6dgLABFYjHxBuwHDff.', 'OakuKObRPKOLyDbYxu6Y62j9Ql7WW2xYxTerVx2dt2Hi3VSj7tgEKFtVvkxJ', '2018-03-07 12:15:22', '2018-03-07 14:49:18', 'owner', '0523650862', 'spongebob_1520432122.png'),
(30, 'noam', 'noam@gmail.com', '$2y$10$F6GZArIifRjaao3fOLkpKe3lnHZ0YR/6tWKeEh5/moqxb8GfaAqzS', 'zBt5FltxclK670xIk7jdHLtYgucW7DPf2a9WkFWf1F5TiVOjZ6A2nrglO6vq', '2018-03-07 12:20:38', '2018-03-09 07:44:11', 'sales', '05222222', 'patrik_1520433907.jpg'),
(32, 'shinmon', 'shimon@gmail.com', '$2y$10$sCyE04vZI7vyIvWpet.8Vuc207fsqzUOPloVKmDQznLzeUxOHsW0a', 'd059RNKnf03NAL7rYfKaqwpF0aTvkMk6FiL1UjymaAFLFXv4jJEmCcd97HWv', '2018-03-07 12:22:38', '2018-03-07 14:49:46', 'sales', '052222', 'plankton_1520433386.png'),
(33, 'yoni badash', 'yoni@gmail.com', '$2y$10$hl0xAi41tPTwPSrdk0zOweaUp1xk8dMKCs.vfU/1MERZ627i3Va6u', 'VeazP62o5R1cLNlkkofvOL0XIADUJUNzjzcXhGiZcTdouipzboR4j7D1Jr1H', '2018-03-07 12:42:29', '2018-03-07 14:49:58', 'manager', '0522222', 'patrik_1520433749.jpg'),
(34, 'amit zigdon', 'amit@gmail.com', '$2y$10$XSghEoJsVBg9dYK5M/D8X.JT55K7CfM9hb9qFyxI7jTkR1OBeIX2a', '5ToD7xF2TlyPKsjFcEmxXfY6e3NnUt4yAZBsxxgykYsetcjvx6v0KmAWiq8k', '2018-03-07 12:44:39', '2018-03-07 14:50:18', 'manager', '05222', 'krab_1520433916.jpg'),
(35, 'nir', 'nir@gmail.com', '$2y$10$edbHu8QbzYH4INgq3IrufuFD624GhxelhbwinU0wCR.imtfLfcGsO', 'jHBfttDJCAVZIi9ISBu4LPVv5KEoW2yg0s5qtTbjjcsxIq39xnPzdoLCLVo6', '2018-03-07 12:48:35', '2018-03-07 14:50:38', 'manager', '056465465', 'plankton_1520434115.png'),
(36, 'lala', 'lala@gmail.com', '$2y$10$yhG0i3sc/pxeLgFYlgawgeVAV5tfNPoip9C91xN3EYzC7K5tFNiv2', 'vBMPdfaxQAfo7yHw5jlVtb20L6nLrhGurH8Cc1x3XasdMVxwcxiDBqGwaths', '2018-03-07 14:44:48', '2018-03-07 14:50:53', 'sales', 'lala', 'noimage.jpg'),
(37, 'test', 'test@gmail.com', '$2y$10$gk8klPReDMUsNQw2VQTH/ucTB0IGGDAZRqw4RVN4nD5o2ARd/6z/W', NULL, '2018-03-08 20:59:36', '2018-03-08 20:59:36', 'sales', '05231546512', 'noimage.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_student_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
