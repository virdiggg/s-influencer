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

 Date: 17/05/2025 19:02:44
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
) ENGINE = InnoDB AUTO_INCREMENT = 82 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of influencer_mappings
-- ----------------------------
INSERT INTO `influencer_mappings` VALUES (1, 1, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (2, 2, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (3, 3, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (4, 4, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (5, 4, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (6, 5, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (7, 6, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (8, 7, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (9, 8, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (10, 9, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (11, 10, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (12, 11, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (13, 12, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (14, 13, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (15, 14, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (16, 15, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (17, 16, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (18, 17, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (19, 18, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (20, 19, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (21, 20, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (22, 21, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (23, 22, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (24, 23, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (25, 24, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (26, 25, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (27, 26, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (28, 27, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (29, 28, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (30, 29, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (31, 30, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (32, 31, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (33, 32, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (34, 33, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (35, 34, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (36, 35, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (37, 36, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (38, 37, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (39, 38, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (40, 39, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (41, 40, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (42, 41, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (43, 42, 4, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (44, 43, 5, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (45, 44, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (46, 45, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (47, 46, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (48, 47, 6, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (49, 48, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (50, 49, 7, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (51, 50, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (52, 51, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (53, 52, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (54, 53, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (55, 54, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (56, 55, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (57, 56, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (58, 57, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (59, 58, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (60, 59, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (61, 60, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (62, 61, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (63, 62, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (64, 63, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (65, 64, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (66, 65, 8, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (67, 66, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (68, 67, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (69, 68, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (70, 69, 8, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (71, 70, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (72, 71, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (73, 72, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (74, 73, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (75, 74, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (76, 75, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (77, 76, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (78, 77, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (79, 78, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (80, 79, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `influencer_mappings` VALUES (81, 80, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');

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
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of influencer_requests
-- ----------------------------
INSERT INTO `influencer_requests` VALUES (1, 61, 'Ariel Noah', 'arielnoah', 10000000, 1.9, 'tes', 'user', '2025-05-17 18:57:19', 'user', '2025-05-17 18:57:19', NULL, NULL);

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
INSERT INTO `migrations` VALUES (20250511162209);

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ms_areas
-- ----------------------------
INSERT INTO `ms_areas` VALUES (1, 'Jakarta', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_areas` VALUES (2, 'Berlin', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_areas` VALUES (3, 'Bandung', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_areas` VALUES (4, 'Surabaya', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_areas` VALUES (5, 'Kediri', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_areas` VALUES (6, 'Bekasi', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_areas` VALUES (7, 'Pasuruan', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_areas` VALUES (8, 'Yogyakarta', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');

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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ms_categories
-- ----------------------------
INSERT INTO `ms_categories` VALUES (1, 'Fashion', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_categories` VALUES (2, 'Makanan', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_categories` VALUES (3, 'Hiburan', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_categories` VALUES (4, 'Penyanyi Dangdut', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_categories` VALUES (5, 'Penyanyi Pop', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_categories` VALUES (6, 'Penyanyi Band', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_categories` VALUES (7, 'Kecantikan', 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');

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
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ms_influencers
-- ----------------------------
INSERT INTO `ms_influencers` VALUES (1, 'Ayla Dimitri', 'ayladimitri', 500000, 2.5, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (2, 'Anaz Siantar', 'anazsiantar', 600000, 2.8, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (3, 'Sonia Eryka', 'soniaeryka', 800000, 2.7, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (4, 'Gitta Savitri', 'gitasav', 400000, 3.2, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (5, 'Patricia Gouw', 'patriciagouw', 700000, 2.9, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (6, 'Rachel Theresia', 'racheltheresia', 350000, 3.1, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (7, 'Clara Devi', 'lucedaleco', 300000, 2.6, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (8, 'Sarah Ayu', 'sarahayuh_', 450000, 3, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (9, 'Anastasia Siantar', 'anazsiantar', 500000, 2.8, 1, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (10, 'Devina Hermawan', 'devinahermawan', 2000000, 3.5, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (11, 'Sisca Kohl', 'siscakohl', 6000000, 4, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (12, 'Tanboy Kun', 'tanboy_kun', 3500000, 3.8, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (13, 'Nex Carlos', 'nexcarlos', 2800000, 3.6, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (14, 'Farida Nurhan', 'farida.nurhan', 1500000, 3.2, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (15, 'Gerry Girianza', 'gerrygirianza', 1000000, 3, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (16, 'Mgdalenaf', 'mgdalenaf', 1200000, 3.4, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (17, 'Ria SW', 'riasukmawijaya', 2000000, 3.7, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (18, 'William Gozali', 'willgoz', 900000, 2.9, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (19, 'Arnold Poernomo', 'arnoldpo', 1800000, 3.3, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (20, 'JKT Food Destination', 'jktfooddestination', 1300000, 0.07, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (21, 'Kyranayda', 'kyranayda', 286600, 0.94, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (22, 'Foodirectory', 'foodirectory', 221100, 0.88, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (23, 'Buncit Foodies', 'buncitfoodies', 205000, 1.17, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (24, 'Myfunfoodiary', 'myfunfoodiary', 119200, 0.21, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (25, 'Maya Zikri', 'mayazikri', 118100, 1.01, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (26, 'Temenin Makan', 'temeninmakan', 76500, 0.2, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (27, 'Wiranurmansyah', 'wiranurmansyah', 44200, 13.62, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (28, 'Riodjaja', 'riodjaja', 43600, 51.35, 2, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (29, 'DJ Yasmin', 'dj_yasmin', 1500000, 2.4, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (30, 'DJ Winky Wiryawan', 'winkywiryawan', 1200000, 2.2, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (31, 'DJ Dipha Barus', 'diphabarus', 1800000, 2.5, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (32, 'DJ Riri Mestica', 'ririmestica', 900000, 2.1, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (33, 'DJ Patricia Schuldtz', 'patriciaschuldtz', 800000, 2.3, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (34, 'DJ Angger Dimas', 'anggerdimas', 1000000, 2.4, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (35, 'DJ Jevin Julian', 'jevinjulian', 1300000, 2.2, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (36, 'DJ Hogi Wirjono', 'hogiwirjono', 700000, 2, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (37, 'DJ LTN', 'dj_ltn', 600000, 2.1, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (38, 'DJ UNA', 'putriuna', 1000000, 1.75, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (39, 'DJ USA', 'dj_usa', 246000, 0.1, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (40, 'DJ Joana', 'dj.joana', 1000000, 3, 3, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (41, 'Ayu Ting Ting', 'ayutingting92', 10000000, 1.9, 4, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (42, 'Via Vallen', 'viavallen', 8500000, 2, 4, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (43, 'Nella Kharisma', 'nellakharisma', 7000000, 2.1, 4, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (44, 'Lesti Kejora', 'lestikejora', 9000000, 2.2, 4, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (45, 'Zaskia Gotik', 'zaskia_gotix', 6500000, 2, 4, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (46, 'Cita Citata', 'cita_rahayu', 5500000, 2.1, 4, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (47, 'Siti Badriah', 'sitibadriahh', 6000000, 2, 4, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (48, 'Dewi Perssik', 'dewiperssik9', 4500000, 1.8, 4, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (49, 'Inul Daratista', 'inul.d', 5000000, 1.9, 4, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (50, 'Ikke Nurjanah', 'ikkenurjanah0518', 3000000, 2, 4, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (51, 'Rossa', 'itsrossa910', 12000000, 1.8, 5, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (52, 'Maudy Ayunda', 'maudyayunda', 11000000, 2, 5, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (53, 'Raisa', 'raisa6690', 10500000, 1.9, 5, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (54, 'Isyana Sarasvati', 'isyanasarasvati', 9000000, 2.1, 5, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (55, 'Tulus', 'tulusmt', 8000000, 2, 5, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (56, 'Tiara Andini', 'tiaraandini', 7500000, 2.2, 5, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (57, 'Niki', 'nikizefanya', 6500000, 2.3, 5, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (58, 'Agnez Mo', 'agnezmo', 14000000, 1.7, 5, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (59, 'Afgan', 'afgan__', 9500000, 1.9, 5, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (60, 'Judika', 'jud1ka', 8500000, 2, 5, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (61, 'Ariel Noah', 'arielnoah', 10000000, 1.9, 6, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (62, 'Giring Ganesha', 'giring', 1500000, 2.1, 6, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (63, 'Tantri Kotak', 'tantrisyalindri', 2000000, 2.2, 6, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (64, 'Kaka Slank', 'slankdotcom', 3000000, 2, 6, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (65, 'Duta Sheila On 7', 'sheilaon7', 4500000, 2.1, 6, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (66, 'Armand Maulana', 'armandmaulana04', 2500000, 2, 6, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (67, 'Once Mekel', 'oncemekelofficial', 2000000, 1.9, 6, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (68, 'Endah N Rhesa', 'endahnrhesa', 1000000, 2.3, 6, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (69, 'Eross Candra', 'erosscandra', 1500000, 2.2, 6, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (70, 'David Bayu', 'davidbayudj', 1200000, 2.1, 6, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (71, 'Tasya Farasya', 'tasyafarasya', 5000000, 2.5, 7, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (72, 'Rachel Goddard', 'rachgoddard', 3500000, 2.6, 7, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (73, 'Sarah Ayu', 'sarahayu_', 900000, 3, 7, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (74, 'Abel Cantika', 'abellyc', 2000000, 2.4, 7, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (75, 'Suhay Salim', 'suhaysalim', 1800000, 2.3, 7, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (76, 'Nanda Arsyinta', 'nandaarsynt', 2500000, 2.2, 7, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (77, 'Jovi Adhiguna', 'joviadhiguna', 1500000, 2.5, 7, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (78, 'Kiara Leswara', 'kiaraleswara', 1000000, 2.7, 7, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (79, 'Vinna Gracia', 'vinnagracia', 800000, 2.8, 7, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');
INSERT INTO `ms_influencers` VALUES (80, 'Cindercella', 'cindercella', 1200000, 2.6, 7, 'superadmin', '2025-05-17 18:54:07', 'superadmin', '2025-05-17 18:54:07');

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
INSERT INTO `users` VALUES (1, 'superadmin', 'Administrator', '0', '$2y$10$uBhYwEZhk.p9Xeu1Z/1wKeO/OTD034n9/m4x/neGnKcwLsrxOX/9e', NULL, NULL, NULL, 'SUPER ADMIN', 1, 'superadmin', '2025-05-17 18:54:05', 'superadmin', '2025-05-17 18:54:05');
INSERT INTO `users` VALUES (2, 'admin', 'Admin', '0', '$2y$10$fOqbvc87tKcJjgYtJoXq2.wIvuW7FnDn8sQv7XrKGvVkm9P287zS6', NULL, NULL, '2025-05-17 18:58:49', 'ADMIN', 1, 'superadmin', '2025-05-17 18:54:05', 'superadmin', '2025-05-17 18:58:49');
INSERT INTO `users` VALUES (3, 'user', 'User', '0', '$2y$10$gTVMxxq0QrN1T/I1/4Oi6OK7Z6eZyHKHw86wZbTxnz3AcF.psyMDe', NULL, NULL, '2025-05-17 18:56:24', 'USER', 1, 'superadmin', '2025-05-17 18:54:05', 'superadmin', '2025-05-17 18:56:24');

SET FOREIGN_KEY_CHECKS = 1;
