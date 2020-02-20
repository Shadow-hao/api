/*
Navicat MySQL Data Transfer

Source Server         : 123
Source Server Version : 50728
Source Host           : 127.0.0.1:3308
Source Database       : dc

Target Server Type    : MYSQL
Target Server Version : 50728
File Encoding         : 65001

Date: 2020-02-20 21:07:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `r_id` int(10) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL DEFAULT '',
  `order` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0正常1禁用',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '1', '9cbf8a4dcb8e30682b927f352d6559a0', 'admin', '0', '0', '0', '0');
INSERT INTO `admin` VALUES ('4', '2', '9cbf8a4dcb8e30682b927f352d6559a0', 'teat', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `img` int(10) NOT NULL,
  `order` int(10) NOT NULL DEFAULT '0',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `updata_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('6', '123', '0', '2', '0', '0', '0');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `c_id` int(10) NOT NULL,
  `is_banner` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 不是 0 是 轮播图',
  `is_hot` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1 不是 0 是 热卖',
  `img_id` int(10) NOT NULL,
  `kouwei` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0,可选1不可选',
  `fenliang` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 可选1不可选',
  `price` decimal(10,2) NOT NULL COMMENT '价格',
  `d_price` decimal(10,2) NOT NULL,
  `z_price` decimal(10,2) NOT NULL,
  `x_price` decimal(10,2) NOT NULL,
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `is_banner` (`is_banner`,`is_hot`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------

-- ----------------------------
-- Table structure for img
-- ----------------------------
DROP TABLE IF EXISTS `img`;
CREATE TABLE `img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(100) NOT NULL DEFAULT '',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of img
-- ----------------------------
INSERT INTO `img` VALUES ('2', '/uploads/20200220\\52ae1576ba8aa6c868a5d1638a5f1210.jpg', '0', '0');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL DEFAULT '0',
  `name` varchar(20) NOT NULL,
  `icon` varchar(50) NOT NULL DEFAULT '',
  `order` int(10) NOT NULL DEFAULT '0',
  `url` varchar(100) NOT NULL DEFAULT '',
  `ishidden` tinyint(1) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '0', '权限管理', 'layui-icon-auz', '1', '', '0', '0', '0');
INSERT INTO `menu` VALUES ('2', '0', '首页', 'layui-icon-home', '0', '', '0', '0', '0');
INSERT INTO `menu` VALUES ('3', '1', '菜单节点', '', '0', '', '0', '0', '0');
INSERT INTO `menu` VALUES ('4', '3', '菜单列表', '', '0', '/admin/menu/index', '0', '0', '0');
INSERT INTO `menu` VALUES ('7', '1', '管理员管理', '', '0', '/admin/admin/admin_list', '0', '0', '0');
INSERT INTO `menu` VALUES ('8', '3', '添加顶级菜单', '', '0', '/admin/menu/add_menu', '1', '0', '0');
INSERT INTO `menu` VALUES ('9', '3', '添加子菜单', '', '0', '/admin/menu/addc_menu', '1', '0', '0');
INSERT INTO `menu` VALUES ('10', '3', '编辑菜单', '', '0', '/admin/menu/edit_menu', '1', '0', '0');
INSERT INTO `menu` VALUES ('11', '3', '删除菜单', '', '0', '/admin/menu/del_menu', '1', '0', '0');
INSERT INTO `menu` VALUES ('13', '1', '角色管理', '', '0', '/admin/role/index', '0', '0', '0');
INSERT INTO `menu` VALUES ('14', '13', '添加角色', '', '0', '/admin/role/role_add', '1', '0', '0');
INSERT INTO `menu` VALUES ('15', '13', '角色编辑', '', '0', '/admin/role/role_edit', '1', '0', '0');
INSERT INTO `menu` VALUES ('19', '0', '系统管理', 'layui-icon-set', '3', '', '0', '0', '0');
INSERT INTO `menu` VALUES ('21', '0', '商品管理', 'layui-icon-cart-simple', '3', '', '0', '1580357552', '0');
INSERT INTO `menu` VALUES ('22', '21', '分类列表', '', '0', '/admin/category/index', '0', '0', '0');
INSERT INTO `menu` VALUES ('23', '21', '商品管理', '', '0', '/admin/goods/index', '0', '1580357630', '1580357630');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '',
  `des` varchar(100) NOT NULL DEFAULT '',
  `order` int(10) unsigned NOT NULL DEFAULT '0',
  `right` text,
  `status` int(1) NOT NULL DEFAULT '0',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '系统管理员', '', '0', null, '0', '0', '0');
INSERT INTO `role` VALUES ('2', '123', '123', '0', '[\"2\",\"1\",\"3\",\"4\"]', '0', '0', '0');
INSERT INTO `role` VALUES ('3', '223', '4333', '0', '[\"2\",\"1\"]', '0', '0', '0');
