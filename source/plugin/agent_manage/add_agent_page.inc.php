<?php
if (empty($_G['uid'])) {
    exit('�û�δ��¼');
}
$agent_save = array();
$agent_save['co_name'] = $_POST['co_name'];
$agent_save['co_level'] = 0;
$agent_save['tel'] = $_POST['tel'];
$agent_save['company_name'] = $_POST['company_name'];
$agent_save['wechat'] = $_POST['wechat'];
if ($_POST['oper'] == 'edit') {
    if (empty($_POST['company_id'])) {
        exit('û������');
    }
    $former = C::t('agent_manage_base')->fetch_by_where("co_id='{$_POST['co_id']}'");
    if (empty($former)) {
        exit('û���ҵ�����');
    }
    C::t('agent_manage_base')->update($former['co_id'], $company_save);
    showmessage('�޸ĳɹ�', 'plugin.php?id=agent_manage_admin:agent_manage_list', array(), array());
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
        showmessage('���Ѿ��Ǻϻ�����', 'plugin.php?id=agent_manage_admin:agent_manage_list', array(), array());
        exit;
    }
    C::t('agent_manage_base')->insert($agent_save);
    showmessage('��ӳɹ�', 'plugin.php?id=agent_manage_admin:agent_manage_list', array(), array());
    exit;
}
$finish = true;
?>