<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";



class GetAccessTokenRequest {
    public $grantType; // string 固定为：client_credentials
    public $clientId; // string 智能小程序的 App Key，可在「开发者平台 - 设置 - 开发设置」页中获得。（要先在开发者平台创建小程序）
    public $clientSecret; // string 智能小程序的 App Secret，请妥善保存，如丢失可在「开发者平台 - 设置 - 开发设置」页面重置后获得，重置后 App Secret 将会被更新。
    public $scope; // string 固定为：smartapp_snsapi_base

    function __construct() {
        $this->grantType = "";
        $this->clientId = "";
        $this->clientSecret = "";
        $this->scope = "";
    }
}

/**
 *  array doRequest ($params)
 */
class GetAccessToken{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("GET");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/oauth/2.0/token");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("grant_type", $params->grantType);
        $client->addGetParam("client_id", $params->clientId);
        $client->addGetParam("client_secret", $params->clientSecret);
        $client->addGetParam("scope", $params->scope);

        $res = $client->execute();
        if ($res['status_code'] < 200 || $res['status_code'] >=300) {
            $this->errMsg = sprintf("error response body [%s]", json_encode($res));
            return false;
        }
        if ($res['body'] != false){
            $resBody = json_decode($res['body'], true);
            if (isset($resBody['access_token']) && $resBody['access_token'] != "") {
                $this->data = $resBody;
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