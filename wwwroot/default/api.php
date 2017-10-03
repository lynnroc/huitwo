<?php
header("content-type:text/html;charset=utf-8");
/**
  * wechat php test
  */
require 'common.php';
require 'wechat.class.php';
//define your token
define("TOKEN", "lynnroc");

class wechatCallbackapiTest extends Wechat
{
	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){

              	$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $fromUsername = $postObj->FromUserName;
                $toUsername = $postObj->ToUserName;
				$msgType = $postObj->MsgType;
                $keyword = trim($postObj->Content);
                $time = time();
                global $arr_msg;

              	switch($msgType){
					case 'text':
						if($keyword == '图文'){
                            $access_token = $this->get_token();
                            $url = "https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token={$access_token}";
						//$msgType = 'text';
						$content_arr1 = array('title'=>urlencode('使用的拍照方法'),
                            'url'=>'http://60.205.186.141/',
                            'picurl'=>'http://60.205.186.141/3.jpg');
                        $content_arr2 = array('title'=>urlencode('使用的拍照方法'),
                            'url'=>'http://60.205.186.141/',
                            'picurl'=>'http://60.205.186.141/3.jpg');
                        $content_arr = array($content_arr1,$content_arr2);

                        $content_arr = array('articles'=>$content_arr);
                        $reply_arr = array('touser'=>"{$fromUsername}",'msgtype'=>'news','news'=>$content_arr);
                        $json = json_encode($reply_arr);
                        file_put_contents('./2.log',$json);
                        $data = urldecode($json);
					   $this->http_request($url,$data);
					}else if($keyword == '图片'){
						$msgType = 'image';
						$mediaid = '8_59RE25Xi4O9bwje-V-0dW3RrP8XHpZX4zSGh_bVuGUULvAlqMYl7oc5k9mXK4m';
						$resultStr = sprintf($arr_msg['image'], $fromUsername, $toUsername, $time, $msgType, $mediaid);
                	echo $resultStr;
					}elseif($keyword == '音乐'){
						$msgType = 'music';
						$title = '悟空传';
						$desc = '戴荃的成功之作';
						$musicurl = 'http://60.205.186.141/wukong.mp3';
						$hqmusicurl = 'http://60.205.186.141/wukong.mp3';
						$resultStr = sprintf($arr_msg['music'], $fromUsername, $toUsername, $time, $msgType, $title, $desc,$musicurl,$hqmusicurl);
                	echo $resultStr;
					}else if($keyword == '多图文'){
						$msgType = 'news';
						$count = '2';
						$str = '<item>
								<Title><![CDATA[为何邻居的母猪频频失踪?]]></Title>
								<Description><![CDATA[是道德的沦丧,还是亲情的缺失?]]></Description>
								<PicUrl><![CDATA[%s]]></PicUrl>
								<Url><![CDATA[www.baidu.com]]></Url>
								</item>
								<item>
								<Title><![CDATA[十种让人爱不释手的水果]]></Title>
								<Description><![CDATA[今天让小编来介绍十种老百姓最喜欢的热带水果,它们分别是....]]></Description>
								<PicUrl><![CDATA[%s]]></PicUrl>
								<Url><![CDATA[www.baidu.com]]></Url>
								</item>';
						$resultStr = sprintf($arr_msg['news'], $fromUsername, $toUsername, $time, $msgType, $count,$str);
                	echo $resultStr;
					};
					break;
					case 'image':
						$msgType = 'text';
						//$mediaId = '0CnqdsnKQZdy0gQ5cT_DxUMh6zB3dM0K4A8mjkqRq_CA4LIyV-TPFjZa7xn6hQFh';
						$contentStr = '你输入的是图片信息';
						$resultStr = sprintf($arr_msg['text'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
					break;
					case 'voice':
						$msgType = 'text';
                        $rec=$postObj->Recognition;
						$contentStr = "你输入的是语音信息为:{$rec}";
						$resultStr = sprintf($arr_msg['text'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
					break;
					case 'video':
						$msgType = 'text';
						$contentStr = '你输入的是视频信息';
						$resultStr = sprintf($arr_msg['text'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
					break;
					case 'location':
						$msgType = 'text';
                        $longitude = $postObj->Location_Y;
                        $latitude = $postObj->Location_X;
						$contentStr = "你的经度是:{$longitude},\n你的维度是:{$latitude}";
						$resultStr = sprintf($arr_msg['text'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
					break;
					case 'link':
						$msgType = 'text';
						$contentStr = '你输入的是链接信息';
						$resultStr = sprintf($arr_msg['text'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;
					break;
					case 'event':
						if($postObj->Event =='subscribe'){
					$msgType = 'text';
						$contentStr = '感谢您的关注!';
						$resultStr = sprintf($arr_msg['text'], $fromUsername, $toUsername, $time, $msgType, $contentStr);
                	echo $resultStr;}elseif($postObj->Event=='CLICK' && $postObj->EventKey=='V1001_TODAY_MUSIC') {
                        $msgType = 'music';
                        $title = '悟空传';
                        $desc = '戴荃的成功之作';
                        $musicurl = 'http://60.205.186.141/wukong.mp3';
                        $hqmusicurl = 'http://60.205.186.141/wukong.mp3';
                        $resultStr = sprintf($arr_msg['music'], $fromUsername, $toUsername, $time, $msgType, $title, $desc,$musicurl,$hqmusicurl);
                        echo $resultStr;
                    };
					break;
				}
        }else {
        	echo "";
        	exit;
        }
    }

	private function checkSignature()
	{
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];

		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );

		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}
$wechatObj = new wechatCallbackapiTest();
//$wechatObj->valid();
$wechatObj->responseMsg();
?>