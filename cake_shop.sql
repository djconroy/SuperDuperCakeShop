-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 12:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

CREATE TABLE `cakes` (
  `name` varchar(100) NOT NULL,
  `order_in_list` int(11) NOT NULL,
  `price` float NOT NULL,
  `ingredients` varchar(500) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_height` int(11) NOT NULL,
  `image_source` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`name`, `order_in_list`, `price`, `ingredients`, `image_name`, `image_height`, `image_source`) VALUES
('Angel Cake with Berries and Icing', 1, 32.99, 'Sugar, Flour, Cream of Tartar, Egg Whites, Icing (Sugar, Milk, Cream, Butter), Strawberries, Raspberries, Blueberries', 'angel-cake-with-berries-and-icing.jpg', 180, 'www.flickr.com/photos/69302634@N02/9360299233/'),
('Carrot Cake with Lemon Ginger Mascarpone Icing', 3, 28.99, 'Carrots, Sugar, Flour, Baking Powder, Nutmeg, Cloves, Egg Whites, Icing (Ginger, Lemon, Mascarpone Cheese, Sugar, Cream)', 'carrot-cake-with-lemon-ginger-mascarpone-icing.jpg', 193, 'www.flickr.com/photos/stephcookie/10235469366'),
('Cheesecake with Orange Jelly', 4, 29.99, 'Orange Pieces, Orange Jelly (Orange Juice, Sugar, Gelatin), Cream Cheese, Sugar, Eggs, Crust (Sugar, Flour, Butter)', 'cheesecake-with-orange-jelly.jpg', 179, 'commons.wikimedia.org/wiki/File:Orange_cheesecake.jpg'),
('Chocolate Cake with Berries', 2, 34.99, 'Milk, Butter, Flour, Egg, Cream, Baking Powder, Cocoa Powder, Chocolate, Raspberries, Blackberries, Blueberries', 'chocolate-cake-with-berries.jpg', 160, 'pixnio.com/media/chocolate-cake-blueberry-fruit-blackberry-raspberries'),
('Strawberry Cake with Cream', 5, 24.99, 'Strawberries, Whipped Cream, Flour, Milk, Eggs, Baking Powder', 'strawberry-cake-with-cream.jpg', 160, 'www.flickr.com/photos/opacity/6787272696/');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `points` int(11) NOT NULL DEFAULT 0,
  `mobile` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`email`, `name`, `points`, `mobile`) VALUES
('daniel.conroy@fakeemail.com', 'Daniel Conroy', 454, NULL),
('henry@jones.com', 'Henry Jones', 0, '35454343');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
