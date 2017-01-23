/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : brtp

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2017-01-23 16:30:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for br_choose
-- ----------------------------
DROP TABLE IF EXISTS `br_choose`;
CREATE TABLE `br_choose` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `choosename` varchar(255) DEFAULT NULL COMMENT '选项名称',
  `choosemeta` varchar(255) DEFAULT NULL COMMENT '选项说明',
  `c_time` datetime DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of br_choose
-- ----------------------------
INSERT INTO `br_choose` VALUES ('1', '品德', '道德素养', '2017-01-23 00:30:57');
INSERT INTO `br_choose` VALUES ('2', '能力', '工作能力', '2017-01-23 00:31:10');

-- ----------------------------
-- Table structure for br_controll
-- ----------------------------
DROP TABLE IF EXISTS `br_controll`;
CREATE TABLE `br_controll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count_contr` varchar(255) DEFAULT NULL COMMENT '票数控制',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of br_controll
-- ----------------------------
INSERT INTO `br_controll` VALUES ('1', '100');

-- ----------------------------
-- Table structure for br_log
-- ----------------------------
DROP TABLE IF EXISTS `br_log`;
CREATE TABLE `br_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `chooseid` int(11) DEFAULT NULL COMMENT '选项id',
  `no_userid` int(11) DEFAULT NULL COMMENT '投票人id 仅用于系统测试',
  `meta` varchar(255) DEFAULT NULL COMMENT '说明',
  `c_time` datetime DEFAULT NULL COMMENT '时间',
  `count` int(11) DEFAULT NULL COMMENT '票数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of br_log
-- ----------------------------
INSERT INTO `br_log` VALUES ('1', '2', '1', '2', '23', '2017-01-23 00:49:00', '18');
INSERT INTO `br_log` VALUES ('2', '2', '2', '3', '232', '2017-01-23 00:49:14', '12');
INSERT INTO `br_log` VALUES ('3', '2', '1', '1', '23', '2017-01-23 00:49:27', '34');
INSERT INTO `br_log` VALUES ('4', '2', '2', '13', '44', '2017-01-23 00:49:51', '23');
INSERT INTO `br_log` VALUES ('5', '2', '1', '1', '是的', '2017-01-23 04:03:07', '20');
INSERT INTO `br_log` VALUES ('6', '2', '2', '1', '额', '2017-01-23 04:05:19', '12');
INSERT INTO `br_log` VALUES ('7', '2', '2', '1', '23', '2017-01-23 04:06:52', '1');
INSERT INTO `br_log` VALUES ('8', '2', '2', '1', '165177', '2017-01-23 04:10:59', '1');
INSERT INTO `br_log` VALUES ('9', '2', '2', '1', '123', '2017-01-23 04:17:10', '64');
INSERT INTO `br_log` VALUES ('10', '3', '2', '1', '可以', '2017-01-23 04:25:42', '20');
INSERT INTO `br_log` VALUES ('11', '2', '1', '7', '1', '2017-01-23 08:21:10', '1');

-- ----------------------------
-- Table structure for br_user
-- ----------------------------
DROP TABLE IF EXISTS `br_user`;
CREATE TABLE `br_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL COMMENT '用户名',
  `userpass` varchar(255) DEFAULT NULL COMMENT '密码',
  `realname` varchar(255) DEFAULT NULL COMMENT '真是姓名',
  `meta` varchar(255) DEFAULT NULL COMMENT '说明',
  `status` int(11) DEFAULT NULL COMMENT '投票状态',
  `c_time` datetime DEFAULT NULL COMMENT '时间',
  `count` int(11) DEFAULT NULL COMMENT '总票数',
  `left_count` int(11) DEFAULT NULL COMMENT '剩余票数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of br_user
-- ----------------------------
INSERT INTO `br_user` VALUES ('1', 'ssadmin', 'eyJpdiI6ImpzRjY5ZjFOVzhTK2tiYjlyaFllTWc9PSIsInZhbHVlIjoiNnR4Z1lsYTVSXC9Ma1RnT05XNlVBd2c9PSIsIm1hYyI6IjE4ZmExNDE1ZGNhNTdlZjhmODc0YmExYTRkYzcwY2VkMzM0MDZiN2YxNjg1MjkwZDJiZGMxZmVmOGExMmJhZmIifQ==', '系统账号', '系统账号', '0', '2017-01-22 18:30:40', '100', '80');
INSERT INTO `br_user` VALUES ('2', '1', '2323', '测试1', '测试账号', '0', '2017-01-23 00:14:57', '300', '23');
INSERT INTO `br_user` VALUES ('3', '阿德', '苏大', '啊倒萨', '阿德', '0', '2017-01-23 00:15:19', '233', '21');
INSERT INTO `br_user` VALUES ('4', '注册测试', 'lmy123456', '测试', null, '0', '2017-01-23 07:22:01', '100', '100');
INSERT INTO `br_user` VALUES ('5', '注册测试', 'lmy123456', '测试', null, '0', '2017-01-23 07:22:34', '100', '100');
INSERT INTO `br_user` VALUES ('6', '12333', 'eyJpdiI6InZScTNGSmhxbFQ0WitKdXdWXC9zbld3PT0iLCJ2YWx1ZSI6IlNuTHdkbG9HZ2xiZkFQeGs4alM2N3c9PSIsIm1hYyI6IjA4NDhlMjUyYWNkMzFiODk2MzBjYmExZjU3MWJiMGUwNWMyNDYzNmRkNGUxZTE4ZDA2OGQ2ZDAyZjIwNGZjODgifQ==', '222', null, '0', '2017-01-23 07:24:10', '100', '100');
INSERT INTO `br_user` VALUES ('7', '3333', 'eyJpdiI6IlJYZHgraWVtb1o1UlNUNUQ4K2hvQlE9PSIsInZhbHVlIjoiUXhhZWRlT0lVXC83VXN0cFdONVNFZXc9PSIsIm1hYyI6IjNlNDYzZDI3OTIxNmNiNDQ1NzRiYmY1ZmUwMzAwYzFlYWE4Mjg4MTk4NDhkNGM3NmVhMDc3M2YxYjI4NmY2Y2EifQ==', '4444', null, '0', '2017-01-23 08:15:13', '100', '99');
