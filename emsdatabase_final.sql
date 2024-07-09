-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 06, 2024 at 12:45 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emsdatabase_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountdetails`
--

DROP TABLE IF EXISTS `accountdetails`;
CREATE TABLE IF NOT EXISTS `accountdetails` (
  `Acc_ID` int NOT NULL AUTO_INCREMENT,
  `Acc_No` decimal(20,0) DEFAULT NULL,
  `Branch` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Bank_ID` int DEFAULT NULL,
  `EMP_ID` int DEFAULT NULL,
  PRIMARY KEY (`Acc_ID`),
  KEY `EMP_ID` (`EMP_ID`),
  KEY `Bank_ID` (`Bank_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accountdetails`
--

INSERT INTO `accountdetails` (`Acc_ID`, `Acc_No`, `Branch`, `Bank_ID`, `EMP_ID`) VALUES
(1, '201200110017666', NULL, 1, 1),
(2, '207200165900279', NULL, 1, 2),
(3, '2620012569845', NULL, 1, NULL),
(4, '8090002486', NULL, 14, NULL),
(5, '2678954621', NULL, 14, NULL),
(6, '2678954621', NULL, 31, NULL),
(7, '8080006357', NULL, 1, 9),
(8, '8080006359', NULL, 10, 10),
(9, '262000536985', NULL, 27, 11),
(10, '262000568456', NULL, 27, 20),
(11, '2620025689', NULL, 27, 21),
(19, '26200345632', 'Anuradhapura', 27, 30);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `A_ID` int NOT NULL,
  `Date` date DEFAULT NULL,
  `Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Arrival_time` time DEFAULT NULL,
  `Leave_time` time DEFAULT NULL,
  `report_ID` int DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_ID` int DEFAULT NULL,
  PRIMARY KEY (`A_ID`),
  KEY `report_ID` (`report_ID`),
  KEY `EMP_ID` (`EMP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`A_ID`, `Date`, `Name`, `Arrival_time`, `Leave_time`, `report_ID`, `status`, `EMP_ID`) VALUES
(1, '2024-05-02', 'Wimala', '08:00:00', '04:00:00', 4, 'Present', 10),
(2, '2024-05-02', 'Anoma', '08:01:00', '04:00:00', 4, 'Present', 11),
(3, '2024-05-02', 'Kamala', '08:00:00', '04:00:00', 4, 'Present', 18),
(4, '2024-05-03', 'Kamala', '08:00:00', '04:00:00', 4, 'Present', 18);

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

DROP TABLE IF EXISTS `bankdetails`;
CREATE TABLE IF NOT EXISTS `bankdetails` (
  `Bank_ID` int NOT NULL AUTO_INCREMENT,
  `Bank_Name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Bank_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`Bank_ID`, `Bank_Name`) VALUES
(1, 'Amana Bank PLC'),
(2, 'Asia Asset Finance PLC'),
(3, 'Axis Bank'),
(4, 'Bank of Ceylon'),
(5, 'Cargills Bank limited'),
(6, 'ICICI Bank Ltd'),
(7, 'Central Finance PLC'),
(8, 'Citi Bank'),
(9, 'Citizen Development Business Finance PLC'),
(10, 'Commercial Bank PLC'),
(11, 'Commercial Credit & Finance PLC'),
(12, 'Commercial Leasing and Finance'),
(13, 'Deutsche Bank'),
(14, 'DFCC Bank PLC'),
(15, 'Dialog Finance PLC'),
(16, 'Fintrex Finance Limited'),
(17, 'Habib Bank Ltd'),
(18, 'Hatton National Bank PLC'),
(19, 'HDFC Bank'),
(20, 'Lanka Orix Finance PLC'),
(21, 'LB Finance PLC'),
(22, 'MCB Bank'),
(23, 'National Development Bank PLC'),
(24, 'National Savings Bank'),
(25, 'Nations Trust Bank PLC'),
(26, 'Pan Asia Banking Cooporation PLC'),
(27, 'Peoples Bank'),
(28, 'Peoples Leasing $ Finance PLC'),
(29, 'Regional Development Bank'),
(30, 'Richard Pieris Finance PLC'),
(31, 'Sampath Bank PLC'),
(32, 'Sanasa Development Bank'),
(33, 'Sarvodaya Development Finance'),
(34, 'Seylan Bank PLC'),
(35, 'Sri Lanka Operations Public Bank'),
(36, 'No bank selected');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `EMP_ID` int NOT NULL AUTO_INCREMENT,
  `Member_No` int NOT NULL,
  `F_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `L_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NIC` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile` int DEFAULT NULL,
  `Gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Position_ID` int DEFAULT NULL,
  `work_ID` int DEFAULT NULL,
  `Pay_ID` int DEFAULT NULL,
  `Bank_ID` int DEFAULT NULL,
  PRIMARY KEY (`EMP_ID`),
  KEY `Pay_ID` (`Pay_ID`),
  KEY `Position_ID` (`Position_ID`),
  KEY `work_ID` (`work_ID`),
  KEY `Bank_ID` (`Bank_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `Member_No`, `F_name`, `L_name`, `NIC`, `Mobile`, `Gender`, `Address`, `DOB`, `Position_ID`, `work_ID`, `Pay_ID`, `Bank_ID`) VALUES
(1, 201, 'K.G.H', 'Ramyalatha', '746211520V', 76359659, 'Female', 'Mathale', '1974-02-02', 3, 1, 1, NULL),
(2, 93, 'B.D', 'Abekon Banda', '196723501570', 712365699, 'Male', 'Kurunegala', '1967-03-03', 2, 6, 1, NULL),
(7, 205, 'Kamalawathi', 'Piris', '959542681V', 778542361, 'Male', 'Kurunegala', '1995-12-12', 1, 8, 2, NULL),
(9, 320, 'Wimal', 'K.D.P', '199825631254', 776934187, 'Male', 'Trincomalee', '1998-01-15', 2, 8, 1, NULL),
(10, 321, 'Wimala', 'K.D.H.U.P', '199825631253', 774564522, 'Female', 'Trincomalee', '1999-05-07', 1, 8, 2, 10),
(11, 300, 'Anoma', 'Pathirana', '636082923V', 772365448, 'Female', 'Trincomalee', '1963-05-12', 2, 8, 2, 27),
(18, 111, 'kamala', 'Perera', '622565238V', 715695363, 'Female', 'Kurunegala', '1962-12-12', 1, 6, 1, 36),
(19, 1, 'S.E.', 'Himali', '742563472V', 772646654, 'Female', '37 1/2, Mile post, Anuradhapura', '1974-09-04', 4, 1, 3, 36),
(20, 298, 'Sisira ', 'Kumara', '616082923V', 713490919, 'Male', 'Kurunegala', '1961-09-03', 1, 6, 2, 27),
(21, 222, 'Anula', 'piris', '613686254V', 713496256, 'Female', 'Anuradhapura', '1996-02-04', 2, 5, 2, 27),
(30, 210, 'Danuki', 'amaya', '635695632V', 763696885, 'Male', 'Anuradhapura', '1963-01-02', 2, NULL, 2, 27);

-- --------------------------------------------------------

--
-- Table structure for table `emp_leaves`
--

DROP TABLE IF EXISTS `emp_leaves`;
CREATE TABLE IF NOT EXISTS `emp_leaves` (
  `leave_id` int NOT NULL AUTO_INCREMENT,
  `EMP_ID` int DEFAULT NULL,
  `leave_type` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `leave_duration` enum('Half Day','Full Day') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Position_id` int DEFAULT NULL,
  PRIMARY KEY (`leave_id`),
  KEY `Position_id` (`Position_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `emp_leaves`
--

INSERT INTO `emp_leaves` (`leave_id`, `EMP_ID`, `leave_type`, `from_date`, `to_date`, `leave_duration`, `notes`, `submission_date`, `Position_id`) VALUES
(1, 1, 'Sick Leave', '2024-05-01', '2024-05-03', 'Full Day', 'asd', '2024-05-20 02:03:29', 3),
(3, 9, 'Sick Leave', '2024-05-04', '2024-05-05', 'Full Day', 'Sick', '2024-05-04 11:43:12', 2),
(7, 11, 'Sick Leave', '2024-05-04', '2024-05-04', 'Half Day', 'Half Day', '2024-05-04 12:01:16', 1),
(8, NULL, 'Sick Leave', '2024-06-04', '2024-06-07', 'Half Day', 'no note', '2024-06-02 12:30:08', 0),
(9, NULL, 'Sick Leave', '2024-06-10', '2024-06-12', 'Full Day', 'ABC note', '2024-06-02 12:32:18', 0),
(10, NULL, 'Sick Leave', '2024-06-17', '2024-06-19', 'Half Day', 'hi hi hi.....', '2024-06-02 12:36:04', 1),
(11, NULL, NULL, '2024-06-04', '2024-06-18', 'Half Day', 'fgfdg', '2024-06-02 12:41:28', 1),
(12, NULL, 'Sick Leave', '2024-06-04', '2024-06-18', 'Half Day', 'gdg', '2024-06-02 12:41:51', 1),
(13, 14, 'k', '2024-06-11', '2024-06-21', 'Half Day', 'hfhc', '2024-06-02 15:32:43', 45),
(14, 10, 'Sick Leave', '2024-06-01', '2024-06-04', 'Half Day', '147', '2024-06-02 15:35:00', 1),
(15, 10, 'Sick Leave', '2024-06-03', '2024-06-04', 'Full Day', 'dfbzsnfddb', '2024-06-02 15:35:55', 1),
(16, 10, 'Sick Leave', '2024-06-04', '2024-06-05', 'Half Day', 'hfh', '2024-06-02 15:41:38', 1),
(17, 10, 'Sick Leave', '2024-06-04', '2024-06-05', 'Half Day', '', '2024-06-02 15:44:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--


-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
CREATE TABLE IF NOT EXISTS `leaves` (
  `L_ID` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` int DEFAULT NULL,
  PRIMARY KEY (`L_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`L_ID`, `description`, `count`) VALUES
('L12', 'Sick Leave', 3),
('L13', 'casual leave', 2),
('L14', 'Sick Leave', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paymethod`
--

DROP TABLE IF EXISTS `paymethod`;
CREATE TABLE IF NOT EXISTS `paymethod` (
  `Pay_ID` int NOT NULL,
  `Pay_method` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Pay_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paymethod`
--

INSERT INTO `paymethod` (`Pay_ID`, `Pay_method`) VALUES
(1, 'By Cash'),
(2, 'By Deposit'),
(3, 'None');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

DROP TABLE IF EXISTS `payroll`;
CREATE TABLE IF NOT EXISTS `payroll` (
  `id` int NOT NULL AUTO_INCREMENT,
  `EMP_ID` int DEFAULT NULL,
  `total_working_days` int DEFAULT NULL,
  `total_deduction` decimal(10,2) DEFAULT NULL,
  `other_earnings` decimal(10,2) DEFAULT NULL,
  `tax_amount` decimal(10,2) DEFAULT NULL,
  `net_salary` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `EMP_ID` (`EMP_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `EMP_ID`, `total_working_days`, `total_deduction`, `other_earnings`, `tax_amount`, `net_salary`, `created_at`) VALUES
(2, 10, 0, '455.00', '789.00', '22.00', '312.00', '2024-06-08 22:38:33'),
(3, 11, 29, '2.00', '1.00', '5.00', '21744.00', '2024-06-08 22:39:36'),
(4, 10, 29, '200.00', '1500.00', '100.00', '30200.00', '2024-06-09 00:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `payrollsheet`
--

DROP TABLE IF EXISTS `payrollsheet`;
CREATE TABLE IF NOT EXISTS `payrollsheet` (
  `id` int NOT NULL,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrollsheet`
--

INSERT INTO `payrollsheet` (`id`, `title`, `from_date`, `to_date`, `create_at`, `update_at`) VALUES
(2406, 'hi hi', '2024-06-01', '2024-06-20', '2024-06-06 06:50:02', '2024-06-06 06:50:02'),
(2301, 'abc', '2024-06-01', '2024-06-30', '2024-06-06 11:03:35', '2024-06-06 11:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `Position_ID` int NOT NULL,
  `Position_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`Position_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`Position_ID`, `Position_name`, `salary`) VALUES
(1, 'Supervisor', '1000.00'),
(2, 'Labour', '750.00'),
(3, 'Accountant', '900.00'),
(4, 'Admin', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

DROP TABLE IF EXISTS `report`;
CREATE TABLE IF NOT EXISTS `report` (
  `report_ID` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  PRIMARY KEY (`report_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_ID`, `name`, `issue_date`) VALUES
(1, 'Surface Cleaning Tools Report', '2022-12-31'),
(2, 'Floor Cleaning Tools Report', '2022-11-30'),
(3, 'Salary', '2023-01-31'),
(4, 'Attendance', '2023-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_ID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_ID` int DEFAULT NULL,
  PRIMARY KEY (`user_ID`),
  KEY `user_ibfk_1` (`EMP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `UserName`, `Password`, `EMP_ID`) VALUES
('1', 'Admin1', 'Admin1', 19),
('', 'wimala11', '456', 9),
('2', '1', '1', 11);

-- --------------------------------------------------------

--
-- Table structure for table `workplace`
--

DROP TABLE IF EXISTS `workplace`;
CREATE TABLE IF NOT EXISTS `workplace` (
  `work_ID` int NOT NULL AUTO_INCREMENT,
  `Work_Address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Work_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `No_of_workers` int NOT NULL,
  `Person_in_charge_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Person_in_charge_telephone` int DEFAULT NULL,
  PRIMARY KEY (`work_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workplace`
--

INSERT INTO `workplace` (`work_ID`, `Work_Address`, `Work_name`, `No_of_workers`, `Person_in_charge_name`, `Person_in_charge_telephone`) VALUES
(1, 'Anuradhapura Town', 'Main Branch', 0, 'H.E.Himali', 713490948),
(2, 'Main street, Matale', 'Telecom - Mathale', 0, 'K.Siriwardhana', 777885263),
(4, 'Hospital Road, Mannar', 'CEB - Mannar', 0, NULL, NULL),
(5, '249 B, Rex Building, Main St, Anuradhapura', 'Toyota - Anuradhapura', 0, NULL, NULL),
(6, 'Kandy Road, Kurunegala', 'Telecom - Kurunegala', 0, NULL, NULL),
(7, 'Thisa wewa, Anuradhapura', 'Water board - Thisa wewa', 0, NULL, NULL),
(8, 'Inner harbour Road, Trincomalee', 'Telecom - Trincomalee', 15, 'K.Amala', 715623856),
(9, 'Naddukka, Mannar', 'Thambapavani Wind farm - Mannar', 0, 'K.G.Piris', 715263859),
(10, 'Town Road, Anuradhapura', 'Telecom - Anuradhapura', 10, 'A.M.Dayan', 772226445);
COMMIT;

-----------------Inventory----------------------



DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
    Tool_ID INT AUTO_INCREMENT PRIMARY KEY,
    Tool_name VARCHAR(100) DEFAULT NULL,
    Price DOUBLE DEFAULT NULL,
    Quantity INT DEFAULT NULL,
    purchase_date DATE DEFAULT NULL,
    report_ID INT DEFAULT NULL,
    KEY `report_ID` (`report_ID`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
--
-- Dumping data for table `inventory`
--

ALTER TABLE inventory
ADD deleted_date DATE NULL DEFAULT NULL;


INSERT INTO `inventory` (`Tool_name`, `Price`, `Quantity`, `purchase_date`, `report_ID`)
VALUES 
('Cair Broom', 1000, 10, '2022-12-13', 1),
('Plastic Broom', 3000, 7, '2022-11-23', 2),
('Eakle', 3000, 7, '2022-11-23', 2),
('Wiper', 3000, 7, '2022-11-23', 2),
('Hand Brush', 3000, 7, '2022-11-23', 2),
('Toilet Brush', 3000, 7, '2022-11-23', 2),
('Duster', 3000, 7, '2022-11-23', 2),
('Sponge', 3000, 7, '2022-11-23', 2),
('Hanpic', 3000, 7, '2022-11-23', 2),
('Air Fresher', 3000, 7, '2022-11-23', 2),
('Glass Cleaner', 3000, 7, '2022-11-23', 2),
('Wim Powder', 3000, 7, '2022-11-23', 2),
('Polish Brown', 3000, 7, '2022-11-23', 2),
('Wax', 3000, 7, '2022-11-23', 2),
('Hand gluwas', 3000, 7, '2022-11-23', 2),
('Glass cleaner wipwe', 3000, 7, '2022-11-23', 2),
('Brash cutter blead', 3000, 7, '2022-11-23', 2),
('Teepol', 3000, 7, '2022-11-23', 2),
('Pherol', 3000, 7, '2022-11-23', 2),
('Polish Red', 3000, 7, '2022-11-23', 2);



-----------------------------------------------



-- Step 1: Create categories table
drop table categories;
CREATE TABLE IF NOT EXISTS `categories` (
  `Category_ID` varchar(20) not NULL,
  `Category_Name` varchar(50) NOT NULL,
  PRIMARY KEY (`Category_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;




ALTER TABLE `inventory` ADD COLUMN `Category_ID` VARCHAR(255) DEFAULT NULL;

ALTER TABLE `inventory`
ADD CONSTRAINT `fk_inventory_category`
FOREIGN KEY (`Category_ID`)
REFERENCES `categories` (`Category_ID`);



---------------------------------------

-- Update existing Category_ID column if needed



-- Step 3: Insert categories into categories table
INSERT INTO `categories` (`Category_ID`, `Category_Name`) VALUES
('1','Liquid'),
('2','Washes'),
('3','Brooms'),
('4','Brushes'),
('5','Cleaners'),
('6','Polish');

-----------------------------------------


-- Step 4: Update inventory table to associate tools with categories

-- Disable safe updates
SET SQL_SAFE_UPDATES = 0;
-- Update statements
UPDATE `inventory` SET `Category_ID` = '4' WHERE `Tool_name` = 'Hand Brush';
UPDATE `inventory` SET `Category_ID` = '4' WHERE `Tool_name` = 'Toilet Brush';
UPDATE `inventory` SET `Category_ID` = '3' WHERE `Tool_name` = 'Brash cutter blead';
UPDATE `inventory` SET `Category_ID` = '5' WHERE `Tool_name` = 'Glass Cleaner';
UPDATE `inventory` SET `Category_ID` = '5' WHERE `Tool_name` = 'Teepol';
UPDATE `inventory` SET `Category_ID` = '1' WHERE `Tool_name` = 'Hanpic';
UPDATE `inventory` SET `Category_ID` = '1' WHERE `Tool_name` = 'Pherol';
UPDATE `inventory` SET `Category_ID` = '1' WHERE `Tool_name` = 'Air Fresher';
UPDATE `inventory` SET `Category_ID` = '4' WHERE `Tool_name` = 'Duster';
UPDATE `inventory` SET `Category_ID` = '4' WHERE `Tool_name` = 'Sponge';
UPDATE `inventory` SET `Category_ID` = '6' WHERE `Tool_name` = 'Wim Powder';
UPDATE `inventory` SET `Category_ID` = '6' WHERE `Tool_name` = 'Polish Brown';
UPDATE `inventory` SET `Category_ID` = '6' WHERE `Tool_name` = 'Wax';
UPDATE `inventory` SET `Category_ID` = '6' WHERE `Tool_name` = 'Polish Red';
UPDATE `inventory` SET `Category_ID` = '5' WHERE `Tool_name` = 'Glass cleaner wipwe';
UPDATE `inventory` SET `Category_ID` = '4' WHERE `Tool_name` = 'Wiper';
UPDATE `inventory` SET `Category_ID` = '4' WHERE `Tool_name` = 'Hand gluwas';
UPDATE `inventory` SET `Category_ID` =' 3' WHERE `Tool_name` = 'Plastic Broom';
UPDATE `inventory` SET `Category_ID` =' 3' WHERE `Tool_name` = 'Cair Broom';
-- Re-enable safe updates
SET SQL_SAFE_UPDATES = 1;
-- Disable safe updates
SET SQL_SAFE_UPDATES = 0;
UPDATE `inventory` SET `Category_ID` =' 3' WHERE `Tool_name` = 'Plastic Broom';
UPDATE `inventory` SET `Category_ID` =' 3' WHERE `Tool_name` = 'Cair Broom';
-- Re-enable safe updates
SET SQL_SAFE_UPDATES = 1;




-------------------------


CREATE TABLE IF NOT EXISTS saved_reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    report_title VARCHAR(255) NOT NULL,
    report_content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
ALTER TABLE saved_reports
ADD COLUMN saved_datetime DATETIME AFTER report_content;





/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
