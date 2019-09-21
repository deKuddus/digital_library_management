-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 21, 2019 at 09:20 AM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-1+ubuntu18.04.1+deb.sury.org+1

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
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_tittle` varchar(100) NOT NULL,
  `copy_of_book` int(5) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_isbn` varchar(50) NOT NULL,
  `book_edition` varchar(20) NOT NULL,
  `book_publisher` varchar(100) NOT NULL,
  `book_category` varchar(100) NOT NULL,
  `book_description` text NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `book_status` tinyint(1) NOT NULL DEFAULT '0',
  `book_added_date` varchar(100) NOT NULL,
  `book_updated_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_tittle`, `copy_of_book`, `book_author`, `book_isbn`, `book_edition`, `book_publisher`, `book_category`, `book_description`, `book_image`, `book_status`, `book_added_date`, `book_updated_date`) VALUES
(8, 'c programming', 1, 'balaguru swami', 'sdf1546203', '8th', 'MC Graw Hills', '2', '&lt;p&gt;book description here asdfasdfasdfasdfasdfsadfsad adfasdfa&lt;/p&gt;', 'book_images/3114e47092.png', 1, '2019-07-08', '2019-09-06'),
(10, 'Differentiation and  Calculas', 1, 'test author', 'dfdf5946169', '5th', 'test publisher', '3', '&lt;p&gt;This is book description for math book named differentiation and calculus&lt;/p&gt;', 'book_images/bc73fe5765.png', 1, '2019-07-13', '2019-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `books_category`
--

CREATE TABLE `books_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_category`
--

INSERT INTO `books_category` (`id`, `category_name`) VALUES
(1, 'networking'),
(2, 'programming'),
(3, 'maths');

-- --------------------------------------------------------

--
-- Table structure for table `books_distribution`
--

CREATE TABLE `books_distribution` (
  `id` int(11) NOT NULL,
  `book_tittle` varchar(100) NOT NULL,
  `book_isbn` varchar(50) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `student_department` varchar(100) NOT NULL,
  `given_date` varchar(50) NOT NULL,
  `return_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books_request`
--

CREATE TABLE `books_request` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `student_department` varchar(100) NOT NULL,
  `student_batch` varchar(10) NOT NULL,
  `book_isbn` varchar(100) NOT NULL,
  `book_tittle` varchar(100) NOT NULL,
  `book_author` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_request`
--

INSERT INTO `books_request` (`id`, `student_id`, `student_department`, `student_batch`, `book_isbn`, `book_tittle`, `book_author`) VALUES
(3, '15010102', '1', '25', 'dfdf5946169', 'Differentiation and  Calculas', 'test author'),
(5, '15010102', '2', '5', 'dfdf5946169', 'Differentiation and  Calculas', 'test author');

-- --------------------------------------------------------

--
-- Table structure for table `books_request_confirm`
--

CREATE TABLE `books_request_confirm` (
  `id` int(11) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `student_department` varchar(100) NOT NULL,
  `student_batch` varchar(10) NOT NULL,
  `book_isbn` varchar(100) NOT NULL,
  `book_tittle` varchar(100) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `hire_date` varchar(20) NOT NULL,
  `return_date` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_request_confirm`
--

INSERT INTO `books_request_confirm` (`id`, `student_id`, `student_department`, `student_batch`, `book_isbn`, `book_tittle`, `book_author`, `hire_date`, `return_date`, `status`) VALUES
(2, '15010102', '1', '25', 'sdf1546203', 'c programming', 'balaguru swami', '2019-07-20', '2019-07-31', 1),
(3, '15010102', '1', '25', 'sdf1546203', 'c programming', 'balaguru swami', '2019-09-10', '2019-09-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

CREATE TABLE `librarians` (
  `id` int(11) NOT NULL,
  `librarian_name` varchar(100) NOT NULL,
  `librarian_email` varchar(50) NOT NULL,
  `librarian_phone` varchar(20) NOT NULL,
  `librarian_designation` varchar(100) NOT NULL,
  `librarian_role` varchar(20) NOT NULL,
  `librarian_password` varchar(100) NOT NULL,
  `librarian_status` tinyint(1) NOT NULL DEFAULT '0',
  `librarian_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarians`
--

INSERT INTO `librarians` (`id`, `librarian_name`, `librarian_email`, `librarian_phone`, `librarian_designation`, `librarian_role`, `librarian_password`, `librarian_status`, `librarian_image`) VALUES
(1, 'John Mak', 'mak@gmail.com', '01834454545', 'library incharge', 'super admin', '25f9e794323b453885f5181f1b624d0b', 1, 'librarian_images/c9cdfbf01a.png');

-- --------------------------------------------------------

--
-- Table structure for table `pdf_books`
--

CREATE TABLE `pdf_books` (
  `id` int(11) NOT NULL,
  `book_tittle` varchar(100) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_isbn` varchar(50) NOT NULL,
  `book_edition` varchar(20) NOT NULL,
  `book_publisher` varchar(100) NOT NULL,
  `book_category` varchar(100) NOT NULL,
  `book_description` text NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `book_status` tinyint(1) NOT NULL DEFAULT '0',
  `book_added_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `book_updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pdf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdf_books`
--

INSERT INTO `pdf_books` (`id`, `book_tittle`, `book_author`, `book_isbn`, `book_edition`, `book_publisher`, `book_category`, `book_description`, `book_image`, `book_status`, `book_added_date`, `book_updated_date`, `pdf`) VALUES
(13, 'Computer Networking', 'test author', 'dfdf5946169', '5th', 'test publisher', '1', '&lt;p&gt;book description here&lt;/p&gt;', 'book_images/61f7b56fc7.jpeg', 1, '2019-09-06 19:30:15', '2019-09-05 18:00:00', 'book_pdf/fasdfasdfasdf.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `std_batch`
--

CREATE TABLE `std_batch` (
  `id` int(11) NOT NULL,
  `batch_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_batch`
--

INSERT INTO `std_batch` (`id`, `batch_name`) VALUES
(4, '1'),
(5, '2'),
(6, '3'),
(7, '4'),
(8, '5'),
(9, '6'),
(10, '7'),
(11, '8'),
(12, '9'),
(13, '10'),
(14, '11'),
(15, '12'),
(16, '13'),
(17, '14'),
(18, '15'),
(19, '16'),
(20, '17'),
(21, '18'),
(22, '19'),
(23, '20'),
(24, '21'),
(25, '22'),
(26, '23'),
(27, '24'),
(28, '25'),
(29, '26'),
(30, '27'),
(31, '28'),
(32, '29'),
(33, '30'),
(34, '31'),
(35, '32'),
(36, '33'),
(37, '34'),
(38, '35'),
(39, '36'),
(40, '37'),
(41, '38'),
(42, '39'),
(43, '40'),
(44, '41'),
(45, '42'),
(46, '43'),
(47, '44'),
(48, '45'),
(49, '46'),
(50, '47'),
(51, '48'),
(52, '49'),
(53, '50'),
(54, '51'),
(55, '52'),
(56, '53'),
(57, '54'),
(58, '55'),
(59, '56'),
(60, '57'),
(61, '58'),
(62, '59'),
(63, '60'),
(64, '61'),
(65, '62'),
(66, '63'),
(67, '64'),
(68, '65'),
(69, '66'),
(70, '67'),
(71, '68'),
(72, '69'),
(73, '70'),
(74, '71'),
(75, '72'),
(76, '73'),
(77, '74'),
(78, '75'),
(79, '76'),
(80, '77'),
(81, '78'),
(82, '79'),
(83, '80'),
(84, '81'),
(85, '82'),
(86, '83'),
(87, '84'),
(88, '85'),
(89, '86'),
(90, '87'),
(91, '88'),
(92, '89'),
(93, '90'),
(94, '91'),
(95, '92'),
(96, '93'),
(97, '94'),
(98, '95'),
(99, '96'),
(100, '97'),
(101, '98'),
(102, '99');

-- --------------------------------------------------------

--
-- Table structure for table `std_department`
--

CREATE TABLE `std_department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_department`
--

INSERT INTO `std_department` (`id`, `department_name`) VALUES
(1, 'Computer Science and Engineering'),
(2, 'Electric and Electronics  Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `student_name` varchar(100) NOT NULL,
  `student_email` varchar(50) NOT NULL,
  `student_mobile` varchar(20) NOT NULL,
  `student_department` varchar(100) NOT NULL,
  `student_batch` varchar(20) NOT NULL,
  `student_faculty` varchar(100) NOT NULL,
  `student_password` varchar(100) NOT NULL,
  `student_images` varchar(100) NOT NULL,
  `student_joining_date` varchar(100) NOT NULL,
  `student_status` tinyint(1) NOT NULL DEFAULT '0',
  `student_updating_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `student_name`, `student_email`, `student_mobile`, `student_department`, `student_batch`, `student_faculty`, `student_password`, `student_images`, `student_joining_date`, `student_status`, `student_updating_date`) VALUES
(2, '15010102', 'John Smeeth', 'john@gmail.com', '01787878787', '1', '25', 'FSET', '25f9e794323b453885f5181f1b624d0b', 'students_images/15010102.png', '2019-07-11', 1, '2019-09-06'),
(3, '15010103', 'John Doe', 'joh.dee@gmail.com', '01787878787', '2', '25', 'FSET', '25f9e794323b453885f5181f1b624d0b', 'students_images/15010103.png', '2019-07-15', 1, '2019-09-06'),
(4, '15010102', 'hello', 'dsfas@gmailc.op', '01780410319', '2', '5', 'FSET', '25f9e794323b453885f5181f1b624d0b', 'students_images/15010102.png', '2019-09-10', 1, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_category`
--
ALTER TABLE `books_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_distribution`
--
ALTER TABLE `books_distribution`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_request`
--
ALTER TABLE `books_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_request_confirm`
--
ALTER TABLE `books_request_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf_books`
--
ALTER TABLE `pdf_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_batch`
--
ALTER TABLE `std_batch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `std_department`
--
ALTER TABLE `std_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `books_category`
--
ALTER TABLE `books_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `books_distribution`
--
ALTER TABLE `books_distribution`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `books_request`
--
ALTER TABLE `books_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `books_request_confirm`
--
ALTER TABLE `books_request_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `librarians`
--
ALTER TABLE `librarians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pdf_books`
--
ALTER TABLE `pdf_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `std_batch`
--
ALTER TABLE `std_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `std_department`
--
ALTER TABLE `std_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
