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

    function __construct() {
        $this->accessToken = "";
        $this->path = "";
        $this->width = 0;
        $this->mf = 0;
        $this->imgFlag = 0;
    }
}

/**
 *  array doRequest ($params)
 */
class GetQrCode{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/qrcode/getv2");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("access_token", $params->accessToken);
        $client->addPostParam("path",  $params->path);
        $client->addPostParam("width",  $params->width);
        $client->addPostParam("mf",  $params->mf);
        $client->addPostParam("img_flag",  $params->imgFlag);

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