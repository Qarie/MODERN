-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2023 at 01:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ddibastats_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(225) NOT NULL,
  `name` varchar(30) NOT NULL,
  `role` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `date_of_birth` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `vcode` varchar(225) NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `role`, `phone`, `email`, `date_of_birth`, `address`, `password`, `photo`, `vcode`, `added_on`, `added_by`) VALUES
(3, 'LABAN KULUBASI', '1', '0700357107', 'LABANKULUBASI@GMAIL.COM', '1996-04-11', 'KAMPALA', '81dc9bdb52d04dc20036dbd8313ed055', '', 'vc75m2', '2022-12-10 09:38:13', 6),
(6, 'Abdulkarim Lugobe jr', '1', '0755091645', 'ceerprotocol@gmail.com', '2022-12-23', 'wakiso', '5f4dcc3b5aa765d61d8327deb882cf99', '', 'j1dyid', '2022-12-23 03:30:47', 6),
(10, 'ismael serebe', '2', '88888888888', 'admin@gmail.com', '2023-01-17', 'kampala', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', '2023-01-17 14:21:22', 6);

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `abbreviation` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `name`, `abbreviation`, `description`, `date_added`, `added_by`) VALUES
(2, 'man of the match', 'motm', 'man of the match', '2022-12-06 15:28:40', 6),
(3, 'golden boot', 'gdbt', 'most scoring', '2022-12-06 15:39:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(225) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `name`, `date_added`, `added_by`) VALUES
(5, 'red card', '2022-12-06 15:16:13', 0),
(6, 'yellow card', '2022-12-06 15:16:25', 6);

-- --------------------------------------------------------

--
-- Table structure for table `coaches`
--

CREATE TABLE `coaches` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `team` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(225) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`id`, `name`, `description`, `date_added`, `added_by`) VALUES
(6, '5-4-1', '5 defenders, 4 midfielders, and 1 forward', '2022-12-07 14:13:32', 6),
(8, '4-2-3-1', '4 defenders, 2 defensive & 3 attacking midfielders, 1 forward', '2022-12-07 14:16:43', 0),
(9, '4-3-3', '4 defenders, 3 midfielders and 3 forwards', '2022-12-07 14:18:27', 0),
(10, '5-3-2', '5 defenders,3 midfielders,2 forwards', '2022-12-07 14:19:55', 6);

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`id`, `name`, `slug`, `description`, `date_added`, `added_by`) VALUES
(7, 'UGANDA PREMIER LEAGUE', 'UPL', 'TOP LEAGUE', '2022-12-08 14:59:47', 2),
(8, 'MASAZA CUP ', 'MAC', 'MASAZA LEAGUE', '2022-12-08 15:00:18', 2),
(10, 'ENGLISH PREMIER LEAGUE', 'EPL', 'The finalists', '2023-01-28 09:06:06', 3);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date_of_birth` varchar(225) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(225) NOT NULL,
  `team` varchar(225) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `name`, `date_of_birth`, `nationality`, `phone`, `email`, `address`, `team`, `date_added`, `added_by`) VALUES
(2, 'sserebe ismail', '2022-12-08', 'ugandan', '0755091646', 'ismal@gmail.com', 'muyenga', 'buddu', '2022-12-08 10:53:18', 2);

-- --------------------------------------------------------

--
-- Table structure for table `matchday`
--

CREATE TABLE `matchday` (
  `id` int(11) NOT NULL,
  `league` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `slug` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `season` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `added_by` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matchday`
--

INSERT INTO `matchday` (`id`, `league`, `name`, `slug`, `description`, `season`, `type`, `added_by`, `date_added`) VALUES
(30, 'UGANDA PREMIER LEAGUE', 'match 1', 'm1', 'jxcn ', '2023/2024', 'Round Robin', 6, '2023-01-12 07:41:04'),
(31, 'UGANDA PREMIER LEAGUE', 'match 1', 'm2', 'f', '2024/2025', 'Round Robin', 6, '2023-01-12 07:51:24'),
(32, 'ENGLISH PREMIER LEAGUE', 'Match Day 1', 'MD1', 'First Match day', '2023-2024', 'Round Robin', 3, '2023-01-28 09:16:29'),
(33, 'ENGLISH PREMIER LEAGUE', 'Match Day 2', 'md2', 'dde', '2023-2024', 'Round Robin', 3, '2023-01-28 11:00:13');

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `matchday_id` int(11) NOT NULL,
  `league` varchar(225) NOT NULL,
  `matchday` varchar(225) NOT NULL,
  `season` varchar(225) NOT NULL,
  `home_team` varchar(225) NOT NULL,
  `home_score` int(11) DEFAULT NULL,
  `away_score` int(11) DEFAULT NULL,
  `away_team` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `date` varchar(225) NOT NULL,
  `time` varchar(225) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `matchday_id`, `league`, `matchday`, `season`, `home_team`, `home_score`, `away_score`, `away_team`, `status`, `date`, `time`, `added_on`, `added_by`) VALUES
(1, 32, 'ENGLISH PREMIER LEAGUE', 'Match Day 1', '2023-2024', '1', 3, 0, '2', 1, '2023-01-29', '17:50', '2023-01-28 09:45:37', 3),
(2, 32, 'ENGLISH PREMIER LEAGUE', 'Match Day 1', '2023-2024', '4', 6, 0, '3', 1, '2023-01-29', '17:35', '2023-01-28 10:31:28', 3),
(4, 33, 'ENGLISH PREMIER LEAGUE', 'Match Day 2', '2023-2024', '1', 2, 4, '4', 1, '2023-01-29', '18:14', '2023-01-28 11:10:54', 3);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(225) NOT NULL,
  `ma_id_number` varchar(225) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `date_of_birth` varchar(225) NOT NULL,
  `nationality` varchar(225) NOT NULL,
  `team` varchar(225) NOT NULL,
  `title` varchar(225) NOT NULL,
  `level` varchar(225) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `abbreviation` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `abbreviation`, `description`, `date_added`, `added_by`) VALUES
(3, 'goal keeper', 'gk', 'goaleee', '2022-12-06 12:48:48', 6),
(4, 'centre back', 'cb', 'defence', '2022-12-06 12:49:12', 0),
(5, 'right centre back', 'rcb', 'defence on right wing', '2022-12-06 12:49:37', 0),
(6, 'left centre back', 'lcb', 'defence of left wing', '2022-12-06 12:50:05', 0),
(7, 'defending midfielder', 'dm', 'midfield', '2022-12-06 12:51:01', 0),
(8, 'central defending midfielder', 'cdm', 'midfield', '2022-12-06 12:52:10', 0),
(9, 'right mid fielder', 'rmd', 'midfield', '2022-12-06 12:52:36', 0),
(10, 'left mid fielder', 'lmd', 'midfield', '2022-12-06 12:55:27', 0),
(11, 'centre forward', 'cf', 'forward', '2022-12-06 12:56:23', 0),
(12, 'left winger', 'lw', 'winger', '2022-12-06 12:57:43', 0),
(13, 'right winger', 'rw', 'winger', '2022-12-06 12:58:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `referees`
--

CREATE TABLE `referees` (
  `id` int(225) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(225) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `referees`
--

INSERT INTO `referees` (`id`, `name`, `date_of_birth`, `phone`, `email`, `address`, `date_added`, `added_by`) VALUES
(2, 'Karim Abdul', '2022-12-10', '0755091646', 'ceerprotocol@gmail.com', 'kampala', '2022-12-06 09:30:46', 0),
(3, 'sserebe ismail', '2022-12-08', '0754323456', 'admin2@gmail.com', 'masaka\r\n', '2022-12-06 09:30:46', 0),
(4, 'prossy kwagala', '2022-11-30', '0754323456', 'prossy@gmail.com', 'gulu34', '2022-12-06 14:35:57', 6);

-- --------------------------------------------------------

--
-- Table structure for table `registered_teams`
--

CREATE TABLE `registered_teams` (
  `id` int(11) NOT NULL,
  `tname` varchar(225) NOT NULL,
  `season` varchar(225) NOT NULL,
  `league` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registered_teams`
--

INSERT INTO `registered_teams` (`id`, `tname`, `season`, `league`, `added_on`, `added_by`) VALUES
(1, 'Arsenal', '34', '10', '2023-01-28 09:10:29', 3),
(2, 'Everton', '34', '10', '2023-01-28 09:11:37', 3),
(3, 'Chelsea', '34', '10', '2023-01-28 09:11:48', 3),
(4, 'MANCHESTER UNITED', '34', '10', '2023-01-28 09:12:04', 3);

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` int(11) NOT NULL,
  `tournament` varchar(225) NOT NULL,
  `season` varchar(225) NOT NULL,
  `win` int(20) NOT NULL,
  `draw` int(20) NOT NULL,
  `lose` int(20) NOT NULL,
  `teams` varchar(225) NOT NULL,
  `players` varchar(225) NOT NULL,
  `rules` varchar(225) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `tournament`, `season`, `win`, `draw`, `lose`, `teams`, `players`, `rules`, `date_added`, `added_by`) VALUES
(27, 'UGANDA PREMIER LEAGUE', '2023/2024', 3, 1, 0, 'ARUA HILL SC,BUL FC', '', 'karim', '2023-01-12 07:40:14', 10),
(33, 'UGANDA PREMIER LEAGUE', '2024/2025', 0, 0, 0, '', '', 'kdk', '2023-01-18 14:36:12', 10),
(34, 'ENGLISH PREMIER LEAGUE', '2023-2024', 0, 0, 0, '', '', 'no biting', '2023-01-28 09:06:44', 3);

-- --------------------------------------------------------

--
-- Table structure for table `stadiums`
--

CREATE TABLE `stadiums` (
  `id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `capacity` varchar(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `latitude` varchar(225) NOT NULL,
  `longitude` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stadiums`
--

INSERT INTO `stadiums` (`id`, `name`, `capacity`, `location`, `latitude`, `longitude`, `image`, `date_added`, `added_by`) VALUES
(5, 'st marys kitende stadium', '100000', 'kitende', '50', '33', '', '2022-12-07 14:10:29', 6);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `description` varchar(225) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `logo` varchar(225) NOT NULL,
  `date_added` timestamp NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `slug`, `description`, `venue`, `logo`, `date_added`, `added_by`) VALUES
(2, 'ARUA HILL SC', 'ARH SC', 'ARUA HILL SOCCER CLUB', 'ARUA STADIUM', '13642.jpg', '2022-12-09 07:25:10', 0),
(3, 'BUL FC', 'BUL FC', 'BUL FC', 'BUL FC STADIUMo', '', '2022-12-09 07:25:39', 6),
(6, 'braad', 'dgdg', 'ddjd', 'jdjd', '', '2023-01-18 15:48:10', 0),
(7, 'chxhxhxh', 'xj', 'xjjx', 'xjxj', '', '2023-01-18 15:48:21', 0),
(8, 'Vipers FC', 'We the best', 'A team that creates talent', 'Nichoto Stadium Kakuuto', 'heroes.png', '2023-01-27 09:19:41', 0),
(9, 'Arsenal', 'The Gunners', 'retreat', 'tt', '', '2023-01-28 09:08:41', 0),
(10, 'Chelsea', 'rre', 'rry', 'rrt', '', '2023-01-28 09:09:01', 0),
(11, 'MANCHESTER UNITED', 'fg', 'cvjy', 'g', '', '2023-01-28 09:09:28', 0),
(12, 'Everton', 'ee', 'fe', 'fg', '', '2023-01-28 09:09:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `weather`
--

CREATE TABLE `weather` (
  `id` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weather`
--

INSERT INTO `weather` (`id`, `name`, `date_added`, `added_by`) VALUES
(5, 'Sunny', '2022-12-06 16:34:31', 6),
(6, 'Cloudy', '2022-12-06 16:34:35', 0),
(7, 'windy', '2022-12-06 16:34:39', 0),
(8, 'mkjdhsuy', '2023-01-17 10:48:36', 6),
(9, 'muyf', '2023-01-17 10:48:39', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coaches`
--
ALTER TABLE `coaches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matchday`
--
ALTER TABLE `matchday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referees`
--
ALTER TABLE `referees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered_teams`
--
ALTER TABLE `registered_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stadiums`
--
ALTER TABLE `stadiums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weather`
--
ALTER TABLE `weather`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coaches`
--
ALTER TABLE `coaches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matchday`
--
ALTER TABLE `matchday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `referees`
--
ALTER TABLE `referees`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `registered_teams`
--
ALTER TABLE `registered_teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `weather`
--
ALTER TABLE `weather`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
