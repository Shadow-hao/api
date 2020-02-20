/*
Navicat MySQL Data Transfer

Source Server         : x
Source Server Version : 50726
Source Host           : 47.105.150.81:3306
Source Database       : video

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-01-19 19:13:37
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '1', '9cbf8a4dcb8e30682b927f352d6559a0', 'admin', '0', '0');
INSERT INTO `admin` VALUES ('4', '2', '9cbf8a4dcb8e30682b927f352d6559a0', 'teat', '0', '0');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '0', '权限管理', 'layui-icon-auz', '1', '', '0');
INSERT INTO `menu` VALUES ('2', '0', '首页', 'layui-icon-home', '0', '', '0');
INSERT INTO `menu` VALUES ('3', '1', '菜单节点', '', '0', '', '0');
INSERT INTO `menu` VALUES ('4', '3', '菜单列表', '', '0', '/admin/menu/index', '0');
INSERT INTO `menu` VALUES ('7', '1', '管理员管理', '', '0', '/admin/admin/admin_list', '0');
INSERT INTO `menu` VALUES ('8', '3', '添加顶级菜单', '', '0', '/admin/menu/add_menu', '1');
INSERT INTO `menu` VALUES ('9', '3', '添加子菜单', '', '0', '/admin/menu/addc_menu', '1');
INSERT INTO `menu` VALUES ('10', '3', '编辑菜单', '', '0', '/admin/menu/edit_menu', '1');
INSERT INTO `menu` VALUES ('11', '3', '删除菜单', '', '0', '/admin/menu/del_menu', '1');
INSERT INTO `menu` VALUES ('13', '1', '角色管理', '', '0', '/admin/role/index', '0');
INSERT INTO `menu` VALUES ('14', '13', '添加角色', '', '0', '/admin/role/role_add', '1');
INSERT INTO `menu` VALUES ('15', '13', '角色编辑', '', '0', '/admin/role/role_edit', '1');
INSERT INTO `menu` VALUES ('19', '0', '系统管理', 'layui-icon-set', '2', '', '0');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '系统管理员', '', '0', null, '0');
INSERT INTO `role` VALUES ('2', '123', '123', '0', '[\"2\",\"1\",\"3\",\"4\"]', '0');
INSERT INTO `role` VALUES ('3', '223', '4333', '0', '[\"2\",\"1\"]', '0');
