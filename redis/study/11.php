<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/14
 * Time: 11:20
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
$redis->flushAll();
$redis->zAdd('myset',0,'hello');
$redis->zadd('myset',1,'world');
$redis->zadd('myset',1,'zoo');//分数相同按值的字母排序
$redis->zadd('myset',2,'hi');
$redis->zadd('myset',2.5,'welcome');
var_dump($redis->zRange('myset',0,-1,'true'));
$redis->zadd('myset',3,'hi');
var_dump($redis->zRange('myset',0,-1,'true'));

/*
 *
array (size=6)
  'hello' => float 0
  'foo' => float 1
  'world' => float 1
  'zoo' => float 1
  'hi' => float 2
  'welcome' => float 2.5
E:\WWW\gittest\redis\study\11.php:17:
array (size=6)
  'hello' => float 0
  'foo' => float 1
  'world' => float 1
  'zoo' => float 1
  'welcome' => float 2.5
  'hi' => float 3
*/