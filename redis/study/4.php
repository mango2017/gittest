<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 16:20
 * 简单计数器实战
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
$strKey = "Test_bihu_comments";
//设置初始值
$redis->set($strKey,0);
$redis->incr($strKey);
$redis->incr($strKey);
$redis->incr($strKey);
$strNowCount = $redis->get($strKey);
echo "当前数量为{$strNowCount}";