<?php
namespace BaiduSmartapp\OpenapiClient\MobileAuth;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class ApplyMobileAuthRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $reason; // int64 申请原因（ 0："用于登录"；1 ："收货联系方式"；2 ："其他"）
    public $usedScene; // int64 使用场景（ 0："网络购物"1 ："账号下信息内容同步"；2 ："票务预订"；3 ："业务办理"；4 ："信息查询（如社保、公积金查询"；5 ：预约"）
    public $sceneDesc; // string 使用场景描述
    public $sceneDemo; // string 使用场景 demo （场景实例图片）
}

/**
 *  array doRequest ($params)
 */
class ApplyMobileAuth{
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
        $client->setPath("/rest/2.0/smartapp/app/apply/mobileauth");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("reason",  $params->reason, true);
        $client->addPostParam("used_scene",  $params->usedScene, true);
        $client->addPostParam("scene_desc",  $params->sceneDesc, true);
        $client->addPostParam("scene_demo",  $params->sceneDemo, true);

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
