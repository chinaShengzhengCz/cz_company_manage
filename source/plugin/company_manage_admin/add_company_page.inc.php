<?php
if (empty($_G['uid'])) {
    exit('用户未登录');
}
if (!empty($_POST['resideprovince']) && !empty($_POST['oper'])) {
    if (!empty($_POST['residecommunity'])) {
        $distric = C::t('common_district')->fetch_all_by_name($_POST['residecommunity']);
    } elseif (!empty($_POST['residedist'])) {
        $distric = C::t('common_district')->fetch_all_by_name($_POST['residedist']);
    } elseif (!empty($_POST['residecity'])) {
        $distric = C::t('common_district')->fetch_all_by_name($_POST['residecity']);
    } elseif (!empty($_POST['resideprovince'])) {
        $distric = C::t('common_district')->fetch_all_by_name($_POST['resideprovince']);
    } else {
        exit('地区错误');
    }
    if (empty($distric)) {
        exit('地区未找到');
    }
    if (empty($_POST['shorter_name']) || empty($_POST['full_name'])) {
        exit('有未填的字段');
    }

    $company_save['cate_id'] = $_POST['cate_id'] ? $_POST['cate_id'] : end($_POST['former_cate_id']);
    $company_save['area_id'] = $distric[0]['id'];
    $company_save['boss'] = $_POST['boss'];
    $company_save['tel'] = $_POST['tel'];
    $company_save['address'] = $_POST['address'];
    $company_save['full_name'] = $_POST['full_name'];
    $company_save['shorter_name'] = $_POST['shorter_name'];
    $company_save['position'] = $_POST['position'];
    if ($_POST['oper'] == 'edit') {
        if (empty($_POST['company_id'])) {
            exit('没有数据');
        }
        $former = C::t('company_manage_base')->fetch_by_where("id='{$_POST['company_id']}'");
        if (empty($former)) {
            exit('没有找到数据');
        }
        $company_save['update_time'] = date('Y-m-d H:i:s');
        $company_save['update_operator'] = $_G['uid'];
        C::t('company_cate_map')->delete_where("code='{$company_save['code']}'");
        if (isset($_POST['parent_code'])) {
            if (empty($_POST['parent_code'])) {
                $former_c_map = C::t('company_map')->delete_where("c_code='{$former['code']}'");
            } else {
                $p_codes = implode("','", array_filter($_POST['parent_code']));
                $former_c_map = C::t('company_map')->delete_where("c_code='{$former['code']}' and p_code not in ('{$p_codes}')");
                foreach ($_POST['parent_code'] as $p_code) {
                    if (!$p_code) {
                        continue;
                    }
                    $map_save['c_code'] = $former['code'];
                    $map_save['p_code'] = $p_code;
                    if ($former_c_map = C::t('company_map')->fetch_by_where("c_code='{$former['code']}' and p_code='{$p_code}'")) {
                        continue;
                    } else {
                        $map_save['create_time'] = date('Y-m-d H:i:s');
                        $map_save['create_operator'] = $_G['uid'];
                        C::t('company_map')->insert($map_save);
                    }
                }
            }
        } else {
            $former_c_map = C::t('company_map')->delete_where("c_code='{$former['code']}'");
        }
        if (!empty($_POST['former_cate_id'])) {
            foreach ($_POST['former_cate_id'] as $cate_id) {
                $map_save['cate_id'] = $cate_id;
                $map_save['code'] = $_POST['code'];
                $map_save['create_time'] = date('Y-m-d H:i:s');
                $map_save['create_operator'] = $_G['uid'];
                C::t('company_cate_map')->insert($map_save);
            }
        }
        if (!empty($_POST['cate_id'])) {
            $map_save['cate_id'] = $_POST['cate_id'];
            $map_save['code'] = $_POST['code'];
            $map_save['create_time'] = date('Y-m-d H:i:s');
            $map_save['create_operator'] = $_G['uid'];
            C::t('company_cate_map')->insert($map_save);
        }
        C::t('company_manage_base')->update($former['id'], $company_save);
        showmessage('修改成功', 'admin.php?action=plugins&identifier=company_manage_admin&pmod=company_manage_list', array(), array());
    } else {
        $company_save['code'] = substr(md5($_POST['full_name'] . time()), 8, -8);
        if (empty($company_save['cate_id'])) {
            $company_save['cate_id'] = 0;
        }

        $company_save['create_time'] = date('Y-m-d H:i:s');
        $company_save['create_operator'] = $_G['uid'];
        C::t('company_manage_base')->insert($company_save);
        if (!empty($_POST['former_cate_id'])) {
            foreach ($_POST['former_cate_id'] as $cate_id) {
                $map_save['cate_id'] = $cate_id;
                $map_save['code'] = $company_save['code'];
                $map_save['create_time'] = date('Y-m-d H:i:s');
                $map_save['create_operator'] = $_G['uid'];
                C::t('company_cate_map')->insert($map_save);
            }
        }
        if (!empty($_POST['cate_id'])) {
            $map_save['cate_id'] = $_POST['cate_id'];
            $map_save['code'] = $company_save['code'];
            $map_save['create_time'] = date('Y-m-d H:i:s');
            $map_save['create_operator'] = $_G['uid'];
            C::t('company_cate_map')->insert($map_save);
        }
        if (isset($_POST['parent_code']) && $_POST['parent_code'] != '') {
            foreach ($_POST['parent_code'] as $p_code) {
                $p_data = C::t('company_manage_base')->fetch_by_where("code='{$_POST['parent_code']}'");
                $map_save['c_code'] = $company_save['code'];
                $map_save['p_code'] = $p_code;
                $map_save['create_time'] = date('Y-m-d H:i:s');
                $map_save['create_operator'] = $_G['uid'];
                C::t('company_map')->insert($map_save);
            }
        }
        showmessage('添加成功', 'admin.php?action=plugins&identifier=company_manage_admin&pmod=company_manage_list', array(), array());
    }
    $finish = true;
} else {
    exit('地区未选择');
}
?>