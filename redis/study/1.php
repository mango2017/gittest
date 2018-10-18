<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 15:04
 * set应用----字符串
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
$strCacheKey = 'Test_bihu';
$arrCacheDate = array('name'=>'job','sex'=>'男','age'=>30);
$redis->set($strCacheKey,json_encode($arrCacheDate));
$redis->expire($strCacheKey,30);//设置30秒后过期
$json_data = $redis->get($strCacheKey);
$data = json_decode($json_data,true);
var_dump($data);