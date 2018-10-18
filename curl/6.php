<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/18
 * Time: 23:18
 * 下载网络上面的一个https的资源
 */
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,"https://www.imooc.com/static/moco/v1.0/dist/css/moco.min.css?v=201810121839");//设置访问网页的url
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);//执行之后不直接打印出来
date_default_timezone_set('PRC');
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,0);
$output = curl_exec($curl);//执行
curl_close($curl);
ECHO $output;