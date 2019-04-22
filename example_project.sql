-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 06:00 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `example_project`
--
CREATE DATABASE IF NOT EXISTS `example_project` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `example_project`;

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_id` int(11) NOT NULL,
  `item_name` varchar(150) NOT NULL,
  `item_category` varchar(100) NOT NULL,
  `date_posted` date NOT NULL,
  `product_qty` varchar(100) NOT NULL,
  `product_prc` varchar(100) NOT NULL,
  `product_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `item_name`, `item_category`, `date_posted`, `product_qty`, `product_prc`, `product_img`) VALUES
(10, 'Laptop', 'Gadgets', '2019-04-22', '50', '23000', 'laptop.jpg'),
(11, 'Jacket', 'Clothes', '2019-04-22', '50', '899', 'jacket.jpg'),
(12, 'Burger', 'Food', '2019-04-22', '50', '80', 'burger.jpg'),
(13, 'Office Chair', 'Furniture', '2019-04-16', '50', '650', 'chair.jpg'),
(14, 'Crayons', 'School Supplies', '2019-04-16', '50', '23', 'crayons.jpg'),
(24, 'test', 'Clothes', '2019-04-22', '21', '21', 'jacket.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `firstname` varchar(80) NOT NULL,
  `middlename` varchar(80) NOT NULL,
  `lastname` varchar(80) NOT NULL,
  `img` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`id`, `username`, `password`, `email`, `firstname`, `middlename`, `lastname`, `img`) VALUES
(53, 'admin', 'password', 'balogz2203@gmail.com', 'Jester', 'Malvar', 'Manalo', 'balogs.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
