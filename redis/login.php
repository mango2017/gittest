<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/9/30
 * Time: 22:13
 */
require 'connect.php';
$username = isset($_POST['username'])?$_POST['username']:'';
$pass = isset($_POST['password'])?$_POST['password']:'';
$id = $redis->get("username".$username);
if(!empty($id)){
    $password = $redis->hget("user:".$id,"password");
    if(md5($pass)  == $password){
        echo "aaa";
        $auth = md5(time().$username.rand());
        $redis->set("auth:".$auth,$id);
        setcookie("auth",$auth,time()+86400);
        header("location:list.php");
    }else{
        echo 2;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
</head>
<body>


<form action="" method="post">
    用户名:<input type="text" name="username"/></br>
    密码：<input type="password" name="password"/></br>
    <input type="submit" value="登录"/>


</form>
</body>