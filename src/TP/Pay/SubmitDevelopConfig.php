<?php
namespace BaiduSmartapp\OpenapiClient\TP\Pay;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class SubmitDevelopConfigRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $tpPublicKey; // string 开发者公钥。参见RSA公私钥生成
    public $payNotifyUrl; // string 支付回调地址。
    public $refundAuditUrl; // string 退款审核地址。
    public $refundSuccUrl; // string 退款回调地址。
}

/**
 *  array doRequest ($params)
 */
class SubmitDevelopConfig{
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
        $client->setPath("/rest/2.0/smartapp/pay/developconfig/submit");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("tp_public_key",  $params->tpPublicKey, true);
        $client->addPostParam("pay_notify_url",  $params->payNotifyUrl, true);
        $client->addPostParam("refund_audit_url",  $params->refundAuditUrl, true);
        $client->addPostParam("refund_succ_url",  $params->refundSuccUrl, true);

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
