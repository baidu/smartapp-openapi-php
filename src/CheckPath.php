<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";



class CheckPathRequest {
    public $accessToken; // string 接口调用凭据
    public $path; // string 需要检测的页面 path(一次请求一个 path)，path 字符数不能超过 2460
    public $type; // array of string 检测策略，risk 为 url 里文字的内容违规检测，porn 为图片色情检测，ocr-word 为图片上文字的词表检测，ocr-lead 为图片上文字的诱导模型检测。可以多选，不传默认为 risk，参数值区分大小写

    function __construct() {
        $this->accessToken = "";
        $this->path = "";
        $this->type = array();
    }
}

/**
 *  array doRequest ($params)
 */
class CheckPath{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/riskDetection/v2/asyncCheckPath");
        $client->setContentType("application/json");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("access_token", $params->accessToken);
        $postData = array(
            "path" =>  $params->path,
            "type" =>  $params->type,
        );
        $client->setPostData($postData);

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