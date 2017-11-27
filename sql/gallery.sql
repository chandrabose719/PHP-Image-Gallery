-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2017 at 07:44 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery_details`
--

CREATE TABLE `gallery_details` (
  `gallery_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gallery_name` varchar(100) NOT NULL,
  `image_category` varchar(100) NOT NULL,
  `image_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_details`
--

INSERT INTO `gallery_details` (`gallery_id`, `user_id`, `gallery_name`, `image_category`, `image_file`) VALUES
(2, 4, 'Sample', 'Family', 'images/galleries/Sample/Sample Image.jpg'),
(3, 4, 'Sample1', 'Tour', 'images/galleries/Sample1/Sample Image.jpg'),
(4, 1, 'gal-Bose', 'Family', 'images/galleries/gal-Bose/1.jpg'),
(5, 1, 'car', 'Tour', 'images/galleries/car/03.jpg'),
(6, 1, 'car', 'Family', 'images/galleries/car/11.jpg'),
(7, 1, 'car', 'Family', 'images/galleries/car/31.jpg'),
(8, 1, 'nature', 'Party', 'images/galleries/nature/8.jpg'),
(9, 1, 'nature', 'Office', 'images/galleries/nature/7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_name_details`
--

CREATE TABLE `gallery_name_details` (
  `user_id` int(11) NOT NULL,
  `gallery_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_name_details`
--

INSERT INTO `gallery_name_details` (`user_id`, `gallery_name`) VALUES
(4, 'Sample'),
(4, 'Sample1'),
(1, 'gal-Bose'),
(1, 'car'),
(1, 'nature');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_mobile` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_name`, `user_email`, `user_password`, `user_mobile`) VALUES
(1, 'Bose', 'bose@gmail.com', '2233', '9988776655'),
(2, 'kvcBose', 'kvcbose@gmail.com', '223344', '9988776644'),
(4, 'stem', 'stem@gmail.com', 'stem', '9988776688');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery_details`
--
ALTER TABLE `gallery_details`
  ADD UNIQUE KEY `gallery_id` (`gallery_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery_details`
--
ALTER TABLE `gallery_details`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
