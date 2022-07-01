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
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `street` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `city` varchar(90) NOT NULL,
  `country` varchar(90) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `street`, `postal_code`, `city`, `country`, `create_date`) VALUES
(5, 'haashira', 'haha', 'haashira@gmail.com', '$2y$12$tl3b2okXOCcypQapA1pXwOGRwiB/uL0aSNMHXDkhiKTO.gfzQKHCG', '070 000 00 00', 'klappevägen 1', '83132', 'östersund', 'sverige', '2022-06-14 10:05:28'),
(7, 'anette', 'johansson', 'anette@gmail.com', '$2y$12$cOxZ6hTpEO68fcLEvZGqk.NNQQn/3q0ldEHXt13o/vA2zIHEI04iK', '2039853967306', 'lskfnblfkdn', '0498', 'lhkfnbsdlfkbn', 'lfdnbslknb', '2022-06-14 11:32:18'),
(9, 'jacob', 'westman', 'jacob@gmail.com', '$2y$12$74Z21W0kfU/BMEedSLjtW.aKK0Ol4WlRjyImyeg9UfY5LaUlwxK/S', '070 999 99 99', 'skidbacksvägen 4', '83132', 'östersund', 'sverige', '2022-06-17 19:26:48'),
(31, 'lars', 'silvstål', 'lars@gmail.com', '$2y$12$DHP1hCOu/38yI0./P4kyC.2U3NucDUhoVtBpVI8VZLmo5p51.LqKa', '070 666 66 66', 'brantvägen 34', '13453', 'sollefteå', 'sverige', '2022-06-27 09:28:54'),
(32, 'tommy', 'persson', 'tommy@gmail.com', '$2y$12$UP4HwgN7P4Mjw3iyz3.jZ.SM1pOFRmARDSJo0EevsNaNJ/4.KvoaO', '070 999 99 99', 'klickvägen 34', '12345', 'stockholm', 'sverige', '2022-06-27 09:36:20'),
(33, 'catharina', 'törngren', 'catharina@gmail.com', '$2y$12$FUe04DYMI./2Prv88BlgJu/DiksnSMFyq7B.p/fugZedsyeNhzqu2', '070 222 22 22', 'vråkvägen 9', '83232', 'östersund', 'se', '2022-06-28 18:16:00'),
(34, 'filip', 'hammar', 'filip@gmail.com', '$2y$12$zv0Y0uXRD1BWoZXd8nPpV.byVrX4Xz05GSDx.tXuh0g1nsW1PXNZq', '070 333 33 33', 'kyrkgatan 6', '111 11', 'stockholm', 'se', '2022-06-28 21:10:08'),
(35, 'sara', 'hammar', 'sara@gmail.com', '$2y$12$8CgjtDCLuRUJZmeJQxn2z.dssTPXf0CoarrOjmytEM9bjzwbxb7Z6', '070 333 33 33', 'kyrkgatan 6', '111 11', 'stockholm', 'se', '2022-06-28 21:12:22'),
(36, 'kenneth', 'jonsson', 'kenneth@gmail.com', '$2y$12$IvBPNChiEZR4qvkUMQLa4OXk9gOBYkE/bzxg5iQ7X3WWOS1HQb8Ki', '070 444 44 44', 'grundläggargränd 34', '83132', 'östersund', 'se', '2022-06-28 21:13:55'),
(37, 'ingrid', 'persson', 'ingrid@gmail.com', '$2y$12$X.73Dg/cG5VY27oBO46oGu4xbZ1kB2YgbFijecMXveLEgVoknM7em', '070 555 55 55', 'kläppevägen 7', '111 11', 'köping', 'se', '2022-06-29 07:34:05'),
(38, 'annika', 'wahlström', 'annika@gmail.com', '$2y$12$URYjI9EPffed0b4QAkF2f.GH38X5598V1Vd2Kn762GF9uNlFTpuiy', '070 666 66 66', 'frimansvägen 23', '12345', 'östersund', 'se', '2022-06-29 07:35:47'),
(39, 'anna', 'andersson', 'anna@gmail.com', '$2y$12$4CukyhmHEXix9y/7.dmEeOoygOwmX1zCPZ867quEYdZzMFn84.ANa', '070 000 00 00', 'kråkvägen 3', '111 11', 'stockholm', 'se', '2022-06-29 07:51:42'),
(40, 'anders', 'andersson', 'anders@gmail.com', '$2y$12$RM5YFxWP7qhOPIEPatWSJ.hZOni1IVAhr0kxrmhysBmBPPUR6l5ji', '070 999 99 99', 'kolarvägen 4', '111 11', 'östersund', 'se', '2022-06-29 07:53:01'),
(43, 'jonas', 'jonasson', 'jonas@gmail.com', '$2y$12$hPpPQ1DJdezsw1bqym/vLO9frBI6/NDSWdLVD8i.oSLjAon8nF0pi', '070 333 33 33', 'jonasvägen 3', '333 33', 'kalix', 'se', '2022-06-29 08:26:33'),
(44, 'shima', 'valal', 'shima@gmail.com', '$2y$12$K10sdIQchkZGDRsHLvHL..MYTg3oqrxB8tLY75wJhsiKICbWRT/5.', '070 555 55 55', 'dflkgntkhjn 56', '33356', 'skellefteå', 'se', '2022-06-29 08:35:08'),
(46, 'stefan', 'stefansson', 'stefan@gmail.com', '$2y$12$kggi22WcYkma6IRZZ3p3gep2SXFumkyEhOJh6KMn5puXV8r6KTEkO', '070 444 44 44', 'stefansvägen', '33131', 'stefanort', 'sverige', '2022-06-29 09:35:42'),
(48, 'tom', 'tomsson', 'tom@gmail.com', '$2y$12$a.IQ92xzq.JA.H5C7BNlkOYZt6oZEf.IwieyRbsTG3fpm7c6q4REC', '070 999 99 99', 'tomvägen 1', '12345', 'stockholm', 'se', '2022-06-29 11:28:31'),
(49, 'fan', 'fansson', 'fan@gmail.com', '$2y$12$s8je.tnqcYm.QBRsjXyJpuw2/YnJ1mtP.1eqs7laJ9NHTSTxtEHcm', '070 999 99 99', 'tomvägen 1', '12345', 'stockholm', 'se', '2022-06-29 11:31:17'),
(52, 'ahmad', 'fdlkgm', 'fdlgnsdf@fbkjn.com', '$2y$12$LOlSSwJaIpbF9egCYXQADe/ROh8vY48c6F79hoYqF9g7/gbze65QG', '234567854', 'dflkgnlbksn 23', '124356', 'dfhgrdb', 'se', '2022-06-29 12:17:26'),
(53, 'hallo', 'hallosson', 'hallo@gmail.com', '$2y$12$Y1SCpQtm3GsS.x4MTinpmOM9xwov.zWdNLhf9wES2MdKG/jOxNgnO', '070 444 44 44', 'hallovägen 1', '12345', 'halloj', 'se', '2022-06-29 15:02:02'),
(54, 'jesper', 'andersson', 'jesper@gmail.com', '$2y$12$XCKPofTOomsG4Ey1cC6YPez/QQNZiE1wH9hpaPZ4X7MVvDAvhO6w.', '070 000 00 00', 'jesvägen', '12345', 'stockholm', 'sweden', '2022-06-29 18:18:03'),
(55, 'ida', 'wahlström', 'ida@gmail.com', '$2y$12$02LGRH.5mKg.CbP9UkYkpuZtHv77Xse6oWBaXRJd09L8KKixEIzVS', '070 555 55 55', 'idavägen 45', '12345', 'uddevalla', 'sweden', '2022-06-29 18:57:13'),
(56, 'haashir', 'husain', 'haashir@gmail.com', '$2y$12$.MjyskyQ.1NpS0lXruJtCuhDlIF.Wy7DMvl8fvorCdPYvI9aESFVq', '94506485', 'emerald hill 134', '229414', 'singapore', 'singapore', '2022-06-29 20:15:20'),
(57, 'nalle', 'husain', 'nalle@gmail.com', '$2y$12$MBVP8egmrhm6q28yaSr8cOi3GCkvqJFeVWGkNTUmsUVP4nqNXcKIC', '070 000 00 00', 'nallevägen 3', '12345', 'knivsta', 'se', '2022-06-29 20:37:09'),
(58, 'halloj', 'jallo', 'halloj@gmail.com', '$2y$12$FFIoTIY8lAJDAC/lSkENt.bzGFpmI4J4YXcZ94rPIS30L77JFBSHa', '070 567 67 88', 'hallvägen 1', '12345', 'stockholm', 'sverige', '2022-06-30 00:49:34'),
(59, 'haashira', 'hathija', 'haashira@gmail.cm', '$2y$12$QGPa1yPdwYvYcpRjFawkI.fwMdE8PJrYq6rBYbVBUebhPENy4fxTO', '2305968309§d', 'sflkhnsrlk', '2356', 'lfkdlfk', 'elrkhm', '2022-06-30 07:36:38');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
