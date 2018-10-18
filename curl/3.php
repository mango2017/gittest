<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/18
 * Time: 21:43
 * 实例描述：通过调用webservice查询北京的当前天气
 */

$data = "startCity=沈阳&lastCity=上海&theDate=2018-10-25&userID=";
$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,"http://ws.webxml.com.cn/webservices/DomesticAirline.asmx/getDomesticAirlinesTime");
curl_setopt($curl,CURLOPT_HEADER,0);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_POST,1);
curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
curl_setopt($curl,CURLOPT_HTTPHEADER,array(
    "Content-Type: application/x-www-form-urlencoded",
    "Content-Length: ".strlen($data)
));
$rtn = curl_exec($curl);
if(!curl_errno($curl)){
    echo $rtn;
}else{
    echo "curl error:".curl_error($curl);
}

