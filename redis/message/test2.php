<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 21:47
 * 接收消息
 */
header("Content-type:text/html;charset=utf-8");
include './SinglePullMessage.class.php';
$object = new SinglePullMessage('localhost');
//获取最新消息
$arr = $object->getNewMessage('jane');
if($arr){
    echo $arr['count']."个联系人发送新消息<br/>";
    $object->dealArr($arr['messageArr']);
}else{
    echo "无新消息";
}