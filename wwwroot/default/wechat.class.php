<?php
/**
 * @Author: Marte
 * @Date:   2017-07-18 20:37:11
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-18 21:06:45
 */
class Wechat {
    protected function get_token(){
        $appid = 'wxb0588db1d4a0ea7a';
        $appsecret = '98dba9a01801d7c44463a47105fb393d';
        $url ="https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid={$appid}&secret=$appsecret";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $output = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($output);
        $access_token = $json->access_token;
        return $access_token;
}
    protected function http_request($url,$data=null){
        $ch = curl_init();
         curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
        curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
        if(!empty($data)){
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
    };
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
 }
}