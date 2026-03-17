-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2025 at 04:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(10) NOT NULL,
  `admin_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `admin_time`) VALUES
(1, 'admin', 'admin', '2025-07-31 05:25:53');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`) VALUES
(5, 'freewifi.jpg'),
(6, 'samarpan.jpg'),
(7, 'rooms.jpeg'),
(8, 'slider3.jpg'),
(9, 'images (5).jpeg'),
(10, 'images (20).jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(6, 'SK', 'kamaliyasahil8@gmail', 'hiii', 'fjyfhvkjvjhcjg', 'Rejected', '2025-09-03 05:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(100) NOT NULL,
  `email` varchar(20) DEFAULT 'unique',
  `password` varchar(10) NOT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `dateofbirth` date NOT NULL,
  `collage_branch` varchar(200) NOT NULL,
  `profile` text NOT NULL,
  `id` int(11) NOT NULL,
  `timespan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `email`, `password`, `mobile`, `address`, `dateofbirth`, `collage_branch`, `profile`, `id`, `timespan`) VALUES
('SK', 'kamaliyasahil8@gmail', '111', '1111111112', 'changed', '2025-09-02', '1111', '1756829775_6174967648346032621.jpg', 15, '2025-09-02 16:16:15'),
('kamaliya sahil ', '123@gamil.com', '123', '9016620121', 'maliya hatina,junagadh 00000', '2006-02-01', 'gurukul collage,jnd', '1758091619_query.jpeg', 17, '2025-09-17 06:46:59'),
('ash kecham', 'ash1@gmail.com', '111', '2147483647', 'profecer oak house near', '2025-09-02', 'kanto primary school', '', 18, '2025-09-17 07:10:10'),
('ash kecham', 'ash12@gmail.com', '111', '9909909901', 'profecer oak house near', '2025-09-02', 'kanto primary school', '', 19, '2025-09-17 07:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `login_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `email`, `password`, `login_time`) VALUES
(7, 'admin@gmail.com', 'admin', '2025-08-04 05:27:10'),
(7, 'admin@gmail.com', 'admin', '2025-08-04 05:37:00'),
(7, 'admin@gmail.com', 'admin', '2025-08-04 05:37:03'),
(14, 'sahil@gmail.com', '111', '2025-09-01 12:15:19'),
(14, 'sahil@gmail.com', '111', '2025-09-01 12:43:35'),
(14, 'sahil@gmail.com', '111', '2025-09-01 13:24:33'),
(14, 'sahil@gmail.com', '111', '2025-09-01 14:18:08'),
(14, 'sahil@gmail.com', '111', '2025-09-01 14:31:21'),
(14, 'sahil@gmail.com', '111', '2025-09-01 15:43:48'),
(14, 'sahil@gmail.com', '111', '2025-09-01 16:02:35'),
(14, 'sahil@gmail.com', '111', '2025-09-01 17:35:33'),
(14, 'sahil@gmail.com', '111', '2025-09-02 13:11:06'),
(15, 'kamaliyasahil8@gmail', '111', '2025-09-02 16:18:16'),
(15, 'kamaliyasahil8@gmail', '111', '2025-09-02 17:02:43'),
(15, 'kamaliyasahil8@gmail', '111', '2025-09-03 04:42:18'),
(15, 'kamaliyasahil8@gmail', '111', '2025-09-03 05:09:24'),
(15, 'kamaliyasahil8@gmail', '111', '2025-09-03 05:11:50'),
(15, 'kamaliyasahil8@gmail', '111', '2025-09-03 05:12:11'),
(15, 'kamaliyasahil8@gmail', '111', '2025-09-03 05:12:32'),
(15, 'kamaliyasahil8@gmail', '111', '2025-09-03 05:17:50'),
(15, 'kamaliyasahil8@gmail', '111', '2025-09-03 06:08:52'),
(15, 'kamaliyasahil8@gmail', '111', '2025-09-07 15:10:52'),
(15, 'kamaliyasahil8@gmail', '111', '2025-09-16 17:12:15'),
(16, 'kamaliyasahil8@gmail', '123', '2025-09-17 06:44:12'),
(17, '123@gamil.com', '123', '2025-09-17 06:47:09'),
(18, 'ash1@gmail.com', '111', '2025-09-17 07:10:35'),
(19, 'ash12@gmail.com', '111', '2025-09-17 07:15:48'),
(15, 'kamaliyasahil8@gmail', '111', '2025-10-09 14:05:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
