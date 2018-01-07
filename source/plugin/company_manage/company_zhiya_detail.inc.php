<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/config.php';
$tablename = 'company_zhiya';
$navtitle = '质押';
if (!$_G['uid']) {
    showmessage('not_loggedin', NULL, array(), array('login' => 1));
}
if (!empty($_GET['zhiya_id'])) {
    $zhiya_data = C::t('company_zhiya')->fetch_by_where("id='{$_GET['zhiya_id']}'");
    if (empty($zhiya_data)) {
        showmessage('数据不存在', 'plugin.php?id=company_manage:company_zhiya_list_front', array(), array());
    } else {
        $tmp_company = C::t('company_manage_base')->fetch_by_where("code='{$zhiya_data['code']}'", 'shorter_name');
        if (!empty($tmp_company)) {
            $zhiya_data['code_company'] = $tmp_company['shorter_name'];
        }else{
            $zhiya_data['code_company'] = $zhiya_data['code'];
        }
        $zhiya_company = C::t('company_manage_base')->fetch_by_where("code ='{$zhiya_data['zhiya_code']}'", 'shorter_name');
        if (!empty($zhiya_company)) {
            $zhiya_data['zhiya_company_name'] = $zhiya_company['shorter_name'];
        } else {
            $zhiya_data['zhiya_company_name'] = $zhiya_data['zhiya_code'];
        }
        $holder = C::t('company_holder')->fetch_by_where("holder_id ='{$zhiya_data['holder_id']}'", 'holder_id,holder_name');
        if (!empty($holder)) {
            $zhiya_data['holder_name'] = $holder['holder_name'];
        } else {
            $zhiya_data['holder_name'] = $zhiya_data['holder_id'];
        }
        $zhiya_data['is_rebuy'] = $zhiya_data['is_rebuy']=='True' ? '是' : '否';
        if ($_GET['oper'] == 'view') {
            $oper = $_GET['oper'];
//            if($zhiya_data['zhiya_type'] == '个人'){
//                $zhiya_data['zhiya_company_name'] = $zhiya_data['zhiya_code'];
//            }
        } elseif ($_GET['oper'] == 'child') {
            $oper = $_GET['oper'];
            if (!empty($_GET['type']) && $_GET['type'] == 'data') {
                $where = "code='{$zhiya_data['code']}'";
                $limit = isset($_GET['limit']) ? $_GET['limit'] : 20;
                $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
                $sort = !empty($_GET['sort']) ? $_GET['sort'] : 'start_date';
                $order = !empty($_GET['order']) ? $_GET['order'] : 'desc';
                $add_where = '';

                if (isset($page_config[$_G['groupid']])) {
                    $data = C::t($tablename)->fetch_page_data($where, $offset, $limit, '*', $page_config[$_G['groupid']], $add_where, "{$sort} {$order}");
                } else {
                    $data = C::t($tablename)->fetch_page_data($where, $offset, $limit, '*', '', $add_where, "{$sort} {$order}");
                }

                if (!empty($data)) {
                    $t = C::t($tablename)->count_by_where($where, $add_where);
                    if (!empty($t['total'])) {
                        $total = $t['total'];
                    } else {
                        $total = 0;
                    }
                    $holder_ids = implode("','", array_filter(array_unique(get_values($data, 'holder_id'))));
                    if (!empty($holder_ids)) {
                        $holders = C::t('company_holder')->fetch_all_by_where("holder_id in ('{$holder_ids}')", 'holder_id,holder_name');
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
                    foreach($data as &$row){
                        if(empty($row['zhiya_name'])){
                            $row['zhiya_name'] = $row['zhiya_code'];
                        }
                    }
                    $return['rows'] = gbk2utf8($data);
                    $return['total'] = $total;
                    print_r(json_encode($return));
                } else {
                    print_r(json_encode(array('rows' => array(), 'total' => 0)));

                }
                exit;
            }

        }
        include template('company_manage:f_zhiya_detail');
        exit;

    }
}

//include DISCUZ_ROOT.'./forumdata/cache/plugin_company_manage_list.php';
?>