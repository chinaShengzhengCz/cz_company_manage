<?php
if (empty($_G['uid'])) {
    exit('�û�δ��¼');
}
$table_name='company_business_type';
if (!empty($_POST['type_name']) && !empty($_POST['oper'])) {
    if (isset($_POST['parent_id']) && $_POST['parent_id']) {
        $former_data = C::t($table_name)->fetch_by_where("b_id='{$_POST['parent_id']}'");
        if (empty($former_data)) {
            exit('�������಻����');
        }
        $cate_save['parent_id'] = $_POST['parent_id'];
    } elseif (isset($_POST['former_b_id']) && $_POST['former_b_id']) {
        $former_data = C::t($table_name)->fetch_by_where("b_id='{$_POST['former_b_id']}'");
        if (empty($former_data)) {
            exit('�������಻����');
        }
        $cate_save['parent_id'] = $_POST['former_b_id'];
    } else {
        $cate_save['parent_id'] = 0;
    }

    $cate_save['type_name'] = $_POST['type_name'];
    $cate_save['position'] = $_POST['position'];
    if ($_POST['oper'] == 'edit') {
        if (empty($_POST['b_id'])) {
            exit('û������');
        }
        $former = C::t($table_name)->fetch_by_where("b_id='{$_POST['b_id']}'");
        if (empty($former)) {
            exit('û���ҵ�����');
        }
        if ($_POST['parent_id'] == $former['b_id']) {
            exit('�������Լ�Ϊ��ҵ��');
        }
        $cate_save['update_time'] = date('Y-m-d H:i:s');
        $cate_save['update_operator'] = $_G['uid'];
        C::t($table_name)->update($former['b_id'], $cate_save);
        showmessage('�޸ĳɹ�', 'admin.php?action=plugins&identifier=company_manage_admin&pmod=company_manage_biz_type_list', array(), array());
    } else {
        $cate_save['create_time'] = date('Y-m-d H:i:s');
        $cate_save['create_operator'] = $_G['uid'];
        C::t($table_name)->insert($cate_save);
        showmessage('��ӳɹ�', 'admin.php?action=plugins&identifier=company_manage_admin&pmod=company_manage_biz_type_list', array(), array());
    }
    $finish = true;
} else {
    exit('�յ�����');
}
?>