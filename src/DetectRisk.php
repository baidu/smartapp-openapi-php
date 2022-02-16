<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . "base.php";



class DetectRiskRequest {
    public $accessToken; // string 接口调用凭证
    public $appkey; // string 小程序 appkey，智能小程序 AppKey
    public $xtoken; // string 小程序通过swan-getSystemRiskInfo获取的内容,格式：{"key":"xxxx","value":"xxxx"}
    public $type; // string 运营活动的类型，该值由风控平台分配。目前只有一种 marketing
    public $clientip; // string 客户端的 IP，非小程序服务本地 IP
    public $ts; // int64 服务器的时间戳，秒级别
    public $ev; // string 事件类型，预先分配事件 ID 定义。1、点击活动按钮（或者活动操作），活动相关操作默认选择此事件；2、 进入活动页面；3、注册；4、登录；5、分享；6、点赞；7、评论；8、 提现；9、下单/提单；10、支付；11、业务自定义动作；12、浏览 feed；13、开宝箱；14、领取红包；15、分享 feed；16、做任务；17、签到；18、排行榜；19、邀请；20、新客红包；21、摇一摇；22、语音红包；23、视频红包；24、金融授信；25、答题
    public $useragent; // string 客户端请求小程序 Server 的 useragent，示例：Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.75 Safari/537.36
    public $phone; // string 加密后的电话号码，加密方法：sha1

    function __construct() {
        $this->accessToken = "";
        $this->appkey = "";
        $this->xtoken = "";
        $this->type = "";
        $this->clientip = "";
        $this->ts = 0;
        $this->ev = "";
        $this->useragent = "";
        $this->phone = "";
    }
}

/**
 *  array doRequest ($params)
 */
class DetectRisk{
    private $data;
    private $errMsg;

    /**
     * @return bool true 请求成功, 调用 getData 获取返回值；false 请求失败 调用 getErrMsg 获取错误详情；
     */
    public function doRequest($params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost(OPENAPIHOST);
        $client->setPath("/rest/2.0/smartapp/detectrisk");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG);
        $client->addGetParam("sp_sdk_ver", SDKVERSION);
        $client->addGetParam("access_token", $params->accessToken);
        $client->addPostParam("appkey",  $params->appkey);
        $client->addPostParam("xtoken",  $params->xtoken);
        $client->addPostParam("type",  $params->type);
        $client->addPostParam("clientip",  $params->clientip);
        $client->addPostParam("ts",  $params->ts);
        $client->addPostParam("ev",  $params->ev);
        $client->addPostParam("useragent",  $params->useragent);
        $client->addPostParam("phone",  $params->phone);

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