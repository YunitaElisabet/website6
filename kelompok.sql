-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 07:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kelompok`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `uid` varchar(128) NOT NULL,
  `date` datetime NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `uid`, `date`, `message`) VALUES
(1, 'Yunita', '2020-12-05 15:28:38', 'Wah barangnya bagus kaka, barangnya ori lagi'),
(2, 'Tomi', '2020-12-05 15:28:38', 'Wah kualitas bagus harga terjangkau'),
(3, 'Frindi', '2020-12-06 10:16:35', 'Wah barangnya tepat dan cepat di antar'),
(90, 'Tora', '2020-12-17 09:36:25', 'Halo kaka');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(11) NOT NULL,
  `p_number` bigint(20) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_image` varchar(250) NOT NULL,
  `p_amount` int(11) NOT NULL,
  `p_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `p_number`, `p_name`, `p_image`, `p_amount`, `p_status`) VALUES
(1, 852369, 'Dusty Blue (Size L) ', '11a.jpeg', 42000, 'Active'),
(2, 159753, 'White Blouse (Size M)\r\n', '12a.jpeg', 50000, 'Active'),
(3, 357842, 'Stripe T-shirt  (Colza) (Size L)\r\n', '13.jpeg', 50000, 'Active'),
(4, 456654, 'Navy White (Size M) \r\n', '14.jpeg', 35000, 'Active'),
(5, 358426, 'Sweater (Size Oversize )', '15.jpeg', 100000, 'Active'),
(6, 123222, 'Brown (Size M)', '16.jpeg', 55000, 'Active'),
(7, 741852, 'White Cardigan (Size M)', '17.jpeg', 40000, 'Active'),
(8, 963852, 'Stripe T-shirt(Size Oversize )', '18.jpeg', 35000, 'Active'),
(9, 999666, 'Zara (Size M)', '19.jpeg', 65000, 'Active'),
(10, 332211, 'H&M (Size Fit to L)', '20.jpeg', 45000, 'Active'),
(11, 848484, 'Gucigeng ( Size S)', '21.jpeg', 78000, 'Active'),
(12, 379182, 'Valentino ( Size L )', '22.jpeg', 58000, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_number` (`p_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
