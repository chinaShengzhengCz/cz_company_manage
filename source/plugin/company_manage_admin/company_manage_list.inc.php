<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/company_manage_admin.class.php';
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    exit('Access Denied');
}
//include DISCUZ_ROOT.'./forumdata/cache/plugin_company_manage_list.php';
$cate_data = C::t('company_category')->fetch_all();
$format_cate = array();
$cate_html = '无分类或无一级分类';
if (!empty($cate_data)) {
    foreach ($cate_data as $data) {
        $format_cate[$data['parent_id']][] = $data;
    }
    ksort($format_cate);
    $first_cates = C::t('company_category')->fetch_all_by_parent(0);
    if (!empty($first_cates)) {
        $cate_html = '<div class="tree well"><li><span onclick="cate_search(0)"><i class="glyphicon glyphicon-leaf icon-tag"></i><a href="javascript:void(0)">全部</a></span></li>';
        foreach ($first_cates as $cate) {
            cate_format(&$format_cate, $cate, $cate_html);
        }
        $cate_html .= '</div>';
    }
}
include_once libfile('function/profile');
$diqu = profile_setting('residecity');

include template('company_manage_admin:list');
?>