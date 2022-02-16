<?php
namespace BaiduSmartapp\OpenapiClient;

//GetunionidReqParams 
class GetOpenidReqParams {
    public $accessToken;
    public $openid;
}

/**
 *  @method array do ($params) 发起请求
 */
class GetOpenid{
    public function do(GetOpenidReqParams $params){
        var_dump($params);
    }
}