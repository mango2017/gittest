<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/16
 * Time: 21:17
 * 怎么在PHP 中解析url 并得到url参数
 */
header("Content-type: text/html; charset=utf-8");
class A{
    //拿到一个完整url后，如何解析该url得到里面的参数。
    function convertUrlQuery($query){
        $queryParts = explode( "&",$query);
        $params = array();
        foreach ($queryParts as $param){
            $item = explode("=",$param);
            $params[$item[0]] = $item[1];
        }
        return $params;
    }
    //如何把一个数组拼接成url传递
    function getUrlQuery($array_query){
//        var_dump($array_query);
        $tmp = array();
        foreach($array_query as $k=>$param){
            $tmp[] = $k."=".$param;
        }
        var_dump($tmp);
        $params = implode('&amp;', $tmp);
        return $params;

    }
}
$a = new A();
$url = "http://www.test.com/link?param1=1&param2=2&param3=3";
$param_arr = $a->convertUrlQuery($url);
//var_dump($param_arr);
$param_str = $a->getUrlQuery($param_arr);
echo $param_str;


