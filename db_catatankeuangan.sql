-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 04:18 AM
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
-- Table structure for table `hutang`
--

CREATE TABLE `hutang` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nama_orang` varchar(250) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `nominal_hutang` int(50) NOT NULL,
  `tanggal_hutang` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hutang`
--

INSERT INTO `hutang` (`id`, `users_id`, `nama_orang`, `kategori`, `nominal_hutang`, `tanggal_hutang`, `created_at`, `updated_at`) VALUES
(1, 1, 'Riza', 'Meminjamkan Uang', 50000, '2020-12-13', '2020-12-12 19:45:32', '2020-12-12 19:45:32'),
(2, 1, 'Mashabi', 'Meminjam Uang', 20000, '2020-12-11', '2020-12-12 19:48:45', '2020-12-12 19:48:45');

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
(5, 2, 'Dari ayah', 'Orang Tua', '2020-12-08', 1000000, '2020-12-08 10:41:07', '2020-12-08 10:41:07'),
(6, 1, 'Design Banner Natal', 'Kerja', '2020-12-09', 100000, '2020-12-08 10:54:39', '2020-12-08 10:54:39'),
(7, 1, 'Joki UAS Web', 'Kerja', '2020-12-09', 100000, '2020-12-11 07:11:44', '2020-12-11 07:11:44'),
(8, 1, 'Diberi uang jajan', 'Orang Tua', '2020-12-13', 20000, '2020-12-12 18:39:29', '2020-12-12 18:39:29');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nama_pengeluaran` varchar(250) NOT NULL,
  `kategori` varchar(250) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `jumlah_pengeluaran` int(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `users_id`, `nama_pengeluaran`, `kategori`, `tanggal_pengeluaran`, `jumlah_pengeluaran`, `created_at`, `updated_at`) VALUES
(1, 1, 'Beli Kabel USB', 'Belanja', '2020-12-08', 30000, NULL, NULL),
(2, 1, 'Beli Kuota', 'Tagihan', '2020-12-09', 40000, '2020-12-08 23:05:47', '2020-12-08 23:05:47'),
(4, 1, 'Beli OTG', 'Belanja', '2020-12-09', 10000, '2020-12-08 23:53:54', '2020-12-08 23:53:54'),
(5, 1, 'Kebab', 'Makanan & Minuman', '2020-12-09', 15000, '2020-12-09 00:12:28', '2020-12-09 00:12:28');

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
(1, 'Ardan Anjung', 'ardan@gmail.com', '$2y$10$wTDWyNFxrkXcU4AjyACIr.KCJVGrVv7lnTi1WJ6XG8lcUzYLC0lmC', 'admin', 1625000, 1720000, 95000, '6WoQvXUE5XXZvEYyuoq6nsMjCHvzDvLijnFooYsbwDYDp9UfMIwMExocCZaW', '2020-11-27 23:57:21', '2020-12-12 18:39:29'),
(2, 'Sultan Achmad Qum M', 'sultan@gmail.com', '$2y$10$lb592LGGzZLR7d1YZT40Rugv8seJ2ByGa3ZUH7m..x3LSCZ0gqxSm', 'user', 1000000, 1000000, 0, 'TPHOu8lcYp3CzdnSTGcvzSvC7pMGspvgjECn1UczWiziwwWzAw8Jqq2QitSr', '2020-12-08 08:29:01', '2020-12-08 10:41:07'),
(3, 'Moh. Riza Zulfahnur', 'riza@gmail.com', '$2y$10$Ydd0UGt1.E7yOAI776HZpe5vRGqfyYVKlExKItaQOz5.fZ3q5mjcW', 'user', 0, 0, 0, 'THpJeAJNjNz7tsStZ76G8Y9d43NY6ozdpVEOBAwL4CMZ4dyDb51gX5B5kfPx', '2020-12-08 08:29:50', '2020-12-08 08:29:50'),
(4, 'Yuni Kurnia Taramita', 'yunikurnia@gmail.com', '$2y$10$NqW3Y/hxoSylf5rKiSdxn.Kx24JMDxcZFv22Cc63oijJPt4sokUF.', 'user', 0, 0, 0, '3Xe7vy5h72m8Y3E9bCjRQ7nYQ5rUh3rB5VkRNfO0FUQwe13DZyrzs61CRRIa', '2020-12-08 08:41:24', '2020-12-08 08:41:24');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `nama_wishlist` varchar(255) NOT NULL,
  `harga_wishlist` int(50) NOT NULL,
  `tanggal_wishlist` date NOT NULL,
  `image_wishlist` varchar(255) NOT NULL,
  `status_wishlist` varchar(50) NOT NULL DEFAULT 'Belum Tercapai',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `users_id`, `nama_wishlist`, `harga_wishlist`, `tanggal_wishlist`, `image_wishlist`, `status_wishlist`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kamera DSLR', 5000000, '2020-12-10', '10122020153203_Screenshot_1.jpg', 'Sudah Tercapai', '2020-12-10 07:48:55', '2020-12-10 08:32:03'),
(2, 1, 'Dompet Kulit', 100000, '2020-12-11', '10122020153400_Screenshot_3.jpg', 'Belum Tercapai', '2020-12-10 08:06:50', '2020-12-10 08:36:29'),
(4, 1, 'Dummy', 1500000, '2020-12-10', 'noimage.jpg', 'Belum Tercapai', '2020-12-10 08:38:07', '2020-12-10 08:38:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hutang`
--
ALTER TABLE `hutang`
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
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
