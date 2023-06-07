-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2012 at 08:04 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `course_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `as_ID` int(11) NOT NULL AUTO_INCREMENT,
  `as_name` varchar(50) NOT NULL,
  `as_extension` varchar(10) NOT NULL,
  `as_info` varchar(50) NOT NULL,
  `as_upload_date` date NOT NULL,
  `as_link` varchar(50) NOT NULL,
  `student_ID` varchar(10) NOT NULL,
  `teacher_ID` varchar(10) NOT NULL,
  `course_ID` varchar(10) NOT NULL,
  `as_author` varchar(50) NOT NULL,
  `as_hits` int(11) DEFAULT NULL,
  PRIMARY KEY (`as_ID`),
  KEY `student_ID` (`student_ID`),
  KEY `teacher_ID` (`teacher_ID`),
  KEY `course_ID` (`course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `assignment`
--


-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_ID` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_credit` decimal(3,2) NOT NULL,
  `course_type` char(1) NOT NULL,
  `course_no` varchar(20) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `for_std_of_dept` varchar(20) NOT NULL,
  `level` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  PRIMARY KEY (`course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_ID`, `course_name`, `course_credit`, `course_type`, `course_no`, `dept`, `for_std_of_dept`, `level`, `term`) VALUES
('CE_309', 'Fluid dynamics', 3.00, 'T', 'CE 309', 'CE', 'CE', 3, 1),
('CE_401', 'Basic design principles', 3.00, 'T', 'CE 401', 'CE', 'CE', 4, 2),
('CSE_300', 'Compilers', 0.75, 'S', 'CSE 300', 'CSE', 'CSE', 3, 1),
('CSE_301', 'Concrete math', 3.00, 'T', 'CSE 301', 'CSE', 'CSE', 3, 2),
('CSE_313', 'Operating System Concept', 3.00, 'T', 'CSE 313', 'CSE', 'CSE', 3, 2),
('CSE_322', 'Networking', 0.75, 'S', 'CSE 322', 'CSE', 'CSE', 3, 2),
('EEE_206', 'Electrical machines', 1.50, 'S', 'EEE 206', 'EEE', 'EEE', 2, 1),
('EEE_215', 'Electromagnetics', 4.00, 'T', 'EEE 215', 'EEE', 'EEE', 2, 2),
('IPE_304', 'Machine design', 2.00, 'S', 'IPE 304', 'IPE', 'IPE', 3, 1),
('ME_231', 'Thermodynamics', 4.00, 'T', 'ME 231', 'ME', 'ME', 2, 2),
('MME_402', 'Mechanical drawing', 1.50, 'S', 'MME 402', 'MME', 'MME', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `file_ID` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(500) NOT NULL,
  `file_extension` varchar(10) NOT NULL,
  `file_info` varchar(50) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `file_link` varchar(120) NOT NULL,
  `teacher_ID` varchar(10) NOT NULL,
  `course_ID` varchar(10) NOT NULL,
  `author` varchar(50) NOT NULL,
  `file_size_in_bytes` int(11) DEFAULT NULL,
  PRIMARY KEY (`file_ID`),
  KEY `teacher_ID` (`teacher_ID`),
  KEY `course_ID` (`course_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`file_ID`, `file_name`, `file_extension`, `file_info`, `upload_date`, `file_link`, `teacher_ID`, `course_ID`, `author`, `file_size_in_bytes`) VALUES
(2, 'C & C++ Programming Style Guidlines - Fred Richards.pdf', '"applicati', 'e-book', '2012-10-05 11:16:27', 'C:\\xampp\\htdocs\\course_management\\uploaded_files\\CSE_300\\C & C++ Programming Style Guidlines - Fred Richards.pdf', 'cse002', 'CSE_300', 'Sukarna Barua', 171348),
(3, 'C++programing e book.pdf', '"applicati', 'e-book', '2012-10-05 11:17:10', 'C:\\xampp\\htdocs\\course_management\\uploaded_files\\CSE_300\\C++programing e book.pdf', 'cse002', 'CSE_300', 'Sukarna Barua', 3119689),
(4, 'Android workshop HSF.pdf', '"applicati', 'e-book', '2012-10-05 11:24:26', 'C:\\xampp\\htdocs\\course_management\\uploaded_files\\CSE_300\\Android workshop HSF.pdf', 'cse002', 'CSE_300', 'Sukarna Barua', 74188),
(5, 'New Text Document.txt', 'text/plain', 'e-book', '2012-10-05 11:26:04', 'C:\\xampp\\htdocs\\course_management\\uploaded_files\\CSE_300\\New Text Document.txt', 'cse002', 'CSE_300', 'Sukarna Barua', 13),
(6, '01.mp3', 'audio/mpeg', 'e-book', '2012-10-05 11:28:27', 'C:\\xampp\\htdocs\\course_management\\uploaded_files\\CSE_300\\01.mp3', 'cse002', 'CSE_300', 'Sukarna Barua', 7319685),
(7, 'Ami Birangona Bolsi.pdf', '"applicati', 'e-book', '2012-10-05 11:41:12', 'C:\\xampp\\htdocs\\course_management\\uploaded_files\\CSE_300\\Ami Birangona Bolsi.pdf', 'cse002', 'CSE_300', 'Sukarna Barua', 4788133),
(8, 'Beginning C++ Game Programming - Michael Dawson.chm', '"applicati', 'e-book', '2012-10-05 11:43:29', 'C:\\xampp\\htdocs\\course_management\\uploaded_files\\CSE_300\\Beginning C++ Game Programming - Michael Dawson.chm', 'cse002', 'CSE_300', 'Sukarna Barua', 4786491),
(9, 'The Complete Reference Borland C++ Builder - Herb Schildt.pdf', '"applicati', 'e-book', '2012-10-05 11:50:46', 'C:\\xampp\\htdocs\\course_management\\uploaded_files\\CSE_300\\The Complete Reference Borland C++ Builder - Herb Schildt.pdf', 'cse002', 'CSE_300', 'Sukarna Barua', 9497426),
(10, 'DEITEL.pdf', 'applicatio', 'e-book', '2012-10-05 12:01:03', 'C:\\xampp\\htdocs\\course_management\\uploaded_files\\CSE_300\\DEITEL.pdf', 'cse002', 'CSE_300', 'Sukarna Barua', 40013652),
(11, 'Head First Networking.pdf', 'applicatio', 'e-book', '2012-10-05 12:03:08', 'C:\\xampp\\htdocs\\course_management\\uploaded_files\\CSE_300\\Head First Networking.pdf', 'cse002', 'CSE_300', 'Sukarna Barua', 48177161);

-- --------------------------------------------------------

--
-- Table structure for table `marks_sheet_sessional`
--

CREATE TABLE IF NOT EXISTS `marks_sheet_sessional` (
  `student_ID` varchar(10) NOT NULL,
  `course_ID` varchar(10) NOT NULL,
  `AS1_marks` decimal(3,2) DEFAULT NULL,
  `AS2_marks` decimal(3,2) DEFAULT NULL,
  `AS3_marks` decimal(3,2) DEFAULT NULL,
  `AS4_marks` decimal(3,2) DEFAULT NULL,
  `AS5_marks` decimal(3,2) DEFAULT NULL,
  `AS6_marks` decimal(3,2) DEFAULT NULL,
  `AS7_marks` decimal(3,2) DEFAULT NULL,
  `AS8_marks` decimal(3,2) DEFAULT NULL,
  `AS9_marks` decimal(3,2) DEFAULT NULL,
  `AS10_marks` decimal(3,2) DEFAULT NULL,
  `AS11_marks` decimal(3,2) DEFAULT NULL,
  `AS12_marks` decimal(3,2) DEFAULT NULL,
  `AS13_marks` decimal(3,2) DEFAULT NULL,
  `AS14_marks` decimal(3,2) DEFAULT NULL,
  `AS15_marks` decimal(3,2) DEFAULT NULL,
  `AS16_marks` decimal(3,2) DEFAULT NULL,
  `AS17_marks` decimal(3,2) DEFAULT NULL,
  `AS18_marks` decimal(3,2) DEFAULT NULL,
  `AS19_marks` decimal(3,2) DEFAULT NULL,
  `AS20_marks` decimal(3,2) DEFAULT NULL,
  PRIMARY KEY (`student_ID`,`course_ID`),
  KEY `course_ID` (`course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks_sheet_sessional`
--


-- --------------------------------------------------------

--
-- Table structure for table `marks_sheet_theory`
--

CREATE TABLE IF NOT EXISTS `marks_sheet_theory` (
  `student_ID` varchar(10) NOT NULL,
  `course_ID` varchar(10) NOT NULL,
  `CT1_marks` decimal(3,2) DEFAULT NULL,
  `CT2_marks` decimal(3,2) DEFAULT NULL,
  `CT3_marks` decimal(3,2) DEFAULT NULL,
  `CT4_marks` decimal(3,2) DEFAULT NULL,
  `CT5_marks` decimal(3,2) DEFAULT NULL,
  `CT6_marks` decimal(3,2) DEFAULT NULL,
  `CT7_marks` decimal(3,2) DEFAULT NULL,
  `CT8_marks` decimal(3,2) DEFAULT NULL,
  `CT9_marks` decimal(3,2) DEFAULT NULL,
  PRIMARY KEY (`student_ID`,`course_ID`),
  KEY `course_ID` (`course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks_sheet_theory`
--


-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `std_ID` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `sex` char(1) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `cgpa` decimal(3,2) DEFAULT NULL,
  PRIMARY KEY (`std_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_ID`, `password`, `firstname`, `lastname`, `sex`, `dept`, `level`, `term`, `cgpa`) VALUES
('0605004', '0605004', 'Santu', 'Larma', 'M', 'ME', 2, 1, 0.00),
('0704081', '0704081', 'Ahmed', 'Ali', 'M', 'MME', 0, 0, 3.87),
('0805001', '0805001', 'Ishat', 'E Rabban', 'M', 'CSE', 4, 2, 3.90),
('0805002', '0805002', 'Radi', 'Mahmud Reza', 'M', 'CSE', 4, 1, 3.95),
('0805021', '0805021', 'Himel', 'Dev', 'M', 'CSE', 4, 2, 3.86),
('0805101', '0805101', 'Sunny', 'Amin', 'F', 'CSE', 3, 2, 2.90),
('0906021', '0906021', 'Shad', 'Aziz Mia', 'M', 'EEE', 3, 2, 3.23),
('0910031', '0910031', 'Imran', 'Morshed', 'M', 'ME', 3, 2, 3.67),
('1006113', '1006113', 'Isha', 'Rabbany', 'M', 'EEE', 3, 1, 3.53);

-- --------------------------------------------------------

--
-- Table structure for table `student_course`
--

CREATE TABLE IF NOT EXISTS `student_course` (
  `student_ID` varchar(10) NOT NULL,
  `course_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`student_ID`,`course_ID`),
  KEY `course_ID` (`course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_course`
--

INSERT INTO `student_course` (`student_ID`, `course_ID`) VALUES
('1006113', 'CE_309'),
('0805001', 'CE_401'),
('0805021', 'CE_401'),
('1006113', 'CSE_300'),
('0805101', 'CSE_301'),
('0906021', 'CSE_301'),
('0910031', 'CSE_301'),
('0906021', 'CSE_313'),
('0910031', 'CSE_313'),
('0805101', 'CSE_322'),
('0906021', 'CSE_322'),
('0910031', 'CSE_322'),
('1006113', 'IPE_304'),
('0805001', 'MME_402'),
('0805021', 'MME_402');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_ID` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `sex` char(1) NOT NULL,
  `dept` varchar(10) NOT NULL,
  `faculty` varchar(10) NOT NULL,
  `designation` varchar(40) NOT NULL,
  PRIMARY KEY (`teacher_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_ID`, `password`, `firstname`, `lastname`, `sex`, `dept`, `faculty`, `designation`) VALUES
('ce0045', 'ce0045', 'Saidur', 'Morshed', 'M', 'CE', 'CE', 'Professor'),
('ce0073', 'ce0073', 'Subol', 'Banik', 'M', 'CE', 'CE', 'Lecturer'),
('ce1024', 'ce1024', 'Mosharraf', 'Karim', 'M', 'CE', 'CE', 'Lecturer'),
('cse001', 'cse001', 'Latiful', 'Hoque', 'M', 'CSE', 'EEE', 'Professor'),
('cse002', 'cse002', 'Sukarna', 'Barua', 'M', 'CSE', 'EEE', 'Lecturer'),
('cse003', 'cse003', 'Sayeed', 'Mondol', 'M', 'CSE', 'EEE', 'Associate professor'),
('eee124', 'eee124', 'Sharna', 'Barua', 'F', 'EEE', 'EEE', 'Assistant professor'),
('me0167', 'me0167', 'Sarafat', 'Rehman', 'M', 'ME', 'ME', 'Lecturer'),
('mme082', 'mme082', 'Samira', 'Basher', 'F', 'MME', 'ChE', 'Associate professor'),
('superadmin', 'superadmin', 'Super', 'Admin', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_course`
--

CREATE TABLE IF NOT EXISTS `teacher_course` (
  `teacher_ID` varchar(50) NOT NULL,
  `course_ID` varchar(50) NOT NULL,
  PRIMARY KEY (`teacher_ID`,`course_ID`),
  KEY `course_ID` (`course_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_course`
--

INSERT INTO `teacher_course` (`teacher_ID`, `course_ID`) VALUES
('ce0073', 'CE_309'),
('ce0045', 'CE_401'),
('cse001', 'CSE_300'),
('cse002', 'CSE_300'),
('cse003', 'CSE_300'),
('cse001', 'CSE_301'),
('cse002', 'CSE_301'),
('eee124', 'EEE_215'),
('me0167', 'ME_231'),
('mme082', 'MME_402');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_3` FOREIGN KEY (`student_ID`) REFERENCES `student` (`std_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_4` FOREIGN KEY (`teacher_ID`) REFERENCES `teacher` (`teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignment_ibfk_5` FOREIGN KEY (`course_ID`) REFERENCES `course` (`course_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_ibfk_3` FOREIGN KEY (`teacher_ID`) REFERENCES `teacher` (`teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `file_ibfk_4` FOREIGN KEY (`course_ID`) REFERENCES `course` (`course_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks_sheet_sessional`
--
ALTER TABLE `marks_sheet_sessional`
  ADD CONSTRAINT `marks_sheet_sessional_ibfk_3` FOREIGN KEY (`student_ID`) REFERENCES `student` (`std_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_sheet_sessional_ibfk_4` FOREIGN KEY (`course_ID`) REFERENCES `course` (`course_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `marks_sheet_theory`
--
ALTER TABLE `marks_sheet_theory`
  ADD CONSTRAINT `marks_sheet_theory_ibfk_3` FOREIGN KEY (`student_ID`) REFERENCES `student` (`std_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `marks_sheet_theory_ibfk_4` FOREIGN KEY (`course_ID`) REFERENCES `course` (`course_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_course`
--
ALTER TABLE `student_course`
  ADD CONSTRAINT `student_course_ibfk_3` FOREIGN KEY (`student_ID`) REFERENCES `student` (`std_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_course_ibfk_4` FOREIGN KEY (`course_ID`) REFERENCES `course` (`course_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_course`
--
ALTER TABLE `teacher_course`
  ADD CONSTRAINT `teacher_course_ibfk_3` FOREIGN KEY (`teacher_ID`) REFERENCES `teacher` (`teacher_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_course_ibfk_4` FOREIGN KEY (`course_ID`) REFERENCES `course` (`course_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
