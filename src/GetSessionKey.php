<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";


class GetSessionKeyRequest {
    public $code; // string 通过 swan.getLoginCode 获取 Authorization Code 特殊说明：code 中有 @ 符号时，会请求对应的开源宿主，用户身份校验及 SessionKey 生成过程由开源宿主实现
    public $clientId; // string 智能小程序的 AppKey
    public $sk; // string 智能小程序的 AppSecret
}

/**
 *  array doRequest ($params)
 */
class GetSessionKey{
    private $data;
    private $errMsg;
    private $response;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("GET");
        $client->setHost(SPAPIHOST);
        $client->setPath("/oauth/jscode2sessionkey");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("code", $params->code, true);
        $client->addGetParam("client_id", $params->clientId, true);
        $client->addGetParam("sk", $params->sk, true);

        $this->response = $client->execute();
        if ($this->response['status_code'] < 200 || $this->response['status_code'] >=300) {
            $this->errMsg = sprintf("error response body [%s]", json_encode($this->response));
            return false;
        }
        if ($this->response['body'] != false){
            $resBody = json_decode($this->response['body'], true);
            if (!isset($resBody['error']) && !isset($resBody['errno'])) {
                $this->data = $resBody;
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
