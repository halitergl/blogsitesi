/*
 Navicat Premium Data Transfer

 Source Server         : musty
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost:3306
 Source Schema         : blogscripti

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : 65001

 Date: 28/04/2018 18:32:03
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ayarlar
-- ----------------------------
DROP TABLE IF EXISTS `ayarlar`;
CREATE TABLE `ayarlar`  (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_url` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `site_title` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `site_desc` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `site_keyw` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `site_logo` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `site_favicon` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `site_facebook` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `site_google` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `site_instagram` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `site_youtube` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`site_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ayarlar
-- ----------------------------
INSERT INTO `ayarlar` VALUES (1, 'http://localhost/blogscripti/', 'Mstfkrtlll.com / Kişisel Web Blogu', 'Mustafa Kartal Kişisel Web blogudur', 'mstf, krtl, mstfkrtll, ellema', 'mstfkrtll.png', 'm.png', 'http://www.facebook.com', 'http://www.google.com', 'http://www.instagram.com', 'http://www.youtube.com');

-- ----------------------------
-- Table structure for kategoriler
-- ----------------------------
DROP TABLE IF EXISTS `kategoriler`;
CREATE TABLE `kategoriler`  (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_baslik` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kategori_tarih` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kategori_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategoriler
-- ----------------------------
INSERT INTO `kategoriler` VALUES (1, 'PHP', '2017-10-23 05:32:30');
INSERT INTO `kategoriler` VALUES (2, 'HTML5', '2017-10-23 05:32:30');
INSERT INTO `kategoriler` VALUES (3, 'CSS', '2017-10-23 06:04:24');
INSERT INTO `kategoriler` VALUES (4, 'CHROME', '2017-10-23 05:32:30');
INSERT INTO `kategoriler` VALUES (5, 'ATOM', '2017-10-23 05:32:30');
INSERT INTO `kategoriler` VALUES (6, 'JQUERY', '2017-10-23 05:32:30');
INSERT INTO `kategoriler` VALUES (7, 'ASP', '2017-10-23 05:32:30');
INSERT INTO `kategoriler` VALUES (8, 'JAVA', '2017-10-23 05:32:30');
INSERT INTO `kategoriler` VALUES (9, 'NODE JSS', '2017-10-23 06:28:11');
INSERT INTO `kategoriler` VALUES (10, 'VUE JSS', '2017-10-23 06:45:47');
INSERT INTO `kategoriler` VALUES (16, 'ÖRNEK SORULAR', '2018-04-28 11:34:22');

-- ----------------------------
-- Table structure for sponsorlar
-- ----------------------------
DROP TABLE IF EXISTS `sponsorlar`;
CREATE TABLE `sponsorlar`  (
  `sponsor_id` int(11) NOT NULL AUTO_INCREMENT,
  `sponsor_resim` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sponsor_adi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sponsor_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sponsor_tarih` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sponsor_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sponsorlar
-- ----------------------------
INSERT INTO `sponsorlar` VALUES (1, 'sponsor.jpg', 'sponsor 1', 'https://www.sponsor1.com', '2018-04-28 07:10:07');
INSERT INTO `sponsorlar` VALUES (2, 'sponsor2.jpg', 'sponsor 2', 'https://www.sponsor2.com', '2018-04-28 07:10:07');
INSERT INTO `sponsorlar` VALUES (3, 'sponsor3.jpg', 'sponsor 3', 'https://www.sponsor3.com', '2018-04-28 07:10:07');
INSERT INTO `sponsorlar` VALUES (4, 'sponsor4.jpg', 'sponsor 4', 'https://www.sponsor4.com', '2018-04-28 07:10:07');

-- ----------------------------
-- Table structure for yazilar
-- ----------------------------
DROP TABLE IF EXISTS `yazilar`;
CREATE TABLE `yazilar`  (
  `yazi_id` int(11) NOT NULL AUTO_INCREMENT,
  `yazi_foto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `yazi_baslik` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yazi_icerik` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yazi_tarih` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yazi_kategori_id` int(11) NOT NULL,
  `yazi_ekleyen` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yazi_okunma` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '0',
  `yazi_durum` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0',
  PRIMARY KEY (`yazi_id`) USING BTREE,
  UNIQUE INDEX `yazi_id`(`yazi_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yazilar
-- ----------------------------
INSERT INTO `yazilar` VALUES (1, '1.jpg', 'lorem ipsum 1', 'lorem ipsum', '2018-04-26 06:58:33', 1, 'Admin', '603', '1');
INSERT INTO `yazilar` VALUES (2, '2.png', 'lorem ipsum 2', 'lorem ipsum', '2018-04-26 06:58:33', 1, 'Admin', '703', '1');
INSERT INTO `yazilar` VALUES (3, '3.png', 'lorem ipsum 3', 'lorem ipsum', '2018-04-26 06:58:33', 1, 'Admin', '802', '1');
INSERT INTO `yazilar` VALUES (4, '4.jpg', 'lorem ipsum 4', 'lorem ipsum', '2018-04-26 06:58:33', 1, 'Admin', '605', '1');
INSERT INTO `yazilar` VALUES (5, '5.png', 'lorem ipsum 5', 'lorem ipsum', '2018-04-26 06:58:33', 1, 'Admin', '602', '1');
INSERT INTO `yazilar` VALUES (6, '6.jpg', 'lorem ipsum 6', 'lorem ipsum', '2018-04-26 06:58:33', 1, 'Admin', '701', '1');
INSERT INTO `yazilar` VALUES (7, '7.jpg', 'lorem ipsum 7', 'lorem ipsum', '2018-04-26 06:58:33', 1, 'Admin', '809', '1');
INSERT INTO `yazilar` VALUES (8, '8.jpg', 'lorem ipsum 8', 'lorem ipsum', '2018-04-26 06:58:33', 1, 'Admin', '617', '1');

-- ----------------------------
-- Table structure for yorumlar
-- ----------------------------
DROP TABLE IF EXISTS `yorumlar`;
CREATE TABLE `yorumlar`  (
  `yorum_id` int(11) NOT NULL AUTO_INCREMENT,
  `yorum_ekleyen` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yorum_eposta` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yorum_icerik` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `yorum_ekleyen_website` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `yorum_tarih` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `yorum_yazi_id` int(11) NOT NULL,
  `yorum_durum` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`yorum_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 61 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of yorumlar
-- ----------------------------
INSERT INTO `yorumlar` VALUES (47, 'Faruk Yılmaz', 'faruk@gmail.com', 'sitenizi kendiniz mi tasarladınız?', NULL, '2017-10-24 11:37:37', 1, 1);
INSERT INTO `yorumlar` VALUES (48, 'ahmet faruk', 'ahmetfaruk@gmail.com', 'merhaba mustafa guzel bir blog sitesi yapmışsın ellerine sağlık. ', NULL, '2017-10-24 21:31:50', 1, 1);
INSERT INTO `yorumlar` VALUES (49, 'Ümit Tokgöz', 'umit@gmail.com', 'mustafa tebrik ederim seni', NULL, '2017-10-25 08:30:22', 2, 1);
INSERT INTO `yorumlar` VALUES (50, 'Yavuz Selim Şahin', 'yavuz@gmail.com', 'çok güzel bir tasarım ve siteni  çok beğendim güzel olmuş gerçekten.', NULL, '2017-10-25 12:31:49', 3, 1);
INSERT INTO `yorumlar` VALUES (51, 'mustafa kartal', 'mstfkrtll@gmail.com', 'güzel güzel baya güzel', NULL, '2017-10-26 13:00:15', 5, 1);
INSERT INTO `yorumlar` VALUES (2, 'Mustafa Kartal', 'mstfkrtll@yandex.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\n', NULL, '2017-10-23 12:55:05', 5, 1);
INSERT INTO `yorumlar` VALUES (44, 'kadir kartal', 'kadir@gmail.com', 'Blog sitenizin tasarımı çok hoşuma gitti. Gayet güzel bir site yapmışsınız.', NULL, '2017-10-23 19:44:34', 4, 1);
INSERT INTO `yorumlar` VALUES (46, 'zeynep karanfi', 'zeynep@gmail.com', 'güzel bir site çok beğendim.', NULL, '2017-10-23 21:09:43', 6, 1);
INSERT INTO `yorumlar` VALUES (52, 'Sinan Bezir', 'sinan@gmail.com', 'harika bir blog olmuş tebrik ederim', NULL, '2017-10-26 19:30:18', 6, 1);
INSERT INTO `yorumlar` VALUES (53, 'yusuf abi', 'sdas@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, '2017-11-26 20:06:28', 8, 1);
INSERT INTO `yorumlar` VALUES (54, 'Mustafa Kartal', 'cimec61@gmail.com', 'harika bir yapıt. Çok beğendim ellerinize sağlık.', 'https://www.mstfkrtll.com', '2018-04-26 08:16:58', 8, 1);
INSERT INTO `yorumlar` VALUES (55, 'Mustafa Kartal', 'cimec61@gmail.com', 'harika bir yapıt. Çok beğendim ellerinize sağlık.', 'https://www.mstfkrtll.com', '2018-04-26 08:26:45', 8, 0);
INSERT INTO `yorumlar` VALUES (56, 'mehmet Kartal', 'cimec61@gmail.com', 'Arkadaşlar Selamun aleyküm. Bu eğitim serisinde öğreneceğiniz şeyler olduğuna eminim. Cv Scriptinde yapmadığımız şeyleri burada yaptım. Örnek olarak; -Bilgisayardan Dosya yükleme -Htaccess ile SeoUrl yapımı', 'https://www.mstfkrtll.com', '2018-04-26 08:28:28', 4, 0);
INSERT INTO `yorumlar` VALUES (57, 'mehmet Kartal', 'cimec61@gmail.com', 'Arkadaşlar Selamun aleyküm. Bu eğitim serisinde öğreneceğiniz şeyler olduğuna eminim. Cv Scriptinde yapmadığımız şeyleri burada yaptım. Örnek olarak; -Bilgisayardan Dosya yükleme -Htaccess ile SeoUrl yapımı', 'https://www.mstfkrtll.com', '2018-04-26 08:29:36', 4, 0);
INSERT INTO `yorumlar` VALUES (58, 'fatma zehra', 'fatma@gmail.com', 'Arkadaşlar Selamun aleyküm. Bu eğitim serisinde öğreneceğiniz şeyler olduğuna eminim. Cv Scriptinde yapmadığımız şeyleri burada yaptım. Örnek olarak; -Bilgisayardan Dosya yükleme -Htaccess ile SeoUrl yapımı', 'https://www.fatma.com.tr', '2018-04-26 08:30:46', 8, 0);
INSERT INTO `yorumlar` VALUES (59, 'asdasd', 'asdasda', 'asdasdasd', 'asdasd', '2018-04-26 08:31:19', 8, 0);
INSERT INTO `yorumlar` VALUES (60, '123', '123', '123', '123', '2018-04-26 08:31:50', 8, 0);

SET FOREIGN_KEY_CHECKS = 1;
