-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 01, 2020 at 05:06 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `no_of_pages` int(6) NOT NULL,
  `qty` int(5) NOT NULL,
  PRIMARY KEY (`bookid`),
  UNIQUE KEY `bname` (`bname`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookid`, `bname`, `author`, `category`, `price`, `no_of_pages`, `qty`) VALUES
(2, 'ABCD', 'Raj', 'CS&IT', 500, 689, 14),
(3, 'XYZ', 'Aryan', 'IT', 399, 364, 14),
(12, 'Programming C#', 'Veer', 'Mech', 250, 455, 8),
(14, 'JJA', 'Kiran', 'Mech.', 112, 88, 5);

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

DROP TABLE IF EXISTS `contact_form`;
CREATE TABLE IF NOT EXISTS `contact_form` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_posted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`name`, `email`, `subject`, `message`, `date_posted`) VALUES
('Raj', 'raj@gmail.com', 'Tesing Page', 'Hello How Are  You Sir?', '2020-06-04'),
('Harshit', 'harshit.garg121@gmail.com', 'MCA quiz', 'XYZ word 2 word 3 word 4 word 5', '2020-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `issued`
--

DROP TABLE IF EXISTS `issued`;
CREATE TABLE IF NOT EXISTS `issued` (
  `issue_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `reg_no` varchar(12) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `return_status` varchar(50) NOT NULL,
  PRIMARY KEY (`issue_id`),
  KEY `uid` (`reg_no`),
  KEY `book_id` (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `issued`
--

INSERT INTO `issued` (`issue_id`, `book_id`, `reg_no`, `issue_date`, `return_date`, `return_status`) VALUES
(2, 3, 'ADMIN1', '2020-06-03', '2020-06-18', 'returned'),
(3, 2, 'ADMIN1', '2020-06-02', '2020-06-17', 'issued'),
(4, 14, 'ADMIN1', '2020-06-06', '2020-06-21', 'returned'),
(5, 12, '19MCA0056', '2020-06-06', '2020-06-21', 'returned'),
(6, 12, '19MCA0056', '2020-06-06', '2020-06-21', 'issued'),
(7, 12, 'ADMIN1', '2020-06-06', '2020-06-21', 'issued');

-- --------------------------------------------------------

--
-- Table structure for table `returnb`
--

DROP TABLE IF EXISTS `returnb`;
CREATE TABLE IF NOT EXISTS `returnb` (
  `issue_id` int(11) NOT NULL,
  `returned_date` date NOT NULL,
  `fine` float NOT NULL,
  KEY `issue_id` (`issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `returnb`
--

INSERT INTO `returnb` (`issue_id`, `returned_date`, `fine`) VALUES
(2, '2020-06-03', 0),
(4, '2020-06-06', 0),
(5, '2020-06-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shelf`
--

DROP TABLE IF EXISTS `shelf`;
CREATE TABLE IF NOT EXISTS `shelf` (
  `shelf_no` int(4) NOT NULL,
  `floor` varchar(25) NOT NULL,
  `row` int(4) NOT NULL,
  `col` int(4) NOT NULL,
  `bookid` int(11) NOT NULL,
  PRIMARY KEY (`shelf_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shelf`
--

INSERT INTO `shelf` (`shelf_no`, `floor`, `row`, `col`, `bookid`) VALUES
(1, 'Ground', 1, 1, 2),
(2, 'Ground', 1, 1, 12),
(6, 'Ground', 2, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `reg_no` varchar(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `course` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  PRIMARY KEY (`reg_no`),
  UNIQUE KEY `email` (`email`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`reg_no`, `email`, `password`, `fname`, `lname`, `gender`, `course`, `question`, `answer`) VALUES
('19MCA0001', 'senthil.kumar@vit.ac.in', 'Qwerty@123', 'Senthil', 'Kumar N', 'MCA', 'male', 'mWhat is you nick name in childhood?', 'Sir'),
('19MCA0056', 'harshit.garg121@gmail.com', 'Qwerty@123', 'Harshit', 'GArg', 'MCA', 'male', 'mWhat is you nick name in childhood?', 'MONA'),
('ADMIN1', 'admin@gmail.com', 'Qwerty@123', 'Library', 'Admin', 'NA', 'male', 'What is you nick name in childhood?', 'NA');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `issued`
--
ALTER TABLE `issued`
  ADD CONSTRAINT `issued_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`bookid`),
  ADD CONSTRAINT `uid` FOREIGN KEY (`reg_no`) REFERENCES `user` (`reg_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `returnb`
--
ALTER TABLE `returnb`
  ADD CONSTRAINT `returnb_ibfk_1` FOREIGN KEY (`issue_id`) REFERENCES `issued` (`issue_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
