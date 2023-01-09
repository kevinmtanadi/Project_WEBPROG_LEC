-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2023 at 02:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sosmed`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `post_id`, `comment`, `posted_at`) VALUES
(1, 1, 1, 'agree', '2023-01-09 00:43:06'),
(2, 1, 1, 'test2', '2023-01-09 00:44:41'),
(3, 1, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas atque temporibus facilis ipsum voluptates tempore laborum. Pariatur magni distinctio molestiae maxime recusandae nulla dignissimos odio magnam natus eaque quis, facilis reiciendis fugit adipisci unde vitae veritatis non cumque esse, quaerat perferendis culpa aliquid soluta quod. Quae ea necessitatibus veniam suscipit nam vero fugit magni nemo esse dignissimos sapiente et corrupti, aliquam itaque blanditiis magnam tempore placeat excepturi natus in cupiditate?', '2023-01-09 01:06:44'),
(4, 1, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio ipsa nulla ratione reiciendis? Quo pariatur veniam ratione deleniti rerum saepe similique voluptates debitis possimus nemo dolorum sequi id aspernatur, harum minus sed amet nobis reprehenderit perferendis, eveniet facilis animi ipsam in repudiandae! Harum, laborum vitae beatae quae quia voluptate commodi enim officiis, sed expedita vel laboriosam itaque, quasi accusantium temporibus corporis eum libero? Modi laborum, expedita magnam amet, quibusdam numquam quos ullam accusantium esse natus error animi nobis? Sint, numquam!', '2023-01-09 01:10:14'),
(5, 1, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio ipsa nulla ratione reiciendis? Quo pariatur veniam ratione deleniti rerum saepe similique voluptates debitis possimus nemo dolorum sequi id aspernatur, harum minus sed amet nobis reprehenderit perferendis, eveniet facilis animi ipsam in repudiandae! Harum, laborum vitae beatae quae quia voluptate commodi enim officiis, sed expedita vel laboriosam itaque, quasi accusantium temporibus corporis eum libero? Modi laborum, expedita magnam amet, quibusdam numquam quos ullam accusantium esse natus error animi nobis? Sint, numquam!', '2023-01-09 01:10:18'),
(6, 1, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio ipsa nulla ratione reiciendis? Quo pariatur veniam ratione deleniti rerum saepe similique voluptates debitis possimus nemo dolorum sequi id aspernatur, harum minus sed amet nobis reprehenderit perferendis, eveniet facilis animi ipsam in repudiandae! Harum, laborum vitae beatae quae quia voluptate commodi enim officiis, sed expedita vel laboriosam itaque, quasi accusantium temporibus corporis eum libero? Modi laborum, expedita magnam amet, quibusdam numquam quos ullam accusantium esse natus error animi nobis? Sint, numquam!', '2023-01-09 01:10:22'),
(7, 1, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio ipsa nulla ratione reiciendis? Quo pariatur veniam ratione deleniti rerum saepe similique voluptates debitis possimus nemo dolorum sequi id aspernatur, harum minus sed amet nobis reprehenderit perferendis, eveniet facilis animi ipsam in repudiandae! Harum, laborum vitae beatae quae quia voluptate commodi enim officiis, sed expedita vel laboriosam itaque, quasi accusantium temporibus corporis eum libero? Modi laborum, expedita magnam amet, quibusdam numquam quos ullam accusantium esse natus error animi nobis? Sint, numquam!', '2023-01-09 01:10:27'),
(8, 1, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate hic, nesciunt iure a nulla repellendus doloribus eum numquam cupiditate tenetur! Praesentium esse cupiditate, consequatur sequi consectetur magnam, ut ad molestiae fugiat dolore ex vel ab ea consequuntur omnis ratione, deserunt labore. Dolores aut cupiditate quisquam quis ducimus facilis delectus minima ea, iusto velit. Numquam pariatur aliquid, asperiores quidem doloremque fugit?', '2023-01-09 01:25:09'),
(9, 1, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate hic, nesciunt iure a nulla repellendus doloribus eum numquam cupiditate tenetur! Praesentium esse cupiditate, consequatur sequi consectetur magnam, ut ad molestiae fugiat dolore ex vel ab ea consequuntur omnis ratione, deserunt labore. Dolores aut cupiditate quisquam quis ducimus facilis delectus minima ea, iusto velit. Numquam pariatur aliquid, asperiores quidem doloremque fugit?', '2023-01-09 01:25:13'),
(10, 1, 1, 'agreed!', '2023-01-09 02:15:10'),
(11, 1, 1, 'asdawdddddddddddddddddddddddddddddddddddddddddddddddd', '2023-01-09 05:48:12'),
(12, 1, 1, 'test', '2023-01-09 06:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `comment_like`
--

CREATE TABLE `comment_like` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment_like`
--

INSERT INTO `comment_like` (`id`, `user_id`, `comment_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 4, NULL, NULL),
(3, 1, 8, NULL, NULL);

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
-- Table structure for table `friend`
--

CREATE TABLE `friend` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `friend_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE `friend_request` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `friend_id` bigint(20) UNSIGNED NOT NULL
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_07_064201_create_post_table', 1),
(6, '2023_01_07_064225_create_comment_table', 1),
(7, '2023_01_07_064237_create_post_like_table', 1),
(8, '2023_01_07_064252_create_comment_like_table', 1),
(9, '2023_01_07_064309_create_friend_table', 1),
(10, '2023_01_07_064821_create_friend_request_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
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
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content_url` varchar(255) NOT NULL,
  `caption` varchar(10000) NOT NULL,
  `posted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `content_url`, `caption`, `posted_at`) VALUES
(1, 1, 'post_1673249920.jpg', 'Greatest woman alive!', '2023-01-09 00:38:40'),
(2, 1, 'post_1673252500.jpg', 'Watching this right now!', '2023-01-09 01:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(3, 1, 2, NULL, NULL),
(4, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `banner_pic` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'member',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `gender`, `password`, `dob`, `profile_pic`, `banner_pic`, `role`, `created_at`, `remember_token`) VALUES
(1, 'Kevin Miguel Tanadi', 'kevinmt2342@gmail.com', '0895612491823', 'on', '$2y$10$vPjRkp1bjVtwKWN4TyJ1junTRDaRq8rMFdi7mvZdlOa40oyEjqL6u', '2002-04-23', 'profile.jpg', 'banner.jpg', 'member', '2023-01-09 13:51:38', 'dsDy5lb9W2uaJ9FN2GpHpdYxq6wFylK3IkYegSxd7M46GNZpFOIY5vjfykC8'),
(2, 'Muhammad Farras', 'm.faras@gmail.com', '081234567890', 'on', '$2y$10$3tlAC2Cw675gh1sHdphneOB06kD3m3OFxAu9rcmJDSyMhhW/VHo8m', '2002-12-23', 'profile.jpg', 'banner.jpg', 'member', '2023-01-09 06:52:11', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_user_id_foreign` (`user_id`),
  ADD KEY `comment_post_id_foreign` (`post_id`);

--
-- Indexes for table `comment_like`
--
ALTER TABLE `comment_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_like_user_id_foreign` (`user_id`),
  ADD KEY `comment_like_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `friend`
--
ALTER TABLE `friend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friend_user_id_foreign` (`user_id`),
  ADD KEY `friend_friend_id_foreign` (`friend_id`);

--
-- Indexes for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `friend_request_user_id_foreign` (`user_id`),
  ADD KEY `friend_request_friend_id_foreign` (`friend_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_like_user_id_foreign` (`user_id`),
  ADD KEY `post_like_post_id_foreign` (`post_id`);

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
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comment_like`
--
ALTER TABLE `comment_like`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend`
--
ALTER TABLE `friend`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend_request`
--
ALTER TABLE `friend_request`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post_like`
--
ALTER TABLE `post_like`
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
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_like`
--
ALTER TABLE `comment_like`
  ADD CONSTRAINT `comment_like_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_like_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_friend_id_foreign` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friend_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friend_request`
--
ALTER TABLE `friend_request`
  ADD CONSTRAINT `friend_request_friend_id_foreign` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friend_request_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `post_like`
--
ALTER TABLE `post_like`
  ADD CONSTRAINT `post_like_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_like_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
