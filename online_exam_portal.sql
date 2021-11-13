-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2021 at 07:11 PM
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
-- Database: `online_exam_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `addagn`
--

CREATE TABLE `addagn` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `correctans` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addagn`
--

INSERT INTO `addagn` (`id`, `question`, `category`, `correctans`) VALUES
(1, 'abc    ', 'reasoning', '1'),
(2, '      ddfad          ', 'reasoning', '5'),
(3, 'If NOIDA is written as OPJEB, then what will be the code for DELHI?', 'reasoning', 'EFMIJ'),
(4, '2+5          ', 'mathematics', '7'),
(5, '22+5           ', 'mathematics', '27'),
(6, '88-4        ', 'mathematics', '84'),
(7, 'a,an,the are?         ', 'English', 'article'),
(8, 'gfsjdhghfkjh         ', 'English', 'asdfgh');

-- --------------------------------------------------------

--
-- Table structure for table `addanswer`
--

CREATE TABLE `addanswer` (
  `id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `qid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addanswer`
--

INSERT INTO `addanswer` (`id`, `answer`, `category`, `qid`) VALUES
(1, '1', 'reasoning', 0),
(2, '2', 'reasoning', 0),
(3, '3', 'reasoning', 0),
(4, '4', 'reasoning', 0),
(5, 'MJKIO', 'reasoning', 3),
(6, 'EFMIJ', 'reasoning', 3),
(7, 'EFNIJ', 'reasoning', 3),
(8, 'MJKLO', 'reasoning', 3),
(9, '7', 'mathematics', 4),
(10, '8', 'mathematics', 4),
(11, '9', 'mathematics', 4),
(12, '10', 'mathematics', 4),
(13, '27', 'mathematics', 5),
(14, '55', 'mathematics', 5),
(15, '25', 'mathematics', 5),
(16, '57', 'mathematics', 5),
(17, '74', 'mathematics', 6),
(18, '84', 'mathematics', 6),
(19, '64', 'mathematics', 6),
(20, '54', 'mathematics', 6),
(21, 'article', 'English', 7),
(22, 'verb', 'English', 7),
(23, 'noun', 'English', 7),
(24, 'proverb', 'English', 7),
(25, 'asdfgfg', 'English', 8),
(26, 'asdfgh', 'English', 8),
(27, 'asdfgghjkk', 'English', 8),
(28, 'zxcvbb', 'English', 8);

-- --------------------------------------------------------

--
-- Table structure for table `addtest`
--

CREATE TABLE `addtest` (
  `id` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `correctans` varchar(255) NOT NULL,
  `aid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `addtest`
--

INSERT INTO `addtest` (`id`, `qid`, `category`, `question`, `correctans`, `aid`) VALUES
(3, 4, 'mathematics', '2+5          ', '7', 9),
(4, 5, 'mathematics', '22+5           ', '27', 13),
(5, 6, 'mathematics', '88-4        ', '84', 18),
(6, 7, 'English', 'a,an,the are?         ', 'article', 21),
(7, 8, 'English', 'gfsjdhghfkjh         ', 'asdfgh', 26);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `userpass`, `email`, `role`) VALUES
(1, 'naman', 'password', 'nam@gmail.com', 'student'),
(2, 'abc', 'password', 'ab@gmail.com', 'student'),
(3, 'bcd', 'password', 'bcd@gmail.com', 'student'),
(5, 'admin', 'admin', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `name`, `image`, `about`) VALUES
(2, 'reasoning', 'abc.png', 'reasoning'),
(3, 'mathematics', 'apti.jpg', 'mathematic'),
(4, 'English', 'english.jpg', 'English'),
(5, 'Coding ', 'coding2.png', 'Coding');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `mark` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `category`, `mark`) VALUES
(1, 'bcd', 'mathematics', '100'),
(2, 'bcd', 'English', '50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addagn`
--
ALTER TABLE `addagn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addanswer`
--
ALTER TABLE `addanswer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addtest`
--
ALTER TABLE `addtest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
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
-- AUTO_INCREMENT for table `addagn`
--
ALTER TABLE `addagn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `addanswer`
--
ALTER TABLE `addanswer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `addtest`
--
ALTER TABLE `addtest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
