/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100121
Source Host           : localhost:3306
Source Database       : casa_levy

Target Server Type    : MYSQL
Target Server Version : 100121
File Encoding         : 65001

Date: 2017-08-31 14:18:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for mercadorias
-- ----------------------------
DROP TABLE IF EXISTS `mercadorias`;
CREATE TABLE `mercadorias` (
  `id_mercadoria` int(11) NOT NULL AUTO_INCREMENT,
  `mercadoria` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `fornecedor` varchar(255) NOT NULL,
  `cnpj_fornecedor` varchar(255) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `quantidade_min` int(11) NOT NULL,
  `valor` float NOT NULL,
  `loja` varchar(255) NOT NULL,
  PRIMARY KEY (`id_mercadoria`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mercadorias
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(255) NOT NULL AUTO_INCREMENT,
  `nome_user` varchar(255) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `senha_user` varchar(255) NOT NULL,
  `nivel_acesso` varchar(255) NOT NULL,
  `loja` varchar(255) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('2', 'User', 'user@user.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'User', 'Diamantina');
INSERT INTO `user` VALUES ('3', 'Admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 'Diamantina');
INSERT INTO `user` VALUES ('4', 'Gabriel Durães', 'gduraes@gmail.com', '18a98c35f49808b45edadc75fb1b25ebfd4037d6', 'Admin', 'Diamantina');
