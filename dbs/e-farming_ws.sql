-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 01:51 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-farming_ws`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Quantity` decimal(10,2) NOT NULL,
  `StartLimit` decimal(10,2) NOT NULL,
  `Location` text NOT NULL,
  `userRef` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(255) NOT NULL,
  `uniqueID` int(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `locationed` varchar(255) NOT NULL,
  `passwords` varchar(255) NOT NULL,
  `account` varchar(255) NOT NULL,
  `profilePhoto` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `uniqueID`, `firstName`, `lastName`, `email`, `phone`, `locationed`, `passwords`, `account`, `profilePhoto`) VALUES
(16, 76996895, 'Naseeb', 'Khamis', 'naseeb@gmail.com', '0626881232', 'Kokoni, Unguja', 'yesu', 'Farmer', '1683871762blue-rose.jpg'),
(17, 142091699, 'Osama', 'Sachu', 'osama.sachu@gmail.com', '0692559845', 'Kibada, Kigamboni', 'yesu', 'Customer', '1683879354istockphoto-1320620585-170667a.jpg'),
(18, 1321831711, 'Amiri', 'Mtunduu', 'amirisenge@gmail.com', '0653567752', 'Kimara, Suka', 'yesu', 'Farmer', '1683881087cupcakes-690040.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
