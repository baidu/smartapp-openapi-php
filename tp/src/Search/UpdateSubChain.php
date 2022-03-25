<?php
namespace BaiduSmartapp\OpenapiClient\Search;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class UpdateSubChainRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $subchainId; // string 子链 Id
    public $chainName; // string 4-10个字符，说明子链的功能
    public $chainDesc; // string 8-16个字符，辅助描述子链的功能
    public $chainPath; // string 以“/”开头的子链对应的path路径
    public $telephone; // string SA类型的客服电话子链
}

/**
 *  array doRequest ($params)
 */
class UpdateSubChain{
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
        $client->setPath("/rest/2.0/smartapp/subchain/update");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("subchain_id",  $params->subchainId, true);
        $client->addPostParam("chain_name",  $params->chainName, true);
        $client->addPostParam("chain_desc",  $params->chainDesc, true);
        $client->addPostParam("chain_path",  $params->chainPath, false);
        $client->addPostParam("telephone",  $params->telephone, false);

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
