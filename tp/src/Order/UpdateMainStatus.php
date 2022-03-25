<?php
namespace BaiduSmartapp\OpenapiClient\Order;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";

// POST Json

class UpdateMainStatusRequestDataItem {
    public $BizAPPID; // string 应用小程序Key
    public $CateID; // int64 2:订单种类-虚拟物品
    public $ResourceID; // string 开发者接入的唯一订单ID
    public $Status; // int64 200:订单状态-已完成交易
}



class UpdateMainStatusRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $openId; // string 用户 openId
    public $sceneId; // string 百度收银台分配的平台订单 ID ，通知支付状态接口返回的 orderId
    public $sceneType; // int64 支付场景类型，开发者请默认传 2
    public $data; // array of UpdateMainStatusRequestDataItem 
}

/**
 *  array doRequest ($params)
 */
class UpdateMainStatus{
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
        $client->setPath("/rest/2.0/smartapp/ordercenter/update/main/status");
        $client->setContentType("application/json");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addGetParam("open_id", $params->openId, true);
        $client->addGetParam("scene_id", $params->sceneId, true);
        $client->addGetParam("scene_type", $params->sceneType, true);
        $postData = array(
            "Data" =>  $params->data,
        );
        $client->setPostData($postData);

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
