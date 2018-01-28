<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/config.php';
$tablename = 'company_zhiya';

$where = '1=1';
$limit = isset($_GET['limit']) ? $_GET['limit'] : 20;
$offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
$sort = !empty($_GET['sort']) ? $_GET['sort'] : 'start_date';
$order = !empty($_GET['order']) ? $_GET['order'] : 'desc';
$add_where = '';
$return = array('rows' => array(), 'total' => 0);
$field = !empty($_GET['field']) ? $_GET['field'] : 'id,code,stock_code,holder_id,zhiya_code,zhiya_count,zhiya_type,start_date,end_date,dis_date,gap,stock_value';
if (isset($_GET['finish_alert']) && $_GET['finish_alert']) {
    $today_string = date('Y-m-d');
    $where .= " and (dis_date is NULL or dis_date='0000-00-00') and end_date >='{$today_string}'";
    $sort = 'end_date';
    $order = 'asc';
    $return['condition_name'] = '质押到期提醒';
} elseif (isset($_GET['dis_recent']) && $_GET['dis_recent']) {
    $today_string = date('Y-m-d');
    if (is_numeric($_GET['dis_recent'])) {
        $range = 30 * intval($_GET['dis_recent']);
        $where .= " and TIMESTAMPDIFF(DAY,start_date,dis_date) <= {$range}";
        $return['condition_name'] = $range . '天内解押';
    } else {
        $return['condition_name'] = '近期解押';
        $where .= " and (dis_date is not NULL and dis_date !='0000-00-00')";
    }
    $sort = 'dis_date';
    $order = 'desc';
} elseif (isset($_GET['is_gap']) && $_GET['is_gap']) {
    $sort = !empty($_GET['sort']) ? $_GET['sort'] : 'gap';
    $order = !empty($_GET['order']) ? $_GET['order'] : 'asc';
    $where .= " and (dis_date is NULL or dis_date ='0000-00-00' or dis_date ='')";
    $return['condition_name'] = '差价查询';
} elseif (isset($_GET['zhiya_recent']) && $_GET['zhiya_recent']) {
    if (is_numeric($_GET['zhiya_recent'])) {
        $range = 30 * intval($_GET['zhiya_recent']);
        $return['condition_name'] = $range . '内短期质押';
        $where .= " and TIMESTAMPDIFF(DAY,start_date,end_date) <= {$range}";
        $sort = 'start_date';
        $order = 'desc';
    }
} else {
    if (isset($_GET['stock_code']) && $_GET['stock_code']) {
        $stock_code = trim($_GET['stock_code']);
        $add_where = " and stock_code like '%{$stock_code}%'";
    }
    if (isset($_GET['full_name']) && $_GET['full_name']) {
        $full_name = trim(iconv('UTF-8', 'GBK', urldecode(urldecode(($_GET['full_name'])))));
        $add_where = " and full_name like '%{$full_name}%' or shorter_name like '%{$full_name}%'";
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
    if (isset($_GET['zhiya_name']) && $_GET['zhiya_name']) {
        $full_name = trim(iconv('UTF-8', 'GBK', urldecode(urldecode(($_GET['zhiya_name'])))));
        $companys = C::t('company_manage_base')->fetch_all_by_where('1=1', 'code,full_name,shorter_name', " and (full_name like '%{$full_name}%' or shorter_name like '%{$full_name}%')");
        if (!empty($companys)) {
            $tmp_codes = implode("','", array_filter(array_unique(get_values($companys, 'code'))));
            $add_where .= " and (zhiya_code in ('{$tmp_codes}') or zhiya_code like '%{$full_name}%')";
        } else {
            $add_where .= " and zhiya_code like '%{$full_name}%'";
        }
    }
    if (isset($_GET['holder_name']) && $_GET['holder_name']) {
        $full_name = trim(iconv('UTF-8', 'GBK', urldecode(urldecode(($_GET['holder_name'])))));
        $holders = C::t('company_holder')->fetch_all_by_where('1=1', 'holder_id', " and holder_name like '%{$full_name}%'");
        if (!empty($holders)) {
            $holder_ids = implode("','", array_filter(array_unique(get_values($holders, 'holder_id'))));
            $add_where .= " and (holder_id in ('{$holder_ids}') or holder_id like '%{$full_name}%')";
        } else {
            $add_where .= " and holder_id like '%{$full_name}%'";
        }
    }
    if (!empty($_GET['start_date_s']) || !empty($_GET['start_date_e'])) {
        $s = $_GET['start_date_s'] ? $_GET['start_date_s'] : date('Y-m-d', 0);
        $e = $_GET['start_date_e'] ? $_GET['start_date_e'] : '3000-00-00';
        $where .= " and start_date >= '{$s}' and start_date<= '{$e}'";
    }
    if (!empty($_GET['end_date_s']) || !empty($_GET['end_date_e'])) {
        $s = $_GET['end_date_s'] ? $_GET['end_date_s'] : date('Y-m-d', 0);
        $e = $_GET['end_date_e'] ? $_GET['end_date_e'] : '3000-00-00';
        $where .= " and end_date >= '{$s}' and end_date<= '{$e}'";
    }
    if (!empty($_GET['dis_date_s']) || !empty($_GET['dis_date_e'])) {
        $s = $_GET['dis_date_s'] ? $_GET['dis_date_s'] : date('Y-m-d', 0);
        $e = $_GET['dis_date_e'] ? $_GET['dis_date_e'] : '3000-00-00';
        $where .= " and dis_date >= '{$s}' and dis_date<= '{$e}'";
    }

}
if (isset($page_config[$_G['groupid']])) {
    $data = C::t($tablename)->fetch_page_data($where, $offset, $limit, $field, $page_config[$_G['groupid']], $add_where, "{$sort} {$order}");
} else {
    $data = C::t($tablename)->fetch_page_data($where, $offset, $limit, $field, '', $add_where, "{$sort} {$order}");
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
    $holder_ids = implode("','", array_filter(array_unique(get_values($data, 'holder_id'))));
    if (!empty($holder_ids)) {
        $holders = C::t('company_holder')->fetch_all_by_where("holder_id in ('{$holder_ids}')", 'holder_id,key_field,holder_type,holder_name');
        if ($holders) {
            foreach ($holders as $holder) {
                if ($holder['holder_type'] == 1) {
                    $holder_codes[] = $holder['key_field'];
                } else {
                    continue;
                }
            }
            if (!empty($holder_codes)) {
                $tmp_holder_codes = implode("','", array_filter(array_unique($holder_codes)));
                $holder_coms = C::t('company_manage_base')->fetch_all_by_where("code in ('{$tmp_holder_codes}')", 'code as key_field,shorter_name as holder_name');
                $holders = merge_arr($holders, $holder_coms, 'key_field');
            }
            $data = merge_arr($data, $holders, 'holder_id');
        }
    }
    foreach ($data as &$row) {
        if (empty($row['holder_name'])) {
            $row['holder_name'] = $row['holder_id'];
        }
        if (empty($row['zhiya_name'])) {
            $row['zhiya_name'] = $row['zhiya_code'];
        }
    }
    $codes = implode("','", array_filter(array_unique(get_values($data, 'code'))));
    if (!empty($codes)) {
        $companys = C::t('company_manage_base')->fetch_all_by_where("code in ('{$codes}')", 'code,shorter_name');
        if ($companys) {
            $data = merge_arr($data, $companys, 'code');
        }
    }
//    $zhiya_names = $zhiya_codes = array();
    foreach ($data as $d) {
        if ($d['zhiya_type'] != '个人') {
            $zhiya_codes[] = $d['zhiya_code'];
        } else {
            $zhiya_names[] = array('id' => $d['id'], 'zhiya_name' => $d['zhiya_code']);
        }
    }
    if (!empty($zhiya_names)) {
        $data = merge_arr($data, $zhiya_names, 'id');
    }
    $zhiya_codes = implode("','", array_filter(array_unique($zhiya_codes)));
    if (!empty($zhiya_codes)) {
        $zhiya_companys = C::t('company_manage_base')->fetch_all_by_where("code in ('{$zhiya_codes}')", 'code as zhiya_code,shorter_name as zhiya_name');
        if ($zhiya_companys) {
            $data = merge_arr($data, $zhiya_companys, 'zhiya_code');
        }
    }
    $return['rows'] = $data;
    $return['total'] = $total;
    print_r(json_encode(gbk2utf8($return)));
} else {
    print_r(json_encode(gbk2utf8($return)));
}

?>