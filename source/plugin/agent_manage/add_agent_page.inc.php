<?php
if (empty($_G['uid'])) {
    exit('用户未登录');
}
$agent_save = array();
$agent_save['co_name'] = $_POST['co_name'];
$agent_save['co_level'] = 0;
$agent_save['tel'] = $_POST['tel'];
$agent_save['company_name'] = $_POST['company_name'];
$agent_save['wechat'] = $_POST['wechat'];
if ($_POST['oper'] == 'edit') {
    if (empty($_POST['company_id'])) {
        exit('没有数据');
    }
    $former = C::t('agent_manage_base')->fetch_by_where("co_id='{$_POST['co_id']}'");
    if (empty($former)) {
        exit('没有找到数据');
    }
    C::t('agent_manage_base')->update($former['co_id'], $company_save);
    showmessage('修改成功', 'plugin.php?id=agent_manage_admin:agent_manage_list', array(), array());
} else {
    $agent_save['uid'] = $_G['uid'];
    $agent_save['ensure_money'] = 0;
    $agent_save['create_time'] = date('Y-m-d H:i:s');
    $former_link = C::t('agent_client')->fetch_by_where("uid={$_G['uid']}");
    if ($former_link) {
        $agent_save['up_co_id'] = $former_link['co_id'];
    }
    $former = C::t('agent_manage_base')->fetch_by_where("uid={$_G['uid']}");
    if ($former) {
        showmessage('您已经是合伙人了', 'plugin.php?id=agent_manage_admin:agent_manage_list', array(), array());
        exit;
    }
    C::t('agent_manage_base')->insert($agent_save);
    showmessage('添加成功', 'plugin.php?id=agent_manage_admin:agent_manage_list', array(), array());
    exit;
}
$finish = true;
?>