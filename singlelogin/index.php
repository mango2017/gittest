<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/15
 * Time: 17:31
 */
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sync login</title>
</head>
<body>
<?php if(empty($_SESSION['username'])){?>
hello,游客，请先<a href="login.php" rel="external nofollow">登录</a>
    <a href="http://www.myspace.com/index.php" rel="external nofollow">进入空间</a>

<?php }else{ ?>
hello,<?php echo $_SESSION['username'];?>
    <a href="http://www.myspace.com/index.php" rel="external nofollow">进入空间</a>
<?php } ?>
<a href="http://www.openpoor.com/index.php" rel="external nofollow">home</a>
</body>
</html>
