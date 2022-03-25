<?php
namespace BaiduSmartapp\OpenapiClient\Order;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";

// POST Json

class UpdateSubStatusRequestDataItemEXTSubsOrderItemsItem {
    public $SubOrderID; // string 售后订单ID
    public $SubStatus; // int64 自订单状态,枚举参照 【退换货枚举值】
}

class UpdateSubStatusRequestDataItemEXTSubsOrder {
    public $Items; // array of UpdateSubStatusRequestDataItemEXTSubsOrderItemsItem 
    public $Status; // int64 
}

class UpdateSubStatusRequestDataItemEXT {
    public $SubsOrder; // UpdateSubStatusRequestDataItemEXTSubsOrder 售后订单信息
}

class UpdateSubStatusRequestDataItem {
    public $BizAPPID; // string 小程序的appKey
    public $CateID; // int64 2:订单种类-虚拟物品
    public $EXT; // UpdateSubStatusRequestDataItemEXT 拓展字段 根据资产的不同其结构也不固定 此处以订单为例
    public $ResourceID; // string 开发者接入的唯一订单ID
}



class UpdateSubStatusRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $openId; // string 用户openId
    public $sceneId; // string 百度收银台分配的平台订单ID，通知支付状态接口返回的orderId
    public $sceneType; // int64 支付场景类型，开发者请默认传2
    public $data; // array of UpdateSubStatusRequestDataItem 
}

/**
 *  array doRequest ($params)
 */
class UpdateSubStatus{
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
        $client->setPath("/rest/2.0/smartapp/ordercenter/update/sub/status");
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
