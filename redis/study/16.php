<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/14
 * Time: 15:49
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
$redis->flushAll();
$redis->zAdd('myset',0,'hello');
$redis->zAdd('myset',1,'world');
$redis->zAdd('myset',1,'foo');
$redis->zAdd('myset',2,'hi');
$redis->zAdd('myset',3,'welcome');
//var_dump($redis->zIncrBy('myset',0.6,'world'));
//var_dump($redis->zIncrBy('myset',-2,'welcome'));
//var_dump($redis->zRange('myset',0,-1,'true'));
//var_dump($redis->zRevRange('myset',0,-1,'true'));
//var_dump($redis->zRangeByScore('myset',2,3));
//var_dump($redis->zRevRangeByScore('myset',3,2));
$redis->zRemRangeByScore('myset',1,3);
var_dump($redis->zRange('myset',0,-1));