<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/config.php';
$tablename = 'company_stock_price';

$where = '1=1';
$limit = isset($_GET['limit']) ? $_GET['limit'] : 20;
$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
$sort = !empty($_GET['sort']) ? $_GET['sort'] : 'zhiyabili';
$order = !empty($_GET['order']) ? $_GET['order'] : 'desc';
$add_where = '';
$field = !empty($_GET['field']) ? $_GET['field'] : '*';
$return = array('rows' => array(), 'total' => 0);
if (isset($_GET['stock_code']) && $_GET['stock_code']) {
    $stock_code = trim($_GET['stock_code']);
    $add_where = " and stock_code like '%{$stock_code}%'";
}
if (isset($_GET['company_name']) && $_GET['company_name']) {
    $full_name = trim(iconv('UTF-8', 'GBK', urldecode(urldecode(($_GET['company_name'])))));
    $companys = C::t('company_manage_base')->fetch_all_by_where('1=1', 'code', " and shorter_name like '%{$full_name}%'");
    if (!empty($companys)) {
        $tmp_codes = implode("','", array_filter(array_unique(get_values($companys, 'code'))));
        $add_where .= " and (code in ('{$tmp_codes}') or code like '%{$full_name}%')";
    } else {
        $add_where .= " and code like '%{$full_name}%'";
    }
}
$data = C::t($tablename)->fetch_page_data($where, $offset, $limit, $field, '', $add_where, "{$sort} {$order}");
if (!empty($data)) {
    $t = C::t($tablename)->count_by_where($where, $add_where);
    if (!empty($t['total'])) {
        $total = $t['total'];
    } else {
        $total = 0;
    }
    $codes = implode("','", array_filter(array_unique(get_values($data, 'code'))));
    if (!empty($codes)) {
        $companys = C::t('company_manage_base')->fetch_all_by_where("code in ('{$codes}')", 'code,shorter_name');
        if ($companys) {
            $data = merge_arr($data, $companys, 'code');
        }
    }
    $return['rows'] = $data;
    $return['total'] = $total;
    print_r(json_encode(gbk2utf8($return)));
} else {
    print_r(json_encode(gbk2utf8($return)));
}

?>