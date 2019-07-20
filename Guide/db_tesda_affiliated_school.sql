/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : db_tesda_affiliated_school

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 25/02/2019 16:54:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for certificates
-- ----------------------------
DROP TABLE IF EXISTS `certificates`;
CREATE TABLE `certificates`  (
  `certificate_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NULL DEFAULT NULL,
  `qualification_program_title_id` int(11) NULL DEFAULT NULL,
  `date_received` date NULL DEFAULT NULL,
  `date_from` date NULL DEFAULT NULL,
  `date_to` date NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `modified_by` int(11) NULL DEFAULT NULL,
  `date_created` datetime(0) NULL DEFAULT NULL,
  `date_modified` datetime(0) NULL DEFAULT NULL,
  `soft_deleted` int(1) NULL DEFAULT 0,
  `email_sent_status1` int(1) NULL DEFAULT NULL,
  `email_sent_status2` int(1) NULL DEFAULT NULL,
  `email_sent_status3` int(1) NULL DEFAULT NULL,
  `email_sent_status4` int(1) NULL DEFAULT NULL,
  PRIMARY KEY (`certificate_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of certificates
-- ----------------------------
INSERT INTO `certificates` VALUES (1, 1, 2, '2019-01-15', '2019-01-07', '2020-02-01', 1, NULL, '2019-01-22 21:01:43', '2019-02-22 19:46:07', 1, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for chat_messages
-- ----------------------------
DROP TABLE IF EXISTS `chat_messages`;
CREATE TABLE `chat_messages`  (
  `chat_message_id` int(15) NOT NULL AUTO_INCREMENT,
  `user_from` int(11) NULL DEFAULT NULL,
  `user_to` int(11) NULL DEFAULT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `read` int(1) NULL DEFAULT 0,
  `date_sent` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`chat_message_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for notifications
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications`  (
  `notif_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `is_read` int(11) NULL DEFAULT NULL,
  `date_created` datetime(0) NULL DEFAULT NULL,
  `soft_delete` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`notif_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions`  (
  `position_id` int(11) NOT NULL AUTO_INCREMENT,
  `position` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `modified_by` int(11) NULL DEFAULT NULL,
  `date_created` datetime(0) NULL DEFAULT NULL,
  `date_modified` datetime(0) NULL DEFAULT NULL,
  `soft_deleted` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`position_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for qualification_program_titles
-- ----------------------------
DROP TABLE IF EXISTS `qualification_program_titles`;
CREATE TABLE `qualification_program_titles`  (
  `qualification_program_title_id` int(11) NOT NULL AUTO_INCREMENT,
  `qualification_program_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `school_id` int(11) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `modified_by` int(11) NULL DEFAULT NULL,
  `date_created` datetime(0) NULL DEFAULT NULL,
  `date_modified` datetime(0) NULL DEFAULT NULL,
  `soft_deleted` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`qualification_program_title_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 85 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of qualification_program_titles
-- ----------------------------
INSERT INTO `qualification_program_titles` VALUES (1, 'Heavy Equipment Operation (Hydraulic Excavator) NC II', 1, 1, NULL, '2019-02-22 15:35:03', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (2, 'Heavy Equipment Operation (Wheel Loader) NC II', 1, 1, NULL, '2019-02-22 15:35:12', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (3, 'Rice Machinery Operations NC II', 2, 1, NULL, '2019-02-22 15:35:24', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (4, 'Shielded Metal Arc Welding NC II', 3, 1, NULL, '2019-02-22 15:36:50', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (5, 'Computer Systems Servicing NC II', 4, 1, NULL, '2019-02-22 15:39:27', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (6, 'Computer-Based Accounting', 4, 1, NULL, '2019-02-22 15:39:42', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (7, '2D Animation NC III', 4, 1, NULL, '2019-02-22 15:39:51', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (8, 'Caregiving NC II', 5, 1, NULL, '2019-02-22 16:24:39', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (9, 'Domestic Work NC II', 5, 1, NULL, '2019-02-22 16:24:48', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (10, 'Barista NC II', 7, 1, NULL, '2019-02-22 16:25:01', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (11, 'Bartending NC II', 7, 1, NULL, '2019-02-22 16:25:47', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (12, 'Food and Beverage Services NC II', 7, 1, NULL, '2019-02-22 16:25:57', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (13, 'Food and Beverage Services NC III', 7, 1, NULL, '2019-02-22 16:26:11', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (14, 'Front Office Services NC II', 7, 1, NULL, '2019-02-22 16:26:20', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (15, 'Housekeeping NC II', 7, 1, NULL, '2019-02-22 16:26:33', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (16, 'Barangay Health Services NC II', 8, 1, NULL, '2019-02-22 16:27:33', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (17, 'Caregiving NC II', 8, 1, NULL, '2019-02-22 16:27:51', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (18, 'Domestic Work NC II', 8, 1, NULL, '2019-02-22 16:28:05', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (19, 'Caregiving NC II', 9, 1, NULL, '2019-02-22 16:28:18', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (20, 'Domestic Work NC II', 9, 1, NULL, '2019-02-22 16:28:52', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (21, 'Bartending NC II', 10, 1, NULL, '2019-02-22 16:30:02', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (22, 'Food and Beverage Services NC II', 10, 1, NULL, '2019-02-22 16:30:14', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (23, 'Computer Programming NC IV', 10, 1, NULL, '2019-02-22 16:30:27', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (24, 'Computer Systems Servicing NC II', 11, 1, NULL, '2019-02-22 16:30:38', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (25, 'Visual Graphic Design NC III', 11, 1, NULL, '2019-02-22 16:30:49', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (26, 'Bartending NC II', 12, 1, NULL, '2019-02-22 16:32:42', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (27, 'Broadcast Communication', 12, 1, NULL, '2019-02-22 16:33:20', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (28, 'Caregiving NC II', 12, 1, NULL, '2019-02-22 16:33:30', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (29, 'Computer Secretarial', 12, 1, NULL, '2019-02-22 16:33:40', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (30, 'Food and Beverage Services  NC II', 12, 1, NULL, '2019-02-22 16:33:50', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (31, 'Housekeeping NC II', 12, 1, NULL, '2019-02-22 16:34:01', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (32, 'Occupational Therapy', 12, 1, NULL, '2019-02-22 16:34:11', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (33, 'Practical Nursing', 12, 1, NULL, '2019-02-22 16:34:21', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (34, 'Security Services NC I', 12, 1, NULL, '2019-02-22 16:34:31', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (35, 'Security Services NC II', 12, 1, NULL, '2019-02-22 16:35:23', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (36, 'Tourism Management', 12, 1, NULL, '2019-02-22 16:35:32', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (37, 'Computer Programming NC IV', 12, 1, NULL, '2019-02-22 16:35:44', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (38, 'Events Management Services NC III', 13, 1, NULL, '2019-02-22 16:36:15', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (39, 'Bookkeeping NC III', 13, 1, NULL, '2019-02-22 16:36:27', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (40, 'Heavy Equipment Operation (On-Highway Dump Truck [Rigid]) NC II', 14, 1, NULL, '2019-02-22 16:36:45', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (41, 'Computer Systems Servicing NC II', 15, 1, NULL, '2019-02-22 16:37:41', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (42, 'Electronic Products Assembly and Servicing NC II', 15, 1, NULL, '2019-02-22 16:38:51', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (43, 'Food and Beverage Services NC II', 15, 1, NULL, '2019-02-22 16:39:03', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (44, 'Computer Programming NC IV', 15, 1, NULL, '2019-02-22 16:39:16', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (45, 'Medical Transcription NC II', 16, 1, NULL, '2019-02-22 16:39:48', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (46, 'Seafarer -Stewarding NC I', 17, 1, NULL, '2019-02-22 16:40:00', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (47, 'Automotive Servicing NC II', 17, 1, NULL, '2019-02-22 16:40:12', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (48, 'Commercial Cooking NC II', 17, 1, NULL, '2019-02-22 16:40:30', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (49, 'Health Care Services NC II', 17, 1, NULL, '2019-02-22 16:40:46', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (50, 'Housekeeping NC II', 17, 1, NULL, '2019-02-22 16:41:16', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (51, 'Shielded Metal Arc Welding NC II', 17, 1, NULL, '2019-02-22 16:41:25', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (52, 'Electrical Installation and  Maintenance NC II', 18, 1, NULL, '2019-02-22 16:42:08', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (53, 'English Proficiency Skills Training Program NC I', 19, 1, NULL, '2019-02-22 16:42:33', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (54, 'Aquaculture NC II', 19, 1, NULL, '2019-02-22 16:42:49', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (55, 'Service Automotive Electrical Components Leading to Auto Servicing NC II', 19, 1, NULL, '2019-02-22 16:43:10', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (56, 'Automotive Servicing NC I', 19, 1, NULL, '2019-02-22 16:43:21', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (57, 'Food and Beverage Services NC II', 19, 1, NULL, '2019-02-22 16:43:32', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (58, 'Food Processing NC II', 19, 1, NULL, '2019-02-22 16:44:35', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (59, 'Trainers Methodology Level I', 19, 1, NULL, '2019-02-22 16:44:43', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (60, 'Electrical Installation and Maintenance NC II', 20, 1, NULL, '2019-02-22 16:45:02', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (61, 'Cookery NC II', 20, 1, NULL, '2019-02-22 16:45:11', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (62, 'Shielded Metal Arc Welding NC I', 20, 1, NULL, '2019-02-22 16:45:23', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (63, 'Shielded Metal Arc Welding NC II', 20, 1, NULL, '2019-02-22 16:45:31', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (64, 'Gas Metal Arc Welding NC I', 21, 1, NULL, '2019-02-22 16:46:37', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (65, 'Computer Systems Servicing NC II', 21, 1, NULL, '2019-02-22 16:46:51', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (66, 'Driving NC II', 21, 1, NULL, '2019-02-22 16:46:59', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (67, 'Gas Metal Arc Welding NC II', 21, 1, NULL, '2019-02-22 16:47:07', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (68, 'Shielded Metal Arc Welding NC I', 21, 1, NULL, '2019-02-22 16:47:17', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (69, 'Shielded Metal Arc Welding NC II', 21, 1, NULL, '2019-02-22 16:47:28', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (70, 'Shielded Metal Arc Welding NC II (MTP)', 21, 1, NULL, '2019-02-22 16:47:41', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (71, 'Visual Graphic Design NC III', 21, 1, NULL, '2019-02-22 16:48:27', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (72, 'Computer Systems Servicing NC II', 22, 1, NULL, '2019-02-22 16:48:41', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (73, 'Food and Beverage Services NC II', 22, 1, NULL, '2019-02-22 16:48:52', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (74, 'Housekeeping NC II', 22, 1, NULL, '2019-02-22 16:49:01', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (75, 'Food and Beverage Services NC II', 23, 1, NULL, '2019-02-22 16:49:54', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (76, 'Housekeeping NC II', 23, 1, NULL, '2019-02-22 16:50:04', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (77, 'Ship’s Catering Services NC I', 23, 1, NULL, '2019-02-22 16:50:14', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (78, 'Visual Graphic Design NC III', 23, 1, NULL, '2019-02-22 16:50:23', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (79, 'Support Horticultural Crop Work Leading to Agricultural Crops Production NC I', 24, 1, NULL, '2019-02-22 16:50:44', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (80, 'Support Nursery Work Leading to  Agricultural Crops Production NC I', 24, 1, NULL, '2019-02-22 16:50:55', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (81, 'Prepare Land for Agricultural Crop Production Leading to  Agricultural Crops Production NC III', 24, 1, NULL, '2019-02-22 16:51:05', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (82, 'Produce Organic Agriculture Leading to Organic Agriculture Production NC II', 25, 1, NULL, '2019-02-22 16:53:54', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (83, 'Organic Agriculture Production NC II Agriculture Production NC II', 25, 1, NULL, '2019-02-22 16:54:18', NULL, 0);
INSERT INTO `qualification_program_titles` VALUES (84, 'Produce Organic Agriculture Leading to Organic Agriculture Production NC II', 26, 1, NULL, '2019-02-22 16:55:46', NULL, 0);

-- ----------------------------
-- Table structure for schools
-- ----------------------------
DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools`  (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `email_address` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `contact_no` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `modified_by` int(11) NULL DEFAULT NULL,
  `date_created` datetime(0) NULL DEFAULT NULL,
  `date_modified` datetime(0) NULL DEFAULT NULL,
  `soft_deleted` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`school_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of schools
-- ----------------------------
INSERT INTO `schools` VALUES (1, 'BUTUAN CITY MANPOWER TRAINING CENTER', 'DOP Bldg., Government Center, Tiniwisan, Butuan City', 'manpower_butuan@yahoo.com', '(085) 341-1942', 1, NULL, '2019-02-22 15:09:38', NULL, 0);
INSERT INTO `schools` VALUES (2, 'CARAGA STATE UNIVERSITY-MAIN CAMPUS', 'Ampayon, Butuan City', '', '(085)341-2296', 1, NULL, '2019-02-22 15:10:34', NULL, 0);
INSERT INTO `schools` VALUES (3, 'LAS NIEVES TRAINING CENTER', 'Mat-i, Las Nieves, Agusan del Norte', 'lntc_lasnieves@yahoo.com.ph', '0917-7234641', 1, NULL, '2019-02-22 15:10:54', NULL, 0);
INSERT INTO `schools` VALUES (4, 'ACLC COLLEGE OF BUTUAN CITY, INC.', 'HDS Bldg., J.C. Aquino Avenue, Butuan City', '', '(085)341-5719', 1, NULL, '2019-02-22 15:11:40', NULL, 0);
INSERT INTO `schools` VALUES (5, 'ASIAN COLLEGE FOUNDATION, INC.', 'Estipona Village, Km. 3. J.C. Aquino Avenue, Butuan City', 'asian_acf@yahoo.com.ph', '(085)815-3646', 1, NULL, '2019-02-22 15:12:22', NULL, 0);
INSERT INTO `schools` VALUES (6, 'BUTUAN CITY COLLEGES, INC.', 'Montilla Boulevard, Butuan City', 'butuancitycollegesbc@gmail.com', '(085)300-3179', 1, NULL, '2019-02-22 15:12:54', NULL, 0);
INSERT INTO `schools` VALUES (7, 'BUTUAN DOCTORS’ HOSPITAL AND COLLEGE, INC.', 'J.C. Aquino Avenue, Butuan City', '', '(085)342-8572', 1, NULL, '2019-02-22 15:13:35', NULL, 0);
INSERT INTO `schools` VALUES (8, 'CENTER FOR HEALTHCARE PROFESSIONS BUTUAN, INC.', '3F S & V Building., R. Calo Street, Butuan City', 'chp_butuan09@yahoo.com', '(085)225-6849', 1, NULL, '2019-02-22 15:14:05', NULL, 0);
INSERT INTO `schools` VALUES (9, 'ELISA R. OCHOA MEMORIAL NORTHERN MINDANAO SCHOOL OF MIDWIFERY, INC.', '702 San Jose Street, Butuan City', 'erom_nmsm@yahoo.com', '(085) 342-5563', 1, NULL, '2019-02-22 15:14:40', NULL, 0);
INSERT INTO `schools` VALUES (10, 'FATHER SATURNINO URIOS UNIVERSITY, INC.', 'San Francisco Street, Butuan City', '', '(085)342-1830', 1, NULL, '2019-02-22 15:15:16', NULL, 0);
INSERT INTO `schools` VALUES (11, 'FATHER URIOS INSTITUTE OF TECHNOLOGY OF AMPAYON, INC.', 'Ampayon, Butuan City', 'father.urios@yahoo.com', '(085) 341-4342', 1, NULL, '2019-02-22 15:16:24', NULL, 0);
INSERT INTO `schools` VALUES (12, 'HOLY CHILD COLLEGES OF BUTUAN, INC.', '2nd Street, Guingona Subdivision, Butuan City', '', '(085)342-3975', 1, NULL, '2019-02-22 15:17:22', NULL, 0);
INSERT INTO `schools` VALUES (13, 'LE’ OPHIR LEARNING SCHOOL, INC.', 'Ochoa Avenue, Butuan City', 'le_ophir@yahoo.com', '(085) 816-1105', 1, NULL, '2019-02-22 15:18:00', NULL, 0);
INSERT INTO `schools` VALUES (14, 'MANA MILLENIUM TECHNICAL SCHOOL (MMTS), INC.', '4F Balibrea Building, Pili Drive, Butuan City', 'manatech.butuan@gmail.com', '(085) 817-2006', 1, NULL, '2019-02-22 15:19:38', NULL, 0);
INSERT INTO `schools` VALUES (15, 'PHILIPPINE ELECTRONICS AND COMMUNICATION  INSTITUTE  OF  TECHNOLOGY, INC.', 'Imadejas Subdivision, Butuan City', 'pecit_education@yahoo.com', '(085)341-7660', 1, NULL, '2019-02-22 15:20:24', NULL, 0);
INSERT INTO `schools` VALUES (16, 'RELIANCE TRAINING INSTITUTE, INC.', 'F. Durano Street, Butuan City', 'reliance.bxu-tech@relianceti.com', '(085) 816-2812', 1, NULL, '2019-02-22 15:20:48', NULL, 0);
INSERT INTO `schools` VALUES (17, 'SAINT JOSEPH INSTITUTE OF TECHNOLOGY, INC.', 'Montilla Boulevard, Butuan City', '', '(085)225-5039', 1, NULL, '2019-02-22 15:21:33', NULL, 0);
INSERT INTO `schools` VALUES (18, 'NASIPIT NATIONAL VOCATIONAL SCHOOL', 'Bayview Hill, Nasipit, Agusan del Norte', 'nasipit_vocational@yahoo.com.ph', '(085)343-2426', 1, NULL, '2019-02-22 15:22:31', NULL, 0);
INSERT INTO `schools` VALUES (19, 'NORTHERN MINDANAO SCHOOL OF FISHERIES', 'Matabao, Buenavista, Agusan del Norte', 'nmsf@tesda.gov.ph', '(085)8080-293/', 1, NULL, '2019-02-22 15:24:19', NULL, 0);
INSERT INTO `schools` VALUES (20, 'PROVINCIAL TRAINING CENTER-AGUSAN DEL NORTE', 'Government Center, Barangay 9, Cabadbaran City', 'ptc_adn@tesda.gov.ph', '(085)818-5239', 1, NULL, '2019-02-22 15:24:45', NULL, 0);
INSERT INTO `schools` VALUES (21, 'CANDELARIA INSTITUTE OF TECHNOLOGY OF CABADBARAN, INC.', 'Funcion Street, Cabadbaran City', 'institutecabadbaran@yahoo.com', '(085)343-0941', 1, NULL, '2019-02-22 15:25:14', NULL, 0);
INSERT INTO `schools` VALUES (22, 'NORTHERN MINDANAO COLLEGES, INC.', 'Atega Street, Cabadbaran City', 'nnmc_cabadbaran@yahoo.com', '(085)817-0938', 1, NULL, '2019-02-22 15:27:31', NULL, 0);
INSERT INTO `schools` VALUES (23, 'SAINT MICHAEL COLLEGE OF CARAGA, INC.', 'Poblacion, Nasipit, Agusan del Norte', '', '(085)343-3251', 1, NULL, '2019-02-22 15:29:51', NULL, 0);
INSERT INTO `schools` VALUES (24, 'GML AGRI-VENTURES FARM', 'Purok 2B, Sorainao, Cabadbaran Ciy', '', '0917-7060600', 1, NULL, '2019-02-22 15:30:18', NULL, 0);
INSERT INTO `schools` VALUES (25, 'MABAKAS TECHNO DEMO FARM', 'Sitio Coro, Colorado, Jabonga, Agusan del Norte', '', '0919-7740894', 1, NULL, '2019-02-22 15:30:35', NULL, 0);
INSERT INTO `schools` VALUES (26, 'SR METALS INCORPORATED', 'Sitio Beto, Poblacion II, Tubay, Agusan del Norte', '', '(085)817-0074', 1, NULL, '2019-02-22 15:30:52', NULL, 0);
INSERT INTO `schools` VALUES (27, 'GLOBAL COMPETENCY-BASED TRAINING CENTER, INC.', '158 Ochoa Ave, Butuan City, 8600 Agusan Del Norte', '', '(085) 225 8114', 1, NULL, '2019-02-24 13:51:13', NULL, 0);

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `middlename` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `name_ext` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `birthdate` date NULL DEFAULT NULL,
  `contact_no` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email_address` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `school_id` int(11) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT 0,
  `is_graduate` int(1) NULL DEFAULT 0,
  `is_assessed` int(1) NULL DEFAULT 0,
  `created_by` int(11) NULL DEFAULT NULL,
  `modified_by` int(11) NULL DEFAULT NULL,
  `date_created` datetime(0) NULL DEFAULT NULL,
  `date_modified` datetime(0) NULL DEFAULT NULL,
  `soft_deleted` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`student_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 451 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (1, 'Brigidia', 'Montrell', 'Balgos', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 2, 1, 1, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (2, 'Tori', 'Mangsinco', 'Europa', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 2, 1, 1, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (3, 'Lilly', 'Lara', 'Barerra', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 2, 1, 1, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (4, 'Carlotta  Kaylin', 'Maglikian', 'Galíndez', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 2, 1, 1, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (5, 'Freddy', 'Gabrio', 'Estrada', '', 'Male', '', '0000-00-00', NULL, NULL, 6, 2, 1, 1, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (6, 'Erick', 'Cade', 'Osorio', '', 'Male', '', '0000-00-00', NULL, NULL, 6, 2, 1, 1, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (7, 'Maegan', 'Mangayao', 'Querubín', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 2, 1, 1, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (8, 'Tiana', 'Godalupe', 'Tortal', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 2, 1, 1, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (9, 'Ciceron', 'Carim', 'Hinojosa', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 2, 1, 1, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (10, 'Grace', 'Daculug', 'Reoja', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 1, 1, 1, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (11, 'Jameson', 'Aureliano', 'Domingo', '', 'Male', '', '0000-00-00', NULL, NULL, 6, 1, 1, 1, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (12, 'Maeve', 'Lemoncito', 'Estillore', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (13, 'Dorothy', 'Carminda', 'Cembrano', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (14, 'Josefa', 'Ismael', 'Calañas', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (15, 'Laurinda', 'Salim', 'Bayona', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (16, 'Scott', 'Quiocson', 'Pavia', '', 'Male', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (17, 'Levina  Jewel', 'Abe', 'Montilla', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (18, 'Deven', 'Magsaysay', 'Verano', '', 'Male', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (19, 'Johana', 'Hagedorn', 'Villarosa', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (20, 'Hailie  Karen', 'Magnaye', 'Calañas', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (21, 'Martino', 'Ison', 'Jardenil', '', 'Male', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (22, 'Axel', 'Teodor', 'Escribano', '', 'Male', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (23, 'Fermin  Carmita', 'Begtang', 'Balgos', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (24, 'Rodas  Judith', 'Reotutar', 'Solas', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (25, 'Maia', 'Cawayan', 'Balbutin', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (26, 'Nickolas', 'Paragili', 'Gil', '', 'Male', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (27, 'Jesenia', 'Clark', 'Guerra', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (28, 'Javier', 'Siso', 'Desiderio', '', 'Male', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (29, 'Carson', 'Chaya', 'Ong', '', 'Male', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (30, 'Jakinda', 'Nang', 'España', '', 'Female', '', '0000-00-00', NULL, NULL, 6, 1, 2, 2, 1, NULL, '2014-02-22 18:12:23', NULL, 0);
INSERT INTO `students` VALUES (31, 'Jeffrey', 'Belamar', 'Abala', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (32, 'Gilbert', 'Abapo', 'Melgar', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (33, 'Ismael', 'Bermudez', 'Pulgo', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (34, 'Emarld', 'Macapado', 'Abbas', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (35, 'Darwin', 'Paradji', 'Catubag', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (36, 'Daarwin', 'Mirafuentes', 'Abbisani', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (37, 'Jhondy', 'Apokon', 'Pepito', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (38, 'Roy', 'Apokon', 'Pepito', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (39, 'Jhondy', 'Corpuz', 'Abcede', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (40, 'Teresita', 'Dalagan', 'Abe', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (41, 'Meliza Jean', 'Payot', 'Abelida', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (42, 'Jimmy', 'Halop', 'Acalain', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (43, 'Almaira', 'Unod', 'Acmad', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (44, 'Glen Paul', 'Gales', 'Adlaon', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (45, 'Florence Loid', 'Garcia', 'Adlawan', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (46, 'Lovena', 'Divinagracia', 'Adlawan', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (47, 'Christopher', 'Catapang', 'Adrales', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (48, 'Christopher', 'Pooh', 'Robin', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (49, 'Tristan', 'Caras', 'Agag', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (50, 'Glenn', 'Caunsag', 'Abot', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (51, 'Michel', 'Caunsag', 'Abot', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (52, 'Cristy', 'Santiago', 'Agudera', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (53, 'Ma Menchita', 'Agudera', 'Apokon', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (54, 'Marvin', 'Peralta', 'Aguilar', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (55, 'Claudette', 'Royo', 'Aguirre', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (56, 'Amy', 'Santiago', 'Peralta', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (57, 'Arnold Christopher', 'Alcaraz', 'Santiago', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (58, 'Glennie', 'Alenar', 'Rufino', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (59, 'Demetrio', 'Aleria', 'Gule', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (60, 'Rowena', 'Taboada', 'Gule', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (61, 'Eduardo', 'Abregana', 'Alforque', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (62, 'Marjorie', 'Janiola', 'Ali', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (63, 'Marlette', 'Alicarte', 'Maniago', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (64, 'Medelyn', 'Alindajao', 'Samillano', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (65, 'Ruth', 'Aling', 'Delima', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (66, 'Ignacio', 'Alino', 'Berdin', 'Jr', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (67, 'Ruchadee', 'Almero', 'Dual', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (68, 'Liezel', 'Lorenzo', 'Almonte', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (69, 'Marjorie Ann', 'Almonte', 'Lastimado', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (70, 'Elmie', 'Rabe', 'Alnas', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (71, 'Salome', 'Achacoso', 'Alo', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (72, 'Beverlyn', 'Alvarez', 'Omang', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (73, 'Harold', 'Ambag', 'Malagayo', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (74, 'Romeo', 'Aceron', 'Amiliano', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (75, 'Irenea', 'Amit', 'Rehedor', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (76, 'Eldem', 'Amolata', 'Melecio', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (77, 'Roldan', 'Amorin', 'Navarro', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (78, 'Marites', 'Amoroso', 'Malayan', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (79, 'Archie', 'Palencia', 'Ampo', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (80, 'Helen', 'Saycon', 'Ampo', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (81, 'Joefrey', 'Ancheta', 'Salazar', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (82, 'Jenny', 'Andik', 'Dayanan', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (83, 'Charmine', 'Ang', 'Rapista', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (84, 'Michael', 'Angkad', 'Doobie', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (85, 'Kissa Anne', 'Angoy', 'Lee', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (86, 'Kevin', 'Anticamara', 'Fuentes', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (87, 'Rasalinda', 'Nunez', 'Waling-Walng', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (88, 'Arnel', 'Apurada', 'Lim', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (89, 'Jonathan', 'Telmo', 'Aquino', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (90, 'Jo Marie', 'Aranda', 'Moises', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (91, 'Angelina', 'Arapoc', 'Arcayan', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (92, 'Marianita', 'Arbiol', 'Capilitan', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (93, 'Araceli', 'Tumaca', 'Arboladura', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (94, 'Jesus', 'Arcelo', 'Afeche', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (95, 'Daisy Jane', 'Ares', 'Lim', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (96, 'Junah', 'Arevalo', 'Valmera', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (97, 'Ellery', 'Dubouzet', 'Arguelles', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (98, 'Ian', 'Fuentes', 'Sy', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (99, 'Florence', 'Crisostomo', 'Berdin', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (100, 'Ramil', 'Tomo', 'Batiancila', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (101, 'Jonathan', 'Alvarez', 'Uy', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 18:39:17', NULL, 0);
INSERT INTO `students` VALUES (102, 'Evangelline', 'Adlaon', 'Eco', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (103, 'Sheila', 'Lorgata', 'Edig', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (104, 'Graciano', 'Pajes', 'Edillon', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (105, 'Patrick', 'Moral', 'Edit', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (106, 'Nenelyn Grace', 'Quirante', 'Edullantes', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (107, 'Karen', 'Batobalani', 'Eleguen', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (108, 'Cristina', 'Rojas', 'Elesterio', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (109, 'Norma', 'Lastimado', 'Elicano', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (110, 'Edna', 'Espanol', 'Eliot', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (111, 'Marilou', 'Ringculada', 'Ellarina', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (112, 'Daisy Mae', 'Pacatang', 'Emactao', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (113, 'Liza', 'Sagitarios', 'Embarque', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (114, 'Joseph', 'Dingba', 'Emele', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (115, 'Alexander', 'Veloso', 'Emia', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (116, 'Don Ryan', 'Devilleres', 'Emia', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (117, 'Beatriz', 'Lopez', 'Emphasis', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (118, 'Leticia', 'Boongaling', 'Encarnacion', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (119, 'Renevib', 'Alolor', 'Enerio', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (120, 'Elsie', 'Macog', 'Enriquez', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (121, 'Sharon', 'Sumcio', 'Enriquez', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (122, 'Sheila Mae', 'Taneza', 'Entrina', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (123, 'Lancer James', 'Torrejos', 'Epe', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (124, 'Ronald', 'Tasong', 'Eramis', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (125, 'Kenneth', 'Estorpe', 'Eroa', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (126, 'Angelo Migues', 'Arcamo', 'Esberto', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (127, 'Crotilda', 'Tansiongco', 'Santiago', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (128, 'Cory', 'Kanaway', 'Alcaraz', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (129, 'Alvaro', 'Bashir', 'Romero', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (130, 'Alena', 'Tuico', 'Sarmiento', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (131, 'Grazia', 'Jevon', 'Fernando', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (132, 'Darian', 'Ingrid', 'Matsunaga', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (133, 'Chance', 'Yujuico', 'Leones', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (134, 'Lewis', 'Lacandula', 'Manrique', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (135, 'Zack', 'Reyes', 'Arboleda', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (136, 'Stephanie  Ainsley', 'Luansing', 'Jugueta', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (137, 'Lizeth', 'Macodi', 'Cembrano', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (138, 'Cindy', 'Laurel', 'Ereve', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (139, 'Lonnie', 'Kimpo', 'Cueva', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (140, 'Shelby', 'Heriberto', 'Lauzon', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (141, 'Fidelia', 'Jacqueline', 'Dizon', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (142, 'April', 'Reville', 'Escabusa', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (143, 'Delia', 'Abayon', 'Escoto', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (144, 'Luzviminda', 'Salinas', 'Escultero', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (145, 'Bonifacio', 'Lagramada', 'Eslera', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (146, 'Jonasie', 'Robles', 'Esmo-An', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (147, 'Christine', 'Marquiso', 'Espanola', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (148, 'Jepsyrose', 'Manaytay', 'Espiritu', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (149, 'Dominic', 'Guzman', 'Estimada', '', 'Male', '', '0000-00-00', NULL, NULL, 1, 1, 2, 2, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (150, 'Venus', 'Anino', 'Evangelista', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 2, 2, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (151, 'Mercury', 'Venus', 'Earth', '', 'Female', '', '0000-00-00', NULL, NULL, 1, 1, 2, 2, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (152, 'Nora', 'Paigalao', 'Cagadas', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (153, 'Rhoda', 'Aba-A', 'Arrellano', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (154, 'Chona', 'Dumagais', 'Abalorio', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (155, 'Menchie', 'Abucay', 'Abang', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (156, 'Danilo', 'Serame', 'Abamila', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (157, 'Elvie', 'Caderao', 'Abao', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (158, 'Rico', 'Sajulan', 'Abarivo', 'Sr', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (159, 'Ian', 'Lorenz', 'Lozada', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (160, 'Ariston', 'Cruz', 'Salvador', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (161, 'Phyliss', 'Lasquite', 'Reyes', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (162, 'Minda', 'Milton', 'Roque', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (163, 'Lettie Gillogly  ', 'Ricarda', 'Tanya', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (164, 'Joelle', 'Manuelo', 'Rezaba', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (165, 'Gertrudis', 'Rice', 'Soriano', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (166, 'Felipe', 'Kanaway', 'Barerra', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (167, 'Aubree', 'Baal', 'Osorio', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (168, 'Takisha', 'Maala', 'Ridor', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (169, 'Donya', 'Lorca', 'Roble', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (170, 'Sabra', 'Lozano', 'Romiro', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (171, 'Esslinger  ', 'Lozada', 'Gomez', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (172, 'Elvira', 'Lastimosa', 'Ruedas', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (173, 'Jeane', 'Perote', 'Rama', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (174, 'Viva', 'Piator', 'Millan', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (175, 'Rana', 'Rabigo', 'Millan', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (176, 'Helena', 'Rafael', 'Rosello', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (177, 'Kaiden Davis', 'Biag', 'España', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (178, 'Tanya', 'Ricarda', 'Kilayko', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (179, 'Jerome', 'Darren', 'Simangan', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (180, 'Jayla', 'Japson', 'Iriberri', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (181, 'Huong', 'Rehder  ', 'Kieran', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (182, 'Malena', 'Trimmer  ', 'Saaveda', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (183, 'Winnie', 'Orosco  ', 'Salvador', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (184, 'Renee', 'Schley  ', 'Millan', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (185, 'Jackelyn', 'Chesley  ', 'Sacal', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (186, 'Gregory', 'Sonnenberg  ', 'Salugta', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (187, 'Daina', 'Byer  ', 'Salvacion', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (188, 'Noel', 'Chagolla  ', 'Macanas', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (189, 'Keely', 'Murdoch  ', 'Dela Pena', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (190, 'Norma', 'Warriner  ', 'Tabing', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (191, 'Elina', 'Provencal  ', 'Tanya', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (192, 'Charlott', 'Worthley  ', 'Rodrigez', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (193, 'Salley', 'Kernan  ', 'Rodrigez', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (194, 'Merissa', 'Simonton  ', 'Rio', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (195, 'Deangelo', 'Downes  ', 'Gulapa', 'Jr', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (196, 'Rana', 'Lim', 'Dela Pena', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (197, 'Debby', 'Studley  ', 'Legazpi', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (198, 'Jerrie', 'Yocom  ', 'Aquino', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (199, 'Augusta', 'Grossman  ', 'Arrellano', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (200, 'Romana', 'Jorstad  ', 'Lico', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:08:53', NULL, 0);
INSERT INTO `students` VALUES (201, 'Ariel', 'Magaling', 'Sarmiento', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (202, 'Brendan', 'aptinchay', 'Buenaventura', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (203, 'Michelle', 'Mallari', 'Flores', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (204, 'Brionna', 'Ongpin', 'Salazar', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (205, 'Joslyn', 'Catacutan', 'Sardido', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (206, 'Marianna', 'Magdiwang', 'Alba', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (207, 'Noelle Josh', 'Yamamoto', 'Atega', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (208, 'Eleanora', 'Campong', 'Alcaraz', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (209, 'Francesca', 'Elliott', 'Monteloyola', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (210, 'Dominga', 'Edita', 'Abyyappy', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (211, 'Daisy', 'Ifugao', 'Manrique', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (212, 'Alex', 'Dumalahay', 'Sarte', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (213, 'Maurice  Dona', 'Ala', 'Calañas', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (214, 'Jayden', 'Tanhehco', 'Córdoba', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (215, 'Mitchell', 'Lacandola', 'Goyena', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (216, 'Leroy', 'Tizon', 'Lorenzo', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (217, 'Mckenna', 'Hortencia', 'Villamor', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (218, 'Karen', 'Limcangco', 'Córdova', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (219, 'Elliott', 'Laxamana', 'África', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 2, 2, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (220, 'Lana  Edward', 'Macapodi', 'Agustín', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 2, 2, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (221, 'Melosa', 'Clarete', 'Micolob', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 2, 2, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (222, 'Logan Darryl', 'Abu', 'Cabrera', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 2, 2, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (223, 'Katelynn', 'Basher', 'Pamplona', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 2, 2, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (224, 'Tabor', 'Salim', 'Buenconsejo', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 2, 2, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (225, 'Kristen', 'Monzon', 'Alcaraz', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 2, 2, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (226, 'Enrique', 'Guro', 'Regis', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (227, 'Neil', 'Ongpin', 'Opulencia', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:16:02', NULL, 0);
INSERT INTO `students` VALUES (228, 'Abel', 'Dacanay', 'Buenaventura', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (229, 'Ibrahim  Samuel', 'Magos', 'Sullano', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (230, 'Jaime', 'Dianalan', 'Balgos', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (231, 'Brice  Melany', 'Sinclair', 'Magno', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (232, 'Kate  Orland', 'Davis', 'Jiménez', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (233, 'Ronnie Lillian', 'Camara', 'Ladera', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (234, 'Zander', 'Acbar', 'Corporal', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (235, 'Lewis', 'Datu-imam', 'Monteloyola', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (236, 'Taurino', 'Pendatun', 'Matías', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (237, 'Marisol', 'Sultan', 'Mesías', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (238, 'Currito', 'Sioson', 'Valencia', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (239, 'Christa', 'Florencia', 'Romblon', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (240, 'Kent  Bethany', 'Tambuatco', 'Velasco', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (241, 'Alex', 'Malagar', 'Cañada', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (242, 'Lalia', 'Yoshikawa', 'Vilela', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (243, 'Marilou', 'Lapiz', 'Maala', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (244, 'Christian', 'Mabanglo', 'Ybalio', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (245, 'Jugie', 'Mabayao', 'Cabrera', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (246, 'Richard', 'Tolibas', 'Macanlay', '', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (247, 'Jacob', 'Macaraig', 'Barral', 'Jr', 'Male', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (248, 'Merilyn', 'Magbutong', 'Magno', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (249, 'Marjorie', 'Lambojon', 'Mahinay', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (250, 'Apple Mae', 'Timog-Timog', 'Malasaga', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (251, 'Analyn', 'Ogabang', 'Manera', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (252, 'Percy', 'Mangaliwan', 'Magnaos', '', 'Female', '', '0000-00-00', NULL, NULL, 7, 1, 1, 1, 1, NULL, '2014-02-22 20:19:02', NULL, 0);
INSERT INTO `students` VALUES (253, 'Edwin', 'Talon', 'Duarte', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (254, 'Lauryn', 'Quito', 'Monzón', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (255, 'Abagail', 'Tanya', 'Evangelista', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (256, 'Leanna', 'Nangpi', 'Muñoz', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (257, 'Jaidyn  Daniel', 'Kumulitog', 'Ramientos', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (258, 'Kaila', 'McKnight', 'Montederamos', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (259, 'Lonnie  Teresa', 'Sultan', 'Villaécija', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (260, 'Alijah', 'Mastura', 'Montenegro', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (261, 'Monique', 'Suaco', 'Torralba', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (262, 'Annabel', 'Magnaye', 'Buenavidez', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (263, 'Colby', 'Saripada', 'Asunción', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (264, 'Criston', 'Jenkins', 'Fazon', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (265, 'Chrisanne', 'Salem', 'Acuña', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (266, 'Karen', 'Yunsay', 'Encela', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (267, 'Nekana', 'Pamintuan', 'Sullano', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (268, 'Kent', 'Dinaluyan', 'Austria', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (269, 'Earlena', 'Lucman', 'Mayor', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (270, 'Rigoberto', 'Kishimoto', 'Rojas', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (271, 'Emmeline', 'Limcuando', 'Degayo', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (272, 'Kellie', 'Tupaz', 'Pastor', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (273, 'Christine', 'Milagro', 'Balandra', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (274, 'Jan  Caden', 'Dacanay', 'Basan', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (275, 'Jomayra', 'Buyco', 'Veluz', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (276, 'Alec', 'Magtoto', 'Quiñones', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (277, 'Jaqueline', 'Tabilla', 'Méndez', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (278, 'Elaine', 'Tsukada', 'Talion', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (279, 'Kiana', 'Serad', 'Acuesta', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (280, 'Francisca', 'Cortez', 'Agustín', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (281, 'Brigidia', 'Montrell', 'Balgos', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 2, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (282, 'Tori', 'Mangsinco', 'Europa', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 2, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (283, 'Lilly', 'Lara', 'Barerra', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 2, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (284, 'Carlotta  Kaylin', 'Maglikian', 'Galíndez', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 2, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (285, 'Freddy', 'Gabrio', 'Estrada', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 2, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (286, 'Erick', 'Cade', 'Osorio', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 2, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (287, 'Maegan', 'Mangayao', 'Querubín', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 2, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (288, 'Tiana', 'Godalupe', 'Tortal', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 2, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (289, 'Ciceron', 'Carim', 'Hinojosa', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 2, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (290, 'Grace', 'Daculug', 'Reoja', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (291, 'Jameson', 'Aureliano', 'Domingo', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (292, 'Maeve', 'Lemoncito', 'Estillore', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (293, 'Dorothy', 'Carminda', 'Cembrano', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (294, 'Josefa', 'Ismael', 'Calañas', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (295, 'Laurinda', 'Salim', 'Bayona', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (296, 'Scott', 'Quiocson', 'Pavia', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (297, 'Levina  Jewel', 'Abe', 'Montilla', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (298, 'Deven', 'Magsaysay', 'Verano', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (299, 'Johana', 'Hagedorn', 'Villarosa', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (300, 'Hailie  Karen', 'Magnaye', 'Calañas', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (301, 'Martino', 'Ison', 'Jardenil', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (302, 'Axel', 'Teodor', 'Escribano', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (303, 'Fermin  Carmita', 'Begtang', 'Balgos', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (304, 'Rodas  Judith', 'Reotutar', 'Solas', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (305, 'Maia', 'Cawayan', 'Balbutin', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (306, 'Nickolas', 'Paragili', 'Gil', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (307, 'Jesenia', 'Clark', 'Guerra', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (308, 'Javier', 'Siso', 'Desiderio', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (309, 'Carson', 'Chaya', 'Ong', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (310, 'Jakinda', 'Nang', 'España', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 2, 2, 1, NULL, '2014-02-22 20:20:52', NULL, 0);
INSERT INTO `students` VALUES (311, 'Evangeline', 'Eco', 'Adlaon', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (312, 'Sheila', 'Logarta', 'Edig', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (313, 'Graciano', 'Pajes', 'Edillion', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (314, 'Dranilo', 'Sagicyan', 'Duga-duga', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (315, 'Luie', 'Gabutan', 'Godalupe', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (316, 'Jaden  Gracie', 'Tapalla', 'Galíndez', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (317, 'Dana', 'Leyson', 'Esquivias', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (318, 'Kiera', 'Alupay', 'Monceda', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (319, 'Aurora', 'Locsin', 'Roa', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (320, 'Heriberto', 'Barrometro', 'Sanchez', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (321, 'Cris  Kellie', 'Labasan', 'Araneta', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (322, 'Senon  Cidro', 'Baang', 'Centino', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (323, 'Marina', 'Lakandula', 'Cariño', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (324, 'Carmencita', 'Iwatani', 'Monzón', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (325, 'Jana', 'Hussein', 'Ignacio', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (326, 'Dani', 'Lawsin', 'Veluz', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (327, 'Maximillian', 'Yamada', 'Recio', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (328, 'Zackary', 'Dinlayan', 'Sace', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (329, 'Ashton', 'Diwata', 'Acuesta', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (330, 'Teyo', 'Navea', 'Alegre', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (331, 'Patrick', 'Moral', 'Edit', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (332, 'Marie', 'Edullantes', 'Quirante', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (333, 'Nenelyn Grace', 'Campana', 'Ellot', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:25:34', NULL, 0);
INSERT INTO `students` VALUES (334, 'Jaden', 'Basher', 'Salvador', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (335, 'Soledad', 'Joco', 'Claridad', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (336, 'Rhett  Kacie', 'Calunod', 'Ruedas', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (337, 'Sebastian  Enzo', 'Quiambao', 'Quezada', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (338, 'Brice  Keeley', 'Salvador', 'Guadarrama', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (339, 'Zuleika', 'Labuguen', 'Yao', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (340, 'Cornelius', 'Lambert', 'Alcázar', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (341, 'Diana  Raimunda', 'Omar', 'Belleza', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (342, 'Cedro  Gitana', 'Dumalahay', 'Roque', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (343, 'Elija  Valentina', 'Chincuanco', 'Balandra', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (344, 'Aden  Fabian', 'Matiyaga', 'Zafra', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (345, 'Abram Cody', 'Bogabong', 'Elizalde', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (346, 'Clodovea  Maxwell', 'Navea', 'Bello', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (347, 'Martina  Madyson', 'Umpar', 'Tamayo', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (348, 'Alonso  Ciceron', 'Biag', 'Bontia', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (349, 'Delmara', 'Bansagnon', 'Miranda', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (350, 'Pepe  Amado', 'Singco', 'Esquivias', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (351, 'Seth  Terrance', 'Malaki', 'Recio', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (352, 'Fortuna', 'Hussein', 'Villamor', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (353, 'Diego  Ascencion', 'Tiaoqui', 'Santillán', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (354, 'Reia', 'Linganyan', 'Monzón', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (355, 'Nestor', 'Capongga', 'Borres', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (356, 'Katelyn', 'Divero', 'Ouano', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (357, 'Christy', 'Calaguas', 'Acevedo', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (358, 'Brenden', 'Agbayani', 'Asunción', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (359, 'Arcadia', 'Loshang', 'Manrique', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (360, 'Kaitlin', 'Lozo', 'Madrid', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (361, 'Elsa', 'Lao-lao', 'Cuevas', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (362, 'Ryann', 'Ampuan', 'Villaromán', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (363, 'Charro', 'Quindipan', 'Gutiérrez', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (364, 'Giovanna', 'Magsino', 'Magsakay', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (365, 'Elise  Kendall', 'Sia', 'Magallanes', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (366, 'Kaitlynn  Julian', 'Nato', 'Luz', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (367, 'Axel', 'Ison', 'Alicante', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (368, 'Cipriano', 'Dangelo', 'Medina', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (369, 'Brigidia', 'Co', 'Manrique', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (370, 'Shamar', 'Matsuda', 'Villosillo', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (371, 'Alexander', 'Cayco', 'España', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (372, 'Berta', 'Wang-od', 'Acebedo', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (373, 'Maura  Edita', 'Usman', 'Zoleta', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (374, 'Erin', 'Bitao', 'Gica', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (375, 'Shyanne Ava', 'Tupaz', 'Digamon', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (376, 'Romeo', 'Bakil', 'Europa', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (377, 'Melvin', 'Dimakuta', 'López', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (378, 'Ayanna', 'Lazaro', 'Estrella', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (379, 'Ashanti', 'Mallorie', 'Stephon', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (380, 'Addison', 'Stephon', 'Tio', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (381, 'Mikaela', 'Maximo', 'Tyson', '', 'Female', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (382, 'Evan', 'Gezana', 'Trent', '', 'Male', '', '0000-00-00', NULL, NULL, 21, 1, 1, 1, 1, NULL, '2014-02-22 20:28:37', NULL, 0);
INSERT INTO `students` VALUES (383, 'Jesse', 'Vance', 'Maglikian', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (384, 'Letitia', 'Nangpi', 'Matias', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (385, 'Serenity', 'Cruz', 'Despujol', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (386, 'Honor', 'Brown', 'Rendón', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (387, 'Lillian', 'Ishida', 'Astillo', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (388, 'Nathan', 'Budi', 'Valle', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (389, 'Kelli', 'Morgan', 'Alcaraz', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (390, 'Armani', 'Janani', 'Buenaflor', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (391, 'Jaime', 'Kiong', 'Alejo', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (392, 'Shayne', 'Montrel', 'Cabigas', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (393, 'Giselle', 'Capil', 'Subejano', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (394, 'Mina', 'Quimque', 'Aquino', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (395, 'Zander', 'Dura', 'Deocampo', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (396, 'Carmela', 'Abaygar', 'Estrella', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (397, 'Rosalia', 'Sison', 'Abracosa', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (398, 'Selina', 'Ali', 'Pelayo', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (399, 'Logan', 'Leng', 'Sevilla', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (400, 'Leticia', 'Tuazon', 'Galvez', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (401, 'Paulina Eloise', 'Patanindagat', 'Cabrales', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (402, 'Paulita', 'Makisig', 'Diwata', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (403, 'Mckayla', 'Cayawan', 'Ruedas', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (404, 'Ema', 'Campong', 'Alejandro', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (405, 'Bethany', 'Liamzon', 'Duarna', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (406, 'Kiley', 'Tangkiang', 'Barerra', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (407, 'Tiffany', 'Kanaway', 'Gamulo', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (408, 'Maribel', 'Basir', 'Zafra', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (409, 'Jesse', 'Bantuas', 'Chávez', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (410, 'Moriah', 'Leyson', 'Español', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (411, 'Rafael', 'Tan', 'Alonzo', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (412, 'Rosemary', 'Mahiya', 'Corpuz', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (413, 'Seamus', 'Quingco', 'Gica', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (414, 'Catalin', 'Lomondot', 'Pérez', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (415, 'Annabel', 'Batara', 'Balandra', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (416, 'Bryce Roldan', 'Tiolengco', 'Reyes', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (417, 'Treyton', 'Kison', 'Zafra', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (418, 'Yadiel', 'Sasha', 'Vizcaya', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (419, 'Micaela', 'Yamamoto', 'Rosales', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, 1, '2014-02-24 13:45:29', '2019-02-24 13:47:31', 0);
INSERT INTO `students` VALUES (420, 'Dionis', 'Madid', 'Ocampo', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (421, 'Perla', 'Jimena', 'España', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (422, 'Teodor', 'Tiangco', 'Celiz', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (423, 'Toby', 'Yalung', 'Ramientos', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (424, 'Patricio', 'Coquia', 'Lara', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (425, 'Hana', 'Sanderson', 'Naval', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (426, 'Carmita', 'Akbar', 'Abracosa', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:45:29', NULL, 0);
INSERT INTO `students` VALUES (427, 'Paulita', 'Diwata', 'Makisig', '', 'Female', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:47:31', NULL, 0);
INSERT INTO `students` VALUES (428, 'Bryce Roldan', 'Reyes', 'Tiolengco', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:47:31', NULL, 0);
INSERT INTO `students` VALUES (429, 'Dionis', 'Ocampo', 'Madid', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:47:31', NULL, 0);
INSERT INTO `students` VALUES (430, 'Frank', 'Bitao', 'Cervantes', '', 'Male', '', '0000-00-00', '', '', 11, 1, 1, 1, 1, NULL, '2014-02-24 13:47:31', NULL, 0);
INSERT INTO `students` VALUES (431, 'Perla', 'Jimena', 'España', '', 'Female', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (432, 'Teodor', 'Tiangco', 'Celiz', '', 'Male', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (433, 'Toby', 'Yalung', 'Ramientos', '', 'Male', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (434, 'Patricio', 'Coquia', 'Lara', '', 'Male', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (435, 'Hana', 'Sanderson', 'Naval', '', 'Female', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (436, 'Carmita', 'Akbar', 'Abracosa', '', 'Female', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (437, 'Xenia', 'Rodas', 'Quema', '', 'Female', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (438, 'Payton', 'Lala', 'Mención', '', 'Female', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (439, 'Kasandra', 'Tiongco', 'Manzano', '', 'Female', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (440, 'Erlene Arnold', 'Tiaoqui', 'Cerinza', '', 'Female', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (441, 'Dominique', 'Curcio', 'Tambuatco', '', 'Female', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (442, 'Omari', 'Dinguinbayan', 'Ereve', '', 'Male', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (443, 'Willow', 'Manese', 'Borres', '', 'Female', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (444, 'Darryl', 'Ganzon', 'Guadarrama', '', 'Male', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (445, 'Karley', 'Yap', 'Castañares', '', 'Female', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (446, 'Deanna', 'Luso-Luso', 'Riego', '', 'Female', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (447, 'Theodore', 'German', 'Gonzaga', '', 'Male', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (448, 'Julianna', 'Agustin', 'Pastor', '', 'Female', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (449, 'Annie', 'Calaguas', 'Rana', '', 'Female', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);
INSERT INTO `students` VALUES (450, 'Felippe', 'Magdiwang', 'Alba', '', 'Male', '', '0000-00-00', '', '', 27, 1, 1, 1, 1, NULL, '2014-02-24 13:51:34', NULL, 0);

-- ----------------------------
-- Table structure for user_images
-- ----------------------------
DROP TABLE IF EXISTS `user_images`;
CREATE TABLE `user_images`  (
  `user_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `location_path` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `user_id` int(11) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `soft_deleted` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`user_image_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for user_logs
-- ----------------------------
DROP TABLE IF EXISTS `user_logs`;
CREATE TABLE `user_logs`  (
  `user_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime(0) NOT NULL,
  `action` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `soft_delete` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`user_log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_logs
-- ----------------------------
INSERT INTO `user_logs` VALUES (1, '2019-02-25 15:36:09', 'User has logged in.', 1, 0);

-- ----------------------------
-- Table structure for user_roles
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles`  (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_role` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `modified_by` int(11) NULL DEFAULT NULL,
  `date_created` datetime(0) NULL DEFAULT NULL,
  `date_modified` datetime(0) NULL DEFAULT NULL,
  `soft_deleted` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`user_role_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES (1, 'Super Admin', NULL, NULL, '2018-07-28 11:56:36', NULL, 0);
INSERT INTO `user_roles` VALUES (2, 'Admin', NULL, NULL, '2018-07-28 11:56:38', NULL, 0);
INSERT INTO `user_roles` VALUES (3, 'User', NULL, NULL, '2018-07-28 11:56:41', NULL, 0);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `middlename` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `name_ext` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `email_address` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mobile_number` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_role_id` int(11) NULL DEFAULT NULL,
  `school_id` int(11) NULL DEFAULT 0,
  `is_active` int(1) NULL DEFAULT NULL,
  `status` int(1) NULL DEFAULT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `modified_by` int(11) NULL DEFAULT NULL,
  `date_created` datetime(0) NULL DEFAULT NULL,
  `date_modified` datetime(0) NULL DEFAULT NULL,
  `date_login` datetime(0) NULL DEFAULT NULL,
  `soft_deleted` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'superadmin@gmail.com', 'admin', 'Marc Reginald', 'Racho', 'Panaligan', '', 'male', '', 'superadmin@gmail.com', '', 1, 1, 1, 1, NULL, 1, '2018-07-28 12:49:50', '2018-08-11 12:30:47', '2019-02-25 15:36:09', 0);
INSERT INTO `users` VALUES (2, 'school_admin', 'school_admin', 'School', '', 'Admin', '', 'male', 'P-1, Agong~ong, Buenavista Agusan Del Norte', '', '09123456789', 2, 2, 0, 1, 1, 1, '2018-09-30 09:45:31', '2018-09-30 09:46:19', '2018-10-28 15:02:26', 0);
INSERT INTO `users` VALUES (4, 'admin_user', 'admin_user', 'Admin', '', 'User', '', 'male', 'P-1, Agong~ong, Buenavista Agusan Del Norte', 'asddas@asd.ssad', '243232323', 3, 30, 0, 1, 2, 1, '2018-09-30 09:52:28', '2018-10-28 14:50:43', '2018-10-03 13:34:42', 0);

SET FOREIGN_KEY_CHECKS = 1;
