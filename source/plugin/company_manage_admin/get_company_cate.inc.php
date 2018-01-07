<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/company_manage_admin.class.php';
$tablename = 'company_category';
$where = '1=1';
if (isset($_REQUEST['limit']) && is_numeric($_REQUEST['limit'])) {
    $limit = $_REQUEST['limit'];
} else {
    $limit = 20;
}
if (isset($_REQUEST['offset']) && $_REQUEST['offset'] != '') {
    $offset = $_REQUEST['offset'];
} else {
    $offset = 0;
}
if (isset($_REQUEST['parent_id']) && $_REQUEST['parent_id'] != '') {
    $where .= " and parent_id={$_REQUEST['parent_id']}";
}
$data = C::t($tablename)->fetch_page_data($where, $offset, $limit);
if (!empty($data)) {
    $totals = C::t($tablename)->count_by_where($where);
    if (!empty($totals['total'])) {
        $total = $totals['total'];
    }else{
        $total = 0;
    }
    $p_cate_ids = implode(',', array_filter(array_unique(get_values($data, 'parent_id'))));
    if (!empty($p_cate_ids)) {
        $parents = C::t($tablename)->fetch_all_by_where("cate_id in ({$p_cate_ids})", 'cate_id as parent_id,name as parent_name');
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