<?php
namespace app\index\controller;

use think\console\command\make\Controller;

define("TOKEN", "xiaohei");

class Index extends Controller
{
    public function index(){
        if(!isset($_GET['echostr'])){
            $this->responseMsg();
        }else{
            $this->valid();
        }
    }

    //响应
    public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);

            switch ($postObj->MsgType)
            {
                case "event":
                    $result = $this->receiveEvent($postObj);
                    break;
                default:
                    $result = "unknown msg type: ";
                    break;
            }
            echo $result;
        }else {
            echo "";
            exit;
        }
    }
}
