-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 06, 2014 at 10:00 PM
-- Server version: 5.5.8-log
-- PHP Version: 5.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `7lphp`
--
CREATE DATABASE IF NOT EXISTS `7lphp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `7lphp`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `display_name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `display_name`, `email`, `last_login`) VALUES
(19, 'ali', '5ec5e732a1567d9661da09206d7c5c6aeefc62d4', 'Ali Alavi', 'ali@localhost', '2014-09-05 19:47:32'),
(20, 'loghman', '197e19b8f3d4bee035c7c2e0f3886d78b1d54b60', 'Loghman Avand', 'avand@localhost', '2014-09-05 19:49:16'),
(21, 'sara', '9140c29065f32f77366d3e4c2126b0a05087f5a4', 'Sara Ahmadi', 'sara@localhost', '2014-09-05 19:49:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
