<?php
/**
 * Created by PhpStorm.
 * User: free
 * Date: 2017/11/12
 * Time: 13:41
 */
if (!empty($get_type)) {
    if (strtolower($get_type) == 'post') {
        $get_params = $_POST;
    } else {
        $get_params = $_GET;
    }
} else {
    $get_params = $_GET;
}
$limit = isset($get_params['limit']) ? $get_params['limit'] : 20;
$offset = isset($get_params['offset']) ? $get_params['offset'] : 0;
$sort = !empty($get_params['sort']) ? $get_params['sort'] : 'id';
$order = !empty($get_params['order']) ? $get_params['order'] : 'desc';