<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 18:22
 * 商品维度计数
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
$redis->hSet('product:123','like_num',5);
$redis->hIncrBy('product:123','like_num',3);
$data = $redis->hGetAll('product:123');
var_dump($data);  //8