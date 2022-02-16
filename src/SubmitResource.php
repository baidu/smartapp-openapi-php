<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";



class SubmitResourceRequest {
    public $accessToken; // string 接口调用凭证
    public $appId; // int64 app_id
    public $body; // string 内容的介绍，最多 2000 字符
    public $ext; // string 扩展信息（参考文档附录三）
    public $feedSubType; // string feed 二级分类（参考文档附录二）
    public $feedType; // string feed 一级分类（参考文档附录二）
    public $images; // string 封面图片链接，要求必须是 JSON 格式，最多 3 张，单图片最大不能超 2M，只支持 JPG 或 PNG 格式（jpeg 不支持），尺寸要求：宽不能低于 372px，且高不能低于 248px。重要提示：图片尺寸越大、清晰度越高、宽高比越接近3:2，越有助于降低不可用风险，促进分发。
    public $mappSubType; // string 资源子类型（参考文档附录一）
    public $mappType; // string 资源类型（参考文档附录一）
    public $path; // string 智能小程序落地页链接
    public $tags; // string 资源标签，英文逗号分割，填写越准确详细可能带来更好的分发效果（最多 10 个，总长度最多 100 字）
    public $title; // string 标题

    function __construct() {
        $this->accessToken = "";
        $this->appId = 0;
        $this->body = "";
        $this->ext = "";
        $this->feedSubType = "";
        $this->feedType = "";
        $this->images = "";
        $this->mappSubType = "";
        $this->mappType = "";
        $this->path = "";
        $this->tags = "";
        $this->title = "";
    }
}

/**
 *  array doRequest ($params)
 */
class SubmitResource{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/access/submitresource");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("access_token", $params->accessToken);
        $client->addPostParam("app_id",  $params->appId);
        $client->addPostParam("body",  $params->body);
        $client->addPostParam("ext",  $params->ext);
        $client->addPostParam("feed_sub_type",  $params->feedSubType);
        $client->addPostParam("feed_type",  $params->feedType);
        $client->addPostParam("images",  $params->images);
        $client->addPostParam("mapp_sub_type",  $params->mappSubType);
        $client->addPostParam("mapp_type",  $params->mappType);
        $client->addPostParam("path",  $params->path);
        $client->addPostParam("tags",  $params->tags);
        $client->addPostParam("title",  $params->title);

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