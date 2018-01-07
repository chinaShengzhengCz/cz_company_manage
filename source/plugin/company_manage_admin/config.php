<?php
$forbid_config = array(
    4,5,6,7// group_id   禁止group_id访问插件
);
$page_config = array(
	4 => 500,// group_id => 页面数据
	5 => 500,
	6 => 500,
	7 => 500,
	8 => 500,
	9 => 500,
	10 => 500,
	20 => 1000,
	21 => 1000,
	22 => 1000,
	23 => 1000,
	26 => 1000,
	28 => 1000,
);
$child_page_config = array(
    4 => 500,// group_id => 子公司查询页面数据
	5 => 500,
	6 => 500,
	7 => 500,
	8 => 500,
	9 => 500,
	10 => 500,
	20 => 1000,
	21 => 1000,
	22 => 1000,
	23 => 1000,
	26 => 1000,
	28 => 1000,
);
$view_limit_config = array(
    4,5,6,7,8,9,10// group_id 子公司查看权限
);
$zhiya_view_limit_config = array(
    4,5,6,7,8,9,10,// group_id 质押公司查看权限
);

$config_view_limit_message = '付费权限，请购买会员后查看';
$config_zhiya_view_limit_message = '付费权限，请购买会员后查看';
$config_forbit_limit_message = '付费权限，请购买会员后查看';//禁止group_id访问插件提示