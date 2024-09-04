-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 09:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blackmount`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `cat_desc` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `cat_desc`, `image`, `Date`) VALUES
(1, ' Photography', ' Photography bibendum eros amet vacun the vulputate in the vitae miss.', 'photography.png', '2023-05-13 07:31:47'),
(2, ' Videography ', 'Videography bibendum eros amen vacun the vulputate in the vitae miss.', 'videography.png', '2023-05-13 07:31:54'),
(3, ' Drone Footage', 'Drone Footage bibendum eros amen vacun the vulputate in the miss.', 'drone.png', '2023-05-13 07:32:04'),
(4, ' Indoor Studio', 'Indoor Studio bibendum eros amen vacus duru in the vitae miss.', 'indoor.png', '2023-05-13 07:32:15'),
(5, 'Video Editing', 'Video Editing bibendum amen vacus the vulputate in the vitae.', 'videoediting.png', '2023-05-13 07:32:26'),
(6, 'Album / Printing', 'Album / Printing bibenum eros amen vacun the vulputate the vitae miss.', 'album_printing.png', '2023-05-13 07:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ID`, `Name`, `Image`, `Date`) VALUES
(1, 'Abc', '1.png', '2023-05-12 10:45:17');

-- --------------------------------------------------------

--
-- Table structure for table `latest_pkgs`
--

CREATE TABLE `latest_pkgs` (
  `ID` int(11) NOT NULL,
  `Pkg_Name` varchar(250) NOT NULL,
  `d1` varchar(250) NOT NULL,
  `d2` varchar(250) NOT NULL,
  `d3` varchar(250) NOT NULL,
  `d4` varchar(250) NOT NULL,
  `d5` varchar(250) NOT NULL,
  `d6` varchar(250) NOT NULL,
  `d7` varchar(250) NOT NULL,
  `d8` varchar(250) NOT NULL,
  `d9` varchar(250) NOT NULL,
  `d10` varchar(250) NOT NULL,
  `valid_date` varchar(250) NOT NULL,
  `Pkg_Image` varchar(250) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `latest_pkgs`
--

INSERT INTO `latest_pkgs` (`ID`, `Pkg_Name`, `d1`, `d2`, `d3`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `valid_date`, `Pkg_Image`, `Date`) VALUES
(1, 'Bronze', '2 X Photographers (Complete Coverage)', 'Couple Shoot', 'Family & General Photography', 'Unlimited Pictures', '1 X Cinematic Videographer (Complete Coverage)', 'Couple Videography', 'Family & General Videography', '1 X Promo Video (Each Day)', '1 X Full-Length Video (Each Day)', '2 X Digital Fancy Album (With Brief Case)', '20 December, 2022', '1.jpg', '2023-05-12 07:29:10');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(12) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `Name`, `Email`, `Password`, `Role`, `Date`) VALUES
(1, 'Admin', 'admin@gmail.com', '123', 'admin', '2023-05-09 06:37:43'),
(2, 'Raza', 'raza@gmail.com', '123', 'client', '2023-05-09 06:38:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `latest_pkgs`
--
ALTER TABLE `latest_pkgs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `latest_pkgs`
--
ALTER TABLE `latest_pkgs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
