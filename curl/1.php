<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/18
 * Time: 21:25
 * http://localhost:100/gittest/curl/1.php
 */
$curl = curl_init("http://www.baidu.com");//初始化curl
curl_exec($curl);
curl_close($curl);