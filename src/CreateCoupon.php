<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";

// POST Json

class CreateCouponRequestbaseInfodateInfo {
    public $beginTimestamp; // int64 使用开始时间，当 type 为 1 时，beginTimestamp 必传且生效；
    public $endTimestamp; // int64 使用结束时间，当 type 为 1 时，endTimestamp 必传且生效；
    public $getEndTimestamp; // int64 结束领取时间
    public $getStartTimestamp; // int64 开始领取时间
    public $timeUnit; // int64 时间单位：1-时；2-天；3-月；当 type 为 2 时，timeUnit 必传且生效；
    public $timeValue; // int64 时间值；当 type 为 2 时，timeValue 必传且生效；
    public $type; // int64 券使用时间类型： 1：开发者设置使用开始和结束时间，此时，beginTimestamp 和 endTimestamp 必传。 2：领取之后，多久可使用，此时，timeUnit 和 timeValue 必传。相对时间：当规定领取 5 日后失效，10 月 1 日 23:00 领取后，10 月 6 日 23:00 失效。 4：领取之后，多久（自然日）失效，此时，timeUnit 和 timeValue 必传，timeUnit 只能设置为天（timeUnit=2）。自然相对时间：当规定领取 5 个自然日后失效，10 月 1 日 23:00 领取后，10 月 6 日 00:00 失效。
}

class CreateCouponRequestbaseInfo {
    public $appRedirectPath; // string 已领取的卡券，从详情頁点击「立即使用」打开小程序页面地址，不传默认打开首页
    public $codeType; // int64 卡券 Code 码类型，默认为 1，1：开发者自定义 code 码，当 codeType=1 时，需要通过「上传 code 码」接口导入 Code，否则影响领券；2：系统分配 Code 码，当 codeType=2 时，开发者无需上传 Code ，quantity 要求必传非 0 且生效
    public $color; // string 卡券背景色，支持范围： [B010 ～ B160]
    public $dateInfo; // CreateCouponRequestbaseInfodateInfo 有效期信息
    public $getLimit; // int64 使用日期，有效期的信息。
    public $quantity; // int64 卡券库存，默认为 0，当 codeType=2 时，quantity 要求必传且生效
    public $title; // string 优惠券名称，最多 15 字
}



class CreateCouponRequest {
    public $accessToken; // string 接口调用凭证
    public $discount; // string 折扣券专用，表示打折力度（格式为百分比），填 80 就是八折。
    public $baseInfo; // CreateCouponRequestbaseInfo 基本的卡券数据，所有卡券通用。
    public $description; // string 使用须知：卡券使用方法的介绍
    public $callbackUrl; // string 卡券领取事件推送地址
    public $couponType; // string 卡券类型，当以上卡券类型无法满足时，可使用通用优惠券类型
    public $leastCost; // int64 表示可使用的门槛金额（单位：分），不传默认为 0，即无起用门槛
    public $reduceCost; // int64 代金券专用，表示减免金额（单位：分）
}

/**
 *  array doRequest ($params)
 */
class CreateCoupon{
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
        $client->setPath("/rest/2.0/smartapp/v1.0/coupon/create");
        $client->setContentType("application/json");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $postData = array(
            "discount" =>  $params->discount,
            "baseInfo" =>  $params->baseInfo,
            "description" =>  $params->description,
            "callbackUrl" =>  $params->callbackUrl,
            "couponType" =>  $params->couponType,
            "leastCost" =>  $params->leastCost,
            "reduceCost" =>  $params->reduceCost,
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
