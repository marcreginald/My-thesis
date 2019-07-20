/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1_3306
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : db_tesda_affiliated_school

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-02-24 18:48:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for certificates
-- ----------------------------
DROP TABLE IF EXISTS `certificates`;
CREATE TABLE `certificates` (
  `certificate_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `qualification_program_title_id` int(11) DEFAULT NULL,
  `date_received` date DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `soft_deleted` int(1) DEFAULT '0',
  `email_sent_status1` int(1) DEFAULT NULL,
  `email_sent_status2` int(1) DEFAULT NULL,
  `email_sent_status3` int(1) DEFAULT NULL,
  `email_sent_status4` int(1) DEFAULT NULL,
  PRIMARY KEY (`certificate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of certificates
-- ----------------------------
INSERT INTO `certificates` VALUES ('1', '1', '2', '2019-01-15', '2019-01-07', '2020-02-01', '1', null, '2019-01-22 21:01:43', null, '0', null, null, null, null);
INSERT INTO `certificates` VALUES ('2', '1', '3', '2019-02-11', '2019-02-11', '2019-03-02', '1', null, '2019-02-11 21:18:18', null, '0', null, null, null, null);

-- ----------------------------
-- Table structure for chat_messages
-- ----------------------------
DROP TABLE IF EXISTS `chat_messages`;
CREATE TABLE `chat_messages` (
  `chat_message_id` int(15) NOT NULL AUTO_INCREMENT,
  `user_from` int(11) DEFAULT NULL,
  `user_to` int(11) DEFAULT NULL,
  `message` text,
  `read` int(1) DEFAULT '0',
  `date_sent` datetime DEFAULT NULL,
  PRIMARY KEY (`chat_message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of chat_messages
-- ----------------------------

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `notif_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification` text,
  `user_id` int(11) DEFAULT NULL,
  `is_read` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `soft_delete` int(1) DEFAULT '0',
  PRIMARY KEY (`notif_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of notifications
-- ----------------------------

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions` (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `soft_deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of positions
-- ----------------------------

-- ----------------------------
-- Table structure for qualification_program_titles
-- ----------------------------
DROP TABLE IF EXISTS `qualification_program_titles`;
CREATE TABLE `qualification_program_titles` (
  `qualification_program_title_id` int(11) NOT NULL AUTO_INCREMENT,
  `qualification_program_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `soft_deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`qualification_program_title_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of qualification_program_titles
-- ----------------------------
INSERT INTO `qualification_program_titles` VALUES ('1', 'testr', '2', '1', '1', '2019-01-22 20:39:36', '2019-01-22 20:39:43', '1');
INSERT INTO `qualification_program_titles` VALUES ('2', 'Bookkeeping', '2', '1', null, '2019-01-22 20:57:47', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('3', 'HEO-Wheel Loader', '2', '1', null, '2019-01-22 20:58:20', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('4', 'Massage Therapy', '2', '1', null, '2019-01-22 20:58:41', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('5', 'Barista', '2', '1', null, '2019-01-22 20:58:59', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('6', 'Food and Beverage Services', '2', '1', '1', '2019-01-22 20:59:34', '2019-01-27 13:41:11', '0');
INSERT INTO `qualification_program_titles` VALUES ('7', 'Computer Systems Servicing', '2', '1', null, '2019-01-22 21:00:20', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('8', 'Gas Metar Arc Welding', '2', '1', null, '2019-01-22 21:01:04', '2019-01-22 21:01:51', '1');
INSERT INTO `qualification_program_titles` VALUES ('9', 'Gas Metal Arc Welding', '2', '1', null, '2019-01-22 21:02:21', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('10', 'Shielded Metal Arc Welding', '2', '1', null, '2019-01-22 21:03:15', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('11', 'Visual Graphics Design', '2', '1', null, '2019-01-22 21:03:40', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('12', 'Events Management Services', '2', '1', null, '2019-01-22 21:04:45', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('13', 'Medical Transciption', '2', '1', null, '2019-01-22 21:05:35', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('14', 'Local Guiding Services', '2', '1', null, '2019-01-22 21:06:19', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('15', 'Barangay Health Services', '2', '1', null, '2019-01-22 22:48:17', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('16', 'Cookery', '2', '1', null, '2019-01-22 22:48:40', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('17', 'Domestic Work', '2', '1', null, '2019-01-22 22:49:06', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('18', 'Electrical Installation and Maintenance', '2', '1', null, '2019-01-22 22:49:24', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('19', 'Electronic Products Assembly and Servicing', '2', '1', null, '2019-01-22 22:49:49', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('20', 'HEO (Hydraulic Excavator)', '2', '1', null, '2019-01-22 22:50:23', null, '0');
INSERT INTO `qualification_program_titles` VALUES ('21', 'HEO (Rigid On-Highway Dump Truck)', '2', '1', null, '2019-01-22 22:54:51', null, '0');

-- ----------------------------
-- Table structure for schools
-- ----------------------------
DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text,
  `email_address` varchar(255) DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `soft_deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of schools
-- ----------------------------
INSERT INTO `schools` VALUES ('1', 'No Shool', 'no_school', 'no_school@school.com', '00000000', '1', null, '2018-10-28 14:49:13', null, '0');
INSERT INTO `schools` VALUES ('2', 'BUTUAN CITY MANPOWER TRAINING CENTER', 'DOP Bldg., Government Center, Tiniwisan, Butuan City', 'manpower_butuan@yahoo.com', '(085) 341-1942', '1', '1', '2018-08-12 11:47:39', '2018-10-03 13:38:56', '0');
INSERT INTO `schools` VALUES ('3', 'CARAGA STATE UNIVERSITY-MAIN CAMPUS', 'Ampayon, Butuan City', '', '(085)341-2296', '1', '1', '2018-10-02 18:09:33', '2018-10-03 13:38:39', '0');
INSERT INTO `schools` VALUES ('4', 'LAS NIEVES TRAINING CENTER', 'Mat-i, Las Nieves, Agusan del Norte', 'lntc_lasnieves@yahoo.com.ph', '0917-7234641', '1', '1', '2018-10-02 18:09:49', '2018-10-03 13:39:27', '0');
INSERT INTO `schools` VALUES ('5', 'ACLC COLLEGE OF BUTUAN CITY, INC.', 'HDS Bldg., J.C. Aquino Avenue, Butuan City', '', '(085)341-5719/225-6200', '1', '1', '2018-10-02 18:17:04', '2018-10-03 13:41:44', '0');
INSERT INTO `schools` VALUES ('6', 'ASIAN COLLEGE FOUNDATION, INC.', 'Estipona Village, Km. 3. J.C. Aquino Avenue, Butuan City', 'asian_acf@yahoo.com.ph', '(085)815-3646', '1', null, '2018-10-03 13:42:17', null, '0');
INSERT INTO `schools` VALUES ('7', 'BUTUAN CITY COLLEGES, INC.', 'Montilla Boulevard, Butuan City', 'butuancitycollegesbc@gmail.com', '(085)300-3179', '1', null, '2018-10-03 13:43:32', null, '0');
INSERT INTO `schools` VALUES ('8', 'BUTUAN DOCTORS’ HOSPITAL AND COLLEGE, INC.', 'J.C. Aquino Avenue, Butuan City', '', '(085)342-8572', '1', null, '2018-10-03 13:43:57', null, '0');
INSERT INTO `schools` VALUES ('9', 'CENTER FOR HEALTHCARE PROFESSIONS BUTUAN, INC.', '3F S & V Building., R. Calo Street, Butuan City', 'chp_butuan09@yahoo.com', '(085)225-6849', '1', null, '2018-10-03 13:44:24', null, '0');
INSERT INTO `schools` VALUES ('10', 'ELISA R. OCHOA MEMORIAL NORTHERN MINDANAO SCHOOL OF MIDWIFERY, INC.', '702 San Jose Street, Butuan City', 'erom_nmsm@yahoo.com', '(085) 342-5563', '1', null, '2018-10-03 13:45:03', null, '0');
INSERT INTO `schools` VALUES ('11', 'FATHER SATURNINO URIOS UNIVERSITY, INC.', 'San Francisco Street, Butuan City', '', '(085)342-1830', '1', null, '2018-10-03 13:45:37', null, '0');
INSERT INTO `schools` VALUES ('12', 'FATHER URIOS INSTITUTE OF TECHNOLOGY OF AMPAYON, INC.', 'Ampayon, Butuan City', 'father.urios@yahoo.com', '(085) 341-4342', '1', null, '2018-10-03 13:46:12', null, '0');
INSERT INTO `schools` VALUES ('13', 'HOLY CHILD COLLEGES OF BUTUAN, INC.', '2nd Street, Guingona Subdivision, Butuan City', '', '(085)342-3975', '1', null, '2018-10-03 13:46:54', null, '0');
INSERT INTO `schools` VALUES ('14', 'LE’ OPHIR LEARNING SCHOOL, INC.', 'Ochoa Avenue, Butuan City', 'le_ophir@yahoo.com', '(085) 816-1105', '1', null, '2018-10-03 13:47:37', null, '0');
INSERT INTO `schools` VALUES ('15', 'MANA MILLENIUM TECHNICAL SCHOOL (MMTS), INC.', '4F Balibrea Building, Pili Drive, Butuan City', 'manatech.butuan@gmail.com', '(085) 817-2006', '1', null, '2018-10-03 13:48:02', null, '0');
INSERT INTO `schools` VALUES ('16', 'PHILIPPINE ELECTRONICS AND COMMUNICATION  INSTITUTE  OF  TECHNOLOGY, INC.', 'Imadejas Subdivision, Butuan City', 'pecit_education@yahoo.com', '(085)341-7660', '1', null, '2018-10-03 13:49:44', null, '0');
INSERT INTO `schools` VALUES ('17', 'RELIANCE TRAINING INSTITUTE, INC.', 'F. Durano Street, Butuan City', 'reliance.bxu-tech@relianceti.com', '(085) 816-2812', '1', null, '2018-10-03 13:50:26', null, '0');
INSERT INTO `schools` VALUES ('18', 'SAINT JOSEPH INSTITUTE OF TECHNOLOGY, INC.', 'Montilla Boulevard, Butuan City', '', '(085)225-5039', '1', null, '2018-10-03 13:50:56', null, '0');
INSERT INTO `schools` VALUES ('19', 'NASIPIT NATIONAL VOCATIONAL SCHOOL', 'Bayview Hill, Nasipit, Agusan del Norte', 'nasipit_vocational@yahoo.com.ph', '(085)343-2426', '1', null, '2018-10-03 13:51:29', null, '0');
INSERT INTO `schools` VALUES ('20', 'NORTHERN MINDANAO SCHOOL OF FISHERIES', 'Matabao, Buenavista, Agusan del Norte', 'nmsf@tesda.gov.ph', '343-4238', '1', null, '2018-10-03 13:52:34', null, '0');
INSERT INTO `schools` VALUES ('21', 'PROVINCIAL TRAINING CENTER-AGUSAN DEL NORTE', 'Government Center, Barangay 9, Cabadbaran City', 'ptc_adn@tesda.gov.ph', '(085)818-5239', '1', null, '2018-10-03 13:52:58', null, '0');
INSERT INTO `schools` VALUES ('22', 'CANDELARIA INSTITUTE OF TECHNOLOGY OF CABADBARAN, INC.', 'Funcion Street, Cabadbaran City', 'institutecabadbaran@yahoo.com', '(085)343-0941', '1', null, '2018-10-03 13:53:25', null, '0');
INSERT INTO `schools` VALUES ('23', 'NORTHERN MINDANAO COLLEGES, INC.', 'Atega Street, Cabadbaran City', 'nnmc_cabadbaran@yahoo.com', '(085)817-0938', '1', null, '2018-10-03 13:53:58', null, '0');
INSERT INTO `schools` VALUES ('24', 'SAINT MICHAEL COLLEGE OF CARAGA, INC.', 'Poblacion, Nasipit, Agusan del Norte', '', '(085)343-3251', '1', null, '2018-10-03 13:54:23', null, '0');
INSERT INTO `schools` VALUES ('25', 'GML AGRI-VENTURES FARM', 'Purok 2B, Sorainao, Cabadbaran Ciy', '', '0917-7060600', '1', null, '2018-10-03 13:55:10', null, '0');
INSERT INTO `schools` VALUES ('26', 'MABAKAS TECHNO DEMO FARM', 'Sitio Coro, Colorado, Jabonga, Agusan del Norte', '', '0919-7740894', '1', null, '2018-10-03 13:55:29', null, '0');
INSERT INTO `schools` VALUES ('27', 'SR METALS INCORPORATED', 'Sitio Beto, Poblacion II, Tubay, Agusan del Norte', '', '(085)817-0074', '1', null, '2018-10-03 13:55:52', null, '0');
INSERT INTO `schools` VALUES ('29', 'AGUSAN NATIONAL HIGH SCHOOL', 'A.D. Curato St, Butuan City, 8600 Agusan Del Norte', '', '', '1', null, '2018-10-03 14:35:43', null, '0');
INSERT INTO `schools` VALUES ('30', 'Father Saturnino Institute of Technology', 'Ampayon, Butuan City', 'FatherSaturnino@edu.ph', '09467630490', '1', null, '2019-01-22 22:16:16', null, '0');
INSERT INTO `schools` VALUES ('31', 'Veranda CTL Tourism Training Center', 'Carmen, Agusan del Norte', 'Veranda_CTL_tourism_training_Center@gmail.com', '09128941405', '1', null, '2019-01-22 22:22:39', null, '0');
INSERT INTO `schools` VALUES ('32', 'Candelaria Institute', 'Cabadbaran, Agusan del Norte', 'Candelaria_institute@gmail.com', '09503478039', '1', null, '2019-01-22 22:24:49', null, '0');
INSERT INTO `schools` VALUES ('33', 'Philippine Electronics and Communication Institute of Technology', 'Butuan City, Agusan del Norte', 'PECIT@gmail.com', '09988347451', '1', null, '2019-01-22 22:26:33', null, '0');
INSERT INTO `schools` VALUES ('34', 'Northern Mindanao Colleges', 'Cabadbaran, Agusan del Norte', 'Norhern_Mindanao_College@gmail.com', '09128947148', '1', null, '2019-01-22 22:28:42', null, '0');
INSERT INTO `schools` VALUES ('35', 'Butuan City Colleges', 'Butuan City, Agusan del Norte', 'ButuanColleges@gmail.com', '09570915749', '1', null, '2019-01-22 22:30:20', null, '0');
INSERT INTO `schools` VALUES ('36', 'Butuan Doctors’ Hospital and College', 'Butuan City, Agusan del Norte', 'ButuanDoctorHospital@gmail.com', '09468932710', '1', null, '2019-01-22 22:32:01', null, '0');
INSERT INTO `schools` VALUES ('37', 'Holy Child Colleges of Butuan', 'Butuan City, Agusan del Norte', 'Holy_Child@gmail.com', '09502319409', '1', null, '2019-01-22 22:33:35', null, '0');

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `middlename` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_ext` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` text,
  `birthdate` date DEFAULT NULL,
  `contact_no` varchar(50) DEFAULT NULL,
  `email_address` varchar(150) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  `is_graduate` int(1) DEFAULT '0',
  `is_assessed` int(1) DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `soft_deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('1', 'asdasd', 'sds', 'dfsd', 'fd', 'Male', 'gdfgdfg', '2018-10-04', '343434', 'ldfjkgphj@gmail.com', '15', '1', '0', '0', '1', '1', '2018-10-11 04:03:25', '2019-01-22 14:30:13', '0');
INSERT INTO `students` VALUES ('11', 'Marc Reginald', 'Racho', 'Panaligan', '', 'Male', 'Barangay 5 Buenavista AND', '2036-03-05', '9090909091', 'marcpanaligan98@gmail.com', '15', '1', '1', '1', '1', null, '2019-01-22 17:27:15', null, '0');
INSERT INTO `students` VALUES ('12', 'Jovani', '', 'Dimaangay', '', 'Male', 'Doongan', '0000-00-00', '909090909', '', '15', '1', '1', '1', '1', null, '2019-01-22 17:27:15', null, '0');
INSERT INTO `students` VALUES ('13', 'James Keane', '', 'Reyes', '', 'Male', 'asdsa', '0000-00-00', '934567981', '', '15', '1', '0', '0', '1', null, '2019-01-22 17:27:15', null, '0');
INSERT INTO `students` VALUES ('14', 'Jasper', 'Agcopra', 'DelosAngeles', 'Type Letters Only', 'male', 'Lucky Village, Ambago, Butuan City', '2023-02-03', '09123456789', 'jasperdelosangeles@yahoo.com', '18', '2', '0', '1', '1', '1', '2019-01-22 21:09:42', '2019-02-11 21:30:27', '0');
INSERT INTO `students` VALUES ('15', 'Gerlie', 'Torremonia', 'Sevilla', 'Type Letters Only', 'female', 'Davao City', '1992-07-04', '09154598107', 'GerSer@gmail.com', '23', '1', '0', '0', '1', null, '2019-01-22 22:05:57', null, '0');
INSERT INTO `students` VALUES ('16', 'Edgar', 'Villaflor', 'Sangalang', 'Type Letters Only', 'male', 'Country Homes Subd Tagum', '1989-03-02', '09482769178', 'edgarvillaflor@gmail.com', '18', '1', '0', '0', '1', '1', '2019-01-22 22:44:00', '2019-01-22 22:46:04', '0');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `name_ext` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` text,
  `email_address` varchar(150) DEFAULT NULL,
  `mobile_number` varchar(30) DEFAULT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT '0',
  `is_active` int(1) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `date_login` datetime DEFAULT NULL,
  `soft_deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'superadmin@gmail.com', 'admin', 'Marc Reginald', 'Racho', 'Panaligan', '', 'male', '', 'superadmin@gmail.com', '', '1', '1', '0', '1', null, '1', '2018-07-28 12:49:50', '2018-08-11 12:30:47', '2019-02-19 22:19:33', '0');
INSERT INTO `users` VALUES ('2', 'school_admin', 'school_admin', 'School', '', 'Admin', '', 'male', 'P-1, Agong~ong, Buenavista Agusan Del Norte', '', '09123456789', '2', '2', '0', '1', '1', '1', '2018-09-30 09:45:31', '2018-09-30 09:46:19', '2018-10-28 15:02:26', '0');
INSERT INTO `users` VALUES ('4', 'admin_user', 'admin_user', 'Admin', '', 'User', '', 'male', 'P-1, Agong~ong, Buenavista Agusan Del Norte', 'asddas@asd.ssad', '243232323', '3', '30', '0', '1', '2', '1', '2018-09-30 09:52:28', '2018-10-28 14:50:43', '2018-10-03 13:34:42', '0');

-- ----------------------------
-- Table structure for user_images
-- ----------------------------
DROP TABLE IF EXISTS `user_images`;
CREATE TABLE `user_images` (
  `user_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_path` text,
  `user_id` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `soft_deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`user_image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_images
-- ----------------------------

-- ----------------------------
-- Table structure for user_logs
-- ----------------------------
DROP TABLE IF EXISTS `user_logs`;
CREATE TABLE `user_logs` (
  `user_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `action` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `soft_delete` int(1) DEFAULT '0',
  PRIMARY KEY (`user_log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=577 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_logs
-- ----------------------------
INSERT INTO `user_logs` VALUES ('1', '2018-07-28 12:15:58', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('2', '2018-07-28 12:49:56', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('3', '2018-07-28 13:02:30', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('4', '2018-07-29 09:27:11', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('5', '2018-08-01 15:48:50', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('6', '2018-08-02 03:07:57', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('7', '2018-08-02 06:55:50', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('8', '2018-08-02 07:43:08', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('9', '2018-08-02 07:50:43', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('10', '2018-08-02 08:01:15', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('11', '2018-08-02 08:10:58', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('12', '2018-08-03 12:02:11', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('13', '2018-08-05 13:10:42', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('14', '2018-08-05 13:10:59', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('15', '2018-08-07 17:04:47', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('16', '2018-08-08 01:47:27', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('17', '2018-08-08 02:14:51', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('18', '2018-08-10 20:54:02', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('19', '2018-08-10 21:06:01', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('20', '2018-08-10 22:36:27', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('21', '2018-08-10 23:45:10', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('22', '2018-08-10 23:45:16', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('23', '2018-08-10 23:45:27', 'Student has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('24', '2018-08-11 11:17:35', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('25', '2018-08-11 11:25:35', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('26', '2018-08-11 11:25:43', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('27', '2018-08-11 12:28:05', '<strong>Inserted Certificate for</strong> \'Student, Student S. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('28', '2018-08-11 12:30:48', '<strong>Updated User</strong> \'superadmin@gmail.com\'', '1', '0');
INSERT INTO `user_logs` VALUES ('29', '2018-08-11 14:18:21', '<strong>Inserted Certificate for</strong> \'Student, Student S. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('30', '2018-08-11 14:21:22', '<strong>Updated Certificate for</strong> \'Student, Student S. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('31', '2018-08-11 14:30:44', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('32', '2018-08-11 14:40:24', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('33', '2018-08-11 14:40:33', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('34', '2018-08-11 14:42:17', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('35', '2018-08-11 14:43:11', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('36', '2018-08-11 15:30:06', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('37', '2018-08-11 15:30:24', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('38', '2018-08-11 15:43:44', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('39', '2018-08-11 15:44:00', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('40', '2018-08-11 16:15:14', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('41', '2018-08-11 16:40:02', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('42', '2018-08-11 16:40:16', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('43', '2018-08-11 16:40:53', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('44', '2018-08-11 16:53:35', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('45', '2018-08-11 16:55:13', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('46', '2018-08-11 16:55:29', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('47', '2018-08-11 17:06:14', '<strong>Inserted School</strong> \'asda\'', '1', '0');
INSERT INTO `user_logs` VALUES ('48', '2018-08-11 17:06:48', '<strong>Updated School</strong> \'asda\'', '1', '0');
INSERT INTO `user_logs` VALUES ('49', '2018-08-11 17:07:49', '<strong>Updated School</strong> \'asda\'', '1', '0');
INSERT INTO `user_logs` VALUES ('50', '2018-08-11 17:17:46', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('51', '2018-08-11 17:18:03', '<strong>Inserted Course</strong> \'dsffsd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('52', '2018-08-11 17:18:07', '<strong>Updated Course</strong> \'dsffsd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('53', '2018-08-11 17:19:19', '<strong>Inserted Course</strong> \'asdas\'', '1', '0');
INSERT INTO `user_logs` VALUES ('54', '2018-08-11 17:19:49', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('55', '2018-08-11 17:51:34', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('56', '2018-08-11 17:53:48', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('57', '2018-08-11 18:15:54', '<strong>Inserted Certificate Type</strong> \'asdas\'', '1', '0');
INSERT INTO `user_logs` VALUES ('58', '2018-08-11 18:16:01', '<strong>Updated Certificate Type</strong> \'asdas\'', '1', '0');
INSERT INTO `user_logs` VALUES ('59', '2018-08-11 18:16:09', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('60', '2018-08-11 19:45:01', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('61', '2018-08-11 19:46:31', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('62', '2018-08-11 19:47:38', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('63', '2018-08-11 19:59:39', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('64', '2018-08-12 11:42:32', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('65', '2018-08-12 11:46:20', '<strong>Deleted Certificate</strong> \"\"', '1', '0');
INSERT INTO `user_logs` VALUES ('66', '2018-08-12 11:47:39', '<strong>Inserted School</strong> \'fsdfsdfdsfsd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('67', '2018-08-12 11:47:49', '<strong>Deleted School</strong> \"asda\"', '1', '0');
INSERT INTO `user_logs` VALUES ('68', '2018-08-12 11:48:27', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('69', '2018-08-12 19:33:40', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('70', '2018-08-12 19:34:07', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('71', '2018-08-12 19:46:36', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('72', '2018-08-12 19:46:47', '<strong>Inserted Course</strong> \'BLIS\'', '1', '0');
INSERT INTO `user_logs` VALUES ('73', '2018-08-12 19:46:51', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('74', '2018-08-12 20:00:33', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('75', '2018-08-12 20:00:47', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('76', '2018-08-13 07:13:06', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('77', '2018-08-13 08:16:26', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('78', '2018-08-13 09:34:38', '<strong>Inserted Certificate for</strong> \'Student, Student S. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('79', '2018-08-13 09:39:33', '<strong>Updated Certificate for</strong> \'Student, Student S. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('80', '2018-08-13 09:49:24', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('81', '2018-08-13 09:51:37', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('82', '2018-08-13 14:31:46', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('83', '2018-08-15 09:30:19', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('84', '2018-08-15 09:31:08', '<strong>Updated Certificate Type</strong> \'COC\'', '1', '0');
INSERT INTO `user_logs` VALUES ('85', '2018-08-15 09:31:18', '<strong>Inserted Certificate Type</strong> \'NC\'', '1', '0');
INSERT INTO `user_logs` VALUES ('86', '2018-08-15 09:31:57', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('87', '2018-08-15 09:33:09', 'Student has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('88', '2018-08-15 09:36:49', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('89', '2018-08-15 09:40:31', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('90', '2018-08-15 09:57:45', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('91', '2018-08-15 09:57:57', 'Student has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('92', '2018-08-15 09:57:57', 'Student has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('93', '2018-08-15 10:04:06', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('94', '2018-08-15 10:37:28', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('95', '2018-08-15 11:29:44', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('96', '2018-08-15 11:33:48', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('97', '2018-08-15 11:50:09', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('98', '2018-08-15 11:50:23', 'Student has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('99', '2018-08-15 12:25:00', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('100', '2018-08-15 12:26:13', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('101', '2018-08-15 12:46:56', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('102', '2018-08-15 12:52:55', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('103', '2018-08-15 12:55:09', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('104', '2018-08-15 12:55:35', '<strong>Inserted Status Report</strong> \'Student, Student S. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('105', '2018-08-15 12:55:38', '<strong>Updated Status Report</strong> \'Student, Student S. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('106', '2018-08-15 12:55:50', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('107', '2018-08-15 12:59:24', 'Student has logged in.', '2', '0');
INSERT INTO `user_logs` VALUES ('108', '2018-08-15 13:08:42', 'User has logged out.', '2', '0');
INSERT INTO `user_logs` VALUES ('109', '2018-08-15 13:09:04', 'Student has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('110', '2018-08-15 13:15:28', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('111', '2018-08-15 13:34:42', '<strong>Inserted Status Report</strong> \'Student, Student S. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('112', '2018-08-15 13:34:50', '<strong>Inserted Status Report</strong> \'Student, Student S. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('113', '2018-08-15 13:57:59', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('114', '2018-08-15 13:58:14', 'Student has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('115', '2018-08-15 13:58:25', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('116', '2018-08-15 13:58:38', 'Student has logged in.', '2', '0');
INSERT INTO `user_logs` VALUES ('117', '2018-08-15 13:58:46', 'User has logged out.', '2', '0');
INSERT INTO `user_logs` VALUES ('118', '2018-08-15 13:59:26', 'Student has logged in.', '2', '0');
INSERT INTO `user_logs` VALUES ('119', '2018-08-15 13:59:37', 'User has logged out.', '2', '0');
INSERT INTO `user_logs` VALUES ('120', '2018-08-15 13:59:49', 'Student has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('121', '2018-08-15 14:05:36', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('122', '2018-08-15 14:35:55', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('123', '2018-08-17 12:36:47', 'Student has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('124', '2018-08-17 17:17:21', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('125', '2018-08-29 01:24:28', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('126', '2018-09-30 08:58:36', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('127', '2018-09-30 09:08:09', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('128', '2018-09-30 09:08:33', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('129', '2018-09-30 09:09:07', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('130', '2018-09-30 09:09:11', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('131', '2018-09-30 09:16:32', '<strong>Inserted Certificate Type</strong> \'asdas\'', '1', '0');
INSERT INTO `user_logs` VALUES ('132', '2018-09-30 09:20:46', '<strong>Inserted Course</strong> \'test\'', '1', '0');
INSERT INTO `user_logs` VALUES ('133', '2018-09-30 09:20:52', '<strong>Inserted Course</strong> \'weew\'', '1', '0');
INSERT INTO `user_logs` VALUES ('134', '2018-09-30 09:45:31', '<strong>Inserted User</strong> \'school_admin\'', '1', '0');
INSERT INTO `user_logs` VALUES ('135', '2018-09-30 09:46:19', '<strong>Updated User</strong> \'school_admin\'', '1', '0');
INSERT INTO `user_logs` VALUES ('136', '2018-09-30 09:46:40', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('137', '2018-09-30 09:46:50', 'User has logged in.', '2', '0');
INSERT INTO `user_logs` VALUES ('138', '2018-09-30 09:49:04', 'User has logged out.', '2', '0');
INSERT INTO `user_logs` VALUES ('139', '2018-09-30 09:49:09', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('140', '2018-09-30 09:49:21', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('141', '2018-09-30 09:49:28', 'User has logged in.', '2', '0');
INSERT INTO `user_logs` VALUES ('142', '2018-09-30 09:51:00', '<strong>Inserted User</strong> \'school_user\'', '2', '0');
INSERT INTO `user_logs` VALUES ('143', '2018-09-30 09:52:28', '<strong>Inserted User</strong> \'admin_user\'', '2', '0');
INSERT INTO `user_logs` VALUES ('144', '2018-09-30 09:54:32', 'User has logged out.', '2', '0');
INSERT INTO `user_logs` VALUES ('145', '2018-09-30 09:54:38', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('146', '2018-09-30 10:54:00', '<strong>Inserted Certificate</strong> \'sadasdasd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('147', '2018-09-30 10:55:44', '<strong>Inserted Certificate</strong> \'asdasdasd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('148', '2018-09-30 11:04:53', '<strong>Updated Certificate</strong> \'asdasdasd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('149', '2018-09-30 11:05:08', '<strong>Updated Certificate</strong> \'asdasdasd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('150', '2018-10-01 17:11:36', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('151', '2018-10-01 20:57:35', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('152', '2018-10-01 20:58:38', 'User has logged out.', '0', '0');
INSERT INTO `user_logs` VALUES ('153', '2018-10-01 20:58:44', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('154', '2018-10-02 00:29:54', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('155', '2018-10-02 12:11:25', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('156', '2018-10-02 12:51:03', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('157', '2018-10-02 13:00:08', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('158', '2018-10-02 16:17:42', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('159', '2018-10-02 16:35:51', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('160', '2018-10-02 17:23:10', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('161', '2018-10-02 17:23:13', 'User has logged in.', '2', '0');
INSERT INTO `user_logs` VALUES ('162', '2018-10-02 17:24:01', 'User has logged out.', '2', '0');
INSERT INTO `user_logs` VALUES ('163', '2018-10-02 17:24:07', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('164', '2018-10-02 17:24:45', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('165', '2018-10-02 17:24:54', 'User has logged in.', '2', '0');
INSERT INTO `user_logs` VALUES ('166', '2018-10-02 17:33:02', 'User has logged out.', '2', '0');
INSERT INTO `user_logs` VALUES ('167', '2018-10-02 17:33:19', 'User has logged in.', '2', '0');
INSERT INTO `user_logs` VALUES ('168', '2018-10-02 17:36:22', 'User has logged out.', '2', '0');
INSERT INTO `user_logs` VALUES ('169', '2018-10-02 17:36:26', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('170', '2018-10-02 17:52:53', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('171', '2018-10-02 17:53:04', 'User has logged in.', '2', '0');
INSERT INTO `user_logs` VALUES ('172', '2018-10-02 17:53:12', 'User has logged out.', '2', '0');
INSERT INTO `user_logs` VALUES ('173', '2018-10-02 17:53:16', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('174', '2018-10-02 18:09:33', '<strong>Inserted School</strong> \'sdasdsad\'', '1', '0');
INSERT INTO `user_logs` VALUES ('175', '2018-10-02 18:09:49', '<strong>Inserted School</strong> \'sdasdasdasdasdasdasd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('176', '2018-10-02 18:10:33', '<strong>Inserted Certificate</strong> \'asdasdasdasd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('177', '2018-10-02 18:11:45', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('178', '2018-10-02 18:12:55', '<strong>Inserted Certificate</strong> \'Marc Reginald \'', '1', '0');
INSERT INTO `user_logs` VALUES ('179', '2018-10-02 18:13:25', '<strong>Updated Certificate</strong> \'Marc Reginald\'', '1', '0');
INSERT INTO `user_logs` VALUES ('180', '2018-10-02 18:13:37', '<strong>Updated Certificate</strong> \'Marc Reginald\'', '1', '0');
INSERT INTO `user_logs` VALUES ('181', '2018-10-02 18:13:51', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('182', '2018-10-02 18:16:49', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('183', '2018-10-02 18:17:04', '<strong>Inserted School</strong> \'school 5\'', '1', '0');
INSERT INTO `user_logs` VALUES ('184', '2018-10-02 18:18:03', '<strong>Inserted Certificate</strong> \'Jovani Dimaangay\'', '1', '0');
INSERT INTO `user_logs` VALUES ('185', '2018-10-02 19:12:10', '<strong>Inserted Course</strong> \'course 3\'', '1', '0');
INSERT INTO `user_logs` VALUES ('186', '2018-10-02 19:12:20', '<strong>Inserted Course</strong> \'course 4\'', '1', '0');
INSERT INTO `user_logs` VALUES ('187', '2018-10-03 04:17:48', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('188', '2018-10-03 10:36:19', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('189', '2018-10-03 13:16:16', 'User has logged out.', '0', '0');
INSERT INTO `user_logs` VALUES ('190', '2018-10-03 13:16:21', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('191', '2018-10-03 13:16:35', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('192', '2018-10-03 13:17:41', '<strong>Updated Course</strong> \'Agricultural Crops Production\'', '1', '0');
INSERT INTO `user_logs` VALUES ('193', '2018-10-03 13:17:50', '<strong>Updated Course</strong> \'Agricultural Machinery Operation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('194', '2018-10-03 13:18:00', '<strong>Updated Course</strong> \'Agroentrepreneurship\'', '1', '0');
INSERT INTO `user_logs` VALUES ('195', '2018-10-03 13:18:10', '<strong>Updated Course</strong> \'Animal Health Care and Management\'', '1', '0');
INSERT INTO `user_logs` VALUES ('196', '2018-10-03 13:18:18', '<strong>Inserted Course</strong> \'Animal Production (Poultry-Chicken)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('197', '2018-10-03 13:19:03', '<strong>Inserted Course</strong> \'Animal Production (Ruminants)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('198', '2018-10-03 13:19:09', '<strong>Inserted Course</strong> \'Animal Production (Swine)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('199', '2018-10-03 13:19:17', '<strong>Inserted Course</strong> \'Aquaculture\'', '1', '0');
INSERT INTO `user_logs` VALUES ('200', '2018-10-03 13:19:41', '<strong>Inserted Course</strong> \'Artificial Insemination (Large Ruminants)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('201', '2018-10-03 13:19:49', '<strong>Inserted Course</strong> \'Artificial Insemination (Swine)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('202', '2018-10-03 13:20:27', '<strong>Inserted Course</strong> \'Drying and Milling Plant Servicing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('203', '2018-10-03 13:20:34', '<strong>Inserted Course</strong> \'Fish Capture\'', '1', '0');
INSERT INTO `user_logs` VALUES ('204', '2018-10-03 13:20:41', '<strong>Inserted Course</strong> \'Fishing Gear Repair and Maintenance	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('205', '2018-10-03 13:23:23', '<strong>Inserted Course</strong> \'Fishport/Wharf Operation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('206', '2018-10-03 13:23:30', '<strong>Inserted Course</strong> \'Grains Production\'', '1', '0');
INSERT INTO `user_logs` VALUES ('207', '2018-10-03 13:23:37', '<strong>Inserted Course</strong> \'Horticulture\'', '1', '0');
INSERT INTO `user_logs` VALUES ('208', '2018-10-03 13:23:45', '<strong>Inserted Course</strong> \'Landscape Installation and Maintenance (Softscape)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('209', '2018-10-03 13:23:52', '<strong>Inserted Course</strong> \'Milking Operation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('210', '2018-10-03 13:23:59', '<strong>Inserted Course</strong> \'Organic Agriculture Production\'', '1', '0');
INSERT INTO `user_logs` VALUES ('211', '2018-10-03 13:24:06', '<strong>Inserted Course</strong> \'Pest Management (Vegetables)	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('212', '2018-10-03 13:24:12', '<strong>Inserted Course</strong> \'Rice Machinery Operations\'', '1', '0');
INSERT INTO `user_logs` VALUES ('213', '2018-10-03 13:25:06', '<strong>Inserted Course</strong> \'Rubber Processing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('214', '2018-10-03 13:25:13', '<strong>Inserted Course</strong> \'Rubber Production\'', '1', '0');
INSERT INTO `user_logs` VALUES ('215', '2018-10-03 13:25:20', '<strong>Inserted Course</strong> \'Seaweeds Production\'', '1', '0');
INSERT INTO `user_logs` VALUES ('216', '2018-10-03 13:25:26', '<strong>Inserted Course</strong> \'Sugarcane Production	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('217', '2018-10-03 13:25:37', '<strong>Inserted Course</strong> \'Auto Engine Rebuilding\'', '1', '0');
INSERT INTO `user_logs` VALUES ('218', '2018-10-03 13:25:43', '<strong>Inserted Course</strong> \'Automotive Body Painting/Finishing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('219', '2018-10-03 13:25:50', '<strong>Inserted Course</strong> \'Automotive Body Repairing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('220', '2018-10-03 13:25:57', '<strong>Inserted Course</strong> \'Automotive Electrical Assembly\'', '1', '0');
INSERT INTO `user_logs` VALUES ('221', '2018-10-03 13:26:03', '<strong>Inserted Course</strong> \'Automotive Mechanical Assembly\'', '1', '0');
INSERT INTO `user_logs` VALUES ('222', '2018-10-03 13:26:13', '<strong>Inserted Course</strong> \'Automotive Servicing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('223', '2018-10-03 13:26:20', '<strong>Inserted Course</strong> \'Automotive Wiring Harness Assembly\'', '1', '0');
INSERT INTO `user_logs` VALUES ('224', '2018-10-03 13:26:26', '<strong>Inserted Course</strong> \'Driving	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('225', '2018-10-03 13:26:33', '<strong>Inserted Course</strong> \'Driving (Articulated Vehicle)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('226', '2018-10-03 13:26:50', '<strong>Inserted Course</strong> \'Driving (Passenger Bus/Straight Truck)	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('227', '2018-10-03 13:26:55', '<strong>Inserted Course</strong> \'Forging	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('228', '2018-10-03 13:27:03', '<strong>Inserted Course</strong> \'Foundry Melting/Casting\'', '1', '0');
INSERT INTO `user_logs` VALUES ('229', '2018-10-03 13:27:16', '<strong>Inserted Course</strong> \'Foundry Molding\'', '1', '0');
INSERT INTO `user_logs` VALUES ('230', '2018-10-03 13:27:25', '<strong>Inserted Course</strong> \'Foundry Pattern Making\'', '1', '0');
INSERT INTO `user_logs` VALUES ('231', '2018-10-03 13:28:24', '<strong>Inserted Course</strong> \'Heat Treatment	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('232', '2018-10-03 13:28:37', '<strong>Inserted Course</strong> \'Laboratory and Metrology/Calibration\'', '1', '0');
INSERT INTO `user_logs` VALUES ('233', '2018-10-03 13:29:00', '<strong>Inserted Course</strong> \'Metal Stamping\'', '1', '0');
INSERT INTO `user_logs` VALUES ('234', '2018-10-03 13:29:12', '<strong>Inserted Course</strong> \'Moldmaking\'', '1', '0');
INSERT INTO `user_logs` VALUES ('235', '2018-10-03 13:29:19', '<strong>Inserted Course</strong> \'Motorcycle/Small Engine Servicing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('236', '2018-10-03 13:29:25', '<strong>Inserted Course</strong> \'Painting Machine Operation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('237', '2018-10-03 13:29:32', '<strong>Inserted Course</strong> \'Plastic Machine Operation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('238', '2018-10-03 13:29:40', '<strong>Inserted Course</strong> \'Process Inspection	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('239', '2018-10-03 13:29:48', '<strong>Inserted Course</strong> \'Tinsmithing (Automotive Manufacturing)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('240', '2018-10-03 13:30:00', '<strong>Inserted Course</strong> \'Chemical Process Operations\'', '1', '0');
INSERT INTO `user_logs` VALUES ('241', '2018-10-03 13:30:07', '<strong>Inserted Course</strong> \'Construction\'', '1', '0');
INSERT INTO `user_logs` VALUES ('242', '2018-10-03 13:30:17', '<strong>Inserted Course</strong> \'Carpentry\'', '1', '0');
INSERT INTO `user_logs` VALUES ('243', '2018-10-03 13:30:24', '<strong>Deleted Course</strong> \"Construction\"', '1', '0');
INSERT INTO `user_logs` VALUES ('244', '2018-10-03 13:30:33', '<strong>Inserted Course</strong> \'Construction Lift Passenger/Material Elevator Operation	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('245', '2018-10-03 13:30:47', '<strong>Inserted Course</strong> \'Construction Painting\'', '1', '0');
INSERT INTO `user_logs` VALUES ('246', '2018-10-03 13:30:54', '<strong>Inserted Course</strong> \'Heavy Equipment Operation (Bulldozer)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('247', '2018-10-03 13:31:03', '<strong>Inserted Course</strong> \'Heavy Equipment Servicing (Mechanical)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('248', '2018-10-03 13:31:10', '<strong>Inserted Course</strong> \'HEO (Articulated Off-Higway Dump Truck)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('249', '2018-10-03 13:31:16', '<strong>Inserted Course</strong> \'HEO (Backhoe Loader)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('250', '2018-10-03 13:31:23', '<strong>Inserted Course</strong> \'HEO (Concrete Pump)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('251', '2018-10-03 13:31:29', '<strong>Inserted Course</strong> \'HEO (Container Stacker)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('252', '2018-10-03 13:31:36', '<strong>Inserted Course</strong> \'HEO (Crawler Crane)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('253', '2018-10-03 13:31:42', '<strong>Inserted Course</strong> \'HEO (Forklift)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('254', '2018-10-03 13:31:48', '<strong>Inserted Course</strong> \'HEO (Gantry Crane)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('255', '2018-10-03 13:31:53', '<strong>Inserted Course</strong> \'HEO (Hydraulic Excavator)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('256', '2018-10-03 13:32:01', '<strong>Inserted Course</strong> \'HEO (Motor Grader)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('257', '2018-10-03 13:32:08', '<strong>Inserted Course</strong> \'HEO (Paver)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('258', '2018-10-03 13:32:49', '<strong>Inserted Course</strong> \'HEO (Rigid Off-Highway Dump Truck)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('259', '2018-10-03 13:32:57', '<strong>Inserted Course</strong> \'HEO (Road Roller)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('260', '2018-10-03 13:33:04', '<strong>Inserted Course</strong> \'HEO (Rough Terrain Crane)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('261', '2018-10-03 13:33:21', '<strong>Inserted Course</strong> \'HEO (Screed)	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('262', '2018-10-03 13:33:27', '<strong>Inserted Course</strong> \'HEO (Tower Crane)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('263', '2018-10-03 13:33:33', '<strong>Inserted Course</strong> \'HEO (Transit Mixer)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('264', '2018-10-03 13:34:00', '<strong>Inserted Course</strong> \'HEO (Truck Mounted Crane)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('265', '2018-10-03 13:34:08', '<strong>Inserted Course</strong> \'HEO (Wheel Loader)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('266', '2018-10-03 13:34:42', 'User has logged in.', '4', '0');
INSERT INTO `user_logs` VALUES ('267', '2018-10-03 13:35:03', 'User has logged out.', '4', '0');
INSERT INTO `user_logs` VALUES ('268', '2018-10-03 13:35:17', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('269', '2018-10-03 13:38:08', '<strong>Updated School</strong> \'BUTUAN CITY MANPOWER TRAINING CENTER\'', '1', '0');
INSERT INTO `user_logs` VALUES ('270', '2018-10-03 13:38:39', '<strong>Updated School</strong> \'CARAGA STATE UNIVERSITY-MAIN CAMPUS\'', '1', '0');
INSERT INTO `user_logs` VALUES ('271', '2018-10-03 13:38:56', '<strong>Updated School</strong> \'BUTUAN CITY MANPOWER TRAINING CENTER\'', '1', '0');
INSERT INTO `user_logs` VALUES ('272', '2018-10-03 13:39:27', '<strong>Updated School</strong> \'LAS NIEVES TRAINING CENTER\'', '1', '0');
INSERT INTO `user_logs` VALUES ('273', '2018-10-03 13:41:30', '<strong>Inserted Course</strong> \'Masonry\'', '1', '0');
INSERT INTO `user_logs` VALUES ('274', '2018-10-03 13:41:44', '<strong>Updated School</strong> \'ACLC COLLEGE OF BUTUAN CITY, INC. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('275', '2018-10-03 13:41:49', '<strong>Inserted Course</strong> \'Pipefitting\'', '1', '0');
INSERT INTO `user_logs` VALUES ('276', '2018-10-03 13:42:17', '<strong>Inserted Course</strong> \'Plumbing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('277', '2018-10-03 13:42:17', '<strong>Inserted School</strong> \'ASIAN COLLEGE FOUNDATION, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('278', '2018-10-03 13:42:38', '<strong>Inserted Course</strong> \'PV System Design\'', '1', '0');
INSERT INTO `user_logs` VALUES ('279', '2018-10-03 13:42:57', '<strong>Inserted Course</strong> \'PV Systems Installation	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('280', '2018-10-03 13:43:30', '<strong>Inserted Course</strong> \'PV Systems Servicing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('281', '2018-10-03 13:43:32', '<strong>Inserted School</strong> \'BUTUAN CITY COLLEGES, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('282', '2018-10-03 13:43:47', '<strong>Inserted Course</strong> \'Reinforcing Steel Works	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('283', '2018-10-03 13:43:57', '<strong>Inserted School</strong> \'BUTUAN DOCTORS’ HOSPITAL AND COLLEGE, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('284', '2018-10-03 13:44:04', '<strong>Inserted Course</strong> \'Rigging	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('285', '2018-10-03 13:44:24', '<strong>Inserted School</strong> \'CENTER FOR HEALTHCARE PROFESSIONS BUTUAN, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('286', '2018-10-03 13:44:26', '<strong>Inserted Course</strong> \'Scaffold Erection\'', '1', '0');
INSERT INTO `user_logs` VALUES ('287', '2018-10-03 13:44:48', '<strong>Inserted Course</strong> \'Structural Erection\'', '1', '0');
INSERT INTO `user_logs` VALUES ('288', '2018-10-03 13:45:03', '<strong>Inserted School</strong> \'ELISA R. OCHOA MEMORIAL NORTHERN MINDANAO SCHOOL OF MIDWIFERY, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('289', '2018-10-03 13:45:04', '<strong>Inserted Course</strong> \'System Formworks Installation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('290', '2018-10-03 13:45:19', '<strong>Inserted Course</strong> \'Technical Drafting\'', '1', '0');
INSERT INTO `user_logs` VALUES ('291', '2018-10-03 13:45:36', '<strong>Inserted Course</strong> \'Tile Setting\'', '1', '0');
INSERT INTO `user_logs` VALUES ('292', '2018-10-03 13:45:37', '<strong>Inserted School</strong> \'FATHER SATURNINO URIOS UNIVERSITY, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('293', '2018-10-03 13:46:12', '<strong>Inserted School</strong> \'FATHER URIOS INSTITUTE OF TECHNOLOGY OF AMPAYON, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('294', '2018-10-03 13:46:34', '<strong>Inserted Course</strong> \'Jewelry Making (Fine Jewelry)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('295', '2018-10-03 13:46:54', '<strong>Inserted School</strong> \'HOLY CHILD COLLEGES OF BUTUAN, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('296', '2018-10-03 13:47:06', '<strong>Inserted Course</strong> \'Computer Systems Servicing	Computer Hardware Servicing \'', '1', '0');
INSERT INTO `user_logs` VALUES ('297', '2018-10-03 13:47:23', '<strong>Inserted Course</strong> \'Consumer Electronics Servicing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('298', '2018-10-03 13:47:37', '<strong>Inserted School</strong> \'LE’ OPHIR LEARNING SCHOOL, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('299', '2018-10-03 13:48:02', '<strong>Inserted School</strong> \'MANA MILLENIUM TECHNICAL SCHOOL (MMTS), INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('300', '2018-10-03 13:48:17', '<strong>Inserted Course</strong> \'Electrical Installation and Maintenance	Electrical Installation and Maintenance NC II - CONEIM208\'', '1', '0');
INSERT INTO `user_logs` VALUES ('301', '2018-10-03 13:49:33', '<strong>Inserted Course</strong> \'Electrical Installation and Maintenance\'', '1', '0');
INSERT INTO `user_logs` VALUES ('302', '2018-10-03 13:49:44', '<strong>Inserted School</strong> \'PHILIPPINE ELECTRONICS AND COMMUNICATION  INSTITUTE  OF  TECHNOLOGY, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('303', '2018-10-03 13:49:53', '<strong>Inserted Course</strong> \'Electronics Back-End Operation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('304', '2018-10-03 13:50:25', '<strong>Inserted Course</strong> \'Electronics Front - of - Line Operation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('305', '2018-10-03 13:50:26', '<strong>Inserted School</strong> \'RELIANCE TRAINING INSTITUTE, INC. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('306', '2018-10-03 13:50:43', '<strong>Inserted Course</strong> \'Electronics Products Assembly and Servicing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('307', '2018-10-03 13:50:56', '<strong>Inserted School</strong> \'SAINT JOSEPH INSTITUTE OF TECHNOLOGY, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('308', '2018-10-03 13:51:08', '<strong>Inserted Course</strong> \'Hard Disk Drive (HDD) Front- of Line Operation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('309', '2018-10-03 13:51:29', '<strong>Inserted School</strong> \'NASIPIT NATIONAL VOCATIONAL SCHOOL\'', '1', '0');
INSERT INTO `user_logs` VALUES ('310', '2018-10-03 13:51:43', '<strong>Inserted Course</strong> \'Instrumentation and Control Servicing	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('311', '2018-10-03 13:52:12', '<strong>Inserted Course</strong> \'Mechatronics Servicing	Mechatronics Servicing NC II - ELCMEC206\'', '1', '0');
INSERT INTO `user_logs` VALUES ('312', '2018-10-03 13:52:34', '<strong>Inserted School</strong> \'NORTHERN MINDANAO SCHOOL OF FISHERIES \'', '1', '0');
INSERT INTO `user_logs` VALUES ('313', '2018-10-03 13:52:42', '<strong>Inserted Course</strong> \'Mechatronics Servicing	Mechatronics Servicing NC III - ELCMEC306\'', '1', '0');
INSERT INTO `user_logs` VALUES ('314', '2018-10-03 13:52:57', '<strong>Inserted Course</strong> \'Mechatronics Servicing	Mechatronics Servicing NC IV - ELCMEC406\'', '1', '0');
INSERT INTO `user_logs` VALUES ('315', '2018-10-03 13:52:58', '<strong>Inserted School</strong> \'PROVINCIAL TRAINING CENTER-AGUSAN DEL NORTE\'', '1', '0');
INSERT INTO `user_logs` VALUES ('316', '2018-10-03 13:53:17', '<strong>Inserted Course</strong> \'Semiconductor Back - End Operation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('317', '2018-10-03 13:53:25', '<strong>Inserted School</strong> \'CANDELARIA INSTITUTE OF TECHNOLOGY OF CABADBARAN, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('318', '2018-10-03 13:53:38', '<strong>Inserted Course</strong> \'Semiconductor Front - of - Line Operations\'', '1', '0');
INSERT INTO `user_logs` VALUES ('319', '2018-10-03 13:53:59', '<strong>Inserted School</strong> \'NORTHERN MINDANAO COLLEGES, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('320', '2018-10-03 13:54:14', '<strong>Inserted Course</strong> \'Footwear Making\'', '1', '0');
INSERT INTO `user_logs` VALUES ('321', '2018-10-03 13:54:23', '<strong>Inserted School</strong> \'SAINT MICHAEL COLLEGE OF CARAGA, INC.\'', '1', '0');
INSERT INTO `user_logs` VALUES ('322', '2018-10-03 13:54:34', '<strong>Inserted Course</strong> \'Furniture Making (Finishing)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('323', '2018-10-03 13:54:53', '<strong>Inserted Course</strong> \'Dressmaking\'', '1', '0');
INSERT INTO `user_logs` VALUES ('324', '2018-10-03 13:55:10', '<strong>Inserted School</strong> \'GML AGRI-VENTURES FARM \'', '1', '0');
INSERT INTO `user_logs` VALUES ('325', '2018-10-03 13:55:13', '<strong>Inserted Course</strong> \'Fashion Design (Apparel)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('326', '2018-10-03 13:55:29', '<strong>Inserted School</strong> \'MABAKAS TECHNO DEMO FARM \'', '1', '0');
INSERT INTO `user_logs` VALUES ('327', '2018-10-03 13:55:29', '<strong>Inserted Course</strong> \'Tailoring\'', '1', '0');
INSERT INTO `user_logs` VALUES ('328', '2018-10-03 13:55:52', '<strong>Inserted School</strong> \'SR METALS INCORPORATED \'', '1', '0');
INSERT INTO `user_logs` VALUES ('329', '2018-10-03 13:55:56', '<strong>Inserted Course</strong> \'Air Duct Servicing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('330', '2018-10-03 13:56:12', '<strong>Inserted Course</strong> \'Ice Plant Refrigeration Servicing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('331', '2018-10-03 13:56:28', '<strong>Inserted Course</strong> \'Land-based Transport Refrigeration Servicing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('332', '2018-10-03 13:56:49', '<strong>Inserted Course</strong> \'RAC Servicing (DomRAC)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('333', '2018-10-03 13:57:12', '<strong>Inserted Course</strong> \'RAC Servicing (PACU-CRE)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('334', '2018-10-03 13:57:30', '<strong>Inserted Course</strong> \'Barangay Health Services\'', '1', '0');
INSERT INTO `user_logs` VALUES ('335', '2018-10-03 13:57:48', '<strong>Inserted Course</strong> \'Biomedical Equipment Services	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('336', '2018-10-03 13:58:10', '<strong>Inserted Course</strong> \'Caregiving	Caregiving NC II - HCSCGV204	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('337', '2018-10-03 13:58:26', '<strong>Inserted Course</strong> \'Dental Hygiene\'', '1', '0');
INSERT INTO `user_logs` VALUES ('338', '2018-10-03 13:58:48', '<strong>Inserted Course</strong> \'Dental Laboratory Technology Services\'', '1', '0');
INSERT INTO `user_logs` VALUES ('339', '2018-10-03 13:59:05', '<strong>Inserted Course</strong> \'Dental Laboratory Technology Services (Fixed Dentures/Restorations)	\'', '1', '0');
INSERT INTO `user_logs` VALUES ('340', '2018-10-03 13:59:23', '<strong>Inserted Course</strong> \'Dental Laboratory Technology Services (Removable Dentures/Appliances)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('341', '2018-10-03 13:59:45', '<strong>Inserted Course</strong> \'Dental Technology\'', '1', '0');
INSERT INTO `user_logs` VALUES ('342', '2018-10-03 14:00:23', '<strong>Inserted Course</strong> \'Emergency Medical Services	Emergency Medical Services NC II - HCSEMS206\'', '1', '0');
INSERT INTO `user_logs` VALUES ('343', '2018-10-03 14:00:51', '<strong>Inserted Course</strong> \'Health Care Services\'', '1', '0');
INSERT INTO `user_logs` VALUES ('344', '2018-10-03 14:01:07', '<strong>Inserted Course</strong> \'Hilot (Wellness Massage)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('345', '2018-10-03 14:01:30', '<strong>Inserted Course</strong> \'Massage Therapy	Massage Therapy NC II - HHCMAT206\'', '1', '0');
INSERT INTO `user_logs` VALUES ('346', '2018-10-03 14:01:47', '<strong>Inserted Course</strong> \'Ophthalmic Lens Services\'', '1', '0');
INSERT INTO `user_logs` VALUES ('347', '2018-10-03 14:02:07', '<strong>Inserted Course</strong> \'Pharmacy Services	Pharmacy Services NC II - HHCPHA208\'', '1', '0');
INSERT INTO `user_logs` VALUES ('348', '2018-10-03 14:02:23', '<strong>Inserted Course</strong> \'2D Animation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('349', '2018-10-03 14:02:42', '<strong>Inserted Course</strong> \'2D Game Art Development\'', '1', '0');
INSERT INTO `user_logs` VALUES ('350', '2018-10-03 14:02:57', '<strong>Inserted Course</strong> \'3D Animation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('351', '2018-10-03 14:03:16', '<strong>Inserted Course</strong> \'3D Game Art Development\'', '1', '0');
INSERT INTO `user_logs` VALUES ('352', '2018-10-03 14:03:32', '<strong>Inserted Course</strong> \'Animation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('353', '2018-10-03 14:03:49', '<strong>Inserted Course</strong> \'Broadband Installation (Fixed Wireless Systems)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('354', '2018-10-03 14:04:37', '<strong>Inserted Course</strong> \'Cable TV Installation\'', '1', '0');
INSERT INTO `user_logs` VALUES ('355', '2018-10-03 14:04:50', '<strong>Inserted Course</strong> \'Cable TV Operation and Maintenance\'', '1', '0');
INSERT INTO `user_logs` VALUES ('356', '2018-10-03 14:05:05', '<strong>Inserted Course</strong> \'Contact Center Services	Contact Center Servicing NC II - ICTCCS206\'', '1', '0');
INSERT INTO `user_logs` VALUES ('357', '2018-10-03 14:05:20', '<strong>Inserted Course</strong> \'Game Programming\'', '1', '0');
INSERT INTO `user_logs` VALUES ('358', '2018-10-03 14:05:34', '<strong>Inserted Course</strong> \'Medical Coding and Billing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('359', '2018-10-03 14:05:55', '<strong>Inserted Course</strong> \'Medical Coding and Claims Processing	Medical Coding and Billing NC II - ICTMCB212\'', '1', '0');
INSERT INTO `user_logs` VALUES ('360', '2018-10-03 14:06:15', '<strong>Inserted Course</strong> \'Medical Transcription\'', '1', '0');
INSERT INTO `user_logs` VALUES ('361', '2018-10-03 14:06:32', '<strong>Inserted Course</strong> \'Programming (.Net Technology)	Programming NC IV - ICTPRG405\'', '1', '0');
INSERT INTO `user_logs` VALUES ('362', '2018-10-03 14:06:52', '<strong>Inserted Course</strong> \'Programming (Java)	Programming NC IV - ICTPRG405\'', '1', '0');
INSERT INTO `user_logs` VALUES ('363', '2018-10-03 14:07:11', '<strong>Inserted Course</strong> \'Programming (Oracle Database)	Programming NC IV - ICTPRG405\'', '1', '0');
INSERT INTO `user_logs` VALUES ('364', '2018-10-03 14:07:30', '<strong>Inserted Course</strong> \'Telecom OSP and Subscriber Line Installation (Copper Cable/POTS and DSL)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('365', '2018-10-03 14:07:46', '<strong>Inserted Course</strong> \'Telecom OSP Installation (Fiber Optic Cable)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('366', '2018-10-03 14:08:01', '<strong>Inserted Course</strong> \'Visual Graphic Design\'', '1', '0');
INSERT INTO `user_logs` VALUES ('367', '2018-10-03 14:08:23', '<strong>Inserted Course</strong> \'Warehousing Services\'', '1', '0');
INSERT INTO `user_logs` VALUES ('368', '2018-10-03 14:08:45', '<strong>Inserted Course</strong> \'Marine Electricity\'', '1', '0');
INSERT INTO `user_logs` VALUES ('369', '2018-10-03 14:12:25', '<strong>Updated Certificate Type</strong> \'IAN JHON LOPEZ ORBISO\'', '1', '0');
INSERT INTO `user_logs` VALUES ('370', '2018-10-03 14:12:34', '<strong>Updated Certificate Type</strong> \'COC\'', '1', '0');
INSERT INTO `user_logs` VALUES ('371', '2018-10-03 14:12:39', '<strong>Inserted Certificate Type</strong> \'NC\'', '1', '0');
INSERT INTO `user_logs` VALUES ('372', '2018-10-03 14:14:28', '<strong>Updated Certificate</strong> \'IAN JHON  LOPEZ ORBISO\'', '1', '0');
INSERT INTO `user_logs` VALUES ('373', '2018-10-03 14:14:53', '<strong>Deleted Certificate</strong> \"\"', '1', '0');
INSERT INTO `user_logs` VALUES ('374', '2018-10-03 14:14:55', '<strong>Deleted Certificate</strong> \"\"', '1', '0');
INSERT INTO `user_logs` VALUES ('375', '2018-10-03 14:17:14', '<strong>Updated Certificate</strong> \'EARL CHRISTIAN GONZAGA PESCUESO\'', '1', '0');
INSERT INTO `user_logs` VALUES ('376', '2018-10-03 14:17:34', '<strong>Deleted Certificate</strong> \"\"', '1', '0');
INSERT INTO `user_logs` VALUES ('377', '2018-10-03 14:19:00', '<strong>Inserted Course</strong> \'Shielded Metal Arc Welding (SMAW) NC II\'', '1', '0');
INSERT INTO `user_logs` VALUES ('378', '2018-10-03 14:19:23', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('379', '2018-10-03 14:19:51', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('380', '2018-10-03 14:23:18', '<strong>Inserted Certificate</strong> \'MARC REGINALD RACHO PANALIGAN\'', '1', '0');
INSERT INTO `user_logs` VALUES ('381', '2018-10-03 14:26:04', '<strong>Inserted Certificate</strong> \'JOVANI DIMAANGAY\'', '1', '0');
INSERT INTO `user_logs` VALUES ('382', '2018-10-03 14:28:12', '<strong>Inserted Certificate</strong> \'HARVIIN CABIAD\'', '1', '0');
INSERT INTO `user_logs` VALUES ('383', '2018-10-03 14:29:50', '<strong>Inserted Certificate</strong> \'JOHN CHRISTIAN MORALDE\'', '1', '0');
INSERT INTO `user_logs` VALUES ('384', '2018-10-03 14:30:27', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('385', '2018-10-03 14:30:54', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('386', '2018-10-03 14:34:35', '<strong>Inserted School</strong> \'Agusan National High School\'', '1', '0');
INSERT INTO `user_logs` VALUES ('387', '2018-10-03 14:35:28', '<strong>Deleted School</strong> \"Agusan National High School\"', '1', '0');
INSERT INTO `user_logs` VALUES ('388', '2018-10-03 14:35:43', '<strong>Inserted School</strong> \'AGUSAN NATIONAL HIGH SCHOOL\'', '1', '0');
INSERT INTO `user_logs` VALUES ('389', '2018-10-03 14:37:23', '<strong>Inserted Certificate</strong> \'REACHEL TINDOY\'', '1', '0');
INSERT INTO `user_logs` VALUES ('390', '2018-10-03 14:38:00', '<strong>Inserted Certificate</strong> \'IAN ALFONSO\'', '1', '0');
INSERT INTO `user_logs` VALUES ('391', '2018-10-03 14:39:18', '<strong>Inserted Certificate</strong> \'ARNOLD PONTEBIDRA\'', '1', '0');
INSERT INTO `user_logs` VALUES ('392', '2018-10-03 14:40:40', '<strong>Inserted Certificate</strong> \'JOSHUA PANGAKIT\'', '1', '0');
INSERT INTO `user_logs` VALUES ('393', '2018-10-03 14:41:42', '<strong>Inserted Certificate</strong> \'ERINE LARA\'', '1', '0');
INSERT INTO `user_logs` VALUES ('394', '2018-10-03 14:42:24', '<strong>Inserted Certificate</strong> \'JOSHUA SHANE OLILA\'', '1', '0');
INSERT INTO `user_logs` VALUES ('395', '2018-10-03 14:43:32', '<strong>Inserted Certificate</strong> \'JOHN LAPASANDA\'', '1', '0');
INSERT INTO `user_logs` VALUES ('396', '2018-10-03 14:43:55', '<strong>Deleted Certificate</strong> \"\"', '1', '0');
INSERT INTO `user_logs` VALUES ('397', '2018-10-03 14:45:06', '<strong>Inserted Certificate</strong> \'BRYAN SILVANO\'', '1', '0');
INSERT INTO `user_logs` VALUES ('398', '2018-10-03 14:45:42', '<strong>Deleted Certificate</strong> \"\"', '1', '0');
INSERT INTO `user_logs` VALUES ('399', '2018-10-03 14:46:32', '<strong>Inserted Certificate</strong> \'FERDINAND DANTES\'', '1', '0');
INSERT INTO `user_logs` VALUES ('400', '2018-10-03 14:48:25', '<strong>Inserted Certificate</strong> \'ZARA MUMTAZ\'', '1', '0');
INSERT INTO `user_logs` VALUES ('401', '2018-10-03 14:56:52', '<strong>Inserted Certificate</strong> \'EARL JAY LEYSON\'', '1', '0');
INSERT INTO `user_logs` VALUES ('402', '2018-10-03 15:19:47', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('403', '2018-10-03 15:21:04', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('404', '2018-10-03 15:23:42', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('405', '2018-10-03 15:27:33', '<strong>Inserted Certificate</strong> \'Cañada, Ralph Ryan E. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('406', '2018-10-03 15:29:28', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('407', '2018-10-03 15:30:12', '<strong>Inserted Certificate</strong> \'Doe, John S. II\'', '1', '0');
INSERT INTO `user_logs` VALUES ('408', '2018-10-03 15:31:44', '<strong>Inserted Certificate</strong> \'Doe, John S. II\'', '1', '0');
INSERT INTO `user_logs` VALUES ('409', '2018-10-03 15:34:23', '<strong>Inserted Certificate</strong> \'Ghfgh, Fghgfh G. Gfhgfhf\'', '1', '0');
INSERT INTO `user_logs` VALUES ('410', '2018-10-03 15:40:18', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('411', '2018-10-03 15:40:35', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('412', '2018-10-03 15:41:32', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('413', '2018-10-03 15:41:39', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('414', '2018-10-03 15:50:24', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('415', '2018-10-03 15:50:32', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('416', '2018-10-03 18:33:48', 'User has logged out.', '0', '0');
INSERT INTO `user_logs` VALUES ('417', '2018-10-03 18:34:08', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('418', '2018-10-03 23:48:41', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('419', '2018-10-07 17:51:10', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('420', '2018-10-07 18:02:30', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('421', '2018-10-08 14:36:45', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('422', '2018-10-08 14:50:57', '<strong>Inserted Course</strong> \'asdasdsa\'', '1', '0');
INSERT INTO `user_logs` VALUES ('423', '2018-10-08 14:53:12', '<strong>Inserted Course</strong> \'asdasdsa\'', '1', '0');
INSERT INTO `user_logs` VALUES ('424', '2018-10-08 14:53:45', '<strong>Inserted Course</strong> \'asdasdsadsadsad\'', '1', '0');
INSERT INTO `user_logs` VALUES ('425', '2018-10-08 14:53:49', '<strong>Updated Course</strong> \'asdasdsadsadsad\'', '1', '0');
INSERT INTO `user_logs` VALUES ('426', '2018-10-08 14:53:51', '<strong>Deleted Course</strong> \"asdasdsadsadsad1\"', '1', '0');
INSERT INTO `user_logs` VALUES ('427', '2018-10-08 14:58:23', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('428', '2018-10-08 15:00:14', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('429', '2018-10-08 15:01:51', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('430', '2018-10-08 15:03:51', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('431', '2018-10-08 15:10:54', '<strong>Deleted School</strong> \"ACLC COLLEGE OF BUTUAN CITY, INC.\"', '1', '0');
INSERT INTO `user_logs` VALUES ('432', '2018-10-08 15:10:56', '<strong>Deleted School</strong> \"AGUSAN NATIONAL HIGH SCHOOL\"', '1', '0');
INSERT INTO `user_logs` VALUES ('433', '2018-10-08 15:10:59', '<strong>Deleted School</strong> \"ASIAN COLLEGE FOUNDATION, INC.\"', '1', '0');
INSERT INTO `user_logs` VALUES ('434', '2018-10-08 15:11:01', '<strong>Deleted School</strong> \"BUTUAN CITY COLLEGES, INC.\"', '1', '0');
INSERT INTO `user_logs` VALUES ('435', '2018-10-08 15:11:03', '<strong>Deleted School</strong> \"BUTUAN CITY MANPOWER TRAINING CENTER\"', '1', '0');
INSERT INTO `user_logs` VALUES ('436', '2018-10-08 15:11:04', '<strong>Deleted School</strong> \"BUTUAN DOCTORS’ HOSPITAL AND COLLEGE, INC.\"', '1', '0');
INSERT INTO `user_logs` VALUES ('437', '2018-10-08 15:11:06', '<strong>Deleted School</strong> \"CANDELARIA INSTITUTE OF TECHNOLOGY OF CABADBARAN, INC.\"', '1', '0');
INSERT INTO `user_logs` VALUES ('438', '2018-10-08 15:11:07', '<strong>Deleted School</strong> \"CARAGA STATE UNIVERSITY-MAIN CAMPUS\"', '1', '0');
INSERT INTO `user_logs` VALUES ('439', '2018-10-08 15:11:09', '<strong>Deleted School</strong> \"CENTER FOR HEALTHCARE PROFESSIONS BUTUAN, INC.\"', '1', '0');
INSERT INTO `user_logs` VALUES ('440', '2018-10-08 15:11:11', '<strong>Deleted School</strong> \"ELISA R. OCHOA MEMORIAL NORTHERN MINDANAO SCHOOL OF MIDWIFERY, INC.\"', '1', '0');
INSERT INTO `user_logs` VALUES ('441', '2018-10-08 15:11:13', '<strong>Deleted School</strong> \"FATHER SATURNINO URIOS UNIVERSITY, INC.\"', '1', '0');
INSERT INTO `user_logs` VALUES ('442', '2018-10-08 15:11:18', '<strong>Deleted School</strong> \"FATHER URIOS INSTITUTE OF TECHNOLOGY OF AMPAYON, INC.\"', '1', '0');
INSERT INTO `user_logs` VALUES ('443', '2018-10-08 15:11:20', '<strong>Deleted School</strong> \"LE’ OPHIR LEARNING SCHOOL, INC.\"', '1', '0');
INSERT INTO `user_logs` VALUES ('444', '2018-10-08 15:11:22', '<strong>Deleted School</strong> \"LAS NIEVES TRAINING CENTER\"', '1', '0');
INSERT INTO `user_logs` VALUES ('445', '2018-10-08 15:11:24', '<strong>Deleted School</strong> \"HOLY CHILD COLLEGES OF BUTUAN, INC.\"', '1', '0');
INSERT INTO `user_logs` VALUES ('446', '2018-10-08 15:11:50', '<strong>Inserted Course</strong> \'dasdasd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('447', '2018-10-08 15:11:53', '<strong>Deleted Course</strong> \"dasdasd2\"', '1', '0');
INSERT INTO `user_logs` VALUES ('448', '2018-10-08 15:33:22', '<strong>Inserted Course</strong> \'asdasdasdas\'', '1', '0');
INSERT INTO `user_logs` VALUES ('449', '2018-10-08 19:01:52', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('450', '2018-10-09 13:09:06', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('451', '2018-10-10 04:06:49', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('452', '2018-10-10 04:58:10', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('453', '2018-10-10 09:48:56', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('454', '2018-10-10 15:38:21', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('455', '2018-10-10 15:40:44', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('456', '2018-10-10 15:47:41', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('457', '2018-10-10 19:07:33', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('458', '2018-10-11 03:16:10', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('459', '2018-10-11 04:03:25', '<strong>Inserted Student</strong> \'Dfsd, Asdasd S. Fd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('460', '2018-10-11 04:27:14', '<strong>Inserted Certificate</strong> \'Dfsd, Asdasd S. Fd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('461', '2018-10-11 05:31:12', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('462', '2018-10-24 13:24:12', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('463', '2018-10-24 17:31:50', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('464', '2018-10-25 18:53:44', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('465', '2018-10-28 14:45:00', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('466', '2018-10-28 14:49:13', '<strong>Inserted School</strong> \'No Shool\'', '1', '0');
INSERT INTO `user_logs` VALUES ('467', '2018-10-28 14:50:43', '<strong>Updated User</strong> \'admin_user\'', '1', '0');
INSERT INTO `user_logs` VALUES ('468', '2018-10-28 14:55:34', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('469', '2018-10-28 14:55:39', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('470', '2018-10-28 14:59:55', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('471', '2018-10-28 15:00:01', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('472', '2018-10-28 15:02:21', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('473', '2018-10-28 15:02:26', 'User has logged in.', '2', '0');
INSERT INTO `user_logs` VALUES ('474', '2018-10-28 15:02:35', 'User has logged out.', '2', '0');
INSERT INTO `user_logs` VALUES ('475', '2018-10-28 15:02:40', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('476', '2018-10-28 15:25:03', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('477', '2018-10-28 23:42:26', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('478', '2018-10-29 00:18:17', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('479', '2018-10-29 00:18:23', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('480', '2018-10-29 04:33:59', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('481', '2018-10-29 09:21:53', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('482', '2018-10-29 10:35:37', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('483', '2018-12-18 07:05:05', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('484', '2018-12-18 11:22:23', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('485', '2019-01-14 02:21:39', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('486', '2019-01-16 19:03:45', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('487', '2019-01-16 19:47:38', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('488', '2019-01-19 19:43:40', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('489', '2019-01-20 15:35:44', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('490', '2019-01-21 00:09:19', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('491', '2019-01-21 01:00:21', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('492', '2019-01-21 01:24:00', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('493', '2019-01-22 03:12:41', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('494', '2019-01-22 09:07:12', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('495', '2019-01-22 11:47:57', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('496', '2019-01-22 14:29:20', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('497', '2019-01-22 14:29:23', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('498', '2019-01-22 15:17:44', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('499', '2019-01-22 15:26:28', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('500', '2019-01-22 16:20:16', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('501', '2019-01-22 16:21:09', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('502', '2019-01-22 16:48:24', '<strong>Inserted Student</strong> \'Panaligan, Marc Reginald R. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('503', '2019-01-22 16:48:24', '<strong>Inserted Student</strong> \'Dimaangay, Jovani \'', '1', '0');
INSERT INTO `user_logs` VALUES ('504', '2019-01-22 16:48:24', '<strong>Inserted Student</strong> \'Reyes, James Keane \'', '1', '0');
INSERT INTO `user_logs` VALUES ('505', '2019-01-22 16:50:33', '<strong>Inserted Student</strong> \'Panaligan, Marc Reginald R. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('506', '2019-01-22 16:50:33', '<strong>Inserted Student</strong> \'Dimaangay, Jovani \'', '1', '0');
INSERT INTO `user_logs` VALUES ('507', '2019-01-22 16:50:33', '<strong>Inserted Student</strong> \'Reyes, James Keane \'', '1', '0');
INSERT INTO `user_logs` VALUES ('508', '2019-01-22 16:51:30', '<strong>Inserted Student</strong> \'Panaligan, Marc Reginald R. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('509', '2019-01-22 16:51:30', '<strong>Inserted Student</strong> \'Dimaangay, Jovani \'', '1', '0');
INSERT INTO `user_logs` VALUES ('510', '2019-01-22 16:51:30', '<strong>Inserted Student</strong> \'Reyes, James Keane \'', '1', '0');
INSERT INTO `user_logs` VALUES ('511', '2019-01-22 16:51:43', '<strong>Inserted Student</strong> \'Panaligan, Marc Reginald R. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('512', '2019-01-22 16:51:43', '<strong>Inserted Student</strong> \'Dimaangay, Jovani \'', '1', '0');
INSERT INTO `user_logs` VALUES ('513', '2019-01-22 16:51:43', '<strong>Inserted Student</strong> \'Reyes, James Keane \'', '1', '0');
INSERT INTO `user_logs` VALUES ('514', '2019-01-22 17:27:15', '<strong>Inserted Student</strong> \'Panaligan, Marc Reginald R. \'', '1', '0');
INSERT INTO `user_logs` VALUES ('515', '2019-01-22 17:27:15', '<strong>Inserted Student</strong> \'Dimaangay, Jovani \'', '1', '0');
INSERT INTO `user_logs` VALUES ('516', '2019-01-22 17:27:15', '<strong>Inserted Student</strong> \'Reyes, James Keane \'', '1', '0');
INSERT INTO `user_logs` VALUES ('517', '2019-01-22 17:28:52', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('518', '2019-01-22 20:14:35', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('519', '2019-01-22 20:39:36', '<strong>Inserted Qualification / Program Title</strong> \'testr\'', '1', '0');
INSERT INTO `user_logs` VALUES ('520', '2019-01-22 20:39:40', '<strong>Updated Qualification / Program Title</strong> \'testr\'', '1', '0');
INSERT INTO `user_logs` VALUES ('521', '2019-01-22 20:39:43', '<strong>Deleted Qualification / Program Title</strong> \"testr\"', '1', '0');
INSERT INTO `user_logs` VALUES ('522', '2019-01-22 20:55:26', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('523', '2019-01-22 20:57:47', '<strong>Inserted Qualification / Program Title</strong> \'Bookkeeping\'', '1', '0');
INSERT INTO `user_logs` VALUES ('524', '2019-01-22 20:58:20', '<strong>Inserted Qualification / Program Title</strong> \'HEO-Wheel Loader\'', '1', '0');
INSERT INTO `user_logs` VALUES ('525', '2019-01-22 20:58:41', '<strong>Inserted Qualification / Program Title</strong> \'Massage Therapy\'', '1', '0');
INSERT INTO `user_logs` VALUES ('526', '2019-01-22 20:58:59', '<strong>Inserted Qualification / Program Title</strong> \'Barista\'', '1', '0');
INSERT INTO `user_logs` VALUES ('527', '2019-01-22 20:59:34', '<strong>Inserted Qualification / Program Title</strong> \'Food and Beverage Services\'', '1', '0');
INSERT INTO `user_logs` VALUES ('528', '2019-01-22 21:00:20', '<strong>Inserted Qualification / Program Title</strong> \'Computer Systems Servicing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('529', '2019-01-22 21:01:05', '<strong>Inserted Qualification / Program Title</strong> \'Gas Metar Arc Welding\'', '1', '0');
INSERT INTO `user_logs` VALUES ('530', '2019-01-22 21:01:43', '<strong>Inserted Certificate</strong> \'Dfsd, Asdasd S. Fd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('531', '2019-01-22 21:01:51', '<strong>Deleted Qualification / Program Title</strong> \"Gas Metar Arc Welding\"', '1', '0');
INSERT INTO `user_logs` VALUES ('532', '2019-01-22 21:02:21', '<strong>Inserted Qualification / Program Title</strong> \'Gas Metal Arc Welding\'', '1', '0');
INSERT INTO `user_logs` VALUES ('533', '2019-01-22 21:03:15', '<strong>Inserted Qualification / Program Title</strong> \'Shielded Metal Arc Welding\'', '1', '0');
INSERT INTO `user_logs` VALUES ('534', '2019-01-22 21:03:40', '<strong>Inserted Qualification / Program Title</strong> \'Visual Graphics Design\'', '1', '0');
INSERT INTO `user_logs` VALUES ('535', '2019-01-22 21:04:45', '<strong>Inserted Qualification / Program Title</strong> \'Events Management Services\'', '1', '0');
INSERT INTO `user_logs` VALUES ('536', '2019-01-22 21:05:35', '<strong>Inserted Qualification / Program Title</strong> \'Medical Transciption\'', '1', '0');
INSERT INTO `user_logs` VALUES ('537', '2019-01-22 21:06:19', '<strong>Inserted Qualification / Program Title</strong> \'Local Guiding Services\'', '1', '0');
INSERT INTO `user_logs` VALUES ('538', '2019-01-22 21:09:42', '<strong>Inserted Student</strong> \'DelosAngeles, Jasper A. Type Letters Only\'', '1', '0');
INSERT INTO `user_logs` VALUES ('539', '2019-01-22 22:05:57', '<strong>Inserted Student</strong> \'Sevilla, Gerlie T. Type Letters Only\'', '1', '0');
INSERT INTO `user_logs` VALUES ('540', '2019-01-22 22:16:16', '<strong>Inserted School</strong> \'Father Saturnino Institute of Technology \'', '1', '0');
INSERT INTO `user_logs` VALUES ('541', '2019-01-22 22:22:39', '<strong>Inserted School</strong> \'Veranda CTL Tourism Training Center\'', '1', '0');
INSERT INTO `user_logs` VALUES ('542', '2019-01-22 22:24:49', '<strong>Inserted School</strong> \'Candelaria Institute\'', '1', '0');
INSERT INTO `user_logs` VALUES ('543', '2019-01-22 22:26:33', '<strong>Inserted School</strong> \'Philippine Electronics and Communication Institute of Technology\'', '1', '0');
INSERT INTO `user_logs` VALUES ('544', '2019-01-22 22:28:42', '<strong>Inserted School</strong> \'Northern Mindanao Colleges\'', '1', '0');
INSERT INTO `user_logs` VALUES ('545', '2019-01-22 22:30:20', '<strong>Inserted School</strong> \'Butuan City Colleges\'', '1', '0');
INSERT INTO `user_logs` VALUES ('546', '2019-01-22 22:32:01', '<strong>Inserted School</strong> \'Butuan Doctors’ Hospital and College\'', '1', '0');
INSERT INTO `user_logs` VALUES ('547', '2019-01-22 22:33:35', '<strong>Inserted School</strong> \'Holy Child Colleges of Butuan\'', '1', '0');
INSERT INTO `user_logs` VALUES ('548', '2019-01-22 22:44:00', '<strong>Inserted Student</strong> \'Sangalang, Edgar V. Type Letters Only\'', '1', '0');
INSERT INTO `user_logs` VALUES ('549', '2019-01-22 22:46:04', '<strong>Updated Student</strong> \'Sangalang, Edgar V. Type Letters Only\'', '1', '0');
INSERT INTO `user_logs` VALUES ('550', '2019-01-22 22:48:17', '<strong>Inserted Qualification / Program Title</strong> \'Barangay Health Services\'', '1', '0');
INSERT INTO `user_logs` VALUES ('551', '2019-01-22 22:48:40', '<strong>Inserted Qualification / Program Title</strong> \'Cookery\'', '1', '0');
INSERT INTO `user_logs` VALUES ('552', '2019-01-22 22:49:06', '<strong>Inserted Qualification / Program Title</strong> \'Domestic Work\'', '1', '0');
INSERT INTO `user_logs` VALUES ('553', '2019-01-22 22:49:24', '<strong>Inserted Qualification / Program Title</strong> \'Electrical Installation and Maintenance\'', '1', '0');
INSERT INTO `user_logs` VALUES ('554', '2019-01-22 22:49:50', '<strong>Inserted Qualification / Program Title</strong> \'Electronic Products Assembly and Servicing\'', '1', '0');
INSERT INTO `user_logs` VALUES ('555', '2019-01-22 22:50:23', '<strong>Inserted Qualification / Program Title</strong> \'HEO (Hydraulic Excavator)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('556', '2019-01-22 22:54:51', '<strong>Inserted Qualification / Program Title</strong> \'HEO (Rigid On-Highway Dump Truck)\'', '1', '0');
INSERT INTO `user_logs` VALUES ('557', '2019-01-22 23:36:26', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('558', '2019-01-23 12:41:34', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('559', '2019-01-23 13:15:09', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('560', '2019-01-27 13:32:56', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('561', '2019-01-27 13:41:11', '<strong>Updated Qualification / Program Title</strong> \'Food and Beverage Services\'', '1', '0');
INSERT INTO `user_logs` VALUES ('562', '2019-01-27 15:11:22', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('563', '2019-02-10 13:51:08', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('564', '2019-02-10 17:28:23', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('565', '2019-02-10 20:07:07', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('566', '2019-02-10 20:57:26', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('567', '2019-02-11 21:03:16', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('568', '2019-02-11 21:18:18', '<strong>Inserted Certificate</strong> \'Dfsd, Asdasd S. Fd\'', '1', '0');
INSERT INTO `user_logs` VALUES ('569', '2019-02-11 21:28:21', '<strong>Updated Student</strong> \'DelosAngeles, Jasper A. Type Letters Only\'', '1', '0');
INSERT INTO `user_logs` VALUES ('570', '2019-02-11 21:52:00', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('571', '2019-02-17 10:52:53', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('572', '2019-02-17 12:08:59', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('573', '2019-02-17 12:11:58', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('574', '2019-02-17 13:03:41', 'User has logged out.', '1', '0');
INSERT INTO `user_logs` VALUES ('575', '2019-02-19 22:19:33', 'User has logged in.', '1', '0');
INSERT INTO `user_logs` VALUES ('576', '2019-02-19 23:01:00', 'User has logged out.', '1', '0');

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(50) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `soft_deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`user_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES ('1', 'Super Admin', null, null, '2018-07-28 11:56:36', null, '0');
INSERT INTO `user_roles` VALUES ('2', 'Admin', null, null, '2018-07-28 11:56:38', null, '0');
INSERT INTO `user_roles` VALUES ('3', 'User', null, null, '2018-07-28 11:56:41', null, '0');
