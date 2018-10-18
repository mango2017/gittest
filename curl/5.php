<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/18
 * Time: 22:51
 * 实例描述：从ftp服务器下载一个文件到本地
 */

$curl = curl_init();
$localfile='dest.txt';
$fp = fopen($localfile,'r');
curl_setopt($curl,CURLOPT_URL,"ftp://192.168.3.7/ftpxz/2.txt");
curl_setopt($curl,CURLOPT_HEADER,0);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_TIMEOUT,300);
curl_setopt($curl,CURLOPT_USERPWD,"jly:123456");

curl_setopt($curl,CURLOPT_UPLOAD,1);
curl_setopt($curl,CURLOPT_INFILE,$fp);
curl_setopt($curl,CURLOPT_INFILESIZE,filesize($localfile));
$rtn = curl_exec($curl);
fclose($fp);


if(!curl_errno($curl)){
    echo "return:".$rtn;
}else{
    echo "curl error:".curl_error($curl);
}