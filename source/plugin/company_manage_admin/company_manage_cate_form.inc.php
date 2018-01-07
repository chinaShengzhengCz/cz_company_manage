<?php

if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}

require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/company_manage_admin.class.php';

if (!empty($_GET['cate_id'])) {
    $cate_data = C::t('company_category')->fetch_by_where("cate_id='{$_GET['cate_id']}'");
    if (empty($cate_data)) {
        exit('数据不存在');
    }
    if ($cate_data['parent_id']) {
        get_cates($cate_data['parent_id'], $cates);
        $cates=array_reverse($cates);
    }
}
$first_cates = C::t('company_category')->fetch_all_by_parent(0);
include template('company_manage_admin:cate_form');
?>