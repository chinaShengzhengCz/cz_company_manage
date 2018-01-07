<?php
require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
$group_id_to_update = array(
    1, 2//要更新过期时间的分组id
);
error_reporting(E_ALL);
$update_time = 100000;
$unchange = $change = array();
if (empty($_GET['type']) || $_GET['type'] != 2) {
    if (!empty($group_id_to_update)) {
        foreach ($group_id_to_update as $group_id) {

            $groups = DB::fetch_all("SELECT uid,username,groupid,groupexpiry FROM %t WHERE groupid='{$group_id}'", array('common_member'));
            if ($groups) {
                if ($update_time < 0) {
                    $t = -$update_time;
                    $result = DB::query("update pre_common_member set groupexpiry = {$t} where groupexpiry<={$t} and groupid='{$group_id}'");
                }
                foreach ($groups as $group) {
                    $old_expiry = $group['groupexpiry'];
                    if ($old_expiry == 0) {
                        $unchange[] = $group;
                        continue;
                    }
                    if ($old_expiry + $update_time < 0) {
                        $update_expiry = 0;
                    } else {
                        $update_expiry = $old_expiry + $update_time;
                    }
//                    print_r("update pre_common_member_field_forum set groupterms = REPLACE(groupterms, {$old_expiry}, {$update_expiry}) where  uid in ({$uids})");exit;
                    $result = DB::query("update pre_common_member_field_forum set groupterms = REPLACE(groupterms, {$old_expiry}, {$update_expiry}) where  uid = {$group['uid']}");
                    if ($update_expiry) {
                        $filed4 = date('Y-n-j', $update_expiry);
                        $result1 = DB::query("update pre_common_member_profile set field4 = '{$filed4}' where  uid  = {$group['uid']}");
                    }
                    $change[] = $group;
                }
                $result = DB::query("update pre_common_member set groupexpiry = groupexpiry+{$update_time} where groupid='{$group_id}' and groupexpiry!=0");
            }
        }
    }
    if (!empty($unchange)) {
        foreach ($unchange as $u) {
            echo "{$u['username']} , uid {$u['uid']} 未改动<br>";
        }
    }
    if (!empty($change)) {
        foreach ($change as $u) {
            echo "{$u['username']} ,  uid {$u['uid']} 已改动{$update_time}<br>";
        }
    }
} elseif ($_GET['type'] == 2) {
    if (!empty($group_id_to_update)) {
        foreach ($group_id_to_update as $group_id) {

            $groups = DB::fetch_all("SELECT uid,username,groupid,groupexpiry FROM %t WHERE groupid='{$group_id}'", array('common_member'));
            if ($groups) {
                foreach ($groups as $group) {


                    $result = DB::fetch_first("select * from pre_common_member_field_forum where  uid = {$group['uid']}");
                    if ($group['groupexpiry'] == 0) {
                        echo "{$group['username']} ,  uid {$group['uid']} 日期为空<br>";
                        continue;
                    }
                    if (!isset($result['groupterms']) || !strstr($result['groupterms'], $group['groupexpiry'])) {
                        echo "{$group['username']} ,  uid {$group['uid']} common_member，common_member_field_forum不匹配<br>";
                        continue;
                    }
                    $result1 = DB::fetch_first("select field4 from pre_common_member_profile where  uid  = {$group['uid']}");
                    if ($group['groupexpiry'] == 0) {
                        if ($result1['field4']) {
                            echo "{$group['username']} ,  uid {$group['uid']} common_member，pre_common_member_profile不匹配<br>";
                            continue;
                        }
                    } else {
                        $compare = date('Y-n-j', $group['groupexpiry']);
                        if ($compare != $result1['field4']) {
                            echo "{$group['username']} ,  uid {$group['uid']} common_member，pre_common_member_profile不匹配<br>";
                            continue;
                        }
                    }
                    echo "{$group['username']} ,  uid {$group['uid']} 匹配<br>";
                }
            }
        }
    }
}

exit;
