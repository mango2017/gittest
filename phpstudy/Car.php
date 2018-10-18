<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/18
 * Time: 18:22
 */
class Car{
    use Gps,GpsChina{
        GpsChina::gps1 insteadof  Gps;
    }
    public function gps1(){
        echo "i can self function";
    }
    public function move(){
        echo "i can movesss";
    }
}