<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";

// POST Json

class UpdateSearchAggregationRequestaggregationsItem {
    public $key; // string 聚合信息配置项名称
    public $max; // int64 聚合信息配置项最大限制配置数
    public $path; // string 跳转 path
    public $sort; // int64 根据字段值倒排
    public $tip; // string 提示信息
    public $title; // string 标题
    public $type; // int64 跳转类型，枚举值，type=0 表示小程序跳转
}



class UpdateSearchAggregationRequest {
    public $accessToken; // string 接口调用凭证
    public $mappType; // int64 资源类型，1001-电商，2001-内容
    public $aggregations; // array of UpdateSearchAggregationRequestaggregationsItem 聚合信息列表
    public $appKey; // string 小程序唯一标识
}

/**
 *  array doRequest ($params)
 */
class UpdateSearchAggregation{
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
        $client->setPath("/rest/2.0/smartapp/ma/search/aggregation/update");
        $client->setContentType("application/json");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $postData = array(
            "mapp_type" =>  $params->mappType,
            "aggregations" =>  $params->aggregations,
            "app_key" =>  $params->appKey,
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
