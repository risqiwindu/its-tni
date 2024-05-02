/*
 Navicat Premium Data Transfer

 Source Server         : DB Localhost
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : lms

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 02/05/2024 14:22:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `admin_admin_role`;
CREATE TABLE `admin_admin_role`  (
  `admin_id` bigint UNSIGNED NOT NULL,
  `admin_role_id` bigint UNSIGNED NOT NULL,
  INDEX `admin_admin_role_admin_id_foreign`(`admin_id`) USING BTREE,
  INDEX `admin_admin_role_admin_role_id_foreign`(`admin_role_id`) USING BTREE,
  CONSTRAINT `admin_admin_role_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `admin_admin_role_admin_role_id_foreign` FOREIGN KEY (`admin_role_id`) REFERENCES `admin_roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_admin_role
-- ----------------------------

-- ----------------------------
-- Table structure for admin_course
-- ----------------------------
DROP TABLE IF EXISTS `admin_course`;
CREATE TABLE `admin_course`  (
  `admin_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  INDEX `admin_course_admin_id_foreign`(`admin_id`) USING BTREE,
  INDEX `admin_course_course_id_foreign`(`course_id`) USING BTREE,
  CONSTRAINT `admin_course_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `admin_course_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_course
-- ----------------------------
INSERT INTO `admin_course` VALUES (2, 4);
INSERT INTO `admin_course` VALUES (2, 5);

-- ----------------------------
-- Table structure for admin_discussion
-- ----------------------------
DROP TABLE IF EXISTS `admin_discussion`;
CREATE TABLE `admin_discussion`  (
  `admin_id` bigint UNSIGNED NOT NULL,
  `discussion_id` bigint UNSIGNED NOT NULL,
  INDEX `admin_discussion_admin_id_foreign`(`admin_id`) USING BTREE,
  INDEX `admin_discussion_discussion_id_foreign`(`discussion_id`) USING BTREE,
  CONSTRAINT `admin_discussion_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `admin_discussion_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_discussion
-- ----------------------------

-- ----------------------------
-- Table structure for admin_role_permission
-- ----------------------------
DROP TABLE IF EXISTS `admin_role_permission`;
CREATE TABLE `admin_role_permission`  (
  `admin_role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  INDEX `admin_role_permission_admin_role_id_foreign`(`admin_role_id`) USING BTREE,
  INDEX `admin_role_permission_permission_id_foreign`(`permission_id`) USING BTREE,
  CONSTRAINT `admin_role_permission_admin_role_id_foreign` FOREIGN KEY (`admin_role_id`) REFERENCES `admin_roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `admin_role_permission_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_role_permission
-- ----------------------------
INSERT INTO `admin_role_permission` VALUES (1, 1);
INSERT INTO `admin_role_permission` VALUES (1, 2);
INSERT INTO `admin_role_permission` VALUES (1, 3);
INSERT INTO `admin_role_permission` VALUES (1, 4);
INSERT INTO `admin_role_permission` VALUES (1, 5);
INSERT INTO `admin_role_permission` VALUES (1, 6);
INSERT INTO `admin_role_permission` VALUES (1, 7);
INSERT INTO `admin_role_permission` VALUES (1, 8);
INSERT INTO `admin_role_permission` VALUES (1, 9);
INSERT INTO `admin_role_permission` VALUES (1, 10);
INSERT INTO `admin_role_permission` VALUES (1, 11);
INSERT INTO `admin_role_permission` VALUES (1, 12);
INSERT INTO `admin_role_permission` VALUES (1, 13);
INSERT INTO `admin_role_permission` VALUES (1, 14);
INSERT INTO `admin_role_permission` VALUES (1, 15);
INSERT INTO `admin_role_permission` VALUES (1, 16);
INSERT INTO `admin_role_permission` VALUES (1, 17);
INSERT INTO `admin_role_permission` VALUES (1, 18);
INSERT INTO `admin_role_permission` VALUES (1, 19);
INSERT INTO `admin_role_permission` VALUES (1, 20);
INSERT INTO `admin_role_permission` VALUES (1, 21);
INSERT INTO `admin_role_permission` VALUES (1, 22);
INSERT INTO `admin_role_permission` VALUES (1, 23);
INSERT INTO `admin_role_permission` VALUES (1, 24);
INSERT INTO `admin_role_permission` VALUES (1, 25);
INSERT INTO `admin_role_permission` VALUES (1, 26);
INSERT INTO `admin_role_permission` VALUES (1, 27);
INSERT INTO `admin_role_permission` VALUES (1, 28);
INSERT INTO `admin_role_permission` VALUES (1, 29);
INSERT INTO `admin_role_permission` VALUES (1, 30);
INSERT INTO `admin_role_permission` VALUES (1, 31);
INSERT INTO `admin_role_permission` VALUES (1, 32);
INSERT INTO `admin_role_permission` VALUES (1, 33);
INSERT INTO `admin_role_permission` VALUES (1, 34);
INSERT INTO `admin_role_permission` VALUES (1, 35);
INSERT INTO `admin_role_permission` VALUES (1, 36);
INSERT INTO `admin_role_permission` VALUES (1, 37);
INSERT INTO `admin_role_permission` VALUES (1, 38);
INSERT INTO `admin_role_permission` VALUES (1, 39);
INSERT INTO `admin_role_permission` VALUES (1, 40);
INSERT INTO `admin_role_permission` VALUES (1, 41);
INSERT INTO `admin_role_permission` VALUES (1, 42);
INSERT INTO `admin_role_permission` VALUES (1, 43);
INSERT INTO `admin_role_permission` VALUES (1, 44);
INSERT INTO `admin_role_permission` VALUES (1, 45);
INSERT INTO `admin_role_permission` VALUES (1, 46);
INSERT INTO `admin_role_permission` VALUES (1, 47);
INSERT INTO `admin_role_permission` VALUES (1, 48);
INSERT INTO `admin_role_permission` VALUES (1, 49);
INSERT INTO `admin_role_permission` VALUES (1, 50);
INSERT INTO `admin_role_permission` VALUES (1, 51);
INSERT INTO `admin_role_permission` VALUES (1, 52);
INSERT INTO `admin_role_permission` VALUES (1, 53);
INSERT INTO `admin_role_permission` VALUES (1, 54);
INSERT INTO `admin_role_permission` VALUES (1, 55);
INSERT INTO `admin_role_permission` VALUES (1, 56);
INSERT INTO `admin_role_permission` VALUES (1, 57);
INSERT INTO `admin_role_permission` VALUES (1, 58);
INSERT INTO `admin_role_permission` VALUES (1, 59);
INSERT INTO `admin_role_permission` VALUES (1, 60);
INSERT INTO `admin_role_permission` VALUES (1, 61);
INSERT INTO `admin_role_permission` VALUES (1, 62);
INSERT INTO `admin_role_permission` VALUES (1, 63);
INSERT INTO `admin_role_permission` VALUES (1, 64);
INSERT INTO `admin_role_permission` VALUES (1, 65);
INSERT INTO `admin_role_permission` VALUES (1, 66);
INSERT INTO `admin_role_permission` VALUES (1, 67);
INSERT INTO `admin_role_permission` VALUES (1, 68);
INSERT INTO `admin_role_permission` VALUES (1, 69);
INSERT INTO `admin_role_permission` VALUES (1, 70);
INSERT INTO `admin_role_permission` VALUES (1, 71);
INSERT INTO `admin_role_permission` VALUES (1, 72);
INSERT INTO `admin_role_permission` VALUES (1, 73);
INSERT INTO `admin_role_permission` VALUES (1, 74);
INSERT INTO `admin_role_permission` VALUES (1, 75);
INSERT INTO `admin_role_permission` VALUES (1, 76);
INSERT INTO `admin_role_permission` VALUES (1, 77);
INSERT INTO `admin_role_permission` VALUES (1, 78);
INSERT INTO `admin_role_permission` VALUES (1, 79);
INSERT INTO `admin_role_permission` VALUES (1, 80);
INSERT INTO `admin_role_permission` VALUES (1, 81);
INSERT INTO `admin_role_permission` VALUES (1, 82);
INSERT INTO `admin_role_permission` VALUES (1, 83);
INSERT INTO `admin_role_permission` VALUES (1, 84);
INSERT INTO `admin_role_permission` VALUES (1, 85);
INSERT INTO `admin_role_permission` VALUES (1, 86);
INSERT INTO `admin_role_permission` VALUES (1, 87);
INSERT INTO `admin_role_permission` VALUES (1, 88);
INSERT INTO `admin_role_permission` VALUES (1, 89);
INSERT INTO `admin_role_permission` VALUES (1, 90);
INSERT INTO `admin_role_permission` VALUES (1, 91);
INSERT INTO `admin_role_permission` VALUES (1, 92);
INSERT INTO `admin_role_permission` VALUES (1, 93);
INSERT INTO `admin_role_permission` VALUES (1, 94);
INSERT INTO `admin_role_permission` VALUES (1, 95);
INSERT INTO `admin_role_permission` VALUES (1, 96);
INSERT INTO `admin_role_permission` VALUES (1, 97);
INSERT INTO `admin_role_permission` VALUES (1, 98);
INSERT INTO `admin_role_permission` VALUES (1, 99);
INSERT INTO `admin_role_permission` VALUES (1, 100);
INSERT INTO `admin_role_permission` VALUES (1, 101);
INSERT INTO `admin_role_permission` VALUES (1, 102);
INSERT INTO `admin_role_permission` VALUES (1, 103);
INSERT INTO `admin_role_permission` VALUES (1, 104);
INSERT INTO `admin_role_permission` VALUES (1, 105);
INSERT INTO `admin_role_permission` VALUES (1, 106);
INSERT INTO `admin_role_permission` VALUES (1, 107);
INSERT INTO `admin_role_permission` VALUES (1, 108);
INSERT INTO `admin_role_permission` VALUES (1, 109);
INSERT INTO `admin_role_permission` VALUES (1, 110);
INSERT INTO `admin_role_permission` VALUES (1, 111);
INSERT INTO `admin_role_permission` VALUES (1, 112);
INSERT INTO `admin_role_permission` VALUES (1, 113);
INSERT INTO `admin_role_permission` VALUES (1, 114);
INSERT INTO `admin_role_permission` VALUES (1, 115);
INSERT INTO `admin_role_permission` VALUES (1, 116);
INSERT INTO `admin_role_permission` VALUES (1, 117);
INSERT INTO `admin_role_permission` VALUES (1, 118);
INSERT INTO `admin_role_permission` VALUES (1, 119);
INSERT INTO `admin_role_permission` VALUES (1, 120);
INSERT INTO `admin_role_permission` VALUES (1, 121);
INSERT INTO `admin_role_permission` VALUES (1, 122);
INSERT INTO `admin_role_permission` VALUES (1, 123);
INSERT INTO `admin_role_permission` VALUES (1, 124);
INSERT INTO `admin_role_permission` VALUES (1, 125);
INSERT INTO `admin_role_permission` VALUES (1, 126);
INSERT INTO `admin_role_permission` VALUES (1, 127);
INSERT INTO `admin_role_permission` VALUES (1, 128);
INSERT INTO `admin_role_permission` VALUES (1, 129);
INSERT INTO `admin_role_permission` VALUES (1, 130);
INSERT INTO `admin_role_permission` VALUES (1, 131);
INSERT INTO `admin_role_permission` VALUES (1, 132);
INSERT INTO `admin_role_permission` VALUES (1, 133);
INSERT INTO `admin_role_permission` VALUES (1, 134);
INSERT INTO `admin_role_permission` VALUES (1, 135);
INSERT INTO `admin_role_permission` VALUES (1, 136);
INSERT INTO `admin_role_permission` VALUES (1, 137);
INSERT INTO `admin_role_permission` VALUES (1, 138);
INSERT INTO `admin_role_permission` VALUES (1, 139);
INSERT INTO `admin_role_permission` VALUES (1, 140);
INSERT INTO `admin_role_permission` VALUES (1, 141);
INSERT INTO `admin_role_permission` VALUES (1, 142);
INSERT INTO `admin_role_permission` VALUES (1, 143);
INSERT INTO `admin_role_permission` VALUES (1, 144);
INSERT INTO `admin_role_permission` VALUES (1, 145);
INSERT INTO `admin_role_permission` VALUES (1, 146);
INSERT INTO `admin_role_permission` VALUES (1, 147);
INSERT INTO `admin_role_permission` VALUES (1, 148);
INSERT INTO `admin_role_permission` VALUES (1, 149);
INSERT INTO `admin_role_permission` VALUES (1, 150);
INSERT INTO `admin_role_permission` VALUES (1, 151);
INSERT INTO `admin_role_permission` VALUES (1, 152);
INSERT INTO `admin_role_permission` VALUES (2, 1);
INSERT INTO `admin_role_permission` VALUES (2, 2);
INSERT INTO `admin_role_permission` VALUES (2, 3);
INSERT INTO `admin_role_permission` VALUES (2, 4);
INSERT INTO `admin_role_permission` VALUES (2, 5);
INSERT INTO `admin_role_permission` VALUES (2, 6);
INSERT INTO `admin_role_permission` VALUES (2, 7);
INSERT INTO `admin_role_permission` VALUES (2, 8);
INSERT INTO `admin_role_permission` VALUES (2, 9);
INSERT INTO `admin_role_permission` VALUES (2, 10);
INSERT INTO `admin_role_permission` VALUES (2, 11);
INSERT INTO `admin_role_permission` VALUES (2, 12);
INSERT INTO `admin_role_permission` VALUES (2, 13);
INSERT INTO `admin_role_permission` VALUES (2, 14);
INSERT INTO `admin_role_permission` VALUES (2, 15);
INSERT INTO `admin_role_permission` VALUES (2, 16);
INSERT INTO `admin_role_permission` VALUES (2, 17);
INSERT INTO `admin_role_permission` VALUES (2, 18);
INSERT INTO `admin_role_permission` VALUES (2, 19);
INSERT INTO `admin_role_permission` VALUES (2, 20);
INSERT INTO `admin_role_permission` VALUES (2, 21);
INSERT INTO `admin_role_permission` VALUES (2, 22);
INSERT INTO `admin_role_permission` VALUES (2, 23);
INSERT INTO `admin_role_permission` VALUES (2, 24);
INSERT INTO `admin_role_permission` VALUES (2, 25);
INSERT INTO `admin_role_permission` VALUES (2, 26);
INSERT INTO `admin_role_permission` VALUES (2, 27);
INSERT INTO `admin_role_permission` VALUES (2, 28);
INSERT INTO `admin_role_permission` VALUES (2, 29);
INSERT INTO `admin_role_permission` VALUES (2, 30);
INSERT INTO `admin_role_permission` VALUES (2, 31);
INSERT INTO `admin_role_permission` VALUES (2, 32);
INSERT INTO `admin_role_permission` VALUES (2, 33);
INSERT INTO `admin_role_permission` VALUES (2, 34);
INSERT INTO `admin_role_permission` VALUES (2, 35);
INSERT INTO `admin_role_permission` VALUES (2, 36);
INSERT INTO `admin_role_permission` VALUES (2, 54);
INSERT INTO `admin_role_permission` VALUES (2, 55);
INSERT INTO `admin_role_permission` VALUES (2, 56);
INSERT INTO `admin_role_permission` VALUES (2, 57);
INSERT INTO `admin_role_permission` VALUES (2, 58);
INSERT INTO `admin_role_permission` VALUES (2, 59);
INSERT INTO `admin_role_permission` VALUES (2, 60);
INSERT INTO `admin_role_permission` VALUES (2, 61);
INSERT INTO `admin_role_permission` VALUES (2, 62);
INSERT INTO `admin_role_permission` VALUES (2, 63);
INSERT INTO `admin_role_permission` VALUES (2, 64);
INSERT INTO `admin_role_permission` VALUES (2, 65);
INSERT INTO `admin_role_permission` VALUES (2, 66);
INSERT INTO `admin_role_permission` VALUES (2, 67);
INSERT INTO `admin_role_permission` VALUES (2, 68);
INSERT INTO `admin_role_permission` VALUES (2, 69);
INSERT INTO `admin_role_permission` VALUES (2, 70);
INSERT INTO `admin_role_permission` VALUES (2, 71);
INSERT INTO `admin_role_permission` VALUES (2, 72);
INSERT INTO `admin_role_permission` VALUES (2, 73);
INSERT INTO `admin_role_permission` VALUES (2, 74);
INSERT INTO `admin_role_permission` VALUES (2, 76);
INSERT INTO `admin_role_permission` VALUES (2, 77);
INSERT INTO `admin_role_permission` VALUES (2, 78);
INSERT INTO `admin_role_permission` VALUES (2, 79);
INSERT INTO `admin_role_permission` VALUES (2, 80);
INSERT INTO `admin_role_permission` VALUES (2, 81);
INSERT INTO `admin_role_permission` VALUES (2, 82);
INSERT INTO `admin_role_permission` VALUES (2, 83);
INSERT INTO `admin_role_permission` VALUES (2, 84);
INSERT INTO `admin_role_permission` VALUES (2, 85);
INSERT INTO `admin_role_permission` VALUES (2, 86);
INSERT INTO `admin_role_permission` VALUES (2, 87);
INSERT INTO `admin_role_permission` VALUES (2, 88);
INSERT INTO `admin_role_permission` VALUES (2, 89);
INSERT INTO `admin_role_permission` VALUES (2, 90);
INSERT INTO `admin_role_permission` VALUES (2, 91);
INSERT INTO `admin_role_permission` VALUES (2, 92);
INSERT INTO `admin_role_permission` VALUES (2, 93);
INSERT INTO `admin_role_permission` VALUES (2, 94);
INSERT INTO `admin_role_permission` VALUES (2, 95);
INSERT INTO `admin_role_permission` VALUES (2, 96);
INSERT INTO `admin_role_permission` VALUES (2, 97);
INSERT INTO `admin_role_permission` VALUES (2, 98);
INSERT INTO `admin_role_permission` VALUES (2, 99);
INSERT INTO `admin_role_permission` VALUES (2, 100);
INSERT INTO `admin_role_permission` VALUES (2, 101);
INSERT INTO `admin_role_permission` VALUES (2, 102);
INSERT INTO `admin_role_permission` VALUES (2, 103);
INSERT INTO `admin_role_permission` VALUES (2, 104);
INSERT INTO `admin_role_permission` VALUES (2, 105);
INSERT INTO `admin_role_permission` VALUES (2, 106);
INSERT INTO `admin_role_permission` VALUES (2, 107);
INSERT INTO `admin_role_permission` VALUES (2, 108);
INSERT INTO `admin_role_permission` VALUES (2, 116);
INSERT INTO `admin_role_permission` VALUES (2, 117);
INSERT INTO `admin_role_permission` VALUES (2, 118);
INSERT INTO `admin_role_permission` VALUES (2, 119);
INSERT INTO `admin_role_permission` VALUES (2, 120);
INSERT INTO `admin_role_permission` VALUES (2, 125);
INSERT INTO `admin_role_permission` VALUES (2, 126);
INSERT INTO `admin_role_permission` VALUES (2, 127);
INSERT INTO `admin_role_permission` VALUES (2, 128);
INSERT INTO `admin_role_permission` VALUES (2, 129);
INSERT INTO `admin_role_permission` VALUES (2, 140);
INSERT INTO `admin_role_permission` VALUES (2, 141);
INSERT INTO `admin_role_permission` VALUES (2, 142);
INSERT INTO `admin_role_permission` VALUES (2, 143);
INSERT INTO `admin_role_permission` VALUES (2, 144);
INSERT INTO `admin_role_permission` VALUES (2, 145);
INSERT INTO `admin_role_permission` VALUES (2, 146);
INSERT INTO `admin_role_permission` VALUES (2, 147);
INSERT INTO `admin_role_permission` VALUES (2, 148);
INSERT INTO `admin_role_permission` VALUES (2, 149);
INSERT INTO `admin_role_permission` VALUES (2, 150);
INSERT INTO `admin_role_permission` VALUES (2, 151);
INSERT INTO `admin_role_permission` VALUES (2, 152);
INSERT INTO `admin_role_permission` VALUES (1, 153);
INSERT INTO `admin_role_permission` VALUES (1, 154);
INSERT INTO `admin_role_permission` VALUES (1, 155);
INSERT INTO `admin_role_permission` VALUES (1, 156);
INSERT INTO `admin_role_permission` VALUES (1, 157);
INSERT INTO `admin_role_permission` VALUES (1, 158);
INSERT INTO `admin_role_permission` VALUES (1, 159);

-- ----------------------------
-- Table structure for admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `admin_roles`;
CREATE TABLE `admin_roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin_roles
-- ----------------------------
INSERT INTO `admin_roles` VALUES (1, '2024-03-29 17:18:03', '2024-03-29 17:18:03', 'Super Administrator');
INSERT INTO `admin_roles` VALUES (2, '2024-03-29 17:18:03', '2024-03-29 17:18:03', 'Administrator');

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_role_id` bigint UNSIGNED NOT NULL,
  `notify` tinyint(1) NOT NULL DEFAULT 1,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `public` tinyint(1) NULL DEFAULT 1,
  `social_facebook` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `social_twitter` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `social_linkedin` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `social_instagram` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `social_website` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `admins_admin_role_id_foreign`(`admin_role_id`) USING BTREE,
  INDEX `admins_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `admins_admin_role_id_foreign` FOREIGN KEY (`admin_role_id`) REFERENCES `admin_roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `admins_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, '2024-03-29 17:18:09', '2024-03-29 17:18:09', 1, 1, 'I am a skilled an qualified instructor', 1, 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `admins` VALUES (2, '2024-04-29 03:16:33', '2024-04-29 03:16:33', 2, 1, NULL, 5, 1, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  `meta_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `mobile` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `articles_slug_unique`(`slug`) USING BTREE,
  FULLTEXT INDEX `full`(`title`, `content`, `slug`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES (1, NULL, NULL, 'Who We Are', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'who-we-are', 1, 'Who We Are', NULL, 0);
INSERT INTO `articles` VALUES (2, NULL, NULL, 'Our Services', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'our-services', 1, 'Our Services', NULL, 0);
INSERT INTO `articles` VALUES (3, NULL, NULL, 'FAQ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'faq', 1, 'FAQs', NULL, 0);

-- ----------------------------
-- Table structure for assignment_certificate
-- ----------------------------
DROP TABLE IF EXISTS `assignment_certificate`;
CREATE TABLE `assignment_certificate`  (
  `certificate_id` bigint UNSIGNED NOT NULL,
  `assignment_id` bigint UNSIGNED NOT NULL,
  INDEX `assignment_certificate_certificate_id_foreign`(`certificate_id`) USING BTREE,
  INDEX `assignment_certificate_assignment_id_foreign`(`assignment_id`) USING BTREE,
  CONSTRAINT `assignment_certificate_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `assignment_certificate_certificate_id_foreign` FOREIGN KEY (`certificate_id`) REFERENCES `certificates` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assignment_certificate
-- ----------------------------

-- ----------------------------
-- Table structure for assignment_submissions
-- ----------------------------
DROP TABLE IF EXISTS `assignment_submissions`;
CREATE TABLE `assignment_submissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `assignment_id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `file_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `grade` double(8, 2) NULL DEFAULT NULL,
  `editable` tinyint(1) NOT NULL DEFAULT 0,
  `admin_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `submitted` tinyint(1) NOT NULL DEFAULT 0,
  `student_comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `assignment_submissions_assignment_id_foreign`(`assignment_id`) USING BTREE,
  INDEX `assignment_submissions_student_id_foreign`(`student_id`) USING BTREE,
  CONSTRAINT `assignment_submissions_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `assignment_submissions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assignment_submissions
-- ----------------------------

-- ----------------------------
-- Table structure for assignments
-- ----------------------------
DROP TABLE IF EXISTS `assignments`;
CREATE TABLE `assignments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `lesson_id` bigint UNSIGNED NULL DEFAULT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `due_date` timestamp NULL DEFAULT NULL,
  `type` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `passmark` double(8, 2) NULL DEFAULT NULL,
  `notify` tinyint(1) NULL DEFAULT NULL,
  `allow_late` tinyint(1) NULL DEFAULT 0,
  `opening_date` timestamp NULL DEFAULT NULL,
  `schedule_type` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `assignments_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `assignments_lesson_id_foreign`(`lesson_id`) USING BTREE,
  INDEX `assignments_admin_id_foreign`(`admin_id`) USING BTREE,
  CONSTRAINT `assignments_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `assignments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `assignments_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of assignments
-- ----------------------------
INSERT INTO `assignments` VALUES (1, '2024-04-26 18:16:14', '2024-04-26 18:19:37', 'Assignment', 1, NULL, 1, '2024-04-27 17:00:00', 'f', '<p>cari bla bla</p>', 50.00, NULL, NULL, '2024-04-26 17:00:00', 'c');

-- ----------------------------
-- Table structure for attendances
-- ----------------------------
DROP TABLE IF EXISTS `attendances`;
CREATE TABLE `attendances`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lesson_id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `attendance_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `attendances_lesson_id_foreign`(`lesson_id`) USING BTREE,
  INDEX `attendances_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `attendances_course_id_foreign`(`course_id`) USING BTREE,
  CONSTRAINT `attendances_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `attendances_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of attendances
-- ----------------------------
INSERT INTO `attendances` VALUES (1, '2024-04-26 00:52:15', '2024-04-26 00:52:15', 1, 3, 1, '2024-04-25 17:00:00');
INSERT INTO `attendances` VALUES (2, '2024-04-29 04:42:07', '2024-04-29 04:42:07', 4, 1, 4, '2024-04-29 00:00:00');
INSERT INTO `attendances` VALUES (3, '2024-04-29 04:43:39', '2024-04-29 04:43:39', 5, 1, 5, '2024-04-29 00:00:00');

-- ----------------------------
-- Table structure for blog_categories
-- ----------------------------
DROP TABLE IF EXISTS `blog_categories`;
CREATE TABLE `blog_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blog_categories
-- ----------------------------

-- ----------------------------
-- Table structure for blog_category_blog_post
-- ----------------------------
DROP TABLE IF EXISTS `blog_category_blog_post`;
CREATE TABLE `blog_category_blog_post`  (
  `blog_category_id` bigint UNSIGNED NOT NULL,
  `blog_post_id` bigint UNSIGNED NOT NULL,
  INDEX `blog_category_blog_post_blog_category_id_foreign`(`blog_category_id`) USING BTREE,
  INDEX `blog_category_blog_post_blog_post_id_foreign`(`blog_post_id`) USING BTREE,
  CONSTRAINT `blog_category_blog_post_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `blog_category_blog_post_blog_post_id_foreign` FOREIGN KEY (`blog_post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blog_category_blog_post
-- ----------------------------

-- ----------------------------
-- Table structure for blog_posts
-- ----------------------------
DROP TABLE IF EXISTS `blog_posts`;
CREATE TABLE `blog_posts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `cover_photo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `publish_date` timestamp NULL DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `meta_title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `meta_description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `admin_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `blog_posts_admin_id_foreign`(`admin_id`) USING BTREE,
  FULLTEXT INDEX `full`(`title`, `content`, `meta_title`, `meta_description`),
  CONSTRAINT `blog_posts_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of blog_posts
-- ----------------------------

-- ----------------------------
-- Table structure for bookmarks
-- ----------------------------
DROP TABLE IF EXISTS `bookmarks`;
CREATE TABLE `bookmarks`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `lecture_page_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `bookmarks_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `bookmarks_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `bookmarks_lecture_page_id_foreign`(`lecture_page_id`) USING BTREE,
  CONSTRAINT `bookmarks_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `bookmarks_lecture_page_id_foreign` FOREIGN KEY (`lecture_page_id`) REFERENCES `lecture_pages` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `bookmarks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of bookmarks
-- ----------------------------

-- ----------------------------
-- Table structure for certificate_lesson
-- ----------------------------
DROP TABLE IF EXISTS `certificate_lesson`;
CREATE TABLE `certificate_lesson`  (
  `certificate_id` bigint UNSIGNED NOT NULL,
  `lesson_id` bigint UNSIGNED NOT NULL,
  INDEX `certificate_lesson_certificate_id_foreign`(`certificate_id`) USING BTREE,
  INDEX `certificate_lesson_lesson_id_foreign`(`lesson_id`) USING BTREE,
  CONSTRAINT `certificate_lesson_certificate_id_foreign` FOREIGN KEY (`certificate_id`) REFERENCES `certificates` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `certificate_lesson_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of certificate_lesson
-- ----------------------------

-- ----------------------------
-- Table structure for certificate_payments
-- ----------------------------
DROP TABLE IF EXISTS `certificate_payments`;
CREATE TABLE `certificate_payments`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `certificate_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `certificate_payments_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `certificate_payments_certificate_id_foreign`(`certificate_id`) USING BTREE,
  CONSTRAINT `certificate_payments_certificate_id_foreign` FOREIGN KEY (`certificate_id`) REFERENCES `certificates` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `certificate_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of certificate_payments
-- ----------------------------

-- ----------------------------
-- Table structure for certificate_test
-- ----------------------------
DROP TABLE IF EXISTS `certificate_test`;
CREATE TABLE `certificate_test`  (
  `certificate_id` bigint UNSIGNED NOT NULL,
  `test_id` bigint UNSIGNED NOT NULL,
  INDEX `certificate_test_certificate_id_foreign`(`certificate_id`) USING BTREE,
  INDEX `certificate_test_test_id_foreign`(`test_id`) USING BTREE,
  CONSTRAINT `certificate_test_certificate_id_foreign` FOREIGN KEY (`certificate_id`) REFERENCES `certificates` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `certificate_test_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of certificate_test
-- ----------------------------

-- ----------------------------
-- Table structure for certificates
-- ----------------------------
DROP TABLE IF EXISTS `certificates`;
CREATE TABLE `certificates`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `orientation` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `any_session` tinyint(1) NULL DEFAULT 0,
  `max_downloads` int NULL DEFAULT NULL,
  `enabled` tinyint(1) NULL DEFAULT 1,
  `payment_required` tinyint(1) NOT NULL DEFAULT 0,
  `price` double NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `certificates_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `certificates_admin_id_foreign`(`admin_id`) USING BTREE,
  CONSTRAINT `certificates_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `certificates_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of certificates
-- ----------------------------

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code_2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code_3` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol_left` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol_right` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 250 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES (1, NULL, NULL, 'Aaland Islands', 'AX', 'ALA', 'Euro', 'EUR', '€', '');
INSERT INTO `countries` VALUES (2, NULL, NULL, 'Afghanistan', 'AF', 'AFG', 'Afghani', 'AFN', '?', '');
INSERT INTO `countries` VALUES (3, NULL, NULL, 'Albania', 'AL', 'ALB', 'Lek', 'ALL', 'L', '');
INSERT INTO `countries` VALUES (4, NULL, NULL, 'Algeria', 'DZ', 'DZA', 'Algerian Dinar', 'DZD', '?.?', '');
INSERT INTO `countries` VALUES (5, NULL, NULL, 'American Samoa', 'AS', 'ASM', 'Euros', 'EUR', '$', '');
INSERT INTO `countries` VALUES (6, NULL, NULL, 'Andorra', 'AD', 'AND', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (7, NULL, NULL, 'Angola', 'AO', 'AGO', 'Angolan kwanza', 'AOA', 'Kz', '');
INSERT INTO `countries` VALUES (8, NULL, NULL, 'Anguilla', 'AI', 'AIA', 'East Caribbean Dollar', 'XCD', '$', '');
INSERT INTO `countries` VALUES (9, NULL, NULL, 'Antarctica', 'AQ', 'ATA', 'Antarctican dollar', 'AQD', '$', '');
INSERT INTO `countries` VALUES (10, NULL, NULL, 'Antigua and Barbuda', 'AG', 'ATG', 'East Caribbean Dollar', 'XCD', '$', '');
INSERT INTO `countries` VALUES (11, NULL, NULL, 'Argentina', 'AR', 'ARG', 'Peso', 'ARS', '$', '');
INSERT INTO `countries` VALUES (12, NULL, NULL, 'Armenia', 'AM', 'ARM', 'Dram', 'AMD', '', '');
INSERT INTO `countries` VALUES (13, NULL, NULL, 'Aruba', 'AW', 'ABW', 'Netherlands Antilles Guilder', 'ANG', 'ƒ', '');
INSERT INTO `countries` VALUES (14, NULL, NULL, 'Australia', 'AU', 'AUS', 'Australian Dollars', 'AUD', '$', '');
INSERT INTO `countries` VALUES (15, NULL, NULL, 'Austria', 'AT', 'AUT', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (16, NULL, NULL, 'Azerbaijan', 'AZ', 'AZE', 'Manat', 'AZN', '', '');
INSERT INTO `countries` VALUES (17, NULL, NULL, 'Bahamas', 'BS', 'BHS', 'Bahamian Dollar', 'BSD', '$', '');
INSERT INTO `countries` VALUES (18, NULL, NULL, 'Bahrain', 'BH', 'BHR', 'Bahraini Dinar', 'BHD', '.?.?', '');
INSERT INTO `countries` VALUES (19, NULL, NULL, 'Bangladesh', 'BD', 'BGD', 'Taka', 'BDT', '?', '');
INSERT INTO `countries` VALUES (20, NULL, NULL, 'Barbados', 'BB', 'BRB', 'Barbadian Dollar', 'BBD', '$', '');
INSERT INTO `countries` VALUES (21, NULL, NULL, 'Belarus', 'BY', 'BLR', 'Belarus Ruble', 'BYR', 'Br', '');
INSERT INTO `countries` VALUES (22, NULL, NULL, 'Belgium', 'BE', 'BEL', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (23, NULL, NULL, 'Belize', 'BZ', 'BLZ', 'Belizean Dollar', 'BZD', '$', '');
INSERT INTO `countries` VALUES (24, NULL, NULL, 'Benin', 'BJ', 'BEN', 'CFA Franc BCEAO', 'XOF', 'Fr', '');
INSERT INTO `countries` VALUES (25, NULL, NULL, 'Bermuda', 'BM', 'BMU', 'Bermudian Dollar', 'BMD', '$', '');
INSERT INTO `countries` VALUES (26, NULL, NULL, 'Bhutan', 'BT', 'BTN', 'Indian Rupee', 'INR', '₹', '');
INSERT INTO `countries` VALUES (27, NULL, NULL, 'Bolivia', 'BO', 'BOL', 'Boliviano', 'BOB', 'Bs.', '');
INSERT INTO `countries` VALUES (28, NULL, NULL, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (29, NULL, NULL, 'Bosnia and Herzegovina', 'BA', 'BIH', 'Bosnia and Herzegovina convertible mark', 'BAM', '', '');
INSERT INTO `countries` VALUES (30, NULL, NULL, 'Botswana', 'BW', 'BWA', 'Pula', 'BWP', 'P', '');
INSERT INTO `countries` VALUES (31, NULL, NULL, 'Bouvet Island', 'BV', 'BVT', 'Norwegian Krone', 'NOK', 'kr', '');
INSERT INTO `countries` VALUES (32, NULL, NULL, 'Brazil', 'BR', 'BRA', 'Brazil', 'BRL', 'R$', '');
INSERT INTO `countries` VALUES (33, NULL, NULL, 'British Indian Ocean Territory', 'IO', 'IOT', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (34, NULL, NULL, 'Brunei Darussalam', 'BN', 'BRN', 'Bruneian Dollar', 'BND', '$', '');
INSERT INTO `countries` VALUES (35, NULL, NULL, 'Bulgaria', 'BG', 'BGR', 'Lev', 'BGN', '??', '');
INSERT INTO `countries` VALUES (36, NULL, NULL, 'Burkina Faso', 'BF', 'BFA', 'CFA Franc BCEAO', 'XOF', 'Fr', '');
INSERT INTO `countries` VALUES (37, NULL, NULL, 'Burundi', 'BI', 'BDI', 'Burundi Franc', 'BIF', 'Fr', '');
INSERT INTO `countries` VALUES (38, NULL, NULL, 'Cambodia', 'KH', 'KHM', 'Riel', 'KHR', '?', '');
INSERT INTO `countries` VALUES (39, NULL, NULL, 'Cameroon', 'CM', 'CMR', 'CFA Franc BEAC', 'XAF', 'Fr', '');
INSERT INTO `countries` VALUES (40, NULL, NULL, 'Canada', 'CA', 'CAN', 'Canadian Dollar', 'CAD', '$', '');
INSERT INTO `countries` VALUES (41, NULL, NULL, 'Canary Islands', 'IC', 'ICA', 'Euro', 'EUR', '', '');
INSERT INTO `countries` VALUES (42, NULL, NULL, 'Cape Verde', 'CV', 'CPV', 'Escudo', 'CVE', 'Esc', '');
INSERT INTO `countries` VALUES (43, NULL, NULL, 'Cayman Islands', 'KY', 'CYM', 'Caymanian Dollar', 'KYD', '$', '');
INSERT INTO `countries` VALUES (44, NULL, NULL, 'Central African Republic', 'CF', 'CAF', 'CFA Franc BEAC', 'XAF', 'Fr', '');
INSERT INTO `countries` VALUES (45, NULL, NULL, 'Chad', 'TD', 'TCD', 'CFA Franc BEAC', 'XAF', 'Fr', '');
INSERT INTO `countries` VALUES (46, NULL, NULL, 'Chile', 'CL', 'CHL', 'Chilean Peso', 'CLP', '$', '');
INSERT INTO `countries` VALUES (47, NULL, NULL, 'China', 'CN', 'CHN', 'Yuan Renminbi', 'CNY', '¥', '');
INSERT INTO `countries` VALUES (48, NULL, NULL, 'Christmas Island', 'CX', 'CXR', 'Australian Dollars', 'AUD', '$', '');
INSERT INTO `countries` VALUES (49, NULL, NULL, 'Cocos (Keeling) Islands', 'CC', 'CCK', 'Australian Dollars', 'AUD', '$', '');
INSERT INTO `countries` VALUES (50, NULL, NULL, 'Colombia', 'CO', 'COL', 'Peso', 'COP', '$', '');
INSERT INTO `countries` VALUES (51, NULL, NULL, 'Comoros', 'KM', 'COM', 'Comoran Franc', 'KMF', 'Fr', '');
INSERT INTO `countries` VALUES (52, NULL, NULL, 'Congo', 'CG', 'COG', 'CFA Franc BEAC', 'XAF', 'Fr', '');
INSERT INTO `countries` VALUES (53, NULL, NULL, 'Cook Islands', 'CK', 'COK', 'New Zealand Dollars', 'NZD', '$', '');
INSERT INTO `countries` VALUES (54, NULL, NULL, 'Costa Rica', 'CR', 'CRI', 'Costa Rican Colon', 'CRC', '?', '');
INSERT INTO `countries` VALUES (55, NULL, NULL, 'Cote D\'Ivoire', 'CI', 'CIV', 'CFA Franc BCEAO', 'XOF', 'Fr', '');
INSERT INTO `countries` VALUES (56, NULL, NULL, 'Croatia', 'HR', 'HRV', 'Croatian Dinar', 'HRK', 'kn', '');
INSERT INTO `countries` VALUES (57, NULL, NULL, 'Cuba', 'CU', 'CUB', 'Cuban Peso', 'CUP', '$', '');
INSERT INTO `countries` VALUES (58, NULL, NULL, 'Curacao', 'CW', 'CUW', 'Netherlands Antillean guilder', 'NAF', 'ƒ', '');
INSERT INTO `countries` VALUES (59, NULL, NULL, 'Cyprus', 'CY', 'CYP', 'Cypriot Pound', 'CYP', '€', '');
INSERT INTO `countries` VALUES (60, NULL, NULL, 'Czech Republic', 'CZ', 'CZE', 'Koruna', 'CZK', 'K?', '');
INSERT INTO `countries` VALUES (61, NULL, NULL, 'Democratic Republic of Congo', 'CD', 'COD', 'Congolese Frank', 'CDF', 'Fr', '');
INSERT INTO `countries` VALUES (62, NULL, NULL, 'Denmark', 'DK', 'DNK', 'Danish Krone', 'DKK', 'kr', '');
INSERT INTO `countries` VALUES (63, NULL, NULL, 'Djibouti', 'DJ', 'DJI', 'Djiboutian Franc', 'DJF', 'Fr', '');
INSERT INTO `countries` VALUES (64, NULL, NULL, 'Dominica', 'DM', 'DMA', 'East Caribbean Dollar', 'XCD', '$', '');
INSERT INTO `countries` VALUES (65, NULL, NULL, 'Dominican Republic', 'DO', 'DOM', 'Dominican Peso', 'DOP', '$', '');
INSERT INTO `countries` VALUES (66, NULL, NULL, 'East Timor', 'TL', 'TLS', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (67, NULL, NULL, 'Ecuador', 'EC', 'ECU', 'Sucre', 'ECS', '$', '');
INSERT INTO `countries` VALUES (68, NULL, NULL, 'Egypt', 'EG', 'EGY', 'Egyptian Pound', 'EGP', '£', '');
INSERT INTO `countries` VALUES (69, NULL, NULL, 'El Salvador', 'SV', 'SLV', 'Salvadoran Colon', 'SVC', '$', '');
INSERT INTO `countries` VALUES (70, NULL, NULL, 'Equatorial Guinea', 'GQ', 'GNQ', 'CFA Franc BEAC', 'XAF', 'Fr', '');
INSERT INTO `countries` VALUES (71, NULL, NULL, 'Eritrea', 'ER', 'ERI', 'Ethiopian Birr', 'ETB', 'Nfk', '');
INSERT INTO `countries` VALUES (72, NULL, NULL, 'Estonia', 'EE', 'EST', 'Estonian Kroon', 'EEK', '€', '');
INSERT INTO `countries` VALUES (73, NULL, NULL, 'Ethiopia', 'ET', 'ETH', 'Ethiopian Birr', 'ETB', 'Br', '');
INSERT INTO `countries` VALUES (74, NULL, NULL, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 'Falkland Pound', 'FKP', '£', '');
INSERT INTO `countries` VALUES (75, NULL, NULL, 'Faroe Islands', 'FO', 'FRO', 'Danish Krone', 'DKK', 'kr', '');
INSERT INTO `countries` VALUES (76, NULL, NULL, 'Fiji', 'FJ', 'FJI', 'Fijian Dollar', 'FJD', '$', '');
INSERT INTO `countries` VALUES (77, NULL, NULL, 'Finland', 'FI', 'FIN', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (78, NULL, NULL, 'France, Metropolitan', 'FR', 'FRA', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (79, NULL, NULL, 'French Guiana', 'GF', 'GUF', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (80, NULL, NULL, 'French Polynesia', 'PF', 'PYF', 'CFP Franc', 'XPF', 'Fr', '');
INSERT INTO `countries` VALUES (81, NULL, NULL, 'French Southern Territories', 'TF', 'ATF', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (82, NULL, NULL, 'FYROM', 'MK', 'MKD', 'Denar', 'MKD', '???', '');
INSERT INTO `countries` VALUES (83, NULL, NULL, 'Gabon', 'GA', 'GAB', 'CFA Franc BEAC', 'XAF', 'Fr', '');
INSERT INTO `countries` VALUES (84, NULL, NULL, 'Gambia', 'GM', 'GMB', 'Dalasi', 'GMD', 'D', '');
INSERT INTO `countries` VALUES (85, NULL, NULL, 'Georgia', 'GE', 'GEO', 'Lari', 'GEL', '?', '');
INSERT INTO `countries` VALUES (86, NULL, NULL, 'Germany', 'DE', 'DEU', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (87, NULL, NULL, 'Ghana', 'GH', 'GHA', 'Ghana cedi', 'GHS', 'GH¢', '');
INSERT INTO `countries` VALUES (88, NULL, NULL, 'Gibraltar', 'GI', 'GIB', 'Gibraltar Pound', 'GIP', '£', '');
INSERT INTO `countries` VALUES (89, NULL, NULL, 'Greece', 'GR', 'GRC', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (90, NULL, NULL, 'Greenland', 'GL', 'GRL', 'Danish Krone', 'DKK', 'kr', '');
INSERT INTO `countries` VALUES (91, NULL, NULL, 'Grenada', 'GD', 'GRD', 'East Caribbean Dollar', 'XCD', '$', '');
INSERT INTO `countries` VALUES (92, NULL, NULL, 'Guadeloupe', 'GP', 'GLP', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (93, NULL, NULL, 'Guam', 'GU', 'GUM', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (94, NULL, NULL, 'Guatemala', 'GT', 'GTM', 'Quetzal', 'GTQ', 'Q', '');
INSERT INTO `countries` VALUES (95, NULL, NULL, 'Guernsey', 'GG', 'GGY', 'Guernsey pound', 'GGP', '£', '');
INSERT INTO `countries` VALUES (96, NULL, NULL, 'Guinea', 'GN', 'GIN', 'Guinean Franc', 'GNF', 'Fr', '');
INSERT INTO `countries` VALUES (97, NULL, NULL, 'Guinea-Bissau', 'GW', 'GNB', 'CFA Franc BCEAO', 'XOF', 'Fr', '');
INSERT INTO `countries` VALUES (98, NULL, NULL, 'Guyana', 'GY', 'GUY', 'Guyanaese Dollar', 'GYD', '$', '');
INSERT INTO `countries` VALUES (99, NULL, NULL, 'Haiti', 'HT', 'HTI', 'Gourde', 'HTG', 'G', '');
INSERT INTO `countries` VALUES (100, NULL, NULL, 'Heard and Mc Donald Islands', 'HM', 'HMD', 'Australian Dollars', 'AUD', '$', '');
INSERT INTO `countries` VALUES (101, NULL, NULL, 'Honduras', 'HN', 'HND', 'Lempira', 'HNL', 'L', '');
INSERT INTO `countries` VALUES (102, NULL, NULL, 'Hong Kong', 'HK', 'HKG', 'HKD', 'HKD', '$', '');
INSERT INTO `countries` VALUES (103, NULL, NULL, 'Hungary', 'HU', 'HUN', 'Forint', 'HUF', 'Ft', '');
INSERT INTO `countries` VALUES (104, NULL, NULL, 'Iceland', 'IS', 'ISL', 'Icelandic Krona', 'ISK', 'kr', '');
INSERT INTO `countries` VALUES (105, NULL, NULL, 'India', 'IN', 'IND', 'Indian Rupee', 'INR', '₹', '');
INSERT INTO `countries` VALUES (106, NULL, NULL, 'Indonesia', 'ID', 'IDN', 'Indonesian Rupiah', 'IDR', 'Rp', '');
INSERT INTO `countries` VALUES (107, NULL, NULL, 'Iran (Islamic Republic of)', 'IR', 'IRN', 'Iranian Rial', 'IRR', '?', '');
INSERT INTO `countries` VALUES (108, NULL, NULL, 'Iraq', 'IQ', 'IRQ', 'Iraqi Dinar', 'IQD', '?.?', '');
INSERT INTO `countries` VALUES (109, NULL, NULL, 'Ireland', 'IE', 'IRL', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (110, NULL, NULL, 'Israel', 'IL', 'ISR', 'Shekel', 'ILS', '?', '');
INSERT INTO `countries` VALUES (111, NULL, NULL, 'Italy', 'IT', 'ITA', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (112, NULL, NULL, 'Jamaica', 'JM', 'JAM', 'Jamaican Dollar', 'JMD', '$', '');
INSERT INTO `countries` VALUES (113, NULL, NULL, 'Japan', 'JP', 'JPN', 'Japanese Yen', 'JPY', '¥', '');
INSERT INTO `countries` VALUES (114, NULL, NULL, 'Jersey', 'JE', 'JEY', 'Pound Sterling', 'GBP', '£', '');
INSERT INTO `countries` VALUES (115, NULL, NULL, 'Jordan', 'JO', 'JOR', 'Jordanian Dinar', 'JOD', '?.?', '');
INSERT INTO `countries` VALUES (116, NULL, NULL, 'Kazakhstan', 'KZ', 'KAZ', 'Tenge', 'KZT', '', '');
INSERT INTO `countries` VALUES (117, NULL, NULL, 'Kenya', 'KE', 'KEN', 'Kenyan Shilling', 'KES', 'Sh', '');
INSERT INTO `countries` VALUES (118, NULL, NULL, 'Kiribati', 'KI', 'KIR', 'Australian Dollars', 'AUD', '$', '');
INSERT INTO `countries` VALUES (119, NULL, NULL, 'Korea, Republic of', 'KR', 'KOR', 'Won', 'KRW', '?', '');
INSERT INTO `countries` VALUES (120, NULL, NULL, 'Kuwait', 'KW', 'KWT', 'Kuwaiti Dinar', 'KWD', '?.?', '');
INSERT INTO `countries` VALUES (121, NULL, NULL, 'Kyrgyzstan', 'KG', 'KGZ', 'Som', 'KGS', '?', '');
INSERT INTO `countries` VALUES (122, NULL, NULL, 'Lao People\'s Democratic Republic', 'LA', 'LAO', 'Kip', 'LAK', '?', '');
INSERT INTO `countries` VALUES (123, NULL, NULL, 'Latvia', 'LV', 'LVA', 'Lat', 'LVL', '€', '');
INSERT INTO `countries` VALUES (124, NULL, NULL, 'Lebanon', 'LB', 'LBN', 'Lebanese Pound', 'LBP', '?.?', '');
INSERT INTO `countries` VALUES (125, NULL, NULL, 'Lesotho', 'LS', 'LSO', 'Loti', 'LSL', 'L', '');
INSERT INTO `countries` VALUES (126, NULL, NULL, 'Liberia', 'LR', 'LBR', 'Liberian Dollar', 'LRD', '$', '');
INSERT INTO `countries` VALUES (127, NULL, NULL, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 'Libyan Dinar', 'LYD', '?.?', '');
INSERT INTO `countries` VALUES (128, NULL, NULL, 'Liechtenstein', 'LI', 'LIE', 'Swiss Franc', 'CHF', 'Fr', '');
INSERT INTO `countries` VALUES (129, NULL, NULL, 'Lithuania', 'LT', 'LTU', 'Lita', 'LTL', '€', '');
INSERT INTO `countries` VALUES (130, NULL, NULL, 'Luxembourg', 'LU', 'LUX', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (131, NULL, NULL, 'Macau', 'MO', 'MAC', 'Pataca', 'MOP', 'P', '');
INSERT INTO `countries` VALUES (132, NULL, NULL, 'Madagascar', 'MG', 'MDG', 'Malagasy Franc', 'MGA', 'Ar', '');
INSERT INTO `countries` VALUES (133, NULL, NULL, 'Malawi', 'MW', 'MWI', 'Malawian Kwacha', 'MWK', 'MK', '');
INSERT INTO `countries` VALUES (134, NULL, NULL, 'Malaysia', 'MY', 'MYS', 'Ringgit', 'MYR', 'RM', '');
INSERT INTO `countries` VALUES (135, NULL, NULL, 'Maldives', 'MV', 'MDV', 'Rufiyaa', 'MVR', '.?', '');
INSERT INTO `countries` VALUES (136, NULL, NULL, 'Mali', 'ML', 'MLI', 'CFA Franc BCEAO', 'XOF', 'Fr', '');
INSERT INTO `countries` VALUES (137, NULL, NULL, 'Malta', 'MT', 'MLT', 'Maltese Lira', 'MTL', '€', '');
INSERT INTO `countries` VALUES (138, NULL, NULL, 'Marshall Islands', 'MH', 'MHL', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (139, NULL, NULL, 'Martinique', 'MQ', 'MTQ', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (140, NULL, NULL, 'Mauritania', 'MR', 'MRT', 'Ouguiya', 'MRO', 'UM', '');
INSERT INTO `countries` VALUES (141, NULL, NULL, 'Mauritius', 'MU', 'MUS', 'Mauritian Rupee', 'MUR', '?', '');
INSERT INTO `countries` VALUES (142, NULL, NULL, 'Mayotte', 'YT', 'MYT', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (143, NULL, NULL, 'Mexico', 'MX', 'MEX', 'Peso', 'MXN', '$', '');
INSERT INTO `countries` VALUES (144, NULL, NULL, 'Micronesia, Federated States of', 'FM', 'FSM', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (145, NULL, NULL, 'Moldova, Republic of', 'MD', 'MDA', 'Leu', 'MDL', 'L', '');
INSERT INTO `countries` VALUES (146, NULL, NULL, 'Monaco', 'MC', 'MCO', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (147, NULL, NULL, 'Mongolia', 'MN', 'MNG', 'Tugrik', 'MNT', '?', '');
INSERT INTO `countries` VALUES (148, NULL, NULL, 'Montenegro', 'ME', 'MNE', 'Euro', 'EUR', '€', '');
INSERT INTO `countries` VALUES (149, NULL, NULL, 'Montserrat', 'MS', 'MSR', 'East Caribbean Dollar', 'XCD', '$', '');
INSERT INTO `countries` VALUES (150, NULL, NULL, 'Morocco', 'MA', 'MAR', 'Dirham', 'MAD', '?.?.', '');
INSERT INTO `countries` VALUES (151, NULL, NULL, 'Mozambique', 'MZ', 'MOZ', 'Metical', 'MZN', 'MT', '');
INSERT INTO `countries` VALUES (152, NULL, NULL, 'Myanmar', 'MM', 'MMR', 'Kyat', 'MMK', 'Ks', '');
INSERT INTO `countries` VALUES (153, NULL, NULL, 'Namibia', 'NA', 'NAM', 'Dollar', 'NAD', '$', '');
INSERT INTO `countries` VALUES (154, NULL, NULL, 'Nauru', 'NR', 'NRU', 'Australian Dollars', 'AUD', '$', '');
INSERT INTO `countries` VALUES (155, NULL, NULL, 'Nepal', 'NP', 'NPL', 'Nepalese Rupee', 'NPR', '?', '');
INSERT INTO `countries` VALUES (156, NULL, NULL, 'Netherlands', 'NL', 'NLD', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (157, NULL, NULL, 'Netherlands Antilles', 'AN', 'ANT', 'Netherlands Antilles Guilder', 'ANG', '', '');
INSERT INTO `countries` VALUES (158, NULL, NULL, 'New Caledonia', 'NC', 'NCL', 'CFP Franc', 'XPF', 'Fr', '');
INSERT INTO `countries` VALUES (159, NULL, NULL, 'New Zealand', 'NZ', 'NZL', 'New Zealand Dollars', 'NZD', '$', '');
INSERT INTO `countries` VALUES (160, NULL, NULL, 'Nicaragua', 'NI', 'NIC', 'Cordoba Oro', 'NIO', 'C$', '');
INSERT INTO `countries` VALUES (161, NULL, NULL, 'Niger', 'NE', 'NER', 'CFA Franc BCEAO', 'XOF', 'Fr', '');
INSERT INTO `countries` VALUES (162, NULL, NULL, 'Nigeria', 'NG', 'NGA', 'Naira', 'NGN', '₦', '');
INSERT INTO `countries` VALUES (163, NULL, NULL, 'Niue', 'NU', 'NIU', 'New Zealand Dollars', 'NZD', '$', '');
INSERT INTO `countries` VALUES (164, NULL, NULL, 'Norfolk Island', 'NF', 'NFK', 'Australian Dollars', 'AUD', '$', '');
INSERT INTO `countries` VALUES (165, NULL, NULL, 'North Korea', 'KP', 'PRK', 'Won', 'KPW', '?', '');
INSERT INTO `countries` VALUES (166, NULL, NULL, 'Northern Mariana Islands', 'MP', 'MNP', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (167, NULL, NULL, 'Norway', 'NO', 'NOR', 'Norwegian Krone', 'NOK', 'kr', '');
INSERT INTO `countries` VALUES (168, NULL, NULL, 'Oman', 'OM', 'OMN', 'Sul Rial', 'OMR', '?.?.', '');
INSERT INTO `countries` VALUES (169, NULL, NULL, 'Pakistan', 'PK', 'PAK', 'Rupee', 'PKR', '?', '');
INSERT INTO `countries` VALUES (170, NULL, NULL, 'Palau', 'PW', 'PLW', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (171, NULL, NULL, 'Palestinian Territory, Occupied', 'PS', 'PSE', 'Jordanian dinar', 'JOD', '?', '');
INSERT INTO `countries` VALUES (172, NULL, NULL, 'Panama', 'PA', 'PAN', 'Balboa', 'PAB', 'B/.', '');
INSERT INTO `countries` VALUES (173, NULL, NULL, 'Papua New Guinea', 'PG', 'PNG', 'Kina', 'PGK', 'K', '');
INSERT INTO `countries` VALUES (174, NULL, NULL, 'Paraguay', 'PY', 'PRY', 'Guarani', 'PYG', '?', '');
INSERT INTO `countries` VALUES (175, NULL, NULL, 'Peru', 'PE', 'PER', 'Nuevo Sol', 'PEN', 'S/.', '');
INSERT INTO `countries` VALUES (176, NULL, NULL, 'Philippines', 'PH', 'PHL', 'Peso', 'PHP', '?', '');
INSERT INTO `countries` VALUES (177, NULL, NULL, 'Pitcairn', 'PN', 'PCN', 'New Zealand Dollars', 'NZD', '$', '');
INSERT INTO `countries` VALUES (178, NULL, NULL, 'Poland', 'PL', 'POL', 'Zloty', 'PLN', 'z?', '');
INSERT INTO `countries` VALUES (179, NULL, NULL, 'Portugal', 'PT', 'PRT', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (180, NULL, NULL, 'Puerto Rico', 'PR', 'PRI', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (181, NULL, NULL, 'Qatar', 'QA', 'QAT', 'Rial', 'QAR', '?.?', '');
INSERT INTO `countries` VALUES (182, NULL, NULL, 'Reunion', 'RE', 'REU', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (183, NULL, NULL, 'Romania', 'RO', 'ROM', 'Leu', 'RON', 'lei', '');
INSERT INTO `countries` VALUES (184, NULL, NULL, 'Russian Federation', 'RU', 'RUS', 'Ruble', 'RUB', '?', '');
INSERT INTO `countries` VALUES (185, NULL, NULL, 'Rwanda', 'RW', 'RWA', 'Rwanda Franc', 'RWF', 'Fr', '');
INSERT INTO `countries` VALUES (186, NULL, NULL, 'Saint Kitts and Nevis', 'KN', 'KNA', 'East Caribbean Dollar', 'XCD', '$', '');
INSERT INTO `countries` VALUES (187, NULL, NULL, 'Saint Lucia', 'LC', 'LCA', 'East Caribbean Dollar', 'XCD', '$', '');
INSERT INTO `countries` VALUES (188, NULL, NULL, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 'East Caribbean Dollar', 'XCD', '$', '');
INSERT INTO `countries` VALUES (189, NULL, NULL, 'Samoa', 'WS', 'WSM', 'Euros', 'EUR', 'T', '');
INSERT INTO `countries` VALUES (190, NULL, NULL, 'San Marino', 'SM', 'SMR', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (191, NULL, NULL, 'Sao Tome and Principe', 'ST', 'STP', 'Dobra', 'STD', 'Db', '');
INSERT INTO `countries` VALUES (192, NULL, NULL, 'Saudi Arabia', 'SA', 'SAU', 'Riyal', 'SAR', '?.?', '');
INSERT INTO `countries` VALUES (193, NULL, NULL, 'Senegal', 'SN', 'SEN', 'CFA Franc BCEAO', 'XOF', 'Fr', '');
INSERT INTO `countries` VALUES (194, NULL, NULL, 'Serbia', 'RS', 'SRB', 'Serbian dinar', 'RSD', '???.', '');
INSERT INTO `countries` VALUES (195, NULL, NULL, 'Seychelles', 'SC', 'SYC', 'Rupee', 'SCR', '?', '');
INSERT INTO `countries` VALUES (196, NULL, NULL, 'Sierra Leone', 'SL', 'SLE', 'Leone', 'SLL', 'Le', '');
INSERT INTO `countries` VALUES (197, NULL, NULL, 'Singapore', 'SG', 'SGP', 'Dollar', 'SGD', '$', '');
INSERT INTO `countries` VALUES (198, NULL, NULL, 'Slovak Republic', 'SK', 'SVK', 'Koruna', 'SKK', '€', '');
INSERT INTO `countries` VALUES (199, NULL, NULL, 'Slovenia', 'SI', 'SVN', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (200, NULL, NULL, 'Solomon Islands', 'SB', 'SLB', 'Solomon Islands Dollar', 'SBD', '$', '');
INSERT INTO `countries` VALUES (201, NULL, NULL, 'Somalia', 'SO', 'SOM', 'Shilling', 'SOS', 'Sh', '');
INSERT INTO `countries` VALUES (202, NULL, NULL, 'South Africa', 'ZA', 'ZAF', 'Rand', 'ZAR', 'R', '');
INSERT INTO `countries` VALUES (203, NULL, NULL, 'South Georgia & South Sandwich Islands', 'GS', 'SGS', 'Pound Sterling', 'GBP', '£', '');
INSERT INTO `countries` VALUES (204, NULL, NULL, 'South Sudan', 'SS', 'SSD', 'South Sudanese Pound', 'SSP', '£', '');
INSERT INTO `countries` VALUES (205, NULL, NULL, 'Spain', 'ES', 'ESP', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (206, NULL, NULL, 'Sri Lanka', 'LK', 'LKA', 'Rupee', 'LKR', 'Rs', '');
INSERT INTO `countries` VALUES (207, NULL, NULL, 'St. Barthelemy', 'BL', 'BLM', 'Euro', 'EUR', '€', '');
INSERT INTO `countries` VALUES (208, NULL, NULL, 'St. Helena', 'SH', 'SHN', 'Pound Sterling', 'GBP', '£', '');
INSERT INTO `countries` VALUES (209, NULL, NULL, 'St. Martin (French part)', 'MF', 'MAF', 'Netherlands Antillean guilder', 'ANG', '€', '');
INSERT INTO `countries` VALUES (210, NULL, NULL, 'St. Pierre and Miquelon', 'PM', 'SPM', 'Euro', 'EUR', '€', '');
INSERT INTO `countries` VALUES (211, NULL, NULL, 'Sudan', 'SD', 'SDN', 'Dinar', 'SDG', '?.?.', '');
INSERT INTO `countries` VALUES (212, NULL, NULL, 'Suriname', 'SR', 'SUR', 'Surinamese Guilder', 'SRD', '$', '');
INSERT INTO `countries` VALUES (213, NULL, NULL, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 'Norwegian Krone', 'NOK', 'kr', '');
INSERT INTO `countries` VALUES (214, NULL, NULL, 'Swaziland', 'SZ', 'SWZ', 'Lilangeni', 'SZL', 'L', '');
INSERT INTO `countries` VALUES (215, NULL, NULL, 'Sweden', 'SE', 'SWE', 'Krona', 'SEK', 'kr', '');
INSERT INTO `countries` VALUES (216, NULL, NULL, 'Switzerland', 'CH', 'CHE', 'Swiss Franc', 'CHF', 'Fr', '');
INSERT INTO `countries` VALUES (217, NULL, NULL, 'Syrian Arab Republic', 'SY', 'SYR', 'Syrian Pound', 'SYP', '£', '');
INSERT INTO `countries` VALUES (218, NULL, NULL, 'Taiwan', 'TW', 'TWN', 'Dollar', 'TWD', '$', '');
INSERT INTO `countries` VALUES (219, NULL, NULL, 'Tajikistan', 'TJ', 'TJK', 'Tajikistan Ruble', 'TJS', '??', '');
INSERT INTO `countries` VALUES (220, NULL, NULL, 'Tanzania, United Republic of', 'TZ', 'TZA', 'Shilling', 'TZS', 'Sh', '');
INSERT INTO `countries` VALUES (221, NULL, NULL, 'Thailand', 'TH', 'THA', 'Baht', 'THB', '?', '');
INSERT INTO `countries` VALUES (222, NULL, NULL, 'Togo', 'TG', 'TGO', 'CFA Franc BCEAO', 'XOF', 'Fr', '');
INSERT INTO `countries` VALUES (223, NULL, NULL, 'Tokelau', 'TK', 'TKL', 'New Zealand Dollars', 'NZD', '$', '');
INSERT INTO `countries` VALUES (224, NULL, NULL, 'Tonga', 'TO', 'TON', 'PaÕanga', 'TOP', 'T$', '');
INSERT INTO `countries` VALUES (225, NULL, NULL, 'Trinidad and Tobago', 'TT', 'TTO', 'Trinidad and Tobago Dollar', 'TTD', '$', '');
INSERT INTO `countries` VALUES (226, NULL, NULL, 'Tunisia', 'TN', 'TUN', 'Tunisian Dinar', 'TND', '?.?', '');
INSERT INTO `countries` VALUES (227, NULL, NULL, 'Turkey', 'TR', 'TUR', 'Lira', 'TRY', '', '');
INSERT INTO `countries` VALUES (228, NULL, NULL, 'Turkmenistan', 'TM', 'TKM', 'Manat', 'TMT', 'm', '');
INSERT INTO `countries` VALUES (229, NULL, NULL, 'Turks and Caicos Islands', 'TC', 'TCA', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (230, NULL, NULL, 'Tuvalu', 'TV', 'TUV', 'Australian Dollars', 'AUD', '$', '');
INSERT INTO `countries` VALUES (231, NULL, NULL, 'Uganda', 'UG', 'UGA', 'Shilling', 'UGX', 'Sh', '');
INSERT INTO `countries` VALUES (232, NULL, NULL, 'Ukraine', 'UA', 'UKR', 'Hryvnia', 'UAH', '?', '');
INSERT INTO `countries` VALUES (233, NULL, NULL, 'United Arab Emirates', 'AE', 'ARE', 'Dirham', 'AED', '?.?', '');
INSERT INTO `countries` VALUES (234, NULL, NULL, 'United Kingdom', 'GB', 'GBR', 'Pound Sterling', 'GBP', '£', '');
INSERT INTO `countries` VALUES (235, NULL, NULL, 'United States', 'US', 'USA', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (236, NULL, NULL, 'United States Minor Outlying Islands', 'UM', 'UMI', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (237, NULL, NULL, 'Uruguay', 'UY', 'URY', 'Peso', 'UYU', '$', '');
INSERT INTO `countries` VALUES (238, NULL, NULL, 'Uzbekistan', 'UZ', 'UZB', 'Som', 'UZS', '', '');
INSERT INTO `countries` VALUES (239, NULL, NULL, 'Vanuatu', 'VU', 'VUT', 'Vatu', 'VUV', 'Vt', '');
INSERT INTO `countries` VALUES (240, NULL, NULL, 'Vatican City State (Holy See)', 'VA', 'VAT', 'Euros', 'EUR', '€', '');
INSERT INTO `countries` VALUES (241, NULL, NULL, 'Venezuela', 'VE', 'VEN', 'Bolivar', 'VEF', 'Bs F', '');
INSERT INTO `countries` VALUES (242, NULL, NULL, 'Viet Nam', 'VN', 'VNM', 'Dong', 'VND', '?', '');
INSERT INTO `countries` VALUES (243, NULL, NULL, 'Virgin Islands (British)', 'VG', 'VGB', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (244, NULL, NULL, 'Virgin Islands (U.S.)', 'VI', 'VIR', 'United States Dollar', 'USD', '$', '');
INSERT INTO `countries` VALUES (245, NULL, NULL, 'Wallis and Futuna Islands', 'WF', 'WLF', 'CFP Franc', 'XPF', 'Fr', '');
INSERT INTO `countries` VALUES (246, NULL, NULL, 'Western Sahara', 'EH', 'ESH', 'Dirham', 'MAD', '?.?.', '');
INSERT INTO `countries` VALUES (247, NULL, NULL, 'Yemen', 'YE', 'YEM', 'Rial', 'YER', '?', '');
INSERT INTO `countries` VALUES (248, NULL, NULL, 'Zambia', 'ZM', 'ZMB', 'Kwacha', 'ZMK', 'ZK', '');
INSERT INTO `countries` VALUES (249, NULL, NULL, 'Zimbabwe', 'ZW', 'ZWE', 'Zimbabwe Dollar', 'ZWD', 'P', '');

-- ----------------------------
-- Table structure for coupon_course
-- ----------------------------
DROP TABLE IF EXISTS `coupon_course`;
CREATE TABLE `coupon_course`  (
  `coupon_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  INDEX `coupon_course_coupon_id_foreign`(`coupon_id`) USING BTREE,
  INDEX `coupon_course_course_id_foreign`(`course_id`) USING BTREE,
  CONSTRAINT `coupon_course_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `coupon_course_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of coupon_course
-- ----------------------------

-- ----------------------------
-- Table structure for coupon_course_category
-- ----------------------------
DROP TABLE IF EXISTS `coupon_course_category`;
CREATE TABLE `coupon_course_category`  (
  `coupon_id` bigint UNSIGNED NOT NULL,
  `course_category_id` bigint UNSIGNED NOT NULL,
  INDEX `coupon_course_category_coupon_id_foreign`(`coupon_id`) USING BTREE,
  INDEX `coupon_course_category_course_category_id_foreign`(`course_category_id`) USING BTREE,
  CONSTRAINT `coupon_course_category_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `coupon_course_category_course_category_id_foreign` FOREIGN KEY (`course_category_id`) REFERENCES `course_categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of coupon_course_category
-- ----------------------------

-- ----------------------------
-- Table structure for coupon_invoice
-- ----------------------------
DROP TABLE IF EXISTS `coupon_invoice`;
CREATE TABLE `coupon_invoice`  (
  `coupon_id` bigint UNSIGNED NOT NULL,
  `invoice_id` bigint UNSIGNED NOT NULL,
  INDEX `coupon_invoice_coupon_id_foreign`(`coupon_id`) USING BTREE,
  INDEX `coupon_invoice_invoice_id_foreign`(`invoice_id`) USING BTREE,
  CONSTRAINT `coupon_invoice_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `coupon_invoice_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of coupon_invoice
-- ----------------------------

-- ----------------------------
-- Table structure for coupons
-- ----------------------------
DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` int NOT NULL,
  `expires_on` timestamp NULL DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double NULL DEFAULT NULL,
  `date_start` timestamp NULL DEFAULT NULL,
  `uses_total` int NULL DEFAULT NULL,
  `uses_customer` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of coupons
-- ----------------------------

-- ----------------------------
-- Table structure for course_categories
-- ----------------------------
DROP TABLE IF EXISTS `course_categories`;
CREATE TABLE `course_categories`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `sort_order` int NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `parent_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `course_categories_parent_id_foreign`(`parent_id`) USING BTREE,
  CONSTRAINT `course_categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `course_categories` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_categories
-- ----------------------------
INSERT INTO `course_categories` VALUES (1, NULL, '2024-04-01 21:48:18', 'Visual', 1, 1, 'Description of first category', NULL);
INSERT INTO `course_categories` VALUES (2, NULL, '2024-04-01 21:48:31', 'Audio', 1, 2, 'Description of second category', NULL);
INSERT INTO `course_categories` VALUES (3, '2024-04-01 21:48:50', '2024-04-01 21:48:50', 'Kinestetik', 1, 3, NULL, NULL);

-- ----------------------------
-- Table structure for course_course_category
-- ----------------------------
DROP TABLE IF EXISTS `course_course_category`;
CREATE TABLE `course_course_category`  (
  `course_id` bigint UNSIGNED NOT NULL,
  `course_category_id` bigint UNSIGNED NOT NULL,
  INDEX `course_course_category_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `course_course_category_course_category_id_foreign`(`course_category_id`) USING BTREE,
  CONSTRAINT `course_course_category_course_category_id_foreign` FOREIGN KEY (`course_category_id`) REFERENCES `course_categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `course_course_category_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_course_category
-- ----------------------------
INSERT INTO `course_course_category` VALUES (1, 1);
INSERT INTO `course_course_category` VALUES (4, 1);
INSERT INTO `course_course_category` VALUES (5, 2);
INSERT INTO `course_course_category` VALUES (6, 3);

-- ----------------------------
-- Table structure for course_download
-- ----------------------------
DROP TABLE IF EXISTS `course_download`;
CREATE TABLE `course_download`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint UNSIGNED NOT NULL,
  `download_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `course_download_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `course_download_download_id_foreign`(`download_id`) USING BTREE,
  CONSTRAINT `course_download_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `course_download_download_id_foreign` FOREIGN KEY (`download_id`) REFERENCES `downloads` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_download
-- ----------------------------
INSERT INTO `course_download` VALUES (1, 1, 1);

-- ----------------------------
-- Table structure for course_lesson
-- ----------------------------
DROP TABLE IF EXISTS `course_lesson`;
CREATE TABLE `course_lesson`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint UNSIGNED NOT NULL,
  `lesson_id` bigint UNSIGNED NOT NULL,
  `lesson_date` timestamp NULL DEFAULT NULL,
  `lesson_venue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `lesson_start` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lesson_end` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort_order` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `course_lessons_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `course_lessons_lesson_id_foreign`(`lesson_id`) USING BTREE,
  CONSTRAINT `course_lessons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `course_lessons_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_lesson
-- ----------------------------
INSERT INTO `course_lesson` VALUES (1, 1, 1, '2024-04-25 17:00:00', NULL, NULL, NULL, 1);
INSERT INTO `course_lesson` VALUES (3, 1, 3, NULL, NULL, NULL, NULL, 2);
INSERT INTO `course_lesson` VALUES (4, 4, 4, NULL, NULL, NULL, NULL, 1);
INSERT INTO `course_lesson` VALUES (5, 5, 5, NULL, NULL, NULL, NULL, 1);
INSERT INTO `course_lesson` VALUES (6, 6, 6, NULL, NULL, NULL, NULL, 1);

-- ----------------------------
-- Table structure for course_lesson_admins
-- ----------------------------
DROP TABLE IF EXISTS `course_lesson_admins`;
CREATE TABLE `course_lesson_admins`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `lesson_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `course_lesson_admins_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `course_lesson_admins_admin_id_foreign`(`admin_id`) USING BTREE,
  INDEX `course_lesson_admins_lesson_id_foreign`(`lesson_id`) USING BTREE,
  CONSTRAINT `course_lesson_admins_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `course_lesson_admins_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `course_lesson_admins_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_lesson_admins
-- ----------------------------

-- ----------------------------
-- Table structure for course_survey
-- ----------------------------
DROP TABLE IF EXISTS `course_survey`;
CREATE TABLE `course_survey`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint UNSIGNED NOT NULL,
  `survey_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `course_survey_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `course_survey_survey_id_foreign`(`survey_id`) USING BTREE,
  CONSTRAINT `course_survey_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `course_survey_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_survey
-- ----------------------------

-- ----------------------------
-- Table structure for course_test
-- ----------------------------
DROP TABLE IF EXISTS `course_test`;
CREATE TABLE `course_test`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` bigint UNSIGNED NOT NULL,
  `test_id` bigint UNSIGNED NOT NULL,
  `opening_date` timestamp NULL DEFAULT NULL,
  `closing_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `course_tests_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `course_tests_test_id_foreign`(`test_id`) USING BTREE,
  CONSTRAINT `course_tests_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `course_tests_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course_test
-- ----------------------------
INSERT INTO `course_test` VALUES (1, 1, 1, '2024-04-26 17:00:00', '2024-04-27 17:00:00');

-- ----------------------------
-- Table structure for courses
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint UNSIGNED NULL DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `enrollment_closes` timestamp NULL DEFAULT NULL,
  `capacity` int NULL DEFAULT NULL,
  `payment_required` tinyint(1) NOT NULL,
  `fee` double(8, 2) NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `venue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `type` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `enable_discussion` tinyint(1) NOT NULL DEFAULT 1,
  `enable_chat` tinyint(1) NOT NULL DEFAULT 1,
  `enforce_order` tinyint(1) NOT NULL DEFAULT 1,
  `effort` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `length` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `introduction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `enable_forum` tinyint(1) NOT NULL DEFAULT 1,
  `enforce_capacity` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `courses_admin_id_foreign`(`admin_id`) USING BTREE,
  FULLTEXT INDEX `full`(`name`, `description`, `short_description`, `introduction`, `venue`),
  CONSTRAINT `courses_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of courses
-- ----------------------------
INSERT INTO `courses` VALUES (1, '2024-04-26 00:26:15', '2024-04-26 00:58:38', 'Internet Of Things', 1, 1, '2024-04-25 17:00:00', '2024-07-04 17:00:00', '2024-04-25 17:00:00', NULL, 0, NULL, '<p>lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>', NULL, 'c', 'usermedia/image_import/2024_04_26/2/images.jpg', 1, 1, 1, '6 hours per week', '10 weeks', 'Internet Of Things dengan versi tipe gaya belajar visual', '<p>test</p>', 1, 0);
INSERT INTO `courses` VALUES (4, '2024-04-29 04:33:04', '2024-04-29 04:33:04', 'Visual', 2, 1, '2024-04-29 00:00:00', NULL, NULL, NULL, 0, NULL, '<p>Ini adalah course visual</p>', NULL, 'c', NULL, 1, 1, 1, '6 hours per week', '10 weeks', 'Contoh course visual', '<p>ini adalah course visua</p>', 1, 0);
INSERT INTO `courses` VALUES (5, '2024-04-29 04:35:51', '2024-04-29 04:35:51', 'Audio', 2, 1, '2024-04-29 00:00:00', NULL, NULL, NULL, 0, NULL, '<p>Ini adalah course&nbsp;audio</p>', NULL, 'c', NULL, 1, 1, 1, '6 hours per week', '10 weeks', 'Ini adalah course audio', '<p>Ini adalah course&nbsp;audio</p>', 1, 0);
INSERT INTO `courses` VALUES (6, '2024-04-29 04:39:01', '2024-04-29 04:39:01', 'Kinestetik', 2, 1, '2024-04-29 00:00:00', NULL, NULL, NULL, 0, NULL, '<p>Ini adalah course kinestetik</p>', NULL, 'c', NULL, 1, 1, 1, '6 hours per week', '10 weeks', 'Ini adalah course kinestetik', '<p>Ini adalah course kinestetik</p>', 1, 0);

-- ----------------------------
-- Table structure for currencies
-- ----------------------------
DROP TABLE IF EXISTS `currencies`;
CREATE TABLE `currencies`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint UNSIGNED NOT NULL,
  `exchange_rate` double(8, 2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `currencies_country_id_foreign`(`country_id`) USING BTREE,
  CONSTRAINT `currencies_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of currencies
-- ----------------------------
INSERT INTO `currencies` VALUES (1, NULL, '2024-03-31 17:16:54', 235, 1.00);
INSERT INTO `currencies` VALUES (2, '2024-04-29 04:06:43', '2024-04-29 04:06:43', 106, 1.00);

-- ----------------------------
-- Table structure for currency_payment_method
-- ----------------------------
DROP TABLE IF EXISTS `currency_payment_method`;
CREATE TABLE `currency_payment_method`  (
  `currency_id` bigint UNSIGNED NOT NULL,
  `payment_method_id` bigint UNSIGNED NOT NULL,
  INDEX `currency_payment_method_currency_id_foreign`(`currency_id`) USING BTREE,
  INDEX `currency_payment_method_payment_method_id_foreign`(`payment_method_id`) USING BTREE,
  CONSTRAINT `currency_payment_method_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `currency_payment_method_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of currency_payment_method
-- ----------------------------

-- ----------------------------
-- Table structure for discussion_replies
-- ----------------------------
DROP TABLE IF EXISTS `discussion_replies`;
CREATE TABLE `discussion_replies`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discussion_id` bigint UNSIGNED NOT NULL,
  `reply` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `discussion_replies_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `discussion_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of discussion_replies
-- ----------------------------
INSERT INTO `discussion_replies` VALUES (1, '2024-04-26 18:33:11', '2024-04-26 18:33:11', 1, 'halalo', 1);

-- ----------------------------
-- Table structure for discussions
-- ----------------------------
DROP TABLE IF EXISTS `discussions`;
CREATE TABLE `discussions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `replied` tinyint(1) NOT NULL DEFAULT 0,
  `course_id` bigint UNSIGNED NULL DEFAULT NULL,
  `lecture_id` bigint UNSIGNED NULL DEFAULT NULL,
  `admin` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `discussions_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `discussions_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `discussions_lecture_id_foreign`(`lecture_id`) USING BTREE,
  CONSTRAINT `discussions_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `discussions_lecture_id_foreign` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `discussions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of discussions
-- ----------------------------
INSERT INTO `discussions` VALUES (1, '2024-04-26 18:32:41', '2024-04-26 18:33:11', 3, 'test', 'test', 1, 1, NULL, 1);

-- ----------------------------
-- Table structure for download_files
-- ----------------------------
DROP TABLE IF EXISTS `download_files`;
CREATE TABLE `download_files`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `download_id` bigint UNSIGNED NOT NULL,
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `download_files_download_id_foreign`(`download_id`) USING BTREE,
  CONSTRAINT `download_files_download_id_foreign` FOREIGN KEY (`download_id`) REFERENCES `downloads` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of download_files
-- ----------------------------

-- ----------------------------
-- Table structure for downloads
-- ----------------------------
DROP TABLE IF EXISTS `downloads`;
CREATE TABLE `downloads`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `admin_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `downloads_admin_id_foreign`(`admin_id`) USING BTREE,
  CONSTRAINT `downloads_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of downloads
-- ----------------------------
INSERT INTO `downloads` VALUES (1, '2024-04-26 17:52:10', '2024-04-26 17:52:29', 'test', 1, '<p><a href=\"https://drive.google.com/drive/folders/133izmuEjjrJXlKlbHJc-ivX3BYJ_tROo\">test</a></p>', 1);

-- ----------------------------
-- Table structure for email_templates
-- ----------------------------
DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE `email_templates`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `default` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `placeholders` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `default_subject` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of email_templates
-- ----------------------------
INSERT INTO `email_templates` VALUES (1, NULL, NULL, 'Upcoming class reminder (physical location)', 'This message is sent to students to remind them when a class is scheduled to hold.', '\n                Please be reminded that the class <strong>\'[CLASS_NAME]\'</strong> is scheduled to hold as follows: <br/>\n\n<div><strong>Date:</strong> [CLASS_DATE]</div>\n<div><strong>Session:</strong> [SESSION_NAME]</div>\n<div><strong>Venue:</strong> [CLASS_VENUE] </div>\n<div><strong>Starts:</strong> [CLASS_START_TIME]</div>\n<div><strong>Ends:</strong> [CLASS_END_TIME]</div>\n                ', '\n   Please be reminded that the class <strong>\'[CLASS_NAME]\'</strong> is scheduled to hold as follows: <br/>\n\n<div><strong>Date:</strong> [CLASS_DATE]</div>\n<div><strong>Session:</strong> [SESSION_NAME]</div>\n<div><strong>Venue:</strong> [CLASS_VENUE] </div>\n<div><strong>Starts:</strong> [CLASS_START_TIME]</div>\n<div><strong>Ends:</strong> [CLASS_END_TIME]</div>\n                ', '\n                <ul>\n                <li>[CLASS_NAME] : The name of the class</li>\n                <li>[CLASS_DATE] : The class date</li>\n                <li>[SESSION_NAME] : The name of the session the class is attached to</li>\n                <li>[CLASS_VENUE] : The venue of the class</li>\n                <li>[CLASS_START_TIME] : The start time for the class</li>\n                <li>[CLASS_END_TIME] : The end time for the class</li>\n                <li>[RECIPIENT_FIRST_NAME] : The first name of the recipient </li>\n                <li>[RECIPIENT_LAST_NAME] : The last name of the recipient </li>\n                </ul>\n                ', 'Upcoming Class: [CLASS_NAME]', 'Upcoming Class: [CLASS_NAME]');
INSERT INTO `email_templates` VALUES (2, NULL, NULL, 'Upcoming class reminder (online class)', 'This message is sent to students to remind them when an online class is scheduled to open.', '\n                Please be reminded that the class <strong>\'[CLASS_NAME]\'</strong> is scheduled as follows: <br/>\n\n<div><strong>Course:</strong> [COURSE_NAME]</div>\n<div><strong>Starts:</strong> [CLASS_DATE]</div>\n                ', '\n   Please be reminded that the class <strong>\'[CLASS_NAME]\'</strong> is scheduled as follows: <br/>\n\n<div><strong>Course:</strong> [COURSE_NAME]</div>\n<div><strong>Starts:</strong> [CLASS_DATE]</div>\n                ', '\n                <ul>\n                <li>[CLASS_NAME] : The name of the class</li>\n                <li>[CLASS_DATE] : The class date</li>\n                <li>[COURSE_NAME] : The name of the session the class is attached to</li>\n                <li>[RECIPIENT_FIRST_NAME] : The first name of the recipient </li>\n                <li>[RECIPIENT_LAST_NAME] : The last name of the recipient </li>\n                </ul>\n                ', 'Upcoming Class: [CLASS_NAME]', 'Upcoming Class: [CLASS_NAME]');
INSERT INTO `email_templates` VALUES (3, NULL, NULL, 'Upcoming Test reminder', 'This message is sent to users when there is an upcoming test in a session/course they are enrolled in', '\n                    Please be reminded that the test <strong>\'[TEST_NAME]\'</strong> is scheduled as follows: <br/>\n<div><strong>Session/Course:</strong> [SESSION_NAME] </div>\n<div><strong>Opens:</strong> [OPENING_DATE]</div>\n<div><strong>Closes:</strong> [CLOSING_DATE]</div>\n<div>Please ensure you take the test before the closing date.</div>\n                ', '\n                    Please be reminded that the test <strong>\'[TEST_NAME]\'</strong> is scheduled as follows: <br/>\n<div><strong>Session/Course:</strong> [SESSION_NAME] </div>\n<div><strong>Opens:</strong> [OPENING_DATE]</div>\n<div><strong>Closes:</strong> [CLOSING_DATE]</div>\n<div>Please ensure you take the test before the closing date.</div>\n                ', '\n                <ul>\n                <li>[TEST_NAME] : The name of the test</li>\n                <li>[TEST_DESCRIPTION] : The description of the test</li>\n                <li>[SESSION_NAME] : The name of the session or course the test is attached to</li>\n                <li>[OPENING_DATE] : The opening date of the test</li>\n                <li>[CLOSING_DATE] : The closing date of the test</li>\n                <li>[PASSMARK] : The test passmark e.g. 50%</li>\n                <li>[MINUTES_ALLOWED]: The number of minutes allowed for the test</li>\n                <li>[RECIPIENT_FIRST_NAME] : The first name of the recipient </li>\n                <li>[RECIPIENT_LAST_NAME] : The last name of the recipient </li>\n                </ul>\n                ', 'Upcoming Test: [TEST_NAME]', 'Upcoming Test: [TEST_NAME]');
INSERT INTO `email_templates` VALUES (4, NULL, NULL, 'Online Class start notification', 'This message is sent to students when a scheduled online class opens', '\n                Please be reminded that the class <strong>\'[CLASS_NAME]\'</strong> for the course \'[COURSE_NAME]\' has started. <br/>\nClick this link to take this class now: <a href=\\\"[CLASS_URL]\\\">[CLASS_URL]</a><br/>\n                ', '\n               Please be reminded that the class <strong>\'[CLASS_NAME]\'</strong> for the course \'[COURSE_NAME]\' has started. <br/>\nClick this link to take this class now: <a href=\\\"[CLASS_URL]\\\">[CLASS_URL]</a><br/>\n                ', '\n                <ul>\n                <li>[CLASS_NAME] : The name of the class</li>\n                <li>[CLASS_URL] : The url of the class</li>\n                <li>[COURSE_NAME] : The name of the course the class belongs to</li>\n                <li>[RECIPIENT_FIRST_NAME] : The first name of the recipient </li>\n                <li>[RECIPIENT_LAST_NAME] : The last name of the recipient </li>\n                </ul>\n                ', 'Class [CLASS_NAME] is open', 'Class [CLASS_NAME] is open');
INSERT INTO `email_templates` VALUES (5, NULL, NULL, 'Homework reminder', 'This message is sent to students reminding them when a homework is due', '\n                Please be reminded that the homework <strong>\'[HOMEWORK_NAME]\'</strong> is due on [DUE_DATE]. <br/>\nPlease click this link to submit your homework now: <a href=\\\"[HOMEWORK_URL]\\\">[HOMEWORK_URL]</a>\n                ', '\n                Please be reminded that the homework <strong>\'[HOMEWORK_NAME]\'</strong> is due on [DUE_DATE]. <br/>\nPlease click this link to submit your homework now: <a href=\\\"[HOMEWORK_URL]\\\">[HOMEWORK_URL]</a>\n                ', '\n                <ul>\n                <li>[NUMBER_OF_DAYS] : The number of days remaining till the homework due date e.g. 1,2,3</li>\n                <li>[DAY_TEXT] : The \'day\' text. Defaults to \'day\' if [NUMBER_OF_DAYS] is 1 and \'days\' if greater than 1.</li>\n                <li>[HOMEWORK_NAME] : The name of the homework</li>\n                <li>[HOMEWORK_URL] : The homework url</li>\n                <li>[HOMEWORK_INSTRUCTION] : The instructions for the homework</li>\n                <li>[PASSMARK] : The passmark for the homework</li>\n                 <li>[RECIPIENT_FIRST_NAME] : The first name of the recipient </li>\n                <li>[RECIPIENT_LAST_NAME] : The last name of the recipient </li>\n                <li>[DUE_DATE] : The homework due date</li>\n                <li>[OPENING_DATE] : The homework opening date</li>\n                </ul>\n                ', 'Homework due in [NUMBER_OF_DAYS] [DAY_TEXT]', 'Homework due in [NUMBER_OF_DAYS] [DAY_TEXT]');
INSERT INTO `email_templates` VALUES (6, NULL, NULL, 'Course closing reminder', 'Warning email sent to enrolled students about a course that will close soon.', '\n                Please be reminded that the course <strong>\'[COURSE_NAME]\'</strong> closes on [CLOSING_DATE]. <br/>\nPlease click this link to complete the course now: <a href=\\\"[COURSE_URL]\\\">[COURSE_URL]</a>\n                ', '\n                Please be reminded that the course <strong>\'[COURSE_NAME]\'</strong> closes on [CLOSING_DATE]. <br/>\nPlease click this link to complete the course now: <a href=\\\"[COURSE_URL]\\\">[COURSE_URL]</a>\n                ', '\n                <ul>\n                <li>[COURSE_NAME] : The name of the course</li>\n                <li>[COURSE_URL] : The course URL</li>\n                <li>[CLOSING_DATE] : The closing date for the course</li>\n                 <li>[NUMBER_OF_DAYS] : The number of days remaining till the closing date e.g. 1,2,3</li>\n                <li>[DAY_TEXT] : The \'day\' text. Defaults to \'day\' if [NUMBER_OF_DAYS] is 1 and \'days\' if greater than 1.</li>\n\n                <li>[RECIPIENT_FIRST_NAME] : The first name of the recipient </li>\n                <li>[RECIPIENT_LAST_NAME] : The last name of the recipient </li>\n                </ul>\n                ', 'Course ends in [NUMBER_OF_DAYS] [DAY_TEXT]', 'Course ends in [NUMBER_OF_DAYS] [DAY_TEXT]');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for footer_menus
-- ----------------------------
DROP TABLE IF EXISTS `footer_menus`;
CREATE TABLE `footer_menus`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT 0,
  `parent_id` int NOT NULL DEFAULT 0,
  `new_window` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of footer_menus
-- ----------------------------
INSERT INTO `footer_menus` VALUES (1, NULL, NULL, 'Custom', 'Quick Links', '#', 'c', 1, 0, 0);
INSERT INTO `footer_menus` VALUES (2, NULL, NULL, 'Courses', 'Online Courses', '/courses', 'p', 1, 1, 0);
INSERT INTO `footer_menus` VALUES (5, NULL, NULL, 'Contact', 'Contact', '/contact', 'p', 4, 1, 0);

-- ----------------------------
-- Table structure for forum_participants
-- ----------------------------
DROP TABLE IF EXISTS `forum_participants`;
CREATE TABLE `forum_participants`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `forum_topic_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `notify` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `forum_participants_forum_topic_id_foreign`(`forum_topic_id`) USING BTREE,
  INDEX `forum_participants_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `forum_participants_forum_topic_id_foreign` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_topics` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `forum_participants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_participants
-- ----------------------------
INSERT INTO `forum_participants` VALUES (1, '2024-04-26 18:34:51', '2024-04-26 18:34:51', 1, 1, 1);

-- ----------------------------
-- Table structure for forum_posts
-- ----------------------------
DROP TABLE IF EXISTS `forum_posts`;
CREATE TABLE `forum_posts`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `forum_topic_id` bigint UNSIGNED NOT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `post_reply_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `forum_posts_forum_topic_id_foreign`(`forum_topic_id`) USING BTREE,
  INDEX `forum_posts_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `forum_posts_post_reply_id_foreign`(`post_reply_id`) USING BTREE,
  CONSTRAINT `forum_posts_forum_topic_id_foreign` FOREIGN KEY (`forum_topic_id`) REFERENCES `forum_topics` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `forum_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_posts
-- ----------------------------
INSERT INTO `forum_posts` VALUES (1, '2024-04-26 18:34:51', '2024-04-26 18:34:51', 1, '<p>silakan</p>', 1, NULL);

-- ----------------------------
-- Table structure for forum_topics
-- ----------------------------
DROP TABLE IF EXISTS `forum_topics`;
CREATE TABLE `forum_topics`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `lecture_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `forum_topics_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `forum_topics_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `forum_topics_lecture_id_foreign`(`lecture_id`) USING BTREE,
  CONSTRAINT `forum_topics_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `forum_topics_lecture_id_foreign` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `forum_topics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of forum_topics
-- ----------------------------
INSERT INTO `forum_topics` VALUES (1, '2024-04-26 18:34:51', '2024-04-26 18:34:51', 'diskusi', 1, 1, NULL);

-- ----------------------------
-- Table structure for header_menus
-- ----------------------------
DROP TABLE IF EXISTS `header_menus`;
CREATE TABLE `header_menus`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT 0,
  `parent_id` int NOT NULL DEFAULT 0,
  `new_window` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of header_menus
-- ----------------------------
INSERT INTO `header_menus` VALUES (1, NULL, NULL, 'Home Page', 'Home', '/', 'p', 1, 0, 0);
INSERT INTO `header_menus` VALUES (2, NULL, NULL, 'Custom', 'Info', '#', 'c', 2, 0, 0);
INSERT INTO `header_menus` VALUES (3, NULL, NULL, 'Article: Who We Are', 'Who We Are', '/who-we-are', 'a', 1, 2, 0);
INSERT INTO `header_menus` VALUES (4, NULL, NULL, 'Article: Our Services', 'Our Services', '/our-services', 'a', 2, 2, 0);
INSERT INTO `header_menus` VALUES (5, NULL, NULL, 'Article: FAQ', 'FAQ', '/faq', 'a', 3, 2, 0);
INSERT INTO `header_menus` VALUES (6, NULL, NULL, 'Courses', 'Courses', '/courses', 'p', 3, 0, 0);
INSERT INTO `header_menus` VALUES (9, NULL, NULL, 'Contact', 'Contact', '/contact', 'p', 6, 0, 0);

-- ----------------------------
-- Table structure for invoice_transactions
-- ----------------------------
DROP TABLE IF EXISTS `invoice_transactions`;
CREATE TABLE `invoice_transactions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `invoice_id` bigint UNSIGNED NOT NULL,
  `status` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'p',
  `amount` double(8, 2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `invoice_transactions_invoice_id_foreign`(`invoice_id`) USING BTREE,
  CONSTRAINT `invoice_transactions_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 100000 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invoice_transactions
-- ----------------------------

-- ----------------------------
-- Table structure for invoices
-- ----------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NULL DEFAULT NULL,
  `currency_id` bigint UNSIGNED NOT NULL,
  `amount` double(8, 2) NOT NULL,
  `cart` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `paid` tinyint(1) NOT NULL DEFAULT 0,
  `payment_method_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `invoices_currency_id_foreign`(`currency_id`) USING BTREE,
  INDEX `invoices_payment_method_id_foreign`(`payment_method_id`) USING BTREE,
  INDEX `invoices_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `invoices_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `invoices_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1000 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invoices
-- ----------------------------

-- ----------------------------
-- Table structure for ips
-- ----------------------------
DROP TABLE IF EXISTS `ips`;
CREATE TABLE `ips`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `ips_ip_unique`(`ip`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ips
-- ----------------------------

-- ----------------------------
-- Table structure for kuesioner
-- ----------------------------
DROP TABLE IF EXISTS `kuesioner`;
CREATE TABLE `kuesioner`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `pertanyaan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawabanVisual` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawabanAudio` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jawabanKinestetik` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kuesioner
-- ----------------------------
INSERT INTO `kuesioner` VALUES (1, 'Ketika mempunyai alat baru, saya akan ?', 'Membaca petunjuk terlebih dahulu', 'Mendengarkan penjelasan dari orang lain ', 'Langsung menggunakannya');
INSERT INTO `kuesioner` VALUES (2, 'Ketika mengunjungi kawasan daerah asing, saya akan ?', 'Melihat map atau peta', 'Bertanya arah ke orang lain', 'Menggunakan kompas');
INSERT INTO `kuesioner` VALUES (3, 'Ketika memasak hidangan baru, saya akan ?', 'Mengikuti petunjuk resep', 'Bertanya dan memintas penjelasan kepada ibu', 'Mengikuti naluri');
INSERT INTO `kuesioner` VALUES (4, 'Ketika memberikan arahan, saya akan ?', 'Menulis intruksi', 'Memberikan penjelasan secara lisan', 'Melakukan peragaan terlebih dahulu');
INSERT INTO `kuesioner` VALUES (5, 'Saya akan mengatakan ?', 'Lihat bagaimana saya melakukannya', 'Dengarkan penjelasan saya', 'Silakan kerjakan');
INSERT INTO `kuesioner` VALUES (6, 'Ketika waktu luang saya akan menikmati saat ?', 'Pergi ke perpustakaan', 'Mendengar musik dan berbincang bersama teman', 'Berolahraga atau melakukan kegiatan apa saja');
INSERT INTO `kuesioner` VALUES (7, 'Sebelum berbelanja pakaian, saya akan ?', 'Membayangkan pakaian yang akan saya beli', 'Meminta rekomendasi kepada orang lain', 'Mencoba langsung untuk melihat kecocokannya');
INSERT INTO `kuesioner` VALUES (8, 'Ketika merencanakan liburan, saya akan ?', 'Membaca informasi destinasi yang akan dituju', 'Meminta rekomendasi orang lain', 'Membayangkan ketika berada ditempat tersebut');
INSERT INTO `kuesioner` VALUES (9, 'Ketika akan membeli barang baru, saya akan ?', 'Membaca ulasan mengenai produk tersebut', 'Membahas apa yang dibutuhkan dengan orang lain', 'Langsung membeli barang yang dibutuhkan');
INSERT INTO `kuesioner` VALUES (10, 'Ketika sedang belajar, saya lebih suka ?', 'Melihat apa yang dilakukan tenaga pengajar', 'Bertanya secara aktif kepada tenaga pengajar', 'Mencoba dan mempraktekan secara langsung');
INSERT INTO `kuesioner` VALUES (11, 'Ketika memilih makanan di restoran, saya cenderung ?', 'Membayangkan makanannya seperti apa', 'Bertanya rekomendasi menu', 'Membayangkan rasa dari makanannya');
INSERT INTO `kuesioner` VALUES (12, 'Ketika melihat pertunjukan, saya akan ?', 'Melihat pelaku pertunjukan dan orang disekitar', 'Mendengarkan secara seksama pertunjukan tersebut', 'Terbawa susana pertunjukan tersebut');
INSERT INTO `kuesioner` VALUES (13, 'Ketika berkonsentrasi, saya cenderung akan ?', 'Fokus terhadap apa yang dilakukan', 'Membahas masalah serta solusi terhadap apa yang dilakukan', 'Banyak bergerak');
INSERT INTO `kuesioner` VALUES (14, 'Saya akan memilih peralatan rumah tangga berdasarkan ?', 'Warna dan penampilannya', 'Penjelasan dari sales ', 'Tekstur peralatan tersebut ketika menyentuhnya');
INSERT INTO `kuesioner` VALUES (15, 'Saya mudah mengingat maupun memahami sesutu dengan ?', 'Melihat sesuatu', 'Mendengar sesuatu', 'Melakukan  sesuatu');
INSERT INTO `kuesioner` VALUES (16, 'Ketika cemas saya akan ?', 'Membayangkan kemungkinan terburuk', 'Memikirkan hal yang mengkhawatirkan', 'Tidak tenang');
INSERT INTO `kuesioner` VALUES (17, 'Saya dapat mengingat orang lain dengan ?', 'Melihat penampilan mereka', 'Mendengar apa yang mereka katakan', 'Bagaimana memperlakukan saya');
INSERT INTO `kuesioner` VALUES (18, 'Ketika gagal saya biasanya ?', 'Menulis catatan', 'Membahas catatan saya dengan orang lain', 'Membuat kemajuan dengan melakukan koreksi ');
INSERT INTO `kuesioner` VALUES (19, 'Ketika menjelaskan saya cenderung ?', 'Menunjukan apa yang saya maksud', 'Menjelaskan kepada mereka hingga mengerti', 'Memberikan motivasi ketika mereka mengerjakan');
INSERT INTO `kuesioner` VALUES (20, 'Saya sangat suka ?', 'Menonton film', 'Mendengarkan musik', 'Melakukan kegiatatan aktifitas fisik');
INSERT INTO `kuesioner` VALUES (21, 'Ketika memiliki waktu luang, saya akan ?', 'Menonton ', 'Mengobrol dengan orang lain', 'Melakukan kegiatan fisik');
INSERT INTO `kuesioner` VALUES (22, 'Ketika bertemu orang baru, saya biasanya ?', 'Membayangkan apa yang harus dilakukan', 'Berbicara', 'Mencoba melakukan kegiatan bersama');
INSERT INTO `kuesioner` VALUES (23, 'Saya memperhatikan seseorang melalui ?', 'Tampilannya', 'Bagaimana cara berbicaranya', 'Bagaimana tingkah lakunya');
INSERT INTO `kuesioner` VALUES (24, 'Ketika saya marah, saya biasanya ?', 'Terus mengingat penyebab saya marah', 'Menyampaikan pada orang lain perasaan saya', 'Menunjukan kemarahan saya');
INSERT INTO `kuesioner` VALUES (25, 'Saya akan merasa lebih mudah ketika mengingat ?', 'Wajah', 'Nama', 'Hal yang telah saya lakukan');
INSERT INTO `kuesioner` VALUES (26, 'Saya dapat mengetahui seseorang sedang berbohong melalui ?', 'Menghindari kontak mata', 'Perubahan suara', 'Berprilaku aneh');
INSERT INTO `kuesioner` VALUES (27, 'Ketika bertemu orang lama saya akan ?', 'Berkata \"Senang bertemu denganmu!\"', 'Berkata \"Senang mendengar kabar tentangmu!\"', 'Melakukan kontak fisik');
INSERT INTO `kuesioner` VALUES (28, 'Saya mudah mengingat sesuatu dengan ?', 'Mencatat', 'Mengucapkan poin penting', 'Melakukan secara langsung');
INSERT INTO `kuesioner` VALUES (29, 'Ketika saya memiliki keluhan terhadap sesuaru yang saya beli, saya akan ?', 'Menulis surat pengaduan', 'Menyampaikan keluhan secara langsung maupun telepon', 'Mendatangi toko secara langsung');
INSERT INTO `kuesioner` VALUES (30, 'Saya cenderung mengatakan ?', 'Saya paham yang dimaksud', 'Saya mendengar yang dikatakan', 'Saya mengerti bagaimana perasaan anda');

-- ----------------------------
-- Table structure for kuesioner_status
-- ----------------------------
DROP TABLE IF EXISTS `kuesioner_status`;
CREATE TABLE `kuesioner_status`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `status_belajar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kuesioner_status
-- ----------------------------
INSERT INTO `kuesioner_status` VALUES (1, 2, 'Visual');

-- ----------------------------
-- Table structure for lecture_files
-- ----------------------------
DROP TABLE IF EXISTS `lecture_files`;
CREATE TABLE `lecture_files`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lecture_id` bigint UNSIGNED NOT NULL,
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `lecture_files_lecture_id_foreign`(`lecture_id`) USING BTREE,
  CONSTRAINT `lecture_files_lecture_id_foreign` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lecture_files
-- ----------------------------

-- ----------------------------
-- Table structure for lecture_notes
-- ----------------------------
DROP TABLE IF EXISTS `lecture_notes`;
CREATE TABLE `lecture_notes`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `lecture_id` bigint UNSIGNED NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `lecture_notes_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `lecture_notes_lecture_id_foreign`(`lecture_id`) USING BTREE,
  CONSTRAINT `lecture_notes_lecture_id_foreign` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `lecture_notes_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lecture_notes
-- ----------------------------

-- ----------------------------
-- Table structure for lecture_pages
-- ----------------------------
DROP TABLE IF EXISTS `lecture_pages`;
CREATE TABLE `lecture_pages`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lecture_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `type` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NULL DEFAULT NULL,
  `audio_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `lecture_pages_lecture_id_foreign`(`lecture_id`) USING BTREE,
  CONSTRAINT `lecture_pages_lecture_id_foreign` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lecture_pages
-- ----------------------------
INSERT INTO `lecture_pages` VALUES (1, '2024-04-26 00:45:03', '2024-04-26 00:45:03', 1, 'Video Tutorial Pengerjaan Online Test RBB', '1', 'l', 1, NULL);
INSERT INTO `lecture_pages` VALUES (2, '2024-04-26 00:57:04', '2024-04-26 00:57:04', 2, '1', 'usermedia/image_import/2024_04_26/2/1_1714118224.jpeg', 'i', 1, NULL);
INSERT INTO `lecture_pages` VALUES (4, '2024-04-26 12:51:06', '2024-04-26 12:51:06', 4, 'monitoring', '3', 'l', 1, NULL);
INSERT INTO `lecture_pages` VALUES (5, '2024-04-29 04:34:04', '2024-04-29 04:34:04', 5, 'monitoring', '3', 'l', 1, NULL);
INSERT INTO `lecture_pages` VALUES (6, '2024-04-29 04:37:00', '2024-04-29 04:37:54', 6, 'Pengenalan', '<p>Ini adalah materi pengenalan satu</p>', 't', 1, '<iframe width=\"100%\" height=\"450\" scrolling=\"no\" frameborder=\"no\" src=\"https://w.soundcloud.com/player/?visual=true&url=https%3A%2F%2Fapi.soundcloud.com%2Fplaylists%2F1055564437&show_artwork=true\"></iframe>');
INSERT INTO `lecture_pages` VALUES (7, '2024-04-29 04:40:03', '2024-04-29 04:40:03', 7, 'Introduction', '<p>Ini adalah materi 1 Kinestetik</p>', 't', 1, NULL);

-- ----------------------------
-- Table structure for lectures
-- ----------------------------
DROP TABLE IF EXISTS `lectures`;
CREATE TABLE `lectures`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lesson_id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `lectures_lesson_id_foreign`(`lesson_id`) USING BTREE,
  CONSTRAINT `lectures_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lectures
-- ----------------------------
INSERT INTO `lectures` VALUES (1, '2024-04-26 00:33:05', '2024-04-26 12:39:05', 1, 'coba', 1);
INSERT INTO `lectures` VALUES (2, '2024-04-26 00:56:13', '2024-04-26 12:39:05', 1, 'materi 2', 2);
INSERT INTO `lectures` VALUES (3, '2024-04-26 01:43:57', '2024-04-26 01:43:57', 2, 'Materi 1', 1);
INSERT INTO `lectures` VALUES (4, '2024-04-26 12:39:05', '2024-04-26 12:39:05', 1, '3', 3);
INSERT INTO `lectures` VALUES (5, '2024-04-29 04:33:56', '2024-04-29 04:33:56', 4, 'Materi 1', 1);
INSERT INTO `lectures` VALUES (6, '2024-04-29 04:36:27', '2024-04-29 04:36:27', 5, 'Materi 1', 1);
INSERT INTO `lectures` VALUES (7, '2024-04-29 04:39:39', '2024-04-29 04:39:39', 6, 'Materi 1', 1);

-- ----------------------------
-- Table structure for lesson_files
-- ----------------------------
DROP TABLE IF EXISTS `lesson_files`;
CREATE TABLE `lesson_files`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lesson_id` bigint UNSIGNED NOT NULL,
  `path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `lesson_files_lesson_id_foreign`(`lesson_id`) USING BTREE,
  CONSTRAINT `lesson_files_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lesson_files
-- ----------------------------

-- ----------------------------
-- Table structure for lesson_groups
-- ----------------------------
DROP TABLE IF EXISTS `lesson_groups`;
CREATE TABLE `lesson_groups`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `sort_order` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lesson_groups
-- ----------------------------

-- ----------------------------
-- Table structure for lesson_lesson_group
-- ----------------------------
DROP TABLE IF EXISTS `lesson_lesson_group`;
CREATE TABLE `lesson_lesson_group`  (
  `lesson_group_id` bigint UNSIGNED NOT NULL,
  `lesson_id` bigint UNSIGNED NOT NULL,
  INDEX `lesson_lesson_group_lesson_group_id_foreign`(`lesson_group_id`) USING BTREE,
  INDEX `lesson_lesson_group_lesson_id_foreign`(`lesson_id`) USING BTREE,
  CONSTRAINT `lesson_lesson_group_lesson_group_id_foreign` FOREIGN KEY (`lesson_group_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `lesson_lesson_group_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lesson_lesson_group
-- ----------------------------

-- ----------------------------
-- Table structure for lessons
-- ----------------------------
DROP TABLE IF EXISTS `lessons`;
CREATE TABLE `lessons`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `picture` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `sort_order` int NULL DEFAULT NULL,
  `test_required` tinyint(1) NULL DEFAULT NULL,
  `test_id` bigint UNSIGNED NULL DEFAULT NULL,
  `type` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `enforce_lecture_order` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `lessons_admin_id_foreign`(`admin_id`) USING BTREE,
  INDEX `lessons_test_id_foreign`(`test_id`) USING BTREE,
  FULLTEXT INDEX `full`(`name`, `description`, `introduction`),
  CONSTRAINT `lessons_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `lessons_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lessons
-- ----------------------------
INSERT INTO `lessons` VALUES (1, '2024-04-26 00:26:45', '2024-04-26 00:26:45', 'iot1', 1, NULL, NULL, NULL, NULL, NULL, 'c', NULL, 1);
INSERT INTO `lessons` VALUES (2, '2024-04-26 01:43:40', '2024-04-26 01:43:40', 'IOT-1', 1, 'usermedia/image_import/2024_04_26/2/ap2sc.jpeg', NULL, NULL, NULL, NULL, 'c', NULL, 1);
INSERT INTO `lessons` VALUES (3, '2024-04-26 18:44:14', '2024-04-26 18:44:14', 'iot2', 1, NULL, NULL, NULL, NULL, NULL, 'c', NULL, 1);
INSERT INTO `lessons` VALUES (4, '2024-04-29 04:33:46', '2024-04-29 04:33:46', 'Visual 1', 2, NULL, NULL, NULL, NULL, NULL, 'c', '<p>Ini adalah kelas visual 1</p>', 1);
INSERT INTO `lessons` VALUES (5, '2024-04-29 04:36:16', '2024-04-29 04:36:16', 'Audio 1', 2, NULL, NULL, NULL, NULL, NULL, 'c', '<p>Ini adalah kelas audio 1</p>', 1);
INSERT INTO `lessons` VALUES (6, '2024-04-29 04:39:26', '2024-04-29 04:39:26', 'Kinestetik 1', 2, NULL, NULL, NULL, NULL, NULL, 'c', '<p>Ini adalah kelas kinestetik 1</p>', 1);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 176 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2020_04_07_171722_create_students_table', 1);
INSERT INTO `migrations` VALUES (5, '2020_04_10_144311_create_admins_table', 1);
INSERT INTO `migrations` VALUES (6, '2020_04_10_144327_create_articles_table', 1);
INSERT INTO `migrations` VALUES (7, '2020_04_10_144335_create_courses_table', 1);
INSERT INTO `migrations` VALUES (8, '2020_04_10_144445_create_lessons_table', 1);
INSERT INTO `migrations` VALUES (9, '2020_04_10_144504_create_lectures_table', 1);
INSERT INTO `migrations` VALUES (10, '2020_04_10_144517_create_assignments_table', 1);
INSERT INTO `migrations` VALUES (11, '2020_04_10_144537_create_assignment_submissions_table', 1);
INSERT INTO `migrations` VALUES (12, '2020_04_10_144547_create_attendances_table', 1);
INSERT INTO `migrations` VALUES (13, '2020_04_10_144557_create_bookmarks_table', 1);
INSERT INTO `migrations` VALUES (14, '2020_04_10_144609_create_certificates_table', 1);
INSERT INTO `migrations` VALUES (15, '2020_04_10_144617_create_certificate_assignments_table', 1);
INSERT INTO `migrations` VALUES (16, '2020_04_10_144632_create_certificate_lessons_table', 1);
INSERT INTO `migrations` VALUES (17, '2020_04_10_144714_create_tests_table', 1);
INSERT INTO `migrations` VALUES (18, '2020_04_10_144723_create_certificate_tests_table', 1);
INSERT INTO `migrations` VALUES (19, '2020_04_10_144741_create_countries_table', 1);
INSERT INTO `migrations` VALUES (20, '2020_04_10_144818_create_coupons_table', 1);
INSERT INTO `migrations` VALUES (21, '2020_04_10_144854_create_course_categories_table', 1);
INSERT INTO `migrations` VALUES (22, '2020_04_10_144958_create_coupon_categories_table', 1);
INSERT INTO `migrations` VALUES (23, '2020_04_10_150647_create_currencies_table', 1);
INSERT INTO `migrations` VALUES (24, '2020_04_10_150716_create_payment_methods_table', 1);
INSERT INTO `migrations` VALUES (25, '2020_04_10_150731_create_invoices_table', 1);
INSERT INTO `migrations` VALUES (26, '2020_04_10_150802_create_coupon_invoices_table', 1);
INSERT INTO `migrations` VALUES (27, '2020_04_10_153758_create_coupon_courses_table', 1);
INSERT INTO `migrations` VALUES (28, '2020_04_10_153826_create_discussions_table', 1);
INSERT INTO `migrations` VALUES (29, '2020_04_10_153849_create_discussion_admins_table', 1);
INSERT INTO `migrations` VALUES (30, '2020_04_10_154910_create_discussion_replies_table', 1);
INSERT INTO `migrations` VALUES (31, '2020_04_10_154934_create_downloads_table', 1);
INSERT INTO `migrations` VALUES (32, '2020_04_10_155002_create_download_files_table', 1);
INSERT INTO `migrations` VALUES (33, '2020_04_10_155014_create_download_courses_table', 1);
INSERT INTO `migrations` VALUES (34, '2020_04_10_155051_create_email_templates_table', 1);
INSERT INTO `migrations` VALUES (35, '2020_04_10_155114_create_forum_topics_table', 1);
INSERT INTO `migrations` VALUES (36, '2020_04_10_155126_create_forum_posts_table', 1);
INSERT INTO `migrations` VALUES (37, '2020_04_10_155138_create_forum_participants_table', 1);
INSERT INTO `migrations` VALUES (38, '2020_04_10_155251_create_revision_notes_table', 1);
INSERT INTO `migrations` VALUES (39, '2020_04_10_155309_create_invoice_transactions_table', 1);
INSERT INTO `migrations` VALUES (40, '2020_04_10_155325_create_ips_table', 1);
INSERT INTO `migrations` VALUES (41, '2020_04_10_155352_create_lecture_files_table', 1);
INSERT INTO `migrations` VALUES (42, '2020_04_10_155405_create_lecture_notes_table', 1);
INSERT INTO `migrations` VALUES (43, '2020_04_10_160903_create_lecture_pages_table', 1);
INSERT INTO `migrations` VALUES (44, '2020_04_13_103711_create_lesson_files_table', 1);
INSERT INTO `migrations` VALUES (45, '2020_04_13_103723_create_lesson_groups_table', 1);
INSERT INTO `migrations` VALUES (46, '2020_04_13_104351_lesson_lesson_group_pivot', 1);
INSERT INTO `migrations` VALUES (47, '2020_04_13_104433_create_blog_posts_table', 1);
INSERT INTO `migrations` VALUES (48, '2020_04_13_104445_create_blog_categories_table', 1);
INSERT INTO `migrations` VALUES (49, '2020_04_13_110020_blog_category_pivot', 1);
INSERT INTO `migrations` VALUES (50, '2020_04_13_110506_payment_method_currency_pivot', 1);
INSERT INTO `migrations` VALUES (51, '2020_04_13_110821_create_payment_method_fields_table', 1);
INSERT INTO `migrations` VALUES (52, '2020_04_13_110937_create_permission_groups_table', 1);
INSERT INTO `migrations` VALUES (53, '2020_04_13_122949_create_permissions_table', 1);
INSERT INTO `migrations` VALUES (54, '2020_04_13_123037_create_student_fields_table', 1);
INSERT INTO `migrations` VALUES (55, '2020_04_13_123120_create_related_courses_table', 1);
INSERT INTO `migrations` VALUES (56, '2020_04_13_130436_create_roles_table', 1);
INSERT INTO `migrations` VALUES (57, '2020_04_13_130506_add_role_to_users', 1);
INSERT INTO `migrations` VALUES (58, '2020_04_13_134615_admin_permission_pivot', 1);
INSERT INTO `migrations` VALUES (59, '2020_04_13_142536_add_role_user_pivot', 1);
INSERT INTO `migrations` VALUES (60, '2020_04_13_142737_create_course_category_pivot', 1);
INSERT INTO `migrations` VALUES (61, '2020_04_13_142836_admin_course_pivot', 1);
INSERT INTO `migrations` VALUES (62, '2020_04_13_175310_create_course_lessons_table', 1);
INSERT INTO `migrations` VALUES (63, '2020_04_14_121252_create_course_lesson_admins_table', 1);
INSERT INTO `migrations` VALUES (64, '2020_04_14_121954_create_surveys_table', 1);
INSERT INTO `migrations` VALUES (65, '2020_04_14_122043_add_course_survey_pivot', 1);
INSERT INTO `migrations` VALUES (66, '2020_04_14_122132_create_course_tests_table', 1);
INSERT INTO `migrations` VALUES (67, '2020_04_14_122557_create_settings_table', 1);
INSERT INTO `migrations` VALUES (68, '2020_04_14_122642_create_sms_gateways_table', 1);
INSERT INTO `migrations` VALUES (69, '2020_04_14_122704_create_sms_gateway_fields_table', 1);
INSERT INTO `migrations` VALUES (70, '2020_04_14_122725_create_sms_templates_table', 1);
INSERT INTO `migrations` VALUES (71, '2020_04_14_122905_create_student_certificates_table', 1);
INSERT INTO `migrations` VALUES (72, '2020_04_15_125950_create_student_certificate_downloads_table', 1);
INSERT INTO `migrations` VALUES (73, '2020_04_15_130241_student_field_pivot', 1);
INSERT INTO `migrations` VALUES (74, '2020_04_15_130411_create_student_lectures_table', 1);
INSERT INTO `migrations` VALUES (75, '2020_04_15_130546_create_pending_students_table', 1);
INSERT INTO `migrations` VALUES (76, '2020_04_15_130650_create_student_courses_table', 1);
INSERT INTO `migrations` VALUES (77, '2020_04_15_130709_create_student_course_logs_table', 1);
INSERT INTO `migrations` VALUES (78, '2020_04_15_130729_create_student_tests_table', 1);
INSERT INTO `migrations` VALUES (79, '2020_04_15_130954_create_survey_questions_table', 1);
INSERT INTO `migrations` VALUES (80, '2020_04_15_131008_create_survey_options_table', 1);
INSERT INTO `migrations` VALUES (81, '2020_04_15_131027_create_survey_responses_table', 1);
INSERT INTO `migrations` VALUES (82, '2020_04_15_131349_create_survey_response_options_table', 1);
INSERT INTO `migrations` VALUES (83, '2020_04_15_131713_create_templates_table', 1);
INSERT INTO `migrations` VALUES (84, '2020_04_15_131726_create_template_options_table', 1);
INSERT INTO `migrations` VALUES (85, '2020_04_15_131740_create_template_colors_table', 1);
INSERT INTO `migrations` VALUES (86, '2020_04_15_131821_create_test_grades_table', 1);
INSERT INTO `migrations` VALUES (87, '2020_04_15_131945_create_test_questions_table', 1);
INSERT INTO `migrations` VALUES (88, '2020_04_15_131949_create_test_options_table', 1);
INSERT INTO `migrations` VALUES (89, '2020_04_15_132020_create_transactions_table', 1);
INSERT INTO `migrations` VALUES (90, '2020_04_15_132049_create_videos_table', 1);
INSERT INTO `migrations` VALUES (91, '2020_04_15_132207_create_student_videos_table', 1);
INSERT INTO `migrations` VALUES (92, '2020_04_15_133642_add_picture_to_users', 1);
INSERT INTO `migrations` VALUES (93, '2020_04_21_105018_create_widgets_table', 1);
INSERT INTO `migrations` VALUES (94, '2020_04_21_105033_create_widget_values_table', 1);
INSERT INTO `migrations` VALUES (95, '2020_04_28_130903_make_lesson_pivot', 1);
INSERT INTO `migrations` VALUES (96, '2020_04_28_145614_make_course_test', 1);
INSERT INTO `migrations` VALUES (97, '2020_05_12_102430_add_settings', 1);
INSERT INTO `migrations` VALUES (98, '2020_05_12_113650_seed_permission_groups', 1);
INSERT INTO `migrations` VALUES (99, '2020_05_12_124843_seed_permissions', 1);
INSERT INTO `migrations` VALUES (100, '2020_05_20_193453_add_user_to_admins', 1);
INSERT INTO `migrations` VALUES (101, '2020_05_20_200723_add_default_admin_roles', 1);
INSERT INTO `migrations` VALUES (102, '2020_08_11_140753_add_parent_to_course_category', 1);
INSERT INTO `migrations` VALUES (103, '2020_08_11_170723_add_ft_to_lessons', 1);
INSERT INTO `migrations` VALUES (104, '2020_08_25_122904_add_message_permission', 1);
INSERT INTO `migrations` VALUES (105, '2020_08_25_124942_add_video_permissions', 1);
INSERT INTO `migrations` VALUES (106, '2020_08_26_124622_add_capacity_display', 1);
INSERT INTO `migrations` VALUES (107, '2020_08_27_112622_seed_countries', 1);
INSERT INTO `migrations` VALUES (108, '2020_08_27_134249_add_default_currency', 1);
INSERT INTO `migrations` VALUES (109, '2020_09_02_135904_fix_lesson_test', 1);
INSERT INTO `migrations` VALUES (110, '2020_09_03_111646_make_intro_nullable', 1);
INSERT INTO `migrations` VALUES (111, '2020_09_03_111802_make_lecture_order_nullable', 1);
INSERT INTO `migrations` VALUES (112, '2020_09_04_170057_add_dates_to_course_test', 1);
INSERT INTO `migrations` VALUES (113, '2020_09_09_105230_add_pk_to_course_tests', 1);
INSERT INTO `migrations` VALUES (114, '2020_09_09_160235_add_last_name_users', 1);
INSERT INTO `migrations` VALUES (115, '2020_09_10_110652_fix_students_userid_fk', 1);
INSERT INTO `migrations` VALUES (116, '2020_09_10_140553_add_ft_to_courses', 1);
INSERT INTO `migrations` VALUES (117, '2020_09_10_140803_add_ft_to_users', 1);
INSERT INTO `migrations` VALUES (118, '2020_09_22_151500_add_video_settings', 1);
INSERT INTO `migrations` VALUES (119, '2020_09_22_160543_add_video_fields', 1);
INSERT INTO `migrations` VALUES (120, '2020_09_22_172335_add_ft_to_videos', 1);
INSERT INTO `migrations` VALUES (121, '2020_09_23_180106_add_id_to_course_lesson', 1);
INSERT INTO `migrations` VALUES (122, '2020_09_24_165641_make_late_nullable', 1);
INSERT INTO `migrations` VALUES (123, '2020_09_25_143442_add_id_to_course_download', 1);
INSERT INTO `migrations` VALUES (124, '2020_09_29_151537_remove_forum_fk', 1);
INSERT INTO `migrations` VALUES (125, '2020_10_05_125959_add_id_to_course_survery', 1);
INSERT INTO `migrations` VALUES (126, '2020_10_05_161754_add_certificate_flag', 1);
INSERT INTO `migrations` VALUES (127, '2020_10_07_112359_add_blog_permission', 1);
INSERT INTO `migrations` VALUES (128, '2020_10_08_121006_add_widget_fields', 1);
INSERT INTO `migrations` VALUES (129, '2020_10_09_160438_set_coupon_total_nullable', 1);
INSERT INTO `migrations` VALUES (130, '2020_10_09_170447_set_notification_messages', 1);
INSERT INTO `migrations` VALUES (131, '2020_10_09_172338_set_sms_notification_messages', 1);
INSERT INTO `migrations` VALUES (132, '2020_10_12_100131_create_header_menus_table', 1);
INSERT INTO `migrations` VALUES (133, '2020_10_12_100144_create_footer_menus_table', 1);
INSERT INTO `migrations` VALUES (134, '2020_10_12_101049_add_default_template', 1);
INSERT INTO `migrations` VALUES (135, '2020_10_13_092538_remove_payment_method_fields', 1);
INSERT INTO `migrations` VALUES (136, '2020_10_13_105815_update_payment_table', 1);
INSERT INTO `migrations` VALUES (137, '2020_10_13_134003_rename_currency_field', 1);
INSERT INTO `migrations` VALUES (138, '2020_10_14_104256_remove_sms_fields_table', 1);
INSERT INTO `migrations` VALUES (139, '2020_10_14_104456_update_sms_table', 1);
INSERT INTO `migrations` VALUES (140, '2020_10_16_124938_change_invoice_fields', 1);
INSERT INTO `migrations` VALUES (141, '2020_10_23_123026_update_setting_menu_values', 1);
INSERT INTO `migrations` VALUES (142, '2020_11_02_093438_fix_admin_discussion_fk', 1);
INSERT INTO `migrations` VALUES (143, '2020_11_04_124333_create_demo_builder', 1);
INSERT INTO `migrations` VALUES (144, '2020_11_10_120724_add_user_login_token', 1);
INSERT INTO `migrations` VALUES (145, '2020_11_10_142950_create_pending_student_files_table', 1);
INSERT INTO `migrations` VALUES (146, '2020_11_11_151858_add_billing_details', 1);
INSERT INTO `migrations` VALUES (147, '2020_11_12_070922_set_invoice_increment', 1);
INSERT INTO `migrations` VALUES (148, '2020_11_13_145240_add_transaction_increment', 1);
INSERT INTO `migrations` VALUES (149, '2020_11_17_122359_add_sms_default', 1);
INSERT INTO `migrations` VALUES (150, '2020_11_17_124231_add_base_url', 1);
INSERT INTO `migrations` VALUES (151, '2020_11_18_115144_add_mobile_to_articles', 1);
INSERT INTO `migrations` VALUES (152, '2020_11_27_091941_add_admin_details', 1);
INSERT INTO `migrations` VALUES (153, '2020_11_27_093838_add_admin_url', 1);
INSERT INTO `migrations` VALUES (154, '2020_12_02_172012_add_admin_account', 1);
INSERT INTO `migrations` VALUES (155, '2020_12_03_154614_modify_certificate', 1);
INSERT INTO `migrations` VALUES (156, '2020_12_04_124356_remove_auto_enroll', 1);
INSERT INTO `migrations` VALUES (157, '2021_01_11_104057_enable_registration', 1);
INSERT INTO `migrations` VALUES (158, '2021_01_15_141233_add_enrollment_message', 1);
INSERT INTO `migrations` VALUES (159, '2021_01_22_104902_remove_invalid_menu_settings', 1);
INSERT INTO `migrations` VALUES (160, '2021_02_03_125722_fix_student_course_fk', 1);
INSERT INTO `migrations` VALUES (161, '2021_04_27_102729_make_discussion_course_nullable', 1);
INSERT INTO `migrations` VALUES (162, '2021_05_04_180647_add_zoom_settings', 1);
INSERT INTO `migrations` VALUES (163, '2021_05_12_113706_remove_info_settings', 1);
INSERT INTO `migrations` VALUES (164, '2021_06_14_144605_alter_survey_response', 1);
INSERT INTO `migrations` VALUES (165, '2021_06_14_181722_rename_survey_response_table', 1);
INSERT INTO `migrations` VALUES (166, '2021_07_05_112640_add_info_settings', 1);
INSERT INTO `migrations` VALUES (167, '2021_09_13_122734_update_videos_table', 1);
INSERT INTO `migrations` VALUES (168, '2021_09_30_094714_add_digit_validator_to_video', 1);
INSERT INTO `migrations` VALUES (169, '2021_12_30_131259_add_frontend_setting', 1);
INSERT INTO `migrations` VALUES (170, '2021_12_30_150707_add_dashboard_setting', 1);
INSERT INTO `migrations` VALUES (171, '2023_01_12_124357_create_certificate_payments_table', 1);
INSERT INTO `migrations` VALUES (172, '2023_01_12_125240_add_certificate_payment_fields', 1);
INSERT INTO `migrations` VALUES (173, '2023_03_21_123433_add_video_storage_settings', 1);
INSERT INTO `migrations` VALUES (174, '2023_03_21_133128_add_location_to_videos', 1);
INSERT INTO `migrations` VALUES (175, '2023_03_21_154142_add_mime_type_to_videos', 1);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for payment_methods
-- ----------------------------
DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE `payment_methods`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int NULL DEFAULT NULL,
  `directory` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `supported_currencies` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_global` tinyint(1) NOT NULL,
  `settings` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of payment_methods
-- ----------------------------

-- ----------------------------
-- Table structure for pending_student_files
-- ----------------------------
DROP TABLE IF EXISTS `pending_student_files`;
CREATE TABLE `pending_student_files`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pending_student_id` bigint UNSIGNED NOT NULL,
  `file_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `pending_student_files_pending_student_id_foreign`(`pending_student_id`) USING BTREE,
  CONSTRAINT `pending_student_files_pending_student_id_foreign` FOREIGN KEY (`pending_student_id`) REFERENCES `pending_students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pending_student_files
-- ----------------------------

-- ----------------------------
-- Table structure for pending_students
-- ----------------------------
DROP TABLE IF EXISTS `pending_students`;
CREATE TABLE `pending_students`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hash` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pending_students
-- ----------------------------

-- ----------------------------
-- Table structure for permission_groups
-- ----------------------------
DROP TABLE IF EXISTS `permission_groups`;
CREATE TABLE `permission_groups`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permission_groups
-- ----------------------------
INSERT INTO `permission_groups` VALUES (1, NULL, NULL, 'student', 1);
INSERT INTO `permission_groups` VALUES (2, NULL, NULL, 'course', 2);
INSERT INTO `permission_groups` VALUES (3, NULL, NULL, 'attendance', 3);
INSERT INTO `permission_groups` VALUES (4, NULL, NULL, 'classes', 4);
INSERT INTO `permission_groups` VALUES (5, NULL, NULL, 'revision_notes', 5);
INSERT INTO `permission_groups` VALUES (6, NULL, NULL, 'blog', 6);
INSERT INTO `permission_groups` VALUES (7, NULL, NULL, 'files', 7);
INSERT INTO `permission_groups` VALUES (8, NULL, NULL, 'articles', 8);
INSERT INTO `permission_groups` VALUES (9, NULL, NULL, 'settings', 9);
INSERT INTO `permission_groups` VALUES (10, NULL, NULL, 'tests', 10);
INSERT INTO `permission_groups` VALUES (11, NULL, NULL, 'discussions', 11);
INSERT INTO `permission_groups` VALUES (12, NULL, NULL, 'certificates', 12);
INSERT INTO `permission_groups` VALUES (13, NULL, NULL, 'downloads', 13);
INSERT INTO `permission_groups` VALUES (14, NULL, NULL, 'miscellaneous', 14);
INSERT INTO `permission_groups` VALUES (15, NULL, NULL, 'homework', 15);
INSERT INTO `permission_groups` VALUES (16, NULL, NULL, 'reports', 16);
INSERT INTO `permission_groups` VALUES (17, NULL, NULL, 'survey', 17);
INSERT INTO `permission_groups` VALUES (18, NULL, NULL, 'video', 18);

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_group_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_unique`(`name`) USING BTREE,
  INDEX `permissions_permission_group_id_foreign`(`permission_group_id`) USING BTREE,
  CONSTRAINT `permissions_permission_group_id_foreign` FOREIGN KEY (`permission_group_id`) REFERENCES `permission_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 161 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES (1, NULL, NULL, 'view_students', 1);
INSERT INTO `permissions` VALUES (2, NULL, NULL, 'add_student', 1);
INSERT INTO `permissions` VALUES (3, NULL, NULL, 'view_student', 1);
INSERT INTO `permissions` VALUES (4, NULL, NULL, 'edit_student', 1);
INSERT INTO `permissions` VALUES (5, NULL, NULL, 'delete_student', 1);
INSERT INTO `permissions` VALUES (6, NULL, NULL, 'bulk_enroll', 1);
INSERT INTO `permissions` VALUES (7, NULL, NULL, 'enroll', 1);
INSERT INTO `permissions` VALUES (8, NULL, NULL, 'view_sessions', 2);
INSERT INTO `permissions` VALUES (9, NULL, NULL, 'add_session', 2);
INSERT INTO `permissions` VALUES (10, NULL, NULL, 'edit_session', 2);
INSERT INTO `permissions` VALUES (11, NULL, NULL, 'delete_session', 2);
INSERT INTO `permissions` VALUES (12, NULL, NULL, 'export_student', 2);
INSERT INTO `permissions` VALUES (13, NULL, NULL, 'export_student_attendance', 2);
INSERT INTO `permissions` VALUES (14, NULL, NULL, 'view_attendance_sheet', 2);
INSERT INTO `permissions` VALUES (15, NULL, NULL, 'set_attendance', 3);
INSERT INTO `permissions` VALUES (16, NULL, NULL, 'set_bulk_attendance', 3);
INSERT INTO `permissions` VALUES (17, NULL, NULL, 'set_import_attendance', 3);
INSERT INTO `permissions` VALUES (18, NULL, NULL, 'create_certificate_list', 3);
INSERT INTO `permissions` VALUES (19, NULL, NULL, 'set_attendance_dates', 3);
INSERT INTO `permissions` VALUES (20, NULL, NULL, 'view_classes', 4);
INSERT INTO `permissions` VALUES (21, NULL, NULL, 'add_class', 4);
INSERT INTO `permissions` VALUES (22, NULL, NULL, 'edit_class', 4);
INSERT INTO `permissions` VALUES (23, NULL, NULL, 'delete_class', 4);
INSERT INTO `permissions` VALUES (24, NULL, NULL, 'view_notes', 5);
INSERT INTO `permissions` VALUES (25, NULL, NULL, 'add_note', 5);
INSERT INTO `permissions` VALUES (26, NULL, NULL, 'edit_note', 5);
INSERT INTO `permissions` VALUES (27, NULL, NULL, 'delete_note', 5);
INSERT INTO `permissions` VALUES (28, NULL, NULL, 'view_blog', 6);
INSERT INTO `permissions` VALUES (29, NULL, NULL, 'add_blog', 6);
INSERT INTO `permissions` VALUES (30, NULL, NULL, 'edit_blog', 6);
INSERT INTO `permissions` VALUES (31, NULL, NULL, 'delete_blog', 6);
INSERT INTO `permissions` VALUES (32, NULL, NULL, 'manage_files', 7);
INSERT INTO `permissions` VALUES (33, NULL, NULL, 'view_articles', 8);
INSERT INTO `permissions` VALUES (34, NULL, NULL, 'add_article', 8);
INSERT INTO `permissions` VALUES (35, NULL, NULL, 'edit_article', 8);
INSERT INTO `permissions` VALUES (36, NULL, NULL, 'delete_article', 8);
INSERT INTO `permissions` VALUES (37, NULL, NULL, 'view_widgets', 9);
INSERT INTO `permissions` VALUES (38, NULL, NULL, 'create_widget', 9);
INSERT INTO `permissions` VALUES (39, NULL, NULL, 'delete_widget', 9);
INSERT INTO `permissions` VALUES (40, NULL, NULL, 'view_registration_fields', 9);
INSERT INTO `permissions` VALUES (41, NULL, NULL, 'add_registration_field', 9);
INSERT INTO `permissions` VALUES (42, NULL, NULL, 'delete_registration_field', 9);
INSERT INTO `permissions` VALUES (43, NULL, NULL, 'edit_registration_field', 9);
INSERT INTO `permissions` VALUES (44, NULL, NULL, 'edit_site_settings', 9);
INSERT INTO `permissions` VALUES (45, NULL, NULL, 'view_roles', 9);
INSERT INTO `permissions` VALUES (46, NULL, NULL, 'add_role', 9);
INSERT INTO `permissions` VALUES (47, NULL, NULL, 'edit_role', 9);
INSERT INTO `permissions` VALUES (48, NULL, NULL, 'delete_role', 9);
INSERT INTO `permissions` VALUES (49, NULL, NULL, 'view_payment_methods', 9);
INSERT INTO `permissions` VALUES (50, NULL, NULL, 'edit_payment_methods', 9);
INSERT INTO `permissions` VALUES (51, NULL, NULL, 'view_admins', 9);
INSERT INTO `permissions` VALUES (52, NULL, NULL, 'add_admin', 9);
INSERT INTO `permissions` VALUES (53, NULL, NULL, 'edit_admin', 9);
INSERT INTO `permissions` VALUES (54, NULL, NULL, 'view_transactions', 2);
INSERT INTO `permissions` VALUES (55, NULL, NULL, 'view_tests', 10);
INSERT INTO `permissions` VALUES (56, NULL, NULL, 'add_test', 10);
INSERT INTO `permissions` VALUES (57, NULL, NULL, 'add_options', 10);
INSERT INTO `permissions` VALUES (58, NULL, NULL, 'add_question', 10);
INSERT INTO `permissions` VALUES (59, NULL, NULL, 'delete_question', 10);
INSERT INTO `permissions` VALUES (60, NULL, NULL, 'delete_option', 10);
INSERT INTO `permissions` VALUES (61, NULL, NULL, 'duplicate_question', 10);
INSERT INTO `permissions` VALUES (62, NULL, NULL, 'edit_question', 10);
INSERT INTO `permissions` VALUES (63, NULL, NULL, 'edit_option', 10);
INSERT INTO `permissions` VALUES (64, NULL, NULL, 'export_result', 10);
INSERT INTO `permissions` VALUES (65, NULL, NULL, 'manage_questions', 10);
INSERT INTO `permissions` VALUES (66, NULL, NULL, 'view_results', 10);
INSERT INTO `permissions` VALUES (67, NULL, NULL, 'view_result', 10);
INSERT INTO `permissions` VALUES (68, NULL, NULL, 'view_payments', 2);
INSERT INTO `permissions` VALUES (69, NULL, NULL, 'view_discussions', 11);
INSERT INTO `permissions` VALUES (70, NULL, NULL, 'view_discussion', 11);
INSERT INTO `permissions` VALUES (71, NULL, NULL, 'reply_discussion', 11);
INSERT INTO `permissions` VALUES (72, NULL, NULL, 'delete_discussion', 11);
INSERT INTO `permissions` VALUES (73, NULL, NULL, 'view_instructors', 2);
INSERT INTO `permissions` VALUES (74, NULL, NULL, 'set_instructors', 2);
INSERT INTO `permissions` VALUES (75, NULL, NULL, 'upgrade_database', 9);
INSERT INTO `permissions` VALUES (76, NULL, NULL, 'view_certificates', 12);
INSERT INTO `permissions` VALUES (77, NULL, NULL, 'edit_certificate', 12);
INSERT INTO `permissions` VALUES (78, NULL, NULL, 'add_certificate', 12);
INSERT INTO `permissions` VALUES (79, NULL, NULL, 'delete_certificate', 12);
INSERT INTO `permissions` VALUES (80, NULL, NULL, 'view_downloads', 13);
INSERT INTO `permissions` VALUES (81, NULL, NULL, 'edit_download', 13);
INSERT INTO `permissions` VALUES (82, NULL, NULL, 'add_download', 13);
INSERT INTO `permissions` VALUES (83, NULL, NULL, 'delete_download', 13);
INSERT INTO `permissions` VALUES (84, NULL, NULL, 'global_resource_access', 14);
INSERT INTO `permissions` VALUES (85, NULL, NULL, 'add_course', 2);
INSERT INTO `permissions` VALUES (86, NULL, NULL, 'view_course_categories', 2);
INSERT INTO `permissions` VALUES (87, NULL, NULL, 'add_course_category', 2);
INSERT INTO `permissions` VALUES (88, NULL, NULL, 'edit_course_category', 2);
INSERT INTO `permissions` VALUES (89, NULL, NULL, 'delete_course_category', 2);
INSERT INTO `permissions` VALUES (90, NULL, NULL, 'view_class_groups', 4);
INSERT INTO `permissions` VALUES (91, NULL, NULL, 'add_class_group', 4);
INSERT INTO `permissions` VALUES (92, NULL, NULL, 'edit_class_group', 4);
INSERT INTO `permissions` VALUES (93, NULL, NULL, 'delete_class_group', 4);
INSERT INTO `permissions` VALUES (94, NULL, NULL, 'manage_class_downloads', 4);
INSERT INTO `permissions` VALUES (95, NULL, NULL, 'view_lectures', 4);
INSERT INTO `permissions` VALUES (96, NULL, NULL, 'add_lecture', 4);
INSERT INTO `permissions` VALUES (97, NULL, NULL, 'edit_lecture', 4);
INSERT INTO `permissions` VALUES (98, NULL, NULL, 'delete_lecture', 4);
INSERT INTO `permissions` VALUES (99, NULL, NULL, 'manage_lecture_downloads', 4);
INSERT INTO `permissions` VALUES (100, NULL, NULL, 'manage_lecture_content', 4);
INSERT INTO `permissions` VALUES (101, NULL, NULL, 'add_homework', 15);
INSERT INTO `permissions` VALUES (102, NULL, NULL, 'view_homework_list', 15);
INSERT INTO `permissions` VALUES (103, NULL, NULL, 'edit_homework', 15);
INSERT INTO `permissions` VALUES (104, NULL, NULL, 'view_homework', 15);
INSERT INTO `permissions` VALUES (105, NULL, NULL, 'delete_homework', 15);
INSERT INTO `permissions` VALUES (106, NULL, NULL, 'view_homework_submissions', 15);
INSERT INTO `permissions` VALUES (107, NULL, NULL, 'view_homework_submission', 15);
INSERT INTO `permissions` VALUES (108, NULL, NULL, 'export_homework_results', 15);
INSERT INTO `permissions` VALUES (109, NULL, NULL, 'view_themes', 9);
INSERT INTO `permissions` VALUES (110, NULL, NULL, 'customize_theme', 9);
INSERT INTO `permissions` VALUES (111, NULL, NULL, 'install_theme', 9);
INSERT INTO `permissions` VALUES (112, NULL, NULL, 'configure_sms_gateways', 9);
INSERT INTO `permissions` VALUES (113, NULL, NULL, 'edit_sms_gateway', 9);
INSERT INTO `permissions` VALUES (114, NULL, NULL, 'install_gateway', 9);
INSERT INTO `permissions` VALUES (115, NULL, NULL, 'uninstall_gateway', 9);
INSERT INTO `permissions` VALUES (116, NULL, NULL, 'view_forum_topics', 11);
INSERT INTO `permissions` VALUES (117, NULL, NULL, 'add_forum_topic', 11);
INSERT INTO `permissions` VALUES (118, NULL, NULL, 'view_forum_topic', 11);
INSERT INTO `permissions` VALUES (119, NULL, NULL, 'reply_forum_topic', 11);
INSERT INTO `permissions` VALUES (120, NULL, NULL, 'delete_forum_topic', 11);
INSERT INTO `permissions` VALUES (121, NULL, NULL, 'view_test_grades', 9);
INSERT INTO `permissions` VALUES (122, NULL, NULL, 'add_test_grade', 9);
INSERT INTO `permissions` VALUES (123, NULL, NULL, 'edit_test_grade', 9);
INSERT INTO `permissions` VALUES (124, NULL, NULL, 'delete_test_grade', 9);
INSERT INTO `permissions` VALUES (125, NULL, NULL, 'view_report_page', 16);
INSERT INTO `permissions` VALUES (126, NULL, NULL, 'view_class_report', 16);
INSERT INTO `permissions` VALUES (127, NULL, NULL, 'view_students_report', 16);
INSERT INTO `permissions` VALUES (128, NULL, NULL, 'view_tests_report', 16);
INSERT INTO `permissions` VALUES (129, NULL, NULL, 'view_homework_report', 16);
INSERT INTO `permissions` VALUES (130, NULL, NULL, 'view_email_notifications', 9);
INSERT INTO `permissions` VALUES (131, NULL, NULL, 'edit_email_notification', 9);
INSERT INTO `permissions` VALUES (132, NULL, NULL, 'view_sms_notifications', 9);
INSERT INTO `permissions` VALUES (133, NULL, NULL, 'edit_sms_notification', 9);
INSERT INTO `permissions` VALUES (134, NULL, NULL, 'view_coupons', 9);
INSERT INTO `permissions` VALUES (135, NULL, NULL, 'add_coupon', 9);
INSERT INTO `permissions` VALUES (136, NULL, NULL, 'edit_coupon', 9);
INSERT INTO `permissions` VALUES (137, NULL, NULL, 'delete_coupon', 9);
INSERT INTO `permissions` VALUES (138, NULL, NULL, 'manage_currencies', 9);
INSERT INTO `permissions` VALUES (139, NULL, NULL, 'delete_currencies', 9);
INSERT INTO `permissions` VALUES (140, NULL, NULL, 'view_surveys', 17);
INSERT INTO `permissions` VALUES (141, NULL, NULL, 'add_survey', 17);
INSERT INTO `permissions` VALUES (142, NULL, NULL, 'add_survey_options', 17);
INSERT INTO `permissions` VALUES (143, NULL, NULL, 'add_survey_question', 17);
INSERT INTO `permissions` VALUES (144, NULL, NULL, 'delete_survey_question', 17);
INSERT INTO `permissions` VALUES (145, NULL, NULL, 'delete_survey_option', 17);
INSERT INTO `permissions` VALUES (146, NULL, NULL, 'duplicate_survey_question', 17);
INSERT INTO `permissions` VALUES (147, NULL, NULL, 'edit_survey_question', 17);
INSERT INTO `permissions` VALUES (148, NULL, NULL, 'edit_survey_option', 17);
INSERT INTO `permissions` VALUES (149, NULL, NULL, 'export_survey_result', 17);
INSERT INTO `permissions` VALUES (150, NULL, NULL, 'manage_survey_questions', 17);
INSERT INTO `permissions` VALUES (151, NULL, NULL, 'view_survey_results', 17);
INSERT INTO `permissions` VALUES (152, NULL, NULL, 'view_survey_result', 17);
INSERT INTO `permissions` VALUES (153, NULL, NULL, 'message_students', 1);
INSERT INTO `permissions` VALUES (154, NULL, NULL, 'view_videos', 18);
INSERT INTO `permissions` VALUES (155, NULL, NULL, 'add_video', 18);
INSERT INTO `permissions` VALUES (156, NULL, NULL, 'edit_video', 18);
INSERT INTO `permissions` VALUES (157, NULL, NULL, 'delete_video', 18);
INSERT INTO `permissions` VALUES (158, NULL, NULL, 'play_video', 18);
INSERT INTO `permissions` VALUES (159, NULL, NULL, 'view_video_space', 18);
INSERT INTO `permissions` VALUES (160, '2024-03-29 17:18:07', '2024-03-29 17:18:07', 'manage_blog_categories', 6);

-- ----------------------------
-- Table structure for related_courses
-- ----------------------------
DROP TABLE IF EXISTS `related_courses`;
CREATE TABLE `related_courses`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `related_course_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `related_courses_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `related_courses_related_course_id_foreign`(`related_course_id`) USING BTREE,
  CONSTRAINT `related_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `related_courses_related_course_id_foreign` FOREIGN KEY (`related_course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of related_courses
-- ----------------------------

-- ----------------------------
-- Table structure for revision_notes
-- ----------------------------
DROP TABLE IF EXISTS `revision_notes`;
CREATE TABLE `revision_notes`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `lesson_id` bigint UNSIGNED NULL DEFAULT NULL,
  `admin_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `revision_notes_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `revision_notes_lesson_id_foreign`(`lesson_id`) USING BTREE,
  INDEX `revision_notes_admin_id_foreign`(`admin_id`) USING BTREE,
  CONSTRAINT `revision_notes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `revision_notes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `revision_notes_lesson_id_foreign` FOREIGN KEY (`lesson_id`) REFERENCES `lessons` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of revision_notes
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, '2024-03-29 17:17:57', '2024-03-29 17:17:57', 'Admin');
INSERT INTO `roles` VALUES (2, '2024-03-29 17:17:57', '2024-03-29 17:17:57', 'Student');

-- ----------------------------
-- Table structure for settings
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `key` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeholder` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `class` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sort_order` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 119 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES (1, NULL, '2024-03-29 17:18:08', 'general_site_name', NULL, 'ITS-TNI', 'text', '', '', NULL);
INSERT INTO `settings` VALUES (2, NULL, '2024-03-29 17:18:10', 'regis_enable_registration', NULL, '1', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (3, NULL, '2024-03-29 17:18:08', 'general_homepage_title', NULL, 'ITS-TNI', 'text', '', '', NULL);
INSERT INTO `settings` VALUES (4, NULL, NULL, 'general_homepage_meta_desc', NULL, NULL, 'textarea', '', '', NULL);
INSERT INTO `settings` VALUES (5, NULL, '2024-03-29 17:18:08', 'general_admin_email', NULL, 'info@email.com', 'text', '', '', NULL);
INSERT INTO `settings` VALUES (6, NULL, NULL, 'color_navbar', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (7, NULL, NULL, 'color_primary_color', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (8, NULL, NULL, 'color_navtext', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (9, NULL, NULL, 'color_footer', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (10, NULL, NULL, 'color_footertext', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (11, NULL, '2024-03-29 17:18:08', 'image_logo', NULL, 'usermedia/47bd8c8d287f72d255fed09ad053c7ff.png', 'hidden', '', '', NULL);
INSERT INTO `settings` VALUES (12, NULL, NULL, 'regis_registration_instructions', NULL, NULL, 'textarea', '', 'rte', NULL);
INSERT INTO `settings` VALUES (13, NULL, NULL, 'footer_about', NULL, NULL, 'textarea', '', 'rte', NULL);
INSERT INTO `settings` VALUES (14, NULL, NULL, 'footer_address', NULL, NULL, 'textarea', '', '', NULL);
INSERT INTO `settings` VALUES (15, NULL, NULL, 'footer_email', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (16, NULL, NULL, 'footer_tel', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (17, NULL, '2024-03-29 17:18:08', 'image_icon', NULL, 'usermedia/favicon.png', 'hidden', '', '', NULL);
INSERT INTO `settings` VALUES (18, NULL, '2024-03-29 17:18:04', 'country_id', NULL, '106', 'select', '', '', NULL);
INSERT INTO `settings` VALUES (20, NULL, NULL, 'general_ssl', NULL, '0', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (21, NULL, NULL, 'footer_newsletter_code', NULL, NULL, 'textarea', '', '', NULL);
INSERT INTO `settings` VALUES (22, NULL, NULL, 'footer_credits', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (23, NULL, NULL, 'general_header_scripts', NULL, NULL, 'textarea', '', '', NULL);
INSERT INTO `settings` VALUES (24, NULL, NULL, 'general_foot_scripts', NULL, 'ITS-TNI @ 2024', 'textarea', '', '', NULL);
INSERT INTO `settings` VALUES (25, NULL, '2024-03-29 17:18:08', 'menu_show_courses', NULL, '1', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (26, NULL, '2024-03-29 17:18:08', 'menu_show_sessions', NULL, '1', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (30, NULL, NULL, 'footer_show_sicons', NULL, NULL, 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (31, NULL, NULL, 'footer_show_newsletter', NULL, NULL, 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (32, NULL, NULL, 'footer_show_about', NULL, NULL, 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (33, NULL, NULL, 'footer_show_contact', NULL, NULL, 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (34, NULL, NULL, 'regis_email_message', NULL, NULL, 'textarea', '', 'rte', NULL);
INSERT INTO `settings` VALUES (35, NULL, NULL, 'color_page_title', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (36, NULL, NULL, 'color_page_title_text', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (37, NULL, NULL, 'regis_enrollment_alert', NULL, '0', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (38, NULL, NULL, 'regis_signup_alert', NULL, '0', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (39, NULL, NULL, 'general_disqus', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (40, NULL, NULL, 'label_enroll', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (41, NULL, NULL, 'label_discussion', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (42, NULL, NULL, 'label_classes_attended', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (43, NULL, NULL, 'label_revision_notes', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (44, NULL, NULL, 'label_take_test', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (45, NULL, NULL, 'label_classes', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (46, NULL, NULL, 'label_sessions', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (47, NULL, NULL, 'label_blog', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (48, NULL, NULL, 'label_contact_us', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (49, NULL, NULL, 'label_about_us', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (50, NULL, NULL, 'label_follow_us', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (51, NULL, NULL, 'general_discussion_instructions', NULL, NULL, 'textarea', '', 'rte', NULL);
INSERT INTO `settings` VALUES (52, NULL, NULL, 'mail_protocol', NULL, 'mail', 'select', 'mail=Mail,smtp=SMTP', '', NULL);
INSERT INTO `settings` VALUES (53, NULL, NULL, 'mail_smtp_host', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (54, NULL, NULL, 'mail_smtp_username', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (55, NULL, NULL, 'mail_smtp_password', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (56, NULL, NULL, 'mail_smtp_port', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (57, NULL, NULL, 'mail_smtp_timeout', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (58, NULL, NULL, 'general_show_fee', NULL, '0', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (59, NULL, '2024-03-29 17:18:08', 'menu_show_discussions', NULL, '1', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (60, NULL, '2024-03-29 17:18:08', 'menu_show_tests', NULL, '1', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (61, NULL, '2024-03-29 17:18:08', 'menu_show_notes', NULL, '1', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (63, NULL, NULL, 'general_site_ip', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (64, NULL, NULL, 'general_send_reminder', NULL, '0', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (65, NULL, NULL, 'general_reminder_days', NULL, NULL, 'text', '', 'number', NULL);
INSERT INTO `settings` VALUES (66, NULL, NULL, 'general_timezone', NULL, 'UTC', 'select', 'Australia/Adelaide,Australia/Broken_Hill,Australia/Darwin,Australia/North,Australia/South,Australia/Yancowinna,America/Porto_Acre,Australia/Adelaide,America/Eirunepe,America/Rio_Branco,Brazil/Acre,Asia/Jayapura,Australia/Broken_Hill,Australia/Darwin,Australia/North,Australia/South,Australia/Yancowinna,America/Porto_Acre,America/Eirunepe,America/Rio_Branco,Brazil/Acre,Australia/Eucla,Australia/Eucla,America/Goose_Bay,America/Pangnirtung,America/Halifax,America/Barbados,America/Blanc-Sablon,America/Glace_Bay,America/Goose_Bay,America/Martinique,America/Moncton,America/Pangnirtung,America/Thule,Atlantic/Bermuda,Canada/Atlantic,Asia/Baghdad,Australia/Melbourne,Antarctica/Macquarie,Australia/ACT,Australia/Brisbane,Australia/Canberra,Australia/Currie,Australia/Hobart,Australia/Lindeman,Australia/NSW,Australia/Queensland,Australia/Sydney,Australia/Tasmania,Australia/Victoria,Australia/Melbourne,Antarctica/Macquarie,Australia/ACT,Australia/Brisbane,Australia/Canberra,Australia/Currie,Australia/Hobart,Australia/LHI,Australia/Lindeman,Australia/Lord_Howe,Australia/NSW,Australia/Queensland,Australia/Sydney,Australia/Tasmania,Australia/Victoria,Asia/Kabul,Asia/Kabul,America/Anchorage,America/Anchorage,America/Adak,America/Atka,America/Anchorage,America/Juneau,America/Nome,America/Sitka,America/Yakutat,America/Anchorage,America/Juneau,America/Nome,America/Sitka,America/Yakutat,Asia/Aqtobe,Asia/Aqtobe,Asia/Aqtobe,Asia/Aqtobe,Asia/Almaty,Asia/Almaty,Asia/Almaty,Asia/Yerevan,Asia/Yerevan,America/Boa_Vista,America/Campo_Grande,America/Cuiaba,America/Manaus,America/Porto_Velho,America/Santarem,Brazil/West,Asia/Yerevan,Asia/Yerevan,America/Asuncion,America/Boa_Vista,America/Campo_Grande,America/Cuiaba,America/Eirunepe,America/Manaus,America/Porto_Acre,America/Porto_Velho,America/Rio_Branco,America/Santarem,Brazil/Acre,Brazil/West,Europe/Amsterdam,Europe/Athens,Asia/Anadyr,Asia/Anadyr,Asia/Anadyr,Asia/Anadyr,Asia/Anadyr,Asia/Anadyr,America/Curacao,America/Aruba,America/Kralendijk,America/Lower_Princes,America/Halifax,America/Blanc-Sablon,America/Glace_Bay,America/Moncton,America/Pangnirtung,America/Puerto_Rico,Canada/Atlantic,Asia/Aqtau,Asia/Aqtau,Asia/Aqtobe,Asia/Aqtau,Asia/Aqtau,Asia/Aqtobe,America/Buenos_Aires,America/Buenos_Aires,America/Argentina/Buenos_Aires,America/Argentina/Catamarca,America/Argentina/ComodRivadavia,America/Argentina/Cordoba,America/Argentina/Jujuy,America/Argentina/La_Rioja,America/Argentina/Mendoza,America/Argentina/Rio_Gallegos,America/Argentina/Salta,America/Argentina/San_Juan,America/Argentina/San_Luis,America/Argentina/Tucuman,America/Argentina/Ushuaia,America/Catamarca,America/Cordoba,America/Jujuy,America/Mendoza,America/Rosario,Antarctica/Palmer,America/Argentina/Buenos_Aires,America/Argentina/Catamarca,America/Argentina/ComodRivadavia,America/Argentina/Cordoba,America/Argentina/Jujuy,America/Argentina/La_Rioja,America/Argentina/Mendoza,America/Argentina/Rio_Gallegos,America/Argentina/Salta,America/Argentina/San_Juan,America/Argentina/San_Luis,America/Argentina/Tucuman,America/Argentina/Ushuaia,America/Catamarca,America/Cordoba,America/Jujuy,America/Mendoza,America/Rosario,Antarctica/Palmer,America/Buenos_Aires,America/Buenos_Aires,America/Argentina/Buenos_Aires,America/Argentina/Catamarca,America/Argentina/ComodRivadavia,America/Argentina/Cordoba,America/Argentina/Jujuy,America/Argentina/La_Rioja,America/Argentina/Mendoza,America/Argentina/Rio_Gallegos,America/Argentina/Salta,America/Argentina/San_Juan,America/Argentina/San_Luis,America/Argentina/Tucuman,America/Argentina/Ushuaia,America/Catamarca,America/Cordoba,America/Jujuy,America/Mendoza,America/Rosario,Antarctica/Palmer,America/Argentina/Buenos_Aires,America/Argentina/Catamarca,America/Argentina/ComodRivadavia,America/Argentina/Cordoba,America/Argentina/Jujuy,America/Argentina/La_Rioja,America/Argentina/Mendoza,America/Argentina/Rio_Gallegos,America/Argentina/Salta,America/Argentina/San_Juan,America/Argentina/San_Luis,America/Argentina/Tucuman,America/Argentina/Ushuaia,America/Catamarca,America/Cordoba,America/Jujuy,America/Mendoza,America/Rosario,Antarctica/Palmer,Asia/Ashkhabad,Asia/Ashkhabad,Asia/Ashgabat,Asia/Ashgabat,Asia/Ashkhabad,Asia/Ashkhabad,Asia/Ashgabat,Asia/Ashgabat,Asia/Riyadh,America/Anguilla,America/Antigua,America/Aruba,America/Barbados,America/Blanc-Sablon,America/Curacao,America/Dominica,America/Glace_Bay,America/Goose_Bay,America/Grand_Turk,America/Grenada,America/Guadeloupe,America/Halifax,America/Kralendijk,America/Lower_Princes,America/Marigot,America/Martinique,America/Miquelon,America/Moncton,America/Montserrat,America/Pangnirtung,America/Port_of_Spain,America/Puerto_Rico,America/Santo_Domingo,America/St_Barthelemy,America/St_Kitts,America/St_Lucia,America/St_Thomas,America/St_Vincent,America/Thule,America/Tortola,America/Virgin,Atlantic/Bermuda,Canada/Atlantic,Asia/Aden,Asia/Baghdad,Asia/Bahrain,Asia/Kuwait,Asia/Qatar,Australia/Perth,Australia/West,Australia/Perth,Antarctica/Casey,Australia/West,America/Halifax,America/Blanc-Sablon,America/Glace_Bay,America/Moncton,America/Pangnirtung,America/Puerto_Rico,Canada/Atlantic,Atlantic/Azores,Atlantic/Azores,Atlantic/Azores,Atlantic/Azores,Atlantic/Azores,Asia/Baku,Asia/Baku,Asia/Baku,Asia/Baku,Asia/Baku,Asia/Baku,Asia/Baku,Asia/Baku,Europe/London,Asia/Dacca,Asia/Dhaka,Europe/Belfast,Europe/Gibraltar,Europe/Guernsey,Europe/Isle_of_Man,Europe/Jersey,GB,America/Adak,Asia/Dacca,America/Atka,America/Nome,Asia/Dhaka,Africa/Mogadishu,Africa/Addis_Ababa,Africa/Asmara,Africa/Asmera,Africa/Dar_es_Salaam,Africa/Djibouti,Africa/Kampala,Africa/Nairobi,Indian/Antananarivo,Indian/Comoro,Indian/Mayotte,Africa/Nairobi,Africa/Addis_Ababa,Africa/Asmara,Africa/Asmera,Africa/Dar_es_Salaam,Africa/Djibouti,Africa/Kampala,Africa/Mogadishu,Indian/Antananarivo,Indian/Comoro,Indian/Mayotte,America/Barbados,Europe/Tiraspol,America/Bogota,Asia/Baghdad,Asia/Bangkok,Asia/Phnom_Penh,Asia/Vientiane,Asia/Jakarta,Europe/Bucharest,Europe/Chisinau,Asia/Brunei,Asia/Brunei,Asia/Kuching,Asia/Kuching,Asia/Kuching,America/La_Paz,America/La_Paz,America/Sao_Paulo,America/Araguaina,America/Bahia,America/Belem,America/Fortaleza,America/Maceio,America/Recife,Brazil/East,America/Sao_Paulo,America/Araguaina,America/Bahia,America/Belem,America/Fortaleza,America/Maceio,America/Recife,America/Santarem,Brazil/East,Europe/London,Europe/London,America/Adak,America/Atka,America/Nome,Pacific/Midway,Pacific/Pago_Pago,Pacific/Samoa,Europe/Belfast,Europe/Guernsey,Europe/Isle_of_Man,Europe/Jersey,GB,Europe/Belfast,Europe/Dublin,Europe/Gibraltar,Europe/Guernsey,Europe/Isle_of_Man,Europe/Jersey,GB,Pacific/Bougainville,Asia/Thimbu,Asia/Thimphu,Asia/Kolkata,Asia/Calcutta,Asia/Dacca,Asia/Dhaka,Asia/Rangoon,Atlantic/Canary,America/Anchorage,Australia/Adelaide,Africa/Juba,Africa/Khartoum,Antarctica/Casey,America/Anchorage,Africa/Khartoum,Africa/Blantyre,Africa/Bujumbura,Africa/Gaborone,Africa/Harare,Africa/Juba,Africa/Kigali,Africa/Lubumbashi,Africa/Lusaka,Africa/Maputo,Africa/Windhoek,America/Anchorage,Indian/Cocos,America/Rankin_Inlet,America/Resolute,America/Chicago,Asia/Shanghai,America/Havana,America/Atikokan,America/Bahia_Banderas,America/Belize,America/Cambridge_Bay,America/Cancun,America/Chihuahua,America/Coral_Harbour,America/Costa_Rica,America/El_Salvador,America/Fort_Wayne,America/Guatemala,America/Indiana/Indianapolis,America/Indiana/Knox,America/Indiana/Marengo,America/Indiana/Petersburg,America/Indiana/Tell_City,America/Indiana/Vevay,America/Indiana/Vincennes,America/Indiana/Winamac,America/Indianapolis,America/Iqaluit,America/Kentucky/Louisville,America/Kentucky/Monticello,America/Knox_IN,America/Louisville,America/Managua,America/Matamoros,America/Menominee,America/Merida,America/Mexico_City,America/Monterrey,America/North_Dakota/Beulah,America/North_Dakota/Center,America/North_Dakota/New_Salem,America/Ojinaga,America/Pangnirtung,America/Rainy_River,America/Rankin_Inlet,America/Resolute,America/Tegucigalpa,America/Winnipeg,Canada/Central,Mexico/General,Asia/Chongqing,Asia/Chungking,Asia/Harbin,Asia/Taipei,PRC,ROC,Europe/Berlin,Europe/Berlin,Europe/Kaliningrad,Africa/Algiers,Africa/Ceuta,Africa/Tripoli,Africa/Tunis,Antarctica/Troll,Arctic/Longyearbyen,Atlantic/Jan_Mayen,Europe/Amsterdam,Europe/Andorra,Europe/Athens,Europe/Belgrade,Europe/Bratislava,Europe/Brussels,Europe/Budapest,Europe/Busingen,Europe/Chisinau,Europe/Copenhagen,Europe/Gibraltar,Europe/Kaliningrad,Europe/Kiev,Europe/Lisbon,Europe/Ljubljana,Europe/Luxembourg,Europe/Madrid,Europe/Malta,Europe/Minsk,Europe/Monaco,Europe/Oslo,Europe/Paris,Europe/Podgorica,Europe/Prague,Europe/Riga,Europe/Rome,Europe/San_Marino,Europe/Sarajevo,Europe/Simferopol,Europe/Skopje,Europe/Sofia,Europe/Stockholm,Europe/Tallinn,Europe/Tirane,Europe/Tiraspol,Europe/Uzhgorod,Europe/Vaduz,Europe/Vatican,Europe/Vienna,Europe/Vilnius,Europe/Warsaw,Europe/Zagreb,Europe/Zaporozhye,Europe/Zurich,Europe/Berlin,Europe/Kaliningrad,Africa/Algiers,Africa/Casablanca,Africa/Ceuta,Africa/Tripoli,Africa/Tunis,Arctic/Longyearbyen,Atlantic/Jan_Mayen,Europe/Amsterdam,Europe/Andorra,Europe/Athens,Europe/Belgrade,Europe/Bratislava,Europe/Brussels,Europe/Budapest,Europe/Busingen,Europe/Chisinau,Europe/Copenhagen,Europe/Gibraltar,Europe/Kaliningrad,Europe/Kiev,Europe/Lisbon,Europe/Ljubljana,Europe/Luxembourg,Europe/Madrid,Europe/Malta,Europe/Minsk,Europe/Monaco,Europe/Oslo,Europe/Paris,Europe/Podgorica,Europe/Prague,Europe/Riga,Europe/Rome,Europe/San_Marino,Europe/Sarajevo,Europe/Simferopol,Europe/Skopje,Europe/Sofia,Europe/Stockholm,Europe/Tallinn,Europe/Tirane,Europe/Tiraspol,Europe/Uzhgorod,Europe/Vaduz,Europe/Vatican,Europe/Vienna,Europe/Vilnius,Europe/Warsaw,Europe/Zagreb,Europe/Zaporozhye,Europe/Zurich,America/Scoresbysund,America/Scoresbysund,Pacific/Chatham,Pacific/Chatham,Pacific/Chatham,America/Belize,Asia/Choibalsan,Asia/Choibalsan,Asia/Choibalsan,Asia/Choibalsan,Pacific/Chuuk,Pacific/Truk,Pacific/Yap,Pacific/Rarotonga,Pacific/Rarotonga,Pacific/Rarotonga,America/Santiago,America/Santiago,Antarctica/Palmer,Chile/Continental,Chile/Continental,America/Santiago,America/Santiago,America/Santiago,Antarctica/Palmer,Chile/Continental,Antarctica/Palmer,Chile/Continental,Chile/Continental,America/Argentina/Buenos_Aires,America/Argentina/Catamarca,America/Argentina/ComodRivadavia,America/Argentina/Cordoba,America/Argentina/Jujuy,America/Argentina/La_Rioja,America/Argentina/Mendoza,America/Argentina/Rio_Gallegos,America/Argentina/Salta,America/Argentina/San_Juan,America/Argentina/San_Luis,America/Argentina/Tucuman,America/Argentina/Ushuaia,America/Buenos_Aires,America/Catamarca,America/Cordoba,America/Jujuy,America/Mendoza,America/Rosario,America/Caracas,America/La_Paz,America/Cayman,America/Panama,Europe/Chisinau,Europe/Tiraspol,America/Bogota,America/Bogota,America/Chicago,America/Atikokan,America/Coral_Harbour,America/Fort_Wayne,America/Indiana/Indianapolis,America/Indiana/Knox,America/Indiana/Marengo,America/Indiana/Petersburg,America/Indiana/Tell_City,America/Indiana/Vevay,America/Indiana/Vincennes,America/Indiana/Winamac,America/Indianapolis,America/Kentucky/Louisville,America/Kentucky/Monticello,America/Knox_IN,America/Louisville,America/Menominee,America/Rainy_River,America/Winnipeg,Canada/Central,America/Chicago,America/Havana,America/Atikokan,America/Bahia_Banderas,America/Belize,America/Cambridge_Bay,America/Cancun,America/Chihuahua,America/Coral_Harbour,America/Costa_Rica,America/Detroit,America/El_Salvador,America/Fort_Wayne,America/Guatemala,America/Hermosillo,America/Indiana/Indianapolis,America/Indiana/Knox,America/Indiana/Marengo,America/Indiana/Petersburg,America/Indiana/Tell_City,America/Indiana/Vevay,America/Indiana/Vincennes,America/Indiana/Winamac,America/Indianapolis,America/Iqaluit,America/Kentucky/Louisville,America/Kentucky/Monticello,America/Knox_IN,America/Louisville,America/Managua,America/Matamoros,America/Mazatlan,America/Menominee,America/Merida,America/Mexico_City,America/Monterrey,America/North_Dakota/Beulah,America/North_Dakota/Center,America/North_Dakota/New_Salem,America/Ojinaga,America/Pangnirtung,America/Rainy_River,America/Rankin_Inlet,America/Regina,America/Resolute,America/Swift_Current,America/Tegucigalpa,America/Thunder_Bay,America/Winnipeg,Canada/Central,Canada/East-Saskatchewan,Canada/Saskatchewan,Mexico/BajaSur,Mexico/General,Asia/Chongqing,Asia/Chungking,Asia/Harbin,Asia/Macao,Asia/Macau,Asia/Shanghai,Asia/Taipei,PRC,ROC,Europe/Zaporozhye,Atlantic/Cape_Verde,Atlantic/Cape_Verde,Atlantic/Cape_Verde,America/Chicago,America/Atikokan,America/Coral_Harbour,America/Fort_Wayne,America/Indiana/Indianapolis,America/Indiana/Knox,America/Indiana/Marengo,America/Indiana/Petersburg,America/Indiana/Tell_City,America/Indiana/Vevay,America/Indiana/Vincennes,America/Indiana/Winamac,America/Indianapolis,America/Kentucky/Louisville,America/Kentucky/Monticello,America/Knox_IN,America/Louisville,America/Menominee,America/Mexico_City,America/Rainy_River,America/Winnipeg,Canada/Central,Mexico/General,Indian/Christmas,Pacific/Guam,Pacific/Saipan,Asia/Dacca,Asia/Dhaka,Antarctica/Davis,Antarctica/Davis,Antarctica/DumontDUrville,Europe/Dublin,Asia/Dushanbe,Asia/Dushanbe,Asia/Dushanbe,Asia/Dushanbe,Chile/EasterIsland,Chile/EasterIsland,Pacific/Easter,Pacific/Easter,Chile/EasterIsland,Chile/EasterIsland,Chile/EasterIsland,Pacific/Easter,Pacific/Easter,Pacific/Easter,Africa/Khartoum,Africa/Addis_Ababa,Africa/Asmara,Africa/Asmera,Africa/Dar_es_Salaam,Africa/Djibouti,Africa/Juba,Africa/Kampala,Africa/Mogadishu,Africa/Nairobi,Indian/Antananarivo,Indian/Comoro,Indian/Mayotte,America/Guayaquil,Pacific/Galapagos,America/Iqaluit,America/New_York,America/Cancun,America/Detroit,America/Fort_Wayne,America/Grand_Turk,America/Indiana/Indianapolis,America/Indiana/Marengo,America/Indiana/Petersburg,America/Indiana/Tell_City,America/Indiana/Vevay,America/Indiana/Vincennes,America/Indiana/Winamac,America/Indianapolis,America/Iqaluit,America/Jamaica,America/Kentucky/Louisville,America/Kentucky/Monticello,America/Louisville,America/Montreal,America/Nassau,America/Nipigon,America/Pangnirtung,America/Port-au-Prince,America/Santo_Domingo,America/Thunder_Bay,America/Toronto,Canada/Eastern,Europe/Helsinki,Africa/Cairo,Asia/Amman,Asia/Beirut,Asia/Damascus,Asia/Gaza,Asia/Hebron,Asia/Istanbul,Asia/Nicosia,Europe/Athens,Europe/Bucharest,Europe/Chisinau,Europe/Istanbul,Europe/Kaliningrad,Europe/Kiev,Europe/Mariehamn,Europe/Minsk,Europe/Moscow,Europe/Nicosia,Europe/Riga,Europe/Samara,Europe/Simferopol,Europe/Sofia,Europe/Tallinn,Europe/Tiraspol,Europe/Uzhgorod,Europe/Vilnius,Europe/Warsaw,Europe/Zaporozhye,Europe/Helsinki,Asia/Gaza,Asia/Hebron,Africa/Cairo,Africa/Tripoli,Asia/Amman,Asia/Beirut,Asia/Damascus,Asia/Gaza,Asia/Hebron,Asia/Istanbul,Asia/Nicosia,Europe/Athens,Europe/Bucharest,Europe/Chisinau,Europe/Istanbul,Europe/Kaliningrad,Europe/Kiev,Europe/Mariehamn,Europe/Minsk,Europe/Moscow,Europe/Nicosia,Europe/Riga,Europe/Simferopol,Europe/Sofia,Europe/Tallinn,Europe/Tiraspol,Europe/Uzhgorod,Europe/Vilnius,Europe/Warsaw,Europe/Zaporozhye,America/Scoresbysund,America/Scoresbysund,America/Santo_Domingo,Chile/EasterIsland,Pacific/Easter,America/New_York,America/Detroit,America/Iqaluit,America/Montreal,America/Nipigon,America/Thunder_Bay,America/Toronto,Canada/Eastern,America/New_York,America/Atikokan,America/Cambridge_Bay,America/Cancun,America/Cayman,America/Chicago,America/Coral_Harbour,America/Detroit,America/Fort_Wayne,America/Grand_Turk,America/Indiana/Indianapolis,America/Indiana/Knox,America/Indiana/Marengo,America/Indiana/Petersburg,America/Indiana/Tell_City,America/Indiana/Vevay,America/Indiana/Vincennes,America/Indiana/Winamac,America/Indianapolis,America/Iqaluit,America/Jamaica,America/Kentucky/Louisville,America/Kentucky/Monticello,America/Knox_IN,America/Louisville,America/Managua,America/Menominee,America/Merida,America/Moncton,America/Montreal,America/Nassau,America/Nipigon,America/Panama,America/Pangnirtung,America/Port-au-Prince,America/Rankin_Inlet,America/Resolute,America/Santo_Domingo,America/Thunder_Bay,America/Toronto,Canada/Eastern,America/New_York,America/Detroit,America/Iqaluit,America/Montreal,America/Nipigon,America/Thunder_Bay,America/Toronto,Canada/Eastern,Europe/Kaliningrad,Europe/Minsk,America/Martinique,Pacific/Fiji,Pacific/Fiji,Atlantic/Stanley,Atlantic/Stanley,Atlantic/Stanley,Atlantic/Stanley,Atlantic/Stanley,Atlantic/Madeira,America/Noronha,Brazil/DeNoronha,America/Noronha,Brazil/DeNoronha,Asia/Aqtau,Asia/Aqtau,Asia/Bishkek,Asia/Bishkek,Asia/Bishkek,Asia/Bishkek,Pacific/Galapagos,Pacific/Gambier,America/Guyana,Asia/Tbilisi,Asia/Tbilisi,Asia/Tbilisi,Asia/Tbilisi,America/Cayenne,America/Cayenne,Africa/Accra,Pacific/Tarawa,Africa/Abidjan,Africa/Accra,Africa/Bamako,Africa/Banjul,Africa/Bissau,Africa/Conakry,Africa/Dakar,Africa/Freetown,Africa/Lome,Africa/Monrovia,Africa/Nouakchott,Africa/Ouagadougou,Africa/Sao_Tome,Africa/Timbuktu,America/Danmarkshavn,Atlantic/Reykjavik,Atlantic/St_Helena,Etc/GMT,Etc/Greenwich,Europe/Belfast,Europe/Dublin,Europe/Gibraltar,Europe/Guernsey,Europe/Isle_of_Man,Europe/Jersey,Europe/London,GB,Asia/Dubai,Atlantic/South_Georgia,Asia/Bahrain,Asia/Muscat,Asia/Qatar,Pacific/Guam,Pacific/Saipan,America/Guyana,America/Guyana,America/Guyana,America/Adak,America/Atka,America/Adak,America/Atka,Pacific/Honolulu,Pacific/Johnston,Asia/Hong_Kong,Asia/Hong_Kong,America/Havana,Atlantic/Azores,Asia/Calcutta,Asia/Dacca,Asia/Dhaka,Asia/Kolkata,Europe/Helsinki,Europe/Mariehamn,Asia/Hovd,Asia/Hovd,Asia/Hovd,Pacific/Honolulu,Pacific/Honolulu,Pacific/Johnston,Pacific/Johnston,Asia/Bangkok,Asia/Ho_Chi_Minh,Asia/Phnom_Penh,Asia/Saigon,Asia/Vientiane,Asia/Jerusalem,Asia/Tel_Aviv,Asia/Jerusalem,Asia/Gaza,Asia/Hebron,Asia/Tel_Aviv,Asia/Ho_Chi_Minh,Asia/Saigon,Asia/Colombo,Asia/Irkutsk,Asia/Istanbul,Europe/Istanbul,Indian/Chagos,Indian/Chagos,Asia/Tehran,Asia/Tehran,Asia/Irkutsk,Asia/Irkutsk,Asia/Irkutsk,Asia/Irkutsk,Asia/Irkutsk,Asia/Chita,Asia/Tehran,Asia/Tehran,Atlantic/Reykjavik,Asia/Jerusalem,Atlantic/Reykjavik,Asia/Calcutta,Asia/Colombo,Asia/Dacca,Asia/Dhaka,Asia/Karachi,Asia/Kathmandu,Asia/Katmandu,Asia/Kolkata,Asia/Thimbu,Asia/Thimphu,Europe/Dublin,Asia/Calcutta,Asia/Colombo,Asia/Karachi,Asia/Kolkata,Europe/Dublin,Europe/Dublin,Asia/Gaza,Asia/Hebron,Asia/Tel_Aviv,Asia/Jakarta,Asia/Pyongyang,Asia/Sakhalin,Asia/Seoul,Asia/Tokyo,ROK,Asia/Tokyo,Asia/Jerusalem,Asia/Tel_Aviv,Asia/Tokyo,Asia/Dili,Asia/Ho_Chi_Minh,Asia/Hong_Kong,Asia/Jakarta,Asia/Kuala_Lumpur,Asia/Kuching,Asia/Makassar,Asia/Manila,Asia/Pontianak,Asia/Pyongyang,Asia/Rangoon,Asia/Saigon,Asia/Sakhalin,Asia/Seoul,Asia/Singapore,Asia/Taipei,Asia/Ujung_Pandang,Pacific/Bougainville,Pacific/Nauru,ROC,ROK,Asia/Taipei,ROC,Asia/Karachi,Asia/Seoul,Asia/Seoul,ROK,ROK,Asia/Bishkek,Asia/Bishkek,Asia/Bishkek,Asia/Qyzylorda,Asia/Qyzylorda,Asia/Qyzylorda,Asia/Qyzylorda,Europe/Vilnius,America/Grand_Turk,America/Jamaica,Europe/Kiev,Pacific/Kosrae,Pacific/Kosrae,Asia/Krasnoyarsk,Asia/Krasnoyarsk,Asia/Novokuznetsk,Asia/Novokuznetsk,Asia/Krasnoyarsk,Asia/Krasnoyarsk,Asia/Krasnoyarsk,Asia/Novokuznetsk,Asia/Novokuznetsk,Asia/Seoul,Asia/Pyongyang,Asia/Seoul,Asia/Pyongyang,ROK,ROK,Europe/Samara,Europe/Samara,Europe/Samara,Pacific/Kwajalein,Australia/LHI,Australia/Lord_Howe,Australia/LHI,Australia/Lord_Howe,Australia/Lord_Howe,Australia/LHI,Pacific/Kiritimati,Pacific/Kiritimati,Pacific/Kiritimati,Asia/Colombo,Asia/Colombo,Africa/Monrovia,Europe/Riga,Atlantic/Madeira,Atlantic/Madeira,Atlantic/Madeira,Asia/Magadan,Asia/Magadan,Asia/Srednekolymsk,Asia/Ust-Nera,Asia/Srednekolymsk,Asia/Ust-Nera,Asia/Magadan,Asia/Magadan,Asia/Magadan,Asia/Srednekolymsk,Asia/Ust-Nera,Asia/Srednekolymsk,Asia/Ust-Nera,Asia/Srednekolymsk,Asia/Ust-Nera,Asia/Singapore,Asia/Kuala_Lumpur,Asia/Singapore,Asia/Singapore,Asia/Singapore,Asia/Kuala_Lumpur,Asia/Kuala_Lumpur,Asia/Kuala_Lumpur,Pacific/Marquesas,Antarctica/Mawson,Antarctica/Mawson,America/Cambridge_Bay,America/Yellowknife,Europe/Moscow,America/Denver,America/Bahia_Banderas,America/Boise,America/Cambridge_Bay,America/Chihuahua,America/Edmonton,America/Hermosillo,America/Inuvik,America/Mazatlan,America/North_Dakota/Beulah,America/North_Dakota/Center,America/North_Dakota/New_Salem,America/Ojinaga,America/Phoenix,America/Regina,America/Shiprock,America/Swift_Current,America/Yellowknife,Canada/East-Saskatchewan,Canada/Mountain,Canada/Saskatchewan,Mexico/BajaSur,Pacific/Kwajalein,Pacific/Kwajalein,Pacific/Majuro,Pacific/Majuro,Antarctica/Macquarie,Europe/Moscow,Europe/Moscow,America/Montevideo,America/Managua,Africa/Monrovia,Indian/Maldives,Asia/Colombo,Asia/Rangoon,Asia/Makassar,Asia/Ujung_Pandang,Europe/Minsk,Asia/Macao,Asia/Macau,Asia/Macao,Asia/Macau,America/Denver,America/Boise,America/Cambridge_Bay,America/Edmonton,America/North_Dakota/Beulah,America/North_Dakota/Center,America/North_Dakota/New_Salem,America/Regina,America/Shiprock,America/Swift_Current,America/Yellowknife,Canada/East-Saskatchewan,Canada/Mountain,Canada/Saskatchewan,Europe/Moscow,Europe/Chisinau,Europe/Kaliningrad,Europe/Kiev,Europe/Minsk,Europe/Riga,Europe/Samara,Europe/Simferopol,Europe/Tallinn,Europe/Tiraspol,Europe/Uzhgorod,Europe/Vilnius,Europe/Volgograd,Europe/Zaporozhye,Europe/Moscow,Europe/Moscow,Europe/Chisinau,Europe/Kaliningrad,Europe/Kiev,Europe/Minsk,Europe/Riga,Europe/Samara,Europe/Simferopol,Europe/Tallinn,Europe/Tiraspol,Europe/Uzhgorod,Europe/Vilnius,Europe/Volgograd,Europe/Zaporozhye,Europe/Simferopol,Europe/Volgograd,Europe/Moscow,America/Denver,America/Bahia_Banderas,America/Boise,America/Cambridge_Bay,America/Chihuahua,America/Creston,America/Dawson_Creek,America/Edmonton,America/Ensenada,America/Hermosillo,America/Inuvik,America/Mazatlan,America/Mexico_City,America/North_Dakota/Beulah,America/North_Dakota/Center,America/North_Dakota/New_Salem,America/Ojinaga,America/Phoenix,America/Regina,America/Santa_Isabel,America/Shiprock,America/Swift_Current,America/Tijuana,America/Yellowknife,Canada/East-Saskatchewan,Canada/Mountain,Canada/Saskatchewan,Mexico/BajaNorte,Mexico/BajaSur,Mexico/General,Europe/Moscow,Indian/Mauritius,Indian/Mauritius,Indian/Maldives,America/Denver,America/Boise,America/Cambridge_Bay,America/Edmonton,America/North_Dakota/Beulah,America/North_Dakota/Center,America/North_Dakota/New_Salem,America/Phoenix,America/Regina,America/Shiprock,America/Swift_Current,America/Yellowknife,Canada/East-Saskatchewan,Canada/Mountain,Canada/Saskatchewan,Asia/Kuala_Lumpur,Asia/Kuching,Pacific/Noumea,Pacific/Noumea,America/St_Johns,Canada/Newfoundland,America/St_Johns,America/St_Johns,America/Goose_Bay,Canada/Newfoundland,America/Goose_Bay,Canada/Newfoundland,America/Paramaribo,Europe/Amsterdam,Europe/Amsterdam,Pacific/Norfolk,Pacific/Norfolk,Asia/Novosibirsk,Asia/Novosibirsk,Asia/Novokuznetsk,Asia/Novosibirsk,Asia/Novosibirsk,Asia/Novokuznetsk,Asia/Novokuznetsk,America/St_Johns,Asia/Katmandu,America/Adak,America/Atka,America/Nome,America/Goose_Bay,Canada/Newfoundland,Asia/Kathmandu,Pacific/Nauru,Pacific/Nauru,America/St_Johns,America/St_Johns,Europe/Amsterdam,America/Goose_Bay,Canada/Newfoundland,America/Goose_Bay,Canada/Newfoundland,America/Adak,America/Atka,America/Nome,Pacific/Midway,Pacific/Pago_Pago,Pacific/Samoa,Pacific/Niue,Pacific/Niue,Pacific/Niue,America/St_Johns,America/Adak,America/Atka,America/Nome,America/Goose_Bay,Canada/Newfoundland,Pacific/Auckland,Antarctica/McMurdo,Antarctica/South_Pole,NZ,Pacific/Auckland,Antarctica/McMurdo,Antarctica/South_Pole,NZ,Pacific/Auckland,Pacific/Auckland,Pacific/Auckland,Antarctica/McMurdo,Antarctica/South_Pole,NZ,Antarctica/McMurdo,Antarctica/South_Pole,NZ,Antarctica/McMurdo,Antarctica/South_Pole,NZ,Asia/Omsk,Asia/Omsk,Asia/Omsk,Asia/Omsk,Asia/Omsk,Asia/Oral,Asia/Oral,Asia/Oral,America/Inuvik,America/Los_Angeles,America/Boise,America/Dawson,America/Dawson_Creek,America/Ensenada,America/Juneau,America/Metlakatla,America/Santa_Isabel,America/Sitka,America/Tijuana,America/Vancouver,America/Whitehorse,Canada/Pacific,Canada/Yukon,Mexico/BajaNorte,America/Lima,Asia/Kamchatka,Asia/Kamchatka,Asia/Kamchatka,Asia/Kamchatka,America/Lima,Pacific/Bougainville,Pacific/Port_Moresby,Pacific/Enderbury,Pacific/Enderbury,Pacific/Enderbury,Asia/Manila,Asia/Manila,Asia/Karachi,Asia/Karachi,Asia/Ho_Chi_Minh,Asia/Saigon,America/Miquelon,America/Miquelon,America/Paramaribo,America/Paramaribo,Antarctica/DumontDUrville,Asia/Yekaterinburg,Asia/Pontianak,Africa/Algiers,Africa/Tunis,Europe/Monaco,Europe/Paris,Pacific/Pitcairn,Pacific/Pohnpei,Pacific/Ponape,America/Port-au-Prince,America/Los_Angeles,America/Dawson_Creek,America/Ensenada,America/Juneau,America/Metlakatla,America/Santa_Isabel,America/Sitka,America/Tijuana,America/Vancouver,Canada/Pacific,Mexico/BajaNorte,America/Los_Angeles,America/Bahia_Banderas,America/Boise,America/Creston,America/Dawson,America/Dawson_Creek,America/Ensenada,America/Hermosillo,America/Inuvik,America/Juneau,America/Mazatlan,America/Metlakatla,America/Santa_Isabel,America/Sitka,America/Tijuana,America/Vancouver,America/Whitehorse,Canada/Pacific,Canada/Yukon,Mexico/BajaNorte,Mexico/BajaSur,Pacific/Pitcairn,America/Los_Angeles,America/Dawson_Creek,America/Ensenada,America/Juneau,America/Metlakatla,America/Santa_Isabel,America/Sitka,America/Tijuana,America/Vancouver,Canada/Pacific,Mexico/BajaNorte,Pacific/Palau,America/Asuncion,America/Asuncion,America/Asuncion,America/Guayaquil,Asia/Qyzylorda,Asia/Qyzylorda,Asia/Qyzylorda,Indian/Reunion,Europe/Riga,Asia/Rangoon,Antarctica/Rothera,Asia/Sakhalin,Asia/Sakhalin,Asia/Sakhalin,Asia/Sakhalin,Asia/Samarkand,Europe/Samara,Europe/Samara,Asia/Samarkand,Asia/Samarkand,Europe/Samara,Europe/Samara,Africa/Johannesburg,Africa/Johannesburg,Africa/Johannesburg,Africa/Maseru,Africa/Mbabane,Africa/Windhoek,Africa/Maseru,Africa/Mbabane,Africa/Maseru,Africa/Mbabane,Africa/Windhoek,Pacific/Guadalcanal,Indian/Mahe,America/Santo_Domingo,Pacific/Apia,Asia/Singapore,Asia/Singapore,Asia/Aqtau,Asia/Aqtau,Asia/Aqtau,America/Costa_Rica,Atlantic/Stanley,America/Santiago,Chile/Continental,Asia/Kuala_Lumpur,Asia/Singapore,Europe/Simferopol,Asia/Srednekolymsk,America/Paramaribo,America/Paramaribo,Pacific/Samoa,Pacific/Apia,Pacific/Midway,Pacific/Pago_Pago,Europe/Volgograd,Europe/Volgograd,Asia/Yekaterinburg,Asia/Yekaterinburg,Asia/Yekaterinburg,Asia/Yekaterinburg,Africa/Windhoek,Antarctica/Syowa,Pacific/Tahiti,Asia/Samarkand,Asia/Tashkent,Asia/Tashkent,Asia/Samarkand,Asia/Tashkent,Asia/Tashkent,Asia/Tbilisi,Asia/Tbilisi,Asia/Tbilisi,Asia/Tbilisi,Asia/Tbilisi,Indian/Kerguelen,Asia/Dushanbe,Pacific/Fakaofo,Pacific/Fakaofo,Asia/Dili,Asia/Dili,Asia/Tehran,Europe/Tallinn,Asia/Ashgabat,Asia/Ashkhabad,Asia/Ashgabat,Asia/Ashkhabad,Pacific/Tongatapu,Pacific/Tongatapu,Pacific/Tongatapu,Europe/Istanbul,Asia/Istanbul,Europe/Istanbul,Asia/Istanbul,Europe/Volgograd,Pacific/Funafuti,Etc/UCT,Asia/Ulaanbaatar,Asia/Ulan_Bator,Asia/Ulaanbaatar,Asia/Ulaanbaatar,Asia/Choibalsan,Asia/Ulan_Bator,Asia/Choibalsan,Asia/Ulan_Bator,Asia/Oral,Asia/Oral,Asia/Oral,Asia/Oral,Asia/Oral,Antarctica/Troll,Etc/Universal,Etc/UTC,Etc/Zulu,UTC,UTC,America/Montevideo,America/Montevideo,America/Montevideo,America/Montevideo,America/Montevideo,Asia/Samarkand,Asia/Tashkent,Asia/Samarkand,Asia/Tashkent,America/Caracas,America/Caracas,Asia/Vladivostok,Asia/Vladivostok,Asia/Khandyga,Asia/Vladivostok,Asia/Vladivostok,Asia/Vladivostok,Asia/Khandyga,Asia/Ust-Nera,Asia/Khandyga,Asia/Ust-Nera,Europe/Volgograd,Europe/Volgograd,Europe/Volgograd,Europe/Volgograd,Antarctica/Vostok,Pacific/Efate,Pacific/Efate,Pacific/Wake,America/Mendoza,America/Argentina/Jujuy,America/Argentina/Mendoza,America/Argentina/San_Luis,America/Jujuy,America/Mendoza,America/Argentina/Catamarca,America/Argentina/ComodRivadavia,America/Argentina/Cordoba,America/Argentina/Jujuy,America/Argentina/La_Rioja,America/Argentina/Mendoza,America/Argentina/Rio_Gallegos,America/Argentina/Salta,America/Argentina/San_Juan,America/Argentina/San_Luis,America/Argentina/Tucuman,America/Argentina/Ushuaia,America/Catamarca,America/Cordoba,America/Jujuy,America/Rosario,Africa/Windhoek,Africa/Ndjamena,Africa/Brazzaville,Africa/Bissau,Africa/El_Aaiun,Africa/Bangui,Africa/Douala,Africa/Kinshasa,Africa/Lagos,Africa/Libreville,Africa/Luanda,Africa/Malabo,Africa/Ndjamena,Africa/Niamey,Africa/Porto-Novo,Africa/Windhoek,Europe/Lisbon,Europe/Madrid,Europe/Monaco,Europe/Paris,Europe/Paris,Europe/Luxembourg,Africa/Algiers,Africa/Casablanca,Africa/Ceuta,Africa/El_Aaiun,Atlantic/Canary,Atlantic/Faeroe,Atlantic/Faroe,Atlantic/Madeira,Europe/Brussels,Europe/Lisbon,Europe/Luxembourg,Europe/Madrid,Europe/Monaco,Europe/Paris,Europe/Luxembourg,Africa/Algiers,Africa/Casablanca,Africa/Ceuta,Africa/El_Aaiun,Atlantic/Azores,Atlantic/Canary,Atlantic/Faeroe,Atlantic/Faroe,Atlantic/Madeira,Europe/Andorra,Europe/Brussels,Europe/Lisbon,Europe/Luxembourg,Europe/Madrid,Europe/Monaco,Pacific/Wallis,America/Godthab,America/Danmarkshavn,America/Godthab,America/Danmarkshavn,Asia/Jakarta,Asia/Pontianak,Asia/Jakarta,Asia/Pontianak,Asia/Jakarta,Asia/Pontianak,Asia/Dili,Asia/Makassar,Asia/Pontianak,Asia/Ujung_Pandang,Asia/Jayapura,Europe/Vilnius,Europe/Warsaw,Pacific/Apia,Pacific/Apia,Pacific/Apia,Asia/Kashgar,Asia/Urumqi,Asia/Yakutsk,Asia/Yakutsk,Asia/Chita,Asia/Khandyga,Asia/Chita,Asia/Khandyga,Asia/Yakutsk,Asia/Yakutsk,Asia/Yakutsk,Asia/Chita,Asia/Khandyga,Asia/Ust-Nera,Asia/Chita,Asia/Khandyga,Asia/Ust-Nera,Asia/Chita,Asia/Khandyga,America/Dawson,America/Whitehorse,Canada/Yukon,America/Dawson,America/Juneau,America/Whitehorse,America/Yakutat,Canada/Yukon,Asia/Yekaterinburg,Asia/Yekaterinburg,Asia/Yekaterinburg,Asia/Yerevan,Asia/Yerevan,Asia/Yerevan,Asia/Yerevan,America/Dawson,America/Whitehorse,America/Yakutat,Canada/Yukon,America/Anchorage,America/Dawson,America/Juneau,America/Nome,America/Sitka,America/Whitehorse,America/Yakutat,Canada/Yukon,America/Dawson,America/Whitehorse,America/Yakutat,Canada/Yukon,Antarctica/Davis,America/Cambridge_Bay,America/Inuvik,America/Iqaluit,America/Pangnirtung,America/Rankin_Inlet,America/Resolute,America/Yellowknife,Antarctica/Casey,Antarctica/DumontDUrville,Antarctica/Macquarie,Antarctica/Mawson,Antarctica/Palmer,Antarctica/Rothera,Antarctica/Syowa,Antarctica/Troll,Antarctica/Vostok,Indian/Kerguelen', '', NULL);
INSERT INTO `settings` VALUES (67, NULL, NULL, 'general_reminder_hour', NULL, '0', 'select', '0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23', '', NULL);
INSERT INTO `settings` VALUES (68, NULL, NULL, 'label_certificates', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (69, NULL, '2024-03-29 17:18:08', 'menu_show_certificates', NULL, '1', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (70, NULL, '2024-03-29 17:18:08', 'menu_show_downloads', NULL, '1', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (71, NULL, NULL, 'label_downloads', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (72, NULL, NULL, 'general_chat_code', NULL, NULL, 'textarea', '', '', NULL);
INSERT INTO `settings` VALUES (73, NULL, '2024-03-29 17:18:08', 'menu_show_homework', NULL, '1', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (74, NULL, NULL, 'label_courses', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (75, NULL, NULL, 'label_my_sessions', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (76, NULL, NULL, 'label_homework', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (77, NULL, NULL, 'regis_confirm_email', NULL, '0', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (78, NULL, NULL, 'label_featured', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (79, NULL, NULL, 'label_calendar', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (80, NULL, NULL, 'label_blog_posts', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (81, NULL, NULL, 'label_register', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (82, NULL, NULL, 'info_terms', NULL, NULL, 'textarea', '', 'rte', NULL);
INSERT INTO `settings` VALUES (83, NULL, NULL, 'info_privacy', NULL, NULL, 'textarea', '', 'rte', NULL);
INSERT INTO `settings` VALUES (84, NULL, '2024-03-29 17:18:08', 'general_address', NULL, '<p>234, Jersey Road</p>', 'textarea', '', 'rte', NULL);
INSERT INTO `settings` VALUES (85, NULL, '2024-03-29 17:18:08', 'general_tel', NULL, '08039485906', 'text', '', '', NULL);
INSERT INTO `settings` VALUES (86, NULL, '2024-03-29 17:18:08', 'general_contact_email', NULL, 'info@email.com', 'text', '', '', NULL);
INSERT INTO `settings` VALUES (87, NULL, NULL, 'social_enable_facebook', NULL, '0', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (88, NULL, NULL, 'social_facebook_secret', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (89, NULL, NULL, 'social_facebook_app_id', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (90, NULL, NULL, 'social_enable_google', NULL, '0', 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (91, NULL, NULL, 'social_google_secret', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (92, NULL, NULL, 'social_google_id', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (93, NULL, NULL, 'sms_enabled', NULL, NULL, 'checkbox', '', '', NULL);
INSERT INTO `settings` VALUES (94, NULL, NULL, 'sms_sender_name', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (95, NULL, NULL, 'label_sessions_courses', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (96, NULL, NULL, 'label_session_course', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (97, NULL, NULL, 'banner_status', NULL, NULL, 'radio', '1=Yes,0=No', '', NULL);
INSERT INTO `settings` VALUES (98, NULL, NULL, 'banner_app_name', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (99, NULL, NULL, 'banner_android_id', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (100, NULL, NULL, 'banner_ios_id', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (101, NULL, NULL, 'banner_icon_url', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (102, NULL, NULL, 'regis_captcha_type', NULL, 'image', 'select', 'image=Image,google=Google reCAPTCHA v3', '', NULL);
INSERT INTO `settings` VALUES (103, NULL, NULL, 'regis_recaptcha_key', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (104, NULL, NULL, 'regis_recaptcha_secret', NULL, NULL, 'text', '', '', NULL);
INSERT INTO `settings` VALUES (105, NULL, NULL, 'config_language', NULL, 'en', 'text', '', '', NULL);
INSERT INTO `settings` VALUES (106, '2024-03-29 17:18:07', '2024-03-29 17:18:12', 'general_video_max_size', 'Size in megabytes', '200', 'text', NULL, 'form-control digit', NULL);
INSERT INTO `settings` VALUES (107, '2024-03-29 17:18:09', '2024-05-02 07:16:34', 'config_baseurl', NULL, 'http://127.0.0.1:8000', 'text', NULL, NULL, NULL);
INSERT INTO `settings` VALUES (108, '2024-03-29 17:18:10', '2024-03-29 17:18:10', 'regis_enroll_mail', NULL, NULL, 'textarea', NULL, 'rte', NULL);
INSERT INTO `settings` VALUES (109, NULL, NULL, 'zoom_key', NULL, NULL, 'text', NULL, NULL, NULL);
INSERT INTO `settings` VALUES (110, NULL, NULL, 'zoom_secret', NULL, NULL, 'text', NULL, NULL, NULL);
INSERT INTO `settings` VALUES (111, NULL, NULL, 'frontend_status', NULL, '1', 'select', '1=Enabled,0=Disabled', NULL, NULL);
INSERT INTO `settings` VALUES (112, NULL, '2024-03-31 18:36:29', 'dashboard_color', NULL, '48d1cc', 'text', NULL, NULL, NULL);
INSERT INTO `settings` VALUES (113, '2024-03-29 17:18:13', '2024-03-29 17:18:13', 'video_driver', NULL, 'local', 'select', 'local=Local,s3=S3', NULL, NULL);
INSERT INTO `settings` VALUES (114, '2024-03-29 17:18:13', '2024-03-29 17:18:13', 'video_s3_key', NULL, NULL, 'text', NULL, NULL, NULL);
INSERT INTO `settings` VALUES (115, '2024-03-29 17:18:13', '2024-03-29 17:18:13', 'video_s3_secret', NULL, NULL, 'text', NULL, NULL, NULL);
INSERT INTO `settings` VALUES (116, '2024-03-29 17:18:13', '2024-03-29 17:18:13', 'video_s3_region', NULL, NULL, 'text', NULL, NULL, NULL);
INSERT INTO `settings` VALUES (117, '2024-03-29 17:18:13', '2024-03-29 17:18:13', 'video_s3_bucket', NULL, NULL, 'text', NULL, NULL, NULL);
INSERT INTO `settings` VALUES (118, '2024-03-29 17:18:13', '2024-03-29 17:18:13', 'video_s3_endpoint', NULL, NULL, 'text', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for sms_gateways
-- ----------------------------
DROP TABLE IF EXISTS `sms_gateways`;
CREATE TABLE `sms_gateways`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gateway_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `directory` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  `settings` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `default` tinyint(1) NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sms_gateways
-- ----------------------------

-- ----------------------------
-- Table structure for sms_templates
-- ----------------------------
DROP TABLE IF EXISTS `sms_templates`;
CREATE TABLE `sms_templates`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `default` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `placeholders` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sms_templates
-- ----------------------------
INSERT INTO `sms_templates` VALUES (1, NULL, NULL, 'Upcoming class reminder (physical location)', 'This message is sent to students to remind them when a class is scheduled to hold.', 'Reminder! The [SESSION_NAME] class \'[SESSION_NAME]\' holds on [CLASS_DATE]. Venue: [CLASS_VENUE] . Starts: [CLASS_START_TIME] . Ends: [CLASS_END_TIME]', 'Reminder! The [SESSION_NAME] class \'[SESSION_NAME]\' holds on [CLASS_DATE]. Venue: [CLASS_VENUE] . Starts: [CLASS_START_TIME] . Ends: [CLASS_END_TIME]', '\n                <ul>\n                <li>[CLASS_NAME] : The name of the class</li>\n                <li>[CLASS_DATE] : The class date</li>\n                <li>[SESSION_NAME] : The name of the session the class is attached to</li>\n                <li>[CLASS_VENUE] : The venue of the class</li>\n                <li>[CLASS_START_TIME] : The start time for the class</li>\n                <li>[CLASS_END_TIME] : The end time for the class</li>\n                </ul>\n                ');
INSERT INTO `sms_templates` VALUES (2, NULL, NULL, 'Upcoming class reminder (online class)', 'This message is sent to students to remind them when an online class is scheduled to open.', 'Reminder! The [COURSE_NAME] class \'[CLASS_NAME]\' starts on  [CLASS_DATE]', 'Reminder! The [COURSE_NAME] class \'[CLASS_NAME]\' starts on  [CLASS_DATE]', '\n                <ul>\n                <li>[CLASS_NAME] : The name of the class</li>\n                <li>[CLASS_DATE] : The class date</li>\n                <li>[COURSE_NAME] : The name of the session the class is attached to</li>\n                </ul>\n                ');
INSERT INTO `sms_templates` VALUES (3, NULL, NULL, 'Upcoming Test reminder', 'This message is sent to users when there is an upcoming test in a session/course they are enrolled in', 'Reminder: The \'[SESSION_NAME]\' test \'[TEST_NAME]\' opens on [OPENING_DATE] and closes on [CLOSING_DATE]', 'Reminder: The \'[SESSION_NAME]\' test \'[TEST_NAME]\' opens on [OPENING_DATE] and closes on [CLOSING_DATE]', '\n                <ul>\n                <li>[TEST_NAME] : The name of the test</li>\n                <li>[TEST_DESCRIPTION] : The description of the test</li>\n                <li>[SESSION_NAME] : The name of the session or course the test is attached to</li>\n                <li>[OPENING_DATE] : The opening date of the test</li>\n                <li>[CLOSING_DATE] : The closing date of the test</li>\n                <li>[PASSMARK] : The test passmark e.g. 50%</li>\n                <li>[MINUTES_ALLOWED]: The number of minutes allowed for the test</li>\n                </ul>\n                ');
INSERT INTO `sms_templates` VALUES (4, NULL, NULL, 'Online Class start notification', 'This message is sent to students when a scheduled online class opens', 'Please be reminded that the class \'[CLASS_NAME]\' for the course \'[COURSE_NAME]\' has started. <br/>\nVisit this link to take this class now: [CLASS_URL]', 'Please be reminded that the class \'[CLASS_NAME]\' for the course \'[COURSE_NAME]\' has started. <br/>\nVisit this link to take this class now: [CLASS_URL]', '\n                <ul>\n                <li>[CLASS_NAME] : The name of the class</li>\n                <li>[CLASS_URL] : The url of the class</li>\n                <li>[COURSE_NAME] : The name of the course the class belongs to</li>\n                </ul>\n                ');
INSERT INTO `sms_templates` VALUES (5, NULL, NULL, 'Homework reminder', 'This message is sent to students reminding them when a homework is due', 'Please be reminded that the homework \'[HOMEWORK_NAME]\' is due on [DUE_DATE].\nPlease click this link to submit your homework now: [HOMEWORK_URL]', 'Please be reminded that the homework \'[HOMEWORK_NAME]\' is due on [DUE_DATE].\nPlease click this link to submit your homework now: [HOMEWORK_URL]', '\n                <ul>\n                <li>[NUMBER_OF_DAYS] : The number of days remaining till the homework due date e.g. 1,2,3</li>\n                <li>[DAY_TEXT] : The \'day\' text. Defaults to \'day\' if [NUMBER_OF_DAYS] is 1 and \'days\' if greater than 1.</li>\n                <li>[HOMEWORK_NAME] : The name of the homework</li>\n                <li>[HOMEWORK_URL] : The homework url</li>\n                <li>[HOMEWORK_INSTRUCTION] : The instructions for the homework</li>\n                <li>[PASSMARK] : The passmark for the homework</li>\n                 <li>[DUE_DATE] : The homework due date</li>\n                <li>[OPENING_DATE] : The homework opening date</li>\n\n                </ul>\n                ');
INSERT INTO `sms_templates` VALUES (6, NULL, NULL, 'Course closing reminder', 'Warning email sent to enrolled students about a course that will close soon.', 'Please be reminded that the course \'[COURSE_NAME]\' closes on [CLOSING_DATE].\nPlease click this link to complete the course now: [COURSE_URL]', 'Please be reminded that the course \'[COURSE_NAME]\' closes on [CLOSING_DATE].\nPlease click this link to complete the course now: [COURSE_URL]', '\n                <ul>\n                <li>[COURSE_NAME] : The name of the course</li>\n                <li>[COURSE_URL] : The course URL</li>\n                <li>[CLOSING_DATE] : The closing date for the course</li>\n                 <li>[NUMBER_OF_DAYS] : The number of days remaining till the closing date e.g. 1,2,3</li>\n                <li>[DAY_TEXT] : The \'day\' text. Defaults to \'day\' if [NUMBER_OF_DAYS] is 1 and \'days\' if greater than 1.</li>\n\n                </ul>\n                ');

-- ----------------------------
-- Table structure for student_certificate_downloads
-- ----------------------------
DROP TABLE IF EXISTS `student_certificate_downloads`;
CREATE TABLE `student_certificate_downloads`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `certificate_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `student_certificate_downloads_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `student_certificate_downloads_certificate_id_foreign`(`certificate_id`) USING BTREE,
  CONSTRAINT `student_certificate_downloads_certificate_id_foreign` FOREIGN KEY (`certificate_id`) REFERENCES `certificates` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `student_certificate_downloads_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_certificate_downloads
-- ----------------------------

-- ----------------------------
-- Table structure for student_certificates
-- ----------------------------
DROP TABLE IF EXISTS `student_certificates`;
CREATE TABLE `student_certificates`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `certificate_id` bigint UNSIGNED NOT NULL,
  `tracking_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `student_certificates_tracking_number_unique`(`tracking_number`) USING BTREE,
  INDEX `student_certificates_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `student_certificates_certificate_id_foreign`(`certificate_id`) USING BTREE,
  CONSTRAINT `student_certificates_certificate_id_foreign` FOREIGN KEY (`certificate_id`) REFERENCES `certificates` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `student_certificates_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_certificates
-- ----------------------------

-- ----------------------------
-- Table structure for student_course_logs
-- ----------------------------
DROP TABLE IF EXISTS `student_course_logs`;
CREATE TABLE `student_course_logs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `lecture_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `student_course_logs_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `student_course_logs_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `student_course_logs_lecture_id_foreign`(`lecture_id`) USING BTREE,
  CONSTRAINT `student_course_logs_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `student_course_logs_lecture_id_foreign` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `student_course_logs_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_course_logs
-- ----------------------------
INSERT INTO `student_course_logs` VALUES (1, '2024-04-26 00:52:15', '2024-04-26 00:52:15', 3, 1, 1);
INSERT INTO `student_course_logs` VALUES (2, '2024-04-26 01:00:24', '2024-04-26 01:00:24', 3, 1, 2);
INSERT INTO `student_course_logs` VALUES (3, '2024-04-26 18:21:14', '2024-04-26 18:21:14', 3, 1, 4);
INSERT INTO `student_course_logs` VALUES (4, '2024-04-26 18:21:16', '2024-04-26 18:21:16', 3, 1, 4);
INSERT INTO `student_course_logs` VALUES (5, '2024-04-29 04:42:07', '2024-04-29 04:42:07', 1, 4, 5);
INSERT INTO `student_course_logs` VALUES (6, '2024-04-29 04:43:39', '2024-04-29 04:43:39', 1, 5, 6);

-- ----------------------------
-- Table structure for student_courses
-- ----------------------------
DROP TABLE IF EXISTS `student_courses`;
CREATE TABLE `student_courses`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `reg_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `student_courses_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `student_courses_course_id_foreign`(`course_id`) USING BTREE,
  CONSTRAINT `student_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `student_courses_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_courses
-- ----------------------------
INSERT INTO `student_courses` VALUES (1, NULL, NULL, 3, 1, 'yhtmu', 1);
INSERT INTO `student_courses` VALUES (2, NULL, NULL, 1, 4, 'unpiv', 1);
INSERT INTO `student_courses` VALUES (3, NULL, NULL, 1, 6, 'ccs1s', 0);
INSERT INTO `student_courses` VALUES (4, NULL, NULL, 1, 5, 'aqdk6', 1);

-- ----------------------------
-- Table structure for student_fields
-- ----------------------------
DROP TABLE IF EXISTS `student_fields`;
CREATE TABLE `student_fields`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NULL DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `placeholder` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_fields
-- ----------------------------

-- ----------------------------
-- Table structure for student_lectures
-- ----------------------------
DROP TABLE IF EXISTS `student_lectures`;
CREATE TABLE `student_lectures`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `course_id` bigint UNSIGNED NOT NULL,
  `lecture_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `student_lectures_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `student_lectures_course_id_foreign`(`course_id`) USING BTREE,
  INDEX `student_lectures_lecture_id_foreign`(`lecture_id`) USING BTREE,
  CONSTRAINT `student_lectures_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `student_lectures_lecture_id_foreign` FOREIGN KEY (`lecture_id`) REFERENCES `lectures` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `student_lectures_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_lectures
-- ----------------------------
INSERT INTO `student_lectures` VALUES (14, '2024-04-29 02:24:57', '2024-04-29 02:24:57', 3, 1, 4);
INSERT INTO `student_lectures` VALUES (17, '2024-04-29 04:43:50', '2024-04-29 04:43:50', 1, 6, 7);

-- ----------------------------
-- Table structure for student_student_field
-- ----------------------------
DROP TABLE IF EXISTS `student_student_field`;
CREATE TABLE `student_student_field`  (
  `student_id` bigint UNSIGNED NOT NULL,
  `student_field_id` bigint UNSIGNED NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  INDEX `student_student_field_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `student_student_field_student_field_id_foreign`(`student_field_id`) USING BTREE,
  CONSTRAINT `student_student_field_student_field_id_foreign` FOREIGN KEY (`student_field_id`) REFERENCES `student_fields` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `student_student_field_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_student_field
-- ----------------------------

-- ----------------------------
-- Table structure for student_test_test_option
-- ----------------------------
DROP TABLE IF EXISTS `student_test_test_option`;
CREATE TABLE `student_test_test_option`  (
  `student_test_id` bigint UNSIGNED NOT NULL,
  `test_option_id` bigint UNSIGNED NOT NULL,
  INDEX `student_test_test_option_student_test_id_foreign`(`student_test_id`) USING BTREE,
  INDEX `student_test_test_option_test_option_id_foreign`(`test_option_id`) USING BTREE,
  CONSTRAINT `student_test_test_option_student_test_id_foreign` FOREIGN KEY (`student_test_id`) REFERENCES `student_tests` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `student_test_test_option_test_option_id_foreign` FOREIGN KEY (`test_option_id`) REFERENCES `test_options` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_test_test_option
-- ----------------------------

-- ----------------------------
-- Table structure for student_tests
-- ----------------------------
DROP TABLE IF EXISTS `student_tests`;
CREATE TABLE `student_tests`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `test_id` bigint UNSIGNED NOT NULL,
  `score` double(8, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `student_tests_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `student_tests_test_id_foreign`(`test_id`) USING BTREE,
  CONSTRAINT `student_tests_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `student_tests_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_tests
-- ----------------------------

-- ----------------------------
-- Table structure for student_video
-- ----------------------------
DROP TABLE IF EXISTS `student_video`;
CREATE TABLE `student_video`  (
  `student_id` bigint UNSIGNED NOT NULL,
  `video_id` bigint UNSIGNED NOT NULL,
  INDEX `student_video_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `student_video_video_id_foreign`(`video_id`) USING BTREE,
  CONSTRAINT `student_video_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `student_video_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_video
-- ----------------------------
INSERT INTO `student_video` VALUES (3, 3);
INSERT INTO `student_video` VALUES (1, 3);

-- ----------------------------
-- Table structure for students
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `mobile_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `api_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `token_expires` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `students_user_id_foreign`(`user_id`) USING BTREE,
  CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES (1, '2024-03-29 17:50:06', '2024-03-29 17:50:06', 2, '89602910492', NULL, NULL);
INSERT INTO `students` VALUES (2, '2024-04-01 23:23:06', '2024-04-01 23:23:06', 3, '89602910492', NULL, NULL);
INSERT INTO `students` VALUES (3, '2024-04-02 22:49:09', '2024-04-02 22:49:09', 4, '896-0291-0492', NULL, NULL);
INSERT INTO `students` VALUES (4, '2024-04-29 03:18:11', '2024-04-29 03:18:11', 6, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for survey_option_survey_response
-- ----------------------------
DROP TABLE IF EXISTS `survey_option_survey_response`;
CREATE TABLE `survey_option_survey_response`  (
  `survey_response_id` bigint UNSIGNED NOT NULL,
  `survey_option_id` bigint UNSIGNED NOT NULL,
  INDEX `survey_response_survey_option_survey_response_id_foreign`(`survey_response_id`) USING BTREE,
  INDEX `survey_response_survey_option_survey_option_id_foreign`(`survey_option_id`) USING BTREE,
  CONSTRAINT `survey_response_survey_option_survey_option_id_foreign` FOREIGN KEY (`survey_option_id`) REFERENCES `survey_options` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `survey_response_survey_option_survey_response_id_foreign` FOREIGN KEY (`survey_response_id`) REFERENCES `survey_responses` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey_option_survey_response
-- ----------------------------

-- ----------------------------
-- Table structure for survey_options
-- ----------------------------
DROP TABLE IF EXISTS `survey_options`;
CREATE TABLE `survey_options`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `survey_question_id` bigint UNSIGNED NOT NULL,
  `option` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `survey_options_survey_question_id_foreign`(`survey_question_id`) USING BTREE,
  CONSTRAINT `survey_options_survey_question_id_foreign` FOREIGN KEY (`survey_question_id`) REFERENCES `survey_questions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey_options
-- ----------------------------

-- ----------------------------
-- Table structure for survey_questions
-- ----------------------------
DROP TABLE IF EXISTS `survey_questions`;
CREATE TABLE `survey_questions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `survey_id` bigint UNSIGNED NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `sort_order` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `survey_questions_survey_id_foreign`(`survey_id`) USING BTREE,
  CONSTRAINT `survey_questions_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey_questions
-- ----------------------------

-- ----------------------------
-- Table structure for survey_responses
-- ----------------------------
DROP TABLE IF EXISTS `survey_responses`;
CREATE TABLE `survey_responses`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `survey_id` bigint UNSIGNED NOT NULL,
  `student_id` bigint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `survey_responses_survey_id_foreign`(`survey_id`) USING BTREE,
  INDEX `survey_responses_student_id_foreign`(`student_id`) USING BTREE,
  CONSTRAINT `survey_responses_survey_id_foreign` FOREIGN KEY (`survey_id`) REFERENCES `surveys` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of survey_responses
-- ----------------------------

-- ----------------------------
-- Table structure for surveys
-- ----------------------------
DROP TABLE IF EXISTS `surveys`;
CREATE TABLE `surveys`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `hash` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` bigint UNSIGNED NULL DEFAULT NULL,
  `private` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `surveys_admin_id_foreign`(`admin_id`) USING BTREE,
  CONSTRAINT `surveys_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of surveys
-- ----------------------------

-- ----------------------------
-- Table structure for template_colors
-- ----------------------------
DROP TABLE IF EXISTS `template_colors`;
CREATE TABLE `template_colors`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `template_id` bigint UNSIGNED NOT NULL,
  `original_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_color` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `template_colors_template_id_foreign`(`template_id`) USING BTREE,
  CONSTRAINT `template_colors_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of template_colors
-- ----------------------------
INSERT INTO `template_colors` VALUES (1, '2024-04-29 04:14:59', '2024-04-29 04:14:59', 2, '0EDC8D', '136aac');
INSERT INTO `template_colors` VALUES (2, '2024-04-29 04:14:59', '2024-04-29 04:14:59', 2, '081828', NULL);

-- ----------------------------
-- Table structure for template_options
-- ----------------------------
DROP TABLE IF EXISTS `template_options`;
CREATE TABLE `template_options`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `template_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `template_options_template_id_foreign`(`template_id`) USING BTREE,
  CONSTRAINT `template_options_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `template_options` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of template_options
-- ----------------------------
INSERT INTO `template_options` VALUES (1, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 1, 'top-bar', 'a:11:{s:6:\"_token\";s:40:\"FJCotq9TzWxE17MEEaYWfJhLXyEwDDMqsF9bglnK\";s:7:\"enabled\";s:1:\"1\";s:14:\"office_address\";s:16:\"234, Jersey Road\";s:5:\"email\";s:14:\"info@email.com\";s:8:\"bg_color\";N;s:10:\"font_color\";N;s:15:\"social_facebook\";s:1:\"#\";s:14:\"social_twitter\";s:1:\"#\";s:16:\"social_instagram\";s:1:\"#\";s:14:\"social_youtube\";s:1:\"#\";s:15:\"social_linkedin\";s:1:\"#\";}', 1);
INSERT INTO `template_options` VALUES (2, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 1, 'navigation', 'a:5:{s:6:\"_token\";s:40:\"FJCotq9TzWxE17MEEaYWfJhLXyEwDDMqsF9bglnK\";s:7:\"enabled\";s:1:\"1\";s:8:\"bg_color\";N;s:10:\"font_color\";N;s:12:\"order_button\";s:1:\"1\";}', 1);
INSERT INTO `template_options` VALUES (3, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 1, 'slideshow', 'a:72:{s:6:\"_token\";s:40:\"gCOeCtTPQaESMEVTShGLb7rbvYf3hAPnbYXSSdm0\";s:7:\"enabled\";s:1:\"1\";s:5:\"file1\";s:68:\"img/demo/slide1.jpg\";s:14:\"slide_heading1\";s:27:\"Professional Courses\";s:19:\"heading_font_color1\";N;s:11:\"slide_text1\";s:33:\"Get the best courses!\";s:16:\"text_font_color1\";N;s:12:\"button_text1\";s:10:\"Learn More\";s:4:\"url1\";s:1:\"#\";s:5:\"file2\";s:68:\"img/demo/slide2.png\";s:14:\"slide_heading2\";s:26:\"Training Sessions\";s:19:\"heading_font_color2\";N;s:11:\"slide_text2\";s:36:\"Get the best training\";s:16:\"text_font_color2\";N;s:12:\"button_text2\";s:10:\"Learn More\";s:4:\"url2\";s:1:\"#\";s:5:\"file3\";N;s:14:\"slide_heading3\";N;s:19:\"heading_font_color3\";N;s:11:\"slide_text3\";N;s:16:\"text_font_color3\";N;s:12:\"button_text3\";N;s:4:\"url3\";N;s:5:\"file4\";N;s:14:\"slide_heading4\";N;s:19:\"heading_font_color4\";N;s:11:\"slide_text4\";N;s:16:\"text_font_color4\";N;s:12:\"button_text4\";N;s:4:\"url4\";N;s:5:\"file5\";N;s:14:\"slide_heading5\";N;s:19:\"heading_font_color5\";N;s:11:\"slide_text5\";N;s:16:\"text_font_color5\";N;s:12:\"button_text5\";N;s:4:\"url5\";N;s:5:\"file6\";N;s:14:\"slide_heading6\";N;s:19:\"heading_font_color6\";N;s:11:\"slide_text6\";N;s:16:\"text_font_color6\";N;s:12:\"button_text6\";N;s:4:\"url6\";N;s:5:\"file7\";N;s:14:\"slide_heading7\";N;s:19:\"heading_font_color7\";N;s:11:\"slide_text7\";N;s:16:\"text_font_color7\";N;s:12:\"button_text7\";N;s:4:\"url7\";N;s:5:\"file8\";N;s:14:\"slide_heading8\";N;s:19:\"heading_font_color8\";N;s:11:\"slide_text8\";N;s:16:\"text_font_color8\";N;s:12:\"button_text8\";N;s:4:\"url8\";N;s:5:\"file9\";N;s:14:\"slide_heading9\";N;s:19:\"heading_font_color9\";N;s:11:\"slide_text9\";N;s:16:\"text_font_color9\";N;s:12:\"button_text9\";N;s:4:\"url9\";N;s:6:\"file10\";N;s:15:\"slide_heading10\";N;s:20:\"heading_font_color10\";N;s:12:\"slide_text10\";N;s:17:\"text_font_color10\";N;s:13:\"button_text10\";N;s:5:\"url10\";N;}', 1);
INSERT INTO `template_options` VALUES (4, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 1, 'homepage-services', 'a:12:{s:6:\"_token\";s:40:\"gCOeCtTPQaESMEVTShGLb7rbvYf3hAPnbYXSSdm0\";s:7:\"enabled\";s:1:\"1\";s:5:\"file1\";s:68:\"img/demo/service1.jpg\";s:8:\"heading1\";s:14:\"Quality Training\";s:5:\"text1\";s:129:\"<p>We provide high quality in person training at all our locations.</p>\";s:5:\"file2\";s:68:\"img/demo/service2.jpg\";s:8:\"heading2\";s:18:\"Online Training\";s:5:\"text2\";s:176:\"Enrol for one of our online courses and learn at your own pace! We have different modules available for all your learning needs!<br>\";s:12:\"info_heading\";s:23:\"The Best Training Company\";s:9:\"info_text\";s:167:\"<p>We are the best training service provider in our Industry! Get quality training now!<br></p>\";s:11:\"button_text\";s:10:\"Learn More\";s:3:\"url\";s:1:\"#\";}', 1);
INSERT INTO `template_options` VALUES (5, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 1, 'homepage-about', 'a:7:{s:6:\"_token\";s:40:\"gCOeCtTPQaESMEVTShGLb7rbvYf3hAPnbYXSSdm0\";s:7:\"enabled\";s:1:\"1\";s:7:\"heading\";s:28:\"1000 Clients and counting...\";s:4:\"text\";s:318:\"<p>Over the years, we are proud to have serviced more than 1000 satisfied clients! Our client list is spread across all states of the federation. </p><p>Some of our clients include:</p><ol><li>Supertech Limited</li><li>Super Schools Limited</li><li>Andre Montessori School</li><li>Kings Elementary School<br></li></ol>\";s:11:\"button_text\";s:9:\"Read more\";s:10:\"button_url\";s:1:\"#\";s:5:\"image\";s:68:\"img/demo/about.jpg\";}', 1);
INSERT INTO `template_options` VALUES (6, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 1, 'testimonials', 'a:28:{s:6:\"_token\";s:40:\"8jnb6kBKNB2moNVBP322DvRN1xDSTpkha0PSlQ6w\";s:7:\"enabled\";s:1:\"1\";s:11:\"sub_heading\";s:12:\"Testimonials\";s:7:\"heading\";s:16:\"What Parents Say\";s:5:\"name1\";s:7:\"Shola A\";s:5:\"role1\";s:3:\"Mom\";s:6:\"image1\";s:67:\"img/demo/tes1.png\";s:5:\"text1\";s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";s:5:\"name2\";s:8:\"Tolulope\";s:5:\"role2\";s:3:\"Dad\";s:6:\"image2\";s:67:\"img/demo/tes2.png\";s:5:\"text2\";s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";s:5:\"name3\";s:5:\"Bunmi\";s:5:\"role3\";s:3:\"Mom\";s:6:\"image3\";s:67:\"img/demo/tes3.png\";s:5:\"text3\";s:445:\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\";s:5:\"name4\";N;s:5:\"role4\";N;s:6:\"image4\";N;s:5:\"text4\";N;s:5:\"name5\";N;s:5:\"role5\";N;s:6:\"image5\";N;s:5:\"text5\";N;s:5:\"name6\";N;s:5:\"role6\";N;s:6:\"image6\";N;s:5:\"text6\";N;}', 1);
INSERT INTO `template_options` VALUES (7, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 1, 'blog', 'a:5:{s:6:\"_token\";s:40:\"8jnb6kBKNB2moNVBP322DvRN1xDSTpkha0PSlQ6w\";s:7:\"enabled\";s:1:\"1\";s:11:\"sub_heading\";s:4:\"Blog\";s:7:\"heading\";s:12:\"Latest Posts\";s:5:\"limit\";s:1:\"3\";}', 0);
INSERT INTO `template_options` VALUES (8, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 1, 'contact-form', 'a:6:{s:6:\"_token\";s:40:\"gCOeCtTPQaESMEVTShGLb7rbvYf3hAPnbYXSSdm0\";s:7:\"enabled\";s:1:\"1\";s:7:\"heading\";s:12:\"Get in touch\";s:4:\"text\";s:129:\"<p>Do you have any questions about our services? Get in touch with us now and we will be glad to get back to you shortly.<br></p>\";s:8:\"bg_color\";N;s:10:\"font_color\";N;}', 1);
INSERT INTO `template_options` VALUES (9, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 1, 'footer', 'a:13:{s:6:\"_token\";s:40:\"FJCotq9TzWxE17MEEaYWfJhLXyEwDDMqsF9bglnK\";s:7:\"enabled\";s:1:\"1\";s:4:\"text\";s:60:\"We are the best agency for all your training needs!\";s:15:\"newsletter-code\";N;s:7:\"credits\";s:20:\"© 2020 Training Company\";s:8:\"bg_color\";N;s:10:\"font_color\";N;s:5:\"image\";N;s:15:\"social_facebook\";s:1:\"#\";s:14:\"social_twitter\";s:1:\"#\";s:16:\"social_instagram\";s:1:\"#\";s:14:\"social_youtube\";s:1:\"#\";s:15:\"social_linkedin\";s:1:\"#\";}', 1);
INSERT INTO `template_options` VALUES (10, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 2, 'top-bar', 'a:5:{s:15:\"social_facebook\";s:1:\"#\";s:14:\"social_twitter\";s:1:\"#\";s:16:\"social_instagram\";s:1:\"#\";s:14:\"social_youtube\";s:1:\"#\";s:15:\"social_linkedin\";s:1:\"#\";}', 1);
INSERT INTO `template_options` VALUES (11, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 2, 'navigation', 'a:1:{s:11:\"search_form\";s:1:\"1\";}', 1);
INSERT INTO `template_options` VALUES (12, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 2, 'slideshow', 'a:16:{s:5:\"file1\";s:59:\"templates/edugrids/assets/assets/images/demo/slider-bg1.jpg\";s:14:\"slide_heading1\";s:54:\"The Best Online And Offline Courses. Get Started Today\";s:12:\"sub_heading1\";s:20:\"Start Learning Today\";s:11:\"slide_text1\";s:129:\"Enrol for our courses today and get the best training in the industry. Our courses are self paced and delivered via web or mobile\";s:14:\"button_1_text1\";s:10:\"Learn More\";s:6:\"url_11\";s:1:\"#\";s:14:\"button_2_text1\";s:11:\"Our Courses\";s:6:\"url_21\";s:8:\"/courses\";s:5:\"file2\";s:59:\"templates/edugrids/assets/assets/images/demo/slider-bg2.jpg\";s:14:\"slide_heading2\";s:36:\"Professional World-Class Instructors\";s:12:\"sub_heading2\";s:15:\"Our Instructors\";s:11:\"slide_text2\";s:115:\"Get best training from the best instructors in the industry. Our trainers have years of experience and pre-screened\";s:14:\"button_1_text2\";s:0:\"\";s:6:\"url_12\";s:0:\"\";s:14:\"button_2_text2\";s:15:\"Our Instructors\";s:6:\"url_22\";s:12:\"/instructors\";}', 1);
INSERT INTO `template_options` VALUES (13, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 2, 'homepage-services', 'a:12:{s:8:\"heading1\";s:16:\"Trending Courses\";s:5:\"text1\";s:121:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus sed.\";s:12:\"button_text1\";s:7:\"Explore\";s:4:\"url1\";s:1:\"#\";s:8:\"heading2\";s:18:\"Certified Teachers\";s:5:\"text2\";s:121:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus sed.\";s:12:\"button_text2\";s:7:\"Explore\";s:4:\"url2\";s:1:\"#\";s:8:\"heading3\";s:15:\"Books & Library\";s:5:\"text3\";s:121:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, quaerat beatae nulla debitis vitae temporibus sed.\";s:12:\"button_text3\";s:7:\"Explore\";s:4:\"url3\";s:1:\"#\";}', 1);
INSERT INTO `template_options` VALUES (14, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 2, 'homepage-about', 'a:6:{s:11:\"sub_heading\";s:8:\"About Us\";s:7:\"heading\";s:21:\"Welcome To Our Portal\";s:4:\"text\";s:351:\"Lorem ipsum dolor sit amet, consectetur adipisicing elit, do eius mod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad min im veniam, quis nostrud exercitati ullamco laboris nisi ut aliquip ex ea commodo consequat.\n\nLorem ipsum dolor sit amet, consectetur adipisicing elit, do eius mod tempor incididunt ut labore et dolore magna aliqua.\";s:11:\"button_text\";s:10:\"Learn More\";s:10:\"button_url\";s:11:\"/who-we-are\";s:5:\"image\";s:59:\"templates/edugrids/assets/assets/images/demo/about-img2.png\";}', 1);
INSERT INTO `template_options` VALUES (15, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 2, 'featured-courses', 'a:3:{s:7:\"heading\";s:16:\"Featured Courses\";s:11:\"sub_heading\";s:52:\"Browse our top courses and get high quality training\";s:7:\"courses\";a:0:{}}', 1);
INSERT INTO `template_options` VALUES (16, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 2, 'highlights', 'a:9:{s:5:\"image\";s:63:\"templates/edugrids/assets/assets/images/demo/achievement-bg.jpg\";s:8:\"heading1\";s:5:\"500 +\";s:5:\"text1\";s:13:\"Happy Clients\";s:8:\"heading2\";s:4:\"70 +\";s:5:\"text2\";s:14:\"Online Courses\";s:8:\"heading3\";s:5:\"100 %\";s:5:\"text3\";s:12:\"Satisfaction\";s:8:\"heading4\";s:5:\"100 %\";s:5:\"text4\";s:7:\"Support\";}', 1);
INSERT INTO `template_options` VALUES (17, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 2, 'instructors', 'a:2:{s:7:\"heading\";s:27:\"Our Experienced Instructors\";s:11:\"sub_heading\";s:52:\"Get training from the best Instructors in the world!\";}', 1);
INSERT INTO `template_options` VALUES (18, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 2, 'testimonials', 'a:26:{s:7:\"heading\";s:21:\"What Our Students Say\";s:11:\"sub_heading\";s:119:\"There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form.\";s:5:\"name1\";s:10:\"Jane Smith\";s:5:\"role1\";s:7:\"Student\";s:6:\"image1\";s:56:\"templates/edugrids/assets/assets/images/demo/testi-1.jpg\";s:5:\"text1\";s:195:\"It’s amazing how much easier it has been to meet new people and create instant\nconnections. I have the exact same personality, the only thing that has changed is my\nmindset and a few behaviors.\";s:5:\"name2\";s:13:\"Micheal James\";s:5:\"role2\";s:7:\"Student\";s:6:\"image2\";s:56:\"templates/edugrids/assets/assets/images/demo/testi-2.jpg\";s:5:\"text2\";s:195:\"It’s amazing how much easier it has been to meet new people and create instant\nconnections. I have the exact same personality, the only thing that has changed is my\nmindset and a few behaviors.\";s:5:\"name3\";s:10:\"Fred Smart\";s:5:\"role3\";s:7:\"Student\";s:6:\"image3\";s:56:\"templates/edugrids/assets/assets/images/demo/testi-3.jpg\";s:5:\"text3\";s:195:\"It’s amazing how much easier it has been to meet new people and create instant\nconnections. I have the exact same personality, the only thing that has changed is my\nmindset and a few behaviors.\";s:5:\"name4\";s:14:\"Alicia Jackson\";s:5:\"role4\";s:7:\"Student\";s:6:\"image4\";s:56:\"templates/edugrids/assets/assets/images/demo/testi-4.jpg\";s:5:\"text4\";s:195:\"It’s amazing how much easier it has been to meet new people and create instant\nconnections. I have the exact same personality, the only thing that has changed is my\nmindset and a few behaviors.\";s:5:\"name5\";s:10:\"Mary Smith\";s:5:\"role5\";s:7:\"Student\";s:6:\"image5\";s:56:\"templates/edugrids/assets/assets/images/demo/testi-1.jpg\";s:5:\"text5\";s:195:\"It’s amazing how much easier it has been to meet new people and create instant\nconnections. I have the exact same personality, the only thing that has changed is my\nmindset and a few behaviors.\";s:5:\"name6\";s:10:\"Sara Smith\";s:5:\"role6\";s:7:\"Student\";s:6:\"image6\";s:56:\"templates/edugrids/assets/assets/images/demo/testi-2.jpg\";s:5:\"text6\";s:195:\"It’s amazing how much easier it has been to meet new people and create instant\nconnections. I have the exact same personality, the only thing that has changed is my\nmindset and a few behaviors.\";}', 1);
INSERT INTO `template_options` VALUES (19, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 2, 'blog', 'a:3:{s:7:\"heading\";s:18:\"Latest News & Blog\";s:11:\"sub_heading\";s:27:\"Latest posts from our Blog.\";s:5:\"limit\";s:1:\"3\";}', 1);
INSERT INTO `template_options` VALUES (20, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 2, 'icons', 'a:12:{s:6:\"image1\";s:56:\"templates/edugrids/assets/assets/images/demo/client1.svg\";s:6:\"image2\";s:56:\"templates/edugrids/assets/assets/images/demo/client2.svg\";s:6:\"image3\";s:56:\"templates/edugrids/assets/assets/images/demo/client3.svg\";s:6:\"image4\";s:56:\"templates/edugrids/assets/assets/images/demo/client4.svg\";s:6:\"image5\";s:56:\"templates/edugrids/assets/assets/images/demo/client5.svg\";s:6:\"image6\";s:56:\"templates/edugrids/assets/assets/images/demo/client1.svg\";s:6:\"image7\";s:56:\"templates/edugrids/assets/assets/images/demo/client2.svg\";s:6:\"image8\";s:56:\"templates/edugrids/assets/assets/images/demo/client3.svg\";s:6:\"image9\";s:56:\"templates/edugrids/assets/assets/images/demo/client4.svg\";s:7:\"image10\";s:56:\"templates/edugrids/assets/assets/images/demo/client5.svg\";s:7:\"image11\";s:56:\"templates/edugrids/assets/assets/images/demo/client1.svg\";s:7:\"image12\";s:56:\"templates/edugrids/assets/assets/images/demo/client2.svg\";}', 1);
INSERT INTO `template_options` VALUES (21, '2024-03-29 17:18:08', '2024-03-29 17:18:08', 2, 'footer', 'a:8:{s:4:\"text\";s:122:\"Nemo enim enim voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequ magni dolores eos qui ratione.\";s:15:\"social_facebook\";s:1:\"#\";s:14:\"social_twitter\";s:1:\"#\";s:16:\"social_instagram\";s:1:\"#\";s:14:\"social_youtube\";s:1:\"#\";s:15:\"social_linkedin\";s:1:\"#\";s:7:\"credits\";s:12:\"Company Name\";s:4:\"blog\";s:1:\"1\";}', 1);

-- ----------------------------
-- Table structure for templates
-- ----------------------------
DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  `directory` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `templates_directory_unique`(`directory`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of templates
-- ----------------------------
INSERT INTO `templates` VALUES (1, '2024-03-29 17:18:07', '2024-04-29 04:14:42', 'Buson', 0, 'buson');
INSERT INTO `templates` VALUES (2, '2024-03-29 17:18:08', '2024-04-29 04:14:42', 'EduGrids', 1, 'edugrids');
INSERT INTO `templates` VALUES (3, '2024-04-29 04:14:11', '2024-04-29 04:14:42', 'Education', 0, 'education');

-- ----------------------------
-- Table structure for test_grades
-- ----------------------------
DROP TABLE IF EXISTS `test_grades`;
CREATE TABLE `test_grades`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `grade` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `min` int NOT NULL,
  `max` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of test_grades
-- ----------------------------

-- ----------------------------
-- Table structure for test_options
-- ----------------------------
DROP TABLE IF EXISTS `test_options`;
CREATE TABLE `test_options`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `test_question_id` bigint UNSIGNED NOT NULL,
  `option` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `test_options_test_question_id_foreign`(`test_question_id`) USING BTREE,
  CONSTRAINT `test_options_test_question_id_foreign` FOREIGN KEY (`test_question_id`) REFERENCES `test_questions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of test_options
-- ----------------------------
INSERT INTO `test_options` VALUES (1, '2024-04-26 18:17:15', '2024-04-26 18:17:15', 1, 'a', 0);
INSERT INTO `test_options` VALUES (2, '2024-04-26 18:17:15', '2024-04-26 18:17:15', 1, 'b', 1);
INSERT INTO `test_options` VALUES (3, '2024-04-26 18:17:15', '2024-04-26 18:17:15', 1, 'c', 0);
INSERT INTO `test_options` VALUES (4, '2024-04-26 18:17:15', '2024-04-26 18:17:15', 1, 'd', 0);
INSERT INTO `test_options` VALUES (5, '2024-04-26 18:17:15', '2024-04-26 18:17:15', 1, 'd', 0);

-- ----------------------------
-- Table structure for test_questions
-- ----------------------------
DROP TABLE IF EXISTS `test_questions`;
CREATE TABLE `test_questions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `test_id` bigint UNSIGNED NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `sort_order` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `test_questions_test_id_foreign`(`test_id`) USING BTREE,
  CONSTRAINT `test_questions_test_id_foreign` FOREIGN KEY (`test_id`) REFERENCES `tests` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of test_questions
-- ----------------------------
INSERT INTO `test_questions` VALUES (1, '2024-04-26 18:17:15', '2024-04-26 18:17:15', 1, '<p>test</p>', NULL);

-- ----------------------------
-- Table structure for tests
-- ----------------------------
DROP TABLE IF EXISTS `tests`;
CREATE TABLE `tests`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  `minutes` int NULL DEFAULT NULL,
  `allow_multiple` tinyint(1) NOT NULL DEFAULT 0,
  `passmark` double(8, 2) NULL DEFAULT NULL,
  `private` tinyint(1) NOT NULL DEFAULT 0,
  `show_result` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `tests_admin_id_foreign`(`admin_id`) USING BTREE,
  CONSTRAINT `tests_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tests
-- ----------------------------
INSERT INTO `tests` VALUES (1, '2024-04-26 18:16:51', '2024-04-26 18:16:51', 1, 'test', '<p>lorem ipsum</p>', 1, 60, 0, 50.00, 1, 1);

-- ----------------------------
-- Table structure for transactions
-- ----------------------------
DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `student_id` bigint UNSIGNED NOT NULL,
  `payment_method_id` bigint UNSIGNED NOT NULL,
  `amount` double(8, 2) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `transactions_student_id_foreign`(`student_id`) USING BTREE,
  INDEX `transactions_payment_method_id_foreign`(`payment_method_id`) USING BTREE,
  CONSTRAINT `transactions_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `transactions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transactions
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `picture` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `last_seen` timestamp NULL DEFAULT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `login_token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `login_token_expires` timestamp NULL DEFAULT NULL,
  `billing_firstname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `billing_lastname` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `billing_country_id` bigint UNSIGNED NULL DEFAULT NULL,
  `billing_state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `billing_city` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `billing_address_1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `billing_address_2` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `billing_zip` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE,
  INDEX `users_role_id_foreign`(`role_id`) USING BTREE,
  FULLTEXT INDEX `full`(`name`, `email`, `last_name`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin@email.com', NULL, '$2y$10$qs78/4BQHYgUEk.1KeBDP.BRaw0pGI.9dFwaih0Iad0U1Pn4ZpF/.', NULL, '2024-03-29 17:18:09', '2024-03-29 17:18:09', 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (2, 'sandi', 'sandikomara01@gmail.com', NULL, '$2y$10$NHA6NHn3KHBZHAF6Xw1nmuLEnt9HbFT5j5iDlyoNXLaxBqK3JsiA2', NULL, '2024-03-29 17:50:06', '2024-04-29 04:50:45', 2, NULL, 1, '2024-04-29 04:50:45', 'komara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (3, 'test', 'test@email.com', NULL, '$2y$10$8WfHDe5f7kkaVn5T90dx/eMinfJaWkcPQd13hLminyY2E0FG53bii', NULL, '2024-04-01 23:23:06', '2024-04-02 00:25:28', 2, NULL, 1, '2024-04-02 00:25:28', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (4, 'Sandi', 'sandi.10119099@mahasiswa.unikom.ac.id', NULL, '$2y$10$JEdeDIw.TrH6un4u1k.GVuLK2XcqkoFbgDYs3VqCDLmfFcT1Tcvd6', NULL, '2024-04-02 22:49:09', '2024-04-29 03:35:22', 2, NULL, 1, '2024-04-29 03:35:22', 'Komara', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (5, 'dosen', 'dosen@email.com', NULL, '$2y$10$dA8N8V6UCuzoKvJcFzopUe0Uc1tKQJv0v1lIC5CFuGfTIs.Y6GBY.', NULL, '2024-04-29 03:16:32', '2024-04-29 03:16:32', 1, NULL, 1, NULL, 'dosen', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `users` VALUES (6, 'siswa', 'siswa@email.com', NULL, '$2y$10$wDF8FJSb0/dkXs3oYZONBuHPVLbV0WXQKTOYJoWOH/qUF29N7Ep3.', NULL, '2024-04-29 03:18:11', '2024-04-29 06:54:14', 2, NULL, 1, '2024-04-29 06:54:14', 'siswa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for videos
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `admin_id` bigint UNSIGNED NULL DEFAULT NULL,
  `length` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file_size` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `ready` tinyint(1) NULL DEFAULT 0,
  `location` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT 'l',
  `mime_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `videos_admin_id_foreign`(`admin_id`) USING BTREE,
  FULLTEXT INDEX `full`(`name`, `description`),
  CONSTRAINT `videos_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of videos
-- ----------------------------
INSERT INTO `videos` VALUES (3, '2024-04-26 12:50:35', '2024-04-26 12:50:35', 'monitoring', NULL, 1, '00:00:07', '662c058b93821.mp4', '38278422', 0, 'l', 'video/mp4');

-- ----------------------------
-- Table structure for widget_values
-- ----------------------------
DROP TABLE IF EXISTS `widget_values`;
CREATE TABLE `widget_values`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `widget_id` bigint UNSIGNED NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  `sort_order` int NULL DEFAULT NULL,
  `visibility` char(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'b',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `widget_values_widget_id_foreign`(`widget_id`) USING BTREE,
  CONSTRAINT `widget_values_widget_id_foreign` FOREIGN KEY (`widget_id`) REFERENCES `widgets` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of widget_values
-- ----------------------------

-- ----------------------------
-- Table structure for widgets
-- ----------------------------
DROP TABLE IF EXISTS `widgets`;
CREATE TABLE `widgets`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeat` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of widgets
-- ----------------------------
INSERT INTO `widgets` VALUES (1, NULL, NULL, 'slideshow', 'slideshow', 10);
INSERT INTO `widgets` VALUES (2, NULL, NULL, 'text-and-button', 'textbtn', 0);
INSERT INTO `widgets` VALUES (3, NULL, NULL, 'featured-courses', 'courses', 10);
INSERT INTO `widgets` VALUES (4, NULL, NULL, 'plain-text', 'text', 0);
INSERT INTO `widgets` VALUES (5, NULL, NULL, 'blog', 'blog', 0);

SET FOREIGN_KEY_CHECKS = 1;
