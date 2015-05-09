/*
Navicat MySQL Data Transfer

Source Server         : MySQL56_1
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : bjtu_gt

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-05-09 12:23:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for gt_answer
-- ----------------------------
DROP TABLE IF EXISTS `gt_answer`;
CREATE TABLE `gt_answer` (
  `answer_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `answer_pid` int(11) DEFAULT NULL,
  `answer_role` int(2) DEFAULT NULL,
  `answer_user` int(11) DEFAULT NULL,
  `answer_content` varchar(500) DEFAULT NULL,
  `answer_good` int(11) DEFAULT '0',
  `answer_point_status` int(2) DEFAULT NULL,
  `answer_time` datetime DEFAULT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gt_answer
-- ----------------------------
INSERT INTO `gt_answer` VALUES ('1', '1', '1', '4', '数据库系统——设计实现与管理', '0', '1', '2015-05-04 17:51:41');

-- ----------------------------
-- Table structure for gt_assess
-- ----------------------------
DROP TABLE IF EXISTS `gt_assess`;
CREATE TABLE `gt_assess` (
  `assess_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `assess_tid` int(11) DEFAULT NULL,
  `assess_sid` int(11) DEFAULT NULL,
  `assess_content` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`assess_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gt_assess
-- ----------------------------

-- ----------------------------
-- Table structure for gt_group
-- ----------------------------
DROP TABLE IF EXISTS `gt_group`;
CREATE TABLE `gt_group` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) DEFAULT NULL,
  `group_description` varchar(200) DEFAULT NULL,
  `group_pic` varchar(200) DEFAULT NULL,
  `group_tnum` int(11) DEFAULT '0',
  `group_snum` int(11) DEFAULT '0',
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gt_group
-- ----------------------------
INSERT INTO `gt_group` VALUES ('1', '软件工程学术组', '软件工程相关学术知识', 'img/group/rj_study.jpg', '1', '1');
INSERT INTO `gt_group` VALUES ('2', '后勤组', '帮助同学们解决校园生活方面的问题，比如一卡通丢失挂失流程、路线不熟等', 'img/group/houqin.jpg', '2', '0');
INSERT INTO `gt_group` VALUES ('3', '情感天地', '帮助同学们解决任何心理压力或情感问题', 'img/group/communication.jpg', '1', '0');
INSERT INTO `gt_group` VALUES ('4', '就业知识问题', '同学们可以询问就业相关的问题，包括讲座等', 'img/group/for_work.jpg', '2', '0');
INSERT INTO `gt_group` VALUES ('5', '考研直通车', '同学们可以询问考研相关问题，包括政策、书籍推荐等', 'img/group/kaoyan.jpg', '1', '1');

-- ----------------------------
-- Table structure for gt_message
-- ----------------------------
DROP TABLE IF EXISTS `gt_message`;
CREATE TABLE `gt_message` (
  `mes_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `mes_from` int(11) DEFAULT NULL,
  `mes_to` int(11) DEFAULT NULL,
  `mes_type` int(2) DEFAULT NULL,
  `mes_time` datetime DEFAULT NULL,
  `mes_read` int(2) DEFAULT '0',
  `mes_content` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`mes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gt_message
-- ----------------------------

-- ----------------------------
-- Table structure for gt_problem
-- ----------------------------
DROP TABLE IF EXISTS `gt_problem`;
CREATE TABLE `gt_problem` (
  `problem_id` int(11) NOT NULL AUTO_INCREMENT,
  `problem_title` varchar(60) NOT NULL,
  `problem_description` varchar(500) NOT NULL,
  `problem_group` int(11) NOT NULL,
  `problem_pic` varchar(200) DEFAULT NULL,
  `problem_private` int(2) DEFAULT NULL,
  `problem_from` int(11) DEFAULT NULL,
  `problem_to` int(11) DEFAULT NULL,
  `problem_time` datetime DEFAULT NULL,
  `problem_point_status` int(2) DEFAULT '0',
  PRIMARY KEY (`problem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gt_problem
-- ----------------------------
INSERT INTO `gt_problem` VALUES ('1', '求数据库书籍推荐', '请问学数据库用哪本书比较好', '1', null, '1', '1', '4', '2015-05-04 17:45:50', '1');
INSERT INTO `gt_problem` VALUES ('2', '逸夫教学楼在哪里', '请问逸夫教学楼在哪里', '2', null, '1', '1', '1', '2015-05-04 17:46:46', '0');
INSERT INTO `gt_problem` VALUES ('3', '请问该怎么减压', '最近作业好多，压力太大', '3', null, '0', '1', '1', '2015-05-04 17:48:21', '0');

-- ----------------------------
-- Table structure for gt_student
-- ----------------------------
DROP TABLE IF EXISTS `gt_student`;
CREATE TABLE `gt_student` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_name` varchar(20) DEFAULT NULL,
  `stu_password` varchar(100) DEFAULT NULL,
  `stu_pic` varchar(200) DEFAULT NULL,
  `stu_grade` varchar(5) DEFAULT NULL,
  `stu_major` varchar(100) DEFAULT NULL,
  `stu_mail` varchar(100) DEFAULT NULL,
  `stu_mail_status` int(11) DEFAULT NULL,
  `stu_get_good` int(11) DEFAULT '0',
  `stu_regist_time` date NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gt_student
-- ----------------------------
INSERT INTO `gt_student` VALUES ('1', 'galaxy_', '123456', null, '2012', '软件学院', '12301152@bjtu.edu.cn', '1', '0', '2015-05-04');

-- ----------------------------
-- Table structure for gt_stu_interest
-- ----------------------------
DROP TABLE IF EXISTS `gt_stu_interest`;
CREATE TABLE `gt_stu_interest` (
  `si_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `si_sid` int(11) DEFAULT NULL,
  `si_gid` int(11) DEFAULT NULL,
  PRIMARY KEY (`si_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gt_stu_interest
-- ----------------------------
INSERT INTO `gt_stu_interest` VALUES ('1', '1', '1');
INSERT INTO `gt_stu_interest` VALUES ('2', '1', '5');

-- ----------------------------
-- Table structure for gt_stu_teacher
-- ----------------------------
DROP TABLE IF EXISTS `gt_stu_teacher`;
CREATE TABLE `gt_stu_teacher` (
  `st_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `st_sid` int(11) DEFAULT NULL,
  `st_tid` int(11) DEFAULT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gt_stu_teacher
-- ----------------------------
INSERT INTO `gt_stu_teacher` VALUES ('1', '1', '1');
INSERT INTO `gt_stu_teacher` VALUES ('2', '1', '3');
INSERT INTO `gt_stu_teacher` VALUES ('3', '1', '4');

-- ----------------------------
-- Table structure for gt_teacher
-- ----------------------------
DROP TABLE IF EXISTS `gt_teacher`;
CREATE TABLE `gt_teacher` (
  `tea_id` int(11) NOT NULL AUTO_INCREMENT,
  `tea_name` varchar(100) NOT NULL,
  `tea_password` varchar(200) NOT NULL,
  `tea_major` varchar(200) DEFAULT NULL,
  `tea_pic` varchar(200) DEFAULT NULL,
  `tea_tel` varchar(15) DEFAULT NULL,
  `tea_mail` varchar(100) NOT NULL,
  `tea_get_good` int(11) DEFAULT '0',
  `tea_regist_time` date NOT NULL,
  PRIMARY KEY (`tea_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gt_teacher
-- ----------------------------
INSERT INTO `gt_teacher` VALUES ('1', '李XX', '123456', '软件学院', null, '18811439812', 'li@bjtu.edu.cn', '0', '2015-05-04');
INSERT INTO `gt_teacher` VALUES ('2', '王XX', '123456', '信息中心', null, '130xxxxxxxx', 'wang@bjtu.edu.cn', '0', '2015-05-04');
INSERT INTO `gt_teacher` VALUES ('3', '曹X', '123456', '教务处', null, '131xxxxxxxx', 'cao@bjtu.edu.cm', '0', '2015-05-04');
INSERT INTO `gt_teacher` VALUES ('4', '吴XX', '123456', '软件学院', null, '188xxxxxxxx', 'wu@bjtu.edu.cn', '0', '2015-05-04');

-- ----------------------------
-- Table structure for gt_teacher_group
-- ----------------------------
DROP TABLE IF EXISTS `gt_teacher_group`;
CREATE TABLE `gt_teacher_group` (
  `tg_id` int(11) NOT NULL AUTO_INCREMENT,
  `tg_tid` int(11) NOT NULL,
  `tg_gid` int(11) NOT NULL,
  PRIMARY KEY (`tg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gt_teacher_group
-- ----------------------------
INSERT INTO `gt_teacher_group` VALUES ('1', '1', '2');
INSERT INTO `gt_teacher_group` VALUES ('2', '1', '3');
INSERT INTO `gt_teacher_group` VALUES ('3', '2', '2');
INSERT INTO `gt_teacher_group` VALUES ('4', '3', '4');
INSERT INTO `gt_teacher_group` VALUES ('5', '3', '5');
INSERT INTO `gt_teacher_group` VALUES ('6', '4', '1');
INSERT INTO `gt_teacher_group` VALUES ('7', '4', '4');
