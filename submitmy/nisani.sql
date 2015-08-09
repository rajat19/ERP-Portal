/*
Navicat MySQL Data Transfer

Source Server         : wampo
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : nisani

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-06-26 00:14:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `attendance`
-- ----------------------------
DROP TABLE IF EXISTS `attendance`;
CREATE TABLE `attendance` (
  `monthid` varchar(2) NOT NULL,
  `studentid` varchar(50) NOT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `year` varchar(5) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `subjectid` varchar(10) NOT NULL,
  `total` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`monthid`,`studentid`,`subjectid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of attendance
-- ----------------------------
INSERT INTO `attendance` VALUES ('1', 'abhi', 'cse', '3', 'a', 'ncs601', '15');
INSERT INTO `attendance` VALUES ('1', 'pp', 'cse', '3', 'b', 'ncs601', '19');
INSERT INTO `attendance` VALUES ('1', 'pp', 'cse', '3', 'b', 'ncs603', '25');
INSERT INTO `attendance` VALUES ('1', 'zombie', 'cse', '3', 'a', 'ncs601', '20');
INSERT INTO `attendance` VALUES ('2', 'pp', 'cse', '3', 'b', 'ncs601', '25');
INSERT INTO `attendance` VALUES ('2', 'zombie', 'cse', '3', 'a', 'ncs601', '22');
INSERT INTO `attendance` VALUES ('2', 'zombie', 'cse', '3', 'a', 'ncs605', '25');
INSERT INTO `attendance` VALUES ('3', 'pp', 'cse', '3', 'b', 'ncs601', '22');
INSERT INTO `attendance` VALUES ('3', 'zombie', 'cse', '3', 'a', 'ncs601', '23');

-- ----------------------------
-- Table structure for `message_info`
-- ----------------------------
DROP TABLE IF EXISTS `message_info`;
CREATE TABLE `message_info` (
  `userid` varchar(50) NOT NULL,
  `messageid` varchar(50) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` varchar(500) NOT NULL COMMENT 'inbox/important/drafts/sent/junk',
  `inbox` varchar(1) DEFAULT '0',
  `important` varchar(1) DEFAULT '0',
  `drafts` varchar(1) DEFAULT '0',
  `sentmail` varchar(1) DEFAULT '0',
  `junk` varchar(1) DEFAULT '0',
  PRIMARY KEY (`userid`,`messageid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of message_info
-- ----------------------------
INSERT INTO `message_info` VALUES ('abhi', 'abhi1433098356', 'ssssss', 'kdn', '0', '0', '1', '1', '0');
INSERT INTO `message_info` VALUES ('admin', 'admin1434982745', 'jdjsah', 'jabnsdjadnja', '1', '0', '0', '0', '0');
INSERT INTO `message_info` VALUES ('admin', 'admin1434982846', 'jsahdyuasd', 'jhasdkasdjka', '1', '0', '0', '0', '0');
INSERT INTO `message_info` VALUES ('pp', 'pp1429444568', 'sdjas', 'knckjansdjanksd', '1', '1', '0', '0', '0');
INSERT INTO `message_info` VALUES ('pp', 'pp1433098356', 'ssssss', 'kdn', '1', '1', '0', '0', '0');
INSERT INTO `message_info` VALUES ('pp', 'pp1433098885', 'hdhasdas', 'ksdskdnakda', '1', '0', '0', '0', '0');
INSERT INTO `message_info` VALUES ('pp', 'pp1434982745', 'jdjsah', 'jabnsdjadnja', '0', '0', '1', '1', '0');
INSERT INTO `message_info` VALUES ('pp', 'pp1434982846', 'jsahdyuasd', 'jhasdkasdjka', '0', '0', '1', '1', '0');
INSERT INTO `message_info` VALUES ('xyz', 'xyz1433098885', 'hdhasdas', 'ksdskdnakda', '0', '0', '1', '1', '0');
INSERT INTO `message_info` VALUES ('zombie', 'zombie1429444568', 'sdjas', 'knckjansdjanksd', '0', '0', '1', '1', '0');

-- ----------------------------
-- Table structure for `month`
-- ----------------------------
DROP TABLE IF EXISTS `month`;
CREATE TABLE `month` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of month
-- ----------------------------
INSERT INTO `month` VALUES ('1', 'july');
INSERT INTO `month` VALUES ('2', 'august');
INSERT INTO `month` VALUES ('3', 'september');
INSERT INTO `month` VALUES ('4', 'october');
INSERT INTO `month` VALUES ('5', 'november');
INSERT INTO `month` VALUES ('6', 'december');
INSERT INTO `month` VALUES ('7', 'january');
INSERT INTO `month` VALUES ('8', 'february');
INSERT INTO `month` VALUES ('9', 'march');
INSERT INTO `month` VALUES ('10', 'april');
INSERT INTO `month` VALUES ('11', 'may');

-- ----------------------------
-- Table structure for `sendmail`
-- ----------------------------
DROP TABLE IF EXISTS `sendmail`;
CREATE TABLE `sendmail` (
  `senderid` varchar(50) NOT NULL,
  `sender` varchar(50) DEFAULT NULL,
  `receiverid` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` varchar(800) DEFAULT NULL,
  `draft` varchar(1) NOT NULL,
  PRIMARY KEY (`senderid`,`receiverid`,`time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sendmail
-- ----------------------------
INSERT INTO `sendmail` VALUES ('abhi', 'Abhinva', 'pp', '1433098356', 'ssssss', 'kdn', '1');
INSERT INTO `sendmail` VALUES ('pp', 'Prashant Pandey', 'admin', '1434982745', 'jdjsah', 'jabnsdjadnja', '1');
INSERT INTO `sendmail` VALUES ('pp', 'Prashant Pandey', 'admin', '1434982846', 'jsahdyuasd', 'jhasdkasdjka', '1');
INSERT INTO `sendmail` VALUES ('xyz', 'XXSSDAS', 'pp', '1433098885', 'hdhasdas', 'ksdskdnakda', '1');
INSERT INTO `sendmail` VALUES ('zombie', 'Rajat Srivastava', 'pp', '1429444568', 'sdjas', 'knckjansdjanksd', '1');

-- ----------------------------
-- Table structure for `subjects`
-- ----------------------------
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `subjectid` varchar(10) NOT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `year` varchar(2) DEFAULT NULL,
  `branch` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`subjectid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subjects
-- ----------------------------
INSERT INTO `subjects` VALUES ('ncs402', 'Data Structure', '2', 'cse');
INSERT INTO `subjects` VALUES ('ncs601', 'Operating System', '3', 'cse');
INSERT INTO `subjects` VALUES ('ncs602', 'Automata', '3', 'cse');
INSERT INTO `subjects` VALUES ('ncs603', 'Computer Graphics', '3', 'cse');
INSERT INTO `subjects` VALUES ('nec605', 'Digital Logic Design', '3', 'cse');

-- ----------------------------
-- Table structure for `uploads`
-- ----------------------------
DROP TABLE IF EXISTS `uploads`;
CREATE TABLE `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(50) NOT NULL,
  `userid` varchar(50) DEFAULT NULL,
  `file_details` varchar(50) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`,`filename`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of uploads
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `branch` varchar(50) DEFAULT NULL,
  `year` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'abhi', 'Abhinav Rai', 'abhi', 'abhinavrai@gmail.com', 'cse', '3');
INSERT INTO `users` VALUES ('2', 'pp', 'Prashant Pandey', 'pp', 'pandeyprashant687@gmail.com', 'cse', '3');
INSERT INTO `users` VALUES ('3', 'xyz', 'Xy ZZ', 'xyz', 'xyz@yahoo.co.in', 'cse', '3');
INSERT INTO `users` VALUES ('4', 'zombie', 'Rajat Srivastava', 'rajat', 'rajatsri94@gmail.com', 'cse', '3');
