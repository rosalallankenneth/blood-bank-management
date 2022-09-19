-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2020 at 03:33 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `id` int(11) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `fname` varchar(200) NOT NULL,
  `bg` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blood`
--

INSERT INTO `blood` (`id`, `lname`, `fname`, `bg`, `age`, `address`, `mobile`, `date`) VALUES
(1, 'Artajo', 'Mark', 'A+', 24, 'Cebu City', '09054557616', 'April 21, 2020'),
(2, 'Manduke', 'Harold', 'AB+', 34, 'Cagayan de Oro', '09096218286', 'April 20, 2020'),
(3, 'Antukin', 'Jose', 'A+', 52, 'Olongapo City', '09095862345', 'April 26, 2020'),
(4, 'Artajo', 'Mark', 'A+', 20, 'Cebu City', '09054557616', 'April 22, 2020'),
(5, 'Marikit', 'Isabela', 'O+', 47, 'Isabela City', '09453316278', 'April 26, 2020'),
(6, 'Tan', 'Hailee', 'B+', 21, 'Cebu City', '09214215286', 'April 26, 2020'),
(7, 'Philip', 'Dominguez', 'AB+', 27, 'Ozamiz', '09864127878', 'April 26, 2020'),
(8, 'Gadenile', 'Matteo', 'A-', 27, 'Dipolog City', '09556253479', 'April 26, 2020'),
(11, 'Maringsen', 'Arabela', 'B-', 22, 'Marikina City', '09057321254', 'April 26, 2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
