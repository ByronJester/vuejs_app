-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2019 at 09:18 AM
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
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(50) NOT NULL,
  `status` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`cart_id`, `user_id`, `product_id`, `qty`, `status`) VALUES
(2, 6, 10, '1', 'completed'),
(8, 6, 11, '1', 'completed'),
(9, 6, 10, '1', 'completed'),
(10, 6, 11, '1', 'completed'),
(11, 6, 10, '1', 'completed'),
(12, 6, 11, '1', 'completed'),
(13, 6, 12, '1', 'pending'),
(14, 6, 13, '1', 'pending'),
(15, 6, 14, '1', 'pending'),
(16, 6, 24, '1', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `customer_tbl`
--

CREATE TABLE `customer_tbl` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `middle_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `profile_img` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_tbl`
--

INSERT INTO `customer_tbl` (`user_id`, `username`, `password`, `email`, `phone`, `first_name`, `middle_name`, `last_name`, `profile_img`) VALUES
(6, 'balogs', 'password', 'byronjester.manalo@paydro.ph', '09354315556', 'Byron Jester', 'Malvar', 'Manalo', 'blogs.jpg');

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
(10, 'Laptop', 'Gadgets', '2019-04-26', '44', '23000', 'laptop.jpg'),
(11, 'Jacket', 'Clothes', '2019-04-22', '47', '899', 'jacket.jpg'),
(12, 'Burger', 'Food', '2019-04-22', '50', '80', 'burger.jpg'),
(13, 'Office Chair', 'Furniture', '2019-04-16', '50', '650', 'chair.jpg'),
(14, 'Crayons', 'School Supplies', '2019-04-16', '50', '23', 'crayons.jpg'),
(24, 'Jackey', 'Clothes', '2019-04-23', '50', '2100', 'jacket.jpg'),
(25, 'test', 'School Supplies', '2019-04-23', '21', '21', 'crayons.jpg'),
(26, 'test', 'Gadgets', '2019-04-23', '21', '21', 'laptop.jpg'),
(27, 'test', 'Furniture', '2019-04-23', '21', '21', 'chair.jpg'),
(28, 'test', 'Food', '2019-04-23', '21', '21', 'burger.jpg'),
(29, 'test', 'Clothes', '2019-04-23', '21', '21', 'jacket.jpg'),
(30, 'test', 'Gadgets', '2019-04-23', '21', '21', 'laptop.jpg'),
(31, 'test', 'Gadgets', '2019-04-23', '41', '41', 'burger.jpg'),
(32, 'sad', 'Gadgets', '2019-04-23', '12', '12', 'crayons.jpg'),
(33, 'das', 'Gadgets', '2019-04-23', '31', '13', 'chair.jpg');

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
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer_tbl`
--
ALTER TABLE `customer_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
