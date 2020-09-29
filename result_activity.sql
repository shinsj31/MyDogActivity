-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 20-09-29 07:31
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
-- 테이블 구조 `result_activity`
--

CREATE TABLE `result_activity` (
  `res_id` int UNSIGNED NOT NULL,
  `d_id` int UNSIGNED NOT NULL,
  `ac_date` date NOT NULL,
  `res_walk_ph` varchar(60) DEFAULT '0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/',
  `res_run_ph` varchar(60) DEFAULT '0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/',
  `res_move_ph` varchar(60) DEFAULT '0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/',
  `res_avg_walk_ph` varchar(60) DEFAULT '0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/',
  `res_avg_run_ph` varchar(60) DEFAULT '0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/',
  `res_avg_move_ph` varchar(60) DEFAULT '0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/',
  `res_avg_heart_ph` varchar(60) DEFAULT '0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/0/',
  `res_all_wark` int DEFAULT NULL,
  `res_avg_daily_walk` int DEFAULT NULL,
  `res_avg_daily_run` int DEFAULT NULL,
  `res_avg_daily_move` int DEFAULT NULL,
  `res_avg_daily_heart` int DEFAULT NULL,
  `res_move_time` int DEFAULT NULL,
  `res_rest_time` int DEFAULT NULL,
  `res_sleep_time` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `result_activity`
--
ALTER TABLE `result_activity`
  ADD PRIMARY KEY (`res_id`),
  ADD UNIQUE KEY `d_id` (`d_id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `result_activity`
--
ALTER TABLE `result_activity`
  MODIFY `res_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `result_activity`
--
ALTER TABLE `result_activity`
  ADD CONSTRAINT `result_activity_ibfk_1` FOREIGN KEY (`d_id`) REFERENCES `dog` (`d_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
