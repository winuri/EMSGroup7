-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 20, 2024 at 11:22 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emsdatabase_new3`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountdetails`
--

DROP TABLE IF EXISTS `accountdetails`;
CREATE TABLE IF NOT EXISTS `accountdetails` (
  `Acc_ID` int NOT NULL AUTO_INCREMENT,
  `Acc_No` decimal(20,0) DEFAULT NULL,
  `Bank_ID` int DEFAULT NULL,
  `EMP_ID` int DEFAULT NULL,
  PRIMARY KEY (`Acc_ID`),
  KEY `EMP_ID` (`EMP_ID`),
  KEY `Bank_ID` (`Bank_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `A_ID` int NOT NULL,
  `Date` date DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Arrival_time` time DEFAULT NULL,
  `Leave_time` time DEFAULT NULL,
  `report_ID` int DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `EMP_ID` int DEFAULT NULL,
  PRIMARY KEY (`A_ID`),
  KEY `report_ID` (`report_ID`),
  KEY `EMP_ID` (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `Bank_Name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Bank_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `F_name` varchar(20) DEFAULT NULL,
  `L_name` varchar(20) DEFAULT NULL,
  `NIC` varchar(20) NOT NULL,
  `Mobile` int DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `Member_No`, `F_name`, `L_name`, `NIC`, `Mobile`, `Gender`, `Address`, `DOB`, `Position_ID`, `work_ID`, `Pay_ID`, `Bank_ID`) VALUES
(1, 201, 'K.G.H', 'Ramyalatha', '746211520V', 76359658, 'Female', 'Mathale', '1974-02-02', 3, NULL, NULL, NULL),
(2, 93, 'B.D', 'Abekon Banda', '196723501570', 712365698, 'Male', 'Kurunegala', '1967-03-03', 2, NULL, NULL, NULL),
(7, 205, 'Kamalawathi', 'Piris', '959542681V', 778542361, 'Male', 'Kurunegala', '1995-12-12', 1, 8, 2, NULL),
(9, 320, 'Wimal', 'K.D', '199825631254', 774564251, 'Male', 'Trincomalee', '1998-01-02', 2, NULL, NULL, NULL),
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
  `leave_id` int NOT NULL,
  `EMP_ID` int DEFAULT NULL,
  `leave_type` varchar(50) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `leave_duration` enum('Half Day','Full Day') DEFAULT NULL,
  `notes` text,
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Position_id` int DEFAULT NULL,
  PRIMARY KEY (`leave_id`),
  KEY `Position_id` (`Position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emp_leaves`
--

INSERT INTO `emp_leaves` (`leave_id`, `EMP_ID`, `leave_type`, `from_date`, `to_date`, `leave_duration`, `notes`, `submission_date`, `Position_id`) VALUES
(0, 1, 'Sick Leave', '2024-05-01', '2024-05-03', 'Full Day', 'asd', '2024-05-20 02:03:29', 3),
(3, 9, 'Sick Leave', '2024-05-04', '2024-05-05', 'Full Day', 'Sick', '2024-05-04 11:43:12', 2),
(7, 11, 'Sick Leave', '2024-05-04', '2024-05-04', 'Half Day', 'Half Day', '2024-05-04 12:01:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `Tool_ID` varchar(10) NOT NULL,
  `Tool_name` varchar(100) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Quantity` int DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `report_ID` int DEFAULT NULL,
  PRIMARY KEY (`Tool_ID`),
  KEY `report_ID` (`report_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `L_ID` varchar(10) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `count` int DEFAULT NULL,
  PRIMARY KEY (`L_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `Pay_method` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Pay_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `id` int NOT NULL,
  `EMP_ID` int NOT NULL,
  `month_year` date NOT NULL,
  `total_working_days` int NOT NULL,
  `total_deductions` decimal(10,2) DEFAULT '0.00',
  `other_earnings` decimal(10,2) DEFAULT '0.00',
  `tax_amount` decimal(10,2) DEFAULT '0.00',
  `net_salary` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `EMP_ID` (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `EMP_ID`, `month_year`, `total_working_days`, `total_deductions`, `other_earnings`, `tax_amount`, `net_salary`, `created_at`) VALUES
(0, 9, '2024-05-31', 0, '5.00', '10.00', '2.00', '3.00', '2024-05-20 02:01:36'),
(1, 18, '2024-05-31', 2, '0.00', '0.00', '0.00', '2000.00', '2024-05-04 22:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `payrollsheet`
--

DROP TABLE IF EXISTS `payrollsheet`;
CREATE TABLE IF NOT EXISTS `payrollsheet` (
  `id` int NOT NULL,
  `code` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `create_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `Position_ID` int NOT NULL,
  `Position_name` varchar(50) DEFAULT NULL,
  `salary` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`Position_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `name` varchar(50) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  PRIMARY KEY (`report_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `user_ID` varchar(20) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  `EMP_ID` int DEFAULT NULL,
  PRIMARY KEY (`user_ID`),
  KEY `user_ibfk_1` (`EMP_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `UserName`, `Password`, `EMP_ID`) VALUES
('1', 'Admin', 'Admin123', 19);

-- --------------------------------------------------------

--
-- Table structure for table `workplace`
--

DROP TABLE IF EXISTS `workplace`;
CREATE TABLE IF NOT EXISTS `workplace` (
  `work_ID` int NOT NULL,
  `Work_Address` varchar(255) DEFAULT NULL,
  `Work_name` varchar(100) DEFAULT NULL,
  `Owner_name` varchar(100) DEFAULT NULL,
  `Owner_mobile` int DEFAULT NULL,
  PRIMARY KEY (`work_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
