<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 21:53
 * 获取旧消息
 */
header("Content-type:text/html;charset=utf-8");
include './SinglePullMessage.class.php';
$object = new SinglePullMessage('localhost');
//获取旧消息
$arr = $object->getPreMessage('jane');
if($arr){
    $object->dealArr($arr);
}
else{
    echo "无旧消息";
}