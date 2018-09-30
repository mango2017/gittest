<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/9/30
 * Time: 16:04
 */
require 'connect.php';
$id = $_GET['id'];
$redis->del("user:".$id);
$redis->lRem("uid",$id);
header("location:list.php");
