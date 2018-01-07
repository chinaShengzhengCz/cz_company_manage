<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/config.php';

if (!$_G['uid']) {
    showmessage('not_loggedin', NULL, array(), array('login' => 1));
}
if (in_array($_G['groupid'], $zhiya_view_limit_config)) {
    showmessage($config_zhiya_view_limit_message, '', array(), array());
}
$navtitle = 'ึสับฟโ';
//include DISCUZ_ROOT.'./forumdata/cache/plugin_company_manage_list.php';
$cate_data = C::t('company_zhiya')->fetch_all();

include template('company_manage:f_zhiya_list');
?>