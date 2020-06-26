-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 05:42 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `like_post`
--

CREATE TABLE `like_post` (
  `id` int(200) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_name` text NOT NULL,
  `post_id` int(200) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `like_post`
--

INSERT INTO `like_post` (`id`, `user_id`, `user_name`, `post_id`, `image`) VALUES
(24, 14, 'moni', 11, '19225311_1375894162500658_6648171146056932674_n.jpg'),
(25, 13, 'shuvo', 11, '10535622_673447669405724_5289982572716181313_o.jpg'),
(26, 13, 'shuvo', 13, '10535622_673447669405724_5289982572716181313_o.jpg'),
(27, 14, 'moni', 14, '19225311_1375894162500658_6648171146056932674_n.jpg'),
(28, 13, 'shuvo', 15, '10535622_673447669405724_5289982572716181313_o.jpg'),
(29, 14, 'moni', 15, '19225311_1375894162500658_6648171146056932674_n.jpg'),
(30, 14, 'moni', 16, '19225311_1375894162500658_6648171146056932674_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `like_post_count`
--

CREATE TABLE `like_post_count` (
  `id` int(200) NOT NULL,
  `post_id` int(200) NOT NULL,
  `count` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(200) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_post` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` text NOT NULL,
  `count` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `user_post`, `date`, `user_name`, `count`) VALUES
(13, 13, 'Hi i am shuvo bhowmik this is my first post', '2020-06-23 10:54:20', 'shuvo', 1),
(14, 14, 'hellow Everyone how are you??', '2020-06-23 13:20:30', 'moni', 1),
(15, 14, 'it is afternoon  time', '2020-06-23 15:27:54', 'moni', 2);

-- --------------------------------------------------------

--
-- Table structure for table `receiver`
--

CREATE TABLE `receiver` (
  `id` int(200) NOT NULL,
  `r_id` int(200) NOT NULL,
  `sender_id` int(200) NOT NULL,
  `r_data` text NOT NULL,
  `r_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receiver`
--

INSERT INTO `receiver` (`id`, `r_id`, `sender_id`, `r_data`, `r_name`) VALUES
(17, 15, 13, 'oi value??', 'value'),
(28, 13, 14, 'finally done', 'shuvo'),
(29, 14, 13, 'yes', 'shuvo');

-- --------------------------------------------------------

--
-- Table structure for table `sender`
--

CREATE TABLE `sender` (
  `id` int(200) NOT NULL,
  `sender_id` int(200) NOT NULL,
  `sender_data` text NOT NULL,
  `r_id` int(200) NOT NULL,
  `sender_name` text NOT NULL,
  `r_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sender`
--

INSERT INTO `sender` (`id`, `sender_id`, `sender_data`, `r_id`, `sender_name`, `r_name`) VALUES
(42, 13, 'oi value??', 15, 'shuvo', 'value'),
(53, 14, 'finally done', 13, 'moni', 'shuvo'),
(54, 13, 'yes', 14, 'shuvo', 'shuvo');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(200) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` int(200) NOT NULL,
  `sex` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `sex`, `image`) VALUES
(13, 'shuvo', 'bhowmik', 'shuvobhowmik@yahoo.com', '123456789', 123456789, 'Male', '10535622_673447669405724_5289982572716181313_o.jpg'),
(14, 'moni', 'bhowmik', 'monibhowmik@yahoo.com', '123456789', 123456789, 'female', '19225311_1375894162500658_6648171146056932674_n.jpg'),
(15, 'value', 'dutta', 'valuedutta@yahoo.com', '123456789', 123456789, 'Male', '91780476_2847635598653576_2844893806094974976_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_image`
--

CREATE TABLE `user_image` (
  `id` int(200) NOT NULL,
  `user_id` int(200) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_image`
--

INSERT INTO `user_image` (`id`, `user_id`, `image`) VALUES
(2, 14, '19225311_1375894162500658_6648171146056932674_n.jpg'),
(6, 13, '10535622_673447669405724_5289982572716181313_o.jpg'),
(7, 13, '46457961_1946597375424074_5878298103383064576_o.jpg'),
(8, 13, '16804273_1278520108898474_8859719917644571083_o.jpg'),
(9, 14, '83724133_2798990160191044_4043990577115561984_o.jpg'),
(10, 14, '83784610_2798990063524387_7295446163543556096_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_information`
--

CREATE TABLE `user_information` (
  `id` int(200) NOT NULL,
  `user_school` text NOT NULL,
  `user_address` text NOT NULL,
  `user_hobby` text NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_information`
--

INSERT INTO `user_information` (`id`, `user_school`, `user_address`, `user_hobby`, `user_id`) VALUES
(5, 'University of information technology', 'Luxmibazar, dhaka', 'Playing Cricket', 13),
(6, 'Dhaka City college', 'Luxmibazar,Dhaka', 'messenger chat', 14),
(8, 'Dhaka City college', 'Luxmibazar,Dhaka', 'messenger chat', 14),
(9, 'Dhaka City college', 'Luxmibazar,Dhaka', 'messenger chat', 14),
(10, 'Dhaka City college', 'Luxmibazar,Dhaka', 'messenger chat', 14),
(11, 'Dhaka City college', 'Luxmibazar,Dhaka', 'messenger chat', 14),
(12, 'Dhaka City college', 'Luxmibazar,Dhaka', 'messenger chat', 14),
(13, 'Dhaka City college', 'Luxmibazar,Dhaka', 'messenger chat', 14),
(14, 'Dhaka City college', 'Luxmibazar,Dhaka', 'messenger chat', 14),
(15, 'Dhaka City college', 'Luxmibazar,Dhaka', 'messenger chat', 14),
(16, 'Dhaka City college', 'Luxmibazar,Dhaka', 'messenger chat', 14),
(17, 'Dhaka City college', 'Luxmibazar,Dhaka', 'messenger chat', 14),
(18, 'Dhaka City college', 'Luxmibazar,Dhaka', 'messenger chat', 14),
(19, 'Dhaka City college', 'Luxmibazar,Dhaka', 'messenger chat', 14);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_image`
--

CREATE TABLE `user_profile_image` (
  `id` int(200) NOT NULL,
  `user_id` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile_image`
--

INSERT INTO `user_profile_image` (`id`, `user_id`, `image`) VALUES
(16, 13, 'shah-rukh-khan-1579698057.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `like_post`
--
ALTER TABLE `like_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `like_post_count`
--
ALTER TABLE `like_post_count`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sender`
--
ALTER TABLE `sender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_information`
--
ALTER TABLE `user_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile_image`
--
ALTER TABLE `user_profile_image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `like_post`
--
ALTER TABLE `like_post`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `like_post_count`
--
ALTER TABLE `like_post_count`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sender`
--
ALTER TABLE `sender`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_image`
--
ALTER TABLE `user_image`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_information`
--
ALTER TABLE `user_information`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_profile_image`
--
ALTER TABLE `user_profile_image`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
