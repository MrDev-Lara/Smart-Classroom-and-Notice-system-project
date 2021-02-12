-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2021 at 06:10 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iiucsmartclassroom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$axNWN8IFwl0KaiHOqD8A/.iE/EP9vKLGI.b3Ud2ijMEp2iqNluqX6', NULL, '2020-11-16 20:13:41', '2020-11-16 20:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(4, '2020_11_16_115202_create_admins_table', 1),
(5, '2020_11_16_121950_create_teachers_table', 2),
(6, '2021_01_13_061611_create__studentskillsets_table', 3),
(7, '2021_01_19_062712_create_userdetails_table', 4),
(8, '2021_01_20_110900_create_rooms_table', 5),
(9, '2021_01_22_115243_create_room_user_table', 6),
(10, '2021_01_26_073409_create_roomposts_table', 7),
(11, '2021_01_26_085325_create_roompostfiles_table', 8),
(12, '2021_01_26_142447_create_roompostcomments_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('moniuddin@gmail.com', '$2y$10$UyFOPpq/fcVuSeWbIsmgUefEfYxJCBGhHrrGMh2FOyhEgTEU2mVEu', '2020-11-18 01:05:04'),
('moniuddin045@gmail.com', '$2y$10$29BoAtprw08mnnq9tlt32.aodhGo1qTmDMR.O/qth.A8KxPrTtFqS', '2020-12-22 20:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `roompostcomments`
--

CREATE TABLE `roompostcomments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roompost_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `teacher_id` bigint(20) DEFAULT NULL,
  `comment` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roompostcomments`
--

INSERT INTO `roompostcomments` (`id`, `roompost_id`, `user_id`, `teacher_id`, `comment`, `date`) VALUES
(1, 8, NULL, 2, 'i will take a review class again', '26 Jan, 2021'),
(2, 8, 6, NULL, 'student', ''),
(3, 8, NULL, 2, 'be on time', '26 Jan, 2021'),
(4, 10, NULL, 2, 'hello', '26 Jan, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `roompostfiles`
--

CREATE TABLE `roompostfiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `roompost_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roompostfiles`
--

INSERT INTO `roompostfiles` (`id`, `roompost_id`, `file`) VALUES
(1, 10, 'roomfiles/5F1ci.jpg'),
(2, 11, 'roomfiles/xhZVH.jpg'),
(3, 11, 'roomfiles/qpErh.jpg'),
(4, 11, 'roomfiles/3icN9.png'),
(5, 12, 'roomfiles/O10fm.pdf'),
(6, 12, 'roomfiles/wf437.png'),
(7, 12, 'roomfiles/3tmv5.png'),
(8, 13, 'roomfiles/of0Gq.png'),
(9, 14, 'roomfiles/ktqRn.pdf'),
(10, 15, 'roomfiles/ESdUj.docx'),
(11, 15, 'roomfiles/ssRHb.jpg'),
(12, 15, 'roomfiles/9B2HJ.jpg'),
(13, 15, 'roomfiles/fXbJI.png');

-- --------------------------------------------------------

--
-- Table structure for table `roomposts`
--

CREATE TABLE `roomposts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `posts` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roomposts`
--

INSERT INTO `roomposts` (`id`, `room_id`, `posts`, `date`) VALUES
(8, 1, 'Hello', '26 Jan, 2021'),
(10, 1, 'O vai', '26 Jan, 2021'),
(11, 1, 'thik ase', '26 Jan, 2021'),
(12, 1, 'dekhi', '26 Jan, 2021'),
(13, 2, 'hello there', '26 Jan, 2021'),
(14, 3, 'New Post', '26 Jan, 2021'),
(15, 3, 'another post', '26 Jan, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `course_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_section` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `teacher_id`, `course_name`, `course_code`, `course_session`, `class_section`, `class_code`, `created_at`, `updated_at`) VALUES
(1, 2, 'Discrete Mathematics', 'CSE-1203', 'Spring 2020', '1BM', 'lPHhbG', NULL, NULL),
(2, 2, 'Pulse Technique', 'CSE-2304', 'Spring 2020', '5BM', '82MSGh', NULL, NULL),
(3, 2, 'Electrical Drives', 'CSE-2304', 'Autumn 2019', '4BM', 'SZfJUg', NULL, NULL),
(4, 4, 'C++', 'CSE-2304', 'Spring 2021', '3BM', 'i5RUwl', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room_user`
--

CREATE TABLE `room_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_user`
--

INSERT INTO `room_user` (`id`, `room_id`, `user_id`, `created_at`, `updated_at`) VALUES
(6, 1, 4, '2021-01-22 15:59:47', NULL),
(10, 2, 6, '2021-01-23 12:40:43', NULL),
(11, 1, 6, '2021-01-25 05:48:57', NULL),
(12, 4, 6, '2021-01-25 06:59:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `department`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Md Mahfuzur Rahman', 'mahfuz123@gmail.com', NULL, '$2y$10$wy64HwkAAEnwtdQA2CsrW.e/lkQHtJlYfTh9pex3pJFjv8ebx.lkm', '01832279326', 'CSE', 'teachers/UMXFs.jpg', NULL, NULL, NULL),
(4, 'Md Saleh Uddin', 'saleh@gmail.com', NULL, '$2y$10$Y1gPBDVscwdKsxOaJmg4TOCjGOlWysmO4SaeQ03kPfNOZOkel81OO', '01515682022', 'ETE', 'teachers/W5AlL.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `biography` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `user_id`, `biography`, `about`, `created_at`, `updated_at`) VALUES
(3, 4, 'Lorem Ipsum Dot net per lorem ipsum', 'I Am Asif Talukder', '2021-01-19 20:01:33', '2021-01-19 20:01:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `student_id`, `email`, `email_verified_at`, `password`, `phone`, `semester`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Hasan Abdullah', 'C161041', 'Hasan@gmail.com', NULL, '$2y$10$2osYap/pu2Dr92jI9qc07etXT9qNqeb/mR8AhDAxx/WdxXiUf9Rbm', '01819330006', '5th', 'students/aoNI8.jpg', NULL, NULL, NULL),
(4, 'Asif Talukder', 'C161062', 'Asif@gmail.com', NULL, '$2y$10$SM66AdPczoGq901Fwp.rVOy0jzatmsy19b0DxzA/dAr2kwVn/ycZS', '01515682022', '8th', 'students/aWWxK.png', NULL, NULL, NULL),
(6, 'Moniruddin Moni', 'C161043', 'moniuddin045@gmail.com', NULL, '$2y$10$m3TG.jYqQp.7LJcEn8dfAuTEZJZxMiuENo47I75pyGRblAz7cQYeS', '01836849437', '8th', 'students/Pl4El.jpg', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `roompostcomments`
--
ALTER TABLE `roompostcomments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roompostcomments_roompost_id_foreign` (`roompost_id`);

--
-- Indexes for table `roompostfiles`
--
ALTER TABLE `roompostfiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roompostfiles_roompost_id_foreign` (`roompost_id`);

--
-- Indexes for table `roomposts`
--
ALTER TABLE `roomposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roomposts_room_id_foreign` (`room_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `room_user`
--
ALTER TABLE `room_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userdetails_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roompostcomments`
--
ALTER TABLE `roompostcomments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roompostfiles`
--
ALTER TABLE `roompostfiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roomposts`
--
ALTER TABLE `roomposts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `room_user`
--
ALTER TABLE `room_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `roompostcomments`
--
ALTER TABLE `roompostcomments`
  ADD CONSTRAINT `roompostcomments_roompost_id_foreign` FOREIGN KEY (`roompost_id`) REFERENCES `roomposts` (`id`);

--
-- Constraints for table `roompostfiles`
--
ALTER TABLE `roompostfiles`
  ADD CONSTRAINT `roompostfiles_roompost_id_foreign` FOREIGN KEY (`roompost_id`) REFERENCES `roomposts` (`id`);

--
-- Constraints for table `roomposts`
--
ALTER TABLE `roomposts`
  ADD CONSTRAINT `roomposts_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD CONSTRAINT `userdetails_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
