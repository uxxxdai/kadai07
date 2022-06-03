-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 03, 2022 at 04:04 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otoshimono_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `otoshimono_table`
--

CREATE TABLE `otoshimono_table` (
  `id` int(12) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `hinmei` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `otoshimono_table`
--

INSERT INTO `otoshimono_table` (`id`, `file_name`, `file_path`, `hinmei`, `color`, `size`, `brand`, `description`, `insert_date`, `update_date`, `latitude`, `longitude`, `place`) VALUES
(71, '7f505dcb-p.jpg', 'images/202206030404347f505dcb-p.jpg', '人形', '', '', '', '公園のベンチに置いてきた', '2022-06-03 13:04:34', '2022-06-03 20:05:19', '35.6590242', '139.7217861', ''),
(72, 'shutterstock_662409262.jpg', 'images/20220603040558shutterstock_662409262.jpg', '財布', 'くろ', '普通の', '', '麻布警察に届けた', '2022-06-03 13:05:58', '2022-06-03 13:05:58', '35.6590242', '139.7217861', ''),
(73, '落とし物.jpg', 'images/20220603041243落とし物.jpg', 'お金', '', '', '', 'とりあえず家に持ち帰りました。', '2022-06-03 13:12:43', '2022-06-03 19:27:36', '36.6590242', '139.9017861', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `otoshimono_table`
--
ALTER TABLE `otoshimono_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `otoshimono_table`
--
ALTER TABLE `otoshimono_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
