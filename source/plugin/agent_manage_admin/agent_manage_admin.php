<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: wechat.class.php 35166 2014-12-23 07:12:44Z nemohou $
 */

if (!$_G['uid']) {
    showmessage('not_loggedin', NULL, array(), array('login' => 1));
}
class plugin_agent_manage_admin
{

    function plugin_agent_manage_admin()
    {
        include_once template('agent_manage_admin:list');
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
            $cate_html .= "<li class=\"parent_li\"><span title=\"уш╣Ч\"  onclick=\"cate_search({$cate['cate_id']})\"><i class=\"glyphicon glyphicon-folder-open icon-plus-sign\"></i>{$cate['name']}</span><ul>";
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

function get_types($parent_id, &$cates)
{
    $cate = DB::fetch_first('SELECT * FROM %t WHERE ' . DB::field('b_id', $parent_id), array('company_business_type'));
    if (empty($cate)) {
        return '';
    }
    $cates[] = $cate;
    if ($cate['parent_id']) {
        get_types($cate['parent_id'], $cates);
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
    $p_com = DB::fetch_first('SELECT shorter_name,code FROM %t WHERE ' . DB::field('code', $p['p_code']), array('agent_manage_base'));
    if (!empty($p_com)) {
        if (!in_array($p_com['code'], $p_code_scope)) {
            $list_str .= "<a target=\"_blank\" href=\"plugin.php?id=agent_manage_admin:agent_manage_form&oper=view&code={$p_com['code']}\">{$p_com['shorter_name']}</a>". ' - ' ;
        } else {
            $list_str .= "<a target=\"_blank\" href=\"plugin.php?id=agent_manage_admin:agent_manage_form&oper=view&code={$p_com['code']}\">{$p_com['shorter_name']}</a>" . ' - ' . get_parent_company_list($p_com['code'], $list_str,$p_code_scope);
        }
    }
    return '';
}