<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: install.php 33885 2013-08-27 06:28:19Z nemohou $
 */

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

$sql = <<<EOF

DROP TABLE IF EXISTS `pre_company_manage_base`;
CREATE TABLE `pre_company_manage_base` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `shorter_name` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `position` int(4) DEFAULT NULL,
  `area_id` int(8) DEFAULT NULL,
  `cate_id` int(8) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `create_operator` varchar(50) DEFAULT NULL,
  `update_operator` varchar(50) DEFAULT NULL,
   `tel` varchar(50) DEFAULT '',
  `boss` varchar(50) DEFAULT '',
  `address` text CHARACTER SET utf8 DEFAULT '',
  PRIMARY KEY (`id`,`code`),
  KEY `inx_code` (`code`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pre_company_map`;
CREATE TABLE `pre_company_map` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `c_code` varchar(16) NOT NULL,
  `p_code` varchar(16) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `create_operator` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `update_operator` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pre_company_cate_map`;
CREATE TABLE `pre_company_cate_map` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `cate_id` int(8) NOT NULL,
  `code` varchar(16) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `create_operator` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `update_operator` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pre_company_category`;
CREATE TABLE `pre_company_category` (
  `cate_id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `parent_id` int(8) DEFAULT NULL,
  `position` int(4) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `create_operator` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `update_operator` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`cate_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pre_company_tag`;
CREATE TABLE `pre_company_tag` (
  `tag_id` int(8) default NULL,
  `tag_name` varchar(32) default NULL,
  `create_time` datetime default NULL,
  `create_operator` varchar(60) default NULL,
  `update_time` datetime default NULL,
  `update_operator` varchar(60) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
EOF;

runquery($sql);
$finish = TRUE;
