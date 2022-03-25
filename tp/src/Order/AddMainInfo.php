<?php
namespace BaiduSmartapp\OpenapiClient\Order;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";

// POST Json

class AddMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItem {
    public $Name; // string 名称
    public $Quantity; // int64 数量
    public $Value; // int64 优惠金额，单位分
}

class AddMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItem {
    public $Name; // string 展示名称
    public $Quantity; // int64 数量
    public $Value; // int64 付款金额，单位分
}

class AddMainInfoRequestDataItemEXTMainOrderPayment {
    public $Amount; // int64 合计金额，单位分
    public $IsPayment; // bool 是否支付
    public $Method; // int64 支付方式
    public $PaymentInfo; // array of AddMainInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItem 付款信息
    public $PreferentialInfo; // array of AddMainInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItem 优惠信息
    public $Time; // int64 付款时间，时间戳
}

class AddMainInfoRequestDataItemEXTMainOrderAppraise {
    public $Name; // string 
    public $Status; // int64 订单评价跳转
    public $SwanSchema; // string 
}

class AddMainInfoRequestDataItemEXTMainOrderOrderDetail {
    public $Name; // string 
    public $Status; // int64 
    public $SwanSchema; // string 
}

class AddMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItem {
    public $Name; // string 
    public $Value; // string 
}

class AddMainInfoRequestDataItemEXTMainOrderProductsItem {
    public $Desc; // string 商品详情
    public $ID; // string 商品ID
    public $ImgList; // array of string 商品图片地址
    public $Name; // string 商品名称
    public $PayPrice; // int64 实付价格,单位分。
    public $Price; // int64 商品原价,单位分。
    public $Quantity; // int64 商品数量
    public $SkuAttr; // array of AddMainInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItem 商品SKU属性
}

class AddMainInfoRequestDataItemEXTMainOrder {
    public $Appraise; // AddMainInfoRequestDataItemEXTMainOrderAppraise 
    public $OrderDetail; // AddMainInfoRequestDataItemEXTMainOrderOrderDetail 订单详情跳转
    public $Payment; // AddMainInfoRequestDataItemEXTMainOrderPayment 支付信息
    public $Products; // array of AddMainInfoRequestDataItemEXTMainOrderProductsItem 商品信息
}

class AddMainInfoRequestDataItemEXTSubsOrderItemsItemOrderDetail {
    public $AndroidSchema; // string 
    public $IPhoneSchema; // string 
    public $Name; // string 
    public $Status; // int64 
    public $SwanSchema; // string 
}

class AddMainInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItem {
    public $Amount; // int64 应退金额,单位分
    public $ID; // string 商品ID
    public $Quantity; // int64 商品退款/商品退货 数量
}

class AddMainInfoRequestDataItemEXTSubsOrderItemsItemRefund {
    public $Amount; // int64 退款总金额
    public $Product; // array of AddMainInfoRequestDataItemEXTSubsOrderItemsItemRefundProductItem 退款/退货商品
}

class AddMainInfoRequestDataItemEXTSubsOrderItemsItem {
    public $CTime; // int64 售后订单创建时间,时间戳
    public $MTime; // int64 售后订单修改时间,时间戳
    public $OrderDetail; // AddMainInfoRequestDataItemEXTSubsOrderItemsItemOrderDetail 退款退货订单详情跳转
    public $OrderType; // int64 退款订单类型
    public $Refund; // AddMainInfoRequestDataItemEXTSubsOrderItemsItemRefund 商品 退款／退货 信息
    public $SubOrderID; // string 售后订单ID
    public $SubStatus; // int64 自订单状态,枚举参照 【退换货枚举值】
}

class AddMainInfoRequestDataItemEXTSubsOrder {
    public $Items; // array of AddMainInfoRequestDataItemEXTSubsOrderItemsItem 
    public $Status; // int64 
}

class AddMainInfoRequestDataItemEXT {
    public $MainOrder; // AddMainInfoRequestDataItemEXTMainOrder 订单信息
    public $SubsOrder; // AddMainInfoRequestDataItemEXTSubsOrder 售后订单信息，若该订单发生退款/售后，需新增同步其售后订单的售后信息状态
}

class AddMainInfoRequestDataItem {
    public $BizAPPID; // string 小程序AppKey
    public $CateID; // int64 1:订单种类-实物商品
    public $Ctime; // int64 订单创建时间
    public $EXT; // AddMainInfoRequestDataItemEXT 拓展字段
    public $Mtime; // int64 订单最后修改时间
    public $ResourceID; // string 开发者接入的唯一订单ID
    public $Status; // int64 200:订单状态-已完成交易
    public $Title; // string 订单名称
}



class AddMainInfoRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $openId; // string 用户 openId
    public $sceneId; // string 百度收银台分配的平台订单 ID ，通知支付状态接口返回的 orderId
    public $sceneType; // int64 支付场景类型，开发者请默认传 2
    public $data; // array of AddMainInfoRequestDataItem 
}

/**
 *  array doRequest ($params)
 */
class AddMainInfo{
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
        $client->setPath("/rest/2.0/smartapp/ordercenter/add/main/info");
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
