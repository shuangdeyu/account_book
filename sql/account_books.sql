-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 �?09 �?23 �?01:23
-- 服务器版本: 5.5.53
-- PHP 版本: 5.6.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `account_books`
--

-- --------------------------------------------------------

--
-- 表的结构 `b_bill`
--

CREATE TABLE IF NOT EXISTS `b_bill` (
  `id` char(36) NOT NULL COMMENT 'id',
  `book_id` char(36) NOT NULL COMMENT '账本id',
  `type` enum('income','expense') NOT NULL DEFAULT 'expense' COMMENT '类型,income-收入,expense-支出',
  `class_id` char(36) NOT NULL COMMENT '分类id',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '金额',
  `memo` varchar(50) NOT NULL COMMENT '备注',
  `create_date` date NOT NULL COMMENT '记账日期',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `B_BOOK_ID` (`book_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='账单表';

-- --------------------------------------------------------

--
-- 表的结构 `b_book`
--

CREATE TABLE IF NOT EXISTS `b_book` (
  `id` char(36) NOT NULL COMMENT 'id',
  `name` varchar(30) NOT NULL COMMENT '名称',
  `user_id` char(36) NOT NULL COMMENT '用户id',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `B_USER_ID` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='账本';

-- --------------------------------------------------------

--
-- 表的结构 `b_class`
--

CREATE TABLE IF NOT EXISTS `b_class` (
  `id` char(36) NOT NULL COMMENT 'id',
  `name` varchar(30) NOT NULL COMMENT '名称',
  `user_id` char(36) NOT NULL COMMENT '用户id,自定义类别',
  `icon` varchar(255) NOT NULL COMMENT '图标地址',
  PRIMARY KEY (`id`),
  KEY `B_USER_ID` (`user_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分类表';

-- --------------------------------------------------------

--
-- 表的结构 `b_user`
--

CREATE TABLE IF NOT EXISTS `b_user` (
  `id` char(36) NOT NULL COMMENT 'id',
  `user_name` varchar(20) NOT NULL COMMENT '唯一用户名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `avatar` varchar(255) NOT NULL COMMENT '头像',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `B_USER_NAME` (`user_name`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
