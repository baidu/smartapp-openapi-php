<?php
namespace BaiduSmartapp\OpenapiClient\TP\Analysis;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class GetAnalysisVisitCharacterRequest {
    public $accessToken; // string 授权小程序的接口调用凭据	
    public $characterType; // string 习惯分类：depth/time/interval/frequency
    public $startIndex; // int64 数据偏移位置，接口默认返回 20 条数据，可使用该偏移量进行翻页查看
    public $startDate; // string 开始日期：20190410
    public $endDate; // string 结束日期：20190415
}

/**
 *  array doRequest ($params)
 */
class GetAnalysisVisitCharacter{
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
        $client->setPath("/rest/2.0/smartapp/data/getanalysisvisitcharacter");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("character_type",  $params->characterType, true);
        $client->addPostParam("start_index",  $params->startIndex, true);
        $client->addPostParam("start_date",  $params->startDate, true);
        $client->addPostParam("end_date",  $params->endDate, true);

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
