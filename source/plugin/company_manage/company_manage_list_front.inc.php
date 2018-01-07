<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/config.php';

if (!$_G['uid']) {
    showmessage('not_loggedin', NULL, array(), array('login' => 1));
}
$navtitle = '机构名录';
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
        $cate_html = '<div class="tree well">';
        foreach ($first_cates as $cate) {
            cate_format($format_cate, $cate, $cate_html);
        }
        $cate_html .= '</div>';
    }
}
if (defined('IN_MOBILE')) {
    $first_diqu = C::t('common_district')->fetch_all_by_upid(0);
    $sec_diqu = DB::fetch_all("SELECT * FROM %t WHERE level =2", array('common_district'));
    $format_sec_diqu = array();
    foreach ($sec_diqu as $s_diqu) {
        $format_sec_diqu[$s_diqu['upid']][] = $s_diqu;
    }
    if ($first_diqu) {
        $diqu = '';
        // <li class="dropdown-submenu">
//        <a tabindex="0">Another action</a>
//
//                        <ul class="dropdown-menu">
//                            <li><a tabindex="0">Sub action</a></li>
//                            <li><a tabindex="0">Another sub action</a></li>
//                            <li><a tabindex="0">Something else here</a></li>
//                        </ul>
//                    </li>
        foreach ($first_diqu as $first) {
            $diqu .= "<li class='dropdown-submenu'><a tabindex='0'>{$first['name']}</a><ul class=\"dropdown-menu\"><li><a tagindex='0' onclick='cate_search({$first['id']})'>全部</a></li>";
            if (!empty($format_sec_diqu[$first['id']])) {
                foreach ($format_sec_diqu[$first['id']] as $sec) {
                    $diqu .= "<li><a tabindex=\"0\">{$sec['name']}</a></li>";
                }
            }
            $diqu .= "</ul></li>";
        }
    } else {
        $diqu = '';
    }
//    print_r($diqu);exit;
} else {
    include_once libfile('function/profile');
    $diqu = profile_setting('residecity');
}
include template('company_manage:f_list');
?>