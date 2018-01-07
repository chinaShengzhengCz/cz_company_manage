<?php
if (empty($_G['uid'])) {
    exit('用户未登录');
}
if (!defined('IN_DISCUZ') || !defined('IN_ADMINCP')) {
    header("Location: /plugin.php?id=agent_manage:agent_manage_list_front");
}
if (!empty($_GET['agent_id'])) {
    $former_data = C::t('agent_manage_base')->fetch_by_where("co_id={$_GET['company_id']}");
    if (empty($former_data)) {
        exit('企业不存在');
    }

    C::t('company_map')->delete_where("c_code='{$former_data['code']}'");
    C::t('company_cate_map')->delete_where("code='{$former_data['code']}'");
    C::t('agent_manage_base')->delete($former_data['co_id']);
    showmessage('删除成功', 'admin.php?action=plugins&identifier=agent_manage_admin&pmod=agent_manage_list', array(), array());
    $finish = true;
} else {
    exit('未选择企业');
}
?>