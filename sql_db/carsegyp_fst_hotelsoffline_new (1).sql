-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2021 at 09:08 PM
-- Server version: 10.2.41-MariaDB-cll-lve
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carsegyp_fst_hotelsoffline_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(100) NOT NULL,
  `room_amenities` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `display` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `room_amenities`, `display`) VALUES
(1, 'firewall', 0),
(2, 'router', 0),
(3, 'cables', 0),
(12, 'room service', 0),
(13, 'agile', 0),
(15, 'Jacuzzi', 0),
(16, 'hot tub', 0),
(17, 'Wifi', 0),
(18, 'complementary breakfast', 1),
(19, 'road', 0),
(20, 'Roomba', 0),
(21, 'golden', 0),
(22, 'ja', 0),
(23, 'pool', 0),
(24, 'Hot &amp; Cold bath', 1),
(25, 'Cable', 1),
(26, 'Free WiFi', 1),
(27, 'Continental Breakfast', 1),
(28, 'Free Massages', 1),
(29, 'Bungalow', 1);

-- --------------------------------------------------------

--
-- Table structure for table `apptoken_tb`
--

CREATE TABLE `apptoken_tb` (
  `id` int(255) NOT NULL,
  `token` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `platform` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'web, android, ios...',
  `timestamp` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `apptoken_tb`
--

INSERT INTO `apptoken_tb` (`id`, `token`, `platform`, `timestamp`) VALUES
(1, 'HB2JHK342', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `business_creds`
--

CREATE TABLE `business_creds` (
  `id` int(255) NOT NULL,
  `usertoken` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `business_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `business_logo` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `business_license` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `business_owner_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `timestamp` int(255) NOT NULL DEFAULT 0,
  `display` int(100) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_creds`
--

INSERT INTO `business_creds` (`id`, `usertoken`, `business_name`, `business_logo`, `business_license`, `business_owner_id`, `timestamp`, `display`) VALUES
(1, 'T9I1OJTKV1', 'Black Mafia Empire', '0', '0', '0', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `contract_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hoteltoken` int(100) NOT NULL,
  `roomtoken` int(100) NOT NULL,
  `room_desc` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `dmctoken` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_owner` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `account_owner` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `hotelname` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_desc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `room_name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `availnum` int(255) NOT NULL COMMENT 'available rooms',
  `price` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` int(100) NOT NULL,
  `exp_date` int(200) NOT NULL,
  `status` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `child_age_from` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `child_age_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `occupy_min` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `occupy_max` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `occupy_min_child` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `occupy_max_child` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `release_date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `breakfast_adult` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `breakfast_child` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `half_bar_adult` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `half_bar_child` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `full_bar_adult` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `full_bar_child` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `soft_all_incl_adult` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `soft_all_incl_child` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `all_incl_adult` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `all_incl_child` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ultra_all_incl_adult` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ultra_all_incl_child` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cancel_days` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `cancel_penalty` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(255) NOT NULL,
  `meals_start` int(100) NOT NULL,
  `meals_end` int(100) NOT NULL,
  `cancel_start` int(100) NOT NULL,
  `cancel_end` int(100) NOT NULL,
  `display` int(100) NOT NULL DEFAULT 1,
  `confirm` int(10) NOT NULL DEFAULT 0,
  `rooms_only_child` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rooms_only_adult` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link4` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `link5` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stay_from` int(100) NOT NULL,
  `stay_to` int(100) NOT NULL,
  `booking_from` int(100) NOT NULL,
  `booking_to` int(100) NOT NULL,
  `discount_amount` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `discount_rate` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'discount percentage',
  `source_market` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `offer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `business_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `room` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price_sgl` int(100) NOT NULL,
  `price_dbl` int(100) NOT NULL,
  `price_trl` int(100) NOT NULL,
  `price_qud` int(100) NOT NULL COMMENT 'aka quad',
  `price_chd1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price_chd2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `invt_room` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `invt_rel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subscription` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `service` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sup_stay_from` int(100) NOT NULL,
  `sup_stay_to` int(100) NOT NULL,
  `price_child` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price_adult` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sup_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `offer_order` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cancel_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `relay1` int(2) NOT NULL DEFAULT 0 COMMENT 'to identify new contracts from the calendar',
  `relay2` int(2) NOT NULL DEFAULT 0 COMMENT 'to identify old contract affected by the calendar',
  `relay_id` int(100) NOT NULL DEFAULT 0 COMMENT 'to store the identity of an affected contract',
  `unit1` int(100) NOT NULL,
  `unit2` int(100) NOT NULL,
  `room_category` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `contract_name`, `token`, `hoteltoken`, `roomtoken`, `room_desc`, `dmctoken`, `hotel_owner`, `account_owner`, `hotelname`, `hotel_desc`, `room_name`, `availnum`, `price`, `start_date`, `exp_date`, `status`, `child_age_from`, `child_age_to`, `currency`, `occupy_min`, `occupy_max`, `occupy_min_child`, `occupy_max_child`, `release_date`, `breakfast_adult`, `breakfast_child`, `half_bar_adult`, `half_bar_child`, `full_bar_adult`, `full_bar_child`, `soft_all_incl_adult`, `soft_all_incl_child`, `all_incl_adult`, `all_incl_child`, `ultra_all_incl_adult`, `ultra_all_incl_child`, `cancel_days`, `cancel_penalty`, `timestamp`, `meals_start`, `meals_end`, `cancel_start`, `cancel_end`, `display`, `confirm`, `rooms_only_child`, `rooms_only_adult`, `link1`, `link2`, `link3`, `link4`, `link5`, `stay_from`, `stay_to`, `booking_from`, `booking_to`, `discount_amount`, `discount_rate`, `source_market`, `offer`, `business_name`, `city`, `country`, `room`, `price_sgl`, `price_dbl`, `price_trl`, `price_qud`, `price_chd1`, `price_chd2`, `invt_room`, `invt_rel`, `subscription`, `service`, `sup_stay_from`, `sup_stay_to`, `price_child`, `price_adult`, `sup_type`, `offer_order`, `cancel_type`, `relay1`, `relay2`, `relay_id`, `unit1`, `unit2`, `room_category`) VALUES
(14646, 'Timothy', 'IVRH8B6XI3', 944260, 13215112, '', 'CSIC9MIPN1', '0', 'B9WYP1T4PM', 'HILTON NEW TEST', 'This is a test hotel account', 'GRDEN', 0, '', 1638313200, 1638918000, 'live', '1', '3', 'USD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1638372802, 0, 0, 0, 0, 1, 1, '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', 1, 0, 0, 1, 'undefined', 'undefined', 'undefined', 'undefined', '', '', 0, 0, '', '', '', '', '', 0, 0, 0, 0, 1, 'park view'),
(14647, 'Timothy', 'IVRH8B6XI3', 944260, 65314314, '', 'CSIC9MIPN1', '0', 'B9WYP1T4PM', 'HILTON NEW TEST', 'This is a test hotel account', 'STANDARD ROOM', 0, '', 1638313200, 1638918000, 'live', '1', '3', 'USD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1638372803, 0, 0, 0, 0, 1, 1, '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', '', '', '', '', 0, 1, 6, 0, 'undefined', 'undefined', 'undefined', 'undefined', '', '', 0, 0, '', '', '', '', '', 0, 0, 0, 1, 0, 'Standard'),
(14648, 'rudd', '3I3D2HLQ8P', 971948, 60736542, 'nice', 'T9I1OJTKV1', '0', 'FKLI1RFRGO', 'King&#39;s Royal', 'Nice', 'Supra', 0, '', 1638486000, 1638658800, 'live', '1', '11', 'USD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1638414210, 0, 0, 0, 0, 1, 1, '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', 'Black Mafia Empire', 'toronto', 'canada', '', 11, 0, 0, 0, 'undefined', 'undefined', 'undefined', 'undefined', '', '', 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 'park view'),
(14649, 'rudd', '3I3D2HLQ8P', 971948, 64728062, 'Nice', 'T9I1OJTKV1', '0', 'FKLI1RFRGO', 'King&#39;s Royal', 'Nice', 'SL55', 0, '', 1638486000, 1638658800, 'live', '1', '11', 'USD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1638414212, 0, 0, 0, 0, 1, 1, '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', 'Black Mafia Empire', 'toronto', 'canada', '', 12, 0, 0, 0, 'undefined', 'undefined', 'undefined', 'undefined', '', '', 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 'park view'),
(14650, 'rudd', '3I3D2HLQ8P', 971948, 72021055, 'Smooth', 'T9I1OJTKV1', '0', 'FKLI1RFRGO', 'King&#39;s Royal', 'Nice', 'BMW M3', 0, '', 1638486000, 1638658800, 'live', '1', '11', 'USD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1638414215, 0, 0, 0, 0, 1, 1, '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', 'Black Mafia Empire', 'toronto', 'canada', '', 13, 0, 0, 0, 'undefined', 'undefined', 'undefined', 'undefined', '', '', 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 'Suite'),
(14651, 'rudd', '3I3D2HLQ8P', 971948, 65354797, 'Comfortable', 'T9I1OJTKV1', '0', 'FKLI1RFRGO', 'King&#39;s Royal', 'Nice', 'Deluxe', 0, '', 1638486000, 1638658800, 'live', '1', '11', 'USD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1638414219, 0, 0, 0, 0, 1, 1, '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', 'Black Mafia Empire', 'toronto', 'canada', '', 14, 0, 0, 0, 'undefined', 'undefined', 'undefined', 'undefined', '', '', 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 'Standard'),
(14652, 'rudd', '3I3D2HLQ8P', 971948, 5620799, 'nice', 'T9I1OJTKV1', '0', 'FKLI1RFRGO', 'King&#39;s Royal', 'Nice', 'New', 0, '', 1638486000, 1638658800, 'live', '1', '11', 'USD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1638414222, 0, 0, 0, 0, 1, 1, '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', 'Black Mafia Empire', 'toronto', 'canada', '', 15, 0, 0, 0, 'undefined', 'undefined', 'undefined', 'undefined', '', '', 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 'Seaside'),
(14653, 'rudd', '3I3D2HLQ8P', 971948, 9665184, '', 'T9I1OJTKV1', '0', 'FKLI1RFRGO', 'King&#39;s Royal', 'Nice', 'Another', 0, '', 1638486000, 1638658800, 'live', '1', '11', 'USD', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1638414225, 0, 0, 0, 0, 1, 1, '', '', '', '', '', '', '', 0, 0, 0, 0, '', '', '', '', 'Black Mafia Empire', 'toronto', 'canada', '', 16, 0, 0, 0, 'undefined', 'undefined', 'undefined', 'undefined', '', '', 0, 0, '', '', '', '', '', 0, 0, 0, 0, 0, 'Seaside');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` int(225) NOT NULL,
  `currency` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `symbol` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `timestamp` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(255) NOT NULL,
  `token` int(100) NOT NULL DEFAULT 0,
  `hotelname` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `account_owner` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `dmctoken` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `hotel_owner` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `location` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `timestamp` int(255) NOT NULL DEFAULT 0,
  `latitude` int(255) NOT NULL DEFAULT 0 COMMENT 'hotel location',
  `longitude` int(255) NOT NULL DEFAULT 0,
  `display` int(100) NOT NULL DEFAULT 1,
  `cover_image` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `token`, `hotelname`, `description`, `account_owner`, `dmctoken`, `hotel_owner`, `location`, `timestamp`, `latitude`, `longitude`, `display`, `cover_image`) VALUES
(98, 759865, 'Radisson blue', 'Radisson blue', 'B9WYP1T4PM', 'CSIC9MIPN1', 'FSUVP6E5RX', 'Ibadan Nigeria', 1635423336, 0, 0, 1, '0'),
(105, 492341, 'Reddingtyy blue', 'Radisson blue', 'B9WYP1T4PM', '0', '0', 'Ibadan Nigeria', 1635439922, 0, 0, 0, '0'),
(106, 317127, 'Classicus Inn', 'Classicus Inn', 'B9WYP1T4PM', '0', '0', 'Ibadan Nigeria', 1635515086, 0, 0, 1, '0'),
(107, 971948, 'King&#39;s Royal', 'Nice', 'FKLI1RFRGO', 'T9I1OJTKV1', '0', 'Ibadan', 1635517772, 0, 0, 1, '0'),
(108, 472941, 'DELUXEE', 'Nice', 'FKLI1RFRGO', '0', '0', 'NIGERIA', 1638026617, 0, 0, 1, '0'),
(109, 944260, 'HILTON NEW TEST', 'This is a test hotel account', 'B9WYP1T4PM', 'CSIC9MIPN1', '0', 'DUBAI', 1638173574, 0, 0, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_rooms`
--

CREATE TABLE `hotel_rooms` (
  `id` int(255) NOT NULL,
  `hotelid` int(100) NOT NULL DEFAULT 0,
  `room_id` int(100) NOT NULL DEFAULT 0,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `room_description` longtext COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `availnum` int(255) NOT NULL DEFAULT 0 COMMENT 'available rooms',
  `price` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'hotel room price',
  `account_owner` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `dmc` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `hotel_owner` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `display` int(100) NOT NULL DEFAULT 1,
  `timestamp` int(255) NOT NULL DEFAULT 0,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `dbl` int(100) NOT NULL DEFAULT 0,
  `sgl` int(100) NOT NULL DEFAULT 0,
  `trpl` int(100) NOT NULL DEFAULT 0,
  `quad` int(100) NOT NULL DEFAULT 0,
  `room_size` int(100) NOT NULL,
  `max_child` int(10) NOT NULL DEFAULT 0,
  `min_adult` int(10) NOT NULL DEFAULT 0,
  `max_adult` int(10) NOT NULL DEFAULT 0,
  `max_total` int(10) NOT NULL DEFAULT 0,
  `bed_number` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_rooms`
--

INSERT INTO `hotel_rooms` (`id`, `hotelid`, `room_id`, `name`, `room_description`, `availnum`, `price`, `account_owner`, `dmc`, `hotel_owner`, `display`, `timestamp`, `image`, `category`, `dbl`, `sgl`, `trpl`, `quad`, `room_size`, `max_child`, `min_adult`, `max_adult`, `max_total`, `bed_number`) VALUES
(119, 759865, 31047155, 'Special', 'Testing', 11, '0', 'B9WYP1T4PM', '0', 'FSUVP6E5RX', 1, 1635516172, '0', 'Seaside', 1, 1, 1, 1, 10, 2, 1, 5, 0, 2),
(120, 759865, 6053608, 'Executive', 'test', 12, '0', 'B9WYP1T4PM', '0', 'FSUVP6E5RX', 1, 1635516615, '0', 'park view', 1, 1, 1, 1, 12, 1, 1, 3, 0, 2),
(121, 971948, 60736542, 'Supra', 'nice', 15, '0', 'FKLI1RFRGO', '0', '0', 1, 1635517786, 'api.test.hotelsoffline.com/uploads/hotelsoffline-1635518890.jpeg', 'park view', 1, 1, 0, 0, 32, 1, 1, 1, 0, 1),
(122, 971948, 64728062, 'SL55', 'Nice', 1, '0', 'FKLI1RFRGO', '0', '0', 1, 1635876772, '0', 'park view', 1, 1, 1, 1, 1, 1, 1, 1, 0, 1),
(123, 971948, 72021055, 'BMW M3', 'Smooth', 0, '0', 'FKLI1RFRGO', '0', '0', 1, 1636172876, '0', 'Suite', 1, 0, 1, 0, 3, 3, 1, 3, 0, 5),
(124, 759865, 40405945, '0', '0', 0, '0', 'B9WYP1T4PM', '0', 'FSUVP6E5RX', 1, 1637540696, '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(125, 971948, 65354797, 'Deluxe', 'Comfortable', 3, '0', 'FKLI1RFRGO', '0', '0', 1, 1637924143, '0', 'Standard', 1, 1, 1, 1, 22, 2, 1, 3, 0, 5),
(126, 971948, 5620799, 'New', 'nice', 2, '0', 'FKLI1RFRGO', '0', '0', 1, 1637924230, '0', 'Seaside', 0, 0, 0, 1, 8, 2, 2, 2, 0, 2),
(127, 971948, 9665184, 'Another', '', 2, '0', 'FKLI1RFRGO', '0', '0', 1, 1637924782, '0', 'Seaside', 0, 1, 0, 0, 33, 3, 3, 3, 0, 3),
(128, 759865, 28672667, '0', '0', 0, '0', 'B9WYP1T4PM', '0', 'FSUVP6E5RX', 1, 1638111712, '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(129, 759865, 88581616, '0', '0', 0, '0', 'B9WYP1T4PM', '0', 'FSUVP6E5RX', 1, 1638111780, '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(130, 759865, 31262162, '0', '0', 0, '0', 'B9WYP1T4PM', '0', 'FSUVP6E5RX', 1, 1638173603, '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(131, 944260, 13215112, 'GRDEN', '', 30, '0', 'B9WYP1T4PM', '0', '0', 1, 1638173657, '0', 'park view', 1, 1, 0, 0, 29, 1, 1, 2, 0, 1),
(132, 944260, 84861187, '0', '0', 0, '0', 'B9WYP1T4PM', '0', '0', 1, 1638173951, '0', '0', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(133, 944260, 65314314, 'STANDARD ROOM', '', 30, '0', 'B9WYP1T4PM', '0', '0', 1, 1638173962, '0', 'Standard', 1, 1, 0, 0, 26, 2, 1, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(255) NOT NULL,
  `oid` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'The Hotel Token, Room ID or any ID of the owner of the image',
  `filepath` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `timestamp` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `init_contract`
--

CREATE TABLE `init_contract` (
  `id` int(100) NOT NULL,
  `token` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `hoteltoken` int(100) NOT NULL DEFAULT 0,
  `dmctoken` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `timestamp` int(200) NOT NULL DEFAULT 0,
  `hotelname` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `display` int(10) NOT NULL DEFAULT 1,
  `contract_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `child_age_from` int(100) NOT NULL DEFAULT 0,
  `child_age_to` int(100) NOT NULL DEFAULT 0,
  `currency` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `init_contract`
--

INSERT INTO `init_contract` (`id`, `token`, `hoteltoken`, `dmctoken`, `timestamp`, `hotelname`, `country`, `city`, `display`, `contract_name`, `status`, `child_age_from`, `child_age_to`, `currency`) VALUES
(1719, 'IVRH8B6XI3', 944260, 'CSIC9MIPN1', 1638372747, 'HILTON NEW TEST', '', '', 1, '0', '0', 0, 0, '0'),
(1720, 'D4L1HYC92E', 944260, 'CSIC9MIPN1', 1638381927, 'HILTON NEW TEST', '', '', 1, '0', '0', 0, 0, '0'),
(1721, '3I3D2HLQ8P', 971948, 'T9I1OJTKV1', 1638414176, 'King&#39;s Royal', 'canada', 'toronto', 1, '0', '0', 0, 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `mail_tb`
--

CREATE TABLE `mail_tb` (
  `id` int(255) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `subject` longtext COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `sent` int(255) NOT NULL DEFAULT 0,
  `sent_timestamp` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mail_tb`
--

INSERT INTO `mail_tb` (`id`, `name`, `mail`, `subject`, `body`, `timestamp`, `sent`, `sent_timestamp`) VALUES
(6, '0', 'akinmosinolawande@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi ,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>067J396O5I</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/067J396O5I to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1626820875', 1, 1626828608),
(7, '0', 'akinmosinolawande@gmail.com', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1626820906', 1, 1626828608),
(8, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1626820953', 1, 1626898417),
(9, 'Tim', 'ayodeletim@gmail.com', 'test', 'test', '0', 1, 1626863252),
(10, 'MoreTims', 'moretimsltd@gmail.com', 'Test', 'Test', '0', 1, 1626863252),
(11, 'FST', 'fireswitchtech@gmail.com', 'Test', 'Test', '0', 1, 1626863252),
(12, '0', 'olsam@mail.com', 'Your new Account at HotelsOffline', '\n        Hi ,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>DU9TYMMYN9</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/DU9TYMMYN9 to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1626843492', 1, 1626843492),
(13, '0', 'olawandesamuel@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi ,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>FYH7GRV71X</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/FYH7GRV71X to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1626843658', 1, 1626898415),
(14, '0', 'samueldacoal@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi ,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>JB0364H3PJ</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/JB0364H3PJ to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1626845046', 1, 1626898412),
(15, '0', 'admin@servapp.shop', 'Your new Account at HotelsOffline', '\n        Hi ,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>QA0MR5D948</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/QA0MR5D948 to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1626853147', 1, 1626853147),
(16, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1626853184', 1, 1626853184),
(17, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1626855685', 1, 1626855685),
(18, '0', 'ayodeletim@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi ,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>PRB2Z6VXNP</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/PRB2Z6VXNP to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1626859353', 1, 1626897427),
(19, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1626859376', 1, 1626897240),
(20, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1626860461', 1, 1626897170),
(21, '0', 'david.akokodaripon@take.net', 'Your new Account at HotelsOffline', '\n        Hi DAVID,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>Z2F97CTVW2</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/Z2F97CTVW2 to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1626865191', 1, 1626898408),
(22, '0', 'david.akokodaripon@take.net', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1626865775', 1, 1626898403),
(23, '0', 'david.akokodaripon@take.net', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1626865780', 1, 1626898388),
(24, '0', 'david.akokodaripon@takenet', 'Your new Account at HotelsOffline', '\n        Hi David,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>89Y5JO1YDG</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/89Y5JO1YDG to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1626866295', 0, 1635854227),
(25, '0', 'akinOlawande@mail.com', 'Your new Account at HotelsOffline', '\n        Hi Olawande,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>L7AYOVLTCT</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/L7AYOVLTCT to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1626875808', 1, 1626875808),
(26, '0', 'akinmosinolawande@gmail.com', 'Password reset at HotelsOffline', '\n        Your password has been reset to <b>1626878823</b><br /><br />\n  Warm regards, <br/><br/>\n<br /><br />\n        Stay safe\n        ', '1626878823', 1, 1626878823),
(27, '0', 'olawandesamuel@gmail.com', 'Password reset at HotelsOffline', '\n        Your password has been reset to <b>1626878915</b><br /><br />\n  Warm regards, <br/><br/>\n<br /><br />\n        Stay safe\n        ', '1626878915', 1, 1626878915),
(28, '0', 'samueldacoal@gmail.com', 'Password reset at HotelsOffline', '\n        Your password has been reset to <b>1626878935</b><br /><br />\n  Warm regards, <br/><br/>\n<br /><br />\n        Stay safe\n        ', '1626878935', 1, 1626878935),
(29, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1626883517', 1, 1626883517),
(30, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1626904134', 1, 1626904134),
(31, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1626904146', 1, 1626904146),
(32, '0', 'ayodeletim@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi Timothy,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>G75DY8M1VK</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/G75DY8M1VK to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1626966794', 1, 1626966794),
(33, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1626967029', 1, 1626967029),
(34, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1626976365', 1, 1626976365),
(35, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627024946', 1, 1627024946),
(36, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627059442', 1, 1627059442),
(37, '0', 'david.akokodaripon@take.net', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627092561', 1, 1627092561),
(38, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627113315', 1, 1627113315),
(39, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627137556', 1, 1627137556),
(40, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627224512', 1, 1627224512),
(41, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627370992', 1, 1627370992),
(42, '0', 'dacoaliesamuel@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi Ola,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>RJ9UWVWPO1</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/RJ9UWVWPO1 to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1627396467', 1, 1627396467),
(43, '0', 'dacoaliesamuel@gmail.com', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1627396888', 1, 1627396888),
(44, '0', 'dacoaliesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627396910', 1, 1627396910),
(45, '0', 'dacoaliesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627540278', 1, 1627540278),
(46, '0', 'akinmosinolawande@yahoo.com', 'Your new Account at HotelsOffline', '\n        Hi Ola,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>QDJ43KMZ5P</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/QDJ43KMZ5P to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1627540901', 1, 1627540901),
(47, '0', 'akinmosinolawande@yahoo.com', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1627541061', 1, 1627541061),
(48, '0', 'akinmosinolawande@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627541090', 1, 1627541090),
(49, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627564043', 1, 1627564043),
(50, '0', 'david.akokodaripon@take.net', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627678059', 1, 1627678059),
(51, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627728621', 1, 1627728621),
(52, '0', 'david.akokodaripon@take.net', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627776455', 1, 1627776455),
(53, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627902437', 1, 1627902437),
(54, '0', 'cmd@expertcaredmcc.com', 'Your new Account at HotelsOffline', '\n        Hi Ahmed,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>7KU2WP9TDA</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/7KU2WP9TDA to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1627902563', 1, 1627902563),
(55, '0', 'cmd@expertcaredmcc.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627904921', 1, 1627904921),
(56, '0', 'super.guide@yahoo.com', 'Your new Account at HotelsOffline', '\n        Hi Ahmed,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>8TB2UQTCOE</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/8TB2UQTCOE to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1627906919', 1, 1627906919),
(57, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627906933', 1, 1627906933),
(58, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627910847', 1, 1627910847),
(59, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627910957', 1, 1627910957),
(60, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627910971', 1, 1627910971),
(61, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627911125', 1, 1627911125),
(62, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627911145', 1, 1627911145),
(63, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1627911232', 1, 1627911232),
(64, '0', 'david.akokodaripon@take.net', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628071614', 1, 1628071614),
(65, '0', 'david.akokodaripon@take.net', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628071925', 1, 1628071925),
(66, '0', 'david.akokodaripon@take.net', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628071966', 1, 1628071966),
(67, '0', 'daveakokodaripon@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi David,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>PMWOABYP8D</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/PMWOABYP8D to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628072315', 1, 1628072315),
(68, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628072326', 1, 1628072326),
(69, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628073531', 1, 1628073531),
(70, '0', 'olawandesamuel@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi Olawande,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>FKLI1RFRGO</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/FKLI1RFRGO to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628074548', 1, 1628074548),
(71, '0', 'olawandesamuel@gmail.com', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628074799', 1, 1628074799),
(72, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628074847', 1, 1628074847),
(73, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628076399', 1, 1628076399),
(74, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628157887', 1, 1628157887),
(75, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628257734', 1, 1628257734),
(76, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628263985', 1, 1628263985),
(77, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628287123', 1, 1628287123),
(78, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628305025', 1, 1628305025),
(79, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628306975', 1, 1628306975),
(80, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628307006', 1, 1628307006),
(81, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628307040', 1, 1628307040),
(82, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628347340', 1, 1628347340),
(83, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628347378', 1, 1628347378),
(84, '0', 'akinmosinolawande@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi Olawande,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>MZ9J4GRI86</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/MZ9J4GRI86 to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628357604', 1, 1628357604),
(85, '0', 'akinmosinolawande@gmail.com', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628357821', 1, 1628357821),
(86, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628357858', 1, 1628357858),
(87, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628359076', 1, 1628359076),
(88, '0', 'samueldacoal@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi Olawande,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>T9I1OJTKV1</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/T9I1OJTKV1 to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628361093', 1, 1628361093),
(89, '0', 'samueldacoal@gmail.com', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628361223', 1, 1628361223),
(90, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628361253', 1, 1628361253),
(91, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628361324', 1, 1628361324),
(92, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628448228', 1, 1628448228),
(93, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628455498', 1, 1628455498),
(94, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628455605', 1, 1628455605),
(95, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628455825', 1, 1628455825),
(96, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628511275', 1, 1628511275),
(97, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628511324', 1, 1628511324),
(98, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628511347', 1, 1628511347),
(99, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628520532', 1, 1628520532),
(100, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628593401', 1, 1628593401),
(101, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628641704', 1, 1628641704),
(102, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628682617', 1, 1628682617),
(103, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628699516', 1, 1628699516),
(104, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628718299', 1, 1628718299),
(105, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628764721', 1, 1628764721),
(106, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628765018', 1, 1628765018),
(107, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628765989', 1, 1628765989),
(108, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628767620', 1, 1628767620),
(109, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628772972', 1, 1628772972),
(110, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628777119', 1, 1628777119),
(111, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628778021', 1, 1628778021),
(112, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628778665', 1, 1628778665),
(113, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628790200', 1, 1628790200),
(114, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628790234', 1, 1628790234),
(115, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628790295', 1, 1628790295),
(116, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628790866', 1, 1628790866),
(117, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628790930', 1, 1628790930),
(118, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628804091', 1, 1628804091),
(119, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628845730', 1, 1628845730),
(120, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628846067', 1, 1628846067),
(121, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628846380', 1, 1628846380),
(122, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628846476', 1, 1628846476),
(123, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628848903', 1, 1628848903),
(124, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628848966', 1, 1628848966),
(125, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628849090', 1, 1628849090),
(126, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628849098', 1, 1628849098),
(127, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628849118', 1, 1628849118),
(128, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628849242', 1, 1628849242),
(129, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628851205', 1, 1628851205),
(130, '0', 'david.akokodaripon@take.net', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628851233', 1, 1628851233),
(131, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628851575', 1, 1628851575),
(132, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628851605', 1, 1628851605),
(133, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628851644', 1, 1628851644),
(134, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628852089', 1, 1628852089),
(135, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628852370', 1, 1628852370),
(136, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628852525', 1, 1628852525),
(137, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628852619', 1, 1628852619),
(138, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628852632', 1, 1628852632),
(139, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628853269', 1, 1628853269),
(140, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628853308', 1, 1628853308),
(141, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628853369', 1, 1628853369),
(142, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628853445', 1, 1628853445),
(143, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628864406', 1, 1628864406),
(144, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628866684', 1, 1628866684),
(145, '0', 'admin@pcr-dubai.com', 'Your new Account at HotelsOffline', '\n        Hi Account,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>D4QM0WR4U4</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/D4QM0WR4U4 to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628866786', 1, 1628866786),
(146, '0', 'ayodeletim@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi Timothy,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>B9WYP1T4PM</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/B9WYP1T4PM to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628870553', 1, 1628870553),
(147, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your new Account at HotelsOffline', '\n        Hi Big,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>7ZNQ05CN5V</b>.<br/>\n  Click https://test.hotelsoffline.com/activate/7ZNQ05CN5V to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628876261', 1, 1628876261),
(148, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628876654', 1, 1628876654),
(149, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628876726', 1, 1628876726),
(150, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628877401', 1, 1628877401),
(151, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628877426', 1, 1628877426),
(152, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628877434', 1, 1628877434),
(153, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628877444', 1, 1628877444),
(154, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628877444', 1, 1628877444),
(155, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628877459', 1, 1628877459),
(156, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628877479', 1, 1628877479),
(157, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628877479', 1, 1628877479),
(158, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628877490', 1, 1628877490),
(159, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628877503', 1, 1628877503),
(160, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628877536', 1, 1628877536),
(161, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628877614', 1, 1628877614),
(162, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628877868', 1, 1628877868),
(163, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628877889', 1, 1628877889),
(164, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628878020', 1, 1628878020),
(165, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628878042', 1, 1628878042),
(166, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628878101', 1, 1628878101),
(167, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628878106', 1, 1628878106);
INSERT INTO `mail_tb` (`id`, `name`, `mail`, `subject`, `body`, `timestamp`, `sent`, `sent_timestamp`) VALUES
(168, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628902800', 1, 1628902800),
(169, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628931772', 1, 1628931772),
(170, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628931819', 1, 1628931819),
(171, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628969247', 1, 1628969247),
(172, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628969477', 1, 1628969477),
(173, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628969966', 1, 1628969966),
(174, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628970346', 1, 1628970346),
(175, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628971029', 1, 1628971029),
(176, '0', 'sakinmosin621@stu.ui.edu.ng', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628971155', 1, 1628971155),
(177, '0', '', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628971186', 0, 0),
(178, '0', '', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628971209', 0, 0),
(179, '0', '', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628971369', 0, 0),
(180, '0', '', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1628971942', 0, 0),
(181, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628993649', 1, 1628993649),
(182, '0', 'daveakokodaripon@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1628993707', 1, 1628993707),
(183, '0', 'admin@pcr-dubai.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629006769', 1, 1629006769),
(184, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629006818', 1, 1629006818),
(185, '0', 'admin@pcr-dubai.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629074848', 1, 1629074848),
(186, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629076008', 1, 1629076008),
(187, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629076040', 1, 1629076040),
(188, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629114597', 1, 1629114597),
(189, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629133004', 1, 1629133004),
(190, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629139185', 1, 1629139185),
(191, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629160130', 1, 1629160130),
(192, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629179262', 1, 1629179262),
(193, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629183241', 1, 1629183241),
(194, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629189658', 1, 1629189658),
(195, '0', 'admin@servapp.shop', 'Your new Account at HotelsOffline', '\n        Hi test,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>KXCW00UO7N</b>.<br/>\n  Click http://test.hotelsoffline.com/activate/KXCW00UO7N to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1629204244', 1, 1629204244),
(196, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629204254', 1, 1629204254),
(197, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629208860', 1, 1629208860),
(198, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629217512', 1, 1629217512),
(199, '0', 'admin@servapp.shop', 'Your new Account at HotelsOffline', '\n        Hi Ahmed,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>EQ7K5ERHUV</b>.<br/>\n  Click http://test.hotelsoffline.com/activate/EQ7K5ERHUV to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1629217611', 1, 1629217611),
(200, '0', 'admin@servapp.shop', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1629217630', 1, 1629217630),
(201, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629217657', 1, 1629217657),
(202, '0', 'davidakokoadedayo@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi David,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>71HTCPXGRN</b>.<br/>\n  Click http://test.hotelsoffline.com/activate/71HTCPXGRN to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1629245655', 1, 1629245655),
(203, '0', 'davidakokoadedayo@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629245669', 1, 1629245669),
(204, '0', 'davidakokoadedayo@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629245690', 1, 1629245690),
(205, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629247874', 1, 1629247874),
(206, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629268329', 1, 1629268329),
(207, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629282107', 1, 1629282107),
(208, '0', 'fireswitchtech@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi FireSwitch,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>CSIC9MIPN1</b>.<br/>\n  Click http://test.hotelsoffline.com/activate/CSIC9MIPN1 to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1629284108', 1, 1629284108),
(209, '0', 'fireswitchtech@gmail.com', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1629284153', 1, 1629284153),
(210, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629284169', 1, 1629284169),
(211, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629286060', 1, 1629286060),
(212, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629288348', 1, 1629288348),
(213, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629290801', 1, 1629290801),
(214, '0', 'davidakokoadedayo@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629291124', 1, 1629291124),
(215, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629291199', 1, 1629291199),
(216, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629291284', 1, 1629291284),
(217, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629291558', 1, 1629291558),
(218, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629291662', 1, 1629291662),
(219, '0', 'shedahouse@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi Sheda,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>FSUVP6E5RX</b>.<br/>\n  Click http://test.hotelsoffline.com/activate/FSUVP6E5RX to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1629291855', 1, 1629291855),
(220, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629291924', 1, 1629291924),
(221, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629291950', 1, 1629291950),
(222, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629291959', 1, 1629291959),
(223, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629291984', 1, 1629291984),
(224, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629292005', 1, 1629292005),
(225, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629292026', 1, 1629292026),
(226, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629292216', 1, 1629292216),
(227, '0', 'fireswitchtech@gmail.com', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1629293467', 1, 1629293467),
(228, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629294110', 1, 1629294110),
(229, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629294697', 1, 1629294697),
(230, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629294728', 1, 1629294728),
(231, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629303388', 1, 1629303388),
(232, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629307625', 1, 1629307625),
(233, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629370375', 1, 1629370375),
(234, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629379056', 1, 1629379056),
(235, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629393237', 1, 1629393237),
(236, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629445355', 1, 1629445355),
(237, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629457133', 1, 1629457133),
(238, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629457154', 1, 1629457154),
(239, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629457278', 1, 1629457278),
(240, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629460174', 1, 1629460174),
(241, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629465811', 1, 1629465811),
(242, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629476968', 1, 1629476968),
(243, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629522584', 1, 1629522584),
(244, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629529478', 1, 1629529478),
(245, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629560122', 1, 1629560122),
(246, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629574355', 1, 1629574355),
(247, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629577883', 1, 1629577883),
(248, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629578567', 1, 1629578567),
(249, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629579392', 1, 1629579392),
(250, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629579456', 1, 1629579456),
(251, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629579533', 1, 1629579533),
(252, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629579694', 1, 1629579694),
(253, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629579719', 1, 1629579719),
(254, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629579820', 1, 1629579820),
(255, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629625415', 1, 1629625415),
(256, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629630115', 1, 1629630115),
(257, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629631530', 1, 1629631530),
(258, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629635018', 1, 1629635018),
(259, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629645530', 1, 1629645530),
(260, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629647723', 1, 1629647723),
(261, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629660338', 1, 1629660338),
(262, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629660430', 1, 1629660430),
(263, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629669963', 1, 1629669963),
(264, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629673769', 1, 1629673769),
(265, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629677747', 1, 1629677747),
(266, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629699408', 1, 1629699408),
(267, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629707441', 1, 1629707441),
(268, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629717923', 1, 1629717923),
(269, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629721377', 1, 1629721377),
(270, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629723198', 1, 1629723198),
(271, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629724367', 1, 1629724367),
(272, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629726830', 1, 1629726830),
(273, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629727132', 1, 1629727132),
(274, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629728002', 1, 1629728002),
(275, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629731301', 1, 1629731301),
(276, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629732160', 1, 1629732160),
(277, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629735566', 1, 1629735566),
(278, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629735722', 1, 1629735722),
(279, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629743473', 1, 1629743473),
(280, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629751515', 1, 1629751515),
(281, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629751538', 1, 1629751538),
(282, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629763028', 1, 1629763028),
(283, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629766650', 1, 1629781944),
(284, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629781971', 1, 1629781971),
(285, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629785085', 1, 1629785085),
(286, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629786720', 1, 1629786720),
(287, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629788729', 1, 1629788729),
(288, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629790738', 1, 1629790738),
(289, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629791626', 1, 1629791626),
(290, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629794512', 1, 1629794512),
(291, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629800094', 1, 1629800094),
(292, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629803660', 1, 1629803660),
(293, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629804250', 1, 1629804250),
(294, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629808024', 1, 1629808024),
(295, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629809751', 1, 1629809751),
(296, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629811878', 1, 1629811878),
(297, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629814463', 1, 1629814463),
(298, '0', 'admin@dubai-pcr.com', 'Your new Account at HotelsOffline', '\n        Hi Ahmed,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>Y52BGIUXV6</b>.<br/>\n  Click http://test.hotelsoffline.com/activate/Y52BGIUXV6 to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1629815012', 1, 1629815012),
(299, '0', 'admin@dubai-pcr.com', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1629815027', 1, 1629815027),
(300, '0', 'admin@dubai-pcr.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629815037', 1, 1629815037),
(301, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629815474', 1, 1629815474),
(302, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629816224', 1, 1629816224),
(303, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629816344', 1, 1629816344),
(304, '0', 'admin@dubai-pcr.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629816454', 1, 1629816454),
(305, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629816538', 1, 1629816538),
(306, '0', 'admin@dubai-pcr.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629816693', 1, 1629816693),
(307, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629816721', 1, 1629816721),
(308, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629816851', 1, 1629816851),
(309, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629816954', 1, 1629816954),
(310, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629817357', 1, 1629817357),
(311, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629817425', 1, 1629817425),
(312, '0', 'admin@dubai-pcr.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629817435', 1, 1629817435),
(313, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629817597', 1, 1629817597),
(314, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629821054', 1, 1629821054),
(315, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629823082', 1, 1629823082),
(316, '0', 'admin@dubai-pcr.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629823263', 1, 1629823263),
(317, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629823326', 1, 1629823326),
(318, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629836773', 1, 1629836773),
(319, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629836823', 1, 1629836823),
(320, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629836867', 1, 1629836867),
(321, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629841915', 1, 1629841915),
(322, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629842378', 1, 1629842378),
(323, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629848432', 1, 1629848432),
(324, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629863061', 1, 1629863061),
(325, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629866763', 1, 1629866763),
(326, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629866969', 1, 1629866969),
(327, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629868644', 1, 1629868644),
(328, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629868708', 1, 1629868708),
(329, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629869581', 1, 1629869581),
(330, '0', 'admin@dubai-pcr.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629872633', 1, 1629872633),
(331, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629872977', 1, 1629872977);
INSERT INTO `mail_tb` (`id`, `name`, `mail`, `subject`, `body`, `timestamp`, `sent`, `sent_timestamp`) VALUES
(332, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629873261', 1, 1629873261),
(333, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629873726', 1, 1629873726),
(334, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629877528', 1, 1629877528),
(335, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629880480', 1, 1629880480),
(336, '0', 'admin@dubai-pcr.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629883029', 1, 1629883029),
(337, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629883389', 1, 1629883389),
(338, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629884992', 1, 1629884992),
(339, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629892111', 1, 1629892111),
(340, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629899828', 1, 1629899828),
(341, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629906280', 1, 1629906280),
(342, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629962593', 1, 1629962593),
(343, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629975245', 1, 1629975245),
(344, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629976516', 1, 1629976516),
(345, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629976972', 1, 1629976972),
(346, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629979472', 1, 1629979472),
(347, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629986174', 1, 1629986174),
(348, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629995359', 1, 1629995359),
(349, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1629995534', 1, 1629995534),
(350, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630004642', 1, 1630004642),
(351, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630006966', 1, 1630006966),
(352, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630008041', 1, 1630008041),
(353, '0', 'admin@dubai-pcr.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630009094', 1, 1630009094),
(354, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630009179', 1, 1630009179),
(355, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630058279', 1, 1630058279),
(356, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630096738', 1, 1630096738),
(357, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630097342', 1, 1630097342),
(358, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630097474', 1, 1630097474),
(359, '0', 'admin@dubai-pcr.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630139026', 1, 1630139026),
(360, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630139241', 1, 1630139241),
(361, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630142364', 1, 1630142364),
(362, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630158217', 1, 1630158217),
(363, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630218479', 1, 1630218479),
(364, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630225430', 1, 1630225430),
(365, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630235550', 1, 1630235550),
(366, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630252336', 1, 1630252336),
(367, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630282741', 1, 1630282741),
(368, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630284929', 1, 1630284929),
(369, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630306249', 1, 1630306249),
(370, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630315876', 1, 1630315876),
(371, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630316120', 1, 1630316120),
(372, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630319682', 1, 1630319682),
(373, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630350625', 1, 1630350625),
(374, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630358173', 1, 1630358173),
(375, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630387062', 1, 1630387062),
(376, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630399214', 1, 1630399214),
(377, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630402697', 1, 1630402697),
(378, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630403883', 1, 1630403883),
(379, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630411085', 1, 1630411085),
(380, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630413749', 1, 1630413749),
(381, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630426085', 1, 1630426085),
(382, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630427793', 1, 1630427793),
(383, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630454453', 1, 1630454453),
(384, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630461315', 1, 1630461315),
(385, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630473160', 1, 1630473160),
(386, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630477744', 1, 1630477744),
(387, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630488668', 1, 1630488668),
(388, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630495784', 1, 1630495784),
(389, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630499070', 1, 1630499070),
(390, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630502960', 1, 1630502960),
(391, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630503747', 1, 1630503747),
(392, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630515166', 1, 1630515166),
(393, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630515498', 1, 1630515498),
(394, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630543734', 1, 1630543734),
(395, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630564652', 1, 1630564652),
(396, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630571353', 1, 1630571353),
(397, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630582000', 1, 1630582000),
(398, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630597945', 1, 1630597945),
(399, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630690888', 1, 1630690888),
(400, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630751578', 1, 1630751578),
(401, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630756864', 1, 1630756864),
(402, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630774150', 1, 1630774150),
(403, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630774791', 1, 1630774791),
(404, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630775835', 1, 1630775835),
(405, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630790353', 1, 1630790353),
(406, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630822104', 1, 1630822104),
(407, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630842304', 1, 1630842304),
(408, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630909127', 1, 1630909127),
(409, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1630923090', 1, 1630923090),
(410, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631009437', 1, 1631009437),
(411, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631009498', 1, 1631009498),
(412, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631009743', 1, 1631009743),
(413, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631014938', 1, 1631014938),
(414, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631015784', 1, 1631015784),
(415, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631018840', 1, 1631018840),
(416, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631019001', 1, 1631019001),
(417, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631019087', 1, 1631019087),
(418, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631019237', 1, 1631019237),
(419, '0', 'cmd@expertcaredmcc.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631019319', 1, 1631019319),
(420, '0', 'cmd@expertcaredmcc.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631019344', 1, 1631019344),
(421, '0', 'admin@pcr-dubai.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631019393', 1, 1631019393),
(422, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631019413', 1, 1631019413),
(423, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631019451', 1, 1631019451),
(424, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631019607', 1, 1631019607),
(425, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631019646', 1, 1631019646),
(426, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631019777', 1, 1631019777),
(427, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631020323', 1, 1631020323),
(428, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631020337', 1, 1631020337),
(429, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631020396', 1, 1631020396),
(430, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631020658', 1, 1631020658),
(431, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631021243', 1, 1631021243),
(432, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631021394', 1, 1631021394),
(433, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631021448', 1, 1631021448),
(434, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631021750', 1, 1631021750),
(435, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631023620', 1, 1631023620),
(436, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631030649', 1, 1631030649),
(437, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631034353', 1, 1631034353),
(438, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631061119', 1, 1631061119),
(439, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631062623', 1, 1631062623),
(440, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631075895', 1, 1631075895),
(441, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631107233', 1, 1631107233),
(442, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631114768', 1, 1631114768),
(443, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631120140', 1, 1631120140),
(444, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631132090', 1, 1631132090),
(445, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631146987', 1, 1631146987),
(446, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631169867', 1, 1631169867),
(447, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631173943', 1, 1631173943),
(448, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631179139', 1, 1631179139),
(449, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631182258', 1, 1631182258),
(450, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631190080', 1, 1631190080),
(451, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631276331', 1, 1631276331),
(452, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631331385', 1, 1631331385),
(453, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631332761', 1, 1631332761),
(454, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631343255', 1, 1631343255),
(455, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631343875', 1, 1631343875),
(456, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631395269', 1, 1631395269),
(457, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631428146', 1, 1631428146),
(458, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631439551', 1, 1631439551),
(459, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631444081', 1, 1631444081),
(460, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631452653', 1, 1631452653),
(461, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631476591', 1, 1631476591),
(462, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631488109', 1, 1631488109),
(463, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631519174', 1, 1631519174),
(464, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631532702', 1, 1631532702),
(465, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631534298', 1, 1631534298),
(466, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631542435', 1, 1631542435),
(467, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631549314', 1, 1631549314),
(468, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631558942', 1, 1631558942),
(469, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631598221', 1, 1631598221),
(470, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631600505', 1, 1631600505),
(471, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631621170', 1, 1631621170),
(472, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631630795', 1, 1631630795),
(473, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631644080', 1, 1631644080),
(474, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631649927', 1, 1631649927),
(475, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631655160', 1, 1631655160),
(476, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631655603', 1, 1631655603),
(477, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631680288', 1, 1631680288),
(478, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631682474', 1, 1631682474),
(479, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631684113', 1, 1631684113),
(480, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631695455', 1, 1631695455),
(481, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631695500', 1, 1631695500),
(482, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631697639', 1, 1631697639),
(483, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631698376', 1, 1631698376),
(484, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631700071', 1, 1631700071),
(485, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631700870', 1, 1631700870),
(486, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631701456', 1, 1631701456),
(487, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631718831', 1, 1631718831),
(488, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631721846', 1, 1631721846),
(489, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631729362', 1, 1631729362),
(490, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631779795', 1, 1631779795),
(491, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631785629', 1, 1631785629),
(492, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631788121', 1, 1631788121),
(493, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631796821', 1, 1631796821),
(494, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631798276', 1, 1631798276),
(495, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631801512', 1, 1631801512);
INSERT INTO `mail_tb` (`id`, `name`, `mail`, `subject`, `body`, `timestamp`, `sent`, `sent_timestamp`) VALUES
(496, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631806470', 1, 1631806470),
(497, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631808800', 1, 1631808800),
(498, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631826451', 1, 1631826451),
(499, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631826558', 1, 1631826558),
(500, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631856009', 1, 1631856009),
(501, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631872646', 1, 1631872646),
(502, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631876023', 1, 1631876023),
(503, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631878823', 1, 1631878823),
(504, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631889432', 1, 1631889432),
(505, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631895312', 1, 1631895312),
(506, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631902786', 1, 1631902786),
(507, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631903588', 1, 1631903588),
(508, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631910132', 1, 1631910132),
(509, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631910731', 1, 1631910731),
(510, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631932086', 1, 1631932086),
(511, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1631971496', 1, 1631971496),
(512, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632040773', 1, 1632040773),
(513, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632057694', 1, 1632057694),
(514, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632057717', 1, 1632057717),
(515, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632115440', 1, 1632115440),
(516, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632116553', 1, 1632116553),
(517, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632139582', 1, 1632139582),
(518, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632140557', 1, 1632140557),
(519, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632141177', 1, 1632141177),
(520, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632141338', 1, 1632141338),
(521, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632142432', 1, 1632142432),
(522, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632154876', 1, 1632154876),
(523, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632155177', 1, 1632155177),
(524, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632171740', 1, 1632171740),
(525, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632182199', 1, 1632182199),
(526, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632187704', 1, 1632187704),
(527, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632221036', 1, 1632221036),
(528, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632228602', 1, 1632228602),
(529, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632234263', 1, 1632234263),
(530, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632241240', 1, 1632241240),
(531, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632253865', 1, 1632253865),
(532, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632272174', 1, 1632272174),
(533, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632310080', 1, 1632310080),
(534, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632310312', 1, 1632310312),
(535, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632310320', 1, 1632310320),
(536, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632313086', 1, 1632313086),
(537, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632313907', 1, 1632313907),
(538, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632322143', 1, 1632322143),
(539, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632322711', 1, 1632322711),
(540, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632331053', 1, 1632331053),
(541, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632334822', 1, 1632334822),
(542, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632375078', 1, 1632375078),
(543, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632383235', 1, 1632383235),
(544, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632400370', 1, 1632400370),
(545, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632402536', 1, 1632402536),
(546, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632405669', 1, 1632405669),
(547, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632407656', 1, 1632407656),
(548, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632425765', 1, 1632425765),
(549, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632430122', 1, 1632430122),
(550, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632435030', 1, 1632435030),
(551, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632440554', 1, 1632440554),
(552, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632440635', 1, 1632440635),
(553, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632440758', 1, 1632440758),
(554, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632440986', 1, 1632440986),
(555, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632441147', 1, 1632441147),
(556, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632441501', 1, 1632441501),
(557, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632446735', 1, 1632446735),
(558, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632480738', 1, 1632480738),
(559, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632487209', 1, 1632487209),
(560, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632487261', 1, 1632487261),
(561, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632496318', 1, 1632496318),
(562, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632507655', 1, 1632507655),
(563, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632516434', 1, 1632516434),
(564, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632581166', 1, 1632581166),
(565, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632671936', 1, 1632671936),
(566, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632697270', 1, 1632697270),
(567, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632697890', 1, 1632697890),
(568, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632747442', 1, 1632747442),
(569, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632769244', 1, 1632769244),
(570, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632795421', 1, 1632795421),
(571, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632805997', 1, 1632805997),
(572, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632806044', 1, 1632806044),
(573, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632806880', 1, 1632806880),
(574, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632816527', 1, 1632816527),
(575, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632842932', 1, 1632842932),
(576, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632846001', 1, 1632846001),
(577, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632846980', 1, 1632846980),
(578, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632847315', 1, 1632847315),
(579, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632848555', 1, 1632848555),
(580, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632849534', 1, 1632849534),
(581, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632855000', 1, 1632855000),
(582, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632862678', 1, 1632862678),
(583, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632863895', 1, 1632863895),
(584, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632864047', 1, 1632864047),
(585, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632865226', 1, 1632865226),
(586, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632865982', 1, 1632865982),
(587, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632890625', 1, 1632890625),
(588, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632920324', 1, 1632920324),
(589, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632923382', 1, 1632923382),
(590, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632924591', 1, 1632924591),
(591, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632925687', 1, 1632925687),
(592, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632927193', 1, 1632927193),
(593, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632927265', 1, 1632927265),
(594, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632927936', 1, 1632927936),
(595, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632939745', 1, 1632939745),
(596, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632982018', 1, 1632982018),
(597, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632982128', 1, 1632982128),
(598, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1632982184', 1, 1632982184),
(599, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633006464', 1, 1633006464),
(600, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633012527', 1, 1633012527),
(601, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633012583', 1, 1633012583),
(602, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633012806', 1, 1633012806),
(603, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633107415', 1, 1633107415),
(604, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633243737', 1, 1633243737),
(605, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633243770', 1, 1633243770),
(606, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633270111', 1, 1633270111),
(607, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633348552', 1, 1633348552),
(608, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633381307', 1, 1633381307),
(609, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633500044', 1, 1633500044),
(610, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633500080', 1, 1633500080),
(611, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633595995', 1, 1633595995),
(612, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633612963', 1, 1633612963),
(613, '0', 'dacoaliesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633612988', 1, 1633612988),
(614, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633613001', 1, 1633613001),
(615, '0', 'akinmosinolawande@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633613010', 1, 1633613010),
(616, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633613087', 1, 1633613087),
(617, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633613438', 0, 1635854227),
(618, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633613593', 0, 1635854225),
(619, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633615129', 0, 1635854223),
(620, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633642594', 1, 1633642594),
(621, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633642609', 1, 1633642609),
(622, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633666766', 1, 1633666766),
(623, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633669470', 1, 1633669470),
(624, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633705011', 1, 1633705011),
(625, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633705039', 1, 1633705039),
(626, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633806315', 0, 1635854221),
(627, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633816965', 1, 1633816965),
(628, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633817018', 1, 1633817018),
(629, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633817032', 1, 1633817032),
(630, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633885956', 1, 1633885956),
(631, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633888925', 1, 1633888925),
(632, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633951317', 1, 1633951317),
(633, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633957124', 1, 1633957124),
(634, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633978420', 1, 1633978420),
(635, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633980060', 1, 1633980060),
(636, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1633980144', 1, 1633980144),
(637, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634022664', 1, 1634022664),
(638, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634057933', 1, 1634057933),
(639, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634058015', 1, 1634058015),
(640, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634062327', 1, 1634062327),
(641, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634062518', 1, 1634062518),
(642, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634062545', 1, 1634062545),
(643, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634062652', 1, 1634062652),
(644, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634062792', 1, 1634062792),
(645, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634064408', 1, 1634064408),
(646, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634065065', 1, 1634065065),
(647, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634067573', 1, 1634067573),
(648, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634068164', 1, 1634068164),
(649, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634068210', 0, 1635854219),
(650, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634068888', 1, 1634068888),
(651, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634109166', 1, 1634109166),
(652, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634124243', 1, 1634124243),
(653, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634133015', 1, 1634133015),
(654, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634133434', 1, 1634133434),
(655, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634133633', 1, 1634133633),
(656, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634137253', 1, 1634137253),
(657, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634137304', 1, 1634137304),
(658, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634137512', 1, 1634137512),
(659, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634140449', 1, 1634140449);
INSERT INTO `mail_tb` (`id`, `name`, `mail`, `subject`, `body`, `timestamp`, `sent`, `sent_timestamp`) VALUES
(660, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634142256', 1, 1634142256),
(661, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634142324', 1, 1634142324),
(662, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634143302', 1, 1634143302),
(663, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634143554', 1, 1634143554),
(664, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634143746', 1, 1634143746),
(665, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634144415', 1, 1634144415),
(666, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634144429', 1, 1634144429),
(667, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634145389', 1, 1634145389),
(668, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634145980', 1, 1634145980),
(669, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634148679', 1, 1634148679),
(670, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634148952', 1, 1634148952),
(671, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634148993', 1, 1634148993),
(672, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634149847', 1, 1634149847),
(673, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634150118', 1, 1634150118),
(674, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634150760', 1, 1634150760),
(675, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634151030', 0, 1635854217),
(676, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634151055', 1, 1634151055),
(677, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634151996', 1, 1634151996),
(678, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634152026', 1, 1634152026),
(679, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634152436', 1, 1634152436),
(680, '0', 'dacoaliesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634152521', 1, 1634152521),
(681, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634152553', 1, 1634152553),
(682, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634154214', 1, 1634154214),
(683, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634166378', 1, 1634166378),
(684, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634214733', 0, 1635854215),
(685, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634215868', 0, 1635854213),
(686, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634278861', 0, 1635854211),
(687, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634279076', 1, 1634279076),
(688, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634279162', 1, 1634279162),
(689, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634279227', 0, 1635854209),
(690, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634279260', 1, 1634279260),
(691, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634279314', 1, 1634279314),
(692, '0', 'admin@std-dubai.com', 'Your new Account at HotelsOffline', '\n        Hi Ahmed,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>WCBFERVT8H</b>.<br/>\n  Click http://test.hotelsoffline.com/activate/WCBFERVT8H to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1634279543', 1, 1634279543),
(693, '0', 'admin@std-dubai.com', 'Your HotelsOffline Account', '\n        Hi , <br/>\n  Your HotelsOffline account has been activated<br />\nWarm regards, <br />\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1634279630', 1, 1634279630),
(694, '0', 'admin@std-dubai.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634279639', 1, 1634279639),
(695, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634280608', 1, 1634280608),
(696, '0', 'admin@std-dubai.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634280648', 1, 1634280648),
(697, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634280705', 1, 1634280705),
(698, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634293734', 1, 1634293734),
(699, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634306434', 1, 1634306434),
(700, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634364556', 1, 1634364556),
(701, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634378009', 1, 1634378009),
(702, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - .<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634378765', 1, 1634378765),
(703, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 197.211.59.68.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634379053', 1, 1634379053),
(704, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.74.41.59.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634380548', 1, 1634380548),
(705, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 129.205.113.5.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634382668', 1, 1634382668),
(706, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 129.205.113.5.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634386942', 1, 1634386942),
(707, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.74.41.59.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634386978', 1, 1634386978),
(708, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 129.205.113.5.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634387032', 0, 1635854207),
(709, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 129.205.113.5.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634387052', 1, 1634387052),
(710, '0', 'akinmosinolawande@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 129.205.113.5.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634387077', 1, 1634387077),
(711, '0', 'dacoaliesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 129.205.113.5.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634387108', 1, 1634387108),
(712, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 129.205.113.5.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634387133', 1, 1634387133),
(713, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.73.37.22.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634395521', 1, 1634395521),
(714, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 197.211.58.63.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634453924', 0, 1635854205),
(715, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.73.37.22.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634455498', 0, 1635854203),
(716, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.73.37.22.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634466861', 0, 1635854201),
(717, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.73.37.22.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634484724', 0, 1635854199),
(718, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.73.37.22.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634495630', 0, 1635854197),
(719, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.73.37.22.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634532027', 0, 1635854195),
(720, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.74.41.59.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634555591', 0, 1635854193),
(721, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.74.41.59.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634562895', 0, 1635854191),
(722, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 41.242.77.123.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634563056', 0, 1635854189),
(723, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 187.86.32.18.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634564348', 0, 1635854187),
(724, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.74.41.59.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634629486', 0, 1635854185),
(725, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 129.205.113.4.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634630940', 0, 1635854183),
(726, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 197.211.59.68.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634635504', 0, 1635854181),
(727, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.74.41.59.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634647759', 0, 1635854179),
(728, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.74.41.59.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634647879', 0, 1635854177),
(729, '0', 'admin@dubai-pcr.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 91.74.41.59.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634647936', 0, 1635854175),
(730, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago, with IP - 41.242.77.123.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634652077', 0, 1635854173),
(731, '0', 'sogo@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi Sogo,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>B7O6CMT71T</b>.<br/>\n  Click http://test.hotelsoffline.com/activate/B7O6CMT71T to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1634653295', 0, 1635854171),
(732, '0', 'sogo@gmail.com', 'Your new Account at HotelsOffline', '\n        Hi Sogo,<br/>\n  Welcome to HotelsOffline. To activate your account, your activation token is <b>5RTJHJ2MAK</b>.<br/>\n  Click http://test.hotelsoffline.com/activate/5RTJHJ2MAK to activate your account<br/><br/>\nWarm regards, <br/>\nThe HotelsOffline Team.\n<br /><br />\n        Stay safe\n        ', '1634654288', 0, 1635854169),
(733, '0', 'sogo@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634654927', 0, 1636597218),
(734, '0', 'sogo@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634655669', 0, 1636597216),
(735, '0', 'sogo@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634655838', 0, 1636597214),
(736, '0', 'sogo@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634655998', 0, 1636597212),
(737, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634713919', 0, 1636597210),
(738, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634737706', 0, 1636597208),
(739, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634749370', 0, 1636597206),
(740, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634749451', 0, 1636597204),
(741, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634750290', 0, 1636597202),
(742, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634766978', 0, 1636671510),
(743, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634798291', 0, 1636671508),
(744, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634807447', 0, 1636671506),
(745, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634834009', 0, 1636671504),
(746, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634896385', 0, 1636671502),
(747, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634896425', 0, 1636671500),
(748, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634896586', 0, 1636671498),
(749, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634897627', 0, 1636671496),
(750, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634921824', 0, 1637024428),
(751, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634922603', 0, 1637024426),
(752, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634938373', 0, 1637024424),
(753, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634938518', 0, 1637024422),
(754, '0', 'super.guide@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634938551', 0, 1637024420),
(755, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634938780', 0, 1637024418),
(756, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634939010', 0, 1637024416),
(757, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634969018', 0, 1637059136),
(758, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634969487', 0, 1637059134),
(759, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1634985970', 0, 1637059132),
(760, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635066380', 0, 1637059130),
(761, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635158881', 0, 1637059128),
(762, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635159249', 0, 1637059126),
(763, '0', 'sogo@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635193941', 0, 1637059124),
(764, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635193992', 0, 1637059122),
(765, '0', 'sogo@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635194283', 0, 1637059120),
(766, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635198439', 0, 1637059118),
(767, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635204290', 0, 1637059116),
(768, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635204309', 0, 1637059114),
(769, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635204407', 0, 1637059112),
(770, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635233934', 0, 1637059110),
(771, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635254818', 0, 1637059108),
(772, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635305263', 0, 1637059106),
(773, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635305350', 0, 1637059104),
(774, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635305412', 0, 1637059102),
(775, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635305635', 0, 1637059100),
(776, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635322661', 0, 1637059098),
(777, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635325357', 0, 1637059096),
(778, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635327603', 0, 1637059094),
(779, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635335282', 0, 1637059092),
(780, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635347574', 0, 1637059090),
(781, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635350510', 0, 1637059088),
(782, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635406164', 0, 1637059086),
(783, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635406271', 0, 1637059084),
(784, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635406292', 0, 1637059082),
(785, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635406654', 0, 1637059080),
(786, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635406747', 0, 1637059078),
(787, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635407106', 0, 1637059076),
(788, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635407118', 0, 1637059074),
(789, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635407747', 0, 1637059072),
(790, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635407938', 0, 1637059070),
(791, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635407981', 0, 1637059068),
(792, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635408006', 0, 1637059066),
(793, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635408398', 0, 1637059064),
(794, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635408426', 0, 1637059062),
(795, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635409665', 0, 1637059060),
(796, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635409980', 0, 1637059058),
(797, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635425363', 0, 1637059056),
(798, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635425442', 0, 1637059054),
(799, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635425470', 0, 1637059052),
(800, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635426014', 0, 1637059050),
(801, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635505541', 0, 1637059048),
(802, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635505553', 0, 1637059046),
(803, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635514947', 0, 1637059044),
(804, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635515805', 0, 1637059042),
(805, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635515857', 0, 1637059040),
(806, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635516516', 0, 1637059038),
(807, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635516586', 0, 1637059036),
(808, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635516734', 0, 1637059034),
(809, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635517653', 0, 1637059032),
(810, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635517704', 0, 1637660199),
(811, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635517744', 0, 1637660197),
(812, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635519081', 0, 1637660195),
(813, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635772310', 0, 1637660193),
(814, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635783261', 0, 1637660191),
(815, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635794040', 0, 1637660189),
(816, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635795896', 0, 1637660187),
(817, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635805705', 0, 1637660185),
(818, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635842253', 0, 1637660183),
(819, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635850729', 0, 1637660181),
(820, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635851891', 0, 1637660179);
INSERT INTO `mail_tb` (`id`, `name`, `mail`, `subject`, `body`, `timestamp`, `sent`, `sent_timestamp`) VALUES
(821, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635852036', 0, 1637660177),
(822, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635865693', 0, 1637660175),
(823, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635871737', 0, 1637660173),
(824, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635871778', 0, 1637660171),
(825, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635876737', 0, 1637660169),
(826, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635887946', 0, 1637660167),
(827, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635919056', 0, 1637660165),
(828, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635923387', 0, 1637660163),
(829, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635935678', 0, 1637660161),
(830, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1635999955', 0, 1637660159),
(831, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636026976', 0, 1637660157),
(832, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636032061', 0, 1637660155),
(833, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636045350', 0, 1637660153),
(834, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636050150', 0, 1637660151),
(835, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636058393', 0, 1637660149),
(836, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636059837', 0, 1637660147),
(837, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636063887', 0, 1637660145),
(838, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636096652', 0, 1637660143),
(839, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636104529', 0, 1637660141),
(840, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636108611', 0, 1637660139),
(841, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636128346', 0, 1637660137),
(842, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636135004', 0, 1637660135),
(843, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636140173', 0, 1637660133),
(844, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636165889', 0, 1637660131),
(845, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636171807', 0, 1637660129),
(846, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636172811', 0, 1637660127),
(847, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636172865', 0, 1637660125),
(848, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636180420', 0, 1637660123),
(849, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636188013', 0, 1637660121),
(850, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636193916', 0, 1637660119),
(851, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636194358', 0, 1637660117),
(852, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636206466', 0, 1637660115),
(853, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636208306', 0, 1637660113),
(854, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636215971', 0, 1637660111),
(855, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636277640', 0, 1637660109),
(856, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636283873', 0, 1637660107),
(857, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636293193', 0, 1637660105),
(858, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636311882', 0, 1637660103),
(859, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636368880', 0, 1637660101),
(860, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636377680', 0, 1637660099),
(861, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636384598', 0, 1637660097),
(862, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636385296', 0, 1637660095),
(863, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636387274', 0, 1637660093),
(864, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636395437', 0, 1637660091),
(865, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636443425', 0, 1637660089),
(866, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636443466', 0, 1637660087),
(867, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636455288', 0, 1637660085),
(868, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636463415', 0, 1637660083),
(869, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636463502', 0, 1637660081),
(870, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636464594', 0, 1637660079),
(871, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636467643', 0, 1637660077),
(872, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636467742', 0, 1637660075),
(873, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636467797', 0, 1637660073),
(874, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636469211', 0, 1637660071),
(875, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636469520', 0, 1637660069),
(876, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636469866', 0, 1637660067),
(877, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636488146', 0, 1637660065),
(878, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636489522', 0, 1637660063),
(879, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636534779', 0, 1637660061),
(880, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636549402', 0, 1637660059),
(881, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636568127', 0, 1637660057),
(882, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636623446', 0, 1637660055),
(883, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636633912', 0, 1637660053),
(884, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636652626', 0, 1637660051),
(885, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636652964', 0, 1637660049),
(886, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636726195', 0, 1637660047),
(887, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636754112', 0, 1637660045),
(888, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636793757', 0, 1637660043),
(889, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636815931', 0, 1638085706),
(890, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636827697', 0, 1638085704),
(891, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636853554', 0, 1638085702),
(892, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636870190', 0, 1638085700),
(893, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636872470', 0, 1638085698),
(894, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636893620', 0, 1638085696),
(895, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636911187', 0, 1638085694),
(896, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636969993', 0, 1638085692),
(897, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636973589', 0, 1638085690),
(898, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1636993547', 0, 1638085688),
(899, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637043045', 0, 1638085686),
(900, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637055768', 0, 1638085684),
(901, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637059725', 0, 1638085682),
(902, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637059833', 0, 1638085680),
(903, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637061258', 0, 1638085678),
(904, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637062047', 0, 1638085676),
(905, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637071707', 0, 1638085674),
(906, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637102460', 0, 1638085672),
(907, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637132947', 0, 1638085670),
(908, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637160029', 0, 1638085668),
(909, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637166176', 0, 1638085666),
(910, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637181866', 0, 1638085664),
(911, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637224311', 0, 1638085662),
(912, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637224379', 0, 1638085660),
(913, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637239731', 0, 1638085658),
(914, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637239762', 0, 1638085656),
(915, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637267032', 0, 1638085654),
(916, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637267071', 0, 1638085652),
(917, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637319636', 0, 1638085650),
(918, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637320334', 0, 1638085648),
(919, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637338059', 0, 1638085646),
(920, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637338178', 0, 1638085644),
(921, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637385091', 0, 1638085642),
(922, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637398164', 0, 1638085640),
(923, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637503122', 0, 1638085638),
(924, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637503194', 0, 1638085636),
(925, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637508745', 0, 1638085634),
(926, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637508939', 0, 1638085632),
(927, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637509240', 0, 1638085630),
(928, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637510053', 0, 1638085628),
(929, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637514381', 0, 1638085626),
(930, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637521725', 0, 1638085624),
(931, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637534498', 0, 1638085622),
(932, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637534845', 0, 1638085620),
(933, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637534880', 0, 1638085618),
(934, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637536704', 0, 1638085616),
(935, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637536947', 0, 1638085614),
(936, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637540401', 0, 1638085612),
(937, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637540475', 0, 1638085610),
(938, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637540518', 0, 1638085608),
(939, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637540642', 0, 1638085606),
(940, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637540775', 0, 1638085604),
(941, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637540808', 0, 1638085602),
(942, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637541643', 0, 1638085600),
(943, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637584933', 0, 1638085598),
(944, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637584958', 0, 1638085596),
(945, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637586616', 0, 1638085594),
(946, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637591922', 0, 1638085592),
(947, '0', 'admin@servapp.shop', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637595357', 0, 1638085590),
(948, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637595374', 0, 1638085588),
(949, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637624586', 0, 1638085586),
(950, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637624833', 0, 1638085584),
(951, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637625303', 0, 1638085582),
(952, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637626907', 0, 1638085580),
(953, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637659431', 0, 1638085578),
(954, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637660521', 0, 1638085576),
(955, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637660583', 0, 1638085574),
(956, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637664803', 0, 1638085572),
(957, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637664935', 0, 1638085570),
(958, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637676153', 0, 1638085568),
(959, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637676188', 0, 1638085566),
(960, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637676602', 0, 1638085564),
(961, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637676886', 0, 1638085562),
(962, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637678677', 0, 1638085560),
(963, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637679235', 0, 1638085558),
(964, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637679375', 0, 1638085556),
(965, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637680722', 0, 1638085554),
(966, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637685495', 0, 1638085552),
(967, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637700108', 0, 1638085550),
(968, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637701544', 0, 1638085548),
(969, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637701642', 0, 1638085546),
(970, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637701942', 0, 1638085544),
(971, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637703059', 0, 1638085542),
(972, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637717625', 0, 1638085540),
(973, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637717652', 0, 1638085538),
(974, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637719621', 0, 1638085536),
(975, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637762559', 0, 1638085534),
(976, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637762585', 0, 1638085532),
(977, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637764027', 0, 1638085530),
(978, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637767780', 0, 1638085528),
(979, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637779593', 0, 1638085526),
(980, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637800382', 0, 1638085524),
(981, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637823737', 0, 1638085522),
(982, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637840739', 0, 1638085520),
(983, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637840883', 0, 1638085518),
(984, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637840959', 0, 1638085516);
INSERT INTO `mail_tb` (`id`, `name`, `mail`, `subject`, `body`, `timestamp`, `sent`, `sent_timestamp`) VALUES
(985, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637850578', 0, 1638085514),
(986, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637850612', 0, 1638085512),
(987, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637850632', 0, 1638085510),
(988, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637870752', 0, 1638085508),
(989, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637871700', 0, 1638085506),
(990, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637872452', 0, 1638085504),
(991, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637872511', 0, 1638085502),
(992, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637872539', 0, 1638085500),
(993, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637894060', 0, 1638085498),
(994, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637894248', 0, 1638085496),
(995, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637916878', 0, 1638085494),
(996, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637917845', 0, 1638085492),
(997, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637919165', 0, 1638085490),
(998, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637919180', 0, 1638085488),
(999, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637919207', 0, 1638085486),
(1000, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637919230', 0, 1638085484),
(1001, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637921050', 0, 1638085482),
(1002, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637921067', 0, 1638085480),
(1003, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637921806', 0, 1638085478),
(1004, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637924036', 0, 1638085476),
(1005, '0', 'akinmosinolawande@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637924058', 0, 1638085474),
(1006, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637924090', 0, 1638085472),
(1007, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637924114', 0, 1638085470),
(1008, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637924275', 0, 1638085468),
(1009, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637926376', 0, 1638085466),
(1010, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637926810', 0, 1638085464),
(1011, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637943095', 0, 1638085462),
(1012, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637961479', 0, 1638085460),
(1013, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1637961511', 0, 1638085458),
(1014, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638001025', 0, 1638085456),
(1015, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638008857', 0, 1638085454),
(1016, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638008934', 0, 1638085452),
(1017, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638020856', 0, 1638085450),
(1018, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638025293', 0, 1638085448),
(1019, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638027303', 0, 1638085446),
(1020, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638035270', 0, 1638085444),
(1021, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638041875', 0, 1638085442),
(1022, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638041905', 0, 1638085440),
(1023, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638042050', 0, 1638085438),
(1024, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638045978', 0, 1638085436),
(1025, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638050126', 0, 1638085434),
(1026, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638053142', 0, 1638085432),
(1027, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638053168', 0, 1638085430),
(1028, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638054200', 0, 1638085428),
(1029, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638054291', 0, 1638085426),
(1030, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638055238', 0, 1638085424),
(1031, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638083109', 0, 1638085422),
(1032, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638084725', 0, 1638085420),
(1033, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638084766', 0, 1638085418),
(1034, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638084857', 0, 1638085416),
(1035, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638084915', 0, 1638085414),
(1036, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638084929', 0, 1638085412),
(1037, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638086808', 0, 0),
(1038, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638095320', 0, 0),
(1039, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638097240', 0, 0),
(1040, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638098976', 0, 0),
(1041, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638102419', 0, 0),
(1042, '0', 'dacoaliesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638103375', 0, 0),
(1043, '0', 'olawandesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638103394', 0, 0),
(1044, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638103406', 0, 0),
(1045, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638103468', 0, 0),
(1046, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638104194', 0, 0),
(1047, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638104436', 0, 0),
(1048, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638104551', 0, 0),
(1049, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638104621', 0, 0),
(1050, '0', 'akinmosinolawande@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638105221', 0, 0),
(1051, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638105233', 0, 0),
(1052, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638105578', 0, 0),
(1053, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638106103', 0, 0),
(1054, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638107424', 0, 0),
(1055, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638107498', 0, 0),
(1056, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638111035', 0, 0),
(1057, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638111129', 0, 0),
(1058, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638111684', 0, 0),
(1059, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638111932', 0, 0),
(1060, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638114949', 0, 0),
(1061, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638115155', 0, 0),
(1062, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638118321', 0, 0),
(1063, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638124306', 0, 0),
(1064, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638129093', 0, 0),
(1065, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638129527', 0, 0),
(1066, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638141320', 0, 0),
(1067, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638159682', 0, 0),
(1068, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638173316', 0, 0),
(1069, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638173467', 0, 0),
(1070, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638173859', 0, 0),
(1071, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638174363', 0, 0),
(1072, '0', 'ayodeletim@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638174395', 0, 0),
(1073, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638174435', 0, 0),
(1074, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638186536', 0, 0),
(1075, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638186752', 0, 0),
(1076, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638186966', 0, 0),
(1077, '0', 'akinmosinolawande@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638187708', 0, 0),
(1078, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638188058', 0, 0),
(1079, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638188100', 0, 0),
(1080, '0', 'dacoaliesamuel@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638188691', 0, 0),
(1081, '0', 'akinmosinolawande@yahoo.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638189211', 0, 0),
(1082, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638192092', 0, 0),
(1083, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638192359', 0, 0),
(1084, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638192962', 0, 0),
(1085, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638194265', 0, 0),
(1086, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638194866', 0, 0),
(1087, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638195090', 0, 0),
(1088, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638198019', 0, 0),
(1089, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638199332', 0, 0),
(1090, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638201828', 0, 0),
(1091, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638204090', 0, 0),
(1092, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638207244', 0, 0),
(1093, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638218544', 0, 0),
(1094, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638218734', 0, 0),
(1095, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638254630', 0, 0),
(1096, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638254658', 0, 0),
(1097, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638263997', 0, 0),
(1098, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638264024', 0, 0),
(1099, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638273893', 0, 0),
(1100, '0', 'shedahouse@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638273996', 0, 0),
(1101, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638274016', 0, 0),
(1102, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638274241', 0, 0),
(1103, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638278283', 0, 0),
(1104, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638290282', 0, 0),
(1105, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638290326', 0, 0),
(1106, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638300637', 0, 0),
(1107, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638301702', 0, 0),
(1108, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638301786', 0, 0),
(1109, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638341857', 0, 0),
(1110, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638341882', 0, 0),
(1111, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638353234', 0, 0),
(1112, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638359033', 0, 0),
(1113, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638361366', 0, 0),
(1114, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638363196', 0, 0),
(1115, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638367543', 0, 0),
(1116, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638367726', 0, 0),
(1117, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638372523', 0, 0),
(1118, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638372836', 0, 0),
(1119, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638381835', 0, 0),
(1120, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638381888', 0, 0),
(1121, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638385762', 0, 0),
(1122, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638385867', 0, 0),
(1123, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638414116', 0, 0),
(1124, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638428343', 0, 0),
(1125, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638437779', 0, 0),
(1126, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638446442', 0, 0),
(1127, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638447139', 0, 0),
(1128, '0', 'samueldacoal@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638449556', 0, 0),
(1129, '0', 'admin@hotelsoffline.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638467234', 0, 0),
(1130, '0', 'fireswitchtech@gmail.com', 'HotelsOffline Activity', '\n        You just logged in to your HotelsOffline account few seconds ago.<br/>\nKindly let us know if you did not..<br/>\nWarm regards,<br/>\nHotelsOffline team\n  <br /><br />\n        Stay safe\n        ', '1638478323', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `markup`
--

CREATE TABLE `markup` (
  `id` int(11) NOT NULL,
  `contract_token` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `user_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `markup` int(20) NOT NULL DEFAULT 0,
  `category` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `timestamp` int(50) NOT NULL DEFAULT 0,
  `display` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `markup`
--

INSERT INTO `markup` (`id`, `contract_token`, `user_type`, `markup`, `category`, `timestamp`, `display`) VALUES
(9, 'aba', '0', 0, '0', 1637326905, 0),
(10, 'ECFVBV20ND', '0', 0, '0', 1637327004, 0),
(11, 'UT98WGBTD9', '0', 0, '0', 1637333620, 0),
(12, 'AWWJQ2FFV5', '0', 0, '0', 1637333669, 0),
(13, 'E2PV4RRKT8', '0', 0, '0', 1637355698, 0),
(14, 'R6O8GWC4H6', '0', 0, '0', 1637355940, 0),
(15, 'XOL6AWA4TJ', '0', 0, '0', 1637355952, 0),
(16, '79BS20GWYV', '0', 0, '0', 1637355966, 0),
(17, 'K1A6QPH7B5', '0', 0, '0', 1637356045, 0),
(18, 'K1A6QPH7B5', '0', 0, '0', 1637356082, 0),
(19, 'K1A6QPH7B5', '0', 0, '0', 1637356128, 0),
(20, 'K1A6QPH7B5', '0', 0, '0', 1637356161, 0),
(21, '9YT3ZI363I', '0', 0, '0', 1637356699, 0),
(22, 'RGS0Y81HAX', '0', 0, '0', 1637356992, 0),
(23, 'MMVG9DW3CH', '0', 0, '0', 1637397844, 0),
(24, '1G0YTCD5FA', '0', 0, '0', 1637566487, 0),
(25, '126AU75VYC', 'HOTEL OWNER', 10, '0', 1637660484, 1),
(26, '8D67FFQM9E', 'TRAVELLER', 17, '0', 1637660734, 0),
(27, 'AWWJQ2FFV5', 'DMC', 6, '0', 1638055037, 0),
(28, '9YT3ZI363I', 'DMC', 9, '0', 1638055209, 1),
(29, '1G0YTCD5FA', 'DMC', 79, '0', 1638101848, 1),
(30, '1G0YTCD5FA', 'DMC', 77, '0', 1638101975, 1),
(31, '1G0YTCD5FA', 'DMC', 83, '0', 1638101983, 1),
(32, '9YT3ZI363I', 'DMC', 100, '0', 1638104589, 1),
(33, 'OROJARGY33', 'DMC', 3, 'ITEM.CATEG', 1638194809, 0),
(34, '8D67FFQM9E', 'TRAVELLER', 5, 'SUITE', 1638194980, 1);

-- --------------------------------------------------------

--
-- Table structure for table `override`
--

CREATE TABLE `override` (
  `id` int(255) NOT NULL,
  `recipient` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `amount1` int(50) NOT NULL DEFAULT 0,
  `amount2` int(50) NOT NULL DEFAULT 0,
  `amount3` int(50) NOT NULL DEFAULT 0,
  `start_duration` int(20) NOT NULL DEFAULT 0,
  `end_duration` int(20) NOT NULL DEFAULT 0,
  `override1` int(20) DEFAULT 0,
  `override2` int(20) NOT NULL DEFAULT 0,
  `override3` int(20) NOT NULL DEFAULT 0,
  `nature` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `timestamp` int(50) NOT NULL DEFAULT 0,
  `display` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `override`
--

INSERT INTO `override` (`id`, `recipient`, `type`, `amount1`, `amount2`, `amount3`, `start_duration`, `end_duration`, `override1`, `override2`, `override3`, `nature`, `timestamp`, `display`) VALUES
(22, 'T9I1OJTKV1', 'DMC', 11, 12, 13, 1638313200, 1638572400, 14, 15, 16, 'IN', 1638194525, 1),
(23, 'RJ9UWVWPO1', 'DMC', 11, 12, 13, 1638313200, 1638572400, 14, 15, 16, 'IN', 1638194587, 1),
(24, 'T9I1OJTKV1', 'DMC', 11, 12, 115, 1638399600, 1638572400, 116, 117, 118, 'OUT', 1638194736, 1),
(25, 'RJ9UWVWPO1', 'DMC', 113, 121, 115, 1638399600, 1638572400, 117, 118, 117, 'OUT', 1638194757, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(255) NOT NULL,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `role` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `timestamp` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `role`, `timestamp`) VALUES
(1, 'Traveller', 'TRAVELLER', 0),
(2, 'Hotel-Chain', 'HOTELCHAIN', 0),
(3, 'DMC', 'DMC', 0),
(4, 'Agent-Influencer', 'INFLUENCER', 0),
(5, 'Account Owner', 'ACCOUNTOWNER', 0),
(6, 'Super Admin', 'SUPERADMIN', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `id` int(100) NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `display` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`id`, `category`, `display`) VALUES
(1, 'hills', 0),
(2, 'waterfall', 0),
(5, 'backdoor', 0),
(6, 'Deluxe', 0),
(7, 'Waterfront', 0),
(8, 'park view', 1),
(9, 'lakers', 0),
(10, 'home', 0),
(11, 'bolls', 0),
(12, 'parkview', 0),
(13, 'single', 0),
(14, 'pol', 0),
(15, 'Seaside', 1),
(16, 'Standard', 1),
(17, 'cars', 0),
(18, 'Suite', 1);

-- --------------------------------------------------------

--
-- Table structure for table `selected_amenities`
--

CREATE TABLE `selected_amenities` (
  `id` int(100) NOT NULL,
  `room_amenities` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amenities_id` int(100) NOT NULL,
  `roomtoken` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `selected_amenities`
--

INSERT INTO `selected_amenities` (`id`, `room_amenities`, `amenities_id`, `roomtoken`) VALUES
(1, 'agile', 4, 12345),
(2, 'waterfall', 2, 12345),
(3, 'firewall', 0, 0),
(4, 'router', 0, 0),
(6, 'Cable', 25, 8),
(7, 'Hot &amp;amp; Cold bath', 24, 0),
(8, 'Cable', 25, 0),
(9, 'complementary breakfast', 18, 9),
(10, 'Hot &amp;amp; Cold bath', 24, 9),
(11, 'Cable', 25, 9),
(12, 'Free WiFi', 26, 9),
(13, 'Free Massages', 28, 9),
(14, 'Continental Breakfast', 27, 9),
(15, 'Hot &amp;amp; Cold bath', 24, 0),
(16, 'Cable', 25, 0),
(17, 'complementary breakfast', 18, 0),
(18, 'Hot &amp;amp; Cold bath', 24, 0),
(19, 'Cable', 25, 0),
(20, 'Free WiFi', 26, 0),
(21, 'complementary breakfast', 18, 3),
(22, 'Hot &amp;amp; Cold bath', 24, 3),
(23, 'complementary breakfast', 18, 0),
(24, 'Hot &amp;amp; Cold bath', 24, 0),
(25, 'Free WiFi', 26, 0),
(26, 'Continental Breakfast', 27, 0),
(27, 'complementary breakfast', 18, 0),
(28, 'Cable', 25, 0),
(29, 'Free WiFi', 26, 0),
(30, 'complementary breakfast', 18, 0),
(31, 'Hot &amp;amp; Cold bath', 24, 0),
(32, 'Free WiFi', 26, 0),
(33, 'complementary breakfast', 18, 0),
(34, 'Free Massages', 28, 0),
(35, 'Hot &amp;amp; Cold bath', 24, 0),
(36, 'Cable', 25, 0),
(37, 'Continental Breakfast', 27, 0),
(38, 'Free WiFi', 26, 0),
(39, 'complementary breakfast', 18, 0),
(40, 'Free WiFi', 26, 0),
(41, 'complementary breakfast', 18, 0),
(42, 'Free WiFi', 26, 0),
(43, 'complementary breakfast', 18, 107),
(44, 'Free WiFi', 26, 107),
(45, 'Hot &amp;amp; Cold bath', 24, 65),
(46, 'complementary breakfast', 18, 65),
(47, 'Free Massages', 28, 65),
(48, 'Cable', 25, 65),
(49, 'complementary breakfast', 18, 0),
(50, 'Free WiFi', 26, 0),
(51, 'complementary breakfast', 18, 0),
(52, 'Free Massages', 28, 0),
(53, 'Hot &amp;amp; Cold bath', 24, 0),
(54, 'Free WiFi', 26, 0),
(55, 'Continental Breakfast', 27, 0),
(56, 'complementary breakfast', 18, 0),
(57, 'Free Massages', 28, 0),
(58, 'Hot &amp;amp; Cold bath', 24, 0),
(59, 'Free WiFi', 26, 0),
(60, 'Continental Breakfast', 27, 0),
(61, 'Hot &amp;amp; Cold bath', 24, 0),
(62, 'Hot &amp;amp; Cold bath', 24, 7),
(63, 'Cable', 25, 7),
(64, 'Free WiFi', 26, 7),
(65, 'Continental Breakfast', 27, 7),
(66, 'complementary breakfast', 18, 0),
(67, 'Hot &amp;amp; Cold bath', 24, 0),
(68, 'Free Massages', 28, 0),
(69, 'complementary breakfast', 18, 0),
(70, 'Cable', 25, 0),
(71, 'Free WiFi', 26, 0),
(72, 'Continental Breakfast', 27, 0),
(73, 'complementary breakfast', 18, 0),
(74, 'Continental Breakfast', 27, 0),
(75, 'Cable', 25, 0),
(76, 'Free WiFi', 26, 0),
(77, 'Free Massages', 28, 0),
(78, 'Bungalow', 29, 0),
(79, 'complementary breakfast', 18, 0),
(80, 'complementary breakfast', 18, 925),
(81, 'Free Massages', 28, 925),
(82, 'Free Massages', 28, 0),
(83, 'Hot &amp;amp; Cold bath', 24, 0),
(84, 'Continental Breakfast', 27, 0),
(85, 'complementary breakfast', 18, 0),
(86, 'Free WiFi', 26, 0),
(87, 'Hot &amp;amp; Cold bath', 24, 0),
(88, 'Free Massages', 28, 0),
(89, 'complementary breakfast', 18, 2147483647),
(90, 'Free WiFi', 26, 2147483647),
(91, 'complementary breakfast', 18, 2147483647),
(92, 'Hot &amp;amp; Cold bath', 24, 2147483647),
(93, 'Free WiFi', 26, 2147483647),
(94, 'Cable', 25, 2147483647),
(95, 'Free Massages', 28, 2147483647),
(96, 'complementary breakfast', 18, 2147483647),
(97, 'Continental Breakfast', 27, 2147483647),
(98, 'Free WiFi', 26, 81932580),
(99, 'Continental Breakfast', 27, 30350390),
(100, 'complementary breakfast', 18, 62794415),
(101, 'Free WiFi', 26, 7481041),
(102, 'Free Massages', 28, 7481041),
(103, 'complementary breakfast', 18, 81287943),
(104, 'Continental Breakfast', 27, 81287943),
(105, 'Bungalow', 29, 81287943),
(106, 'Free Massages', 28, 48685413),
(107, 'complementary breakfast', 18, 56870759),
(108, 'Hot &amp;amp; Cold bath', 24, 56870759),
(109, 'complementary breakfast', 18, 50956291),
(110, 'Cable', 25, 50956291),
(111, 'complementary breakfast', 18, 87847825),
(112, 'Free Massages', 28, 87847825),
(113, 'complementary breakfast', 18, 1164671),
(114, 'Free Massages', 28, 1164671),
(115, 'complementary breakfast', 18, 31047155),
(116, 'Hot &amp;amp; Cold bath', 24, 31047155),
(117, 'Free WiFi', 26, 31047155),
(118, 'Free Massages', 28, 31047155),
(119, 'Continental Breakfast', 27, 31047155),
(120, 'Hot &amp;amp; Cold bath', 24, 6053608),
(121, 'complementary breakfast', 18, 6053608),
(122, 'Free Massages', 28, 6053608),
(123, 'Free WiFi', 26, 6053608),
(124, 'Bungalow', 29, 6053608),
(125, 'complementary breakfast', 18, 60736542),
(126, 'Cable', 25, 60736542),
(127, 'complementary breakfast', 18, 64728062),
(128, 'Continental Breakfast', 27, 64728062),
(129, 'Free WiFi', 26, 72021055),
(130, 'complementary breakfast', 18, 65354797),
(131, 'Continental Breakfast', 27, 65354797),
(132, 'Bungalow', 29, 65354797),
(133, 'Hot &amp;amp; Cold bath', 24, 5620799),
(134, 'complementary breakfast', 18, 9665184),
(135, 'Continental Breakfast', 27, 9665184),
(136, 'complementary breakfast', 18, 13215112),
(137, 'Free WiFi', 26, 13215112),
(138, 'Continental Breakfast', 27, 13215112),
(139, 'Free WiFi', 26, 65314314);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(255) NOT NULL,
  `appname` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `appmail` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `appphone` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `appname`, `appmail`, `appphone`) VALUES
(1, 'HotelsOffline', 'hello@hotelsoffline.com', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `special_markup`
--

CREATE TABLE `special_markup` (
  `id` int(255) NOT NULL,
  `markup` int(10) NOT NULL DEFAULT 0,
  `markup_id` int(10) NOT NULL DEFAULT 0,
  `user_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `usertoken` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `timestamp` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `special_markup`
--

INSERT INTO `special_markup` (`id`, `markup`, `markup_id`, `user_type`, `usertoken`, `timestamp`) VALUES
(1, 1, 25, 'DMC', 'JHVJV', 1637923600),
(2, 12, 26, 'HOTEL_OWNER', 'JHVJV', 1637923713),
(3, 11, 26, 'RJ9UWVWPO1', '{&amp;#34;success&am', 1638041367),
(4, 9, 26, 'DMC', 'RJ9UWVWPO1', 1638041466),
(5, 5, 28, 'DMC', '8TB2UQTCOE', 1638207274);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `token` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `mail` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `fname` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'first name',
  `lname` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT 'last name',
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pword` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `activated` int(255) NOT NULL DEFAULT 0 COMMENT 'activated users will have a value of 1',
  `timestamp` int(255) NOT NULL DEFAULT 0,
  `role` int(255) NOT NULL DEFAULT 0,
  `longitude` int(255) NOT NULL DEFAULT 0,
  `latitude` int(255) NOT NULL DEFAULT 0,
  `approved` int(200) NOT NULL DEFAULT 0,
  `country` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_create` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip_update` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `token`, `mail`, `fname`, `lname`, `phone`, `address`, `pword`, `activated`, `timestamp`, `role`, `longitude`, `latitude`, `approved`, `country`, `city`, `ip_create`, `ip_update`) VALUES
(15, 'Z2F97CTVW2', 'david.akokodaripon@take.net', 'DAVID', 'Akokodaripon', '+2348056382363', '', '41146bf074ac185c36f13f59136623f0', 0, 1626865191, 1, 0, 0, 0, '', '', '', '0'),
(16, '89Y5JO1YDG', 'david.akokodaripon@takenet', 'David', 'bola', '+2348056382363', '', '41146bf074ac185c36f13f59136623f0', 0, 1626866295, 1, 0, 0, 0, '', '', '', '0'),
(17, 'L7AYOVLTCT', 'akinOlawande@mail.com', 'Olawande', 'Pepper', '08069366034', '', '1a1dc91c907325c69271ddf0c944bc72', 0, 1626875808, 1, 0, 0, 0, '', '', '', '0'),
(19, 'RJ9UWVWPO1', 'dacoaliesamuel@gmail.com', 'Ola', 'Samuel', '08069366034', '', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1627396467, 3, 8, 10, 0, '', '', '', '129.205.113.44'),
(20, 'QDJ43KMZ5P', 'akinmosinolawande@yahoo.com', 'Ola', 'Akin', '08069366034', '', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1627540901, 5, 8, 10, 0, '', '', '', '129.205.113.44'),
(21, '7KU2WP9TDA', 'cmd@expertcaredmcc.com', 'Ahmed', 'Elabd', '010002000300', '', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 0, 1627902563, 1, 0, 0, 0, '', '', '', '0'),
(22, '8TB2UQTCOE', 'super.guide@yahoo.com', 'Ahmed', 'Dmc', '010002000300', '', '2c9341ca4cf3d87b9e4eb905d6a3ec45', 0, 1627906919, 3, 0, 0, 0, '', '', '', '91.73.37.22'),
(24, 'FKLI1RFRGO', 'olawandesamuel@gmail.com', 'Olawande', 'Akinmosin', '+2348069366034', '', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1628074548, 5, 8, 10, 0, '', '', '', '129.205.113.38'),
(25, 'MZ9J4GRI86', 'akinmosinolawande@gmail.com', 'Olawande', 'Akinmosin', '+2348069366034', '', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1628357604, 2, 8, 10, 0, '', '', '', '129.205.113.44'),
(26, 'T9I1OJTKV1', 'samueldacoal@gmail.com', 'Olawande', 'Akinmosin', '+2348069366034', '', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1628361093, 3, 8, 10, 0, 'canada', 'toronto', '', '129.205.112.191'),
(27, 'D4QM0WR4U4', 'admin@pcr-dubai.com', 'Account', 'Owner', '585110110', '', '827ccb0eea8a706c4c34a16891f84e7b', 0, 1628866786, 5, 0, 0, 0, '', '', '', '0'),
(28, 'B9WYP1T4PM', 'ayodeletim@gmail.com', 'Timothy', 'Ayodele', '08037837313', '', 'c8400628587a094c1e2e979b652d9047', 0, 1628870553, 5, 0, 0, 0, '', '', '', '91.74.41.59'),
(29, '7ZNQ05CN5V', 'sakinmosin621@stu.ui.edu.ng', 'Big', 'Wande', '+2348069366034', '', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1628876261, 5, 0, 0, 0, '', '', '', '0'),
(31, 'EQ7K5ERHUV', 'admin@servapp.shop', 'Ahmed', 'Elabd', '00971585110110', '', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1629217611, 3, 0, 0, 0, '', '', '', '187.86.32.18'),
(32, '71HTCPXGRN', 'davidakokoadedayo@gmail.com', 'David', 'Akokodaripon', '+2348056382363', '', '827ccb0eea8a706c4c34a16891f84e7b', 0, 1629245655, 3, 0, 0, 0, '', '', '', '0'),
(33, 'CSIC9MIPN1', 'fireswitchtech@gmail.com', 'FireSwitch', 'Technologies', '+2348037837313', '', 'c8400628587a094c1e2e979b652d9047', 1, 1629284108, 3, 0, 0, 0, '', '', '', '91.73.37.22'),
(34, 'FSUVP6E5RX', 'shedahouse@gmail.com', 'Sheda', 'House', '08037837313', '', 'c8400628587a094c1e2e979b652d9047', 0, 1629291855, 2, 0, 0, 0, '', '', '', '41.242.77.123'),
(35, 'Y52BGIUXV6', 'admin@dubai-pcr.com', 'Ahmed', 'Elabd', '00971585110110', '', '827ccb0eea8a706c4c34a16891f84e7b', 1, 1629815012, 5, 0, 0, 0, '', '', '', '0'),
(36, 'jhvjv', 'admin@hotelsoffline.com', 'Admin', 'Super', '0', '', 'c8400628587a094c1e2e979b652d9047', 1, 0, 6, 8, 10, 0, '', '', '', '94.205.155.122'),
(37, 'WCBFERVT8H', 'admin@std-dubai.com', 'Ahmed', 'Elabd', '0585110110', '', '68eacb97d86f0c4621fa2b0e17cabd8c', 1, 1634279543, 5, 0, 0, 0, '', '', '', '0'),
(39, '5RTJHJ2MAK', 'sogo@gmail.com', 'Sogo', 'Oyerinde', '08187907998', 'Ashi-bodija, Ibadan', 'dfbb885c6e4743f30025399a97c65ab0', 0, 1634654288, 0, 0, 0, 0, '0', '0', '41.242.77.123', '84.17.45.159');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(255) NOT NULL,
  `usertoken` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `type` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `log` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `amount` int(100) NOT NULL DEFAULT 0,
  `timestamp` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `usertoken`, `type`, `log`, `amount`, `timestamp`) VALUES
(1, 'QDJ43KMZ5P', 'credit', 'credits', 55000, 1627579356),
(2, 'QDJ43KMZ5P', 'credit', 'credits', 25000, 1627579400),
(3, 'QDJ43KMZ5P', 'credit', 'credits', 45000, 1627579417),
(4, 'QDJ43KMZ5P', 'debit', 'debits', -45000, 1627579428),
(5, 'QDJ43KMZ5P', 'debit', 'debits', -12500, 1627579465);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apptoken_tb`
--
ALTER TABLE `apptoken_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_creds`
--
ALTER TABLE `business_creds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `init_contract`
--
ALTER TABLE `init_contract`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_tb`
--
ALTER TABLE `mail_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `markup`
--
ALTER TABLE `markup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `override`
--
ALTER TABLE `override`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected_amenities`
--
ALTER TABLE `selected_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `special_markup`
--
ALTER TABLE `special_markup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `apptoken_tb`
--
ALTER TABLE `apptoken_tb`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business_creds`
--
ALTER TABLE `business_creds`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14654;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `hotel_rooms`
--
ALTER TABLE `hotel_rooms`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `init_contract`
--
ALTER TABLE `init_contract`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1722;

--
-- AUTO_INCREMENT for table `mail_tb`
--
ALTER TABLE `mail_tb`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1131;

--
-- AUTO_INCREMENT for table `markup`
--
ALTER TABLE `markup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `override`
--
ALTER TABLE `override`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_category`
--
ALTER TABLE `room_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `selected_amenities`
--
ALTER TABLE `selected_amenities`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `special_markup`
--
ALTER TABLE `special_markup`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
