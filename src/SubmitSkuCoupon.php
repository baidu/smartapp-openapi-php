<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";

// POST Json

class SubmitSkuCouponRequestpriceInfo {
    public $org_price; // string 付费优惠券：优惠活动前的服务原价格，注意，是以分为单位
    public $real_price; // string 付费优惠券：当前服务的实际成交价格，注意，是以分为单位
}

class SubmitSkuCouponRequestBody {
    public $desc; // string 优惠券简介，优惠券的文字解释说明，8~34 个字符(汉字占 2 字符)
    public $images; // array of string 优惠券图片比例为 1：1，像素不得低于 576 * 576,支持 png、jpg 图片内容要求：图片清晰、干净，不要出现令人不适的内容；不能出现严重影响用户理解的内容截断问题；图片无水印、二维码相关性&一致性：图片与标题、优惠落地页内容相关、信息一致
    public $path; // string 智能小程序落地页链接，免费优惠券 path 填写格式为 /pages/detail/highVersionIndex/?biz_id=2&biz_app_id= 小程序 appKey&coupon_template_id= 卡券 id&is_activity=0
    public $price_info; // SubmitSkuCouponRequestpriceInfo 服务价格，详见：price_info 字段说明
    public $region; // string 服务地域，参考附录二，省市之间用英文中划线分割，多个地区之间用英文逗号分割
    public $schema; // string 优惠券的具体信息，详见：coupon_info
    public $title; // string 优惠券标题：活动优惠信息说明，12-30 个字符(汉字占 2 字符)；不允许有特殊符号；优惠活动信息必须真实；需要清晰地说明商品内容，说明券的品牌（如肯德基、爱奇艺）、优惠主体（如 30 元代金券、汉堡薯条炸鸡兑换券）
    public $trade_type; // int64 服务类目编码，参考附录一
}



class SubmitSkuCouponRequest {
    public $accessToken; // string 接口调用凭证
    public $requestBody; // array of SubmitSkuCouponRequestBody
}

/**
 *  array doRequest ($params)
 */
class SubmitSkuCoupon{
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
        $client->setPath("/rest/2.0/smartapp/server/submit/skuCoupon");
        $client->setContentType("application/json");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $postData = $params->requestBody;
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
