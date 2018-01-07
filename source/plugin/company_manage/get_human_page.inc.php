<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/config.php';
$tablename = 'company_human';

$where = '1=1';
$limit = isset($_GET['limit']) ? $_GET['limit'] : 20;
$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
$sort = !empty($_GET['sort']) ? $_GET['sort'] : 'hid';
$order = !empty($_GET['order']) ? $_GET['order'] : 'desc';
$add_where = '';

if (isset($_GET['full_name']) && $_GET['full_name']) {
    $full_name = iconv('UTF-8', 'GBK', urldecode(urldecode(($_GET['full_name']))));
    $add_where = " and full_name like '%{$full_name}%' or shorter_name like '%{$full_name}%'";
} else {
    if (isset($_GET['b_id']) && $_GET['b_id']) {
        $add_where = " and find_in_set('{$_GET['b_id']}',b_id)";
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
}
if (isset($_GET['area_id']) && $_GET['area_id']) {
    $child_area = array();
    get_child_area($_GET['area_id'], $child_area);
    $child_area[] = $_GET['area_id'];
    $search_area = implode(',', array_filter(array_unique($child_area)));
    $where .= " and area_id in ({$search_area})";
}
if (isset($page_config[$_G['groupid']])) {
    $data = C::t($tablename)->fetch_page_data($where, $offset, $limit, '*', $page_config[$_G['groupid']], $add_where);
} else {
    $data = C::t($tablename)->fetch_page_data($where, $offset, $limit, '*', '', $add_where);
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

    $codes = implode("','", array_filter(array_unique(get_values($data, 'code'))));
    if (!empty($codes)) {
        $coms = C::t('company_manage_base')->fetch_all_by_where("code in ('{$codes}')", 'code,shorter_name,cate_id');
        if ($coms) {
            $data = merge_arr($data, $coms, 'code');
        }
    }
    $b_ids = implode(',', array_filter(array_unique(explode(',', implode(',', get_values($data, 'b_id'))))));
    if (!empty($b_ids)) {
        $types = C::t('company_business_type')->fetch_all_by_where("b_id in ({$b_ids})", 'b_id,type_name');
        if ($types) {
            $types = map_array($types, 'b_id');
        }
    }
    foreach ($data as &$row) {
        $row_b_ids = explode(',', $row['b_id']);
        if (!empty($types) && !empty($row_b_ids)) {
            $tmp_type_names = array();
            foreach ($row_b_ids as $r_b) {
                if (isset($types[$r_b])) {
                    $tmp_type_names[] = $types[$r_b]['type_name'];
                }
            }
            if (!empty($tmp_type_names)) {
                $row['type_name'] = implode(',', $tmp_type_names);
            }
        }
        $areas = array();
        format_area($row['area_id'], $areas);
        if (!empty($areas)) {
            $area_names = get_values(array_reverse($areas), 'name');
            $row['area_name'] = empty($area_names) ? '-' : implode('-', $area_names);
        } else {
            $row['area_name'] = '';
        }
        $cates = array();
        $first_cates = C::t('company_category')->fetch_all_by_where("parent_id =0", 'cate_id,name as cate_name');
        $first_cates = map_array($first_cates, 'cate_id');
        $first_cate_ids = get_values($first_cates, 'cate_id');
        if (!in_array($first_cate_ids, $row['cate_id'])) {
            $cates = array();
            get_cates($row['cate_id'], $cates);
            if (!empty($cates)) {
                $cate_names = get_values(array_reverse($cates), 'name');
                $row['cate_name'] = empty($cate_names) ? '-' : implode('-', $cate_names);
            } else {
                $row['cate_name'] = '';
            }
        } else {
            $row['cate_name'] = $first_cates[$row['cate_id']]['cate_name'];
        }
    }
    $return['rows'] = gbk2utf8($data);
    $return['total'] = $total;
    print_r(json_encode($return));
} else {
    print_r(json_encode(array('rows' => array(), 'total' => 0)));
}

?>