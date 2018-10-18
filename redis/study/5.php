<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 16:20
 * 排行榜
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
$strKey = "Test_bihu_score";
//存储数据
$redis->zadd($strKey,"50",json_encode(array("name"=>"tom")));
$redis->zadd($strKey,"70",json_encode(array("name"=>"john")));
$redis->zadd($strKey,"90",json_encode(array("name"=>"jerry")));
$redis->zadd($strKey,"30",json_encode(array("name"=>"job")));
$redis->zadd($strKey,"100",json_encode(array("name"=>"liming")));

$dataOne = $redis->zRevRange($strKey,0,-1,true);
echo "{$strKey} 由大到小的排序----<br/>";
var_dump($dataOne);

$dataTwo = $redis->zRange($strKey,0,-1,true);
echo "{$strKey} 由小到大的排序----<br/>";
var_dump($dataTwo);