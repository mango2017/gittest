<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/15
 * Time: 17:38
 * http://localhost:100/gittest/singlelogin/login.php
 */
session_start();
if(!empty($_POST['username'])){
    require 'Des.php';
    $_SESSION['username'] = $_POST['username'];
    $redirect = "http://www.openpoor.com/index.php";
    header('Location:http://www.openpoor.com/sync.php?redirect='.urlencode($redirect).'&code='.Des::encrypt($_POST['username'],'openpoor'));exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sync login</title>
</head>
<body>
<form action="" method="post">
    <input type="text" name="username" placeholder="用户名"/>
    <input type="text" name="password" placeholder="密码"/>
    <input type="submit" value="登录"/>
</form>
</body>
</html>
