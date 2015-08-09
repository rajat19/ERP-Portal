/*
Navicat MySQL Data Transfer

Source Server         : wampo
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : nisani

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-08-08 22:21:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `achievements`
-- ----------------------------
DROP TABLE IF EXISTS `achievements`;
CREATE TABLE `achievements` (
  `sid` varchar(255) NOT NULL,
  `aid` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `details` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`sid`,`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of achievements
-- ----------------------------
INSERT INTO `achievements` VALUES ('pp', '1', '1438623062', 'java', 'kasdansdak\r\n');
INSERT INTO `achievements` VALUES ('rajat', '1', '1438621879', 'MTA', 'database fundamentals');
INSERT INTO `achievements` VALUES ('rajat', '2', '1439052586', 'Internship', 'Google Inc.');

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
  `total` int(3) DEFAULT NULL,
  `outof` int(3) DEFAULT NULL,
  PRIMARY KEY (`monthid`,`studentid`,`subjectid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of attendance
-- ----------------------------
INSERT INTO `attendance` VALUES ('1', 'abhi', 'cse', '3', 'a', 'ncs601', '15', '20');
INSERT INTO `attendance` VALUES ('1', 'pp', 'cse', '3', 'b', 'ncs601', '19', '30');
INSERT INTO `attendance` VALUES ('1', 'pp', 'cse', '3', 'b', 'ncs603', '25', '30');
INSERT INTO `attendance` VALUES ('1', 'rajat', 'cse', '3', 'a', 'ncs601', '20', '30');
INSERT INTO `attendance` VALUES ('11', 'abhi', 'cse', '3', 'a', 'ncs601', '20', '25');
INSERT INTO `attendance` VALUES ('11', 'abhi', 'cse', '3', 'a', 'ncs602', '20', '25');
INSERT INTO `attendance` VALUES ('11', 'abhi', 'cse', '3', 'a', 'ncs603', '20', '25');
INSERT INTO `attendance` VALUES ('11', 'abhi', 'cse', '3', 'a', 'ncs604', '20', '25');
INSERT INTO `attendance` VALUES ('11', 'pp', 'cse', '3', 'b', 'ncs601', '19', '25');
INSERT INTO `attendance` VALUES ('11', 'pp', 'cse', '3', 'b', 'ncs602', '25', '25');
INSERT INTO `attendance` VALUES ('11', 'pp', 'cse', '3', 'b', 'ncs603', '19', '25');
INSERT INTO `attendance` VALUES ('11', 'pp', 'cse', '3', 'b', 'ncs604', '15', '25');
INSERT INTO `attendance` VALUES ('11', 'rajat', 'cse', '3', 'b', 'ncs601', '19', '25');
INSERT INTO `attendance` VALUES ('11', 'rajat', 'cse', '3', 'b', 'ncs602', '22', '25');
INSERT INTO `attendance` VALUES ('11', 'rajat', 'cse', '3', 'b', 'ncs603', '25', '25');
INSERT INTO `attendance` VALUES ('11', 'rajat', 'cse', '3', 'b', 'ncs604', '21', '25');
INSERT INTO `attendance` VALUES ('11', 'xyz', 'cse', '3', 'a', 'ncs601', '19', '25');
INSERT INTO `attendance` VALUES ('11', 'xyz', 'cse', '3', 'a', 'ncs602', '23', '25');
INSERT INTO `attendance` VALUES ('11', 'xyz', 'cse', '3', 'a', 'ncs603', '19', '25');
INSERT INTO `attendance` VALUES ('11', 'xyz', 'cse', '3', 'a', 'ncs604', '19', '25');
INSERT INTO `attendance` VALUES ('2', 'pp', 'cse', '3', 'b', 'ncs601', '25', '30');
INSERT INTO `attendance` VALUES ('2', 'rajat', 'cse', '3', 'a', 'ncs601', '22', '30');
INSERT INTO `attendance` VALUES ('2', 'rajat', 'cse', '3', 'a', 'ncs605', '25', '30');
INSERT INTO `attendance` VALUES ('3', 'pp', 'cse', '3', 'b', 'ncs601', '22', '30');
INSERT INTO `attendance` VALUES ('3', 'rajat', 'cse', '3', 'a', 'ncs601', '23', '30');
INSERT INTO `attendance` VALUES ('7', 'abhi', 'cse', '3', 'a', 'ncs601', '20', '25');
INSERT INTO `attendance` VALUES ('7', 'abhi', 'cse', '3', 'a', 'ncs602', '20', '25');
INSERT INTO `attendance` VALUES ('7', 'abhi', 'cse', '3', 'a', 'ncs603', '20', '25');
INSERT INTO `attendance` VALUES ('7', 'abhi', 'cse', '3', 'a', 'ncs604', '20', '25');
INSERT INTO `attendance` VALUES ('7', 'pp', 'cse', '3', 'b', 'ncs601', '19', '25');
INSERT INTO `attendance` VALUES ('7', 'pp', 'cse', '3', 'b', 'ncs602', '25', '25');
INSERT INTO `attendance` VALUES ('7', 'pp', 'cse', '3', 'b', 'ncs603', '19', '25');
INSERT INTO `attendance` VALUES ('7', 'pp', 'cse', '3', 'b', 'ncs604', '15', '25');
INSERT INTO `attendance` VALUES ('7', 'rajat', 'cse', '3', 'b', 'ncs601', '19', '25');
INSERT INTO `attendance` VALUES ('7', 'rajat', 'cse', '3', 'b', 'ncs602', '22', '25');
INSERT INTO `attendance` VALUES ('7', 'rajat', 'cse', '3', 'b', 'ncs603', '25', '25');
INSERT INTO `attendance` VALUES ('7', 'rajat', 'cse', '3', 'b', 'ncs604', '21', '25');
INSERT INTO `attendance` VALUES ('7', 'xyz', 'cse', '3', 'a', 'ncs601', '19', '25');
INSERT INTO `attendance` VALUES ('7', 'xyz', 'cse', '3', 'a', 'ncs602', '23', '25');
INSERT INTO `attendance` VALUES ('7', 'xyz', 'cse', '3', 'a', 'ncs603', '19', '25');
INSERT INTO `attendance` VALUES ('7', 'xyz', 'cse', '3', 'a', 'ncs604', '19', '25');

-- ----------------------------
-- Table structure for `boards`
-- ----------------------------
DROP TABLE IF EXISTS `boards`;
CREATE TABLE `boards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `boardname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of boards
-- ----------------------------
INSERT INTO `boards` VALUES ('1', 'Andhra Pradesh Board of Secondary Education');
INSERT INTO `boards` VALUES ('2', 'Board of Higher Secondary Education,New Delhi');
INSERT INTO `boards` VALUES ('3', 'Assam Board of Secondary Education');
INSERT INTO `boards` VALUES ('4', 'Bihar School Examination Board');
INSERT INTO `boards` VALUES ('5', 'Board of Youth Education India');
INSERT INTO `boards` VALUES ('6', 'Board of School Education, Haryana');
INSERT INTO `boards` VALUES ('7', 'Board of Secondary Education, Madhya Pradesh');
INSERT INTO `boards` VALUES ('8', 'Board of Secondary Education Madhya Bharat Gwalior');
INSERT INTO `boards` VALUES ('9', 'Board of Secondary Education, Rajasthan');
INSERT INTO `boards` VALUES ('10', 'Chhattisgarh Board of Secondary Education');
INSERT INTO `boards` VALUES ('11', 'Central Board of Secondary Education');
INSERT INTO `boards` VALUES ('12', 'Central Board Of Patna, Bihar');
INSERT INTO `boards` VALUES ('13', 'Central Board Of Education Ajmer New Delhi');
INSERT INTO `boards` VALUES ('14', 'Goa Board of Secondary & Higher Secondary Education');
INSERT INTO `boards` VALUES ('15', 'Gujarat Secondary Education Board');
INSERT INTO `boards` VALUES ('16', 'Himachal Pradesh Board of School Education');
INSERT INTO `boards` VALUES ('17', 'Indian Board of School Education');
INSERT INTO `boards` VALUES ('18', 'J&K State Board of School Education');
INSERT INTO `boards` VALUES ('19', 'Jharkhand Academic Council');
INSERT INTO `boards` VALUES ('20', 'Karnataka Board of the Pre-University Education');
INSERT INTO `boards` VALUES ('21', 'Karnataka Secondary Education Examination Board');
INSERT INTO `boards` VALUES ('22', 'Kerala Board of Public Examinations');
INSERT INTO `boards` VALUES ('23', 'Maharashtra State Board of Secondary and Higher Secondary Education');
INSERT INTO `boards` VALUES ('24', 'Manipur Board of Secondary Education');
INSERT INTO `boards` VALUES ('25', 'Manipur Council of Higher Secondary Education');
INSERT INTO `boards` VALUES ('26', 'Meghalaya Board of School Education');
INSERT INTO `boards` VALUES ('27', 'Mizoram Board of School Education');
INSERT INTO `boards` VALUES ('28', 'Northwest Accreditation Commission');
INSERT INTO `boards` VALUES ('29', 'Nagaland Board of School Education');
INSERT INTO `boards` VALUES ('30', 'National Institute of Open Schooling');
INSERT INTO `boards` VALUES ('31', 'Orissa Board of Secondary Education');
INSERT INTO `boards` VALUES ('32', 'Orissa Council of Higher Secondary Education');
INSERT INTO `boards` VALUES ('33', 'Punjab School Education Board');
INSERT INTO `boards` VALUES ('34', 'Rajasthan Board of Secondary Education');
INSERT INTO `boards` VALUES ('35', 'Tamil Nadu Board of Higher Secondary Education');
INSERT INTO `boards` VALUES ('36', 'Tamil Nadu Board of Secondary Education');
INSERT INTO `boards` VALUES ('37', 'Tamilnadu Council for Open and Distance Learning');
INSERT INTO `boards` VALUES ('38', 'Tripura Board of Secondary Education');
INSERT INTO `boards` VALUES ('39', 'Telangana State Board of Intermediate Education');
INSERT INTO `boards` VALUES ('40', 'Uttar Pradesh Board of High School and Intermediate Education');
INSERT INTO `boards` VALUES ('41', 'Sampurnanand Sanskrit Vishwavidyalaya Varanasi Uttar Pradesh');
INSERT INTO `boards` VALUES ('42', 'Uttarakhand Board of School Education');
INSERT INTO `boards` VALUES ('43', 'West Bengal Board of Secondary Education');
INSERT INTO `boards` VALUES ('44', 'West Bengal Council of Higher Secondary Education');
INSERT INTO `boards` VALUES ('45', 'West Bengal State Council of Vocational Education and Training');
INSERT INTO `boards` VALUES ('46', 'Board of Secondary Education Kant Shahjahanpur Uttar Pradesh');
INSERT INTO `boards` VALUES ('47', 'The West Bengal Council of Rabindra Open Schooling');

-- ----------------------------
-- Table structure for `edu_med_info`
-- ----------------------------
DROP TABLE IF EXISTS `edu_med_info`;
CREATE TABLE `edu_med_info` (
  `sid` varchar(255) NOT NULL,
  `board12` varchar(100) NOT NULL,
  `year12` varchar(10) NOT NULL,
  `marks12` varchar(10) NOT NULL,
  `board10` varchar(100) NOT NULL,
  `year10` varchar(10) NOT NULL,
  `marks10` varchar(10) NOT NULL,
  `m1` varchar(3) NOT NULL,
  `m2` varchar(3) NOT NULL,
  `m3` varchar(3) NOT NULL,
  `m4` varchar(3) NOT NULL,
  `m5` varchar(3) NOT NULL,
  `m6` varchar(3) NOT NULL,
  `m7` longtext NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of edu_med_info
-- ----------------------------
INSERT INTO `edu_med_info` VALUES ('abhi', 'Andhra Pradesh Board of Intermediate Education', '2010', '76', 'Andhra Pradesh Board of Intermediate Education', '2008', '82', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'wqfffvw');
INSERT INTO `edu_med_info` VALUES ('pp', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `edu_med_info` VALUES ('rajat', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `fees`
-- ----------------------------
DROP TABLE IF EXISTS `fees`;
CREATE TABLE `fees` (
  `sid` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `total` varchar(6) DEFAULT NULL,
  `discount` varchar(6) DEFAULT NULL,
  `net` varchar(6) DEFAULT NULL,
  `paid` varchar(6) DEFAULT NULL,
  `dues` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`sid`,`semester`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of fees
-- ----------------------------
INSERT INTO `fees` VALUES ('rajat', '5', '106550', '0', '106550', '106550', '0');

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
  `sentmail` varchar(1) DEFAULT '0',
  `junk` varchar(1) DEFAULT '0',
  PRIMARY KEY (`userid`,`messageid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of message_info
-- ----------------------------
INSERT INTO `message_info` VALUES ('abhi', 'abhi1433098356', 'ssssss', 'kdn', '0', '0', '1', '0');
INSERT INTO `message_info` VALUES ('admin', 'admin1434982745', 'jdjsah', 'jabnsdjadnja', '1', '0', '0', '0');
INSERT INTO `message_info` VALUES ('admin', 'admin1434982846', 'jsahdyuasd', 'jhasdkasdjka', '1', '0', '0', '0');
INSERT INTO `message_info` VALUES ('ggg', 'ggg1436529214', 'das', 'adfa', '1', '0', '0', '0');
INSERT INTO `message_info` VALUES ('pp', 'pp1429444568', 'sdjas', 'knckjansdjanksd', '1', '0', '0', '0');
INSERT INTO `message_info` VALUES ('pp', 'pp1433098885', 'hdhasdas', 'ksdskdnakda', '1', '0', '0', '0');
INSERT INTO `message_info` VALUES ('pp', 'pp1434982745', 'jdjsah', 'jabnsdjadnja', '0', '0', '1', '0');
INSERT INTO `message_info` VALUES ('pp', 'pp1434982846', 'jsahdyuasd', 'jhasdkasdjka', '0', '0', '1', '0');
INSERT INTO `message_info` VALUES ('rajat', 'zombie1429444568', 'sdjas', 'knckjansdjanksd', '0', '0', '1', '0');
INSERT INTO `message_info` VALUES ('rajat', 'zombie1436529214', 'das', 'adfa', '0', '0', '1', '0');
INSERT INTO `message_info` VALUES ('xyz', 'xyz1433098885', 'hdhasdas', 'ksdskdnakda', '0', '0', '1', '0');

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
INSERT INTO `month` VALUES ('1', 'July');
INSERT INTO `month` VALUES ('2', 'August');
INSERT INTO `month` VALUES ('3', 'September');
INSERT INTO `month` VALUES ('4', 'October');
INSERT INTO `month` VALUES ('5', 'November');
INSERT INTO `month` VALUES ('6', 'December');
INSERT INTO `month` VALUES ('7', 'January');
INSERT INTO `month` VALUES ('8', 'February');
INSERT INTO `month` VALUES ('9', 'March');
INSERT INTO `month` VALUES ('10', 'April');
INSERT INTO `month` VALUES ('11', 'May');

-- ----------------------------
-- Table structure for `pers_info`
-- ----------------------------
DROP TABLE IF EXISTS `pers_info`;
CREATE TABLE `pers_info` (
  `sid` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `mob` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `tadd1` varchar(255) NOT NULL,
  `tadd2` varchar(255) NOT NULL,
  `tcity` varchar(50) NOT NULL,
  `tdistrict` varchar(50) NOT NULL,
  `tstate` varchar(50) NOT NULL,
  `tpin` varchar(10) NOT NULL,
  `pemail` varchar(255) NOT NULL,
  `pmob` varchar(20) NOT NULL,
  `profile` varchar(30) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pers_info
-- ----------------------------
INSERT INTO `pers_info` VALUES ('abhi', 'agrawal.akash27@gmail.com', '2015-06-02', '9718646102', 'Male', 'jiit', 'sec62', 'noida', 'g', 'Uttar Pradesh', '201301', 'agrawal.akash27@gmail.com', '9718646102', '');
INSERT INTO `pers_info` VALUES ('admin', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `pers_info` VALUES ('pp', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `pers_info` VALUES ('rajat', 'rajatrio94@gmail.com', '2013-12-30', '9910364888', 'Male', 'sda', 'sdad', 'ajsdk', 'jkasdjk', 'jskndj', '208009', 'r@gmail.com', '9910555555', 'zombie_1436081606.jpg');

-- ----------------------------
-- Table structure for `register`
-- ----------------------------
DROP TABLE IF EXISTS `register`;
CREATE TABLE `register` (
  `en_no` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `course` varchar(30) DEFAULT NULL,
  `event` varchar(30) DEFAULT NULL,
  `department` varchar(30) DEFAULT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `e_mail` varchar(20) DEFAULT NULL,
  `mob_no` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`en_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of register
-- ----------------------------
INSERT INTO `register` VALUES ('1234', 'sada', 'asd', 'asdsad', 'Volunteer', '3rd sem', 'rajatsri94@gmail.com', 'mobno');
INSERT INTO `register` VALUES ('451', 'Rajat Srivastava', 'Btech', 'gas', 'Administration', '3rd sem', 'rajatsri94@gmail.com', 'mobno');
INSERT INTO `register` VALUES ('45454', 'Rajat Srivastava', 'Btech', 'kdsakd', 'Administration', '5th sem', 'abhinavrai@gmail.com', 'mobno');

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
INSERT INTO `sendmail` VALUES ('rajat', 'Rajat Srivastava', 'ggg', '1436529214', 'das', 'adfa', '0');
INSERT INTO `sendmail` VALUES ('rajat', 'Rajat Srivastava', 'pp', '1429444568', 'sdjas', 'knckjansdjanksd', '1');
INSERT INTO `sendmail` VALUES ('xyz', 'XXSSDAS', 'pp', '1433098885', 'hdhasdas', 'ksdskdnakda', '1');

-- ----------------------------
-- Table structure for `subjects`
-- ----------------------------
DROP TABLE IF EXISTS `subjects`;
CREATE TABLE `subjects` (
  `subjectid` varchar(10) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `year` varchar(2) DEFAULT NULL,
  `branch` varchar(10) DEFAULT NULL,
  `section` varchar(10) DEFAULT NULL,
  `teacher` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`subjectid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of subjects
-- ----------------------------
INSERT INTO `subjects` VALUES ('ncs402', 'Data Structure', '2', 'cse', 'b', 'Prof. Dsouza');
INSERT INTO `subjects` VALUES ('ncs601', 'Operating System', '3', 'cse', 'b', 'Prof. HK Das');
INSERT INTO `subjects` VALUES ('ncs602', 'Automata', '3', 'cse', 'b', 'Prof Dsouza');
INSERT INTO `subjects` VALUES ('ncs603', 'Computer Graphics', '3', 'cse', 'b', 'Prof. Khan');
INSERT INTO `subjects` VALUES ('ncs605', 'Functional Logic', '3', 'cse', 'a', 'Prof. Subramanyam');
INSERT INTO `subjects` VALUES ('nec605', 'Digital Logic Design', '3', 'cse', 'a', 'Prof. Abraham');

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
  `grad_year` varchar(10) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`,`filename`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of uploads
-- ----------------------------
INSERT INTO `uploads` VALUES ('1', 'admin_1436513737', 'admin', 'kdkdas', 'notes', 'cse', '3', 'txt');

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
  `usertype` int(2) DEFAULT NULL COMMENT '0=admin/ 1=hod/ 2=student',
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'Admin', 'nisani', null, 'cse', null, '0');
INSERT INTO `users` VALUES ('2', 'pp', 'Prashant Pandey', 'pp', 'pandeyprashant687@gmail.com', 'cse', '3', '2');
INSERT INTO `users` VALUES ('3', 'xyz', 'Xy ZZ', 'xyz', 'xyz@yahoo.co.in', 'cse', '3', '2');
INSERT INTO `users` VALUES ('4', 'rajat', 'Rajat Srivastava', 'rajat', 'rajatsri94@gmail.com', 'cse', '3', '2');
INSERT INTO `users` VALUES ('5', 'abhi', 'Abhinav Rai', 'abhi', 'abhinavrai@gmail.com', 'cse', '3', '2');
