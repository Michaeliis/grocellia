-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2018 at 12:41 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocellia`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custId` int(11) NOT NULL,
  `custUsername` varchar(50) NOT NULL,
  `custPassword` varchar(50) NOT NULL,
  `custName` text NOT NULL,
  `custAddress` varchar(50) NOT NULL,
  `custPhone` text NOT NULL,
  `custEmail` varchar(50) NOT NULL,
  `custStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custId`, `custUsername`, `custPassword`, `custName`, `custAddress`, `custPhone`, `custEmail`, `custStatus`) VALUES
(1, 'Testing', '827ccb0eea8a706c4c34a16891f84e7b', 'John Tesdoe', 'UPH', '08926412658', 'JohnDong@uph.edu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `grocery`
--

CREATE TABLE `grocery` (
  `grocId` int(11) NOT NULL,
  `grocName` varchar(50) NOT NULL,
  `grocPrice` int(11) NOT NULL,
  `grocImage` text NOT NULL,
  `promoId` int(11) NOT NULL,
  `grocStatus` int(11) NOT NULL,
  `grocDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grocery`
--

INSERT INTO `grocery` (`grocId`, `grocName`, `grocPrice`, `grocImage`, `promoId`, `grocStatus`, `grocDesc`) VALUES
(0, 'asd', 100000, 'Clarisse.jpg', 0, 1, ''),
(2, 'yeet', 50000, '1470930.gif', 0, 1, 'feujeuifsiduhfuiehiufnsuidh uifsheuifw uidfuiwefuiwd uifhdiufsixuihcuih uiwiuefnuidnuid n fiuwneuifnwu iefnuwehruownefefsdfwe fwfiwbfinweiufweuifdiuvnduinsiufnuisd fuiseufuifnwuiefnuwehruownefefsdfwefwfiw bfinweiufweuifdiuvnduinsiufnuisdfuiseufuifnwuiefnuwehr uownefefsdfwefwfiwbfinweiufweuif diuvnduinsiufnuisdfuiseufuifnwuiefnuwe hruowne fefsdfwefw fiwbfinwe iufweuifdiuvnduinsi ufnuisdfuiseuf'),
(3, 'asd', 2, 'pepe.jpg', 1, 1, ''),
(4, '3123', 0, 'tumblr_oon1bl5FYR1u41b03o1_1280.png', 0, 0, ''),
(5, '12', 3, 'pepe.jpg', 2, 0, ''),
(6, '34', 234, 'pepe.jpg', 234, 0, ''),
(7, '32', 123123, '21151493_10100644934408757_54374742927706012_n.jpg', 0, 1, ''),
(8, '321', 1231231, 'pepe.jpg', 123, 1, ''),
(9, '423', 234, 'pepe.jpg', 234, 0, ''),
(10, '23', 342, 'pepe.jpg', 234, 0, ''),
(11, '4123', 123, 'pepe.jpg', 123, 1, ''),
(12, '123', 4124, 'pepe.jpg', 123, 0, ''),
(13, 'ewr', 0, 'pepe.jpg', 0, 0, ''),
(14, '234', 234, 'pepe.jpg', 234, 1, ''),
(15, '234', 234, 'Untitled-2.jpg', 234, 1, ''),
(18, '123', 123, 'pepe.jpg', 123, 0, ''),
(19, '234', 123, '2qRD7RowrYTK7oMTSqhhBnUXbKfLORYwbHCkePV_200.jpg', 123, 1, ''),
(20, '123', 123, '1470930.gif', 0, 0, '123'),
(21, '12312312', 123123, '19756564_1553904504656217_5010185942141202847_n.jpg', 123123, 1, '12312312'),
(22, '12312', 123123, 'Noctis and Luna.jpg', 123, 1, '12312'),
(23, '789', 789, 'Clarisse2.jpg', 78978, 1, '789'),
(24, '67', 8678, 'Clarisse2.jpg', 86786, 1, '6786'),
(25, '789', 9789, 'Clarisse2.jpg', 7897, 1, '7897'),
(26, '90', 789, 'Clarisse2.jpg', 7897, 1, '789'),
(27, '890', 89089, 'Clarisse2.jpg', 89080, 1, '89089'),
(28, '2456', 6546, 'Clarisse2.jpg', 45645, 1, '45646'),
(29, '789', 79, 'Clarisse2.jpg', 78, 1, '789'),
(30, '2', 2, 'Clarisse2.jpg', 2, 1, '2'),
(31, '45', 456, 'Clarisse2.jpg', 456, 1, '456'),
(32, 'ERT', 456, 'Clarisse2.jpg', 456, 1, '456'),
(33, '90', 9, 'Clarisse2.jpg', 9, 1, '9'),
(34, '345', 345, 'Clarisse2.jpg', 354535, 1, '3453'),
(35, '43543', 345, 'Clarisse2.jpg', 3453, 1, '35'),
(36, '456', 456, 'Clarisse2.jpg', 45654, 1, '465'),
(37, '345', 345, 'Clarisse2.jpg', 345, 1, '3453'),
(38, '7567', 567, 'Clarisse2.jpg', 756765, 1, '56756'),
(39, '7567', 7567, 'Clarisse2.jpg', 7567657, 1, '56765'),
(40, '45654', 456, 'Clarisse2.jpg', 645654, 1, '4564'),
(41, '456', 456, 'Clarisse2.jpg', 4564, 1, '465'),
(42, '89', 89, 'Clarisse2.jpg', 89, 1, '89'),
(43, '75', 6456, 'Clarisse2.jpg', 6456456, 1, '45645'),
(44, '345', 345, 'Clarisse2.jpg', 34543, 1, '35'),
(45, '234', 234, 'Clarisse2.jpg', 23423, 1, '234'),
(46, '8', 8, 'Clarisse2.jpg', 8, 1, '8'),
(47, '789', 68, 'Clarisse2.jpg', 687, 1, ''),
(48, '345', 345, 'Clarisse2.jpg', 53454, 1, '3534');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` int(11) NOT NULL,
  `staffUsername` varchar(50) NOT NULL,
  `staffPassword` varchar(50) NOT NULL,
  `staffName` text NOT NULL,
  `staffAddress` varchar(50) NOT NULL,
  `staffPhone` text NOT NULL,
  `staffEmail` varchar(50) NOT NULL,
  `staffPosition` text NOT NULL,
  `staffStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `staffUsername`, `staffPassword`, `staffName`, `staffAddress`, `staffPhone`, `staffEmail`, `staffPosition`, `staffStatus`) VALUES
(1, '123', '4297f44b13955235245b2497399d7a93', 'asd', '1241231', '12312', '124124@3un3.erf', 'efewfwefwef', 1),
(2, 'JEJEJE', '0cb3ae0ef4794df6d5bdf3b2b75334b6', 'test', '12312412412413', '765435676', 'afsedsfy@uph.edu', 'fewdzxc', 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `suppId` int(11) NOT NULL,
  `suppUsername` varchar(50) NOT NULL,
  `suppPassword` varchar(50) NOT NULL,
  `suppName` text NOT NULL,
  `suppAddress` varchar(50) NOT NULL,
  `suppPhone` text NOT NULL,
  `suppEmail` varchar(50) NOT NULL,
  `suppStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`suppId`, `suppUsername`, `suppPassword`, `suppName`, `suppAddress`, `suppPhone`, `suppEmail`, `suppStatus`) VALUES
(1, 'JoelNatan', '827ccb0eea8a706c4c34a16891f84e7b', 'Joel', 'asd', '123531', '3edwds@aere.edu', 1),
(2, 'gerf', 'c847cb885fd28e9b6f7298d2fbe43852', 'rhnrfggb', 'owo apa ini', '1324123', 'gerfe@aef.efu', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custId`);

--
-- Indexes for table `grocery`
--
ALTER TABLE `grocery`
  ADD PRIMARY KEY (`grocId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`suppId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grocery`
--
ALTER TABLE `grocery`
  MODIFY `grocId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `suppId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
