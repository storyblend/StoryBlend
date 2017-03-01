-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2017 at 06:10 PM
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
  `post` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `story_list_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id_post`, `post`, `story_list_id`) VALUES
(1, 'As soon as a new book arrived, I stamped it, always in black ink, on its first page. I gave it its corresponding number, always in blue ink, and wrote its date of acquisition. Then, imitating the old National Library''s catalogue, I entered its details on an index card which I filed in alphabetical order.\n\n     My sources of literary information were the editorial catalogues and the Pequeño Larousse Ilustrado. An example at random: in many collections from the various editors was Atala, René and The Adventures of the Last Abencerage. Motivated by such ubiquity and because the Larousse seemed to give Chateaubriand such great importance, I acquired the book in the Colección Austral edition from Espasa-Calpe. In spite of these precautions, those three stories turned out to be as unreadable as they were unmemorable.', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id_post`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id_post` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
