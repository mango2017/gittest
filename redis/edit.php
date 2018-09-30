<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/9/30
 * Time: 16:17
 */
require 'connect.php';
$id = $_GET['id'];
$data = $redis->hGetAll("user:".$id);
var_dump($data);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
</head>
<body>
<form action="doedit.php" method="post">
    用户名：<input type="text" name="username" value="<?php echo $data['username'];?>"/></br>
    年龄：<input type="text" name="age" value="<?php echo $data['age'];?>"/></br>
    <input type="hidden" name="uid" value="<?php echo $data['uid'];?>"/>
    <input type="submit" value="注册"/>
    <input type="reset" value="重新填写"/>
</form>
</body>