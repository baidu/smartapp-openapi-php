<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";


class GetQrCodeRequest {
    public $accessToken; // string 接口调用凭证
    public $path; // string 扫码进入的小程序页面路径，最大长度 4000 字节，可以为空
    public $width; // int64 二维码的宽度（单位：px）。最小 280px，最大 1280px
    public $mf; // int64 是否包含二维码内嵌 logo 标识，1001 为不包含，默认包含
    public $imgFlag; // int64 返回值选项，默认或传 1 时只返回二维码 base64 编码字符串，传 0 只返回 url
}

/**
 *  array doRequest ($params)
 */
class GetQrCode{
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
        $client->setPath("/rest/2.0/smartapp/qrcode/getv2");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("path",  $params->path, false);
        $client->addPostParam("width",  $params->width, false);
        $client->addPostParam("mf",  $params->mf, false);
        $client->addPostParam("img_flag",  $params->imgFlag, false);

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
