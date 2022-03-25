<?php
namespace BaiduSmartapp\OpenapiClient\Pay;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class GetFinanceBalanceRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $startTime; // string 开始日期。格式如：2019-01-02。
    public $endTime; // string 结束日期。格式如： 2019-01-02。
    public $currentPage; // int64 当前页数。起始为 1
    public $pageSize; // int64 分页。每页数量
}

/**
 *  array doRequest ($params)
 */
class GetFinanceBalance{
    private $data;
    private $errMsg;
    private $response;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("GET");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/pay/paymentservice/financebalance");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addGetParam("start_time", $params->startTime, true);
        $client->addGetParam("end_time", $params->endTime, true);
        $client->addGetParam("current_page", $params->currentPage, true);
        $client->addGetParam("page_size", $params->pageSize, true);

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
