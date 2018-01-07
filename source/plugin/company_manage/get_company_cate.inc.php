<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
$tablename = 'company_category';
$where = '1=1';
if (isset($_POST['limit']) && is_numeric($_POST['limit'])) {
    $limit = $_POST['limit'];
} else {
    $limit = 20;
}
if (isset($_POST['offset']) && $_POST['offset'] != '') {
    $offset = $_POST['offset'];
} else {
    $offset = 0;
}
if (isset($_POST['parent_id']) && $_POST['parent_id'] != '') {
    $where .= " and parent_id={$_POST['parent_id']}";
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