-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 20-09-21 09:05
-- 서버 버전: 8.0.20
-- PHP 버전: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `mydogactivity`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `activity_info`
--

CREATE TABLE `activity_info` (
  `ac_id` int UNSIGNED NOT NULL,
  `d_id` int UNSIGNED NOT NULL,
  `ac_date` date NOT NULL,
  `ac_hour` int UNSIGNED NOT NULL,
  `ac_minute` int UNSIGNED NOT NULL,
  `ac_walk` int UNSIGNED DEFAULT NULL,
  `ac_run` int UNSIGNED DEFAULT NULL,
  `ac_distance` int UNSIGNED DEFAULT NULL,
  `ac_heart_rate` int UNSIGNED DEFAULT NULL,
  `ac_location` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ac_device_id` int UNSIGNED NOT NULL,
  `ac_posture` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `activity_info`
--

INSERT INTO `activity_info` (`ac_id`, `d_id`, `ac_date`, `ac_hour`, `ac_minute`, `ac_walk`, `ac_run`, `ac_distance`, `ac_heart_rate`, `ac_location`, `ac_device_id`, `ac_posture`) VALUES
(1, 1, '1998-12-31', 11, 1, 1, 1, 1, 1, '1', 1, NULL),
(2, 1, '1998-12-31', 11, 2, 2, 2, 2, 2, '2', 2, NULL),
(3, 1, '1998-12-31', 11, 3, 3, 3, 3, 3, '3', 3, NULL),
(4, 1, '1998-12-31', 11, 4, 4, 4, 4, 4, '4', 4, NULL),
(5, 1, '2020-09-20', 2, 20, 5, 5, 5, 5, '5', 5, NULL),
(6, 1, '2020-09-20', 2, 22, 6, 6, 6, 6, '6', 6, NULL),
(7, 1, '2020-09-20', 11, 25, 7, 7, 7, 7, '7', 7, NULL),
(8, 1, '2020-09-20', 11, 27, 8, 8, 8, 8, '8', 8, NULL),
(9, 1, '2020-09-20', 12, 6, 9, 9, 9, 9, '9', 9, '9'),
(10, 1, '2020-09-21', 15, 5, 1111, 111, 111, 111, '111', 111, '111'),
(11, 1, '2020-09-21', 15, 42, 222, 222, 222, 222, '222', 222, '222');

-- --------------------------------------------------------

--
-- 테이블 구조 `dog`
--

CREATE TABLE `dog` (
  `d_id` int UNSIGNED NOT NULL,
  `u_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_breed` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_height` float UNSIGNED DEFAULT NULL,
  `d_length` float UNSIGNED DEFAULT NULL,
  `d_weight` float UNSIGNED DEFAULT NULL,
  `d_age` int UNSIGNED DEFAULT NULL,
  `d_goal_activity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `dog`
--

INSERT INTO `dog` (`d_id`, `u_id`, `d_name`, `d_breed`, `d_height`, `d_length`, `d_weight`, `d_age`, `d_goal_activity`) VALUES
(1, '1', '미미', '치와와', 10, 10, 3, 3, 3000),
(3, '1', '수돌이의 강아지', '치와와', 10, 10, 3, 3, 1000),
(4, '1', '수정이의 강아지', '치와와', 10, 10, 3, 3, 1000);

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `m_id` int UNSIGNED NOT NULL,
  `u_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_phone` int UNSIGNED NOT NULL,
  `m_email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`m_id`, `u_id`, `m_name`, `m_phone`, `m_email`) VALUES
(1, '1', '1', 1, '1'),
(2, '2', 'soo', 10, 'test@test.com'),
(3, 'q', 'q', 0, 'q'),
(5, 'w222', 'we', 1055, 'we​');

-- --------------------------------------------------------

--
-- 테이블 구조 `user`
--

CREATE TABLE `user` (
  `u_id` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `u_pw` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `user`
--

INSERT INTO `user` (`u_id`, `u_pw`) VALUES
('1', '1'),
('2', '2'),
('q', 'q'),
('w', 'w'),
('w222', 'w');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `activity_info`
--
ALTER TABLE `activity_info`
  ADD PRIMARY KEY (`ac_id`),
  ADD UNIQUE KEY `ac_id` (`ac_id`),
  ADD UNIQUE KEY `d_id` (`d_id`,`ac_date`,`ac_hour`,`ac_minute`);

--
-- 테이블의 인덱스 `dog`
--
ALTER TABLE `dog`
  ADD PRIMARY KEY (`d_id`),
  ADD UNIQUE KEY `d_id` (`d_id`),
  ADD UNIQUE KEY `d_name` (`d_name`,`u_id`),
  ADD KEY `u_id` (`u_id`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_id`),
  ADD UNIQUE KEY `m_id` (`m_id`),
  ADD UNIQUE KEY `m_phone` (`m_phone`),
  ADD UNIQUE KEY `m_email` (`m_email`),
  ADD UNIQUE KEY `m_name` (`m_name`,`u_id`),
  ADD KEY `u_id` (`u_id`);

--
-- 테이블의 인덱스 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_id` (`u_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `activity_info`
--
ALTER TABLE `activity_info`
  MODIFY `ac_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 테이블의 AUTO_INCREMENT `dog`
--
ALTER TABLE `dog`
  MODIFY `d_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `m_id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `activity_info`
--
ALTER TABLE `activity_info`
  ADD CONSTRAINT `activity_info_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `dog` (`d_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 테이블의 제약사항 `dog`
--
ALTER TABLE `dog`
  ADD CONSTRAINT `dog_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- 테이블의 제약사항 `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
