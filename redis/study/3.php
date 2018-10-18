<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 15:44
 * 队列
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
$strQueueName = "Test_bihu_queue";
//进队列
$redis->rpush($strQueueName,json_encode(array('uid'=>1,'name'=>'job')));
$redis->rpush($strQueueName,json_encode(array('uid'=>2,'name'=>'tom')));
$redis->rpush($strQueueName,json_encode(array('uid'=>3,'name'=>'john')));
echo "-------进队列-------<br/>";
//查看队列
$strCout = $redis->lRange($strQueueName,0,-1);
echo "当前队列数据为：<br/>";
print_r($strCout);
//出队列
$redis->lPop($strQueueName);
echo "<br/>--------出队列成功--------<br/>";
//查看队列
$strCout = $redis->lRange($strQueueName,0,-1);
echo "当前队列数据为：<br/>";
print_r($strCout);