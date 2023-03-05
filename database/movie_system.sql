-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 09:50 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_text` text,
  `comment_score` int(11) NOT NULL DEFAULT '3',
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `movie_id`, `user_id`, `comment_text`, `comment_score`, `created`) VALUES
(1, 1, 1, 'สนุกมากเลยครับ', 5, '2021-07-01 10:00:00'),
(2, 2, 3, 'ใช้ได้เลยทีเดียว', 4, '2021-07-02 11:20:00'),
(3, 1, 3, 'ไม่ค่อยชอบเลย', 2, '2021-07-02 18:30:00'),
(4, 4, 2, 'เฉยๆมาก', 3, '2021-07-01 15:40:00'),
(5, 3, 1, 'โอเคเลยนะ ชอบมากเลยครับ', 4, '2021-07-03 09:45:00'),
(6, 2, 2, 'งั้นๆมากเลย', 2, '2021-07-04 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `movie_title` varchar(200) NOT NULL,
  `movie_release_date` date NOT NULL,
  `movie_image` varchar(200) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_title`, `movie_release_date`, `movie_image`, `created`, `modified`) VALUES
(1, 'A Quiet Place PartII', '2021-06-10', 'm1.jpg', '2021-01-01 10:00:00', '2021-01-01 10:00:00'),
(2, 'Black Widow', '2021-07-07', 'm2.jpg', '2021-01-01 10:00:00', '2021-01-01 10:00:00'),
(3, 'Lord of the ring', '2021-06-17', 'm3.jpg', '2021-01-01 10:00:00', '2021-01-01 10:00:00'),
(4, 'Frozen II', '2021-07-01', 'm4.jpg', '2021-01-01 10:00:00', '2021-01-01 10:00:00'),
(5, 'Raya and the Last Dragon', '2021-07-02', 'm5.jpg', '2021-01-01 10:00:00', '2021-01-01 10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(200) NOT NULL COMMENT 'Base64 Encode For Test',
  `user_fullname` varchar(200) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `user_fullname`, `created`, `modified`) VALUES
(1, 'test1@tero.com', 'cEBzc1cwcmQ=', 'Test1', '2021-01-08 00:00:00', '2021-01-08 00:00:00'),
(2, 'test2@tero.com', 'UHdkMTIzNDU2', 'Test2', '2021-01-08 00:00:00', '2021-01-08 00:00:00'),
(3, 'test3@tero.com', 'VGVzdFB3ZA==', 'Test3', '2021-01-08 00:00:00', '2021-01-08 00:00:00'),
(4, 'test4@tero.com', 'VGhpc2lzVGVzdA==', 'Test4', '2021-01-08 00:00:00', '2021-01-08 00:00:00'),
(5, 'test5@tero.com', 'TG9naW5AMTIzNDU2', 'Test5', '2021-01-08 00:00:00', '2021-01-08 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
