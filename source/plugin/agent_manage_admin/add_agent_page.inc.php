<?php
if (empty($_G['uid'])) {
    exit('�û�δ��¼');
}
$agent_save = array();
$agent_save['co_name'] = $_POST['co_name'];
$agent_save['co_level'] = $_POST['co_level'];
$agent_save['tel'] = $_POST['tel'];
if ($_POST['oper'] == 'edit') {
    if (empty($_POST['company_id'])) {
        exit('û������');
    }
    $former = C::t('agent_manage_base')->fetch_by_where("id='{$_POST['company_id']}'");
    if (empty($former)) {
        exit('û���ҵ�����');
    }
    C::t('agent_manage_base')->update($former['co_id'], $company_save);
    showmessage('�޸ĳɹ�', 'admin.php?action=plugins&identifier=agent_manage_admin&pmod=agent_manage_list', array(), array());
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
        exit('�û��Ѿ��Ǻϻ�����');
    }
    C::t('agent_manage_base')->insert($agent_save);
    showmessage('��ӳɹ�', 'admin.php?action=plugins&identifier=agent_manage_admin&pmod=agent_manage_list', array(), array());
}
$finish = true;
?>