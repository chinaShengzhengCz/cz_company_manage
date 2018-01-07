<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/config.php';
$tablename = 'agent_client';

$where = '1=1';
if (isset($_GET['limit']) && is_numeric($_GET['limit'])) {
    $limit = $_GET['limit'];
} else {
    $limit = 20;
}
if (isset($_GET['offset']) && $_GET['offset'] != '') {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}
$add_where = '';
if (isset($_GET['search_term']) && $_GET['search_term'] != '') {
    $full_name = iconv('UTF-8', 'GBK', urldecode(urldecode(($_GET['search_term']))));
    $add_where = " and full_name like '%{$full_name}%' or shorter_name like '%{$full_name}%' or code like '%{$full_name}%'";
}

if (isset($_GET['full_name']) && $_GET['full_name']) {
    $full_name = iconv('UTF-8', 'GBK', urldecode(urldecode(($_GET['full_name']))));
    $add_where = " and full_name like '%{$full_name}%' or shorter_name like '%{$full_name}%'";
} else {
    if (isset($_GET['cate_id']) && $_GET['cate_id']) {
        $add_where = " and find_in_set('{$_GET['cate_id']}',cate_map)";
//        if (!empty($codes)) {
//            $code = get_values($codes, 'code');
//            $code_str = implode("','", array_unique(array_filter($code)));
//            $where .= " and code in ('{$code_str}')";
//
//        } else {
//            print_r(json_encode(array('rows' => array(), 'total' => 0)));
//            exit;
//        }
    }
    if (isset($_GET['area_id']) && $_GET['area_id']) {
        $child_area = array();
        get_child_area($_GET['area_id'], $child_area);
        $child_area[] = $_GET['area_id'];
        $search_area = implode(',', array_filter(array_unique($child_area)));
        $where .= " and area_id in ({$search_area})";
    }
}
if (isset($page_config[$_G['groupid']])) {
    $data = C::t($tablename)->fetch_page_data($where, $offset, $limit, '*', $page_config[$_G['groupid']], $add_where);
} else {
    $data = C::t($tablename)->fetch_page_data($where, $offset, $limit, '*', '', $add_where);
}

if (!empty($data)) {
    if (isset($_GET['search_term']) && $_GET['search_term'] != '') {
        foreach ($data as &$m) {
            $m['id'] = $m['code'];
            $m['text'] = $m['full_name'];
        }
        print_r(json_encode(gbk2utf8($data)));
        exit;
    } else {
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
        $cate_ids = implode(',', array_filter(array_unique(get_values($data, 'cate_id'))));
        if (!empty($cate_ids)) {
            $cates = C::t('company_category')->fetch_all_by_where("cate_id in ({$cate_ids})", 'cate_id,name as cate_name');
            if ($cates) {
                $data = merge_arr($data, $cates, 'cate_id');
            }
        }
        foreach ($data as &$row) {
            $areas = array();
            format_area($row['area_id'], $areas);
            if (!empty($areas)) {
                $area_names = get_values(array_reverse($areas), 'name');
                $row['area_name'] = empty($area_names) ? '-' : implode('-', $area_names);
            } else {
                $row['area_name'] = '';
            }
        }
        $return['rows'] = gbk2utf8($data);
        $return['total'] = $total;
        print_r(json_encode($return));
    }
} else {
    print_r(json_encode(array('rows' => array(), 'total' => 0)));
}

?>