<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/config.php';
if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
$navtitle = '资源库';

if (in_array($_G['groupid'], $view_limit_config)) {
    showmessage($config_view_limit_message, 'plugin.php?id=company_manage:company_resource_list_front', array(), array());
}
$table_name='company_human';
$human_data = C::t($table_name)->fetch_by_where("uid=".$_G['uid']);
if ($human_data) {
    if (empty($human_data)) {
        showmessage('数据不存在', 'plugin.php?id=company_manage:company_resource_list_front', array(), array());
    } else {
        $cate_data = C::t('company_category')->fetch_by_where("cate_id='{$company_data['cate_id']}'");
        if (empty($cate_data)) {
            showmessage('分类数据不存在', 'plugin.php?id=company_manage:company_resource_list_front', array(), array());
        }

        $p_data = C::t('company_map')->fetch_all_by_where("c_code='{$company_data['code']}'");
        if (!empty($p_data)) {

            $p_codes = implode("','", array_filter(get_values($p_data, 'p_code')));
            $p_company = C::t($table_name)->fetch_all_by_where("code in ('{$p_codes}')");
        }

        if ($cate_data['parent_id']) {
            get_cates($cate_data['parent_id'], $cates);
            if (empty($cates)) {
                exit('分类数据丢失');
            }
            $cates = array_reverse($cates);
            $top_cate = $cates[0];
        } else {
            $top_cate = $cate_data;
        }
        $areas = array();
        format_area($company_data['area_id'], $areas);
        if (empty($_GET['oper'])) {

            if (!defined('IN_DISCUZ')) {
                header("Location: /plugin.php?id=company_manage:company_resource_list_front");
            }

            if (empty($areas)) {
                exit('未知的地区数据');
            }
            sort($areas);

        } elseif ($_GET['oper'] == 'view') {
            $oper = $_GET['oper'];
            $company_data['cate_name'] = '';
            if (!empty($cates)) {
                $cate_names = get_values($cates, 'name');
                $company_data['cate_name'] .= implode(' - ', $cate_names);
            }
            $company_data['cate_name'] .= ' - ' . $cate_data['name'];
            if (!empty($areas)) {
                $area_names = get_values(array_reverse($areas), 'name');
                $company_data['area_name'] = empty($area_names) ? ' - ' : implode(' - ', $area_names);
            } else {
                $company_data['area_name'] = '';
            }
            $company_data['cate_name'] = trim($company_data['cate_name'], '- ');
            $p_list_str = '';
            $p_coms = DB::fetch_all('SELECT p_code,c_code FROM %t WHERE ' . DB::field('c_code', $company_data['code']), array('company_map'));

            if (!empty($p_coms)) {
                $p_codes = implode("','",array_filter(array_unique(get_values($p_coms,'p_code'))));
                $codes_scope_tmp = C::t('company_manage_base')->fetch_all_by_where("code in ('{$p_codes}')", 'code'," and find_in_set('{$top_cate['cate_id']}',cate_map)");
                if (!empty($codes_scope_tmp)) {
                    $p_code_scope = get_values($codes_scope_tmp, 'code');
                } else {
                    exit('顶级分类映射丢失数据 cate_id ' . $top_cate['cate_id']);
                }

                foreach ($p_coms as $p_com) {
                    $c_com = DB::fetch_first('SELECT shorter_name,code FROM %t WHERE ' . DB::field('code', $p_com['p_code']), array('company_manage_base'));
                    $p_str = '';
                    get_parent_company_list($p_com['p_code'], $p_str, $p_code_scope);
                    if ($p_str) {
                        $p_list_str .= trim($p_str, '- ') . " - <a target=\"_blank\" href=\"plugin.php?id=company_manage:company_manage_form&oper=view&code={$c_com['code']}\">{$c_com['shorter_name']}</a><br>";
                    } else {
                        $p_list_str .= "<a target=\"_blank\" href=\"plugin.php?id=company_manage:company_manage_form&oper=view&code={$c_com['code']}\">{$c_com['shorter_name']}</a><br>";
                    }
                }
            }

            $p_list_str = trim($p_list_str, '- ');
            include template('company_manage:f_content');
            exit;
        } elseif ($_GET['oper'] == 'child') {
            $oper = $_GET['oper'];
            if (!empty($_GET['type']) && $_GET['type'] == 'data') {
                $child_codes = C::t('company_map')->fetch_all_by_where("p_code='{$company_data['code']}'");
                if (!empty($child_codes)) {
                    $codes = get_values($child_codes, 'c_code');
                }else{
                    $codes = array();
                }
                $p_coms = DB::fetch_all('SELECT p_code,c_code FROM %t WHERE ' . DB::field('c_code', $company_data['code']), array('company_map'));
                $p_codes = implode("','", array_filter(array_unique(get_values($p_coms, 'p_code'))));
                if (!empty($p_codes)) {
                    $brothers = get_values(DB::fetch_all("SELECT p_code,c_code FROM %t WHERE p_code in ('{$p_codes}') and c_code !='{$company_data['code']}'", array('company_map')), 'c_code');
                    $codes = implode("','", array_filter(array_unique(array_merge($brothers, $codes))));
                } else {
                    $codes = implode("','", array_filter(array_unique($codes)));
                }
                if (empty($codes)) {
                    print_r(json_encode(array('rows' => array(), 'total' => 0)));
                    exit;
                }
                $where = "code in ('{$codes}')";
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
                if (isset($child_page_config[$_G['groupid']])) {
                    $data = C::t('company_manage_base')->fetch_page_data($where, $offset, $limit, '*', $child_page_config[$_G['groupid']], $add_where);
                } else {
                    $data = C::t('company_manage_base')->fetch_page_data($where, $offset, $limit, '*', '', $add_where);
                }

                if (!empty($data)) {
                    $t = C::t('company_manage_base')->count_by_where($where, $add_where);
                    if (!empty($t['total'])) {
                        if (!empty($_G['groupid']) && isset($child_page_config[$_G['groupid']]) && $child_page_config[$_G['groupid']] < $t['total']) {
                            $total = $child_page_config[$_G['groupid']];
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
                    exit;
                } else {
                    print_r(json_encode(array('rows' => array(), 'total' => 0)));
                    exit;
                }
            } else {
                include template('company_manage:f_content');
                exit;
            }

        }

    }
}

if (!defined('IN_DISCUZ')) {
    header("Location: /plugin.php?id=company_manage:company_resource_list_front");
}
include_once libfile('function/profile');
$diqu = profile_setting('residecity');
$first_cates = C::t('company_category')->fetch_all_by_parent(0);
include template('company_manage:human_form');

//include DISCUZ_ROOT.'./forumdata/cache/plugin_company_manage_list.php';
?>