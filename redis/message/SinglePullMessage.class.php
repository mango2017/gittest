<?php
/**
 * Created by PhpStorm.
 * User: MANGO
 * Date: 2018/10/13
 * Time: 20:40
 * http://www.php.cn/php-weizijiaocheng-359311.html
 */
class SinglePullMessage{
    private $redis='';
    public function __construct($host,$port=6379)
    {
        $this->redis = new Redis();
        $this->redis->connect($host,$port);
        $this->redis->auth("lampjly");
    }
    public function sendSingle($toUser,$messageArr){
        $json_message = json_encode($messageArr);
        return $this->redis->lPush($toUser,$json_message);
    }
    //获取新消息
    public function getNewMessage($user){
        $messageArr = array();
        while($json_message = $this->redis->rpoplpush($user,'preMessage_'.$user)){
            $temp  = json_decode($json_message);
            $messageArr[$temp->sender][] = $temp;
        }
        if($messageArr){
            $arr['count'] = count($messageArr);
            $arr['messageArr'] = $messageArr;
            return $arr;
        }
        return false;
    }

    //获取旧消息的同时，判断就消息是否过期，过期就删除
    public function getPreMessage($user){
        $messageArr = array();
        $json_pre = $this->redis->lrange('preMessage_'.$user,0,-1);
        foreach ($json_pre as $k=>$v){
            $temp = json_decode($v);
//            $timeout = $temp->time+60*60*24*7;
            $timeout = $temp->time+30;
            if($timeout < time() ){ //过期了
                if($k=0){
                    $this->redis->del('preMessage_'.$user);
                    break;
                }
                $this->redis->lTrim('preMessage_'.$user,0,$k);
                break;
            }
            //没过期
            $messageArr[$temp->sender][] = $temp;

        }
        return $messageArr;
    }


    public function dealArr($arr){
        foreach ($arr as $k=>$v){
            foreach($v as $k1=>$v2){
                echo "发送人:".$v2->sender." 发送时间：".date('Y-m-d H:i:s',$v2->time)."<br/>";
                echo "消息内容：".$v2->message.'<br/>';
            }
            echo "<hr/>";
        }
    }


}