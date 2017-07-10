-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2017 at 06:20 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `copies` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `author`, `publisher`, `category`, `copies`) VALUES
(1, 'The Internet Of Things', 'Anupama Raman', 'Wiley', 'Technology', 13),
(2, 'How Linux Works', 'Brian Ward', 'O\'reilly', 'Operating Systems', 24),
(3, 'Learn Android Studio', 'Adam Gerber', 'Pearson', 'Programming', 35),
(4, 'Test Driven Development in Ruby', 'Bala Paranj', 'Wiley', 'Programming', 24),
(5, 'Introduction to Computer Networking', 'Thomas Robertazzi', 'McGraw Hill', 'Networking & Cloud Computing', 25),
(6, 'Data Analytics with Hadoop', 'Jenny Kim', 'O\'reilly', 'Databases', 34),
(7, 'VMware vSphere for Dummies', 'Daniel Mitchell', 'Pearson', 'Technology', 24),
(8, 'The Cloud DBA-Oracle', 'Abhi Jain', 'Pearson', 'Cloud Computing', 27),
(9, 'Big Data Analytics with R and Hadoop', 'Vignesh Prajapati', 'McGraw Hill', 'Databases', 35),
(10, 'Personal Cybersecurity', 'Marvin Waschke', 'Pearson', 'Networking & Scurity', 35);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `returned_on` date DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `fine` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `book_id`, `user_id`, `issue_date`, `return_date`, `returned_on`, `status`, `fine`) VALUES
(1, 1, 10, '2017-01-10', '2017-01-17', '2017-04-14', 'returned', 261),
(2, 8, 17, '2017-01-17', '2017-01-24', NULL, 'pending', NULL),
(3, 8, 6, '2017-01-23', '2017-02-01', NULL, 'pending', NULL),
(4, 8, 15, '2017-02-06', '2017-02-13', NULL, 'pending', NULL),
(5, 7, 5, '2017-02-11', '2017-02-18', NULL, 'pending', NULL),
(6, 1, 2, '2017-03-16', '2017-03-23', NULL, 'pending', NULL),
(7, 6, 8, '2017-03-25', '2017-04-02', NULL, 'pending', NULL),
(8, 2, 16, '2017-03-06', '2017-03-12', NULL, 'pending', NULL),
(9, 4, 12, '2017-03-08', '2017-03-15', '2017-04-14', 'returned', 90),
(10, 4, 10, '2017-04-10', '2017-04-17', '2017-04-14', 'returned', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(15) NOT NULL,
  `firstname` varchar(15) DEFAULT NULL,
  `lastname` varchar(15) DEFAULT NULL,
  `designation` varchar(30) DEFAULT NULL,
  `department` varchar(30) NOT NULL,
  `mobile` bigint(10) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `user_id`, `username`, `firstname`, `lastname`, `designation`, `department`, `mobile`, `email`) VALUES
(1, 2, 'rajan', 'Rajan', 'Kelaskar', 'Professor', 'Computer', 7568945365, 'rajankelaskar@gmail.com'),
(2, 4, 'manoj', 'Manoj', 'Sahu', 'Librarian', 'Library', 7891564432, 'manojsahu@gmail.com'),
(3, 10, 'viraj', 'Viraj', 'Tawade', 'Professor', 'Electronics', 7806546442, 'tawadev@gmail.com'),
(4, 14, 'siddhant', 'Siddhant', 'Kuveskar', 'Professor', 'Electronics', 8806546455, 'sidkuves@gmail.com'),
(5, 15, 'rohan', 'Rohan', 'Kale', 'Professor', 'Electronics', 7756554645, 'kalerohan@gmail.com'),
(6, 16, 'omkar', 'Omkar', 'Mane', 'Professor', 'IT', 8906354649, 'ommane@gmail.com'),
(7, 17, 'mahendra', 'Mahendra', 'Gurav', 'Professor', 'ET', 9850646436, 'guravmahendra@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `department` varchar(15) NOT NULL,
  `year` int(1) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `user_id`, `username`, `firstname`, `lastname`, `department`, `year`, `mobile`, `email`) VALUES
(1, 3, 'sagar', 'Sagar', 'Nath', 'Computer', 3, 8956457553, 'nathsagar@gmail.com'),
(2, 5, 'rahul', 'Rahul', 'Kamble', 'Computer', 2, 8453215853, 'rrkamble@gmail.com'),
(3, 6, 'sumedh', 'Sumedh', 'Kapse', 'Electronics', 3, 8565753267, 'sumkapse@gmail.com'),
(4, 7, 'aditya', 'Aditya', 'Chavan', 'Computer', 3, 9565753268, 'adichavan@gmail.com'),
(5, 8, 'saahil', 'Saahil', 'Anande', 'IT', 4, 9565453268, 'anandesaahil@gmail.com'),
(6, 9, 'rohit', 'Rohit', 'Chavan', 'Computer', 3, 9756453223, 'chavanrohit@gmail.com'),
(7, 11, 'pratik', 'Pratik', 'Dhavale', 'ET', 1, 9856753225, 'pratikdhavale@gmail.com'),
(8, 12, 'siddharth', 'Siddharth', 'Mondal', 'Computer', 2, 7564575325, 'sidmondol@gmail.com'),
(9, 13, 'nipun', 'Nipun', 'Parab', 'Electronics', 3, 7764575325, 'nipunparab@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', 'Admin'),
(2, 'rajan', 'rajan', 'Staff'),
(3, 'sagar', 'sagar', 'Student'),
(4, 'manoj', 'manoj', 'Librarian'),
(5, 'rahul', 'rahul', 'Student'),
(6, 'sumedh', 'sumedh', 'Student'),
(7, 'aditya', 'aditya', 'Student'),
(8, 'saahil', 'saahil', 'Student'),
(9, 'rohit', 'rohit', 'Student'),
(10, 'viraj', 'viraj', 'Staff'),
(11, 'pratik', 'pratik', 'Student'),
(12, 'siddharth', 'siddharth', 'Student'),
(13, 'nipun', 'nipun', 'Student'),
(14, 'siddhant', 'siddhant', 'Staff'),
(15, 'rohan', 'rohan', 'Staff'),
(16, 'omkar', 'omkar', 'Staff'),
(17, 'mahendra', 'mahendra', 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `uid` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `uid` (`user_id`),
  ADD KEY `username_2` (`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `uid` (`user_id`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `book` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
