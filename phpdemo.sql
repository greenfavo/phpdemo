-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2015 �?10 �?08 �?08:52
-- 服务器版本: 5.6.11
-- PHP 版本: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `phpdemo`
--
CREATE DATABASE IF NOT EXISTS `phpdemo` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `phpdemo`;

DELIMITER $$
--
-- 存储过程
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `test_multi_sets`()
    DETERMINISTIC
begin
        select user() as first_col;
        select user() as first_col, now() as second_col;
        select user() as first_col, now() as second_col, now() as third_col;
        end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT '评论ID',
  `content` text NOT NULL COMMENT '评论内容',
  `author` varchar(20) NOT NULL COMMENT '评论作者',
  `date` datetime NOT NULL COMMENT '评论时间',
  `postid` int(5) NOT NULL COMMENT '评论文章ID',
  `email` varchar(30) NOT NULL COMMENT '评论者邮箱',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='无刷新评论系统' AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `comments`
--

INSERT INTO `comments` (`id`, `content`, `author`, `date`, `postid`, `email`) VALUES
(14, '看看那个提示移除没有', 'nancy', '2015-10-02 20:08:52', 0, 'nancy@qq.com');

-- --------------------------------------------------------

--
-- 表的结构 `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(20) NOT NULL,
  `filepath` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='文件上传路径存储表' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `praise`
--

CREATE TABLE IF NOT EXISTS `praise` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT '微博ID',
  `content` text NOT NULL COMMENT '微博内容',
  `praise` int(5) NOT NULL DEFAULT '0' COMMENT '点赞数量',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='无刷新微博点赞' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `praise`
--

INSERT INTO `praise` (`id`, `content`, `praise`) VALUES
(1, '走到越远，越觉得自己渺小；圈子越广，越觉得自己单薄；书读的越多，越觉得自己无知。—— 李尚龙', 7),
(2, '你愿为他们转发吗？一起说声：谢谢！】他们是为国戍边的战士、是车流中的交警、是清扫垃圾的环卫工、是救治病患的医生护士、是社区里忙碌的民警、是时刻待命的消防员……当我们享受假期的悠闲、与亲朋团聚的欢乐，他们却仍坚守在岗，为我们守护安全、提供服务。转发微博，致敬坚守岗位的他们，辛苦！', 9),
(3, '感情的事很奇怪，你很投入的时候，对方很抽离。你很抽离的时候，对方又偏偏很投入。', 23),
(4, '好好爱自己吧，说不定你男票还在上幼儿园呢！！！今天真的被这个新闻震惊到啦！美国27岁的小鲜肉被63岁的“中国老太”王薇薇娶走了！两人妥妥真爱，相差36岁，各种励志！63岁潮的还像少女！', 15),
(5, '该来的都会来，该走的全会走，别抗拒，别挽留，别贪恋，别不舍，别担心。学着看淡一些事情，才是对自己最好的保护。亲爱的，愿你像向日葵一样，每天都充满正能量。', 60);

-- --------------------------------------------------------

--
-- 表的结构 `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `routename` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='自动完成的路线查询' AUTO_INCREMENT=12 ;

--
-- 转存表中的数据 `route`
--

INSERT INTO `route` (`id`, `routename`) VALUES
(1, '民大到光谷'),
(2, '民大到武大'),
(3, '民大到华科'),
(4, '民大到广阜屯'),
(5, '光谷到街道口'),
(6, '光谷到洪山广场'),
(7, '光谷到汉街'),
(8, '光谷到江汉路'),
(9, '华科到汉口火车站'),
(10, '华科到华农'),
(11, 'mdatoguangg ');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COMMENT='用户注册信息' AUTO_INCREMENT=69 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(66, 'nancy', '123456'),
(67, 'green', '123456'),
(68, 'nacy', '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
