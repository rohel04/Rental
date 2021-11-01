-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 07:44 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`, `fname`, `email`, `dob`, `city`, `country`) VALUES
(1, 'rohel04', 'admin', 'Rohel Shakya', 'rohelshk@gmail.com', '2021-03-26', 'Kathmandu', 'Nepal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `b_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`b_id`, `user_id`, `p_id`, `p_name`, `date`) VALUES
(58, 30, 25, 'adarsh@gmail.com', '2021-04-24'),
(59, 28, 39, 'rohelshk@gmail.com', '2021-04-24'),
(61, 31, 26, 'byan@gmail.com', '2021-04-24'),
(62, 28, 28, 'rohelshk@gmail.com', '2021-04-24'),
(64, 28, 24, 'rohelshk@gmail.com', '2021-04-25'),
(65, 28, 23, 'rohelshk@gmail.com', '2021-05-07'),
(66, 28, 20, 'rohelshk@gmail.com', '2021-06-01'),
(68, 28, 43, 'rohelshk@gmail.com', '2021-07-15'),
(69, 28, 38, 'rohelshk@gmail.com', '2021-08-21'),
(70, 28, 32, 'rohelshk@gmail.com', '2021-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `message`) VALUES
(9, 'Elon Musk', 'elon@gmail.com', 'Hello. Good to see you'),
(10, 'Bill Gates', 'billy@gmail.com', 'I want to buy house in Kathmandu'),
(11, 'sunil', 'suni@gmail.com', 'fhdsahgsa;kj;'),
(12, 'Rohel Shakya', 'rohelshk@gmail.com', 'fgdg'),
(13, 'Rohel Shakya', 'rohelshk@gmail.com', 'Hello\r\n\r\n'),
(14, 'Bijen Maharjan', 'byan@gmail.com', 'I like you system'),
(17, 'coach Shakya', 'shakya@gmail.com', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE `tbl_property` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `rooms` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `home` tinyint(1) NOT NULL DEFAULT 0,
  `side` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`id`, `name`, `size`, `price`, `email`, `phone`, `bathrooms`, `rooms`, `location`, `photo`, `home`, `side`) VALUES
(20, 'Hamro Ghar', 1900, '25000', 'michelle@yahho.com', '9853269854', 3, 8, 'Swoyambu', 'house8.jpg', 0, 0),
(23, 'Newroad Vacation Rental', 2450, '30000', 'vacation@gmail.com', '9860415633', 3, 8, 'New Road', 'house13.jpg', 1, 1),
(24, 'Muktinath Housing', 2400, '40000', 'mukti@gmail.com', '9860246985', 4, 10, 'Thamel', 'house12.JPG', 1, 1),
(25, 'Manakamana Bangalow', 2600, '26000', 'mana@gmail.com', '9860934596', 2, 6, 'Kantipath', 'house11.jpg', 1, 0),
(26, 'Winter Housing', 2200, '60000', 'krishna@yahoo.com', '9875366958', 5, 10, 'Thamel', 'house15.jpg', 1, 0),
(28, 'Singha Durbar', 3000, '50000', 'junga@gmail.com', '9858963355', 8, 20, 'Maitighar', 'house16.jpg', 1, 1),
(32, 'Ramsung', 2500, '25000', 'ram@gmail.com', '9860956456', 5, 20, 'Nayabazar', 'house20.jpg', 0, 0),
(38, 'Gokarna Housing', 2200, '25000', 'gokarna.bista@gmail.com', '9875623655', 4, 9, 'Balaju', 'thumb_2617757515.jpg', 0, 0),
(39, 'Maharaj Ghar', 2500, '26000', 'manju@yahoo.com', '9841425789', 4, 10, 'Maharajgunj', 'house-on-sale-in-maharajgunj.jpg', 1, 0),
(42, 'Orchard House', 2200, '23000', 'richard@gmail.com', '9860939365', 5, 10, 'Thamel', 'house1.jpg', 0, 0),
(43, 'Ivy Cottage.', 2600, '25000', 'ivy@gmail.com', '9847569368', 3, 8, 'Naikap', 'house2.jpg', 0, 0),
(44, 'The Gables', 2500, '24000', 'gamlty@yahoo.com', '9860526690', 5, 10, 'Thankot', 'house3.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `md5pass` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `md5pass`, `fname`, `email`) VALUES
(28, 'rohel04', 'N@7ur@!1', '42ce43a53e8910dfe494699174c68406', 'Rohel Shakya', 'rohelshk@gmail.com'),
(30, 'adarsh04', 'N@7ur@!1', '42ce43a53e8910dfe494699174c68406', 'Adarsh Shakya', 'adarsh@gmail.com'),
(31, 'bzayn', 'N@7ur@!1', '42ce43a53e8910dfe494699174c68406', 'bijen maharjan', 'byan@gmail.com'),
(32, 'coach04', 'Abcd123', '2481656a94ba52fd208ea3b8f7e1d645', 'coach Shakya', 'shakya@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_property`
--
ALTER TABLE `tbl_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
