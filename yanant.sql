-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2019 at 12:07 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yanant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_date`, `modified_date`) VALUES
(1, 'admin ', 'admin@gmail.com', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandid` int(11) NOT NULL,
  `brandname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandid`, `brandname`) VALUES
(1, 'Bvlgari'),
(2, 'Channel'),
(3, 'Lacoste'),
(4, 'Burberry'),
(5, 'Calvin Klein'),
(6, 'Gucci'),
(7, 'Tom Ford'),
(8, 'Victoria Secret'),
(9, 'Ysl'),
(10, 'D&G'),
(11, 'Versace');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ph_no` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `ph_no`, `feedback`, `created_date`) VALUES
(11, 'john', 988888, 'Service is good', '2017-04-01 17:15:53'),
(13, 'esf', 3456, 'thpo', '2017-04-05 14:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productqty` int(11) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`orderid`, `productid`, `productqty`, `amount`) VALUES
(0, 72, 1, 650000),
(1, 72, 1, 650000),
(2, 47, 1, 10000),
(3, 7, 1, 35000),
(3, 59, 1, 4500),
(3, 39, 1, 60000),
(4, 109, 1, 20000),
(4, 37, 1, 10000),
(5, 47, 1, 10000),
(5, 51, 1, 25000),
(6, 57, 1, 25000),
(7, 60, 1, 9000),
(8, 80, 1, 80000),
(9, 27, 1, 8500),
(10, 19, 5, 30000),
(10, 88, 1, 150000),
(11, 14, 1, 10000),
(11, 10, 9, 90000),
(11, 60, 8, 72000),
(11, 48, 5, 50000),
(12, 67, 2, 1000000),
(12, 108, 1, 26000),
(13, 72, 1, 650000),
(14, 71, 1, 680000),
(15, 26, 2, 14000),
(15, 25, 2, 24000),
(16, 26, 1, 7000),
(17, 47, 1, 10000),
(17, 54, 1, 15000),
(18, 84, 1, 75000),
(19, 72, 1, 650000),
(20, 1, 2, 160),
(21, 14, 1, 550);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `deliveryname` varchar(30) NOT NULL,
  `deliveryphone` varchar(20) NOT NULL,
  `deliveryaddress` varchar(255) NOT NULL,
  `orderdate` date NOT NULL,
  `status` int(11) NOT NULL,
  `senddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `customerid`, `deliveryname`, `deliveryphone`, `deliveryaddress`, `orderdate`, `status`, `senddate`) VALUES
(20, 9, 'Arkar', '01501243', 'Yangon', '2019-10-31', 0, '0000-00-00'),
(21, 9, 'Arkar', '01501243', 'Yangon', '2019-10-31', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `brandid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productname`, `brandid`, `price`, `quantity`, `photo`) VALUES
(1, 'Man In Black Eau De Parfum ', 1, 80, 10, '2.Man In Black Eau De Parfum .jpg'),
(2, 'Rose Goldea Eau De Parfum', 1, 113, 10, '1.Rose Goldea Eau De Parfum .jpg'),
(3, 'CHANCE EAU TENDRE', 1, 135, 10, '1.CHANCE EAU TENDRE.jpg'),
(4, 'Aqva Pour Homme Eau De Toilett', 1, 73, 10, '3.Aqva Pour Homme Eau De Toilette.jpg'),
(5, 'Touch Of Pink Perfume', 1, 22, 10, '9.Touch Of Pink Perfume.jpg'),
(6, 'Lacoste Eau De Lacoste L.12.12', 1, 37, 30, '12.Lacoste Eau De Lacoste L.12.12 Sparkling Perfume.jpg'),
(7, 'Lacoste Inspiration Perfume', 1, 45, 10, '16.Lacoste Inspiration Perfume.jpg'),
(8, 'Mr.', 4, 87, 15, 'Burberry-6.jpg'),
(9, 'Touch', 4, 88, 20, 'Burberry-13.jpg'),
(10, 'Burberry body gold', 4, 60, 20, 'Burberry-4.jpg'),
(11, 'Calvin Klein Woman', 5, 32, 20, 'Calvin Klein-2.jpg'),
(12, 'Ck Be', 5, 12, 30, 'Calvin Klein-15.jpg'),
(13, 'Ck one shock', 5, 550, 10, 'Calvin Klein-16.jpg'),
(14, ' Flora Glamorous Magnolia  Jum', 6, 550, 20, 'Gucci Perfume-17.jpg'),
(15, ' Guilty', 6, 300, 15, 'Gucci Perfume-2.jpg'),
(16, 'Guilty Black', 6, 250, 20, 'Gucci Perfume-9.jpg'),
(17, 'Tuscan Leather', 0, 500, 20, 'Tom Ford-3.jpg'),
(18, ' Lost Cherry ', 0, 500, 10, 'Tom Ford-11.jpg'),
(19, 'Ombre leather', 0, 300, 20, 'Tom Ford-5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(33) NOT NULL,
  `password` varchar(222) NOT NULL,
  `email` varchar(22) NOT NULL,
  `phone` text NOT NULL,
  `address` varchar(333) NOT NULL,
  `role` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `phone`, `address`, `role`) VALUES
(1, 'May', 'e10adc3949ba59abbe56e057f20f883e', 'may@gmail.com', '01501243', 'Yangon', 'user'),
(2, 'Kaung', 'e35cf7b66449df565f93c607d5a81d09', 'kaung@gmail.com', '1456245', 'Mandalay', 'user'),
(3, 'KoKaung', '96e79218965eb72c92a549dd5a330112', 'ko@gmail.com', '01235656', 'TGUU', 'user'),
(4, 'SuSu', 'e10adc3949ba59abbe56e057f20f883e', 'su@gmail.com', '01501243', 'Yangon', 'user'),
(5, 'swe zin', 'e10adc3949ba59abbe56e057f20f883e', 'gh@gmail.com', '09876543', 'yangon', 'user'),
(6, 'jklop', 'e10adc3949ba59abbe56e057f20f883e', 'jk@gmail.com', '-98754', 'yangon', 'user'),
(7, 'Phyo', '4297f44b13955235245b2497399d7a93', 'phyo@gmail.com', '0150462', 'Yangon', 'user'),
(8, 'Hla', '202cb962ac59075b964b07152d234b70', 'hla@gmail.com', '01203564', 'Yangon', 'user'),
(9, 'Arkar', 'e10adc3949ba59abbe56e057f20f883e', 'arkar@gmail.com', '01501243', 'Yangon', 'user'),
(10, 'user001', 'd440aed189a13ff970dac7e7e8f987b2', 'user001@gmail.com', '8461526451', 'homeless', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
