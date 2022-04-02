-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2022 at 03:23 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2ed`
--

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `ST_id` int(11) NOT NULL COMMENT 'รหัสนิสิต',
  `select_result` varchar(10) NOT NULL COMMENT 'ผลการคัดเลือก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `confirm`
--

CREATE TABLE `confirm` (
  `ST_id` int(11) NOT NULL COMMENT 'รหัสนิสิต',
  `St_confirm` varchar(10) NOT NULL COMMENT 'ยินยันสิทธิ์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `f_major`
--

CREATE TABLE `f_major` (
  `Fmajor_id` int(2) UNSIGNED NOT NULL COMMENT 'รหัสเอกที่1',
  `Fmajor_name` varchar(30) NOT NULL COMMENT 'ชื่อเอกที่1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `f_round`
--

CREATE TABLE `f_round` (
  `Fround_id` int(2) NOT NULL COMMENT 'เลขที่รอบ',
  `Fround_name` varchar(30) NOT NULL COMMENT 'ชื่อรอบ',
  `Smajor_id` int(2) NOT NULL COMMENT 'รหัสเอกที่2',
  `Ffile_id` int(2) NOT NULL COMMENT 'เลขที่ไฟล์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `f_upload_file`
--

CREATE TABLE `f_upload_file` (
  `Ffile_id` int(2) NOT NULL COMMENT 'เลขที่ไฟล์',
  `Ffile_name` varchar(50) NOT NULL DEFAULT current_timestamp() COMMENT 'ชื่อไฟล์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `overveiw`
--

CREATE TABLE `overveiw` (
  `Year_learn` int(4) NOT NULL COMMENT 'ปีการศึกษา',
  `ST_id` int(11) NOT NULL COMMENT 'รหัสนิสิต',
  `Round_id` int(2) NOT NULL COMMENT 'เลขที่รอบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `R_id` int(2) UNSIGNED NOT NULL COMMENT 'เลขที่คำร้อง',
  `R_date` date NOT NULL COMMENT 'วันที่คำร้อง',
  `ST_id` varchar(255) NOT NULL COMMENT 'รหัสนิสิต',
  `R_type` int(2) NOT NULL COMMENT 'ประเภทคำร้อง',
  `R_detail` varchar(255) NOT NULL COMMENT 'รายละเอียดคำร้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`R_id`, `R_date`, `ST_id`, `R_type`, `R_detail`) VALUES
(2, '2022-04-02', '63105010052', 1, 'op'),
(7, '2022-04-02', '63105010050', 1, 'uyikyukyu'),
(8, '2022-04-02', '63105010052', 1, 'yyyyy'),
(11, '2022-04-02', '63105010052', 1, 'iiiiii'),
(12, '2022-04-02', '63105010052', 1, '111');

-- --------------------------------------------------------

--
-- Table structure for table `request_type`
--

CREATE TABLE `request_type` (
  `R_type` int(2) UNSIGNED NOT NULL,
  `Type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_type`
--

INSERT INTO `request_type` (`R_type`, `Type_name`) VALUES
(1, 'การใช้โปรแกรม'),
(2, 'ติดต่อเจ้าหน้าที่');

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `Round_id` int(2) NOT NULL COMMENT 'เลขที่รวมรอบ',
  `Round_name` varchar(30) NOT NULL COMMENT 'ชื่อรอบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `ST_id` int(11) NOT NULL COMMENT 'รหัสนิสิต',
  `status` varchar(10) NOT NULL COMMENT 'สถานะระหว่างตรวจสอบข้อมูล'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `st_apply_round`
--

CREATE TABLE `st_apply_round` (
  `Year_learn` int(4) NOT NULL COMMENT 'ปีการศึกษา',
  `ST_id` int(11) NOT NULL COMMENT 'รหัสนิสิต',
  `Round_id` int(2) NOT NULL COMMENT 'เลขที่รอบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `s_major`
--

CREATE TABLE `s_major` (
  `Smajor_id` int(2) UNSIGNED NOT NULL COMMENT 'รหัสเอกที่2',
  `Smajor_name` varchar(30) NOT NULL COMMENT 'ชื่อเอกที่2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `s_round`
--

CREATE TABLE `s_round` (
  `Sround_id` int(2) NOT NULL COMMENT 'เลขที่รอบ',
  `Sround_name` varchar(30) NOT NULL COMMENT 'ชื่อรอบ',
  `Sfile_id` int(2) NOT NULL COMMENT 'เลขที่ไฟล์',
  `Smajor_id` int(2) NOT NULL COMMENT 'รหัสเอกที่2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `s_upload_file`
--

CREATE TABLE `s_upload_file` (
  `Sfile_id` int(2) NOT NULL COMMENT 'เลขที่ไฟล์',
  `Sfile_name` varchar(50) NOT NULL DEFAULT current_timestamp() COMMENT 'ชื่อไฟล์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `Round_id` int(2) NOT NULL COMMENT 'เลขที่รอบ',
  `link_test` varchar(255) NOT NULL COMMENT 'ลิงค์เข้าสอบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_round`
--

CREATE TABLE `t_round` (
  `tround_id` int(2) NOT NULL COMMENT 'เลขที่รอบ',
  `tround_name` varchar(30) NOT NULL COMMENT 'ชื่อรอบ',
  `tfile_id` int(2) NOT NULL COMMENT 'เลขที่ไฟล์',
  `tmajor_id` int(2) NOT NULL COMMENT 'รหัสเอกที่2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t_upload_file`
--

CREATE TABLE `t_upload_file` (
  `tfile_id` int(2) NOT NULL COMMENT 'เลขที่ไฟล์',
  `tfile_name` varchar(50) NOT NULL DEFAULT current_timestamp() COMMENT 'ชื่อไฟล์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_nisit`
--

CREATE TABLE `user_nisit` (
  `ST_id` varchar(255) NOT NULL COMMENT 'รหัสนิสิต',
  `Prefix` varchar(10) NOT NULL COMMENT 'คำนำหน้า',
  `Sname` varchar(30) NOT NULL COMMENT 'ชื่อนิสิต',
  `Lname` varchar(30) NOT NULL COMMENT 'นามสกุลนิสิต',
  `Sex` varchar(10) NOT NULL COMMENT 'เพศ',
  `password` varchar(255) NOT NULL COMMENT 'รหัสผ่าน',
  `mail` varchar(50) NOT NULL COMMENT 'อีเมลล์',
  `contract` int(10) NOT NULL COMMENT 'เบอร์โทรศัพท์',
  `Fmajor_id` int(2) NOT NULL COMMENT 'เอกที่1',
  `Role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_nisit`
--

INSERT INTO `user_nisit` (`ST_id`, `Prefix`, `Sname`, `Lname`, `Sex`, `password`, `mail`, `contract`, `Fmajor_id`, `Role`) VALUES
('63101050050', 'นาย', 'เพชร', 'แก', 'ชาย', '$2y$10$5Lg1/Itd5/oY2HQdCzedO.ZnSLaB5YLc2GLmVPVKN9EyVBIe7cxWW', 'kamon.@gmail.com', 991857334, 7, 'member'),
('63105010052', 'นาย', 'กมลเพชร', 'สิริรัตนศักดิ์กุล', 'ชาย', '$2y$10$gM92XpFI1czKLKiDTgMfYOhmDGMo5ACMf47.VleThFFf/IMM9SdpS', 'kmp@gmail.com', 999999999, 7, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `f_major`
--
ALTER TABLE `f_major`
  ADD PRIMARY KEY (`Fmajor_id`);

--
-- Indexes for table `f_round`
--
ALTER TABLE `f_round`
  ADD PRIMARY KEY (`Fround_id`);

--
-- Indexes for table `f_upload_file`
--
ALTER TABLE `f_upload_file`
  ADD PRIMARY KEY (`Ffile_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`R_id`);

--
-- Indexes for table `request_type`
--
ALTER TABLE `request_type`
  ADD PRIMARY KEY (`R_type`);

--
-- Indexes for table `round`
--
ALTER TABLE `round`
  ADD PRIMARY KEY (`Round_id`);

--
-- Indexes for table `st_apply_round`
--
ALTER TABLE `st_apply_round`
  ADD PRIMARY KEY (`Year_learn`);

--
-- Indexes for table `s_major`
--
ALTER TABLE `s_major`
  ADD PRIMARY KEY (`Smajor_id`);

--
-- Indexes for table `s_round`
--
ALTER TABLE `s_round`
  ADD PRIMARY KEY (`Sround_id`);

--
-- Indexes for table `s_upload_file`
--
ALTER TABLE `s_upload_file`
  ADD PRIMARY KEY (`Sfile_id`);

--
-- Indexes for table `t_round`
--
ALTER TABLE `t_round`
  ADD PRIMARY KEY (`tround_id`);

--
-- Indexes for table `t_upload_file`
--
ALTER TABLE `t_upload_file`
  ADD PRIMARY KEY (`tfile_id`);

--
-- Indexes for table `user_nisit`
--
ALTER TABLE `user_nisit`
  ADD PRIMARY KEY (`ST_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `f_major`
--
ALTER TABLE `f_major`
  MODIFY `Fmajor_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสเอกที่1';

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `R_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'เลขที่คำร้อง', AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `request_type`
--
ALTER TABLE `request_type`
  MODIFY `R_type` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `s_major`
--
ALTER TABLE `s_major`
  MODIFY `Smajor_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสเอกที่2';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
