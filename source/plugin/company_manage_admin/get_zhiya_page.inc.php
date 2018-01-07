<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/company_manage_admin.class.php';
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/config.php';
$tablename = 'company_zhiya';

$where = '1=1';
$limit = isset($_GET['limit']) ? $_GET['limit'] : 20;
$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
$sort = !empty($_GET['sort']) ? $_GET['sort'] : 'id';
$order = !empty($_GET['order']) ? $_GET['order'] : 'desc';
$add_where = '';
//if (isset($_GET['search_term']) && $_GET['search_term'] != '') {
//    $full_name = iconv('UTF-8', 'GBK', urldecode(urldecode(($_GET['search_term']))));
//    $add_where = " and full_name like '%{$full_name}%' or shorter_name like '%{$full_name}%' or code like '%{$full_name}%'";
//}
//
//if (isset($_GET['full_name']) && $_GET['full_name']) {
//    $full_name = iconv('UTF-8', 'GBK', urldecode(urldecode(($_GET['full_name']))));
//    $add_where = " and full_name like '%{$full_name}%' or shorter_name like '%{$full_name}%'";
//} else {
//    if (isset($_GET['cate_id']) && $_GET['cate_id']) {
//        $codes = C::t('company_cate_map')->fetch_all_by_where("cate_id={$_GET['cate_id']}", 'code');
//        if (!empty($codes)) {
//            $code = get_values($codes, 'code');
//            $code_str = implode("','", array_unique(array_filter($code)));
//            $where .= " and code in ('{$code_str}')";
//
//        } else {
//            print_r(json_encode(array('rows' => array(), 'total' => 0)));
//            exit;
//        }
//    }
//    if (isset($_GET['area_id']) && $_GET['area_id']) {
//        $child_area = array();
//        get_child_area($_GET['area_id'], $child_area);
//        $child_area[] = $_GET['area_id'];
//        $search_area = implode(',', array_filter(array_unique($child_area)));
//        $where .= " and area_id in ({$search_area})";
//    }
//}
if (isset($_GET['finish_alert']) && $_GET['finish_alert']) {
    $where .= " and dis_date is NULL and end_date not NULL";
    $sort = '';
    $order = '';
}
print_r($_POST);exit;
if (isset($page_config[$_G['groupid']])) {
    $data = C::t($tablename)->fetch_page_data($where, $offset, $limit, '*', $page_config[$_G['groupid']], $add_where, "{$sort} {$order}");
} else {
    $data = C::t($tablename)->fetch_page_data($where, $offset, $limit, '*', '', $add_where, "{$sort} {$order}");
}

if (!empty($data)) {
    $t = C::t($tablename)->count_by_where($where, $add_where);
    if (!empty($t['total'])) {
        if (!empty($_G['groupid']) && isset($page_config[$_G['groupid']]) && $page_config[$_G['groupid']] < $t['total']) {
            $total = $page_config[$_G['groupid']];
        } else {
            $total = $t['total'];
        }
    } else {
        $total = 0;
    }
    $holder_ids = implode(',', array_filter(array_unique(get_values($data, 'holder_id'))));
    if (!empty($holder_ids)) {
        $holders = C::t('company_holder')->fetch_all_by_where("holder_id in ({$holder_ids})", 'holder_id,holder_name');
        if ($holders) {
            $data = merge_arr($data, $holders, 'holder_id');
        }
    }
    $codes = implode("','", array_filter(array_unique(get_values($data, 'code'))));
    if (!empty($codes)) {
        $companys = C::t('company_manage_base')->fetch_all_by_where("code in ('{$codes}')", 'code,shorter_name');
        if ($companys) {
            $data = merge_arr($data, $companys, 'code');
        }
    }
    $zhiya_codes = implode("','", array_filter(array_unique(get_values($data, 'zhiya_code'))));
    if (!empty($zhiya_codes)) {
        $zhiya_companys = C::t('company_manage_base')->fetch_all_by_where("code in ('{$zhiya_codes}')", 'code as zhiya_code,shorter_name as zhiya_name');
        if ($zhiya_companys) {
            $data = merge_arr($data, $zhiya_companys, 'zhiya_code');
        }
    }
    $return['rows'] = gbk2utf8($data);
    $return['total'] = $total;
    print_r(json_encode($return));
} else {
    print_r(json_encode(array('rows' => array(), 'total' => 0)));
}

?>