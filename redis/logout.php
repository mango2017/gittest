<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/9/30
 * Time: 22:36
 */
setcookie("auth","",time()-1);
header("location:list.php");