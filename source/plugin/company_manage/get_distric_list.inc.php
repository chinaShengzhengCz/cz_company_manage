<?php

$district_1 = DB::fetch_all("SELECT id,name FROM %t WHERE level =1", array('common_district'));
$district_2 = DB::fetch_all("SELECT id,name,upid FROM %t WHERE level =2", array('common_district'));
$district_3 = DB::fetch_all("SELECT id,name,upid FROM %t WHERE level =3", array('common_district'));
$district_4 = DB::fetch_all("SELECT id,name,upid FROM %t WHERE level =4", array('common_district'));
foreach ($district_2 as $d2) {
    $p_dis[$d2['upid']][] = $d2;
}
foreach ($district_3 as $d3) {
    $p_dis[$d3['upid']][] = $d3;
}
foreach ($district_4 as $d4) {
    $p_dis[$d4['upid']][] = $d4;
}
header("Cache-Control: public");
header("Pragma: public");
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:attachment;filename=ตุว๘" . date('YmdHi') . ".csv");
header('Content-Type:APPLICATION/OCTET-STREAM');
ob_clean();
foreach ($district_1 as $val) {
    echo "{$val['id']},{$val['name']}" . PHP_EOL;
    if (isset($p_dis[$val['id']])) {
        foreach ($p_dis[$val['id']] as $s2) {
            echo "{$val['id']},{$val['name']},{$s2['id']},{$s2['name']}" . PHP_EOL;
            if (isset($p_dis[$s2['id']])) {
                foreach ($p_dis[$s2['id']] as $s3) {
                    echo "{$val['id']},{$val['name']},{$s2['id']},{$s2['name']},{$s3['id']},{$s3['name']}" . PHP_EOL;
                }

            } else {
                echo "{$val['id']},{$val['name']},{$s2['id']},{$s2['name']}" . PHP_EOL;
            }
        }
    }
}
exit;