<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";



class UpdateCouponBannerRequest {
    public $accessToken; // string 接口调用凭证
    public $couponId; // string 卡券 ID
    public $picUrl; // string 卡券 banner 图片
    public $title; // string 卡券 banner 图标题
    public $appRedirectPath; // string banner 图跳转的小程序页面路径
    public $bannerId; // int64 卡券 banner 记录 id

    function __construct() {
        $this->accessToken = "";
        $this->couponId = "";
        $this->picUrl = "";
        $this->title = "";
        $this->appRedirectPath = "";
        $this->bannerId = 0;
    }
}

/**
 *  array doRequest ($params)
 */
class UpdateCouponBanner{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/v1.0/coupon/banner/update");
        $client->setContentType("application/json");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("access_token", $params->accessToken);
        $postData = array(
            "couponId" =>  $params->couponId,
            "picUrl" =>  $params->picUrl,
            "title" =>  $params->title,
            "appRedirectPath" =>  $params->appRedirectPath,
            "bannerId" =>  $params->bannerId,
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