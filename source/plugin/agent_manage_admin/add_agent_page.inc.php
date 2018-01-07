<?php
if (empty($_G['uid'])) {
    exit('用户未登录');
}
$agent_save = array();
$agent_save['co_name'] = $_POST['co_name'];
$agent_save['co_level'] = $_POST['co_level'];
$agent_save['tel'] = $_POST['tel'];
if ($_POST['oper'] == 'edit') {
    if (empty($_POST['company_id'])) {
        exit('没有数据');
    }
    $former = C::t('agent_manage_base')->fetch_by_where("id='{$_POST['company_id']}'");
    if (empty($former)) {
        exit('没有找到数据');
    }
    C::t('agent_manage_base')->update($former['co_id'], $company_save);
    showmessage('修改成功', 'admin.php?action=plugins&identifier=agent_manage_admin&pmod=agent_manage_list', array(), array());
} else {
    $agent_save['uid'] = $_POST['uid'];
    $agent_save['tel'] = $_POST['tel'];
    $agent_save['ensure_money'] = $_POST['ensure_money'];
    $agent_save['company_name'] = $_POST['company_name'];
    $agent_save['wechat'] = $_POST['wechat'];
    $agent_save['create_time'] = date('Y-m-d H:i:s');
    $former_link = C::t('agent_client')->fetch_by_where("uid={$_POST['uid']}");
    if ($former_link) {
        $agent_save['up_co_id'] = $former_link['co_id'];
    }
    $former = C::t('agent_manage_base')->fetch_by_where("uid={$_POST['uid']}");
    if ($former) {
        exit('用户已经是合伙人了');
    }
    C::t('agent_manage_base')->insert($agent_save);
    showmessage('添加成功', 'admin.php?action=plugins&identifier=agent_manage_admin&pmod=agent_manage_list', array(), array());
}
$finish = true;
?>