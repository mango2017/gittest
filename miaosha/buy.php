<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/12
 * Time: 22:47
 */
include 'db.php';
$sql = "select * from product where id=1";
$stmt = $mod->query($sql);
$res = $stmt->fetch();

if($res['store'] > 0){
    //记录下日志
    //增加个积分
    //生成订单数据
    //用户交了钱
    sleep(1);
    $sql = "update product set store = store-1 where id=1";
    if($mod->exec($sql)){
        echo "更新库存成功";
    }
    return;
}
echo "没有库存";