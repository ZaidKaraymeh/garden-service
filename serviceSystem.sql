-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 29, 2022 at 02:59 PM
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
  `id` varchar(36) NOT NULL,
  `user` varchar(36) NOT NULL,
  `service` varchar(36) NOT NULL,
  `date_time` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` varchar(36) NOT NULL,
  `user` varchar(36) NOT NULL,
  `service` varchar(36) NOT NULL,
  `comment` text NOT NULL,
  `comment_type` char(8) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `service_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, 786, 1, 5, '2022-12-29 13:28:08', '2022-12-29 13:28:08'),
(2, 785, 1, 4, '2022-12-29 13:28:44', '2022-12-29 13:28:44');

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
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `price`, `picture`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Excavation', 20, 'img/services/service-1.jpg', 'The cost to remove a palm tree does depend on a few factors. Size is one of them, but also the palm species and it\'s location on your proerty.', '2022-12-29 12:38:47', '2022-12-29 12:38:47'),
(2, 'Landscape Design', 20, 'img/services/service-2.jpg', 'We provide various types of exotic flowers, fruit trees, palms and expert knowledge to help you decide what is best.', '2022-12-29 12:39:59', '2022-12-29 12:39:59'),
(3, 'Installation of irrigation systems', 20, 'img/services/service-3.jpg', 'A sprinkler system keep your grass, plants, and trees healthy–if properly set up and maintained, it can also help conserve water. Having a good system can also boost the resale value of your home or building.', '2022-12-29 12:41:15', '2022-12-29 12:41:15'),
(4, 'Edging, Trimming and Shifting', 20, 'img/services/service-4.png', 'With out expertise gardeners we\'ll provide you with all the care your garden needs wheater you\'re planting new trees, lawn mowers etc.', '2022-12-29 12:42:02', '2022-12-29 12:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullName` varchar(80) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` char(128) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `user_type` char(3) NOT NULL DEFAULT 'CTM',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `spending` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullName`, `image`, `email`, `password`, `phone_number`, `user_type`, `created_at`, `updated_at`, `spending`) VALUES
(785, 'Bahaa hani', '', 'blainefire123@gmail.com', '$2y$10$A7QRW5joc.FhJ3b/owrY/uSW7NWvXJ0wwXDdgas760G3DgMtZN0vO', '33331362', 'CTM', '2022-12-24 23:30:36', '2022-12-24 23:30:36', 0),
(786, 'Ahmed  Yusuf', NULL, 'ahmed@gmail.com', '$2y$10$bTUvkrbQnXVZAanxXroqjeZd/UACpN8nmhqUqqmJRsaXRdoxtaeMS', '97336728829', 'CTM', '2022-12-25 01:23:12', '2022-12-25 01:23:12', 0),
(789, 'admin', NULL, 'admin@admin.com', '$2y$10$BPguWoWyr/z4OYsMQI3PCuZcxYOfVBgd2FkzclEo0JULwibfHf9BG', '33334444', 'Adm', '2022-12-25 01:31:06', '2022-12-25 01:32:16', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=791;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
