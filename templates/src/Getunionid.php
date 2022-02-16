<?php
namespace BaiduSmartapp\OpenapiClient;
use BaiduSmartapp\OpenapiClient\HttpClient;
//GetunionidReqParams 
class GetUnionidReqParams {
    public $accessToken;
    public $openid;
}

/**
 *  array do ($params)
 */
class GetUnionid{
    public function do(GetunionidReqParams $params){
        $client = new HttpClient();
        $client->setMethod("POST");
        $client->setHost("openapi.baidu.com");
        $client->setPath("/rest/2.0/smartapp/getunionid");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("access_token", $params->accessToken);
        $client->addGetParam("sp_sdk_lang", "php");
        $client->addGetParam("sp_sdk_ver", "1.0.0");

        $client->addPostParam("openid", $params->openid);

        $res = $client->execute();
        return $res;
    }
}