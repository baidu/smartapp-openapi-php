<?php
namespace BaiduSmartapp\OpenapiClient\Analysis;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class GetDataRequest {
    public $accessToken; // string 第三方平台的接口调用凭据	
    public $scene; // string 小程序来源ID (场景值) 。不传则查询所有场景,场景值参数参考:百度APP 场景值
    public $metrics; // string 指标以逗号分隔
    public $startDate; // string 起始时间戳,格式如 20190321
    public $endDate; // string 结束时间戳,格式如 20190325
    public $startIndex; // int64 偏移量,默认为0(分页操作从第几条开始展示)
    public $maxResults; // int64 页面大小,默认值20(分页操作查询条数)
}

/**
 *  array doRequest ($params)
 */
class GetData{
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
        $client->setPath("/rest/2.0/smartapp/data/gettpdata");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addGetParam("scene", $params->scene, false);
        $client->addGetParam("metrics", $params->metrics, true);
        $client->addGetParam("start_date", $params->startDate, true);
        $client->addGetParam("end_date", $params->endDate, true);
        $client->addGetParam("start_index", $params->startIndex, false);
        $client->addGetParam("max_results", $params->maxResults, false);

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
