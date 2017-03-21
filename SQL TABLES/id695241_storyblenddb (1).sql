-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2017 at 04:48 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id695241_storyblenddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id_post` int(50) NOT NULL,
  `story_list_id` int(11) NOT NULL,
  `owned_by_id` int(50) NOT NULL,
  `post` varchar(5000) NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `story_list_id`, `owned_by_id`, `post`, `timestamp`, `author`) VALUES
(12, 9, 1, 'refresh test', '2017-02-21 16:29:22.633687', ''),
(17, 15, 1, 'A woman was driving back to her home in California from Washington to California. It was late evening and snowhad begun to fall before she finally reached the little Oregon town where she planed tospend the night. Tired and ready for a hot meal and a goodnightâ€™s sleep, she stopped at the first pla', '2017-02-21 16:53:25.146153', ''),
(28, 14, 1, 'THe man on the mooon', '2017-03-07 17:02:34.104169', ''),
(29, 14, 1, 'the cow jumped over the moon', '2017-03-07 17:02:41.742723', ''),
(30, 15, 1, 'A spooky hotel manager came out of the door and said "HARRO MEESTER DINBEY"', '2017-03-07 17:10:33.193570', ''),
(36, 18, 5, 'hi there, my name jeff', '2017-03-14 15:55:09.599858', ''),
(37, 19, 5, 'epic win\r\n', '2017-03-14 16:03:10.417300', ''),
(38, 19, 5, 'test', '2017-03-14 16:10:30.004128', 'testaccount');

-- --------------------------------------------------------

--
-- Table structure for table `story_list`
--

CREATE TABLE `story_list` (
  `id` int(50) NOT NULL,
  `created_by_id` int(50) NOT NULL,
  `shared_with` varchar(50) NOT NULL,
  `story_name` varchar(100) NOT NULL,
  `story_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `story_list`
--

INSERT INTO `story_list` (`id`, `created_by_id`, `shared_with`, `story_name`, `story_description`) VALUES
(14, 1, 'name', 'The man on the moon', 'A story about a man who is stuck on the moon.'),
(15, 1, 'name', 'Welcome to the hotel of deathhhh', 'a spooky hotel is the spookiest spook ever'),
(16, 1, 'collinbonker', 'sharing this', 'testing'),
(17, 1, 'test', 'test sharing', 'yup'),
(18, 5, 'asdf', 'asdf', 'asdf'),
(19, 5, 'testaccount', 'Hi', 'My name is jeff'),
(20, 1, 'test', 'test', 'test'),
(21, 1, 'sql inj', 'sql inj', 'sql inj');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(50) NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP
) ;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `email`, `username`, `password`, `timestamp`) VALUES
(1, 'test1@gmail.com', 'test', 'test', '2017-02-01 16:56:28.119731'),
(2, 'login@login.com', 'ueseresrwe', 'pass', '2017-02-13 16:29:55.293993'),
(3, '17meyercollin@highlandcusd5.org', 'collinbonker', '1111', '2017-02-24 17:09:44.066933'),
(4, 'plzno@gmail.com', 'plzno', 'a', '2017-03-09 16:29:34.074409'),
(5, 'testaccount@test.com', 'testaccount', 'password', '2017-03-09 16:51:35.108702');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `story_list`
--
ALTER TABLE `story_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `story_list`
--
ALTER TABLE `story_list`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
