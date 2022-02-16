<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";



class SubmitSitemapRequest {
    public $accessToken; // string 小程序权限校验 Token
    public $appId; // int64 app_id
    public $desc; // string 描述信息
    public $frequency; // string 更新频率 3-每天 4-每周
    public $type; // string 类型 1-增量/更新； 0-下线/删除
    public $url; // string sitemap 链接

    function __construct() {
        $this->accessToken = "";
        $this->appId = 0;
        $this->desc = "";
        $this->frequency = "";
        $this->type = "";
        $this->url = "";
    }
}

/**
 *  array doRequest ($params)
 */
class SubmitSitemap{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/access/submitsitemap");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("access_token", $params->accessToken);
        $client->addPostParam("app_id",  $params->appId);
        $client->addPostParam("desc",  $params->desc);
        $client->addPostParam("frequency",  $params->frequency);
        $client->addPostParam("type",  $params->type);
        $client->addPostParam("url",  $params->url);

        $res = $client->execute();
        if ($res['status_code'] < 200 || $res['status_code'] >=300) {
            $this->errMsg = sprintf("error response body [%s]", json_encode($res));
            return false;
        }
        if ($res['body'] != false){
            $resBody = json_decode($res['body'], true);
            if (isset($resBody['errno']) && $resBody['errno'] === 0) {
                $this->data = $resBody['data'];
                $this->errMsg = sprintf("error response [%s]", $res['body']);
                return true;
            }
            $this->errMsg = sprintf("error response [%s]", $res['body']);
            return false;
        }
        $this->errMsg = sprintf("error response body [%s]", json_encode($res));
        return false;
    }

    public function getErrMsg(){
        return $this->errMsg;
    }

    public function getData(){
        return $this->data;
    }
}