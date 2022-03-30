<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";


class GetAccessTokenRequest {
    public $grantType; // string 固定为：client_credentials
    public $clientId; // string 智能小程序的 App Key，可在「开发者平台 - 设置 - 开发设置」页中获得。（要先在开发者平台创建小程序）
    public $clientSecret; // string 智能小程序的 App Secret，请妥善保存，如丢失可在「开发者平台 - 设置 - 开发设置」页面重置后获得，重置后 App Secret 将会被更新。
    public $scope; // string 固定为：smartapp_snsapi_base
}

/**
 *  array doRequest ($params)
 */
class GetAccessToken{
    private $data;
    private $errMsg;
    private $response;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("GET");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/oauth/2.0/token");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("grant_type", $params->grantType, true);
        $client->addGetParam("client_id", $params->clientId, true);
        $client->addGetParam("client_secret", $params->clientSecret, true);
        $client->addGetParam("scope", $params->scope, true);

        $this->response = $client->execute();
        if ($this->response['status_code'] < 200 || $this->response['status_code'] >=300) {
            $this->errMsg = sprintf("error response body [%s]", json_encode($this->response));
            return false;
        }
        if ($this->response['body'] != false){
            $resBody = json_decode($this->response['body'], true);
            if (isset($resBody['access_token']) && $resBody['access_token'] != "") {
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
