<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_common_word.php 27877 2012-02-16 04:33:37Z zhengqingpeng $
 */

if (!defined('IN_DISCUZ')) {
    exit('Access Denied');
}

class table_company_manage_base extends discuz_table
{
    public $attr = array(
        'code' => '',
        'full_name' => '',
        'shorter_name' => '',
        'position' => 0,
        'area_id' => 0,
        'cate_id' => 0,
        'tel' => '',
        'address' => '',
        'boss' => '',
        'create_time' => '',
        'create_operator' => '',
        'update_time' => '',
        'update_operator' => ''
    );

    public function __construct()
    {

        $this->_table = 'company_manage_base';
        $this->_pk = 'id';

        parent::__construct();
    }

    public function count_by_where($where, $add_where)
    {
        if ($add_where) {
            return DB::fetch_first("SELECT count(1) as total FROM %t WHERE {$where} %i", array($this->_table, $add_where));
        } else {
            return DB::fetch_first("SELECT count(1) as total  FROM %t WHERE {$where}", array($this->_table));
        }
    }

    public function fetch_by_where($where, $field = '*', $add_where = '')
    {
        return DB::fetch_first("SELECT {$field} FROM %t WHERE {$where} %i", array($this->_table, $add_where));
    }

    public function fetch_all_by_where($where, $field = '*', $add_where = '')
    {
        return DB::fetch_all("SELECT {$field} FROM %t WHERE {$where} %i", array($this->_table, $add_where));
    }

    public function fetch_page_data($where, $start, $limit, $field = '*', $user_limit = '', $add_where = '', $order = 'id DESC')
    {

        if (is_numeric($user_limit) && $user_limit >= 0) {
            if ($user_limit === 0) {
                return array();
            }
            if ($start > $user_limit) {
                return array();
            }
            if ($limit > $user_limit) {
                $limit = $user_limit;
            }
            if ($start + $limit > $user_limit) {
                $start = $user_limit - $limit;
            }
        }
        if ($add_where) {
            return DB::fetch_all("SELECT %i FROM %t WHERE {$where} %i ORDER BY {$order} LIMIT {$limit} OFFSET {$start}", array($field, $this->_table, $add_where));
        } else {
            return DB::fetch_all("SELECT %i FROM %t WHERE {$where} ORDER BY {$order} LIMIT {$limit} OFFSET {$start}", array($field, $this->_table));
        }
    }

    public function update($val, $data, $unbuffered = false, $low_priority = false)
    {
        if (!empty($data) && is_array($data) && $val) {
            $this->checkpk();
            return DB::update($this->_table, $data, DB::field($this->_pk, $val), $unbuffered, $low_priority);
        }
        return !$unbuffered ? 0 : false;
    }

    public function insert($info)
    {
        $info = array_merge($this->attr, $info);
        DB::query("INSERT INTO %t (code,full_name, shorter_name, position, area_id,cate_id, tel,address,boss,create_time, create_operator) VALUES (%s,%s,%s,%d,%d,%d,%s,%s,%s,%s,%s)",
            array($this->_table, $info['code'], $info['full_name'], $info['shorter_name'], $info['position'], $info['area_id'], $info['cate_id'],
                $info['tel'], $info['address'], $info['boss'], $info['create_time'], $info['create_operator']));
    }

    public function delete($val, $unbuffered = false)
    {
        if (!$val) {
            return false;
        }
        $this->checkpk();
        $ret = DB::delete($this->_table, DB::field($this->_pk, $val), null, $unbuffered);
        return $ret;
    }
}

?>