<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/9/30
 * Time: 14:53
 * http://localhost:100/gittest/redis/1.php
 */
//实例化
$redis = new Redis();
//连接服务器
$a = $redis->connect('localhost', 6379);
//授权
$redis->auth("lampjly");
