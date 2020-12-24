-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2020 at 12:36 PM
-- Server version: 8.0.18
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdf`
--

-- --------------------------------------------------------

--
-- Table structure for table `basicdetails`
--

CREATE TABLE `basicdetails` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `basicdetails`
--

INSERT INTO `basicdetails` (`id`, `fname`, `lname`, `email`, `dob`, `gender`) VALUES
(10, 'Md', 'sadik', 'sadik@gmail.com', '1992-10-08', 'Male'),
(12, 'John', 'Deo', 'jhon@gmail.com', '1995-09-10', 'Male'),
(14, 'Katrina', 'Kaif', 'kat@gmail.com', '1990-07-19', 'Female'),
(15, 'Safa', 'Khan', 'safa@gmail.com', '2006-07-01', 'Female'),
(16, 'Shubham', 'Panday', 'shubham@gmail.com', '1995-08-05', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basicdetails`
--
ALTER TABLE `basicdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basicdetails`
--
ALTER TABLE `basicdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
