<?php
namespace BaiduSmartapp\OpenapiClient\Order;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";

// POST Json

class UpdateMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItem {
    public $Name; // string 
    public $Value; // string 
}

class UpdateMainInfoRequestDataItemEXTMainOrderProductsItem {
    public $Desc; // string 商品详情
    public $ID; // string 商品ID
    public $ImgList; // array of string 商品图片地址
    public $Name; // string 商品名称
    public $PayPrice; // int64 实付价格,单位分。
    public $Price; // int64 商品原价,单位分。
    public $Quantity; // int64 商品数量
    public $SkuAttr; // array of UpdateMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItem 商品SKU属性
}

class UpdateMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItem {
    public $Name; // string 展示名称
    public $Quantity; // int64 数量
    public $Value; // int64 付款金额，单位分
}

class UpdateMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItem {
    public $Name; // string 名称
    public $Quantity; // int64 数量
    public $Value; // int64 优惠金额，单位分
}

class UpdateMainInfoRequestDataItemEXTMainOrderPayment {
    public $Amount; // int64 合计金额，单位分
    public $IsPayment; // bool 是否支付
    public $Method; // int64 支付方式
    public $PaymentInfo; // array of UpdateMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItem 付款信息
    public $PreferentialInfo; // array of UpdateMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItem 优惠信息
    public $Time; // int64 付款时间，时间戳
}

class UpdateMainInfoRequestDataItemEXTMainOrderAppraise {
    public $Name; // string 
    public $Status; // int64 
    public $SwanSchema; // string 
}

class UpdateMainInfoRequestDataItemEXTMainOrderOrderDetail {
    public $Name; // string 
    public $Status; // int64 
    public $SwanSchema; // string 
}

class UpdateMainInfoRequestDataItemEXTMainOrder {
    public $Appraise; // UpdateMainInfoRequestDataItemEXTMainOrderAppraise 订单评价跳转
    public $OrderDetail; // UpdateMainInfoRequestDataItemEXTMainOrderOrderDetail 订单详情跳转
    public $Payment; // UpdateMainInfoRequestDataItemEXTMainOrderPayment 支付信息
    public $Products; // array of UpdateMainInfoRequestDataItemEXTMainOrderProductsItem 商品信息
}

class UpdateMainInfoRequestDataItemEXT {
    public $MainOrder; // UpdateMainInfoRequestDataItemEXTMainOrder 订单信息
}

class UpdateMainInfoRequestDataItem {
    public $BizAPPID; // string 小程序的key
    public $CateID; // int64 2:订单种类-虚拟物品
    public $EXT; // UpdateMainInfoRequestDataItemEXT 拓展字段 此处以订单为例
    public $ResourceID; // string 开发者接入的唯一订单ID
    public $Status; // int64 200:订单状态-已完成交易
}



class UpdateMainInfoRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $openId; // string 用户 openId
    public $sceneId; // string 百度收银台分配的平台订单 ID ，通知支付状态接口返回的 orderId
    public $sceneType; // int64 支付场景类型，开发者请默认传 2
    public $data; // array of UpdateMainInfoRequestDataItem 
}

/**
 *  array doRequest ($params)
 */
class UpdateMainInfo{
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
        $client->setPath("/rest/2.0/smartapp/ordercenter/update/main/info");
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
