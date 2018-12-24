-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2014 at 04:41 PM
-- Server version: 5.5.8-log
-- PHP Version: 5.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `market`
--
CREATE DATABASE IF NOT EXISTS `market` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `market`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`id` int(9) unsigned NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Truncate table before insert `categories`
--

TRUNCATE TABLE `categories`;
--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Mobile'),
(2, 'Laptop'),
(3, 'Printer'),
(4, 'PC'),
(5, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `age` int(3) unsigned DEFAULT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(512) NOT NULL,
  `email` varchar(128) NOT NULL,
  `address` varchar(1024) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Truncate table before insert `customers`
--

TRUNCATE TABLE `customers`;
--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `age`, `username`, `password`, `email`, `address`) VALUES
(1, 'Loghman Avand', 26, 'loghman.avand', 'loapass', 'avand.loghman@gmail.com', 'Shiraz - some addresses'),
(2, 'Loghman Ahmadi', 8, 'loghman.ahmadi', 'pass2', 'ahmadi.loghman@gmail.com', 'Tehran - some addresses'),
(3, 'Sima Ahmadi', NULL, 'sara23', 'sarapass', 'sara23@yahoo.com', 'Yazd - some addresses'),
(4, 'Ali mohamadi', 18, 'ali Taghavi', 'aliii', 'aliiPass@gmail.com', 'Tabriz - some addresses'),
(5, 'Sara Alavi', NULL, 'sara23', 'sarapass', 'sara23@yahoo.com', 'Yazd - some addresses'),
(6, 'Sara Mohamadi', 32, 'saraMo1360', 'saraMpass', 'saraMoam345@yahoo.com', 'Bushehr - some addresses'),
(7, 'Maryam hosseini', 43, 'mh34', 'pass', 'mh87654@yahoo.com', 'Tehran - some addresses'),
(8, 'Ahmad Alavi', 11, 'aaadg4', 'ssapss', 'ahala76543@yahoo.com', 'Tehran - some addresses');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(9) NOT NULL,
  `product_id` int(9) NOT NULL,
  `customer_id` int(9) NOT NULL,
  `quantity` int(3) NOT NULL DEFAULT '1',
  `pay_amount` int(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Truncate table before insert `orders`
--

TRUNCATE TABLE `orders`;
--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `customer_id`, `quantity`, `pay_amount`, `status`) VALUES
(1, 1, 1, 3, 6900000, 3),
(2, 5, 1, 1, 2900000, 3),
(3, 3, 1, 1, 1830000, 1),
(4, 3, 2, 1, 1830000, 3),
(5, 3, 2, 2, 3660000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(9) NOT NULL,
  `name` varchar(512) NOT NULL,
  `desc` text NOT NULL,
  `price` int(10) NOT NULL DEFAULT '0',
  `cat_id` int(9) unsigned NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Truncate table before insert `products`
--

TRUNCATE TABLE `products`;
--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `desc`, `price`, `cat_id`) VALUES
(1, 'iphone 5s', 'desc about iphone 5s , desc about iphone 5s , desc about iphone 5s , desc about iphone 5s , desc about iphone 5s , desc about iphone 5s , desc about iphone 5s', 2300000, 1),
(2, 'HTC One m8', 'desc about htc one m8 , desc about htc one m8 , desc about htc one m8 , ', 1950000, 1),
(3, 'Samsong Galaxy S5', 'Desc Samsong Galaxy S5 , Desc Samsong Galaxy S5 , Desc Samsong Galaxy S5', 1830000, 1),
(4, 'Apple Macbook pro', 'Apple Macbook pro, Apple Macbook pro', 3800000, 2),
(5, 'Asus zenbook ux301', 'desc Asus zenbook ux301,Asus zenbook ux301 Asus zenbook ux301', 2900000, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD KEY `product_id` (`product_id`), ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`), ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(9) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
ADD CONSTRAINT `prd_cat_fk` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
