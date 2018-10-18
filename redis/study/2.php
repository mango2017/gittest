<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 15:04
 * hset应用---字符串
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
$strCacheKey = 'Test_bihu';
$arrWebSite = array(
    'goole'=>array(
        'google.com',
        'goole.com.hk'
    )
);
$redis->hSet($strCacheKey,'goole',json_encode($arrWebSite['goole']));
//$json_data = $redis->hGet($strCacheKey,'goole');
//$data = json_decode($json_data,true);
//print_r($data);
//echo $data[0];

$json_data1 = $redis->hGetAll($strCacheKey);
$data1 = json_decode($json_data1['goole'],true);
var_dump($data1[1]);
