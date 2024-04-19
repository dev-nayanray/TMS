-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 09:48 PM
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
-- Database: `tms`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `batchID` int(11) NOT NULL,
  `batchName` varchar(255) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`batchID`, `batchName`, `startDate`, `endDate`) VALUES
(1, 'Web Development', '0000-00-00', '0000-00-00'),
(2, 'GD-22', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `overview` text NOT NULL,
  `startDate` date NOT NULL,
  `budget` decimal(10,2) NOT NULL,
  `dueDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `courseName`, `overview`, `startDate`, `budget`, `dueDate`) VALUES
(1, 'Web Dev Batch ', 'Start New Course ', '0000-00-00', 1000.00, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `projectname` varchar(255) NOT NULL,
  `overview` text NOT NULL,
  `startdate` date NOT NULL,
  `budget` decimal(10,2) NOT NULL,
  `duedate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectname`, `overview`, `startdate`, `budget`, `duedate`) VALUES
(1, 'Web Development', 'Hello I am nayan', '0000-00-00', 500.00, '0000-00-00'),
(2, 'Web Design', 'Front End Developer ', '0000-00-00', 600.00, '0000-00-00'),
(3, 'Video Editing', 'video edite', '0000-00-00', 700.00, '0000-00-00'),
(4, 'Graphic Design ', 'Graphic design', '0000-00-00', 700.00, '0000-00-00'),
(5, 'Motion Design', 'Motion Design', '0000-00-00', 600.00, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `studentName` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `admissionDate` date NOT NULL,
  `endDate` date NOT NULL,
  `batchName` varchar(100) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `teachersName` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `studentName`, `phone`, `email`, `location`, `admissionDate`, `endDate`, `batchName`, `courseName`, `teachersName`, `status`) VALUES
(1, 'Rohim', '+8801920875345', 'nayanroyjsr22@gmail.com', 'jessore,Khulna', '0000-00-00', '0000-00-00', 'web-b12', 'Web Dev Batch ', 'Limon Hosen', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacherID` int(11) NOT NULL,
  `teacherName` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `batch` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `joiningDate` date NOT NULL,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacherID`, `teacherName`, `phone`, `email`, `location`, `batch`, `department`, `joiningDate`, `status`) VALUES
(1, 'Md Limon Hosen ', '+8801920875345', 'houseb@gmail.com', 'jessore', 'Web Design-16', 'Web Development', '0000-00-00', 'Active'),
(2, 'Md Limon Hosen ', '0198 130861', 'houseb@gmail.com', 'jessore,Khulna', 'Web Design-16', 'Web Development', '0000-00-00', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `mobile`, `full_name`, `user_role`, `company_name`, `otp`) VALUES
(1, 'nayanroyjsr22@gmail.com', '$2y$10$vOl7bT6nrM7MDMlRk843..l5OiqsjxKmIxhbRu25Bfs9v/JKeVaBe', 'nayanroyjsr22@gmail.com', '01920875345', 'Nayan Ray', 'admin', 'JIT', '1222'),
(5, '', '$2y$10$Xul0p.YtfWm2s4hE6CS/uuiX2lFZxg1fX216Ab4E9WRAkxDtcQ6ty', 'nayanroy@gmail.com', '', 'Nayan Ray', '', '', ''),
(6, '', '$2y$10$PHLIv8VnGkaimsRTXCfjZ.9vShZoTL7ZskUpXx9InWu5GBSt2aw1K', 'nayanroy@gmail.com', '', 'Nayan Ray', '', '', ''),
(7, 'Francis', '$2y$10$x9ZEELOG4iM2BcKRm8N41uJNPbdo/78/OEAxs.o7lgzXrA2IdTdTK', 'nayanroyjsr22@gmail.com', '01920875345', 'Nayan Ray', 'admin', 'JIT', '2112');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`batchID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacherID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `batchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
