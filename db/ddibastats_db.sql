-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 12:39 PM
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
(7, 'STARTIMES UGANDA PREMIER LEAGUE', 'UPL', 'TOP LEAGUE', '2022-12-08 14:59:47', 10),
(11, 'ENGLISH PREMIER LEAGUE', 'EPL', 'TOP ENGLISH LEAGUE', '2023-01-30 10:30:23', 6);

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
(37, '7', 'match 1', 'm1', 'MCM', '2023/2024', 'Round Robin', 10, '2023-01-28 14:12:49'),
(38, '7', 'match 2', 'fjj', 'djdj', '2023/2024', 'Round Robin', 10, '2023-01-28 16:49:59'),
(40, '11', 'matchday 1', 'epl1', 'djjd', '2023/2024', 'Round Robin', 6, '2023-01-30 11:32:56');

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
(3, 37, '7', 'match 1', '2023/2024', '11', 1, 2, '2', 1, '2023-01-28', '05:14', '2023-01-28 14:14:08', 10),
(4, 38, '7', 'match 2', '2023/2024', '1', 4, 3, '6', 1, '2023-01-29', '21:08', '2023-01-29 06:08:17', 10),
(8, 40, '11', 'matchday 1', '2023/2024', '35', 3, 3, '59', 1, '2023-01-30', '14:33', '2023-01-30 11:33:17', 6),
(9, 40, '11', 'matchday 1', '2023/2024', '36', 3, 0, '49', 1, '2023-01-30', '14:33', '2023-01-30 11:33:40', 6),
(10, 40, '11', 'matchday 1', '2023/2024', '36', 3, 1, '35', 1, '2023-01-30', '14:34', '2023-01-30 11:34:59', 6),
(11, 40, '11', 'matchday 1', '2023/2024', '35', 2, 1, '39', 1, '2023-01-30', '14:36', '2023-01-30 11:36:48', 6);

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
(1, 'KCCA FC', '2023/2024', '7', '2023-01-28 13:25:11', 10),
(2, 'VIPERS SC', '2023/2024', '7', '2023-01-28 13:34:23', 10),
(3, 'MAROONS FC', '2023/2024', '7', '2023-01-28 13:34:38', 10),
(4, 'WAKISO GIANTS FC', '2023/2024', '7', '2023-01-28 13:34:52', 10),
(5, 'BLACKS POWER FC', '2023/2024', '7', '2023-01-28 13:35:01', 10),
(6, 'EXPRESS FC', '2023/2024', '7', '2023-01-28 13:35:11', 10),
(7, 'URA FC', '2023/2024', '7', '2023-01-28 13:35:22', 10),
(8, 'SC VILLA', '2023/2024', '7', '2023-01-28 13:35:32', 10),
(9, 'GADDAFI FC', '2023/2024', '7', '2023-01-28 13:35:43', 10),
(10, 'ONDUPARAKA FC', '2023/2024', '7', '2023-01-28 13:35:52', 10),
(11, 'ARUA HILL SC', '2023/2024', '7', '2023-01-28 13:36:02', 10),
(12, 'BUL FC', '2023/2024', '7', '2023-01-28 13:36:13', 10),
(13, 'BUSOGA UNITED FC', '2023/2024', '7', '2023-01-28 13:36:25', 10),
(14, 'SOLTILO BRIGHT STARS FC', '2023/2024', '7', '2023-01-28 13:36:47', 10),
(15, 'UPDF FC', '2023/2024', '7', '2023-01-28 13:36:57', 10),
(35, 'ARSENAL', '2023/2024', '11', '2023-01-30 11:05:44', 6),
(36, 'LIVERPOOL', '2023/2024', '11', '2023-01-30 11:06:09', 6),
(37, 'MANCHESTER UNITED', '2023/2024', '11', '2023-01-30 11:06:16', 6),
(39, 'MANCHESTER CITY', '2023/2024', '11', '2023-01-30 11:06:30', 6),
(40, 'CHELSEA', '2023/2024', '11', '2023-01-30 11:06:37', 6),
(41, 'TOTTENHAM HOTSPUR', '2023/2024', '11', '2023-01-30 11:06:46', 6),
(42, 'LEICESTER CITY', '2023/2024', '11', '2023-01-30 11:06:53', 6),
(43, 'ASTON VILLA', '2023/2024', '11', '2023-01-30 11:07:03', 6),
(44, 'NEWCASTLE UNITED', '2023/2024', '11', '2023-01-30 11:07:14', 6),
(45, 'EVERTON', '2023/2024', '11', '2023-01-30 11:07:22', 6),
(46, 'LEEDS UNITED', '2023/2024', '11', '2023-01-30 11:07:32', 6),
(47, 'SOUTHAMPTON', '2023/2024', '11', '2023-01-30 11:07:40', 6),
(49, 'CRYSTAL PALACE', '2023/2024', '11', '2023-01-30 11:07:57', 6),
(50, 'WEST HAM UNITED', '2023/2024', '11', '2023-01-30 11:08:05', 6),
(51, 'WOLVERHAMPTON WANDERS', '2023/2024', '11', '2023-01-30 11:08:24', 6),
(55, 'BRIGHTON & HOVE ALBION', '2023/2024', '11', '2023-01-30 11:08:59', 6),
(56, 'BRENTFORD', '2023/2024', '11', '2023-01-30 11:09:10', 6),
(57, 'NOTTINGHAM FOREST', '2023/2024', '11', '2023-01-30 11:09:21', 6),
(58, 'AFC BOURNMOUTH', '2023/2024', '11', '2023-01-30 11:09:29', 6),
(59, 'FULHAM', '2023/2024', '11', '2023-01-30 11:25:28', 6);

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
(27, '7', '2023/2024', 3, 1, 0, 'ARUA HILL SC,BUL FC', '', 'karim', '2023-01-12 07:40:14', 10),
(38, '11', '2023/2024', 0, 0, 0, '', '', 'YSDFGHJK', '2023-01-30 10:46:25', 6);

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
(1, 'KCCA FC', 'KCCA FC', 'FJJFF', 'DJDJDJ', '', '2023-01-28 13:06:49', 0),
(2, 'VIPERS SC', 'VIPERS SC', 'DJDJ', 'FFH', '', '2023-01-28 13:07:14', 0),
(3, 'MAROONS FC', 'MAROONS FC', 'DJDJ', 'DJ', '', '2023-01-28 13:07:51', 0),
(4, 'WAKISO GIANTS FC', 'WAKISO GIANTS FC', 'FJ', 'FJFJ', '', '2023-01-28 13:08:28', 0),
(5, 'BLACKS POWER FC', 'BLACK POWER FC', 'FHJFH', 'JFJFJ', '', '2023-01-28 13:09:18', 10),
(6, 'EXPRESS FC', 'EXPRESS FC', 'CCJ', 'CJCJ', '', '2023-01-28 13:10:18', 0),
(7, 'URA FC', 'URA FC', 'FJHFJ', 'JFJ', '', '2023-01-28 13:10:38', 0),
(8, 'SC VILLA', 'SC VILLA', 'DJ', 'JDJ', '', '2023-01-28 13:12:15', 0),
(9, 'GADDAFI FC', 'GADDAFI FC', 'FJFJF', 'FNFN', '', '2023-01-28 13:12:40', 0),
(10, 'ONDUPARAKA FC', 'ONDUPARAKA FC', 'CJ', 'DJD', '', '2023-01-28 13:13:20', 10),
(11, 'ARUA HILL SC', 'ARUA HILL SC', 'JDJ', 'DD', '', '2023-01-28 13:13:45', 0),
(12, 'BUL FC', 'BUL FC', 'CJCJ', 'CJ', '', '2023-01-28 13:14:09', 0),
(13, 'BUSOGA UNITED FC', 'BUSOGA UNITED FC', 'CJC', 'CJ', '', '2023-01-28 13:14:45', 0),
(14, 'SOLTILO BRIGHT STARS FC', 'SOLTILO BRIGHT STARS FC', 'FJ', 'JDJ', '', '2023-01-28 13:15:21', 0),
(15, 'UPDF FC', 'UPDF FC', 'JC', 'CJ', '', '2023-01-28 13:15:46', 0),
(16, 'ARSENAL', 'ARS', 'FJFJ', 'DHDH', '', '2023-01-30 10:31:53', 0),
(17, 'LIVERPOOL', 'LIV', 'JFJF', 'DJDJ', '', '2023-01-30 10:32:06', 0),
(18, 'MANCHESTER UNITED', 'MAN U', 'DJD', 'DHDH', '', '2023-01-30 10:32:35', 0),
(19, 'MANCHESTER CITY', 'MAN CITY', 'DJD', 'DKD', '', '2023-01-30 10:33:20', 0),
(20, 'CHELSEA', 'CHL', 'SJSJ', 'SJSJ', '', '2023-01-30 10:33:48', 0),
(21, 'TOTTENHAM HOTSPUR', 'TOT', 'JJFJ', 'JDD', '', '2023-01-30 10:34:17', 0),
(22, 'LEICESTER CITY', 'LEI', 'CHJ', 'DJD', '', '2023-01-30 10:34:42', 0),
(23, 'ASTON VILLA', 'AST', 'DHDHD', 'DO', '', '2023-01-30 10:35:01', 0),
(24, 'NEWCASTLE UNITED', 'NEW', '9DI', 'SKKSKS', '', '2023-01-30 10:35:29', 0),
(25, 'EVERTON', 'EVE', 'CCCC', 'CJJ', '', '2023-01-30 10:36:08', 0),
(26, 'LEEDS UNITED', 'LEE', 'LEE', 'LEE', '', '2023-01-30 10:36:37', 0),
(27, 'SOUTHAMPTON', 'SOU', 'SOU', 'SOU', '', '2023-01-30 10:36:58', 0),
(28, 'CRYSTAL PALACE', 'CRY', 'CRY', 'CRY', '', '2023-01-30 10:37:23', 0),
(29, 'WEST HAM UNITED', 'WHU', 'WHU', 'WHU', '', '2023-01-30 10:37:45', 0),
(30, 'WOLVERHAMPTON WANDERS', 'WHW', 'WHW', 'WHW', '', '2023-01-30 10:38:30', 0),
(31, 'NORWICH CITY', 'NOR', 'NOR', 'NOR', '', '2023-01-30 10:38:58', 0),
(32, 'BURNLEY', 'BUR', 'BUR', 'BUR', '', '2023-01-30 10:39:16', 0),
(33, 'WATFORD', 'WAT', 'WAT', 'WAT', '', '2023-01-30 10:39:36', 0),
(34, 'BRIGHTON & HOVE ALBION', 'BRI', 'BRI', 'BRI', '', '2023-01-30 10:40:10', 0),
(35, 'BRENTFORD', 'BRE', 'BRE', 'BRE', '', '2023-01-30 10:40:41', 0),
(36, 'FULHAM', 'FUL', 'FUL', 'FUL', '', '2023-01-30 10:41:04', 0),
(37, 'SHEFFIELD UNITED', 'SHU', 'SHU', 'SHU', '', '2023-01-30 10:41:29', 0),
(38, 'AFC BOURNMOUTH', 'BOU', 'BOU', 'BOU', '', '2023-01-30 10:42:29', 0),
(39, 'NOTTINGHAM FOREST', 'NFO', 'NFO', 'NFO', '', '2023-01-30 10:45:41', 0);

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
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `matchday`
--
ALTER TABLE `matchday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `stadiums`
--
ALTER TABLE `stadiums`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `weather`
--
ALTER TABLE `weather`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
