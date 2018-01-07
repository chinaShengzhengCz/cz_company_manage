<?php

require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/config.php';

$navtitle = '机构名录';
if (in_array($_G['groupid'], $view_limit_config)) {
    showmessage($config_view_limit_message, 'plugin.php?id=company_manage:company_manage_list_front', array(), array());
}
if (!empty($_GET['code'])) {
    $company_data = C::t('company_manage_base')->fetch_by_where("code='{$_GET['code']}'");
    if (empty($company_data)) {
        showmessage('数据不存在', 'plugin.php?id=company_manage:company_manage_list_front', array(), array());
    } else {
        $cate_data = C::t('company_category')->fetch_by_where("cate_id='{$company_data['cate_id']}'");
        if (empty($cate_data)) {
            showmessage('分类数据不存在', 'plugin.php?id=company_manage:company_manage_list_front', array(), array());
        }
        $p_data = C::t('company_map')->fetch_all_by_where("c_code='{$company_data['code']}'");
        if (!empty($p_data)) {
            $p_codes = implode("','", array_filter(get_values($p_data, 'p_code')));
            $p_company = C::t('company_manage_base')->fetch_all_by_where("code in ('{$p_codes}')");
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
        if (!$_G['uid']) {
            showmessage('not_loggedin', NULL, array(), array('login' => 1));
        }
        if ($_GET['oper'] == 'view') {
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
                $p_codes = implode("','", array_filter(array_unique(get_values($p_coms, 'p_code'))));
                $p_code_scope = array();
                $codes_scope_tmp = C::t('company_manage_base')->fetch_all_by_where("code in ('{$p_codes}')", 'code', " and find_in_set('{$top_cate['cate_id']}',cate_map)");
                if (!empty($codes_scope_tmp)) {
                    $p_code_scope = get_values($codes_scope_tmp, 'code');
                }

                foreach ($p_coms as $p_com) {
                    $c_com = DB::fetch_first('SELECT shorter_name,code FROM %t WHERE ' . DB::field('code', $p_com['p_code']), array('company_manage_base'));
                    $p_str = '';
                    if (!in_array($p_com['p_code'], $p_code_scope)) {
                        $p_list_str .= "<a target=\"_blank\" href=\"plugin.php?id=company_manage:company_manage_content&oper=view&code={$c_com['code']}\">{$c_com['shorter_name']}</a><br>";
                    } else {
                        get_parent_company_list($p_com['p_code'], $p_str, $p_code_scope);
                        if ($p_str) {
                            $p_list_str .= trim($p_str, '- ') . " - <a target=\"_blank\" href=\"plugin.php?id=company_manage:company_manage_content&oper=view&code={$c_com['code']}\">{$c_com['shorter_name']}</a><br>";
                        } else {
                            $p_list_str .= "<a target=\"_blank\" href=\"plugin.php?id=company_manage:company_manage_content&oper=view&code={$c_com['code']}\">{$c_com['shorter_name']}</a><br>";
                        }
                    }
                }
            }

            $p_list_str = trim($p_list_str, '- ');

        } elseif ($_GET['oper'] == 'child') {
            $oper = $_GET['oper'];
            if (!empty($_GET['type']) && $_GET['type'] == 'data') {
                $child_codes = C::t('company_map')->fetch_all_by_where("p_code='{$company_data['code']}'");
                if (!empty($child_codes)) {
                    $codes = get_values($child_codes, 'c_code');
                } else {
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
            }
        } elseif ($_GET['oper'] == 'holder') {
            $oper = $_GET['oper'];
            if (!empty($_GET['type']) && $_GET['type'] == 'holder_data') {
                $where = "code='{$company_data['code']}'";
                $limit = isset($_GET['limit']) ? $_GET['limit'] : 20;
                $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
                $sort = !empty($_GET['sort']) ? $_GET['sort'] : 'holder_id';
                $order = !empty($_GET['order']) ? $_GET['order'] : 'desc';
                $add_where = '';
                //($where, $start, $limit, $field = '*', $user_limit = '', $add_where = '', $order = 'id DESC')
                $data = C::t('company_holder')->fetch_page_data($where, $offset, $limit, '*', '', '', "{$sort} {$order}");
                if (!empty($data)) {
                    $t = C::t('company_holder')->count_by_where($where, $add_where);
                    if (!empty($t['total'])) {
                        $total = $t['total'];
                    } else {
                        $total = 0;
                    }
                    $return['rows'] = gbk2utf8($data);
                    $return['total'] = $total;
                    print_r(json_encode($return));
                } else {
                    print_r(json_encode(array('rows' => array(), 'total' => 0)));
                }
                exit;
            }

        } elseif ($_GET['oper'] == 'contact') {
            $oper = $_GET['oper'];
            if (!empty($_GET['type']) && $_GET['type'] == 'contact_data') {
                $where = "code='{$company_data['code']}'";
                $limit = isset($_GET['limit']) ? $_GET['limit'] : 20;
                $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
                $sort = !empty($_GET['sort']) ? $_GET['sort'] : 'id';
                $order = !empty($_GET['order']) ? $_GET['order'] : 'desc';
                $add_where = '';
                //($where, $start, $limit, $field = '*', $user_limit = '', $add_where = '', $order = 'id DESC')
                $data = C::t('company_contact')->fetch_page_data($where, $offset, $limit, '*', '', '', "{$sort} {$order}");
                if (!empty($data)) {
                    foreach ($data as &$c) {
                        if (!empty($c['b_id'])) {
                            $b_types = C::t('company_business_type')->fetch_all_by_where("b_id in ({$c['b_id']})", 'type_name,b_id');
                            if ($b_types) {
                                $c['type_name'] = implode(',', get_values($b_types, 'type_name'));
                            }

                        }
                    }
                    $t = C::t('company_contact')->count_by_where($where, $add_where);
                    if (!empty($t['total'])) {
                        $total = $t['total'];
                    } else {
                        $total = 0;
                    }
                    $return['rows'] = gbk2utf8($data);
                    $return['total'] = $total;
                    print_r(json_encode($return));
                } else {
                    print_r(json_encode(array('rows' => array(), 'total' => 0)));
                }
                exit;
            }

        } elseif ($_GET['oper'] == 'thread') {
            $oper = $_GET['oper'];
            if (!empty($_GET['type']) && $_GET['type'] == 'thread_data') {
                $child_codes = C::t('company_map')->fetch_all_by_where("p_code='{$company_data['code']}'");
                if (!empty($child_codes)) {
                    $codes = get_values($child_codes, 'c_code');
                } else {
                    $codes = array();
                }
                array_push($codes, $company_data['code']);
                $codes = implode("','", array_filter(array_unique($codes)));
                $where = "code in ('{$codes}')";
                $limit = isset($_GET['limit']) ? $_GET['limit'] : 20;
                $offset = isset($_GET['offset']) ? $_GET['offset'] : 0;
//                $sort = !empty($_GET['sort']) ? $_GET['sort'] : 'tid';
//                $order = !empty($_GET['order']) ? $_GET['order'] : 'desc';
                $sort = 'tid';
                $order = 'desc';
                $add_where = '';
                //($where, $start, $limit, $field = '*', $user_limit = '', $add_where = '', $order = 'id DESC')
                $data = C::t('company_thread')->fetch_page_data($where, $offset, $limit, '*', '', '', "{$sort} {$order}");
                if (!empty($data)) {
                    $companys = C::t('company_manage_base')->fetch_all_by_where("code in ('{$codes}')", 'code,shorter_name');
                    $data = merge_arr($data, $companys, 'code');
                    foreach ($data as &$c) {
                        if (!empty($c['b_id'])) {
                            $b_types = C::t('company_business_type')->fetch_all_by_where("b_id in ({$c['b_id']})", 'type_name,b_id');
                            if ($b_types) {
                                $c['type_name'] = implode(',', get_values($b_types, 'type_name'));
                            }

                        }
                    }
                    $tids = get_values($data, 'tid');
                    if ($tids) {
//                        a:8:{s:8:"required";b:0;s:6:"prefix";b:0;s:5:"types";a:1:{i:1;s:4:"test";}s:4:"show";a:1:{i:1;i:0;}s:10:"expiration";a:1:{i:1;s:1:"0";}s:11:"description";a:1:{i:1;s:0:"";}s:11:"defaultshow";s:0:"";s:12:"templatelist";N;}
                        $tid_scope = implode(',', array_filter(array_unique($tids)));
                        $threads = C::t('forum_thread')->fetch_all_by_tid(array_filter(array_unique($tids)));
                        if (!empty($threads)) {
                            $fids = array_filter(array_unique(get_values($threads, 'fid')));
                            if ($fids) {
                                $fid_rows = C::t('forum_forum')->fetch_all_name_by_fid($fids);
                                $types = C::t('forum_forumfield')->fetch_all_by_fid($fids);
                                if (!empty($fid_rows)) {
                                    foreach ($fid_rows as &$fid_row) {
                                        $fid_row['f_name'] = $fid_row['name'];
                                        unset($fid_row['name']);
                                    }
                                    $threads = merge_arr($threads, $fid_rows, 'fid');
                                }
                                if (!empty($types)) {
                                    foreach ($types as $type) {
                                        if (!empty($type['threadtypes'])) {
                                            if (unserialize($type['threadtypes'])) {
                                                $thread_types = unserialize($type['threadtypes']);
                                                $type_names[$type['fid']] = array('fid' => $type['fid'], 'type_name' => $thread_types['types']);
                                            }
                                        }
                                        if (!empty($type['threadsorts'])) {
                                            if (unserialize($type['threadsorts'])) {
                                                $thread_sorts = unserialize($type['threadsorts']);
                                                $sorts_names[$type['fid']] = array('fid' => $type['fid'], 'sorts_name' => $thread_sorts['types']);
                                            }
                                        }
                                    }
                                    if (!empty($sorts_names)) {
                                        foreach ($threads as &$t_row) {
                                            if (isset($sorts_names[$t_row['fid']]) && isset($sorts_names[$t_row['fid']]['sorts_name'][$t_row['sortid']])) {
                                                $t_row['thread_sort_name'] = $sorts_names[$t_row['fid']]['sorts_name'][$t_row['sortid']];
                                            }
                                        }
                                    }
                                    if (!empty($type_names)) {
                                        foreach ($threads as &$t_row) {
                                            if (isset($type_names[$t_row['fid']]) && isset($type_names[$t_row['fid']]['type_name'][$t_row['typeid']])) {
                                                $t_row['thread_type_name'] = $type_names[$t_row['fid']]['type_name'][$t_row['typeid']];
                                            }
                                        }
                                    }
                                }
                            }
                            foreach ($threads as &$thread) {
                                $thread['thread_create_time'] = date('Y-m-d', $thread['dateline']);
                            }
                            $data = merge_arr($data, $threads, 'tid');
                        }
                    }
                    $t = C::t('company_thread')->count_by_where($where, $add_where);
                    if (!empty($t['total'])) {
                        $total = $t['total'];
                    } else {
                        $total = 0;
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
        include template('company_manage:f_content');
        exit;

    }
}

//include DISCUZ_ROOT.'./forumdata/cache/plugin_company_manage_list.php';
?>