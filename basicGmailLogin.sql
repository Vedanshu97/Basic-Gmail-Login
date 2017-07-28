-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 28, 2017 at 08:24 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basicGmailLogin`
--

-- --------------------------------------------------------

--
-- Table structure for table `gmailUser`
--

CREATE TABLE `gmailUser` (
  `id` decimal(24,0) NOT NULL,
  `name` text NOT NULL,
  `link` text NOT NULL,
  `picture` text NOT NULL,
  `emailId` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gmailUser`
--

INSERT INTO `gmailUser` (`id`, `name`, `link`, `picture`, `emailId`) VALUES
('111451520463380010561', 'Vedanshu Dahiya', 'https://plus.google.com/111451520463380010561', 'https://lh5.googleusercontent.com/-4XLiD3Q7Jnk/AAAAAAAAAAI/AAAAAAAAAB0/xgcfqcC_ZIA/photo.jpg', 'cool.vedanshu@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gmailUser`
--
ALTER TABLE `gmailUser`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
