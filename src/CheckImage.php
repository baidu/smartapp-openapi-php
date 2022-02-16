<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";



class CheckImageRequest {
    public $accessToken; // string 接口调用凭据
    public $image; // file 图片文件，只支持 PNG、JPG、JPEG 三种格式，且文件大小不能超过 5MB
    public $type; // string 检测策略，porn 为色情检测，ocr-word 为图片上文字的词表检测，ocr-lead 为图片上文字的诱导检测。可以多选，多个值之间用英文逗号拼接，不传默认为 porn，参数值区分大小写

    function __construct() {
        $this->accessToken = "";
        $this->image = array();
        $this->type = "";
    }
}

/**
 *  array doRequest ($params)
 */
class CheckImage{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/file/2.0/smartapp/riskDetection/v2/syncCheckImage");
        $client->setContentType("multipart/form-data");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("access_token", $params->accessToken);
        $postBody = array(
            "image" =>  $params->image,
            "type" =>  $params->type,
        );
        var_dump($postBody);
        $client->setPostData($postBody);

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