<?php
namespace BaiduSmartapp\OpenapiClient\Msg;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class GetMsgRequest {
    public $accessToken; // string 第三方平台的接口调用凭据
    public $start; // int64 起始时间,默认值时间范围为近一天,起始时间不可超过一个月	
    public $end; // int64 截止时间,默认值时间范围为为近一天,最大时间范围不可超过一周	
    public $pushType; // int64 找回的推送类型 1:所有推送 2:失败推送	
    public $offset; // int64 分页参数(起始条数),默认值为0	
    public $count; // int64 分页参数(显示条数),默认值为100,最大值为100	
    public $idList; // string 推送id,多个用逗号(,)拼接,若传入该字段,以上参数字段不影响结果	
}

/**
 *  array doRequest ($params)
 */
class GetMsg{
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
        $client->setPath("/rest/2.0/smartapp/pushmsg/getmsg");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addGetParam("start", $params->start, false);
        $client->addGetParam("end", $params->end, false);
        $client->addGetParam("push_type", $params->pushType, false);
        $client->addGetParam("offset", $params->offset, false);
        $client->addGetParam("count", $params->count, false);
        $client->addGetParam("id_list", $params->idList, false);

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
