<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/14
 * Time: 16:00
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
$redis->flushAll();
$redis->zAdd('myset',0,'hello');
$redis->zAdd('myset',1,'world');
$redis->zAdd('myset',1,'foo');
$redis->zAdd('myset',2,'welcome');
$redis->zAdd('myset',3,'score');

$redis->zAdd('otherset',0,'good');
$redis->zAdd('otherset',1,'foo');
$redis->zAdd('otherset',2,'welcome');

$array_set = array('myset','otherset');
//var_dump($redis->zInter('destinationset',$array_set));
//var_dump($redis->zRange('destinationset',0,-1,'true'));

//var_dump($redis->zUnion('destinationset',$array_set));
//var_dump($redis->zRange('destinationset',0,-1,'true'));

//var_dump($redis->zRank('myset','world'));

//var_dump($redis->zRevRank('myset','hello'));
$redis->zRemRangeByRank('myset',1,3);
var_dump($redis->zRange('myset',0,-1,'true'));