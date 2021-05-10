-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2021 at 03:35 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `subject` varchar(50) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `subject`, `grade`) VALUES
(1, 'Maths', 12),
(2, 'Physics', 11),
(3, 'Accounting', 10),
(4, 'C.A.T', 9),
(5, 'Life Sciences', 8);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `comment` varchar(500) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `posted_at` datetime NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `likes` int(11) UNSIGNED NOT NULL,
  `commentimg` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `posted_at`, `post_id`, `likes`, `commentimg`) VALUES
(1, 'My very first comment woohooo', 4, '2017-08-07 10:45:20', 11, 1, NULL),
(2, 'My very first comment woohooo', 4, '2017-08-07 11:00:23', 11, 0, NULL),
(3, 'My very first comment woohooo', 4, '2017-08-07 11:01:13', 11, 0, NULL),
(6, 'please let me comment', 3, '2018-01-20 14:19:05', 11, 0, NULL),
(7, 'what the heck', 3, '2018-01-20 14:20:34', 11, 1, NULL),
(8, 'let me comment', 3, '2018-01-20 14:21:09', 16, 2, NULL),
(9, 'let me comment', 3, '2018-01-20 15:11:36', 25, 1, NULL),
(10, 'let me try hopefully this one will work', 3, '2018-01-26 21:59:53', 12, 0, ''),
(11, 'trying to comment again lets see if this works', 3, '2018-01-26 22:07:26', 12, 0, ''),
(12, 'trying to comment is such a mission though', 3, '2018-01-26 22:08:13', 12, 0, ''),
(13, 'shall i  try again', 3, '2018-01-26 22:10:11', 12, 0, ''),
(14, 'lets go again fam', 3, '2018-01-26 22:21:10', 12, 0, ''),
(15, 'why', 3, '2018-01-26 22:25:52', 12, 0, ''),
(16, 'trying again with picture', 3, '2018-01-26 22:41:54', 12, 0, ''),
(17, 'what the heck', 3, '2018-01-26 22:44:13', 12, 14, ''),
(18, 'trying', 3, '2018-01-26 22:49:05', 12, 0, ''),
(19, 'come on work', 3, '2018-01-26 22:49:28', 5, 13, ''),
(20, 'what is this', 3, '2018-01-26 22:52:16', 5, 0, ''),
(21, 'trying again for the millionth time', 3, '2018-01-26 23:06:32', 5, 0, ''),
(22, 'lets see what we have here', 3, '2018-01-26 23:09:00', 16, 1, ''),
(23, 'lets give this a go', 3, '2018-01-26 23:15:19', 16, 0, ''),
(24, '', 3, '2018-01-27 00:00:18', 16, 0, ''),
(25, 'Stucha', 3, '2018-01-27 00:06:46', 16, 0, ''),
(26, 'trying to add a comment', 3, '2018-01-27 10:53:55', 16, 0, ''),
(27, 'trying again', 3, '2018-01-27 10:55:40', 16, 0, ''),
(28, 'trying a comment', 3, '2018-01-27 10:57:00', 5, 0, ''),
(29, 'Trying newest comment', 3, '2018-01-27 12:12:49', 22, 0, ''),
(30, 'trying out comments ', 3, '2018-01-27 12:22:30', 6, 0, ''),
(31, 'Stucha again', 3, '2018-01-27 19:55:59', 16, 0, ''),
(32, 'Stucha again', 3, '2018-01-27 23:57:14', 6, 1, ''),
(33, 'Hey Stucha', 3, '2018-01-28 00:03:09', 6, 1, ''),
(34, 'Stucha again again', 3, '2018-01-28 01:11:38', 16, 0, ''),
(35, 'yet again Stucha', 3, '2018-01-28 01:24:50', 16, 0, ''),
(36, 'Srucha girl', 3, '2018-01-28 01:26:17', 5, 0, ''),
(38, 'Hey Tumi', 3, '2018-01-28 01:56:21', 6, 1, 'profile_img/50397-tumi.png'),
(39, 'Adding something new', 3, '2018-02-10 20:31:48', 5, 0, ''),
(40, 'New decade new comment', 3, '2020-02-01 20:03:51', 16, 0, ''),
(41, '2020 we doing it now', 3, '2020-02-01 20:10:25', 16, 0, ''),
(42, 'Lets go 2020', 3, '2020-02-01 20:29:26', 16, 0, ''),
(43, 'Another new comment', 3, '2020-02-04 15:14:22', 16, 0, ''),
(44, 'Another new comment', 3, '2020-02-04 15:15:42', 16, 0, ''),
(45, 'A whole new world', 3, '2020-02-04 15:22:14', 16, 0, ''),
(46, 'A whole new world', 3, '2020-02-04 15:22:40', 16, 0, ''),
(47, 'lets do this', 3, '2020-02-04 15:25:52', 16, 0, ''),
(48, 'ey', 3, '2020-02-04 15:30:11', 16, 0, ''),
(49, 'reloading', 3, '2020-02-04 15:31:34', 16, 0, ''),
(50, 'reloading', 3, '2020-02-04 15:35:40', 16, 0, ''),
(51, 'New reply 2020 Venus', 3, '2020-06-28 00:50:43', 80, 0, ''),
(52, 'Venus vs Mars', 3, '2020-06-28 00:54:17', 80, 0, ''),
(53, 'Venus', 3, '2020-06-28 01:34:48', 80, 0, ''),
(54, 'Were back', 3, '2020-06-28 02:26:50', 80, 0, ''),
(55, 'One more time for Venus', 3, '2020-06-28 02:30:34', 80, 0, ''),
(56, 'Another one for Venus', 3, '2020-06-28 02:36:10', 71, 0, ''),
(57, 'A Quarantine Comment', 3, '2020-06-29 12:14:19', 66, 0, ''),
(58, 'Hey this is me commenting in 2020 with the new comment box', 3, '2020-09-12 22:24:16', 107, 1, ''),
(67, 'trying this commenting again', 3, '2020-09-12 22:37:53', 107, 1, ''),
(68, 'testing', 3, '2020-09-12 22:55:08', 107, 0, ''),
(69, 'Hey there', 3, '2020-09-21 22:12:18', 48, 1, ''),
(70, 'Hello there', 3, '2020-11-25 00:03:35', 6, 0, ''),
(71, 'Lets do this thing', 3, '2020-11-28 23:38:45', 122, 0, ''),
(72, 'How are you', 3, '2020-11-28 23:40:36', 121, 0, ''),
(73, 'How are you', 3, '2020-11-28 23:41:53', 120, 0, ''),
(74, 'How are you', 3, '2020-11-28 23:43:48', 119, 0, ''),
(75, '@Kamo2 are you well bro', 3, '2020-12-11 12:02:40', 116, 0, ''),
(76, '@Kamo2 hey mate', 3, '2020-12-11 12:07:20', 116, 0, ''),
(77, 'Commenting', 3, '2020-12-11 12:24:50', 116, 0, ''),
(78, '@Kamo2 mentions', 3, '2020-12-11 20:19:05', 116, 0, ''),
(79, '@Kamo2 comment mention', 3, '2020-12-12 07:44:22', 114, 0, ''),
(80, '@Kamo2 Im mentioning you', 3, '2020-12-12 07:47:00', 114, 0, ''),
(81, '@Kamo2 here is another mention', 3, '2020-12-12 08:20:45', 115, 0, ''),
(82, '@Kamo2 here is a mention', 3, '2020-12-12 08:22:46', 116, 0, ''),
(83, '@Karma heres a mention for you', 3, '2020-12-12 08:23:19', 116, 0, ''),
(84, '@Karma im mentioning you', 3, '2020-12-12 08:25:25', 114, 0, ''),
(85, '@Karma here you go', 3, '2020-12-12 08:26:46', 114, 0, ''),
(86, '@Karma mention 3', 3, '2020-12-12 08:27:53', 114, 0, ''),
(87, '@Karma mention 4', 3, '2020-12-12 08:29:08', 114, 0, ''),
(88, '@Kamo2 mention 5', 3, '2020-12-12 08:31:03', 113, 0, ''),
(89, '@Karma mention 5', 3, '2020-12-12 08:31:42', 114, 0, ''),
(90, 'hey man wassup', 3, '2020-12-12 09:49:49', 119, 0, ''),
(91, 'Hey man im commenting', 3, '2020-12-12 09:55:54', 119, 0, ''),
(92, 'Im commenting', 3, '2020-12-12 09:58:11', 119, 0, ''),
(93, 'Im commenting again', 3, '2020-12-12 10:07:37', 118, 0, ''),
(94, 'Im commenting again 2', 3, '2020-12-12 10:09:12', 118, 0, ''),
(95, 'Im commenting v3', 3, '2020-12-12 10:11:41', 119, 0, ''),
(96, 'Commenting again', 3, '2020-12-12 10:35:04', 119, 0, ''),
(97, 'Comment v3', 3, '2020-12-12 10:36:18', 118, 0, ''),
(98, 'Comment v4', 3, '2020-12-12 10:44:16', 118, 0, ''),
(99, 'Comment v5', 3, '2020-12-12 10:47:24', 118, 0, ''),
(100, 'Comment v6', 3, '2020-12-12 10:50:11', 118, 0, ''),
(101, 'Comment v7', 3, '2020-12-12 10:51:15', 118, 0, ''),
(102, '@Kamo2 comment v8 with mention', 3, '2020-12-12 10:51:52', 118, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `comment_likes`
--

CREATE TABLE `comment_likes` (
  `id` int(11) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_likes`
--

INSERT INTO `comment_likes` (`id`, `comment_id`, `user_id`) VALUES
(3, 1, 3),
(4, 7, 3),
(9, 9, 3),
(124, 19, 3),
(125, 19, 3),
(126, 19, 3),
(127, 19, 3),
(128, 19, 3),
(129, 22, 3),
(130, 32, 3),
(131, 33, 3),
(134, 58, 3),
(139, 67, 3),
(140, 69, 3),
(141, 38, 3);

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `cell_number` int(20) DEFAULT NULL,
  `tel_number` int(20) DEFAULT NULL,
  `social_facebook` varchar(64) DEFAULT NULL,
  `social_whatsapp` varchar(64) DEFAULT NULL,
  `social_linkedin` varchar(64) DEFAULT NULL,
  `website_url` varchar(150) DEFAULT NULL,
  `social_other_1` varchar(150) DEFAULT NULL,
  `social_other_2` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `education_type` varchar(11) NOT NULL,
  `institution_name` varchar(64) NOT NULL,
  `education_year_from` year(4) NOT NULL,
  `education_year_to` year(4) NOT NULL,
  `course_name` varchar(64) DEFAULT NULL,
  `achievements` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `follower_id` int(10) UNSIGNED NOT NULL,
  `follow_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `follower_id`, `follow_date`) VALUES
(1, 3, 4, '2020-12-09 14:25:51'),
(27, 4, 3, '2020-12-12 12:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `login_token`
--

CREATE TABLE `login_token` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` char(64) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_token`
--

INSERT INTO `login_token` (`id`, `token`, `user_id`) VALUES
(10, 'dcc3fd838ac62d33f5ee5203c29735916259e2ae', 2),
(13, 'dd714b8630bdbc396547259bd2eb837bafbcd8f2', 4),
(14, '02bcbc29008b589754ec697de7ec6ce5b483a4cc', 4),
(15, '8cbee59cd6d6c0d8d39b13a1f625c9c27e4d4495', 4),
(17, 'ad9ae85792f0f2c2bab78ece7d6cd0ba8ed6367f', 4),
(19, 'b731a4bf1e407f6f648cd52da1b703468f72900a', 4),
(21, '55d00817d6a441343d2bb3df61a5037cfa4c37ea', 4),
(23, '79d4e78a69f24c2f949349120623ff7106f5a4ef', 4),
(25, '5a9ef35463b35778fb428866c7818c633cab7aa6', 4),
(26, '1b65bfb0edbda51c84918e3f878756860ef96f7f', 4),
(29, 'ae0f112edbdde65611c47a9988c6e94ba65e3601', 4),
(30, '48c59968cf0d3b1e84b3b31f915632f50bd36907', 4),
(31, 'ecb049d44501b3bf1035e46cebbd485b72417d57', 4),
(44, '857ca04ba29d97a21ba3df764ddbfc139af94a3b', 4),
(48, '2f66cf34226dd3ae1432bf5634fcd40fa2315d2f', 4),
(63, 'ed178d7fa1dda62f8514b3e4ec5700168cc74d80', 7),
(64, '0020d30ede5cca868778e5fa353071eabc5380ac', 7),
(78, 'be3948e5a3784b07d393820973a49410fd098819', 2),
(81, '755a42a1c2d708857357311779bb0f5c7e715cd0', 2),
(84, '673f54b52a7612714fb07ef2a3d0d6ec4d2fd3a8', 4),
(85, 'b08057765a43537e34c0fa570c3d14828705308d', 4),
(178, '7a0edec452a244365f6825f3287ac2690700a49a', 4),
(179, '9e818388e1afdaff267aa7d99be9ecebf1177293', 4),
(188, '7c5cc3414b68622ae117f1650e01af51b40a7bcc', 3),
(193, '6cd62a2d514af2c8ca6ee4ba60a8760920a67e03', 3),
(194, 'f2129aa9bbb2693b2952f8c494c47f5ec80383de', 3),
(195, '1b13e507ca1617c7fce32dfdd5481be8b1a40eb8', 3),
(196, '45c96c8cbddf2e841c14ea9020230424a6e5aac6', 3),
(197, '3b57f53f3630069f18925b1b4fd6df8344e01175', 3),
(198, '35970bee51d0e928d680fe06688f3c94b4a64295', 19),
(203, '7727ba2ae1ccdc7a8791a5a5ac7d262b5975dbd0', 3),
(204, 'd1df8c5debe26c44863bfe6598332453ec33d088', 3);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) UNSIGNED NOT NULL,
  `body` text NOT NULL,
  `sender` int(11) UNSIGNED NOT NULL,
  `receiver` int(11) UNSIGNED NOT NULL,
  `read` tinyint(1) UNSIGNED NOT NULL,
  `msg_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `read_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `body`, `sender`, `receiver`, `read`, `msg_date`, `read_date`) VALUES
(1, 'hey from Karma to Kamo2', 4, 3, 1, '2020-11-01 03:18:31', '2020-11-01 04:28:19'),
(2, 'hello', 3, 2, 1, '2020-11-01 05:21:34', '2020-11-01 09:15:23'),
(3, 'Hey man how are you', 3, 4, 0, '2020-11-01 09:31:42', NULL),
(4, 'been a long time', 3, 4, 0, '2020-11-01 10:32:45', NULL),
(5, 'how you doing bro bro', 3, 4, 0, '2020-11-01 13:45:53', NULL),
(6, 'hi', 3, 1, 0, '2020-11-01 16:32:15', NULL),
(7, 'hello???', 3, 1, 0, '2020-11-02 02:21:44', NULL),
(8, 'trying again to send a message', 3, 1, 0, '2020-11-02 11:44:14', NULL),
(9, 'this is me trying again', 3, 1, 0, '2020-11-02 14:44:51', NULL),
(10, 'hey to same user', 4, 2, 1, '2020-11-02 19:34:15', '2020-11-02 19:55:53'),
(12, 'Hey man look Im trying new things here, help me out okay?', 3, 1, 0, '2020-11-03 08:47:37', NULL),
(13, 'Hey back stranger', 2, 3, 1, '2020-11-03 09:21:44', '2020-11-03 09:45:51'),
(14, 'Making sure we got this in the bag yo', 2, 4, 1, '2020-11-03 12:24:14', '2020-11-03 12:25:33'),
(19, 'lets make this happen', 2, 3, 1, '2020-11-03 15:27:10', '2020-11-03 16:27:29'),
(20, 'Hey Kamo Whats up dude', 2, 4, 1, '2020-11-03 17:32:08', '2020-11-03 18:28:28'),
(21, 'Sending a message to Kamo', 2, 1, 0, '2020-11-03 17:23:34', NULL),
(22, 'Hello, Its me', 2, 1, 0, '2020-11-03 19:48:48', NULL),
(23, 'whats up Pearl', 2, 1, 0, '2020-11-04 03:07:07', NULL),
(24, 'Hey Bubu', 3, 4, 0, '2020-11-04 07:13:48', NULL),
(25, 'Hey Big nose how are you', 3, 4, 0, '2020-11-04 13:26:10', NULL),
(26, 'hello ', 3, 4, 0, '2020-11-04 15:24:43', NULL),
(27, 'hi there', 3, 4, 0, '2020-11-04 18:33:31', NULL),
(28, 'hi there', 3, 4, 0, '2020-11-04 19:27:30', NULL),
(57, 'Hello there', 3, 4, 0, '2020-11-30 00:22:28', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) UNSIGNED NOT NULL,
  `type` int(11) UNSIGNED NOT NULL,
  `receiver` int(10) UNSIGNED NOT NULL,
  `sender` int(11) UNSIGNED NOT NULL,
  `extra` text,
  `notification_seen` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `notification_read` int(11) NOT NULL DEFAULT '0',
  `notification_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `receiver`, `sender`, `extra`, `notification_seen`, `notification_read`, `notification_date`, `post_id`) VALUES
(1, 1, 1, 4, NULL, 0, 0, '2020-12-11 09:53:12', NULL),
(2, 1, 3, 4, NULL, 1, 0, '2020-12-11 09:53:12', NULL),
(3, 1, 3, 4, NULL, 1, 0, '2020-12-11 09:53:12', NULL),
(4, 1, 3, 4, ' {"postbody": "@kamo2 yo mate"}', 1, 0, '2020-12-11 09:53:12', NULL),
(5, 1, 3, 4, ' {"postbody": "@kamo2   you mate how you holding up"}', 1, 0, '2020-12-11 09:53:12', NULL),
(6, 1, 3, 4, ' {"postbody": "@kamo2 this is the new notify class"}', 1, 0, '2020-12-11 09:53:12', NULL),
(12, 2, 3, 3, '{"postbody": "eish"}', 1, 0, '2020-12-11 09:53:12', NULL),
(13, 2, 3, 3, '{"postbody": "hey work"}', 1, 0, '2020-12-11 09:53:12', NULL),
(14, 4, 3, 3, '{"commentbody": "trying out comments "}', 1, 0, '2020-12-11 09:53:12', NULL),
(15, 4, 3, 3, '{"commentbody": "Hey Tumi"}', 1, 0, '2020-12-11 09:53:12', NULL),
(16, 2, 3, 3, '{"postbody": "eish"}', 1, 0, '2020-12-11 09:53:12', NULL),
(17, 2, 3, 3, '{"postbody": "eish"}', 1, 0, '2020-12-11 09:53:12', NULL),
(18, 2, 3, 3, '{"postbody": "hey work"}', 1, 0, '2020-12-11 09:53:12', NULL),
(19, 2, 3, 3, '{"postbody": "Hello there"}', 1, 0, '2020-12-11 09:53:12', NULL),
(20, 2, 3, 3, '{"postbody": "grad image"}', 1, 0, '2020-12-11 09:53:12', NULL),
(21, 2, 3, 3, '{"postbody": "eish"}', 1, 0, '2020-12-11 09:53:12', NULL),
(22, 2, 3, 3, '{"postbody": "hey work"}', 1, 0, '2020-12-11 09:53:12', NULL),
(23, 2, 3, 3, '{"postbody": "Hello there"}', 1, 0, '2020-12-11 09:53:12', NULL),
(24, 2, 3, 3, '{"postbody": "eish"}', 1, 0, '2020-12-11 09:53:12', NULL),
(25, 2, 3, 3, '{"postbody": "fh"}', 1, 0, '2020-12-11 09:53:12', NULL),
(26, 2, 3, 3, '{"postbody": "eish"}', 1, 0, '2020-12-11 09:53:12', NULL),
(27, 2, 3, 3, '{"postbody": "eish"}', 1, 0, '2020-12-11 09:53:12', NULL),
(28, 2, 3, 3, '{"postbody": "grad image"}', 1, 0, '2020-12-11 09:53:12', NULL),
(29, 2, 3, 3, '{"postbody": "Second test for this"}', 1, 0, '2020-12-11 09:53:12', NULL),
(30, 2, 3, 3, '{"postbody": "fh"}', 1, 0, '2020-12-11 09:53:12', NULL),
(31, 2, 3, 3, '{"postbody": "fh"}', 1, 0, '2020-12-11 09:53:12', NULL),
(32, 2, 3, 3, '{"postbody": "It finally worked"}', 1, 0, '2020-12-11 09:53:12', NULL),
(33, 2, 3, 3, '{"postbody": "It finally worked"}', 1, 0, '2020-12-11 09:53:12', NULL),
(34, 2, 3, 3, '{"postbody": "fh"}', 1, 0, '2020-12-11 09:53:12', NULL),
(35, 4, 3, 3, '{"commentbody": "Hey this is me commenting in 2020 with the new comment box"}', 1, 0, '2020-12-11 09:53:12', NULL),
(36, 2, 3, 3, '{"postbody": "It finally worked"}', 1, 0, '2020-12-11 09:53:12', NULL),
(37, 2, 3, 3, '{"postbody": "upload test"}', 1, 0, '2020-12-11 09:53:12', NULL),
(38, 2, 3, 3, '{"postbody": "It finally worked"}', 1, 0, '2020-12-11 09:53:12', NULL),
(39, 4, 3, 3, '{"commentbody": "trying this commenting again"}', 1, 0, '2020-12-11 09:53:12', NULL),
(40, 4, 3, 3, '{"commentbody": "trying this commenting again"}', 1, 0, '2020-12-11 09:53:12', NULL),
(41, 4, 3, 3, '{"commentbody": "trying this commenting again"}', 1, 0, '2020-12-11 09:53:12', NULL),
(42, 4, 3, 3, '{"commentbody": "trying this commenting again"}', 1, 0, '2020-12-11 09:53:12', NULL),
(43, 4, 3, 3, '{"commentbody": "trying this commenting again"}', 1, 0, '2020-12-11 09:53:12', NULL),
(44, 4, 3, 3, '{"commentbody": "trying out comments "}', 1, 0, '2020-12-11 09:53:12', NULL),
(45, 4, 3, 3, '{"commentbody": "testing"}', 1, 0, '2020-12-11 09:53:12', NULL),
(46, 4, 3, 3, '{"commentbody": "testing"}', 1, 0, '2020-12-11 09:53:12', NULL),
(47, 2, 3, 3, '{"postbody": "It finally worked"}', 1, 0, '2020-12-11 09:53:12', NULL),
(48, 2, 3, 4, '{"postbody": "What is one plus one?"}', 1, 0, '2020-12-11 09:53:12', NULL),
(49, 2, 3, 3, '{"postbody": "hey work"}', 1, 0, '2020-12-11 09:53:12', NULL),
(50, 2, 3, 3, '{"postbody": "Hello there Red Swan"}', 1, 0, '2020-12-11 09:53:12', NULL),
(51, 2, 3, 3, '{"postbody": "It finally worked"}', 1, 0, '2020-12-11 09:53:12', NULL),
(52, 4, 3, 3, '{"commentbody": "Hey there"}', 1, 0, '2020-12-11 09:53:12', NULL),
(53, 2, 3, 3, '{"postbody": "It finally worked"}', 1, 0, '2020-12-11 09:53:12', NULL),
(54, 2, 3, 3, '{"postbody": "I love pizza"}', 1, 0, '2020-12-11 09:53:12', NULL),
(55, 2, 3, 3, '{"postbody": "My 2020 post"}', 1, 0, '2020-12-11 09:53:12', NULL),
(56, 2, 3, 3, '{"postbody": "Hello there Red Swan"}', 1, 0, '2020-12-11 09:53:12', NULL),
(57, 2, 3, 3, '{"postbody": "hey work"}', 1, 0, '2020-12-11 09:53:12', NULL),
(58, 2, 3, 3, '{"postbody": "My 2020 post yo"}', 1, 0, '2020-12-11 09:53:12', NULL),
(59, 4, 3, 3, '{"commentbody": "Hey Tumi"}', 1, 0, '2020-12-11 09:53:12', NULL),
(60, 2, 3, 3, '{"postbody": "Posting at 11:28 on November 28"}', 1, 0, '2020-12-11 09:53:12', NULL),
(61, 2, 3, 3, '{"postbody": "My newest post to date"}', 1, 0, '2020-12-11 09:53:12', NULL),
(62, 2, 3, 3, '{"postbody": "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet volutpat mauris. In id elit et est molestie convallis. Sed et enim eget ligula mollis faucibus. Nullam nec elit risus. Etiam venenatis lobortis tristique. Vivamus iaculis malesuada tortor, vitae viverra lorem iaculis vel. Ut fringilla ante leo, sit amet commodo mauris pretium vitae. Etiam vel justo lectus. Quisque ornare erat metus, faucibus blandit erat pretium ac. Pellentesque est diam, porttitor sit amet urna non, rutrum vi"}', 1, 0, '2020-12-11 09:53:12', NULL),
(63, 5, 3, 4, '', 1, 0, '2020-12-11 10:46:10', NULL),
(64, 3, 3, 3, '{"commentbody": "@Kamo2 Im mentioning you"}', 1, 0, '2020-12-12 07:47:00', NULL),
(65, 3, 3, 3, '{"commentbody": "@Kamo2 mention 5"}', 1, 0, '2020-12-12 08:31:03', NULL),
(66, 3, 4, 3, '{"commentbody": "@Karma mention 5"}', 0, 0, '2020-12-12 08:31:43', NULL),
(67, 1, 3, 3, '{"postbody": "@Kamo2 here is another mention"}', 1, 0, '2020-12-12 08:47:05', NULL),
(68, 6, 3, 3, '{"commentbody": "Hey man im commenting"}', 1, 0, '2020-12-12 09:55:55', 0),
(69, 6, 3, 3, '{"commentbody": "Hey man im commenting"}', 1, 0, '2020-12-12 09:55:55', 0),
(70, 6, 3, 3, '{"commentbody": "Hey man im commenting"}', 1, 0, '2020-12-12 09:55:55', 0),
(71, 6, 3, 3, '{"commentbody": "Hey man im commenting"}', 1, 0, '2020-12-12 09:55:55', 0),
(72, 6, 3, 3, '{"commentbody": "Im commenting"}', 1, 0, '2020-12-12 09:58:12', 0),
(73, 6, 3, 3, '{"commentbody": "Im commenting"}', 1, 0, '2020-12-12 09:58:12', 0),
(74, 6, 3, 3, '{"commentbody": "Im commenting again"}', 1, 0, '2020-12-12 10:07:37', 0),
(75, 6, 3, 3, '{"commentbody": "Im commenting again"}', 1, 0, '2020-12-12 10:07:37', 0),
(76, 6, 3, 3, '{"commentbody": "Im commenting again"}', 1, 0, '2020-12-12 10:07:38', 0),
(77, 6, 3, 3, '{"commentbody": "Im commenting again 2"}', 1, 0, '2020-12-12 10:09:13', 0),
(78, 6, 3, 3, '{"commentbody": "Im commenting again 2"}', 1, 0, '2020-12-12 10:09:13', 0),
(79, 6, 3, 3, '{"commentbody": "Im commenting again 2"}', 1, 0, '2020-12-12 10:09:13', 0),
(80, 6, 3, 3, '{"commentbody": "Im commenting again 2"}', 1, 0, '2020-12-12 10:09:13', 0),
(81, 6, 3, 3, '{"commentbody": "Im commenting v3"}', 1, 0, '2020-12-12 10:11:41', 119),
(82, 6, 3, 3, '{"commentbody": "Im commenting v3"}', 1, 0, '2020-12-12 10:11:41', 119),
(83, 6, 3, 3, '{"commentbody": "Im commenting v3"}', 1, 0, '2020-12-12 10:11:41', 119),
(84, 6, 3, 3, '{"commentbody": "Commenting again"}', 1, 0, '2020-12-12 09:35:04', 119),
(85, 6, 3, 3, '{"commentbody": "Commenting again"}', 1, 0, '2020-12-12 09:35:04', 119),
(86, 6, 3, 3, '{"commentbody": "Comment v3"}', 1, 0, '2020-12-12 09:36:18', 118),
(87, 6, 3, 3, '{"commentbody": "Comment v4"}', 1, 0, '2020-12-12 10:44:16', 118),
(89, 6, 3, 3, '{"commentbody": "Comment v6"}', 1, 0, '0000-00-00 00:00:00', 118),
(90, 6, 3, 3, '{"commentbody": "Comment v7"}', 1, 0, '2020-12-12 10:51:15', 118),
(91, 3, 3, 3, '{"commentbody": "@Kamo2 comment v8 with mention"}', 1, 0, '2020-12-12 10:51:52', 118),
(92, 6, 3, 3, '{"commentbody": "@Kamo2 comment v8 with mention"}', 1, 0, '2020-12-12 10:51:52', 118),
(93, 5, 4, 3, '', 0, 0, '0000-00-00 00:00:00', 0),
(94, 2, 3, 3, '{"postbody": "Brand new post"}', 1, 0, '2020-12-20 00:32:16', 127),
(95, 2, 3, 3, '{"postbody": "@Kamo2 here is another mention"}', 1, 0, '2020-12-25 19:27:44', 125),
(96, 2, 3, 3, '{"postbody": "What is the law of energy?"}', 1, 0, '2021-01-01 11:28:33', 7),
(97, 2, 3, 3, '{"postbody": "What is the law of energy?"}', 1, 0, '2021-01-01 11:28:33', 7),
(98, 2, 3, 3, '{"postbody": "What is the law of energy?"}', 1, 0, '2021-01-01 11:28:33', 7),
(99, 2, 3, 3, '{"postbody": "What is the law of energy?"}', 1, 0, '2021-01-01 11:28:33', 7),
(100, 2, 3, 3, '{"postbody": "What is the law of energy?"}', 1, 0, '2021-01-01 11:28:34', 7),
(101, 2, 3, 3, '{"postbody": "@Kamo2 hey heres a mention for you"}', 1, 0, '2021-01-01 11:29:19', 124);

-- --------------------------------------------------------

--
-- Table structure for table `password_tokens`
--

CREATE TABLE `password_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` char(64) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `email` varchar(20) NOT NULL,
  `date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_tokens`
--

INSERT INTO `password_tokens` (`id`, `token`, `user_id`, `email`, `date`) VALUES
(27, 'abb0c056a8ea32459d0b3f841bb1ef1cbe891afb', 19, 'newtest@test.com', '2021-05-03 15:52:30.000000'),
(28, '5ebb55997e453d3dd8ba2e0ed03dec0668137c16', 3, 'testmail@test.com', '2021-05-04 11:51:18.000000');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `body` varchar(500) NOT NULL,
  `posted_at` datetime NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `likes` int(11) UNSIGNED NOT NULL,
  `subject` varchar(50) NOT NULL,
  `grade` int(11) NOT NULL,
  `postimg` varchar(255) DEFAULT NULL,
  `commented` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `body`, `posted_at`, `user_id`, `likes`, `subject`, `grade`, `postimg`, `commented`) VALUES
(132, 'Reaching for the future', '2021-05-04 12:17:09', 3, 0, 'Maths', 12, './img_posts/1620123426.png', 0),
(134, 'Refresh the page easily by dragging the page from top to bottom', '2021-05-04 12:57:33', 3, 0, 'Maths', 12, './img_posts/1620125845.png', 0),
(135, 'Posts are ordered according to latest and highest rated', '2021-05-04 12:58:56', 3, 0, 'Maths', 12, './img_posts/1620125931.png', 0),
(137, 'If you created the post additional options such as editing and deleting will appear as well', '2021-05-04 13:02:00', 3, 0, 'Maths', 12, './img_posts/1620126110.png', 0),
(138, 'You can also add and like comments', '2021-05-04 13:03:33', 3, 0, 'Maths', 12, './img_posts/1620126210.png', 0),
(140, 'You can add image posts and text posts by clicking the floating button at the bottom-right of the screen', '2021-05-04 13:35:52', 3, 0, 'Maths', 12, './img_posts/1620128138.png', 0),
(141, 'Instead of using Laravel this was built using basic MVC and RestAPI architecture to demonstrate in depth understanding as opposed to using a backend framework', '2021-05-04 13:42:53', 3, 0, 'Maths', 12, './img_posts/1620128567.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`id`, `post_id`, `user_id`) VALUES
(2, 6, 4),
(3, 5, 4),
(5, 16, 4),
(9, 22, 4),
(12, 25, 4),
(74, 37, 3),
(85, 0, 3),
(93, 79, 2),
(102, 79, 3),
(107, 16, 3),
(110, 22, 3),
(111, 22, 3),
(112, 22, 3),
(126, 5, 3),
(169, 25, 3),
(219, 35, 3),
(228, 110, 3),
(229, 6, 3),
(233, 111, 3),
(235, 107, 3),
(236, 48, 3),
(237, 115, 3),
(238, 127, 3),
(239, 125, 3),
(240, 7, 3),
(241, 7, 3),
(242, 7, 3),
(243, 7, 3),
(244, 7, 3),
(245, 1, 3),
(246, 1, 3),
(247, 1, 3),
(248, 1, 3),
(249, 1, 3),
(255, 4, 3),
(256, 4, 3),
(257, 4, 3),
(258, 4, 3),
(259, 4, 3),
(260, 124, 3),
(261, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `product_title` varchar(20) NOT NULL,
  `oldprice` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `product_image` varchar(20) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `product_description` varchar(150) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `store_id`, `product_title`, `oldprice`, `price`, `product_image`, `product_type`, `product_description`, `creation_date`) VALUES
(1, 1, 'MK Mercer Bag', NULL, 12000, './img_shop/shop1.jpg', 'Accessories', 'Beautiful leather strap handbag from MK Mercer', '2020-12-29 13:54:05'),
(2, 1, 'The Wisdom of Life', 2500, 2000, './img_shop/shop2.jpg', 'Book', 'Book filled with wisdom', '2020-12-29 13:54:05'),
(3, 1, 'Woolies Dairy', NULL, 1500, './img_shop/shop3.jpg', 'Groceries', 'High grade dairy products', '2020-12-29 13:54:05'),
(4, 1, 'MOW Textbook', 1500, 700, './img_shop/shop4.jpg', 'Textbook', 'Mechanical Engineering textbook', '2020-12-29 13:54:05'),
(5, 1, 'Sneakers', NULL, 500, './img_shop/shop5.jpg', 'Shoes', 'Quality trainers for sports and fashion wear', '2020-12-29 13:54:05'),
(6, 1, 'Fitness Gear', 1500, 1000, './img_shop/shop6.jpg', 'Fitness', 'Sports wear and gear', '2020-12-29 13:54:05'),
(7, 2, 'Dark Saber', 20000, 15000, 'img_shop/shop7.jpg', 'Antique', 'Whoever wields the saber, rules Mandalor', '2020-12-31 15:11:39'),
(8, 3, 'Frog Eggs', NULL, 500, 'img_shop/shop9.jpg', 'Food', 'Weird thing to eat but Grogu loves it', '2020-12-31 15:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `user_location` varchar(150) DEFAULT NULL,
  `works_at` varchar(150) DEFAULT NULL,
  `acc_type` varchar(20) DEFAULT NULL,
  `acc_mode` varchar(20) DEFAULT NULL,
  `creation_date` datetime(6) DEFAULT CURRENT_TIMESTAMP, `dateofbirth`
 datetime(6) DEFAULT CURRENT_TIMESTAMP, `gender` varchar(20) DEFAULT NULL
) ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `first_name`, `last_name`, `user_location`, `works_at`, `acc_type`, `acc_mode`, `creation_date`, `dateofbirth`, `gender`) VALUES
(1, 3, 'Kamo', 'Molefe', 'Pretoria Gauteng', 'Malamute Designs', 'Individual', 'All', '2017-09-01 03:28:34.405491', '1992-12-28 00:00:00.000000', 'Male'),
(6, 15, 'Byakuya', 'Kuchiki', 'Soul Society', 'Employed Full-time', 'Individual', 'Buyer', '2020-12-09 06:43:14.000000', '1992-06-06 00:00:00.000000', 'Male'),
(7, 16, 'Itachi', 'Uchiha', 'Akatsuki', 'Employed Part-time', 'Individual', 'Provide Services', '2020-12-09 07:14:11.000000', '1993-02-11 00:00:00.000000', 'Male'),
(8, 17, 'Ichigo', 'Kurosaki', 'Karakuro', 'Employed Full-time', 'Individual', 'Buyer', '2020-12-09 07:21:40.000000', '1997-08-06 00:00:00.000000', 'Male'),
(9, 18, 'Naruto', 'Uzumaki', 'Konoha', 'Employed Full-time', 'Individual', 'Buyer', '2020-12-09 07:27:12.000000', '1997-10-07 00:00:00.000000', 'Male'),
(10, 19, 'Kamo', 'Molefe', 'PTA', 'Employed Part-time', 'Enterprise', 'Seller', '2021-05-03 11:58:28.000000', '2021-04-26 00:00:00.000000', 'Female'),
(11, 20, 'Vetro', 'Media', 'JHB', 'Employed Part-time', 'Enterprise', 'Seller', '2021-05-03 12:04:07.000000', '2021-04-26 00:00:00.000000', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `report_type` varchar(150) NOT NULL,
  `post_id` int(11) NOT NULL,
  `poster_id` int(11) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `report_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `report_type`, `post_id`, `poster_id`, `reporter_id`, `report_date`) VALUES
(1, 'Hate Speech', 110, 3, 3, '2020-09-26 10:48:42'),
(2, 'Hate Speech,Spam,Broken Link', 110, 3, 3, '2020-09-26 10:51:00'),
(6, 'It just looks weird', 110, 3, 3, '2020-09-26 11:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(150) NOT NULL,
  `skill_image` varchar(255) DEFAULT NULL,
  `skill_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `skill_image`, `skill_description`) VALUES
(1, 'HTML', 'css/img_skills/iconfinder_html5.png', 'Front end Web Development language for documents designed to be displayed on websites. Often used with CSS and JavaScript'),
(2, 'CSS', 'css/img_skills/iconfinder_css3.png', 'Stylesheet Web Development language used for styling the presentation of a document written in HTML. Often used with HTML and JavaScript'),
(3, 'JavaScript', 'css/img_skills/iconfinder_javascript.png', 'High level multi-paradigm programming language with a variety of applications including Web Development. Often used with HTML and CSS'),
(4, 'Photoshop', 'css/img_skills/iconfinder_photoshop.png', 'Graphics editor Developed by Adobe used in Graphics Design. Often used with Illustrator'),
(5, 'AngularJS', 'css/img_skills/iconfinder_angularjs.png', 'Javascript based open source web framework maintained by Google. Great for single page applications'),
(6, 'ReactJS', 'css/img_skills/iconfinder_reactjs.png', 'Open source Javascript library for building interfaces or UI components maintained by Facebook. It is used as a base for single page or mobile applications.'),
(7, 'PHP', NULL, 'Back end scripting language for web development. Often used with SQL, HTML, JavaScript and CSS'),
(8, 'SQL', NULL, 'Domain specific back end language designed for holding and managing data. Often used with PHP '),
(9, 'CAD', NULL, 'Computer Aided Design, the use of computers to aid in design, analysis and modification of a design. Often used SolidWorks, AutoCAD and ANSYS'),
(10, 'Web Development', NULL, 'Developing a web site for the internet or intranet using web development languages, libraries and frameworks such as HTML, CSS and JavaScript'),
(11, 'Repairman', NULL, 'Skilled professional work in repairing a variety of vehicles, appliances or machinery'),
(12, 'Hair Styling', NULL, 'Cutting, styling and washing hair'),
(13, 'Domestic Work', NULL, 'Variety of household service such such as cooking, cleaning, laundry household errands and household maintenance within the scope of a residence'),
(14, 'Massage Therapy', NULL, 'Trained massage therapist that practices massage therapy to enhance the well-being of a client');

-- --------------------------------------------------------

--
-- Table structure for table `skill_lookup`
--

CREATE TABLE `skill_lookup` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_lookup`
--

INSERT INTO `skill_lookup` (`id`, `user_id`, `skill_id`) VALUES
(8, 3, 1),
(9, 3, 2),
(10, 3, 3),
(11, 3, 4),
(12, 3, 5),
(13, 4, 5),
(14, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `star_rating`
--

CREATE TABLE `star_rating` (
  `id` int(11) NOT NULL,
  `rated_user_id` int(11) NOT NULL,
  `rater_user_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `dt_rated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `star_rating`
--

INSERT INTO `star_rating` (`id`, `rated_user_id`, `rater_user_id`, `rate`, `dt_rated`) VALUES
(1, 3, 1, 3, '2020-10-22 14:35:04'),
(2, 3, 3, 5, '2020-10-24 09:33:03'),
(3, 3, 3, 3, '2020-10-24 09:34:47'),
(4, 4, 3, 5, '2020-10-24 09:43:30'),
(5, 4, 3, 4, '2020-10-24 09:43:51'),
(6, 4, 3, 2, '2020-10-24 09:44:48'),
(7, 4, 3, 1, '2020-10-24 09:45:15'),
(8, 4, 3, 5, '2020-10-24 09:45:26'),
(9, 4, 3, 4, '2020-10-24 09:50:33'),
(10, 4, 3, 5, '2020-10-24 09:50:39'),
(11, 4, 3, 4, '2020-10-24 10:19:23'),
(12, 4, 3, 4, '2020-10-24 10:19:27'),
(13, 4, 3, 4, '2020-10-24 10:19:29'),
(14, 4, 3, 4, '2020-10-24 10:19:31'),
(15, 4, 3, 4, '2020-10-24 10:54:24'),
(16, 4, 3, 4, '2020-10-24 10:54:24'),
(17, 4, 3, 4, '2020-10-24 10:54:56'),
(18, 4, 3, 4, '2020-10-24 10:55:00'),
(19, 4, 3, 4, '2020-10-24 10:55:02'),
(20, 4, 3, 4, '2020-10-24 10:56:13'),
(21, 4, 3, 4, '2020-10-24 10:56:14'),
(22, 4, 3, 5, '2020-11-28 22:26:45'),
(23, 4, 3, 3, '2020-11-28 22:26:51'),
(24, 4, 3, 5, '2020-11-28 22:27:18'),
(25, 4, 3, 5, '2020-12-12 10:03:18'),
(26, 4, 3, 5, '2020-12-12 16:48:09'),
(27, 4, 3, 5, '2020-12-12 16:48:19'),
(28, 4, 3, 5, '2020-12-12 16:48:27');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_name` varchar(20) NOT NULL,
  `store_profimage` varchar(50) DEFAULT 'profile_img/default.png',
  `store_type` varchar(50) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `store_coverimage` varchar(50) NOT NULL DEFAULT 'cover_img/default.jpg',
  `verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `user_id`, `store_name`, `store_profimage`, `store_type`, `creation_date`, `store_coverimage`, `verified`) VALUES
(1, 3, 'SmartStore', 'profile_img/default.png', 'Wholesale', '2020-12-29 14:01:17', 'cover_img/default.jpg', 1),
(2, 1, 'Mandoloarian', 'profile_img/default.png', 'Fitness', '2020-12-31 11:03:21', 'img_shop/shop8.jpg', 1),
(3, 2, 'Maganete Foods', 'profile_img/default.png', 'Food', '2020-12-31 11:03:21', 'img_shop/shop9.jpg', 1),
(4, 4, 'The Fellowship', 'profile_img/default.png', 'Accessories', '2020-12-31 11:03:21', 'img_shop/shop10.jpg', 0),
(5, 5, 'Crunch Runners', 'profile_img/default.png', 'Fitness', '2020-12-31 11:03:21', 'img_shop/shop11.jpg', 0),
(6, 6, 'De Trivi Suits', 'profile_img/default.png', 'Clothing', '2020-12-31 11:03:21', 'img_shop/shop12.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uploads`
--

CREATE TABLE `tbl_uploads` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `size` int(11) NOT NULL,
  `location` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` text NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `industry` varchar(50) NOT NULL,
  `profileimg` varchar(255) DEFAULT 'profile_img/default.png',
  `coverimg` varchar(255) DEFAULT 'cover_img/default.jpg',
  `verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `category`, `industry`, `profileimg`, `coverimg`, `verified`) VALUES
(1, 'Kamo', '1234', 'molefekamogelo@yahoo.com', 'Freelancer', 'Art', 'profile_img/98486-kamo.png', 'cover_img/default.jpg', 0),
(2, 'Diana', '$2y$10$UZyOnsgM.giUML4VXAhehOY96TEsf2H0j8LSgQcmBySa0jXGquTme', 'test@test.com', 'Company', 'Law', 'profile_img/default.png', 'cover_img/default.jpg', 0),
(3, 'Kamo2', '$2y$10$VFx5WacQAStasoOeStkniuDIE5YVHwqfC2zJSfrijELiLFPA83816', 'testmail@test.com', 'Company', 'Engineering', 'img_posts/1606725655.png', 'img_posts/1606724754.png', 1),
(4, 'Karma', '$2y$10$G2PmPMNqgHilHcVpzijHyeEppKfoXhhUb6dVkpy3VcdyLjefFiIcC', 'test3@test.com', 'Freelancer', 'Art', 'profile_img/60225-coming-soon.png', 'cover_img/default.jpg', 0),
(5, 'Tumi', '$2y$10$eLgt/ne0i0n3U.BQoBwik.Uc09tIxN3ii0reALPwu0SIpR/2Ob6iK', 'test4@test.com', 'Freelancer', 'Entertainment', 'profile_img/93462-tumi.png', 'cover_img/default.jpg', 0),
(6, 'Karma2', '$2y$10$SYT7PMosyiiH/7Lkv0ofu.r.xC8MXo9C./GutW1qkzAxw6FcX73U.', 'karma2@yahoo.com', 'Company', 'Entertainment', 'profile_img/default.png', 'cover_img/default.jpg', 0),
(7, 'admin', '$2y$10$.K3PJ66xCQIVyMdwQS06Bu0n.4OSA0wo8rTQhWrG/g8JBlFsm.4DO', 'admin@admin.com', 'Company', 'Medicine', 'profile_img/logo-icon.png', 'cover_img/default.jpg', 0),
(15, 'KuchikiB', '$2y$10$ligN5KgLm9dlni3PGMiO.ur6ymTCxybozAInoleAvWTCBuYSASkVW', 'kuchiki@gotei13.com', 'Company', 'Law', 'profile_img/default.png', 'cover_img/default.png', 0),
(16, 'Itachi', '$2y$10$mua3tx0QpXksOGpdy/EkcOQmy4GsImJdxhqiDCPN5MOuGwniqJOgm', 'bestniisan@uchiha.com', 'Freelancer', 'Art', 'profile_img/default.png', 'cover_img/default.png', 0),
(17, 'Ichigo', '$2y$10$IfFVOIbhHgk01AyT1ZBkx.w6QklMhPMn7Kjxo6Y/ziYYHQao7bd8m', 'kurosaki@ichigo.com', 'Freelancer', 'Entertainment', 'profile_img/default.png', 'cover_img/default.png', 0),
(18, 'Naruto', '$2y$10$.fKnn7OFWxl4E9gp/Uxj9OkiORv/mZvAFoe7T0YdPX6edWDH1h6OC', 'nanadaime@hokage.com', 'Company', 'Art', 'profile_img/default.png', 'cover_img/default.png', 0),
(19, 'Kamo28', '$2y$10$bFcZrt7J/nWtwf2QN.rug.kT4LeyBfD/2Eh5TLUktNlHMgZ.VdU5q', 'newtest@test.com', 'Freelancer', 'Engineering', 'profile_img/default.png', 'cover_img/default.png', 0),
(20, 'vetro', '$2y$10$GuNo4yCtoR/N6/XnT6uqc.MC.qbQmXxnJQ3/aqhkzgaCq2rkTHbHq', 'vetro@test.com', 'Recruiter', 'Engineering', 'profile_img/default.png', 'cover_img/default.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_year_from` year(4) NOT NULL,
  `job_year_to` year(4) NOT NULL,
  `company_name` varchar(64) NOT NULL,
  `job_reference` varchar(64) NOT NULL,
  `job_duties` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `user_id`, `job_year_from`, `job_year_to`, `company_name`, `job_reference`, `job_duties`) VALUES
(1, 3, 2014, 2016, 'Brand Soldiers', '0124567890', 'Brand Ambassador');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_likes`
--
ALTER TABLE `comment_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_token`
--
ALTER TABLE `login_token`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_tokens`
--
ALTER TABLE `password_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_lookup`
--
ALTER TABLE `skill_lookup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `star_rating`
--
ALTER TABLE `star_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `comment_likes`
--
ALTER TABLE `comment_likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `login_token`
--
ALTER TABLE `login_token`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `password_tokens`
--
ALTER TABLE `password_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `skill_lookup`
--
ALTER TABLE `skill_lookup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `star_rating`
--
ALTER TABLE `star_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `work_experience`
--
ALTER TABLE `work_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
