<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/company_manage_admin.class.php';
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}
include template('company_manage_admin:cate_list');
?>