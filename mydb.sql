/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50638
Source Host           : localhost:3306
Source Database       : mydb

Target Server Type    : MYSQL
Target Server Version : 50638
File Encoding         : 65001

Date: 2018-11-03 10:47:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for currency
-- ----------------------------
DROP TABLE IF EXISTS `currency`;
CREATE TABLE `currency` (
  `currency_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `rate` decimal(5,3) NOT NULL COMMENT 'Курс відносно долара',
  `abbreviation` varchar(3) NOT NULL COMMENT 'Абревіатура',
  PRIMARY KEY (`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for deposit_history
-- ----------------------------
DROP TABLE IF EXISTS `deposit_history`;
CREATE TABLE `deposit_history` (
  `deposit_history_id` int(11) NOT NULL AUTO_INCREMENT,
  `deposit_id` int(11) NOT NULL,
  `opening_time` datetime DEFAULT NULL,
  `close_time` datetime DEFAULT NULL,
  `operation_operation_id` int(11) NOT NULL,
  `transaction_value` decimal(22,2) DEFAULT NULL,
  `deposit_historycol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`deposit_history_id`,`deposit_id`,`operation_operation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for deposit
-- ----------------------------
DROP TABLE IF EXISTS `deposit`;
CREATE TABLE `deposit` (
  `deposit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total` decimal(12,2) DEFAULT NULL COMMENT 'Сума депозиту',
  `currency_id` int(11) NOT NULL,
  `account_number` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`deposit_id`,`user_id`,`currency_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for operation
-- ----------------------------
DROP TABLE IF EXISTS `operation`;
CREATE TABLE `operation` (
  `operation_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `is_allowed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`operation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL COMMENT 'Имя',
  `middle_name` varchar(45) NOT NULL COMMENT 'Отчество',
  `surname` varchar(45) NOT NULL COMMENT 'Фамилия',
  `telephone` int(11) NOT NULL,
  `city` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `status` smallint(2) DEFAULT '0',
  `password_reset_token` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
