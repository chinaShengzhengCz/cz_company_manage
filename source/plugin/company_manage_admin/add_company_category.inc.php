<?php
if (empty($_G['uid'])) {
    exit('�û�δ��¼');
}
if (!empty($_POST['name']) && !empty($_POST['oper'])) {
    if (empty($_POST['name'])) {
        exit('��δ����ֶ�');
    }
    if (isset($_POST['parent_id']) && $_POST['parent_id']) {
        $former_data = C::t('company_category')->fetch_by_where("cate_id='{$_POST['parent_id']}'");
        if (empty($former_data)) {
            exit('�������಻����');
        }
        $cate_save['parent_id'] = $_POST['parent_id'];
    } elseif (isset($_POST['former_cate_id']) && $_POST['former_cate_id']) {
        $former_data = C::t('company_category')->fetch_by_where("cate_id='{$_POST['former_cate_id']}'");
        if (empty($former_data)) {
            exit('�������಻����');
        }
        $cate_save['parent_id'] = $_POST['former_cate_id'];
    } else {
        $cate_save['parent_id'] = 0;
    }

    $cate_save['name'] = $_POST['name'];
    $cate_save['position'] = $_POST['position'];
    if ($_POST['oper'] == 'edit') {
        if (empty($_POST['cate_id'])) {
            exit('û������');
        }
        $former = C::t('company_category')->fetch_by_where("cate_id='{$_POST['cate_id']}'");
        if (empty($former)) {
            exit('û���ҵ�����');
        }
        if ($_POST['parent_id'] == $former['cate_id']) {
            exit('�������Լ�Ϊ������');
        }
        $cate_save['update_time'] = date('Y-m-d H:i:s');
        $cate_save['update_operator'] = $_G['uid'];
        C::t('company_category')->update($former['cate_id'], $cate_save);
        showmessage('�޸ĳɹ�', 'admin.php?action=plugins&identifier=company_manage_admin&pmod=company_manage_cate_list', array(), array());
    } else {
        $cate_save['create_time'] = date('Y-m-d H:i:s');
        $cate_save['create_operator'] = $_G['uid'];
        C::t('company_category')->insert($cate_save);
        showmessage('��ӳɹ�', 'admin.php?action=plugins&identifier=company_manage_admin&pmod=company_manage_cate_list', array(), array());
    }
    $finish = true;
} else {
    exit('����δѡ��');
}
?>