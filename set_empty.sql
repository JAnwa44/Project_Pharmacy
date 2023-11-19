-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2022 at 06:01 PM
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
-- Database: `pharmacy`
--
CREATE DATABASE IF NOT EXISTS `main_pharmacy` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `main_pharmacy`;

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `Brand_ID` int(11) NOT NULL,
  `Brand_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cate_ID` int(11) NOT NULL,
  `Cate_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `No` int(11) NOT NULL,
  `Emp_Name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Emp_Lname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Created` text CHARACTER SET utf8 DEFAULT NULL,
  `Emp_Phone` int(10) NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `His_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee_history`
--

CREATE TABLE `employee_history` (
  `His_ID` int(11) NOT NULL,
  `Emp_Username` varchar(255) NOT NULL,
  `Emp_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Emp_Lname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Emp_Address` text CHARACTER SET utf8 DEFAULT NULL,
  `Emp_Phone` varchar(10) NOT NULL,
  `EmpID_Card` varchar(13) CHARACTER SET utf8 NOT NULL,
  `Emp_Date_Start` date DEFAULT NULL,
  `Emp_Date_Off` date DEFAULT NULL,
  `Created` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `No` int(11) NOT NULL,
  `Pro_ID` varchar(255) NOT NULL,
  `Cate_ID` int(11) DEFAULT NULL,
  `Unit_ID` int(11) DEFAULT NULL,
  `Brand_ID` int(11) DEFAULT NULL,
  `Pro_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Brand_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `Price` int(255) DEFAULT NULL,
  `Quantity` int(255) DEFAULT NULL,
  `Pro_EXP` date NOT NULL,
  `Pro_MFG` date NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `No` int(11) NOT NULL,
  `Date_sale` date NOT NULL,
  `Name_seler` varchar(255) NOT NULL,
  `Name_medicine` varchar(255) NOT NULL,
  `ID_production` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `List_seler` varchar(255) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sale_data`
--

CREATE TABLE `sale_data` (
  `No` int(11) NOT NULL,
  `Date_sale` date NOT NULL,
  `Time_sale` time NOT NULL,
  `Name_seler` varchar(255) NOT NULL,
  `Name_medicine` varchar(255) NOT NULL,
  `ID_production` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Unit_name` varchar(255) NOT NULL,
  `Category_name` varchar(255) NOT NULL,
  `List_seler` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `temporary_sale`
--

CREATE TABLE `temporary_sale` (
  `No` int(11) NOT NULL,
  `Date_sale` date NOT NULL,
  `Time_sale` time NOT NULL,
  `Name_seler` varchar(255) NOT NULL,
  `Name_medicine` varchar(255) NOT NULL,
  `ID_production` varchar(255) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Unit_name` varchar(255) NOT NULL,
  `Category_name` varchar(255) NOT NULL,
  `List_seler` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `Unit_ID` int(11) NOT NULL,
  `Unit_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`Brand_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cate_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `employee_history`
--
ALTER TABLE `employee_history`
  ADD PRIMARY KEY (`His_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `sale_data`
--
ALTER TABLE `sale_data`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `temporary_sale`
--
ALTER TABLE `temporary_sale`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`Unit_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `Brand_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cate_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employee_history`
--
ALTER TABLE `employee_history`
  MODIFY `His_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sale_data`
--
ALTER TABLE `sale_data`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `temporary_sale`
--
ALTER TABLE `temporary_sale`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `Unit_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
