-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2024 at 11:40 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emsdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountdetails`
--

DROP TABLE IF EXISTS `accountdetails`;
CREATE TABLE IF NOT EXISTS `accountdetails` (
  `Acc_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Acc_No` decimal(20,0) DEFAULT NULL,
  `Bank_ID` int(11) DEFAULT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Acc_ID`),
  KEY `EMP_ID` (`EMP_ID`),
  KEY `Bank_ID` (`Bank_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accountdetails`
--

INSERT INTO `accountdetails` (`Acc_ID`, `Acc_No`, `Bank_ID`, `EMP_ID`) VALUES
(1, '201200110017666', NULL, 1),
(2, '207200165900279', NULL, 2),
(3, '2620012569845', 1, NULL),
(4, '8090002486', 14, NULL),
(5, '2678954621', 14, NULL),
(6, '2678954621', 31, NULL),
(7, '8080006358', NULL, 9),
(8, '8080006359', 10, 10),
(9, '262000536985', 27, 11);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `A_ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Arrival_time` time DEFAULT NULL,
  `Leave_time` time DEFAULT NULL,
  `report_ID` int(11) DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
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
  `Bank_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Bank_Name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `EMP_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Member_No` int(11) NOT NULL,
  `F_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `L_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NIC` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Mobile` int(11) DEFAULT NULL,
  `Gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Position_ID` int(11) DEFAULT NULL,
  `work_ID` int(11) DEFAULT NULL,
  `Pay_ID` int(11) DEFAULT NULL,
  `Bank_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`EMP_ID`),
  KEY `Pay_ID` (`Pay_ID`),
  KEY `Position_ID` (`Position_ID`),
  KEY `work_ID` (`work_ID`),
  KEY `Bank_ID` (`Bank_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `Member_No`, `F_name`, `L_name`, `NIC`, `Mobile`, `Gender`, `Address`, `DOB`, `Position_ID`, `work_ID`, `Pay_ID`, `Bank_ID`) VALUES
(1, 201, 'K.G.H', 'Ramyalatha', '746211520V', 76359658, 'Female', 'Mathale', '1974-02-02', 3, NULL, NULL, NULL),
(2, 93, 'B.D', 'Abekon Banda', '196723501570', 712365698, 'Male', 'Kurunegala', '1967-03-03', 2, NULL, NULL, NULL),
(7, 205, 'Kamalawathi', 'Piris', '959542681V', 778542361, 'Male', 'Kurunegala', '1995-12-12', 1, 8, 2, NULL),
(9, 320, 'Wimal', 'K.D.P', '199825631254', 774564251, 'Male', 'Trincomalee', '1998-01-15', 2, NULL, NULL, NULL),
(10, 321, 'Wimala', 'K.D.H.U.P', '199825631253', 774564522, 'Female', 'Trincomalee', '1999-05-07', 1, 8, 2, 10),
(11, 300, 'Anoma', 'Pathirana', '636082923V', 772365448, 'Female', 'Trincomalee', '1963-05-12', 2, 8, 2, 27),
(18, 111, 'kamala', 'Perera', '622565238V', 715695363, 'Female', 'Kurunegala', '1962-12-12', 1, 6, 1, 36),
(19, 1, 'S.E.', 'Himali', '742563472V', 772646654, 'Female', '37 1/2, Mile post, Anuradhapura', '1974-09-04', 1, 1, 3, 36);

-- --------------------------------------------------------

--
-- Table structure for table `emp_leaves`
--

DROP TABLE IF EXISTS `emp_leaves`;
CREATE TABLE IF NOT EXISTS `emp_leaves` (
  `leave_id` int(11) NOT NULL AUTO_INCREMENT,
  `EMP_ID` int(11) DEFAULT NULL,
  `leave_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `leave_duration` enum('Half Day','Full Day') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Position_id` int(11) DEFAULT NULL,
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

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `Tool_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tool_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `report_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Tool_ID`),
  KEY `report_ID` (`report_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`Tool_ID`, `Tool_name`, `Price`, `Quantity`, `purchase_date`, `report_ID`) VALUES
('T001', 'Surface Cleaning Tools', 1000, 10, '2022-12-13', 1),
('T002', 'Floor Cleaning Tools', 3000, 7, '2022-11-23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
CREATE TABLE IF NOT EXISTS `leaves` (
  `L_ID` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
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
  `Pay_ID` int(11) NOT NULL,
  `Pay_method` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `id` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `month_year` date DEFAULT NULL,
  `total_working_days` int(11) NOT NULL,
  `total_deductions` decimal(10,2) DEFAULT '0.00',
  `other_earnings` decimal(10,2) DEFAULT '0.00',
  `tax_amount` decimal(10,2) DEFAULT '0.00',
  `net_salary` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `EMP_ID`, `month_year`, `total_working_days`, `total_deductions`, `other_earnings`, `tax_amount`, `net_salary`, `created_at`) VALUES
(2406, 1, NULL, 18, '100.00', '56.00', '87.00', '16069.00', '2024-06-06 05:40:46'),
(456, 1, NULL, 3, '2.00', '4.00', '7.00', '2695.00', '2024-06-05 21:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `payrollsheet`
--

DROP TABLE IF EXISTS `payrollsheet`;
CREATE TABLE IF NOT EXISTS `payrollsheet` (
  `id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `Position_ID` int(11) NOT NULL,
  `Position_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `report_ID` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `user_ID` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_ID`),
  KEY `user_ibfk_1` (`EMP_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `UserName`, `Password`, `EMP_ID`) VALUES
('1', 'Admin', 'Admin123', 19),
('', 'wimala11', '456', 9);

-- --------------------------------------------------------

--
-- Table structure for table `workplace`
--

DROP TABLE IF EXISTS `workplace`;
CREATE TABLE IF NOT EXISTS `workplace` (
  `work_ID` int(11) NOT NULL,
  `Work_Address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Work_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Owner_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Owner_mobile` int(11) DEFAULT NULL,
  PRIMARY KEY (`work_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workplace`
--

INSERT INTO `workplace` (`work_ID`, `Work_Address`, `Work_name`, `Owner_name`, `Owner_mobile`) VALUES
(1, 'Anuradhapura Town', 'Main Branch', 'H.E.Himali', 713490948),
(2, 'Main street, Matale', 'Telecom - Mathale', 'K.Siriwardhana', 777885263),
(4, 'Hospital Road, Mannar', 'CEB - Mannar', NULL, NULL),
(5, '249 B, Rex Building, Main St, Anuradhapura', 'Toyota - Anuradhapura', NULL, NULL),
(6, 'Kandy Road, Kurunegala', 'Telecom - Kurunegala', NULL, NULL),
(7, 'Thisa wewa, Anuradhapura', 'Water board - Thisa wewa', NULL, NULL),
(8, 'Inner harbour Road, Trincomalee', 'Telecom - Trincomalee', NULL, NULL),
(9, 'Naddukka, Mannar', 'Thambapavani Wind farm - Mannar', 'K.G.Piris', 715263859);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
