-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Okt 2017 pada 20.54
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_keluarga`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `keluarga_id` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `married` int(11) DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `wuku` varchar(50) DEFAULT NULL,
  `triwara` varchar(50) DEFAULT NULL,
  `pancawara` varchar(50) DEFAULT NULL,
  `sasih` varchar(50) DEFAULT NULL,
  `urip` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `user_id`, `keluarga_id`, `parent`, `married`, `dob`, `gender`, `wuku`, `triwara`, `pancawara`, `sasih`, `urip`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 0, 3, '1994-08-06', 'L', '', '', '', '', '', '2017-10-19 05:17:32', '2017-10-19 07:06:04'),
(2, 13, 1, 1, NULL, '2017-10-26', 'L', 'sungsang', 'beteng', 'wage', 'kelima', '8+4', '2017-10-19 06:49:40', '2017-10-24 18:03:17'),
(3, 14, 1, NULL, NULL, '2017-10-10', 'P', '', '', '', '', '', '2017-10-19 07:05:56', '2017-10-19 07:05:56'),
(4, 15, 1, 1, NULL, '2017-10-04', 'L', '', '', '', '', '', '2017-10-19 07:09:07', '2017-10-19 07:09:16'),
(5, 16, 1, 1, NULL, '2017-10-04', 'L', '', '', '', '', '', '2017-10-19 07:11:23', '2017-10-19 07:11:29'),
(6, 17, 1, 2, NULL, '2017-10-24', 'L', 'sungsang', 'kajeng', 'paing', 'kelima', '3+9', '2017-10-24 03:15:23', '2017-10-24 18:03:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) DEFAULT NULL,
  `keluarga_id` int(11) DEFAULT NULL,
  `caption` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `anggota_id`, `keluarga_id`, `caption`, `img`, `views`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'asd', 'ba1fc48ba156126679641e9dff8d1257.jpg', 5, '2017-10-21 18:56:29', '2017-10-24 18:33:28'),
(2, 2, 1, 'mecaru', '8072485239e235a48c476a832d113ef7.jpg', 13, '2017-10-21 18:57:36', '2017-10-24 18:53:19'),
(3, 2, 1, 'asd', 'c590c58a9c33a3fbbaa11cea0fcb293e.jpg', 1, '2017-10-21 19:28:21', '2017-10-23 04:01:04'),
(4, 2, 1, 'fgh', 'c1c96efa96d661d8533f71b011ee581f.jpg', 3, '2017-10-21 19:29:52', '2017-10-24 18:33:17'),
(5, 2, 1, 'as', '3141068934fbf3042c73f3594fad1203.jpg', 3, '2017-10-21 19:35:48', '2017-10-22 17:08:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--

CREATE TABLE `keluarga` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `nama` varchar(100) NOT NULL,
  `asal` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluarga`
--

INSERT INTO `keluarga` (`id`, `user_id`, `nama`, `asal`, `created_at`, `updated_at`) VALUES
(1, 11, 'I Wayan Bledor', 'Tabanan', '2017-10-19 05:15:50', '2017-10-19 05:19:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(1) NOT NULL,
  `img` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isActive` int(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telp`, `password`, `type`, `img`, `isActive`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', '082247464196', '$2y$10$3pBGmr9UxTQLkMJeojU3j.nW/9YC5u1nIPHBU4r.wzGKm6mUpDRC.', 1, NULL, 1, 'udiY3CSDjIOYGGwIUT0luqKz7uZfS1HwlJp9rc99SReLRfmRUhJ5xKLbGOO3', '2017-08-24 09:09:07', '2017-08-24 09:09:07'),
(11, 'I Wayan Bledor', 'member@mail.com', '083357565894', '$2y$10$oeqNqm3MUVmo4dY6TzuZCuooNnhuoYbw.aRI.Xe8e.VJUHvk8RfuW', 2, NULL, 1, NULL, '2017-10-19 05:15:50', '2017-10-19 05:15:50'),
(12, 'I Made Hendra Wijaya', 'wijaya.imd@gmail.com', '082247464196', '$2y$10$mUkzQOIVhNvAU0tww76q7.GvPHPqjgUdXsAcfYfnXGaQnLhjUQA5G', 3, 'de4cf61ef7ec1640339bebd4bf590360.jpg', 1, NULL, '2017-10-19 05:17:32', '2017-10-19 05:17:32'),
(13, 'I Wayan Bedebah', 'awesome@mail.com', '0847347377', '$2y$10$NT.7nTosXfnH0EecL4AXLevN/.eDqxMmDmvQjFZI1p6s3jlPMhDYq', 3, 'dc5e0fd02b67f6b988abaa744ea5924b.jpg', 1, NULL, '2017-10-19 06:49:40', '2017-10-21 18:32:18'),
(14, 'Ni Made Cintya', 'cintya@mail.com', '08347483', '$2y$10$YGeBM1cLBGsOH1eNwL5k1OMq5VBU/.u7DP3/ku0VcwsBAeX2F0GNC', 3, '7654591c93ff272e2ac0c58fe20a8b59.jpg', 1, NULL, '2017-10-19 07:05:56', '2017-10-19 07:05:56'),
(15, 'I Made Bledor', 'bledor@mail.com', '49940489', '$2y$10$PhqzJsW9Dmn8yPxlFLcnyOIPsO/TN.TnvZobxEg5KNTtiAWLFErJ.', 3, '82b0c6b24e28aa50497a50a6b9de2285.jpg', 1, NULL, '2017-10-19 07:09:07', '2017-10-19 07:09:07'),
(16, 'i Ketut test', 'ketut@mail.com', '23123123', '$2y$10$QBKuG62Xy.3EuckEr48LNeQwSO3.YgOr6eUF84E2Wj7UxpSUdISgq', 3, '26c4e2536ad14a09ab48979f362efbe0.jpg', 1, NULL, '2017-10-19 07:11:23', '2017-10-19 07:11:23'),
(17, 'coba anggota', 'coba@mail.com', '08224746', '$2y$10$ZpNFIqYwQgmSLiuDs8wrc.uqY/dUS8JcmU8UfsfXskgyzkfDzN.Ku', 3, '9c18c311ae95ff62157bd8e8d50051e3.jpg', 1, NULL, '2017-10-24 03:15:23', '2017-10-24 03:15:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
