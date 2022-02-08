-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 08, 2022 alle 22:23
-- Versione del server: 10.4.20-MariaDB
-- Versione PHP: 8.0.9

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
-- Struttura della tabella `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `CategoryName` varchar(255) DEFAULT NULL,
  `CategoryDescr` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `discount`
--

CREATE TABLE `discount` (
  `DiscountID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `StartDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `Percentage` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `image`
--

CREATE TABLE `image` (
  `ImageID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `ImageType` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Dateoftheorder` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordertrack`
--

CREATE TABLE `ordertrack` (
  `HistoryID` int(11) NOT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `StatusID` int(11) DEFAULT NULL,
  `Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `order_row`
--

CREATE TABLE `order_row` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Company` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Availability` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `shoppingcart_row`
--

CREATE TABLE `shoppingcart_row` (
  `CartID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `Dateoftheorder` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `status`
--

CREATE TABLE `status` (
  `StatusID` int(11) NOT NULL,
  `Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `AccountType` int(11) DEFAULT NULL,
  `DateofBirth` date DEFAULT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`),
  ADD KEY `fk_ProductID` (`ProductID`);

--
-- Indici per le tabelle `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`DiscountID`),
  ADD KEY `fk1_productID` (`ProductID`);

--
-- Indici per le tabelle `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`ImageID`),
  ADD KEY `fk3_ProductID` (`ProductID`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `fk5_ProductID` (`ProductID`),
  ADD KEY `fk1_UserID` (`UserID`);

--
-- Indici per le tabelle `ordertrack`
--
ALTER TABLE `ordertrack`
  ADD PRIMARY KEY (`HistoryID`),
  ADD KEY `fk_orderID` (`OrderID`),
  ADD KEY `fk_StatusID` (`StatusID`);

--
-- Indici per le tabelle `order_row`
--
ALTER TABLE `order_row`
  ADD KEY `fk1_orderID` (`OrderID`),
  ADD KEY `fk4_ProductID` (`ProductID`);

--
-- Indici per le tabelle `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indici per le tabelle `shoppingcart_row`
--
ALTER TABLE `shoppingcart_row`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `fk2_productID` (`ProductID`),
  ADD KEY `fk_UserID` (`UserID`);

--
-- Indici per le tabelle `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `category`
--
ALTER TABLE `category`
  MODIFY `CategoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `image`
--
ALTER TABLE `image`
  MODIFY `ImageID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `fk_ProductID` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Limiti per la tabella `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `fk1_productID` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Limiti per la tabella `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `fk3_ProductID` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Limiti per la tabella `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk1_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `fk5_ProductID` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Limiti per la tabella `ordertrack`
--
ALTER TABLE `ordertrack`
  ADD CONSTRAINT `fk_StatusID` FOREIGN KEY (`StatusID`) REFERENCES `status` (`StatusID`),
  ADD CONSTRAINT `fk_orderID` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Limiti per la tabella `order_row`
--
ALTER TABLE `order_row`
  ADD CONSTRAINT `fk1_orderID` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`ORDERID`),
  ADD CONSTRAINT `fk4_ProductID` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`);

--
-- Limiti per la tabella `shoppingcart_row`
--
ALTER TABLE `shoppingcart_row`
  ADD CONSTRAINT `fk2_productID` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `fk_UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
