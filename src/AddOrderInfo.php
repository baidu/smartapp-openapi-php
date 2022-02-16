<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";


// POST Json

class AddOrderInfoRequestDataItemEXTMainOrderOrderDetail {
    public $Status; // int64 默认传 2
    public $SwanSchema; // string 订单详情页的跳转地址，用以小程序跳转 Scheme 

    function __construct() {
        $this->Status = 0;
        $this->SwanSchema = "";
    }
}

class AddOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPage {
    public $Status; // string 默认传 2
    public $SwanSchema; // string 商品详情页的跳转地址，用以小程序跳转 Scheme 

    function __construct() {
        $this->Status = "";
        $this->SwanSchema = "";
    }
}

class AddOrderInfoRequestDataItemEXTMainOrderProductsItemSkuAttrItem {
    public $Name; // string 规格名称，例如“颜色”或“尺寸”
    public $Value; // string 规格值

    function __construct() {
        $this->Name = "";
        $this->Value = "";
    }
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

    function __construct() {
        $this->Desc = "";
        $this->DetailPage = new AddOrderInfoRequestDataItemEXTMainOrderProductsItemDetailPage();
        $this->ID = "";
        $this->ImgList = array();
        $this->Name = "";
        $this->PayPrice = 0;
        $this->Price = 0;
        $this->Quantity = 0;
        $this->SkuAttr = array();
    }
}

class AddOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItem {
    public $Name; // string 展示名称
    public $Quantity; // int64 数量
    public $Value; // int64 合计金额（单位：分），即100为1元

    function __construct() {
        $this->Name = "";
        $this->Quantity = 0;
        $this->Value = 0;
    }
}

class AddOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItem {
    public $Name; // string 展示名称
    public $Quantity; // int64 数量
    public $Value; // int64 合计金额（单位：分），即100为1元

    function __construct() {
        $this->Name = "";
        $this->Quantity = 0;
        $this->Value = 0;
    }
}

class AddOrderInfoRequestDataItemEXTMainOrderPayment {
    public $Amount; // int64 实付金额（单位：分），即100为1元
    public $IsPayment; // bool 是否已付款
    public $Method; // int64 付款方式，1（在线付），2（货到付款）
    public $PaymentInfo; // array of AddOrderInfoRequestDataItemEXTMainOrderPaymentPaymentInfoItem 其他付款信息
    public $PreferentialInfo; // array of AddOrderInfoRequestDataItemEXTMainOrderPaymentPreferentialInfoItem 优惠券信息
    public $Time; // int64 付款时间（单位：秒）

    function __construct() {
        $this->Amount = 0;
        $this->IsPayment = false;
        $this->Method = 0;
        $this->PaymentInfo = array();
        $this->PreferentialInfo = array();
        $this->Time = 0;
    }
}

class AddOrderInfoRequestDataItemEXTMainOrderAppraise {
    public $Status; // int64 0（不可评价状态或已评价状态）、2（待评价状态，允许跳转)
    public $SwanSchema; // string 评价页的跳转地址，用以小程序跳转 Scheme 

    function __construct() {
        $this->Status = 0;
        $this->SwanSchema = "";
    }
}

class AddOrderInfoRequestDataItemEXTMainOrder {
    public $Appraise; // AddOrderInfoRequestDataItemEXTMainOrderAppraise 待评价状态订单的评价页结构，仅订单为可评价状态，且还未进行评价时提供该信息
    public $OrderDetail; // AddOrderInfoRequestDataItemEXTMainOrderOrderDetail 订单详情页的信息
    public $Payment; // AddOrderInfoRequestDataItemEXTMainOrderPayment 支付信息
    public $Products; // array of AddOrderInfoRequestDataItemEXTMainOrderProductsItem 数组，商品信息列表，若商品只有 1 个则数组长度为 1 

    function __construct() {
        $this->Appraise = new AddOrderInfoRequestDataItemEXTMainOrderAppraise();
        $this->OrderDetail = new AddOrderInfoRequestDataItemEXTMainOrderOrderDetail();
        $this->Payment = new AddOrderInfoRequestDataItemEXTMainOrderPayment();
        $this->Products = array();
    }
}

class AddOrderInfoRequestDataItemEXT {
    public $MainOrder; // AddOrderInfoRequestDataItemEXTMainOrder 主订单信息（购买商品订单）

    function __construct() {
        $this->MainOrder = new AddOrderInfoRequestDataItemEXTMainOrder();
    }
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

    function __construct() {
        $this->BizAPPID = "";
        $this->CateID = 0;
        $this->Ctime = 0;
        $this->EXT = new AddOrderInfoRequestDataItemEXT();
        $this->Mtime = 0;
        $this->ResourceID = "";
        $this->Status = 0;
        $this->Title = "";
    }
}



class AddOrderInfoRequest {
    public $accessToken; // string 接口调用凭证
    public $openId; // string 百度 App 已登录用户使用 openId 作为用户标识；未登录用户（无 openId 时）使用 swanId 作为用户标识
    public $swanId; // string 百度 App 已登录用户使用 openId 作为用户标识；未登录用户（无 openId 时）使用 swanId 作为用户标识
    public $sceneId; // string 百度收银台分配的平台订单 ID，通知支付状态接口返回的 orderId 
    public $sceneType; // int64 支付场景类型，开发者请默认传 2 
    public $pmAppKey; // string 调起百度收银台的支付服务 appKey
    public $data; // array of AddOrderInfoRequestDataItem 请求数据

    function __construct() {
        $this->accessToken = "";
        $this->openId = "";
        $this->swanId = "";
        $this->sceneId = "";
        $this->sceneType = 0;
        $this->pmAppKey = "";
        $this->data = array();
    }
}

/**
 *  array doRequest ($params)
 */
class AddOrderInfo{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/ordercenter/app/add/main/info");
        $client->setContentType("application/json");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("access_token", $params->accessToken);
        $client->addGetParam("open_id", $params->openId);
        $client->addGetParam("swan_id", $params->swanId);
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