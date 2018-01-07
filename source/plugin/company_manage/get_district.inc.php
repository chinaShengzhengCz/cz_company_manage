<?php
require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
$data = file('D:\ComsenzEXP\wwwroot\qhcaiji\sample.csv');
$data = array_filter(array_map('trim', $data));
$district_1 = DB::fetch_all("SELECT id,name FROM %t WHERE level =1", array('common_district'));
$district_1 = map_array($district_1, 'id');
$district_2 = DB::fetch_all("SELECT id,name,upid FROM %t WHERE level =2", array('common_district'));
$district_2 = map_array($district_2, 'id');
$district_3 = DB::fetch_all("SELECT id,name,upid FROM %t WHERE level =3", array('common_district'));
$district_3 = map_array($district_3, 'id');
$p_dis = array();
foreach ($district_2 as $d2) {
    $p_dis[$d2['upid']][] = $d2;
}
foreach ($district_3 as $d3) {
    $p_dis[$d3['upid']][] = $d3;
}
if ($_GET['get_type'] == 1) {
    foreach ($data as $d) {
        $found = false;
        foreach ($district_1 as $d1) {
            if (preg_match("/{$d1['name']}/", $d)) {
                if (!empty($p_dis[$d1['id']])) {
                    foreach ($p_dis[$d1['id']] as $d2) {
                        if (preg_match("/{$d2['name']}/", $d)) {
                            if (!empty($p_dis[$d2['id']])) {
                                foreach ($p_dis[$d2['id']] as $d3) {
                                    if (preg_match("/{$d3['name']}/", $d)) {
                                        echo "{$d}".'	'."{$d3['id']}\n";
                                        $found = true;
                                        break 3;
                                    }
                                }
                            } else {
                                $found = true;
                                echo "{$d}".'	'."{$d2['id']}\n";
                                break 2;
                            }
                        }
                    }
                    break;
                }
            }
        }
        if (!$found) {
            echo "{$d}".'	'."\n";
        }
    }
} elseif ($_GET['get_type'] == 2) {
    foreach ($data as $d) {
        $found = false;
        //最精确匹配
        foreach ($district_1 as $d1) {
            if (preg_match("/{$d1['name']}/", $d)) {
                if (!empty($p_dis[$d1['id']])) {
                    foreach ($p_dis[$d1['id']] as $d2) {
                        if (preg_match("/{$d2['name']}/", $d)) {
                            if (!empty($p_dis[$d2['id']])) {
                                foreach ($p_dis[$d2['id']] as $d3) {
                                    if (preg_match("/{$d3['name']}/", $d)) {
                                        echo "{$d}".'	'."{$d3['id']}\n";
                                        $found = true;
                                        break 3;
                                    }
                                }
                            } else {
                                $found = true;
                                echo "{$d}".'	'."{$d2['id']}\n";
                                break 2;
                            }
                        }
                    }
                    break;
                }
            }
        }
        //精确匹配 1 2
        if (!$found) {

            foreach ($district_1 as $d1) {
                if (preg_match("/{$d1['name']}/", $d)) {
                    if (!empty($p_dis[$d1['id']])) {
                        foreach ($p_dis[$d1['id']] as $d2) {
                            if (preg_match("/{$d2['name']}/", $d)) {
                                if (!empty($p_dis[$d2['id']])) {
                                    foreach ($p_dis[$d2['id']] as $d3) {
                                        if (preg_match("/{$d3['name']}/", $d)) {
                                            echo "{$d}".'	'."{$d3['id']}\n";
                                            $found = true;
                                            break 3;
                                        }
                                    }
                                } else {
                                    $found = true;
                                    echo "{$d}".'	'."{$d2['id']}\n";
                                    break 2;
                                }
                            }
                        }
                        break;
                    }
                }
            }
        }
        //精确匹配 1 3
        if (!$found) {

            foreach ($district_1 as $d1) {
                if (preg_match("/{$d1['name']}/", $d)) {
                    if (!empty($p_dis[$d1['id']])) {
                        foreach ($p_dis[$d1['id']] as $d2) {
                            if (!empty($p_dis[$d2['id']])) {
                                foreach ($p_dis[$d2['id']] as $d3) {
                                    if (preg_match("/{$d3['name']}/", $d)) {
                                        echo "{$d}".'	'."{$d3['id']}\n";
                                        $found = true;
                                        break 3;
                                    }
                                }
                            } 
                        }
                        break;
                    }
                }
            }
        }
        if (!$found) {
            foreach ($district_2 as $d2) {
                $found1 = false;
                if (preg_match("/{$d2['name']}/", $d)) {
                    $found1 = true;
                    if (!empty($p_dis[$d2['id']])) {
                        foreach ($p_dis[$d2['id']] as $d3) {
                            if (preg_match("/{$d3['name']}/", $d)) {
                                echo "{$d}".'	'."{$d3['id']}\n";
                                $found = true;
                                break 2;
                            }
                        }
                        if (!$found && $found1) {
                            echo "{$d}".'	'."{$d2['id']}\n";
                            break;
                        }
                    }
                }
            }
            if (!$found1 && !$found) {
                echo "{$d}".'	'."\n";
            }

        }
    }
}
print_r('finish');
exit;
print_r($district_1);
exit;
print_r($data);
exit;
