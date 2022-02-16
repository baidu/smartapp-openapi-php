<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";



class CustomSendRequest {
    public $accessToken; // string 接口调用凭证
    public $userType; // int64 1:游客登录 2:百度账号登录
    public $openId; // string 用户的 OpenID
    public $msgType; // string 消息类型 text:文本格式 image:图片链接
    public $content; // string 文本消息内容，msg_type ="text" 时必填
    public $picUrl; // string 图片消息，msg_type ="image" 时必填

    function __construct() {
        $this->accessToken = "";
        $this->userType = 0;
        $this->openId = "";
        $this->msgType = "";
        $this->content = "";
        $this->picUrl = "";
    }
}

/**
 *  array doRequest ($params)
 */
class CustomSend{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/message/custom/send");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("access_token", $params->accessToken);
        $client->addPostParam("user_type",  $params->userType);
        $client->addPostParam("open_id",  $params->openId);
        $client->addPostParam("msg_type",  $params->msgType);
        $client->addPostParam("content",  $params->content);
        $client->addPostParam("pic_url",  $params->picUrl);

        $res = $client->execute();
        if ($res['status_code'] < 200 || $res['status_code'] >=300) {
            $this->errMsg = sprintf("error response body [%s]", json_encode($res));
            return false;
        }
        if ($res['body'] != false){
            $resBody = json_decode($res['body'], true);
            if (isset($resBody['errno']) && $resBody['errno'] === 0) {
                $this->data = $resBody['data'];
                $this->errMsg = sprintf("error response [%s]", $res['body']);
                return true;
            }
            $this->errMsg = sprintf("error response [%s]", $res['body']);
            return false;
        }
        $this->errMsg = sprintf("error response body [%s]", json_encode($res));
        return false;
    }

    public function getErrMsg(){
        return $this->errMsg;
    }

    public function getData(){
        return $this->data;
    }
}