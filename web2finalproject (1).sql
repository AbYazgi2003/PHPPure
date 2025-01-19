-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2023 at 07:44 PM
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
-- Database: `web2finalproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('abdallahsalemm20003@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(31, 'cars'),
(2, 'computers'),
(10, 'House ware'),
(1, 'other'),
(12, 'shoes'),
(3, 'smart phones');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `rate_id` int(11) NOT NULL,
  `VALUE` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `store_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_adress` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`rate_id`, `VALUE`, `user_id`, `store_id`, `ip_adress`) VALUES
(1, 5, 1, 1, 'et'),
(2, 5, 1, 2, 'ioio'),
(3, 3, 1, 3, 'mtra'),
(4, 5, 1, 4, 'ert'),
(5, 3, 1, 5, 'ah'),
(7, 4, 2, 1, 'ertet'),
(8, 5, 2, 2, 'edc'),
(9, 4, 2, 3, 'wsx'),
(10, 3, 2, 4, 'qaz'),
(11, 4, 2, 5, 'nhgh'),
(13, 4, 2, 7, 'rvf'),
(14, 3, 2, 6, 'tgb'),
(17, 4, 3, 1, 'uio'),
(18, 5, 3, 2, 'l;/'),
(19, 3, 3, 3, 'ops'),
(20, 5, 3, 4, 'ol.'),
(21, 4, 3, 5, 'hjk'),
(22, 2, 3, 6, 'i,i'),
(23, 3, 3, 7, 'umj'),
(52, 4, 4, 2, '::1'),
(60, 5, 4, 5, '::1'),
(65, 5, 4, 1, '::1'),
(66, 5, 4, 3, '::1'),
(67, 5, 4, 8, '::1'),
(69, 4, 4, 9, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(60) DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `adress` varchar(30) NOT NULL,
  `cat_id` int(10) UNSIGNED DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `image`, `phone`, `name`, `adress`, `cat_id`) VALUES
(1, 'IMG-64629f20e11151.86327705.jpg', 599804550, 'Apple', 'USA', 3),
(2, 'IMG-64629f53781400.53060078.jpg', 599804550, 'Samsung', 'korea', 10),
(3, 'IMG-64629f9eeb59a6.15737250.png', 97266008, 'Lenovo', 'france', 2),
(4, 'IMG-64629fccef36a4.09891737.jpg', 2147483647, 'nike', 'vetnam', 12),
(5, 'IMG-6462a014ada3c1.72046729.png', 300300451, 'xioami', 'india', 3),
(6, 'IMG-6462ba42580395.92794544.png', 2147483647, 'huawei', 'china', 3),
(7, 'IMG-6462babb77fa53.49249662.png', 567266008, 'under armor ', 'vetnam', 12),
(8, 'IMG-64658d7a9331c8.86944582.png', 567266008, 'poco', 'china', 3),
(9, 'IMG-64650c2cc92563.30126933.png', 597996069, 'adidas', 'vetnam', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`) VALUES
(1, 'Abdallah'),
(2, 'salem'),
(3, 'gamil'),
(4, 'USER PC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`rate_id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`store_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rate`
--
ALTER TABLE `rate`
  ADD CONSTRAINT `rate_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rate_ibfk_2` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
