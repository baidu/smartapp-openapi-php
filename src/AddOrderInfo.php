<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";

// POST Json

class AddOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItem {
    public $Name; // string 展示名称
    public $Quantity; // int64 数量
    public $Value; // int64 合计金额（单位：分），即100为1元
}

class AddOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItem {
    public $Name; // string 展示名称
    public $Quantity; // int64 数量
    public $Value; // int64 合计金额（单位：分），即100为1元
}

class AddOrderInfoRequestDataItemEXTMainOrderPayment {
    public $Amount; // int64 实付金额（单位：分），即100为1元
    public $IsPayment; // bool 是否已付款
    public $Method; // int64 付款方式，1（在线付），2（货到付款）
    public $PaymentInfo; // array of AddOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItem 其他付款信息
    public $PreferentialInfo; // array of AddOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItem 优惠券信息
    public $Time; // int64 付款时间（单位：秒）
}

class AddOrderInfoRequestDataItemEXTMainOrderAppraise {
    public $Status; // int64 0（不可评价状态或已评价状态）、2（待评价状态，允许跳转)
    public $SwanSchema; // string 评价页的跳转地址，用以小程序跳转 Scheme 
}

class AddOrderInfoRequestDataItemEXTMainOrderOrderDetail {
    public $Status; // int64 默认传 2
    public $SwanSchema; // string 订单详情页的跳转地址，用以小程序跳转 Scheme 
}

class AddOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPage {
    public $Status; // string 默认传 2
    public $SwanSchema; // string 商品详情页的跳转地址，用以小程序跳转 Scheme 
}

class AddOrderInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItem {
    public $Name; // string 规格名称，例如“颜色”或“尺寸”
    public $Value; // string 规格值
}

class AddOrderInfoRequestDataItemEXTMainOrderProductsItem {
    public $Desc; // string 商品简述
    public $DetailPage; // AddOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPage 商品详情的跳转的跳转结构
    public $ID; // string 商品 ID ，开发者的唯一商品 ID
    public $ImgList; // array of string 商品预览，值为预览图 URL 地址，最多 5 张
    public $Name; // string 商品名字
    public $PayPrice; // int64 实付价（单位：分），即100代表1元
    public $Price; // int64 本商品原价（单位：分），即100代表1元
    public $Quantity; // int64 本商品的交易数量
    public $SkuAttr; // array of AddOrderInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItem 商品规格，最多 400 个
}

class AddOrderInfoRequestDataItemEXTMainOrder {
    public $Appraise; // AddOrderInfoRequestDataItemEXTMainOrderAppraise 待评价状态订单的评价页结构，仅订单为可评价状态，且还未进行评价时提供该信息
    public $OrderDetail; // AddOrderInfoRequestDataItemEXTMainOrderOrderDetail 订单详情页的信息
    public $Payment; // AddOrderInfoRequestDataItemEXTMainOrderPayment 支付信息
    public $Products; // array of AddOrderInfoRequestDataItemEXTMainOrderProductsItem 数组，商品信息列表，若商品只有 1 个则数组长度为 1 
}

class AddOrderInfoRequestDataItemEXT {
    public $MainOrder; // AddOrderInfoRequestDataItemEXTMainOrder 主订单信息（购买商品订单）
}

class AddOrderInfoRequestDataItem {
    public $BizAPPID; // string 小程序 AppKey
    public $CateID; // int64 订单种类：1（实物）、2（虚拟物品）、5（快递服务类）、6（快递服务类无金额订单）、10（上门服务类）、11（上门服务类无金额订单）、15（酒店类）、20（票务类）、25（打车类）、26（打车类无金额订单）
    public $Ctime; // int64 订单创建时间（单位：秒）
    public $EXT; // AddOrderInfoRequestDataItemEXT 扩展信息
    public $Mtime; // int64 订单最后被修改时间（单位：秒）
    public $ResourceID; // string 开发者接入的唯一订单 ID
    public $Status; // int64 订单状态，其值根据CateID不同有不同的定义。CateID = 1 实物订单、CateID = 2 虚拟物品订单、CateID = 5 快递服务类订单、CateID = 6 快递服务类无金额订单、CateID = 10 上门服务类订单、CateID = 11 上门服务类无金额订单、CateID = 15 酒店类订单、CateID = 20 出行票务类订单、CateID = 25 打车类订单、CateID = 26 打车类无金额订单
    public $Title; // string 订单标题，建议使用订单商品名称
}



class AddOrderInfoRequest {
    public $accessToken; // string 接口调用凭证
    public $openId; // string 百度 App 已登录用户使用 openId 作为用户标识；未登录用户（无 openId 时）使用 swanId 作为用户标识
    public $swanId; // string 百度 App 已登录用户使用 openId 作为用户标识；未登录用户（无 openId 时）使用 swanId 作为用户标识
    public $sceneId; // string 百度收银台分配的平台订单 ID，通知支付状态接口返回的 orderId 
    public $sceneType; // int64 支付场景类型，开发者请默认传 2 
    public $pmAppKey; // string 调起百度收银台的支付服务 appKey
    public $data; // array of AddOrderInfoRequestDataItem 请求数据
}

/**
 *  array doRequest ($params)
 */
class AddOrderInfo{
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
        $client->setPath("/rest/2.0/smartapp/ordercenter/app/add/main/info");
        $client->setContentType("application/json");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addGetParam("open_id", $params->openId, false);
        $client->addGetParam("swan_id", $params->swanId, false);
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
