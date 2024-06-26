-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 01, 2022 at 06:42 AM
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
-- Table structure for table `acc`
--

CREATE TABLE `acc` (
  `A_id` int(10) UNSIGNED NOT NULL COMMENT 'เลขที่ประกาศ',
  `ST_id` varchar(255) DEFAULT NULL COMMENT 'รหัสนิสิต',
  `Round_id` int(11) DEFAULT NULL COMMENT 'เลขที่รอบที่สมัคร',
  `Status` varchar(30) DEFAULT NULL COMMENT 'สถานะระหว่างการตรวจสอบข้อมูล',
  `Select_result` varchar(30) DEFAULT NULL COMMENT 'ประกาศผลการคัดเลือกเข้าแต่ละเอกคู่',
  `St_confirm` varchar(30) DEFAULT NULL COMMENT 'ยืนยันสิทธิ์เข้าแต่ละเอกคู่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `f_major`
--

CREATE TABLE `f_major` (
  `Fmajor_id` int(2) UNSIGNED NOT NULL COMMENT 'รหัสเอกที่1',
  `Fmajor_name` varchar(30) DEFAULT NULL COMMENT 'ชื่อเอกที่1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_major`
--

INSERT INTO `f_major` (`Fmajor_id`, `Fmajor_name`) VALUES
(1, 'การประถมศึกษา'),
(2, 'อุตสาหกรรมศึกษา'),
(3, 'เทคโนโลยีการศึกษา'),
(4, 'จิตวิทยาและการแนะแนว'),
(5, 'การวัดประเมินและวิจัยการศึกษา'),
(6, 'การศึกษาพิเศษ'),
(7, 'การศึกษาตลอดชีวิต'),
(8, 'การศึกษาเพื่อพัฒนาชุมชน'),
(9, 'คุณครู'),
(10, 'ใหญ่สุด');

-- --------------------------------------------------------

--
-- Table structure for table `f_round`
--

CREATE TABLE `f_round` (
  `Fr_id` int(10) UNSIGNED NOT NULL COMMENT 'เลขที่สมัครรอบที่ 1',
  `Round_id` int(2) DEFAULT NULL COMMENT 'เลขที่รอบ',
  `ST_id` varchar(255) DEFAULT NULL COMMENT 'รหัสนิสิต',
  `Smajor_id` int(2) DEFAULT NULL COMMENT 'รหัสเอกที่2',
  `Ffile_id` varchar(255) DEFAULT NULL COMMENT 'ชื่อ\r\nไฟล์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `f_round`
--

INSERT INTO `f_round` (`Fr_id`, `Round_id`, `ST_id`, `Smajor_id`, `Ffile_id`) VALUES
(22, 1, '63105010052', 7, '/CED214/upload/งานศิลปะที่ไม่มีชื่อ(1).pdf'),
(23, 1, '63105010050', 1, NULL),
(24, 1, '63105010056', 2, NULL),
(25, 1, '63105010052', 3, NULL),
(26, 1, '63105010050', 4, NULL),
(27, 1, '63105010052', 5, NULL),
(28, 1, '63105010052', 6, NULL),
(29, 1, '63105010065', 7, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `R_id` int(2) UNSIGNED NOT NULL COMMENT 'เลขที่คำร้อง',
  `R_date` date DEFAULT NULL COMMENT 'วันที่คำร้อง',
  `ST_id` varchar(255) DEFAULT NULL COMMENT 'รหัสนิสิต',
  `R_type` int(2) DEFAULT NULL COMMENT 'ประเภทคำร้อง',
  `R_detail` varchar(255) DEFAULT NULL COMMENT 'รายละเอียดคำร้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`R_id`, `R_date`, `ST_id`, `R_type`, `R_detail`) VALUES
(2, '2022-04-02', '63105010052', 1, 'op'),
(7, '2022-04-03', '63105010050', 1, 'uyikyukyu'),
(8, '2022-04-03', '63105010052', 2, 'าส้่ส่า'),
(11, '2022-04-02', '63105010052', 4, 'iiiiii'),
(15, '2022-03-29', '631010052', 1, 'gjhjgjrfffffffffffffhgjhj'),
(16, '2022-04-01', '6310521', 1, 'm;.;,m.;lk;'),
(17, '2022-04-23', '63105010052', 3, 'tthfghgfhft');

-- --------------------------------------------------------

--
-- Table structure for table `request_type`
--

CREATE TABLE `request_type` (
  `R_type` int(2) UNSIGNED NOT NULL COMMENT 'ประเภทคำร้อง',
  `Type_name` varchar(20) DEFAULT NULL COMMENT 'ชื่อประเภทคำร้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_type`
--

INSERT INTO `request_type` (`R_type`, `Type_name`) VALUES
(1, 'การใช้โปรแกรม'),
(2, 'ติดต่อเจ้าหน้าที่'),
(3, 'แก้ไขข้อมูลส่วนตัว'),
(4, 'อื่น ๆ');

-- --------------------------------------------------------

--
-- Table structure for table `round`
--

CREATE TABLE `round` (
  `Round_id` int(2) NOT NULL COMMENT 'เลขที่รวมรอบ',
  `Round_name` varchar(50) DEFAULT NULL COMMENT 'ชื่อรอบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `round`
--

INSERT INTO `round` (`Round_id`, `Round_name`) VALUES
(1, 'รอบยื่นแฟ้มสะสมผลงาน'),
(2, 'รอบยื่นคะแนน 9 วิชาสามัญ'),
(3, 'รอบการสอบ/สัมภาษณ์จากทางมหาวิทยาลัย');

-- --------------------------------------------------------

--
-- Table structure for table `st_apply_round`
--

CREATE TABLE `st_apply_round` (
  `Year_learn` int(4) DEFAULT NULL COMMENT 'ปีการศึกษา',
  `ST_id` int(11) DEFAULT NULL COMMENT 'รหัสนิสิต',
  `Round_id` int(2) DEFAULT NULL COMMENT 'เลขที่รอบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `s_major`
--

CREATE TABLE `s_major` (
  `Smajor_id` int(2) UNSIGNED NOT NULL COMMENT 'รหัสเอกที่2',
  `Smajor_name` varchar(30) DEFAULT NULL COMMENT 'ชื่อเอกที่2',
  `Smajor_name2` varchar(30) DEFAULT NULL,
  `Smajor_name3` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_major`
--

INSERT INTO `s_major` (`Smajor_id`, `Smajor_name`, `Smajor_name2`, `Smajor_name3`) VALUES
(1, 'การศึกษาปฐมวัย', 'การศึกษาปฐมวัย', 'การศึกษาปฐมวัย'),
(2, 'การจัดการเรียนรู้ภาษาไทย', 'การจัดการเรียนรู้ภาษาไทย', 'การจัดการเรียนรู้ภาษาไทย'),
(3, 'การจัดการเรียนรู้ภาษาอังกฤษ', 'การจัดการเรียนรู้ภาษาอังกฤษ', 'การจัดการเรียนรู้ภาษาอังกฤษ'),
(4, 'การจัดการเรียนรู้ภาษาสังคม', 'การจัดการเรียนรู้ภาษาสังคม', 'การจัดการเรียนรู้ภาษาสังคม'),
(5, 'การจัดการเรียนรู้คณิตศาสตร์', 'การจัดการเรียนรู้คณิตศาสตร์', 'การจัดการเรียนรู้คณิตศาสตร์'),
(6, 'การจัดการเรียนรู้วิทยาศาสตร์', 'การจัดการเรียนรู้วิทยาศาสตร์', 'การจัดการเรียนรู้วิทยาศาสตร์'),
(7, 'คอมพิวเตอร์ศึกษา', 'คอมพิวเตอร์ศึกษา', 'คอมพิวเตอร์ศึกษา');

-- --------------------------------------------------------

--
-- Table structure for table `s_round`
--

CREATE TABLE `s_round` (
  `Sr_id` int(10) UNSIGNED NOT NULL COMMENT 'เลขที่สมัครรอบที่ 2',
  `Round_id` int(2) DEFAULT NULL COMMENT 'เลขที่รอบที่สมัคร',
  `ST_id` varchar(255) DEFAULT NULL COMMENT 'รหัสนิสิต',
  `Smajor_id` int(11) DEFAULT NULL COMMENT 'รหัสเอกที่ 2',
  `Thai` int(11) DEFAULT NULL COMMENT 'คะแนนภาษาไทย',
  `Social` int(11) DEFAULT NULL COMMENT 'คะแนนสังคม',
  `English` int(11) DEFAULT NULL COMMENT 'คะแนนอังกฤษ',
  `Math1` int(11) DEFAULT NULL COMMENT 'คะแนนคณิตศาสตร์1',
  `Math2` int(11) DEFAULT NULL COMMENT 'คะแนนคณิตศาสตร์2',
  `Physic` int(11) DEFAULT NULL COMMENT 'คะแนนฟิสิกส์',
  `Chemistry` int(11) DEFAULT NULL COMMENT 'คะแนนเคมี',
  `Biology` int(11) DEFAULT NULL COMMENT 'คะแนนชีววิทยา',
  `Science` int(11) DEFAULT NULL COMMENT 'คะแนนวิทยาศาสตร์ทั่วไป'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `s_round`
--

INSERT INTO `s_round` (`Sr_id`, `Round_id`, `ST_id`, `Smajor_id`, `Thai`, `Social`, `English`, `Math1`, `Math2`, `Physic`, `Chemistry`, `Biology`, `Science`) VALUES
(2, 2, '63105010052', 6, 0, 21, 22, 0, 0, 22, 0, 22, 22),
(3, 2, '63105010052', 1, 12, 45, 15, 47, 89, 52, 0, 0, 0),
(4, 2, '63105010052', 2, 0, 0, 0, 45, 52, 0, 0, 0, 0),
(5, 2, '63105010065', 3, 55, 45, 52, 0, 0, 0, 0, 0, 0),
(6, 2, '63105010050', 4, 0, 0, 0, 4, 55, 63, 77, 85, 0),
(7, 2, '63105010032', 5, 11, 24, 24, 22, 42, 24, 21, 0, 0),
(8, 2, '63105010052', 6, 12, 22, 24, 86, 0, 0, 0, 0, 0),
(9, 2, '63105010050', 7, 14, 74, 57, 63, 63, 0, 74, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_round`
--

CREATE TABLE `t_round` (
  `Tr_id` int(10) UNSIGNED NOT NULL COMMENT 'เลขที่สมัครรอบที่ 3',
  `Round_id` int(11) DEFAULT NULL COMMENT 'เลขที่รอบที่สมัคร',
  `ST_id` varchar(255) DEFAULT NULL COMMENT 'รหัสนิสิต',
  `Smajor_id1` int(2) DEFAULT NULL COMMENT 'รหัสเอกที่ 2 เลือกเป็นอันดับ1',
  `Smajor_id2` int(2) DEFAULT NULL COMMENT 'รหัสเอกที่ 2 เลือกเป็นอันดับ2',
  `Smajor_id3` int(2) DEFAULT NULL COMMENT 'รหัสเอกที่ 2 เลือกเป็นอันดับ3'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_round`
--

INSERT INTO `t_round` (`Tr_id`, `Round_id`, `ST_id`, `Smajor_id1`, `Smajor_id2`, `Smajor_id3`) VALUES
(1, 3, '63105010052', 1, 5, 7),
(2, 3, '63105010063', 7, 4, 1),
(3, 3, '63105010064', 2, 7, 6),
(4, 3, '63105010046', 3, 1, 5),
(5, 3, '63105010089', 4, 6, 7),
(6, 3, '63105010049', 5, 7, 3),
(7, 3, '63105010021', 6, 7, 4),
(8, 3, '63105010154', 7, 1, 2),
(9, 3, '6310501134', 7, 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_nisit`
--

CREATE TABLE `user_nisit` (
  `ST_id` varchar(255) NOT NULL COMMENT 'รหัสนิสิต',
  `Prefix` varchar(10) DEFAULT NULL COMMENT 'คำนำหน้า',
  `Sname` varchar(30) DEFAULT NULL COMMENT 'ชื่อนิสิต',
  `Lname` varchar(30) DEFAULT NULL COMMENT 'นามสกุลนิสิต',
  `Sex` varchar(10) DEFAULT NULL COMMENT 'เพศ',
  `password` varchar(255) DEFAULT NULL COMMENT 'รหัสผ่าน',
  `mail` varchar(50) DEFAULT NULL COMMENT 'อีเมลล์',
  `contract` int(10) DEFAULT NULL COMMENT 'เบอร์โทรศัพท์',
  `Fmajor_id` int(2) DEFAULT NULL COMMENT 'เอกที่1',
  `Role` varchar(10) DEFAULT NULL COMMENT 'สิทธิ์ผู้ใช้งาน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_nisit`
--

INSERT INTO `user_nisit` (`ST_id`, `Prefix`, `Sname`, `Lname`, `Sex`, `password`, `mail`, `contract`, `Fmajor_id`, `Role`) VALUES
('000000000001', 'นางสาว', 'เอ', 'บีซีดีอีเอฟจี', 'หญิง', '$2y$10$qBOJr3jdqX/GwbF5aycf0eUIrblm1fGBZXucnPhMy/IFEQIolUBWW', 'abcdefg@gmail.com', 999900909, 9, 'Teacher'),
('10000000000', NULL, 'Admin', 'Admin', NULL, '$2y$10$RwsDJxt92ugCYnW.1iO3eOS.mcEKZwIhyxEOAUmZFwnviT7Qu7rha', NULL, NULL, 10, 'Admin'),
('63105010050', 'นาย', 'เพชร', 'แก', 'ชาย', '$2y$10$5Lg1/Itd5/oY2HQdCzedO.ZnSLaB5YLc2GLmVPVKN9EyVBIe7cxWW', 'kamon.@gmail.com', 991857334, 3, 'Student'),
('63105010052', 'นาย', 'กมลเพชร', 'สิริรัตนศักดิ์กุล', 'ชาย', '$2y$10$gM92XpFI1czKLKiDTgMfYOhmDGMo5ACMf47.VleThFFf/IMM9SdpS', 'kmp@gmail.com', 999999999, 3, 'Student'),
('63105010062', 'นาย', 'บี', 'บีซีดีอีเอฟจี', 'ชาย', '$2y$10$yN7Sg2AmkfXkuMxtxhmDHOikLabT7sR/VnLIFZtGR59TKNpQBX7LG', NULL, NULL, 1, 'Student'),
('63105010063', 'นางสาว', 'ซี', 'ดีอีเอฟจี', 'หญิง', '$2y$10$CgQnASpiPtmJNlZCeLalneT6XQQWnwhFZP2lRqI6Tyt9w2JstayhG', NULL, NULL, 2, 'Student'),
('63105010086', 'นาย', 'อี', 'อี', 'ชาย', '$2y$10$OerHKq7Sk9zJ5m9TGAZc6OBLFFuwciHBM1jGb7veg0OZuxFisAQjK', NULL, NULL, 4, 'Student'),
('63105010096', 'นาย', 'ดี', 'ดี', 'ชาย', '$2y$10$SOPyjBArljA46V9IuseNHe9ewAPrgT/ofsWQNL./9I6ZCDV5xc3be', NULL, NULL, 5, 'Student'),
('63105010246', 'นาย', 'จี', 'เอชไอ', 'ชาย', '$2y$10$Y166vpjRLJGa69OW/766GO6oFpkwgcopVyGvbWLQZbPppFV6H/W3e', NULL, NULL, 6, 'Student'),
('6310501069', 'นางสาว', 'เค', 'เค', 'หญิง', '$2y$10$4YyGqkCkB9YHRqHYn/kjmOHmosU6IUbNzj/LIuaLvZ7Nd8B86ooIK', NULL, NULL, 7, 'Student'),
('63105010789', 'นางสาว', 'เจ', 'เจ', 'หญิง', '$2y$10$sIZl7aq1pQTqy1Z4UcMh.OjYqGZi9knUAL3ocouVJGyRc6bk1sqFa', NULL, NULL, 8, 'Student'),
('63105010963', 'นางสาว', 'ไอ', 'ไอ', 'หญิง', '$2y$10$7zX/TSRsbKRkgIpKM.HAMeARiYJ6fcHXTKnMF.gzETXfsVwSeQfou', NULL, NULL, 9, 'Student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc`
--
ALTER TABLE `acc`
  ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `f_major`
--
ALTER TABLE `f_major`
  ADD PRIMARY KEY (`Fmajor_id`);

--
-- Indexes for table `f_round`
--
ALTER TABLE `f_round`
  ADD PRIMARY KEY (`Fr_id`);

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
-- Indexes for table `s_major`
--
ALTER TABLE `s_major`
  ADD PRIMARY KEY (`Smajor_id`),
  ADD UNIQUE KEY `Smajor_id` (`Smajor_id`);

--
-- Indexes for table `s_round`
--
ALTER TABLE `s_round`
  ADD PRIMARY KEY (`Sr_id`);

--
-- Indexes for table `t_round`
--
ALTER TABLE `t_round`
  ADD PRIMARY KEY (`Tr_id`);

--
-- Indexes for table `user_nisit`
--
ALTER TABLE `user_nisit`
  ADD PRIMARY KEY (`ST_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc`
--
ALTER TABLE `acc`
  MODIFY `A_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ประกาศ';

--
-- AUTO_INCREMENT for table `f_major`
--
ALTER TABLE `f_major`
  MODIFY `Fmajor_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสเอกที่1', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `f_round`
--
ALTER TABLE `f_round`
  MODIFY `Fr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'เลขที่สมัครรอบที่ 1', AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `R_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'เลขที่คำร้อง', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `request_type`
--
ALTER TABLE `request_type`
  MODIFY `R_type` int(2) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ประเภทคำร้อง', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `round`
--
ALTER TABLE `round`
  MODIFY `Round_id` int(2) NOT NULL AUTO_INCREMENT COMMENT 'เลขที่รวมรอบ', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `s_major`
--
ALTER TABLE `s_major`
  MODIFY `Smajor_id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'รหัสเอกที่2', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `s_round`
--
ALTER TABLE `s_round`
  MODIFY `Sr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'เลขที่สมัครรอบที่ 2', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `t_round`
--
ALTER TABLE `t_round`
  MODIFY `Tr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'เลขที่สมัครรอบที่ 3', AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
