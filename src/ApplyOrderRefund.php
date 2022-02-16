<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";



class ApplyOrderRefundRequest {
    public $accessToken; // string 接口调用凭证
    public $applyRefundMoney; // int64 退款金额（单位：分），该字段最大不能超过支付回调中的总金额（totalMoney）
    public $bizRefundBatchId; // string 开发者退款批次
    public $isSkipAudit; // int64 是否跳过审核，不需要百度请求开发者退款审核请传 1，默认为0
    public $orderId; // int64 百度收银台订单 ID
    public $refundReason; // string 退款原因
    public $refundType; // int64 退款类型 1：用户发起退款；2：开发者业务方客服退款；3：开发者服务异常退款。
    public $tpOrderId; // string 开发者订单 ID
    public $userId; // int64 百度收银台用户 ID
    public $refundNotifyUrl; // string 退款通知 url ，不传时默认为在开发者后台配置的 url
    public $pmAppKey; // string 调起百度收银台的支付服务 appKey

    function __construct() {
        $this->accessToken = "";
        $this->applyRefundMoney = 0;
        $this->bizRefundBatchId = "";
        $this->isSkipAudit = 0;
        $this->orderId = 0;
        $this->refundReason = "";
        $this->refundType = 0;
        $this->tpOrderId = "";
        $this->userId = 0;
        $this->refundNotifyUrl = "";
        $this->pmAppKey = "";
    }
}

/**
 *  array doRequest ($params)
 */
class ApplyOrderRefund{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/pay/paymentservice/applyOrderRefund");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("access_token", $params->accessToken);
        $client->addPostParam("applyRefundMoney",  $params->applyRefundMoney);
        $client->addPostParam("bizRefundBatchId",  $params->bizRefundBatchId);
        $client->addPostParam("isSkipAudit",  $params->isSkipAudit);
        $client->addPostParam("orderId",  $params->orderId);
        $client->addPostParam("refundReason",  $params->refundReason);
        $client->addPostParam("refundType",  $params->refundType);
        $client->addPostParam("tpOrderId",  $params->tpOrderId);
        $client->addPostParam("userId",  $params->userId);
        $client->addPostParam("refundNotifyUrl",  $params->refundNotifyUrl);
        $client->addPostParam("pmAppKey",  $params->pmAppKey);

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