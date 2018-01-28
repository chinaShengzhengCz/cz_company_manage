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

if (defined('IN_MOBILE')) {
    if (!empty($_REQUEST['type']) && $_REQUEST['type'] == 'getArea') {
        if (isset($_REQUEST['operaId']) && $_REQUEST['operaId']) {
            $diqu = DB::fetch_all("SELECT id,name FROM %t WHERE upid ={$_REQUEST['operaId']}", array('common_district'));
            $t_diqu = DB::fetch_first("SELECT id,name FROM %t WHERE id ={$_REQUEST['operaId']}", array('common_district'));
            array_unshift($diqu, array('id' => $_REQUEST['operaId'], 'name' => '全部', 'is_all' => 1));
            exit(json_encode(array('rows' => gbk2utf8($diqu))));
        } else {
            $first_diqu = DB::fetch_all("SELECT id,name FROM %t WHERE upid =0", array('common_district'));
            array_unshift($first_diqu, array('id' =>'0', 'name' => '全部', 'is_all' => 1));
            exit(json_encode(array('rows' => gbk2utf8($first_diqu))));
        }

    }

//    print_r($diqu);exit;
} else {
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
    include_once libfile('function/profile');
    $diqu = profile_setting('residecity');
}
include template('company_manage:f_list');
?>