<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/company_manage_admin.class.php';
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}
if (!empty($_GET['b_id'])) {
    $cate_data = C::t('company_business_type')->fetch_by_where("b_id='{$_GET['b_id']}'");
    if (empty($cate_data)) {
        exit('数据不存在');
    }
    if ($cate_data['parent_id']) {
        get_types($cate_data['parent_id'], $cates);
        $cates=array_reverse($cates);
    }
}
$first_cates = C::t('company_business_type')->fetch_all_by_parent(0);
include template('company_manage_admin:biz_type_form');
?>