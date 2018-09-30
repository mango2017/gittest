<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/9/30
 * Time: 16:23
 */
require 'connect.php';
$uid = $_POST['uid'];
$username = $_POST['username'];
$age = $_POST['age'];
$a = $redis->hMset("user:".$uid,array('uid'=>$uid,'username'=>$username,'age'=>$age));
if($a){
    header("location:list.php");
}else{
    header("location:edit.php?id={$uid}");
}