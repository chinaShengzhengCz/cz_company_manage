<?php
$page_config = array(
    3 => 100,// group_id => 页面数据
);
$forbid_config = array(
    3, 1// group_id   禁止group_id访问插件
);

$child_page_config = array(
    3 => 100,// group_id => 子公司查询页面数据
);
$view_limit_config = array(
    0,// group_id 子公司查看权限
);
$zhiya_view_limit_config = array(
    0,// group_id 质押公司查看权限
);
$config_view_limit_message = '请注册会员';
$config_zhiya_view_limit_message = '请注册会员';//质押库限制访问提示
$config_forbit_limit_message = '请注册会员';//禁止group_id访问插件提示