/*
Navicat MySQL Data Transfer

Source Server         : 123
Source Server Version : 50728
Source Host           : 127.0.0.1:3308
Source Database       : dc

Target Server Type    : MYSQL
Target Server Version : 50728
File Encoding         : 65001

Date: 2020-02-28 08:38:43
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
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('20', '店内主食', '0', '65', '0', '1582444872', '1582450292');
INSERT INTO `category` VALUES ('21', '酒水饮料', '0', '66', '1', '1582444895', '1582450370');
INSERT INTO `category` VALUES ('22', '美味甜点', '0', '67', '0', '1582444918', '1582444918');
INSERT INTO `category` VALUES ('23', '美味炒菜', '0', '68', '1', '1582444936', '1582450322');

-- ----------------------------
-- Table structure for count
-- ----------------------------
DROP TABLE IF EXISTS `count`;
CREATE TABLE `count` (
  `goods_id` int(10) NOT NULL,
  `liulan` int(10) NOT NULL DEFAULT '0',
  `xioaliang` int(10) NOT NULL DEFAULT '0',
  KEY `goods_id` (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of count
-- ----------------------------
INSERT INTO `count` VALUES ('34', '99', '0');
INSERT INTO `count` VALUES ('32', '21', '0');
INSERT INTO `count` VALUES ('35', '202', '0');
INSERT INTO `count` VALUES ('33', '53', '0');
INSERT INTO `count` VALUES ('29', '97', '0');
INSERT INTO `count` VALUES ('30', '76', '0');
INSERT INTO `count` VALUES ('31', '13', '0');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `c_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '',
  `order` int(10) NOT NULL DEFAULT '0',
  `is_banner` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 不是 0 是 轮播图',
  `is_hot` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '1 不是 0 是 热卖',
  `img` int(10) NOT NULL,
  `kouwei` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0,可选1不可选',
  `fenliang` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 可选1不可选',
  `price` decimal(10,2) NOT NULL COMMENT '价格',
  `d_price` decimal(10,2) NOT NULL,
  `x_price` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `is_banner` (`is_banner`,`is_hot`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('29', '23', '0', '鱼香肉丝', '0', '0', '0', '71', '0', '1', '15.00', '0.00', '0.00', '0', '1582445030', '1582445081');
INSERT INTO `goods` VALUES ('30', '23', '0', '红烧肉', '0', '0', '0', '72', '1', '1', '35.00', '0.00', '0.00', '0', '1582445120', '1582445120');
INSERT INTO `goods` VALUES ('31', '23', '0', '土豆鲍鱼', '0', '0', '0', '73', '1', '1', '500.00', '0.00', '0.00', '0', '1582445163', '1582445163');
INSERT INTO `goods` VALUES ('32', '23', '0', '龙虾', '0', '0', '0', '74', '0', '1', '200.00', '0.00', '0.00', '0', '1582445236', '1582445236');
INSERT INTO `goods` VALUES ('33', '23', '0', '北京烤鸭', '0', '0', '0', '75', '1', '1', '50.00', '0.00', '0.00', '1', '1582458736', '1582607663');
INSERT INTO `goods` VALUES ('34', '23', '0', '番茄鸡蛋', '0', '0', '0', '76', '1', '1', '15.00', '0.00', '0.00', '0', '1582458777', '1582458777');
INSERT INTO `goods` VALUES ('35', '23', '0', '糖醋排骨', '0', '0', '0', '77', '0', '0', '25.00', '30.00', '20.00', '0', '1582458824', '1582689445');

-- ----------------------------
-- Table structure for img
-- ----------------------------
DROP TABLE IF EXISTS `img`;
CREATE TABLE `img` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(100) NOT NULL DEFAULT '',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `img` (`img`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of img
-- ----------------------------
INSERT INTO `img` VALUES ('65', '/uploads/20200223/b57e2793a753713deeef9f15489d5bbd.jpg', '0', '0');
INSERT INTO `img` VALUES ('66', '/uploads/20200223/9b5ab6198e9d9391f59dbef6a6d29669.jpg', '0', '0');
INSERT INTO `img` VALUES ('67', '/uploads/20200223/d1349e50c6ae760e5884bec9ea7d24e6.png', '0', '0');
INSERT INTO `img` VALUES ('68', '/uploads/20200223/64a99d70d9f5f978086e25fa0b54c9cf.jpg', '0', '0');
INSERT INTO `img` VALUES ('71', '/uploads/20200223/bea7867e3ab216d1f3b425105a3de0bb.jpg', '0', '0');
INSERT INTO `img` VALUES ('72', '/uploads/20200223/b5d9c98dd476990788f1ed10a0f9c192.jpg', '0', '0');
INSERT INTO `img` VALUES ('73', '/uploads/20200223/fe0b424ae1a77d063a261dec52cf6e79.jpg', '0', '0');
INSERT INTO `img` VALUES ('74', '/uploads/20200223/fe9a3d5cf92b9c318deaf2fb09d97eb7.jpg', '0', '0');
INSERT INTO `img` VALUES ('75', '/uploads/20200223/ec7899cbbb10c4eda2c0fea5c1f7d17c.jpg', '0', '0');
INSERT INTO `img` VALUES ('76', '/uploads/20200223/b4fa5eb6ffcad60733b559318d003130.jpg', '0', '0');
INSERT INTO `img` VALUES ('77', '/uploads/20200223/f721619ad85c31b635a784f0ca8b34d4.jpg', '0', '0');

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
-- Table structure for product_item
-- ----------------------------
DROP TABLE IF EXISTS `product_item`;
CREATE TABLE `product_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(100) NOT NULL DEFAULT '',
  `create_time` int(10) NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  FULLTEXT KEY `img` (`img`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of product_item
-- ----------------------------

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
