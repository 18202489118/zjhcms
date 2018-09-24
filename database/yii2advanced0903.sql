/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : yii2advanced

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-09-03 18:00:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('管理员', '1', '1534515520');
INSERT INTO `auth_assignment` VALUES ('非开发者', '2', '1534547816');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/admin/*', '2', null, null, null, '1534514992', '1534514992');
INSERT INTO `auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1534519505', '1534519505');
INSERT INTO `auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1534519505', '1534519505');
INSERT INTO `auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1534519505', '1534519505');
INSERT INTO `auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1534519505', '1534519505');
INSERT INTO `auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1534519505', '1534519505');
INSERT INTO `auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1534517577', '1534517577');
INSERT INTO `auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1534517577', '1534517577');
INSERT INTO `auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1534517577', '1534517577');
INSERT INTO `auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1534514968', '1534514968');
INSERT INTO `auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1534517577', '1534517577');
INSERT INTO `auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1534517577', '1534517577');
INSERT INTO `auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1534515700', '1534515700');
INSERT INTO `auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1534516911', '1534516911');
INSERT INTO `auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1534517577', '1534517577');
INSERT INTO `auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1534517452', '1534517452');
INSERT INTO `auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1534517452', '1534517452');
INSERT INTO `auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1534517452', '1534517452');
INSERT INTO `auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1534515697', '1534515697');
INSERT INTO `auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1534517452', '1534517452');
INSERT INTO `auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1534517452', '1534517452');
INSERT INTO `auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1534517452', '1534517452');
INSERT INTO `auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1534517452', '1534517452');
INSERT INTO `auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1534517439', '1534517439');
INSERT INTO `auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1534515708', '1534515708');
INSERT INTO `auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1534517452', '1534517452');
INSERT INTO `auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1534517439', '1534517439');
INSERT INTO `auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/blog/create', '2', null, null, null, '1534423205', '1534423205');
INSERT INTO `auth_item` VALUES ('/blog/delete', '2', null, null, null, '1534423205', '1534423205');
INSERT INTO `auth_item` VALUES ('/blog/index', '2', '博客列表', null, null, '1534423198', '1534423198');
INSERT INTO `auth_item` VALUES ('/blog/update', '2', null, null, null, '1534423205', '1534423205');
INSERT INTO `auth_item` VALUES ('/blog/view', '2', null, null, null, '1534423205', '1534423205');
INSERT INTO `auth_item` VALUES ('/debug/*', '2', null, null, null, '1534639540', '1534639540');
INSERT INTO `auth_item` VALUES ('/debug/default/*', '2', null, null, null, '1534639539', '1534639539');
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', '2', null, null, null, '1534639539', '1534639539');
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', '2', null, null, null, '1534639539', '1534639539');
INSERT INTO `auth_item` VALUES ('/debug/default/index', '2', null, null, null, '1534639539', '1534639539');
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', '2', null, null, null, '1534639539', '1534639539');
INSERT INTO `auth_item` VALUES ('/debug/default/view', '2', null, null, null, '1534639539', '1534639539');
INSERT INTO `auth_item` VALUES ('/debug/user/*', '2', null, null, null, '1534639539', '1534639539');
INSERT INTO `auth_item` VALUES ('/debug/user/reset-identity', '2', null, null, null, '1534639539', '1534639539');
INSERT INTO `auth_item` VALUES ('/debug/user/set-identity', '2', null, null, null, '1534639539', '1534639539');
INSERT INTO `auth_item` VALUES ('/gii/*', '2', null, null, null, '1534547660', '1534547660');
INSERT INTO `auth_item` VALUES ('/gii/default/*', '2', null, null, null, '1534547660', '1534547660');
INSERT INTO `auth_item` VALUES ('/gii/default/action', '2', null, null, null, '1534547660', '1534547660');
INSERT INTO `auth_item` VALUES ('/gii/default/diff', '2', null, null, null, '1534547660', '1534547660');
INSERT INTO `auth_item` VALUES ('/gii/default/index', '2', null, null, null, '1534547660', '1534547660');
INSERT INTO `auth_item` VALUES ('/gii/default/preview', '2', null, null, null, '1534547660', '1534547660');
INSERT INTO `auth_item` VALUES ('/gii/default/view', '2', null, null, null, '1534547660', '1534547660');
INSERT INTO `auth_item` VALUES ('/site/index', '2', null, null, null, '1534518960', '1534518960');
INSERT INTO `auth_item` VALUES ('/user-backend/*', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/user-backend/create', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/user-backend/delete', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/user-backend/index', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/user-backend/signup', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/user-backend/update', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('/user-backend/view', '2', null, null, null, '1534517578', '1534517578');
INSERT INTO `auth_item` VALUES ('DEBUG', '2', null, null, null, '1534639484', '1534639484');
INSERT INTO `auth_item` VALUES ('GII', '2', null, null, null, '1534547630', '1534547630');
INSERT INTO `auth_item` VALUES ('人员权限绑定', '2', null, null, null, '1534519570', '1534519570');
INSERT INTO `auth_item` VALUES ('博客相关', '2', '博客相关操作', null, null, '1534517887', '1534517887');
INSERT INTO `auth_item` VALUES ('后台管理人员相关', '2', '后台管理人员相关增删改查', null, null, '1534517826', '1534517826');
INSERT INTO `auth_item` VALUES ('权限（路由）相关', '2', '权限相关增删改查，即权限分配中的最小粒度路由', null, null, '1534517725', '1534517725');
INSERT INTO `auth_item` VALUES ('管理员', '1', '万王之王无所不能', null, null, '1534515080', '1534518029');
INSERT INTO `auth_item` VALUES ('菜单相关', '2', '菜单相关正删改查', null, null, '1534517760', '1534517760');
INSERT INTO `auth_item` VALUES ('角色相关', '2', '角色相关增删改查', null, null, '1534517645', '1534517645');
INSERT INTO `auth_item` VALUES ('路由相关', '2', '路由增删改查', null, null, '1534517370', '1534517370');
INSERT INTO `auth_item` VALUES ('非开发者', '1', '看看就算了', null, null, '1534547753', '1534639614');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('DEBUG', '/debug/*');
INSERT INTO `auth_item_child` VALUES ('DEBUG', '/debug/default/*');
INSERT INTO `auth_item_child` VALUES ('DEBUG', '/debug/default/db-explain');
INSERT INTO `auth_item_child` VALUES ('DEBUG', '/debug/default/download-mail');
INSERT INTO `auth_item_child` VALUES ('DEBUG', '/debug/default/index');
INSERT INTO `auth_item_child` VALUES ('DEBUG', '/debug/default/toolbar');
INSERT INTO `auth_item_child` VALUES ('DEBUG', '/debug/default/view');
INSERT INTO `auth_item_child` VALUES ('DEBUG', '/debug/user/*');
INSERT INTO `auth_item_child` VALUES ('DEBUG', '/debug/user/reset-identity');
INSERT INTO `auth_item_child` VALUES ('DEBUG', '/debug/user/set-identity');
INSERT INTO `auth_item_child` VALUES ('GII', '/gii/*');
INSERT INTO `auth_item_child` VALUES ('GII', '/gii/default/*');
INSERT INTO `auth_item_child` VALUES ('GII', '/gii/default/action');
INSERT INTO `auth_item_child` VALUES ('GII', '/gii/default/diff');
INSERT INTO `auth_item_child` VALUES ('GII', '/gii/default/index');
INSERT INTO `auth_item_child` VALUES ('GII', '/gii/default/preview');
INSERT INTO `auth_item_child` VALUES ('GII', '/gii/default/view');
INSERT INTO `auth_item_child` VALUES ('人员权限绑定', '/admin/assignment/*');
INSERT INTO `auth_item_child` VALUES ('人员权限绑定', '/admin/assignment/assign');
INSERT INTO `auth_item_child` VALUES ('人员权限绑定', '/admin/assignment/index');
INSERT INTO `auth_item_child` VALUES ('人员权限绑定', '/admin/assignment/revoke');
INSERT INTO `auth_item_child` VALUES ('人员权限绑定', '/admin/assignment/view');
INSERT INTO `auth_item_child` VALUES ('博客相关', '/blog/create');
INSERT INTO `auth_item_child` VALUES ('博客相关', '/blog/delete');
INSERT INTO `auth_item_child` VALUES ('博客相关', '/blog/index');
INSERT INTO `auth_item_child` VALUES ('博客相关', '/blog/update');
INSERT INTO `auth_item_child` VALUES ('博客相关', '/blog/view');
INSERT INTO `auth_item_child` VALUES ('后台管理人员相关', '/user-backend/*');
INSERT INTO `auth_item_child` VALUES ('后台管理人员相关', '/user-backend/create');
INSERT INTO `auth_item_child` VALUES ('后台管理人员相关', '/user-backend/delete');
INSERT INTO `auth_item_child` VALUES ('后台管理人员相关', '/user-backend/index');
INSERT INTO `auth_item_child` VALUES ('后台管理人员相关', '/user-backend/signup');
INSERT INTO `auth_item_child` VALUES ('后台管理人员相关', '/user-backend/update');
INSERT INTO `auth_item_child` VALUES ('后台管理人员相关', '/user-backend/view');
INSERT INTO `auth_item_child` VALUES ('权限（路由）相关', '/admin/permission/*');
INSERT INTO `auth_item_child` VALUES ('权限（路由）相关', '/admin/permission/assign');
INSERT INTO `auth_item_child` VALUES ('权限（路由）相关', '/admin/permission/create');
INSERT INTO `auth_item_child` VALUES ('权限（路由）相关', '/admin/permission/delete');
INSERT INTO `auth_item_child` VALUES ('权限（路由）相关', '/admin/permission/index');
INSERT INTO `auth_item_child` VALUES ('权限（路由）相关', '/admin/permission/remove');
INSERT INTO `auth_item_child` VALUES ('权限（路由）相关', '/admin/permission/update');
INSERT INTO `auth_item_child` VALUES ('权限（路由）相关', '/admin/permission/view');
INSERT INTO `auth_item_child` VALUES ('管理员', '/site/index');
INSERT INTO `auth_item_child` VALUES ('管理员', 'DEBUG');
INSERT INTO `auth_item_child` VALUES ('管理员', 'GII');
INSERT INTO `auth_item_child` VALUES ('管理员', '人员权限绑定');
INSERT INTO `auth_item_child` VALUES ('管理员', '博客相关');
INSERT INTO `auth_item_child` VALUES ('管理员', '后台管理人员相关');
INSERT INTO `auth_item_child` VALUES ('管理员', '权限（路由）相关');
INSERT INTO `auth_item_child` VALUES ('管理员', '菜单相关');
INSERT INTO `auth_item_child` VALUES ('管理员', '角色相关');
INSERT INTO `auth_item_child` VALUES ('管理员', '路由相关');
INSERT INTO `auth_item_child` VALUES ('菜单相关', '/admin/menu/*');
INSERT INTO `auth_item_child` VALUES ('菜单相关', '/admin/menu/create');
INSERT INTO `auth_item_child` VALUES ('菜单相关', '/admin/menu/delete');
INSERT INTO `auth_item_child` VALUES ('菜单相关', '/admin/menu/index');
INSERT INTO `auth_item_child` VALUES ('菜单相关', '/admin/menu/update');
INSERT INTO `auth_item_child` VALUES ('菜单相关', '/admin/menu/view');
INSERT INTO `auth_item_child` VALUES ('角色相关', '/admin/role/*');
INSERT INTO `auth_item_child` VALUES ('角色相关', '/admin/role/assign');
INSERT INTO `auth_item_child` VALUES ('角色相关', '/admin/role/create');
INSERT INTO `auth_item_child` VALUES ('角色相关', '/admin/role/delete');
INSERT INTO `auth_item_child` VALUES ('角色相关', '/admin/role/index');
INSERT INTO `auth_item_child` VALUES ('角色相关', '/admin/role/remove');
INSERT INTO `auth_item_child` VALUES ('角色相关', '/admin/role/update');
INSERT INTO `auth_item_child` VALUES ('角色相关', '/admin/role/view');
INSERT INTO `auth_item_child` VALUES ('路由相关', '/admin/route/*');
INSERT INTO `auth_item_child` VALUES ('路由相关', '/admin/route/assign');
INSERT INTO `auth_item_child` VALUES ('路由相关', '/admin/route/create');
INSERT INTO `auth_item_child` VALUES ('路由相关', '/admin/route/index');
INSERT INTO `auth_item_child` VALUES ('路由相关', '/admin/route/refresh');
INSERT INTO `auth_item_child` VALUES ('路由相关', '/admin/route/remove');
INSERT INTO `auth_item_child` VALUES ('非开发者', '/site/index');
INSERT INTO `auth_item_child` VALUES ('非开发者', '后台管理人员相关');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `content` text NOT NULL COMMENT '内容',
  `views` int(11) NOT NULL DEFAULT '0' COMMENT '点击量',
  `is_delete` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否删除 1未删除 2已删除',
  `created_at` datetime NOT NULL COMMENT '添加时间',
  `updated_at` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blog
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目ID',
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '栏目名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='栏目表';

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('2', '栏目111');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '11111');
INSERT INTO `goods` VALUES ('2', '22222');
INSERT INTO `goods` VALUES ('3', '333');
INSERT INTO `goods` VALUES ('4', '444');
INSERT INTO `goods` VALUES ('5', '555');
INSERT INTO `goods` VALUES ('6', '6666');
INSERT INTO `goods` VALUES ('7', '6666');
INSERT INTO `goods` VALUES ('8', '6666');
INSERT INTO `goods` VALUES ('9', '6666');
INSERT INTO `goods` VALUES ('10', '6666');
INSERT INTO `goods` VALUES ('11', '6666');
INSERT INTO `goods` VALUES ('12', '6666');
INSERT INTO `goods` VALUES ('13', '6666');
INSERT INTO `goods` VALUES ('14', '6666');
INSERT INTO `goods` VALUES ('15', '6666');
INSERT INTO `goods` VALUES ('16', '6666');
INSERT INTO `goods` VALUES ('17', '6666');
INSERT INTO `goods` VALUES ('18', '6666');
INSERT INTO `goods` VALUES ('19', '6666');
INSERT INTO `goods` VALUES ('20', '6666');
INSERT INTO `goods` VALUES ('21', '6666');
INSERT INTO `goods` VALUES ('22', '6666');
INSERT INTO `goods` VALUES ('23', '6666');
INSERT INTO `goods` VALUES ('24', '6666');
INSERT INTO `goods` VALUES ('25', '6666');
INSERT INTO `goods` VALUES ('26', '6666');
INSERT INTO `goods` VALUES ('27', '6666');
INSERT INTO `goods` VALUES ('28', '6666');
INSERT INTO `goods` VALUES ('29', '6666');
INSERT INTO `goods` VALUES ('30', '6666');
INSERT INTO `goods` VALUES ('31', '6666');
INSERT INTO `goods` VALUES ('32', '6666');
INSERT INTO `goods` VALUES ('33', '6666');
INSERT INTO `goods` VALUES ('34', '6666');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('9', '系统管理', null, null, '1', null);
INSERT INTO `menu` VALUES ('10', '用户管理', '9', '/user-backend/index', '1', null);
INSERT INTO `menu` VALUES ('11', '菜单管理', '9', '/admin/menu/index', '2', null);
INSERT INTO `menu` VALUES ('12', '权限管理', '9', null, '3', null);
INSERT INTO `menu` VALUES ('13', '角色列表', '12', '/admin/role/index', '1', null);
INSERT INTO `menu` VALUES ('14', '权限列表', '12', '/admin/permission/index', '2', null);
INSERT INTO `menu` VALUES ('15', '分配权限', '12', '/admin/assignment/index', '3', null);
INSERT INTO `menu` VALUES ('16', '路由管理', '12', '/admin/route/index', '3', null);

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1534210042');
INSERT INTO `migration` VALUES ('m130524_201442_init', '1534210044');
INSERT INTO `migration` VALUES ('m140506_102106_rbac_init', '1534323522');
INSERT INTO `migration` VALUES ('m140602_111327_create_menu_table', '1534512505');
INSERT INTO `migration` VALUES ('m170907_052038_rbac_add_index_on_auth_assignment_user_id', '1534323522');

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES ('3', '111112');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `access_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'RkDZ_Epa9KBUyiU5VCN2O1aLbEIEMm1a_1535944875', '', '', '$2y$13$AOtpEO0pEboDugImfFE5ge2rLq9DeEgQ2CT5grrB1brFWGEPpgg0a', null, 'zhm898885242@sina.cn', '10', '2018-08-15 14:28:04', '2018-08-15 14:28:07');
INSERT INTO `user` VALUES ('2', 'admin1', '', '', '1WXjPfw1FGRehPbyVTsU8IDRjhtnxlSk', '$2y$13$pwkZPKF/VjjqfbsX6RU5xuekVt9Jp4dIm7aJZ/qNR.17R7DCc2jGC', null, '898885242@sina.cn', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
INSERT INTO `user` VALUES ('3', '222', 'GR7i_wA5_oUYYc6mR9RxggThWqHfPBS9_1534673650', '', 'Rm_uMJkqfzTo7TLDOkDfQJxY9OmaIGZk', '$2y$13$Itpc2KazUu8nCSdn172Dzu.mbq1PS5tN9vzHmGKJuwqzbjLet/J7C', null, '222@222.com', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for user_backend
-- ----------------------------
DROP TABLE IF EXISTS `user_backend`;
CREATE TABLE `user_backend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` int(11) NOT NULL DEFAULT '0',
  `updated_at` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user_backend
-- ----------------------------
INSERT INTO `user_backend` VALUES ('1', 'admin', '1WXjPfw1FGRehPbyVTsU8IDRjrtnxlSk', '$2y$13$deCYGECk/ZF7Nz6149xvP.nxqY7FJn.2AGtD78lTSV7abUApmSMGK', null, 'zhm898885242@sina.cn', '1', '2147483647', '1535277415');
INSERT INTO `user_backend` VALUES ('2', 'admin1', '1WXjPfw1FGRehPbyVTsU8IDRjhtnxlSk', '$2y$13$utjhxlboWQBMBH1BxqgA/OszR/cv.i8PSRoGPqZx2AMXlELwn4ICi', null, '898885242@sina.cn', '0', '0', '1535266883');
INSERT INTO `user_backend` VALUES ('3', 'admin2', 'qbkfQp5J32LVvDAkQFbCBxRrxNFZ3AIj', '$2y$13$QYR//0asBjOMWZVn4W2Q3u/jYmW/erZiudhapNqemLteKeqDHnVoO', null, '123@12.com', '1', '0', '0');
INSERT INTO `user_backend` VALUES ('4', 'admin3', 'b59sSwgqXbBMzip0WHktp0OLCWopS1I1', '$2y$13$BuiGPhxffetyLwTN9z/FBew/uPogttfXV2vTdFVWp6ZJwUtCbxE6a', null, '123@122.com', '1', '0', '0');
INSERT INTO `user_backend` VALUES ('5', 'admin4', 'ekWjng5erGbeorHvB2USZrCDpH6IdwOi', '$2y$13$SqcyzYoaGUCVsRnUKmaoH.VIWixuDGeikM7PRi8Nue5rlt3KQfIum', null, '8988852422@sina.cn', '1', '0', '0');
INSERT INTO `user_backend` VALUES ('6', 'admin5', 'jkymOkUwY0Y-YEKHUqTH2rzp02UD02J_', '$2y$13$jbHGm56vobCmpdmor89HyOnb7E3/f3vmOqwJPMt.QKsmUDhXyQ4AW', null, '123@1222.com', '1', '0', '0');
INSERT INTO `user_backend` VALUES ('7', 'admin7', 'stCwUVG6L-tp0poqRKngbHC-y40CcpbP', '$2y$13$cxhpGlmW6gBgMtYh4Krnie4NFADzX41DseMrgCRxki/kJH/raX/O.', null, '8988852242@sina.cn', '1', '0', '0');
INSERT INTO `user_backend` VALUES ('8', 'admin8', 'hdeb1SqInEDk00KywycVWaL-fc5wKHbZ', '$2y$13$sXMux8srPCL3z09Md/CQtOd9T/diu4cQT0cLsat8F9YkY7lhp7dk.', null, '89888522242@sina.cn', '1', '0', '0');
INSERT INTO `user_backend` VALUES ('9', 'admin9', 's37sYanss5ef5fexqhX2uy0nLhBK6CVU', '$2y$13$A20TT4LAdw8s3kLPXGnkXer9QhQqXAGtAIJvzYMg2iPVPV5sX7v/O', null, '1232@12.com', '1', '0', '0');
INSERT INTO `user_backend` VALUES ('10', 'admin10', 'MqmVBydKokYdlZJRz0PVZJRw3PcphQqZ', '$2y$13$2OdvTatUbG12nMGSIAnzkekMlvu2Ouwi1iqYOmaxMfcmGauWHaY.S', null, '123222@12.com', '1', '0', '0');
INSERT INTO `user_backend` VALUES ('11', 'admin11', 'XznldNInr4pQ6rgMqURI0v2y9mFHKNGD', '$2y$13$smokwe1D5VxpvASUYJ6z8uibNHiFc1MRzwn6qWS6LL4Ksfxtp65Eu', null, '21@11.com', '1', '0', '0');
INSERT INTO `user_backend` VALUES ('12', 'admin12', 'aEg783sbK3pu6P8YPFDkeY4zI0PVbnqJ', '$2y$13$yERcUVsHSF6Ea7cZbfyckuSTAqKhlz7BPWdYmQT6zdaS.QNV7TTMG', null, '3040404@qq.com', '1', '1535253865', '1535253865');
INSERT INTO `user_backend` VALUES ('13', 'admin13', 'rgbO1t5DSWr8B6HgHHZrr0SdrHBiCqP_', '$2y$13$xzyPO.NC2RFzT6FpkmvXCegoC15aAgGKj9nPaukJF01IzISQpmd9C', null, 'slskdf@123.com', '1', '1535266535', '1535266685');
INSERT INTO `user_backend` VALUES ('14', 'admin14', 'hSE_5BZpi_g_3Wi32xqEY7mQyaMBVR-m', '$2y$13$pj1aDzvQ6HGndAt8dbyHu.4uc35PS1yeoF/Z4iQsGpbhgb47GgDd2', null, '14@163.com', '1', '1535266706', '1535266706');
