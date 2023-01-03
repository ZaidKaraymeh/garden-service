-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 03, 2023 at 09:56 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serviceSystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `date_time` date NOT NULL,
  `period` varchar(255) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `available` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user`, `service`, `date_time`, `period`, `payment`, `created_at`, `available`) VALUES
(15, 789, 1, '2023-01-02', 'day', 'paypal', '2023-01-01 22:00:27', 1),
(16, 789, 1, '2023-01-03', 'evening', 'paypal', '2023-01-02 13:07:09', 2),
(17, 789, 1, '2023-01-03', 'day', 'benefit', '2023-01-02 19:25:08', 1),
(18, 789, 1, '2023-01-05', 'evening', 'debit', '2023-01-02 20:47:22', 2),
(19, 790, 1, '2023-01-12', 'day', 'benefit', '2023-01-03 10:05:24', 1),
(20, 790, 1, '2023-01-13', 'day', 'benefit', '2023-01-03 10:08:28', 1),
(21, 790, 1, '2023-01-05', 'day', 'benefit', '2023-01-03 10:10:36', 1),
(22, 790, 1, '2023-01-15', 'day', 'creditcard', '2023-01-03 10:15:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user`, `service`, `comment`, `created_at`, `updated_at`) VALUES
(11, 789, 1, 'Very good ', '2023-01-01 22:01:07', '2023-01-01 22:01:07'),
(14, 789, 1, 'Pretty good customer service', '2023-01-02 13:08:04', '2023-01-02 13:08:04'),
(15, 789, 1, 'I like it!', '2023-01-02 19:55:47', '2023-01-02 19:55:47'),
(16, 789, 1, 'Not that good', '2023-01-02 20:02:58', '2023-01-02 20:02:58'),
(17, 789, 1, 'WORTHY SERVICE', '2023-01-02 20:37:11', '2023-01-02 20:37:11'),
(18, 790, 1, 'VVGOOD', '2023-01-03 10:05:38', '2023-01-03 10:05:38'),
(19, 790, 1, 'ABCD', '2023-01-03 10:08:48', '2023-01-03 10:08:48'),
(20, 790, 1, 'YES', '2023-01-03 10:10:48', '2023-01-03 10:10:48'),
(21, 790, 1, 'vgood', '2023-01-03 10:46:58', '2023-01-03 11:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` varchar(36) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating_table`
--

CREATE TABLE `rating_table` (
  `id` int(11) NOT NULL,
  `rate` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `service` int(11) NOT NULL,
  `rating` decimal(2,0) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user`, `service`, `rating`, `created_at`, `updated_at`) VALUES
(3, 789, 1, '5', '2023-01-01 22:01:04', '2023-01-01 22:01:04'),
(4, 789, 1, '4', '2023-01-02 13:08:04', '2023-01-02 13:08:04'),
(5, 789, 1, '4', '2023-01-02 19:55:47', '2023-01-02 19:55:47'),
(6, 790, 1, '4', '2023-01-03 10:05:38', '2023-01-03 10:05:38'),
(7, 790, 1, '4', '2023-01-03 10:08:48', '2023-01-03 10:08:48'),
(8, 790, 1, '5', '2023-01-03 10:10:48', '2023-01-03 10:10:48'),
(9, 790, 1, '5', '2023-01-03 10:46:58', '2023-01-03 10:46:58');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(255) NOT NULL COMMENT 'path to image',
  `description` text NOT NULL,
  `rating` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `price`, `picture`, `description`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'Excavation', 300, 'service-1.jpg', 'The cost to remove a palm tree does depend on a few factors. Size is one of them, but also the palm species and it\'s location on your proerty.', 0, '2022-12-31 12:33:29', '2023-01-01 21:53:00'),
(2, 'Landscape Design', 500, 'service-2.jpg', 'We provide various types of exotic flowers, fruit trees, palms and expert knowledge to help you decide what is best.', 0, '2022-12-31 13:29:33', '2023-01-01 21:54:34'),
(3, 'Installation of irrigation systems', 350, 'service-3.jpg', 'A sprinkler system keep your grass, plants, and trees healthy–if properly set up and maintained, it can also help conserve water. Having a good system can also boost the resale value of your home or building.', 0, '2023-01-01 21:55:27', '2023-01-01 21:55:27'),
(4, 'Edging, Trimming and Shifting', 400, 'service-4.png', 'With out expertise gardeners we\'ll provide you with all the care your garden needs wheater you\'re planting new trees, lawn mowers etc.', 0, '2023-01-01 21:56:11', '2023-01-01 21:56:11'),
(5, 'Cleaning', 100, 'service-1672729462130870853163b3d376eb940.jpeg', '12345', 0, '2023-01-03 10:04:22', '2023-01-03 10:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullName` varchar(80) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(128) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `user_type` char(3) NOT NULL DEFAULT 'CTM',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `spending` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullName`, `image`, `email`, `password`, `phone_number`, `user_type`, `created_at`, `updated_at`, `spending`) VALUES
(785, 'Ali Abadi', '1.png', 'aasd@ss.com', '$2y$10$s7W41j7/chNnHHGgDe9lkO2rWEsgu3/3wWpD3s74LppFGl5q11xWW', '33331362', 'CTM', '2022-12-24 23:30:36', '2022-12-30 10:35:01', 0),
(786, 'Admin', '1.png', 'admin@admin.com', '$2y$10$s7W41j7/chNnHHGgDe9lkO2rWEsgu3/3wWpD3s74LppFGl5q11xWW', '33123456', 'Adm', '2022-12-29 11:41:49', '2022-12-30 10:35:05', 0),
(787, 'ali', 'user_default.jpg', 'ali@ali.com', '$2y$10$4vnQfEVt8ekdAt.N/WJyxO4kAJ0g/BBbPNZy.I5LTmg2REccfdJSK', '33345678', 'CTM', '2022-12-30 10:57:02', '2022-12-31 16:08:49', 0),
(789, 'Ahmed  Yusuf', 'user_default.jpg', 'ahmed@gmail.com', '$2y$10$ZEG5YVmTc0BvFHe3QJeKruIwML//aNa0yi89mjgHhhiZNZ6.BobbC', '36728829', 'CTM', '2023-01-01 18:39:59', '2023-01-03 10:23:21', 0),
(790, 'Ahmed  Yusuf', 'user_default.jpg', 'admin@ahmed.com', '$2y$10$i18A1lHn1PQ4rBHsyCi8yeG.WIpAhi3Cd.vCxyPEyeN2MqNYgHOly', '36728829', 'Adm', '2023-01-03 09:59:50', '2023-01-03 10:15:49', 1320);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service` (`service`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`),
  ADD KEY `service` (`service`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_table`
--
ALTER TABLE `rating_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service` (`service`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rating_table`
--
ALTER TABLE `rating_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=791;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`service`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`service`) REFERENCES `service` (`id`);

--
-- Constraints for table `rating_table`
--
ALTER TABLE `rating_table`
  ADD CONSTRAINT `rating_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_table_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`service`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
