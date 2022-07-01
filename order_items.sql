-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:3306
-- Tid vid skapande: 01 jul 2022 kl 12:39
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
-- Tabellstruktur `order_items`
--

CREATE TABLE `order_items` (
  `id` int(9) NOT NULL,
  `order_id` int(9) NOT NULL,
  `product_id` int(9) NOT NULL,
  `product_title` varchar(150) NOT NULL,
  `quantity` int(9) NOT NULL,
  `unit_price` int(9) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_title`, `quantity`, `unit_price`, `created_at`) VALUES
(1, 3, 11, 'Superbärblandning för Vacker & Frisk Hy', 3, 199, '2022-06-17 19:52:23'),
(2, 3, 24, 'Lean Protein med Choklad & Adaptogener', 1, 239, '2022-06-17 19:52:23'),
(3, 3, 15, 'Gurkmeja Latte för Immunförsvar Boost', 1, 169, '2022-06-17 19:52:23'),
(4, 5, 11, 'Superbärblandning för Vacker & Frisk Hy', 3, 199, '2022-06-17 20:06:42'),
(5, 5, 24, 'Lean Protein med Choklad & Adaptogener', 1, 239, '2022-06-17 20:06:42'),
(6, 5, 15, 'Gurkmeja Latte för Immunförsvar Boost', 1, 169, '2022-06-17 20:06:42'),
(7, 6, 11, 'Superbärblandning för Vacker & Frisk Hy', 3, 199, '2022-06-17 20:08:09'),
(8, 6, 24, 'Lean Protein med Choklad & Adaptogener', 1, 239, '2022-06-17 20:08:09'),
(9, 6, 15, 'Gurkmeja Latte för Immunförsvar Boost', 1, 169, '2022-06-17 20:08:09'),
(10, 7, 11, 'Superbärblandning för Vacker & Frisk Hy', 3, 199, '2022-06-17 20:11:21'),
(11, 7, 24, 'Lean Protein med Choklad & Adaptogener', 1, 239, '2022-06-17 20:11:21'),
(12, 7, 15, 'Gurkmeja Latte för Immunförsvar Boost', 1, 169, '2022-06-17 20:11:21'),
(13, 8, 11, 'Superbärblandning för Vacker & Frisk Hy', 3, 199, '2022-06-17 22:07:36'),
(14, 8, 24, 'Lean Protein med Choklad & Adaptogener', 1, 239, '2022-06-17 22:07:36'),
(15, 8, 15, 'Gurkmeja Latte för Immunförsvar Boost', 1, 169, '2022-06-17 22:07:36'),
(16, 9, 11, 'Superbärblandning för Vacker & Frisk Hy', 2, 199, '2022-06-19 19:08:09'),
(17, 9, 24, 'Lean Protein med Choklad & Adaptogener', 1, 239, '2022-06-19 19:08:09'),
(18, 10, 28, 'Body Tone Shake med Choklad och Adaptogener', 1, 339, '2022-06-19 19:11:28'),
(19, 10, 25, 'Lean Protein med Bärblandning för Vacker Hy', 1, 239, '2022-06-19 19:11:28'),
(20, 11, 11, 'Superbärblandning för Vacker & Frisk Hy', 2, 199, '2022-06-19 19:47:53'),
(21, 11, 10, 'Collagen Booster för Hud, Hår & Naglar', 1, 199, '2022-06-19 19:47:53'),
(22, 12, 10, 'Collagen Booster för Hud, Hår & Naglar', 1, 199, '2022-06-19 19:52:56'),
(23, 13, 10, 'Collagen Booster för Hud, Hår & Naglar', 1, 199, '2022-06-19 20:08:22'),
(24, 14, 10, 'Collagen Booster för Hud, Hår & Naglar', 2, 199, '2022-06-19 20:21:20'),
(25, 15, 14, 'Choklad & Adaptogener för Minskad Stress', 1, 169, '2022-06-19 20:25:14'),
(26, 15, 24, 'Lean Protein med Choklad & Adaptogener', 1, 239, '2022-06-19 20:25:14'),
(27, 16, 13, 'Matcha Latte för Ökad Fokus och Energi', 1, 199, '2022-06-19 20:26:33'),
(28, 17, 14, 'Choklad & Adaptogener för Minskad Stress', 1, 169, '2022-06-19 20:28:08'),
(29, 18, 11, 'Superbärblandning för Vacker & Frisk Hy', 1, 199, '2022-06-19 20:31:34'),
(30, 19, 10, 'Plant Collagen Protector for Skin, Hair & Nails', 2, 199, '2022-06-20 08:12:55'),
(31, 19, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-20 08:12:55'),
(32, 20, 10, 'Plant Collagen Protector for Skin, Hair & Nails', 1, 199, '2022-06-20 08:14:36'),
(33, 21, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-20 08:30:07'),
(34, 22, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 3, 199, '2022-06-20 08:37:58'),
(35, 23, 10, 'Plant Collagen Protector for Skin, Hair & Nails', 2, 199, '2022-06-20 08:43:34'),
(36, 24, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 3, 199, '2022-06-20 11:18:13'),
(37, 25, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-20 22:51:28'),
(38, 25, 10, 'Plant Collagen Protector for Skin, Hair & Nails', 3, 199, '2022-06-20 22:51:28'),
(39, 26, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-20 23:46:27'),
(40, 27, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-20 23:46:41'),
(41, 28, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-20 23:50:15'),
(42, 29, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-20 23:53:26'),
(43, 30, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-20 23:54:37'),
(44, 31, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-20 23:54:45'),
(45, 32, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-20 23:58:59'),
(46, 33, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-21 08:17:24'),
(47, 34, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-21 08:23:13'),
(48, 35, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-21 08:24:06'),
(49, 36, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-21 08:25:08'),
(50, 37, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-21 08:42:20'),
(51, 38, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 4, 199, '2022-06-21 09:23:43'),
(52, 39, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-21 09:27:18'),
(53, 40, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-21 09:29:23'),
(54, 41, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-21 09:33:42'),
(55, 42, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-21 09:34:29'),
(56, 43, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-21 09:34:54'),
(57, 44, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-21 10:10:56'),
(58, 45, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-21 10:18:01'),
(59, 46, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-21 10:19:22'),
(60, 47, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-21 10:24:51'),
(61, 48, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-21 10:26:09'),
(62, 49, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-21 10:26:54'),
(63, 50, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 4, 199, '2022-06-22 11:44:18'),
(64, 51, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-26 22:07:48'),
(65, 51, 10, 'Plant Collagen Protector for Skin, Hair & Nails', 1, 199, '2022-06-26 22:07:48'),
(66, 51, 12, '\r\nDaily Dose of Super Greens', 1, 199, '2022-06-26 22:07:48'),
(67, 52, 10, 'Plant Collagen Protector for Skin, Hair & Nails', 3, 199, '2022-06-26 22:08:10'),
(68, 53, 29, 'Body Tone Meal Shake with Detox Greens', 1, 339, '2022-06-26 22:08:37'),
(69, 53, 28, 'Body Tone Meal Shake with Chocolate', 1, 339, '2022-06-26 22:08:37'),
(70, 54, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-26 23:16:45'),
(71, 55, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 2, 199, '2022-06-26 23:18:44'),
(72, 56, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-26 23:19:10'),
(73, 56, 14, 'Magic Mushroom Chocolate - Brain Boosting', 1, 169, '2022-06-26 23:19:10'),
(74, 56, 25, 'Berry Performance Protein + Collagen Support', 1, 239, '2022-06-26 23:19:10'),
(75, 57, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-26 23:23:07'),
(76, 58, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-26 23:25:43'),
(77, 59, 12, '\r\nDaily Dose of Super Greens', 2, 199, '2022-06-27 13:10:46'),
(78, 60, 12, '\r\nDaily Dose of Super Greens', 1, 199, '2022-06-28 08:01:30'),
(79, 60, 11, 'Super Berry Mix for Beautiful, Healthy Skin', 1, 199, '2022-06-28 08:01:30'),
(80, 61, 12, '\r\nDaily Dose of Super Greens', 4, 199, '2022-06-28 08:15:18'),
(81, 62, 12, '\r\nDaily Dose of Super Greens', 2, 199, '2022-06-28 13:13:27'),
(82, 63, 12, '\r\nDaily Dose of Super Greens', 2, 199, '2022-06-28 13:14:42'),
(83, 64, 12, '\r\nDaily Dose of Super Greens', 2, 199, '2022-06-28 13:14:46'),
(84, 65, 12, '\r\nDaily Dose of Super Greens', 2, 199, '2022-06-28 13:19:22'),
(85, 66, 12, '\r\nDaily Dose of Super Greens', 2, 199, '2022-06-28 13:20:38'),
(86, 67, 13, 'Matcha Latte for Focus & Energy Boost', 2, 199, '2022-06-28 13:22:35'),
(87, 68, 13, 'Matcha Latte for Focus & Energy Boost', 2, 199, '2022-06-28 13:46:32'),
(88, 69, 13, 'Matcha Latte for Focus & Energy Boost', 2, 199, '2022-06-28 13:54:01'),
(89, 70, 13, 'Matcha Latte for Focus & Energy Boost', 2, 199, '2022-06-28 13:56:24'),
(90, 71, 12, '\r\nDaily Dose of Super Greens', 1, 199, '2022-06-28 14:06:48'),
(91, 72, 13, 'Matcha Latte for Focus & Energy Boost', 2, 199, '2022-06-28 18:18:03'),
(92, 73, 25, 'Berry Performance Protein + Collagen Support', 1, 239, '2022-06-28 21:15:37'),
(93, 73, 24, 'Chocolate Performance Protein + Collagen Support', 3, 239, '2022-06-28 21:15:37'),
(94, 73, 28, 'Body Tone Meal Shake with Chocolate', 4, 339, '2022-06-28 21:15:37'),
(95, 73, 29, 'Body Tone Meal Shake with Detox Greens', 1, 339, '2022-06-28 21:15:37'),
(96, 73, 15, 'Golden Turmeric Latte - Immunity Boosting', 6, 169, '2022-06-28 21:15:37'),
(97, 73, 14, 'Magic Mushroom Chocolate - Brain Boosting', 3, 169, '2022-06-28 21:15:37'),
(98, 74, 13, 'Matcha Latte for Focus & Energy Boost', 3, 199, '2022-06-29 07:34:45'),
(99, 75, 13, 'Matcha Latte for Focus & Energy Boost', 1, 199, '2022-06-29 07:42:28'),
(100, 76, 13, 'Matcha Latte for Focus & Energy Boost', 2, 199, '2022-06-29 07:52:22'),
(101, 77, 13, 'Matcha Latte for Focus & Energy Boost', 1, 199, '2022-06-29 07:55:35'),
(102, 78, 13, 'Matcha Latte for Focus & Energy Boost', 3, 199, '2022-06-29 07:56:45'),
(103, 79, 26, 'Body Tone Meal Shake with Superberries', 2, 339, '2022-06-29 08:35:08'),
(104, 80, 12, '\r\nDaily Dose of Super Greens', 2, 199, '2022-06-29 09:31:10'),
(105, 81, 13, 'Matcha Latte for Focus & Energy Boost', 3, 199, '2022-06-29 11:20:55'),
(106, 82, 13, 'Matcha Latte for Focus & Energy Boost', 1, 199, '2022-06-29 12:14:30'),
(107, 82, 24, 'Chocolate Performance Protein + Collagen Support', 1, 239, '2022-06-29 12:14:30'),
(108, 83, 12, '\r\nDaily Dose of Super Greens', 1, 199, '2022-06-29 12:17:26'),
(109, 84, 12, 'Daily Dose of Super Green', 2, 3599, '2022-06-29 15:02:02'),
(110, 85, 13, 'Matcha Latte for Focus & Energy Boost', 2, 199, '2022-06-29 18:15:43'),
(111, 85, 14, 'Magic Mushroom Chocolate - Brain Boosting', 3, 169, '2022-06-29 18:15:43'),
(112, 86, 13, 'Matcha Latte for Focus & Energy Boost', 2, 199, '2022-06-29 20:18:07'),
(113, 87, 13, 'Matcha Latte for Focus & Energy Boost', 1, 199, '2022-06-29 20:37:09'),
(114, 88, 12, 'Daily Dose of Super Green', 3, 399, '2022-06-30 00:21:48'),
(115, 89, 13, 'Matcha Latte for Focus & Energy Boost', 3, 199, '2022-06-30 00:49:34'),
(116, 90, 13, 'Matcha Latte for Focus & Energy Boost', 3, 199, '2022-06-30 00:51:52'),
(117, 91, 13, 'Matcha Latte for Focus & Energy Boost', 2, 199, '2022-06-30 07:36:38'),
(118, 91, 14, 'Magic Mushroom Chocolate - Brain Boosting', 6, 169, '2022-06-30 07:36:38'),
(119, 91, 24, 'Chocolate Performance Protein + Collagen Support', 1, 239, '2022-06-30 07:36:38');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
