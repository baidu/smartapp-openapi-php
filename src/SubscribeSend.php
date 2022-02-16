<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";



class SubscribeSendRequest {
    public $accessToken; // string 接口调用凭证
    public $templateId; // string 所需下发的模板消息的id
    public $touserOpenId; // string 接收者open_id
    public $subscribeId; // string 订阅 Id ，发送订阅类模板消息时所使用的唯一标识符，开发者自定义的subscribe-id 字段。注意：同一用户在同一个订阅id 下的多次授权不累积下发权限，只能下发一条。若要订阅多条，需要不同订阅 id
    public $data; // string 消息内容
    public $page; // string 点击模板卡片后的跳转页面，仅限本小程序内的页面。支持带参数，示例index?foo=bar，该字段不填默认跳转至首页

    function __construct() {
        $this->accessToken = "";
        $this->templateId = "";
        $this->touserOpenId = "";
        $this->subscribeId = "";
        $this->data = "";
        $this->page = "";
    }
}

/**
 *  array doRequest ($params)
 */
class SubscribeSend{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/template/message/subscribe/send");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("access_token", $params->accessToken);
        $client->addPostParam("template_id",  $params->templateId);
        $client->addPostParam("touser_openId",  $params->touserOpenId);
        $client->addPostParam("subscribe_id",  $params->subscribeId);
        $client->addPostParam("data",  $params->data);
        $client->addPostParam("page",  $params->page);

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