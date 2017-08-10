/*
Navicat MySQL Data Transfer

Source Server         : sleepy
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : pena

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2014-12-20 14:32:37
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', 'ADMIN', 'admin');

-- ----------------------------
-- Table structure for `komentar`
-- ----------------------------
DROP TABLE IF EXISTS `komentar`;
CREATE TABLE `komentar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_komentator` int(11) NOT NULL,
  `komentar` longtext NOT NULL,
  `waktu` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of komentar
-- ----------------------------
INSERT INTO `komentar` VALUES ('1', '4', '2', 'aii', 'December 20, 2014, 8:09 am');
INSERT INTO `komentar` VALUES ('2', '4', '2', 'Apa Ini ?', 'December 20, 2014, 8:10 am');
INSERT INTO `komentar` VALUES ('3', '4', '3', 'lucu', 'December 20, 2014, 8:10 am');

-- ----------------------------
-- Table structure for `komentar_copy`
-- ----------------------------
DROP TABLE IF EXISTS `komentar_copy`;
CREATE TABLE `komentar_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `id_komentator` int(11) NOT NULL,
  `komentar` longtext NOT NULL,
  `waktu` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of komentar_copy
-- ----------------------------

-- ----------------------------
-- Table structure for `member`
-- ----------------------------
DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_member` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgllahir` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of member
-- ----------------------------
INSERT INTO `member` VALUES ('1', 'test', 'test', 'ada ', 'test@test', '2014-11-25', 'Laki - Laki', 'test.jpg');
INSERT INTO `member` VALUES ('2', 'fga', 'fga', 'Fauzan', 'test2@test2', '2014-12-02', 'Laki - Laki', 'images.png');
INSERT INTO `member` VALUES ('3', 'maman', 'maman', 'mamanmaman', 'mamanmaman@cerdas.com', '2014-12-02', 'Laki - Laki', 'images.png');

-- ----------------------------
-- Table structure for `member_copy`
-- ----------------------------
DROP TABLE IF EXISTS `member_copy`;
CREATE TABLE `member_copy` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_member` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgllahir` varchar(255) NOT NULL,
  `jk` varchar(255) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of member_copy
-- ----------------------------

-- ----------------------------
-- Table structure for `postingan`
-- ----------------------------
DROP TABLE IF EXISTS `postingan`;
CREATE TABLE `postingan` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemosting` int(11) NOT NULL,
  `judul_postingan` varchar(255) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `genre` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `waktu_post` varchar(255) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of postingan
-- ----------------------------
INSERT INTO `postingan` VALUES ('4', '1', 'Tugas IMK', 'Ini adalah Tugas IMK', 'Non - Fiksi', 'Tugas_IMK.docx', 'December 9, 2014, 3:39 am');
INSERT INTO `postingan` VALUES ('5', '1', 'Tugas IMK', 'Ini adalah Tugas IMK', 'Non - Fiksi', 'Tugas_IMK1.docx', 'December 10, 2014, 10:13 am');
INSERT INTO `postingan` VALUES ('6', '1', 'Tugas IMK', 'Lorem Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nis ut aliquip ex ea commodo consequat. Duis aute irure dolor in', 'Non - Fiksi', 'Tugas_IMK2.docx', 'December 11, 2014, 1:21 pm');
INSERT INTO `postingan` VALUES ('9', '2', 'Ini Contoh Fiksi', 'Ini Permainan', 'Fiksi', 'Ini_Contoh_Fiksi.pdf', 'December 20, 2014, 8:02 am');

-- ----------------------------
-- Table structure for `postingan_copy`
-- ----------------------------
DROP TABLE IF EXISTS `postingan_copy`;
CREATE TABLE `postingan_copy` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `id_pemosting` int(11) NOT NULL,
  `judul_postingan` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `files` varchar(255) NOT NULL,
  `waktu_post` varchar(255) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of postingan_copy
-- ----------------------------
