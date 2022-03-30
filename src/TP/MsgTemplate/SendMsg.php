<?php
namespace BaiduSmartapp\OpenapiClient\TP\MsgTemplate;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class SendMsgRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $templateId; // string 模板 id ，发送小程序模板消息时所需
    public $touserOpenId; // string 接收者 open_id
    public $data; // string {"keyword1": {"value": "2018-09-06"},"keyword2": {"value": "kfc"}}
    public $page; // string 点击模板卡片后的跳转页面，仅限本小程序内的页面。支持带参数，（示例index?foo=bar），该字段不填则模板无跳转。
    public $sceneId; // string 场景 id，例如表单 id 和订单 id
    public $sceneType; // int64 场景type，1：表单；2：百度收银台订单；3:直连订单
    public $title; // string 标题
    public $ext; // string {"xzh_id":111,"category_id":15}
}

/**
 *  array doRequest ($params)
 */
class SendMsg{
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
        $client->setPath("/rest/2.0/smartapp/template/sendmessage");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("template_id",  $params->templateId, true);
        $client->addPostParam("touser_openId",  $params->touserOpenId, true);
        $client->addPostParam("data",  $params->data, true);
        $client->addPostParam("page",  $params->page, false);
        $client->addPostParam("scene_id",  $params->sceneId, true);
        $client->addPostParam("scene_type",  $params->sceneType, true);
        $client->addPostParam("title",  $params->title, true);
        $client->addPostParam("ext",  $params->ext, false);

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
