-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2016 at 07:40 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_tutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `albums_id` int(5) UNSIGNED NOT NULL,
  `albums_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`albums_id`, `albums_name`) VALUES
(1, 'รวบดอกไม้'),
(2, 'รวมรูปสัตว์');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `pic_id` int(10) UNSIGNED NOT NULL,
  `alb_id` int(5) UNSIGNED NOT NULL,
  `pic_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(5) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `permission` enum('USER','ADMIN') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USER',
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reset_code` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `permission`, `email`, `name`, `mobile`, `address`, `reset_code`) VALUES
('admin', '8cb2237d0679ca88db6464eac60da96345513964', 'ADMIN', 'dd.stitch55@gmail.com', 'STITCH', '0927591995', '104 ราชบุรี 70120', '8ef7bed48864b664571b879ae030c4f1a9cd36ef'),
('fb@864594073684751', '', 'USER', 'dd.stitch55@gmail.com', 'Tis Sathaporn Sunthornpan', '', '', NULL),
('newuser', '8cb2237d0679ca88db6464eac60da96345513964', 'USER', 'okthank@mailinator.com', '12345', '45', 'ds', NULL),
('user1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'USER', 'tisstyle.game1@gmail.com', 'User 1', '', '', '91cf852bf363641423cb3210dcb8315b04e2d4d2'),
('user10', '8cb2237d0679ca88db6464eac60da96345513964', 'USER', 'okthank@mailinator.com', 'User 10', '', '', 'bb01625fbacf46f074d9df212e57fdbbe57664ca'),
('user2', '8cb2237d0679ca88db6464eac60da96345513964', 'USER', 'okthank@mailinator.com', 'User 2', '', '', '2946cde78bd2d48df7f2d8cb18b9006baa4f6e18'),
('user3', '8cb2237d0679ca88db6464eac60da96345513964', 'USER', 'okthank@mailinator.com', 'User 3', '', '', NULL),
('user4', '8cb2237d0679ca88db6464eac60da96345513964', 'USER', 'okthank@mailinator.com', 'User 4', '', '', NULL),
('user5', '8cb2237d0679ca88db6464eac60da96345513964', 'USER', 'okthank@mailinator.com', 'User 5', '', '', NULL),
('user6', '8cb2237d0679ca88db6464eac60da96345513964', 'USER', 'okthank@mailinator.com', 'User 6', '', '', NULL),
('user7', '8cb2237d0679ca88db6464eac60da96345513964', 'USER', 'okthank@mailinator.com', 'User 7', '', '', NULL),
('user8', '8cb2237d0679ca88db6464eac60da96345513964', 'USER', 'okthank@mailinator.com', 'User 8', '', '', NULL),
('user9', '8cb2237d0679ca88db6464eac60da96345513964', 'USER', 'okthank@mailinator.com', 'User 9', '', '', NULL),
('userNew', '8cb2237d0679ca88db6464eac60da96345513964', 'ADMIN', 'tisstyle.game1@gmail.com', 'Sathaporn Sunthornpan', '', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`albums_id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`pic_id`),
  ADD KEY `alb_id` (`alb_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `albums_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `pic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`alb_id`) REFERENCES `albums` (`albums_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
