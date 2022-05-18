<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";

// POST Json

class AddOrderSubInfoRequestDataItemEXTSubsOrderItemsItemOrderDetail {
    public $Status; // string 默认传 2
    public $SwanSchema; // string 售后订单跳转地址，用以小程序跳转 Scheme
}

class AddOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItem {
    public $Amount; // int64 退款金额（单位：分），即100为1元
    public $ID; // string 商品 ID
    public $Quantity; // int64 售后商品数量
}

class AddOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefund {
    public $Amount; // int64 退款总金额（单位：分），即100为1元。
    public $Product; // array of AddOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItem 售后商品列表
}

class AddOrderSubInfoRequestDataItemEXTSubsOrderItemsItem {
    public $CTime; // int64 创建时间（单位：秒）
    public $MTime; // int64 修改时间（单位：秒）
    public $OrderDetail; // AddOrderSubInfoRequestDataItemEXTSubsOrderItemsItemOrderDetail 跳转到这个订单的详情结构，详见 Data.Ext.SubsOrder.Item.OrderDetail
    public $OrderType; // int64 退款类型，1(仅退款)，2(换货)，3(退款+退货)。
    public $Refund; // AddOrderSubInfoRequestDataItemEXTSubsOrderItemsItemRefund 售后订单商品信息，详见 Data.Ext.SubsOrder.Item.Refund
    public $SubOrderID; // string 售后订单 ID
    public $SubStatus; // int64 售后订单状态，同 Data.Ext.SubsOrder.Status 退换货枚举值一致
}

class AddOrderSubInfoRequestDataItemEXTSubsOrder {
    public $Items; // array of AddOrderSubInfoRequestDataItemEXTSubsOrderItemsItem 售后订单列表
    public $Status; // int64 所有售后订单的状态汇总最终状态，详见 Data.Ext.SubsOrder.Status 退换货枚举值
}

class AddOrderSubInfoRequestDataItemEXT {
    public $SubsOrder; // AddOrderSubInfoRequestDataItemEXTSubsOrder 子订单信息（退款、售后订单）
}

class AddOrderSubInfoRequestDataItem {
    public $BizAPPID; // string 小程序 AppKey
    public $CateID; // int64 订单种类：1（实物）、2（虚拟物品）、5（快递服务类）、6（快递服务类无金额订单）、10（上门服务类）、11（上门服务类无金额订单）、15（酒店类）、20（票务类）、25（打车类）、26（打车类无金额订单）
    public $EXT; // AddOrderSubInfoRequestDataItemEXT 扩展信息
    public $ResourceID; // string 开发者接入的唯一订单 ID
}



class AddOrderSubInfoRequest {
    public $accessToken; // string 接口调用凭证
    public $openId; // string 用户 openId
    public $sceneId; // string 百度收银台分配的平台订单 ID，通知支付状态接口返回的 orderId 
    public $sceneType; // int64 支付场景类型，开发者请默认传 2 
    public $pmAppKey; // string 调起百度收银台的支付服务 appKey
    public $data; // array of AddOrderSubInfoRequestDataItem 请求数据
}

/**
 *  array doRequest ($params)
 */
class AddOrderSubInfo{
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
        $client->setPath("/rest/2.0/smartapp/ordercenter/app/append/sub/info");
        $client->setContentType("application/json");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addGetParam("open_id", $params->openId, true);
        $client->addGetParam("scene_id", $params->sceneId, true);
        $client->addGetParam("scene_type", $params->sceneType, true);
        $client->addGetParam("pm_app_key", $params->pmAppKey, true);
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
