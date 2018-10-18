<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 18:25
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
$redis->hSet('user:100','follow',5);
$redis->hIncrBy('user:100','follow',2);
$data = $redis->hGetAll('user:100');
var_dump($data);