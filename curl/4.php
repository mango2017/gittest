<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/18
 * Time: 22:51
 * 实例描述：从ftp服务器下载一个文件到本地
 */

$curl = curl_init();
curl_setopt($curl,CURLOPT_URL,"ftp://192.168.3.7/ftpsc/1.txt");
curl_setopt($curl,CURLOPT_HEADER,0);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
curl_setopt($curl,CURLOPT_TIMEOUT,300);
curl_setopt($curl,CURLOPT_USERPWD,"jly:123456");
$outfile = fopen("dest.txt","wb");
curl_setopt($curl,CURLOPT_FILE,$outfile);
$rtn = curl_exec($curl);
fclose($outfile);
if(!curl_errno($curl)){
    echo "return:".$rtn;
}else{
    echo "curl error:".curl_error($curl);
}