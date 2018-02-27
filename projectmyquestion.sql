-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2018 at 02:22 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmyquestion`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `a_id` int(10) UNSIGNED NOT NULL,
  `q_id` int(10) UNSIGNED DEFAULT NULL,
  `a_accepted` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `c_id` int(10) UNSIGNED NOT NULL,
  `q_a_id` int(10) UNSIGNED DEFAULT NULL,
  `c_type` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(10) UNSIGNED NOT NULL,
  `country_name` text,
  `country_deletion_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feed_id` int(10) UNSIGNED NOT NULL,
  `feed_description` text,
  `u_id` int(10) UNSIGNED DEFAULT NULL,
  `feed_creation_date` datetime DEFAULT NULL,
  `feed_deletion_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `follow_question`
--

CREATE TABLE `follow_question` (
  `f_id` int(10) UNSIGNED NOT NULL,
  `u_id` int(10) UNSIGNED DEFAULT NULL,
  `q_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `n_id` int(10) UNSIGNED NOT NULL,
  `n_description` text,
  `u_id` int(10) UNSIGNED DEFAULT NULL,
  `n_creation_date` datetime DEFAULT NULL,
  `n_status` tinyint(1) DEFAULT NULL,
  `n_new_notification_no` tinyint(1) DEFAULT NULL,
  `n_deletion_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` int(10) UNSIGNED NOT NULL,
  `p_description` text,
  `u_id` int(10) UNSIGNED DEFAULT NULL,
  `q_a_c_id` int(10) UNSIGNED DEFAULT NULL,
  `p_type` char(1) DEFAULT NULL,
  `p_creation_date` datetime DEFAULT NULL,
  `p_modification_date` datetime DEFAULT NULL,
  `p_upvote_count` int(10) UNSIGNED DEFAULT NULL,
  `p_downvote_count` int(10) UNSIGNED DEFAULT NULL,
  `p_upvoter_ids` text,
  `p_downvoter_ids` text,
  `p_deletion_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_id`, `p_description`, `u_id`, `q_a_c_id`, `p_type`, `p_creation_date`, `p_modification_date`, `p_upvote_count`, `p_downvote_count`, `p_upvoter_ids`, `p_downvoter_ids`, `p_deletion_status`) VALUES
(1, NULL, 1, NULL, 'k', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `q_id` int(10) UNSIGNED NOT NULL,
  `q_title` text,
  `q_related_tag_ids` text,
  `q_total_view` int(11) DEFAULT NULL,
  `q_viewer_ids` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(10) UNSIGNED NOT NULL,
  `country_id` int(10) UNSIGNED DEFAULT NULL,
  `state_name` text,
  `state_deletion_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `t_id` int(10) UNSIGNED NOT NULL,
  `t_name` text,
  `t_description` text,
  `t_creation_date` datetime DEFAULT NULL,
  `t_modification_date` datetime DEFAULT NULL,
  `u_Follower_count` int(11) DEFAULT NULL,
  `t_deletion_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(10) UNSIGNED NOT NULL,
  `u_email` text,
  `u_password` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_email`, `u_password`) VALUES
(1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `u_id` int(10) UNSIGNED DEFAULT NULL,
  `u_name` text,
  `u_reputation` smallint(6) DEFAULT NULL,
  `u_intrested_tags` text,
  `u_DOB` date DEFAULT NULL,
  `u_photo_path` text,
  `u_contry` text,
  `u_state` text,
  `u_description` text,
  `u_designation` text,
  `u_creation_date` datetime DEFAULT NULL,
  `u_modification_date` datetime DEFAULT NULL,
  `u_type` text,
  `u_deletion_status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feed_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `follow_question`
--
ALTER TABLE `follow_question`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `q_id` (`q_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`n_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `question` (`q_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `follow_question`
--
ALTER TABLE `follow_question`
  ADD CONSTRAINT `follow_question_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`),
  ADD CONSTRAINT `follow_question_ibfk_2` FOREIGN KEY (`q_id`) REFERENCES `question` (`q_id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Constraints for table `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
