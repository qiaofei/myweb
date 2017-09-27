/*
Navicat MySQL Data Transfer

Source Server         : 192.168.1.233
Source Server Version : 50626
Source Host           : 192.168.1.233:3306
Source Database       : bgameb

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2017-04-14 17:06:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `b_news`
-- ----------------------------
DROP TABLE IF EXISTS `b_news`;
CREATE TABLE `b_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(5) NOT NULL COMMENT '新闻类型1=新闻，2=公告',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='新闻列表';

-- ----------------------------
-- Records of b_news
-- ----------------------------

-- ----------------------------
-- Table structure for `b_news_type`
-- ----------------------------
DROP TABLE IF EXISTS `b_news_type`;
CREATE TABLE `b_news_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descr` varchar(20) NOT NULL COMMENT '描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of b_news_type
-- ----------------------------
INSERT INTO `b_news_type` VALUES ('1', '新闻');
INSERT INTO `b_news_type` VALUES ('2', '公告');

-- ----------------------------
-- Table structure for `b_question_title`
-- ----------------------------
DROP TABLE IF EXISTS `b_question_title`;
CREATE TABLE `b_question_title` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '归属问题标题',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='客服中心问题标题';

-- ----------------------------
-- Records of b_question_title
-- ----------------------------

-- ----------------------------
-- Table structure for `b_server_as`
-- ----------------------------
DROP TABLE IF EXISTS `b_server_as`;
CREATE TABLE `b_server_as` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` int(5) NOT NULL COMMENT '归属问题标题ID',
  `question` varchar(255) NOT NULL COMMENT '问题',
  `answer` text NOT NULL COMMENT '答案',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='账户与安全(Account and security 暂定放在platform)';

-- ----------------------------
-- Records of b_server_as
-- ----------------------------

-- ----------------------------
-- Table structure for `b_server_faq`
-- ----------------------------
DROP TABLE IF EXISTS `b_server_faq`;
CREATE TABLE `b_server_faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` int(5) NOT NULL COMMENT '归属问题标题',
  `question` varchar(255) NOT NULL COMMENT '问题',
  `answer` text NOT NULL COMMENT '答案',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='游戏常见问题(官网数据库暂放在游戏platform)';

-- ----------------------------
-- Records of b_server_faq
-- ----------------------------

-- ----------------------------
-- Table structure for `b_some_declare`
-- ----------------------------
DROP TABLE IF EXISTS `b_some_declare`;
CREATE TABLE `b_some_declare` (
  `id` int(3) NOT NULL COMMENT '1=免责申明',
  `title` varchar(22) DEFAULT NULL COMMENT '申明标题',
  `content` text COMMENT '申明内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='申明文件';

-- ----------------------------
-- Records of b_some_declare
-- ----------------------------

-- ----------------------------
-- Table structure for `b_users`
-- ----------------------------
DROP TABLE IF EXISTS `b_users`;
CREATE TABLE `b_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of b_users
-- ----------------------------
INSERT INTO `b_users` VALUES ('1', 'admin', 'admin@asia00.com', '$2y$10$oqlb/UzDMuA5.hDN9QByaOkeJcWfUb1CcSU8JTIL1htbfhwNJyJhu', '', '2015-11-10 13:19:59', '2017-03-07 20:07:21');
