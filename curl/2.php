<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/18
 * Time: 21:28
 * 实例描述：在网络上下载一个页面并把内容中的“百度”替换为“屌丝”之后输出
 *
 */
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,"http://www.baidu.com");//设置访问网页的url
curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);//执行之后不直接打印出来
$output = curl_exec($curl);//执行
curl_close($curl);
echo str_replace("百度","屌丝",$output);
echo $output;