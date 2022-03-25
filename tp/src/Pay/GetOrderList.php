<?php
namespace BaiduSmartapp\OpenapiClient\Pay;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class GetOrderListRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $status; // string 订单状态。 all：全部 、 1：待付款 、 2：已付款 、 3：已消费 、 4：退款中 、 5：已退款 、 6：退款失败 、7：已取消
    public $startTime; // int64 起始时间戳，10位时间戳
    public $endTime; // int64 起始时间戳，10位时间戳
    public $currentPage; // int64 当前页数。起始为 1
    public $pageSize; // int64 分页。每页数量
}

/**
 *  array doRequest ($params)
 */
class GetOrderList{
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
        $client->setPath("/rest/2.0/smartapp/pay/paymentservice/orderlist");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addGetParam("status", $params->status, true);
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
