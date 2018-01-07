<?php
require_once DISCUZ_ROOT . './source/plugin/agent_manage_admin/agent_manage_admin.class.php';

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}
//include DISCUZ_ROOT.'./forumdata/cache/plugin_agent_manage_list.php';
include template('agent_manage_admin:list');
?>