<?php
namespace BaiduSmartapp\OpenapiClient\Pay;
use BaiduSmartapp\OpenapiClient\HttpClient;
require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "base.php";


class CreatePayAccountRequest {
    public $accessToken; // string 授权小程序的接口调用凭据
    public $businessScope; // string 经营范围。营业执照上经营范围，长度 2-2000 个字符
    public $businessProvince; // string 经营范围所在省。
    public $businessCity; // string 经营范围所在市。
    public $businessDetailAddress; // string 经营地址详情。
    public $legalPerson; // string 法人姓名，即身份证姓名（汉字，限制在 1 - 25 位）。
    public $legalId; // string 身份证号（长度限定为18位）。
    public $idCardFrontUrl; // string 身份证正面地址(必须是我们服务上传生成的图片URL，参见图片上传)
    public $idCardBackUrl; // string 身份证反面地址(必须是我们服务上传生成的图片URL，参见图片上传)
    public $legalCardStartTime; // string 法人身份证开始时间 例：2020-12-31
    public $legalCardEndTime; // string 法人身份证结束时间 例：2020-12-31，长期有效传 9999-12-31
    public $licenseStartTime; // string 营业执照证开始时间 例：2020-12-31，长期有效传营业执照核准日期
    public $licenseEndTime; // string 营业执照结束时间 例：2020-12-31，长期有效传 9999-12-31
    public $industryId; // int64 行业id 见查询行业id列表接口
    public $managePermitUrl; // string 若行业id需要资质，资质图片地址
    public $authCapital; // string 注册资本
    public $managerSame; // int64 经营控股人是否与法人一致，0 - 不一致；1 - 一致。如果不一致则相关信息必传否则不传
    public $manager; // string 最大股东姓名
    public $managerCard; // string 最大股东身份证
    public $managerCardType; // int64 最大股东身份证类型
    public $managerCardFrontUrl; // string 最大股东身份证正面地址
    public $managerCardBackUrl; // string 最大股东身份证反面地址
    public $managerCardStartTime; // string 最大股东证件开始时间
    public $managerCardEndTime; // string 最大股东证件结束时间
    public $benefitSame; // int64 受益人是否与法人一致，0 - 不一致；1 - 一致。如果不一致则相关信息必传否则不传
    public $benefit; // string 受益人姓名
    public $benefitCard; // string 受益人身份证
    public $benefitCardType; // int64 受益人身份证类型
    public $benefitCardFrontUrl; // string 受益人身份证正面地址
    public $benefitCardBackUrl; // string 受益人身份证反面地址
    public $benefitStartTime; // string 受益人证件开始时间
    public $benefitEndTime; // string 受益人证件结束时间
}

/**
 *  array doRequest ($params)
 */
class CreatePayAccount{
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
        $client->setPath("/rest/2.0/smartapp/pay/account/create");
        $client->setContentType("application/x-www-form-urlencoded");

        $client->addGetParam("sp_sdk_lang", SDKLANG, true);
        $client->addGetParam("sp_sdk_ver", SDKVERSION, true);
        $client->addGetParam("access_token", $params->accessToken, true);
        $client->addPostParam("business_scope",  $params->businessScope, true);
        $client->addPostParam("business_province",  $params->businessProvince, true);
        $client->addPostParam("business_city",  $params->businessCity, true);
        $client->addPostParam("business_detail_address",  $params->businessDetailAddress, true);
        $client->addPostParam("legal_person",  $params->legalPerson, true);
        $client->addPostParam("legal_id",  $params->legalId, true);
        $client->addPostParam("id_card_front_url",  $params->idCardFrontUrl, true);
        $client->addPostParam("id_card_back_url",  $params->idCardBackUrl, true);
        $client->addPostParam("legal_card_start_time",  $params->legalCardStartTime, true);
        $client->addPostParam("legal_card_end_time",  $params->legalCardEndTime, true);
        $client->addPostParam("license_start_time",  $params->licenseStartTime, true);
        $client->addPostParam("license_end_time",  $params->licenseEndTime, true);
        $client->addPostParam("industry_id",  $params->industryId, true);
        $client->addPostParam("manage_permit_url",  $params->managePermitUrl, true);
        $client->addPostParam("auth_capital",  $params->authCapital, true);
        $client->addPostParam("manager_same",  $params->managerSame, true);
        $client->addPostParam("manager",  $params->manager, false);
        $client->addPostParam("manager_card",  $params->managerCard, false);
        $client->addPostParam("manager_card_type",  $params->managerCardType, false);
        $client->addPostParam("manager_card_front_url",  $params->managerCardFrontUrl, false);
        $client->addPostParam("manager_card_back_url",  $params->managerCardBackUrl, false);
        $client->addPostParam("manager_card_start_time",  $params->managerCardStartTime, false);
        $client->addPostParam("manager_card_end_time",  $params->managerCardEndTime, false);
        $client->addPostParam("benefit_same",  $params->benefitSame, true);
        $client->addPostParam("benefit",  $params->benefit, false);
        $client->addPostParam("benefit_card",  $params->benefitCard, false);
        $client->addPostParam("benefit_card_type",  $params->benefitCardType, false);
        $client->addPostParam("benefit_card_front_url",  $params->benefitCardFrontUrl, false);
        $client->addPostParam("benefit_card_back_url",  $params->benefitCardBackUrl, false);
        $client->addPostParam("benefit_start_time",  $params->benefitStartTime, false);
        $client->addPostParam("benefit_end_time",  $params->benefitEndTime, false);

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
