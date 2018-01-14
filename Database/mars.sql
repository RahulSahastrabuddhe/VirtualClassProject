-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2017 at 09:39 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mars`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `tusername` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `stime` float NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`tusername`, `username`, `stime`, `date`, `time`, `status`) VALUES
('smagdum', '2013BIT039', 10.0232, '2017-05-02', '11:03:35.000000', 'p'),
('smagdum', '2013BIT039', 0.104833, '2017-05-02', '11:29:36.000000', 'p'),
('smagdum', '2013BIT039', 0.140183, '2017-05-02', '11:30:48.000000', 'p'),
('smagdum', '2013BIT039', 0.17935, '2017-05-02', '11:31:23.000000', ''),
('smagdum', '2013BIT039', 8.54083, '2017-05-02', '11:32:49.000000', '');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE IF NOT EXISTS `channels` (
  `id` int(11) NOT NULL,
  `channel_name` varchar(32) NOT NULL,
  `created_by` varchar(32) NOT NULL,
  `date_created` date NOT NULL,
  `channel_icon` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `user_commented` varchar(66) NOT NULL,
  `comment` text NOT NULL,
  `date_posted` varchar(33) NOT NULL,
  `video_id` varchar(99) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_commented`, `comment`, `date_posted`, `video_id`) VALUES
(1, '2013BIT039', 'kjhkjhrdfkjf\r\n', '29 March 2017', 'bffc02d6a0f3c15aa87a394970079117');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `name` varchar(25) NOT NULL,
  `message` varchar(25) NOT NULL,
  `sender` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`name`, `message`, `sender`) VALUES
('Maruf', 'yo', 'aniket');

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE IF NOT EXISTS `fileupload` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `file` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`id`, `username`, `subject`, `file`, `type`, `size`) VALUES
(8, '2016BIT005', 'JAVA', '13692-cj_quiz_2_answers.docx', 'application/vnd.openxmlformats', 58),
(5, '2013BIT039', 'MS', '67235-+919923213545_24032016_195517.3gpp', 'video/3gpp', 48),
(6, '2016BIT005', 'OOPS', '99638-academic-calander_sem-i_2015-16_3.pdf', 'application/pdf', 1158),
(7, '2016BIT005', 'JAVA', '85405-applet_cj.ppt', 'application/vnd.ms-powerpoint', 461),
(10, '2016BIT005', 'JAVA', '44989-exception-handling.pptx', 'application/vnd.openxmlformats', 784),
(19, 'vnadre', 'JAVA', '98562-latest_members.php', 'application/octet-stream', 1),
(20, 'vnadre', 'JAVA', '73356-checking.php', 'application/octet-stream', 1),
(21, 'vnadre', 'JAVA', '77543-index.php', 'application/octet-stream', 3),
(22, '2013BIT039', 'MS', '51346-playlist.php', 'application/octet-stream', 1),
(23, 'vnadre', 'TCP-IP', '43880-untitled.php', 'application/octet-stream', 1),
(24, 'vnadre', 'DBMS', '88589-14713651_1141039322647498_980862021393663578_n.jpg', 'image/jpeg', 70),
(25, '2013BIT039', 'CNS', '58969-screenshot-(45).png', 'image/png', 126);

-- --------------------------------------------------------

--
-- Table structure for table `online_users`
--

CREATE TABLE IF NOT EXISTS `online_users` (
  `id` int(11) NOT NULL,
  `session` varchar(133) NOT NULL,
  `time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL,
  `videoid` varchar(123) NOT NULL,
  `type` varchar(100) NOT NULL,
  `username` varchar(125) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `videoid`, `type`, `username`) VALUES
(1, 'bffc02d6a0f3c15aa87a394970079117', 'dislike', ''),
(2, 'a1e33871d06dbf9399cf55d3d7303a7d', 'dislike', 'ranjit'),
(3, 'ed54754b274191d994bf381153a4bbc4', 'dislike', 'ranjit'),
(4, 'bffc02d6a0f3c15aa87a394970079117', 'dislike', 'ranjit'),
(5, 'a1e33871d06dbf9399cf55d3d7303a7d', 'like', '2013BIT039'),
(6, 'a1e33871d06dbf9399cf55d3d7303a7d', 'like', 'vnadre'),
(7, '4126d85d69e37572f7ac53fdb6f3ae58', 'dislike', '2013BIT039');

-- --------------------------------------------------------

--
-- Table structure for table `subjectfeed`
--

CREATE TABLE IF NOT EXISTS `subjectfeed` (
  `username` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `data` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectfeed`
--

INSERT INTO `subjectfeed` (`username`, `subject`, `rating`, `data`) VALUES
('2013BIT039', 'MS', 'Good', 'motu'),
('2014BIT503', 'JAVA', 'Good', 'nmnbm'),
('2014BIT503', 'OOPS', 'Good', 'n ');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `department` varchar(20) NOT NULL,
  `year` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`department`, `year`, `subject`) VALUES
('IT', '2', 'OOPS'),
('IT', '3', 'DSP'),
('IT', '4', 'MS'),
('IT', '2', 'JAVA'),
('IT', '2', 'M-3'),
('IT', '2', 'DSD'),
('IT', '2', 'DC'),
('IT', '2', 'DS'),
('IT', '2', 'M-4'),
('IT', '2', 'IS'),
('IT', '2', 'DM'),
('IT', '2', 'MI'),
('IT', '3', 'TOC'),
('IT', '3', 'SE'),
('IT', '3', 'Advance Java'),
('IT', '3', 'DBMS'),
('IT', '3', 'OS'),
('IT', '3', 'CA'),
('IT', '3', 'CT'),
('IT', '3', 'TCP-IP'),
('IT', '3', 'DSP'),
('IT', '3', 'CO'),
('IT', '4', 'CNS'),
('IT', '4', 'CC'),
('IT', '4', 'DS'),
('IT', '4', 'DMDW'),
('IT', '4', 'WTL'),
('IT', '4', 'MS'),
('IT', '4', 'MWC'),
('IT', '4', 'E-Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL,
  `user_who_subscribed` varchar(32) NOT NULL,
  `subscribed_to` varchar(32) NOT NULL,
  `unsubbed` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tattendance`
--

CREATE TABLE IF NOT EXISTS `tattendance` (
  `tusername` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `ttime` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tattendance`
--

INSERT INTO `tattendance` (`tusername`, `date`, `time`, `ttime`) VALUES
('smagdum', '2017-05-02', '11:03:11.000000', 10.4239),
('smagdum', '2017-05-02', '11:29:02.000000', 1.36687),
('smagdum', '2017-05-02', '11:29:02.000000', 2.12917),
('smagdum', '2017-05-02', '11:29:02.000000', 2.47043),
('smagdum', '2017-05-02', '11:32:30.000000', 8.88967);

-- --------------------------------------------------------

--
-- Table structure for table `teacherfeed`
--

CREATE TABLE IF NOT EXISTS `teacherfeed` (
  `username` varchar(20) NOT NULL,
  `teacher` varchar(20) NOT NULL,
  `rating` varchar(20) NOT NULL,
  `data` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherfeed`
--

INSERT INTO `teacherfeed` (`username`, `teacher`, `rating`, `data`) VALUES
('2013BIT039', 'rakshinda', 'Very Good', 'very good concept cl'),
('2013BIT602', 'rakshinda', 'Unsatisfactory', 'very bad in communic'),
('2014BIT001', 'rakshinda', 'Excellent', 'Want you to teach th'),
('2014BIT001', 'balaji', 'Good', 'Should be more exam ');

-- --------------------------------------------------------

--
-- Table structure for table `tsubject`
--

CREATE TABLE IF NOT EXISTS `tsubject` (
  `username` varchar(20) NOT NULL,
  `subject` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tsubject`
--

INSERT INTO `tsubject` (`username`, `subject`) VALUES
('vnadre', 'JAVA'),
('vnadre', 'Advance Java'),
('vnadre', 'TCP-IP'),
('vnadre', 'DBMS'),
('aniket', 'CC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `gender` varchar(66) NOT NULL,
  `dob` varchar(8) NOT NULL,
  `profile_pic` varchar(66) NOT NULL,
  `date_joined` date NOT NULL,
  `country` varchar(77) NOT NULL,
  `locked` varchar(3) NOT NULL,
  `role` text NOT NULL,
  `department` text NOT NULL,
  `year` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `gender`, `dob`, `profile_pic`, `date_joined`, `country`, `locked`, `role`, `department`, `year`) VALUES
(3, 'Rana', 'Arjun', '2013BIT045', 'rana@123.com', 'ef57f2bc4a959ce441f191231bce6783', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', '4'),
(4, 'vrushali', 'nadre', 'vnadre', 'vnadre@gmail.com', 'a9810d8bd21d618cbabd4e920dd1a8ea', '', '10', '', '0000-00-00', '', 'no', 'Teacher', 'IT', '1'),
(5, 'susmita', 'magdum', 'smagdum', 'smagdum@gmail.com', 'f58639c541c8a0d8b8f46c9e449480cf', '', '10', '', '0000-00-00', '', 'no', 'Teacher', 'IT', ' '),
(6, 'rahul', 'sahastrabuddhe', '2013BIT039', 'rahul@gmail.com', '7b7f71bff78951c020e9c647a32bb839', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', '4'),
(8, 'rohit', 'sahastrabuddhe', '2016BIT005', 'rohits@gmail.com', '24780214eac5297e08da75a44c5f0480', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', '2'),
(9, 'Supriya', 'Supriya', '2014BIT503', 'Supriya@gmail.com', 'f96cb4aadfb5768c9eaf5243c6d1808d', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', '2'),
(11, 'Maruf', 'Maruf', '2013BIT602', 'marufhashmi111@gmail.com', '8ddcfd9727c77a6cad8fa4d2903426ce', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', '4'),
(15, 'Snehal', 'Kale', '2013BIT009', 'kalesnehal@gmail.com', 'a328db9b733c5a335c52d7b1875d1550', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', '4'),
(17, 'vivek ', 'vivek ', '2013BIT038', 'vivek@gmail.com', 'a18f9469f9423fe7c7efc1551fc972c0', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', '4'),
(18, 'Aboli', 'Aboli', '2013BIT016', 'abolimahagaonkar@gmail.com', '5dc63faa8cb29b8bedd51bc0769f5daa', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', '4'),
(20, 'shrinivas', 'shrinivas', '2013BIT040', 'shrinivas@gmail.com', 'd1c4beb6b15c2f5f42016da962f88ea5', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', '4'),
(22, 'rucha', 'deshpande', '2013BIT603', 'deshpanderucha@sggs.ac.in', 'bbfddc373f9c4f9c172461ca24a1c3d1', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', ' '),
(23, 'Medha', 'Ghodge', '2013BIT043', 'ghodgemedha@gmail.com', '9a97446f438c30374f91ad6e8fb816de', '', '10', '', '0000-00-00', '', 'no', 'Student', 'EXTC', '4'),
(24, 'ankit', 'amdewar', '2014BIT001', 'amdewar@gmail.com', '5de52ea9d787966e8b598720255a37a7', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', '3'),
(25, 'sujit', 'bandale', '2014BIT002', 'sujitbandale@gmail.com', '480ee63f90f84807b82cf11188c6580f', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', '3'),
(26, 'prerna', 'mallawat', '2014BIT003', 'prerna@gmail.com', '60de0e69ebd81f37fec9df079723e960', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', '3'),
(27, 'sanket', 'kapale', '2014BIT004', 'sanket@gmail.com', '4ae43cbe4b367ced6f67573cc13aa72a', '', '10', '', '0000-00-00', '', 'no', 'Student', 'IT', '3'),
(28, 'megha', 'jonalgedda', 'megha', 'megha@gmail.com', '489877ec5b7a26bcc731272882ab08e4', '', '10', '', '0000-00-00', '', 'no', 'Teacher', 'IT', ' '),
(29, 'shraddha', 'khekade', 'shraddha', 'shraddha@gmail.com', '707d49d58b54c00fc63a3853a61b16c7', '', '10', '', '0000-00-00', '', 'no', 'Teacher', 'IT', ' '),
(30, 'rakshinda', 'rakshinda', 'rakshinda', 'rakshinda@gmail.com', '63e0cc118426faffcecf9847bcafa2c3', '', '10', '', '0000-00-00', '', 'no', 'Teacher', 'IT', ' '),
(31, 'balaji', 'shetty', 'balaji', 'balaji@gmail.com', '7e67301b766470b059585d8ff1ab0a83', '', '10', '', '0000-00-00', '', 'no', 'Teacher', 'IT', ' '),
(32, 'navneet', 'agrawal', 'navneet', 'navneet@gmail.com', 'ca70c76993fc632a5749a18a37607839', '', '10', '', '0000-00-00', '', 'no', 'Teacher', 'IT', ' '),
(33, 'Aniket', 'Mandalkar', 'aniket', 'aniket@gmail.com', '19ef44acddcb9d44a3033330b6ecdf25', '', '10', '', '0000-00-00', '', 'no', 'Teacher', 'IT', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_description` text NOT NULL,
  `video_keywords` varchar(99) NOT NULL,
  `uploaded_by` varchar(99) NOT NULL,
  `privacy` varchar(99) NOT NULL,
  `date_uploaded` varchar(99) NOT NULL,
  `md5` varchar(99) NOT NULL,
  `views` varchar(111) NOT NULL,
  `video_id` varchar(55) NOT NULL,
  `file_md5` varchar(55) NOT NULL,
  `file_location` varchar(233) NOT NULL,
  `thumbnail` varchar(125) NOT NULL,
  `deleted` varchar(125) NOT NULL,
  `subject` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_title`, `video_description`, `video_keywords`, `uploaded_by`, `privacy`, `date_uploaded`, `md5`, `views`, `video_id`, `file_md5`, `file_location`, `thumbnail`, `deleted`, `subject`) VALUES
(7, 'Compiler Design lecture 1', 'Introduction and various phases of compiler', 'cd', '2013BIT039', 'Public', 'May 2, 2017', 'md5', '1', 'b5dba6311b58ad431936be85bf435cb2', ' e7c62da4728ad67baf8c31320d2b3a37', ' data/users/videos/4YgZHoqS7O9jLKMCompiler Design lecture 1-- Introduction and various phases of compiler.mp4', '', 'yes', 'CC'),
(8, 'Compiler Design lecture 2', 'Introduction to lexical analyser and Grammars', 'cd', '2013BIT039', 'Public', 'May 2, 2017', 'md5', '0', 'fbdf5847cd2279cbb3f62af4288893a6', ' 4e8cdc325ceb8e36966a64839fef194d', ' data/users/videos/EN8r1QDwVOuPZxgCompiler Design Lecture 2 -- Introduction to lexical analyser and Grammars.mp4', '', '', 'CC'),
(10, 'Compiler Design Lecture 5 ', ' Introduction to parsers and LL(1) parsing', 'cd', 'aniket', '', 'May 2, 2017', 'md5', '1', '6fd575c70ad3e68d12476db6148aeec7', ' eb27765ee73055cea3711ec38f011f73', ' data/users/videos/Y3giBhkA0RblQV1Compiler Design Lecture 5 -- Introduction to parsers and LL(1) parsing.mp4', '', '', 'CC'),
(11, 'Compiler Design Lecture 6 ', 'Examples on how to find first and follow in LL(1)', 'cd', 'aniket', 'Public', 'May 2, 2017', 'md5', '0', 'ef8db5ff146211b1531de1d5272b12f0', ' 8cdd05a994b4ea549f59eb653bef5a4f', ' data/users/videos/oTF0vM6CzVD4NGgCompiler Design Lecture 6 -- Examples on how to find first and follow in LL(1).mp4', '', '', 'CC'),
(12, 'Compiler Design Lecture 7 ', 'Construction of LL(1) parsing table', 'cd', 'aniket', 'Public', 'May 2, 2017', 'md5', '0', '106acf6d3844f9fcd55fcd1da34aa60c', ' fb248d80ae90293866a2978bf1ca99ca', ' data/users/videos/juv5hfQlIq27GC3Compiler Design Lecture 7 -- Construction of LL(1) parsing table.mp4', '', '', 'CC'),
(13, 'Compiler Design Lecture 8 ', 'Recursive descent parser (1)', 'cd', 'aniket', 'Public', 'May 2, 2017', 'md5', '0', 'fb69282e5ac5e3285afea52ef244c1b6', ' a32756ef12acccc1d69e477ba52a2e61', ' data/users/videos/uvf694Ws3BKmoIgCompiler Design Lecture 8 -- Recursive descent parser (1).mp4', '', '', 'CC'),
(14, 'Compiler Design Lecture 9 ', 'Operator grammar and Operator precedence parser', 'cd', 'aniket', 'Public', 'May 2, 2017', 'md5', '0', '2bf21d3b798874b0d739005da4b00582', ' a44e99d0225de156643c72670c3b9f80', ' data/users/videos/OKpFtePrBHyndXDCompiler Design Lecture 9 -- Operator grammar and Operator precedence parser.mp4', '', '', 'CC'),
(15, 'Compiler Design Lecture 10 ', 'LR parsing, LR(0) items and LR(0) parsing table - YouTube_2', 'cd', 'aniket', 'Public', 'May 2, 2017', 'md5', '0', '34462161ee7597612c31d62e5336d1bc', ' 83826a59c0b489d2cd20052a0f63acf4', ' data/users/videos/kMZhwljH4PvtdT7Compiler Design Lecture 10 -- LR parsing, LR(0) items and LR(0) parsing table - YouTube_2.MP4', '', '', 'CC'),
(16, 'Python Programming Tutorial - 1', 'Installing Python', 'python', '2013BIT602', 'Public', 'May 2, 2017', 'md5', '1', 'e6900915eb281de35a9f09c2c0f9d3d3', ' 64bf0373cfbf85379a923301c8ab05c5', ' data/users/videos/WCwFkTJ7Q40EVl5Python Programming Tutorial - 1 - Installing Python - YouTube.MP4', '', '', 'WTL'),
(17, 'Python Programming Tutorial - 2 ', 'Numbers ', 'python', '2013BIT602', 'Public', 'May 2, 2017', 'md5', '0', '7f10a2f6b72fa2936b2e2f976336ab2f', ' e9ea7e649cb3bdff3ec390a68cc7fa87', ' data/users/videos/SF9Pmoi02e7qc65Python Programming Tutorial - 2 - Numbers - YouTube.MP4', '', '', 'WTL'),
(18, 'Python Programming Tutorial - 3', 'Strings', 'python', '2013BIT602', 'Public', 'May 2, 2017', 'md5', '0', '2a2f35e4222adb805b7dc02af7bfdd32', ' 5f42690648d5fb1fd87f31b55b03b301', ' data/users/videos/kNZcVFLdMSGOETePython Programming Tutorial - 3 - Strings - YouTube.MP4', '', '', 'WTL'),
(19, 'Python Programming Tutorial - 5', 'Lists ', 'python', '2013BIT602', 'Public', 'May 2, 2017', 'md5', '0', 'a0c993619bab4d7a1fb5936178d6bc6d', ' 71f0395a5814a6ed48af9e3f62c9f8a3', ' data/users/videos/Hi2XNK41BUsJ7cxPython Programming Tutorial - 5 - Lists - YouTube.MP4', '', '', 'WTL');

-- --------------------------------------------------------

--
-- Table structure for table `watch`
--

CREATE TABLE IF NOT EXISTS `watch` (
  `id` int(11) NOT NULL,
  `user` varchar(125) NOT NULL,
  `videoid` varchar(125) NOT NULL,
  `title` varchar(225) NOT NULL,
  `thumbnail` varchar(125) NOT NULL,
  `watched` varchar(66) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watch`
--

INSERT INTO `watch` (`id`, `user`, `videoid`, `title`, `thumbnail`, `watched`) VALUES
(1, '2013BIT039', '4126d85d69e37572f7ac53fdb6f3ae58 ', 'demo', ' ', 'YES'),
(2, '2013BIT039', '78e01746db3e203852bf7f2afc002262 ', 'classwise', ' ', 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `online_users`
--
ALTER TABLE `online_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watch`
--
ALTER TABLE `watch`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `online_users`
--
ALTER TABLE `online_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `watch`
--
ALTER TABLE `watch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
