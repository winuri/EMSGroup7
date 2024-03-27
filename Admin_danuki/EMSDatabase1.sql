-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2024 at 03:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EMSDatabase1`
--

-- --------------------------------------------------------

--
-- Table structure for table `AccountDetails`
--

CREATE TABLE `AccountDetails` (
  `Acc_ID` int(11) NOT NULL,
  `Acc_No` decimal(20,0) DEFAULT NULL,
  `Bank_ID` int(11) DEFAULT NULL,
  `EMP_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `AccountDetails`
--

INSERT INTO `AccountDetails` (`Acc_ID`, `Acc_No`, `Bank_ID`, `EMP_ID`) VALUES
(1, 123, 1, NULL),
(2, 123, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Attendance`
--

CREATE TABLE `Attendance` (
  `A_ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Arrival_time` time DEFAULT NULL,
  `Leave_time` time DEFAULT NULL,
  `report_ID` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Attendance`
--

INSERT INTO `Attendance` (`A_ID`, `Date`, `Name`, `Arrival_time`, `Leave_time`, `report_ID`, `status`) VALUES
(1, '2022-08-02', 'Viviyan Rajapaksha', '08:00:00', '04:00:00', 4, 'Present'),
(2, '2022-08-02', 'Kirthirathna.B.D', '08:01:00', '04:00:00', 4, 'Present'),
(3, '2022-08-02', 'Ashoka.A.K.K', '08:00:00', '04:00:00', 4, 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `BankDetails`
--

CREATE TABLE `BankDetails` (
  `Bank_ID` int(11) NOT NULL,
  `Bank_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `BankDetails`
--

INSERT INTO `BankDetails` (`Bank_ID`, `Bank_Name`) VALUES
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
(35, 'Sri Lanka Operations Public Bank');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `EMP_ID` int(11) NOT NULL,
  `Member_No` int(11) NOT NULL,
  `F_name` varchar(20) DEFAULT NULL,
  `L_name` varchar(20) DEFAULT NULL,
  `NIC` varchar(20) NOT NULL,
  `Mobile` varchar(15) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Position_ID` int(11) DEFAULT NULL,
  `work_ID` int(11) DEFAULT NULL,
  `Pay_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`EMP_ID`, `Member_No`, `F_name`, `L_name`, `NIC`, `Mobile`, `Gender`, `Address`, `DOB`, `Position_ID`, `work_ID`, `Pay_ID`) VALUES
(3, 34, 'fdfd', 'dfg', 'fd', '4543543', 'male', 'fgh gfhgf', '2024-03-12', 3, 6, 1),
(4, 1, 'jayesh', 'mahajan', 'N123658C', '989898989', 'option1', '123, laxmi road', '2024-03-16', 1, 1, 1),
(5, 1, 'jayesh', 'mahajan', 'N123658C', '989898989', 'option1', '123, laxmi road', '2024-03-16', 1, 1, 1),
(6, 1, 'jayesh', 'mahajan', 'N123658C', '989898989', 'option1', '123, laxmi road', '2024-03-16', 1, 1, 1),
(7, 1, 'jayesh', 'mahajan', 'N123658C', '989898989', 'option1', '123, laxmi road', '2024-03-16', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

CREATE TABLE `Inventory` (
  `Tool_ID` varchar(10) NOT NULL,
  `Tool_name` varchar(100) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `report_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Inventory`
--

INSERT INTO `Inventory` (`Tool_ID`, `Tool_name`, `Price`, `Quantity`, `purchase_date`, `report_ID`) VALUES
('T001', 'Surface Cleaning Tools', 1000, 10, '2022-12-13', 1),
('T002', 'Floor Cleaning Tools', 3000, 7, '2022-11-23', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Leaves`
--

CREATE TABLE `Leaves` (
  `L_ID` varchar(10) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Leaves`
--

INSERT INTO `Leaves` (`L_ID`, `description`, `count`) VALUES
('L12', 'Sick Leave', 3),
('L13', 'casual leave', 2),
('L14', 'Sick Leave', 1);

-- --------------------------------------------------------

--
-- Table structure for table `PayMethod`
--

CREATE TABLE `PayMethod` (
  `Pay_ID` int(11) NOT NULL,
  `Pay_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `PayMethod`
--

INSERT INTO `PayMethod` (`Pay_ID`, `Pay_name`) VALUES
(1, 'By Cash'),
(2, 'By Deposit');

-- --------------------------------------------------------

--
-- Table structure for table `Positions`
--

CREATE TABLE `Positions` (
  `Position_ID` int(11) NOT NULL,
  `Position_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Positions`
--

INSERT INTO `Positions` (`Position_ID`, `Position_name`) VALUES
(1, 'Supervisor'),
(2, 'Labour'),
(3, 'Accountant');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_ID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `issue_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `user` (
  `user_ID` varchar(20) NOT NULL,
  `UserName` varchar(255) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `UserName`, `Password`) VALUES
('A456', 'Dilshan', '43782918%hg'),
('ad672', 'Lahiru', 'M/45!ndh34'),
('S234', 'chamara', '98458657V@');

-- --------------------------------------------------------

--
-- Table structure for table `WorkPlace`
--

CREATE TABLE `WorkPlace` (
  `work_ID` int(11) NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `WorkPlace`
--

INSERT INTO `WorkPlace` (`work_ID`, `Address`, `name`) VALUES
(1, 'Anuradhapura Town', 'Main Branch'),
(2, 'Main street, Mtale', 'Telecom - Mathale'),
(3, 'Udaya Mawatha, Anuradhapura', 'Telecom OPMC - Anuradhapura'),
(4, 'Hospital Road, Mannar', 'CEB - Mannar'),
(5, '249 B, Rex Building, Main St, Anuradhapura', 'Toyota - Anuradhapura'),
(6, 'Kandy Road, Kurunegala', 'Telecom - Kurunegala'),
(7, 'Thisa wewa, Anuradhapura', 'Water board - Thisa wewa'),
(8, 'Inner harbour Road, Trincomalee', 'Telecom - Trincomalee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AccountDetails`
--
ALTER TABLE `AccountDetails`
  ADD PRIMARY KEY (`Acc_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`),
  ADD KEY `Bank_ID` (`Bank_ID`);

--
-- Indexes for table `Attendance`
--
ALTER TABLE `Attendance`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `report_ID` (`report_ID`);

--
-- Indexes for table `BankDetails`
--
ALTER TABLE `BankDetails`
  ADD PRIMARY KEY (`Bank_ID`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`EMP_ID`),
  ADD KEY `Pay_ID` (`Pay_ID`),
  ADD KEY `Position_ID` (`Position_ID`),
  ADD KEY `work_ID` (`work_ID`);

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`Tool_ID`),
  ADD KEY `report_ID` (`report_ID`);

--
-- Indexes for table `Leaves`
--
ALTER TABLE `Leaves`
  ADD PRIMARY KEY (`L_ID`);

--
-- Indexes for table `PayMethod`
--
ALTER TABLE `PayMethod`
  ADD PRIMARY KEY (`Pay_ID`);

--
-- Indexes for table `Positions`
--
ALTER TABLE `Positions`
  ADD PRIMARY KEY (`Position_ID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `WorkPlace`
--
ALTER TABLE `WorkPlace`
  ADD PRIMARY KEY (`work_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AccountDetails`
--
ALTER TABLE `AccountDetails`
  MODIFY `Acc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `BankDetails`
--
ALTER TABLE `BankDetails`
  MODIFY `Bank_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Positions`
--
ALTER TABLE `Positions`
  MODIFY `Position_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `WorkPlace`
--
ALTER TABLE `WorkPlace`
  MODIFY `work_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AccountDetails`
--
ALTER TABLE `AccountDetails`
  ADD CONSTRAINT `AccountDetails_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `Employee` (`EMP_ID`),
  ADD CONSTRAINT `AccountDetails_ibfk_2` FOREIGN KEY (`Bank_ID`) REFERENCES `BankDetails` (`Bank_ID`);

--
-- Constraints for table `Attendance`
--
ALTER TABLE `Attendance`
  ADD CONSTRAINT `Attendance_ibfk_1` FOREIGN KEY (`report_ID`) REFERENCES `report` (`report_ID`);

--
-- Constraints for table `Employee`
--
ALTER TABLE `Employee`
  ADD CONSTRAINT `Employee_ibfk_1` FOREIGN KEY (`Pay_ID`) REFERENCES `PayMethod` (`Pay_ID`),
  ADD CONSTRAINT `Employee_ibfk_2` FOREIGN KEY (`Position_ID`) REFERENCES `Positions` (`Position_ID`),
  ADD CONSTRAINT `Employee_ibfk_3` FOREIGN KEY (`work_ID`) REFERENCES `WorkPlace` (`work_ID`);

--
-- Constraints for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD CONSTRAINT `Inventory_ibfk_1` FOREIGN KEY (`report_ID`) REFERENCES `report` (`report_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
