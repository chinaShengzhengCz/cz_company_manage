<?php

require_once DISCUZ_ROOT . './source/plugin/agent_manage_admin/agent_manage_admin.class.php';
require_once DISCUZ_ROOT . './source/plugin/agent_manage_admin/config.php';
$tablename = 'agent_manage_base';

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
$data = C::t($tablename)->fetch_page_data($where, $offset, $limit, '*', '', $add_where);
if (!empty($data)) {
    $t = C::t($tablename)->count_by_where($where, $add_where);
    $total = $t['total'];
    $cate_ids = implode(',', array_filter(array_unique(get_values($data, 'cate_id'))));
    $return['rows'] = gbk2utf8($data);
    $return['total'] = $total;
    print_r(json_encode($return));
} else {
    print_r(json_encode(array('rows' => array(), 'total' => 0)));
}

?>