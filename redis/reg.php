<?php
require 'connect.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$age = $_POST['age'];
$uid = $redis->incr('userid');
$redis->hMset("user:".$uid,array('uid'=>$uid,'username'=>$username,'password'=>$password,'age'=>$age));
$redis->rPush("uid",$uid);
$redis->set("username".$username,$uid);
header("location:list.php");

