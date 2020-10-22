-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2020 at 04:43 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `name` varchar(64) NOT NULL,
  `type` varchar(30) NOT NULL,
  `description` varchar(256) NOT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `area` varchar(64) NOT NULL,
  `image` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`name`, `type`, `description`, `latitude`, `longitude`, `area`, `image`) VALUES
('RTB Bau', 'Pump House (Flood Mitigation)', 'Bau Scheme', '1.415424', '110.159853', 'Bau', 'img/13.jpg'),
('Sampat', 'Tidal Control Gate', 'Sebangan Bajong Scheme', '1.453311', '110.725200', 'Sebangan Bajong', 'img/10.jpg'),
('IADA Samarahan', 'Tidal Control Gate', 'Pintu Air', '1.459567', '110.477135', 'Kota Samarahan', 'img/18.jpeg'),
('Beliong', 'Tidal Control Gate', 'Sebangan Bajong Scheme', '1.499389', '110.972600', 'Sebangan Bajong', 'img/8.jpg'),
('Segali', 'Tidal Control Gate', 'Sebangan Bajong Scheme', '1.507560', '110.766932', 'Sebangan Bajong', 'img/12.jpg'),
('Meranti', 'Tidal Control Gate', 'Sebangan Bajong Scheme', '1.521833', '110.807861', 'Sebangan Bajong', 'img/9.jpg'),
('Sampun Kelili', 'Tidal Control Gate', 'Asajaya Scheme', '1.541578', '110.640056', 'Asajaya', 'img/11.jpg'),
('Sampun Gerunggang', 'Tidal Control Gate', 'Asajaya Scheme', '1.542833', '110.636528', 'Asajaya', 'img/6.jpg'),
('Asajaya Ulu', 'Tidal Control Gate', 'Asajaya Scheme', '1.543308', '110.617686', 'Asajaya', 'img/5.jpg'),
('Serpan Ulu', 'Tidal Control Gate', 'Asajaya Scheme', '1.543444', '110.610167', 'Asajaya', 'img/4.jpg'),
('Moyan Ulu (West)', 'Tidal Control Gate', 'Asajaya Scheme', '1.544853', '110.576606', 'Asajaya', 'img/7.jpg'),
('Moyan Ulu East', 'Tidal Control Gate', 'Asajaya Scheme', '1.545000', '110.578500', 'Asajaya', 'img/3.jpg'),
('Ketup', 'Tidal Control Gate', 'Asajaya Scheme', '1.547667', '110.532694', 'Asajaya', 'img/2.jpg'),
('Siol Kanan', 'Tidal Control Gate', 'This is part of the Kuching Scheme', '1.602850', '110.352556', 'Kuching', 'img/1.jpg'),
('Nanga Merit', 'Pump House (Irrigation)', 'Pump House in Nanga Merit', '2.277794', '113.065491', 'Nanga Merit', 'img/17.jpeg'),
('RTB Ang Chui Kow', 'Pump House (Flood Mitigation)', 'Sibu Scheme', '2.284075', '111.831970', 'Sibu', 'img/14.jpg'),
('RTB Loba Lebangan', 'Pump House (Flood Mitigation)', 'Sibu Scheme', '2.286969', '111.827404', 'Sibu', 'img/15.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'jtang0308@gmail.com'),
(2, 'powerslider', 'power', 'power@power.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`latitude`,`longitude`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
