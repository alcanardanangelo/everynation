-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 23, 2018 at 11:20 PM
-- Server version: 5.6.39
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cwamvkmk_enc`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `date_of_service` date NOT NULL,
  `time_of_service` varchar(20) NOT NULL,
  `monthly_topic_id` int(11) NOT NULL,
  `no_of_attendees` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `date_of_service`, `time_of_service`, `monthly_topic_id`, `no_of_attendees`) VALUES
(1, '2018-05-20', '00:30', 1, 23),
(2, '2018-05-30', '12:00', 2, 40);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_per_class`
--

CREATE TABLE `attendance_per_class` (
  `attendance_per_class_id` bigint(20) NOT NULL,
  `monthly_topic_id` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `registration_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_per_class`
--

INSERT INTO `attendance_per_class` (`attendance_per_class_id`, `monthly_topic_id`, `date`, `registration_id`) VALUES
(1, 1, '2018-05-31', 5),
(2, 1, '2018-05-31', 1),
(3, 1, '2018-05-31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `class_description` text NOT NULL,
  `price` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_description`, `price`, `date_created`) VALUES
(1, 'testas', 'safdadfs', 500, '2018-05-20 17:39:32'),
(2, 'Discipleship Class 2018', 'Discipleship', 500, '2018-05-22 03:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `class_registration`
--

CREATE TABLE `class_registration` (
  `class_registration_id` bigint(20) NOT NULL,
  `class_id` int(11) NOT NULL,
  `registration_id` bigint(20) NOT NULL,
  `victory_group_leader_id` int(11) NOT NULL,
  `date_class` varchar(50) NOT NULL,
  `payment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_registration`
--

INSERT INTO `class_registration` (`class_registration_id`, `class_id`, `registration_id`, `victory_group_leader_id`, `date_class`, `payment`) VALUES
(1, 1, 2, 1, '05/31/2018', 500),
(2, 1, 1, 1, '05/30/2018', 500),
(3, 2, 6, 1, '05/23/2018', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `discipleship_journey`
--

CREATE TABLE `discipleship_journey` (
  `discipleship_journey_id` bigint(20) NOT NULL,
  `journey_id` int(11) NOT NULL,
  `registration_id` bigint(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date_journey_start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_journey_end` datetime DEFAULT NULL,
  `victory_group_leader_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `discipleship_journey`
--

INSERT INTO `discipleship_journey` (`discipleship_journey_id`, `journey_id`, `registration_id`, `status`, `date_journey_start`, `date_journey_end`, `victory_group_leader_id`) VALUES
(1, 1, 1, 1, '2018-05-20 18:36:01', '2018-05-20 20:55:10', 1),
(2, 2, 1, 1, '2018-05-20 18:39:24', '2018-05-20 20:55:10', 1),
(3, 3, 1, 1, '2018-05-20 18:40:12', '2018-05-20 20:55:10', 1),
(4, 1, 2, 1, '2018-05-20 18:41:25', '2018-05-20 12:41:47', 1),
(5, 2, 2, 1, '2018-05-20 18:41:41', '2018-05-20 12:41:47', 1),
(6, 4, 1, 1, '2018-05-20 20:53:02', '2018-05-20 20:55:10', 1),
(7, 1, 6, 1, '2018-05-22 03:19:29', '2018-05-22 15:19:48', 1),
(8, 2, 6, 0, '2018-05-22 03:20:14', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `md_journey`
--

CREATE TABLE `md_journey` (
  `journey_id` int(11) NOT NULL,
  `journey_name` varchar(250) DEFAULT NULL,
  `journey_description` text NOT NULL,
  `prerequisite` int(11) DEFAULT NULL,
  `weight` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_journey`
--

INSERT INTO `md_journey` (`journey_id`, `journey_name`, `journey_description`, `prerequisite`, `weight`, `date_created`) VALUES
(1, 'One 2 One', '', NULL, 1, '2018-05-12 23:23:19'),
(2, 'Victory Weekend', '', 1, 2, '2018-05-12 23:26:32'),
(3, 'Purple Book', '', 2, 3, '2018-05-13 00:25:11'),
(4, 'Leadership', '', 3, 4, '2018-05-20 14:26:21'),
(5, 'Trial', '', 4, 5, '2018-05-20 14:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `member_type`
--

CREATE TABLE `member_type` (
  `member_type_id` int(11) NOT NULL,
  `member_type_name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_type`
--

INSERT INTO `member_type` (`member_type_id`, `member_type_name`, `date_created`) VALUES
(5, 'Active', '2018-05-09 22:35:08'),
(6, 'Inactive', '2018-05-09 22:35:20'),
(7, 'Temporary', '2018-05-09 22:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_topic`
--

CREATE TABLE `monthly_topic` (
  `monthly_topic_id` int(11) NOT NULL,
  `monthly_topic_name` varchar(250) NOT NULL,
  `monthly_topic_description` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `monthly_topic`
--

INSERT INTO `monthly_topic` (`monthly_topic_id`, `monthly_topic_name`, `monthly_topic_description`, `date_created`) VALUES
(1, 'Don’t Be Afraid . . . It’s Just Your Future', 'Fear grips us all at times and comes in all shapes and sizes. But it’s mostly related to fear of the future. Draw strength from David’s response to fear.', '2018-05-14 19:35:21'),
(2, 'Precision with God’s Words, Love for God’s Glory', 'It was true that: If it was Jesus’ will John would remain, and Peter should follow Jesus to the point of death. And it was false that Jesus promised that John would remain till he comes.\r\n\r\nLittle words matter. All words matter. Word order matters. Clauses matter. Phrases matter. Conjunctions matter.\r\n\r\nThey matter when listening to each other. They matter when reading Shakespeare. And they matter most of all when reading the Bible.', '2018-05-16 10:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registration_id` bigint(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `street` varchar(250) DEFAULT NULL,
  `barangay` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `province` varchar(250) DEFAULT NULL,
  `birthday` varchar(50) NOT NULL,
  `school_id` int(11) NOT NULL,
  `victory_group_leader_id` int(11) DEFAULT '1',
  `member_type_id` int(11) NOT NULL DEFAULT '7',
  `status_id` int(11) NOT NULL DEFAULT '3',
  `date_registered` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registration_id`, `firstname`, `lastname`, `contact_no`, `email`, `street`, `barangay`, `city`, `province`, `birthday`, `school_id`, `victory_group_leader_id`, `member_type_id`, `status_id`, `date_registered`) VALUES
(1, 'Juan', 'Dela Cruz', '+639354172345', 'johnthecross@gmail.com', 'Ilang Ilang St', 'West Ave', 'Meycauayan', 'Bulacan', '05/31/2018', 1, 1, 5, 2, 0),
(2, 'John', 'Ocampo', '+639233323211', '', 'Molave St.', 'Kamalig', 'Meycauyan', '', '05/28/2018', 2, 1, 5, 3, 0),
(5, 'Mark', 'Aglipay', '+639354172345', 'sdfasdf@gmail.com', 'sadfasdfasfd', 'dsafasdfas', 'asdfasfdasfd', 'sfasdfas', '05/31/2018', 3, 1, 7, 3, 0),
(6, 'Sherwin', 'Cordeta', '+639552331078', 'sherwin09.sc@gmail.com', 'catleya', 'pandayan', 'meycauayan', 'bulacan', '05/09/2018', 1, 1, 7, 3, 0),
(7, 'Jayson', 'Batoon', '+639998733212', 'jayson@yahoo.com', 'sadsasasd', 'asddsa', 'asddas', 'bulacan', '05/01/2018', 1, 1, 5, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `school_name`, `date_created`) VALUES
(1, 'Bulacan State University', '2018-05-09 23:04:53'),
(2, 'Centro Escolar University', '2018-05-09 23:10:29'),
(3, 'Far Eastern University', '2018-05-09 23:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_name`, `date_created`) VALUES
(1, 'Intern', '2018-05-12 18:12:03'),
(2, 'Leader', '2018-05-12 18:12:03'),
(3, 'Member', '2018-05-12 18:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(1080) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `date_created`, `is_active`) VALUES
(1, 'admin', '$2y$10$uQh10YyXeI6DIUjhT806YOdzcPGjt7Yp22Nb0o0jOPgFAESpTQJzq', '2018-05-14 12:32:55', 1),
(2, '', '$2y$10$OMw/oBLlPI8/V4N7hz2BluI8qmGLjH9VZ9PnQrif.m5kmmq6Crau.', '2018-05-14 12:37:05', 1),
(3, 'danangelo', '$2y$10$2iVqWSh8/CDj3rs7uRPOOOVhQGZlgE.PXxgP8ulXVOZvEThm8CaqC', '2018-05-14 15:24:19', 1),
(4, 'admin123', '$2y$10$dPLz..6GxmUoDTkNXAtfxe1cvowax1gxMBd7u1fbxEOpfHyzf2aAa', '2018-05-22 03:36:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `victory_group_leader`
--

CREATE TABLE `victory_group_leader` (
  `victory_group_leader_id` int(11) NOT NULL,
  `victory_group_leader_firstname` varchar(50) NOT NULL,
  `victory_group_leader_lastname` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `attendance_per_class`
--
ALTER TABLE `attendance_per_class`
  ADD PRIMARY KEY (`attendance_per_class_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_registration`
--
ALTER TABLE `class_registration`
  ADD PRIMARY KEY (`class_registration_id`);

--
-- Indexes for table `discipleship_journey`
--
ALTER TABLE `discipleship_journey`
  ADD PRIMARY KEY (`discipleship_journey_id`);

--
-- Indexes for table `md_journey`
--
ALTER TABLE `md_journey`
  ADD PRIMARY KEY (`journey_id`);

--
-- Indexes for table `member_type`
--
ALTER TABLE `member_type`
  ADD PRIMARY KEY (`member_type_id`);

--
-- Indexes for table `monthly_topic`
--
ALTER TABLE `monthly_topic`
  ADD PRIMARY KEY (`monthly_topic_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `victory_group_leader`
--
ALTER TABLE `victory_group_leader`
  ADD PRIMARY KEY (`victory_group_leader_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendance_per_class`
--
ALTER TABLE `attendance_per_class`
  MODIFY `attendance_per_class_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_registration`
--
ALTER TABLE `class_registration`
  MODIFY `class_registration_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discipleship_journey`
--
ALTER TABLE `discipleship_journey`
  MODIFY `discipleship_journey_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `md_journey`
--
ALTER TABLE `md_journey`
  MODIFY `journey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `member_type`
--
ALTER TABLE `member_type`
  MODIFY `member_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `monthly_topic`
--
ALTER TABLE `monthly_topic`
  MODIFY `monthly_topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registration_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `victory_group_leader`
--
ALTER TABLE `victory_group_leader`
  MODIFY `victory_group_leader_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
