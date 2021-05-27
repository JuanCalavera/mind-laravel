-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 27, 2021 at 05:26 AM
-- Server version: 5.7.30
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mind`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `Address`, `city`, `state`, `created_at`, `updated_at`) VALUES
(7, 'Rita', 'R.Doutor Gabriel Monteiro da Silva', 'Socorro', 'SP', '2021-05-27 03:47:26', '2021-05-27 03:47:26'),
(8, 'Roger', 'R.Doutor Gabriel Monteiro da Silva', 'Socorro', 'SP', '2021-05-27 03:48:18', '2021-05-27 03:48:18'),
(10, 'Coxa', 'R.Doutor Gabriel Monteiro da Silva', 'Socorro', 'SP', '2021-05-27 05:34:17', '2021-05-27 05:34:17'),
(11, 'Juan', 'R.Doutor Gabriel Monteiro da Silva', 'Socorro', 'SP', '2021-05-27 05:45:59', '2021-05-27 05:45:59'),
(13, 'Virgulino', 'Grota do Anjico', 'Piranhas', 'AL', '2021-05-27 06:36:27', '2021-05-27 06:36:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
