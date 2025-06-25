-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2025 at 04:52 PM
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
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(155) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `role` enum('Admin','Student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `pass`, `role`) VALUES
(1, 'obaid', 'obaid09@gmail.com', '$2y$10$QBXPcthWv58skW57aW2QV.z7n0Ecy.V//rgfaKb2D0.SNPH5XUlX.', 'Admin'),
(2, 'Noman', 'Noman67@gmail.com', '$2y$10$orDlOmyLNdlOMfyTHXZoO.MsqX6nYYQHffl8pI0lgrneYfo/nT9pi', 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `icon` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `name`, `description`, `icon`) VALUES
(5, 'stationary', 'Good quality', 'insert/img/683ce68a59c01.png'),
(15, 'jewellery', 'All items free', '<i class=\"bi bi-pencil\"></i>'),
(16, 'stationary', 'Good quality', ' <i class=\"bi bi-pencil\"></i>'),
(17, 'stationary', 'Good quality', ' <i class=\"bi bi-pencil\"></i>'),
(18, 'Strawberry', 'good', ' '),
(19, 'Fruits', 'good', ' '),
(20, 'Fruits', 'good', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `inquiry_status` enum('New','In Progress','Closed','Replied') DEFAULT 'New',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `std_id` int(11) DEFAULT NULL,
  `replied_by` int(11) DEFAULT NULL,
  `reply` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `message`, `inquiry_status`, `created_at`, `std_id`, `replied_by`, `reply`) VALUES
(1, 'when new batch will start?', 'Replied', '2025-06-21 03:39:55', NULL, 1, 'today'),
(2, 'when new batch will start?', 'Replied', '2025-06-21 03:45:00', NULL, 1, 'today'),
(4, 'When today class start?', 'Replied', '2025-06-22 12:35:12', 7, 1, '5pm'),
(6, 'o', 'Replied', '2025-06-24 18:21:04', 7, 1, 'hg');

-- --------------------------------------------------------

--
-- Table structure for table `practice`
--

CREATE TABLE `practice` (
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `id` int(11) NOT NULL,
  `icon` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `practice`
--

INSERT INTO `practice` (`name`, `description`, `id`, `icon`) VALUES
('Fruits', 'Good In Taste', 2, NULL),
('Fruits', 'Good quality', 3, NULL),
('stationary', 'Good quality', 4, '<i class=\"bi bi-pencil\"></i>');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `unitprice` decimal(12,2) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `Availability` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `unitprice`, `photo`, `category_id`, `Availability`) VALUES
(14, 'Fruits', 'good', 70.00, 'insert/img/683ec8c8d782b.png', NULL, '0'),
(18, 'stationary', 'dre', 57.00, 'insert/img/683ed1d0d2d8c.png', 5, 'instock');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `email`) VALUES
(1, 'admin ', 'obaid9@gmail.com'),
(2, 'customer', 'Amaan8@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `student_inquiry`
--

CREATE TABLE `student_inquiry` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Address` text DEFAULT NULL,
  `gender` varchar(20) NOT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_inquiry`
--

INSERT INTO `student_inquiry` (`id`, `name`, `email`, `Address`, `gender`, `Phone`, `photo`) VALUES
(7, 'Noman', 'Noman67@gmail.com', 'tommorow institute will close?', 'male', '03002399250', 'insert/img/68518fc719408.png'),
(13, 'ya sir', 'yasir12@gmail.com', 'fgftdhd', 'male', '03224567890', 'insert/img/6859b0f046ed3.png'),
(16, 'obaid', 'Noman07@gmail.com', 'jhgjh', 'male', '03224567890', 'insert/img/685ae329c654a.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(90) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `role_id`) VALUES
(1, 'obaid', 'obaid09@gmail.com', '$2y$10$cV7zX2ybyyFu3Oehn0S9semFoZZgwd0PYPBkgCpOz1O', 1),
(2, 'amaan', 'amaan8@gmail.com', '$2y$10$3sHo9hez.FjGvmy/ThbFV.VTldBqRaA7vq8OhK/KfkTkIIGyhyLpe', 1),
(3, 'zain', 'zain0@gmail.com', '$2y$10$n4qlxpTBUWd1ARoGPsyv2.o6aC/c8FVc.nOd7M1qIQYGOYp/eOMdC', 2),
(4, 'samad', 'samad12@gmail.com', '$2y$10$2WdtpoUWmA43TAsv1nlM3.yPTMMoe46jxqyEQ./ItO4Rqo282FEdG', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `std_id` (`std_id`),
  ADD KEY `admin_id` (`replied_by`);

--
-- Indexes for table `practice`
--
ALTER TABLE `practice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `product_ibfk_1` (`category_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_inquiry`
--
ALTER TABLE `student_inquiry`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `practice`
--
ALTER TABLE `practice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_inquiry`
--
ALTER TABLE `student_inquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD CONSTRAINT `admin_id` FOREIGN KEY (`replied_by`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `std_id` FOREIGN KEY (`std_id`) REFERENCES `student_inquiry` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`Id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
