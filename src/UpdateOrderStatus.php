<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";


// POST Json

class UpdateOrderStatusRequestDataItem {
    public $BizAPPID; // string 小程序 AppKey
    public $CateID; // int64 订单种类：1（实物）、2（虚拟物品）、5（快递服务类）、6（快递服务类无金额订单）、10（上门服务类）、11（上门服务类无金额订单）、15（酒店类）、20（票务类）、25（打车类）、26（打车类无金额订单）
    public $ResourceID; // string 开发者接入的唯一订单 ID
    public $Status; // int64 订单状态，其值根据CateID不同有不同的定义。CateID = 1 实物订单、CateID = 2 虚拟物品订单、CateID = 5 快递服务类订单、CateID = 6 快递服务类无金额订单、CateID = 10 上门服务类订单、CateID = 11 上门服务类无金额订单、CateID = 15 酒店类订单、CateID = 20 出行票务类订单、CateID = 25 打车类订单、CateID = 26 打车类无金额订单

    function __construct() {
        $this->BizAPPID = "";
        $this->CateID = 0;
        $this->ResourceID = "";
        $this->Status = 0;
    }
}



class UpdateOrderStatusRequest {
    public $accessToken; // string 接口调用凭证
    public $openId; // string 用户 openId
    public $sceneId; // string 百度收银台分配的平台订单 ID，通知支付状态接口返回的 orderId 
    public $sceneType; // int64 支付场景类型，开发者请默认传 2 
    public $pmAppKey; // string 调起百度收银台的支付服务 appKey
    public $data; // array of UpdateOrderStatusRequestDataItem 请求数据

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
class UpdateOrderStatus{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/ordercenter/app/update/main/status");
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