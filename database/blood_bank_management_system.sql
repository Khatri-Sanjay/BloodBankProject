-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2022 at 01:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int(11) NOT NULL,
  `Username` varchar(40) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Username`, `Password`, `Email`, `Contact`) VALUES
(1, 'Sanjay', 'dc647eb65e6711e155375218212b3964', 'khatrisanjay804@gmail.com', '9861494803'),
(2, 'Kisim', 'dc647eb65e6711e155375218212b3964', 'limbukisim@gmail.com', '9810051014');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `Id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Age` int(11) NOT NULL,
  `CitizenShip_No` varchar(255) NOT NULL,
  `BloodGroup` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 0,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`Id`, `Name`, `Email`, `Age`, `CitizenShip_No`, `BloodGroup`, `Gender`, `Contact`, `Address`, `Status`, `Message`) VALUES
(1, 'Sanjay khatri', 'khatrisanjay804@gmail.com', 21, '12345678', 'AB+ve', 'Male', '9861494803', 'Suryabinyak', 0, 'I want to donate blood\r\n'),
(2, 'Ram Jung Thapa', 'ramjungthapa@gmail.com', 34, '98782472', 'A+ve', 'Male', '9812334546', 'Banepa-9,Kavre', 0, 'I want to donate blood '),
(3, 'Arjun Bhusal', 'bhusalarjun123@gmail.com', 22, '1234567', 'A-ve', 'Male', '9871234560', 'Kapan, Kathmandu', 0, 'I want to donate blood'),
(4, 'Kisim Subba', 'limbukisim10@gmail.com', 21, '453721882', 'AB-ve', 'Female', '9810051014', 'Sukedhara, Kathmandu', 0, 'I want to donate blood'),
(5, 'Sita thapa', 'sitaramthapa@gmail.com', 30, '243453690', 'B-ve', 'Female', '9765231408', 'kathmandu', 0, 'I want to donate blood'),
(10, 'Sherya parajuli', 'parajulishreya@gmail.com', 25, '2345678', 'A-ve', 'Female', '9876543210', 'bhaktapur', 0, 'I want to donate blood'),
(12, 'Parbat Subedi', 'parbatsubedi000@gmail.com', 24, '12-334-76743', 'B+ve', 'Male', '9841505523', 'Kathmandu', 0, 'I want to donate blood'),
(13, 'Nelson Adhakari', 'adhakarinelson0@gmail.com', 21, '04-01-75-05901', 'B+ve', 'Male', '9808490677', 'Kathmandu', 0, 'I want to donate blood'),
(14, 'Nelson Mandela', 'mandelanelson01@gmail.com', 35, '05-230-65-3243', 'A+ve', 'Male', '9818293456', 'Kathmandu,Nepal', 0, 'I want to donate blood');

-- --------------------------------------------------------

--
-- Table structure for table `donorhistory`
--

CREATE TABLE `donorhistory` (
  `Id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Age` int(11) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `BloodGroup` varchar(10) NOT NULL,
  `History` int(11) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Address` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donorhistory`
--

INSERT INTO `donorhistory` (`Id`, `Name`, `Email`, `Age`, `Gender`, `BloodGroup`, `History`, `Contact`, `Address`) VALUES
(1, 'Sanjay khatri', 'khatrisanjay804@gmail.com', 45, 'Male', 'AB-ve', 3, '9861494803', 'Suryabinyak-9,Bhaktapur'),
(3, 'Roshan', 'roshanmgr130@gmail.com', 45, 'Male', 'A+ve', 3, '9812334546', 'Boudha-6, Ktm'),
(4, 'Sandesh Khatri', 'khatrisandesh12@gmail.com', 24, 'Male', 'A-ve', 2, '9812345678', 'Bhaktapur'),
(5, 'Shreya Parajuli', 'shreyaparajuli123@gmail.com', 25, 'Female', 'AB+ve', 4, '9818293030', 'Birtamode,Jhapa'),
(6, 'Sambridi Chaudary', 'chaudarysambridi59@gmail.com', 22, 'Female', 'O-ve', 1, '9842682332', 'kathmandu'),
(7, 'Kisim Subba', 'limbukisim890@gmail.com', 21, 'Female', 'A+ve', 2, '9818100510', 'Sukedhere, Kathmandu'),
(8, 'Nelson Adhakari', 'adhikarinelson@gmail.com', 21, 'Male', 'A-ve', 3, '9873456450', 'Kathmandu');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `Id` int(11) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Age` int(11) NOT NULL,
  `CitizenShip_No` varchar(255) NOT NULL,
  `BloodGroup` varchar(10) NOT NULL,
  `BloodPound` int(11) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Contact` varchar(10) NOT NULL,
  `Address` varchar(40) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 0,
  `Message` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`Id`, `Name`, `Email`, `Age`, `CitizenShip_No`, `BloodGroup`, `BloodPound`, `Gender`, `Contact`, `Address`, `Status`, `Message`) VALUES
(1, 'Sanjay khatri', 'khatrisanjay804@gmail.com', 21, '2345678', 'A+ve', 5, 'Male', '9861494803', 'Suryabinyak', 0, 'I need blood'),
(2, 'Kisim Subba', 'limbukisim10@gmail.com', 21, '453721882', 'AB+ve', 3, 'Female', '9810051014', 'Sukedhara, Kathmandu', 0, 'I need blood'),
(3, 'Ram Jung Thapa', 'ramjungthapa@gmail.com', 32, '453721882', 'AB-ve', 2, 'Male', '9812334546', 'Banepa-9, Kavre', 0, 'I need blood'),
(4, 'Maya Ranjitkar', 'www.mayaranjitkar@gmail.com', 20, '874558920', 'O-ve', 2, 'Female', '9876543210', 'Kamalbinak, Bhaktapur', 0, 'I need blood'),
(29, 'Sanjay khatri', 'khatrisanjay805@gmail.com', 22, '1234567890', 'B+ve', 5, 'Male', '9861494803', 'Kathmandu', 0, 'I want blood'),
(34, 'Roshan Magar', 'roshanmgr130@gmail.com', 26, '1234567', 'A-ve', 2, 'Male', '9861494803', 'Kathmandu', 0, 'I want blood immedietly'),
(35, 'Parbat Subedi', 'parbatsubedi000@gmail.com', 21, '45-345-3847', 'A-ve', 2, 'Male', '9843505523', 'Kathmandu', 0, 'I want blood');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `donorhistory`
--
ALTER TABLE `donorhistory`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `donorhistory`
--
ALTER TABLE `donorhistory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
