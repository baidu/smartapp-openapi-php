<?php
namespace BaiduSmartapp\OpenapiClient\Feed;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class AccessResourceSubmitRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $appId; // int64 小程序 Id
    public $body; // string 消息体，物料的介绍
    public $ext; // string 扩展信息（JSON格式，参考附录三）
    public $feedSubType; // string feed二级分类（参考附录二）
    public $feedType; // string feed一级分类（参考附录二）
    public $images; // string 封面图片链接（JSON格式）（最多3张，单图片最大2M） 建议尺寸：宽>=375 & 高>=250；建议比例 宽:高=1.5:1
    public $mappSubType; // int64 资源子类型（参考附录一）
    public $mappType; // int64 资源类型（参考附录一）
    public $path; // string 智能小程序落地页链接
    public $tags; // string 资源标签，英文逗号分割，填写越准确详细可能带来更好的分发效果（最多10个，总长度最多100字）
    public $title; // string 标题
}

/**
 *  array doRequest ($params)
 */
class AccessResourceSubmit{
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
        $client->setPath("/rest/2.0/smartapp/access/resource/submit");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("app_id",  $params->appId, false);
        $client->addPostParam("body",  $params->body, true);
        $client->addPostParam("ext",  $params->ext, false);
        $client->addPostParam("feed_sub_type",  $params->feedSubType, false);
        $client->addPostParam("feed_type",  $params->feedType, true);
        $client->addPostParam("images",  $params->images, false);
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
