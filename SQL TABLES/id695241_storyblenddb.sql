-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2017 at 05:01 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `story_list`
--

CREATE TABLE `story_list` (
  `id` int(50) NOT NULL,
  `created_by_id` varchar(50) NOT NULL,
  `shared_with` varchar(50) NOT NULL,
  `turn` varchar(20) NOT NULL,
  `story_name` varchar(100) NOT NULL,
  `story_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `story_list`
--

INSERT INTO `story_list` (`id`, `created_by_id`, `shared_with`, `turn`, `story_name`, `story_description`) VALUES
(2, 'test', 'memeboy', 'test', 'turns lets go', 'lets do it');

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
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
