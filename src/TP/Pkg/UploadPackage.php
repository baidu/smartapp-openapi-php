<?php
namespace BaiduSmartapp\OpenapiClient\TP\Pkg;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class UploadPackageRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $templateId; // string 代码库中的代码模板 id ，可以在第三方平台-模板管理-模板库 查看到模板 id
    public $extJson; // string 第三方自定义的配置
    public $userDesc; // string 代码描述，开发者可自定义。
    public $userVersion; // string 代码版本号，开发者可自定义。
    public $testAccount; // string 设置直接送审( ext_json 中的 directCommit 字段为 true 时)，可以向审核人员提供的测试帐号。
    public $testPassword; // string 测试帐号对应的密码。
}

/**
 *  array doRequest ($params)
 */
class UploadPackage{
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
        $client->setPath("/rest/2.0/smartapp/package/upload");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("template_id",  $params->templateId, true);
        $client->addPostParam("ext_json",  $params->extJson, true);
        $client->addPostParam("user_desc",  $params->userDesc, true);
        $client->addPostParam("user_version",  $params->userVersion, true);
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
