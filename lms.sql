-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2022 at 04:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`USERNAME`, `PASSWORD`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BOOK_ID` varchar(8) NOT NULL,
  `NAME` varchar(500) NOT NULL,
  `AUTHOR` varchar(500) NOT NULL,
  `PRICE` int(50) NOT NULL,
  `QUANTITY` int(50) NOT NULL,
  `DEPARTMENT` varchar(100) NOT NULL,
  `CLASS` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BOOK_ID`, `NAME`, `AUTHOR`, `PRICE`, `QUANTITY`, `DEPARTMENT`, `CLASS`) VALUES
('AN231', 'Multimedia Systems', 'Klara Nahrstedt, Ralf Steinmetz', 838, 10, 'Animation', 'FY'),
('CS111', 'C Programming', 'Dr. Poonam ponde', 210, 9, 'Computer Science', 'FY'),
('CS112', 'Database Management Systems', 'Dr. Reena Bharathi, Vandana Bhat', 215, 10, 'Computer Science', 'FY'),
('CS113', 'Discrete Mathematics', 'Prof. Parshuram Ahire', 230, 10, 'Computer Science', 'FY'),
('CS114', 'Matrix Algebra', 'Arun S. Pandhari', 230, 10, 'Computer Science', 'FY'),
('CS115', 'Principles of Digital Electronics', 'H.R. Arvind', 150, 10, 'Computer Science', 'FY'),
('CS116', 'Semiconductor Devices & Basic Electronic Systems', 'Dr. Deepa Ramane', 140, 10, 'Computer Science', 'FY'),
('CS231', 'Data Structure and Algorithm-I', 'Dr. Poonam Ponde', 240, 10, 'Computer Science', 'SY'),
('CS232', 'Software Engineering', 'Dr. Reena Bharathi, Seema Purandare', 145, 10, 'Computer Science', 'SY'),
('CS233', 'Microcontroller Architecture and Programming', 'H.R. Arvind', 145, 10, 'Computer Science', 'SY'),
('CS351', 'Object Oriented Programming Using Java-1', 'Dr. Poonam Ponde', 310, 10, 'Computer Science', 'TY'),
('CS352', 'Theoretical Computer Science', 'Dr. Anjali Sardesai', 370, 10, 'Computer Science', 'TY'),
('CS353', 'Operating Systems - I', 'Dr. Anjali Sardesai & Sonali Deshmukh', 255, 10, 'Computer Science', 'TY'),
('MB111', 'Basic Techniques In Microbiology', 'Prof Smita S. Patil Prof. Dr. Snehal Agnihotri, Prof. Dr. Suneeta Panicker', 450, 10, 'Microbiology', 'FY'),
('MB112', 'Introduction to Microbial World', 'Dr. Pragati S. Abhyankar , Dr. Rajashree B. Patwardhan', 400, 10, 'Microbiology', 'FY'),
('MB121', 'Bacterial Cell and Biochemistry', 'Dr. Pragati S. Abhyankar , Dr. Rajashree B. Patwardhan', 310, 10, 'Microbiology', 'FY'),
('MB231', 'Bacterial Systematics and Physiology', 'Prof. Harshada Kasar', 410, 9, 'Microbiology', 'SY'),
('MB311', 'Medical Microbiology I ', 'Dr. Patrick R. Murray', 350, 10, 'Microbiology', 'TY'),
('MB361', 'Medical Microbiology II', 'Prof. Manaswi M. Gurjar,  Prof. Sushama S. Khopkar', 410, 10, 'Microbiology', 'TY'),
('MT111', 'Linear Algebra', 'Arun Pandhari', 220, 9, 'Mathematics', 'FY'),
('MT112', 'Calculus', 'Arun S. Pandhari', 330, 10, 'Mathematics', 'FY'),
('MT231', 'Computational Geometry ', 'Parshuram Ahire, Shilpkala Jagtap', 170, 9, 'Mathematics', 'SY'),
('MT351', 'Ordinary Differential Equations–I', 'Kenneth B. Howell', 270, 10, 'Mathematics', 'TY'),
('MT361', 'Partial Differential Equations-I', 'Michael E. Taylor', 430, 10, 'Mathematics', 'TY'),
('PSY111', 'Foundations of Psychology', 'Nicky Hayes', 510, 10, 'Psychology', 'FY'),
('PSY112', 'Introduction to Social Psychology', 'William McDougall', 450, 9, 'Psychology', 'FY'),
('PSY231', 'Developmental Psychology', '	Alan Slater; J Gavin Bremner', 210, 10, 'Psychology', 'SY'),
('PSY232', 'Theories of Personality', 'Gregory Feist, Tomi-Ann Roberts', 550, 10, 'Psychology', 'SY');

-- --------------------------------------------------------

--
-- Table structure for table `issue_book`
--

CREATE TABLE `issue_book` (
  `BOOK_ID` varchar(20) NOT NULL,
  `STUDENT_EMAIL` varchar(200) NOT NULL,
  `BOOK_NAME` varchar(200) NOT NULL,
  `AUTHOR` varchar(200) NOT NULL,
  `STUDENT_NAME` varchar(200) NOT NULL,
  `ROLL_NO` varchar(20) NOT NULL,
  `CLASS` varchar(20) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `PRICE` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `issue_book`
--

INSERT INTO `issue_book` (`BOOK_ID`, `STUDENT_EMAIL`, `BOOK_NAME`, `AUTHOR`, `STUDENT_NAME`, `ROLL_NO`, `CLASS`, `DATE`, `PRICE`) VALUES
('CS111', 'jeet@gmail.com', 'C Programming', 'Dr. Poonam ponde', 'Abhijeet Hambir', '3001', 'TY', '23-02-2022', ''),
('PSY112', 'aish@gmail.com', 'Introduction to Social Psychology', 'William McDougall', 'Aish Gole', '3002', 'TY', '23-02-2022', ''),
('MB231', 'saurabh@gmail.com', 'Bacterial Systematics and Physiology', 'Prof. Harshada Kasar', 'Saurabh Yadav', '1003', 'FY', '23-02-2022', ''),
('MT111', 'kranti@gmail.com', 'Linear Algebra', 'Arun Pandhari', 'Kranti Bhujbal', '2001', 'SY', '23-02-2022', ''),
('MT231', 'kranti@gmail.com', 'Computational Geometry ', 'Parshuram Ahire, Shilpkala Jagtap', 'Kranti Bhujbal', '2001', 'SY', '23-02-2022', '');

-- --------------------------------------------------------

--
-- Table structure for table `return_book`
--

CREATE TABLE `return_book` (
  `BOOK_ID` varchar(20) NOT NULL,
  `BOOK_NAME` varchar(100) NOT NULL,
  `STUDENT_NAME` varchar(100) NOT NULL,
  `ROLL_NO` varchar(20) NOT NULL,
  `CLASS` varchar(20) NOT NULL,
  `STUDENT_EMAIL` varchar(200) NOT NULL,
  `AUTHOR` varchar(100) NOT NULL,
  `PRICE` varchar(100) NOT NULL,
  `ISSUE_DATE` varchar(100) NOT NULL,
  `RETURN_DATE` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `return_book`
--

INSERT INTO `return_book` (`BOOK_ID`, `BOOK_NAME`, `STUDENT_NAME`, `ROLL_NO`, `CLASS`, `STUDENT_EMAIL`, `AUTHOR`, `PRICE`, `ISSUE_DATE`, `RETURN_DATE`) VALUES
('CS111', 'C Programming', 'Kranti Bhujbal', '2001', 'SY', 'kranti@gmail.com', 'Dr. Poonam ponde', '', '23-02-2022', '23-02-2022'),
('CS231', 'Data Structure and Algorithm-I', 'Abhijeet Hambir', '3001', 'TY', 'jeet@gmail.com', 'Dr. Poonam Ponde', '', '23-02-2022', '23-02-2022'),
('PSY111', 'Foundations of Psychology', 'Aish Gole', '3002', 'TY', 'aish@gmail.com', 'Nicky Hayes', '', '23-02-2022', '23-02-2022'),
('MB111', 'Basic Techniques In Microbiology', 'Saurabh Yadav', '1003', 'FY', 'saurabh@gmail.com', 'Prof Smita S. Patil Prof. Dr. Snehal Agnihotri, Prof. Dr. Suneeta Panicker', '', '23-02-2022', '23-02-2022');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(8) NOT NULL,
  `ROLL_NO` varchar(10) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `EMAIL` varchar(500) NOT NULL,
  `CLASS` varchar(100) NOT NULL,
  `DEPARTMENT` varchar(200) NOT NULL,
  `MOBILE_NO` varchar(50) NOT NULL,
  `PASSWORD` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `ROLL_NO`, `NAME`, `EMAIL`, `CLASS`, `DEPARTMENT`, `MOBILE_NO`, `PASSWORD`) VALUES
(1, '3001', 'Abhijeet Hambir', 'jeet@gmail.com', 'TY', 'Computer Science', '8326985245', 'jeet@123'),
(2, '3002', 'Aish Gole', 'aish@gmail.com', 'TY', 'Psychology', '8355313033', 'aish@123'),
(3, '1003', 'Saurabh Yadav', 'saurabh@gmail.com', 'FY', 'Microbiology', '9865741203', 'saurabh@123'),
(4, '2001', 'Kranti Bhujbal', 'kranti@gmail.com', 'SY', 'Mathematics', '8326859610', 'kranti@123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BOOK_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
