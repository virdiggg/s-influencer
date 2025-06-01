/*
 Navicat Premium Data Transfer

 Source Server         : lokal mysql
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : influencers

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 01/06/2025 14:01:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for influencer_mappings
-- ----------------------------
DROP TABLE IF EXISTS `influencer_mappings`;
CREATE TABLE `influencer_mappings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `influencer_id` bigint UNSIGNED NOT NULL,
  `area_id` bigint UNSIGNED NOT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 88 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of influencer_mappings
-- ----------------------------
INSERT INTO `influencer_mappings` VALUES (1, 1, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (2, 2, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (3, 3, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (4, 4, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (5, 5, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (6, 6, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (7, 7, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (8, 8, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (9, 9, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (10, 10, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (11, 11, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (12, 12, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (13, 13, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (14, 14, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (15, 15, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (16, 16, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (17, 17, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (18, 18, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (19, 19, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (20, 20, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (21, 21, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (22, 22, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (23, 23, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (24, 24, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (25, 25, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (26, 26, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (27, 27, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (28, 28, 3, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (29, 29, 4, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (30, 30, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (31, 31, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (32, 32, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (33, 33, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (34, 34, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (35, 35, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (36, 36, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (37, 37, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (38, 38, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (39, 39, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (40, 40, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (42, 42, 6, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (43, 43, 7, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (44, 44, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (45, 45, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (46, 46, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (47, 47, 8, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (48, 48, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (49, 49, 9, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (50, 50, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (51, 51, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (52, 52, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (53, 53, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (54, 54, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (55, 55, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (56, 56, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (57, 57, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (58, 58, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (59, 59, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (60, 60, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (61, 61, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (62, 62, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (63, 63, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (64, 64, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (65, 65, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (66, 66, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (67, 67, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (68, 68, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (69, 69, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (70, 70, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (71, 71, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (72, 72, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (73, 73, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (74, 74, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (75, 75, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (76, 76, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (77, 77, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (78, 78, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (79, 79, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (80, 80, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (81, 81, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (82, 82, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (83, 83, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (84, 84, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (85, 85, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `influencer_mappings` VALUES (87, 41, 5, 'admin', '2025-05-31 23:00:39', NULL, NULL);

-- ----------------------------
-- Table structure for influencer_request_logs
-- ----------------------------
DROP TABLE IF EXISTS `influencer_request_logs`;
CREATE TABLE `influencer_request_logs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `request_id` bigint UNSIGNED NOT NULL,
  `label` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of influencer_request_logs
-- ----------------------------
INSERT INTO `influencer_request_logs` VALUES (1, 2, 'New Request', 'user', '2025-06-01 13:54:30');
INSERT INTO `influencer_request_logs` VALUES (2, 2, 'Approved', 'admin', '2025-06-01 13:54:51');

-- ----------------------------
-- Table structure for influencer_requests
-- ----------------------------
DROP TABLE IF EXISTS `influencer_requests`;
CREATE TABLE `influencer_requests`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `influencer_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `username_instagram` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `followers` int NOT NULL,
  `engagement_rate` float NOT NULL,
  `note` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `approved_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `approved_at` timestamp NULL DEFAULT NULL,
  `rejected_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `rejected_at` timestamp NULL DEFAULT NULL,
  `reject_note` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `deleted_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of influencer_requests
-- ----------------------------
INSERT INTO `influencer_requests` VALUES (1, 78, 'Jefri Nichol', 'jefrinichol', 10200000, 2.08, 'campaign', 'user', '2025-06-01 13:14:46', 'admin', '2025-06-01 13:15:12', 'admin', '2025-06-01 13:15:13', NULL, NULL, NULL, NULL, NULL);
INSERT INTO `influencer_requests` VALUES (2, 12, 'Sibungbung', 'sibungbung', 3900000, 0.74, 'campaign', 'user', '2025-06-01 13:54:30', 'admin', '2025-06-01 13:54:51', 'admin', '2025-06-01 13:54:51', NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `version` bigint NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (20250511162210);

-- ----------------------------
-- Table structure for ms_areas
-- ----------------------------
DROP TABLE IF EXISTS `ms_areas`;
CREATE TABLE `ms_areas`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ms_areas
-- ----------------------------
INSERT INTO `ms_areas` VALUES (1, 'Jakarta', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_areas` VALUES (2, 'Bandung', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_areas` VALUES (3, 'Banjarmasin', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_areas` VALUES (4, 'Pontianak', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_areas` VALUES (5, 'Depok', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_areas` VALUES (6, 'Surabaya', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_areas` VALUES (7, 'Kediri', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_areas` VALUES (8, 'Bekasi', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_areas` VALUES (9, 'Pasuruan', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');

-- ----------------------------
-- Table structure for ms_categories
-- ----------------------------
DROP TABLE IF EXISTS `ms_categories`;
CREATE TABLE `ms_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ms_categories
-- ----------------------------
INSERT INTO `ms_categories` VALUES (1, 'Fashion', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_categories` VALUES (2, 'Makanan', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_categories` VALUES (3, 'Hiburan', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_categories` VALUES (4, 'Penyanyi Dangdut', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_categories` VALUES (5, 'Penyanyi Pop', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_categories` VALUES (6, 'Penyanyi Band', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_categories` VALUES (7, 'Kecantikan', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_categories` VALUES (8, 'Olahraga', 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');

-- ----------------------------
-- Table structure for ms_influencers
-- ----------------------------
DROP TABLE IF EXISTS `ms_influencers`;
CREATE TABLE `ms_influencers`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `username_instagram` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `followers` int NOT NULL,
  `engagement_rate` float NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 86 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ms_influencers
-- ----------------------------
INSERT INTO `ms_influencers` VALUES (1, 'Ayla Dimitri', 'ayladimitri', 399000, 2.5, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (2, 'Anaz Siantar', 'anazsiantar', 566000, 2.8, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (3, 'Sonia Eryka', 'soniaeryka', 190000, 2.7, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (4, 'Patricia Gouw', 'patriciagouw', 1000000, 2.9, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (5, 'Rachel Theresia', 'racheltheresia', 239000, 3.1, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (6, 'Clara Devi', 'lucedaleco', 167000, 2.6, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (7, 'Sarah Ayu', 'sarahayuh_', 800000, 3, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (8, 'Rachel Vennya', 'rachelvennya', 8000000, 0.79, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (9, 'Sabrina Chairunnisa', 'sabrinachairunnisa', 1000000, 1, 1, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (10, 'Ken &amp; Grat', 'kenandgrat', 1000000, 0.92, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (11, 'Codeblue', 'codebluuuu', 299000, 0.92, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (12, 'Sibungbung', 'sibungbung', 3900000, 0.74, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (13, 'Jakarta Food Destination', 'jktfooddestination', 1200000, 0.7, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (14, 'Windy Iwandi', 'fooddirectory', 232000, 0.8, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (15, 'Devina Hermawan', 'devinahermawan', 1500000, 3.5, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (16, 'Sisca Kohl', 'siscakohl', 3200000, 4, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (17, 'Tanboy Kun', 'tanboy_kun', 1700000, 3.8, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (18, 'Nex Carlos', 'nexcarlos', 1400000, 3.6, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (19, 'Farida Nurhan', 'farida.nurhan', 2700000, 3.2, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (20, 'Gerry Girianza', 'gerrygirianza', 184000, 3, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (21, 'Magdalena', 'mgdalenaf', 2300000, 3.4, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (22, 'Ria SW', 'riasw', 1000000, 3.7, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (23, 'William Gozali', 'willgoz', 934000, 2.9, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (24, 'Arnold Poernomo', 'arnoldpo', 2000000, 3.3, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (25, 'Kyranayda', 'kyranayda', 285000, 0.94, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (26, 'Buncit Foodies', 'buncitfoodies', 210000, 1.17, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (27, 'Myfunfoodiary', 'myfunfoodiary', 130000, 0.21, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (28, 'Maya Zikri', 'mayazikri', 137000, 1.01, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (29, 'Temenin Makan', 'temeninmakan', 81900, 0.2, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (30, 'Wiranurmansyah', 'wiranurmansyah', 44200, 14.2, 2, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (31, 'DJ Yasmin', 'dj_yasmin', 792000, 2.4, 3, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (32, 'DJ Winky Wiryawan', 'winkywiryawan', 344000, 2.2, 3, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (33, 'DJ Dipha Barus', 'diphabarus', 152000, 2.5, 3, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (34, 'DJ Riri Mestica', 'ririmestica', 45900, 2.1, 3, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (35, 'DJ Patricia Schuldtz', 'patriciaschuldtz', 48700, 2.3, 3, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (36, 'DJ Angger Dimas', 'anggerdimas', 107000, 2.4, 3, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (37, 'DJ Jevin Julian', 'jevinjulian', 263000, 2.2, 3, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (38, 'DJ UNA', 'putriuna', 1000000, 1.75, 3, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (39, 'DJ USA', 'dj_usa', 246000, 0.1, 3, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (40, 'DJ Joana', 'dj_joana', 1000000, 3, 3, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (41, 'Ayu Ting Ting', 'ayutingting92', 57200000, 1.9, 4, 'superadmin', '2025-05-31 22:45:22', 'admin', '2025-05-31 23:00:39');
INSERT INTO `ms_influencers` VALUES (42, 'Via Vallen', 'viavallen', 27700000, 2, 4, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (43, 'Nella Kharisma', 'nellakharisma', 6500000, 2.1, 4, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (44, 'Lesti Kejora', 'lestikejora', 28700000, 2.2, 4, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (45, 'Zaskia Gotik', 'zaskia_gotix', 31100000, 2, 4, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (46, 'Cita Citata', 'cita_rahayu', 15500000, 2.1, 4, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (47, 'Siti Badriah', 'sitibadriahh', 6500000, 2, 4, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (48, 'Dewi Perssik', 'dewiperssik9', 1400000, 1.8, 4, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (49, 'Inul Daratista', 'inul.d', 20400000, 1.9, 4, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (50, 'Rossa', 'itsrossa910', 18000000, 1.8, 5, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (51, 'Maudy Ayunda', 'maudyayunda', 19400000, 2, 5, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (52, 'Raisa', 'raisa6690', 37500000, 1.9, 5, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (53, 'Isyana Sarasvati', 'isyanasarasvati', 12800000, 2.1, 5, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (54, 'Tulus', 'tulusmt', 10600, 2, 5, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (55, 'Tiara Andini', 'tiaraandini', 8400000, 2.2, 5, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (56, 'Niki', 'nikizefanya', 3000000, 2.3, 5, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (57, 'Agnez Mo', 'agnezmo', 32100000, 1.7, 5, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (58, 'Afgan', 'afgan__', 5100000, 1.9, 5, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (59, 'Judika', 'jud1ka', 4400000, 2, 5, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (60, 'Ariel Noah', 'arielnoah', 5500000, 1.9, 6, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (61, 'Giring Ganesha', 'giring', 431000, 2.1, 6, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (62, 'Tantri Kotak', 'tantrisyalindri', 2700000, 2.2, 6, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (63, 'Kaka Slank', 'slankdotcom', 775000, 2, 6, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (64, 'Armand Maulana', 'armandmaulana04', 1500000, 2, 6, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (65, 'Once Mekel', 'oncemekel', 360000, 1.9, 6, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (66, 'Endah N Rhesa', 'endahnrhesa', 103000, 2.3, 6, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (67, 'Tasya Farasya', 'tasyafarasya', 7100000, 2.5, 7, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (68, 'Rachel Goddard', 'rachgoddard', 1100000, 2.6, 7, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (69, 'Sarah Ayu', 'sarahayu_', 800000, 3, 7, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (70, 'Abel Cantika', 'abellyc', 1100000, 2.4, 7, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (71, 'Suhay Salim', 'suhaysalim', 679000, 1.1, 7, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (72, 'Nanda Arsyinta', 'nandaarsynt', 3700000, 2.2, 7, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (73, 'Jovi Adhiguna', 'joviadhiguna', 874000, 2.5, 7, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (74, 'Kiara Leswara', 'kiaraleswara', 315000, 0.9, 7, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (75, 'Vinna Gracia', 'vinnagracia', 670000, 2.8, 7, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (76, 'Cindercella', 'cindercella', 765000, 2.6, 7, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (77, 'Randy Pangalila', 'randpunk', 1500000, 1.6, 8, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (78, 'Jefri Nichol', 'jefrinichol', 10200000, 2.08, 8, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (79, 'El Rumi', 'elelrumi', 6500000, 1.87, 8, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (80, 'Fadly Faisal', 'fadlyfsl_', 7000000, 2.99, 8, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (81, 'Jekson Karmela', 'kkajhe', 446000, 11.26, 8, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (82, 'Cellos', 'celloszxz', 1600000, 1.5, 8, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (83, 'Andi Cobra', 'andisaputra4311', 462000, 2.53, 8, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (84, 'Ongen Saknosiwi', 'ongen_saknosiwi', 39000, 8.13, 8, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');
INSERT INTO `ms_influencers` VALUES (85, 'Rudy Agustian', 'rudygoldenboy', 237000, 0.88, 8, 'superadmin', '2025-05-31 22:45:22', 'superadmin', '2025-05-31 22:45:22');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `full_name` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `token` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `auth_token` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `role` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'superadmin', 'Administrator', '0', '$2y$10$MkNgoZsccfh4nhPtCU5lyuwINu2HIEgYleEEmf4uRbGYlJNmEShz2', NULL, NULL, NULL, 'SUPER ADMIN', 1, 'superadmin', '2025-05-31 22:45:19', 'superadmin', '2025-05-31 22:45:19');
INSERT INTO `users` VALUES (2, 'admin', 'Admin', '0', '$2y$10$6kRkQNKJY7JQGHDkxbu7HuiRKOLoa.fOlSYkLIBoNQARjtv72DW2S', NULL, NULL, '2025-06-01 13:54:45', 'ADMIN', 1, 'superadmin', '2025-05-31 22:45:19', 'superadmin', '2025-06-01 13:54:45');
INSERT INTO `users` VALUES (3, 'user', 'User', '0', '$2y$10$RyxEnpdqdIh/8wOl/jICIeY2onAt62utuMjApGXBxCZMqAhBtegr2', NULL, NULL, '2025-06-01 13:22:04', 'USER', 1, 'superadmin', '2025-05-31 22:45:19', 'superadmin', '2025-06-01 13:22:04');

-- ----------------------------
-- Triggers structure for table influencer_requests
-- ----------------------------
DROP TRIGGER IF EXISTS `after_influencer_requests_insert`;
delimiter ;;
CREATE TRIGGER `after_influencer_requests_insert` AFTER INSERT ON `influencer_requests` FOR EACH ROW BEGIN
    INSERT INTO influencer_request_logs (
        request_id, label, created_by, created_at
    ) VALUES (
        NEW.id, 'New Request', NEW.created_by, NEW.created_at
    );
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table influencer_requests
-- ----------------------------
DROP TRIGGER IF EXISTS `after_influencer_requests_update`;
delimiter ;;
CREATE TRIGGER `after_influencer_requests_update` AFTER UPDATE ON `influencer_requests` FOR EACH ROW BEGIN
    DECLARE log_label VARCHAR(50);
    DECLARE actor VARCHAR(50);

    IF OLD.approved_at IS NULL AND NEW.approved_at IS NOT NULL THEN
        SET log_label = 'Approved';
        SET actor = NEW.approved_by;
    ELSEIF OLD.rejected_at IS NULL AND NEW.rejected_at IS NOT NULL THEN
        SET log_label = 'Rejected';
        SET actor = NEW.rejected_by;
    ELSEIF OLD.deleted_at IS NULL AND NEW.deleted_at IS NOT NULL THEN
        SET log_label = 'Deleted';
        SET actor = NEW.deleted_by;
    ELSEIF OLD.updated_at <> NEW.updated_at THEN
        SET log_label = 'Updated Request';
        SET actor = NEW.updated_by;
    ELSE
        SET log_label = 'Updated';
        SET actor = NEW.updated_by;
    END IF;

    INSERT INTO influencer_request_logs (
        request_id, label, created_by, created_at
    ) VALUES (
        NEW.id, log_label, actor, NOW()
    );
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
