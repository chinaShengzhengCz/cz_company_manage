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

require_once 'PHPExcel.php';
require_once './PHPExcel/IOFactory.php';
require_once './PHPExcel/Reader/Excel5.php';

error_reporting(E_ALL);

$reader = PHPExcel_IOFactory::createReader('Excel2007'); //设置以Excel5格式(Excel97-2003工作簿)
$PHPExcel = $reader->load("20171229.xlsx"); // 载入excel文件
$sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
$highestRow = $sheet->getHighestRow(); // 取得总行数
$highestColumm = $sheet->getHighestColumn(); // 取得总列数
$mysqli = new mysqli('localhost', 'root', '11111111', 'test3', '3306');
$mysqli->query('set names utf8');

/** 循环读取每个单元格的数据，生成SQL */
$all = array();
for ($row = 2; $row <= $highestRow; $row++) {//行数是以第1行开始
    $stock_code = $sheet->getCell('B' . $row)->getValue();
    $code = $sheet->getCell('C' . $row)->getValue();
    $holder_name = $sheet->getCell("E" . $row)->getValue();
    $zhiya_code = $sheet->getCell('F' . $row)->getValue();
    $zhiya_count = $sheet->getCell("I" . $row)->getValue();

    $stock_type = $sheet->getCell("J" . $row)->getValue();
    $startzhiya = $sheet->getCell("L" . $row)->getValue();
    $endzhiya = $sheet->getCell("M" . $row)->getValue();
    $diszhiya = $sheet->getCell("N" . $row)->getValue();
    if (!empty($startzhiya)) {
        $startzhiya = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($startzhiya));
    }
    if (!empty($endzhiya)) {
        $endzhiya = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($endzhiya));
    }
    if (!empty($diszhiya)) {
        $diszhiya = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($diszhiya));
    }
    $data_key = $stock_code . $zhiya_count . $startzhiya . $endzhiya . $holder_name . $zhiya_code;
    $all[$data_key][] = array(
        'code' => $code,
        'stock_code' => $stock_code,
        'holder_id' => $holder_name,
        'zhiya_code' => $zhiya_code,
        'zhiya_count' => $zhiya_count,
        'stock_type' => $stock_type,
        'start_date' => $startzhiya,
        'end_date' => $endzhiya,
        'dis_date' => $diszhiya,
    );
    $datas[] = array(
        'code' => $code,
        'stock_code' => $stock_code,
        'holder_id' => $holder_name,
        'zhiya_code' => $zhiya_code,
        'zhiya_count' => $zhiya_count,
        'stock_type' => $stock_type,
        'start_date' => $startzhiya,
        'end_date' => $endzhiya,
        'dis_date' => $diszhiya,
    );
    if (isset($all[$data_key]['count'])) {
        $all[$data_key]['count'] += 1;
    } else {
        $all[$data_key]['count'] = 1;
    }
}
//print_r($highestRow);exit;
foreach ($datas as $index => $data) {//行数是以第1行开始
    $row = $index + 2;
    $stock_code = $sheet->getCell('B' . $row)->getValue();
    $code = $sheet->getCell('C' . $row)->getValue();
    $holder_name = $sheet->getCell("E" . $row)->getValue();
    $zhiya_code = $sheet->getCell('F' . $row)->getValue();
    $zhiya_type = $sheet->getCell("G" . $row)->getValue();
    $is_rebuy = $sheet->getCell("H" . $row)->getValue();
    $zhiya_count = $sheet->getCell("I" . $row)->getValue();
    $stock_type = $sheet->getCell("J" . $row)->getValue();
    $value = $sheet->getCell("K" . $row)->getValue();
    $startzhiya = $sheet->getCell("L" . $row)->getValue();
    $endzhiya = $sheet->getCell("M" . $row)->getValue();
    $diszhiya = $sheet->getCell("N" . $row)->getValue();
    if (!empty($startzhiya)) {
        $startzhiya = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($startzhiya));
    }
    if (!empty($endzhiya)) {
        $endzhiya = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($endzhiya));
    }
    if (!empty($diszhiya)) {
        $diszhiya = date('Y-m-d', PHPExcel_Shared_Date::ExcelToPHP($diszhiya));
    }
    if (!$zhiya_count || !$stock_code || !$startzhiya || !$zhiya_type || !$holder_name || !$zhiya_code) {
        echo "第{$row}行数据格式错误\n";
        break;
    }
    $data_key = $stock_code . $zhiya_count . $startzhiya . $endzhiya . $holder_name . $zhiya_code;
    if ($endzhiya) {
        $search = "stock_code='{$stock_code}' and start_date='{$startzhiya}' and zhiya_count={$zhiya_count} and end_date='{$endzhiya}' and holder_id='{$holder_name}' and zhiya_code='{$zhiya_code}'";
    } else {
        $search = "stock_code='{$stock_code}' and start_date='{$startzhiya}'  and zhiya_count={$zhiya_count} and holder_id='{$holder_name}' and zhiya_code='{$zhiya_code}'";
    }
    $values = implode("','", array(
        'code' => $code,
        'stock_code' => $stock_code,
        'holder_id' => $holder_name,
        'zhiya_code' => $zhiya_code,
        'zhiya_type' => $zhiya_type,
        'is_rebuy' => $is_rebuy,
        'zhiya_count' => $zhiya_count,
        'stock_type' => $stock_type,
        'value' => $value,
        'start_date' => $startzhiya,
        'end_date' => $endzhiya,
        'dis_date' => $diszhiya,
    ));
    $result = $mysqli->query('SELECT count(*) as count FROM pre_company_zhiya WHERE ' . $search)->fetch_array();
//    $all_data = $mysqli->query('SELECT * FROM pre_company_zhiya WHERE ' . $search);
//    while ($row = $all_data->fetch_row()) {
//        var_dump($row);
//    }
//    print_r($result);
//    exit;
//    $former = DB::fetch_first('SELECT count(*) as count FROM company_zhiya WHERE %i', array($search));
//    print_r($all_data);
//    exit;

    if (isset($result['count']) && $result['count'] > 0) {

        if ($all[$data_key]['count'] > 1 && $all[$data_key]['count'] > $result['count']) {//数量不一致，excel数据多 新增
            $result = $mysqli->query("INSERT INTO pre_company_zhiya (code, stock_code, holder_id, zhiya_code, zhiya_type, is_rebuy, zhiya_count, stock_type, value, start_date, end_date, dis_date) VALUES ('{$values}')");
            echo "新增相同数据 证券代码	{$stock_code}	股东名称	{$holder_name}	质押方	{$zhiya_code}	质押股数(万股)	{$zhiya_count}	质押起始日期	{$startzhiya}	质押截止日期	{$endzhiya}	解押日期	{$diszhiya}\n";
        } elseif ($result['count'] > $all[$data_key]['count']) {
//            数据库数量大于excel数量

            if (!isset($all[$data_key]['updated'])) {
                foreach ($all[$data_key] as $row) {
				if(is_array($row)){
                    if ($row['dis_date'] != '') {
                        $mysqli->query("UPDATE pre_company_zhiya SET dis_date='{$row['dis_date']}' WHERE (dis_date='0000-00-00' or dis_date='') " . $search . "  limit 1");
                        echo "少数更新解押日期    证券代码	{$stock_code}	股东名称	{$holder_name}	质押方	{$zhiya_code}	质押股数(万股)	{$zhiya_count}	质押起始日期	{$startzhiya}	质押截止日期	{$endzhiya}	解押日期	{$diszhiya}\n";
                    }else{
                        echo "减少数据 无解压变动 证券代码	{$stock_code}	股东名称	{$holder_name}	质押方	{$zhiya_code}	质押股数(万股)	{$zhiya_count}	质押起始日期	{$startzhiya}	质押截止日期	{$endzhiya}	解押日期	{$diszhiya}\n";
                    }
                }
												}
                $all[$data_key]['updated'] = true;

            } else {
                echo "减少数据  证券代码	{$stock_code}	股东名称	{$holder_name}	质押方	{$zhiya_code}	质押股数(万股)	{$zhiya_count}	质押起始日期	{$startzhiya}	质押截止日期	{$endzhiya}	解押日期	{$diszhiya}\n";
            }
        } else {
            //只有一条 或多条数量一致
            if ($result['count'] == 1) {
                $row = $mysqli->query('SELECT * FROM pre_company_zhiya WHERE ' . $search)->fetch_array(MYSQLI_ASSOC);
                if ($all[$data_key][0]['dis_date'] != '') {
                    $mysqli->query("UPDATE pre_company_zhiya SET dis_date='{$all[$data_key][0]['dis_date']}' WHERE (dis_date='0000-00-00' or dis_date='') " . $search . ' limit 1');
                    echo "更新解押日期    证券代码	{$stock_code}	股东名称	{$holder_name}	质押方	{$zhiya_code}	质押股数(万股)	{$zhiya_count}	质押起始日期	{$startzhiya}	质押截止日期	{$endzhiya}	解押日期	{$diszhiya}\n";
                } else {
                    echo "单条数据无解押日期变动    证券代码	{$stock_code}	股东名称	{$holder_name}	质押方	{$zhiya_code}	质押股数(万股)	{$zhiya_count}	质押起始日期	{$startzhiya}	质押截止日期	{$endzhiya}	解押日期	{$diszhiya}\n";
                }
            } else {
                //有多条
                if (!isset($all[$data_key]['updated'])) {
                    foreach ($all[$data_key] as $row) {
                        if ($row['dis_date'] != '') {
                            $mysqli->query("UPDATE pre_company_zhiya SET dis_date='{$row['dis_date']}' WHERE (dis_date='0000-00-00' or dis_date='') " . $search . "  limit 1");
                            echo "更新解押日期    证券代码	{$stock_code}	股东名称	{$holder_name}	质押方	{$zhiya_code}	质押股数(万股)	{$zhiya_count}	质押起始日期	{$startzhiya}	质押截止日期	{$endzhiya}	解押日期	{$diszhiya}\n";
                        }
                    }
                    $all[$data_key]['updated'] = true;
                } else {
                    echo "多条数据无解押日期变动    证券代码	{$stock_code}	股东名称	{$holder_name}	质押方	{$zhiya_code}	质押股数(万股)	{$zhiya_count}	质押起始日期	{$startzhiya}	质押截止日期	{$endzhiya}	解押日期	{$diszhiya}\n";
                }
            }
        }
    } else {//未查到 新增

	
//        print_r("INSERT INTO company_zhiya ('code', 'stock_code', 'holder_id', 'zhiya_code', 'zhiya_type', 'is_rebuy', 'zhiya_count', 'stock_type', 'value', 'start_date', 'end_date', 'dis_date') VALUES ('{$values}')");exit;
        $result = $mysqli->query("INSERT INTO pre_company_zhiya (code, stock_code, holder_id, zhiya_code, zhiya_type, is_rebuy, zhiya_count, stock_type, value, start_date, end_date, dis_date) VALUES ('{$values}')");

//        DB::insert('company_zhiya', array(
//                'code' => $code,
//                'stock_code' => $stock_code,
//                'holder_id' => $holder_name,
//                'zhiya_code' => $zhiya_code,
//                'zhiya_type' => $zhiya_type,
//                'is_rebuy' => $is_rebuy,
//                'zhiya_count' => $startzhiya,
//                'stock_type' => $zhiya_count,
//                'value' => $value,
//                'start_date' => $startzhiya,
//                'end_date' => $endzhiya,
//                'dis_date' => $diszhiya,
//            )
//    );
        echo "新增数据 证券代码	{$stock_code}	股东名称	{$holder_name}	质押方	{$zhiya_code}	质押股数(万股)	{$zhiya_count}	质押起始日期	{$startzhiya}	质押截止日期	{$endzhiya}	解押日期	{$diszhiya}\n";
    }
	if($mysqli->error){
		var_dump( $mysqli->error)." error \n";

	}
}
$mysqli->close();

?>