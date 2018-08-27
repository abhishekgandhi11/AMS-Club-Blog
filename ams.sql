-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2018 at 01:21 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `date_of_post` varchar(20) NOT NULL,
  `event_date` varchar(20) NOT NULL,
  `expire_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `detail`, `date_of_post`, `event_date`, `expire_date`) VALUES
(2, 'Nirma Foundation day', 'Next Week AMS going to organize fun games on the occasion of Nirma Foundation Day, Student Are requested to participate in this games.', '28/07/2018 02:57:50a', '28/07/2018', '30/07/2018'),
(3, 'Fresher and Farewell Party', 'Dear Friends We are Going to Organise Fresher Cum Farewell Party for our Juniors and our super Seniors next Saturday, For that every student of the first year and second year have to contribute some amount of money from which we can buy gifts for juniors and seniors.', '28/07/2018 11:55:35a', '28/07/2018', '29/07/2018');

-- --------------------------------------------------------

--
-- Table structure for table `existing_user`
--

CREATE TABLE `existing_user` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(20) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `year` int(10) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `existing_user`
--

INSERT INTO `existing_user` (`e_id`, `e_name`, `email_id`, `year`, `date`) VALUES
(7, 'Ishan Soni<br>', '16mca059@nirmauni.ac.in<br>', 2018, '28/07/2018 12:21:59a'),
(8, 'Yash Shah<br>', '16mca046@nirmauni.com<br>', 2019, '28/07/2018 12:34:17a');

-- --------------------------------------------------------

--
-- Table structure for table `expire_event`
--

CREATE TABLE `expire_event` (
  `ex_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `event_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expire_event`
--

INSERT INTO `expire_event` (`ex_id`, `event_title`, `detail`, `event_date`) VALUES
(1, 'Nirma Foundation day', 'Next Week AMS going to organize fun games on the occasion of Nirma Foundation Day, Student Are reque<br>', '27/07/2018');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `f_title` varchar(50) NOT NULL,
  `f_detail` varchar(100) NOT NULL,
  `f_date` varchar(20) NOT NULL,
  `email_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `f_title`, `f_detail`, `f_date`, `email_id`) VALUES
(1, 'Last Fraser Party', 'It was Actully good Keep it Up.', '0000-00-00', '16mca015@nirmauni.ac.in'),
(2, 'Last Fraser Party', 'It was Actully good Keep it Up.', '0000-00-00', '16mca015@nirmauni.ac.in'),
(3, 'Last Fraser Party', 'It was Actully good Keep it Up.', '28/07/2018 03:40:46p', '16mca015@nirmauni.ac.in'),
(4, 'Last Farewell', 'It was Actully good Keep it Up.', '28/07/2018 03:41:13p', '16mca015@nirmauni.ac.in'),
(5, 'Foundation Day', 'You organize well\r\nkeep it up', '28/07/2018 03:42:06p', '16mca015@nirmauni.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `p_id` int(11) NOT NULL,
  `p_title` varchar(150) NOT NULL,
  `p_detail` varchar(1000) NOT NULL,
  `p_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`p_id`, `p_title`, `p_detail`, `p_date`) VALUES
(2, 'Welcome Ceremony Of MCA New First Year and Literal Entry Students.', 'Last Wednesday we arranged a Welcome ceremony for our new juniors.\r\nAll faculty members and all Board members do hard work for arranging this ceremony thank-you so much everyone for your support.\r\n\r\nPresident\r\nIshan Soni', '28/07/2018 01:45:07a'),
(3, 'Welcome Ceremony for juniors, Literal Entery And first year students.', 'Last Wednesday we arranged a Welcome ceremony for our new juniors.\r\nAll faculty members and all Board members do hard work for arranging this ceremony thank-you so much everyone for your support.\r\n\r\nPresident\r\nIshan Soni', '28/07/2018 01:46:14a');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`user_id`, `user_name`, `email_id`, `user_password`, `date`, `year`) VALUES
(6, 'DevendraSingh Vashi', 'dvashi@nirmauni.ac.in', 'vd123', '27/07/2018 10:51:45p', 2018),
(9, 'Isha Soni', '16mca059@nirmauni.ac.in', 'ishan123', '28/07/2018 12:24:52a', 2018);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `existing_user`
--
ALTER TABLE `existing_user`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `expire_event`
--
ALTER TABLE `expire_event`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `existing_user`
--
ALTER TABLE `existing_user`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `expire_event`
--
ALTER TABLE `expire_event`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
