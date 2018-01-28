<?php
/**
 * 20171023 数据表的SQL生成工具，读取excel，转换成SQL语句
 * 最后使用20171106
 */
set_time_limit(0);

//裁剪函数
function cut($file, $from, $end)
{

    $message = explode($from, $file);
    $message = explode($end, $message[1]);
    return $message[0];
}

//error_reporting(E_ALL);
$mysqli = new mysqli('localhost', 'root', '11111111', 'x3gbk', '3306');
$mysqli->query('set names utf8');
$price_datas = $mysqli->query('SELECT * FROM pre_company_stock_price');
if (empty($price_datas)) {
    exit('价格表无数据');
}
$prices = array();
while ($row = $price_datas->fetch_assoc()) {
    $prices[] = $row;
}
error_reporting(E_ALL);
foreach ($prices as $price) {
    $re = $mysqli->query("UPDATE pre_company_zhiya SET gap=(" . $price['price'] . "*100*zhiya_count)/stock_value-100  WHERE (dis_date =''||dis_date='0000-00-00') AND stock_code ='" . $price['stock_code'] . "'");
}
$mysqli->close();
echo 'finish';
?>