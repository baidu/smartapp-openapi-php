<?php
namespace BaiduSmartapp\OpenapiClient\TP\Pay;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class UpdateBindPaymentServiceRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $appName; // string 服务名称。支付服务的名称
    public $servicePhone; // string 服务电话。
    public $bankAccount; // string 银行账户。银行卡开户名
    public $bankCard; // string 银行卡号。
    public $bankName; // string 所属银行。由数据字典接口取
    public $bankBranch; // string 支行信息。自由输入，例如：招商银行北京上地支行
    public $openProvince; // string 开户省份。由数据字典接口取
    public $openCity; // string 开户城市。由数据字典接口取
    public $paymentDays; // int64 结算周期。由数据字典接口取
    public $commissionRate; // int64 佣金比例。固定传 6，小程序固定为千分之六(6)
    public $poolCashPledge; // int64 打款预留（元）。提现后的保留金额
    public $dayMaxFrozenAmount; // int64 每日退款上限(元)。每天最大退款限额10000元
    public $bankPhoneNumber; // string 银行卡预留手机号
}

/**
 *  array doRequest ($params)
 */
class UpdateBindPaymentService{
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
        $client->setPath("/rest/2.0/smartapp/pay/paymentservice/updatebindservice");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("app_name",  $params->appName, true);
        $client->addPostParam("service_phone",  $params->servicePhone, true);
        $client->addPostParam("bank_account",  $params->bankAccount, true);
        $client->addPostParam("bank_card",  $params->bankCard, true);
        $client->addPostParam("bank_name",  $params->bankName, true);
        $client->addPostParam("bank_branch",  $params->bankBranch, true);
        $client->addPostParam("open_province",  $params->openProvince, true);
        $client->addPostParam("open_city",  $params->openCity, true);
        $client->addPostParam("payment_days",  $params->paymentDays, true);
        $client->addPostParam("commission_rate",  $params->commissionRate, true);
        $client->addPostParam("pool_cash_pledge",  $params->poolCashPledge, true);
        $client->addPostParam("day_max_frozen_amount",  $params->dayMaxFrozenAmount, true);
        $client->addPostParam("bank_phone_number",  $params->bankPhoneNumber, true);

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
