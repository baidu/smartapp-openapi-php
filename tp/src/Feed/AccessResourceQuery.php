<?php
namespace BaiduSmartapp\OpenapiClient\Feed;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class AccessResourceQueryRequest {
    public $accessToken; // string 授权小程序的接口调用凭据	
    public $begin; // int64 开始时间 (默认值前一天0点)	
    public $end; // int64 结束时间 (默认值今天0点)	
    public $imageType; // int64 图片类型(1:封面图片 2:问答用户头像 3:动态图片 4:feed物料图片)
    public $pageNo; // int64 页数(分页参数,第几页,默认值(1)	
    public $pageSize; // int64 单页展示数据量(分页参数,默认值(10)	
    public $status; // int64 状态（0: 全部 1: 审核中 2: 审核失败 3: 投放中 4: 已删除），默认值为0	
    public $title; // string 标题	
}

/**
 *  array doRequest ($params)
 */
class AccessResourceQuery{
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
        $client->setPath("/rest/2.0/smartapp/access/resource/query");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addGetParam("begin", $params->begin, false);
        $client->addGetParam("end", $params->end, false);
        $client->addGetParam("image_type", $params->imageType, false);
        $client->addGetParam("page_no", $params->pageNo, false);
        $client->addGetParam("page_size", $params->pageSize, false);
        $client->addGetParam("status", $params->status, false);
        $client->addGetParam("title", $params->title, false);

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
