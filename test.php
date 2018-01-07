<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: search.php 34131 2013-10-17 03:54:09Z andyzheng $
 */

define('APPTYPEID', 0);
define('CURSCRIPT', 'search');

require './source/class/class_core.php';

$discuz = C::app();

$modarray = array('my', 'user', 'curforum', 'newthread');

$cachelist = $slist = array();
$mod = '';
$discuz->cachelist = $cachelist;
$discuz->init();

if(in_array($discuz->var['mod'], $modarray) || !empty($_G['setting']['search'][$discuz->var['mod']]['status'])) {
	$mod = $discuz->var['mod'];
} else {
	foreach($_G['setting']['search'] as $mod => $value) {
		if(!empty($value['status'])) {
			break;
		}
	}
}
if(empty($mod)) {
	showmessage('search_closed');
}
define('CURMODULE', $mod);
$a = '12345678910120永安期货股份有限公司诸暨营业部';
$b = substr(md5($a),8,-8);
echo $b;
?>