<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: wechat.class.php 35166 2014-12-23 07:12:44Z nemohou $
 */
require_once DISCUZ_ROOT . './source/plugin/company_manage_admin/config.php';

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}
if (!empty($forbid_config) && in_array($_G['groupid'], $forbid_config)) {
    showmessage($config_forbit_limit_message ? $config_forbit_limit_message : '½ûÖ¹·ÃÎÊ', $_G['site_url'], array(), array('timeout' => 3, 'return' => 1));
}
if (!$_G['uid']) {
    showmessage('not_loggedin', NULL, array(), array('login' => 1));
}

class plugin_company_manage
{

    function plugin_company_manage()
    {
        $cate_data = C::t('company_category')->fetch_all();
        if (!empty($cate_data)) {
            $cate_data = gbk2utf8($cate_data);
        }
        include_once template('company_manage:list');
    }

    function common()
    {

    }

}

function gbk2utf8($data)
{
    if (is_array($data)) {
        return array_map('gbk2utf8', $data);
    }
    return iconv('gbk', 'utf-8', $data);
}

function utf82gbk($data)
{
    if (is_array($data)) {
        return array_map('utf82gbk', $data);
    }
    return iconv('utf-8', 'gbk', $data);
}

function where_format($params, $search)
{
    if (empty($params) || !is_array($params) || empty($search) || !is_array($search)) {
        return '';
    }
    $where = '';
    foreach ($params as $key => $param) {
        if (in_array($key, $search) && $param != '') {
            $where .= " and {$key}='{$param}'";
        }
    }
    return $where;
}

function district_format($id, &$areas)
{
    $area = DB::fetch_first('SELECT * FROM %t WHERE ' . DB::field('id', $id), array('common_district'));
    if (empty($area)) {
        return '';
    }
    $areas[$area['level']] = $area;
    if ($area['upid'] != 0) {
        district_format($area['upid'], $areas);
    }
    return false;
}

function get_child_area($area_ids, &$child_areas)
{
    $childs = DB::fetch_all("SELECT * FROM %t WHERE upid in ({$area_ids})", array('common_district'));
    if (!empty($childs)) {
        $c_ids = get_values($childs, 'id');
        $child_areas = array_unique(array_merge($child_areas, $c_ids));
        $s_ids = implode(',', $c_ids);
        get_child_area($s_ids, $child_areas);
    }
    return false;
}

function getAreaById($area_id)
{
    return DB::fetch_first("SELECT id,name FROM %t WHERE id ={$area_id}", array('common_district'));
}

function getCateById($cate_id)
{
    return DB::fetch_first("SELECT cate_id,name FROM %t WHERE cate_id ={$cate_id}", array('company_category'));
}

function format_area($id, &$areas)
{
    $area = DB::fetch_first('SELECT * FROM %t WHERE ' . DB::field('id', $id), array('common_district'));
    if (empty($area)) {
        return '';
    }
    $areas[$area['level']] = $area;
    if ($area['upid'] != 0) {
        district_format($area['upid'], $areas);
    }
    return false;
}


function cate_format(&$format_cate, $cate, &$cate_html)
{
    if (!empty($format_cate[$cate['cate_id']])) {
        $tmp_cate_1 = $format_cate[$cate['cate_id']];
        unset($format_cate[$cate['cate_id']]);
        foreach ($tmp_cate_1 as $c) {
            $cate_html .= "<li class=\"parent_li\"><span title=\"ÕÛµþ\"  onclick=\"cate_search({$cate['cate_id']})\"><i class=\"glyphicon glyphicon-folder-open icon-plus-sign\"></i>{$cate['name']}</span><ul>";
            cate_format($format_cate, $c, $cate_html);
            $cate_html .= '</ul></li>';
        }
    } else {
        $cate_html .= "<li><span onclick=\"cate_search({$cate['cate_id']})\"><i class='glyphicon glyphicon-leaf icon-tag'></i>{$cate['name']}</span></li>";
    }
    return true;
}

function get_cates($parent_id, &$cates)
{
    $cate = DB::fetch_first('SELECT * FROM %t WHERE ' . DB::field('cate_id', $parent_id), array('company_category'));
    if (empty($cate)) {
        return '';
    }
    $cates[] = $cate;
    if ($cate['parent_id']) {
        get_cates($cate['parent_id'], $cates);
    }
    return true;
}

function merge_arr($arr1, $arr2, $key1, $key2 = '')
{
    if (!$key2) {
        $key2 = $key1;
    }
    $arr3 = $arr1;
    foreach ($arr1 as $k => $a1) {
        foreach ($arr2 as $a2) {
            if ($a1[$key1] == $a2[$key2]) {
                $arr3[$k] = array_merge($a1, $a2);
            }
        }
    }
    return $arr3;

}

function get_values($arr, $key)
{
    if (empty($arr)) {
        return array();
    }
    $values = array();
    foreach ($arr as $value) {
        if (isset($value[$key])) {
            $values[] = $value[$key];
        }
    }
    return $values;
}

function get_parent_company_list($c_code, &$list_str, $p_code_scope)
{
    $p = DB::fetch_first('SELECT * FROM %t WHERE ' . DB::field('c_code', $c_code), array('company_map'));
    if (empty($p)) {
        return '';
    }
    $p_com = DB::fetch_first('SELECT shorter_name,code FROM %t WHERE ' . DB::field('code', $p['p_code']), array('company_manage_base'));
    if (!empty($p_com)) {
        if (!in_array($p_com['code'], $p_code_scope)) {
            $list_str .= "<a target=\"_blank\" href=\"plugin.php?id=company_manage:company_manage_content&oper=view&code={$p_com['code']}\">{$p_com['shorter_name']}</a>" . ' - ';
        } else {
            $list_str .= "<a target=\"_blank\" href=\"plugin.php?id=company_manage:company_manage_content&oper=view&code={$p_com['code']}\">{$p_com['shorter_name']}</a>" . ' - ' . get_parent_company_list($p_com['code'], $list_str, $p_code_scope);
        }
    }
    return '';
}

function map_array($arr, $map)
{
    if (empty($arr) || !is_array($arr)) {
        return array();
    }
    $return = array();
    foreach ($arr as $row) {
        if (isset($row[$map]) && $row[$map] != '') {
            $return[$row[$map]] = $row;
        }
    }
    return $return;
}
//class mobileplugin_wechat {
//
//	function common() {
//		global $_G;
//		if(!$_G['wechat']['setting']) {
//			$_G['wechat']['setting'] = unserialize($_G['setting']['mobilewechat']);
//		}
//		dsetcookie('mobile', '', -1);
//		if(!isset($_GET['pluginid'])) {
//			$redirect = WeChat::redirect(1);
//			if($redirect) {
//				dheader('location: '.$redirect);
//			}
//		}
//	}
//
//}

//class plugin_wechat_member extends plugin_wechat {
//
//	function logging_method() {
//		global $_G;
//		if(!$_G['Plang'] || !$_G['wechat']['setting']['wsq_allow']) {
//			return;
//		}
//		return wechat_tpl_login_bar();
//	}
//
//	function register_top_output() {
//		global $_G;
//		if(strexists($_GET['referer'], 'wechat:login') && $_G['wechat']['setting']['wsq_allow']) {
//			return wechat_tpl_register();
//		}
//	}
//
//	function register_logging_method() {
//		global $_G;
//		if(!$_G['Plang'] || !$_G['wechat']['setting']['wsq_allow']) {
//			return;
//		}
//		return wechat_tpl_login_bar();
//	}
//
//}
//
//class mobileplugin_wechat_forum extends mobileplugin_wechat {
//
//	function post_showactivity() {
//		if(!showActivity::init()) {
//			return false;
//		}
//		showActivity::post();
//	}
//
//	function viewthread_showactivity() {
//		showActivity::init();
//	}
//
//	function misc_showactivity() {
//		showActivity::init();
//	}
//
//}
//
//class plugin_wechat_forum extends plugin_wechat {
//
//	function viewthread_showactivity() {
//		showActivity::init();
//	}
//
//	function viewthread_postheader_output() {
//		if(!showActivity::init()) {
//			return array();
//		}
//		if($GLOBALS['activity']['starttimeto']) {
//			global $_G;
//			$starttimeto = strtotime($GLOBALS['activity']['starttimeto']);
//			if($starttimeto < TIMESTAMP && $_G['forum_thread']['displayorder'] > 0) {
//				C::t('forum_thread')->update($_G['tid'], array('displayorder' => 0));
//			}
//		}
//		return showActivity::returnvoters(1);
//	}
//
//	function viewthread_posttop_output() {
//		if(!showActivity::init()) {
//			return array();
//		}
//		return showActivity::returnvoters(2);
//	}
//
//	function misc_showactivity() {
//		if(!showActivity::init()) {
//			return false;
//		}
//		showActivity::misc();
//	}
//
//	function post_showactivity() {
//		if(!showActivity::init()) {
//			return false;
//		}
//		showActivity::post();
//	}
//
//	function viewthread_share_method_output() {
//		global $_G;
//		if($_G['wechat']['setting']['wsq_allow']) {
//			return wechat_tpl_share(showActivity::init());
//		}
//	}
//
//	function viewthread_postaction() {
//		global $_G;
//		if($_G['wechat']['setting']['wsq_allow'] && $_G['adminid'] == 1 && empty($_GET['viewpid'])) {
//			return array(wechat_tpl_resourcepush());
//		}
//	}
//
//}