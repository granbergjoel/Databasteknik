-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Värd: localhost:3306
-- Tid vid skapande: 14 feb 2021 kl 14:14
-- Serverversion: 5.7.24
-- PHP-version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `webshop`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL,
  `customer` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `messages` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `customer` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `custom_add` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `item` varchar(50) COLLATE utf8_swedish_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL,
  `descriptions` varchar(255) COLLATE utf8_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`product_id`, `item`, `price`, `img`, `descriptions`) VALUES
(1, 'Chocolate Cupcakes', 11, 'img/0_sm.jpg', 'A classic snack. Rich chocolate melted on a moist cupcake'),
(2, 'Blueberry Bomb', 9, 'img/1_sm.jpg', 'A delicious blueberry pastry with vanilla cream'),
(3, 'Sweet Croissant', 7, 'img/2_sm.jpg', 'A crispy, puffy croissant filled with vanilla cream'),
(4, 'Cinnamon rolls', 12, 'img/3_sm.jpg', 'Sugar, cinnamon and flour. Can it be better?'),
(5, 'Eastern pastries', 9, 'img/4_sm.jpg', 'Exotic pastry from the middle east topped with pistage nuts'),
(6, 'Puff pastry', 13, 'img/5_sm.jpg', 'Thick vanilla cream in an crusty puff pastry'),
(7, 'Macarons', 6, 'img/6_sm.jpg', 'French macarons in all colors of the rainbow'),
(8, 'Jelly Donuts', 8, 'img/7_sm.jpg', 'A staple in the baking community, rolled in sweet sugar'),
(9, 'Mini Pastries', 7, 'img/8_sm.jpg', 'When you just want a nibble, toppes with fresh strawberries');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
