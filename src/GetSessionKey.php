<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";



class GetSessionKeyRequest {
    public $code; // string 通过 swan.getLoginCode 获取 Authorization Code 特殊说明：code 中有 @ 符号时，会请求对应的开源宿主，用户身份校验及 SessionKey 生成过程由开源宿主实现
    public $clientId; // string 智能小程序的 AppKey
    public $sk; // string 智能小程序的 AppSecret

    function __construct() {
        $this->code = "";
        $this->clientId = "";
        $this->sk = "";
    }
}

/**
 *  array doRequest ($params)
 */
class GetSessionKey{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("GET");
        $client->setHost(SPAPIHOST);
        $client->setPath("/oauth/jscode2sessionkey");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("code", $params->code);
        $client->addGetParam("client_id", $params->clientId);
        $client->addGetParam("sk", $params->sk);

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