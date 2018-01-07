<?php
require_once DISCUZ_ROOT . './source/plugin/company_manage/company_manage.class.php';
$data = file('D:\ComsenzEXP\wwwroot\qhcaiji\code.csv');
$data = array_filter(array_map('trim', $data));
if (!empty($data)) {
    foreach ($data as $c) {
        $com = DB::fetch_first("SELECT code,shorter_name FROM %t WHERE shorter_name ='{$c}'", array('company_manage_base'));
		$count=DB::fetch_first("SELECT count(1) as num FROM %t WHERE shorter_name ='{$c}'", array('company_manage_base'));
        if ($com) {
			if($count['num']>1){
						echo "²»Ö¹Ò»¸ö¼ò³Æ {$c}\t{$com['code']}".PHP_EOL;
			}else{
						echo "{$c}\t{$com['code']}".PHP_EOL;
			}
        } else {
            echo "{$c}".PHP_EOL;
        }
    }
}
exit;
