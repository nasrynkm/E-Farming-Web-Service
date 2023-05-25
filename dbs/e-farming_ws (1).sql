-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 12:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
  `userRef` int(255) NOT NULL,
  `eventDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Category`, `Price`, `Quantity`, `StartLimit`, `Location`, `userRef`, `eventDate`) VALUES
(1, 'Carrots', 10000.00, 80.00, 1.00, 'Kibada, Dar', 1509690168, '2023-05-26 17:43:00'),
(3, 'Cinnamon', 20000.00, 140.00, 10.00, 'Kigale', 1509690168, NULL),
(4, 'Garlic', 20000.00, 140.00, 10.00, 'Kigale', 1509690168, NULL),
(8, 'Carrots', 13000.00, 90.00, 1.00, 'Kisarawe', 1000630109, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `uniqueID`, `firstName`, `lastName`, `email`, `phone`, `locationed`, `passwords`, `account`, `profilePhoto`) VALUES
(1, 1509690168, 'Nasry', 'Mansour', 'nasrynkm24@gmail.com', '0688897697', 'Kigoma, Ujiji', '3', 'Farmer', '1685004844IMG_0353.jpeg'),
(2, 34058016, 'Amir', 'Mtunduu', 'amir@gmail.com', '0653565298', 'Kimara', 'yesu', 'Customer', '1685004726IMG_0380.jpeg'),
(3, 1000630109, 'Osama', 'Sachu', 'osama.sachu@gmail.com', '0692569855', 'Kibada', 'yesu', 'Farmer', '1684500899IMG_0475.jpeg'),
(5, 808148428, 'Sandra', 'Stanley', 'sandra@hotmail.com', '0688897697', 'Irangi, Singida', '32', 'Farmer', '1684500198istockphoto-1373227608-170667a (1).jpg');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
