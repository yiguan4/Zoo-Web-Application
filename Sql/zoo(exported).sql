-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2021 at 06:14 AM
-- Server version: 8.0.26
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zoo`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `A_ID` char(6) NOT NULL,
  `A_name` varchar(30) NOT NULL,
  `A_age` varchar(10) NOT NULL,
  `A_Gender` varchar(6) DEFAULT NULL,
  `A_location` varchar(30) DEFAULT NULL,
  `A_Status` varchar(10) DEFAULT NULL,
  `A_Type` varchar(15) DEFAULT NULL,
  `ZD_ID` char(6) DEFAULT NULL,
  `AT_ID` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`A_ID`, `A_name`, `A_age`, `A_Gender`, `A_location`, `A_Status`, `A_Type`, `ZD_ID`, `AT_ID`) VALUES
('a00001', 'dolphin', '2 years', 'male', 'sjsu engineering building', 'healthy', 'Carnivore', 'Z10000', 't00002'),
('a00002', 'cow', '2 years', 'female', 'sjsu student union', 'healthy', 'Herbivore', 'Z10000', 't00002');

-- --------------------------------------------------------

--
-- Table structure for table `animal_participated`
--

CREATE TABLE `animal_participated` (
  `A_ID` char(6) NOT NULL,
  `E_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `animal_participated`
--

INSERT INTO `animal_participated` (`A_ID`, `E_ID`) VALUES
('a00002', 'e00001'),
('a00001', 'e00002'),
('a00002', 'e00002'),
('a00002', 'e00003');

-- --------------------------------------------------------

--
-- Table structure for table `at_employee`
--

CREATE TABLE `at_employee` (
  `P_ID` char(6) NOT NULL,
  `P_name` varchar(15) NOT NULL,
  `P_Gender` varchar(6) DEFAULT NULL,
  `Phone` char(12) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `P_Password` varchar(256) NOT NULL,
  `D_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `at_employee`
--

INSERT INTO `at_employee` (`P_ID`, `P_name`, `P_Gender`, `Phone`, `Email`, `P_Password`, `D_ID`) VALUES
('t00001', 'Danial', 'male', '123123', 'danial@gmail.com', '$2y$10$fmxAKSNux9FD2LLu1gptP.LE2L3N/McBbIIuLKn5zlp/clVHVw8bK', 'D33333'),
('t00002', 'Adam', 'male', '1234567', 'adam@gmail.com', '$2y$10$2H2kwRa/42Yxo5bXHjN.0u2aHPVbznEOYt7uR.dtV/ljNyvugsF1a', 'D33333'),
('t00003', 'Jack', 'male', '123-456-7890', 'jack@gmail.com', '$2y$10$ScZYi8XHd3z/.nCoO.lWS.6lPGVGxROnFsQnKpdhYL50GFAadEtSC', 'd33333');

-- --------------------------------------------------------

--
-- Table structure for table `at_participated`
--

CREATE TABLE `at_participated` (
  `AT_ID` char(6) NOT NULL,
  `E_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `at_participated`
--

INSERT INTO `at_participated` (`AT_ID`, `E_ID`) VALUES
('t00001', 'e00001'),
('t00002', 'e00001'),
('t00002', 'e00002'),
('t00002', 'e00003'),
('t00002', 'e00004');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `D_ID` char(6) NOT NULL,
  `D_name` varchar(30) NOT NULL,
  `D_location` varchar(30) DEFAULT NULL,
  `D_phone` char(12) DEFAULT NULL,
  `P_ID` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`D_ID`, `D_name`, `D_location`, `D_phone`, `P_ID`) VALUES
('D11111', 'Visitor System', 'Visitor office', '656-787-9060', 'Z10000'),
('D22222', 'Event System', 'Event office', '656-787-9070', 'Z10000'),
('D33333', 'Animal Trainer', 'Trainer office', '656-787-9080', 'Z10000');

-- --------------------------------------------------------

--
-- Table structure for table `event_employee`
--

CREATE TABLE `event_employee` (
  `P_ID` char(6) NOT NULL,
  `P_name` varchar(15) NOT NULL,
  `P_Gender` varchar(6) DEFAULT NULL,
  `Phone` char(12) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `P_Password` varchar(256) NOT NULL,
  `D_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `event_employee`
--

INSERT INTO `event_employee` (`P_ID`, `P_name`, `P_Gender`, `Phone`, `Email`, `P_Password`, `D_ID`) VALUES
('e00001', 'Micheal', 'male', '123-123-1235', 'micheal@gmail.com', '$2y$10$e0TPoxw5UdwqplCgHZ0qIusZA7d0ERpYdnkCm4aelzbukk9KxXxOq', 'd22222');

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE `forum_posts` (
  `post_id` int NOT NULL,
  `topic_id` int NOT NULL,
  `post_text` text,
  `post_create_time` datetime DEFAULT NULL,
  `post_owner` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`post_id`, `topic_id`, `post_text`, `post_create_time`, `post_owner`) VALUES
(1, 1, 'just testing', '2021-11-17 16:27:37', 'first@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `forum_topics`
--

CREATE TABLE `forum_topics` (
  `topic_id` int NOT NULL,
  `topic_title` varchar(150) DEFAULT NULL,
  `topic_create_time` datetime DEFAULT NULL,
  `topic_owner` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `forum_topics`
--

INSERT INTO `forum_topics` (`topic_id`, `topic_title`, `topic_create_time`, `topic_owner`) VALUES
(1, 'testing', '2021-11-17 16:27:37', 'first@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `organized`
--

CREATE TABLE `organized` (
  `EE_ID` char(6) NOT NULL,
  `E_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Visitor_ID` int NOT NULL,
  `E_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Visitor_ID`, `E_ID`) VALUES
(1, 'e00001');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `T_ID` int NOT NULL,
  `P_ID` int NOT NULL,
  `Tier_Level` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`T_ID`, `P_ID`, `Tier_Level`) VALUES
(10002, 1, 'S'),
(10003, 1, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `P_ID` int NOT NULL,
  `P_name` varchar(15) NOT NULL,
  `P_Gender` varchar(6) DEFAULT NULL,
  `Phone` char(12) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `P_Password` varchar(256) NOT NULL,
  `V_age` int DEFAULT NULL,
  `Server_ID` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`P_ID`, `P_name`, `P_Gender`, `Phone`, `Email`, `P_Password`, `V_age`, `Server_ID`) VALUES
(1, 'Hank', 'male', '222-333-4444', 'hank@gmail.com', '$2y$10$x3iBksigSeHUyWo//pTsQOIPAvaKk74U3.4Iq9g/aErYHhxUIMqfe', 27, 's00001'),
(2, 'Alice', 'female', '999-888-7777', 'alice@gmail.com', '$2y$10$BipZXRk1tw.Z.dFclaJXY.C3EUKixTolB2T6uXC62fmIlRSSQ8tF6', 12, 's00001'),
(3, 'ming', 'male', '111-111-1111', 'ming@gmail.com', '$2y$10$HRRJKlnXykz1fEc6Zs0aLe6vHiC3wByfYbh3CLlRxoshzF9MFOeS.', NULL, NULL),
(4, 'Jessica', 'female', '123-123-1234', 'jessica@gmail.com', '$2y$10$R35giTv3hGioGDj.tEV8f.xWHTKjjG5nDescUhd22jPC6O4IabVjG', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vs_employee`
--

CREATE TABLE `vs_employee` (
  `P_ID` char(6) NOT NULL,
  `P_name` varchar(15) NOT NULL,
  `P_Gender` varchar(6) DEFAULT NULL,
  `Phone` char(12) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `P_Password` varchar(256) NOT NULL,
  `D_ID` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `vs_employee`
--

INSERT INTO `vs_employee` (`P_ID`, `P_name`, `P_Gender`, `Phone`, `Email`, `P_Password`, `D_ID`) VALUES
('s00001', 'Emma', 'female', '123-123-7896', 'emma@gmail.com', '$2y$10$43bfolDLxwmU9K6EO.EF3uW10rkiL8HDuq/XnicJWa5BBYDWcNtNm', 'd22222');

-- --------------------------------------------------------

--
-- Table structure for table `zooevent`
--

CREATE TABLE `zooevent` (
  `E_ID` char(6) NOT NULL,
  `E_name` varchar(30) NOT NULL,
  `E_location` varchar(30) DEFAULT NULL,
  `E_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `zooevent`
--

INSERT INTO `zooevent` (`E_ID`, `E_name`, `E_location`, `E_time`) VALUES
('e00001', 'the first show', 'sjsu library', '11:00:00'),
('e00002', 'dolphin show', 'sjsu engineering building', '11:00:30'),
('e00003', 'cow show', 'sjsu engineering building', '11:20:00'),
('e00004', 'magic show', 'sjsu student union', '16:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `zoo_director`
--

CREATE TABLE `zoo_director` (
  `P_ID` char(6) NOT NULL,
  `P_name` varchar(15) NOT NULL,
  `P_Gender` varchar(6) DEFAULT NULL,
  `Phone` char(12) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `P_Password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `zoo_director`
--

INSERT INTO `zoo_director` (`P_ID`, `P_name`, `P_Gender`, `Phone`, `Email`, `P_Password`) VALUES
('Z10000', 'Bob', 'male', '415-366-5666', 'bob@gmail.com', '$2y$10$c3f.//7OoqHG6NJ43uOOku5.o4L/8U0LjEbzyuGzLrhRWY0ercUY6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`A_ID`),
  ADD KEY `animal_ibfk_1` (`ZD_ID`),
  ADD KEY `animal_ibfk_2` (`AT_ID`);

--
-- Indexes for table `animal_participated`
--
ALTER TABLE `animal_participated`
  ADD PRIMARY KEY (`A_ID`,`E_ID`),
  ADD KEY `animal_participated_ibfk_2` (`E_ID`);

--
-- Indexes for table `at_employee`
--
ALTER TABLE `at_employee`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `at_employee_ibfk_1` (`D_ID`);

--
-- Indexes for table `at_participated`
--
ALTER TABLE `at_participated`
  ADD PRIMARY KEY (`AT_ID`,`E_ID`),
  ADD KEY `at_participated_ibfk_2` (`E_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`D_ID`),
  ADD KEY `P_ID` (`P_ID`);

--
-- Indexes for table `event_employee`
--
ALTER TABLE `event_employee`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `D_ID` (`D_ID`);

--
-- Indexes for table `forum_posts`
--
ALTER TABLE `forum_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `forum_topics`
--
ALTER TABLE `forum_topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `organized`
--
ALTER TABLE `organized`
  ADD PRIMARY KEY (`EE_ID`,`E_ID`),
  ADD KEY `E_ID` (`E_ID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`Visitor_ID`,`E_ID`),
  ADD KEY `E_ID` (`E_ID`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`T_ID`,`P_ID`),
  ADD KEY `P_ID` (`P_ID`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `vs_employee`
--
ALTER TABLE `vs_employee`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `D_ID` (`D_ID`);

--
-- Indexes for table `zooevent`
--
ALTER TABLE `zooevent`
  ADD PRIMARY KEY (`E_ID`);

--
-- Indexes for table `zoo_director`
--
ALTER TABLE `zoo_director`
  ADD PRIMARY KEY (`P_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forum_posts`
--
ALTER TABLE `forum_posts`
  MODIFY `post_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forum_topics`
--
ALTER TABLE `forum_topics`
  MODIFY `topic_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `T_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `P_ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`ZD_ID`) REFERENCES `zoo_director` (`P_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`AT_ID`) REFERENCES `at_employee` (`P_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `animal_participated`
--
ALTER TABLE `animal_participated`
  ADD CONSTRAINT `animal_participated_ibfk_1` FOREIGN KEY (`A_ID`) REFERENCES `animal` (`A_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animal_participated_ibfk_2` FOREIGN KEY (`E_ID`) REFERENCES `zooevent` (`E_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `at_employee`
--
ALTER TABLE `at_employee`
  ADD CONSTRAINT `at_employee_ibfk_1` FOREIGN KEY (`D_ID`) REFERENCES `department` (`D_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `at_participated`
--
ALTER TABLE `at_participated`
  ADD CONSTRAINT `at_participated_ibfk_1` FOREIGN KEY (`AT_ID`) REFERENCES `at_employee` (`P_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `at_participated_ibfk_2` FOREIGN KEY (`E_ID`) REFERENCES `zooevent` (`E_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `zoo_director` (`P_ID`) ON DELETE CASCADE;

--
-- Constraints for table `event_employee`
--
ALTER TABLE `event_employee`
  ADD CONSTRAINT `event_employee_ibfk_1` FOREIGN KEY (`D_ID`) REFERENCES `department` (`D_ID`) ON DELETE CASCADE;

--
-- Constraints for table `organized`
--
ALTER TABLE `organized`
  ADD CONSTRAINT `organized_ibfk_1` FOREIGN KEY (`EE_ID`) REFERENCES `event_employee` (`P_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `organized_ibfk_2` FOREIGN KEY (`E_ID`) REFERENCES `zooevent` (`E_ID`) ON DELETE CASCADE;

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`Visitor_ID`) REFERENCES `visitor` (`P_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `register_ibfk_2` FOREIGN KEY (`E_ID`) REFERENCES `zooevent` (`E_ID`) ON DELETE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`P_ID`) REFERENCES `visitor` (`P_ID`) ON DELETE CASCADE;

--
-- Constraints for table `vs_employee`
--
ALTER TABLE `vs_employee`
  ADD CONSTRAINT `vs_employee_ibfk_1` FOREIGN KEY (`D_ID`) REFERENCES `department` (`D_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
