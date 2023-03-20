-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 08:52 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL DEFAULT 'Co-Admin',
  `code` varchar(200) NOT NULL,
  `status` varchar(11) NOT NULL DEFAULT 'Enabled',
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `role`, `code`, `status`, `date_created`) VALUES
(17, 'PetrenellaGarcia', 'garciapetrenella22@gmail.com', 'ee3e9f6f000bb378d92eff2faea88ae4', 'Admin', '', 'Disabled', '2022-03-22'),
(44, 'peth', 'garciapetrenella@gmail.com', 'ceb49c95dcf6cd8516ffbdc18f5cc39d', 'Co-Admin', 'da51f2bb43a91f25ef448729821f95b8', 'Enabled', '2022-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(1, 'Samsung'),
(2, 'Sony'),
(3, 'Motorola'),
(4, 'Xiaomi');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`) VALUES
(1, 'Computer Equipments'),
(2, 'Office Furniture'),
(3, 'Network Access'),
(4, 'Office Supply'),
(5, 'Cleaning Supply'),
(6, 'Other Equipments');

-- --------------------------------------------------------

--
-- Table structure for table `facility_area`
--

CREATE TABLE `facility_area` (
  `facility_id` int(11) NOT NULL,
  `facility_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `facility_area`
--

INSERT INTO `facility_area` (`facility_id`, `facility_name`) VALUES
(1, 'Lobby'),
(2, 'New Room'),
(3, 'Training Room'),
(4, 'Right Room'),
(5, 'Middle Room'),
(6, 'Left Room'),
(7, 'Pantry'),
(8, 'Comfort Room');

-- --------------------------------------------------------

--
-- Table structure for table `headphone`
--

CREATE TABLE `headphone` (
  `headphone_id` int(11) NOT NULL,
  `headphone_brand` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `h_photo` varchar(200) NOT NULL,
  `headphone_date` date NOT NULL,
  `year_created` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `headphone`
--

INSERT INTO `headphone` (`headphone_id`, `headphone_brand`, `status`, `h_photo`, `headphone_date`, `year_created`) VALUES
(1, 'headphone1', 'old', 'keyboard.jpg', '0000-00-00', 0000),
(2, 'headphone2', 'new', 'keyboard.jpg', '0000-00-00', 0000);

-- --------------------------------------------------------

--
-- Table structure for table `keyboard`
--

CREATE TABLE `keyboard` (
  `ID_Keyboard` int(11) NOT NULL,
  `keyboard_brand` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `k_photo` varchar(200) NOT NULL,
  `keyboard_date` date NOT NULL,
  `year_created` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keyboard`
--

INSERT INTO `keyboard` (`ID_Keyboard`, `keyboard_brand`, `status`, `k_photo`, `keyboard_date`, `year_created`) VALUES
(1, 'A4 Tech', 'old', 'mouse.jpg', '0000-00-00', 0000),
(2, 'INT', 'old', 'mouse.jpg', '0000-00-00', 0000);

-- --------------------------------------------------------

--
-- Table structure for table `monitor`
--

CREATE TABLE `monitor` (
  `ID_Monitor` int(11) NOT NULL,
  `Monitor_Brand` varchar(25) NOT NULL,
  `Status_Monitor` varchar(25) NOT NULL DEFAULT 'Available',
  `Cndt_monitor` varchar(10) NOT NULL,
  `m_photo` varchar(200) NOT NULL,
  `monitor_date` date NOT NULL,
  `year_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `monitor`
--

INSERT INTO `monitor` (`ID_Monitor`, `Monitor_Brand`, `Status_Monitor`, `Cndt_monitor`, `m_photo`, `monitor_date`, `year_created`) VALUES
(1, 'Dell', 'In-use', 'new', 'mouse.jpg', '0000-00-00', '0000-00-00'),
(2, 'Lenovo', 'In-use', 'old', 'mouse.jpg', '0000-00-00', '0000-00-00'),
(3, 'Asus', 'Available', 'New', 'keyboard.jpg', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `mouse`
--

CREATE TABLE `mouse` (
  `ID_Mouse` int(11) NOT NULL,
  `Mouse_Brand` varchar(25) NOT NULL,
  `Status_Mouse` varchar(25) NOT NULL,
  `Cndt_mouse` varchar(10) NOT NULL,
  `mo_photo` varchar(200) NOT NULL,
  `mouse_date` date NOT NULL,
  `year_created` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mouse`
--

INSERT INTO `mouse` (`ID_Mouse`, `Mouse_Brand`, `Status_Mouse`, `Cndt_mouse`, `mo_photo`, `mouse_date`, `year_created`) VALUES
(1, 'Zeus', 'In-use', 'new', 'mouse.jpg', '0000-00-00', 0000),
(2, 'A4 tech', 'In-use', 'old', 'mouse.jpg', '0000-00-00', 0000),
(3, 'Racks', 'Available', 'New', 'keyboard.jpg', '0000-00-00', 0000);

-- --------------------------------------------------------

--
-- Table structure for table `pc_info`
--

CREATE TABLE `pc_info` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(50) NOT NULL,
  `serial_id` varchar(50) NOT NULL,
  `facility_ID` int(11) NOT NULL,
  `cat_ID` int(11) NOT NULL,
  `monitor_ID` int(11) NOT NULL,
  `mouse_ID` int(11) NOT NULL,
  `keyboard_ID` int(11) NOT NULL,
  `ups_ID` int(11) NOT NULL,
  `headphone_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `date_inserted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pc_info`
--

INSERT INTO `pc_info` (`pc_id`, `pc_name`, `serial_id`, `facility_ID`, `cat_ID`, `monitor_ID`, `mouse_ID`, `keyboard_ID`, `ups_ID`, `headphone_ID`, `user_ID`, `date_inserted`) VALUES
(1, 'PC16', 'ABCD123', 4, 1, 1, 2, 1, 1, 1, 1, '2022-04-01'),
(2, 'PC17', 'XYZ0987', 6, 1, 2, 3, 2, 2, 2, 2, '2022-04-14'),
(5, 'PC99', 'LMNO4567', 1, 1, 3, 2, 1, 1, 1, 1, '2022-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `pc_user`
--

CREATE TABLE `pc_user` (
  `ID_User` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pc_user`
--

INSERT INTO `pc_user` (`ID_User`, `name`) VALUES
(1, 'Mel Martinez'),
(2, 'Pints Sampaga');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `brand_id`) VALUES
(1, 'Samsung Galaxy A9', 1),
(2, 'Samsung Galaxy S7', 1),
(3, 'Samsung Galaxy S6 edge', 1),
(4, 'Xperia Z5 Premium', 2),
(5, 'Xperia M5 Dual', 2),
(6, 'Xperia C5 uplta', 2),
(7, 'Moto G Turbo', 3),
(8, 'Moto X Force', 3),
(9, 'Redmi 3 Pro', 4),
(10, 'Mi 5', 4);

-- --------------------------------------------------------

--
-- Table structure for table `system_unit`
--

CREATE TABLE `system_unit` (
  `ID_SU` int(11) NOT NULL,
  `Name_Pc` varchar(25) NOT NULL,
  `SU_Brand` varchar(25) NOT NULL,
  `SU_Status` varchar(10) NOT NULL,
  `Cndt_su` varchar(10) NOT NULL,
  `s_photo` varchar(250) NOT NULL,
  `system_unit_date` date NOT NULL,
  `year_created` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_unit`
--

INSERT INTO `system_unit` (`ID_SU`, `Name_Pc`, `SU_Brand`, `SU_Status`, `Cndt_su`, `s_photo`, `system_unit_date`, `year_created`) VALUES
(1, 'Sample', 'sample', 'sample', 'sample', 'keyboard.jpg', '2022-06-01', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `ups`
--

CREATE TABLE `ups` (
  `ID_Ups` int(11) NOT NULL,
  `ups_brand` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `u_photo` varchar(200) NOT NULL,
  `ups_date` date NOT NULL,
  `year_created` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ups`
--

INSERT INTO `ups` (`ID_Ups`, `ups_brand`, `status`, `u_photo`, `ups_date`, `year_created`) VALUES
(1, 'Fortress', 'old', 'keyboard.jpg', '0000-00-00', 0000),
(2, 'Fortress', 'old', 'mouse.jpg', '0000-00-00', 0000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `facility_area`
--
ALTER TABLE `facility_area`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `headphone`
--
ALTER TABLE `headphone`
  ADD PRIMARY KEY (`headphone_id`);

--
-- Indexes for table `keyboard`
--
ALTER TABLE `keyboard`
  ADD PRIMARY KEY (`ID_Keyboard`);

--
-- Indexes for table `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`ID_Monitor`);

--
-- Indexes for table `mouse`
--
ALTER TABLE `mouse`
  ADD PRIMARY KEY (`ID_Mouse`);

--
-- Indexes for table `pc_info`
--
ALTER TABLE `pc_info`
  ADD PRIMARY KEY (`pc_id`),
  ADD KEY `cat_ID` (`cat_ID`),
  ADD KEY `facility_ID` (`facility_ID`),
  ADD KEY `headphone_ID` (`headphone_ID`),
  ADD KEY `keyboard_ID` (`keyboard_ID`),
  ADD KEY `monitor_ID` (`monitor_ID`),
  ADD KEY `mouse_ID` (`mouse_ID`),
  ADD KEY `ups_ID` (`ups_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `pc_user`
--
ALTER TABLE `pc_user`
  ADD PRIMARY KEY (`ID_User`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `system_unit`
--
ALTER TABLE `system_unit`
  ADD PRIMARY KEY (`ID_SU`);

--
-- Indexes for table `ups`
--
ALTER TABLE `ups`
  ADD PRIMARY KEY (`ID_Ups`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facility_area`
--
ALTER TABLE `facility_area`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `headphone`
--
ALTER TABLE `headphone`
  MODIFY `headphone_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keyboard`
--
ALTER TABLE `keyboard`
  MODIFY `ID_Keyboard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `monitor`
--
ALTER TABLE `monitor`
  MODIFY `ID_Monitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mouse`
--
ALTER TABLE `mouse`
  MODIFY `ID_Mouse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pc_info`
--
ALTER TABLE `pc_info`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pc_user`
--
ALTER TABLE `pc_user`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `system_unit`
--
ALTER TABLE `system_unit`
  MODIFY `ID_SU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ups`
--
ALTER TABLE `ups`
  MODIFY `ID_Ups` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pc_info`
--
ALTER TABLE `pc_info`
  ADD CONSTRAINT `pc_info_ibfk_1` FOREIGN KEY (`cat_ID`) REFERENCES `categories` (`cat_id`),
  ADD CONSTRAINT `pc_info_ibfk_2` FOREIGN KEY (`facility_ID`) REFERENCES `facility_area` (`facility_id`),
  ADD CONSTRAINT `pc_info_ibfk_3` FOREIGN KEY (`headphone_ID`) REFERENCES `headphone` (`headphone_id`),
  ADD CONSTRAINT `pc_info_ibfk_4` FOREIGN KEY (`keyboard_ID`) REFERENCES `keyboard` (`ID_Keyboard`),
  ADD CONSTRAINT `pc_info_ibfk_5` FOREIGN KEY (`monitor_ID`) REFERENCES `monitor` (`ID_Monitor`),
  ADD CONSTRAINT `pc_info_ibfk_6` FOREIGN KEY (`mouse_ID`) REFERENCES `mouse` (`ID_Mouse`),
  ADD CONSTRAINT `pc_info_ibfk_7` FOREIGN KEY (`ups_ID`) REFERENCES `ups` (`ID_Ups`),
  ADD CONSTRAINT `pc_info_ibfk_8` FOREIGN KEY (`user_ID`) REFERENCES `pc_user` (`ID_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
