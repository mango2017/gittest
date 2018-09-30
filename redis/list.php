<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>注册</title>
</head>
<body>
<a href="add.html">注册</a>
<?php
    require 'connect.php';
    if(!empty($_COOKIE['auth'])){
        $id = $redis->get("auth:".$_COOKIE['auth']);
        $name = $redis->hGet("user:".$id,"username");
?>
欢迎您，<?php echo $name ;?> , <a href="logout.php">退出</a>
<?php }else{ ?>
        <a href="login.php">登录</a>
<?php } ?>

</body>

<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/9/30
 * Time: 15:42
 */
require 'connect.php';
//用户总数
$count = $redis->lSize("uid");
//页大小
$page_size = 3;
//当前页码
$page_num = (!empty($_GET['page']))?$_GET['page']:1;
//页总数
$page_count = ceil($count/$page_size);

$ids = $redis->lRange("uid",($page_num-1)*$page_size,(($page_num-1)*$page_size+$page_size-1));
//var_dump($ids);
//for($i=1;$i<=($redis->get("userid"));$i++){
//    $data[] = $redis->hGetAll("user:".$i);
//}
//var_dump($data);

foreach ($ids as $v){
    $data[] = $redis->hGetAll("user:".$v);
}


//$data = array_filter($data);//过滤数组中值为空的
//var_dump($data);
?>
<table border="1">
    <tr>
        <th>uid</th>
        <th>username</th>
        <th>age</th>
        <th>操作</th>
    </tr>
    <?php foreach($data as $v) {?>
    <tr>
        <td><?php echo $v['uid'];?></td>
        <td><?php echo $v['username'];?></td>
        <td><?php echo $v['age'];?></td>
        <td>
            <a href="del.php?id=<?php echo $v['uid'];?>">删除</a>
            <a href="edit.php?id=<?php echo $v['uid'];?>">编辑</a>
            <?php if(!empty($_COOKIE['auth']) && $id!=$v['uid']) {?>
                <a href="addfans.php?id=<?php echo $v['uid'];?>&uid=<?php echo $id;?>">加关注</a>
            <?php }?>
        </td>
    </tr>
    <?php } ?>
<tr>
    <td colspan="4">
        <a href="?page=<?php echo ($page_num-1)<=1?1:($page_num-1);?>">上一页</a>
        <a href="?page=<?php echo (($page_num+1)>=$page_count)?$page_count:($page_num+1);?>">下一页</a>
        <a href="?page=1">首页</a>
        <a href="?page=<?php echo $page_count;?>">尾页</a>
        当前<?php echo $page_num;?>页
        总共<?php echo $page_count;?>页
        总共<?php echo $count;?>个用户

    </td>
</tr>

</table>

<table>
    <caption>我关注了谁</caption>
    <?php
    $data = $redis->sMembers("user:".$id.":followings");
    foreach($data as $v){
        $row = $redis->hGetAll("user:".$v);
    ?>
    <tr>
        <td><?php echo $row['uid'];?></td>
        <td><?php echo $row['username'];?></td>
        <td><?php echo $row['age'];?></td>
    </tr>
    <?php } ?>
</table>


<table>
    <caption>我的粉丝</caption>
    <?php
    $data = $redis->sMembers("user:".$id.":followers");
    foreach($data as $v){
        $row = $redis->hGetAll("user:".$v);
        ?>
        <tr>
            <td><?php echo $row['uid'];?></td>
            <td><?php echo $row['username'];?></td>
            <td><?php echo $row['age'];?></td>
        </tr>
    <?php } ?>
</table>
