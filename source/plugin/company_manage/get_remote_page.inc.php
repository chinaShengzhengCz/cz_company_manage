<?php
function utf82gbk($data)
{
    if (is_array($data)) {
        return array_map('utf82gbk', $data);
    }
    return iconv('utf-8', 'gbk', $data);
}

function curl_direct_post($url, $data = '')
{
    $url = trim($url);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $res = curl_exec($ch);
    curl_close($ch);
    return $res;
}

$request = array(
    'page.pageNo' => 2,
    'page.pageSize' => 15,
    'page.orderBy' => 'MATO_UPDATE_DATE',
    'page.order' => 'desc',
    'page.page' => 'desc',
    'page.sqlCKey' => 'SIZE_SALES_DEPT',
    'page.sqlKey' => 'PAG_SALES_DEPT',
    'page.searchFileName' => 'publicity',
    'filter_EQS_aoi_id' => '790',
    'filter_LIKES_msdi_reg_address' => '',
    'filter_LIKES_msdi_name' => '',
    'nd' => '151' . time(),
    '_search' => false,
);
//for ($yema = 2; $yema <= 6; $yema++){
//	echo $yema;
	$daji = array(
		'params' => '方向：不限',
		'complete '=> '0',
		'keyContent' => '',
		'pageNum' => 5,
		'condition.pageSize' => 2,
		'dateOption' => '',
	);
	$url='http://djs18.com/fm/searchFinOffline.action';
	//http://jg.sac.net.cn/pages/publicity/resource!list.action
	$data = curl_direct_post($url, http_build_query($daji));
	//print_r($data);exit;
	var_dump(utf82gbk(json_decode($data, 1)));
//	unset($data);
//}