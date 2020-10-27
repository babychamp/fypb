-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 11:33 AM
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
  `ID` int(8) NOT NULL,
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

INSERT INTO `assets` (`ID`, `name`, `type`, `description`, `latitude`, `longitude`, `area`, `image`) VALUES
(1, 'Siol Kanan', 'Tidal Control Gate', 'Kuching Scheme', '1.602850', '110.352556', 'Kuching', 'img/1.jpg'),
(2, 'Ketup', 'Tidal Control Gate', 'Asajaya Scheme', '1.547667', '110.532694', 'Asajaya', 'img/2.jpg'),
(3, 'Moyan Ulu East', 'Tidal Control Gate', 'Asajaya Scheme', '1.545000', '110.578500', 'Asajaya', 'img/3.jpg'),
(4, 'Serpan Ulu', 'Tidal Control Gate', 'Asajaya Scheme', '1.543444', '110.610167', 'Asajaya', 'img/4.jpg'),
(5, 'Asajaya Ulu', 'Tidal Control Gate', 'Asajaya Scheme', '1.543308', '110.617686', 'Asajaya', 'img/5.jpg'),
(6, 'Sampun Gerunggang', 'Tidal Control Gate', 'Asajaya Scheme', '1.542833', '110.636528', 'Asajaya', 'img/6.jpg'),
(7, 'Moyan Ulu (West)', 'Tidal Control Gate', 'Asajaya Scheme', '1.544853', '110.576606', 'Asajaya', 'img/7.jpg'),
(8, 'Beliong', 'Tidal Control Gate', 'Sebangan Bajong Scheme', '1.499389', '110.972600', 'Sebangan Bajong', 'img/8.jpg'),
(9, 'Meranti', 'Tidal Control Gate', 'Sebangan Bajong Scheme', '1.521833', '110.807861', 'Sebangan Bajong', 'img/9.jpg'),
(10, 'Sampat', 'Tidal Control Gate', 'Sebangan Bajong Scheme', '1.453311', '110.725200', 'Sebangan Bajong', 'img/10.jpg'),
(11, 'Sampun Kelili', 'Tidal Control Gate', 'Asajaya Scheme', '1.541578', '110.640056', 'Asajaya', 'img/11.jpg'),
(12, 'Segali', 'Tidal Control Gate', 'Sebangan Bajong Scheme', '1.507560', '110.766932', 'Sebangan Bajong', 'img/12.jpg'),
(13, 'RTB Bau', 'Pump House (Flood Mitigation)', 'Bau Scheme', '1.415424', '110.159853', 'Bau', 'img/13.jpg'),
(14, 'RTB Ang Chui Kow', 'Pump House (Flood Mitigation)', 'Sibu Scheme', '2.284075', '111.831970', 'Sibu', 'img/14.jpg'),
(15, 'RTB Loba Lebangan', 'Pump House (Flood Mitigation)', 'Sibu Scheme', '2.286969', '111.827404', 'Sibu', 'img/15.jpg'),
(19, 'Nanga Merit', 'Pump House (Irrigation)', 'Pump House in Nanga Merit', '2.277794', '113.065491', 'Nanga Merit', 'img/17.jpg'),
(20, 'IADA Samarahan', 'Tidal Control Gate', 'Pintu Air', '1.459567', '110.477135', 'Kota Samarahan', 'img/18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `check_system`
--

CREATE TABLE `check_system` (
  `id` int(11) NOT NULL,
  `checkin_out` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `check_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `type` int(10) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `checkedin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `username`, `password`, `email`, `checkedin`) VALUES
(1, 1, 'admin', 'admin', 'jtang0308@gmail.com', 0),
(2, 2, 'employee', 'employee', 'employee@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `id` int(10) NOT NULL DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT 'Deactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`id`, `status`) VALUES
(3, 'Deactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `check_system`
--
ALTER TABLE `check_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `check_system`
--
ALTER TABLE `check_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
