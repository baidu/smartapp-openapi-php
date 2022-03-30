<?php
namespace BaiduSmartapp\OpenapiClient\TP\Order;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";

// POST Json

class UpdateSubInfoRequestDataItemEXTSubsOrderItemsItemOrderDetail {
    public $AndroidSchema; // string 
    public $H5Schema; // string 
    public $IPhoneSchema; // string 
    public $Name; // string 
    public $Status; // int64 
    public $SwanSchema; // string 
}

class UpdateSubInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItem {
    public $Amount; // int64 
    public $ID; // string 
    public $Quantity; // int64 
}

class UpdateSubInfoRequestDataItemEXTSubsOrderItemsItemRefund {
    public $Amount; // int64 
    public $Product; // array of UpdateSubInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItem 
}

class UpdateSubInfoRequestDataItemEXTSubsOrderItemsItem {
    public $CTime; // int64 
    public $MTime; // int64 
    public $OrderDetail; // UpdateSubInfoRequestDataItemEXTSubsOrderItemsItemOrderDetail 
    public $OrderType; // int64 
    public $Refund; // UpdateSubInfoRequestDataItemEXTSubsOrderItemsItemRefund 
    public $SubOrderID; // string 
    public $SubStatus; // int64 
}

class UpdateSubInfoRequestDataItemEXTSubsOrder {
    public $Items; // array of UpdateSubInfoRequestDataItemEXTSubsOrderItemsItem 
    public $Status; // int64 
}

class UpdateSubInfoRequestDataItemEXT {
    public $SubsOrder; // UpdateSubInfoRequestDataItemEXTSubsOrder 
}

class UpdateSubInfoRequestDataItem {
    public $BizAPPID; // string 
    public $CateID; // int64 
    public $EXT; // UpdateSubInfoRequestDataItemEXT 
    public $ResourceID; // string 
}



class UpdateSubInfoRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $openId; // string 用户openId
    public $sceneId; // string 百度收银台分配的平台订单ID，通知支付状态接口返回的orderId
    public $sceneType; // int64 支付场景类型，开发者请默认传2
    public $data; // array of UpdateSubInfoRequestDataItem 
}

/**
 *  array doRequest ($params)
 */
class UpdateSubInfo{
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
        $client->setPath("/rest/2.0/smartapp/ordercenter/update/sub/info");
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
