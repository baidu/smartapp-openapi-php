<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;

class  GetLikeCountRequest {
        public $AccessToken;
        public $HostName;
        public $AppKey;
        public $Platform;
        public $Scene;
        public $Snid;
        public $SnidType;

    function __construct() {
        $this->AccessToken = "";
        $this->HostName = "";
        $this->AppKey = "";
        $this->Platform = "";
        $this->Scene = 0;
        $this->Snid = "";
        $this->SnidType = "";
    }
}

/**
 *  array do ($params)
 */
class GetLikeCount{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function do(GetLikeCountRequest $params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost("openapi.baidu.com");
        $client->setPath("/rest/2.0/smartapp/oss/publisher/ugc/like_count");
        $client->setContentType("application/json");
        $client->addGetParam("access_token", $params->AccessToken);
        $client->addGetParam("host_name", $params->HostName);
        $client->addGetParam("app_key", $params->AppKey);
        $client->addGetParam("platform", $params->Platform);
        $client->addGetParam("scene", $params->Scene);
        $postData = array(
            "snid" =>  $params->Snid,
            "snid_type" =>  $params->SnidType,
        );
        $client->setPostData($postData);

        $res = $client->execute();
        if ($res['status_code'] < 200 || $res['status_code'] >=300) {
            $this->errMsg = sprintf("http status [%d], body[%s]", $res['status_code'], $res['body']);
            return false;
        }
        if ($res['body'] != false){
            $resBody = json_decode($res['body'], true);
            if ($resBody['errno'] === 0) {
                $this->data = $resBody['data'];
                return true;
            }
            $this->errMsg = sprintf("error response [%s]", $res['body']);
            return false;
        }
        return false;
    }

    public function getErrMsg(){
        return $this->errMsg;
    }

    public function getData(){
        return $this->data;
    }
}