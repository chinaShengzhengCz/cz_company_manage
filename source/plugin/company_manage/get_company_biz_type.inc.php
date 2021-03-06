<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/company_manage_admin.class.php';
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/get_data_common.class.php';
$tablename = 'company_business_type';
$where = '1=1';
$get_method = 'post';
if (isset($_POST['parent_id']) && $_POST['parent_id'] != '') {
    $where .= " and parent_id={$_POST['parent_id']}";
}
$add_where = '';
if (isset($_GET['search_term']) && $_GET['search_term'] != '') {
    $full_name = iconv('UTF-8', 'GBK', urldecode(urldecode(($_GET['search_term']))));
    $add_where = " and type_name like '%{$full_name}%'";
    $data = C::t($tablename)->fetch_all_by_where($where,'b_id,type_name',$add_where);
    foreach ($data as &$m) {
        $m['id'] = $m['b_id'];
        $m['text'] = $m['type_name'];
    }
    print_r(json_encode(gbk2utf8($data)));
    exit;
}
$data = C::t($tablename)->fetch_page_data($where, $offset, $limit);
if (!empty($data)) {
    $totals = C::t($tablename)->count_by_where($where);
    if (!empty($totals['total'])) {
        $total = $totals['total'];
    } else {
        $total = 0;
    }
    $p_cate_ids = implode(',', array_filter(array_unique(get_values($data, 'parent_id'))));
    if (!empty($p_cate_ids)) {
        $parents = C::t($tablename)->fetch_all_by_where("b_id in ({$p_cate_ids})", 'b_id as parent_id,type_name as parent_name');
        if ($parents) {
            $data = merge_arr($data, $parents, 'parent_id');
        }
    }
    $return['rows'] = gbk2utf8($data);
    $return['total'] = $total;
    print_r(json_encode($return));
} else {
    print_r(json_encode(array('rows' => array(), 'total' => 0)));
}

?>