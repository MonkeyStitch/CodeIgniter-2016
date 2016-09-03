-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2016 at 07:24 AM
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
-- Table structure for table `api_app`
--

CREATE TABLE `api_app` (
  `secret_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `app_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `api_app`
--

INSERT INTO `api_app` (`secret_key`, `app_name`) VALUES
('ci2016key', 'key ci2016');

-- --------------------------------------------------------

--
-- Table structure for table `api_log`
--

CREATE TABLE `api_log` (
  `log_id` int(11) NOT NULL,
  `secret_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_date` datetime NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `function` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `param` text COLLATE utf8_unicode_ci,
  `msg` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `api_log`
--

INSERT INTO `api_log` (`log_id`, `secret_key`, `transaction_date`, `url`, `method`, `function`, `param`, `msg`) VALUES
(1, NULL, '2016-08-28 10:29:34', 'http://ci2016.ci/en/api/users', 'get', '__construct', '[]', 'error|Secert key is not exist.'),
(2, 'ci2016key', '2016-08-28 10:42:36', 'http://ci2016.ci/en/api/users?api_key=ci2016key', 'get', 'users', '{"api_key":"ci2016key"}', ''),
(3, NULL, '2016-08-28 10:57:17', 'http://ci2016.ci/en/api/users', 'post', '__construct', '{"username":"newapi","password":"12345","name":"api test","email":"mail@mail.com"}', 'error|Secert key is not exist.'),
(4, NULL, '2016-08-28 10:57:41', 'http://ci2016.ci/en/api/users', 'post', '__construct', '{"username":"newapi","password":"12345","name":"api test","email":"mail@mail.com"}', 'error|Secert key is not exist.'),
(5, NULL, '2016-08-28 10:58:28', 'http://ci2016.ci/en/api/users', 'post', '__construct', '{"username":"newapi","password":"12345","name":"api test","email":"mail@mail.com"}', 'error|Secert key is not exist.'),
(6, 'ci2016key', '2016-08-28 10:58:49', 'http://ci2016.ci/en/api/users?api_key=ci2016key', 'post', 'users', '[]', 'success'),
(7, 'ci2016key', '2016-08-28 11:06:41', 'http://ci2016.ci/en/api/users?api_key=ci2016key', 'post', 'users', '{"username":"newapi","password":"12345","name":"api test","email":"mail@mail.com"}', 'error'),
(8, 'ci2016key', '2016-08-28 11:07:07', 'http://ci2016.ci/en/api/users?api_key=ci2016key', 'post', 'users', '{"username":"newapi","password":"12345","name":"api test","email":"mail@mail.com"}', 'success'),
(9, 'ci2016key', '2016-08-28 11:09:44', 'http://ci2016.ci/en/api/users?api_key=ci2016key', 'put', 'users', '{"username":"newapi","password":"12345","name":"api test","email":"mail@mail.com"}', 'error'),
(10, 'ci2016key', '2016-08-28 11:10:15', 'http://ci2016.ci/en/api/users?api_key=ci2016key', 'put', 'users', '{"username":"newapi","password":"12345","name":"api api api api","email":"mail@mail.com"}', 'success'),
(11, 'ci2016key', '2016-08-28 11:48:21', 'http://ci2016.ci/en/api/users?api_key=ci2016key', 'get', 'users', '{"api_key":"ci2016key"}', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(10) UNSIGNED NOT NULL,
  `student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_network` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `student_id`, `first_name`, `last_name`, `mobile`, `mobile_network`, `email`, `topic`, `details`, `created_date`) VALUES
(1, '57122201043', 'Sathaporn', 'Sunthornpan', '0927591995', 'No Data', 'dd.stitch55@gmail.com', 'ถ้านอนน้อยควรทำอย่างไรครับ', '<p>ขอคำแนะนำหน่อยครับ</p>\r\n', '2016-09-03 11:15:50'),
(2, '57122201043', 'Sathaporn', 'Sunthornpan', '0927591995', 'No Data', 'dd.stitch55@gmail.com', 'ถ้านอนน้อยควรทำอย่างไรครับ', '<p>ขอคำแนะนำหน่อยครับ</p>\r\n', '2016-09-03 11:25:29'),
(3, '57122201043', 'Sathaporn', 'Sunthornpan', '0927591995', 'No Data', 'dd.stitch55@gmail.com', 'ถ้านอนน้อยควรทำอย่างไรครับ', '<p>ขอคำแนะนำหน่อยครับ</p>\r\n', '0000-00-00 00:00:00'),
(4, '57122201043', 'Sathaporn', 'Sunthornpan', '0927591995', 'No Data', 'dd.stitch55@gmail.com', 'ถ้านอนน้อยควรทำอย่างไรครับ', '<p>ขอคำแนะนำหน่อยครับ</p>\r\n', '0000-00-00 00:00:00'),
(5, '57122201043', 'Sathaporn', 'Sunthornpan', '0927591995', 'No Data', 'dd.stitch55@gmail.com', 'ถ้านอนน้อยควรทำอย่างไรครับ', '<p>ขอคำแนะนำหน่อยครับ</p>\r\n', '2016-09-03 06:39:58'),
(6, '57122201043', 'Sathaporn', 'Sunthornpan', '0927591995', 'No Data', 'dd.stitch55@gmail.com', 'ถ้านอนน้อยควรทำอย่างไรครับ', '<p>ขอคำแนะนำหน่อยครับ</p>\r\n', '2016-09-03 06:41:11'),
(7, '57122201043', 'Sathaporn', 'Sunthornpan', '0927591995', 'No Data', 'dd.stitch55@gmail.com', 'ถ้านอนน้อยควรทำอย่างไรครับ', '<p>ขอคำแนะนำหน่อยครับ</p>\r\n', '2016-09-03 06:41:32'),
(8, '57122201043', 'Sathaporn', 'Sunthornpan', '0927591995', 'No Data', 'dd.stitch55@gmail.com', 'ถ้านอนน้อยควรทำอย่างไรครับ', '<p>ขอคำแนะนำหน่อยครับ</p>\r\n', '2016-09-03 11:43:55'),
(9, '57122201043', 'Sathaporn', 'Sunthornpan', '0927591995', 'No Data', 'dd.stitch55@gmail.com', 'ถ้านอนน้อยควรทำอย่างไรครับ', '<p>ขอคำแนะนำหน่อยครับ</p>\r\n', '2016-09-03 11:48:26'),
(10, '57122201043', 'Sathaporn', 'Sunthornpan', '0927591995', 'AIS', 'dd.stitch55@gmail.com', 'ถ้านอนน้อยควรทำอย่างไรครับ', '<p>ขอคำแนะนำหน่อยครับ</p>\r\n', '2016-09-03 11:56:03'),
(11, '57122201043', 'Sathaporn', 'Sunthornpan', '0927591995', 'AIS', 'dd.stitch55@gmail.com', 'ถ้านอนน้อยควรทำอย่างไรครับ', '<p>ขอคำแนะนำหน่อยครับ</p>\r\n', '2016-09-03 11:59:39'),
(12, '57122201043', 'สถาพร', 'สุนทรปั้น', '0927591995', 'AIS', 'dd.stitch55@gmail.com', 'สอบถามเรื่องชมรมครับ', '<p>ผมอยากทราบว่า พี่พีทเป็น<strong>ประธาน</strong>ชมรมใช่มั้ยครับ </p>\r\n', '2016-09-03 12:06:44'),
(13, '57122201043', 'Sathaporn', 'Sunthornpan', '0927591995', 'AIS', 'dd.stitch55@gmail.com', 'สอบถามเรื่องชมรมครับ', '<p>ผมอยากทราบว่า พี่พีทเป็นประธานชมรม <u><em><strong>รุ่นแรก</strong></em></u> ใช่มั้ยครับ</p>\r\n', '2016-09-03 12:09:48');

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
  `date_time` datetime NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `username`, `subject`, `details`, `date_time`, `picture`) VALUES
(1, 'admin', '12', '<p>12</p>\r\n', '2016-08-24 22:37:29', '9a923f941652ee5091e82392b88888ea.png'),
(2, 'admin', 'sdf', '<p>sdf</p>\r\n', '2016-08-24 22:50:20', 'cf561aa82f954aa746a200721f5fa391.png'),
(3, 'admin', '234', '<p>sdfsdf</p>\r\n', '2016-08-24 22:50:55', 'e521e1bcd9aed6029fc631b181c59775.png'),
(4, 'admin', 'sdf', '<p>sdfsdf</p>\r\n', '2016-08-24 22:52:54', '1bff79da53965a09a28472db2181d3b4.PNG'),
(5, 'admin', 'sdfsdf', '<p>sdfsdfsdf</p>\r\n', '2016-08-24 22:53:13', 'eb9a07b47ea056990e0021f975697457.PNG');

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
('newapi', '8cb2237d0679ca88db6464eac60da96345513964', 'USER', 'mail@mail.com', 'api api api api', '', '', NULL),
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
-- Indexes for table `api_app`
--
ALTER TABLE `api_app`
  ADD PRIMARY KEY (`secret_key`);

--
-- Indexes for table `api_log`
--
ALTER TABLE `api_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

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
-- AUTO_INCREMENT for table `api_log`
--
ALTER TABLE `api_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `pic_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
