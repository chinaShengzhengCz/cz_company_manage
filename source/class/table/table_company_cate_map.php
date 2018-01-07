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

class table_company_cate_map extends discuz_table
{
    public function __construct()
    {

        $this->_table = 'company_cate_map';
        $this->_pk = 'cate_id';

        parent::__construct();
    }

    public function count_by_where($where)
    {
        return DB::fetch_first("SELECT count(1) as total  FROM %t WHERE {$where}", array($this->_table));
    }

    public function fetch_all_by_level($level)
    {
        return DB::fetch_all("SELECT *  FROM %t WHERE level={$level}", array($this->_table));
    }

    public function fetch_all_by_parent($parent_id)
    {
        return DB::fetch_all("SELECT * FROM %t WHERE parent_id={$parent_id}", array($this->_table));
    }

    public function fetch_by_where($where)
    {
        return DB::fetch_first("SELECT * FROM %t WHERE {$where}", array($this->_table));
    }

    public function fetch_all_by_where($where, $field = '*')
    {
        return DB::fetch_all("SELECT {$field} FROM %t WHERE {$where}", array($this->_table));
    }

    public function fetch_all()
    {
        return DB::fetch_all('SELECT * FROM %t', array($this->_table), $this->_pk);
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
        DB::query("INSERT INTO %t ( cate_id,code, create_time, create_operator) VALUES (%d,%s,%s,%s)",
            array($this->_table, $info['cate_id'], $info['code'], $info['create_time'], $info['create_operator']));
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

    public function delete_where($where, $unbuffered = false)
    {
        if (!$where) {
            return false;
        }
        $ret = DB::delete($this->_table, $where, null, $unbuffered);
        return $ret;
    }
}

?>