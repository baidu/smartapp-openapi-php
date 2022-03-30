<?php
namespace BaiduSmartapp\OpenapiClient\TP\Domain;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class ModifyServerDomainRequest {
    public $accessToken; // string 第三方平台的接口调用凭据	
    public $action; // string add添加, delete删除, set覆盖, get获取。当参数是get时不需要填四个域名字段，如果没有action字段参数，则默认将开放平台第三方登记的小程序业务域名全部添加到授权的小程序中。
    public $downloadDomain; // string download合法域名，多个时用,分割，当action参数是get时不需要此字段
    public $requestDomain; // string request合法域名，多个时用,分割，当action参数是get时不需要此字段。
    public $socketDomain; // string socket合法域名，多个时用,分割，当action参数是get时不需要此字段。
    public $uploadDomain; // string upload合法域名，多个时用,分割，当action参数是get时不需要此字段。
}

/**
 *  array doRequest ($params)
 */
class ModifyServerDomain{
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
        $client->setPath("/rest/2.0/smartapp/tp/modifydomain");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("action",  $params->action, true);
        $client->addPostParam("download_domain",  $params->downloadDomain, false);
        $client->addPostParam("request_domain",  $params->requestDomain, false);
        $client->addPostParam("socket_domain",  $params->socketDomain, false);
        $client->addPostParam("upload_domain",  $params->uploadDomain, false);

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
