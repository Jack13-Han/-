-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 01, 2026 at 01:46 PM
-- Server version: 8.4.2
-- PHP Version: 8.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `災害`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int NOT NULL,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `con_password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `deployment` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hiring_date` date NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `con_password`, `phone`, `deployment`, `position`, `hiring_date`, `date_of_birth`, `address`, `is_admin`, `created_at`) VALUES
(2250116, 'Tan San', 'tan@gmail.com', '12345678', '12345678', 80882311, '営業部', '社員', '2026-04-16', '2006-04-21', '大阪', 1, '2026-04-17 06:04:26'),
(2250266, 'Han San', 'han@gmail.com', '12345678', '12345678', 8932123, '総務部', '社員', '2026-04-16', '2020-04-06', 'Juso', 1, '2026-04-17 06:21:12'),
(2250287, 'Yuuto San', 'yuuto@gmail.com', '12345678', '12345678', 184721, '開発部', '社員', '2026-04-16', '2026-04-14', '和歌山', 1, '2026-04-17 06:51:35'),
(2250366, 'Hnin San', 'hnin@gmail.com', '12345678', '12345678', 9271323, '企画部', '社員', '2026-04-15', '2026-04-02', 'Osaka', 1, '2026-04-17 06:21:12'),
(2250413, 'HaMashou San', 'hamashou@gmail.com', '12345678', '12345678', 89324118, '財務部', '社員', '2026-04-16', '2004-04-14', '大阪', 1, '2026-04-17 06:04:26'),
(2250416, 'DoiAyane', 'doi@gmail.com', '12345678', '12345678', 94889454, '企画部', '社員', '2026-04-28', '2017-06-28', 'Osaka', 1, '2026-04-28 06:46:50');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `emp_no` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deployment` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` enum('安全','安全じゃない') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`emp_no`, `name`, `deployment`, `comment`, `data`, `created_at`) VALUES
(2250287, 'Yuuto San', '開発部', '大丈夫です', '安全', '2026-04-24 07:21:44'),
(2250366, 'Hnin San', '企画部', '助けてほしい。', '安全じゃない', '2026-04-24 07:23:01'),
(2250366, 'Hnin San', '企画部', '助けてほしい。', '安全じゃない', '2026-04-24 07:23:28'),
(2250266, 'Han San', '総務部', '大丈夫です', '安全', '2026-04-24 07:35:05'),
(2250116, 'Tan San', '営業部', 'BBB', '安全', '2026-04-24 07:36:12'),
(2250116, 'Tan San', '営業部', 'Troy', '安全じゃない', '2026-04-24 07:36:29'),
(2250266, 'Han San', '総務部', '大丈夫です', '安全', '2026-04-28 04:55:34'),
(2250266, 'Han San', '総務部', 'tythgf', '安全', '2026-04-28 06:25:20'),
(2250266, 'Han San', '総務部', 'hi okiok', '安全', '2026-04-28 06:27:39'),
(2250266, 'Han San', '総務部', '助けてほしい。', '安全じゃない', '2026-04-28 06:40:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD KEY `emp_no` (`emp_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2250417;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_ibfk_1` FOREIGN KEY (`emp_no`) REFERENCES `register` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
