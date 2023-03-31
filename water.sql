-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 31, 2023 at 11:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `water`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` varchar(7) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `phoneNumber` varchar(10) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `usertype` varchar(15) NOT NULL,
  `userimage` varchar(150) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `firstname`, `middlename`, `lastname`, `username`, `phoneNumber`, `userpassword`, `usertype`, `userimage`, `status`) VALUES
('B000001', 'Hana', 'Hagos', 'Gebremeskel', 'Hani12', '0988757634', 'e787dafa363410e28a4ade2e56fa099a', 'customer', 'images10.png', 1),
('Emp0000', 'Jhon', 'Watson', 'Harli', 'Administrator', '0973842472', '520cbd9f0671078f77e6479051ca9c84', 'administrator', 'images10.png', 1),
('Emp0001', 'Micky', 'Miko', 'Mike', 'Mike@37', '0936172189', '5f4dcc3b5aa765d61d8327deb882cf99', 'administrator', 'water_pip.png', 1),
('Emp0002', 'Ragn', 'Rock', 'Ray', 'Rocky', '0937436999', '5f4dcc3b5aa765d61d8327deb882cf99', 'billofficer', 'bills.jpeg', 1),
('Emp0003', 'Khalid', 'Ali', 'Lewis', 'Kala&Ali', '0945453535', 'e787dafa363410e28a4ade2e56fa099a', 'meterreader', 'meter_reading.png', 1),
('Emp0005', 'James', 'Lie', 'Auzanous', 'James%%', '0956100190', '5f4dcc3b5aa765d61d8327deb882cf99', 'banker', 'home.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bankaccount`
--

CREATE TABLE `bankaccount` (
  `id` int(11) NOT NULL,
  `CustomerId` varchar(7) NOT NULL,
  `username` text NOT NULL,
  `bankname` varchar(45) NOT NULL,
  `accno` bigint(13) NOT NULL,
  `accounttype` varchar(15) NOT NULL,
  `balance` float(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bankaccount`
--

INSERT INTO `bankaccount` (`id`, `CustomerId`, `username`, `bankname`, `accno`, `accounttype`, `balance`) VALUES
(68, '_BWSSSE', 'BWSSSE', 'Burayu', 1000123456789, 'Organization', 101236.00),
(70, 'B000001', 'Hana12', 'Burayu', 1000363738394, 'Customer', 314.00);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(7) NOT NULL,
  `CustomerId` varchar(7) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `prev` float(30,2) NOT NULL,
  `pres` float(30,2) NOT NULL,
  `price` float(30,2) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` text NOT NULL,
  `paid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `CustomerId`, `firstname`, `middlename`, `lastname`, `prev`, `pres`, `price`, `date`, `status`, `paid`) VALUES
(66, 'B000001', 'Hana', 'Hagos', 'Gebremeskel', 21.00, 14.00, 201.60, '2023-03-19', 'Yes', 3),
(67, 'B000001', 'Hana', 'Hagos', 'Gebremeskel', 35.00, 7.00, 84.00, '2023-03-30', 'Yes', 3);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(30) NOT NULL,
  `UserId` varchar(7) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `comments` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerId` varchar(7) NOT NULL,
  `firstname` text DEFAULT NULL,
  `middlename` text NOT NULL,
  `lastname` text DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  `meterNumber` int(9) NOT NULL,
  `kebele` varchar(20) DEFAULT NULL,
  `houseNumber` varchar(10) NOT NULL,
  `phoneNumber` varchar(13) NOT NULL,
  `userImages` varchar(100) DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerId`, `firstname`, `middlename`, `lastname`, `username`, `userpassword`, `meterNumber`, `kebele`, `houseNumber`, `phoneNumber`, `userImages`, `status`) VALUES
('B000001', 'Hana', 'Hagos', 'Gebremeskel', 'Hani12', 'e787dafa363410e28a4ade2e56fa099a', 62452, 'Burqa Midhagdi', '6745', '0988757634', 'images10.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sentrecorded`
--

CREATE TABLE `sentrecorded` (
  `CustomerId` varchar(7) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `kebele` varchar(20) NOT NULL,
  `meterNumber` int(10) NOT NULL,
  `previous` int(20) NOT NULL,
  `present` int(20) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sentrecorded`
--

INSERT INTO `sentrecorded` (`CustomerId`, `firstname`, `middlename`, `lastname`, `kebele`, `meterNumber`, `previous`, `present`, `status`) VALUES
('B000001', 'Hana', 'Hagos', 'Gebremeskel', 'Burqa Midhagdi', 62452, 35, 7, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`username`);

--
-- Indexes for table `bankaccount`
--
ALTER TABLE `bankaccount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerId`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `phoneNumber` (`CustomerId`),
  ADD UNIQUE KEY `CustomerId` (`CustomerId`);

--
-- Indexes for table `sentrecorded`
--
ALTER TABLE `sentrecorded`
  ADD PRIMARY KEY (`CustomerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bankaccount`
--
ALTER TABLE `bankaccount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
