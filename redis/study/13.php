<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/14
 * Time: 13:09
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
$redis->flushAll();
$redis->zAdd('myset',0,'hello');
$redis->zAdd('myset',1,'world');
$redis->zAdd('myset',1,'foo');
$redis->zAdd('myset',2,'hi');
//$redis->zAdd('myset',2.5,'welcome');
var_dump($redis->zCard('myset'));