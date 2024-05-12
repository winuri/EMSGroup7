-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2024 at 12:21 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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

CREATE TABLE `accountdetails` (
  `Acc_ID` int(11) NOT NULL,
  `Acc_No` decimal(20,0) DEFAULT NULL,
  `Bank_ID` int(11) DEFAULT NULL,
  `EMP_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `attendance` (
  `A_ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Arrival_time` time DEFAULT NULL,
  `Leave_time` time DEFAULT NULL,
  `report_ID` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `EMP_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`A_ID`, `Date`, `Name`, `Arrival_time`, `Leave_time`, `report_ID`, `status`, `EMP_ID`) VALUES
(1, '2024-05-02', 'Wimala', '08:00:00', '04:00:00', 4, 'Present', 10),
(2, '2024-05-02', 'Anoma', '08:01:00', '04:00:00', 4, 'Present', 11),
(3, '2024-05-02', 'Kamala', '08:00:00', '04:00:00', 4, 'Present', 18),
(4, '2024-05-03', 'Kamala', '08:00:00', '04:00:00', 4, 'Present', 18);
(5, '2024-05-04', 'Kamala', '08:00:00', '04:00:00', 4, 'Present', 18);
(6, '2024-05-05', 'Kamala', '08:00:00', '04:00:00', 4, 'Present', 18);
(7, '2024-05-06', 'Wimala', '08:00:00', '04:00:00', 4, 'Present', 10),
(8, '2024-05-07', 'Wimala', '08:00:00', '04:00:00', 4, 'Present', 10),
(9, '2024-05-08', 'Wimala', '08:00:00', '04:00:00', 4, 'Present', 10),
(10, '2024-05-09', 'Wimala', '08:00:00', '04:00:00', 4, 'Present', 10),

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE `bankdetails` (
  `Bank_ID` int(11) NOT NULL,
  `Bank_Name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `employee` (
  `EMP_ID` int(11) NOT NULL,
  `Member_No` int(11) NOT NULL,
  `F_name` varchar(20) DEFAULT NULL,
  `L_name` varchar(20) DEFAULT NULL,
  `NIC` varchar(20) NOT NULL,
  `Mobile` int(11) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `Position_ID` int(11) DEFAULT NULL,
  `work_ID` int(11) DEFAULT NULL,
  `Pay_ID` int(11) DEFAULT NULL,
  `Bank_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EMP_ID`, `Member_No`, `F_name`, `L_name`, `NIC`, `Mobile`, `Gender`, `Address`, `DOB`, `Position_ID`, `work_ID`, `Pay_ID`, `Bank_ID`) VALUES
(1, 201, 'K.G.H', 'Ramyalatha', '746211520V', 76359658, 'Female', 'Mathale', '1974-02-02', 3, NULL, NULL, NULL),
(2, 93, 'B.D', 'Abekon Banda', '196723501570', 712365698, 'Male', 'Kurunegala', '1967-03-03', 2, NULL, NULL, NULL),
(3, 1, 'C.V', 'Sathsara', '973463446V', 770467422, 'Male', NULL, '1997-12-11', 3, 1, 1, NULL),
(7, 205, 'Kamalawathi', 'Piris', '959542681V', 778542361, 'Male', 'Kurunegala', '1995-12-12', 1, 8, 2, NULL),
(9, 320, 'Wimal', 'K.D', '199825631254', 774564251, 'Male', 'Trincomalee', '1998-01-02', 2, NULL, NULL, NULL),
(10, 321, 'Wimala', 'K.D.H...UP', '199825631253', 774564522, 'Female', 'Trincomalee', '1999-05-06', 1, 8, 2, 10),
(11, 300, 'Anoma', 'Pathirana', '636082923V', 772365448, 'Female', 'Trincomalee', '1963-05-12', 2, 8, 2, 27),
(18, 111, 'kamala', 'Perera', '622565238V', 715695363, 'Female', 'Kurunegala', '1962-12-12', 1, 6, 1, 36);

-- --------------------------------------------------------

--
-- Table structure for table `emp_leaves`
--

CREATE TABLE `emp_leaves` (
  `leave_id` int(11) NOT NULL,
  `EMP_ID` int(11) DEFAULT NULL,
  `leave_type` varchar(50) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `leave_duration` enum('Half Day','Full Day') DEFAULT NULL,
  `notes` text,
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Position_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emp_leaves`
--

INSERT INTO `emp_leaves` (`leave_id`, `EMP_ID`, `leave_type`, `from_date`, `to_date`, `leave_duration`, `notes`, `submission_date`, `Position_id`) VALUES
(3, 9, 'Sick Leave', '2024-05-04', '2024-05-05', 'Full Day', 'Sick', '2024-05-04 11:43:12', 2),
(7, 11, 'Sick Leave', '2024-05-04', '2024-05-04', 'Half Day', 'Half Day', '2024-05-04 12:01:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `Tool_ID` varchar(10) NOT NULL,
  `Tool_name` varchar(100) DEFAULT NULL,
  `Price` double DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `report_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `leaves` (
  `L_ID` varchar(10) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `paymethod` (
  `Pay_ID` int(11) NOT NULL,
  `Pay_method` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymethod`
--

INSERT INTO `paymethod` (`Pay_ID`, `Pay_method`) VALUES
(1, 'By Cash'),
(2, 'By Deposit');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `EMP_ID` int(11) NOT NULL,
  `month_year` date NOT NULL,
  `total_working_days` int(11) NOT NULL,
  `total_deductions` decimal(10,2) DEFAULT '0.00',
  `other_earnings` decimal(10,2) DEFAULT '0.00',
  `tax_amount` decimal(10,2) DEFAULT '0.00',
  `net_salary` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `EMP_ID`, `month_year`, `total_working_days`, `total_deductions`, `other_earnings`, `tax_amount`, `net_salary`, `created_at`) VALUES
(1, 18, '2024-05-31', 2, '0.00', '0.00', '0.00', '2000.00', '2024-05-04 22:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `Position_ID` int(11) NOT NULL,
  `Position_name` varchar(50) DEFAULT NULL,
  `salary` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`Position_ID`, `Position_name`, `salary`) VALUES
(1, 'Supervisor', '1000.00'),
(2, 'Labour', '750.00'),
(3, 'Accountant', '900.00');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_ID` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `issue_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `UserName`, `Password`) VALUES
('A456', 'Dilshan', '43782918%hg'),
('ad672', 'Lahiru', 'M/45!ndh34'),
('S234', 'chamara', '98458657V@');

-- --------------------------------------------------------

--
-- Table structure for table `workplace`
--

CREATE TABLE `workplace` (
  `work_ID` int(11) NOT NULL,
  `Work_Address` varchar(255) DEFAULT NULL,
  `Work_name` varchar(100) DEFAULT NULL,
  `Owner_name` varchar(100) DEFAULT NULL,
  `Owner_mobile` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `accountdetails`
--
ALTER TABLE `accountdetails`
  ADD PRIMARY KEY (`Acc_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`),
  ADD KEY `Bank_ID` (`Bank_ID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `report_ID` (`report_ID`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD PRIMARY KEY (`Bank_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EMP_ID`),
  ADD KEY `Pay_ID` (`Pay_ID`),
  ADD KEY `Position_ID` (`Position_ID`),
  ADD KEY `work_ID` (`work_ID`),
  ADD KEY `Bank_ID` (`Bank_ID`);

--
-- Indexes for table `emp_leaves`
--
ALTER TABLE `emp_leaves`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `Position_id` (`Position_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`Tool_ID`),
  ADD KEY `report_ID` (`report_ID`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`L_ID`);

--
-- Indexes for table `paymethod`
--
ALTER TABLE `paymethod`
  ADD PRIMARY KEY (`Pay_ID`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `EMP_ID` (`EMP_ID`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
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
-- Indexes for table `workplace`
--
ALTER TABLE `workplace`
  ADD PRIMARY KEY (`work_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountdetails`
--
ALTER TABLE `accountdetails`
  MODIFY `Acc_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bankdetails`
--
ALTER TABLE `bankdetails`
  MODIFY `Bank_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `EMP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `emp_leaves`
--
ALTER TABLE `emp_leaves`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `Position_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workplace`
--
ALTER TABLE `workplace`
  MODIFY `work_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountdetails`
--
ALTER TABLE `accountdetails`
  ADD CONSTRAINT `accountdetails_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`),
  ADD CONSTRAINT `accountdetails_ibfk_2` FOREIGN KEY (`Bank_ID`) REFERENCES `bankdetails` (`Bank_ID`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`report_ID`) REFERENCES `report` (`report_ID`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Pay_ID`) REFERENCES `paymethod` (`Pay_ID`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`Position_ID`) REFERENCES `positions` (`Position_ID`),
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`work_ID`) REFERENCES `workplace` (`work_ID`),
  ADD CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`Bank_ID`) REFERENCES `bankdetails` (`Bank_ID`);

--
-- Constraints for table `emp_leaves`
--
ALTER TABLE `emp_leaves`
  ADD CONSTRAINT `emp_leaves_ibfk_1` FOREIGN KEY (`Position_id`) REFERENCES `positions` (`Position_ID`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`report_ID`) REFERENCES `report` (`report_ID`);

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`EMP_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
