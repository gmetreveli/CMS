-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2019 at 06:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(4) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(2, 'JavaScript'),
(3, 'PHP'),
(4, 'Java'),
(21, 'Ruby');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(7) NOT NULL,
  `comment_post_id` int(5) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(2, 1, 'Giorgi Metreveli', 'giorgi@giorgi.com', 'testting comment', 'approved', '2019-04-17'),
(3, 1, 'Giorgi', 'giorgi@giorgi.com', 'testing if it works', 'unapproved', '2019-04-29'),
(4, 27, 'Giorgi', 'giorgi@giorgi.com', 'it\'s a test post. jfhirfifhgmh;h[g\'flgkhjyugo,fkg;h\'glffitjgnf', 'unapproved', '2019-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(5) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(1, 1, 'Bootstrap Course', 'Giorgi metreveli', '', '2019-05-26', '1280px-lightning_tiger-jay.jpg', 'It\'s the first post for CMS site', 'Giorgi, bootstrap', 2, 'published', 4),
(2, 2, 'JavaScript', 'Giorgi metreveli', '', '2019-04-29', 'oaoh1e.jpg', 'JavaScript course', 'JavaScript, Givi', 0, 'draft', 1),
(3, 4, 'Java', 'Davit Arevadze', '', '2019-04-24', '32ztnwn.jpg', 'What is Lorem Ipsum', 'Java, Davit', 0, 'published', 0),
(6, 3, 'PHP', 'Givi Menabde', '', '2019-04-29', '1280px-lightning_tiger-jay.jpg', 'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'', 'PHP, Givi', 0, 'draft', 0),
(7, 21, 'Ruby post', 'Merab Esakia', '', '2019-04-29', 'sb37nl.jpg', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'merab, ruby,', 0, 'published', 0),
(8, 3, 'Test post', 'Giorgi metreveli', '', '2019-05-26', 'phoenix_a.jpg', '<p>This is a test Post.</p>', 'Giorgi, php', 0, 'published', 0),
(9, 3, 'PHP', 'Givi Menabde', '', '2019-05-29', '1280px-lightning_tiger-jay.jpg', 'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'', 'PHP, Givi', 0, 'draft', 0),
(10, 1, 'Bootstrap Course', 'Giorgi metreveli', '', '2019-05-29', '1280px-lightning_tiger-jay.jpg', 'It\'s the first post for CMS site', 'Giorgi, bootstrap', 0, 'published', 1),
(11, 1, 'Bootstrap Course', 'Giorgi metreveli', '', '2019-05-29', '1280px-lightning_tiger-jay.jpg', 'It\'s the first post for CMS site', 'Giorgi, bootstrap', 0, 'published', 0),
(12, 3, 'PHP', 'Givi Menabde', '', '2019-05-29', '1280px-lightning_tiger-jay.jpg', 'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'', 'PHP, Givi', 0, 'draft', 0),
(13, 3, 'Test post', 'Giorgi metreveli', '', '2019-05-29', 'phoenix_a.jpg', '<p>This is a test Post.</p>', 'Giorgi, php', 0, 'published', 0),
(14, 21, 'Ruby post', 'Merab Esakia', '', '2019-05-29', 'sb37nl.jpg', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'merab, ruby,', 0, 'published', 0),
(15, 3, 'PHP', 'Givi Menabde', '', '2019-05-29', '1280px-lightning_tiger-jay.jpg', 'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'', 'PHP, Givi', 0, 'draft', 0),
(16, 4, 'Java', 'Davit Arevadze', '', '2019-05-29', '32ztnwn.jpg', 'What is Lorem Ipsum', 'Java, Davit', 0, 'published', 0),
(17, 2, 'JavaScript', 'Giorgi metreveli', '', '2019-05-29', 'oaoh1e.jpg', 'JavaScript course', 'JavaScript, Givi', 0, 'draft', 0),
(18, 1, 'Bootstrap Course', 'Giorgi metreveli', '', '2019-05-29', '1280px-lightning_tiger-jay.jpg', 'It\'s the first post for CMS site', 'Giorgi, bootstrap', 0, 'published', 0),
(19, 1, 'Bootstrap Course', 'Giorgi metreveli', '', '2019-05-29', '1280px-lightning_tiger-jay.jpg', 'It\'s the first post for CMS site', 'Giorgi, bootstrap', 0, 'published', 0),
(20, 3, 'PHP', 'Givi Menabde', '', '2019-05-29', '1280px-lightning_tiger-jay.jpg', 'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'', 'PHP, Givi', 0, 'draft', 0),
(21, 3, 'Test post', 'Giorgi metreveli', '', '2019-05-29', 'phoenix_a.jpg', '<p>This is a test Post.</p>', 'Giorgi, php', 0, 'published', 0),
(22, 21, 'Ruby post', 'Merab Esakia', '', '2019-05-29', 'sb37nl.jpg', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'merab, ruby,', 0, 'published', 0),
(23, 3, 'PHP', 'Givi Menabde', '', '2019-05-29', '1280px-lightning_tiger-jay.jpg', 'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'gioirgi{\']}dmvksmvsvjbnsknh7y98u03f9hnm\'', 'PHP, Givi', 0, 'draft', 0),
(24, 4, 'Java', 'Davit Arevadze', '', '2019-05-29', '32ztnwn.jpg', 'What is Lorem Ipsum', 'Java, Davit', 0, 'published', 0),
(25, 2, 'JavaScript', 'Giorgi metreveli', '', '2019-05-29', 'oaoh1e.jpg', 'JavaScript course', 'JavaScript, Givi', 0, 'draft', 0),
(26, 1, 'Bootstrap Course', 'Giorgi metreveli', '', '2019-05-29', '1280px-lightning_tiger-jay.jpg', 'It\'s the first post for CMS site', 'Giorgi, bootstrap', 0, 'published', 0),
(27, 1, 'Bootstrap Course', 'Giorgi metreveli', '', '2019-06-02', '1280px-lightning_tiger-jay.jpg', 'It\'s the first post for CMS site', 'Giorgi, bootstrap', 0, 'published', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(7) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`) VALUES
(12, 'giorgi', '$2y$07$6zftEaq.kTPYX.3SH26LhO5WmRb0yCLblwtanj/d7T2He24a7M2xm', 'giorgi', 'metreveli', 'giorgi@giorgi.com', '', 'subscriber');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(7) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
