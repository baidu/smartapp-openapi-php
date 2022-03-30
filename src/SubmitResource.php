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
}

/**
 *  array doRequest ($params)
 */
class SubmitResource{
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
        $client->setPath("/rest/2.0/smartapp/access/submitresource");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("app_id",  $params->appId, false);
        $client->addPostParam("body",  $params->body, true);
        $client->addPostParam("ext",  $params->ext, true);
        $client->addPostParam("feed_sub_type",  $params->feedSubType, false);
        $client->addPostParam("feed_type",  $params->feedType, true);
        $client->addPostParam("images",  $params->images, true);
        $client->addPostParam("mapp_sub_type",  $params->mappSubType, true);
        $client->addPostParam("mapp_type",  $params->mappType, true);
        $client->addPostParam("path",  $params->path, true);
        $client->addPostParam("tags",  $params->tags, false);
        $client->addPostParam("title",  $params->title, true);

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
