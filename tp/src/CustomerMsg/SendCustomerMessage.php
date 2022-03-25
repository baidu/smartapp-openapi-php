<?php
namespace BaiduSmartapp\OpenapiClient\CustomerMsg;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class SendCustomerMessageRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $userType; // int64 1:游客登录 2:百度账号登录
    public $openId; // string 用户的 OpenID
    public $msgType; // string 消息类型 text:文本格式 image:图片链接
    public $content; // string 文本消息内容，msg_type ="text" 时必填
    public $picUrl; // string 图片消息，msg_type ="image" 时必填
}

/**
 *  array doRequest ($params)
 */
class SendCustomerMessage{
    private $data;
    private $errMsg;
    private $response;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/message/custom/sendbytp");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("user_type",  $params->userType, true);
        $client->addPostParam("open_id",  $params->openId, true);
        $client->addPostParam("msg_type",  $params->msgType, true);
        $client->addPostParam("content",  $params->content, true);
        $client->addPostParam("pic_url",  $params->picUrl, true);

        $this->response = $client->execute();
        if ($this->response['status_code'] < 200 || $this->response['status_code'] >=300) {
            $this->errMsg = sprintf("error response body [%s]", json_encode($this->response));
            return false;
        }
        if ($this->response['body'] != false){
            $resBody = json_decode($this->response['body'], true);
            if (isset($resBody['errno']) && $resBody['errno'] === 0) {
                isset($resBody['data']) && $this->data = $resBody['data'];
                $this->errMsg = sprintf("error response [%s]", $this->response['body']);
                return true;
            }
            $this->errMsg = sprintf("error response [%s]", $this->response['body']);
            return false;
        }
        $this->errMsg = sprintf("error response body [%s]", json_encode($this->response));
        return false;
    }

    public function getErrMsg(){
        return $this->errMsg;
    }

    public function getData(){
        return $this->data;
    }

    public function getResponse() {
        return $this->response;
    }
}
