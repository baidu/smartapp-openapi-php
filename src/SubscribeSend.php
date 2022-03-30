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
}

/**
 *  array doRequest ($params)
 */
class SubscribeSend{
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
        $client->setPath("/rest/2.0/smartapp/template/message/subscribe/send");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("template_id",  $params->templateId, true);
        $client->addPostParam("touser_openId",  $params->touserOpenId, true);
        $client->addPostParam("subscribe_id",  $params->subscribeId, true);
        $client->addPostParam("data",  $params->data, true);
        $client->addPostParam("page",  $params->page, false);

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
