<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";


class SendTemplateMessageRequest {
    public $accessToken; // string 接口调用凭证
    public $templateId; // string 小程序模板 ID
    public $touserOpenId; // string 接收者 open_id 参数不能为空。open_id 为百度用户登录唯一标识，可以通过 SessionKey 获得
    public $data; // string 发送消息内容
    public $page; // string 点击模板卡片后的跳转页面，仅限本小程序内的页面。支持带参数，（示例 index?foo=bar），该字段不填默认跳转至首页
    public $sceneId; // string 场景 id ，例如 formId、orderId、payId。formId 为页面内 form 组件的report-submit属性为 true 时返回 formId ，详见 form 表单
    public $sceneType; // int64 场景 type 。1：表单；2：百度收银台订单；3：直连订单
}

/**
 *  array doRequest ($params)
 */
class SendTemplateMessage{
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
        $client->setPath("/rest/2.0/smartapp/template/send");
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
