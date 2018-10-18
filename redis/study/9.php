<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 19:22
 */
header("Content-type:text/html;charset=utf-8");
require '../connect.php';
//获取5秒内操作记录
$res = $redis->zRangeByScore("user:1000:comment",time()-5,time());
//判断5秒内不能评论
if(!$res){
    $redis->zAdd('user:1000:comment',time(),'评论内容');
}else{
    echo '5秒内不能评论';
}
//5秒内评论不得超过2次
if(count($redis->zRangeByScore('user:1000:comment',time()-5,time()))==1){
    echo "5秒内不能评论2次";
}

//5秒内评论不能评论2次
if(count($redis->zRangeByScore('user:1000:comment',time()-5,time()))<2){
    echo "5秒内不能评论2次";
}
