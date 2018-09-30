<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/9/30
 * Time: 22:51
 */
$id = $_GET['id'];
$uid = $_GET['uid'];
require 'connect.php';
$redis->sAdd("user:".$uid.":followings",$id);
$redis->sAdd("user:".$id.":followers",$uid);
header("location:list.php");