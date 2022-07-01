-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:3306
-- Tid vid skapande: 01 jul 2022 kl 12:41
-- Serverversion: 5.7.24
-- PHP-version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `ecommerce`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `total_price` int(9) NOT NULL,
  `billing_full_name` varchar(150) NOT NULL,
  `billing_street` varchar(100) NOT NULL,
  `billing_postal_code` varchar(100) NOT NULL,
  `billing_city` varchar(100) NOT NULL,
  `billing_country` varchar(100) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `billing_full_name`, `billing_street`, `billing_postal_code`, `billing_city`, `billing_country`, `create_date`) VALUES
(1, 9, 1005, 'jacob westman', 'skidbacksvägen 4', '83142', 'östersund', 'se', '2022-06-17 19:47:56'),
(2, 9, 1005, 'jacob westman', 'skidbacksvägen 4', '83142', 'östersund', 'se', '2022-06-17 19:50:32'),
(3, 9, 1005, 'jacob westman', 'skidbacksvägen 4', '83142', 'östersund', 'se', '2022-06-17 19:52:23'),
(4, 9, 1005, 'jacob westman', 'skidbacksvägen 4', '83142', 'östersund', 'se', '2022-06-17 19:52:57'),
(5, 9, 1005, 'jacob westman', 'skidbacksvägen 4', '83142', 'östersund', 'se', '2022-06-17 20:06:42'),
(6, 10, 1005, 'ulf westman', 'gransjö 176', '882 93', 'helgum', 'se', '2022-06-17 20:08:09'),
(7, 11, 1005, 'catharina törngren', 'vråkvägen 9', '831 48', 'östersund', 'se', '2022-06-17 20:11:21'),
(9, 12, 637, 'mattias halvarsson', 'stenhuggargränd 17', '83151', 'långsele', 'se', '2022-06-19 19:08:09'),
(10, 13, 578, 'jonas matsson', 'stuguvägen 4', '85590', 'sollefteå', 'se', '2022-06-19 19:11:28'),
(11, 14, 597, 'anna andersson', 'grundläggargränd 2', '33414', 'Oviken', 'se', '2022-06-19 19:47:53'),
(12, 15, 199, 'margareta westläger', 'hagvägen 15', '111 11', 'östersund', 'se', '2022-06-19 19:52:56'),
(13, 16, 199, 'marcus åkerlind', 'chaufförvägen 6', '121 23', 'sundsvall', 'se', '2022-06-19 20:08:22'),
(14, 17, 398, 'zackarias eliasson', 'storgatan 45', '110 11', 'stockholm', 'se', '2022-06-19 20:21:20'),
(15, 18, 408, 'Kent Barett', 'storsjögatan 32', '212 12', 'linköping', 'se', '2022-06-19 20:25:14'),
(16, 19, 199, 'andreas åkerlind', 'kläppevägen 7', '122 23', 'skellefteå', 'se', '2022-06-19 20:26:33'),
(17, 19, 169, 'andreas åkerlind', 'kläppevägen 7', '122 23', 'skellefteå', 'se', '2022-06-19 20:28:08'),
(18, 20, 199, 'kintan hiroshima', 'drottninggatan 1', '233 34', 'göteborg', 'se', '2022-06-19 20:31:34'),
(19, 21, 597, 'emma larsson', 'hagavägen 15', '345 25', 'linköping', 'se', '2022-06-20 08:12:55'),
(20, 21, 199, 'emma larsson', 'hagavägen 15', '24234', 'linköping', 'se', '2022-06-20 08:14:36'),
(21, 22, 199, 'haashira hathija', 'mjölnargränd 2', '34052', 'östersund', 'se', '2022-06-20 08:30:07'),
(22, 23, 597, 'evelina gh', 'carlsgatan35', '43983', 'märsta', 'se', '2022-06-20 08:37:58'),
(24, 24, 597, 'testing images', 'lrkae', '23059', 'fkbnerk', 'se', '2022-06-20 11:18:13'),
(38, 26, 796, 'kfjvdnbkjn dkfjndbfkj', 'kdfjbnfk', '12345', 'fdkbjd', 'se', '2022-06-21 09:23:43'),
(39, 27, 398, 'erlkgnth dljndfl', 'kdfjnbf', '23455', 'dfkndkj', 'se', '2022-06-21 09:27:18'),
(40, 28, 199, 'dlkgbbd fdkjngb', 'erkbfdjngfkj', '23454', 'skbjnvk', 'se', '2022-06-21 09:29:23'),
(43, 29, 199, 'fdkjbngf kfbjndk', 'flkbnfdgbkjnf', '12345', 'skjndbkjn', 'se', '2022-06-21 09:34:54'),
(48, 30, 398, 'skfjgn fkgjbn', 'KFJBNFGBFKJN', '567892', 'dkjbnkgj', 'se', '2022-06-21 10:26:09'),
(51, 6, 597, 'haashira hathija', 'alfkm', '2345', 'slfdkn', 'se', '2022-06-26 22:07:48'),
(52, 6, 597, 'haashira hathija', 'alfkm', '2345', 'slfdkn', 'se', '2022-06-26 22:08:10'),
(53, 6, 678, 'haashira hathija', 'alfkm', '2345', 'slfdkn', 'se', '2022-06-26 22:08:37'),
(54, 6, 398, 'haashira hathija', 'alfkm', '2345', 'slfdkn', 'se', '2022-06-26 23:16:45'),
(55, 6, 398, 'haashira hathija', 'alfkm', '2345', 'slfdkn', 'se', '2022-06-26 23:18:44'),
(57, 13, 199, 'jonas törngren', 'frimansvägen 14', '83145', 'östersund', 'se', '2022-06-26 23:23:07'),
(58, 13, 199, 'jonas törngren', 'frimansvägen 12', '83145', 'östersund', 'se', '2022-06-26 23:25:43'),
(60, 9, 398, 'jacob westman', 'skidbacksvägen 4', '83142', 'östersund', 'se', '2022-06-28 08:01:30'),
(61, 9, 796, 'jacob westman', 'skidbacksvägen 4', '83142', 'östersund', 'se', '2022-06-28 08:15:18'),
(69, 22, 398, 'haashira hathija', 'mjölnargränd 1', '83153', 'östersund', 'se', '2022-06-28 13:54:01'),
(70, 22, 398, 'haashira hathija', 'mjölnargränd 1', '831 53', 'östersund', 'se', '2022-06-28 13:56:24'),
(71, 22, 199, 'haashira hathija', 'mjölnargränd 1', '83153', 'östersund', 'se', '2022-06-28 14:06:48'),
(72, 33, 398, 'catharina törngren', 'vråkvägen 9', '83132', 'östersund', 'se', '2022-06-28 18:18:03'),
(73, 36, 4172, 'kenneth jonsson', 'grundläggargränd 34', '83132', 'östersund', 'se', '2022-06-28 21:15:37'),
(74, 37, 597, 'ingrid persson', 'kläppevägen 7', '111 11', 'köping', 'se', '2022-06-29 07:34:45'),
(75, 38, 199, 'annika wahlström', 'frimansvägen 23', '12345', 'östersund', 'se', '2022-06-29 07:42:28'),
(76, 39, 398, 'anna andersson', 'kråkvägen 3', '111 11', 'stockholm', 'se', '2022-06-29 07:52:22'),
(77, 5, 199, 'haashira hathija', 'mjölnargränd 1', '831 53', 'östersund', 'se', '2022-06-29 07:55:35'),
(78, 41, 597, 'nils larsson', 'stockevägen 1', '111 11', 'stockholm', 'se', '2022-06-29 07:56:45'),
(79, 44, 678, 'shima valal', 'dflkgntkhjn 56', '33356', 'skellefteå', 'se', '2022-06-29 08:35:08'),
(80, 9, 398, 'jacob westman', 'skidbacksvägen 4', '83142', 'östersund', 'se', '2022-06-29 09:31:10'),
(81, 9, 597, 'jacob westman', 'skidbacksvägen 4', '83142', 'österssund', 'se', '2022-06-29 11:20:55'),
(82, 51, 438, 'sibar sibarsson', 'sibar', '12345', 'kalix', 'se', '2022-06-29 12:14:30'),
(83, 52, 199, 'ahmad fdlkgm', 'dflkgnlbksn 23', '124356', 'dfhgrdb', 'se', '2022-06-29 12:17:26'),
(84, 53, 7198, 'hallo hallosson', 'hallovägen 1', '12345', 'halloj', 'se', '2022-06-29 15:02:02'),
(85, 9, 905, 'jacob westman', 'skidbacksvägen 4', '83142', 'östersund', 'se', '2022-06-29 18:15:43'),
(86, 56, 398, 'haashir husain', '134 emerald hill road', '229414', 'singapore', 'se', '2022-06-29 20:18:07'),
(87, 57, 199, 'nalle husain', 'nallevägen 3', '12345', 'knivsta', 'se', '2022-06-29 20:37:09'),
(88, 5, 1197, 'haashira hathija', 'mjölnargränd 4', '12345', 'sundsvall', 'sweden', '2022-06-30 00:21:48'),
(89, 58, 597, 'halloj jallo', 'hallvägen 1', '12345', 'stockholm', 'sverige', '2022-06-30 00:49:34'),
(90, 5, 597, 'haashira hathija', 'mjölnargränd 1', '83154', 'östersund', 'sverige', '2022-06-30 00:51:52'),
(91, 59, 1651, 'haashira hathija', 'sflkhnsrlk', '2356', 'lfkdlfk', 'elrkhm', '2022-06-30 07:36:38');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
