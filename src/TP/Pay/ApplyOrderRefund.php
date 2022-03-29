<?php
namespace BaiduSmartapp\OpenapiClient\TP\Pay;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class ApplyOrderRefundRequest {
    public $accessToken; // string 第三方平台的接口调用凭据
    public $applyRefundMoney; // int64 退款金额（单位：分），该字段最大不能超过支付回调中的总金额（totalMoney）1.如不填金额时，默认整单发起退款2.含有百度平台营销的订单，目前只支持整单发起退款，不支持部分多次退款
    public $bizRefundBatchId; // string 开发者退款批次
    public $isSkipAudit; // int64 是否跳过审核，不需要百度请求开发者退款审核请传 1，默认为0； 0：不跳过开发者业务方审核；1：跳过开发者业务方审核。若不跳过审核，请对接请求业务方退款审核接口
    public $orderId; // int64 百度收银台订单 ID
    public $refundReason; // string 退款原因
    public $refundType; // int64 退款类型 1：用户发起退款；2：开发者业务方客服退款；3：开发者服务异常退款。
    public $tpOrderId; // string 开发者订单 ID
    public $userId; // int64 百度收银台用户 ID
    public $refundNotifyUrl; // string 退款通知 url ，不传时默认为在开发者后台配置的 url
    public $pmAppKey; // string 调起百度收银台的支付服务 appKey	
}

/**
 *  array doRequest ($params)
 */
class ApplyOrderRefund{
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
        $client->setPath("/rest/2.0/smartapp/pay/paymentservice/tp/applyOrderRefund");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("applyRefundMoney",  $params->applyRefundMoney, false);
        $client->addPostParam("bizRefundBatchId",  $params->bizRefundBatchId, true);
        $client->addPostParam("isSkipAudit",  $params->isSkipAudit, true);
        $client->addPostParam("orderId",  $params->orderId, true);
        $client->addPostParam("refundReason",  $params->refundReason, true);
        $client->addPostParam("refundType",  $params->refundType, true);
        $client->addPostParam("tpOrderId",  $params->tpOrderId, true);
        $client->addPostParam("userId",  $params->userId, true);
        $client->addPostParam("refundNotifyUrl",  $params->refundNotifyUrl, false);
        $client->addPostParam("pmAppKey",  $params->pmAppKey, true);

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
