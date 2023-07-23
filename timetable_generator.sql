-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 13, 2021 at 01:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetable_generator`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `username` varchar(300) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `profile_pic` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `profile_pic`) VALUES
(1, 'admin', 'admin', 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(4) NOT NULL,
  `course_id` varchar(20) DEFAULT NULL,
  `name` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `course_id`, `name`) VALUES
(1, 'BCSIT', 'Computer Science & IT');

-- --------------------------------------------------------

--
-- Table structure for table `course_unit`
--

CREATE TABLE `course_unit` (
  `id` int(3) NOT NULL,
  `course_unit_id` varchar(20) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `lecturer` varchar(200) DEFAULT NULL,
  `semester` varchar(40) DEFAULT NULL,
  `year` varchar(40) DEFAULT NULL,
  `course_id` int(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_unit`
--

INSERT INTO `course_unit` (`id`, `course_unit_id`, `name`, `lecturer`, `semester`, `year`, `course_id`) VALUES
(1, 'BCSIT1101', 'Descrete Math', '1', 'one', 'one', 1),
(4, 'BCSIT1202', 'Java Programming', '2', 'two', 'one', 1),
(5, 'BCSIT2102', 'Visual Programming Language', '2', 'one', 'two', 1),
(6, 'BCSIT3101', 'Software Engineering', '2', 'one', 'three', 1),
(7, 'BCSIT2201', 'Web Development', '1', 'two', 'two', 1),
(8, 'BCSIT3201', 'Data Structures', '2', 'two', 'three', 1),
(9, 'BCSIT1102', 'Web Development', '1', 'one', 'one', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(4) NOT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `lname` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `courses` text DEFAULT '',
  `title` varchar(100) DEFAULT NULL,
  `available_on` varchar(60) DEFAULT NULL,
  `course_id` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `fname`, `lname`, `email`, `telephone`, `courses`, `title`, `available_on`, `course_id`) VALUES
(1, 'John', 'Doe', 'john@gmail.com', '0757591529', ',Descrete Math,Web Development,Web Development', 'Mr', 'Monday', 1),
(2, 'Jane', 'Doe', 'jane@gmail.com', '0757463828', ',Visual Programming Language,Software Engineering,Data Structures', 'Miss', 'Tuesday', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `user_image` text DEFAULT NULL,
  `lecturer_id` int(4) DEFAULT NULL,
  `course_id` int(4) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_image`, `lecturer_id`, `course_id`, `username`, `password`) VALUES
(1, 'wolf.jpg', 1, 1, 'user', 'user'),
(2, 'gorilla17.jpg', 2, 1, 'user 1', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_unit`
--
ALTER TABLE `course_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_unit`
--
ALTER TABLE `course_unit`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
