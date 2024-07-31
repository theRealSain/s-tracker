-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 31, 2024 at 01:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `fname` varchar(255) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `college_id` varchar(255) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `profile_picture` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_table`
--

CREATE TABLE `attendance_table` (
  `student_id` varchar(255) NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance` enum('Present','Absent') NOT NULL,
  `hour` int(10) NOT NULL,
  `course_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_admin`
--

CREATE TABLE `class_admin` (
  `fname` varchar(255) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `college_id` varchar(255) NOT NULL,
  `profile_picture` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cname` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `college_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_feedback`
--

CREATE TABLE `parent_feedback` (
  `parent_id` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `parent_table`
--

CREATE TABLE `parent_table` (
  `fname` varchar(255) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE `student_course` (
  `student_id` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `internal` double NOT NULL,
  `t_rating` double NOT NULL,
  `p_rating` double NOT NULL,
  `attendance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_evaluation`
--

CREATE TABLE `student_evaluation` (
  `student_id` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `regular_study` varchar(255) CHARACTER SET armscii8 COLLATE armscii8_bin NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `study_time` varchar(255) NOT NULL,
  `exam_study` varchar(255) NOT NULL,
  `study_mode` varchar(255) DEFAULT NULL,
  `satisfy` varchar(255) NOT NULL,
  `it_use` varchar(255) NOT NULL,
  `addln_courses` varchar(255) NOT NULL,
  `social_media` varchar(255) NOT NULL,
  `sleep_time` varchar(255) NOT NULL,
  `travel_time` varchar(255) NOT NULL,
  `discussion` varchar(255) NOT NULL,
  `communication` varchar(255) NOT NULL,
  `semester_mark` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_table`
--

CREATE TABLE `student_table` (
  `fname` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `college_id` varchar(255) NOT NULL,
  `profile_picture` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_table`
--

CREATE TABLE `teacher_table` (
  `fname` varchar(255) NOT NULL,
  `phone` bigint(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `college_id` varchar(255) NOT NULL,
  `profile_picture` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `attendance_table`
--
ALTER TABLE `attendance_table`
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `class_admin`
--
ALTER TABLE `class_admin`
  ADD PRIMARY KEY (`class_id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `parent_feedback`
--
ALTER TABLE `parent_feedback`
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `parent_table`
--
ALTER TABLE `parent_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_course`
--
ALTER TABLE `student_course`
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `student_evaluation`
--
ALTER TABLE `student_evaluation`
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `student_table`
--
ALTER TABLE `student_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `college_id` (`college_id`);

--
-- Indexes for table `teacher_table`
--
ALTER TABLE `teacher_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `college_id` (`college_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance_table`
--
ALTER TABLE `attendance_table`
  ADD CONSTRAINT `attendance_table_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_table` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendance_table_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_admin`
--
ALTER TABLE `class_admin`
  ADD CONSTRAINT `class_admin_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `admin_table` (`college_id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_table` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class_admin` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_ibfk_3` FOREIGN KEY (`college_id`) REFERENCES `admin_table` (`college_id`) ON DELETE CASCADE;

--
-- Constraints for table `parent_feedback`
--
ALTER TABLE `parent_feedback`
  ADD CONSTRAINT `parent_feedback_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `parent_table` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `parent_feedback_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_table` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parent_table`
--
ALTER TABLE `parent_table`
  ADD CONSTRAINT `parent_table_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_table` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `class_admin` (`class_id`) ON DELETE CASCADE;

--
-- Constraints for table `student_evaluation`
--
ALTER TABLE `student_evaluation`
  ADD CONSTRAINT `student_evaluation_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student_table` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_table`
--
ALTER TABLE `student_table`
  ADD CONSTRAINT `student_table_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class_admin` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_table_ibfk_2` FOREIGN KEY (`college_id`) REFERENCES `admin_table` (`college_id`) ON DELETE CASCADE;

--
-- Constraints for table `teacher_table`
--
ALTER TABLE `teacher_table`
  ADD CONSTRAINT `teacher_table_ibfk_1` FOREIGN KEY (`college_id`) REFERENCES `admin_table` (`college_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
