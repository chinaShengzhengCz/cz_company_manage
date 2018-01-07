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
SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `pre_agent_manage_base`;
CREATE TABLE `pre_agent_manage_base` (
  `co_id` int(8) unsigned NOT NULL auto_increment,
  `co_name` varchar(64) default NULL,
  `co_level` tinyint(1) default NULL,
  `create_time` datetime default NULL,
  `ensure_money` int(8) default NULL,
  `cash` float(8,2) unsigned default '0.00' COMMENT '�˺����',
  `tel` varchar(32) NOT NULL COMMENT '�ֻ���',
  `point` float(8,2) unsigned default '0.00' COMMENT '�������',
  `uid` int(8) default NULL COMMENT '�û�id',
  `up_co_id` int(8) default NULL,
  PRIMARY KEY  (`co_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `pre_agent_flow`;
CREATE TABLE `pre_agent_flow` (
  `flow_id` int(12) unsigned NOT NULL auto_increment COMMENT '��ˮid',
  `uid` int(8) unsigned NOT NULL COMMENT '�ͻ�id',
  `co_id` int(8) unsigned NOT NULL COMMENT '����uid',
  `create_time` datetime default NULL COMMENT '��������',
  `money` float(8,2) unsigned default NULL COMMENT '������',
  `per` float(3,2) unsigned NOT NULL COMMENT '��ɱ���',
  `point` int(8) default NULL COMMENT '������',
  `source` tinyint(1) default NULL,
  PRIMARY KEY  (`flow_id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

DROP TABLE IF EXISTS `pre_agent_client`;
CREATE TABLE `pre_agent_client` (
  `id` int(8) unsigned NOT NULL auto_increment,
  `name` varchar(64) default NULL COMMENT '����',
  `client_tel` varchar(32) default NULL COMMENT '�ֻ�',
  `company` varchar(100) default NULL COMMENT '��˾',
  `carrer` varchar(32) default NULL COMMENT 'ְλ',
  `uid` int(8) NOT NULL,
  `co_id` int(11) default NULL,
  `profile_card` varchar(128) default NULL COMMENT '��Ƭ',
  `create_time` datetime default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;
EOF;

runquery($sql);
$finish = TRUE;
