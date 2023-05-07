-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2023 at 01:21 PM
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
-- Database: `user-panel-backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `home_district` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `permanent_address` longtext DEFAULT NULL,
  `present_address` longtext DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `photo`, `department`, `contact_no`, `email`, `home_district`, `occupation`, `designation`, `blood_group`, `permanent_address`, `present_address`, `password`, `role`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'full name', NULL, 'economics', '123456789', 'developer.chayansarker+1@gmail.com', 'dhaka', 'service', 'engineer', 'B-', 'barishal', 'dhaka', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', NULL, NULL, NULL),
(4, 'full name 2', 'uploads/4.jpg', 'fine_arts', '458587', 'developer.chayansarker+2@gmail.com', 'rangpur', 'job3', 'accountant', 'A+', 'dhaka', 'dhaka', '81dc9bdb52d04dc20036dbd8313ed055', 'user', NULL, NULL, NULL),
(5, 'user 1', 'uploads/5.jpg', 'botany', '1234567899', 'developer.chayansarker+3@gmail.com', 'dhaka', 'service', 'engineer', 'A+', 'bogra', 'chittagong', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '2023-05-07 01:25:42', '2023-05-07 01:25:42', NULL),
(6, 'full name', 'uploads/6.jpg', 'sociology', '12346', 'developer.chayansarker+5@gmail.com', 'dhaka', 'service', 'engineer', 'A+', 'ftunrt67ur', 'tunr6t7ur', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '2023-05-07 03:56:12', '2023-05-07 03:56:12', NULL),
(37, '', NULL, '', '', 'developer.chayansarker+1@g', '', '', '', 'A+', '', '', '81dc9bdb52d04dc20036dbd8313ed055', 'user', '2023-05-07 06:24:01', '2023-05-07 06:24:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
