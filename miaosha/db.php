<?php
header("Content-type:text/html;charset=utf-8");
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/12
 * Time: 22:37
 * 数据库连接
 */
//$con  = mysqli_connect("localhost","root","root");
//if(!$con){
//    die("Could not connect:".mysqli_error());
//}
//mysqli_select_db($con,"test");
//$result = mysqli_query($con,"select * from product");
//mysqli_close($con);

$dbms='mysql';     //数据库类型
$host='localhost'; //数据库主机名
$dbName='test';    //使用的数据库
$user='root';      //数据库连接用户名
$pass='root';          //对应的密码
$dsn="$dbms:host=$host;dbname=$dbName";
try{
    $mod = new PDO($dsn, $user, $pass); //初始化一个PDO对象
    echo "连接成功<br/>";
}catch(PDOException $e){
    die ("Error!: " . $e->getMessage() . "<br/>");
}