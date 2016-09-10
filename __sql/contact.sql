-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2016 at 07:29 AM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
