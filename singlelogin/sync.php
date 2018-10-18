<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/15
 * Time: 17:53
 */
$redirect = empty($_GET['redirect'])?'www.openpoor.com':$_GET['redirect'];
if(empty($_GET['code'])){
    header('Location:http://'.urldecode($redirect));exit;
}
$apps = array('www.myspace.com/slogin.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>sync login</title>
</head>
<body>
<?php foreach($apps as $v){  ?>
<script type="text/javascript" src="http://<?php echo $v.'?code='.$_GET['code'];?>"></script>
<?php } ?>
<script type="text/javascript">
    window.onload = function(){
        location.replace('<?php echo $redirect;?>')
    }
</script>
</body>
</html>
