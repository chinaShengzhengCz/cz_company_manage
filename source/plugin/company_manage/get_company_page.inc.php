<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/config.php';
$tablename = 'company_manage_base';

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
if (isset($_GET['fields']) && $_GET['fields'] != '') {
    $fields = $_GET['fields'];
} else {
    if (in_array($_G['groupid'], $view_limit_config)) {
        $fields = 'code,shorter_name,full_name,cate_id,area_id,position';
    } else {
        $fields = '*';
    }
}
$return = array('rows' => array(), 'total' => 0);

$add_where = '';
if (isset($_GET['search_term']) && $_GET['search_term'] != '') {
    $full_name = iconv('UTF-8', 'GBK', urldecode(urldecode(($_GET['search_term']))));
    $full_name = trim(trim($full_name, "\t"));
    $full_name = str_replace('(', 'ги', $full_name);
    $full_name = str_replace(')', 'ги', $full_name);
    $add_where = " and (full_name like '%{$full_name}%' or shorter_name like '%{$full_name}%' or code like '%{$full_name}%')";
}

if (isset($_GET['full_name']) && $_GET['full_name']) {
    $full_name = iconv('UTF-8', 'GBK', urldecode(urldecode(($_GET['full_name']))));
    $full_name = trim(trim($full_name, "\t"));
    $full_name = str_replace('(', 'ги', $full_name);
    $full_name = str_replace(')', 'ги', $full_name);
    if (strstr($full_name, ' ')) {
        $search_words = array_filter(explode(' ', $full_name));
        $add_where = ' and (';
        foreach ($search_words as $search_word) {
            if ($add_where != ' and (') {
                $add_where .= " and (full_name like '%{$search_word}%' or shorter_name like '%{$search_word}%') ";
            } else {
                $add_where .= "(full_name like '%{$search_word}%' or shorter_name like '%{$search_word}%' )";
            }
        }
        $add_where .= ')';
    } else {
        $add_where = " and (full_name like '%{$full_name}%' or shorter_name like '%{$full_name}%')";
    }
}
if (isset($_GET['cate_id']) && $_GET['cate_id']) {
    $add_where .= " and find_in_set('{$_GET['cate_id']}',cate_map)";
    $search_cate = getCateById($_GET['cate_id']);
    if ($search_cate) {
        $return['cateName'] = gbk2utf8($search_cate['name']);
    }
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
    $t_diqu = getAreaById($_GET['area_id']);
    $return['areaName'] = gbk2utf8($t_diqu['name']);
}

if (isset($page_config[$_G['groupid']])) {
    $data = C::t($tablename)->fetch_page_data($where, $offset, $limit, $fields, $page_config[$_G['groupid']], $add_where, "position desc,id desc");
} else {
    $data = C::t($tablename)->fetch_page_data($where, $offset, $limit, $fields, '', $add_where, "position desc,id desc");
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
    print_r(json_encode($return));
}

?>