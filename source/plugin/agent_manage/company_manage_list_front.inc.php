<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/config.php';

if (!$_G['uid']) {
    showmessage('not_loggedin', NULL, array(), array('login' => 1));
}
$navtitle = '»ú¹¹ÃûÂ¼';
//include DISCUZ_ROOT.'./forumdata/cache/plugin_company_manage_list.php';
include_once libfile('function/profile');
$diqu = profile_setting('residecity');

include template('company_manage:f_list');
?>