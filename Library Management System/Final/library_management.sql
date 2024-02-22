-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 07:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `first name` varchar(500) NOT NULL,
  `last name` varchar(500) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `ID` int(50) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`first name`, `last name`, `username`, `password`, `ID`, `email`, `phone`) VALUES
('John', 'Carter', 'john123', '$2y$10$jY6MVza/F3L0vOYIEoDQqeGgCgEU5oqhiXoQxemz4w.NjXu1f9GUu', 21231094, 'john@yahoo.com', 1793178332);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Authors_name` varchar(100) NOT NULL,
  `edition` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `Name`, `Authors_name`, `edition`, `status`, `quantity`, `department`) VALUES
(1, 'Algorithms', 'Sanjoy Dasgupta, Umesh Vazirani, Christos Papadimitriou', '4th', 'Not Available', 1, 'CSE'),
(2, 'The Intel Microprocessors', 'Barry B. Brey', '8th', 'Available', 2, 'CSE'),
(3, 'The Cruel Birth of Bangladesh', 'Archer Blood', '1st', 'Available', 10, 'History'),
(4, 'Quantum Mechanics', 'David J. Griffiths', '3rd', 'Not Available', 8, 'Physics'),
(5, 'Principles of Macroeconomics', 'N. Gregory Mankiw', '7th', 'Available', 5, 'Economics'),
(6, 'Pharmaceutical Chemistry', 'David G. Watson', '5th', 'Not Available', 4, 'Pharmacy'),
(7, 'Introduction to Business', 'O. C. Ferrell, Geoffrey A. Hirt, Linda Ferrell', '13th', 'Available', 7, 'BBA'),
(8, 'Architecture: Form, Space, and Order', 'Francis D. K. Ching', '4th', 'Available', 3, 'Architecture'),
(9, 'English Grammar in Use', 'Raymond Murphy', '5th', 'Available', 9, 'English'),
(10, 'Data Structures and Algorithms', 'Michael T. Goodrich, Roberto Tamassia', '6th', 'Not Available', 5, 'CSE'),
(11, 'Electric Circuits', 'James W. Nilsson, Susan A. Riedel', '11th', 'Available', 4, 'EEE'),
(12, 'Modern Physics', 'Randy Harris', '3rd', 'Available', 6, 'Physics'),
(13, 'Microeconomics', 'Paul Krugman, Robin Wells', '5th', 'Not Available', 8, 'Economics'),
(14, 'Medicinal Chemistry', 'Thomas Nogrady, Donald F. Weaver', '6th', 'Available', 3, 'Pharmacy'),
(15, 'Marketing Management', 'Philip Kotler, Kevin Lane Keller', '15th', 'Not Available', 7, 'BBA'),
(16, 'Architectural Graphics', 'Francis D. K. Ching', '6th', 'Available', 7, 'Architecture'),
(17, 'English Vocabulary in Use', 'Michael McCarthy, Felicity O\'Dell', '4th', 'Available', 9, 'English'),
(18, 'Introduction to Algorithms', 'Thomas H. Cormen, Charles E. Leiserson', '3rd', 'Available', 6, 'CSE'),
(19, 'Digital Electronics', 'Roger L. Tokheim', '8th', 'Available', 5, 'EEE'),
(20, 'Nuclear Physics', 'Kenneth S. Krane', '3rd', 'Available', 3, 'Physics'),
(21, 'Development Economics', 'Debraj Ray', '1st', 'Not Available', 10, 'Economics'),
(22, 'Pharmacology', 'Christopher P. Landrum', '7th', 'Available', 8, 'Pharmacy'),
(23, 'Financial Accounting', 'Walter T. Harrison Jr., Charles T. Horngren', '10th', 'Available', 6, 'BBA'),
(24, 'Architectural Design', 'Francis D. K. Ching', '8th', 'Not Available', 5, 'Architecture'),
(25, 'English Grammar in Use', 'Raymond Murphy', '5th', 'Available', 7, 'English'),
(26, 'Data Structures and Algorithms', 'Adam Drozdek', '4th', 'Available', 9, 'CSE'),
(27, 'Power Systems', 'J. Duncan Glover, Mulukutla S. Sarma', '5th', 'Available', 4, 'EEE'),
(28, 'Quantum Mechanics', 'David J. Griffiths', '3rd', 'Not Available', 6, 'Physics'),
(29, 'International Trade', 'Paul Krugman, Maurice Obstfeld', '10th', 'Available', 8, 'Economics'),
(30, 'Pharmaceutical Analysis', 'David G. Watson', '4th', 'Available', 7, 'Pharmacy'),
(31, 'Marketing Management', 'Philip Kotler', '15th', 'Available', 10, 'BBA'),
(32, 'Architectural Drawing', 'Francis D. K. Ching', '9th', 'Not Available', 5, 'Architecture'),
(33, 'Advanced English Vocabulary', 'Mark Fletcher', '2nd', 'Available', 7, 'English'),
(34, 'Database Systems', 'Thomas Connolly, Carolyn Begg', '6th', 'Available', 9, 'CSE'),
(35, 'Electromagnetic Fields', 'Roald K. Wangsness', '3rd', 'Not Available', 5, 'EEE'),
(36, 'Astrophysics', 'Neil deGrasse Tyson', '1st', 'Available', 4, 'Physics'),
(37, 'Managerial Economics', 'Ivan Png', '3rd', 'Available', 8, 'Economics'),
(38, 'Clinical Pharmacy', 'Joseph T. DiPiro', '6th', 'Available', 5, 'Pharmacy'),
(39, 'Business Ethics', 'Andrew Crane, Dirk Matten', '5th', 'Available', 10, 'BBA'),
(40, 'Architectural History', 'Spiro Kostof', '4th', 'Not Available', 6, 'Architecture'),
(41, 'English Literature Classics', 'Various Authors', '10th', 'Available', 12, 'English'),
(42, 'Data Mining and Analytics', 'Margaret H. Dunham', '5th', 'Available', 9, 'CSE'),
(43, 'Power Electronics', 'Ned Mohan', '4th', 'Not Available', 7, 'EEE'),
(44, 'Quantum Mechanics', 'David J. Griffiths', '2nd', 'Available', 6, 'Physics'),
(45, 'Microeconomics', 'Paul Krugman, Robin Wells', '5th', 'Available', 11, 'Economics'),
(46, 'Pharmaceutical Chemistry', 'Donald Cairns', '3rd', 'Available', 8, 'Pharmacy'),
(47, 'Organizational Behavior', 'Stephen P. Robbins, Timothy A. Judge', '17th', 'Available', 9, 'BBA'),
(48, 'Sustainable Architecture', 'David Bergman', '1st', 'Available', 0, 'Architecture'),
(49, 'English Grammar and Composition', 'Wren & Martin', '9th', 'Available', 14, 'English'),
(50, 'Artificial Intelligence', 'Stuart Russell, Peter Norvig', '4th', 'Available', 10, 'CSE'),
(51, 'Digital Signal Processing', 'John G. Proakis, Dimitris G. Manolakis', '5th', 'Not Available', 7, 'EEE'),
(52, 'Modern Physics', 'Randy Harris', '3rd', 'Available', 6, 'Physics'),
(53, 'Macroeconomics', 'N. Gregory Mankiw', '9th', 'Available', 10, 'Economics'),
(54, 'Pharmacology Essentials', 'F. A. Davis', '6th', 'Available', 8, 'Pharmacy'),
(55, 'Marketing Management', 'Philip Kotler, Kevin Lane Keller', '15th', 'Available', 9, 'BBA'),
(56, 'Green Building Design', 'Brian W. Edwards', '2nd', 'Available', 5, 'Architecture'),
(57, 'Shakespearean Tragedies', 'William Shakespeare', '1st', 'Available', 12, 'English'),
(58, 'Machine Learning', 'Tom M. Mitchell', '1st', 'Available', 10, 'CSE'),
(59, 'Communication Systems', 'Simon Haykin, Michael Moher', '5th', 'Not Available', 8, 'EEE'),
(60, 'Introduction to Modern Algebra', 'David M. Burton', '6th', 'Available', 6, 'Mathematics'),
(61, 'Astrophysics for People in a Hurry', 'Neil deGrasse Tyson', '1st', 'Available', 10, 'Physics'),
(62, 'Microeconomics', 'Robert S. Pindyck, Daniel L. Rubinfeld', '10th', 'Available', 8, 'Economics'),
(63, 'Pharmacotherapy Handbook', 'Barbara G. Wells, Joseph T. DiPiro', '11th', 'Not Available', 7, 'Pharmacy'),
(64, 'Financial Accounting', 'Jerry J. Weygandt, Donald E. Kieso', '10th', 'Available', 9, 'BBA'),
(65, 'Architectural Design', 'Francis D. K. Ching', '4th', 'Available', 6, 'Architecture'),
(66, 'English Literature: A Survey', 'Anthony Burgess', '2nd', 'Available', 11, 'English'),
(67, 'Artificial Intelligence', 'Stuart Russell, Peter Norvig', '3rd', 'Available', 10, 'CSE'),
(68, 'Power Systems Analysis', 'Hadi Saadat', '2nd', 'Available', 7, 'EEE'),
(69, 'Calculus of Variations', 'Robert Weinstock', '1st', 'Available', 6, 'Mathematics'),
(70, 'Introduction to Environmental Science', 'Andrew Friedland, Rick Relyea', '4th', 'Available', 8, 'Environmental Science');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `book_name` varchar(50) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `stars` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`book_name`, `comment`, `stars`) VALUES
('asd', 'very poor', 5),
('asd', 'very poor', 5),
('Featly Hallows', 'very poor collection', 4),
('International Trade', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `student id` int(15) NOT NULL,
  `book id` int(15) NOT NULL,
  `book name` varchar(50) NOT NULL,
  `issue date` date NOT NULL,
  `return date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`student id`, `book id`, `book name`, `issue date`, `return date`) VALUES
(21301070, 69, 'Calculus of Variations', '2023-08-21', '2023-09-05'),
(21301070, 12, 'Modern Physics', '2023-08-22', '2023-09-06'),
(21301070, 48, 'Sustainable Architecture', '2023-08-22', '2023-09-06'),
(21301070, 1, 'Algorithms', '2023-08-22', '2023-09-06'),
(21301070, 48, 'Sustainable Architecture', '2023-08-22', '2023-09-06'),
(21301070, 48, 'Sustainable Architecture', '2023-08-22', '2023-09-06'),
(21301070, 48, 'Sustainable Architecture', '2023-08-22', '2023-09-06'),
(21301070, 1, 'Algorithms', '2023-08-22', '2023-09-06'),
(21301070, 2, 'The Intel Microprocessors', '2023-08-22', '2023-09-06'),
(21301075, 3, 'The Cruel Birth of Bangladesh', '2023-08-22', '2023-09-06'),
(21301075, 7, 'Introduction to Business', '2023-08-22', '2023-09-06'),
(21301077, 8, 'Architecture: Form, Space, and Order', '2023-08-22', '2023-09-06'),
(21301077, 11, 'Electric Circuits', '2023-08-22', '2023-09-06'),
(21301077, 1, 'Algorithms', '2023-08-22', '2023-09-06'),
(21301077, 1, 'Algorithms', '2023-08-22', '2023-09-06'),
(21301075, 1, 'Algorithms', '2023-08-22', '2023-09-06'),
(21301075, 1, 'Algorithms', '2023-08-22', '2023-09-06'),
(21301075, 2, 'The Intel Microprocessors', '2023-08-22', '2023-09-06'),
(21301077, 2, 'The Intel Microprocessors', '2023-08-22', '2023-09-06'),
(21301077, 2, 'The Intel Microprocessors', '2023-08-22', '2023-09-06'),
(1234, 1, 'Algorithms', '2023-08-22', '2023-09-06'),
(21301070, 5, 'Principles of Macroeconomics', '2023-08-22', '2023-09-06'),
(21301070, 5, 'Principles of Macroeconomics', '2023-08-22', '2023-09-06'),
(1234, 1, 'Algorithms', '2023-08-22', '2023-09-06'),
(21301070, 1, 'Algorithms', '2023-08-22', '2023-09-06'),
(21301070, 3, 'The Cruel Birth of Bangladesh', '2023-08-22', '2023-09-06'),
(21301070, 3, 'The Cruel Birth of Bangladesh', '2023-08-22', '2023-09-06'),
(21301070, 3, 'The Cruel Birth of Bangladesh', '2023-08-22', '2023-09-06'),
(21301070, 3, 'The Cruel Birth of Bangladesh', '2023-08-25', '2023-09-09'),
(21301070, 3, 'The Cruel Birth of Bangladesh', '2023-08-22', '2023-09-06'),
(21301070, 5, 'Principles of Macroeconomics', '2023-08-25', '2023-09-09'),
(21301070, 7, 'Introduction to Business', '2023-08-25', '2023-09-09'),
(21301070, 16, 'Architectural Graphics', '2023-08-22', '2023-09-06'),
(21301070, 1, 'Algorithms', '2023-08-22', '2023-09-06'),
(21301070, 2, 'The Intel Microprocessors', '2023-08-22', '2023-09-06'),
(21301070, 22, 'Pharmacology', '2023-08-22', '2023-09-06'),
(21301070, 33, 'Advanced English Vocabulary', '2023-08-22', '2023-09-06'),
(21301070, 57, 'Shakespearean Tragedies', '2023-08-22', '2023-09-06'),
(21301070, 38, 'Clinical Pharmacy', '2023-08-22', '2023-09-06'),
(21301070, 38, 'Clinical Pharmacy', '2023-08-22', '2023-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `issued`
--

CREATE TABLE `issued` (
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `issue_date` date NOT NULL,
  `return date` date NOT NULL,
  `returned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `issued`
--

INSERT INTO `issued` (`student_id`, `book_id`, `name`, `issue_date`, `return date`, `returned`) VALUES
(21301070, 3, 'The Cruel Birth of Bangladesh', '2023-08-22', '2023-09-06', 1),
(21301070, 3, 'The Cruel Birth of Bangladesh', '2023-08-22', '2023-09-06', 1),
(21301070, 5, 'Principles of Macroeconomics', '2023-08-25', '2023-09-09', 1),
(21301070, 5, 'Principles of Macroeconomics', '2023-08-25', '2023-09-09', 1),
(21301070, 7, 'Introduction to Business', '2023-08-25', '2023-09-09', 1),
(21301070, 7, 'Introduction to Business', '2023-08-25', '2023-09-09', 1),
(21301070, 16, 'Architectural Graphics', '2023-08-22', '2023-09-12', 1),
(21301070, 16, 'Architectural Graphics', '2023-08-22', '2023-09-12', 1),
(21301070, 1, 'Algorithms', '2023-08-22', '2023-09-06', 1),
(21301070, 1, 'Algorithms', '2023-08-22', '2023-09-06', 1),
(21301070, 2, 'The Intel Microprocessors', '2023-08-22', '2023-09-06', 1),
(21301070, 2, 'The Intel Microprocessors', '2023-08-22', '2023-09-06', 1),
(21301070, 22, 'Pharmacology', '2023-08-22', '2023-09-06', 1),
(21301070, 22, 'Pharmacology', '2023-08-22', '2023-09-06', 1),
(21301070, 33, 'Advanced English Vocabulary', '2023-08-22', '2023-09-06', 1),
(21301070, 33, 'Advanced English Vocabulary', '2023-08-22', '2023-09-06', 1),
(21301070, 57, 'Shakespearean Tragedies', '2023-08-22', '2023-09-06', 1),
(21301070, 57, 'Shakespearean Tragedies', '2023-08-22', '2023-09-06', 1),
(21301070, 38, 'Clinical Pharmacy', '2023-08-22', '2023-09-06', 0),
(21301070, 38, 'Clinical Pharmacy', '2023-08-22', '2023-09-06', 0),
(21301070, 38, 'Clinical Pharmacy', '2023-08-22', '2023-09-06', 0),
(21301070, 38, 'Clinical Pharmacy', '2023-08-22', '2023-09-06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `requested`
--

CREATE TABLE `requested` (
  `student_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `request_date` date NOT NULL,
  `return date` date NOT NULL,
  `approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `first name` varchar(40) NOT NULL,
  `last name` varchar(40) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL,
  `ID` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`first name`, `last name`, `username`, `password`, `ID`, `email`, `phone`) VALUES
('Atik ', 'Uddola', 'au_shams', '$2y$10$gEaA6DVIDYLhuXGNvUDm6uQjOrVmYDoxcU/5OleWsJPxQjNhTN/Qq', 21231054, 'atikuddola@gmail.com', 1754616082);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requested`
--
ALTER TABLE `requested`
  ADD UNIQUE KEY `uid` (`student_id`,`book_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requested`
--
ALTER TABLE `requested`
  ADD CONSTRAINT `sid` FOREIGN KEY (`student_id`) REFERENCES `student` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
