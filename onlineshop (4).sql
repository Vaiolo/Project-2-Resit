-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 01:29 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(255) NOT NULL,
  `CategoryDescr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`, `CategoryDescr`) VALUES
(1, 'Something', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Dateoftheorder` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `UserID`, `Dateoftheorder`) VALUES
(1, 4, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrack`
--

CREATE TABLE `ordertrack` (
  `HistoryID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordertrack`
--

INSERT INTO `ordertrack` (`HistoryID`, `OrderID`, `Date`, `Status`) VALUES
(4, 1, '2022-03-04', 'Packed');

-- --------------------------------------------------------

--
-- Table structure for table `order_row`
--

CREATE TABLE `order_row` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Category_ID` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Availability` int(11) DEFAULT NULL,
  `product_image` varchar(255) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `discount_percent` int(11) NOT NULL,
  `discount_due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart_row`
--

CREATE TABLE `shoppingcart_row` (
  `CartID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Dateoftheorder` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `AccountType` varchar(255) NOT NULL,
  `DateofBirth` date NOT NULL,
  `Feedback` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `Email`, `Password`, `Address`, `City`, `Country`, `AccountType`, `DateofBirth`, `Feedback`) VALUES
(1, 'Violetta', 'Fazzi', 'violettafazzi@gmail.com', '$2y$10$1nkVzlfhpNYs6DI3LU4EI.MCa5c2UumlEjirOjHPKTaw5braNdIxK', 'Via Angelo Mangani', 'Viterbo', 'Italia', 'User', '2002-05-07', NULL),
(2, 'Violetta', 'Fazzi', 'kimt070502@gmail.com', '$2y$10$XV9rSZ1mA1GvTgSBfJp6tOVZIfB61qrMBO1wRUNbeFxXApd1JNxEW', 'Via Angelo Mangani', 'Viterbo', 'Italia', 'Admin', '2002-05-07', NULL),
(4, 'Violetta', 'Fazzi', 'bequadro@libero.it', '$2y$10$q39VPBrbXVct0VOzVvxrRulnQhG6vhE2OWkKCVc52AN8DpA/f9Rwa', 'Via Angelo Mangani', 'Viterbo', 'Italia', 'User', '2002-05-07', NULL),
(7, 'Violetta', 'Fazzi', 'mikafreak02@gmail.com', '$2y$10$kwIm4eDnOJUNzBDxNrFBV.gJDPvx5QrqWVJE.Fyb7V.NN435lYunO', 'Via Angelo Mangani', 'Viterbo', 'Italia', 'User', '2002-05-07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `fk2_UserID` (`UserID`);

--
-- Indexes for table `ordertrack`
--
ALTER TABLE `ordertrack`
  ADD PRIMARY KEY (`HistoryID`),
  ADD KEY `fk_OrderID` (`OrderID`);

--
-- Indexes for table `order_row`
--
ALTER TABLE `order_row`
  ADD KEY `fk1_OrderID` (`OrderID`),
  ADD KEY `fk1_ProductID` (`ProductID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `shoppingcart_row`
--
ALTER TABLE `shoppingcart_row`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `fk1_UserID` (`UserID`),
  ADD KEY `fk2_ProductID` (`ProductID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ordertrack`
--
ALTER TABLE `ordertrack`
  MODIFY `HistoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shoppingcart_row`
--
ALTER TABLE `shoppingcart_row`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk2_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ordertrack`
--
ALTER TABLE `ordertrack`
  ADD CONSTRAINT `fk_OrderID` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_row`
--
ALTER TABLE `order_row`
  ADD CONSTRAINT `fk1_OrderID` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk1_ProductID` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shoppingcart_row`
--
ALTER TABLE `shoppingcart_row`
  ADD CONSTRAINT `fk1_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2_ProductID` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
