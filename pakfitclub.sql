-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2021 at 11:05 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakfitclub`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(56) NOT NULL,
  `password` varchar(56) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `timestamp`) VALUES
(1, 'admin@gmail.com', 'admin', '2021-05-31 13:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `book_trainer`
--

CREATE TABLE `book_trainer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trainer_id` int(11) NOT NULL,
  `day` varchar(56) NOT NULL,
  `session_duration` varchar(56) NOT NULL,
  `duration` varchar(56) NOT NULL,
  `class` varchar(56) NOT NULL,
  `gender` varchar(56) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `user_id` int(8) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `timestamp`) VALUES
(25, 'clothes', '2021-06-16 09:29:38'),
(26, 'Machinery', '2021-06-24 12:34:14'),
(27, 'Chair', '2021-06-24 12:35:02'),
(28, 'watch', '2021-06-24 13:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `id` int(11) NOT NULL,
  `name` varchar(56) NOT NULL,
  `description` varchar(256) NOT NULL,
  `duration` varchar(56) NOT NULL,
  `price` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `name`, `description`, `duration`, `price`) VALUES
(7, 'Monthly Membership', '	Appointedd improved our customer management and also brought us a lot of publicity. Not only did we become more visible online, we were also interviewed by 3 newspapers as the first adopters of this kind of system in our region.', '6 Year', '20'),
(8, 'Yearly Membership', '	Appointedd improved our customer management and also brought us a lot of publicity. Not only did we become more visible online, we were also interviewed by 3 newspapers as the first adopters of this kind of system in our region.', '1 Year', '50'),
(9, 'Yearly Membership', '	Appointedd improved our customer management and also brought us a lot of publicity. Not only did we become more visible online, we were also interviewed by 3 newspapers as the first adopters of this kind of system in our region.', '2 Years', '100');

-- --------------------------------------------------------

--
-- Table structure for table `membership_orders`
--

CREATE TABLE `membership_orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `membership_id` int(11) NOT NULL,
  `membership_name` varchar(56) NOT NULL,
  `membership_price` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membership_orders`
--

INSERT INTO `membership_orders` (`id`, `user_id`, `membership_id`, `membership_name`, `membership_price`) VALUES
(1, 2, 1, 'Yearly Membership', '2000'),
(2, 2, 1, 'Yearly Membership', '2000'),
(3, 2, 1, 'Yearly Membership', '700'),
(5, 1, 3, 'Yearly Membership', '200'),
(6, 1, 1, 'Yearly Membership', '700');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `s_address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `p_code` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `check_method` varchar(100) NOT NULL,
  `pro_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `amount` int(100) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `f_name`, `l_name`, `s_address`, `city`, `country`, `p_code`, `email`, `phone`, `check_method`, `pro_id`, `qty`, `size`, `amount`, `order_status`, `timestamp`) VALUES
(1, 2, 'ali', 'khan', 'ali274', 'shaiwal', 'Pakistan', '57000', 'ali@gmail.com', '0974576547654', 'COD', 5, 3, 'S', 80, 0, '2021-06-21 07:44:02'),
(2, 2, 'ali', 'khan', 'ali274', 'shaiwal', 'Pakistan', '57000', 'ali@gmail.com', '0974576547654', 'COD', 5, 3, 'S', 80, 0, '2021-06-21 07:44:04'),
(3, 2, 'ali', 'khan', 'ali274', 'shaiwal', 'Pakistan', '57000', 'ali@gmail.com', '0974576547654', 'COD', 5, 3, 'S', 80, 0, '2021-06-21 07:44:06'),
(4, 2, 'ali', 'khan', 'ali274', 'shaiwal', 'Pakistan', '57000', 'ali@gmail.com', '0974576547654', 'COD', 5, 3, 'S', 80, 0, '2021-06-21 07:44:08'),
(5, 2, 'ali', 'khan', 'ali274', 'shaiwal', 'Pakistan', '57000', 'ali@gmail.com', '0974576547654', 'COD', 5, 3, 'S', 80, 0, '2021-06-21 07:44:08'),
(6, 2, 'ali', 'khan', 'ali274', 'shaiwal', 'Pakistan', '57000', 'ali@gmail.com', '0974576547654', 'COD', 5, 3, 'S', 80, 0, '2021-06-21 07:44:08'),
(7, 2, 'ali', 'khan', 'ali274', 'shaiwal', 'Pakistan', '57000', 'ali@gmail.com', '0974576547654', 'COD', 5, 3, 'S', 80, 0, '2021-06-21 07:44:13'),
(8, 2, 'ali', 'khan', 'ali274', 'shaiwal', 'Pakistan', '57000', 'ali@gmail.com', '0974576547654', 'COD', 5, 3, 'S', 80, 0, '2021-06-21 07:44:15'),
(9, 2, 'ali', 'khan', 'ali274', 'shaiwal', 'Pakistan', '57000', 'ali@gmail.com', '0974576547654', 'COD', 5, 3, 'S', 80, 0, '2021-06-21 07:44:15'),
(10, 2, 'ali', 'khan', 'ali274', 'shaiwal', 'Pakistan', '57000', 'ali@gmail.com', '0974576547654', 'COD', 5, 3, 'S', 80, 0, '2021-06-21 07:44:15'),
(11, 2, 'khurram', 'shahzad', '374/s Farid Town Sahiwal', 'Sahiwal', 'Pakistan', '5700', 'gmchaudhary444@gmail.com', '03156012082', 'COD', 13, 0, 'S', 0, 0, '2021-07-17 09:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `cat_id` int(8) NOT NULL,
  `name` varchar(100) NOT NULL,
  `discription` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `inventory` int(4) NOT NULL,
  `price` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `discription`, `image`, `inventory`, `price`, `timestamp`) VALUES
(13, 21, 'Machine', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit neque ad repellendus. Qui, tenetur similique voluptas molestiae aut aspernatur nostrum consequatur illum, voluptatem exercitationem tempore nesciunt? Labore blanditiis deserunt iusto.', 'product7.jpg', 12, 5454, '2021-06-24 15:08:41'),
(14, 25, 'T-shirt', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit neque ad repellendus. Qui, tenetur similique voluptas molestiae aut aspernatur nostrum consequatur illum, voluptatem exercitationem tempore nesciunt? Labore blanditiis deserunt iusto.', 'product3.jpg', 0, 340, '2021-06-24 12:32:20'),
(15, 27, 'Machine', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit neque ad repellendus. Qui, tenetur similique voluptas molestiae aut aspernatur nostrum consequatur illum, voluptatem exercitationem tempore nesciunt? Labore blanditiis deserunt iusto.', 'product1.jpg', 0, 7770, '2021-06-24 12:36:11'),
(16, 27, 'Gym Vhair', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit neque ad repellendus. Qui, tenetur similique voluptas molestiae aut aspernatur nostrum consequatur illum, voluptatem exercitationem tempore nesciunt? Labore blanditiis deserunt iusto.', 'product2.jpg', 0, 3330, '2021-06-24 12:35:32'),
(17, 26, 'Machine', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit neque ad repellendus. Qui, tenetur similique voluptas molestiae aut aspernatur nostrum consequatur illum, voluptatem exercitationem tempore nesciunt? Labore blanditiis deserunt iusto.', 'product10.jpg', 0, 4545, '2021-06-24 12:37:14'),
(18, 25, 'Gloves', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit neque ad repellendus. Qui, tenetur similique voluptas molestiae aut aspernatur nostrum consequatur illum, voluptatem exercitationem tempore nesciunt? Labore blanditiis deserunt iusto.', 'product4.jpg', 0, 4440, '2021-06-24 12:38:20'),
(19, 26, 'Machine', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit neque ad repellendus. Qui, tenetur similique voluptas molestiae aut aspernatur nostrum consequatur illum, voluptatem exercitationem tempore nesciunt? Labore blanditiis deserunt iusto.', 'product8.jpg', 0, 11110, '2021-06-24 12:42:33'),
(20, 26, 'Machine', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus blanditiis nobis odio magni enim quas facilis ea libero at pariatur? Accusantium corrupti voluptatum vero dicta alias animi deleniti accusamus tenetur!', 'product15.jpg', 0, 44440, '2021-06-24 13:22:22'),
(21, 28, 'Watch', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus blanditiis nobis odio magni enim quas facilis ea libero at pariatur? Accusantium corrupti voluptatum vero dicta alias animi deleniti accusamus tenetur!', 'product13.jpg', 0, 440, '2021-06-24 13:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `saved_products`
--

CREATE TABLE `saved_products` (
  `id` int(11) NOT NULL,
  `user_id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `saved_products`
--

INSERT INTO `saved_products` (`id`, `user_id`, `product_id`, `timestamp`) VALUES
(49, 1, 1, '2021-03-01 10:34:43'),
(50, 1, 2, '2021-03-01 10:35:01'),
(51, 1, 3, '2021-03-01 20:54:44'),
(53, 2, 2, '2021-03-02 09:44:15'),
(55, 1, 4, '2021-03-09 02:36:03'),
(56, 2, 1, '2021-05-01 20:27:23'),
(58, 2, 3, '2021-05-01 21:00:18'),
(60, 2, 6, '2021-05-22 07:31:52'),
(61, 2, 13, '2021-07-03 19:53:57'),
(62, 2, 14, '2021-07-13 16:49:40');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` int(11) NOT NULL,
  `name` varchar(56) NOT NULL,
  `image` varchar(56) NOT NULL,
  `experience` varchar(56) NOT NULL,
  `discription` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `name`, `image`, `experience`, `discription`) VALUES
(1, 'Ali', 'about-us-person1.png', '5 Year', 'Appointedd improved our customer management and also brought us a lot of publicity. Not only did we become more visible online, we were also interviewed by 3 newspapers as the first adopters of this kind of system in our region.'),
(2, 'Usman', 'about-us-person4.png', '5 Year', 'Appointedd improved our customer management and also brought us a lot of publicity. Not only did we become more visible online, we were also interviewed by 3 newspapers as the first adopters of this kind of system in our region.\r\n'),
(5, 'Muhammad Ahamad', 'about-us-person3.png', '10 years', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus blanditiis nobis odio magni enim quas facilis ea libero at pariatur? Accusantium corrupti voluptatum vero dicta alias animi deleniti accusamus tenetur!'),
(6, 'Aziz Ahmad', 'about-us-person1.png', '10 years', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Temporibus blanditiis nobis odio magni enim quas facilis ea libero at pariatur? Accusantium corrupti voluptatum vero dicta alias animi deleniti accusamus tenetur!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `user_name` varchar(32) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_password` varchar(16) NOT NULL,
  `user_mobile` varchar(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_email`, `user_password`, `user_mobile`, `timestamp`) VALUES
(1, 'Khurram', 'ks559667@gmail.com', '111', '19', '2020-09-08 19:31:55'),
(2, 'ali', 'ali@gmail.com', '111', '03156012082', '2021-06-21 07:48:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_trainer`
--
ALTER TABLE `book_trainer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_orders`
--
ALTER TABLE `membership_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saved_products`
--
ALTER TABLE `saved_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_trainer`
--
ALTER TABLE `book_trainer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `membership_orders`
--
ALTER TABLE `membership_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `saved_products`
--
ALTER TABLE `saved_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
