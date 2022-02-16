<?php
namespace BaiduSmartapp\OpenapiClient;

class GetLikeCountParams{
    public $accessToken;
    public $hostName;
    public $appKey;
    public $platform;
    public $scene;
    public $snid;
    public $snidType;
}

/**
 *  array do ($params)
 */
class GetLikeCount{
    public function do(GetLikeCountParams $params){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://openapi.baidu.com/rest/2.0/smartapp/oss/publisher/ugc/like_count', [
            'query' => [
                "access_token" =>  $params->accessToken,
                "sp_sdk_lang" => "php",
                "sp_sdk_ver" =>  "1.0.0",
                "host_name" => $params->hostName,
                "app_key" => $params->appKey,
                "platform" => $params->platform,
                "scene" =>  $params->scene,
            ],
            'json' => [
                "snid" =>  $params->snid,
                "snid_type" =>  $params->snidType,
            ]
        ]);
        $statusCode = $response->getStatusCode();
        if ($statusCode >= 200 && $statusCode < 300) {
            $body = $response->getBody()->getContents();
            return json_decode($body, true);
        }
        return $statusCode;
    }
}