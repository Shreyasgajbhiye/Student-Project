-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 06:35 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `students_detail`
--

CREATE TABLE `students_detail` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `reg_id` varchar(20) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `direct_admission` tinyint(1) NOT NULL,
  `year_of_joining` year(4) NOT NULL,
  `year_of_passing` year(4) NOT NULL,
  `department` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `semesters_completed` int(11) NOT NULL,
  `contact_mobile` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `transcript_file` varchar(255) DEFAULT NULL,
  `marksheets_file` varchar(255) DEFAULT NULL,
  `accepted_terms` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students_detail`
--

INSERT INTO `students_detail` (`id`, `first_name`, `last_name`, `full_name`, `reg_id`, `date_of_birth`, `gender`, `direct_admission`, `year_of_joining`, `year_of_passing`, `department`, `course`, `semesters_completed`, `contact_mobile`, `email`, `transcript_file`, `marksheets_file`, `accepted_terms`) VALUES
(23, 'Ayush', 'Bulbule', 'Ayush Bulbule', 'ssacdc', '2000-12-31', 'male', 0, 2022, 2019, 'Information Technology Engineering', 'Master of Engineering', 7, '123456789', 'ayushbulbule24@gmail.com', '30b5930283d4de763831f1d754ce246b.pdf', '94dea71264b96d0b5283aae0e7b7df01.pdf', 0),
(24, 'Ayush', 'Bulbule', 'Ayush Bulbule', 'ssacdc', '2000-12-31', 'male', 0, 2022, 2019, 'Information Technology Engineering', 'Master of Engineering', 7, '123456789', 'ayushbulbule24@gmail.com', 'd6920d4e55318c774e1e0a8669c3c19a.pdf', '5fa1b9c39f4c30d80fb7a513f460f7f2.pdf', 0),
(25, 'Ayush', 'Bulbule', 'Ayush Bulbule', 'ssacdc', '2023-05-03', 'male', 0, 2020, 2026, 'Information Technology Engineering', 'Bachelor of Engineering', 6, '123456789', 'jon@gmail.com', '6e3c105fcd0a7fc20541c5bf4b110227.pdf', 'e94d380f08f31ecfcc4600effe85fd23.pdf', 0),
(26, 'Ayush', 'Bulbule', 'Ayush Bulbule', 'ssacdc', '2023-05-18', 'male', 0, 2022, 2026, 'Computer Engineering', 'Bachelor of Engineering', 8, '123456789', 'jon@gmail.com', '85a7f2f982870c83a60bdb692cd89f5c.pdf', '57304f493ffaf7adb3ac1aa58d04d453.pdf', 0),
(27, 'Ayush', 'Bulbule', 'Ayush Bulbule', 'ssacdc', '2023-12-31', 'male', 0, 2022, 2026, 'Computer Engineering', 'Bachelor of Engineering', 8, '123456789', 'jon@gmail.com', 'a27c1c4cef44fe15e3c453989cefdc03.pdf', '96f0299a2c1b77d72f608d841b3372c0.pdf', 0),
(28, 'Ayush', 'Bulbule', 'Ayush Bulbule', 'ffsdsfdsf', '2023-12-31', 'male', 0, 2022, 2011, 'Computer Engineering', 'Bachelor of Engineering', 7, '123456789', 'jon@gmail.com', '71b5ccc0366f194d22345a8b82d3fd30.pdf', '4537ec5076d652a744d4fbd10e21e94a.pdf', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students_detail`
--
ALTER TABLE `students_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students_detail`
--
ALTER TABLE `students_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
