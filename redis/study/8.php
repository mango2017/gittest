<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 18:36
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
$redis->zAdd('user:1000:follow',1463557212,'1001');
$redis->zAdd('user:1000:follow',1463557333,'1002');
$redis->zAdd('user:2000:follow',1463577568,'1002');
$redis->zAdd('user:2000:follow',1463896964,'1003');
$redis->zInter('com_follow:1000:2000',array('user:1000:follow','user:2000:follow'));
$data = $redis->zRange('com_follow:1000:2000',0,-1);
var_dump($data);