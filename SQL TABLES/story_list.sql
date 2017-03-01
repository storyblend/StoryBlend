-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2017 at 06:09 PM
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
-- Table structure for table `story_list`
--

CREATE TABLE `story_list` (
  `id` int(50) NOT NULL,
  `created_by_id` int(50) NOT NULL,
  `story_name` varchar(100) NOT NULL,
  `story_description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `story_list`
--

INSERT INTO `story_list` (`id`, `created_by_id`, `story_name`, `story_description`) VALUES
(9, 1, 'fgfdddgd', 'dfsfdsfsdfs'),
(10, 1, 'fdgfrtet3rtrtrert43rt', 't5432ty5434554356545'),
(11, 2, 'look at me', 'A story about corbin'),
(12, 2, 'dsfghj', 'dfghj'),
(13, 2, 'adsfgh', 'asdfhg');

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
-- AUTO_INCREMENT for table `story_list`
--
ALTER TABLE `story_list`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
