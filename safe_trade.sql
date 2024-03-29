-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2019-10-29 11:04:48
-- 服务器版本： 10.3.16-MariaDB
-- PHP 版本： 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `safe_trade`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- 表的结构 `estimate`
--

CREATE TABLE `estimate` (
  `id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `trademan_id` int(11) NOT NULL,
  `material_cost` int(11) NOT NULL,
  `labor_cost` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `starting_date` date NOT NULL,
  `expiring_date` date NOT NULL,
  `confirm` varchar(255) NOT NULL DEFAULT 'Waiting for Confirmation'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `estimate`
--

INSERT INTO `estimate` (`id`, `job_id`, `trademan_id`, `material_cost`, `labor_cost`, `total_cost`, `starting_date`, `expiring_date`, `confirm`) VALUES
(83, 58, 27, 1, 1, 2, '2019-10-10', '2018-08-08', 'Refused...'),
(84, 58, 28, 3, 3, 6, '2019-09-09', '2019-09-09', 'Confirmed!!!');

-- --------------------------------------------------------

--
-- 表的结构 `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `job_location` varchar(255) NOT NULL,
  `job_description` varchar(255) NOT NULL,
  `job_price` int(11) NOT NULL,
  `job_start_date` date NOT NULL,
  `job_expire_date` date NOT NULL,
  `job_status` varchar(255) NOT NULL DEFAULT 'No one bid',
  `trademan_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `job`
--

INSERT INTO `job` (`job_id`, `user_id`, `job_location`, `job_description`, `job_price`, `job_start_date`, `job_expire_date`, `job_status`, `trademan_id`) VALUES
(59, '26', 'Rotorua', 'Dance', 22, '2018-08-08', '2018-08-08', 'No one bid yet', 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`uid`, `name`, `mobile`, `email`, `type`, `password`) VALUES
(26, 'customer', 1, '1@1', 'customer', 'e10adc3949ba59abbe56e057f20f883e'),
(27, 'trademan1', 1, '2@2', 'trademan', 'e10adc3949ba59abbe56e057f20f883e'),
(28, 'trademan2', 3, '3@3', 'trademan', 'e10adc3949ba59abbe56e057f20f883e'),
(29, 'trademan3', 1, '1@1', 'trademan', 'e10adc3949ba59abbe56e057f20f883e');

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- 表的索引 `estimate`
--
ALTER TABLE `estimate`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `estimate`
--
ALTER TABLE `estimate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- 使用表AUTO_INCREMENT `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
