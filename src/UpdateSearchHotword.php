<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";

// POST Json

class UpdateSearchHotwordRequesthotWordsItem {
    public $icon; // string 标题 icon url 地址
    public $key; // string 标题文字
    public $rank; // int64 热搜词排序，从小到大排序
    public $rank_color; // string 热搜榜氛围色
    public $rank_type; // int64 show_type=3 时使用，榜单推荐样式，1：新，2：热，3：普通
    public $show_type; // int64 前端模版展示样式，1：纯文本，2：icon+文本，3：榜单推荐
}



class UpdateSearchHotwordRequest {
    public $accessToken; // string 接口调用凭证
    public $appKey; // string 小程序唯一标识
    public $hotWords; // array of UpdateSearchHotwordRequesthotWordsItem 热搜词信息列表
}

/**
 *  array doRequest ($params)
 */
class UpdateSearchHotword{
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
        $client->setPath("/rest/2.0/smartapp/ma/search/hot_word/update");
        $client->setContentType("application/json");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $postData = array(
            "app_key" =>  $params->appKey,
            "hot_words" =>  $params->hotWords,
        );
        $client->setPostData($postData);

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
