<?php
if (empty($_G['uid'])) {
    exit('�û�δ��¼');
}
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    header("Location: /plugin.php?id=company_manage:company_manage_list_front");
}
if (!empty($_GET['company_id'])) {
    $former_data = C::t('company_manage_base')->fetch_by_where("id={$_GET['company_id']}");
    if (empty($former_data)) {
        exit('��ҵ������');
    }

    C::t('company_map')->delete_where("c_code='{$former_data['code']}'");
    C::t('company_cate_map')->delete_where("code='{$former_data['code']}'");
    C::t('company_manage_base')->delete($former_data['id']);
    showmessage('ɾ���ɹ�', 'admin.php?action=plugins&identifier=company_manage_admin&pmod=company_manage_list', array(), array());
    $finish = true;
} else {
    exit('δѡ����ҵ');
}
?>