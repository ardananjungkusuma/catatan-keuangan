-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2020 at 06:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_catatankeuangan`
--

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
(2, '2014_10_12_100000_create_password_resets_table', 1);

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
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nama_pemasukan` varchar(250) NOT NULL,
  `kategori` varchar(250) NOT NULL,
  `tanggal_pemasukan` date NOT NULL,
  `jumlah_pemasukan` int(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `users_id`, `nama_pemasukan`, `kategori`, `tanggal_pemasukan`, `jumlah_pemasukan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kiriman Bulanan Ortu', 'Orang Tua', '2020-12-08', 1500000, '2020-12-08 17:23:35', '2020-12-08 17:23:35'),
(2, 1, 'Joki Uas web', 'Kerja', '2020-12-08', 100000, '2020-12-08 17:23:35', '2020-12-08 17:23:35'),
(4, 1, 'Servis Laptop Teman', 'Kerja', '2020-12-09', 50000, '2020-12-08 10:40:15', '2020-12-08 10:40:15'),
(5, 2, 'Dari ayah', 'Orang Tua', '2020-12-08', 1000000, '2020-12-08 10:41:07', '2020-12-08 10:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo` int(50) NOT NULL,
  `total_pemasukan` int(50) NOT NULL,
  `total_pengeluaran` int(50) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `saldo`, `total_pemasukan`, `total_pengeluaran`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ardan Anjung', 'ardan@gmail.com', '$2y$10$wTDWyNFxrkXcU4AjyACIr.KCJVGrVv7lnTi1WJ6XG8lcUzYLC0lmC', 'user', 1650000, 1650000, 0, 'cHYK2A8dkwgajpj4DjMhFqCx8Zu9DByla6rVHkZfE33SuXS9P1AByRUBnYzn', '2020-11-27 23:57:21', '2020-12-08 10:40:15'),
(2, 'Sultan Achmad Qum M', 'sultan@gmail.com', '$2y$10$lb592LGGzZLR7d1YZT40Rugv8seJ2ByGa3ZUH7m..x3LSCZ0gqxSm', 'user', 1000000, 1000000, 0, 'qIdkYeFu6GKMGT8BS0jTScA05Kr1sxxcz9qSZV27wPGiMgzjx3rgJCTV2NEI', '2020-12-08 08:29:01', '2020-12-08 10:41:07'),
(3, 'Moh. Riza Zulfahnur', 'riza@gmail.com', '$2y$10$Ydd0UGt1.E7yOAI776HZpe5vRGqfyYVKlExKItaQOz5.fZ3q5mjcW', 'user', 0, 0, 0, 'THpJeAJNjNz7tsStZ76G8Y9d43NY6ozdpVEOBAwL4CMZ4dyDb51gX5B5kfPx', '2020-12-08 08:29:50', '2020-12-08 08:29:50'),
(4, 'Yuni Kurnia Taramita', 'yunikurnia@gmail.com', '$2y$10$NqW3Y/hxoSylf5rKiSdxn.Kx24JMDxcZFv22Cc63oijJPt4sokUF.', 'user', 0, 0, 0, 'o1AWGRxHJo7UEANmszRehCVrCBrZ4YYy23BDzPYC3NzdYSYIZhvZS2TW1JjE', '2020-12-08 08:41:24', '2020-12-08 08:41:24');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
