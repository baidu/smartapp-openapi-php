<?php
namespace BaiduSmartapp\OpenapiClient\Pkg;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class SubmitPackageAuditRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $content; // string 送审描述
    public $packageId; // string 包 id ，获取方式请参考获取小程序包列表
    public $remark; // string 备注	
    public $testAccount; // string 可以向审核人员提供的测试帐号
    public $testPassword; // string 测试帐号对应的密码
}

/**
 *  array doRequest ($params)
 */
class SubmitPackageAudit{
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
        $client->setPath("/rest/2.0/smartapp/package/submitaudit");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("content",  $params->content, true);
        $client->addPostParam("package_id",  $params->packageId, true);
        $client->addPostParam("remark",  $params->remark, true);
        $client->addPostParam("test_account",  $params->testAccount, false);
        $client->addPostParam("test_password",  $params->testPassword, false);

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
