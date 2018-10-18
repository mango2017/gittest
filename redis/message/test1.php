<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 21:43
 * 发送消息
 */
include './SinglePullMessage.class.php';
$object = new SinglePullMessage('localhost');
//发送消息
$sender="boss";//发送者
$to="jane";//接收者
$message = "how are you";//信息
$time = time();
$arr = array('sender'=>$sender,'message'=>$message,'time'=>$time);
echo $object->sendSingle($to,$arr);
