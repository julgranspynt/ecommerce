-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:3306
-- Tid vid skapande: 01 jul 2022 kl 12:38
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
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(90) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `img_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `stock`, `img_url`) VALUES
(12, 'Daily Dose of Super Green', 'Green Boost - Organic Superfood Smoothie Mix.\r\n(200 gr.)\r\n\r\nA tasty green smoothie mix for the whole family - sweetened up with mango, apple & banana. This nutritious mix helps to strengthen the immune system, improves gut-health and reduces inflammation. An easy way to get your daily dose of greens into your diet everyday - just shake with plant milk or add into a smoothie.', 399, 45, 'uploads/Green-Boost.jpg'),
(13, 'Matcha Latte for Focus & Energy Boost', 'Matcha Power - Organic Superfood Mix.\r\n(200 gr.)\r\n\r\nOur premium Matcha Latte blend includes the powerful adaptogen root Maca. Matcha Power has small amounts of cinnamon and ginger, resulting in a subtle yet flavourful blend. The combo of all these ingredients provide the body a cognitive boost while also a feeling of calm. Detailed description below.', 199, 45, 'uploads/Matcha-Power.jpg'),
(14, 'Magic Mushroom Chocolate - Brain Boosting', 'Choco Chill - Organic Superfood Smoothie Mix.\r\n(160 gr.)\r\n\r\nA delicious cacao mix that invites an inner peace and helps the nervous system to gently calm down. Includes the adaptogens: Chaga, Reishi och Ashwagandha, all of which reduce the effects of stress on the body. Blend into a hot or iced chocolate, or into a smoothie. Detailed description below.', 169, 45, 'uploads/Choco-Chill.jpg'),
(15, 'Golden Turmeric Latte - Immunity Boosting', 'Spicy Calm - Organic Superfood Smoothie Mix.\r\n(160 gr.)\r\n\r\nOur warming lattte blend with Turmeric, Cinnamon, Ginger, Lucuma and adaptogen Ashwagandha. This mix helps to reduce inflammation & stress in the body while boosting the immune system. Blend into warm or iced plant milk, or add to your morning oats.', 169, 45, 'uploads/Spicy-Calm.jpg'),
(24, 'Chocolate Performance Protein + Collagen Support', 'Choco Strong - Plant Protein Blend.\r\n(480 gr.)\r\n\r\nA tasty 2-in-1 plant protein powder blend, designed to build muscle and support collagen production: boosting skin, hair & nail health. This unique protein formula is for men & women who are focused on building muscle and feeling their optimal best. Rich in antioxidants and 17g of protein per serving. Includes organic cacao, pea protein, maca, lucuma and adaptogens.', 239, 45, 'uploads/Choco-Strong.jpg'),
(25, 'Berry Performance Protein + Collagen Support', 'Berry Strong - Plant Protein Blend.\r\n(420 gr.)\r\n\r\nA tasty 2-in-1 plant protein powder blend, designed to build muscle and support collagen production: boosting skin, hair & nail health. This unique protein formula is for men & women who are focused on building muscle and feeling their optimal best. Rich in antioxidants and 16g of protein per serving. Includes organic superberries: strawberry, raspberry, acai + pea protein, maca and baobab.', 239, 45, 'uploads/Berry-Strong.jpg'),
(26, 'Body Tone Meal Shake with Superberries', 'Berry Fuel - Organic Meal Replacement with Berries\r\n(825 gr.)\r\n\r\nA premium complete meal shake powder including 20 of the best organic berries, veggies & fruits. This blend also contains high-quality pea protein, gluten-free oats & Omega 3\'s from flaxseeds. 278 calories / 26g of protein per serving. The best, most nutritious meal shake on the market for health-conscious people. No emulsifiers or artificial vitamins.', 339, 45, 'uploads/Berry-Fuel.jpg'),
(28, 'Body Tone Meal Shake with Chocolate', 'Choco Fuel - Organic Meal Replacement with Cacao.\r\n(825 gr.)\r\n\r\nA premium complete meal shake powder including 14 of the best organic veggies, fruits & adaptogens. This blend also contains high-quality pea protein, gluten-free oats & Omega 3\'s from flaxseeds. 279 calories / 28g of protein per serving. We\'ve added in Ashwagandha and Reishi to reduce stress and keep you focussed. The best, most nutritious meal shake on the market for health-conscious people. No emulsifiers or artificial vitamins.', 339, 45, 'uploads/Choco-Fuel.jpg'),
(29, 'Body Tone Meal Shake with Detox Greens', 'Green Fuel - Organic Meal Replacement with Greens.\r\n(825 gr.)\r\n\r\nA premium complete meal shake powder including 20 of the best organic greens, veggies & fruits. This blend also contains high-quality pea protein, gluten-free oats & Omega 3\'s from flaxseeds. 278 calories / 27g of protein per serving. The best, most nutritious meal shake on the market for health-conscious people. Sweetened up with mango & banana. No emulsifiers or artificial vitamins.', 339, 34, 'uploads/Green-Fuel.jpg');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
