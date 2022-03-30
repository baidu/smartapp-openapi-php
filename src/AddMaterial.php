<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";


class AddMaterialRequest {
    public $accessToken; // string 接口调用凭证
    public $appId; // int64 app_id
    public $imageUrl; // string 小图片地址，长度不能超过 500 个字符，最小尺寸为 213*213，比例为 1：1，单图最大为 2M
    public $title; // string 标题，需要描述完整，能够明确表示小程序或内容的主要信息点，不能全英文，6-30 个字。若选择相应垂类时，此字段只作为兜底展示字段
    public $path; // string 智能小程序内页链接
    public $category1Code; // string 一级分类字段
    public $category2Code; // string 二级分类字段
    public $desc; // string 4-17 个汉字。标题解释说明
    public $labelAttr; // string 属性、特点。最多三个标签；每个标签字数不超过 5 个汉字,多个使用因为 / 隔开
    public $labelDiscount; // string 优惠信息，最多一个标签；每个标签字数不超过 7 个汉字
    public $buttonName; // string 按钮文案，最多 4 个字
    public $bigImage; // string 封面图片链接（1 张，单图片最大 2M）大图模板要求最小尺寸 1068 x 601，比例为 16：9，单图最大为 2M
    public $verticalImage; // string 当选择小说/动漫，影视剧，电影票务，演出赛事时必填；（竖图 3：4）最低 213*284
    public $extJson; // string 扩展信息
}

/**
 *  array doRequest ($params)
 */
class AddMaterial{
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
        $client->setPath("/rest/2.0/smartapp/articlemount/material/add");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("app_id",  $params->appId, false);
        $client->addPostParam("imageUrl",  $params->imageUrl, true);
        $client->addPostParam("title",  $params->title, true);
        $client->addPostParam("path",  $params->path, true);
        $client->addPostParam("category1Code",  $params->category1Code, true);
        $client->addPostParam("category2Code",  $params->category2Code, true);
        $client->addPostParam("desc",  $params->desc, false);
        $client->addPostParam("labelAttr",  $params->labelAttr, false);
        $client->addPostParam("labelDiscount",  $params->labelDiscount, false);
        $client->addPostParam("buttonName",  $params->buttonName, false);
        $client->addPostParam("bigImage",  $params->bigImage, false);
        $client->addPostParam("verticalImage",  $params->verticalImage, false);
        $client->addPostParam("extJson",  $params->extJson, false);

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
