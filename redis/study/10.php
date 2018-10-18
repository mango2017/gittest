<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 19:32
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
//$redis->zAdd('user:1000:product:like',1,'3002');
//$redis->zAdd('user:1000:product:like',3,'3001');
//$redis->zAdd('user:1000:product:like',2,'3004');
//$redis->zAdd('user:1000:product:like',4,'3003');
//$data = $redis->zRange('user:1000:product:like',0,-1,true);
//var_dump($data);
//$data1 = $redis->zRevRange('user:1000:product:like',0,-1,true);
//var_dump($data1);

$redis->lPush('user',100);
$redis->lPush('user',200);
$redis->lPush('user',300);
$redis->lPush('user',500);
$data2 = $redis->lRange('user',0,-1);
var_dump($data2);