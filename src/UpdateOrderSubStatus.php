<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";


// POST Json

class UpdateOrderSubStatusRequestDataItemEXTSubsOrderItemsItem {
    public $SubOrderID; // string 售后订单 ID
    public $SubStatus; // int64 售后订单状态，同 Data.Ext.SubsOrder.Status 退换货枚举值一致

    function __construct() {
        $this->SubOrderID = "";
        $this->SubStatus = 0;
    }
}

class UpdateOrderSubStatusRequestDataItemEXTSubsOrder {
    public $Items; // array of UpdateOrderSubStatusRequestDataItemEXTSubsOrderItemsItem 售后订单列表
    public $Status; // int64 所有售后订单的状态汇总最终状态，详见 Data.Ext.SubsOrder.Status 退换货枚举值

    function __construct() {
        $this->Items = array();
        $this->Status = 0;
    }
}

class UpdateOrderSubStatusRequestDataItemEXT {
    public $SubsOrder; // UpdateOrderSubStatusRequestDataItemEXTSubsOrder 子订单信息（退款、售后订单）

    function __construct() {
        $this->SubsOrder = new UpdateOrderSubStatusRequestDataItemEXTSubsOrder();
    }
}

class UpdateOrderSubStatusRequestDataItem {
    public $BizAPPID; // string 小程序 AppKey
    public $CateID; // int64 订单种类：1（实物）、2（虚拟物品）、5（快递服务类）、6（快递服务类无金额订单）、10（上门服务类）、11（上门服务类无金额订单）、15（酒店类）、20（票务类）、25（打车类）、26（打车类无金额订单）
    public $EXT; // UpdateOrderSubStatusRequestDataItemEXT 扩展信息，详细结构见 Data.Ext
    public $ResourceID; // string 开发者接入的唯一订单 ID

    function __construct() {
        $this->BizAPPID = "";
        $this->CateID = 0;
        $this->EXT = new UpdateOrderSubStatusRequestDataItemEXT();
        $this->ResourceID = "";
    }
}



class UpdateOrderSubStatusRequest {
    public $accessToken; // string 接口调用凭证
    public $openId; // string 用户 openId
    public $sceneId; // string 百度收银台分配的平台订单 ID，通知支付状态接口返回的 orderId 
    public $sceneType; // int64 支付场景类型，开发者请默认传 2 
    public $pmAppKey; // string 调起百度收银台的支付服务 appKey
    public $data; // array of UpdateOrderSubStatusRequestDataItem 请求数据

    function __construct() {
        $this->accessToken = "";
        $this->openId = "";
        $this->sceneId = "";
        $this->sceneType = 0;
        $this->pmAppKey = "";
        $this->data = array();
    }
}

/**
 *  array doRequest ($params)
 */
class UpdateOrderSubStatus{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/ordercenter/app/update/sub/status");
        $client->setContentType("application/json");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("access_token", $params->accessToken);
        $client->addGetParam("open_id", $params->openId);
        $client->addGetParam("scene_id", $params->sceneId);
        $client->addGetParam("scene_type", $params->sceneType);
        $client->addGetParam("pm_app_key", $params->pmAppKey);
        $postData = array(
            "Data" =>  $params->data,
        );
        $client->setPostData($postData);

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